<?php session_start();?>
<?php
if(isset($_SESSION["loggedin"])){
    if($_SESSION["email"]!=='admin@eshop.com'){
        header('location:index.php');
    }
}else{
    header('location:login.php');
}
?>
<?php include_once 'header.php'; ?>


<?php include_once 'Admin/Templates/_admin.php';?>

<?php include_once 'footer.php';?>
