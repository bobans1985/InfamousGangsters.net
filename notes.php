<? include 'included.php'; session_start();


?>
<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png">
<script type="text/javascript">
function emotion(em) { document.smiley.editprofile.value=document.smiley.editprofile.value+em;}
</script>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?php 
$zpattern[a] = "<";
$zpattern[b] = ">";
$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$newmusic = htmlentities($newmusicraw, ENT_QUOTES);
$bust = preg_replace($saturate,"",$bustraw);
$kills = preg_replace($saturate,"",$killsraw);
$casinos = preg_replace($saturate,"",$casinosraw);
$viewer = preg_replace($saturate,"",$viewera);

$gangsterusername = $usernameone;




$profilesubmitraw = $_POST['editprofile'];
$profilesubmit = htmlentities($profilesubmitraw, ENT_QUOTES); 

if(isset($_POST['editprofile'])) { 
mysql_query("UPDATE users SET notes = '$profilesubmit' WHERE username = '$gangsterusername'");
$showoutcome++; $outcome = "<font size=1 face=verdana color=white>Notes updated!";
}




$getuserinfosqldone = mysql_query("SELECT notes FROM users WHERE username = '$gangsterusername'");
$getuserinfoarraydone = mysql_fetch_array($getuserinfosqldone);
$getuserprofile = $getuserinfoarraydone['notes'];
$userprofiles = str_replace("<br />", "\n", $getuserprofile);
$userprofile = str_replace($zpattern,$zreplace,$userprofiles); 



?> 
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt=""></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Notes</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt="" ></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" width=8></td>
<td background="/layout/crossbg.png"><br>

<? if($showoutcome>=1){ ?>
<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></td></tr>
</table><br>
<? } ?>

<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<center><form method="post" name="smiley"><textarea name="editprofile" cols="60" rows="20" class="textbox" id ="editprofile">
<?php echo$userprofile;?>
</textarea><br>
<input type ="submit" value="Update notes" class="textbox">
</form></center><br>
</tbody></table></td>
<td class=menuright><img style="display: block"  src="blank.gif" after alt="" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" src="blank.gif" after alt="" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" src="blank.gif" after alt=""></td>
<td class=menubottomright><img style="display:  block" src="blank.gif" after alt="" width="8" height="9"></td>
</tr></tbody></table></div>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>