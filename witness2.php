<? include 'included.php'; ?>

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
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$playerrank = $myrank;
$playerarray =$statustesttwo;
$playerrank = $playerarray['rankid'];


mysql_query("UPDATE witnessstatements SET new='0' WHERE username='$usernameone'"); 

if ($_POST['sell'] && $_POST['ws']){
$amount = $_POST['amount'];
if ($amount == 0 || !$amount || ereg('[^0-9]',$amount)){ $showoutcome++; $outcome = "The amount you entered is invalid!"; }else{
if($amount >= "5000000001"){ $showoutcome++; $outcome = "You are not allowed to sell a statement for more then $5,000,000,000!"; }else{

$sws = $_POST['ws'];
foreach($sws as $witness){
mysql_query("UPDATE witnessstatements SET sale='yes', price='$amount' WHERE id='$witness' AND username='$usernameone'"); 
$showoutcome++; $outcome = "You are now selling the witness statement(s)!";
}}}}

if ($_POST['delete'] && $_POST['ws']){
$sws = $_POST['ws'];
foreach($sws as $witness){
mysql_query("DELETE FROM witnessstatements WHERE username='$usernameone' AND id='$witness'");
mysql_query("UPDATE witnessstatements SET sale='yes', price='$amount' WHERE id='$witness' AND username='$usernameone'"); 
$showoutcome++; $outcome = "You deleted the witness statement(s)!";
}}

if ($_POST['buy'] && $_POST['wss']){
$wssell = $_POST['wss'];
foreach($wssell as $checkboxid){

$sql="SELECT * from witnessstatements WHERE id='$checkboxid'"; $result=mysql_query($sql);
while($rows=mysql_fetch_array($result)){ 
$idd = $rows['id'];
$whogotit = $rows['username'];
$whokilled = $rows['killer'];
$whodied = $rows['killed'];
$theprice = $rows['price'];
$theprice2=number_format($theprice);
$getuserinfo=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$usernameone'"));

if($whogotit == $username){
mysql_query("UPDATE witnessstatements SET sale='0', price='0' WHERE id='$checkboxid' AND username='$usernameone'");
$showoutcome++; $outcome = "You removed your statement(s)!"; }else{

if ($getuserinfo->money < $theprice){
$showoutcome++; $outcome = "You can not afford to buy the statement(s)";  }else{
mysql_query("UPDATE users SET money = (money + '$theprice'), mail='1' WHERE username='$whogotit'");
mysql_query("UPDATE users SET money = (money - '$theprice') WHERE username='$usernameone'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$whogotit','$whogotit','1','$userip','$usernameone bought your witness statement for $$theprice2')");
mysql_query("UPDATE witnessstatements SET username='$usernameone', sale='0', price='0' WHERE id='$checkboxid' AND sale='yes'");
$showoutcome++; $outcome = "You bought the statement(s)!"; }}}}} 

$keepuser = $_POST['searchws'];
if($_POST['searchit']){
$usersearched = $_POST['searchws'];
$finduserws = mysql_num_rows(mysql_query("SELECT * FROM witnessstatements WHERE killed = '$usersearched'"));
if($finduserws > 0){ $showoutcome++; $outcome = "There are $finduserws users with the witness statement for $usersearched!"; $dorest = 1; }
else{ $showoutcome++; $outcome = "No users have this witness statement!";
}}

