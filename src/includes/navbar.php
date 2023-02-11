<?php
$auth = new auth;
$userData = $auth->getUserDataByToken($_COOKIE['tokan']);
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">MP</a>

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
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
        <input class="btn " value="Logout" type="submit">
      </li>
    </ul>

  </div>
</nav>