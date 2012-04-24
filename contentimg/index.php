<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Restricted Area</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.bd {
	font-family: Verdana;
	font-size: 10px;
	color: #333333;
}
a:link {
	color: #CC0000;
	text-decoration: underline;
}
a:visited {
	color: #CC0000;
	text-decoration: underline;
}
a:hover {
	color: #990000;
	text-decoration: none;
}
a:active {
	color: #CC0000;
	text-decoration: underline;
}
-->
</style>
</head>

<body bgcolor="#FFFFFF" class="bd">
<strong>- - Restricted Area - -</strong><br>
<br>
Your IP : 
<? 
$ip = getenv("REMOTE_ADDR");
echo "<font color='990000'><b>$ip</b></font>&nbsp;"; ?>
has been noted.<br>
<br>
Please <a href="javascript: history.go(-1)">leave</a>. 
</body>
</html>
