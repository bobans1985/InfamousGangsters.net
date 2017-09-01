<? include 'included.php'; session_start(); ?>

<html>
<head>
<title>ToughDons.com</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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
$playerarray =$statustesttwo;
$gethealth = $playerarray['health'];

$getmoney = $playerarray['money'];
$getname = $playerarray['username'];


if($_POST['health']){

$getamount=$_POST['health'];

if($getamount == 10 && $getmoney >= '20000000'){

$newhealth=$gethealth+$getamount;

mysql_query("UPDATE users SET money = money - '20000000', health='$newhealth' WHERE username = '$getname'"); 

$showoutcome++; $outcome = "You have purchased <b>10%</b> health!";



}elseif($getamount == 30 && $getmoney >= '50000000'){
$newhealth=$gethealth+$getamount;

mysql_query("UPDATE users SET money = money - '50000000', health='$newhealth' WHERE username = '$getname'"); 


$showoutcome++; $outcome = "You have purchased <b>30%</b> health!";


}elseif($getamount == 50 && $getmoney >= '80000000'){
$newhealth=$gethealth+$getamount;

mysql_query("UPDATE users SET money = money - '80000000', health='$newhealth' WHERE username = '$getname'"); 

$showoutcome++; $outcome = "You have purchased <b>50%</b> health!";



}elseif($getamount == 80  && $getmoney >= '130000000'){
$newhealth=$gethealth+$getamount;

mysql_query("UPDATE users SET money = money - '130000000', health='$newhealth' WHERE username = '$getname'"); 

$showoutcome++; $outcome = "You have purchased <b>80%</b> health!";



}elseif($getamount == 90 && $getmoney >= '150000000'){
$newhealth=$gethealth+$getamount;

mysql_query("UPDATE users SET money = money - '150000000', health='$newhealth' WHERE username = '$getname'"); 


$showoutcome++; $outcome = "You have purchased <b>90%</b> health!";

}}



?> 
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Hospital</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png">

<table width=10% align=left cellpadding=0 cellspacing=1 class=section>
<tr>
  <td><span class="button1"><font color=yellow><center>Current Health </center></font></span>
  <img src="/bars/<?php echo $gethealth ?>.png" width="106" height="13"></td>
</tr>
</table><br><? if($showoutcome>=1){ ?>
<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></td></tr>
</table><br>
<? } ?><br><br>
<table width=90%" class="section" align=center>
  <form method=post>
    <tr>
      <td width=20%><div class="tab">
        <div align="center"><img src="/bars/10.png" width="106" height="13"></div>
      </div></td>
      <td width=20%><div class="tab">
        <div align="center"><img src="/bars/30.png" width="106" height="13"></div>
      </div></td>
      <td width=20%><div class="tab">
        <div align="center"><img src="/bars/50.png" width="106" height="13"></div>
      </div></td>
      <td width=20%><div class="tab">
        <div align="center"><img src="/bars/80.png" width="106" height="13"></div>
      </div></td>
      <td width=20%><div class="tab">
        <div align="center"><img src="/bars/90.png" width="106" height="13"></div>
      </div></td>
    </tr>
    <tr>
       <td align=center><div class=button1><font color=yellow><b>($20,000,000)</b></font><br><input name="health" type="radio" value="10"onclick="this.form.submit()">
       </div></td>
       <td align=center><div class=button1>
         <font color=yellow><b>($50,000,000)</b></font><br><input name="health" type="radio" value="30"onclick="this.form.submit()">
       </div></td>
      <td align=center><div class=button1>
       <font color=yellow><b>($80,000,000)</b></font><br> <input name="health" type="radio" value="50"onclick="this.form.submit()">
      </div></td>
      <td align=center><div class=button1>
       <font color=yellow><b>($130,000,000)</b></font><br> <input name="health" type="radio" value="80"onclick="this.form.submit()">
      </div></td>
      <td align=center><div class=button1>
       <font color=yellow><b>($150,000,000)</b></font><br> <input name="health" type="radio" value="90"onclick="this.form.submit()">
        <br>
      </div></td>
	  
    </tr>
	
  </form>
</table>
<br>

<br>
<td class=menuright><img style="display: block" alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>