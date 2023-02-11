<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
$auth = new auth;
$userID = $auth->getUserDataByToken($_COOKIE['tokan'])[0]['id'];
$music = new music;
if(!$auth->tokanCheck()){
  die();
}
if(isset($_GET['songID'])){
echo '
<form class="form-group" method="post" >
  <input class="form-control" name="title"      placeholder="Title" >
  <input class="form-control" name="artist"     placeholder="Artist" >
  <input class="form-control" name="album"     placeholder="Album" >
  <input class="form-control btn btn-primary " name="submit" type="submit" value="upload">
</form>
';
}else{
  header("Location: /");
}
?>
<?php include('includes/footer.php'); ?>
