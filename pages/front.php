<?php
defined('FRONT') || die;

require_once DIR . 'db/connect.php';
require_once DIR . 'db/get_news_types.php';
require_once DIR . 'db/get_news.php';

$limit1 = 2;
$limit2 = 5; //default
$limit3 = 6;

$typeNewsArray = [];

if(isset($_GET['limit'])) {
    $limit = $_GET['limit'];
} else {
    $limit = $limit2;
}

if(isset($_GET['type'])) {
    $limitType = $_GET['type'];
}

foreach($news_types as $value) {
    $countLimit = 0; 
    $type = $value['id'];
    foreach($news as $post) {
        if($value['id'] == $post['type_id']) {
            $countLimit += 1;
            if(isset($limitType)) {
                if($limitType == $post['type_id'] && $countLimit > $limit) {
                    unset($limitType);
                    unset($limit);
                    break;
                }
            }
            $visible_at = strtotime($post['visible_at']);
            $currentTime = time();
            if($post['visible'] && $currentTime > $visible_at) {
                $typeNewsArray[$value['id']][] = $post;
            }
        }
    }
}

require_once DIR . 'pages/frontnews.php';
unset($limitType, $limit);