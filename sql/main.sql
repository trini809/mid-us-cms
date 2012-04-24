-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2008 at 10:16 AM
-- Server version: 5.0.24
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `midcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `mn_parent_menu`
--

CREATE TABLE IF NOT EXISTS `mid_parent_menu` (
  `pid` int(11) NOT NULL auto_increment,
  `name` varchar(80) character set latin1 NOT NULL default '',
  `url` varchar(50) character set latin1 NOT NULL,
  `static` enum('0','1') character set latin1 NOT NULL default '0',
  `template` enum('1','2') character set latin1 NOT NULL,
  `menugroup` enum('1','2','3') character set latin1 NOT NULL default '1',
  `listorder` int(2) NOT NULL,
  `active` enum('0','1') character set latin1 NOT NULL default '0',
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=91109 ;

-- --------------------------------------------------------

--
-- Dumping data for table `mn_parent_menu`
--

INSERT INTO `mid_parent_menu` (`pid`, `name`, `url`, `static`, `template`, `menugroup`, `listorder`, `active`) VALUES
(91109, 'Home', 'index.php', '0', '1', '1', 10, '1'),
(91110, 'People', 'people.php', '0', '1', '1', 20, '1'),
(91111, 'Activities', 'activities.php', '0', '2', '1', 30, '1'),
(91112, 'News', 'news.php', '0', '1', '1', 40, '1'),
(91113, 'Careers', 'careers.php', '0', '1', '1', 50, '1'),
(91114, 'Contact', 'contact.php', '0', '1', '1', 70, '1'),
(91115, 'Gallery', 'gallery.php', '0', '1', '1', 60, '1'),
(91117, 'Privacy Policy', 'privacy.php', '0', '1', '2', 80, '1'),
(91118, 'Terms of Use', 'terms.php', '0', '1', '2', 90, '1'),
(91116, 'Sitemap', 'sitemap.php', '0', '1', '2', 100, '1');


-- --------------------------------------------------------

--
-- Table structure for table `mn_child_menu`
--

CREATE TABLE IF NOT EXISTS `mid_child_menu` (
  `cid` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL default '0',
  `name` varchar(80) character set latin1 NOT NULL default '',
  `template` enum('0','1') character set latin1 NOT NULL,
  `url` varchar(50) character set latin1 NOT NULL,
  `listorder` int(3) NOT NULL default '0',
  `active` enum('0','1') character set latin1 NOT NULL default '0',
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=81150 ;


-- --------------------------------------------------------

--
-- Table structure for table `mn_sub_menu`
--

CREATE TABLE IF NOT EXISTS `mid_sub_menu` (
  `sid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `name` varchar(80) character set latin1 NOT NULL default '',
  `template` enum('1','2') character set latin1 NOT NULL,
  `listorder` int(2) NOT NULL default '0',
  `active` enum('0','1') character set latin1 NOT NULL default '0',
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=75107 ;


-- --------------------------------------------------------

--
-- Table structure for table `mn_content`
--

CREATE TABLE IF NOT EXISTS `mid_content` (
  `pgid` int(11) NOT NULL auto_increment,
  `template` int(2) NOT NULL,
  `link` int(11) NOT NULL default '0',
  `content` mediumtext character set latin1 NOT NULL,
  `lastupdated` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`pgid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=65129 ;


-- --------------------------------------------------------

--
-- Dumping data for table `mn_content`
--

INSERT INTO `mid_content` (`pgid`, `template`, `link`, `content`, `lastupdated`) VALUES
(65129, 1, 91109, '', '0000-00-00 00:00:00'),
(65130, 1, 91110, '', '0000-00-00 00:00:00'),
(65131, 1, 91111, '', '0000-00-00 00:00:00'),
(65132, 1, 91112, '', '0000-00-00 00:00:00'),
(65133, 1, 91113, '', '0000-00-00 00:00:00'),
(65134, 1, 91114, '', '0000-00-00 00:00:00'),
(65135, 1, 91115, '', '0000-00-00 00:00:00'),
(65136, 1, 91116, '', '0000-00-00 00:00:00'),
(65137, 1, 91117, '', '0000-00-00 00:00:00'),
(65138, 1, 91118, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mn_content_img`
--

CREATE TABLE IF NOT EXISTS `mid_content_img` (
  `imgid` int(11) NOT NULL auto_increment,
  `page` int(11) NOT NULL,
  `filename` varchar(80) NOT NULL,
  `filesize` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (`imgid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=223405 ;

-- --------------------------------------------------------

--
-- Table structure for table `mn_people`
--

CREATE TABLE IF NOT EXISTS `mid_people` (
  `peepsid` smallint(3) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `position` varchar(255) NOT NULL default '',
  `image` varchar(255) NOT NULL default '',
  `imagefilesize` mediumint(5) NOT NULL default '0',
  `blurb` mediumtext NOT NULL,
  `email` varchar(255) default NULL,
  `tel` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `lasttime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `displayorder` smallint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`peepsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=164 ;


-- --------------------------------------------------------

--
-- Table structure for table `mn_gallery`
--

CREATE TABLE IF NOT EXISTS `mid_gallery` (
  `photoid` int(11) NOT NULL auto_increment,
  `filename` varchar(60) NOT NULL,
  `thumbnail` varchar(60) NOT NULL,
  `summary` text NOT NULL,
  `active` enum('0','1') NOT NULL,
  PRIMARY KEY  (`photoid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=232578 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL auto_increment,
  `first_name` varchar(40) character set latin1 NOT NULL default '',
  `last_name` varchar(40) character set latin1 NOT NULL default '',
  `login` varchar(30) character set latin1 NOT NULL default '',
  `passwd` varchar(60) character set latin1 NOT NULL default '',
  `telephone` varchar(30) character set latin1 NOT NULL default '',
  `email` varchar(80) character set latin1 NOT NULL default '',
  `active` enum('0','1') character set latin1 NOT NULL default '0',
  `level` enum('1','2','3') character set latin1 NOT NULL default '1',
  `last_login` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='admin table' AUTO_INCREMENT=33532 ;


-- --------------------------------------------------------

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `login`, `passwd`, `telephone`, `email`, `active`, `level`, `last_login`) VALUES
(33530, 'Temp', 'Temptu', 'temptu', 'd30c7f7381508c2fcd7139aaa67ce48e', '07932 667 578', 'temptu@trini809.com', '1', '1', '2011-07-02 14:52:36');


-- --------------------------------------------------------

--
-- Table structure for table `mn_news`
--

CREATE TABLE IF NOT EXISTS `mid_news` (
  `newsid` int(11) NOT NULL auto_increment,
  `headline` varchar(255) character set latin1 NOT NULL,
  `summary` text character set latin1 NOT NULL,
  `newsbody` mediumtext character set latin1 NOT NULL,
  `dateadded` datetime NOT NULL,
  `release_date` datetime NOT NULL,
  `attachedfile` varchar(100) character set latin1 NOT NULL,
  `attachedfilesize` varchar(255) character set latin1 NOT NULL,
  `active` enum('0','1') character set latin1 NOT NULL default '0',
  PRIMARY KEY  (`newsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3856567 ;
