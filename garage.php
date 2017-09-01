<? include 'included.php'; session_start(); ?>

<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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
$entertainer = $ent;
if($usernameone == $usernameone){die('<font color=white face=verdana size=1>As you are an entertainer you cannot view this page</font>');}

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$playerrank = $myrank;
$playerarray = $statustesttwo;
$playerrank = $playerarray['rankid'];
$cash = $playerarray['money'];
$mission = $playerarray['mission'];
$userlocation = $playerarray['location'];

$cartype = mysql_real_escape_string(strip_tags($_GET['type']));
if($cartype == '1'){ $price = '1000'; }
if($cartype == '2'){ $price = '2500'; }
if($cartype == '3'){ $price = '100000'; }
if($cartype == '4'){ $price = '500000'; }
if($cartype == '5'){ $price = '1000000'; }
if($cartype == '6'){ $price = '10000000'; }
if($cartype == '7'){ $price = '25000000'; }
if($cartype == '8'){ $price = '50000000'; }
if($cartype == '9'){ $price = '100000000'; }
if($cartype == '10'){ $price = '200000000'; }

if(isset($_GET['add'])){ 
$yessornoo = mysql_real_escape_string(strip_tags($_GET['add']));
$carid = mysql_real_escape_string(strip_tags($_GET['carid']));
if($yessornoo != '1' AND $yessornoo != '0' AND $carid >= '14'){ $showoutcome++; $outcome = "Error..."; }else{
$typeofcar = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner='$usernameone' AND carid='$cartype' AND id='$carid'"));
if($typeofcar <= '0'){ $showoutcome++; $outcome = "There was a problem with your action!"; }else{
$mycar = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner='$usernameone' AND id='$carid'"));
if($mycar <= '0'){ $showoutcome++; $outcome = "This is not your car!"; }else{
if($cash < $price){ $showoutcome++; $outcome = "You can not afford this!"; }else{
if($yessornoo == '0'){ $showoutcome++; $outcome = "Your car has been removed!";
mysql_query("UPDATE cars SET garage='0' WHERE id='$carid'"); }else{
$showoutcome++; $outcome = "Your car is now in the retrievable garage!";
mysql_query("UPDATE cars SET garage = '1' WHERE id = '$carid'");
mysql_query("UPDATE users SET money = (money - '$price') WHERE username='$usernameone'");
if($mission == 3 AND $userlocation == Miami AND $cartype == 1){
mysql_query("UPDATE users SET missioncount = 0 WHERE ID = '$ida'");
$sendinfo = "[color=white][b]Mission complete![/b] [i]Check your missions page for the next mission[/i][/color]";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$usernameone','$usernameone','1','$adress','$sendinfo')");
mysql_query("UPDATE users SET money = money + '1500000' WHERE id = '$ida'");
mysql_query("UPDATE users SET mission = '4' WHERE id = '$ida'");
}}}}}}}
?>
<? if($showoutcome>=1){ ?>
<table width="100%" align="center" cellpadding="0" cellspacing="10" class="section">
<tr><td align=center><div class=button1><?echo$outcome?></td></tr>
</table>
<? } ?>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Garage</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<font color="white" face="verdana" size="1">
<br>
<table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
<tr><td colspan=3><div class=tab>My Cars</td></tr>
<tr><td width=45%><div class=tab>Car:</td><td width=20%><div class=tab>Cost:<td width=15%><div class=tab>Add to garage:</td></tr>
<? 
$carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC");
while($carlists = mysql_fetch_array($carlist)){
$type = $carlists['carid'];
$id = $carlists['id'];
$card = $carlists['damage'];
$carnamea = $carlists['carname'];
$garage = $carlists['garage'];
if($type == 1){$carname = 'Volvo';}
elseif($type == 2){$carname = 'Porsche 911';}
elseif($type == 3){$carname = 'Honda Civic';}
elseif($type == 4){$carname = 'BMW';}
elseif($type == 5){$carname = 'Aston Martin';}
elseif($type == 6){$carname = 'Alfa Romeo';}
elseif($type == 7){$carname = 'Maybach 62';}
elseif($type == 8){$carname = 'Porsche Carrera GT';}
elseif($type == 9){$carname = 'Pagani Zonda';}
elseif($type == 10){$carname = $carnamea;}

if($garage == '1'){ $comment = "<font size=1 color=khaki face=verdana>&nbsp;Remove from Garage</font>"; }else{ $comment = "<font size=1 color=khaki face=verdana>&nbsp;Add to Garage</font>"; }
if($garage == '1'){ $yesorno = "0"; }else{ $yesorno = "1"; }
if($garage == '1'){ $beforee = '<font size=1 color=grey face=verdana><b>Hidden Car:&nbsp;</b></font>'; }else{ $beforee = ''; }
if($type == 9){$before = '<b><font color=red face=verdana size=1>Very Rare:&nbsp;</b></font>';}
elseif($type == 8){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
elseif($type == 7){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
elseif($type == 10){$before = '<b><font color=red face=verdana size=1>Custom:&nbsp;</b></font>';}
else{$before = '';} 

if($type == '1'){ $price = '1000'; }
if($type == '2'){ $price = '2500'; }
if($type == '3'){ $price = '100000'; }
if($type == '4'){ $price = '500000'; }
if($type == '5'){ $price = '1000000'; }
if($type == '6'){ $price = '10000000'; }
if($type == '7'){ $price = '25000000'; }
if($type == '8'){ $price = '50000000'; }
if($type == '9'){ $price = '100000000'; }
if($type == '10'){ $price = '200000000'; }

?>
<tr><td width=45%><div class=button1><a href=viewcar.php?id=<?echo$id;?>>&nbsp;<?echo$beforee;?><?echo$before;?><?echo$carname;?></a></td><td width=20%><div class=button1>&nbsp;$<?echo number_format($price);?></td><td width=15%><div class=button1><a href=garage.php?type=<?echo$type;?>&carid=<?echo$id;?>&add=<?echo$yesorno;?>>&nbsp;<?echo$comment;?></a></td></tr>
<?}?>
</table>
<br>
<td class=menuright><img style="display: block"  alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display:  block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>

