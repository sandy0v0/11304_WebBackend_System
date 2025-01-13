<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
        <?php
        $ads=$Ad->all(['sh'=>1]);
        foreach($ads as $ad){
            echo $ad['text'];
            // echo "&nbsp;&nbsp;&nbsp;"
            echo str_repeat("&nbsp;",4) ;
        }
        // 這段沒有成功，可刪-> echo q("select group_concat('&nbsp;&nbsp;&nbsp;&nbsp;',`text`) from `ads` where `sh`=1 group by id")[0];
        ?>
    </marquee>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    
    <div style="width:100%; padding:2px; height:290px;">
        <div id="mwww" loop="true" style="width:100%; height:100%;">
            <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
        </div>
    </div>
    
    <script>
    var lin = new Array();
    // 抓 lin 裡面的動畫資料去撥放
    // lin=['upload/01C01.gif','upload/01C02.gif'];
        <?php
        $mvs=$Mvim->all(['sh'=>1]);
        foreach($mvs as $mv){
            echo "lin.push('upload/{$mv['img']}');";
        }
        ?>
    var now = 0;
    if (lin.length > 1) {
        // 每間隔3秒，執行ww()程式
        // setInterval 是非同步的機制
        // 如果資料庫沒有設定顯示的圖片，就顯示沒有可顯示的動畫圖片資料，請確認動畫圖片顯示的判斷
        setInterval("ww()", 3000);
        ww();
        // now = 1;
    }else if(lin.length<=0){
        $("#mwww").html("沒有可顯示的動畫圖片資料，請確認動畫圖片顯示");
    }else{
        ww();
    }

    function ww() {
        // console.log("HI");
        $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
        //$("#mwww").attr("src",lin[now])
        now++;
        if (now >= lin.length)       
            now = 0;
    }

    </script>

    <div
        style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
        <span class="t botli">最新消息區
            <?php
                if($News->count(['sh'=>1])>5){
                    echo "<a href='index.php?do=news' style='float:right'>";
                    echo "More...";
                    echo "</a>" ;
                }
            ?>

        <!-- ul裡面要放li，代表有序的清單 -->
        </span>
        <!-- <ol class="ssaa" style="list-style-type:decimal;" > -->
        <ul class="ssaa" style="list-style-type:decimal;">
            <?php
                $all_news=$News->all(['sh'=>1]," limit 5");
                foreach($all_news as $n){
                    echo "<li>";
                    echo mb_substr($n['text'],0,20);
                        echo "<span class='all' style='display:none'>";
                        echo $n['text'];
                        echo "</span>";
                    echo "</li>";
                }
            ?>

        </ul>
        <!-- position: absolute　絕對定位 -->
        <!-- 先不顯示，滑鼠移過之後再顯示，此為彈出視窗 -->
        <div id="altt"
            style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
        </div>

        <!-- ssaa li 因為他中間顯示空白，代表ssaa在li的上層-->
        <!-- 原生jQ的寫法，代表滑鼠滑到該位置跟離開位置的動作，改成JS -->
        <!-- $(this)代表 現在這個動作 -->
        <!-- $(this)代表 $(".ssaa li")的li，表示每個li裡面都有東西，裡面有個all，取得裡面全部的html的內容，並前後再加上</pre>-->
        <!-- 原本是display: none (隱藏)，當我滑鼠移到該位置時，做完以上動作後，把它顯示出來 -->
        <!-- 在$(".ssaa li").mouseout中，表示滑鼠離開的時候，又消失 -->

        <!-- 在 JavaScript 中，substr的語法，str.substr(start, length);　-->
        <!-- str.substr( 1, 10 );  ( 從字串中的哪一個位置開始提取 , 要提取的字的長度有幾個字 )-->

        <script>  
        $(".ssaa li").hover(
            function() {
                $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
                $("#altt").show()
            }
        )
        $(".ssaa li").mouseout(
            function() {
                $("#altt").hide()
            }
        )
        </script>
    </div>
</div>