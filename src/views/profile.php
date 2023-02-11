<?php include('includes/header.php'); ?>
<?php
$auth = new auth;
if(!$auth->tokanCheck()){
  header("Location: /");
  die();
}
?>
<?php include('includes/navbar.php'); ?>
<?php
$userID = $auth->getUserDataByToken($_COOKIE['tokan'])[0]['id'];
$music = new music;
?>
<form method="post">
<br>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
  </div>
  <input value="<?=$userData[0]['username']?>" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
  </div>
  <input value="<?=$userData[0]['firstName']?>" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
  </div>
  <input value="<?=$userData[0]['lastName']?>" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">E-Mail</span>
  </div>
  <input value="<?=$userData[0]['email']?>" type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div>
<input class="btn btn-primary" type="submit" value="Update">
</form>
<?php include('includes/footer.php'); ?>
