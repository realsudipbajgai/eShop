<?php
session_start();
$_SESSION["isReset"]=true;
$_SESSION["isFilter"]=false;

$_SESSION["selectedBrand"]="";
$_SESSION["selectedCategory"]="";
header('location:index.php');