<?php include_once '../../DatabaseController/DBController.php';?>
<?php
$obj=new Query();
if ($_SERVER["REQUEST_METHOD"]=="POST") {
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

// Check file size
//    if ($_FILES["inputImage"]["size"] > 500000) {
//        echo "Sorry, your file is too large.";
//        $uploadOk = 0;
//    }



// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }




// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        $name=trim($_POST['name']);

        $conditionArr=array(
          'name'=>$name,
            'image'=>$_FILES["inputImage"]["name"] //lets not store directory in db so that it can be fetched easily later
        );
        if ($obj->insertData('banner',$conditionArr)){
            if (move_uploaded_file($_FILES["inputImage"]["tmp_name"], $target_file)){
                //resize resolution
                $image_name =  $target_file;
                $image = imagecreatefromjpeg($image_name);
                $imgResized = imagescale($image , 1888, 848);
                imagejpeg($imgResized, '../../Uploads/'.$_FILES["inputImage"]["name"]);

                header('location:../banner/index.php');
            }
        }
    }
}
?>
<div class="container min-vh-100">
    <h2 class="my-2 py-2">Add a new Banner</h2>
    <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="inputBannerName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control require" id="inputBannerName" placeholder="Enter banner name" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">

                <input type="file" name="inputImage" class="form-control-file" id="inputImage">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
