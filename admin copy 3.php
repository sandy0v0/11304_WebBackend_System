﻿<?php include_once "api/db.php";

// 檢查是否已經登入
if (!isset($_SESSION['login'])) {
    echo "請從登入頁登入<a href='index.php?do=login'>管理登入</a>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>冬瓜行旅資訊系統 - 後台管理</title>

    <!-- 引入 Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="cover" style="display:none;">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>

    <div id="main" class="container-fluid">
        <!-- Header Section -->
        <div id="header" class="row mb-3">
            <div class="col-12 text-center">
                <a href="index.php" title="<?= $Title->find(['sh' => 1])['text']; ?>">
                    <img src="./upload/<?= $Title->find(['sh' => 1])['img']; ?>"
                        alt="<?= $Title->find(['sh' => 1])['text']; ?>" class="img-fluid" style="max-width: 100%;">
                </a>
            </div>
        </div>

        <div id="ms" class="row mt-3">
            <!-- Sidebar (left column) -->
            <div id="lf" class="col-md-3 col-12 mb-3">
                <div id="menuput" class="card shadow-sm">
                    <div class="card-header text-center">
                        <strong>後台管理選單</strong>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="?do=title" class="list-group-item list-group-item-action">網站標題管理</a>
                        <a href="?do=ad" class="list-group-item list-group-item-action">動態文字廣告管理</a>
                        <a href="?do=mvim" class="list-group-item list-group-item-action">動畫圖片管理</a>
                        <a href="?do=image" class="list-group-item list-group-item-action">校園映象資料管理</a>
                        <a href="?do=total" class="list-group-item list-group-item-action">進站總人數管理</a>
                        <a href="?do=bottom" class="list-group-item list-group-item-action">頁尾版權資料管理</a>
                        <a href="?do=news" class="list-group-item list-group-item-action">最新消息資料管理</a>
                        <a href="?do=admin" class="list-group-item list-group-item-action">管理者帳號管理</a>
                        <a href="?do=menu" class="list-group-item list-group-item-action">選單管理</a>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body text-center">
                        <h5>進站總人數 : <?= $Total->find(1)['total']; ?></h5>
                    </div>
                </div>
            </div>

            <!-- Main Content (center column) -->
            <div class="col-md-9 col-12 mb-3">
                <?php
                $do = $_GET['do'] ?? 'title';
                $file = "./backend/{$do}.php";
                if (file_exists($file)) {
                    include $file;
                } else {
                    include "./backend/title.php";
                }
                ?>
            </div>
        </div>

        <footer class="footer bg-light text-center py-3">
            <span class="t"><?= $Bottom->find(1)['bottom']; ?></span>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>