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
            //for file
            $target_file="";
            $uploadOk="";
            $oldProduct=$obj->getDatabyId('product','*',$_POST['id']);

            $oldFile=$oldProduct["image"];
            //no changes on file
            if ($_FILES["inputImage"]['size']==0){
                $oldProduct=$obj->getDatabyId('product','*',$_POST['id']);
                $target_file=$oldFile;
            }
            //if new file is uploaded
            else {
                $target_dir = "../../Uploads/";
                $target_file = $target_dir . basename($_FILES["inputImage"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["inputImage"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

//                // Check file size
//                if ($_FILES["inputImage"]["size"] > 500000) {
//                    echo "Sorry, your file is too large.";
//                    $uploadOk = 0;
//                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                //check if file is uploaded
                if (move_uploaded_file($_FILES["inputImage"]["tmp_name"], $target_file)){
                    unlink($oldFile);
                }else{
                    $uploadOk=0;
                }

            }
            if($uploadOk!=0) {
                $conditionArr=array(
                        'name'=>$_POST['name'],
                        'brand'=>$_POST['brand'],
                        'category'=>$_POST['category'],
                        'image'=>$target_file
                );
               if($obj->updateData('product',$conditionArr,'id',$_POST['id'])){
                   header('Location:../products/index.php');
               }
            }
        }
    }
?>
<div class="container min-vh-100">
    <h2 class="my-2 py-2">Update Product</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="POST">
        <div class="form-group row">
            <label for="inputProductName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputProductName" placeholder="Enter product name" value="<?php echo $product['name'];?>">
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
                    <select name="brand" class="custom-select" id="inputBrand">
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
            <label for="inputImage" class="col-sm-2 col-form-label">New Image</label>
            <div class="col-sm-10">

                <input type="file" name="inputImage" class="form-control-file" id="inputImage">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" value="<?php echo $product['id'];?>" name="id">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
