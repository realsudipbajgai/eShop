<?php
session_start();

include_once '../../DatabaseController/DBController.php';


$obj = new Query();
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $_SESSION["isReset"]=false;
    $_SESSION["isFilter"]=true;
    $_SESSION["selectedBrand"]=$_POST["filterBrand"];
    $_SESSION["selectedCategory"]=$_POST["filterCategory"];
    $product="";
    if(!empty($_POST["filterCategory"])&&!empty($_POST["filterBrand"])){
        $conditionArr=array(
            'category'=>$_POST["filterCategory"],
            'brand'=>$_POST["filterBrand"]
        );
        $product=$obj->getData('product','*',$conditionArr);
    }
    else{
        //display all if none selected
        if(empty($_POST["filterCategory"])&&empty($_POST["filterBrand"])){

            $product=$obj->getData('product','*');
        }
        else if(!empty($_POST["filterBrand"])){

            $conditionArr=array(
                'brand'=>$_POST["filterBrand"]
            );
            $product=$obj->getData('product','*',$conditionArr);

        }

        else if(!empty($_POST["filterCategory"])){
            $conditionArr=array(
                'category'=>$_POST["filterCategory"]
            );
            $product=$obj->getData('product','*',$conditionArr);
        }
    }
    if(!empty($product)){
        $product=json_encode($product);
    }
    header('location:index.php?product='.$product);


}
?>


