<div class="di" style="height:540px; border:#00 1px solid; width:100%; margin:2px 2px 0px 2px; float:left; position:relative;text-align-last: center;
    text-align: -webkit-center;">
    <!--正中央-->
    <?php include_once "logout.php";?>

    <div style="width:99%; height:95%; margin:auto; overflow:auto; border:#00 1px solid;">
        <h2 class="t cent botli" style="color: rgb(52 85 48); margin-bottom: 35px;">
            <strong>頁尾版權資料管理</strong>
        </h2>
        <form method="post" action="./api/update_data.php">
            <table width="60%">
                <tbody>
                    <tr class="yel row mb-3">
                        <label for="text" class="col-sm-1.5 col-form-label">
                            頁尾版權資料：
                        </label>
                        <label for="text" class="col-sm-1.5">
                            <input type="text" name="bottom" value="<?=$Bottom->find(1)['bottom'];?>"
                                style="width:380px;height:36px; text-align-last:auto; text-align-last: left;">
                        </label>
                    </tr>
                </tbody>
            </table>

            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
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