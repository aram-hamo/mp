<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
$auth = new auth;
if(!$auth->tokanCheck()){
  header("Location: /");
  die();
}
?>

<?php include('includes/footer.php'); ?>
<!-- 
vim:fdm=marker
-->
