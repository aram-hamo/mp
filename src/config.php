<?php

define('installDir','');
define('rootURL',$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].installDir);

$forcessl=true;
$debug=true;

$views = array(
    '/'=>'welcome',
    '/upload'=>'upload',
    '/addnewartist'=>'newartist'
);
