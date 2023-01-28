<?php include('includes/header.php'); ?>
<?php
$auth = new auth;
if($auth->tokanCheck()){
  header("Location: /");
  die();
}
?>
<form method="post">
  <input placeholder="First Name" type="text" name="firstName">
  <input placeholder="Last Name" type="text" name="lastName">
  <input placeholder="Username" type="text" name="username">
  <input placeholder="Password" type="password" name="password">
  <input placeholder="E-Mail" type="email" name="email">
  <input type="submit" name="submit" Value="Create New Account">
</form>
<?php
if(isset($_POST['submit'])){
  $auth->register($_POST['firstName'],$_POST['lastName'],$_POST['username'],$_POST['password'],$_POST['email']);
}
?>
<?php include('includes/footer.php'); ?>
