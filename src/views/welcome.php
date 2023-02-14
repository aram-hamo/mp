<?php include('includes/header.php'); ?>
<?php
$auth = new auth;
if(!$auth->tokanCheck()){
  header("Location: /auth");
  die();
}else{
  header("Location: /dashboard");
}
?>
<title>MP</title>
<?php include('includes/footer.php'); ?>
