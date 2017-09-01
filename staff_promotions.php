<?php 

include 'included.php'; session_start();

function userid($username){
	$a = mysql_query("SELECT id from users WHERE username = '".$username."'");
	$b = mysql_fetch_array($a);
	return $b["id"];
}

$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$rank = $myrank;
if($rank < 75){ header("Location:home.php"); exit; }
?>
<html>
<head>
<title>The Mafia Town</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png">
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
</script>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<table align="center" cellpadding="0" cellspacing="0" width="99%"><tbody><tr>
<td class="menutopleft"><img style="display: block" alt="" src="blank.gif" height="20" width="15"></td>
<td class="middlestart"><img style="display: block" alt="" src="blank.gif" height="20" width="11"></td>
<td class="middlemiddle" style="white-space: nowrap" height="20"><font color="222222" face="verdana" size="1"><b>Promote player</b></font></td>
<td class="middleend"><img style="display: block" alt="" src="blank.gif" height="20" width="11"></td>
<td class="menutopright"><img style="display: block" alt="" src="blank.gif" height="20" width="10"></td></tr></tbody></table>
<table style="width: 99%" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td class="menuside"><img style="display: block" alt="" src="blank.gif" width="10"></td>
<td bgcolor="333333" width="100%"><br>
<?
if($_POST["submitRank"]){
	if($_POST["editUser"] > 0){
		if($_POST["rankid"] != "HDO"){
			mysql_query("UPDATE users SET checkstaff = 1, rankid = '".$_POST["rank"]."' WHERE id = '".$_POST["editUser"]."'");
			echo "<script>showNotification('Success!','You promoted ".$_POST["username"]."!','images/Success.png');</script>";
		}else{
		
		}
	}else{
		$getU_ = mysql_query("SELECT id FROM users WHERE username = '".$_POST["username"]."'");
		if(mysql_num_rows($getU_) > 0){
			$uD = mysql_fetch_array($getU_);
			mysql_query("UPDATE users SET checkstaff = 1, rankid = '".$_POST["rank"]."' WHERE id = '".$uD["id"]."'");
			echo "<script>showNotification('Success!','You promoted ".$_POST["username"]."!','images/Success.png');</script>";
	
		}
	}
}
if($_GET["deleteFromHDO"]){
	mysql_query("DELETE from hdos WHERE username='".$_GET["deleteFromHDO"]."'");
}
if($_POST["submitHdo"]){
	$ban = 0;
	$forum = 0;
	if($_POST["editHdo"] > 0){
			mysql_query("UPDATE users SET checkstaff = 1 WHERE id = '".$_POST["editHdo"]."'");
			if($_POST["ban"] == "on"){ $ban = 1; }
			if($_POST["deleteForumTopic"] == "on"){ $forum = 1; }
			mysql_query("UPDATE hdos SET ban = {$ban} WHERE username = '".$_POST["username"]."'");
			mysql_query("UPDATE hdos SET deletetopic = {$forum} WHERE username = '".$_POST["username"]."'");
			echo "<script>showNotification('Success!','You promoted ".$_POST["username"]."!','images/Success.png');</script>";

	}else{
		$getU_ = mysql_query("SELECT id FROM users WHERE username = '".$_POST["username"]."'");
		if(mysql_num_rows($getU_) > 0){
			$uD = mysql_fetch_array($getU_);
			mysql_query("UPDATE users SET checkstaff = 1 WHERE id = '".$uD["id"]."'");
			if($_POST["ban"] == "on"){ $ban = 1; }
			if($_POST["deleteForumTopic"] == "on"){ $forum = 1; }
			mysql_query("INSERT into hdos values ('".$_POST["username"]."', NOW(), '".$usernameone."', '".$_POST["type"]."', $ban, $forum)");
			// echo "22";
			echo "<script>showNotification('Success!','You promoted ".$_POST["username"]."!','images/Success.png');</script>";
	
		}
	}
}
?>
<? 
$selectStaffs = mysql_query("SELECT id, username, rankid,ent from users WHERE rankid >= 25"); ?>
<table width="95%" align="center">
<tr>
<td width="40%" align="center" valign="top">
<? if($rank > 75){ ?>
<table class="section" width="99%">
<tr><td class="header" colspan="2">Staffs</td></tr>
<tr><td class="line" colspan="2"></td></tr>
<?
while($staffU = mysql_fetch_array($selectStaffs)){
	?>
	<tr><td title="<?=getRankName($staffU["rankid"], $staffU["ent"])?>"><font color="<?=getRankColor($staffU["rankid"], $staffU["ent"])?>"><?=$staffU["username"]?></font></td><td width="20px"><font color="white" size="-1" face="verdana"><a href="staff_promotions.php?editStaff=<?=$staffU["id"]?>">[E]</a></td></tr>

	<?
}
?>
</table>
<br><? } ?>
<table class="section" width="99%">
<tr><td class="header" colspan="2">HDOs</td></tr>
<tr><td class="line" colspan="2"></td></tr>
<?
$selectStaffs = mysql_query("SELECT * from hdos");
while($staffU = mysql_fetch_array($selectStaffs)){
	$userData = mysql_fetch_array(mysql_query("SELECT rankid, ent from users WHERE username = '".$staffU["username"]."'"));
	?>
	<tr><td title="<?=getRankName($userData["rankid"], $userData["ent"])?>"><font color="<?=getRankColor($userData["rankid"], $userData["ent"], 1)?>"><?=$staffU["username"]?></font></td><td width="20px"><font color="white" size="-1" face="verdana"><a href="staff_promotions.php?editHdo=<?=$staffU["username"]?>">[E]</a>&nbsp;<a href="staff_promotions.php?deleteFromHDO=<?=$staffU["username"]?>">[X]</a></td></tr>

	<?
}
?>
</table>
</td>
<?
if($_GET["editStaff"] > 0){
	// select rank and username$
	$getUI = mysql_query("SELECT username, id, rankid FROM users WHERE id = '".$_GET["editStaff"]."'");
	if(mysql_num_rows($getUI) > 0){ $userD = mysql_fetch_array($getUI); }
}if($_GET["editHdo"]){
	// select rank and username$
	$getHD = mysql_query("SELECT username, id, rankid FROM users WHERE username = '".$_GET["editHdo"]."'");
	if(mysql_num_rows($getHD) > 0){ $hdD = mysql_fetch_array($getHD); $b = mysql_fetch_array(mysql_query("SELECT * from hdos WHERE username = '".$hdD["username"]."'")); }
}
?>
<td width="60%" align="center" valign="top">
<? if($rank > 75){ ?> <form method="POST">
<table class="section" width="99%" style="color:white;">
<tr><td class="header" colspan="2">Promote to Staff</td></tr>
<tr><td class="line" colspan="2"></td></tr>
<tr><td>Username:</td><td><input type="hidden" name="editUser" value="<?=$userD["id"]?>"><input value="<?=$userD["username"]?>" class="submittext" name="username"></td></tr>
<tr><td>Rank:</td><td>
<select name="rank" class="submittext">
<option value="22" <?=($userD["rankid"] == 22 ? "SELECTED" : "")?>>State Gangster</option>
<option value="25" <?=($userD["rankid"] == 25 ? "SELECTED" : "")?>>Moderator</option>
<option value="50" <?=($userD["rankid"] == 50 ? "SELECTED" : "")?>>Entertainer Manager</option>
<option value="75" <?=($userD["rankid"] == 75 ? "SELECTED" : "")?>>HDO Manager</option>
<option value="100" <?=($userD["rankid"] == 100 ? "SELECTED" : "")?>>Administrator</option>
</select></td></tr>
<tr><td colspan="2" align="right"><input type="button" name="addRank" onClick="location.href='staff_promotions.php';" value="Add new Staff!" class="submit"><input type="submit" name="submitRank" value="Submit!" class="submit"></td></tr>
</table>
</form>
<smallbr> <? }?>
<form method="POST">
<table class="section" width="99%" style="color:white;">
<tr><td class="header" colspan="2">Promote to HDO</td></tr>
<tr><td class="line" colspan="2"></td></tr>
<tr><td>Username:</td><td><input type="hidden" name="editHdo" value="<?=$hdD["id"]?>"><input value="<?=$hdD["username"]?>" class="submittext" name="username"></td></tr>
<tr><td>Type:</td><td>
<input type="text" name="type" value="<?=$b["type"]?>" class="submittext">
</td></tr><tr><td>Can ban:</td><td>
<input type="checkbox" name="ban" <?=($b["ban"] == 1 ? "checked" : "")?>>
</td></tr><tr><td>Can delete forum topic:</td><td>
<input type="checkbox" name="deleteForumTopic" <?=($b["deletetopic"] == 1 ? "checked" : "")?>>
</td></tr>
<tr><td colspan="2" align="right"><input type="button" name="addRank" onClick="location.href='staff_promotions.php';" value="Add new HDO!" class="submit"><input type="submit" name="submitHdo" value="Submit!" class="submit"></td></tr>
</table>
</form>
</td>


</tr>
</table>

<br>

</smallbr></td><td class="menuside"><img style="display: block" alt="" src="blank.gif" width="10"></td></tr></tbody></table>
<table style="width: 99%" align="center" cellpadding="0" cellspacing="0"><tbody><tr>
<td class="menubottomleft"><img style="display: block" alt="" src="blank.gif" height="10" width="15"></td>
<td class="menutopbottom"><img style="display: block" alt="" src="blank.gif"></td>
<td class="menubottomright"><img style="display: block" alt="" src="blank.gif" height="10" width="15"></td>
</tr></tbody></table>


</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

<head>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
</head>
</body></html>

