<?php
// ---------------------------------------------------------------------//
// Please leave this message in place, no one will see this. It is      //
// meant for developers. This script is copyright 2007 by MidniteHour   //
// and solely developed for DEMONSTRATION.								//
//																		//
// You are not allowed to change this script in any way nor distribute	// 
// this script without the	written permission from MidniteHour. 		//
//                                                                      //
//                                                                      //
// Author :  trini809 ; contact: trini809@midnitehour.com               //
// Web address : www.midnitehour.com                                    //
// File : menu.inc.php		                                            //
//                                                                      //
// ---------------------------------------------------------------------//

// the query
$sql = db_query ("select * from ".$dbext."parent_menu where static = '0' and menugroup = '1' order by listorder asc") or db_die();
$numpar = num_row($sql);

?>

<script type="text/javascript">
<!--
stm_bm(["menu30a2",840,"menu","blank.gif",0,"","",2,0,0,0,500,1,1,1,"","",67108875,0,1,2,"default","hand",""],this);
stm_bp("p0",[0,4,0,0,0,3,0,7,100,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.10)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=reverse,enabled=0,Duration=0.10)",4,100,0,0,"#999999","#005891","",3,0,0,"#000000"]);
/*
<?php
// parent menu values
for ($i = 0; $i<$numpar; $i++) {
$row = fetch_array($sql);
$pname = $row['name'];
$plink = $row['url'];
?>
*/
stm_ai("p0i0",[1,"<?php echo $pname; ?>","","",-1,-1,0,"<?php echo $plink.$ext; ?>","_self","","<?php echo $pname; ?>","","",0,0,0,"grey2-r.gif","blue7-r.gif",7,9,0,1,1,"#005891",0,"#73B7DF",0,"","",1,1,1,1,"#005981 #FFFFFF #005981 #005981","#005981 #FFFFFF #005981 #005981","#FFFFFF","#333333","bold 11px Verdana","bold 11px Verdana",0,0],110,29);
stm_bp("p1",[1,4,0,2,0,4,0,7,100,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.10)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=reverse,enabled=0,Duration=0.10)",4,100,2,3,"#999999","#5090cd","",3,0,0,"#5090CD #5090CD #FFFFFF"]);
/*
<?php
// child menu values
$sql1 = db_query ("select * from ".$dbext."child_menu where pid = '".$row['pid']."' and active = '1' order by cid asc") or db_die();
$childnum = num_row($sql1);
for ($c = 0; $c<$childnum; $c++) {
$res = fetch_array($sql1);
$cname = $res['name'];
$clink = $res['cid'];
$plink = $row['url'].$ext;
?>
*/
stm_ai("p1i0",[1,"<?php echo $cname; ?>","","",-1,-1,0,"<?php echo $plink; ?>?pageID=<?php echo $clink; ?>","_self","","<?php echo $cname; ?>","","",0,0,0,"grey2-r.gif","blue7-r.gif",7,9,0,0,1,"#FFFFF7",1,"#B5BED6",1,"","",3,3,1,1,"#5090CD #5090CD #FFFFFF #5090CD","#5090CD #5090CD #FFFFFF #5090CD","#FFFFFF","#005891","bold 10px Verdana","bold 10px Verdana",0,0],176,0);
stm_bp("p2",[1,2,0,0,2,3,0,0,100,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.10)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=reverse,enabled=0,Duration=0.10)",4,100,2,3,"#999999","#5090cd","",3,0,0,"#5090CD #5090CD #FFFFFF"]);
/*
<?php
// 3rd tier navigation
$sql2 = db_query ("select * from ".$dbext."sub_menu where cid = '".$res['cid']."' and active = '1' order by sid asc") or db_die();
$subnum = num_row($sql2);
for ($s = 0; $s<$subnum; $s++) {
$chd = fetch_array($sql2);
$sname = $chd['name'];
$slink = $chd['sid'];
?>
*/
stm_ai("p2i0",[1,"<?php echo $sname; ?>","","",-1,-1,0,"<?php echo $plink; ?>?pageID=<?php echo $slink; ?>","_self","","<?php echo $sname; ?>","","",0,0,0,"","",0,0,0,0,1,"#FFFFF7",1,"#B5BED6",1,"","",3,3,1,1,"#5090CD #5090CD #FFFFFF #5090CD","#5090CD #5090CD #FFFFFF #5090CD","#FFFFFF","#005891","bold 10px Verdana","bold 10px Verdana",0,0],120,0);
/*
<?php
}
?>
*/
stm_ep();
/*
<?php
}
?>
*/
stm_ep();
/*
<?php
}
?>
*/
stm_ep();
stm_em();
//-->
</script>
