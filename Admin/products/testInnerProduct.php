<?php include_once '../../DatabaseController/DBController.php';?>
<?php
$obj=new Query();

if(!empty($obj->getDatabyUniqueId('product_details','*','product_id',$_POST["id"]))){
echo "data exist";
}
else{
    echo "ready for insertion";
}
?>