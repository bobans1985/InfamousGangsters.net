<? include 'included.php'; session_start();
// die();
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$poster = mysql_real_escape_string($_GET['deletepost']);
$vera = mysql_real_escape_string($_POST['ver']);
$choosea = mysql_real_escape_string($_POST['choose']);
$unitsonea = mysql_real_escape_string($_POST['units1']);
$unitstwoa = mysql_real_escape_string($_POST['units2']);
$unitsthreea = mysql_real_escape_string($_POST['units3']);
$unitsfoura = mysql_real_escape_string($_POST['units4']);
$deletepost = preg_replace($saturated,"",$poster);
$choose = preg_replace($saturated,"",$choosea);
$unitsone = preg_replace($saturated,"",$unitsonea);
$unitstwo = preg_replace($saturated,"",$unitstwoa);
$unitsthree = preg_replace($saturated,"",$unitsthreea);
$unitsfour = preg_replace($saturated,"",$unitsfoura);
$verpost = preg_replace($saturate,"",$vera);



function randDrugAr_(){
	$randomN = rand(0, 2).".".rand(0,3).rand(0,5).rand(0,7);
	$randomPref = (rand(1,2) == 1 ? $randomN : ($randomN * -1));
	return (float)$randomPref;
}

$drugSzorzo = mysql_fetch_array(mysql_query("SELECT * from drugDealing"));
if($drugSzorzo["time"] <= time()){
	mysql_query("UPDATE drugDealing set drug1 = '".randDrugAr_()."', drug2 = '".randDrugAr_()."', drug3 = '".randDrugAr_()."', drug4 = '".randDrugAr_()."', time = '".(time() + 86400)."'");
}
$drugChangeTime = (time() + 86400);
$megVarakozik = $drugChangeTime - $drugSzorzo["time"];



$gangsterusername = $usernameone;
$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jaill.php'); }
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
<?php 

function getDrugData($drug){
	$arrayDrug = array();
	switch($drug){
		case'weed': $drugID = 1; $drugOriginalName = "Cannabis"; break;
		case'heroin': $drugID = 2; $drugOriginalName = "Heroin"; break;
		case'ecstasy': $drugID = 3; $drugOriginalName = "Mephedrone"; break;
		case'cocaine': $drugID = 4; $drugOriginalName = "Cocaine"; break;
	}
	$arrayDrug["id"] = $drugID;
	$arrayDrug["name"] = $drugOriginalName;
	return $arrayDrug;
}
$enter = $ent;
if($enter > '0'){die('<font color=white face=verdana size=1>Entertainers cannot view this page</font>');}
// echo time();

$getuserinfoarray = $statustesttwo;
$rankid = $getuserinfoarray['rankid'];
$ID = $getuserinfoarray['ID'];
$ver = $getuserinfoarray['ver'];
$input = $getuserinfoarray['input'];
$location = $getuserinfoarray['location'];
$money = $getuserinfoarray['money'];
$inputrand = mt_rand(0,20);
if($inputrand <= '5'){$newinput = 1;}

$getusersdrugss = mysql_query("SELECT * FROM drugs WHERE username = '$gangsterusername'");
$getusersdrugs = mysql_fetch_array($getusersdrugss);
$weed = $getusersdrugs['Cannabis'];
$ecstasy = $getusersdrugs['Mephedrone'];
$cocaine = $getusersdrugs['Cocaine'];
$heroin = $getusersdrugs['Heroin'];
$drugs = $weed + $ecstasy + $heroin + $cocaine;


if($rankid == '1'){ $max = 0;}
elseif($rankid == '2'){ $max = 15;}
elseif($rankid == '3'){ $max = 31;}
elseif($rankid == '4'){ $max = 66;}
elseif($rankid == '5'){ $max = 129;}
elseif($rankid == '6'){ $max = 230;}
elseif($rankid == '7'){ $max = 357;}
elseif($rankid == '8'){ $max = 523;}
elseif($rankid == '9'){ $max = 741;}
elseif($rankid == '10'){ $max = 978;}
elseif($rankid == '11'){ $max = 1233;}
elseif($rankid == '12'){ $max = 1657;}
elseif($rankid == '13'){ $max = 2000;}
elseif($rankid == '14'){ $max = 2487;}
elseif($rankid == '15'){ $max = 3210;}
elseif($rankid == '16'){ $max = 4001;}
elseif($rankid == '17'){ $max = 4849;}
elseif($rankid == '18'){ $max = 6011;}
elseif($rankid == '19'){ $max = 8114;}
elseif($rankid == '20'){ $max = 9578;}
elseif($rankid == '21'){ $max = 11252;}
elseif($rankid >= '22'){ $max = 12419;}

