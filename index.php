<?php session_start();?>
<?php
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
//include header file
include 'header.php'?>

<?php
//large banner
include 'Template/_largeBanner.php';
?>

<?php
//include best phones
include 'Template/_bestPhones.php';
//include best phones
include 'Template/_bestPricing.php';

?>



<?php
//include footer file
include 'footer.php';?>