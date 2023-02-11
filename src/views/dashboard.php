<?php include('includes/header.php'); ?>
<?php
$auth = new auth;
if(!$auth->tokanCheck()){
  header("Location: /");
  die();
}
?>
<?php include('includes/navbar.php'); ?>
<?php
$music = new music;
?>
<?php include('includes/footer.php'); ?>
