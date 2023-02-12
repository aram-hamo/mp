<?php include('includes/header.php'); ?>
<?php
$auth = new auth;
if($auth->tokanCheck()){
  header("Location: /");
  exit();
}
if(isset($_GET['register'])){
  include('includes/register.php');
}else{
  include('includes/login.php');
}
?>
<?php include('includes/footer.php'); ?>
