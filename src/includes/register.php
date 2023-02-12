<form class="form-control" method="post">
  <input class="form-control" placeholder="First Name" type="text" name="firstName">
  <input class="form-control" placeholder="Last Name" type="text" name="lastName">
  <input class="form-control" placeholder="Username" type="text" name="username">
  <input class="form-control" placeholder="Password" type="password" name="password">
  <input class="form-control" placeholder="E-Mail" type="email" name="email">
  <input class="form-control btn btn-primary" type="submit" name="submit" Value="Create New Account">
  <a href="/auth">Login</a>
</form>
<?php
if(isset($_POST['submit'])){
  $auth->register($_POST['firstName'],$_POST['lastName'],$_POST['username'],$_POST['password'],$_POST['email']);
}
