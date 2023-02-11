<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
$auth = new auth;
if(!$auth->tokanCheck()){
  header("Location: /");
  die();
}
?>
<!-- {{{ -->
<style>
</style>
<!-- }}} -->

<form class="form-group" method="post" enctype="multipart/form-data">
  <input class="form-control" name="file" type="file">
  <input class="form-control btn btn-primary " name="submit" type="submit" value="upload">
</form>
<?php
if(isset($_POST['submit'])){
  $fileName = bin2hex(openssl_random_pseudo_bytes(16));
  $file = file_get_contents($_FILES['file']['tmp_name']);
  move_uploaded_file($_FILES['file']['tmp_name'], 'content/music/'.$fileName);

  $song = new music;
  $song->upload($fileName);
  header("Location: /edit-metadata?songID=$fileName");
  print_r($_POST);
}
?>
<?php include('includes/footer.php'); ?>
<!-- 
vim:fdm=marker
-->
