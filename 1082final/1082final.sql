-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 
-- 伺服器版本： 10.4.10-MariaDB
-- PHP 版本： 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `1082final`
--

-- --------------------------------------------------------

--
-- 資料表結構 `board`
--

DROP TABLE IF EXISTS `board`;
CREATE TABLE IF NOT EXISTS `board` (
  `bID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `bUser` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bTime` datetime NOT NULL,
  `bName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bRec` enum('推','噓') COLLATE utf8_unicode_ci NOT NULL DEFAULT '推',
  `bSub` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bContent` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`bID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `board`
--

INSERT INTO `board` (`bID`, `bUser`, `bTime`, `bName`, `bRec`, `bSub`, `bContent`) VALUES
(0000000001, '開發者', '2020-06-29 11:12:29', '網路資料庫系統', '推', '大家晚安', '好爽ㄛ不知道後面要做什麼'),
(0000000002, '開發者', '2020-06-29 21:29:12', '程式設計（一）', '噓', '加賴叫過去', '性愛世大運\r\n優質外約bitch'),
(0000000009, '開發者', '2020-06-29 19:56:38', '線性代數', '推', '7.56', 'fsfs');

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `cID` tinyint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `cNum` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cYear` tinyint(1) NOT NULL,
  `cTeacher` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cInfo` text COLLATE utf8_unicode_ci NOT NULL,
  `cHard` enum('困難','適中','簡單') COLLATE utf8_unicode_ci NOT NULL DEFAULT '適中',
  `cHW` enum('多','適中','少') COLLATE utf8_unicode_ci NOT NULL DEFAULT '適中',
  `cRec` enum('推薦','不建議','必修') COLLATE utf8_unicode_ci NOT NULL DEFAULT '推薦',
  PRIMARY KEY (`cID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `course`
--

INSERT INTO `course` (`cID`, `cNum`, `cName`, `cYear`, `cTeacher`, `cInfo`, `cHard`, `cHW`, `cRec`) VALUES
(001, 'IC261', '網路資料庫系統', 2, '張家榮', '學習php語法與mysql', '適中', '適中', '推薦'),
(002, 'IC324', '跨媒體整合', 3, '施俊宇', 'aka小畢製', '困難', '少', '必修'),
(003, 'IC184', '程式設計（一）', 1, '方文聘', 'c++', '困難', '適中', '必修'),
(004, 'IC286', '程式設計實習(一)', 1, '陳啟禎', 'c++上機上課', '適中', '多', '必修'),
(005, 'IC287', '微積分概論', 1, '鄧進宏', '我不喜歡', '困難', '適中', '必修'),
(006, 'IC151', '設計概論', 1, '陳崇文', '偏涼', '簡單', '少', '必修'),
(007, 'IC181', '資訊概論', 1, '林珮瑜', '計算機概論', '簡單', '少', '必修'),
(008, 'IC224', '普通物理學', 1, '盧公瑜', '高中物理課的難度', '簡單', '適中', '推薦'),
(009, 'IC248', '線性代數', 1, '鄧進宏', '這我也不喜歡', '困難', '適中', '必修'),
(010, 'IC193', '電腦網路概論', 1, '陳啟禎', '瞭解網路連線協議', '適中', '少', '推薦'),
(011, 'IC288', '數位影音概論', 1, '張世明', '拍影片', '適中', '少', '必修'),
(012, 'IC120', '數位影像處理', 1, '張弘毅', 'photoshop', '適中', '適中', '必修'),
(013, 'IC192', '程式設計（二）', 1, '方文聘', 'c++', '困難', '多', '必修'),
(014, 'IC200', '程式設計實習（二）', 1, '簡子超', 'c++上機上課', '適中', '多', '必修'),
(015, 'IC225', '互動腳本製作', 2, '張弘毅', '報告一堆', '適中', '多', '必修'),
(016, 'IC340', '多媒體概論', 2, '黃怡錚', '多媒體種類與介紹', '簡單', '少', '必修'),
(017, 'IC172', '資料結構', 2, '趙伯堯', 'treeeeee', '適中', '少', '必修'),
(018, 'IC238', '視窗應用程式設計', 2, '鄧進宏', 'c#與視窗程式', '適中', '適中', '必修'),
(019, 'IC342', '遊戲程式設計', 2, '黃怡錚', 'unity基本操作', '適中', '少', '必修'),
(020, 'IC186', '網頁程式設計', 2, '趙伯堯', 'javascript', '困難', '適中', '必修'),
(021, 'IC291', '人機互動概論', 2, '林珮瑜', 'arduino', '適中', '少', '必修'),
(022, 'IC242', '電玩企劃', 3, '張弘毅', '設計遊戲企劃,流程\r\n期末桌遊實體展示', '簡單', '適中', '推薦'),
(023, 'IC298', '資訊隱私', 1, '葉', '個人資料蒐集與使用該注意的部分', '適中', '少', '必修');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `mID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `mName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mSex` enum('男','女') COLLATE utf8_unicode_ci NOT NULL DEFAULT '男',
  `mBirthday` date NOT NULL,
  `mUser` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mPassword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mLv` enum('admin','member') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `mEmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`mID`, `mName`, `mSex`, `mBirthday`, `mUser`, `mPassword`, `mLv`, `mEmail`) VALUES
(0000000001, '陳晁傑', '男', '1999-03-10', '開發者', 'antonio0310', 'admin', 'antonio0310antonio0310@gmail.com'),
(0000000002, '香蕉', '男', '1998-03-20', 'banana', '1234', 'member', 's1062024@g.yzu.edu.tw'),
(0000000003, 'CHAO-CHIEH Chen', '男', '2020-06-03', 'dog', 'asd', 'member', 'app@g.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
