<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . '/gioCMS/config/config.inc.php');
include_once(MYSQL);
include_once(MYSQLF);

if(file_exists(BASE_URL . '/gioCMS/checkStart.txt'))
{
   echo 'it did not perform the code';
}
else
{
        $q1 = "DROP TABLE IF EXISTS `hnplinks`;";
        $r = mysqli_query($dbc, $q1);
	if(mysqli_error($dbc))
	{
	   echo mysqli_error($dbc);
	}
	else
	{
	   echo 'hnplinks dropped <br/>';
	}
	
        $q2 = "DROP TABLE IF EXISTS `hnclinks`;";
        $r = mysqli_query($dbc, $q2);
	if(mysqli_error($dbc))
	{
	   echo mysqli_error($dbc);
	}
	else
	{
	   echo 'hnclinks dropped <br/>';
	}
	

        $q3 = "DROP TABLE IF EXISTS `vnplinks`;";
        $r = mysqli_query($dbc, $q3);
	if(mysqli_error($dbc))
	{
	   echo mysqli_error($dbc);
	}
	else
	{
	   echo 'vnplinks dropped <br/>';
	} 
	
        $q4 = "DROP TABLE IF EXISTS `vnclinks`;";
        $r = mysqli_query($dbc, $q4);
	if(mysqli_error($dbc))
	{
	   echo mysqli_error($dbc);
	}
	else
	{
	   echo 'vnclinks dropped <br/>';
	}
	
        $q1 = "CREATE TABLE IF NOT EXISTS `hnplinks` (
	  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
	  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
	  `link` tinytext COLLATE utf8_unicode_ci NOT NULL,
	  `orderx` tinyint(4) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;";
	
	$q2 =  "CREATE TABLE IF NOT EXISTS `hnclinks` (
	  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
	  `parent_id` int(10) unsigned zerofill NOT NULL,
	  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
	  `link` tinytext COLLATE utf8_unicode_ci NOT NULL,
	  `orderx` tinyint(4) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;";
	
	$q3 = "CREATE TABLE IF NOT EXISTS `vnplinks` (
	  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
	  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
	  `link` tinytext COLLATE utf8_unicode_ci NOT NULL,
	  `orderx` int(11) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;";
	
	$q4 = "CREATE TABLE IF NOT EXISTS `vnclinks` (
	  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
	  `parent_id` int(10) unsigned zerofill NOT NULL,
	  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
	  `link` tinytext COLLATE utf8_unicode_ci NOT NULL,
	  `orderx` tinyint(4) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;";
	
	
	$r = mysqli_query($dbc, $q1);
	if(mysqli_error($dbc))
	{
	   echo mysqli_error($dbc);
	}
	else
	{
	   echo 'it worked';
	}
	
	$r = mysqli_query($dbc, $q2);
	if(mysqli_error($dbc))
	{
	   echo mysqli_error($dbc);
	}
	else
	{
	   echo 'it worked';
	}
	
	$r = mysqli_query($dbc, $q3);
	if(mysqli_error($dbc))
	{
	   echo mysqli_error($dbc);
	}
	else
	{
	   echo 'it worked';
	}
	
	$r = mysqli_query($dbc, $q4);
	if(mysqli_error($dbc))
	{
	   echo mysqli_error($dbc);
	}
	else
	{
	   echo 'it worked';
	}
	echo '<br/>Databases Have Been Created';
	
   $q1 = "INSERT INTO `hnplinks` (`id`, `name`, `link`, `orderx`) VALUES
	(0000000001, 'GioManage', '/gioCMS/manage/', 98),
	(0000000002, 'OptManage', '/gioCMS/optionCMS/manage/', 99)";
	$r = mysqli_query($dbc, $q1);
	if(mysqli_error($dbc))
	{
	   echo mysqli_error($dbc);
	}
	else
	{
	   echo 'Data had been added';
	}
	
   $q2 = "INSERT INTO `hnclinks` (`id`, `parent_id`, `name`, `link`, `orderx`) VALUES
	(NULL, 0000000001, 'HoriNav', '/gioCMS/manage/horiNav/', 1),
	(NULL, 0000000001, 'VertiNav', '/gioCMS/manage/vertiNav/', 2),
	(NULL, 0000000001, 'Pages', '/gioCMS/manage/pages/', 3),
	(NULL, 0000000002, 'Pages', '/gioCMS/optionCMS/manage/pages/', 1)";
        $r = mysqli_query($dbc, $q2);
	if(mysqli_error($dbc))
	{
	   echo mysqli_error($dbc);
	}
	else
	{
	   echo 'Data had been added';
	}


	
	$handle = fopen(BASE_URL . '/gioCMS/checkStart.txt', 'a+');
	fclose($handle);
	echo 'code1';
	if(file_exists(BASE_URL . '/index.php'))
        {
           unlink(BASE_URL . '/index.php');
        }
        echo 'code2';
	$file = fopen(BASE_URL . '/index.php', 'a+');
	fwrite($file, NEWPAGE_STRING);
	fclose($file);
	echo 'code3';
}

?>