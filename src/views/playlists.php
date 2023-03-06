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
<input name="csrf" value="'.$_SESSION['CSRF'].'" hidden>
<input class="form-control btn btn-primary" value="New Playlist" name=submit type="submit">
</form>';
  if(isset($_POST['submit'])&& $_POST['csrf'] == CSRF_TOKEN){
    $music->createPlaylist($userID,$_POST['title']);
  }

  echo "<br><center><h2>Your Playlists</h2></center>";
  echo '<div id="playlistsInJson" hidden>';
  print_r(json_encode($music->getPlaylist($userID)));
  echo '</div><div id=playlists></div>';

}

?>
<script>
function redirect(url){
  window.location.href = "?id="+url;
}
data = JSON.parse(document.getElementById('playlistsInJson').innerText);
playlists = document.getElementById('playlists');

for(var i = 0;i<data.length ; i++){
  playlists.innerHTML += '<div onclick=redirect("'+data[i]["p_id"]+'"); class=playlist>'+data[i]["title"]+'</div>';
}
</script>
<?php include('includes/footer.php'); ?>
