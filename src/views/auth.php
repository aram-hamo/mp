<?php include('includes/header.php'); ?>
<?php
$auth = new auth;
if($auth->tokanCheck()){
  header("Location: /dashboard");
  exit();
}
if(isset($_GET['register'])){
  include('includes/register.php');
}else{
  include('includes/login.php');
}
if($auth->tokanCheck()){
  header("Location: /dashboard");
  exit();
}
?>
<?php include('includes/footer.php'); ?>
