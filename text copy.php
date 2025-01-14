<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESG 節能減碳積分系統</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h2>ESG 節能減碳積分系統</h2>
                <p>在這裡，你可以了解如何透過簡單的行為來減少碳排放，並賺取積分！</p>
            </div>
            <div class="col-md-6">
                <h4>計算你的碳排放減少量</h4>
                <form action="calculate.php" method="POST">
                    <div class="mb-3">
                        <label for="busTrips" class="form-label">搭乘公車次數 (每月):</label>
                        <input type="number" class="form-control" id="busTrips" name="busTrips" required>
                    </div>
                    <div class="mb-3">
                        <label for="lightsOff" class="form-label">每天關燈次數：</label>
                        <input type="number" class="form-control" id="lightsOff" name="lightsOff" required>
                    </div>
                    <button type="submit" class="btn btn-primary">計算減碳量</button>
                </form>



            </div>
        </div>
    </div>


    <iframe src="https://cdn.wordart.com/iframe/2wkcy74bc2n7"></iframe>


    <div class="col-12 col-md-10 col-lg-9">
        <div class="image-wrapper">
            <div class="infogram-embed" data-id="_/otGU0mto27YU9MmYc0w3" data-type="interactive"
                data-title="1990年至2022年總溫室氣體排放量和移除量趨勢" data-processed="1" id="ig-42feec97-ff8b-a72f-31c4-5485c138fe71"
                style="min-height: 1px;"><iframe
                    src="https://e.infogram.com/_/otGU0mto27YU9MmYc0w3?parent_url=https%3A%2F%2Fesg.tvbs.com.tw%2Fexhibition%2Fcarbon-footprint-verification%2F2025-jan%2Findex.html&amp;src=embed#async_embed"
                    scrolling="no" frameborder="0" allowfullscreen="" title="1990年至2022年總溫室氣體排放量和移除量趨勢"
                    style="border: none; width: 490px; height: 597px;"></iframe></div>
            <script>
            ! function(e, n, i, s) {
                var d = "InfogramEmbeds";
                var o = e.getElementsByTagName(n)[0];
                if (window[d] && window[d].initialized) window[d].process && window[d].process();
                else if (!e.getElementById(i)) {
                    var r = e.createElement(n);
                    r.async = 1, r.id = i, r.src = s, o.parentNode.insertBefore(r, o)
                }
            }(document, "script", "infogram-async", "https://e.infogram.com/js/dist/embed-loader-min.js");
            </script>

        </div>

    </div>


    <p>
        除了不定期在晚間時段提供鮮食商品折扣優惠，從 2016
        年開始，部分2家樂福門市每天都會將未銷售完、但仍然可食用的食物資源捐贈給食物銀行，這些食物將成為美味的餐食，分送給需要的單位、團體，讓剩食能夠適得其所，免於無家可歸、最終被廢棄的命運。至 2023 年，已經有 230
        家門市加入這項「續食捐贈計畫」！

        <img alt="惜食" title="惜食" class="mini-img" loading="lazy"
            src="https://img.shoplineapp.com/media/image_clips/66f1094754f41f000aca7a90/original.png?1727072583"
            width="50%">
    </p>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>


<?php
// calculate.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $busTrips = $_POST['busTrips'];
    $lightsOff = $_POST['lightsOff'];

    // 假設每次搭乘公車減少0.5公斤的碳排放
    // 假設每天關燈一次減少0.1公斤的碳排放
    $busReduction = $busTrips * 0.5; 
    $lightsOffReduction = $lightsOff * 0.1;

    // 總減少的碳排放量
    $totalReduction = $busReduction + $lightsOffReduction;

    // 根據減排量給予積分
    $points = round($totalReduction * 10); // 每公斤碳減排換取10點積分

    echo "<div class='container mt-5'><h4>你的減碳積分</h4><p>本月你減少了約 {$totalReduction} 公斤的碳排放，已獲得 {$points} 積分！</p></div>";
}
?>


</html>