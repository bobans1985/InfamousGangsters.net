<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png">
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
</script>
<table width="100%" height="175" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="100%" valign="top">
<? include 'includethis.php'; ?>
</td>
<td width="100%" valign="top">
<table align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td width="8" height="22" background="/layout/topleft.png"></td><td height="22" background="/layout/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><b>Drug Tool</b></font></td><td width="8" height="22" background="/layout/topright.png"></td></tr><tr><td width="8" background="/layout/leftb.png" NOWRAP></td><td background="/layout/crossbg.png">

<?php
if ($_POST['submit'] && strip_tags($_POST['amount'])){
$moneyspending = $_POST['amount'];
$heroinbuy="1210";
$heroinsell="1265";
$cocainbuy="9900";
$cocainsell="9996";
$heroinbought = $moneyspending/1210;
$newmoney = $heroinsell*$heroinbought;
$cocainbought = $newmoney/9900;
$finalmoney = $cocainsell*$cocainbought;
$profit = $finalmoney-$moneyspending;
echo "<font color=white face=verdana size=1>After 1 full drugs run you will end up with: <b><font color=yellow>$".number_format($finalmoney)."</b></font> (Profit: <b><font color=yellow>$".number_format($profit)."</font></b>) if you max out your stash of drugs!<br><br>
You can buy: <b><font color=lime>".number_format($heroinbought)."</b></font> units of heroin and <b><font color=lime>".number_format($cocainbought)."</font></b> units of cocaine!</font>";}?>

<table cellpadding=0 cellspacing=5 align=center><form method=post><tr><td colspan=2 align=center> <font color=white face=verdana size=1>Starting money:</font> <input type="text" name="amount" value="" class="textbox"> <input type=submit name=submit value="Check Profit" class="textbox"></td></tr>
<tr><td><font color=white face=verdana size=1>Note: This calculator only checks how much money you will make per drug run if you do the best drug run!<br><br>You buy Heroin in Las Vegas and sell it in Chicago, then you but the Cocaine in Chicago and sell it in Las Vegas</font></td><td></td></tr>
</form></table><br>

</div>
<table width="100%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table></td><td width="8" background="/layout/rightb.png" NOWRAP></td></tr><tr><td width="8" height="9" background="/layout/bottomleft.png"></td><td height="9" background="/layout/bottom.png"></td><td width="8" height="9" background="/layout/bottomright.png"></td></tr></table>
</td>
<td width="100%" valign="top">
</td>
</tr>
</table>
