<?php include_once '../../DatabaseController/DBController.php';?>
<?php
    $obj=new Query();
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];
        $product=$obj->getDatabyId('product','*',$id);
        $brands=$obj->getData('brand','*');
        $categories=$obj->getData('category','*');
    }
    else{
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $conditionArr=array(
                        'id'=>$_POST['id']

                );
            $product=$obj->getDatabyId('product','*',$_POST['id']);
            $imageName=$product['image'];
            if(unlink($imageName)){
               if($obj->deleteData('product',$conditionArr)){

                   header('Location:../products/index.php');
               }
            }
        }
    }

?>
<div class="container vh-100">
    <h2 class="my-2 py-2">Delete Product</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="POST">
        <div class="form-group row">
            <label for="inputProductName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputProductName" placeholder="Enter product name" value="<?php echo $product['name'];?>" disabled>
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
                        $i=0;
                        while($i<count($categories)){
                            $row=$categories[$i];
                            ?>
                            <option
                                    value="<?php echo $row['id'];?>"
                                <?php if ($row['id']==$product['category']){ echo 'selected';}?>
                            >
                                <?php echo $row['name'];?>
                            </option>
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
                    <select name="brand" class="custom-select" id="inputBrand" disabled>
                        <option selected>Choose...</option>
                        <?php
                        $i=0;
                        while($i<count($brands)){
                            $row=$brands[$i];
                            ?>
                            <option
                                    value="<?php echo $row['id'];?>"
                                <?php if ($row['id']==$product['brand']){ echo 'selected';}?>
                            >
                                <?php echo $row['name'];?>
                            </option>
                            <?php $i++; } //close while
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="oldImage" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
              <img src="<?php echo $product['image'];?>" height="350px">
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" value="<?php echo $product['id'];?>" name="id">
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </form>
</div>
