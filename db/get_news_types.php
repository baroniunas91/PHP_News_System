<?php
$news_types = [];
$sql = 'SELECT * FROM news_type';
$stmt = $pdo->query($sql);
while ($row = $stmt->fetch()) {
    $news_types[] = ['id' => $row['id'], 'title' => $row['title']];
}