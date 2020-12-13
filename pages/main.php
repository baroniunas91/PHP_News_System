<?php
defined('FRONT') || die;

require_once DIR . 'db/connect.php';
require_once DIR . 'db/get_news_types.php';
require_once DIR . 'db/get_news.php';
require_once DIR . 'pages/header.php';

?>
    <div class="content">
        <h1>Naujienos</h1>
        <form class="create-form" action="" method="get">
            <button class="create-button" type="submit" name="createPost" value="1">Sukurti naujieną</button>
        </form>
        <div class="content-container">
            <?php foreach($news_types as $value): ?>
            <div class="news-type-section">
                <h2 class="news-type"><?= $value['title'] ?></h2>
                <?php foreach($news as $post): ?>
                    <?php if($value['id'] == $post['type_id']): ?>
                        <div class="news-type-section-content">
                            <a href="<?= $mainUrl . $additionallUrl .'?p=show&id=' . $post['id']?>"><h3><?= $post['short'] ?></h3></a>
                            <div class="about">
                                <p class="description"><?= $post['full'] ?></p>
                                <p class="visible">Skelbimas: <span><?php if($post['visible']) {echo 'Rodomas';} else echo 'Nerodomas'?></span></p>
                                <p class="visible">Skelbimas sukurtas: <span><?= $post['created_at'] ?></span></p>
                                <p class="visible">Skelbimas atnaujintas: <span><?= $post['updated_at'] ?></span></p>
                                <p class="visible">Skelbimas matomas nuo: <span><?= $post['visible_at'] ?></span></p>
                                <a class="edit" href="<?= $mainUrl . $additionallUrl .'?p=edit&id=' . $post['id']?>">Koreguoti</a>
                                <a class="edit" href="<?= $mainUrl . $additionallUrl .'?p=visible&id=' . $post['id']?>"><?php if($post['visible']) {echo 'Slėpti';} else echo 'Rodyti'?></a>
                                <form class="delete-form" action="<?= $mainUrl . $additionallUrl .'?p=delete&id=' . $post['id']?>" method="post">
                                    <button class="edit delete" type="submit" name="delete" value="<?= $post['id'] ?>">Trinti</button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>