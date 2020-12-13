<?php

$news = [];
$sql = 'SELECT * FROM news';
$stmt = $pdo->query($sql);
while ($row = $stmt->fetch()) {
    $news[] = ['id' => $row['id'], 'short' => $row['short'], 'full' => $row['full'], 'visible' => $row['visible'], 'type_id' => $row['type_id'], 'created_at' => $row['created_at'], 'updated_at' => $row['updated_at'], 'visible_at' => $row['visible_at']];
}

usort($news, function($a, $b) {
    return strtotime($b['updated_at']) - strtotime($a['updated_at']);
});
// echo '<pre>';
// print_r($news);