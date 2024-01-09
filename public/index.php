<?php

$url = '';
if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

// Create a default CSS file variable
$cssFile = '';
$jsFile = '';

// Generate CSS file based on the requested page
switch ($url) {
    case '':
        $cssFile = 'home.css';
        $jsFile = 'home.js';
        include '../app/views/includes/header.php';
        include '../app/views/Home.php';
        break;
    case $url[0] == 'contact':
        $cssFile = 'contact.css';
        include '../app/views/includes/header.php';
        include '../app/views/Contact.php';
        break;
    case $url[0] == 'info':
        $cssFile = 'info.css';
        include '../app/views/includes/header.php';
        include '../app/views/Info.php';
        break;
    case $url[0] == 'skills':
        $cssFile = 'skills.css';
        $jsFile = 'skills.js';
        include '../app/views/includes/header.php';
        include '../app/views/Skills.php';
        break;
    case $url[0] == 'blog':
        $cssFile = 'blog.css';
        include '../app/views/includes/header.php';
        include '../app/views/Blog.php';
        break;
    case $url[0] == 'login':
        $cssFile = 'login.css';
        include '../app/views/includes/header.php';
        include '../app/views/Login.php';
        break;
    case $url[0] == 'submit-contact':
        include '../app/controllers/submit-contact.php';
        break;
    case $url[0] == 'login-handler':
        include '../app/controllers/login-handler.php';
        break;
    case $url[0] == 'submit-post':
        include '../app/controllers/submit-post.php';
        break;
    default:
        $cssFile = '404.css';
        include '../app/views/includes/header.php';
        include '../app/views/404.php';
        break;
}

?>