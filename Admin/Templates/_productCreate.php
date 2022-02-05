<?php include_once '../../DatabaseController/DBController.php';?>
<?php
$obj=new Query();
$brands=$obj->getData('brand','*');
$categories=$obj->getData('category','*');
?>
<div class="container vh-100">
    <h2 class="my-2 py-2">Add a new Product</h2>
    <form>
        <div class="form-group row">
            <label for="inputProductName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputProductName" placeholder="Enter product name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputCategory">Options</label>
                    </div>
                    <select name="category" class="custom-select" id="inputCategory">
                        <option selected>Choose...</option>
                        <?php
                            $i=0;
                            while($i<count($categories)){
                                $row=$categories[$i];
                                ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                           <?php $i++; } //close while
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
                    <select name="brand" class="custom-select" id="inputBrand">
                        <option selected>Choose...</option>
                        <?php
                        $i=0;
                        while($i<count($brands)){
                            $row=$brands[$i];
                            ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                            <?php $i++; } //close while
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">

                <input type="file" class="form-control-file" id="inputImage">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
