<?php include_once '../../DatabaseController/DBController.php';?>
<?php
    $obj=new Query();
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];
        $product=$obj->getDatabyId('banner','*',$id);

    }
    ?>
<div class="container min-vh-100">
    <h2 class="my-2 py-2">View Banner</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="POST">
        <div class="form-group row">
            <label for="inputProductName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputProductName" placeholder="Enter banner name" value="<?php echo $product['name'];?>" disabled>
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

                <a href="index.php" class="btn btn-success">Go back</a>
            </div>
        </div>
    </form>
</div>
