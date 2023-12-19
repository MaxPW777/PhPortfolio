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
        include '../pages/includes/header.php';
        include '../pages/Home.php';
        break;
    case $url[0] == 'contact':
        $cssFile = 'contact.css';
        include '../includes/header.php';
        include '../pages/Contact.php';
        break;
    case $url[0] == 'info':
        $cssFile = 'info.css';
        include '../pages/includes/header.php';
        include '../pages/Info.php';
        break;
    case $url[0] == 'skills':
        $cssFile = 'skills.css';
        $jsFile = 'skills.js';
        include '../pages/includes/header.php';
        include '../pages/Skills.php';
        break;
    case $url[0] == 'blog':
        $cssFile = 'blog.css';
        include '../pages/includes/header.php';
        include '../pages/Blog.php';
        break;
    case $url[0] == 'login':
        $cssFile = 'login.css';
        include '../pages/includes/header.php';
        include '../pages/Login.php';
        break;
    case $url[0] == 'submit-contact':
        include '../handlers/submit-contact.php';
        break;
    default:
        $cssFile = '404.css';
        include '../pages/includes/header.php';
        include '../pages/404.php';
        break;
}

?>