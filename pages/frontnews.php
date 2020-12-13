<?php
require_once DIR . 'pages/frontheader.php';
?>
    <div class="content">
        <h1>Naujienos</h1>
        <div class="content-container">
            <?php foreach($typeNewsArray as $key => $value):
                $type = $key;
                $count = 0; ?>
                <div class="news-type-section">
                    <div class="post-per-type-section">
                        <p>Rodyti:</p>
                        <a class="post-per-type" href="<?= $mainUrl . $additionallUrl ."?type=$type&limit=$limit1"?>"><?= $limit1 ?></a>
                        <a class="post-per-type" href="<?= $mainUrl . $additionallUrl ."?type=$type&limit=$limit2"?>"><?= $limit2 ?></a>
                        <a class="post-per-type" href="<?= $mainUrl . $additionallUrl ."?type=$type&limit=$limit3"?>"><?= $limit3 ?></a>
                    </div>
                    <h2 class="news-type"><?= $news_types[$key - 1]['title'] ?></h2>
                    <?php foreach($value as $post): ?>
                        <?php $count += 1; ?>
                        <div class="news-type-section-content">
                            <a href="<?= $mainUrl . $additionallUrl .'?p=show&id=' . $post['id']?>"><h3><?= $post['short'] ?></h3></a>
                            <div class="about">
                                <p class="description"><?= $post['full'] ?></p>
                                <p class="visible">Skelbimo data: <span><?= $post['updated_at'] ?></span></p>
                            </div>
                        </div>
                    <?php endforeach;
                    if($count == 0): ?>
                        <div class="about">
                            <p class="description">Atsiprašome, tačiau kolkas naujienų nėra.</p>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>