<?php include_once '../../DatabaseController/DBController.php';?>
<?php
$obj=new Query();
$result=$obj->getDatabyUniqueIdFetchAll('product_details','*','product_id','20');
