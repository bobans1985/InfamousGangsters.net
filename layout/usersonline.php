<? include 'attachment.php';
 
$time = time();
$timetwo = $time-4000;

$usersonlineresult = mysql_query("SELECT * FROM users WHERE activity >= '$timetwo' AND ID != '13' ORDER BY rankid DESC");


?>
<html>
<head>
<SCRIPT LANGUAGE="JavaScript" SRC="lol.js">
</SCRIPT>
<title></title><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
</head>
<body background="images/bg.png">

<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?></td>
<td width="100%" valign="top">

<table class="content-cell" cellspacing="1" cellpadding="2" width="100%">
<tr><td class="header">Users Online</td></tr>
<tr><td class=indent height=1></td></tr>
<tr><td valign=top class=content align="right">
<center>-</font><?php 

while($usersonline = mysql_fetch_array($usersonlineresult)) 
{
$onlineuser = $usersonline['username'];
$usersonlinerankid = $usersonline['rankid'];
$crewid = $usersonline['crewid'];
$appear = $usersonline['appear'];
$moneys = $usersonline['money'];
$hdo = $usersonline['hdo'];
$entertainercheckresult = $usersonline['ent'];
$idh = $usersonline['ID'];
$thdocheckresult  = $usersonline['thdo'];



$money = $moneys;

$usersonlinecount++;

$check = mysql_query("SELECT username FROM usersonline WHERE id = '$idh' ");
$checks = mysql_num_rows($check);




$newscheck = mysql_query("SELECT username FROM news WHERE username = '$onlineuser' ");
$news = mysql_num_rows($newscheck);





$seniorchecki = mysql_query("SELECT username FROM senior WHERE username = '$onlineuser'");
$seniorchecks = mysql_num_rows($seniorchecki);



if(($checks != '0')&&($appear != '1')) {
echo"<font size=1> </font><a id=$idh href =viewprofile.php?username=$onlineuser>";
}


if($checks == '0')
{ 
$usersonlinecount--;
}
elseif($appear == '1')
{ 
$usersonlinecount--;
}

elseif($onlineuser == 'Larssssssss') 
{ 
echo "<font color=dodgerblue><b>$onlineuser</b></font>"; 
}


elseif($usersonlinerankid == '100') 
{ 
echo "<font color=red><b>$onlineuser</b></font>"; 
}
elseif($news == '1') 
{ 
echo "<font color=purple><b>$onlineuser</b></font>"; 
}
elseif($usersonlinerankid == '75') 
{ 
echo "<font color=khaki><b>$onlineuser</b></font>"; 
}
elseif($usersonlinerankid == '50') 
{ 
echo "<b><font color=dodgerblue>$onlineuser</b></font>"; 
}
elseif($usersonlinerankid == '25') 
{ 
echo "<font color=yellow><b>$onlineuser</b></font>"; 
}
elseif($seniorchecks != '0'){echo "<b><font color=#43a403>$onlineuser</b></font>"; }

elseif($hdo > '0') 
{ 
echo "<b><font color=#73ff8d>$onlineuser</b></font>"; 
}
elseif($thdocheckresult > '0') 
{ 
echo "<b><font color=orange>$onlineuser</b></font>"; 
}
elseif($entertainercheckresult > '0') 
{ 
echo "<b><font color=pink>$onlineuser</b></font>"; 
}

elseif($usersonlinerankid == '22') 
{ 
echo "<font color=white ><b><u>$onlineuser</u></b>"; 
}
elseif(mysql_num_rows(mysql_query("SELECT * FROM friends WHERE thereid = '$idh' AND myid = '$ida'")) >= '1') 
{ 
echo "<font color=silver><b>$onlineuser</b>"; 
}
elseif($crewid != '0')
{ 
echo "$onlineuser"; 
}
else
{ 
echo "<font color=gray>$onlineuser</font>"; 
}


if(($checks != '0')&&($appear != '1')) {
echo"</a><font color=white size=1>&nbsp;-</font>";}
}
?></center>
<br><font color=white > <i><? echo $usersonlinecount; ?> Users online</i></font>

</td></table>


<table class="content-cell" cellspacing="1" cellpadding="2" width="36%">
  <tr>
    <td class="header">Key</td>
  </tr>
  <tr>
    <td class=indent height=1></td>
  </tr>
  <tr>
    <td align="left" valign=top class=content style8> <span class="style13">Administrators will be shown in -</span> <span class="style12">Red</span>
      <br>
 <span class="style13">Moderators will be shown in -</span> <span class="style10">Dodger Blue</span> <br>
 <span class="style13">HDO will be shown in -</span> <span class="style15">Dark Green <br>
 <span class="style13">Entertainer will be shown in -</span> <span class="style17">Pink<br>
 <span class="style13">News Editor will be shown in -</span> <span class="style18">Purple</span> <br>
 <span class="style13">State Gangster will be shown in -</span> <span class="style13"><u>State Gangster</u></b> </span></span></span></td>
</table></td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?></td>
</tr>
</table>
</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>