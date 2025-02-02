<?php
if (isset($_SESSION['login'])) {
    header("Location: admin.php");
    exit();
}

if (isset($_POST['acc'])) {
    $row = $Admin->find(['acc' => $_POST['acc'], 'pw' => $_POST['ps']]);

    if (!empty($row)) {
        $_SESSION['login'] = 1;
        header("Location: admin.php");
        exit();
    } else {
        echo "<script>alert('帳號或密碼錯誤');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理員登入</title>

    <!-- 引入 Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
</head>

<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f8f9fa;">

    <div class="container">
        <!-- Login Form -->
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>管理員登入區</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="?do=login">
                            <div class="mb-3">
                                <label for="acc" class="form-label">帳號：</label>
                                <input type="text" class="form-control" name="acc" id="acc" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="ps" class="form-label">密碼：</label>
                                <input type="password" class="form-control" name="ps" id="ps" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">登入</button>
                                <button type="reset" class="btn btn-secondary">清除</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 引入 Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>