if($_POST['findwho']){
$finduserws = mysql_num_rows(mysql_query("SELECT * FROM witnessstatements WHERE killed = '$keepuser'"));
if($finduserws < 1){ $showoutcome++; $outcome = "There are no witnesses of this kill!"; }
elseif($points < '100'){$showoutcome++; $outcome = "This costs 100 points!"; }
else{ 
mysql_query("UPDATE users SET points = (points - '100') WHERE username = '$usernameone' AND points >= '100'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error ws001.</font>');}
$theresult = 1;
}}
?>  
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Witness Statements</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png"><br>

<form method=post><center><font color=silver size=1 face=verdana>Search user: <input type="text" name="searchws" class="textbox" value="<?echo$keepuser;?>"> <input type="submit" class="textbox" name="searchit" value="Search"> <?if($dorest == 1){?><input type="submit" class="textbox" name="findwho" value="Find Who"> <a onclick="alert('This costs 100 points and will message you who has the witness statement to <?echo$keepuser?>');"><font color=white>(<font color=red><b>?</b></font><font color=white>)</a><? } ?></form>
<? if($theresult == 1){
echo "<br><font color=red><b>Be sure to save this message if you want to keep hold of it</b></font><br>
The following users have the witness statement for $keepuser:<br>";
$getuserss = mysql_query("SELECT * FROM witnessstatements WHERE killed = '$keepuser' ORDER BY id DESC LIMIT 0,20");
while($getusers = mysql_fetch_array($getuserss)){
$wsuser = $getusers['username'];
echo "$wsuser<br>";
}} ?>
<br><br>

<? if($showoutcome>=1){ ?>
<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></td></tr>
</table><br>
<? } ?>

<table width=65% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td align=center><div class=tab>Your Statements</td></tr>
<? $iftrue=mysql_num_rows(mysql_query("SELECT * FROM witnessstatements WHERE username='$usernameone'")); 
if($iftrue <= 0){ echo"<tr><td align=center><div class=button1>You have not witnessed any kills!</td></tr>";
}else{ ?>
<form method='post' action=''>
<? 
$result = mysql_query("SELECT * FROM witnessstatements WHERE username='$usernameone' ORDER BY timeleft DESC"); 
$iftrue=mysql_num_rows($result);
while($row = mysql_fetch_array( $result )){
$id = $row['id'];
$killer = $row['killer'];
$killed = $row['killed'];
$sale = $row['sale'];
$byebye = $row['timeleft'];
$price = number_format($row['price']);
$deletetime=$byebye-604800;
mysql_query("DELETE FROM witnessstatements WHERE timeleft<'$deletetime'");
?>
<tr>
<td width="100%"><div class="button1"><input name="ws[]" type="checkbox" value="<? echo $id; ?>" style="vertical-align:middle;">
<?if($sale!='no'){?><b>Selling:</b> <?}?>You witnessed <a href="viewprofile.php?username=<?php echo "$killer"; ?>"><b><?echo$killer;?></b></a> kill <a href="viewprofile.php?username=<?php echo "$killed"; ?>"><b><?echo$killed;?></b></a>.</td>
</tr>
<?} ?>
<tr><td colspan="2"><div class=button1><input type="text" name="amount" class="textbox" style="width:48%">
<input type="submit" class="textbox" style="width:50%" name="sell" value="Sell"></td></tr>
<tr><td align=center colspan="2"><div class=button1><input type="submit" name="delete" class="textbox" style="width:100%" value="Delete Statements"></td></tr></form>
<?}?>
</table>
<br>

<table width=65% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td align=center colspan=2><div class=tab>For Sale</td></tr>
<? 
$ifbother = mysql_num_rows(mysql_query("SELECT * FROM witnessstatements WHERE sale = 'yes' AND killed = '$keepuser'")); 
$iftruee = mysql_num_rows(mysql_query("SELECT * FROM witnessstatements WHERE sale='yes'")); 
if($iftruee <= 0){ echo "<tr><td align=center colspan=2><div class=button1>There are no statements for sale!</td></tr>"; }
elseif($dorest == 1 AND $ifbother >= 1){ ?>
<form method='post' action=''>
<? $result = mysql_query("SELECT * FROM witnessstatements WHERE killed = '$keepuser' AND sale = 'yes' ORDER BY price ASC"); $iftrue=mysql_num_rows($result);
while($row = mysql_fetch_array( $result )){
$idd = $row['id'];
$whows = $row['username'];
$killer = $row['killer'];
$killed = $row['killed'];
$sale = $row['sale'];
$price = number_format($row['price']);
?>
<style> 
#left { float: left; }
#right { float: right; }
</style>
<tr>
<td width="70%"><div class=button1><input name="wss[]" type="checkbox" value="<? echo $idd; ?>" style="vertical-align:middle;"> <?if($whows==$username){echo"<b>";}?>You witnessed <b><font color=red>Username Hidden</font></b></a> kill <a href="viewprofile.php?username=<?php echo "$killed"; ?>"><b><?echo$killed;?></b></a>
<td width=30%><div class=button1>&nbsp;<font color=khaki>$<b><?echo"$price";?></b><input type="checkbox" style="vertical-align:middle; visibility:hidden;"></font></div></td>
</tr>
<? }}else{ ?>
<form method='post' action=''>
<? $result = mysql_query("SELECT * FROM witnessstatements WHERE sale='yes' ORDER BY price ASC"); $iftrue=mysql_num_rows($result);
while($row = mysql_fetch_array( $result )){
$idd = $row['id'];
$whows = $row['username'];
$killer = $row['killer'];
$killed = $row['killed'];
$sale = $row['sale'];
$price = number_format($row['price']);
?>
<style> 
#left { float: left; }
#right { float: right; }
</style>
<tr>
<td width="70%"><div class=button1><input name="wss[]" type="checkbox" value="<? echo $idd; ?>" style="vertical-align:middle;"> <?if($whows==$username){echo"<b>";}?>You witnessed <b><font color=red>Username Hidden</font></b></a> kill <a href="viewprofile.php?username=<?php echo "$killed"; ?>"><b><?echo$killed;?></b></a>
<td width=30%><div class=button1>&nbsp;<font color=khaki>$<b><?echo"$price";?></b><input type="checkbox" style="vertical-align:middle; visibility:hidden;"></font></div></td>
</tr>
<? }} ?>
<tr><td colspan="2" align="center"><div class=button1><input type="submit" class="textbox" style="width:100%" name="buy" value="Buy"></td></tr></form>
<br>

</tbody></table><br></td>
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

