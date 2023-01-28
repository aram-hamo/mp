<?php include('includes/header.php'); ?>
<?php
$auth = new auth;
if($auth->tokanCheck()){
  header("Location: /");
  die();
}
?>
<form method="post">
  <input placeholder="Username" type="text" name="username">
  <input placeholder="Password" type="password" name="password">
  <input type="submit" name="submit" Value="Login">
</form>
<?php
if(isset($_POST['submit'])){
  $auth->login($_POST['username'],$_POST['password']);
}
?>
<?php include('includes/footer.php'); ?>
