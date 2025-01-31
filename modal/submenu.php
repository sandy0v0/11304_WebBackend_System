<?php include_once "../api/db.php";

$rows=$Menu->all(['main_id'=>$_GET['id']]);

?>
<h3 class="text-center" id="addTitleImageModalLabel">編輯次選單</h3>

<form action="api/submenu.php" method="post" enctype="multipart/form-data" class='cent'>
    <table style="width:70%;margin:auto" id="menu">
        <tr>
            <td>次選單名稱：</td>
            <td>次選單連結網址：</td>
            <td>刪除</td>
        </tr>
        <?php 
        foreach($rows as $row){
        ?>
        <tr>
            <td><input type="text" name="text[]" value="<?=$row['text'];?>"></td>
            <td><input type="text" name="href[]" value="<?=$row['href'];?>"></td>
            <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
        </tr>
        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        <?php 
        }
        ?>
    </table>
    <br><br>
    <div class="text-center">
        <input type="hidden" name="main_id" value="<?=$_GET['id'];?>">
        <button type="submit" class="btn btn-warning">修改確定</button>
        <button type="reset" class="btn btn-danger">重置</button>
        <input type="button" class="btn btn-secondary" value="更多次選單" onclick="more()">
    </div>
</form>


<script>
// 如果要新增更多次選單，記得前後用［‵］單引號
// $("#menu").append(` <tr>
//     <td><input type="text" name="text" id="text"></td>
//     <td><input type="text" name="href" id="href"></td>
//     <td></td>
// </tr>`)

function more() {
    let row = `<tr>
                <td><input type="text" name="text2[]" id="text"></td>
                <td><input type="text" name="href2[]" id="href"></td>
                <td></td>
             </tr>`
    $("#menu").append(row);
}
</script>