<?php

$url = '';
if(isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}
switch($url) {
    case '' || !empty($url[0]) == 'info':
        require '../src/pages/Home.php';
        break;
    case $url[0] == 'contact':
        require '../src/pages/Contact.php';
        break;
    case $url[0] == 'blog':
        require '../src/pages/Blog.php';
        break;
    case $url[0] == '':
        require '../src/pages/Login.php';
        break;
    default:
        require '../src/pages/404.php';
        break;
}
