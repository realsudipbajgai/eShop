<?php
require_once '../../DatabaseController/DBController.php';
$obj=new Query();

if ($_SERVER["REQUEST_METHOD"]=="GET"&&!empty(trim($_GET["id"]))){
    $id=trim($_GET["id"]);
    $conditionArr=array('id'=>$id);
    $result=$obj->getData('category','*',$conditionArr);
    if(count($result)>0){
        $row=current($result);
    }

}
else{
    if ($_SERVER["REQUEST_METHOD"]=="POST"&&!empty(trim($_POST["id"]))){
        $id=trim($_POST["id"]);
        $conditionArr=array('id'=>$id);
        if($obj->deleteData('category',$conditionArr)){
            header('location:../categories/index.php');
            exit();
        }

    }
    else{
        //if url for for $_GEt doesnt contain id
        header("location:../../error.php");
        exit();
    }

}
?>
<div class="container vh-100">
    <h2 class="mt-4">Delete Category</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <div class="form-group">

            <input type="text" class="form-control" name="name" id="admin-update-category" value="<?php echo $row['name']?>">

        </div>
        <input type="hidden" name="id" value="<?php echo $row["id"];?>">
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
