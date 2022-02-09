<?php include_once '../../DatabaseController/DBController.php';?>
<?php
    $obj=new Query();
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];
        $product=$obj->getDatabyId('banner','*',$id);

    }
    else{
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $conditionArr=array(
                        'id'=>$_POST['id']

                );
            $product=$obj->getDatabyId('banner','*',$_POST['id']);
            $imageName=$product['image'];
            if(unlink("../../Uploads/".$imageName)){
               if($obj->deleteData('banner',$conditionArr)){

                   header('Location:../banner/index.php');
               }
            }
        }
    }

?>
<div class="container vh-100">
    <h2 class="my-2 py-2">Delete Banner</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="POST">
        <div class="form-group row">
            <label for="inputProductName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputProductName" placeholder="Enter product name" value="<?php echo $product['name'];?>" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="oldImage" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
              <img src="../../Uploads/<?php echo $product['image'];?>" height="350px">
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
