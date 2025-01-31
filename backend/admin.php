<div class="di" style="height:540px; border:#00 1px solid; width:100%; margin:2px 2px 0px 2px; float:left; position:relative;text-align-last: center;
    text-align: -webkit-center;">
    <!--正中央-->
    <?php include_once "logout.php";?>

    <div style="width:99%; height:95%; margin:auto; overflow:auto; border:#00 1px solid;">
        <h2 class="t cent botli" style="color: rgb(52 85 48); margin-bottom: 20px;">
            <strong>管理者帳號管理</strong>
        </h2>
        <form method="post" action="./api/edit.php">
            <table width="70%">
                <tbody>
                    <tr class="yel">
                        <td width="20%">帳號</td>
                        <td width="20%">密碼</td>
                        <td width="10%">刪除</td>
                    </tr>
                    <?php
                    $rows=$Admin->all();
                    foreach($rows as $row){           
                        // if($row['acc']!='admin'){   如果你想判斷如果使用者不是admin就不讓它進來    
                    ?>
                    <tr>
                        <td>
                            <input style="width:230px;height:36px;" type="text" name="acc[]" value="<?=$row['acc'];?>">
                        </td>
                        <td>
                            <input style="width:250px;height:36px;" type="password" name="pw[]"
                                value="<?=$row['pw'];?>">
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </tr>
                    <?php
                    }
                // }
                    ?>
                </tbody>
            </table>

            <!-- [#39;] 代表['] -->
            <table style="margin-top:40px; width:60%;">
                <tbody>
                    <tr>
                        <td width="30%">
                            <!-- 觸發 Modal 的按鈕 -->
                            <input class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTitleImageModal"
                                value="新增管理者帳號" onclick="loadModalContent('./modal/<?=$do;?>.php?table=<?=$do;?>')">
                        </td>
                        <td class="cent">
                            <input type="hidden" name="table" value="<?=$do;?>">
                            <input type="submit" value="修改確定" class="btn btn-warning">
                            <input type="reset" value="　重置　" class="btn btn-danger">
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>
</div>