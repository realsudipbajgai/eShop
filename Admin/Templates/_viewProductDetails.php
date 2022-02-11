<?php include_once '../../DatabaseController/DBController.php'; ?>
<?php
$obj = new Query();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    $product = $obj->getInnerDatabyId('product', 'product_details', 'id', 'product_id', $id);
    $brands = $obj->getData('brand', '*');
    $categories = $obj->getData('category', '*');
}

?>
<div class="container min-vh-100">
    <h2 class="my-2 py-2">View Product Details</h2>
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
                <input type="text" name="oldPrice" class="form-control" id="inputOldPrice" placeholder="Enter Old Price"
                       value="<?php
                        if(!empty($product['old_price']))
                            {echo $product['old_price'];}?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNewPrice" class="col-sm-2 col-form-label">New Price</label>
            <div class="col-sm-10">
                <input type="text" name="newPrice" class="form-control" id="inputNewPrice" placeholder="Enter new Price"
                       value="<?php
                       if(!empty($product['new_price']))
                       {echo $product['new_price'];}?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea  class="form-control" id="inputDescription" disabled>
                      <?php
                      if(!empty($product['description']))
                      {echo $product['description'];}?>
                </textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" value="<?php echo $product['id'];?>" name="id">
                <a href="index.php" class="btn btn-success">Go Back</a>
            </div>
        </div>
    </form>
</div>
