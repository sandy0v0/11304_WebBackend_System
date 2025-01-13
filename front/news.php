<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    </marquee>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <h3>更多最新消息資料區</h3>
    <hr>
    <?php
        // 去backend的news複製第26行以下程式碼，可以通用
        // 代表一頁顯示幾筆資料的意思，這裡要求顯示5筆
        $div=5;
        $total=$News->count();
        $pages=ceil($total/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        $rows=$News->all(" limit $start,$div");
        echo "<ol start='".($start+1)."'>";

    foreach($rows as $row){
        // 代表在滑鼠滑到該訊息時，於後方顯示完整內容'sswww'
        echo "<li class='sswww'>";
        echo mb_substr($row['text'],0,20);
        echo "<span class='all' style='display:none'>";
        echo $row['text'];
        echo "</span>";
        echo "</li>";
    }
    ?>

</ol>

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

</div>
<div id="alt"
    style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
</div>

<script>
$(".sswww").hover(
    function() {
        $("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
            "top": $(this).offset().top - 30
            // 把他在的位置抓出來-50(往下降50)，覺得想美觀一點可以改-30
        })
        $("#alt").show()
    }
)
$(".sswww").mouseout(
    function() {
        $("#alt").hide()
    }
)
</script>