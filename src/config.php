<?php

define('installDir','');
define('rootURL',$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].installDir);

$forcessl=true;
$debug=true;

$views = array(
    '/'=>'welcome',
    '/upload'=>'upload',
    '/addnewartist'=>'newartist',
    '/login'=>'login',
    '/register'=>'register',
    '/playlists'=>'playlists',
    '/dashboard'=>'dashboard',
    '/edit-metadata'=>'edit-metadata',
    '/player'=>'player'
);
