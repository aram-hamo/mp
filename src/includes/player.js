var currentSongId;
songs = document.getElementById("songs").innerText;
mysongs = JSON.parse(songs);
if(song.src == ""){
  song.src = '/content/music/' + mysongs[0]['fileName'];
  currentSongId = 0;
}
function previous(){
  song = document.getElementById("song");
  song.src = '/content/music/' + mysongs[currentSongId-1]['fileName'];
  currentSongId = currentSongId-1;
  document.getElementById("playPause").src = "/static/pause.png";
  song.play();
}
function next(){
  song = document.getElementById("song");
  song.src = '/content/music/' + mysongs[currentSongId+1]['fileName'];
  currentSongId = currentSongId+1;
  document.getElementById("playPause").src = "/static/pause.png";
  song.play();
}
function playPause(){
  song = document.getElementById("song");
  if(song.paused){
    document.getElementById("playPause").src = "/static/pause.png";
    song.play();
  }else{
    document.getElementById("playPause").src = "/static/play.png";
    song.pause();
  }
}
