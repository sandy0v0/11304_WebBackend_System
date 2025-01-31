<div class="di" style="height:540px; border:#00 1px solid; width:100%; margin:2px 2px 0px 2px; float:left; position:relative;text-align-last: center;
    text-align: -webkit-center;">
    <!--正中央-->
    <?php include_once "logout.php";?>

    <div style="width:99%; height:95%; margin:auto; overflow:auto; border:#00 1px solid;">
        <h2 class="t cent botli" style="color: rgb(52 85 48); margin-bottom: 20px;">
            <strong>最新消息資料內容管理</strong>
        </h2>
        <form method="post" action="./api/edit.php">
            <table width="80%">
                <tbody>
                    <tr class="yel">
                        <td width="70%">最新消息資料內容</td>
                        <td width="5%">顯示</td>
                        <td width="5%">刪除</td>
                    </tr>
                    <?php

                    $div=4;
                    $total=$News->count();
                    $pages=ceil($total/$div);
                    $now=$_GET['p']??1;
                    $start=($now-1)*$div;

                    $rows=$News->all(" limit $start,$div");

                    // $db=ucfirst($do); (如果你想要自己在做大小寫的話)
                    foreach($rows as $row){                  
                    ?>
                    <tr>
                        <td>
                            <textarea name="text[]" rows="3"
                                style="width:98%;hight:80px;text-align-last: auto;"><?=$row['text'];?></textarea>
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"
                                <?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <div class="cent" style="width:80%;">
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
                        <td width="30%">
                            <!-- 觸發 Modal 的按鈕 -->
                            <input class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTitleImageModal"
                                value="新增最新消息資料" onclick="loadModalContent('./modal/<?=$do;?>.php?table=<?=$do;?>')">
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