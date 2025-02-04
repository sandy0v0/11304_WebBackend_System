-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-02-04 01:33:39
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db14-1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admins`
--

INSERT INTO `admins` (`id`, `acc`, `pw`) VALUES
(1, 'admin', '1234'),
(2, 'root', '123456'),
(5, 'admin1', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ads`
--

INSERT INTO `ads` (`id`, `text`, `sh`) VALUES
(16, '公告資訊：「事業應盤查登錄溫室氣體排放量之排放源」草案研商會議擬於114年2月14日召開', 1),
(17, '公告資訊：環境部公告列管事業均於113年法定期限前完成 溫室氣體盤查登錄及查驗', 1),
(18, '公告資訊：為響應環保減塑政策，環境部宣布自2025/1/1起，全台旅宿業者將不得主動提供一次性備品', 1),
(21, '公告資訊：2024年10月環境部正式公告碳費費率每噸300元定案，於2026年正式開徵', 1),
(23, '轉知：1/3碳排來自食物，綠色飲食第一步：少肉多蔬不剩食', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `bottom`
--

CREATE TABLE `bottom` (
  `id` int(10) UNSIGNED NOT NULL,
  `bottom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `bottom`
--

INSERT INTO `bottom` (`id`, `bottom`) VALUES
(1, '2024–2025 Sustaina Life, Inc. 保留所有權利');

-- --------------------------------------------------------

--
-- 資料表結構 `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `images`
--

INSERT INTO `images` (`id`, `img`, `text`, `sh`) VALUES
(1, '淨零.jpg', '', 1),
(2, '食.png', '', 1),
(3, '食1.png', '', 1),
(4, '我的餐盤0.png', '', 1),
(5, '惜食0.png', '', 1),
(6, '2050 NET ZERO.png', '', 1),
(7, '3.png', '', 1),
(8, '淨零0.png', '', 1),
(9, '碳中和.png', '', 1),
(10, '2050淨零排放規劃.jpg', '', 0),
(11, '2050淨零排放規劃1.jpg', '', 0),
(12, '2050淨零轉型.jpg', '', 0),
(13, '205012.png', '', 0),
(14, 'taiwan-epa-n.png', '', 0),
(15, '2050 -12.jpg', '', 0),
(16, '我的餐盤.PNG', '', 0),
(17, '食.jpg', '', 0),
(18, '食.png', '', 0),
(19, '食1.png', '', 0),
(20, '淨零 可以做什麼.PNG', '', 0),
(21, '淨零.jpg', '', 0),
(22, '淨零.PNG', '', 0),
(23, '節水.jpg', '', 0),
(24, '節水2.jpg', '', 0),
(25, '節電.jpg', '', 0),
(26, '碳足跡.jpg', '', 0),
(27, '碳足跡.png', '', 0),
(28, '碳足跡碳盤查.png', '', 0),
(29, '碳管理及減量.png', '', 0),
(30, '碳標籤.jpg', '', 0),
(31, '碳標籤.png', '', 0),
(32, '碳標籤2.png', '', 0),
(33, '碳標籤圖示說明.jpg', '', 0),
(34, '綠生活.jpg', '', 0),
(35, '認識碳足跡標簽.jpg', '', 0),
(36, '環保集點.PNG', '', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `href` text NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `main_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `menus`
--

INSERT INTO `menus` (`id`, `href`, `text`, `sh`, `main_id`) VALUES
(1, '?do=login', '管理登入', 1, 0),
(2, 'index.php', '網站首頁', 1, 0),
(7, '44', '33', 1, 2),
(8, 'index.php', '最新消息2', 1, 0),
(9, '4', '3', 1, 1),
(10, '2', '1', 1, 8),
(11, 'YO', '3', 1, 8),
(12, 'index.php', '最新消息', 1, 0),
(13, '2', '3', 1, 8);

-- --------------------------------------------------------

--
-- 資料表結構 `mvims`
--

CREATE TABLE `mvims` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mvims`
--

INSERT INTO `mvims` (`id`, `img`, `text`, `sh`) VALUES
(1, 'LG_ESG.gif', '', 1),
(2, 'gif-gigante.gif', '', 1),
(3, '2.jpg', '', 1),
(5, '205012.png', '', 1),
(6, '綠生活.jpg', '', 1),
(7, '碳中和首圖.webp', '', 1),
(8, '淨零排放_647x382.jpg', '', 1),
(9, '1.jpg', '', 1),
(11, 'video_pc.mp4', '', 1),
(12, 'OIP.jpg', '', 1),
(13, 'DALL·E-2024-11-19-10.40.12-A-visually-engaging-illustration-representing-environmental-sustainability-in-Taiwan.-The-image-features-lush-green-mountains-renewable-energy-source.webp', '', 1),
(14, '20220406c15444f1-6ded-4ff1-bb98-6e0cf66ac293.jpg', '', 1),
(15, 'gif-gigante.gif', '', 1),
(16, 'ed86d4285a6441ff95bf8023e4fb3f09.jpg', '', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `mvims2`
--

CREATE TABLE `mvims2` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mvims2`
--

INSERT INTO `mvims2` (`id`, `img`, `text`, `sh`) VALUES
(1, 'esg.gif', '', 1),
(2, 'esg01.gif', '', 0),
(3, 'esg02.gif', '', 0),
(5, 'esg03.gif', '', 0),
(6, 'esg04.gif', '', 0),
(7, 'esg05.gif', '', 0),
(8, 'esg06.gif', '', 0),
(9, 'esg07.gif', '', 0),
(11, 'esg08.gif', '', 0),
(12, 'esg09.gif', '', 0),
(13, 'esg10.gif', '', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`id`, `text`, `sh`) VALUES
(1, '環境部預告「事業應盤查登錄溫室氣體排放量之排放源」草案\r\n1.主辦單位：環境部氣候變遷署\r\n2.公告日期：114年1月9日（四）\r\n3.符合公告條件對象，自115年起，應於每年4月30日前完成前一年度溫室氣體排放量盤查登錄，除製造業、旅館業及醫院外之事業，應由總公司、大專校院一併就其子公司、分公司、分店、分處、特約或加盟門市、分校及分部辦理盤查登錄作業。\r\n4.詳情請參考：\r\nhttps://enews.moenv.gov.tw/Page/3B3C62C78849F32F/057810bd-7fe5-4feb-b917-fce8b7ef69fd。', 1),
(2, '減碳換綠金！綠電產業鏈崛起，民眾碳存摺、碳帳戶有獎勵\r\n悠遊卡公司開發的電子票證溫室氣體管理系統，是一個「交通旅程碳足跡的計算平台」，使用悠遊卡就可以計算出搭乘不同運具的減碳數據。悠遊卡公司去年即運用這套系統，在悠遊付APP推出「我的減碳存摺」，持卡人可以看到自己搭乘捷運、公車、台鐵、高鐵及YouBike的碳足跡及減碳量。今年更推出「員工通勤碳排放統計數據服務」，為企業計算員工通勤的碳足跡及減碳量，協助企業完成員工通勤、差旅的溫室氣體盤查。\r\n詳情請參考：https://esg.tvbs.com.tw/exhibition/earth-overshoot-day/2024-july/news_3.html', 1),
(3, '出遊住宿注意！全台旅宿「這天起」禁主動供一次性備品，恐連瓶裝水也沒\r\n為響應環保減塑政策，環境部宣布自2025/1/1起，全台旅宿業者將不得主動提供一次性備品，並禁止提供180毫升以下的液態盥洗及保養用品，倘若業者違反規定，將處1,200元～6,000元罰鍰。\r\n詳情請參考：https://supertaste.tvbs.com.tw/hot/352753?utm_source=curation&utm_medium=curation&utm_campaign=2025-carbon&utm_id=2025-carbon&utm_term=2025-carbon&utm_content=2025-carbon', 1),
(4, '【碳費每噸300元定案，於2026年正式開徵】\r\n「減碳」已成全球目標，2024年10月環境部正式公告碳費費率，將在2026年開始收費。\r\n初徵對象為「超過2.5萬噸排放量」的排碳大戶，預計開始徵收的第一年就可收到60億碳費。\r\n詳情請參考：\r\nhttps://esg.tvbs.com.tw/exhibition/news-review/2024/index.html?utm_source=curation&utm_medium=curation&utm_campaign=2025-carbon&utm_id=2025-carbon&utm_term=2025-carbon&utm_content=2025-carbon', 1),
(5, '環境部預告「自願性產品碳足跡管理辦法」相關草案\r\n為鼓勵事業核算產品碳足跡揭露碳足跡排放量，促進溫室氣體減量及落實淨零排放目標，環境部依據氣候變遷因應法第37條及第22條規定，於113年12月6日預告「自願性產品碳足跡管理辦法」草案及「溫室氣體認證機構及查驗機構管理辦法」修正草案，健全產品碳足跡揭露制度，廣徵各界意見。\r\n詳情請參考：https://enews.moenv.gov.tw/Page/3B3C62C78849F32F/83f86e57-fef4-4be5-9677-dbcc4e256129', 1),
(6, '1/3碳排來自食物，綠色飲食第一步：少肉多蔬不剩食\r\n全世界碳排放量有增無減，正當大家致力於低碳排時，你知道我們每日都要攝取的食物，其實也和氣候息息相關嗎？\r\n根據聯合國的研究，人類造成的溫室氣體排放中約三分之一與食品相關。\r\n主要來源包括農業和土地利用，例如牛隻的消化過程釋放的甲烷、森林砍伐導致的二氧化碳排放，以及化學肥料使用產生的氧化亞氮。\r\n綠食守則1：牢記常見食材碳量：牛>豬>家禽>養殖魚>野生魚>植物\r\n詳情請參考：https://esg.tvbs.com.tw/exhibition/earth-overshoot-day/2024-july/news_5.html', 1),
(7, 'COP29承諾　年3千億氣候援助金　全球碳交易上路\r\n聯合國氣候峰會（COP29）週日閉幕，經過兩個星期的討論，24日達成協議，富裕國家承諾在2035年前，每年提供3000億美元，協助較貧窮國家因應氣變遷，預計在2035年前累積上兆資金。\r\n這屆峰會也為碳信用交易開了綠燈，未來國家之間可以利用碳信用額度籌措資金、抵消碳排，和在市場上進行交易。\r\n在亞塞拜然舉行的聯合國氣候峰會（COP29），經過兩個星期的討論，24日達成協議，富裕國家承諾在2035年前，每年提供3000億美元，協助較貧窮國家因應氣變遷。\r\n詳情請參考：https://news.tvbs.com.tw/focus/2697764?utm_source=curation&utm_medium=curation&utm_campaign=2024esg-review&utm_id=2024esg-review&utm_term=2024esg-review&utm_content=2024esg-review', 1),
(9, '環境部攜手電商平台推動「循環包材EASY購」 綠色網購新選擇，使用循環包材搶先登錄送綠點\r\n1.主辦單位：環境部資源循環署\r\n2.活動日期：自113年11月18日上午10時起至12月8日23時59分止\r\n3.消費者加入資源循環署LINE官方帳號（https://reurl.cc/pvzr68或搜尋：環境部資源回收客服）後，在合作通路購物並選用循環包材，即可參加雙重優惠活動。第一重優惠提供前1,500名完成發票登錄的民眾4,000點環保綠點回饋；第二重優惠則提供多項精選好禮，只要確實歸還循環包材並上傳證明，即可參加113年12月13日的線上抽獎活動。\r\n4.詳情請參考：\r\nhttps://www.greenpoint.org.tw/GPHome/index.php/news-2/853-2024-11-15-02', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `titles`
--

CREATE TABLE `titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `titles`
--

INSERT INTO `titles` (`id`, `img`, `text`, `sh`) VALUES
(1, 'title-banner01.jpg', '永續生活 Sustaina Life', 1),
(2, 'title-banner02.jpg', '永續生活 Sustaina Life', 0),
(3, 'title-banner03.jpg', '永續生活 Sustaina Life', 0),
(4, 'title-banner05.png', '永續生活 Sustaina Life', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `total`
--

CREATE TABLE `total` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `total`
--

INSERT INTO `total` (`id`, `total`) VALUES
(1, 8006);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bottom`
--
ALTER TABLE `bottom`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mvims`
--
ALTER TABLE `mvims`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mvims2`
--
ALTER TABLE `mvims2`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bottom`
--
ALTER TABLE `bottom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mvims`
--
ALTER TABLE `mvims`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mvims2`
--
ALTER TABLE `mvims2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `total`
--
ALTER TABLE `total`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
