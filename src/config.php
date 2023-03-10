<?php

define('installDir','');
define('rootURL',$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].installDir);

$forcessl=true;
$debug=true;
$csrf=true;
$registration=true;

$views = array(
    '/'=>'welcome',
    '/dashboard/upload/'=>'upload',
    '/auth/'=>'auth',
    '/dashboard/playlists/'=>'playlists',
    '/dashboard/'=>'dashboard',
    '/dashboard/edit-metadata/'=>'edit-metadata',
    '/dashboard/allsongs/'=>'allsongs',
    '/dashboard/profile/'=>'profile',
    '/player/'=>'player',
    '/dashboard/playlist/'=>'playlist'
);
