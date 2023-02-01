<?php include('includes/header.php'); ?>
<?php
$auth = new auth;
if($auth->tokanCheck()){
  header("Location: /");
  die();
}
?>
<form class="form-control" method="post">
  <input class="form-control" placeholder="Username" type="text" name="username">
  <input class="form-control" placeholder="Password" type="password" name="password">
  <input class="form-control btn btn-primary" type="submit" name="submit" Value="Login">
</form>
<?php
if(isset($_POST['submit'])){
  $auth->login($_POST['username'],$_POST['password']);
}
?>
<?php include('includes/footer.php'); ?>
