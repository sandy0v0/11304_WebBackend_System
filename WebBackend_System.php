<?php include_once "api/db.php";?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>永續生活 Sustaina Life 資訊系統</title>
    <!-- link css 順序 1.bs 2.self -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./images/aajh0-uwfhp-001.ico" type="image/x-icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- 引入AOS的CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- 自製js css -->
    <!-- <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script> -->

    <!-- 引入 jQuery 和 Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script> -->

    <style>
    body {
        background-color: rgb(245, 255, 255);
    }

    .header-top {
        /* width: 100%; */
        overflow: hidden;
        /* 防止內容溢出 */
        /* margin-left: 12px;
            margin-right: 12px; */
    }

    .header-top img {
        width: 100%;
        height: auto;
        /* 確保圖片等比例縮放 */
        display: block;
        /* 移除圖片下方多餘的空白 */
        max-height: 230px;
        /* 可根據需求設定最大高度 */
        object-fit: cover;
        /* 確保圖片填滿容器 */
        object-position: 50% 10%;

    }

    /* 初始標題位置距離上方50px，保持字體大小 */
    .title {
        top: 0px;
        font-size: 2rem;
        /* 設定字體大小 */
        transition: bottom 0.3s ease;
    }

    /* 固定標題當滾動到頁面頂部 */
    .fixed-top {
        margin-left: 12px;
        margin-right: 12px;
        top: 70px;
        z-index: 1000;
        padding: 10px 0;
        /* 可選，給標題一些上下間距 */
    }

    /* 避免圖片遮擋原有導航欄 */
    .navbar {
        margin-top: -70px;
        /* 根據 header-top 的高度調整 */
    }

    .mynavbar {
        /* position: fixed;
            width: 100%;*/
        z-index: 1030;
        background-color: rgba(60, 210, 210, 0.8);
        text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);
        font-size: 20px;
    }

    .marquee {
        width: 100%;
        height: 50px;
        overflow: hidden;
        background-color: rgba(150, 215, 215, 0.5);
        color: rgb(25, 100, 100);
        /* text-shadow: 2px 2px 1px rgba(0, 0, 0, 0.3); */
        padding: 10px 0;
        text-align: center;
        white-space: nowrap;
        /* 保證跑馬燈內容不換行 */
    }

    .marquee span {
        display: inline-block;
        padding-left: 100%;
        animation: marquee 20s linear infinite;
    }

    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    /* 設置輪播圖容器的最大寬度並使其居中 */
    .carousel {
        max-width: 1920px;
        margin: 0 auto;
        /* 使容器居中 */
        overflow: hidden;
        /* 防止內容溢出 */
        /* margin-left: 12px;
            margin-right: 12px; */
    }

    .carousel-inner {
        max-width: 1920px;
        max-height: 700px;
        /* 設置輪播圖的最大高度 */
        overflow: hidden;
    }

    /* 設置輪播圖的最大寬度和最大高度 */
    .carousel-inner img {
        height: 100%;
        /* 讓圖片高度填滿父容器 */
        width: 100%;
        /* 保持圖片寬度填滿 */
        object-fit: cover;
        /* 保持圖片的比例並覆蓋容器 */
    }

    /* 當螢幕寬度小於 576px 時，圖片最大高度為 400px */
    @media (max-width: 576px) {
        .carousel-inner img {
            max-height: 110px;
        }
    }

    /* 當螢幕寬度介於 577px 和 768px 之間時，圖片最大高度為 600px */
    @media (min-width: 577px) and (max-width: 768px) {
        .carousel-inner img {
            max-height: 250px;
        }
    }

    /* 當螢幕寬度介於 769px 和 992px 之間時，圖片最大高度為 800px */
    @media (min-width: 769px) and (max-width: 992px) {
        .carousel-inner img {
            max-height: 350px;
        }
    }

    /* 當螢幕寬度介於 993px 和 1200px 之間時，圖片最大高度為 900px */
    @media (min-width: 993px) and (max-width: 1200px) {
        .carousel-inner img {
            max-height: 450px;
        }
    }

    /* 當螢幕寬度大於 1200px 時，圖片最大高度為 1000px */
    @media (min-width: 1201px) {
        .carousel-inner img {
            max-height: 680px;
        }
    }

    .specialDiscount {
        color: lightcoral;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }

    /* 設定圖片的初始  */
    .image-hover {
        filter: brightness(0.95);
        /* 添加過度效果   */
        transition: filter 0.5s ease, transform 0.5s ease;
    }

    /* 設定滑鼠停在上面的效果 */
    .image-hover:hover {
        /*  改變滑鼠形状   */
        cursor: pointer;
        /* 改變圖像亮度，顏色變化  */
        filter: brightness(1.05);
        /* 放大圖像  */
        transform: scale(1.025);
    }

    /* 設定圖片的初始  */
    .img-hover {
        transition: filter 0.5s ease, transform 0.5s ease;
    }

    /* 設定滑鼠停在上面的效果 */
    .img-hover:hover {
        cursor: pointer;
        transform: scale(1.025);
    }

    .social-icons a {
        font-size: 30px;
        margin: 0 10px;
        color: #333;
    }

    .social-icons a:hover {
        color: #007bff;
    }

    /* 設置基本樣式 */
    .nav-link {
        color: floralwhite;
        transition: color 0.3s, transform 0.3s ease;
    }

    /* 懸停效果 */
    .nav-item:hover {
        cursor: pointer;
        transform: scale(1.025);
    }

    /* 按鈕樣式 */
    .favorite-btn {
        background-color: white;
        border: none;
        border-radius: 50%;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    /* 愛心符號樣式 */
    .heart-icon {
        font-size: 20px;
        color: #ccc;
        /* 預設灰色 */
        transition: color 0.3s ease, transform 0.3s ease;
    }

    /* 滑鼠移入愛心效果 */
    .favorite-btn:hover .heart-icon {
        color: red;
        /* 滑鼠移入時愛心變紅 */
        transform: scale(1.2);
        /* 放大效果 */
    }

    /* 已加入最愛的愛心樣式 */
    .favorite-btn.active .heart-icon {
        color: red;
        /* 已選中時愛心為紅色 */
    }

    /* 調整關於我們與最新消息之間的間距 */
    .section-spacing {
        margin-top: 5rem;
        margin-bottom: 4rem;
    }

    /* 最新消息區塊虛線邊框與內邊距調整 */
    .news-box {
        border: 2px dashed #ccc;
        padding: 1rem 1rem;
        /* 增加更多的內邊距 */
        border-radius: 12px;
        /* 邊角圓滑 */
        background-color: #f9f9f9;
        /* 背景色，讓內容更突出 */
    }

    .box {
        margin: 2.5rem 2rem 1.5rem 2rem;
        cursor: pointer;
    }

    /* 設定表格最大高度為 500px，並且如果內容超過就顯示滾動條 */
    #myTableWrapper {
        max-height: 500px;
        overflow-y: auto;
    }

    /* 讓表格顯示在同一行，避免換行 */
    table {
        white-space: nowrap;
    }

    /* 讓表格內容在螢幕較大時不會換行 */
    th,
    td {
        text-overflow: ellipsis;
        overflow: hidden;
        max-width: 200px;
        /* 限制欄位最大寬度 */
    }

    /* 調整公告年份的位置，使其稍微向前 */
    th:nth-child(5),
    td:nth-child(5) {
        padding-left: 10px;
    }
    </style>

</head>

