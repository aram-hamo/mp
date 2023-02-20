var currentSongId;
songs = document.getElementById("songs").innerText;
mysongs = JSON.parse(songs);

function updateProgressBar (){
  document.getElementById("progressBar").value = song.currentTime/(song.duration*0.01)*10;
  cTmin = song.currentTime/60;
  cTsec = song.currentTime%60;
  min = song.duration/60;
  sec = song.duration%60;
  song = document.getElementById("song");
  document.getElementById("currentTime").innerText = parseInt(cTmin)+":"+cTsec.toFixed(0);
  document.getElementById("duration").innerText = min.toFixed(0)+":"+sec.toFixed(0) ;
}
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
  document.getElementById("currentTime").innerText = parseInt(cTmin)+":"+cTsec.toFixed(0);

  document.getElementById("duration").innerText = min.toFixed(0)+":"+sec.toFixed(0) ;

if(currentSongId in mysongs){
  document.getElementById(mysongs[0]['fileName']).style =  "";
  document.getElementById(mysongs[mysongs.length-1]['fileName']).style =  "";
  document.getElementById(mysongs[currentSongId]['fileName']).style =  "background-color: #E8E8E7;";
}
if(currentSongId-1 in mysongs){
  document.getElementById(mysongs[currentSongId-1]['fileName']).style =  "";
}
if(currentSongId+1 in mysongs){
  document.getElementById(mysongs[currentSongId+1]['fileName']).style =  "";
}
}
if(song.src == ""){
  song.src = '/content/music/' + mysongs[0]['fileName'];
  currentSongId = 0;
}
function previous(){
  song = document.getElementById("song");
  song.pause();
  if(currentSongId-1 in mysongs){
    song.src = '/content/music/' + mysongs[currentSongId-1]['fileName'];
    currentSongId = currentSongId-1;
  }else{
    length = mysongs.length-1;
    song.src = '/content/music/' + mysongs[length]['fileName'];
    currentSongId = length;
  }
  document.getElementById("playPause").src = "/static/pause.png";
  song.play();
  updateUI();
  window.location.href = "#"+mysongs[currentSongId]['fileName'];
}
function next(){
  song = document.getElementById("song");
  song.pause();
  if(currentSongId+1 in mysongs){
    song.src = '/content/music/' + mysongs[currentSongId+1]['fileName'];
    currentSongId = currentSongId+1;
  }else{
    song.src = '/content/music/' + mysongs[0]['fileName'];
    currentSongId = 0;
  }
  document.getElementById("playPause").src = "/static/pause.png";
  song.play();
  updateUI();
  window.location.href = "#"+mysongs[currentSongId]['fileName'];
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
  window.location.href = "#"+mysongs[currentSongId]['fileName'];
}
const songsFrame = document.getElementById("songsFrame");
for(var i = 0;i<mysongs.length ; i++){
  songsFrame.innerHTML += '<div class=pointer onclick=playThis('+i+') id="'+mysongs[i]["fileName"]+'"></div>';
  songID = document.getElementById(mysongs[i]["fileName"]);
  songID.innerHTML += "<div>"+mysongs[i]["title"]+"</div>";
  songID.innerHTML += "<a class=btn href=edit-metadata?songID="+mysongs[i]["fileName"]+">Edit</a>";
  songID.innerHTML += '<a class="btn btn" onclick=downloadThis("/content/music/'+mysongs[i]["fileName"]+'")>Download</a>';
}
function goTo(){
  progressBar = document.getElementById("progressBar").value;
  song.currentTime = progressBar * (song.duration*0.001);
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