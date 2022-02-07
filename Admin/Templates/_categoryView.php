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

?>
<div class="container vh-100">
    <h2 class="mt-4">Category Details</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <div class="form-group">

            <input type="text" class="form-control" name="name" id="admin-update-category" value="<?php echo $row['name']?>" disabled>

        </div>
        <a href="../categories/index.php" class="btn btn-success">Go Back</a>
    </form>
</div>
