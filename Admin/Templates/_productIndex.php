<?php
include_once '../../DatabaseController/DBController.php';
//include_once '../../Global/ResizeImage.php';

$obj = new Query();

$product = $obj->getData('product', '*');
$brands = $obj->getData('brand', '*');
$categories = $obj->getData('category', '*');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(!empty($_SESSION["isFilter"])){
    if ($_SESSION["isFilter"] == true) {
        $filteredProduct = "";
        if (!empty($_GET["product"])) {
            $filteredProduct = $_GET["product"];
        }
        if (!empty($filteredProduct)) {
            $product = json_decode($filteredProduct, true);
        } else {
            $product = $filteredProduct;
        }
    }}
if(!empty($_SESSION["isFilter"])){
    if ($_SESSION["isReset"] == true){
        $product = $obj->getData('product', '*');
    }}
}


?>
<div class="container min-vh-100">
    <div class="d-flex justify-content-between py-1 align-items-center">
        <h2 class="mt-2">List of Products</h2>
        <input class="h-50" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."
               title="Type in a name">

        <label>Filter by:</label>
        <form action="filterProduct.php" method="POST">
            <select name="filterBrand" id="filterBrand">
                <option selected value="">select...</option>
                <?php
                $i = 0;
                while ($i < count($brands)) {
                    $row = $brands[$i];
                    ?>
                    <option value="<?php echo $row['id']; ?>"
                        <?php
                        if ($_SERVER["REQUEST_METHOD"]=="GET"){
                        if (!empty($_SESSION["isFilter"] )&&$_SESSION["isFilter"] === true) {
                            if ($row['id'] === $_SESSION["selectedBrand"]) {
                                echo "selected";
                            }
                        }}
                        ?>
                    >
                        <?php echo $row['name']; ?></option>
                    <?php $i++;
                } //close while
                ?>
            </select>
            <select name="filterCategory" id="filterCategory">
                <option selected value="">select...</option>
                <?php
                $i = 0;
                while ($i < count($categories)) {
                    $row = $categories[$i];
                    ?>
                    <option value="<?php echo $row['id']; ?>"
                        <?php
                        if ($_SERVER["REQUEST_METHOD"]=="GET"){
                            if (!empty($_SESSION["isFilter"] )&&$_SESSION["isFilter"] === true) {
                                if ($row['id'] === $_SESSION["selectedCategory"]) {
                                    echo "selected";
                                }
                            }}
                        ?>
                    ><?php echo $row['name']; ?></option>
                    <?php $i++;
                } //close while
                ?>
            </select>

            <button type="submit" class="btn btn-outline-primary"><i class="text-outline-primary fas fa-search"></i>
                Search
            </button>
        </form>
        <a href="resetFilter.php" class="btn btn-danger">Reset</a>

        <a href="../products/create.php" class="text-success"><span><i class=" fas fa-add"></i></span> Add new</a>
    </div>
    <table class="table table-striped" id="productTable">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php

        if (!empty($product)) {
            $i = 0;
            while ($i < count($product)) {
                $row = $product[$i];
                $brand = $obj->getDatabyId('brand', 'name', $row['brand']);
                $category = $obj->getDatabyId('category', 'name', $row['category']);

//        //for resizing
//            $target_dir = "../../Uploads/";
//            $target_file = $target_dir .$row['image'];
//
//            $image = new ResizeImage();
//            $image->load($target_file);
//
//
//            $image->resize(100,120);
//            $image->save('../../Uploads/Resized/'.$row['image']);

                ?>
                <tr>
                    <th scope="row"><?php echo $i + 1; ?></th>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $brand['name']; ?></td>
                    <td><?php echo $category['name']; ?></td>
                    <td><img src="../../Uploads/<?php echo $row['image']; ?>" alt="" width="100" height="120"
                             class="img-fluid img-thumbnail"></td>
                    <td class="align-middle">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                   href="../products/addProductDetails.php?id=<?php echo $row['id']; ?>"><span
                                            class="text-primary"><i class="fas fa-add"></i>Add Details</span></a>
                                <a class="dropdown-item"
                                   href="../products/editProductDetails.php?id=<?php echo $row['id']; ?>"><span
                                            class="text-info"><i class="fas fa-edit"></i>Edit Details</span></a>
                                <a class="dropdown-item"
                                   href="../products/viewProductDetails.php?id=<?php echo $row['id']; ?>"><span
                                            class="text-warning"><i class="fas fa-eye"></i>View Details</span></a>
                                <a class="dropdown-item"
                                   href="../products/update.php?id=<?php echo $row['id']; ?>"><span
                                            class="text-secondary"><i class="fas fa-edit"></i>Edit Product</span></a>
                                <a class="dropdown-item" href="../products/view.php?id=<?php echo $row['id']; ?>"><span
                                            class="text-success"><i class="fas fa-eye"></i>View Product</span></a>
                                <a class="dropdown-item" href="../products/delete.php?id=<?php echo $row['id']; ?>">
                                    <span class="text-danger"><i class="fas fa-trash"></i>Delete Product</span></a>
                            </div>
                        </div


                    </td>
                </tr>
                <!--close while-->
                <?php $i++;
            }
        } else {
            ?>
            <tr>
                <td colspan="4">No data</td>
            </tr>
        <?php } //end else
        ?>


        </tbody>
    </table>
</div>