if($drugs > $max){die('<font color=white face=verdana size=1>Error, contact admin and say you saw error MAX!</font>');}

if($drugs < 0){die('<font color=white face=verdana size=1>Error, contact admin and say you saw error MINUS!</font>');}

$maxformat = number_format($max);

function calcDrugPrice($original, $szorzo){
	$varChange = str_replace("-","",str_replace("+","",$szorzo));
	if($szorzo > 0){
		return $original * $varChange;
	}elseif($szorzo < 0){
		return $original / $varChange;
	}elseif($szorzo == 0){
		return $original;
	}
}

if($location == 'Las Vegas'){
	$weedprice = calcDrugPrice(552,$drugSzorzo["drug1"]);
	$heroinprice = calcDrugPrice(1210, $drugSzorzo["drug2"]);
	$ecstasyprice = calcDrugPrice(5170, $drugSzorzo["drug3"]);
	$cocaineprice = calcDrugPrice(9996, $drugSzorzo["drug4"]);
}
elseif($location == 'Los Angeles'){
	$weedprice = calcDrugPrice(530, $drugSzorzo["drug1"]);
	$heroinprice = calcDrugPrice(1258, $drugSzorzo["drug2"]);
	$ecstasyprice = calcDrugPrice(5110, $drugSzorzo["drug3"]);
	$cocaineprice = calcDrugPrice(9937, $drugSzorzo["drug4"]);
}
elseif($location == 'New York'){
	$weedprice = calcDrugPrice(530, $drugSzorzo["drug1"]);
	$heroinprice = calcDrugPrice(1282, $drugSzorzo["drug2"]);
	$ecstasyprice = calcDrugPrice(5129, $drugSzorzo["drug3"]);
	$cocaineprice = calcDrugPrice(9928, $drugSzorzo["drug4"]);
}

// echo $weedprice;

function drugCount($drug = null){
	global $weedprice,$heroinprice, $ecstasyprice, $cocaineprice, $usernameone;
	if($drug){ $where = " AND drug = '{$drug}'"; }
	$a = mysql_query("SELECT sum(count) as c from drugsnew WHERE player = '".$usernameone."'{$where}");
	$b = mysql_fetch_array($a);
	// print_r("SELECT sum(count) as c from drugsnew WHERE player = '".$usernameone."'{$where}");
	return $b["c"];
}

function buyDrug_($drug,$unit){
	global $weedprice,$heroinprice, $ecstasyprice, $cocaineprice, $usernameone;
	$add = $unit + drugCount();
	$cost = ${$drug."price"} * $unit;
	$unitsoneformat = number_format($unit);
	$drugD = getDrugData($drug);
	mysql_query("INSERT into drugsnew VALUES (null, '".$usernameone."', '".$drug."', '".${$drug."price"}."', '".$unit."')");
	mysql_query("UPDATE users SET money = (money - $cost) WHERE username = '$usernameone' AND money >= '$cost'");
	$costt = number_format($cost);
	mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Spent $$costt on drugs','$datetime','drugs')");
	if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error, try again.</font>');}

	mysql_query("UPDATE users SET profit = (profit - $cost) WHERE username = '$usernameone'");
	$outcome = "You bought <b>$unitsoneformat</b> units of {$drugD["name"]}";
	return $outcome;
}

