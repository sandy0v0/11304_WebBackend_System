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
    <title>卓越科技大學校園資訊系統</title>
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
    <!-- <body style="margin: -12px;"> -->
    <div class="container-fluid">
        <!-- 標題區塊 -->
        <div class="row mb-3" style="margin:-12px;">
            <div class=" col-12 text-center" style="display: block;">
                <a href="index.php">
                    <div class="ti"
                        style="background:url('./upload/<?=$Title->find(['sh'=>1])['img'];?>'); background-size:cover; height:200px;margin-right:-12px;margin-left:-12px;">
                    </div>
                </a>
            </div>
        </div>

        <!-- <div class="row" style="margin-right:12px;margin-left:12px;"> -->
        <div class="row">
            <nav class="navbar navbar-expand-lg sticky-top" style="margin-top: -17px; background-color: rgba(60, 210, 210, 0.8);
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3); ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">
                        <!-- 可以在前面加上圖示 -->
                        <img src="./images/left01.png" alt="Sustaina Life" width="45" height="45"
                            onclick="playsound(1)">
                        <img src="./images/left.gif" alt="永續生活 Sustaina Life">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item"><a class="nav-link" href="?do=title">網站標題管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=ad">動態文字廣告管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=mvim">動畫圖片管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=image">校園映象資料管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=total">進站總人數管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=bottom">頁尾版權資料管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=news">最新消息資料管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=admin">管理者帳號管理</a></li>
                            <li class="nav-item"><a class="nav-link" href="?do=menu">選單管理</a></li>
                        </ul>
                        <div class="d-flex align-items-center" style="margin-right:12px;">
                            <a class=" btn btn-outline-light ms-3" href="logout.php">登出</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container mt-5">
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
            <div class="card mt-3">
                <div class="card-body text-center">
                    <h5>進站總人數 : <?= $Total->find(1)['total']; ?></h5>
                </div>
            </div>
            <footer class="bg-dark text-light text-center py-3 mt-5">

                <p><?=$Bottom->find(1)['bottom'];?></p>
            </footer>

            <!-- Bootstrap 5 JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>