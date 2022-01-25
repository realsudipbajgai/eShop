<?php
require_once 'DatabaseController/DBController.php';
$obj=new Query();
$result=$obj->getDatabyId('employee','*',13);