﻿<?php include_once "api/db.php";
// session_start();
if(!isset($_SESSION['login'])){
    echo "請從登入頁登入<a href='index.php?do=login'>管理登入</a>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>永續生活 Sustaina Life 系統 - 後台管理</title>
    <!-- 引入 Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./images/aajh0-uwfhp-001.ico" type="image/x-icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="addTitleImageModal" tabindex="-1" aria-labelledby="addTitleImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Modal 標題區域 -->
                    <h5 class="modal-title" id="addTitleImageModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalContent">
                    <!-- 這裡會動態加載內容 -->
                </div>
            </div>
        </div>
    </div>

    <div id="cover" style="display:none;">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>

    <div id="main" class="container-fluid">
        <div class="row" style="margin: -24px -12px 0px -12px;">
            <div class=" col-12 text-center">
                <a href="WebBackend_System.php" title="<?= $Title->find(['sh' => 1])['text']; ?>">
                    <img src="./upload/<?= $Title->find(['sh' => 1])['img']; ?>"
                        alt="<?= $Title->find(['sh' => 1])['text']; ?>" class="img-fluid"
                        style="min-width: 100%;max-height: 230px; object-fit: cover;object-position: 50% 10%;">
                </a>
            </div>
        </div>

        <div class="row" style="margin: 0px 0px 0px 0px;">
            <nav class="navbar navbar-expand-lg sticky-top" style="margin-top: -80px; background-color: rgba(60, 210, 210, 0.8);
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3); ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="?do=admin" style="color: rgb(52 85 48);">
                        <!-- 可以在前面加上圖示 -->
                        <img src="./images/left01.png" alt="Sustaina Life" width="45" height="45" onclick="">
                        <img src="./images/left.gif" alt="永續生活 Sustaina Life">&nbsp;<strong>後台</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav"
                        style="--bs-navbar-color: floralwhite; font-size: 16px;">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item"><a class="nav-link" href="?do=title">◆ 網站標題管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=ad">◆ 動態文字廣告管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=mvim">◆ 動畫圖片管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=mvim2">◆ 動圖管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=image">◆ 永續映象資料管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=total">◆ 進站總人數管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=bottom">◆ 頁尾版權資料管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=news">◆ 最新消息資料管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=admin">◆ 管理者帳號管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=menu">◆ 選單管理</a></li>
                        </ul>
                        <div class="d-flex align-items-center" style="margin-right:12px;">
                            <a class="btn btn-outline-light ms-1" href="javascript:void(0);"
                                onclick="document.cookie='user=;'; location.replace('./api/logout.php');">
                                管理登出
                            </a>
                        </div>

                    </div>
                </div>
            </nav>

            <div class="container mt-3">
                <!-- 管理區域 -->
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

            <footer class=" card-body text-light text-center py-1 mt-1"
                style="background-color: rgba(60, 210, 210, 0.8); font-size: 18px;">
                <p style="margin-top:1rem">進站總人數 : <?= $Total->find(1)['total']; ?></p>
                <p><?=$Bottom->find(1)['bottom'];?></p>
            </footer>

            <!-- Bootstrap 5 JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


            <!-- JQ -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
            function loadModalContent(url) {
                // 使用 AJAX 加載指定的 URL 內容並插入到 modal-body 中
                $('#addTitleImageModal .modal-body').load(url, function(response, status, xhr) {
                    if (status == "error") {
                        console.log("Error loading content: " + xhr.status + " " + xhr.statusText);
                    } else {
                        // 加載標題內容
                        var title = $('#addTitleImageModalLabel').text(); // 這會從 title.php 取得標題
                        $('#addTitleImageModalLabel').text(title); // 將標題動態設置到 modal 標題部分
                    }
                });
            }
            </script>



</body>