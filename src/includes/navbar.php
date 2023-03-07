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
          <a class="nav-link" href="/dashboard/profile"><?= htmlspecialchars($userData[0]['firstName']),' ',htmlspecialchars($userData[0]['lastName']),'( '.htmlspecialchars($userData[0]['username']).' )' ?></a>
        </li>
        <li class="nav-item">
          <form method=post>
            <input name="csrf" value="<?=$_SESSION['CSRF']?>" hidden>
            <input  value="Logout" name="logout" type="submit" class="btn my-2 my-sm-0">
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
if(isset($_POST['logout']) && $_POST['csrf'] == CSRF_TOKEN){
  setcookie('tokan', '', time()-1000, '/');
  header("Location: /");
}
?>