<body>
    <!-- 音頻元素 -->
    <!-- <audio id="audioElement" src="./sounds/The First Noel.mp3" preload="auto"></audio> 替換為你實際的音頻文件路徑 -->
    <div id="home"></div>
    <!-- nav -->
    <div class="container-fluid">
        <div class="header-top">
            <a href="WebBackend_System.php" title="<?= $Title->find(['sh' => 1])['text']; ?>">
                <img src="./upload/<?= $Title->find(['sh' => 1])['img']; ?>"
                    alt="<?= $Title->find(['sh' => 1])['text']; ?>" class="img-fluid">
            </a>
        </div>
        <nav class="navbar navbar-expand-lg mynavbar navbar-dark title" id="stickyTitle">

            <div class="container-fluid">
                <a class="navbar-brand" href="#home">
                    <!-- 可以在前面加上圖示 -->
                    <img src="./images/left01.png" alt="Sustaina Life" width="45" height="45" onclick="playsound(1)">
                    <img src="./images/left.gif" alt="永續生活 Sustaina Life">
                </a>

                <!-- 永續生活 Sustaina Life -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto mx-auto">
                        <li class="nav-item me-4">
                            <a class="nav-link " href="#page0" onclick="playsound(1)">✨ 最新消息</a>
                        </li>
                        <li class="nav-item dropdown me-4">
                            <!-- 讓每次點選時可以跳掉該顏色區塊最上方，需改成 href="#page1"，類推；搭配下方的ID -->
                            <a class="nav-link dropdown-toggle" href="#page1" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 128 128">
                                    <defs>
                                        <path id="notoV1GlobeShowingAmericas0"
                                            d="M127.65 64c0 35.15-28.5 63.65-63.66 63.65C28.85 127.65.35 99.15.35 64C.35 28.84 28.85.35 63.99.35c35.16 0 63.66 28.49 63.66 63.65" />
                                    </defs>
                                    <use fill="#006ca2" href="#notoV1GlobeShowingAmericas0" />
                                    <clipPath id="notoV1GlobeShowingAmericas1">
                                        <use href="#notoV1GlobeShowingAmericas0" />
                                    </clipPath>
                                    <g fill="#bdcf46" clip-path="url(#notoV1GlobeShowingAmericas1)">
                                        <path
                                            d="M108.99 82.74c-1.05-.79-3.19-1.75-4.38-1.93c-2.03-.31-3.13.4-4.08-1.75c-.79-1.79-1.38-2.91-2.79-4.39c-2.72-2.84-5.18-4.1-8.87-5.52h-6.28c-2.64-.72-5.29-1.66-7.64.44c-.25.22-.46.5-.69.75c-.26.28-1.43.38-1.81.48c-.53.13-1.09.29-1.65.3c-.86.02-2.04-.21-2.63-.89c-.34-.39-.54-1.16-.59-1.67c-.06-.68.23-1.27.24-1.92c.02-.58.05-1.25-.11-1.8c-.33-1.15-1.63-1.48-2.64-1.7c-.6-.13-1.19-.22-1.8-.42c-1.53-.52-.74-2.61-.09-3.54c.66-.95 1.61-1.61.02-2.48c-1.28-.69-2.85-.58-3.98.26c-1.08.82-1.79 2.41-3.1 2.82c-1.5.48-3.13-.62-4.55-.82c.14-1.89-.81-5.37-.76-6.23c.14-2.27 1.81-4.73 4-5.33s4.6-1.06 6.87-.82c3.51.37 3.36 2.25 5.19 4.7c.6.8 1.75 1.74 2.79 1.19c2.21-1.16 1.53-4.14 1.6-6.15c.11-3.13 2.12-5.02 4.04-7.33c.71-.85 1.43-1.69 2.13-2.55c.63-.78 1.37-1.51 2.43-1.71c.74-.13 1.65.01 2.4.01c1.22 0 3.55.41 4.26-.84c.66-1.18-.31-1.99-1.29-2.37c-.4-.16-1.08-.24-1.2-.74c-.41-1.75 1.47-1.81 2.64-2c1.06-.17 2.43-.52 3.24.46c.36.44.18.97.59 1.42c.75.81 2.68.35 3.49-.12c.94-.55 1.2-2.09 1.2-3.09c0-.52-.08-1.06-.38-1.49c-.8-1.14-3.15-1.66-4.33-2.33c-1.72-.98-3.32-2.14-4.89-3.33c-1.84-1.39-3.85-2.51-5.88-3.58c-1.75-.91-3.92-2.42-5.97-2.06c-.8.13-1.24.71-1.41 1.48c-.11.58-.38 1.17-.38 1.77c.01.73.35 1.4.56 2.08c.26.85.47 1.72-.2 2.43c-.64.67-2.06.65-2.8.1c-.9-.68-1.27-1.77-2.26-2.29c-1.1-.58-1.92-.74-3.15-.59c-1.15.14-2.53.28-3.68-.01c-1.1-.27-2.17-1.6-2.19-2.73c-.02-.81.16-1.94.93-2.39c.91-.52 2.42-.39 3.44-.47c.21-.01.41-.03.6-.05c.03-.01.06-.01.09-.01c.03-.01.07-.01.1-.01c.29-.04.56-.07.75-.12c-.01-.02-.04-.04-.05-.06c.16.3 1.07-1.02 1.1-1.17c.16-.66-.33-1.43-.09-2.05c.18-.46.83-.75 1.26-.89c.67-.21 1.36-.09 2.04-.02c.55.06 1.14.06 1.68.17c1.25.26 1.29 1.24 2.07 2c1.12 1.05 1.8.59 3.26.79c1.57.21 5.69 2.91 7.09.8c1.56-2.35-2.64-4.08-3.94-4.51c-2.05-.68-4.09-2.07-5.43-3.77c-.66-.84-1.18-1.86-1.16-2.96c.03-.89 0-2.26.83-2.83c.2-.13.42-.21.65-.22c.41-.04.86-.06 1.2.14c.5.31.91.91 1.17 1.42c.55 1.1.36 2.15 1.15 3.25c.79 1.07 1.82 1.94 2.78 2.84c2.49 2.32 5.24 4.38 8.43 5.6c1.72.66 3.53 1.17 5.16 2.07c1.85 1.04 2.53 2.38 3.76 3.97c3.45 4.43 13.57 2.99 11.2-4c-1.78-5.24-5.26-9.73-9.9-12.57c-2.23-1.36-4.23-3.25-6.48-4.51c-2.82-1.57-6.2-2.05-9.34-2.57c-3.71-.61-7.35-.89-11.1-1.06c-2.73-.12-5.62-.56-7.89 1.28c-1.21.97-4.77 4.34-4.84 5.74c-.07 1.34 1.69 2.06 1.97 3.29c.11.53.15 1-.26 1.4c-.45.44-1.07.58-1.17 1.28c-.08.61.15 1.02.39 1.54c.19.4.6 1.17.25 1.62c-.93 1.17-2.18-.94-2.26-1.74c-.12-1.3.29-2.43-1.03-3.25c-.89-.55-3.31-.79-3.68.51c-.18.62.52 1.22.44 1.94c-.17 1.46-1.14 1.09-2.25 1.28c-1.94.33-2.34 1.78-4.42.82c-.2-1.04.4-2.72-.61-3.42c-.81-.55-2.63-.15-3.54-.51c-2.28-.92-4.29-1.21-6.72-.49c-2.57.77-5.14 2.29-7.62 3.52c-3.19 1.58-8.18-.45-10.78 1.88l-.05.45c-2.14-.02-3.03.32-4.53 2.31c-1.08 1.43-1.63 2.81-2.28 4.39c-.49 1.2-1.51 2.3-1.7 3.64c-.12.94-.05 2.13.09 3.06c.07.52 4.7-.89 5.29-.82c2.15.28 3.81 2.36 5.53 3.47c1.47.93 3.25 1.89 3.51 3.68c.32 2.16-.08 4.57-.02 6.76c.12 4.35 4.62 7.66 7.3 10.67c1.19 1.34 1.29 3.01 2.46 4.27c.65.71 2.62 4.24 4.06 2.93c1.15-1.04-1.86-4.22-1.62-5.68c.13-.89 2.15.89 2.27 1.02c.84 1 1.28 2.44 1.72 3.65c.95 2.61 1.79 3.77 3.98 4.79c-.13 1.25 1.15 2.09 2.29 2.74c1.25.71 2.61.73 3.94 1.32c1.26.57 2.64.56 3.81 1.13c1.74.84.57 1.67 1.55 2.92c1.09 1.4 3.16.54 4.63.77c3.15.49 2.62 3.5 4.58 5.31c1.07 1.01 2.9.9 4.25 1.05c.53.06 1.22.07 1.64.45c1.05.93-.18 2.21-.58 3.12c-.55 1.22-.93 2.53-1.17 3.85c-.67 3.68-.53 7.79 2.15 10.64c2.92 3.11 6.49 4.52 7.6 8.96c.95 3.71.07 7.34-.61 11c-.42 2.2-3.43 6.02-.44 7.64c2.6 1.41 7.02-2.47 8.72-3.95c4.01-3.5 9.31-5.63 11.95-10.54c1.25-2.33 2.36-4.79 4.55-6.4c1.15-.85 2.48-1.41 3.71-2.12c2.61-1.49 4.17-4.66 5.34-7.29c1.38-3.19.11-4.99-2.39-6.86M61.9 26.46c.71-.17 1.67-.13 1.97-.06c1.15.28 2 1.18 2.88 1.9c.64.51 1.18 1.05 1.75 1.62c.37.37.72.7.64 1.31c-.06.53-.36.79-.84.84c-.87.09-1.26-.48-2.04-.61c-1.85-.31-2.62 2.81-4.47 1.96c-.47-.22-.33-.61-.33-1.11c-.01-.38 0-.72.14-1.05c.18-.42.47-.77.82-1.08c.22-.19.58-.34.75-.59c.41-.64-.17-1.32-.75-1.56c-.36-.15-.89-.16-1.12-.48c-.43-.61-.01-.93.6-1.09m74.12 34.62c-.02-3 .12-7.11-2.38-9.28c-2.31-2.01-5.16-.79-7.07 1.13c-3.7 3.73-5.2 10.77-2.12 15.3c1.14 1.68 2.59 3.08 4.49 3.52c1.86.43 5.41.66 6.32-1.24c.52-1.09.32-2.37.32-3.56c-.01-2.03.46-3.86.44-5.87" />
                                        <path
                                            d="M78.15 57.27c-.92-.46-1.27-1.24-1.88-1.86c-.3-.3-.66-.56-1.18-.72c-.98-.28-2.22-.17-3.23-.11c-1.49.09-5.29.34-5.48 2.43c-.25 2.67 3.42 2.37 5.24 2.34c1.25-.02 2.46-.48 3.71-.17c1.83.45 1.42 2.08 2.84 2.7c.51.22 2.09.52 2.58.56c1.82.16 6.19-.89 5.03-3.49c-1.05-2.39-5.76-.75-7.63-1.68" />
                                    </g>
                                </svg> 永續生活
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"
                                style="margin-top: 7px; padding-top: 8px;">
                                <li><a class="dropdown-item" href="#page1" style="color: lightseagreen;">食-零浪費低碳飲食</a>
                                </li>
                                <li><a class="dropdown-item" href="#page1" style="color: lightcoral;">衣-友善環境綠時尚</a></li>
                                <li><a class="dropdown-item" href="#page1" style="color: lightseagreen;">住-居住品質提升</a>
                                </li>
                                <li><a class="dropdown-item" href="#page1" style="color: lightcoral;">行-低碳運輸網絡</a></li>
                                <li><a class="dropdown-item" href="#page1" style="color: lightseagreen;">育樂-永續觀光樂悠遊</a>
                                </li>
                                <li><a class="dropdown-item" href="#page1" style="color: lightcoral;">購-使用取代擁有</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#page2">🌱 淨零排放</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#page3">📢 議題報導/法令規章</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#page4">🏡 關於我們</a>
                        </li>
                    </ul>
                    <!-- <form class="d-flex">
                        <input class="form-control" type="text" placeholder="Search">
                        <button class="btn btn-secondary-200 me-4" type="button">🔍🏡🏠</button>
                    </form> -->

                    <div class="d-flex align-items-center">
                        <!-- <form class="w-100 me-3" role="search">
                            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                        </form> -->

                        <div class="flex-shrink-0 dropdown">
                            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./images/smiling sun.png" alt="mdo" width="40" height="40"
                                    class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small shadow"
                                style=" margin-top: 7px; margin-left:-35px; padding-top: 10px; width: 150px">

                                <!-- 根據是否登入顯示不同選項 -->
                                <?php 
                                    // $do = $_GET['do'] ?? 'main';
                                    // $file = "./front/{$do}.php";
                                    if (!isset($_SESSION['login'])) { ?>
                                <li><a class="dropdown-item" href="signup.html"><img src="./images/left01.png"
                                            alt="管理專區" width="30" height="30"> 管理專區</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="?do=login" data-bs-toggle="modal"
                                        data-bs-target="#loginModal"><i class="fa-solid fa-user"></i> 管理登入</a></li>
                                <!-- <li><a class="dropdown-item" href="login.php" data-bs-toggle="modal"
                                        data-bs-target="#loginModal"><i class="fa-solid fa-user"></i> 管理登入</a></li> -->
                                <li><a class="dropdown-item" href="login.html"><i class="fa-regular fa-user"></i>
                                        會員登入</a></li>
                                <?php } else { ?>
                                <li><a class="dropdown-item" href="admin.php"><img src="./images/left01.png" alt="管理專區"
                                            width="30" height="30"> 管理專區</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="?do=admin.php"><i class="fa-solid fa-user"></i>
                                        返回管理</a></li>
                                <?php } ?>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- 登入Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">管理員登入</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="?do=login">
                        <div class="mb-3">
                            <label for="acc" class="form-label">帳號</label>
                            <input type="text" class="form-control" id="acc" name="acc" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="ps" class="form-label">密碼</label>
                            <input type="password" class="form-control" id="ps" name="ps" required>
                        </div>
                        <button type="submit" class="btn btn-primary">登入</button>
                        <button type="reset" class="btn btn-secondary">清除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- container1 輪播區-->

    <div class="container-fluid">
        <!-- 輪播圖 Carousel -->
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">

            <!-- 指示器 Indicators/ 圓點 dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>

            <!-- 幻燈片 The slideshow/ 輪播圖carousel -->
            <div class="carousel-inner">

                <div class="marquee">
                    <!-- <span>🏡 這裡是跑馬燈區域，您可以在此顯示最新的公告、資訊或動態更新！ 🌍</span> -->
                    <span>
                        <?php
                        $ads=$Ad->all(['sh'=>1]);
                        foreach($ads as $ad){
                            echo $ad['text'];
                            // echo "&nbsp;&nbsp;&nbsp;"
                            echo str_repeat("&nbsp;",4) ;
                        }
                        // 這段沒有成功，可刪-> echo q("select group_concat('&nbsp;&nbsp;&nbsp;&nbsp;',`text`) from `ads` where `sh`=1 group by id")[0];
                    ?>
                    </span>
                </div>
                <!-- <div style="width:100%; padding:2px; height:290px;">
                    <div id="mwww" loop="true" style="width:100%; height:100%;">
                        <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
                    </div>
                </div> -->

                <div class="carousel-item active">
                    <img src="./images/1.jpg" alt="淨零綠生活" class="d-block img-fluid w-100"
                        style="object-position: 50% 50%;">
                </div>
                <div class="carousel-item">
                    <img src="./images/6.jpg" alt="ESG" class="d-block img-fluid w-100"
                        style="object-position: 50% 55%;">
                </div>
                <div class="carousel-item">
                    <img src="./images/2.gif" alt="太陽能.風能" class="d-block img-fluid w-100"
                        style="object-position: 50% 40%;">
                </div>
                <div class="carousel-item">
                    <img src="./images/13-1.png" alt="2050淨零排放" class="d-block img-fluid w-100"
                        style="object-position: 50% 30%;">
                </div>
                <div class="carousel-item">
                    <img src="./images/9.png" alt="世界地球日" class="d-block img-fluid w-100"
                        style="object-position: 50% 30%;">
                </div>

                <!-- 左右控制按鈕 Left and right controls/ 圖標 icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <br class="mt-5" id="page0">
    <br>


    <div class="container mt-5 py-2">
        <div class="row" data-aos="fade-up" data-aos-delay="200">
            <!-- 關於我們 -->
            <div class="col-12 col-lg-6">
                <h2 class="mt-2 " style="color: indianred;">🏡 關於我們</h2>
                <p class="mt-3 fw-bold" style="color: dimgray;">
                    <img src="./images/smiling sun.png" alt="mdo" width="40" height="40" class="rounded-circle">
                    &nbsp;用知識點亮未來，用行動守護地球
                </p>

                <div class="cols-1 cols-lg-2 align-items-stretch g-4 py-2">
                    <div class="col" style="text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);">
                        <div class="card card-cover h-600 overflow-hidden text-bg-white rounded-2  img-hover" style="min-height: 300px; background-image: url(
                            ./upload/<?= $Mvim2->find(['sh' => 1])['img']; ?>); background-size: cover;
                            background-position: top;">
                            <div class="d-flex flex-column h-600 p-5 pb-5 text-muted text-shadow-1">
                                <div class="box text-center mt-5" style="color: white;">
                                    <br><br><br><br><br>
                                    <strong>
                                        我們是一群致力於推動可持續發展的倡導者，<br>
                                        <strong style="color: gold;">透過將ESG（環境、社會、治理）理念，<br>
                                            融入食、衣、住、行、育、樂、購，</strong><br>
                                        打造一個既環保又充滿正向影響的生活方式~<br>
                                        <br>
                                        相信從日常小事出發，<br>
                                        我們也可以成為改變世界的一份子，<br>
                                        透過這個平台，希望連結每個人，<br>
                                        創造更多可能，讓地球更美好 ❤️<br>
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 最新消息 -->
            <div class="col-12 col-lg-6 ">

                <h2 class="mt-2" style="color: indianred;">✨ 最新消息</h2><br>
                <!-- 環境責任區塊 -->
                <div class="news-box">
                    <!-- 顯示更多按鈕 -->
                    <?php
                if($News->count(['sh'=>1])>5){
                    echo "<a href='index.php?do=news' style='float:right'>";
                    echo "More...";
                    echo "</a>" ;
                }
            ?>

                    <!-- ul裡面要放li，代表有序的清單 -->
                    </span>
                    <!-- <ol class="ssaa" style="list-style-type:decimal;" > -->
                    <ul class="ssaa" style="list-style-type:decimal;">
                        <?php
                        $all_news=$News->all(['sh'=>1]," limit 5");
                        foreach($all_news as $n){
                        echo "<li class='mb-2'>";
                        echo mb_substr($n['text'],0,20);
                        echo "<span class='all' style='display:none'>";
                        echo $n['text'];
                        echo "</span>";
                        echo "</li>";
                }
            ?>

                    </ul>
                    <!-- position: absolute　絕對定位 -->
                    <!-- 先不顯示，滑鼠移過之後再顯示，此為彈出視窗 -->
                    <div id="altt"
                        style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
                    </div>

                    <!-- ssaa li 因為他中間顯示空白，代表ssaa在li的上層-->
                    <!-- 原生jQ的寫法，代表滑鼠滑到該位置跟離開位置的動作，改成JS -->
                    <!-- $(this)代表 現在這個動作 -->
                    <!-- $(this)代表 $(".ssaa li")的li，表示每個li裡面都有東西，裡面有個all，取得裡面全部的html的內容，並前後再加上</pre>-->
                    <!-- 原本是display: none (隱藏)，當我滑鼠移到該位置時，做完以上動作後，把它顯示出來 -->
                    <!-- 在$(".ssaa li").mouseout中，表示滑鼠離開的時候，又消失 -->

                    <!-- 在 JavaScript 中，substr的語法，str.substr(start, length);　-->
                    <!-- str.substr( 1, 10 );  ( 從字串中的哪一個位置開始提取 , 要提取的字的長度有幾個字 )-->

                    <script>
                    $(".ssaa li").hover(
                        function() {
                            $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
                            $("#altt").show()
                        }
                    )
                    $(".ssaa li").mouseout(
                        function() {
                            $("#altt").hide()
                        }
                    )
                    </script>
                </div>
                <div class="col-12 col-lg-6 news-box" style="width:100%; padding:10px; height:350px;">
                    <div id="mwww" loop="true" style="width:100%; height:100%;">
                        <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    var lin = new Array();
    // 抓 lin 裡面的動畫資料去撥放
    // lin=['upload/01C01.gif','upload/01C02.gif'];
    <?php
        $mvs=$Mvim->all(['sh'=>1]);
        foreach($mvs as $mv){
            echo "lin.push('upload/{$mv['img']}');";
        }
        ?>
    var now = 0;
    if (lin.length > 1) {
        // 每間隔3秒，執行ww()程式
        // setInterval 是非同步的機制
        // 如果資料庫沒有設定顯示的圖片，就顯示沒有可顯示的動畫圖片資料，請確認動畫圖片顯示的判斷
        setInterval("ww()", 3000);
        ww();
        // now = 1;
    } else if (lin.length <= 0) {
        $("#mwww").html("沒有可顯示的動畫圖片資料，請確認動畫圖片顯示");
    } else {
        ww();
    }

    function ww() {
        // console.log("HI");
        $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
        //$("#mwww").attr("src",lin[now])
        now++;
        if (now >= lin.length)
            now = 0;
    }
    </script>



    <br><br>
    <div class="container-50 vh-self-50 text-center py-1" style="margin-left: 12px; margin-right: 12px;">
        <div class="row g-0">
            <div class="col">
                <img src="./images/trees.gif" alt="" style="width:100%" height="95%">
            </div>
            <div class="col">
                <img src="./images/trees.gif" alt="" style="width:100%" height="95%">
            </div>
            <div class="col">
                <img src="./images/trees.gif" alt="" style="width:100%" height="95%">
            </div>
            <div class="col">
                <img src="./images/trees.gif" alt="" style="width:100%" height="95%">
            </div>
            <div class="col">
                <img src="./images/trees.gif" alt="" style="width:100%" height="95%">
            </div>
            <div class="col">
                <img src="./images/trees.gif" alt="" style="width:100%" height="95%">
            </div>
            <div class="col">
                <img src="./images/trees.gif" alt="" style="width:100%" height="95%">
            </div>
            <div class="col">
                <img src="./images/trees.gif" alt="" style="width:100%" height="95%">
            </div>
        </div>
    </div>



    <br class="featurette-divider mt-3 py-1" id="page1"><br>


    <div class="container mt-5" data-aos="fade-up" data-aos-delay="200">
        <div class="row">
            <div class="col">
                <h2 style="color: lightseagreen;" class=" py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 128 128">
                        <defs>
                            <path id="notoV1GlobeShowingAmericas0"
                                d="M127.65 64c0 35.15-28.5 63.65-63.66 63.65C28.85 127.65.35 99.15.35 64C.35 28.84 28.85.35 63.99.35c35.16 0 63.66 28.49 63.66 63.65" />
                        </defs>
                        <use fill="#006ca2" href="#notoV1GlobeShowingAmericas0" />
                        <clipPath id="notoV1GlobeShowingAmericas1">
                            <use href="#notoV1GlobeShowingAmericas0" />
                        </clipPath>
                        <g fill="#bdcf46" clip-path="url(#notoV1GlobeShowingAmericas1)">
                            <path
                                d="M108.99 82.74c-1.05-.79-3.19-1.75-4.38-1.93c-2.03-.31-3.13.4-4.08-1.75c-.79-1.79-1.38-2.91-2.79-4.39c-2.72-2.84-5.18-4.1-8.87-5.52h-6.28c-2.64-.72-5.29-1.66-7.64.44c-.25.22-.46.5-.69.75c-.26.28-1.43.38-1.81.48c-.53.13-1.09.29-1.65.3c-.86.02-2.04-.21-2.63-.89c-.34-.39-.54-1.16-.59-1.67c-.06-.68.23-1.27.24-1.92c.02-.58.05-1.25-.11-1.8c-.33-1.15-1.63-1.48-2.64-1.7c-.6-.13-1.19-.22-1.8-.42c-1.53-.52-.74-2.61-.09-3.54c.66-.95 1.61-1.61.02-2.48c-1.28-.69-2.85-.58-3.98.26c-1.08.82-1.79 2.41-3.1 2.82c-1.5.48-3.13-.62-4.55-.82c.14-1.89-.81-5.37-.76-6.23c.14-2.27 1.81-4.73 4-5.33s4.6-1.06 6.87-.82c3.51.37 3.36 2.25 5.19 4.7c.6.8 1.75 1.74 2.79 1.19c2.21-1.16 1.53-4.14 1.6-6.15c.11-3.13 2.12-5.02 4.04-7.33c.71-.85 1.43-1.69 2.13-2.55c.63-.78 1.37-1.51 2.43-1.71c.74-.13 1.65.01 2.4.01c1.22 0 3.55.41 4.26-.84c.66-1.18-.31-1.99-1.29-2.37c-.4-.16-1.08-.24-1.2-.74c-.41-1.75 1.47-1.81 2.64-2c1.06-.17 2.43-.52 3.24.46c.36.44.18.97.59 1.42c.75.81 2.68.35 3.49-.12c.94-.55 1.2-2.09 1.2-3.09c0-.52-.08-1.06-.38-1.49c-.8-1.14-3.15-1.66-4.33-2.33c-1.72-.98-3.32-2.14-4.89-3.33c-1.84-1.39-3.85-2.51-5.88-3.58c-1.75-.91-3.92-2.42-5.97-2.06c-.8.13-1.24.71-1.41 1.48c-.11.58-.38 1.17-.38 1.77c.01.73.35 1.4.56 2.08c.26.85.47 1.72-.2 2.43c-.64.67-2.06.65-2.8.1c-.9-.68-1.27-1.77-2.26-2.29c-1.1-.58-1.92-.74-3.15-.59c-1.15.14-2.53.28-3.68-.01c-1.1-.27-2.17-1.6-2.19-2.73c-.02-.81.16-1.94.93-2.39c.91-.52 2.42-.39 3.44-.47c.21-.01.41-.03.6-.05c.03-.01.06-.01.09-.01c.03-.01.07-.01.1-.01c.29-.04.56-.07.75-.12c-.01-.02-.04-.04-.05-.06c.16.3 1.07-1.02 1.1-1.17c.16-.66-.33-1.43-.09-2.05c.18-.46.83-.75 1.26-.89c.67-.21 1.36-.09 2.04-.02c.55.06 1.14.06 1.68.17c1.25.26 1.29 1.24 2.07 2c1.12 1.05 1.8.59 3.26.79c1.57.21 5.69 2.91 7.09.8c1.56-2.35-2.64-4.08-3.94-4.51c-2.05-.68-4.09-2.07-5.43-3.77c-.66-.84-1.18-1.86-1.16-2.96c.03-.89 0-2.26.83-2.83c.2-.13.42-.21.65-.22c.41-.04.86-.06 1.2.14c.5.31.91.91 1.17 1.42c.55 1.1.36 2.15 1.15 3.25c.79 1.07 1.82 1.94 2.78 2.84c2.49 2.32 5.24 4.38 8.43 5.6c1.72.66 3.53 1.17 5.16 2.07c1.85 1.04 2.53 2.38 3.76 3.97c3.45 4.43 13.57 2.99 11.2-4c-1.78-5.24-5.26-9.73-9.9-12.57c-2.23-1.36-4.23-3.25-6.48-4.51c-2.82-1.57-6.2-2.05-9.34-2.57c-3.71-.61-7.35-.89-11.1-1.06c-2.73-.12-5.62-.56-7.89 1.28c-1.21.97-4.77 4.34-4.84 5.74c-.07 1.34 1.69 2.06 1.97 3.29c.11.53.15 1-.26 1.4c-.45.44-1.07.58-1.17 1.28c-.08.61.15 1.02.39 1.54c.19.4.6 1.17.25 1.62c-.93 1.17-2.18-.94-2.26-1.74c-.12-1.3.29-2.43-1.03-3.25c-.89-.55-3.31-.79-3.68.51c-.18.62.52 1.22.44 1.94c-.17 1.46-1.14 1.09-2.25 1.28c-1.94.33-2.34 1.78-4.42.82c-.2-1.04.4-2.72-.61-3.42c-.81-.55-2.63-.15-3.54-.51c-2.28-.92-4.29-1.21-6.72-.49c-2.57.77-5.14 2.29-7.62 3.52c-3.19 1.58-8.18-.45-10.78 1.88l-.05.45c-2.14-.02-3.03.32-4.53 2.31c-1.08 1.43-1.63 2.81-2.28 4.39c-.49 1.2-1.51 2.3-1.7 3.64c-.12.94-.05 2.13.09 3.06c.07.52 4.7-.89 5.29-.82c2.15.28 3.81 2.36 5.53 3.47c1.47.93 3.25 1.89 3.51 3.68c.32 2.16-.08 4.57-.02 6.76c.12 4.35 4.62 7.66 7.3 10.67c1.19 1.34 1.29 3.01 2.46 4.27c.65.71 2.62 4.24 4.06 2.93c1.15-1.04-1.86-4.22-1.62-5.68c.13-.89 2.15.89 2.27 1.02c.84 1 1.28 2.44 1.72 3.65c.95 2.61 1.79 3.77 3.98 4.79c-.13 1.25 1.15 2.09 2.29 2.74c1.25.71 2.61.73 3.94 1.32c1.26.57 2.64.56 3.81 1.13c1.74.84.57 1.67 1.55 2.92c1.09 1.4 3.16.54 4.63.77c3.15.49 2.62 3.5 4.58 5.31c1.07 1.01 2.9.9 4.25 1.05c.53.06 1.22.07 1.64.45c1.05.93-.18 2.21-.58 3.12c-.55 1.22-.93 2.53-1.17 3.85c-.67 3.68-.53 7.79 2.15 10.64c2.92 3.11 6.49 4.52 7.6 8.96c.95 3.71.07 7.34-.61 11c-.42 2.2-3.43 6.02-.44 7.64c2.6 1.41 7.02-2.47 8.72-3.95c4.01-3.5 9.31-5.63 11.95-10.54c1.25-2.33 2.36-4.79 4.55-6.4c1.15-.85 2.48-1.41 3.71-2.12c2.61-1.49 4.17-4.66 5.34-7.29c1.38-3.19.11-4.99-2.39-6.86M61.9 26.46c.71-.17 1.67-.13 1.97-.06c1.15.28 2 1.18 2.88 1.9c.64.51 1.18 1.05 1.75 1.62c.37.37.72.7.64 1.31c-.06.53-.36.79-.84.84c-.87.09-1.26-.48-2.04-.61c-1.85-.31-2.62 2.81-4.47 1.96c-.47-.22-.33-.61-.33-1.11c-.01-.38 0-.72.14-1.05c.18-.42.47-.77.82-1.08c.22-.19.58-.34.75-.59c.41-.64-.17-1.32-.75-1.56c-.36-.15-.89-.16-1.12-.48c-.43-.61-.01-.93.6-1.09m74.12 34.62c-.02-3 .12-7.11-2.38-9.28c-2.31-2.01-5.16-.79-7.07 1.13c-3.7 3.73-5.2 10.77-2.12 15.3c1.14 1.68 2.59 3.08 4.49 3.52c1.86.43 5.41.66 6.32-1.24c.52-1.09.32-2.37.32-3.56c-.01-2.03.46-3.86.44-5.87" />
                            <path
                                d="M78.15 57.27c-.92-.46-1.27-1.24-1.88-1.86c-.3-.3-.66-.56-1.18-.72c-.98-.28-2.22-.17-3.23-.11c-1.49.09-5.29.34-5.48 2.43c-.25 2.67 3.42 2.37 5.24 2.34c1.25-.02 2.46-.48 3.71-.17c1.83.45 1.42 2.08 2.84 2.7c.51.22 2.09.52 2.58.56c1.82.16 6.19-.89 5.03-3.49c-1.05-2.39-5.76-.75-7.63-1.68" />
                        </g>
                    </svg> 永續生活
                </h2>
                <p class="mt-4 lead">🌳 環境責任</p>
                <ul>
                    <li>致力於減少碳足跡，推動綠色生產，並選擇可持續材料，保護地球環境。</li>
                    <li>積極推廣垃圾分類和回收，努力成為零廢棄企業。</li>
                </ul>

                <p class="mt-4 lead">🤝 社會責任</p>
                <ul>
                    <li>關注員工福祉，提供公平的職場機會與專業發展。</li>
                    <li>支持當地社區發展，舉辦義工活動，並捐助需要幫助的人群。</li>
                </ul>
                <p class="mt-4 lead">🔍 公司治理</p>
                <ul>
                    <li>公司遵循透明的管理體系，保障股東與投資者的利益。</li>
                    <li>加強內部監控，確保業務運營符合道德與法律規範。</li>
                </ul>

            </div>
            <div class="col">
                <h2>　</h2>
                <p class="mt-4 lead">⚡ ESG 活動與倡議</p>
                <ul>
                    <li>定期舉辦ESG主題工作坊，促進員工與社會大眾對可持續發展的關注。</li>
                    <li>積極參與全球ESG合作，與國際組織共同推動社會責任。</li>
                </ul>
                <p class="mt-4 lead">♻️ 碳中和行動</p>
                <ul>
                    <li>承諾實現碳中和目標，通過綠色能源和減排措施來減少碳排放，保護環境未來。</li>
                </ul>
                <p class="mt-4 lead">🔋 可持續能源</p>
                <ul>
                    <li>積極開發可再生能源技術，推動全球能源轉型，減少對傳統能源的依賴。</li>
                </ul>
                <p class="mt-4 lead">🌍 全球影響</p>
                <ul>
                    <li>與國際合作夥伴共同推動全球可持續發展目標，為社會創造更大的積極影響。</li>
                </ul>
            </div>
        </div>
    </div>


    <br><br><br>
    <div class="container-50 vh-self-50 text-center mt-3 py-1" style="margin-left: 12px; margin-right: 12px;">

        <div class="row g-2">
            <div class="col-4 img-hover">
                <p>
                    <!-- 點擊圖片時打開 modal -->
                    <img src="./images/食.png" alt="" style="width:100%" height="95%" data-bs-toggle="modal"
                        data-bs-target="#myModal">
                </p>
            </div>
            <div class="col-4">
                <p>
                    <img src="./images/住.png" alt="" style="width:100%" height="95%">
                </p>
            </div>
            <div class="col-4">
                <p>
                    <img src="./images/育樂.png" alt="" style="width:100%" height="95%">
                </p>
            </div>
        </div>
    </div>
    <div class="container-50 vh-self-50 text-center" style="margin-left: 12px; margin-right: 12px;">
        <div class="row g-2">
            <div class="col-4">
                <p>
                    <img src="./images/衣.png" alt="" style="width:100%" height="95%">
                </p>
            </div>
            <div class="col-4 img-hover">
                <p>
                    <a href="https://www.greenpoint.org.tw/GpHome/index.php/collect/vehicle"
                        title="Green Point 大眾運輸集綠點">
                        <img src="./images/行.png" alt="" style="width:100%" height="95%"></a>
                </p>
            </div>
            <div class="col-4">
                <p>
                    <img src="./images/購.png" alt="" style="width:100%" height="95%">
                </p>
            </div>
        </div>
    </div>


    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">超市 / 超商「惜食計畫」總整理 — 不只經濟實惠，還幫助減少食物浪費</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p>你是否也曾經為「今天晚餐吃什麼」而煩惱？如果還沒有頭緒，不妨考慮看看超市或超商的「惜食計畫」，以更優惠的價格，享受永續的一餐！<br>
                        <br>
                        根據聯合國環境署（UN Environment Programme）的報告，全球每年約 8-10% 的溫室氣體排放來自於食物浪費（Food Waste）；最新數據顯示，2022 年有約
                        10.5 億噸的食物被浪費，其中有四成來自餐飲服務和零售通路。面對食物浪費對環境帶來的挑戰，超市 / 超商開始關注「即期品報廢」的議題，紛紛推出「惜食計畫」—
                        提供即期品更優惠的價格，讓它們有機會免於被廢棄的命運。
                    </p>
                    <h4>歡迎到這些店家，找找這些計畫商品的蹤影！</h4>
                    <ul>
                        <li>
                            <a href="https://nevent.family.com.tw/cherishfood/" target="_cherishfood">
                                全家便利商店「友善食光」
                            </a>：<br>
                            全家便利商店以「時間定價」的科技系統打造「友善時光」商品，從下午五點開始，將自動調整商品價格，為當日晚上 12 點過期的鮮食商品，提供到期前 7 小時內打 7
                            折的優惠！不想錯過「友善食光」商品的朋友，可以下載全家便利商店 App 的「友善地圖」，透過「即時定位」、「收藏店舖」、及「單品搜尋」等功能，找到符合自身需求的商品，幫助減少食物浪費。
                        </li>
                        <br>
                        <li>
                            <a href="https://www.7-11.com.tw/event/lovefood/index.aspx" target="_lovefood">
                                7-ELEVEN「i 珍食」專案
                            </a>：<br>
                            7-ELEVEN 推出的「i 珍食」惜食專案，為上百種商品提供即期品優惠，共有「上午 10 點至下午 5 點」及「晚上 7 點至隔天凌晨 3 點」兩個優惠時段，提供 6.5 至 8
                            折的優惠，是少數從上午就有惜食優惠的超商，不只下午茶、晚餐，也能夠成為中午用餐的飲食選擇！
                            <br>
                            除了可以到各店面選購貼有專案標籤的商品，顧客也可以透過「OPEN PONIT」 APP 的「i 珍食地圖」事先查詢店家的庫存情況，或訂閱商品的到貨通知喔。
                        </li>
                        <br>
                        <li>萊爾富「惜福食堂」與 OK 超商：<br>
                            萊爾富的「惜福食堂」從晚上 6 點開張至 12 點，提供將在 6 小時內到期的鮮食商品 7 折優惠； OK 超商的即期品優惠時段則為下午 4 點半至晚上 10 點半，提供即期鮮食 6
                            折優惠。歡迎前往店家，透過標籤、找到他們的蹤影。
                        </li>
                        <br>
                        <li>全聯福利中心「惜食計畫」：<br>
                            全聯福利中心提供全天候的惜食優惠，從早上 8 點至下午4 點，顧客都可以前往超市選購 8 折優惠的即期商品，品項包含麵包、糕點、肉品及生鮮等；部分商品將在下午四點後再次調降至 6
                            折。此外，全聯也和門市附近的社福團體合作，將即期或賣相不佳的惜食商品，貢獻於弱勢族群的供餐服務，讓食物資源得以被盡可能地運用，也形成在地的共享網絡。
                        </li>
                        <br>
                        <li>家樂福續食捐贈計畫：<br>
                            除了不定期在晚間時段提供鮮食商品折扣優惠，從 2016
                            年開始，部分2家樂福門市每天都會將未銷售完、但仍然可食用的食物資源捐贈給食物銀行，這些食物將成為美味的餐食，分送給需要的單位、團體，讓剩食能夠適得其所，免於無家可歸、最終被廢棄的命運。至
                            2023 年，已經有 230 家門市加入這項「續食捐贈計畫」！ </li>
                        <br>

                        <img src="./images/惜食.png" alt="昔食" style="width:100%" height="95%">

                        <li>同場加映：Tasteme 給「良」食一次機會：<br>
                            除了讓超市 / 超商的「惜食計畫」成為日常的飲食選擇，我們也可以透過 Tasteme 平台，給「良」食一次機會！Tasteme
                            以「食物零浪費」作為行動出發點，建立了一個線上線下虛實整合、串連店家與消費者的平台。
                            <br>
                            店家上架即期餐點 / 商品後，顧客便可以優惠的價格下單訂購，讓「即期良品」不被浪費。目前已有好丘、臺虎精釀、新東陽、洪瑞珍、CoCo
                            都可、順成蛋糕等近千間店家加入，成為實惠又永續、雙贏的飲食方案。
                            <br>
                            如果這些店家中有你喜歡的商品，不妨嘗試看看！
                        </li>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">關閉</button>
                </div>

            </div>
        </div>
    </div>





    <div class="container-fluid">
        <div class="card mt-4 shadow-sm">
            <!-- <div class="card-header text-black" style="background-color: #C9B49F;">
                展示區
            </div> -->
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- 左翻按鈕 -->
                    <button class="btn btn-secondary" id="prevBtn" onclick="moveLeft()">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <!-- 圖片區域 -->
                    <div class="d-flex overflow-hidden w-100">
                        <div class="d-flex" id="image-gallery" style="transition: transform 0.3s ease-in-out;">
                            <?php
                        $imgs = $Image->all(['sh' => 1]);
                        foreach ($imgs as $idx => $img) {
                            echo "<div class='image-item' id='ssaa{$idx}' style='flex: 0 0 32%; margin-right: 10px;'>"; // 這裡修改了 flex 寬度，讓每個圖片佔 32% 寬度
                            echo "<div class='img-container' style='width: 450px; height: 450px; overflow: hidden;'>";
                            echo "<img src='./upload/{$img['img']}' class='img-fluid rounded' style='width: cover; height: cover; object-fit: cover; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);' />";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                        </div>
                    </div>

                    <!-- 右翻按鈕 -->
                    <button class="btn btn-secondary" id="nextBtn" onclick="moveRight()">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>



    <script>
    let currentIndex = 0; // 當前顯示的圖片區域
    const imagesPerPage = 3; // 每次顯示 3 張圖片
    const imageWidth = 350; // 每張圖片的寬度 (調整成更適合 3 張顯示的大小)270
    const imageSpacing = 100; // 圖片之間的間隙
    const imageItems = document.querySelectorAll('.image-item'); // 所有圖片項目
    const totalImages = imageItems.length; // 總圖片數量
    const imageGallery = document.getElementById('image-gallery');

    // 計算容器的總寬度，這裡使用 Math.floor 來確保寬度沒有浮動誤差
    const containerWidth = Math.floor(imagesPerPage * (imageWidth + imageSpacing) - imageSpacing); // 確保容器寬度整除圖片的寬度

    // 設定圖片容器寬度
    imageGallery.style.width = `${containerWidth}px`;

    // 更新箭頭顯示邏輯
    function updateArrows() {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex >= totalImages - imagesPerPage;
    }

    // 左箭頭移動
    function moveLeft() {
        if (currentIndex > 0) {
            currentIndex--;
            updateImagePosition();
        }
    }

    // 右箭頭移動
    function moveRight() {
        if (currentIndex < totalImages - imagesPerPage) {
            currentIndex++;
            updateImagePosition();
        }
    }

    // 更新圖片顯示位置
    function updateImagePosition() {
        // 計算平移量，確保是整數倍，避免浮動誤差
        const offset = -currentIndex * (imageWidth + imageSpacing);
        imageGallery.style.transform = `translateX(${offset}px)`; // 平移圖片區域

        // 更新箭頭
        updateArrows();
    }

    // 初始化顯示
    updateArrows();
    </script>



    <br>
    <hr class="featurette-divider" id="page2"><br>

    <div class="container px-4 py-5" id="custom-cards" onclick="" data-aos="fade-up" data-aos-delay="200">
        <h3 class="pb-1 fw-bold " style="color: olivedrab">🌱 淨零排放</h2>
            <h2 class="fw-bold" style="color: sienna;">你一定要知道的碳知識</h2>
            <p class="py-1 fw-bold" style="color: grey;">
                2025年碳費開徵，從關鍵字文字雲發現，網友最常搜尋碳相關詞彙，包括碳費vs.碳稅、碳足跡盤查vs.碳盤查、碳中和vs.淨零排放，一次釐清，破解你的碳焦慮。
            </p>
            <div>
                <iframe width="100%" height="350" src="https://cdn.wordart.com/iframe/2wkcy74bc2n7"></iframe>
            </div>

            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-4">
                <div class="col" style="text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);">
                    <div
                        class="card card-cover h-100 overflow-hidden text-bg-white rounded-4 shadow-lg img-hover position-relative">
                        <!-- 加上一層淡化背景層 -->
                        <div class="position-absolute top-0 bottom-0 start-0 end-0"
                            style="background-image: url('./images/16.jpg'); background-size: cover; background-position: center; opacity: 0.5;">
                        </div>

                        <!-- 文字層不受影響 -->
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-dark text-shadow-1 position-relative">
                            <h3 class="mt-2 mb-4 lh-1 fw-bold">
                                什麼是碳費？哪些人需要繳交碳費？
                            </h3>
                            <p>碳費（Carbon
                                fee）是國際常用碳定價工具，是指「針對排放二氧化碳的行為」所徵收的費用。我國碳費徵收由環境部規劃，費率訂為每噸碳300元，2026年正式開始徵收，徵收對象為溫室氣體年排放量達2.5萬噸的電力、燃氣供應業及製造業，首批徵收業者超過500家，約1.55億噸碳排，占全國總排放量的54%。
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col" style="text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);">
                    <div class="card card-cover h-100 overflow-hidden text-bg-white rounded-4 shadow-lg img-hover"
                        style="background-color: rgba(60, 210, 210, 0.3); background-size: cover; background-position: center;">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-dark text-shadow-1">
                            <h3 class="mt-2 mb-4 lh-1 fw-bold" style="color: lightseagreen;">
                                碳費與碳稅有何不同？
                            </h3>
                            <p>碳費、碳稅兩者都是以價制量，藉由「碳排放貼上價格標籤」，提供企業經濟誘因，達到實質減少溫室氣體排放的目標。台灣採用碳費制度，碳費由「環境部」徵收，以專款專用方式使用在環境保護行動上；而國際上如英國、日本、加拿大等國，則由財政單位徵收碳稅（Carbon
                                Tax），用途較廣，包含社會福利、所得稅減免、發展各項低碳基礎建設等。.5萬噸的電力、燃氣供應業及製造業，首批徵收業者超過500家，約1.55億噸碳排，占全國總排放量的54%。
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col" style="text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);">
                    <div
                        class="card card-cover h-100 overflow-hidden text-bg-white rounded-4 shadow-lg img-hover position-relative">
                        <!-- 加上一層淡化背景層 -->
                        <div class="position-absolute top-0 bottom-0 start-0 end-0"
                            style="background-image: url('./images/14.webp'); background-size: cover; background-position: center; opacity: 0.5;">
                        </div>

                        <!-- 文字層不受影響 -->
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-dark text-shadow-1 position-relative">
                            <h3 class="mt-2 mb-4 lh-1 fw-bold">
                                碳足跡盤查、碳盤查有何不同？
                            </h3>
                            <p>碳足跡盤查與碳盤查都是針對溫室氣體排放量進行調查，最大的不同是調查對象，碳足跡盤查主要針對「產品或服務」的生命周期，而碳盤查主要鎖定「企業及組織」在營運過程中產生多少碳排。
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col" style="text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);">
                    <div class="card card-cover h-100 overflow-hidden text-bg-white rounded-4 shadow-lg img-hover"
                        style="background-color: rgba(110, 150, 150, 0.3); background-size: cover; background-position: center;">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-dark text-shadow-1">
                            <h3 class="mt-2 mb-4 lh-1 fw-bold" style="color: gray">
                                碳中和、淨零排放有什麼不同？
                            </h3>
                            <p>碳中和專注於控制驟增的二氧化碳（CO₂），卻忽略甲烷（CH₄）、氧化亞氮（N₂O）等暖化潛力更高的溫室氣體，取而代之的淨零排放（Net
                                Zero）成為減緩氣候變遷主要訴求，目的在於讓所有種類的溫室氣體排放量與削減量達到平衡。淨零排放不是不排放，而是努力讓人為造成的溫室氣體排放極小化，再用負碳技術（移除碳排放量）、森林碳匯（種樹造林）等方法抵銷，達到淨零排放。
                            </p>
                        </div>
                    </div>
                </div>

                <div class=" col" style="text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);">
                    <div
                        class="card card-cover h-100 overflow-hidden text-bg-white rounded-4 shadow-lg img-hover position-relative">
                        <!-- 加上一層淡化背景層 -->
                        <div class="position-absolute top-0 bottom-0 start-0 end-0"
                            style="background-image: url('./images/15.gif'); background-size: cover; background-position:center; opacity: 0.5;">
                        </div>

                        <!-- 文字層不受影響 -->
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-dark text-shadow-1 position-relative">
                            <h3 class="mt-2 mb-4 lh-1 fw-bold">
                                台灣碳權交易現況是什麼？
                            </h3>
                            <p>台灣2023年8月7日正式掛牌「台灣碳權交易所（簡稱碳交所）」，在同年12月22日啟動「國際碳權交易平台」，首批上架7個碳權專案，包括潔淨水源、太陽能發電、風力發電和沼氣發電。共27家企業參與（含金控子公司合計45家），共交易8.8萬噸二氧化碳當量碳權，成交價格介於每公噸3.9到12美元。
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col" style="text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);">
                    <div class="card card-cover h-100 overflow-hidden text-bg-white rounded-4 shadow-lg img-hover"
                        style="background-color: rgba(50, 200, 150, 0.3); background-size: cover; background-position: center;">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-dark text-shadow-1">
                            <h3 class="mt-2 mb-4 lh-1 fw-bold" style="color: olivedrab;">
                                台灣人均碳排放量多少？
                            </h3>
                            <p>根據2024年中華民國國家溫室氣體排放清冊報告，台灣2022年燃料燃燒二氧化碳排放量為257,958千公噸二氧化碳當量（不包括二氧化碳移除量），占總溫室氣體排放量90.20%。2022年平均一個人11.06公噸二氧化碳當量，相較於1990年人均排放量約5.41公噸二氧化碳當量，30年已增加兩倍以上。
                            </p>

                        </div>
                    </div>
                </div>
            </div>
    </div>

    <br>
    <hr class=" featurette-divider" id="page3">


    <div class="container my-5" data-aos="fade-up" data-aos-delay="100">
        <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5">
            <!-- <button type="button"
                class="position-absolute top-0 end-0 p-3 m-3 btn-close bg-secondary bg-opacity-10 rounded-pill"
                aria-label="Close"></button>
            <svg class="bi mt-5 mb-3" width="48" height="48">
                <use xlink:href="#check2-circle" />
            </svg> -->
            <h1 class="fw-bold" style="color: sienna">【 學習有趣　挑戰無懼 】</h1>
            <main class="form-signin w-100 m-auto">
                <form>
                    <!-- 點擊圖片觸發新視窗 -->
                    <img src="./images/綠寶家族.png" alt="Bootstrap" width="100%" height="100%" onclick="openNewWindow()"
                        style="cursor: pointer;">
                </form>
            </main>
        </div>
    </div>

    <script>
    function openNewWindow() {
        // 指定目標網址
        const webpageUrl = "https://greenlifestyle.moenv.gov.tw/gamePage"; // 替換為你要開啟的目標網址

        // 設定視窗屬性
        const windowFeatures = "width=1200,height=1000 ,resizable=yes,scrollbars=yes";

        // 彈出新視窗
        const newWindow = window.open(webpageUrl, "_blank", windowFeatures);

        // 判斷是否成功開啟
        if (!newWindow || newWindow.closed || typeof newWindow.closed === "undefined") {
            alert("無法開啟新視窗，請檢查瀏覽器是否允許彈出視窗。");
        }
    }
    </script>


    <hr class="featurette-divider">

    <div class="container mt-3 container-fluid py-5">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">First featurette heading.
                    <span class="text-body-secondary">It’ll blow your mind.</span>
                </h2>
                <p class="lead">Some great placeholder content for the first featurette
                    here. Imagine some exciting
                    prose
                    here.</p>
            </div>
            <div class="col-md-5">
                <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%" y="50%"
                        fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                </svg> -->
                <div>
                    <iframe width="100%" height="315"
                        src="https://e.infogram.com/_/otGU0mto27YU9MmYc0w3?parent_url=https%3A%2F%2Fesg.tvbs.com.tw%2Fexhibition%2Fcarbon-footprint-verification%2F2025-jan%2Findex.html&amp;src=embed#async_embed"
                        scrolling="no" frameborder="0" allowfullscreen="" title="1990年至2022年總溫室氣體排放量和移除量趨勢"
                        style="border: none;"></iframe>
                </div>
            </div>
        </div>



        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-6 order-md-2">
                <div class="row g-4 py-5 row-cols-1 row-cols-lg-2">
                    <div class="feature col">
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#collection" />
                            </svg>
                        </div>
                        <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                        <p>https://cfp-calculate.tw/cfpc/Carbon/WebPage/visitors/FLProductinfo.aspx</p>
                        <a href="#" class="icon-link">
                            Call to action
                            <svg class="bi">
                                <use xlink:href="#chevron-right" />
                            </svg>
                        </a>
                    </div>
                    <div class="feature col">
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#people-circle" />
                            </svg>
                        </div>
                        <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                        <p>Paragraph of text beneath the heading to explain the heading.
                            We'll add onto it with
                            another
                            sentence
                            and probably just keep going until we run out of words.</p>
                        <a href="#" class="icon-link">
                            Call to action
                            <svg class="bi">
                                <use xlink:href="#chevron-right" />
                            </svg>
                        </a>
                    </div>
                    <div class="feature col">
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#people-circle" />
                            </svg>
                        </div>
                        <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                        <p>Paragraph of text beneath the heading to explain the heading.
                            We'll add onto it with
                            another
                            sentence
                            and probably just keep going until we run out of words.</p>
                        <a href="#" class="icon-link">
                            Call to action
                            <svg class="bi">
                                <use xlink:href="#chevron-right" />
                            </svg>
                        </a>
                    </div>
                    <div class="feature col">
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#people-circle" />
                            </svg>
                        </div>
                        <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                        <p>Paragraph of text beneath the heading to explain the heading.
                            We'll add onto it with
                            another
                            sentence
                            and probably just keep going until we run out of words.</p>
                        <a href="#" class="icon-link">
                            Call to action
                            <svg class="bi">
                                <use xlink:href="#chevron-right" />
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-md-6 order-md-1">
                <p>1212</p>

                <div class="carousel-item active">
                    <a href="https://www.youtube.com/watch?v=_KoEb4LZPaU" title="淨零知多少—政策及相關法規"><img
                            src="/images/2050.jpg" class="d-block w-100"> </a>
                </div>
                <div>
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/zAMz24kZBSw?si=zQPEqaIp7DkOVV_4" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>



            </div>
        </div>

    </div>











    <!-- container2 -->
    <!-- <div id="page1"></div> -->
    <div class="container mt-3 container-fluid py-5">
        <h2 class="text-danger">📢 優惠商品</h2>
        <p class="specialDiscount mt-3">
            <b>🔔 歡慶佳節限時折扣： 🦌 滿 800 元 打 8 折 🛷 滿千送神祕小禮 🎁 ~【 數量有限，送完為止 】</b>
        </p>

        <div class="row">
            <!-- 左側欄位 - 產品介紹表格 -->
            <div class="col-md-7">
                <div>
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/zAMz24kZBSw?si=zQPEqaIp7DkOVV_4" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

            </div>

            <!-- 右側欄位 - 影片 -->
            <div class="col-md-5 container-fluid">
                <h2>videos</h2>

                <div>
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/_KoEb4LZPaU?si=tD_fXP5JOncX4cLy" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

                <div>
                    <iframe width="100%" height="315"
                        src="https://e.infogram.com/_/otGU0mto27YU9MmYc0w3?parent_url=https%3A%2F%2Fesg.tvbs.com.tw%2Fexhibition%2Fcarbon-footprint-verification%2F2025-jan%2Findex.html&amp;src=embed#async_embed"
                        scrolling="no" frameborder="0" allowfullscreen="" title="1990年至2022年總溫室氣體排放量和移除量趨勢"
                        style="border: none;"></iframe>
                </div>

                <div>
                    <li id="ctl00_holderSlider_wUctlSlideAD1_repSlideAD_ctl03_liSlideAD"
                        style="background-repeat: no-repeat; background-position: center center; overflow: hidden; background-image: url(&quot;https://www.moeaea.gov.tw/ECW/content_images/3022.jpg?565123098&quot;); float: none; list-style: none; position: absolute; width: 646px; z-index: 0; display: none;"
                        class="liSlideAD">
                        <a id="ctl00_holderSlider_wUctlSlideAD1_repSlideAD_ctl03_lnkSlideAD" title="另開視窗，連結到節約能源"
                            data-toggle="tooltip" href="../../ad04/home/Home.aspx" target="_blank"
                            style="width: 100%; display: block;"><img
                                id="ctl00_holderSlider_wUctlSlideAD1_repSlideAD_ctl03_imgSlideAD"
                                src="https://www.moeaea.gov.tw/ECW/content_images/3022_s.jpg" alt="節約能源"
                                style="border-width:0px;width: 100%;"></a>
                    </li>
                </div>

                <div>
                    <li id="ctl00_holderSlider_wUctlSlideAD1_repSlideAD_ctl04_liSlideAD"
                        style="background-repeat: no-repeat; background-position: center center; overflow: hidden; background-image: url(&quot;https://www.moeaea.gov.tw/ECW/content_images/3023.jpg?1473752652&quot;); float: none; list-style: none; position: absolute; width: 646px; z-index: 0; display: none;"
                        class="liSlideAD">
                        <a id="ctl00_holderSlider_wUctlSlideAD1_repSlideAD_ctl04_lnkSlideAD" title="另開視窗，連結到總體能源政策"
                            data-toggle="tooltip" href="../../ad05/home/Home.aspx" target="_blank"
                            style="width: 100%; display: block;"><img
                                id="ctl00_holderSlider_wUctlSlideAD1_repSlideAD_ctl04_imgSlideAD"
                                src="https://www.moeaea.gov.tw/ECW/content_images/3023_s.jpg" alt="總體能源政策"
                                style="border-width:0px;width: 100%;"></a>
                    </li>
                </div>
            </div>
        </div>


        <div class="container mt-4">
            <h2 style="color: indianred;">碳足跡資料查詢</h2>
            <p>可以依照「係數名稱」搜尋，並依照公告年份排序。</p>

            <!-- 搜尋框 -->
            <div class=" mb-3">
                <label for="searchInput" class="form-label">搜尋 係數名稱：</label>
                <input type="text" class="form-control" id="searchInput" placeholder="輸入係數名稱搜尋...">
            </div>

            <!-- 資料表格 -->
            <div id="myTableWrapper">
                <table class="table table-hover table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>係數名稱</th>
                            <th>碳足跡數值 (kgCO2e)</th>
                            <th>宣告單位</th>
                            <th>政府部門/公司名稱</th>
                            <th>公告年份</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 資料行會動態填充 -->
                    </tbody>
                </table>
            </div>
        </div>


        <!-- 引入 Bootstrap 5 和 jQuery 的 JS -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
        $(document).ready(function() {
            const myTable = $('#myTable'); // 取得表格的 jQuery 物件
            const myTbody = myTable.find('tbody'); // 取得表格的 tbody 物件
            const searchInput = $('#searchInput'); // 取得搜尋框的 jQuery 物件

            // 資料檔案 URL（假設資料是放在 data/data2.json）
            let url = `./data/data.json`;

            // 使用 AJAX 載入 JSON 資料
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(res) {
                    // 依公告年份降序排列資料
                    res.records.sort((a, b) => parseInt(b.announcementyear) - parseInt(a
                        .announcementyear));

                    // 清空表格資料
                    myTbody.empty();

                    // 遍歷 JSON 中的資料並添加到表格中
                    res.records.forEach(function(item) {
                        let row = `
                                <tr>
                                    <td>${item.name}</td>
                                    <td>${item.coe}</td>
                                    <td>${item.unit}</td>
                                    <td>${item.departmentname}</td>
                                    <td>${item.announcementyear}</td>
                                </tr>
                            `;
                        myTbody.append(row); // 將新的一行資料加入表格
                    });

                    // 搜尋過濾功能：即時過濾表格資料
                    searchInput.on('input', function() {
                        let query = searchInput.val().toLowerCase(); // 取得搜尋框中的內容並轉為小寫

                        // 遍歷表格中的每一行資料
                        myTbody.find('tr').each(function() {
                            let row = $(this);
                            let coefficientName = row.find('td').first().text()
                                .toLowerCase(); // 取得「係數名稱」並轉為小寫

                            // 判斷係數名稱是否包含搜尋關鍵字
                            if (coefficientName.includes(query)) {
                                row.show(); // 顯示符合條件的資料行
                            } else {
                                row.hide(); // 隱藏不符合條件的資料行
                            }
                        });
                    });
                },
                error: function(err) {
                    console.log('錯誤：無法載入資料', err);
                }
            });
        });
        </script>


        <hr class="featurette-divider" id="page4">
        <br>&nbsp;

        <!-- container3 -->
        <div class="container mt-2 container-fluid py-6">
            <h2 class="text-danger">🏢 店鋪資訊</h2>

            <div class="row">
                <!-- 左側欄位 - 產品介紹表格 -->
                <div class="col-md-8 img-fluid" data-aos="fade-up" data-aos-delay="200">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.7036499805677!2d121.41694067537684!3d25.04412927780987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a7bec9ad74b1%3A0xa639904a89f26435!2z5Yue5YuV6YOo5Yue5YuV5Yqb55m85bGV572y5YyX5Z-65a6c6Iqx6YeR6aas5YiG572y5rOw5bGx6IG35qWt6KiT57e05aC0!5e0!3m2!1szh-TW!2stw!4v1734597116467!5m2!1szh-TW!2stw"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>

                <!-- 左側欄位 - 產品介紹表格 -->
                <div class="col-md-4">
                    <br><br><br><br><br>
                    <h2 class="featurette-heading fw-normal lh-1" style="color: lightcoral;">🛍️ 泰山店
                        <span class="text-body-secondary">本鋪
                        </span>
                    </h2>
                    <p class="lead mt-4">🕗 營業時間：</p>
                    <ul>
                        <li>週一：08:00-17:00</li>
                        <li>週二：08:00-17:00</li>
                        <li>週三：08:00-17:00</li>
                        <li>週四：08:00-17:00</li>
                        <li>週五：08:00-17:00</li>
                        <!-- 
                        <li>週六：10:00-19:00</li>
                        <li>週日：10:00-19:00</li> 
                        -->
                    </ul>
                    <p class="lead">
                        🗺️ 地址：<br>
                        <a class=" lead" href="https://maps.app.goo.gl/1Jt4cp4Siop6ftDy5">新北市泰山區貴子里致遠新村55之1號</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- FOOTER -->
    <div class="container" data-aos="fade-up" data-aos-delay="200">
        <footer class="py-2">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>關於我們</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#page0" class="nav-link p-0 text-body-secondary">👑
                                服務特色</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#page1" class="nav-link p-0 text-body-secondary">🛍️
                                商品及服務</a>
                        </li>
                        <li class="nav-item mb-2"><a href="HR_form.html" class="nav-link p-0 text-body-secondary">👍
                                人才招募</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#page0" class="nav-link p-0 text-body-secondary">🌳
                                永續承諾</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>會員中心</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a href="signup.html" class="nav-link p-0 text-body-secondary">
                                👥 加入會員
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="signup.html" class="nav-link p-0 text-body-secondary">
                                👤 註冊線上會員
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="login.html" class="nav-link p-0 text-body-secondary">
                                👤 登入線上帳戶
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#page0" class="nav-link p-0 text-body-secondary">💬
                                常見問與答</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>店鋪相關服務</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#page0" class="nav-link p-0 text-body-secondary">🏠
                                關於我們</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#page1" class="nav-link p-0 text-body-secondary">🛍️
                                商品分類</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#page2" class="nav-link p-0 text-body-secondary">✨
                                新品預告</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#page3" class="nav-link p-0 text-body-secondary">📢
                                優惠商品</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#page4" class="nav-link p-0 text-body-secondary">🏢
                                店鋪資訊</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5>📌 訂閱我們的電子報</h5>
                        <p>免費領取掌握每月摘要新鮮事</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">電子郵件</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="電子郵件">
                            <button class="btn btn-primary" type="button">訂閱</button>
                        </div>
                    </form>
                    <h5 class="py-3">
                        進站總人數 :
                        <?=$Total->find(1)['total'];?>
                    </h5>
                </div>
            </div>

            <div
                class="container d-flex flex-column flex-sm-row justify-content-between py-1 my-1 align-items-center border-top">
                <p class="mt-4">&copy; <?=$Bottom->find(1)['bottom'];?>
                    &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a>
                </p>

                <!-- 社交媒體圖示連結 -->

                <div class="social-icons d-flex justify-content-center">
                    <p class="mt-4">追蹤我們 :</p>
                    <a href="https://www.facebook.com" target="_blank" class="text-decoration-none mt-3">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a href="https://www.instagram.com" target="_blank" class="text-decoration-none mt-3">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://line.me" target="_blank" class="text-decoration-none mt-3">
                        <i class="fab fa-line"></i>
                    </a>
                </div>

                <!-- 🔝 ↥ -->
                <p class="float-end mt-2 mb-0">
                    <a href="#">回頂端
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                            <path fill="#3cc89a"
                                d="M11 11.8V15q0 .425.288.713T12 16t.713-.288T13 15v-3.2l.9.9q.275.275.7.275t.7-.275t.275-.7t-.275-.7l-2.6-2.6q-.3-.3-.7-.3t-.7.3l-2.6 2.6q-.275.275-.275.7t.275.7t.7.275t.7-.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22" />
                        </svg>
                    </a>
                </p>
            </div>
        </footer>

        <!-- js include 順序 1.bs 2.jq 3.self -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"
            integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
        $(document).ready(function() {

        });
        </script>

        </script>

        <!-- 引入AOS的JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script>
        // 初始化AOS
        AOS.init({
            offset: 100, // 設置滾動觸發的偏移量
            delay: 0, // 設置動畫延遲時間
            duration: 600, // 設置動畫持續時間
            easing: 'ease-in-out', // 設置動畫的緩動效果
            once: true, // 設置動畫只觸發一次
        });
        </script>

        <script>
        // 當頁面滾動時，檢查滾動的位置並控制標題的固定效果
        window.onscroll = function() {
            let title = document.getElementById("stickyTitle");
            if (window.scrollY > 180) {
                title.classList.add("fixed-top");
            } else {
                title.classList.remove("fixed-top");
            }
        };
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>



</body>

</html>