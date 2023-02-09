<?php include('includes/header.php'); ?>
<?php
$auth = new auth;
$userID = $auth->getUserDataByToken($_COOKIE['tokan'])[0]['id'];
$music = new music;
if(!$auth->tokanCheck()){
  die();
}
if(!isset($_GET['id'])){
echo '<form method="post">
<input name="title" >
<input name=submit type="submit">
</form>';
  if(isset($_POST['submit'])){
    $music->createPlaylist($userID,$_POST['title']);
  }
  foreach($music->getPlaylist($userID) as $playlist){
    echo '<a href="'.rootURL.'/playlists?id='.$playlist['p_id'].'">'.$playlist['title'].'</a><br>'."\n";
  }
}
?>
<?php include('includes/footer.php'); ?>
