-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-06-15 18:55:45
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `f2e`
--

-- --------------------------------------------------------

--
-- 資料表結構 `achievement`
--

CREATE TABLE `achievement` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `location` varchar(60) NOT NULL,
  `act_date` date NOT NULL,
  `release_datetime` datetime NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `achievement`
--

INSERT INTO `achievement` (`id`, `author_id`, `location`, `act_date`, `release_datetime`, `content`) VALUES
(1, 1, '那', '2016-06-18', '2016-06-12 03:42:18', '<p>試試喔</p>\r\n\r\n<p><strong>粗的</strong></p>\r\n\r\n<p><em>斜的</em></p>\r\n\r\n<h1>標題1</h1>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><img alt="海龜可愛" src="http://userimage2.360doc.com/12/0330/12/8771146_201203301220160355.jpg" style="height:800px; width:1280px" /></p>\r\n'),
(2, 20, '白沙灣', '2016-06-26', '2016-06-13 17:22:27', '<p>我裸體</p>\r\n'),
(4, 1, '媽我在這', '2016-06-23', '2016-06-15 03:05:37', '<p>一</p>\r\n\r\n<p>二</p>\r\n\r\n<p>三</p>\r\n\r\n<p>四</p>\r\n\r\n<p>五</p>\r\n\r\n<p><img alt="" src="http://a3.att.hudong.com/73/27/01300000201199122518270623385.jpg" /></p>\r\n\r\n<p>六</p>\r\n\r\n<p>七</p>\r\n');

-- --------------------------------------------------------

--
-- 資料表結構 `achievement_image`
--

