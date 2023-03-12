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
  document.getElementById("volumeBar").value = song.volume*100;

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
  songsFrame.innerHTML += '<div class=pointer onclick=playThis('+i+') id="'+escapeHtml(mysongs[i]["fileName"])+'"></div>';
  songID = document.getElementById(mysongs[i]["fileName"]);
  songID.innerHTML += "<div>"+escapeHtml(mysongs[i]["title"])+"</div>";
  songID.innerHTML += "<a class=btn href=edit-metadata?songID="+escapeHtml(mysongs[i]["fileName"])+">Edit</a>";
  songID.innerHTML += '<a class="btn btn" onclick=downloadThis("/content/music/'+escapeHtml(mysongs[i]["fileName"])+'")>Download</a>';
}
function goTo(){
  progressBar = document.getElementById("progressBar").value;
  song.currentTime = progressBar * (song.duration*0.001);
}
function changeVolumeLogo(){
  if(song.volume*100 > 50){
    document.getElementById("volume").src = "/static/volume-up.png";
  }else if(song.volume == 0){
    document.getElementById("volume").src = "/static/mute.png";
  }else if(song.volume*100 < 50){
    document.getElementById("volume").src = "/static/volume-down.png";
  }
}
function changeVolume(){
  volumeBar = document.getElementById("volumeBar").value;
  song.volume = volumeBar/100;
  changeVolumeLogo();
}
// event listener for keyboard shortcuts
document.addEventListener('keydown', function(event) {

switch(event.keyCode){
  case 32:
    playPause();
    break;
  case 35:
    song.currentTime = song.duration;
    break;
  case 37:
    song.currentTime = song.currentTime-5;
    break;
  case 38:
    musicVolume = song.volume;
    song.volume = musicVolume + 0.05;
    document.getElementById("volumeBar").value = song.volume*100;
    changeVolumeLogo();
    break;
  case 39:
    song.currentTime = song.currentTime+5;
    changeVolumeLogo();
    break;
  case 40:
    musicVolume = song.volume;
    song.volume = musicVolume - 0.05;
    if(song.volume < 0.06 ){song.volume = 0;}
    document.getElementById("volumeBar").value = song.volume*100;
    changeVolumeLogo();
    break;
  case 78:
    next();
    break;
  case 80:
    previous();
    break;
  case 48:
    song.currentTime = 0;
    break;
  case 49:
    song.currentTime = song.duration*0.1;
    break;
  case 50:
    song.currentTime = song.duration*0.2;
    break;
  case 51:
    song.currentTime = song.duration*0.3;
    break;
  case 52:
    song.currentTime = song.duration*0.4;
    break;
  case 53:
    song.currentTime = song.duration*0.5;
    break;
  case 54:
    song.currentTime = song.duration*0.6;
    break;
  case 55:
    song.currentTime = song.duration*0.7;
    break;
  case 56:
    song.currentTime = song.duration*0.8;
    break;
  case 57:
    song.currentTime = song.duration*0.9;
    break;
}

});
