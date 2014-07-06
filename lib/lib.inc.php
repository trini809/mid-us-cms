<?php
// ---------------------------------------------------------------------//
// Please leave this message in place, no one will see this. It is      //
// meant for developers. This script is copyright 2012 by MidniteHour   //
// and solely developed for DEMONSTRATION.	 							//
//																		//
// You are not allowed to change this script in any way nor distribute	// 
// this script without the	written permission from MidniteHour. 		//
//                                                                      //
//                                                                      //
// Author :  trini809 ; contact: trini809@midnitehour.com               //
// Web address : www.midnitehour.com                                    //
// File : lib.inc.php	                                                //
//                                                                      //
// ---------------------------------------------------------------------//


// load config file
$pre_path = "/var/www/html/mydemo/mucka";
$config_path = $pre_path."/lib/config.inc.php";
include_once $config_path;

// connect to db
	$dbIDnull = "null";
	$conn = mysql_connect($db_host, $db_user, $db_pass) or mysql_error();
	$link = mysql_select_db($db_name);
	if(!$conn or (isset($link) and !$link)) die("<b>Database connection failed!</b><br>Contact the admin, please.");

if ($session_time_limit) {
  if (!$_SESSION["sess_begin"]) {
    $sess_begin = time();
    session_register('sess_begin');
	$_SESSION['sess_begin'] = $sess_begin;
  } else {
    $now = time();
    if (($now - $_SESSION['sess_begin']) > ($session_time_limit*60)) {
      session_unset();
      session_destroy();
      die ("<br><center><font face=verdana size=1>Your session has timed out! <a href='{$adminurl}index.php'>Please login again.</a></font></center>");
    } else {
      $sess_begin = $now;
      session_register('sess_begin');
	  $_SESSION['sess_begin'] = $sess_begin;
    }
  }
}

// define the error level
$error_reporting_level = 1;
if (!isset($error_reporting_level) or !$error_reporting_level) { 
	error_reporting(0); 
	} else { 
	error_reporting( E_ALL & ~E_NOTICE); 
	} 

// validate email address
function validate_email($email) {

   // Create the syntactical validation regular expression
   $regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$";

   // Presume that the email is invalid
   $valid = 0;

   // Validate the syntax
   if (eregi($regexp, $email))
   {
      list($username,$domaintld) = split("@",$email);
      // Validate the domain
      if (getmxrr($domaintld,$mxrecords))
         $valid = 1;
   } else {
      $valid = 0;
   }

   return $valid;
}

// execute sql query    
function db_query($query) {
  return mysql_query($query);
}

// fetch row statement
function fetch_row($result) {
  return mysql_fetch_row($result);
}

// number row statement
function num_row($result) {
  return mysql_num_rows($result);
}

// fetch array statement
function fetch_array($result) {
  return mysql_fetch_array($result);
}

// fetch associate array statement
function fetch_assoc($result) {
  return mysql_fetch_assoc($result);
}

// num fields statement
function num_field($result) {
  return mysql_num_fields($result);
}

// error-messages
function db_die() {
	echo mysql_error(); 
	die("</body></html>");
}

// close window
function close_window() {
	echo "<a href=\"javascript:window.close()\">close</a>\n";
}

// history -1
function goBack() {
	echo "<a href=\"javascript:history.go(-1)\">Go back</a>\n";
}

// convert datetime for last login
function getloginDate($pub) {
	$prev = substr($pub, 0, 10);
	list($y,$m,$d) = explode('-', $prev);
	$tm = substr($pub, -8);
	list($h,$n,$s) = explode(':', $tm);
	return date("D.d.M.y g:i:s a", mktime($h, $n, $s, $m, $d, $y));

}

// convert postdate for listing
function getpostDate($pub) {
	$prev = substr($pub, 0, 10);
	list($y,$m,$d) = explode('-', $prev);
	return date("D.d.M.y", mktime(0, 0, 0, $m, $d, $y));

}

// convert release date
function get_relDate($rd) {
		list($y,$m,$d) = explode('-', $rd);
        return date("jS M Y", mktime(0, 0, 0, $m, $d, $y));

}

// change file permission
function chmodFile($file) {
	$dimg = chmod($file, 0755);
	return $dimg;
}

// create extra lines
function pageSpacer() {
	echo "<p style=\"height:20px\">&nbsp;</p>\n";
}

// clean up URL for listing
function cleanURL($et) {
	if (substr($et, 0, 7) == "http://") {
		$et = substr($et, 7);
		}
		return $et; 
}

// 
function wordSplit($str,$words=25) {
	$arr = preg_split("/[\s]+/", $str,$words+1);
	$arr = array_slice($arr,0,$words);
	return join(' ',$arr);
}

// generate random img name
function str_rand($length = 10, $seeds = 'abcdefghijklmnopqrstuvwxyz0123456789') {
    $str = '';
    $seeds_count = strlen($seeds);
 
    // Seed
    list($usec, $sec) = explode(' ', microtime());
    $seed = (float) $sec + ((float) $usec * 100000);
    mt_srand($seed);
 
    // Generate
    for ($i = 0; $length > $i; $i++) {
        $str .= $seeds{mt_rand(0, $seeds_count - 1)};
    }
 
    return $str;
}

// get db table name
	function getTableName($t) {
	global $dbext;
	$gtn[0] = "/1/";
	$gtn[1] = "/2/";
	
	// string value
	$str[0] = $dbext."child_menu";
	$str[1] = $dbext."sub_menu";
	
	return preg_replace($gtn, $str, $t);
}

// display available pdf - members area
function getPDFlist() {
	global $prdir, $prurl;
	// open pdf directory
	$prDir = opendir("$prdir");

	// get each entry
	while(false !== ($prName = readdir($prDir)))	{
		if ($prName != "." && $prName != ".." && $prName != "index.php") {
			$prArray[] = $prName;	}
			}
		// close directory
		closedir($prDir);
		
		//	count elements in array
		$iCount	= count($prArray);
				
		// print out listing
		if ($iCount == 0) {
			echo "<strong class=\"redtxt\">No files available</strong>";
			} else {
		// sort 'em
		sort($prArray);	
			
		for($i=0; $i < $iCount; $i++) {
		echo "<a href=\"".$prurl."/".$prArray[$i]."\" target=\"_blank\">".$prArray[$i]."</a> &nbsp; <img border=\"0\" src=\"img/pdficon_small.gif\" /><br /><br />\n"; 
			}
		}
}

?>