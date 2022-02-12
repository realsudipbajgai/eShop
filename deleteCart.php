<?php session_start();?>
<?php include_once 'DatabaseController/DBController.php';?>
<?php
if(isset($_SESSION['id'])&&$_SERVER["REQUEST_METHOD"]=="GET"){

    $user_id=($_SESSION['id']);
    $obj=new Query();
    $conditionArr = array(
        'id'=>$_GET['id']
    );
    if($obj->deleteData('cart',$conditionArr)){
        header('location:cart.php');
    }
}
?>
