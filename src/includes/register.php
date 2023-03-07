<form class="form-control form" method="post">
  <center><h1>Register</h1></center>
  <div id=alert></div>
  <input class="form-control" placeholder="First Name" type="text" name="firstName" id=firstName>
  <input class="form-control" placeholder="Last Name" type="text" name="lastName" id=lastName>
  <input class="form-control" placeholder="Username" type="text" name="username" id=username>
  <input class="form-control" placeholder="Password" type="password" name="password" id=password>
  <input class="form-control" placeholder="E-Mail" type="email" name="email" id=email>
  <input name="csrf" value="<?=$_SESSION['CSRF']?>" hidden>
  <br><br>
  <input class="form-control btn btn-primary" type="submit" name="submit" Value="Create New Account" id=submit>
  <a href="/auth">Login</a>
</form>
<?php
if(!$registration){
  echo "<script src=static/disable-registration.js></script>";
}
if(isset($_POST['submit']) && $_POST['csrf'] == CSRF_TOKEN && $registration){
  if($auth->register($_POST['firstName'],$_POST['lastName'],$_POST['username'],$_POST['password'],$_POST['email'])){
    header("Location: /dashboard");
    exit();
  }
  if($auth->tokanCheck()){
    header("Location: /dashboard");
    exit();
  }
}
