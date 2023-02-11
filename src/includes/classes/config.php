<?php

class config{
  function forcessl(){

    if (empty($_SERVER["HTTPS"])) {
      header("HTTP/1.1 301 Moved Permanently");
      header("Location: "."https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] );
      exit;
    }
  }

  function debug(){
    ini_set("display_errors","On");
    ini_set("display_startup_errors","On");
    ini_set("log_errors","On");
  }

  function csrf(){
    session_start(['cookie_secure' => true,'cookie_httponly' => true]);
    if(empty($_SESSION['CSRF'])){
      $_SESSION['CSRF'] = bin2hex(random_bytes(16));
    }
    $CSRF_TOKEN = $_SESSION['CSRF'];
  }
}
