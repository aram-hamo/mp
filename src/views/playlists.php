<?php include('includes/header.php'); ?>
<title>Your Playlists</title>
<?php include('includes/navbar.php'); ?>
<?php
$auth = new auth;
$userID = $auth->getUserDataByToken($_COOKIE['tokan'])[0]['id'];
$music = new music;
if(!$auth->tokanCheck()){
  die();
}
if(!isset($_GET['id'])){
echo '<center><h1>Create Playlist</h1></center><form class="form form-control" method="post">
<input class=form-control placeholder="Playlist Name" name="title" >
<input class="form-control btn btn-primary" value="New Playlist" name=submit type="submit">
</form>';
  if(isset($_POST['submit'])){
    $music->createPlaylist($userID,$_POST['title']);
  }
  echo "<h2>Your Playlists</h2>";
  foreach($music->getPlaylist($userID) as $playlist){
    echo '<a href="'.rootURL.'/dashboard/playlists?id='.$playlist['p_id'].'">'.htmlspecialchars($playlist['title']).'</a><br>'."\n";
  }
}else{

}
?>
<?php include('includes/footer.php'); ?>
