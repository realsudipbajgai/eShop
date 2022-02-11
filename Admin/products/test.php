<?php include_once '../../DatabaseController/DBController.php';?>
<?php
$obj=new Query();
$conditionArr=array(
  'product.id'=>'22'
);
$result=$obj->getInnerData('product','product_details','*','id','product_id',$conditionArr);
if($result){
    foreach ($result as $row){
        echo $row["name"];

        echo "<br>";
        echo $row['description'];
        echo "<br>";
        echo "<br>";

    }
}
else{
    echo "no data";
}
?>