-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 08 月 03 日 09:38
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zhixing`
--
CREATE DATABASE IF NOT EXISTS `zhixing` DEFAULT CHARACTER SET ucs2 COLLATE ucs2_general_ci;
USE `zhixing`;

-- --------------------------------------------------------

--
-- 表的结构 `zx_article`
--

CREATE TABLE IF NOT EXISTS `zx_article` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT '定位用ID',
  `tittle` char(30) NOT NULL COMMENT '标题',
  `type` char(50) NOT NULL COMMENT '文章分类',
  `date` date NOT NULL COMMENT '发表日期',
  `pic` char(50) NOT NULL COMMENT '图片',
  `content` text NOT NULL COMMENT '内容',
  `status_1` int(2) NOT NULL DEFAULT '0' COMMENT '首页第一版置顶',
  `status_2` int(2) DEFAULT '0' COMMENT '首页第二版置顶',
  `status_3` int(2) NOT NULL DEFAULT '0' COMMENT '首页第三版置顶',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `zx_article`
--

INSERT INTO `zx_article` (`id`, `tittle`, `type`, `date`, `pic`, `content`, `status_1`, `status_2`, `status_3`) VALUES
(1, '123', '123', '1994-12-18', '123', '123', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `zx_comment`
--

CREATE TABLE IF NOT EXISTS `zx_comment` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT '定位ID',
  `auther` char(20) NOT NULL COMMENT '评论发布者留下的邮箱',
  `date` date NOT NULL COMMENT '日期',
  `content` varchar(500) NOT NULL COMMENT '评论内容',
  `article` int(5) NOT NULL COMMENT '所属文章的id',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '标志状态为0时审核，1时发布',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `zx_slideshow`
--

CREATE TABLE IF NOT EXISTS `zx_slideshow` (
  `pic` char(30) NOT NULL COMMENT '路径',
  `sort` int(3) NOT NULL COMMENT '排序 从大到小 前后显示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `zx_type`
--

CREATE TABLE IF NOT EXISTS `zx_type` (
  `name` char(15) NOT NULL,
  `description` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
