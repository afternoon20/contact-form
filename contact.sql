-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 2 月 07 日 05:46
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `contact`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `Form`
--

CREATE TABLE `Form` (
  `id` int(11) NOT NULL,
  `subject` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `contents` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `Form`
--

INSERT INTO `Form` (`id`, `subject`, `name`, `email`, `tel`, `contents`) VALUES
(2, 'ご感想', '山田太郎', 'yamadatarou@aaa.com', '09000000000', 'お問い合わせします。\r\n改行しました。');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `Form`
--
ALTER TABLE `Form`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `Form`
--
ALTER TABLE `Form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
