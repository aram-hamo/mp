<?php include('includes/header.php'); ?>
<title id=title>Your Songs</title>
<?php include('includes/navbar.php'); ?>
<?php
$auth = new auth;
if(!$auth->tokanCheck()){
  header("Location: /");
  exit();
}
$music = new music;
$mysongs = $music->getAllSongs($userData[0]['id']);
echo '<pre id=songs hidden>';
print_r(json_encode($mysongs));
echo '</pre>';
?>
<style>
*{
  border:0px;
  padding:unset;
  list-style:none;
  margin:unset;
  text-decoration:unset;
}
.player{
  margin-top:3%;
  width:100%;
  height:100vh;
}
.pointer{
  cursor:pointer
}
.control{
  height:40px;
  width:40px;
  margin:20px;
}
#progressBar{
  width:40%;
}
#songsFrame{
  width: 100%;
  height: 50%;
  overflow: auto;
  text-align: justify;
  padding: 20px;
  border: 1px solid black;
}
#songsFrame > div{
  border-radius:5px;
  border: 1px solid black;
  margin:2%;
  padding:2%;
}
</style>
<div class=player>
<center>
  <img id=coverArt src="" alt=""><br>
  <a id=artist></a><br>
  <a id=songTitle></a><br>
  <a id=duration></a><br>
  <a id=currentTime></a><br>
  <audio id=song ></audio>
  <input id=progressBar type="range" min="1" max="1000" value=1 /><br>
  <img onclick="previous()" class="control pointer" src="/static/previous.png" alt="">
  <img onclick="playPause()" id="playPause" class="control pointer" src="/static/play.png" alt="">
  <img onclick="next()" class="control pointer" src="/static/next.png" alt="">
</center>
<div id=songsFrame>

</div>
</div>
<script src=/includes/player.js></script>
<?php include('includes/footer.php'); ?>
