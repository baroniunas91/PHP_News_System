<?php

if(isset($_POST['create'])) {
    if(isset($_POST['title'])) {
        if($_POST['title'] == '') {
            $_SESSION['wrong_title'] = true;
        }
        if($_POST['description'] == '') {
            $_SESSION['wrong_description'] = true;
        }
        if($_POST['visible'] != 0 && $_POST['visible'] != 1) {
            $_SESSION['wrong_visible'] = true;
        }
        if(!is_numeric($_POST['type_id'])) {
            $_SESSION['wrong_type_id'] = true;
        }
        if($_POST['visible_at'] == ''){
            $_SESSION['wrong_visible_at'] = true;
        }
        if(isset($_SESSION['wrong_title']) || isset($_SESSION['wrong_description']) || isset($_SESSION['wrong_visible']) || isset($_SESSION['wrong_type_id']) || isset($_SESSION['wrong_visible_at'])) {
            if(!$_SESSION['wrong_title']) {
                $_SESSION['old_title'] = $_POST['title'];
            }
            if(!$_SESSION['wrong_description']) {
                $_SESSION['old_description'] = $_POST['description'];
            }
            if(!$_SESSION['wrong_visible']) {
                $_SESSION['old_visible'] = $_POST['visible'];
            }
            if(!$_SESSION['wrong_visible_at']) {
                $_SESSION['old_visible_at'] = $_POST['visible_at'];
            }
            $_SESSION['old_type_id'] = $_POST['type_id'];
            header('Location: '. $mainUrl . $additionallUrl .'?p=create');
            die;
        } else {
            require_once DIR . 'db/connect.php';
            $short = $_POST['title'];
            $full = $_POST['description'];
            $visible = $_POST['visible'];
            $type_id = $_POST['type_id'];
            $created_at = date("Y/m/d H:i");
            $updated_at = date("Y/m/d H:i");
            $visible_at = $_POST['visible_at'];
            $sql = "INSERT INTO news (short, full, visible, type_id, created_at, updated_at, visible_at) 
            VALUES ('$short', '$full', '$visible', '$type_id', '$created_at', '$updated_at', '$visible_at')";
            $stmt = $pdo->query($sql);
            header('Location: '. $mainUrl . $additionallUrl .'?p=main');
            die;
        }
    }
} else {
    header('Location: '. $mainUrl . $additionallUrl .'?p=main');
    die;
}