<center><h1>Login</h1></center>
<form class="form-control form" method="post">
  <input class="form-control" placeholder="Username" type="text" name="username">
  <input class="form-control" placeholder="Password" type="password" name="password">
  <input name="csrf" value="<?=$_SESSION['CSRF']?>" hidden>
  <input class="form-control btn btn-primary" type="submit" name="submit" Value="Login">
  <a href="/auth?register">Register</a>
</form>
<?php
if(isset($_POST['submit']) && $_POST['csrf'] == CSRF_TOKEN){
  $auth->login($_POST['username'],$_POST['password']);
  if($auth->tokanCheck()){
    header("Location: /dashboard");
    exit();
  }
}
