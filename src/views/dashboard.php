<?php include('includes/header.php'); ?>
<title>MP - Dashboard</title>
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
