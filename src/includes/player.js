var currentSongId;
songs = document.getElementById("songs").innerText;
mysongs = JSON.parse(songs);
function updateUI(){
  document.getElementById("title").innerText = mysongs[currentSongId]['title'];
  document.getElementById("artist").innerText = mysongs[currentSongId]['artist'];
  document.getElementById("coverArt").src = '/content/music/'+mysongs[currentSongId]['fileName']+'.png';
  document.getElementById("songTitle").innerHTML = mysongs[currentSongId]['title'];


  min = song.duration/60;
  sec = song.duration%60;
  cTmin = song.currentTime/60;
  cTsec = song.currentTime%60;
  song = document.getElementById("song");
  document.getElementById("currentTime").innerText = cTmin.toFixed(0)+":"+cTsec.toFixed(0);
  document.getElementById("progressBar").value = (song.duration/1000)*song.currentTime*10;
  document.getElementById("duration").innerText = min.toFixed(0)+":"+sec.toFixed(0) ;


  document.getElementById(mysongs[currentSongId-1]['fileName']).style.color =  "";
  document.getElementById(mysongs[currentSongId+1]['fileName']).style.color =  "";
  document.getElementById(mysongs[currentSongId]['fileName']).style.color =  "red";
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
function playThis(arId){
  song = document.getElementById("song");
  song.src = '/content/music/' + mysongs[arId]['fileName'];
  playPause();
  currentSongId = arId;
  updateUI();
}
const songsFrame = document.getElementById("songsFrame");
for(var i = 0;i<mysongs.length ; i++){
  songsFrame.innerHTML += '<div class=pointer onclick=playThis('+i+') id="'+mysongs[i]["fileName"]+'"></div>';
  songID = document.getElementById(mysongs[i]["fileName"]);
  songID.innerHTML += "<div>"+mysongs[i]["title"]+"</div>";
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
