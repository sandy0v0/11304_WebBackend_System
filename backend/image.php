<div class="di" style="height:450px; border:#00 1px solid; width:100%; margin:2px 2px 0px 2px; float:left; position:relative;text-align-last: center;
    text-align: -webkit-center;">
    <!--正中央-->
    <?php include_once "logout.php";?>

    <div style="width:99%; height:95%; margin:auto; overflow:auto; border:#00 1px solid;">
        <h2 class="t cent botli" style="color: rgb(52 85 48); margin-bottom: 20px;">
            <strong>校園映像資料管理</strong>
        </h2>
        <form method="post" action="./api/edit.php">
            <table width="80%">
                <tbody>
                    <tr class="yel" style="text-align: center;">
                        <td width="45%">網站圖片</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                        <td></td>
                    </tr>
                    <?php

                    $div=3;
                    $total=$Image->count();
                    $pages=ceil($total/$div);
                    $now=$_GET['p']??1;
                    $start=($now-1)*$div;

                    $rows=$Image->all(" limit $start,$div");

                    foreach($rows as $row){
                    ?>
                    <tr>
                        <td>
                            <img src="./upload/<?=$row['img'];?>" style="width:280px;height:200px;">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"
                                <?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                        </td>
                        <td>
                            <input class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addTitleImageModal"
                                value="更換圖片"
                                onclick="loadModalContent('./modal/upload_<?=$do;?>.php?id=<?=$row['id'];?>&table=<?=$do;?>')">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="cent">
                <?php

                if(($now-1)>0 ){ 
                    // [&lt;]就是 [<]
                    $prev=$now-1;
                    echo "<a href='?do=$do&p=$prev'> < </a>";
                }

                for($i=1;$i<=$pages;$i++){
                    $size=($i==$now)?"24px":"16px";
                    echo "<a href='?do=$do&p=$i' style='font-size:$size'> ";
                    echo $i;
                    echo "</a>";
                }

                if(($now+1)<=$pages){ 
                    // [&lt;]就是 [<]
                    $next=$now+1;
                    echo "<a href='?do=$do&p=$next'> > </a>";
                }

            ?>
            </div>

            <table style="margin-top:30px; width: 80%;">
                <tbody>
                    <tr>
                        <td width="33%">
                            <!-- 觸發 Modal 的按鈕 -->
                            <input class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTitleImageModal"
                                value="新增校園映像圖片" onclick="loadModalContent('./modal/<?=$do;?>.php?table=<?=$do;?>')">
                        </td>
                        <td class="cent" width="42%">
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