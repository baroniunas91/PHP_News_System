<?php
session_start();
date_default_timezone_set('Europe/Vilnius');
$mainUrl = 'http://localhost';
$additionallUrl = '/news_system/';

$_SESSION['mainUrl'] = $mainUrl;
$_SESSION['additionallUrl'] = $additionallUrl;
define('FRONT', true);
define('DIR', __DIR__ . '/');

if(!($_SESSION['login'] ?? 0)) {
    if(isset($_GET['admin'])) {
        require DIR . 'pages/login.php';
    }
    if(isset($_GET['p'])) {
        if('show' == $_GET['p']) {
            require DIR.'pages/show.php';
            die;
        }
    }
    if(isset($_GET['createPostBack'])) {
        if('1' == $_GET['createPostBack']) {
            header('Location: '. $mainUrl . $additionallUrl);
            die;
        }
    }
    else {
        require DIR . 'pages/front.php';
    }
}
else if(isset($_GET['p'])) {
    if('create' == $_GET['p']) {
        require DIR.'pages/create.php';
    }
    if('store' == $_GET['p']) {
        require DIR.'db/create_post.php';
    }
    if('edit' == $_GET['p']) {
        require DIR.'pages/edit.php';
    }
    if('update' == $_GET['p']) {
        require DIR.'db/update_post.php';
    }
    if('visible' == $_GET['p']) {
        require DIR.'db/update_visible.php';
    }
    if('show' == $_GET['p']) {
        require DIR.'pages/show.php';
    }
    if('delete' == $_GET['p']) {
        require DIR.'db/delete_post.php';
    }
    if('main' == $_GET['p']) {
        require DIR . 'pages/main.php';
    }
} else {
    if(!isset($_GET['p']) && !isset($_GET['logout']) && !isset($_GET['createPost']) && !isset($_GET['createPostBack'])) {
        if($_SESSION['login'] ?? 0) {
            header('Location: '. $mainUrl . $additionallUrl . '?p=main');
            die;
        } else if(!$_SESSION['login'] ?? 0) {
            header('Location: '. $mainUrl . $additionallUrl);
            die;
        }
    }
}


if(isset($_GET['logout'])) {
    session_destroy();
    header('Location: '. $mainUrl . $additionallUrl);
    die;
}
if(isset($_GET['createPost'])) {
    header('Location: '. $mainUrl . $additionallUrl .'?p=create');
    die;
}
if(isset($_GET['createPostBack'])) {
    if($_SESSION['login'] ?? 0) {
        header('Location: '. $mainUrl . $additionallUrl .'?p=main');
        die;
    }
}
