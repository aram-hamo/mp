<?php include('includes/header.php'); ?>
<title>Upload</title>
<?php include('includes/navbar.php'); ?>
<?php
$auth = new auth;
if(!$auth->tokanCheck()){
  header("Location: /");
  exit();
}
?>
<form class="form-group" method="post" enctype="multipart/form-data">
  <input class="form-control" name="songs[]" multiple=multiple type="file">
  <input class="form-control btn btn-primary " name="submit" type="submit" value="upload">
</form>
<?php
if(isset($_POST['submit'])){
  $songsCount = count($_FILES['songs']['name']);
  $songs = count($_FILES['songs']['name']);
  for($i = 0;$i < $songsCount ;$i++){
    $fileName = bin2hex(openssl_random_pseudo_bytes(16));
    $file = file_get_contents($_FILES['songs']['tmp_name'][$i]);
    move_uploaded_file($_FILES['songs']['tmp_name'][$i], 'content/music/'.$fileName);

    $song = new music;
    $song->upload($fileName);
  }
}
?>
<?php include('includes/footer.php'); ?>
<!-- 
vim:fdm=marker
-->
