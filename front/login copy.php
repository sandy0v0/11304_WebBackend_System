<?php
// 登入畫面，有20分，可以先做
if(isset($_SESSION['login'])){
	to("admin.php");
	exit();	
}

if(isset($_POST['acc'])) {
    // 假設 $Admin 是一個用來處理資料庫查詢的對象
    // 我表單的資料設定叫name是ps [同頁面的這段<input name="ps" type="password">]
    $row=$Admin->find(['acc'=>$_POST['acc'],'pw'=>$_POST['ps']]);
    // 我只要確認row不是空的，我的acc跟pw有=我設定的帳密，因為我上面已經判斷一次是否符合，所以我下面這段可不用再寫一次
    // if(!empty($row) && $row['acc']==$_POST['acc'] && $row['pw']==$_POST['ps']){

    // 只要不是空的，就判斷他登入成功
    if(!empty($row)){
        // session_start();
        // 設置 session，表示用戶已登入
        $_SESSION['login']=1;
        to("admin.php");
    }else{
        // 執行script 只執行一次，正確的話進入後台；錯誤的話回到login並顯示錯誤訊息
        echo "<script>alert('帳號或密碼錯誤')</script>";
    }
}
?>

<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    </marquee>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->

    <!-- 刪除 target="back" -->
    <form method="post" action="?do=login">
        <p class="t botli">管理員登入區</p>
        <p class="cent">帳號 ： <input name="acc" autofocus="" type="text"></p>
        <p class="cent">密碼 ： <input name="ps" type="password"></p>
        <p class="cent"><input value="送出" type="submit"><input type="reset" value="清除"></p>
    </form>
</div>

<div class="modal fade di" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">管理員登入</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="?do=login.php">
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