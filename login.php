<?php
include_once "api/db.php"; // 引入資料庫連線檔案

if(isset($_SESSION['login'])){
	to("admin.php");
	exit();	
}

if (isset($_POST['acc'])) { // 如果有提交帳號
	// 查詢帳號和密碼是否正確
	$row = $Admin->find(['acc' => $_POST['acc'], 'pw' => $_POST['ps']]);

	// 如果找到對應的帳號密碼
	if (!empty($row)) {
		// 登入成功，設定 session 來標記已登入
		$_SESSION['login'] = 1;
		$_SESSION['user_id'] = $row['id']; // 可以儲存用戶 ID 在 session 中
        $_SESSION['username'] = $row['acc']; // 儲存用戶名稱在 session 中
		header("Location: admin.php"); // 轉到管理頁面
		exit();
	} else {
		// 如果帳號密碼錯誤，顯示錯誤訊息
		echo "<script>alert('帳號或密碼錯誤')</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理員登入</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f4f7fc;
        font-family: 'Arial', sans-serif;
        background-image: url(../upload/flora.jpg);
    }

    .login-container {
        max-width: 500px;
        margin-top: 80px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .card-header {
        background-color: #f5deb3;
        color: white;
        text-align: center;
        border-radius: 15px 15px 0 0;
        padding: 25px;
    }

    .btn-primary {
        background-color: #f5deb3;
        border-color: #f5deb3;
        padding: 12px 18px;
    }

    .btn-primary:hover {
        background-color: #8B4513;
        border-color: #8B4513;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px;
    }

    .alert {
        border-radius: 10px;
        background-color: #ffcccc;
        color: #d8000c;
    }

    .forgot-password {
        text-align: center;
        font-size: 16px;
        margin-top: 15px;
    }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center">
        <div class="login-container">
            <div class="card">
                <div class="card-header">
                    <h4>管理員登入</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="acc" class="form-label">帳號</label>
                            <input name="acc" id="acc" type="text" class="form-control" placeholder="請輸入帳號" autofocus
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="ps" class="form-label">密碼</label>
                            <input name="ps" id="ps" type="password" class="form-control" placeholder="請輸入密碼" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">登入</button>
                            <button type="reset" class="btn btn-secondary">清除</button>
                        </div>
                    </form>
                    <!-- 顯示錯誤訊息 -->
                    <?php if (!empty($row) && isset($_POST['acc']) && isset($_POST['ps'])): ?>
                    <div class="alert mt-3">帳號或密碼錯誤</div>
                    <?php endif; ?>
                    <div class="forgot-password">
                        <a href="#">忘記密碼?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>