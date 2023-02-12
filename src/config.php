<?php

define('installDir','');
define('rootURL',$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].installDir);

$forcessl=true;
$debug=true;
$csrf=true;

$views = array(
    '/'=>'welcome',
    '/dashboard/upload/'=>'upload',
    '/addnewartist/'=>'newartist',
    '/login/'=>'login',
    '/register/'=>'register',
    '/dashboard/playlists/'=>'playlists',
    '/dashboard/'=>'dashboard',
    '/dashboard/edit-metadata/'=>'edit-metadata',
    '/dashboard/allsongs/'=>'allsongs',
    '/dashboard/profile/'=>'profile',
    '/player/'=>'player'
);
