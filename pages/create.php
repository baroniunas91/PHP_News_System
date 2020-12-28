<?php
defined('FRONT') || die;
require_once DIR . 'db/connect.php';
require_once DIR . 'db/get_news_types.php';
require_once DIR . 'pages/header.php';
?>
    <div class="content">
        <h1>Sukurti naujieną</h1>
        <form class="newAccount" action="<?= $mainUrl . $additionallUrl . '?p=store'?>" method="post">
            <div class="input">
                <label>Pavadinimas:*</label>
                <input type="text" name="title" placeholder="Įrašyti pavadinimą" value="<?php if(isset($_SESSION['old_title'])) echo $_SESSION['old_title']?>">
                <?php if(isset($_SESSION['old_title'])) unset($_SESSION['old_title']);?>
                <?php
                if(isset($_SESSION['wrong_title'])) : ?>
                <h3 class="addWrong">Pavadinimas neturi būti tuščias</h3>
                <?php 
                unset($_SESSION['wrong_title']);
                endif; ?>
            </div>
            <div class="input">
                <label>Aprašymas:*</label>
                <textarea id="editor1" name="description" cols="10" rows="10" placeholder="Įrašyti aprašymą"><?php if(isset($_SESSION['old_description'])) echo $_SESSION['old_description']?></textarea>
                <?php if(isset($_SESSION['old_description'])) unset($_SESSION['old_description']);?>
                <?php
                if(isset($_SESSION['wrong_description'])) : ?>
                <h3 class="addWrong">Aprašymas neturi būti tuščias</h3>
                <?php 
                unset($_SESSION['wrong_description']);
                endif; ?>
            </div>
            <div class="input">
                <label>Matomas:*</label>
                <select name="visible">
                    <option value="1" <?php if(isset($_SESSION['old_visible']) && $_SESSION['old_visible'] == 1) echo 'selected'?>>Taip</option>
                    <option value="0" <?php if(isset($_SESSION['old_visible']) && $_SESSION['old_visible'] == 0) echo 'selected'?>>Ne</option>
                </select>
                <?php if(isset($_SESSION['old_visible'])) unset($_SESSION['old_visible']);?>
                <?php
                if(isset($_SESSION['wrong_visible'])) : ?>
                <h3 class="addWrong">Nevalidus matomumas</h3>
                <?php 
                unset($_SESSION['wrong_visible']);
                endif; ?>
            </div>
            <div class="input">
                <label>Matomas nuo:*</label>
                <input type="text" id="datetime" name="visible_at" value="<?php if(isset($_SESSION['old_visible_at'])) echo $_SESSION['old_visible_at']?>" placeholder="Pasirinkti nuo kada matomas">
                <?php if(isset($_SESSION['old_visible_at'])) unset($_SESSION['old_visible_at']);?>
                <?php
                if(isset($_SESSION['wrong_visible_at'])) : ?>
                <h3 class="addWrong">Nevalidi matomumo data</h3>
                <?php 
                unset($_SESSION['wrong_visible_at']);
                endif; ?>
            </div>
            <div class="input">
                <label>Naujienų tipas*</label>
                <select name="type_id">
                    <?php 
                    foreach($news_types as $type): ?>
                    <option value="<?= $type['id'] ?>" <?php if(isset($_SESSION['old_type_id']) && $_SESSION['old_type_id'] == $type['id']) echo 'selected'?>><?= $type['title'] ?></option>
                    <?php endforeach; ?>
                    <?php if(isset($_SESSION['old_type_id'])) unset($_SESSION['old_type_id']);?>
                </select>
                <?php
                if(isset($_SESSION['wrong_type_id'])) : ?>
                <h3 class="addWrong">Nevalidus naujienų tipas</h3>
                <?php 
                unset($_SESSION['wrong_type_id']);
                endif; ?>
            </div>
            <button type="submit" name="create" value="1" class="create-account">Sukurti</button>
        </form>
        <form action="" method="get">
            <button class="create-button" type="submit" name="createPostBack" value="1">Grįžti į naujienas</button>
        </form>
    </div>
    <script src="./assets//ckeditor/ckeditor.js"></script>
    <script src="./assets//ckfinder/ckfinder.js"></script>
    <script src="./assets/scripts/jquery.js"></script>
    <script src="./assets/scripts/jquery.datetimepicker.full.js"></script>

    <script>
        var editor = CKEDITOR.replace( 'editor1');
        CKFinder.setupCKEditor( editor );
        $("#datetime").datetimepicker({ step: 5 });
    </script>
</body>
</html>