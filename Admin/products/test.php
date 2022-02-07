<?php include_once '../../DatabaseController/DBController.php';?>
<?php
$obj=new Query();
$target_file="";
$uploadOk="";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    //for file
    //no changes on file
    if ($_FILES["inputImage"]['size']==0){
        $oldProduct=$obj->getDatabyId('product','*',$_POST['id']);
        $target_file=$oldProduct["image"];
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

// Check file size
        if ($_FILES["inputImage"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }


    }
    if($uploadOk!=0) {
        echo $target_file;
        echo "<br>";
        echo $_POST['id'];
        echo "<br>";
        echo $_POST['name'];
        echo "<br>";
        echo $_POST['brand'];
        echo "<br>";
        echo $_POST['category'];
    }
}
?>