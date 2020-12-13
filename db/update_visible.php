<?php
defined('FRONT') || die;
require_once DIR . 'db/connect.php';
require_once DIR . 'db/get_news.php';

$edit = [];
foreach($news as $val) {
    if($_GET['id'] == $val['id']) {
        $edit = $val;
        break;
    }
}
if(empty($edit)) {
    header('Location: '. $mainUrl . $additionallUrl .'?p=main');
    die;
}

if ($edit['visible']) {
    $edit['visible'] = 0;
} else {
    $edit['visible'] = 1;
}
$id = $edit['id'];
$visible = $edit['visible'];
$sql = "UPDATE news SET visible = '$visible' WHERE id = ?";
$pdo->prepare($sql)->execute([$id]);

header('Location: '. $mainUrl . $additionallUrl .'?p=main');
die;