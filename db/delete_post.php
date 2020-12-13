<?php
defined('FRONT') || die;
require_once DIR . 'db/connect.php';

if(isset($_POST['delete'])) {
    $delete = $_POST['delete'];
    $sql = "DELETE FROM news WHERE id = ?";
    $pdo->prepare($sql)->execute([$delete]);
    header('Location: '. $mainUrl . $additionallUrl .'?p=main');
    die;
} else {
    header('Location: '. $mainUrl . $additionallUrl .'?p=main');
    die;
}