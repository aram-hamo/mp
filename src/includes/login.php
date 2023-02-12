<form class="form-control" method="post">
  <input class="form-control" placeholder="Username" type="text" name="username">
  <input class="form-control" placeholder="Password" type="password" name="password">
  <input class="form-control btn btn-primary" type="submit" name="submit" Value="Login">
  <a href="/auth?register">Register</a>
</form>
<?php
if(isset($_POST['submit'])){
  $auth->login($_POST['username'],$_POST['password']);
}
