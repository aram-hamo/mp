<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
$auth = new auth;
$userID = $auth->getUserDataByToken($_COOKIE['tokan'])[0]['id'];
$music = new music;
if(!$auth->tokanCheck()){
  die();
}
$song_metadata = $music->getSongById($_GET["songID"])[0];
if(isset($_GET['songID']) && $song_metadata['uploader_id'] == $userID){
echo '
<form class="form-group" method="post" >
  <input class="form-control" name="title"      placeholder="Title" value="'.$song_metadata['title'].'">
  <input class="form-control" name="artist"     placeholder="Artist" value="'.$song_metadata['artist'].'" >
  <input class="form-control" name="album"     placeholder="Album" value="'.$song_metadata['album'].'" >
  <input class="form-control btn btn-primary " name="submit" type="submit" value="upload">
</form>
';
if(isset($_POST['submit'])){
  $songID = $_GET['songID'];
  $music->changeMetadata($_POST['album'],$_POST['artist'],$_POST['title'],$song_metadata["sId"]);
  header("Location: /dashboard/upload");
}
}else{
  header("Location: /dashboard/");
}
?>
<?php include('includes/footer.php'); ?>
