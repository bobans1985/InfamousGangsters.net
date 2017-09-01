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
<table align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td width="8" height="22" background="/layout/topleft.png"></td><td height="22" background="/layout/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><b>Entertainer Tools</b></font></td><td width="8" height="22" background="/layout/topright.png"></td></tr><tr><td width="8" background="/layout/leftb.png" NOWRAP></td><td background="/layout/crossbg.png">

<?php
if ($_POST['check'] && strip_tags($_POST['amount'])){
$amount = $_POST['amount'];
$interest = "2.5";
$onepercent = $amount/100;
$finaladdedon = $onepercent*$interest;
$final = $finaladdedon+$amount;
echo "<font color=white face=verdana size=1>The amount of interest you will get is <b><font color=yellow>$".number_format($final)."!</b></font></font>";} ?>

<table cellpadding=0 cellspacing=5 align=center><form method=post><tr><td colspan=2 align=center></td></tr>
<tr><td><font color=white face=verdana size=1>Amount:</font></td><td>
<input type="text" name="amount" value="" class="textbox"> <input type=submit name=check value="Check Interest" class="textbox"></td></tr>
</form></table><br>

</div>
<table width="100%" cellpadding="0" cellspacing="0" align="center" style="margin: 2px;"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table></td><td width="8" background="/layout/rightb.png" NOWRAP></td></tr><tr><td width="8" height="9" background="/layout/bottomleft.png"></td><td height="9" background="/layout/bottom.png"></td><td width="8" height="9" background="/layout/bottomright.png"></td></tr></table>
</td>
<td width="100%" valign="top">
</td>
</tr>
</table>
