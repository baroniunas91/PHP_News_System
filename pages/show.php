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

if($_SESSION['login'] ?? 0) {
    if(empty($edit)) {
        header('Location: '. $mainUrl . $additionallUrl .'?p=main');
        die;
    }

    require __DIR__ . '/header.php';
    ?>
        <div class="content">
            <h1><?= $edit['short'] ?></h1>
            <div class="content-container">
                <div class="news-type-section">
                    <div class="news-type-section-content">
                        <h3><?= $edit['short'] ?></h3>
                        <div class="about">
                            <p class="description"><?= $edit['full'] ?></p>
                            <p class="visible">Skelbimas: <span><?php if($edit['visible']) {echo 'Rodomas';} else echo 'Nerodomas'?></span></p>
                            <p class="visible">Skelbimas sukurtas: <span><?= $edit['created_at']?></span></p>
                            <p class="visible">Skelbimas atnaujintas: <span><?= $edit['updated_at']?></span></p>
                            <p class="visible">Skelbimas matomas nuo: <span><?= $edit['visible_at']?></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <form class="back-button" action="" method="get">
                <button class="create-button" type="submit" name="createPostBack" value="1">Grįžti į naujienas</button>
            </form>
        </div>
    </body>
    </html>
<?php
} else {
    if(empty($edit)) {
        header('Location: '. $mainUrl . $additionallUrl);
        die;
    }
    require __DIR__ . '/frontheader.php';
    ?>
        <div class="content">
            <h1><?= $edit['short'] ?></h1>
            <div class="content-container">
                <div class="news-type-section">
                    <div class="news-type-section-content">
                        <h3><?= $edit['short'] ?></h3>
                        <div class="about">
                            <p class="description"><?= $edit['full'] ?></p>
                            <p class="visible">Skelbimas sukurtas: <span><?= $edit['created_at']?></span></p>
                            <p class="visible">Skelbimas atnaujintas: <span><?= $edit['updated_at']?></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <form class="back-button" action="" method="get">
                <button class="create-button" type="submit" name="createPostBack" value="1">Grįžti į naujienas</button>
            </form>
        </div>
    </body>
    </html>
<?php
}