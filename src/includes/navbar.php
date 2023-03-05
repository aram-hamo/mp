<?php
$auth = new auth;
$userData = $auth->getUserDataByToken($_COOKIE['tokan']);
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/dashboard">MP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/playlists">Playlists</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/upload">Upload</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/allsongs">My Songs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/profile"><?=$userData[0]['firstName'],' ',$userData[0]['lastName'],'( '.$userData[0]['username'].' )' ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
if(isset($_POST['logout'])){
  setcookie('tokan',false);
  header("Location: /");
}
?>