function calcDrugProfit($drug){
	global $weedprice,$heroinprice, $ecstasyprice, $cocaineprice, $usernameone;
	$buyedPrice = 0;
	$usersDrugs = mysql_query("SELECT drug, count as c, count * buyprice as price_ from drugsnew WHERE player = '".$usernameone."' AND drug = '".$drug."'");
	while($userDrug = mysql_fetch_array($usersDrugs)){
		$buyedPrice += $userDrug["price_"];
	}
	// return $buyedPrice;
	return (${$drug."price"} * drugCount($drug)) - $buyedPrice;
}


function sellDrug_($drug){
	global $weedprice,$heroinprice, $ecstasyprice, $cocaineprice, $usernameone;
	$drugPrice = ${$drug."price"} * drugCount($drug);
	// echo $drugPrice;
	$drugC_ = drugCount($drug);
	mysql_query("delete from drugsnew WHERE player = '".$usernameone."' AND drug = '".$drug."'");
	mysql_query("UPDATE users SET profit = (profit + '".$drugPrice."') WHERE username = '$usernameone'");
	mysql_query("UPDATE users SET money = (money + '".$drugPrice."') WHERE username = '$usernameone'");
	$drugD = getDrugData($drug);
	return "You sold <b>".number_format($drugC_)."</b> units of ".$drugD["name"]."";
}



if(isset($_POST['reset'])){$showoutcome++; $outcome = "Your drug running profit has been reset to $<b>0</b>!";
mysql_query("UPDATE users SET profit = '0' WHERE username = '$usernameone'");}

