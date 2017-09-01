<? include 'included.php'; session_start();?>
<?

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$time = time();
$poster = $_GET['deletepost'];
$betraw = mysql_real_escape_string($_POST['bet']);
$joinraw = mysql_real_escape_string($_POST['join']);
$autoraw = mysql_real_escape_string($_POST['auto']);
$extra = mysql_real_escape_string($_POST['extra']);
$extratype = mysql_real_escape_string($_POST['extratype']);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$join = preg_replace($saturated,"",$joinraw);
$bet = preg_replace($saturated,"",$betraw);
$auto = preg_replace($saturated,"",$autoraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$username = $usernameone;
$userarray = $statustesttwo;
$userlocation = $userarray['location'];
$userrankid = $myrank;
$usermoney = $userarray['money'];
$penpoints = $userarray['penpoints'];
$deletepost = preg_replace($saturated,"",$poster);

$checkindb = mysql_num_rows(mysql_query("SELECT * FROM mdgprofit WHERE username = '$usernameone'"));
if($checkindb < 1){ mysql_query("INSERT INTO `mdgprofit` (username,id) VALUES ('$usernameone','')"); }

$invertorySlots = $statustesttwo["rankid"];
if($statustesttwo["rankid"] > 25){
	$invertorySlots = 25;
}
if($userarray['extraslots'] == 1){
	$invertorySlots += 25;
}
?>

<html>
<head>
<title>The Mafia Town</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
</script>
</head>
<body background="/layout/wallpaper.png" onload="document.teehee.bet.select();">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<?php

function userid($username){
	$a = mysql_query("SELECT id from users WHERE username = '".$username."'");
	$b = mysql_fetch_array($a);
	return $b["id"];
}
if($bar == '/leftmenu.php'){die('<font color=black face=verdana size=1>Go away.</font>');}
$gimtime = time();

$usernameone = $usernameone;
$user = $statustesttwo['username'];
$rankid = $statustesttwo['rankid'];
$crewid = $statustesttwo['crewid'];
$notice = $statustesttwo['notice'];
$live = $statustesttwo['live'];
$hdo = $statustesttwo['hdo'];
$rr = $statustesttwo['rr'];
$silencer = $statustesttwo['silencer'];
$mails = $statustesttwo['mail'];


?>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
$entertainer = $ent;
if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

$mdgtest = mysql_query("SELECT * FROM mdg WHERE username = '$username'");
$mdgtest = mysql_num_rows($mdgtest);
?>
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?
$retMessage = "";

if($_POST["buyItem"]){
	$getItems = mysql_query("SELECT * from items");
	while($item = mysql_fetch_array($getItems)){
		$getEm = mysql_query("SELECT sum(user_invertory.count) as usedSlotes from user_invertory LEFT join items on (items.id = user_invertory.item) WHERE player = '".userid($user)."'");
		$getEmArr = mysql_fetch_array($getEm);
		$emptySlots = $invertorySlots - $getEmArr["usedSlotes"];
		$fullPrice = $item["buyprice"] * $_POST["buyitem_".strtolower($item["name"])];
		if($_POST["buyitem_".strtolower($item["name"])] > 0){
			$ret = mysql_query("select * from user_invertory WHERE player = '".userid($user)."' AND item = '".$item["id"]."'");
			if($emptySlots >= $_POST["buyitem_".strtolower($item["name"])]){
				if(mysql_num_rows($ret) > 0){
					$arr = mysql_fetch_array($ret);
					mysql_query("UPDATE user_invertory SET count = count + ".$_POST["buyitem_".strtolower($item["name"])]." WHERE id = '".$arr["id"]."'");
				}else{
					mysql_query("INSERT into user_invertory VALUES (null, '".userid($user)."', '".$item["id"]."', '".$_POST["buyitem_".strtolower($item["name"])]."')");
				}
				mysql_query("UPDATE users SET money = money - {$fullPrice} WHERE username='".$usernameone."'");
			}else{ $retMessage = "You don\'t have empty slots in your Inventory!"; }
		}
	}
}
if($_POST["sellItem"]){
	// for security -> remove items from users if sell
	mysql_query("INSERT INTO items_sales VALUES (null,'".userid($user)."','".$_POST["sale_item"]."','".$_POST["sale_price"]."','".$_POST["sale_piece"]."');");
	$ret = mysql_query("select * from user_invertory WHERE player = '".userid($user)."' AND item = '".$_POST["sale_item"]."'");
	$arr = mysql_fetch_array($ret);
	if($arr["count"] == $_POST["sale_piece"]){
		mysql_query("DELETE from user_invertory WHERE id = '".$arr["id"]."'");
	}elseif($arr["count"] > $_POST["sale_piece"]){
		mysql_query("UPDATE user_invertory SET count = count - ".$_POST["sale_piece"]." WHERE id = '".$arr["id"]."'");
	}else{
		
	}
}

if($_POST["buySales"]){
	$salesID = $_POST["salesID"];
	$sale_ = mysql_query("SELECT * FROM items_sales WHERE id = '".$salesID."' LIMIT 1");
	$saleData = mysql_fetch_array($sale_);
	$itemData_ = mysql_query("SELECT name FROM items WHERE id = '".$saleData["item"]."'");
	$itemData = mysql_fetch_array($itemData_);
		$fullMoney = $saleData["count"] * $saleData["price"];
		$fullMoney_tax = ($fullMoney - ($fullMoney * 0.02));
		$tax_ = $fullMoney * 0.02;
		$getEm = mysql_query("SELECT sum(user_invertory.count) as usedSlotes from user_invertory LEFT join items on (items.id = user_invertory.item) WHERE player = '".userid($user)."'");
		$getEmArr = mysql_fetch_array($getEm);
		$emptySlots = $invertorySlots - $getEmArr["usedSlotes"];
	if($usermoney < $fullMoney){ $retMessage = "You don\'t have enought money to buy this item!"; }else{
		$ret = mysql_query("select * from user_invertory WHERE player = '".userid($user)."' AND item = '".$saleData["item"]."'");
		if($emptySlots >= $saleData["count"]){
			if(mysql_num_rows($ret) > 0){
				$arr = mysql_fetch_array($ret);
				mysql_query("UPDATE user_invertory SET count = count + ".$saleData["count"]." WHERE id = '".$arr["id"]."'");
			}else{
				mysql_query("INSERT into user_invertory VALUES (null, '".userid($user)."', '".$saleData["item"]."', '".$saleData["count"]."')");
			}
			$fullMoney = $saleData["count"] * $saleData["price"];
			$fullMoney_tax = ($fullMoney - ($fullMoney * 0.02));
			$tax_ = $fullMoney * 0.02;
			// if($usernameone != $sale
			mysql_query("INSERT into notifications VALUES ('".$saleData["user"]."','<a href=\'market.php\'>".$username." bought your item(s) in market: <b>".$itemData["name"]."</b>! The sale\'s tax was $".number_format($tax_)."</a>', 0, null, '".time()."', 1)");
			// remove money and give to saller
			mysql_query("UPDATE users SET money = money - ".$fullMoney." WHERE id = '".userid($user)."'");
			mysql_query("UPDATE users SET money = money + ".$fullMoney_tax." WHERE id = '".$saleData["user"]."'");
			mysql_query("DELETE from items_sales WHERE id = '".$salesID."'");
		}else{ $retMessage = "You don\'t have empty slots in your invertory!"; }
	}
}

?>
<? if(strlen($retMessage) > 0){ ?>
<script>showNotification('','<?=$retMessage?>','blank.gif');</script>
<? } ?>
<style> 
#left { float: left; }
#right { float: right; }
</style>

<table align="center" cellpadding="0" cellspacing="0" width="99%"><tbody><tr>
<td class="menutopleft"><img style="display: block" alt="" src="blank.gif" height="20" width="15"></td>
<td class="middlestart"><img style="display: block" alt="" src="blank.gif" height="20" width="11"></td>
<td class="middlemiddle" style="white-space: nowrap" height="20"><font color="222222" face="verdana" size="1"><b>Market</b></font></td>
<td class="middleend"><img style="display: block" alt="" src="blank.gif" height="20" width="11"></td>
<td class="menutopright"><img style="display: block" alt="" src="blank.gif" height="20" width="10"></td></tr></tbody></table>
<table style="width: 99%" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td class="menuside"><img style="display: block" alt="" src="blank.gif" width="10"></td>
<td bgcolor="333333" width="100%"><br>


<? if($showoutcome>=1){ ?>
<script>showNotification('','<?=$outcome?>','blank.gif');</script>
<? } ?>
<table align="center" width="95%"><tbody><tr><td valign="top" width="50%">
<a href="invertory.php"><table class="section" width="99%">
<tbody><tr><td width="1%"><img src="/pictures/state/invertory.png"></td><td align="left"><font color="white" face="verdana" size="2">Inventory</font></td></tr>
</tbody></table></a></td><td valign="top" width="50%">
<a href="market.php"><table class="section" width="99%">
<tbody><tr><td width="1%"><img src="/pictures/state/market.png"></td><td align="left"><font color="white" face="verdana" size="2">Market</font></td></tr>
</tbody></table></a></td></tr></tbody></table>
<br>
<table width="95%" align="center"><tr><td valign="top" width="40%">
<form method="POST">
<table align="center" width="350px"><tbody><tr>
	<td valign="top" width="100%">
		<? $getItems = mysql_query("SELECT * from items"); ?>
		<table width="90%" class="section">
			<? while($item = mysql_fetch_array($getItems)){ ?>
			<tr>
				<td><td width="60px"><img src="pictures/crimes/<?=strtolower($item["name"])?>.png"></td><td width="230px" align="left"><b><font face="verdana" size="1" color="white"><?=$item["name"]?><br>$<?=number_format($item["buyprice"])?>/pcs</font></b></td><td align="right" width="50px"><input style="width:50px; text-align:right;" type="text" class="submittext" name="buyitem_<?=strtolower($item["name"])?>" value="0"></td>
			</tr>
			<? } ?>
			<tr><td colspan="4" class="header" align="center"><input type="submit" class="submit" name="buyItem" value="Buy items"></td></tr>
		</table>
	</td>
</tr></tbody></table>
</form>
</td><td width="60%" valign="top">
<?
	$getItems = mysql_query("SELECT items.*, items_sales.*, items_sales.id as salesid from items_sales LEFT join items on (items.id = items_sales.item)");
?>
<form method="POST">
<table align="center" width="100%" class="section"><tbody><tr>
			<tr><td class="header" colspan="5">User's Market</td></tr>
			<tr>
				<td class="header" colspan=2>Item</td>
				<td class="header">Saler</td>
				<td class="header">Price</td>
				<td class="header"></td>
			</tr>
			<? while($item = mysql_fetch_array($getItems)){
			$us_ = mysql_query("SELECT username FROM users WHERE id = '".$item["user"]."'");
			$user_d = mysql_fetch_array($us_);
			?>
			<tr>
				<td width="60px"><img src="pictures/crimes/<?=strtolower($item["name"])?>.png"></td>
				<td width="230px" align="left"><b><font face="verdana" size="1" color="white"><?=$item["count"]?>x <?=$item["name"]?></font></b></td>
				<td width="120px" align="left"><b><font face="verdana" size="1" color="white"><?=$user_d["username"]?></font></b></td>
				<td width="120px" align="left"><b><font face="verdana" size="1" color="white">$<?=number_format($item["price"])?>/pcs</font></b></td>
				<td align="right" width="50px">
					<input type="hidden" name="salesID" value="<?=$item["salesid"]?>"><input type="submit" class="submit" name="buySales" value="Buy"></td>
			</tr>
			<? } ?>
</tr></tbody></table>
</form>
<form method="POST">
<?
	$getItems = mysql_query("SELECT items.*, user_invertory.*, items.id as itemID from user_invertory LEFT join items on (items.id = user_invertory.item) WHERE player = '".userid($user)."'");
?>
<table align="center" width="100%" class="section"><tbody><tr>
			<tr><td class="header" colspan="2">Sell items</td></tr>
			<tr>
				<td class="inside">Item</td>
				<td class="inside"><select id="item_" name="sale_item" class="submittext">
					<option data-count="" data-origiPrice="" value=""></option>
					<? while($item = mysql_fetch_array($getItems)){ ?>
						<option data-origiPrice="<?=$item["sellprice"]?>" data-count="<?=$item["count"]?>" value="<?=$item["itemID"]?>"><?=$item["name"]?></option>
					<? } ?>
				</select></td>
			</tr>
			<tr>
				<td class="inside">Piece</td>
				<td class="inside"><input name="sale_piece" type="text" class="submittext"></td>
			</tr>
			<tr>
				<td class="inside">Price / pcs</td>
				<td class="inside"><input name="sale_price" type="text" class="submittext"></td>
			</tr>
			<tr>
				<td class="inside" colspan="2" align="center"><input type="submit" class="submit" name="sellItem" value="Sell item"></td>
			</tr>
</tr></tbody></table>
</form>

<script>
	$("#item_").change(function(e){
		var selected = $("#item_ option:selected").attr("data-count");
		var price = $("#item_ option:selected").attr("data-origiPrice");
		$("[name='sale_piece']").val(selected);
		$("[name='sale_price']").val(price);
	});
</script>

</td></tr></table>
</td><td class="menuside"><img style="display: block" alt="" src="blank.gif" width="10"></td></tr></tbody></table>
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

</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>

