<?php
// ---------------------------------------------------------------------//
// Please leave this message in place, no one will see this. It is      //
// meant for developers. This script is copyright 2012 by MidniteHour   //
// and solely developed for DEMONSTRATION.								//
//																		//
// You are not allowed to change this script in any way nor distribute	// 
// this script without the	written permission from MidniteHour. 		//
//                                                                      //
//                                                                      //
// Author :  trini809 ; contact: trini809@midnitehour.com               //
// Web address : www.midnitehour.com                                    //
// File : config.inc.php                                                //
//                                                                      //
// ---------------------------------------------------------------------//

// database
$db_host = "localhost";								// Location of the database
$db_user = "web";									// Username for the db access
$db_pass = "wwct67h8";								// Password for the db access
$db_name = "mucka";								// Name of the database
$dbext   = "mid_";									// DB table prefix

// setup a few vars
$admail = "democms@trini809.com";					// Admin email address
$infomail = "info@trini809.com";					// Contact for more info
$today = date('Y-m-d');								// MySQL date format
$mydate = date('D jS M Y');
$session_time_limit = "60";							// Session life span [minutes]
$sitepath = "/var/www/html/mydemo/mucka/";			// Site PATH
$siteurl = "http://demo.trini809.com/mucka/";			// Site URL
$adminurl = "http://demo.trini809.com/mucka/dm/";		// Admin URL

// number of listings per page
$max_res = "10";
$admin_max_res = "30";
$sub_max_res = "50";

// max img upload size (in bytes)
$max_img_size = "750000";

// number of allowed images per page
$max_images = "6";

// max pdf upload size (in bytes)
$pdf_max = "12582912";

// the new width of the resized images in pixels
$content_img_width = "190";
$gallery_thumb_width = "150";
$img_thumb_width = "120";

// people directory
$peeps = $sitepath."people";
$peepsurl = $siteurl."people";

// content images directory
$ctimg = $sitepath."contentimg";
$ctimgurl = $siteurl."contentimg";
$nwdocsdir = $sitepath."pdfs";
$nwdocsurl = $siteurl."pdfs";

// gallery photos directory
$gallerydir = $sitepath."gallery";
$gallerydirurl = $siteurl."gallery";

// limit file extension
$extlimit = "yes"; 

// allowed Extensions
$limitedext = array(".gif",".jpg",".png",".jpeg");

// where did she come from
$ref = $_SERVER['HTTP_REFERER'];

?>