<div class="di" style="height:540px; border:#00 1px solid; width:100%; margin:2px 2px 0px 2px; float:left; position:relative;text-align-last: center;
    text-align: -webkit-center;">
    <!--正中央-->
    <?php include_once "logout.php";?>

    <div style="width:99%; height:95%; margin:auto; overflow:auto; border:#00 1px solid;">
        <h2 class="t cent botli" style="color: rgb(52 85 48); margin-bottom: 20px;">
            <strong>選單管理</strong>
        </h2>
        <form method="post" action="./api/edit.php">
            <table width="80%">
                <tbody>
                    <tr class="yel">
                        <td width="30%">主選單名稱</td>
                        <td width="30%">選單連結網址：</td>
                        <td width="10%">次選單數</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    $rows=$Menu->all(['main_id'=>0]);
                    foreach($rows as $row){
                        
                    ?>
                    <tr>
                        <td>
                            <input style="width:230px;height:36px;" type="text" name="text[]"
                                value="<?=$row['text'];?>">
                        </td>
                        <td>
                            <input style="width:230px;height:36px;" type="text" name="href[]"
                                value="<?=$row['href'];?>">
                        </td>
                        <td><?=$Menu->count(['main_id'=>$row['id']]);?></td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"
                                <?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                        </td>
                        <td>
                            <input class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addTitleImageModal"
                                value="編輯次選單" onclick="loadModalContent('./modal/submenu.php?id=<?=$row['id'];?>')">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </tr>
                    <?php
                        
                    }
                    ?>
                </tbody>
            </table>

            <table style="margin-top:30px; width: 80%;">
                <tbody>
                    <tr>
                        <td width="30%">
                            <!-- 觸發 Modal 的按鈕 -->
                            <input class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTitleImageModal"
                                value="新增主選單" onclick="loadModalContent('./modal/<?=$do;?>.php?table=<?=$do;?>')">
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