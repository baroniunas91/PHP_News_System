<?php
if(isset($_POST['update'])) {
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
            if(!isset($_SESSION['wrong_title'])) {
                $_SESSION['old_title'] = $_POST['title'];
            }
            if(!isset($_SESSION['wrong_description'])) {
                $_SESSION['old_description'] = $_POST['description'];
            }
            if(!isset($_SESSION['wrong_visible'])) {
                $_SESSION['old_visible'] = $_POST['visible'];
            }
            if(!isset($_SESSION['wrong_visible_at'])) {
                $_SESSION['old_visible_at'] = $_POST['visible_at'];
            }
            $_SESSION['old_type_id'] = $_POST['type_id'];
            $id = $_POST['update'];
            header('Location: '. $mainUrl . $additionallUrl ."?p=edit&id=$id");
            die;
        } else {
            require_once DIR . 'db/connect.php';
            $id = $_POST['update'];
            $short = $_POST['title'];
            $full = $_POST['description'];
            $visible = $_POST['visible'];
            $type_id = $_POST['type_id'];
            $updated_at = date("Y/m/d H:i:s");
            $visible_at = $_POST['visible_at'];
            
            $sql = "UPDATE news SET short = '$short' WHERE id = '$id'";
            $stmt = $pdo->query($sql);

            $sql = "UPDATE news SET full = '$full' WHERE id = '$id'";
            $stmt = $pdo->query($sql);

            $sql = "UPDATE news SET visible = '$visible' WHERE id = '$id'";
            $stmt = $pdo->query($sql);

            $sql = "UPDATE news SET type_id = '$type_id' WHERE id = '$id'";
            $stmt = $pdo->query($sql);

            $sql = "UPDATE news SET updated_at = '$updated_at' WHERE id = '$id'";
            $stmt = $pdo->query($sql);

            $sql = "UPDATE news SET visible_at = '$visible_at' WHERE id = '$id'";
            $stmt = $pdo->query($sql);

            header('Location: '. $mainUrl . $additionallUrl .'?p=main');
            die;
        }
    }
} else {
    header('Location: '. $mainUrl . $additionallUrl .'?p=main');
    die;
}