CREATE TABLE `achievement_image` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `initiator_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `activity`
--

INSERT INTO `activity` (`id`, `initiator_id`, `date`, `time`, `location`, `description`) VALUES
(1, 0, '2016-06-30', '16:30:00', '那個海灘', '這個那個跟這個'),
(2, 0, '2016-06-24', '17:00:00', '我沒登入', '我沒登入我沒登入我沒登入'),
(3, 1, '2016-06-25', '12:59:00', '假裝登入', '假裝登入假裝登入假裝登入'),
(4, 1, '2016-06-25', '12:59:00', '假裝登入', '假裝登入假裝登入假裝登入'),
(5, 1, '2016-06-25', '14:00:00', '假裝登入', '假裝登入假裝登入假裝登入'),
(6, 3, '2016-06-18', '18:00:00', '試個', ''),
(7, 3, '0000-00-00', '00:00:00', '', ''),
(8, 4, '2016-06-30', '15:00:00', '我是第4人', '我是第4人我是第4人我是第4人'),
(9, 1, '2016-06-21', '16:30:00', '1號吧', '1號吧1號吧1號吧'),
(10, 33, '2016-06-29', '00:00:00', '綠島海灘', '唱個R'),
(11, 33, '2016-06-26', '07:00:00', '北車東一門', '記得要帶\n1.6or7套換洗衣物(5day+浮淺+(泛舟))//泛舟那套要是薄長袖長褲不然就當蠶寶寶吧\n2.防曬用具：帽子、薄外套(騎車不穿會曬死)、防曬乳\n3.證件：身份證、駕照、健保卡\n4.大浴巾(綠島民宿只有提供紙毛巾,牙刷牙膏,沐浴乳,洗髮乳)\n5.方便的鞋子 ex拖鞋、洞洞鞋\n6.暈船藥(if you need)\n7.雨具(雨衣為上)\n8.口罩(if you need)\n9.防蚊液\n10.泳衣泳帽(泡溫泉用)'),
(12, 33, '2016-06-24', '12:59:00', '期末海灘', '大家期末加油>///////////<');

-- --------------------------------------------------------

--
-- 資料表結構 `issue`
--

CREATE TABLE `issue` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `release_datetime` datetime NOT NULL,
  `source` varchar(60) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `issue`
--

INSERT INTO `issue` (`id`, `title`, `release_datetime`, `source`, `views`, `content`) VALUES
(1, '你買的是沐浴乳還是塑膠微粒？快上網查App', '2016-06-14 00:18:37', '上下游新聞市集', 50, '<p>看守台灣協會調查，市售近5百種沐浴乳、洗面乳等清潔用品有4成含塑膠微粒，但消費者若優先挑選標榜有深層清潔、去角質功能的產品，機率則提高到近6成，而許多知名廠牌如嬌生、愛迪達、無印良品、可伶可例、3M、Vichy等都遭檢出含有塑膠微粒。</p>\r\n\r\n<p>研究員孫瑋孜說，塑膠微粒經證實能吸附環境中的有毒物質，並由浮游生物、魚苗攝食進入食物鏈中，最終影響人類。包含綠色和平、立法委員林淑芬、陳曼莉等均要求環保署要直接禁止業者使用、販賣塑膠微粒產品。而環保署於今（8）日承諾將在明年完成檢驗方法公告、法律處理流程，直接從源頭管制。</p>\r\n\r\n<p><a href="https://d1w3giuu5sbpd7.cloudfront.net/files/2016/06/%E4%B8%80%E5%A4%A7%E7%BD%90%E7%9A%84%E5%AC%8C%E7%94%9F%E6%B2%90%E6%B5%B4%E4%B9%B3%EF%BC%8C%E4%B9%9F%E8%83%BD%E8%90%83%E5%8F%96%E5%87%BA%E4%B8%80%E5%A4%A7%E7%BD%90%E7%9A%84%E5%A1%91%E8%86%A0%E5%BE%AE%E7%B2%92%EF%BC%8C%E4%B8%8D%E7%A6%81%E8%AE%93%E4%BA%BA%E5%A5%BD%E5%A5%87%E8%B2%B7%E5%88%B0%E7%9A%84%E6%98%AF%E6%B2%90%E6%B5%B4%E4%B9%B3%EF%BC%8C%E9%82%84%E6%98%AF%E5%A1%91%E8%86%A0%E5%BE%AE%E7%B2%92%EF%BC%9F%EF%BC%88%E5%9C%96%EF%BC%8F%E6%BD%98%E5%AD%90%E7%A5%81%E6%94%9D%EF%BC%89.jpg"><img alt="一大罐的嬌生沐浴乳，也能萃取出一大罐的塑膠微粒，不禁讓人好奇買到的是沐浴乳，還是塑膠微粒？（圖／潘子祁攝）" src="https://d1w3giuu5sbpd7.cloudfront.net/files/2016/06/%E4%B8%80%E5%A4%A7%E7%BD%90%E7%9A%84%E5%AC%8C%E7%94%9F%E6%B2%90%E6%B5%B4%E4%B9%B3%EF%BC%8C%E4%B9%9F%E8%83%BD%E8%90%83%E5%8F%96%E5%87%BA%E4%B8%80%E5%A4%A7%E7%BD%90%E7%9A%84%E5%A1%91%E8%86%A0%E5%BE%AE%E7%B2%92%EF%BC%8C%E4%B8%8D%E7%A6%81%E8%AE%93%E4%BA%BA%E5%A5%BD%E5%A5%87%E8%B2%B7%E5%88%B0%E7%9A%84%E6%98%AF%E6%B2%90%E6%B5%B4%E4%B9%B3%EF%BC%8C%E9%82%84%E6%98%AF%E5%A1%91%E8%86%A0%E5%BE%AE%E7%B2%92%EF%BC%9F%EF%BC%88%E5%9C%96%EF%BC%8F%E6%BD%98%E5%AD%90%E7%A5%81%E6%94%9D%EF%BC%89-780x585.jpg"/></a></p>\r\n\r\n<p>一大罐的嬌生沐浴乳，也能萃取出一大罐的塑膠微粒，不禁讓人好奇買到的是沐浴乳，還是塑膠微粒？（圖／潘子祁攝）</p>\r\n\r\n<h3><strong>近500種清潔用品含塑膠微粒，汙染海洋甚鉅</strong></h3>\r\n\r\n<p>嬌生沐浴乳、愛迪達洗面乳、無印良品洗面乳、可伶可俐深層洗面乳，這些瓶瓶罐罐一字排開，彷彿就是藥妝店現場，但這些產品經環保團體證實，是含有塑膠微粒、危害海洋的有害產品。</p>\r\n\r\n<p>看守台灣協會從2015年8月起開始調查市售468種常見個人清潔用品，發現共有196種產品含有塑膠微粒，佔42%；若再從外包裝來看，當消費者優先選購標榜去角質、磨砂等字眼的產品，則有57%的機率選到含塑膠微粒的產品。</p>\r\n\r\n<p>看守台灣研究員孫瑋孜說，這類塑膠微粒以「柔珠」的名義充斥於清潔產品中，藉此聲稱具有去角質、深層清潔的功能，但成效是否真如業者聲稱不得而知，可以確定的是塑膠微粒會汙染海洋。</p>\r\n\r\n<p>孫瑋孜解釋，塑膠微粒有98%的材質是聚乙烯（PE），已有許多研究證實PE能吸附包含DDT、多環芳香烴、含氟化合物等環境中的有害物質；再加上塑膠微粒直徑介於10um到1mm之間，容易遭浮游生物、小漁攝食而進入食物鏈中，最終人類將食用到塑膠和有毒物質。</p>\r\n\r\n<p>「最近一份瑞典的研究報告指出，鱸魚魚苗攝食塑膠微粒後行為異常。」孫瑋孜解釋，異常行為包括魚卵孵化率、感官能力都較差，<a href="http://us.tomonews.com/study-shows-fish-prefer-eating-plastic-over-plankton-3069039">實驗者還將鱸魚天敵的化學物質投入魚苗中，發現鱸魚不會有逃避的行為</a>。</p>\r\n\r\n<p>立法委員林淑芬指出，比利時在2014年的研究中發現，遭汙染的水產中，平均每公克的紫殼菜蛤能含有0.3顆塑膠微粒，而養殖牡蠣亦有0.47顆，若是有喜歡攝食水產的族群，一年可食用1.1萬顆塑膠微粒。</p>\r\n\r\n<p>另外，看守台灣發現塑膠微粒的成分還有聚甲基丙烯酸甲酯（PMMA，壓克力原料）、聚對苯二甲酸乙二酯（PET）或尼龍（Nylon）等。</p>\r\n\r\n<p><a href="https://d1w3giuu5sbpd7.cloudfront.net/files/2016/06/%E7%93%B6%E7%93%B6%E7%BD%90%E7%BD%90%E7%9A%84%E6%B8%85%E6%BD%94%E7%94%A8%E5%93%81%E5%BD%B7%E5%BD%BF%E9%96%8B%E5%83%B9%E8%97%A5%E5%A6%9D%E5%BA%97%EF%BC%8C%E4%BD%86%E5%85%B6%E4%B8%AD%E8%BF%914%E6%88%90%E5%90%AB%E6%9C%89%E5%A1%91%E8%86%A0%E5%BE%AE%E7%B2%92%E3%80%82%EF%BC%88%E5%9C%96%EF%BC%8F%E6%BD%98%E5%AD%90%E7%A5%81%E6%94%9D%EF%BC%89.jpg"><img alt="瓶瓶罐罐的清潔用品彷彿開價藥妝店，但其中近4成含有塑膠微粒。（圖／潘子祁攝）" src="https://d1w3giuu5sbpd7.cloudfront.net/files/2016/06/%E7%93%B6%E7%93%B6%E7%BD%90%E7%BD%90%E7%9A%84%E6%B8%85%E6%BD%94%E7%94%A8%E5%93%81%E5%BD%B7%E5%BD%BF%E9%96%8B%E5%83%B9%E8%97%A5%E5%A6%9D%E5%BA%97%EF%BC%8C%E4%BD%86%E5%85%B6%E4%B8%AD%E8%BF%914%E6%88%90%E5%90%AB%E6%9C%89%E5%A1%91%E8%86%A0%E5%BE%AE%E7%B2%92%E3%80%82%EF%BC%88%E5%9C%96%EF%BC%8F%E6%BD%98%E5%AD%90%E7%A5%81%E6%94%9D%EF%BC%89-780x479.jpg" /></a></p>\r\n\r\n<p>瓶瓶罐罐的清潔用品彷彿開價藥妝店，但其中近4成含有塑膠微粒。（圖／潘子祁攝）</p>\r\n\r\n<h3><strong>一年過去，環保署終於承諾將禁止使用</strong></h3>\r\n\r\n<p>由於塑膠微粒危害甚鉅，看守台灣協會、綠色和平組織、立委林淑芬、陳曼麗等均表態要求台灣政府立即禁止輸入、製造、販售相關產品。</p>\r\n\r\n<p>綠色和平組織專案主任顏寧說，美國自2015年通過《無柔珠水域法》，將在3年內完全禁止販賣使用；加拿大則直接將塑膠微粒列入毒性物質清單，已完全禁止業者使用。</p>\r\n\r\n<p>林淑芬強調，去年已三番兩次要求環保署、衛生福利部食品藥物管理署在法律中明文禁止，但兩部會都指稱是對方所轄業務，導致塑膠微粒在台灣如今仍無人管理。只是如今民間已有6千多人連署要政府趕緊管理，且有6成民眾表態要在半年內讓塑膠微粒退出市場。</p>\r\n\r\n<p>環保署廢棄物管理處長吳勝忠也到場承諾，環保署長李應元已指示，將依《廢棄物清理法》權限，禁制業者輸入、製造、使用、販賣含塑膠微粒的產品，只是相關檢驗辦法、公告事項仍需行政作業時間，會在明年完成。</p>\r\n\r\n<h3><strong>快拿手機掃描，含塑膠微粒產品應丟垃圾袋</strong></h3>\r\n\r\n<p>目前看守台灣協會已將研究資料上傳荷蘭非營利團體塑膠濃湯基金會的平台，<a href="http://get.beatthemicrobead.org/">民眾可以直接下載App</a>，在選購時直接掃描條碼便能知道該產品是否含有塑膠微粒。</p>\r\n\r\n<p>孫瑋孜說，若顯示「問號」的話，代表該項產品還未有相關紀錄，但民眾可先查閱包裝若含有polyethylene（PE）、polymethyl methacrylate（PMMA）、PET、Nylon等成分，便是有添加塑膠微粒；而掃描、標示都查無，仍能將樣本直接寄到看守台灣協會進行後續追蹤。</p>\r\n\r\n<p>而民眾發現擁有還沒用完、卻有塑膠微粒的清潔產品，孫瑋孜說應直接將內容物擠出、丟棄於垃圾袋中，並把塑膠瓶身回收，讓塑膠微粒循一般家庭廢棄物的管道處理，以避免塑膠微粒流入海洋。</p>\r\n\r\n<p><a href="https://d1w3giuu5sbpd7.cloudfront.net/files/2016/06/%E7%9C%8B%E5%AE%88%E5%8F%B0%E7%81%A3%E3%80%81%E7%B6%A0%E8%89%B2%E5%92%8C%E5%B9%B3%E3%80%81%E7%AB%8B%E5%A7%94%E6%9E%97%E6%B7%91%E8%8A%AC%E3%80%81%E9%99%B3%E6%9B%BC%E9%BA%97%E5%B0%876%E5%8D%83%E4%BA%BA%E8%81%AF%E7%BD%B2%E6%9B%B8%E9%80%81%E4%BA%A4%E7%92%B0%E4%BF%9D%E7%BD%B2%EF%BC%8C%E7%9B%BC%E7%92%B0%E4%BF%9D%E7%BD%B2%E5%9A%B4%E8%82%85%E9%9D%A2%E5%B0%8D%E3%80%81%E8%90%BD%E5%AF%A6%E5%A1%91%E8%86%A0%E5%BE%AE%E7%B2%92%E7%AE%A1%E7%90%86%E3%80%82%EF%BC%88%E5%9C%96%EF%BC%8F%E6%BD%98%E5%AD%90%E7%A5%81%E6%94%9D%EF%BC%89.jpg"><img alt="看守台灣、綠色和平、立委林淑芬、陳曼麗將6千人聯署書送交環保署，盼環保署嚴肅面對、落實塑膠微粒管理。（圖／潘子祁攝）" src="https://d1w3giuu5sbpd7.cloudfront.net/files/2016/06/%E7%9C%8B%E5%AE%88%E5%8F%B0%E7%81%A3%E3%80%81%E7%B6%A0%E8%89%B2%E5%92%8C%E5%B9%B3%E3%80%81%E7%AB%8B%E5%A7%94%E6%9E%97%E6%B7%91%E8%8A%AC%E3%80%81%E9%99%B3%E6%9B%BC%E9%BA%97%E5%B0%876%E5%8D%83%E4%BA%BA%E8%81%AF%E7%BD%B2%E6%9B%B8%E9%80%81%E4%BA%A4%E7%92%B0%E4%BF%9D%E7%BD%B2%EF%BC%8C%E7%9B%BC%E7%92%B0%E4%BF%9D%E7%BD%B2%E5%9A%B4%E8%82%85%E9%9D%A2%E5%B0%8D%E3%80%81%E8%90%BD%E5%AF%A6%E5%A1%91%E8%86%A0%E5%BE%AE%E7%B2%92%E7%AE%A1%E7%90%86%E3%80%82%EF%BC%88%E5%9C%96%EF%BC%8F%E6%BD%98%E5%AD%90%E7%A5%81%E6%94%9D%EF%BC%89-780x483.jpg" /></a></p>\r\n\r\n<p>看守台灣、綠色和平、立委林淑芬、陳曼麗將6千人聯署書送交環保署，盼環保署嚴肅面對、落實塑膠微粒管理。（圖／潘子祁攝）</p>\r\n'),
(2, '塑膠微粒危害魚類生長 研究首度證實', '2016-06-14 00:31:11', '中央社', 25, '<p><img src="http://img5.cna.com.tw/www/WebPhotos/800/20160603/24510524.jpg" />科學家首度證實，魚類暴露在全球海洋充斥的塑膠污染碎片中，對生理和行為造成破壞性影響。 （取自科學雜誌網頁www.sciencemag.org）</p>\r\n\r\n<p>（中央社華盛頓2日綜合外電報導）科學家首度證實，魚類暴露在全球海洋充斥的塑膠污染碎片中，對生理和行為造成破壞性影響。<br />\r\n<br />\r\n路透社報導，研究人員今天表示，歐洲鱸魚幼魚在實驗室裡的實驗顯示，暴露在海洋塑膠微粒環境下，阻礙授精卵的孵化，不利幼魚成長，削減活動力減少，更易遭到掠食，導致死亡率攀升。<br />\r\n<br />\r\n瑞典烏普薩拉大學（Uppsala University）海洋生物學家隆恩史泰德（Oona Lonnstedt）表示，「對我而言，這項研究的關鍵發現和最令人訝異的是，幼魚愛吃塑膠微粒，基本上就是塞滿塑膠微粒」，而忽略他們的天然食物來源－動物性浮游生物。<br />\r\n<br />\r\n隆恩史泰德表示，科學家日益憂心四處充斥的塑膠污染對海洋生態系統的衝擊。這也是檢視塑膠微粒對魚類生長直接影響的首次研究。<br />\r\n<br />\r\n塑膠微粒大小不超過5公釐，主要來自大型塑膠垃圾分解的小碎片，或者像洗面乳、沐浴乳或牙膏等產品中的柔珠。<br />\r\n<br />\r\n這項研究發表在「科學雜誌」（Science）期刊上。1050603<br />\r\n&nbsp;</p>\r\n\r\n<p>發表在科學期刊的原文：<a href="http://www.sciencemag.org/news/2016/06/ocean-plastic-makes-baby-fish-ignore-their-predators" target="_blank">Ocean plastic makes baby fish ignore their predators</a></p>\r\n'),
(3, '大刀解剖擱淺抹香鯨　肚全是「人類餵的塑膠袋」害死牠', '2016-06-14 00:36:34', 'ETtoday東森新聞雲', 16, '<p><img alt="" src="http://static.ettoday.net/images/1378/d1378816.jpg" style="height:410px; width:600px" /></p>\r\n\r\n<p><strong>▲抹香鯨二度擱淺，陳屍在八掌溪出海口。（圖／取自<a href="https://www.facebook.com/nckucetacean" target="_blank">成大海洋生物及鯨豚研究中心</a>，下同）</strong></p>\r\n\r\n<p>地方中心／台南報導</p>\r\n\r\n<p>在嘉義縣東石外海擱淺獲救後，這條抹香鯨最後仍被發現陳屍在八掌溪出海口附近，縣府利用大潮出動拖吊搬運，成功運達成功大學安南校區海洋生物暨鯨豚研究中心，因屍體上有傷口排氣，並沒有發生屍爆現象。成大24日完成解剖，發現<strong>鯨肚中塞滿了魚網和塑膠袋，使牠無法進食，間接致死，確切死因仍無法釐清。</strong></p>\r\n\r\n<p>這條抹香鯨15日清晨先是被人發現擱淺在嘉義縣東石外海約2浬處，經過海巡及鯨豚研究中心搶救，成功送出外海深約7公尺處野放，因當時牠身體狀況不佳，相關救援人員十分擔心，沒想到18日上午，又有民眾發現牠再度擱淺在八掌溪出海口附近淺灘地，已明顯死亡。</p>\r\n\r\n<p><img alt="" src="http://static.ettoday.net/images/1378/d1378819.jpg" style="height:338px; width:600px" /></p>\r\n\r\n<p><strong>▲▼抹香鯨背部有很大的撕裂傷，30顆牙齒被偷拔剩下10多顆。</strong></p>\r\n\r\n<p><img alt="" src="http://static.ettoday.net/images/1378/d1378824.jpg" style="height:338px; width:600px" /></p>\r\n\r\n<p>體重身長的抹香鯨難以搬運，嘉義縣府、嘉義救難隊、嘉義縣水中運動協會等相關單位都紛紛動員200人次、20多船次前往作業，利用大潮將鯨屍拖回海上再拖往布袋港，22日運至成大鯨豚中心。經過2天時間解剖、研究病理，中心主任王建平表示，鯨魚腰部靠尾部有瘀血，無法游泳，因屍體已腐爛無法確認是否有敗血症，死因還無法確認。</p>\r\n\r\n<p>不過，王建平也說，<strong>鯨魚胃部被漁網和塑膠袋給塞滿，體積多達約有怪手的一個車斗，這樣的情況會導致牠無法進食，也就是海洋污染問題間接害死牠</strong>，人類一手造成的結果。鯨豚中心預計，25日將鯨屍埋入砂堆製成標本，最快半年會完成作業。</p>\r\n\r\n<p><strong>▼鯨豚研究中心大刀解剖鯨屍。</strong></p>\r\n\r\n<p><img alt="" src="http://static.ettoday.net/images/1378/d1378820.jpg" style="height:338px; width:600px" /></p>\r\n\r\n<p><img alt="" src="http://static.ettoday.net/images/1378/d1378822.jpg" style="height:338px; width:600px" /></p>\r\n\r\n<p><strong>▼抹香鯨肚裡發現多達一車斗的漁網、塑膠袋。</strong></p>\r\n\r\n<p><img alt="" src="http://static.ettoday.net/images/1378/d1378821.jpg" style="height:338px; width:600px" /></p>\r\n\r\n<p><strong>▼鯨豚中心推測，人類污染海洋間接害死抹香鯨。</strong></p>\r\n\r\n<p><img alt="" src="http://static.ettoday.net/images/1378/d1378817.jpg" style="height:338px; width:600px" /></p>\r\n'),
(4, '這件事讓全台灣三千萬人都驚呆了', '2016-06-15 03:04:50', '千真萬確的那種', 81, '<p>有一天小名跟小美說:欸小美你真的美爆了</p>\r\n\r\n<p>然後小妹就爆了</p>\r\n\r\n<p><em>//這是斜體耶</em></p>\r\n\r\n<p><strong>//這是粗體耶</strong></p>\r\n\r\n<p><em><strong>//這又粗又斜耶</strong></em></p>\r\n\r\n<p><s>//這啥啊</s></p>\r\n'),
(5, '', '2016-06-15 18:44:01', '', 12, ''),
(6, '', '2016-06-15 18:58:47', '', 2, ''),
(7, '', '2016-06-15 20:38:22', '', 6, '');

-- --------------------------------------------------------

--
-- 資料表結構 `issue_image`
--

CREATE TABLE `issue_image` (
  `id` int(11) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `name` varchar(12) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `register_datetime` datetime NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activate_code` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`id`, `email`, `password`, `name`, `phone`, `register_datetime`, `activated`, `activate_code`) VALUES
(1, 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '2016-06-15 20:11:55', 1, 'a64881b4f4d451df561666b2a73ce695'),
(33, 'dog12131415161@gmail.com', 'QQ', '張廣智', '0933370300', '2016-06-15 01:30:49', 1, '6241dbc56bf1bebe9fe24da7cc1fe928'),
(35, 'nimo05911@gmail.com', '123', '阿敏', '0981203983', '2016-06-15 14:23:52', 1, '8332e1381f44af46b3e358f2c60325b7'),
(36, 'johnson50701@gmail.com', '1c0493dc246245fbe6f57dadb2dab229', 'johnson', '1234567891', '2016-06-15 15:17:00', 1, '81ff1daac2df4c1ba9f63f00811dffb9'),
(39, 'qprs71@gmail.com', '202cb962ac59075b964b07152d234b70', '一二三', '0912312312', '2016-06-15 18:12:23', 1, '366dac3079e6dcfa8626b4ac2c342c9c');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `achievement`
--
ALTER TABLE `achievement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
