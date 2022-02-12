<?php session_start();?>
<?php include_once 'DatabaseController/DBController.php';?>
<?php
if($_SERVER["REQUEST_METHOD"]=="GET"&&isset($_SESSION['id'])){
    $product_id=$_GET["product_id"];
    $user_id=($_SESSION['id']);
    $obj=new Query();
    $conditionArr=array(
        'user_id'=>$user_id,
        'product_id'=>$product_id
    );
    if($obj->insertData('cart',$conditionArr)){
      header('location:cart.php');
    }


}


?>