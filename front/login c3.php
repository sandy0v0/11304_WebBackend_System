<?php
// 確保 session 開始

// 如果已經登入，直接跳轉到管理頁面
if(isset($_SESSION['login'])){
    header("Location: admin.php");
    exit();
}

if(isset($_POST['acc'])) {
    // 假設 $Admin 是用來處理資料庫查詢的對象
    $row = $Admin->find(['acc' => $_POST['acc'], 'pw' => $_POST['ps']]);
    
    // 如果帳號密碼正確
    if (!empty($row)) {
        $_SESSION['login'] = 1;  // 設定 session，表示已登入
        echo "<script>
                alert('登入成功');
                window.location.href = 'admin.php'; // 登入成功後重定向
              </script>";
    } else {
        echo "<script>alert('帳號或密碼錯誤');</script>"; // 顯示錯誤提示
    }
}
?>



<!-- Modal 登入 -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">管理員登入</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="?do=login">
                    <!-- 修改 action 為 ?do=login -->
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

<!-- 引入 Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>