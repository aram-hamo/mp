var currentSongId;
songs = document.getElementById("songs").innerText;
mysongs = JSON.parse(songs);
function updateUI(){
  document.getElementById("title").innerText = mysongs[currentSongId]['title'];
  document.getElementById("artist").innerText = mysongs[currentSongId]['artist'];
}
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
  updateUI();
}
function next(){
  song = document.getElementById("song");
  song.src = '/content/music/' + mysongs[currentSongId+1]['fileName'];
  currentSongId = currentSongId+1;
  document.getElementById("playPause").src = "/static/pause.png";
  song.play();
  updateUI();
}
function playPause(){
  song = document.getElementById("song");
  if(song.paused){
    document.getElementById("playPause").src = "/static/pause.png";
    song.play();
    updateUI();
  }else{
    document.getElementById("playPause").src = "/static/play.png";
    song.pause();
  }
}
function playThis(songId){
  song = document.getElementById("song");
  song.src = '/content/music/' + songId;
  playPause();
  updateUI();
}
min = song.duration/60;
sec = song.duration%60;
console.log(min.toFixed(0)+":"+sec.toFixed(0));

cTmin = song.currentTime/60;
cTsec = song.currentTime%60;

console.log(cTmin.toFixed(0)+":"+cTsec.toFixed(0));
const songsFrame = document.getElementById("songsFrame");
for(var i = 0;i<mysongs.length ; i++){
  songsFrame.innerHTML += '<div onclick=playThis("'+mysongs[i]["fileName"]+'") id="'+mysongs[i]["fileName"]+'"></div>';
  songID = document.getElementById(mysongs[i]["fileName"]);
  songID.innerHTML += "<div> Title: "+mysongs[i]["title"]+"</div>";
}

// event listener for keyboard shortcuts
document.addEventListener('keydown', function(event) {
if(event.keyCode == 32) {
  playPause();
}else if(event.keyCode == 40) {
  musicVolume = song.volume;
  song.volume = musicVolume - 0.05
}else if(event.keyCode == 38){
  musicVolume = song.volume;
  song.volume = musicVolume + 0.05
}else if(event.keyCode == 78){
  next();
}else if(event.keyCode == 80){
  previous();
}
});