if(isset($_POST['buydrug'])){
$yesorno = mysql_num_rows(mysql_query("SELECT * FROM drugs WHERE player='$gangsterusername'"));
if($yesorno <= '0'){ mysql_query("INSERT INTO `drugs` (`username`) VALUES ('$gangsterusername')"); }


if($input == '1'){
if(strtoupper($verpost) != $ver){die('<font color=white face=verdana size=1>Error, security code incorrect</font>');}
else{$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";$randver = substr(str_shuffle($alphanum), 0, 2);mysql_query("UPDATE users SET ver = '$randver' WHERE ID = '$ida'");}}
mysql_query("UPDATE users SET input = '$newinput' WHERE ID = '$ida'");


if($_POST["units1"]){
$add = $unitsone + drugCount();
$cost = $weedprice * $unitsone;
$unitsoneformat = number_format($unitsone);
if($add > $max){$showoutcome++; $outcome = "You can only carry $maxformat units at once at your rank!";}

elseif($cost > $money){$showoutcome++; $outcome = "You dont have enough money!";}
else{
	$showoutcome++; $outcome = buyDrug_("weed", $unitsone);
}
}

if($_POST["units2"]){
$add = $unitstwo+$drugs;
$cost = $heroinprice * $unitstwo;
$unitstwoformat = number_format($unitstwo);
if($add > $max){$showoutcome++; $outcome = "You can only carry $maxformat units at once at your rank!";}
elseif($cost > $money){$showoutcome++; $outcome = "You dont have enough money!";}
else{
$showoutcome++; $outcome = buyDrug_("heroin", $unitstwo);
}
}

if($_POST["units3"]){
$add = $unitsthree+$drugs;
$cost = $ecstasyprice * $unitsthree;
$unitsthreeformat = number_format($unitsthree);
if($add > $max){$showoutcome++; $outcome = "You can only carry $maxformat units at once at your rank!";}
elseif($cost > $money){$showoutcome++; $outcome = "You dont have enough money!";}
else{
$showoutcome++; $outcome = buyDrug_("ecstasy", $unitsthree);
}
}

if($_POST["units4"]){
$add = $unitsfour+$drugs;
$cost = $cocaineprice * $unitsfour;
$unitsfourformat = number_format($unitsfour);
if($add > $max){$showoutcome++; $outcome = "You can only carry $maxformat units at once at your rank!";}
elseif($cost > $money){$showoutcome++; $outcome = "You dont have enough money!";}
else{
$showoutcome++; $outcome = buyDrug_("cocaine", $unitsfour);
}
}}


elseif($_POST["sellunits1"] OR $_POST["sellunits2"] OR $_POST["sellunits3"] OR $_POST["sellunits4"]){

if($_POST["sellunits1"]){
$cost = $weedprice * $unitsone;
$unitsoneformat = number_format($unitsone);
if($unitsone > $weed){$showoutcome++; $outcome = "You dont have that much Cannabis!";}
else{
$showoutcome++; $outcome = sellDrug_("weed");
}
}

elseif($_POST["sellunits2"]){
$cost = $heroinprice * $unitstwo;
$unitstwoformat = number_format($unitstwo);
if($unitstwo > $heroin){$showoutcome++; $outcome = "You dont have that much Heroin!";}
else{
$showoutcome++; $outcome = sellDrug_("heroin");
}
}

elseif($_POST["sellunits3"]){
$cost = $ecstasyprice * $unitsthree;
$unitsthreeformat = number_format($unitsthree);
if($unitsthree > $ecstasy){$showoutcome++; $outcome = "You dont have that much Mephedrone!";}
else{
$showoutcome++; $outcome = sellDrug_("ecstasy");

}
}

elseif($_POST["sellunits4"]){
$cost = $cocaineprice * $unitsfour;
$unitsfourformat = number_format($unitsfour);
if($unitsfour > $cocaine){$showoutcome++; $outcome = "You dont have that much Cocaine!";}
else{
$showoutcome++; $outcome = sellDrug_("cocaine");
}
}}

$getusersdrugssa = mysql_query("SELECT * FROM drugs WHERE username = '$gangsterusername'");
$getusersdrugsa = mysql_fetch_array($getusersdrugssa);
$weed = $getusersdrugsa['Cannabis'];
$ecstasy = $getusersdrugsa['Mephedrone'];
$cocaine = $getusersdrugsa['Cocaine'];
$heroin = $getusersdrugsa['Heroin'];
$drugs = $weed + $ecstasy + $heroin + $cocaine;

$getuserinfosql = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$rankid = $getuserinfoarray['rankid'];
$ver = $getuserinfoarray['ver'];
$money = $getuserinfoarray['money'];
$profit = $getuserinfoarray['profit'];
?>

<? if($showoutcome>=1){ ?>
<script>showNotification('','<?=$outcome?>','blank.gif');</script>
<? } ?>

<table cellpadding="0" cellspacing="0" align="center" width="99%"><tbody><tr>
<td class="menutopleft"><img style="display: block" alt="" src="blank.gif" height="20" width="15"></td>
<td class="middlestart"><img style="display: block" alt="" src="blank.gif" height="20" width="11"></td>
<td class="middlemiddle" style="white-space: nowrap" height="20"><font color="222222" face="verdana" size="1"><b><font color="#222222"><b>Drugs</b></font><b> <font color="teal"> (Prices Change in  <span id="countdown"></span> )</font></b>&nbsp;&nbsp;</b></font></td>
<td class="middleend"><img style="display: block" alt="" src="blank.gif" height="20" width="11"></td>
<td class="menutopright"><img style="display: block" alt="" src="blank.gif" height="20" width="10"></td></tr></tbody></table>
<table style="width: 99%" cellpadding="0" cellspacing="0" align="center"><tbody><tr><td class="menuside"><img style="display: block" alt="" src="blank.gif" width="10"></td>
<td bgcolor="333333" width="100%"><br>

<script type="text/javascript" src="countdown.js"></script>
    <script>  
      var clock = document.getElementById("countdown");
      targetDate = new Date(<?=($drugSzorzo["time"]*1000)?>); // Jan 1, 2050;  
      
      clock.innerHTML = countdown(targetDate).toString();  
      setInterval(function(){  
        clock.innerHTML = countdown(targetDate).toString();  
      }, 1000);  
    </script>   
<table align="center" width="99%"><tbody><tr><td valign="top" width="60%"><form method="post">
<table class="section" align="center" width="75%">
<tbody><tr><td width="1%"><img src="/pictures/drugs/cannabis.png"></td><td align="left"><font color="white" face="verdana" size="2">Cannabis<br><font color="white" size="1"><b>Price per ounce</b> $<?echo number_format($weedprice);?><br><input maxlength="4" size="10" placeholder="# of ounces" name="units1" class="submittext" type="text"></font></font></td></tr>
</tbody></table><smallbr>
<table class="section" align="center" width="75%">
<tbody><tr><td width="1%"><img src="/pictures/drugs/heroin.png"></td><td align="left"><font color="white" face="verdana" size="2">Heroin<br><font color="white" size="1"><b>Price per ounce</b> $<?echo number_format($heroinprice);?><br><input maxlength="4" size="10" placeholder="# of ounces" name="units2" class="submittext" type="text"></font></font></td></tr>
</tbody></table><smallbr>
<table class="section" align="center" width="75%">
<tbody><tr><td width="1%"><img src="/pictures/drugs/mephedrone.png"></td><td align="left"><font color="white" face="verdana" size="2">Mephedrone<br><font color="white" size="1"><b>Price per ounce</b> $<?echo number_format($ecstasyprice);?><br><input maxlength="4" size="10" placeholder="# of ounces" name="units3" class="submittext" type="text"></font></font></td></tr>
</tbody></table><smallbr>
<table class="section" align="center" width="75%">
<tbody><tr><td width="1%"><img src="/pictures/drugs/cocaine.png"></td><td align="left"><font color="white" face="verdana" size="2">Cocaine<br><font color="white" size="1"><b>Price per ounce</b> $<?echo number_format($cocaineprice);?><br><input maxlength="4" size="10" placeholder="# of ounces" name="units4" class="submittext" type="text"></font></font></td></tr>
</tbody></table><smallbr>

<table align="center" width="100%">
<tbody>
<tr><td align="center"><input name="buydrug" value="Buy" size="1" class="submit" type="submit"></td></tr>
</tbody></table>
</smallbr></smallbr></smallbr></smallbr></form></td>

<td align="center" valign="top" width="40%">
<table class="section" align="center" width="95%"><form method="post">
<tbody><tr><td colspan="2" class="header">My Drugs</td></tr>
<tr><td colspan="2" class="line"></td></tr>
<tr><td class="inside"><b>Maximum Ounces</b> <?=$maxformat?></td></tr>
<tr><td class="inside"><b>Drug profit</b> <font color="<?=($profit >= 0 ? "green" : "red")?>"><?echo number_format($profit);?></font></td></tr>
<?
$usersDrugs = mysql_query("SELECT drug, sum(count) as c from drugsnew WHERE player = '".$usernameone."' GROUP by drug");
while($userDrug = mysql_fetch_array($usersDrugs)){
$drugD = getDrugData($userDrug["drug"]);
?>
<tr><td class="inside">You're holding <font color="khaki"><b><?=$userDrug["c"]?></b></font> ounces of <?=$drugD["name"]?>.</td></tr>
<tr><td class="inside" style="background-color:#333333;">&nbsp;Sell here to make a profit of <font color="<?=(calcDrugProfit($userDrug["drug"]) >= 0 ? "green" : "red")?>">$<b><?=number_format(calcDrugProfit($userDrug["drug"]))?></b></font><input class="submit" style="width:1%;visibility:hidden;" type="submit"><div id="right"><input name="sellunits<?=$drugD["id"]?>" value="Sell" class="submit" type="submit"></div></td></tr>
<? } ?>


</form>
</tbody></table></td></tr></tbody></table>

</td><td class="menuside"><img style="display: block" alt="" src="blank.gif" width="10"></td></tr></tbody></table>
<table style="width: 99%" cellpadding="0" cellspacing="0" align="center"><tbody><tr>
<td class="menubottomleft"><img style="display: block" alt="" src="blank.gif" height="10" width="15"></td>
<td class="menutopbottom"><img style="display: block" alt="" src="blank.gif"></td>
<td class="menubottomright"><img style="display: block" alt="" src="blank.gif" height="10" width="15"></td>
</tr></tbody></table>

<style>table.alloutcome{ border:1px solid #111111; background-color:#282828; width:90%; height:15%; position:absolute; z-index:1; top:5px; left:5%; opacity:0.95; text-align:center; color: white; font-family: verdana; font-size: 10px; border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; border-top-right-radius: 5px; }</style>
<script>setTimeout(function(){ $('#displayfade').fadeOut('slow'); }, 4000);</script>


<td width="250" valign="top">
<?
$statustesttwo = $getuserinfoarray ;?>
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>

