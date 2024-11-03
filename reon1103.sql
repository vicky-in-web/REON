-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-11-03 14:45:54
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `reon`
--

-- --------------------------------------------------------

--
-- 資料表結構 `carousel`
--

CREATE TABLE `carousel` (
  `caro_id` int(3) NOT NULL COMMENT '輪播編號',
  `caro_title` varchar(50) DEFAULT NULL COMMENT '輪播標題',
  `caro_content` varchar(100) DEFAULT NULL COMMENT '輪播內容',
  `caro_online` tinyint(1) NOT NULL COMMENT '上下架',
  `caro_sort` int(3) NOT NULL COMMENT '輪播順序',
  `caro_pic` varchar(50) NOT NULL COMMENT '輪播圖檔名稱',
  `class_id` int(10) NOT NULL COMMENT '產品編號',
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建檔日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `carousel`
--

INSERT INTO `carousel` (`caro_id`, `caro_title`, `caro_content`, `caro_online`, `caro_sort`, `caro_pic`, `class_id`, `create_date`) VALUES
(1, 'evercolor', 'no', 1, 1, 'evercolor.png', 34, '2024-10-26 07:41:41'),
(2, 'pega', 'no', 1, 2, 'pega.png', 33, '2024-10-26 07:41:41'),
(3, 'lensme', 'no', 1, 3, 'lensme.webp', 37, '2024-10-26 07:41:41');

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `cartid` int(10) NOT NULL COMMENT '購物車編號',
  `p_id` int(10) NOT NULL COMMENT '產品編號',
  `qty` int(3) NOT NULL COMMENT '產品數量',
  `orderid` int(10) DEFAULT NULL COMMENT '訂單編號',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '訂單處理狀態',
  `ip` varchar(200) NOT NULL COMMENT '訂購者的ip位址',
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '加入購物車時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `cart`
--

INSERT INTO `cart` (`cartid`, `p_id`, `qty`, `orderid`, `status`, `ip`, `create_date`) VALUES
(10, 9, 4, NULL, 1, '::1', '2024-11-02 07:28:01'),
(11, 18, 5, NULL, 1, '::1', '2024-11-02 07:28:12'),
(12, 15, 7, NULL, 1, '::1', '2024-11-02 07:28:19');

-- --------------------------------------------------------

--
-- 資料表結構 `city`
--

CREATE TABLE `city` (
  `AutoNo` int(10) NOT NULL COMMENT '城市編號',
  `Name` varchar(150) NOT NULL COMMENT '城市名稱',
  `cityOrder` tinyint(2) NOT NULL COMMENT '標記',
  `State` smallint(6) NOT NULL COMMENT '狀態'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `city`
--

INSERT INTO `city` (`AutoNo`, `Name`, `cityOrder`, `State`) VALUES
(1, '臺北市', 0, 0),
(2, '基隆市', 0, 0),
(3, '新北市', 0, 0),
(4, '宜蘭縣', 0, 0),
(5, '新竹市', 0, 0),
(6, '新竹縣', 0, 0),
(7, '桃園市', 0, 0),
(8, '苗栗縣', 0, 0),
(9, '台中市', 0, 0),
(10, '彰化縣', 0, 0),
(11, '南投縣', 0, 0),
(12, '雲林縣', 0, 0),
(13, '嘉義市', 0, 0),
(14, '嘉義縣', 0, 0),
(15, '台南市', 0, 0),
(16, '高雄市', 0, 0),
(17, '南海諸島', 0, 0),
(18, '澎湖縣', 0, 0),
(19, '屏東縣', 0, 0),
(20, '台東縣', 0, 0),
(21, '花蓮縣', 0, 0),
(22, '金門縣', 0, 0),
(23, '連江縣', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `class`
--

CREATE TABLE `class` (
  `classid` int(3) NOT NULL,
  `level` int(2) NOT NULL,
  `icon` varchar(30) DEFAULT NULL,
  `cname` varchar(30) NOT NULL,
  `sort` int(3) NOT NULL,
  `uplink` int(3) NOT NULL DEFAULT 1,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `class`
--

INSERT INTO `class` (`classid`, `level`, `icon`, `cname`, `sort`, `uplink`, `create_date`) VALUES
(1, 1, NULL, '眼鏡', 2, 1, '2024-10-20 06:13:26'),
(2, 1, NULL, '墨鏡', 3, 1, '2024-10-20 06:13:26'),
(3, 1, NULL, '隱形眼鏡', 4, 1, '2024-10-20 06:13:26'),
(4, 1, NULL, '周邊商品', 5, 1, '2024-10-20 06:13:26'),
(5, 2, NULL, '選顏色', 1, 1, '2024-10-20 06:18:15'),
(6, 2, NULL, '選框型', 2, 1, '2024-10-20 06:18:15'),
(7, 2, NULL, '選材質', 3, 1, '2024-10-20 06:18:15'),
(8, 2, NULL, '選顏色', 4, 2, '2024-10-20 06:18:15'),
(9, 2, NULL, '選框型', 5, 2, '2024-10-20 06:18:15'),
(10, 2, NULL, '台灣品牌', 6, 3, '2024-10-20 06:18:15'),
(11, 2, NULL, '日本品牌', 7, 3, '2024-10-20 06:18:15'),
(12, 2, NULL, '韓國品牌', 8, 3, '2024-10-20 06:18:15'),
(13, 2, NULL, '其他品牌', 9, 3, '2024-10-20 06:18:15'),
(14, 2, NULL, '眼鏡保養', 10, 4, '2024-10-20 06:18:15'),
(15, 2, NULL, '隱形眼鏡保養', 11, 4, '2024-10-20 06:18:15'),
(16, 2, NULL, '其他', 12, 4, '2024-10-20 06:18:15'),
(17, 3, NULL, '深色系', 1, 5, '2024-10-20 06:28:06'),
(18, 3, NULL, '淺色系', 2, 5, '2024-10-20 06:28:06'),
(19, 3, NULL, '透明系', 3, 5, '2024-10-20 06:28:06'),
(20, 3, NULL, '圓框', 4, 6, '2024-10-20 06:28:06'),
(21, 3, NULL, '方框', 5, 6, '2024-10-20 06:28:06'),
(22, 3, NULL, '不規則框', 6, 6, '2024-10-20 06:28:06'),
(23, 3, NULL, '金屬', 7, 7, '2024-10-20 06:28:06'),
(24, 3, NULL, '膠框', 8, 7, '2024-10-20 06:28:06'),
(25, 3, NULL, '深色系', 9, 8, '2024-10-20 06:28:06'),
(26, 3, NULL, '淺色系', 10, 8, '2024-10-20 06:28:06'),
(27, 3, NULL, '透明系', 11, 8, '2024-10-20 06:28:06'),
(28, 3, NULL, '圓框', 12, 9, '2024-10-20 06:28:06'),
(29, 3, NULL, '方框', 13, 9, '2024-10-20 06:28:06'),
(30, 3, NULL, '不規則框', 14, 9, '2024-10-20 06:28:06'),
(31, 3, NULL, 'SEESCA矽視康', 15, 10, '2024-10-20 06:28:06'),
(32, 3, NULL, 'TICON帝康', 16, 10, '2024-10-20 06:28:06'),
(33, 3, NULL, 'PECAVISION晶碩', 17, 10, '2024-10-20 06:28:06'),
(34, 3, NULL, 'EVERCOLOR艾薇卡', 18, 11, '2024-10-20 06:28:06'),
(35, 3, NULL, 'ReVIA', 19, 11, '2024-10-20 06:28:06'),
(36, 3, NULL, 'Lenstown', 20, 12, '2024-10-20 06:28:06'),
(37, 3, NULL, 'LENSME', 21, 12, '2024-10-20 06:28:06'),
(38, 3, NULL, 'FreshKon菲士康', 22, 13, '2024-10-20 06:28:06'),
(39, 3, NULL, 'CooperVision酷柏', 23, 13, '2024-10-20 06:28:06'),
(40, 1, NULL, 'SALE !', 1, 1, '2024-10-23 12:32:19'),
(41, 2, NULL, 'REON五歲慶', 1, 40, '2024-10-23 12:33:43'),
(42, 2, NULL, '不能沒有的經典套組', 2, 40, '2024-10-23 12:36:14'),
(43, 2, NULL, 'LENSME新到貨', 2, 40, '2024-10-23 12:36:14');

-- --------------------------------------------------------

--
-- 資料表結構 `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL COMMENT '訊息流水號',
  `cname` varchar(30) NOT NULL COMMENT '姓名',
  `tel` varchar(20) NOT NULL COMMENT '電話',
  `email` varchar(60) NOT NULL COMMENT '電子信箱',
  `address` varchar(200) NOT NULL COMMENT '地址',
  `message` text NOT NULL COMMENT '訊息內容',
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '查收時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `feedback`
--

INSERT INTO `feedback` (`ID`, `cname`, `tel`, `email`, `address`, `message`, `create_date`) VALUES
(1, '花花', '0988888888', '888@888', '台中市', '測試用訊息。繼續加油。', '2024-08-17 09:33:23'),
(2, '000', '000', '000@000', '000', '000', '2024-08-17 14:15:30'),
(3, '小花', '0999', '111@111', '123', '123', '2024-08-17 14:16:51'),
(4, '000', '000', '000@000', '000', '000', '2024-08-17 14:19:13'),
(5, '000', '000', '000@000', '000', '000', '2024-08-17 14:20:14'),
(6, 'test', '025', '000@000', 'test', 'test', '2024-10-20 10:28:20'),
(7, '0000', '0000', '0000@000', '0000', 'test', '2024-10-23 14:19:19');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `emailid` int(11) NOT NULL COMMENT 'email流水號',
  `email` varchar(100) NOT NULL COMMENT 'email帳號',
  `pw1` varchar(50) NOT NULL COMMENT '密碼',
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否啟動',
  `cname` varchar(30) NOT NULL COMMENT '中文姓名',
  `tssn` varchar(20) NOT NULL COMMENT '身份證字號',
  `birthday` date NOT NULL COMMENT '生日',
  `imgname` varchar(20) DEFAULT NULL COMMENT '相片檔名',
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建立日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`emailid`, `email`, `pw1`, `active`, `cname`, `tssn`, `birthday`, `imgname`, `create_date`) VALUES
(12, '123@gmail.com', '123456', 1, '123', '123', '2024-10-18', NULL, '2024-11-02 09:24:35');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `p_id` int(10) NOT NULL COMMENT '產品編號',
  `classid` int(3) NOT NULL COMMENT '產品類別',
  `p_name` varchar(200) NOT NULL COMMENT '產品名稱',
  `p_intro` varchar(200) DEFAULT NULL COMMENT '產品簡介',
  `p_price` int(11) DEFAULT NULL COMMENT '產品單價',
  `p_open` tinyint(4) NOT NULL DEFAULT 1 COMMENT '上架',
  `p_content` text DEFAULT NULL COMMENT '產品詳細規格',
  `p_date` datetime DEFAULT current_timestamp() COMMENT '產品輸入日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`p_id`, `classid`, `p_name`, `p_intro`, `p_price`, `p_open`, `p_content`, `p_date`) VALUES
(1, 1, 'NC3031X-4S 細框掛片眼鏡', '形狀 多角形款\r\n品牌 +NICHE\r\n性別 不分\r\n鼻墊形狀	Asian fit\r\n材質 不鏽鋼\r\n', 3490, 0, '形狀 多角形款\r\n品牌 +NICHE\r\n性別 不分\r\n鼻墊形狀	Asian fit\r\n材質 不鏽鋼', '2024-10-20 12:31:44'),
(2, 1, 'NC3017J-1A', '形狀 方型\r\n品牌 +NICHE\r\n鼻墊形狀	Asian fit\r\n材質 不鏽鋼\r\n', 2990, 0, '形狀 方型\r\n品牌 +NICHE\r\n鼻墊形狀	Asian fit\r\n材質 不鏽鋼', '2024-10-20 12:33:33'),
(3, 1, 'NC3012K-0S', '形狀 多角形款\r\n品牌 +NICHE\r\n鼻墊形狀	Asian fit\r\n材質 不鏽鋼\r\n', 3490, 0, '形狀 多角形款\r\n品牌 +NICHE\r\n鼻墊形狀	Asian fit\r\n材質 不鏽鋼', '2024-10-20 12:33:33'),
(4, 1, 'SNP1011N-1S', '形狀 波士頓 多角形款\r\n品牌 OWNDAYS SNAP\r\n鼻墊形狀	Asian fit\r\n材質 不鏽鋼\r\n', 3490, 0, '形狀 波士頓 多角形款\r\n品牌 OWNDAYS SNAP\r\n鼻墊形狀	Asian fit\r\n材質 不鏽鋼', '2024-10-20 12:34:13'),
(5, 1, 'SNP1011N-1S', '形狀 波士頓 多角形款\r\n品牌 OWNDAYS SNAP\r\n鼻墊形狀	Asian fit\r\n材質 不鏽鋼\r\n', 3490, 0, '形狀 波士頓 多角形款\r\n品牌 OWNDAYS SNAP\r\n鼻墊形狀	Asian fit\r\n材質 不鏽鋼', '2024-10-20 12:34:42'),
(6, 1, 'JOSS 多角圓框', '．多角圓框型，低調卻充滿細節\r\n．立體金屬莊頭LOGO\r\n．鏡腿套菱形設計，加厚設計更服貼', 2980, 1, '<p>\r\nKlassiC. HANDMADE. - JOSS 多角圓框眼鏡<br>Hey！Ｗhat\'s up<br>從打招呼開始，展現你的獨特風格。<br>經過半手工打造的眼鏡，<br>不僅能展現出與眾不同的品味，<br>更能在每一次打招呼的「What\'s up」中，展現自己的獨特風格。<br>適合臉型：<br>肉圓臉 ★★★★<br>方形臉 ★★★★★<br>倒三角臉 ★★★★<br>菱形臉 ★★★★★<br>瓜子臉 ★★★★★<br>材質：<br>高階合金、醋酸纖維板料<br>鏡框尺寸：<br>．鏡片 51.3*45.5 mm<br>．鏡腿 145 mm<br>．鼻橋 20.5 mm<br>購買附贈：<br>．品牌眼鏡盒<br>．眼鏡擦拭布<br>．原廠壓克力鏡片<br>注意事項：<br>．購買光學鏡框皆會附上「原廠壓克力鏡片」，用於支撐鏡框<br>．壓克力片無抗反光、抗紫外線功能，不建議當一般光學鏡片長時間配戴；其亦會有細微製作痕跡，不列為瑕疵商品，且不適用於退換貨政策。\r\n</p>', '2024-10-20 17:40:38'),
(7, 1, 'ZION 波士頓小圓框', '．細框波士頓小圓框，時髦又受歡迎\r\n．立體金屬莊頭LOGO\r\n．鏡腿套菱形設計，加厚設計更服貼', 2980, 1, '<p>KlassiC. HANDMADE. - ZION 波士頓小圓框眼鏡<br>Hey！Ｗhat\'s up<br>從打招呼開始，展現你的獨特風格。<br>經過半手工打造的眼鏡，<br>不僅能展現出與眾不同的品味，<br>更能在每一次打招呼的「What\'s up」中，展現自己的獨特風格。<br>適合臉型：<br>肉圓臉 ★★★★<br>方形臉 ★★★★★<br>倒三角臉 ★★★★<br>菱形臉 ★★★★<br>瓜子臉 ★★★★★<br>材質：<br>高階合金、醋酸纖維板料<br>鏡框尺寸：<br>．鏡片 49.4*43.8 mm<br>．鏡腿 145 mm<br>．鼻橋 22.3 mm<br>購買附贈：<br>．品牌眼鏡盒<br>．眼鏡擦拭布<br>．原廠壓克力鏡片<br>注意事項：<br>．購買光學鏡框皆會附上「原廠壓克力鏡片」，用於支撐鏡框<br>．壓克力片無抗反光、抗紫外線功能，不建議當一般光學鏡片長時間配戴；其亦會有細微製作痕跡，不列為瑕疵商品，且不適用於退換貨政策。<br></p>', '2024-10-20 17:47:48'),
(8, 36, 'Lenstown 月拋【沐光杏Satin brown】 ', '韓國原裝進口,1片裝', 225, 1, '<div><img src=\"./images/lenstown1-intro.png\" alt=\"\" style=\"width:350px;padding-left:50px;padding-top: 50px;\"></div>\r\n', '2024-10-21 19:43:44'),
(9, 36, 'Lenstown 月拋【沐光灰Satin Gray】 ', '(韓國原裝進口,1片裝)', 225, 1, '<div><img src=\"./images/lenstown2-intro.png\" alt=\"\" style=\"width:350px;padding-left:50px;padding-top: 50px;\"></div>', '2024-10-21 21:03:34'),
(10, 36, 'Lenstown 月拋【可沐灰 Coco Gray】', '(韓國原裝進口,1片裝)', 225, 1, '<div><img src=\"./images/lenstown3-intro.png\" alt=\"\" style=\"width:350px;padding-left:50px;padding-top: 50px;\"></div>', '2024-10-21 21:03:34'),
(11, 32, '帝康 光漾瞬間日拋【曦光微橙】', '(10入)', 270, 1, '<div><img src=\"./images/ticon1-intro1.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/ticon1-intro2.png\" alt=\"\" style=\"width:600px;padding-left:50px;padding-top: 50px;\"></div>', '2024-10-21 21:03:34'),
(12, 32, '帝康 光漾瞬間日拋【極光冰灰】', '(10入)', 270, 1, '<div><img src=\"./images/ticon2-intro1.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/ticon2-intro2.png\" alt=\"\" style=\"width:600px;padding-left:50px;padding-top: 50px;\"></div>', '2024-10-21 21:03:34'),
(13, 32, '帝康 光漾瞬間日拋【晨光橄欖】', '(10入)', 270, 1, '<div><img src=\"./images/ticon3-intro1.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/ticon3-intro2.png\" alt=\"\" style=\"width:600px;padding-left:50px;padding-top: 50px;\"></div>', '2024-10-21 21:03:34'),
(14, 37, 'Lensme 月拋【EYE FOUR CAT GRAY 波斯灰】', '(韓國原裝進口,2片裝)', 480, 1, '<div><img src=\"./images/lensme1-intro.png\" alt=\"\" style=\"width:350px;padding-left:50px;padding-top: 50px;\"></div>', '2024-10-21 21:03:34'),
(15, 37, 'Lensme 月拋【EYE FOUR CAT GRAY 波斯灰】', '(韓國原裝進口,2片裝)', 480, 1, '<div><img src=\"./images/lensme2-intro.png\" alt=\"\" style=\"width:350px;padding-left:50px;padding-top: 50px;\"></div>', '2024-10-21 21:03:34'),
(16, 39, '酷柏【珂朗清矽水膠透明日拋8.6mm】', '（30片裝）', 650, 1, '<div><img src=\"./images/cooperVision1-intro.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div>', '2024-10-21 21:03:34'),
(17, 39, '酷柏【奧克拉睛潤透明日拋】', '（30片裝）', 650, 1, '<div><img src=\"./images/cooperVision2-intro.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div>', '2024-10-21 21:03:34'),
(18, 34, '煙雨霧灰 Urban Noir彩色日拋【艾薇卡EverColor MoistLabelUV】', '10pcs', 319, 1, '<div><img src=\"./images/evercolor-intro.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro2.jpg\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro3.jpg\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro4.jpg\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro5.jpg\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro6.jpg\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro7.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro8.jpg\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div>', '2024-10-21 21:03:34'),
(19, 34, '華爾滋 Silhouette Duo彩色日拋 【艾薇卡 EverColor MoistLabelUV】', '10pcs', 319, 1, '<div><img src=\"./images/evercolor-intro.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro2.jpg\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro3.jpg\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro4.jpg\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro5.jpg\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro6.jpg\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro7.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro8.jpg\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div>', '2024-10-21 21:03:34'),
(20, 34, '復古米褐 Antique Beige 彩色日拋【艾薇卡EverColor MoistLabelUV】', '10pcs', 319, 1, '<div><img src=\"./images/evercolor-intro.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro2.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro3.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro4.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro5.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro6.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro7.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div><div><img src=\"./images/evercolor-intro8.png\" alt=\"\" style=\"width:700px;padding-left:50px;padding-top: 50px;\"></div>', '2024-10-21 21:03:34');

-- --------------------------------------------------------

--
-- 資料表結構 `product_img`
--

CREATE TABLE `product_img` (
  `img_id` int(11) NOT NULL,
  `p_id` int(10) NOT NULL,
  `img_file` varchar(100) NOT NULL,
  `sort` int(2) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product_img`
--

INSERT INTO `product_img` (`img_id`, `p_id`, `img_file`, `sort`, `create_date`) VALUES
(1, 6, 'JOSS-1.webp', 1, '2024-10-20 17:43:37'),
(2, 6, 'JOSS-2.webp', 2, '2024-10-20 17:43:37'),
(3, 7, 'ZION-1.webp', 1, '2024-10-20 17:48:58'),
(4, 7, 'ZION-2.webp', 2, '2024-10-20 17:48:58'),
(5, 8, 'lenstown1-1.webp', 1, '2024-10-21 19:55:48'),
(6, 8, 'lenstown1-2.webp', 2, '2024-10-21 19:55:48'),
(7, 9, 'lenstown2-1.webp', 1, '2024-10-21 21:12:13'),
(8, 9, 'lenstown2-2.webp', 2, '2024-10-21 21:12:13'),
(9, 10, 'lenstown3-1.webp', 1, '2024-10-21 21:12:13'),
(10, 10, 'lenstown3-2.webp', 2, '2024-10-21 21:12:13'),
(11, 11, 'ticon1.webp', 1, '2024-10-21 21:12:13'),
(12, 11, 'ticon1-1.webp', 2, '2024-10-21 21:12:13'),
(13, 11, 'ticon1-2.webp', 3, '2024-10-21 21:12:13'),
(14, 11, 'ticon1-3.webp', 4, '2024-10-21 21:12:13'),
(15, 11, 'ticon1-4.webp', 5, '2024-10-21 21:12:13'),
(16, 11, 'ticon1-5.webp', 6, '2024-10-21 21:12:13'),
(17, 12, 'ticon2-1.webp', 1, '2024-10-21 21:12:13'),
(18, 12, 'ticon2-2.webp\r\n', 2, '2024-10-21 21:12:13'),
(19, 12, 'ticon2-3.webp', 3, '2024-10-21 21:12:13'),
(20, 12, 'ticon2-4.webp', 4, '2024-10-21 21:12:13'),
(21, 12, 'ticon2-5.webp', 5, '2024-10-21 21:12:13'),
(22, 12, 'ticon2-6.webp', 6, '2024-10-21 21:12:13'),
(23, 13, 'ticon3-1.webp\r\n', 1, '2024-10-21 21:12:13'),
(24, 13, 'ticon3-2.webp', 2, '2024-10-21 21:12:13'),
(25, 13, 'ticon3-3.webp', 3, '2024-10-21 21:12:13'),
(26, 13, 'ticon3-4.webp', 4, '2024-10-21 21:12:13'),
(27, 13, 'ticon3-5.webp', 5, '2024-10-21 21:12:13'),
(28, 13, 'ticon3-6.webp', 6, '2024-10-21 21:12:13'),
(29, 14, 'lensme1.webp', 1, '2024-10-21 21:12:13'),
(30, 15, 'lensme2.webp', 1, '2024-10-21 21:12:13'),
(31, 16, 'CooperVision1.webp', 1, '2024-10-21 21:12:13'),
(32, 16, 'CooperVision1-2.webp', 2, '2024-10-21 21:12:13'),
(33, 17, 'CooperVision2.webp', 1, '2024-10-21 21:12:13'),
(34, 18, 'evercolor1-1.webp', 1, '2024-10-21 21:12:13'),
(35, 18, 'evercolor1-2.webp', 2, '2024-10-21 21:12:13'),
(36, 18, 'evercolor1-3.webp', 3, '2024-10-21 21:12:13'),
(37, 19, 'evercolor2-1.webp\r\n', 1, '2024-10-21 21:12:13'),
(38, 19, 'evercolor2-2.webp', 2, '2024-10-21 21:12:13'),
(39, 19, 'evercolor2-3.webp', 3, '2024-10-21 21:12:13'),
(40, 20, 'evercolor3-1.webp', 1, '2024-10-21 21:12:13'),
(41, 20, 'evercolor3-2.webp', 2, '2024-10-21 21:12:13'),
(42, 20, 'evercolor3-3.webp', 3, '2024-10-21 21:12:13');

-- --------------------------------------------------------

--
-- 資料表結構 `reonstar`
--

CREATE TABLE `reonstar` (
  `star_id` int(3) NOT NULL COMMENT '明星商品流水號',
  `p_id` int(10) NOT NULL COMMENT '產品編號',
  `star_sort` int(3) DEFAULT NULL COMMENT '明星排名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `town`
--

CREATE TABLE `town` (
  `townNo` bigint(20) NOT NULL COMMENT '鄕鎮市編號',
  `Name` varchar(150) NOT NULL COMMENT '鄕鎮市名稱',
  `Post` varchar(10) NOT NULL COMMENT '郵遞區號',
  `State` smallint(6) NOT NULL COMMENT '狀態',
  `AutoNo` int(10) NOT NULL COMMENT '上層城市編號連結'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `town`
--

INSERT INTO `town` (`townNo`, `Name`, `Post`, `State`, `AutoNo`) VALUES
(1, '中正區', '100', 0, 1),
(2, '大同區', '103', 0, 1),
(3, '中山區', '104', 0, 1),
(4, '松山區', '105', 0, 1),
(5, '大安區', '106', 0, 1),
(6, '萬華區', '108', 0, 1),
(7, '信義區', '110', 0, 1),
(8, '士林區', '111', 0, 1),
(9, '北投區', '112', 0, 1),
(10, '內湖區', '114', 0, 1),
(11, '南港區', '115', 0, 1),
(12, '文山區', '116', 0, 1),
(13, '仁愛區', '200', 0, 2),
(14, '信義區', '201', 0, 2),
(15, '中正區', '202', 0, 2),
(16, '中山區', '203', 0, 2),
(17, '安樂區', '204', 0, 2),
(18, '暖暖區', '205', 0, 2),
(19, '七堵區', '206', 0, 2),
(20, '萬里區', '207', 0, 3),
(21, '金山區', '208', 0, 3),
(22, '板橋區', '220', 0, 3),
(23, '汐止區', '221', 0, 3),
(24, '深坑區', '222', 0, 3),
(25, '石碇區', '223', 0, 3),
(26, '瑞芳區', '224', 0, 3),
(27, '平溪區', '226', 0, 3),
(28, '雙溪區', '227', 0, 3),
(29, '貢寮區', '228', 0, 3),
(30, '新店區', '231', 0, 3),
(31, '坪林區', '232', 0, 3),
(32, '烏來區', '233', 0, 3),
(33, '永和區', '234', 0, 3),
(34, '中和區', '235', 0, 3),
(35, '土城區', '236', 0, 3),
(36, '三峽區', '237', 0, 3),
(37, '樹林區', '238', 0, 3),
(38, '鶯歌區', '239', 0, 3),
(39, '三重區', '241', 0, 3),
(40, '新莊區', '242', 0, 3),
(41, '泰山區', '243', 0, 3),
(42, '林口區', '244', 0, 3),
(43, '蘆洲區', '247', 0, 3),
(44, '五股區', '248', 0, 3),
(45, '八里區', '249', 0, 3),
(46, '淡水區', '251', 0, 3),
(47, '三芝區', '252', 0, 3),
(48, '石門區', '253', 0, 3),
(49, '宜蘭市', '260', 0, 4),
(50, '頭城鎮', '261', 0, 4),
(51, '礁溪鄉', '262', 0, 4),
(52, '壯圍鄉', '263', 0, 4),
(53, '員山鄉', '264', 0, 4),
(54, '羅東鎮', '265', 0, 4),
(55, '三星鄉', '266', 0, 4),
(56, '大同鄉', '267', 0, 4),
(57, '五結鄉', '268', 0, 4),
(58, '冬山鄉', '269', 0, 4),
(59, '蘇澳鎮', '270', 0, 4),
(60, '南澳鄉', '272', 0, 4),
(61, '釣魚台列嶼', '290', 0, 4),
(62, '新竹市(東區)', '300', 0, 5),
(63, '竹北市', '302', 0, 6),
(64, '湖口鄉', '303', 0, 6),
(65, '新豐鄉', '304', 0, 6),
(66, '新埔鎮', '305', 0, 6),
(67, '關西鎮', '306', 0, 6),
(68, '芎林鄉', '307', 0, 6),
(69, '寶山鄉', '308', 0, 6),
(70, '竹東鎮', '310', 0, 6),
(71, '五峰鄉', '311', 0, 6),
(72, '橫山鄉', '312', 0, 6),
(73, '尖石鄉', '313', 0, 6),
(74, '北埔鄉', '314', 0, 6),
(75, '峨眉鄉', '315', 0, 6),
(76, '中壢區', '320', 0, 7),
(77, '平鎮區', '324', 0, 7),
(78, '龍潭區', '325', 0, 7),
(79, '楊梅區', '326', 0, 7),
(80, '新屋區', '327', 0, 7),
(81, '觀音區', '328', 0, 7),
(82, '桃園區', '330', 0, 7),
(83, '龜山區', '333', 0, 7),
(84, '八德區', '334', 0, 7),
(85, '大溪區', '335', 0, 7),
(86, '復興區', '336', 0, 7),
(87, '大園區', '337', 0, 7),
(88, '蘆竹區', '338', 0, 7),
(89, '竹南鎮', '350', 0, 8),
(90, '頭份市', '351', 0, 8),
(91, '三灣鄉', '352', 0, 8),
(92, '南庄鄉', '353', 0, 8),
(93, '獅潭鄉', '354', 0, 8),
(94, '後龍鎮', '356', 0, 8),
(95, '通霄鎮', '357', 0, 8),
(96, '苑裡鎮', '358', 0, 8),
(97, '苗栗市', '360', 0, 8),
(98, '造橋鄉', '361', 0, 8),
(99, '頭屋鄉', '362', 0, 8),
(100, '公館鄉', '363', 0, 8),
(101, '大湖鄉', '364', 0, 8),
(102, '泰安鄉', '365', 0, 8),
(103, '銅鑼鄉', '366', 0, 8),
(104, '三義鄉', '367', 0, 8),
(105, '西湖鄉', '368', 0, 8),
(106, '卓蘭鎮', '369', 0, 8),
(107, '中區', '400', 0, 9),
(108, '東區', '401', 0, 9),
(109, '南區', '402', 0, 9),
(110, '西區', '403', 0, 9),
(111, '北區', '404', 0, 9),
(112, '北屯區', '406', 0, 9),
(113, '西屯區', '407', 0, 9),
(114, '南屯區', '408', 0, 9),
(115, '太平區', '411', 0, 9),
(116, '大里區', '412', 0, 9),
(117, '霧峰區', '413', 0, 9),
(118, '烏日區', '414', 0, 9),
(119, '豐原區', '420', 0, 9),
(120, '后里區', '421', 0, 9),
(121, '石岡區', '422', 0, 9),
(122, '東勢區', '423', 0, 9),
(123, '和平區', '424', 0, 9),
(124, '新社區', '426', 0, 9),
(125, '潭子區', '427', 0, 9),
(126, '大雅區', '428', 0, 9),
(127, '神岡區', '429', 0, 9),
(128, '大肚區', '432', 0, 9),
(129, '沙鹿區', '433', 0, 9),
(130, '龍井區', '434', 0, 9),
(131, '梧棲區', '435', 0, 9),
(132, '清水區', '436', 0, 9),
(133, '大甲區', '437', 0, 9),
(134, '外埔區', '438', 0, 9),
(135, '大安區', '439', 0, 9),
(136, '彰化市', '500', 0, 10),
(137, '芬園鄉', '502', 0, 10),
(138, '花壇鄉', '503', 0, 10),
(139, '秀水鄉', '504', 0, 10),
(140, '鹿港鎮', '505', 0, 10),
(141, '福興鄉', '506', 0, 10),
(142, '線西鄉', '507', 0, 10),
(143, '和美鎮', '508', 0, 10),
(144, '伸港鄉', '509', 0, 10),
(145, '員林市', '510', 0, 10),
(146, '社頭鄉', '511', 0, 10),
(147, '永靖鄉', '512', 0, 10),
(148, '埔心鄉', '513', 0, 10),
(149, '溪湖鎮', '514', 0, 10),
(150, '大村鄉', '515', 0, 10),
(151, '埔鹽鄉', '516', 0, 10),
(152, '田中鎮', '520', 0, 10),
(153, '北斗鎮', '521', 0, 10),
(154, '田尾鄉', '522', 0, 10),
(155, '埤頭鄉', '523', 0, 10),
(156, '溪州鄉', '524', 0, 10),
(157, '竹塘鄉', '525', 0, 10),
(158, '二林鎮', '526', 0, 10),
(159, '大城鄉', '527', 0, 10),
(160, '芳苑鄉', '528', 0, 10),
(161, '二水鄉', '530', 0, 10),
(162, '南投市', '540', 0, 11),
(163, '中寮鄉', '541', 0, 11),
(164, '草屯鎮', '542', 0, 11),
(165, '國姓鄉', '544', 0, 11),
(166, '埔里鎮', '545', 0, 11),
(167, '仁愛鄉', '546', 0, 11),
(168, '名間鄉', '551', 0, 11),
(169, '集集鎮', '552', 0, 11),
(170, '水里鄉', '553', 0, 11),
(171, '魚池鄉', '555', 0, 11),
(172, '信義鄉', '556', 0, 11),
(173, '竹山鎮', '557', 0, 11),
(174, '鹿谷鄉', '558', 0, 11),
(175, '斗南鎮', '630', 0, 12),
(176, '大埤鄉', '631', 0, 12),
(177, '虎尾鎮', '632', 0, 12),
(178, '土庫鎮', '633', 0, 12),
(179, '褒忠鄉', '634', 0, 12),
(180, '東勢鄉', '635', 0, 12),
(181, '臺西鄉', '636', 0, 12),
(182, '崙背鄉', '637', 0, 12),
(183, '麥寮鄉', '638', 0, 12),
(184, '斗六市', '640', 0, 12),
(185, '林內鄉', '643', 0, 12),
(186, '古坑鄉', '646', 0, 12),
(187, '莿桐鄉', '647', 0, 12),
(188, '西螺鎮', '648', 0, 12),
(189, '二崙鄉', '649', 0, 12),
(190, '北港鎮', '651', 0, 12),
(191, '水林鄉', '652', 0, 12),
(192, '口湖鄉', '653', 0, 12),
(193, '四湖鄉', '654', 0, 12),
(194, '元長鄉', '655', 0, 12),
(195, '嘉義市(東區)', '600', 0, 13),
(196, '番路鄉', '602', 0, 14),
(197, '梅山鄉', '603', 0, 14),
(198, '竹崎鄉', '604', 0, 14),
(199, '阿里山鄉', '605', 0, 14),
(200, '中埔鄉', '606', 0, 14),
(201, '大埔鄉', '607', 0, 14),
(202, '水上鄉', '608', 0, 14),
(203, '鹿草鄉', '611', 0, 14),
(204, '太保市', '612', 0, 14),
(205, '朴子市', '613', 0, 14),
(206, '東石鄉', '614', 0, 14),
(207, '六腳鄉', '615', 0, 14),
(208, '新港鄉', '616', 0, 14),
(209, '民雄鄉', '621', 0, 14),
(210, '大林鎮', '622', 0, 14),
(211, '溪口鄉', '623', 0, 14),
(212, '義竹鄉', '624', 0, 14),
(213, '布袋鎮', '625', 0, 14),
(214, '中西區', '700', 0, 15),
(215, '東區', '701', 0, 15),
(216, '南區', '702', 0, 15),
(217, '北區', '704', 0, 15),
(218, '安平區', '708', 0, 15),
(219, '安南區', '709', 0, 15),
(220, '永康區', '710', 0, 15),
(221, '歸仁區', '711', 0, 15),
(222, '新化區', '712', 0, 15),
(223, '左鎮區', '713', 0, 15),
(224, '玉井區', '714', 0, 15),
(225, '楠西區', '715', 0, 15),
(226, '南化區', '716', 0, 15),
(227, '仁德區', '717', 0, 15),
(228, '關廟區', '718', 0, 15),
(229, '龍崎區', '719', 0, 15),
(230, '官田區', '720', 0, 15),
(231, '麻豆區', '721', 0, 15),
(232, '佳里區', '722', 0, 15),
(233, '西港區', '723', 0, 15),
(234, '七股區', '724', 0, 15),
(235, '將軍區', '725', 0, 15),
(236, '學甲區', '726', 0, 15),
(237, '北門區', '727', 0, 15),
(238, '新營區', '730', 0, 15),
(239, '後壁區', '731', 0, 15),
(240, '白河區', '732', 0, 15),
(241, '東山區', '733', 0, 15),
(242, '六甲區', '734', 0, 15),
(243, '下營區', '735', 0, 15),
(244, '柳營區', '736', 0, 15),
(245, '鹽水區', '737', 0, 15),
(246, '善化區', '741', 0, 15),
(247, '大內區', '742', 0, 15),
(248, '山上區', '743', 0, 15),
(249, '新市區', '744', 0, 15),
(250, '安定區', '745', 0, 15),
(251, '新興區', '800', 0, 16),
(252, '前金區', '801', 0, 16),
(253, '苓雅區', '802', 0, 16),
(254, '鹽埕區', '803', 0, 16),
(255, '鼓山區', '804', 0, 16),
(256, '旗津區', '805', 0, 16),
(257, '前鎮區', '806', 0, 16),
(258, '三民區', '807', 0, 16),
(259, '楠梓區', '811', 0, 16),
(260, '小港區', '812', 0, 16),
(261, '左營區', '813', 0, 16),
(262, '仁武區', '814', 0, 16),
(263, '大社區', '815', 0, 16),
(264, '岡山區', '820', 0, 16),
(265, '路竹區', '821', 0, 16),
(266, '阿蓮區', '822', 0, 16),
(267, '田寮區', '823', 0, 16),
(268, '燕巢區', '824', 0, 16),
(269, '橋頭區', '825', 0, 16),
(270, '梓官區', '826', 0, 16),
(271, '彌陀區', '827', 0, 16),
(272, '永安區', '828', 0, 16),
(273, '湖內區', '829', 0, 16),
(274, '鳳山區', '830', 0, 16),
(275, '大寮區', '831', 0, 16),
(276, '林園區', '832', 0, 16),
(277, '鳥松區', '833', 0, 16),
(278, '大樹區', '840', 0, 16),
(279, '旗山區', '842', 0, 16),
(280, '美濃區', '843', 0, 16),
(281, '六龜區', '844', 0, 16),
(282, '內門區', '845', 0, 16),
(283, '杉林區', '846', 0, 16),
(284, '甲仙區', '847', 0, 16),
(285, '桃源區', '848', 0, 16),
(286, '那瑪夏區', '849', 0, 16),
(287, '茂林區', '851', 0, 16),
(288, '茄萣區', '852', 0, 16),
(289, '東沙', '817', 0, 17),
(290, '南沙', '819', 0, 17),
(291, '馬公市', '880', 0, 18),
(292, '西嶼鄉', '881', 0, 18),
(293, '望安鄉', '882', 0, 18),
(294, '七美鄉', '883', 0, 18),
(295, '白沙鄉', '884', 0, 18),
(296, '湖西鄉', '885', 0, 18),
(297, '屏東市', '900', 0, 19),
(298, '三地門鄉', '901', 0, 19),
(299, '霧臺鄉', '902', 0, 19),
(300, '瑪家鄉', '903', 0, 19),
(301, '九如鄉', '904', 0, 19),
(302, '里港鄉', '905', 0, 19),
(303, '高樹鄉', '906', 0, 19),
(304, '鹽埔鄉', '907', 0, 19),
(305, '長治鄉', '908', 0, 19),
(306, '麟洛鄉', '909', 0, 19),
(307, '竹田鄉', '911', 0, 19),
(308, '內埔鄉', '912', 0, 19),
(309, '萬丹鄉', '913', 0, 19),
(310, '潮州鎮', '920', 0, 19),
(311, '泰武鄉', '921', 0, 19),
(312, '來義鄉', '922', 0, 19),
(313, '萬巒鄉', '923', 0, 19),
(314, '崁頂鄉', '924', 0, 19),
(315, '新埤鄉', '925', 0, 19),
(316, '南州鄉', '926', 0, 19),
(317, '林邊鄉', '927', 0, 19),
(318, '東港鄉', '928', 0, 19),
(319, '琉球鄉', '929', 0, 19),
(320, '佳冬鄉', '931', 0, 19),
(321, '新園鄉', '932', 0, 19),
(322, '枋寮鄉', '940', 0, 19),
(323, '枋山鄉', '941', 0, 19),
(324, '春日鄉', '942', 0, 19),
(325, '獅子鄉', '943', 0, 19),
(326, '車城鄉', '944', 0, 19),
(327, '牡丹鄉', '945', 0, 19),
(328, '恆春鎮', '946', 0, 19),
(329, '滿州鄉', '947', 0, 19),
(330, '臺東市', '950', 0, 20),
(331, '綠島鄉', '951', 0, 20),
(332, '蘭嶼鄉', '952', 0, 20),
(333, '延平鄉', '953', 0, 20),
(334, '卑南鄉', '954', 0, 20),
(335, '鹿野鄉', '955', 0, 20),
(336, '關山鎮', '956', 0, 20),
(337, '海端鄉', '957', 0, 20),
(338, '池上鄉', '958', 0, 20),
(339, '東河鄉', '959', 0, 20),
(340, '成功鎮', '961', 0, 20),
(341, '長濱鄉', '962', 0, 20),
(342, '太麻里鄉', '963', 0, 20),
(343, '金峰鄉', '964', 0, 20),
(344, '大武鄉', '965', 0, 20),
(345, '達仁鄉', '966', 0, 20),
(346, '花蓮市', '970', 0, 21),
(347, '新城鄉', '971', 0, 21),
(348, '秀林鄉', '972', 0, 21),
(349, '吉安鄉', '973', 0, 21),
(350, '壽豐鄉', '974', 0, 21),
(351, '鳳林鎮', '975', 0, 21),
(352, '光復鄉', '976', 0, 21),
(353, '豐濱鄉', '977', 0, 21),
(354, '瑞穗鄉', '978', 0, 21),
(355, '萬榮鄉', '979', 0, 21),
(356, '玉里鎮', '981', 0, 21),
(357, '卓溪鄉', '982', 0, 21),
(358, '富里鄉', '983', 0, 21),
(359, '金沙鎮', '890', 0, 22),
(360, '金湖鎮', '891', 0, 22),
(361, '金寧鄉', '892', 0, 22),
(362, '金城鎮', '893', 0, 22),
(363, '烈嶼鄉', '894', 0, 22),
(364, '烏坵鄉', '896', 0, 22),
(365, '南竿鄉', '209', 0, 23),
(366, '北竿鄉', '210', 0, 23),
(367, '莒光鄉', '211', 0, 23),
(368, '東引鄉', '212', 0, 23),
(371, '新竹市(北區)', '300', 0, 5),
(372, '新竹市(香山區)', '300', 0, 5),
(373, '嘉義市(西區)', '600', 0, 13);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`caro_id`);

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- 資料表索引 `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`AutoNo`);

--
-- 資料表索引 `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classid`);

--
-- 資料表索引 `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`emailid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- 資料表索引 `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`img_id`);

--
-- 資料表索引 `reonstar`
--
ALTER TABLE `reonstar`
  ADD PRIMARY KEY (`star_id`);

--
-- 資料表索引 `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`townNo`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `carousel`
--
ALTER TABLE `carousel`
  MODIFY `caro_id` int(3) NOT NULL AUTO_INCREMENT COMMENT '輪播編號', AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(10) NOT NULL AUTO_INCREMENT COMMENT '購物車編號', AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `city`
--
ALTER TABLE `city`
  MODIFY `AutoNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '城市編號', AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `class`
--
ALTER TABLE `class`
  MODIFY `classid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '訊息流水號', AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `emailid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'email流水號', AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '產品編號', AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_img`
--
ALTER TABLE `product_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reonstar`
--
ALTER TABLE `reonstar`
  MODIFY `star_id` int(3) NOT NULL AUTO_INCREMENT COMMENT '明星商品流水號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `town`
--
ALTER TABLE `town`
  MODIFY `townNo` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '鄕鎮市編號', AUTO_INCREMENT=374;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
