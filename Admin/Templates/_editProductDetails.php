<?php include_once '../../DatabaseController/DBController.php'; ?>
<?php
$obj = new Query();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"]; //product table id
    $product = $obj->getInnerDatabyId('product', 'product_details', 'id','product_id',$id);
    if(empty($product)){
        header('location:addProductDetails.php?id='.$id); //product table id is passed
    }
    else{
        $brands = $obj->getData('brand', '*');
        $categories = $obj->getData('category', '*');
    }

} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $oldPrice = $newPrice = $description = $err_msg = "";

        if (!empty($_POST['oldPrice'])) {
            $oldPrice = trim($_POST['oldPrice']);
        }

        if (!empty($_POST['newPrice'])) {
            $newPrice = trim($_POST['newPrice']);
        }

        if (!empty($_POST['description'])) {
            $description = trim($_POST['description']);
        }
        $conditionArr = array(
            'product_id' => trim($_POST["product_id"]),
            'old_price' => $oldPrice,
            'new_price' => $newPrice,
            'description' => $description
        );
        if ($obj->updateData('product_details', $conditionArr,'id',$_POST["id"])) {
            header('location:index.php');
        } else {
            $err_msg = "Something wrong with the insertion";
            header('location:../../error.php?err_msg=' . $err_msg);
        }
    }
}

?>
<div class="container min-vh-100">
    <h2 class="my-2 py-2">Edit Product Details</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="POST">
        <div class="form-group row">
            <label for="inputProductName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputProductName"
                       placeholder="Enter product name" value="<?php echo $product['name']; ?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputCategory">Options</label>
                    </div>
                    <select name="category" class="custom-select" id="inputCategory" disabled>
                        <option value="">Choose...</option>
                        <?php
                        $i = 0;
                        while ($i < count($categories)) {
                            $row = $categories[$i];
                            ?>
                            <option
                                    value="<?php echo $row['id']; ?>"
                                <?php if ($row['id'] == $product['category']) {
                                    echo 'selected';
                                } ?>
                            >
                                <?php echo $row['name']; ?>
                            </option>
                            <?php $i++;
                        } //close while
                        ?>

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputBrand">Options</label>
                    </div>
                    <select name="brand" class="custom-select" id="inputBrand" disabled>
                        <option selected>Choose...</option>
                        <?php
                        $i = 0;
                        while ($i < count($brands)) {
                            $row = $brands[$i];
                            ?>
                            <option
                                    value="<?php echo $row['id']; ?>"
                                <?php if ($row['id'] == $product['brand']) {
                                    echo 'selected';
                                } ?>
                            >
                                <?php echo $row['name']; ?>
                            </option>
                            <?php $i++;
                        } //close while
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="oldImage" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <img src="../../Uploads/<?php echo $product['image']; ?>" height="350px">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputOldPrice" class="col-sm-2 col-form-label">Old Price</label>
            <div class="col-sm-10">
                <input type="text" name="oldPrice" class="form-control" id="inputOldPrice"
                       placeholder="Enter Old Price" value="<?php echo $product['old_price']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNewPrice" class="col-sm-2 col-form-label">New Price</label>
            <div class="col-sm-10">
                <input type="text" name="newPrice" class="form-control" id="inputNewPrice" placeholder="Enter New Price" value="<?php echo $product['new_price']?>"
                       required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" id="inputDescription" placeholder="Enter Description"
                          required> <?php echo $product['description'];?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" value="<?php echo $product['product_id']; ?>" name="product_id">
                <input type="hidden" value="<?php echo $product['id']; ?>" name="id">
                <button type="submit" class="btn btn-success">Update Details</button>
            </div>
        </div>
    </form>
</div>
