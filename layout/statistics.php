<?
session_start();  

if (!(isset($_SESSION["real_name"])))
{
	//echo "I'm not logged in";
	header('Location: index.php');
}
else
{
	echo "";
}


?>

<TR> 
	
<TD width="150" valign="top">
<?php include("banner.php");?>
</TD>

<html>
<head>
<title>Loyal Gangsters</title></head>
    	<link REL="stylesheet" TYPE="text/css" HREF="main.css">

<script language=javascript src=Menus.js></script>

<body background="wallpaper.jpg">
<center> 
 <table border="0" cellspacing="0" cellpadding="0" align="center" width="100%" class="cat">

	<TR> 
	
<TD width="150" valign="top">
<?php include("leftmenu.php");?>
</TD>
	  
    <td width="100%" valign="top">		




<table align="top" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/images/borders/topleft.png"></td>
<td height="22" background="/images/borders/top.png" NOWRAP><font color="#fff" face="verdana" size="1">Statistics</font></td>
<td width="8" height="22" background="/images/borders/topright.png"></td>
</tr>
 
<tr>
<td width="8" background="/images/borders/leftb.png" NOWRAP></td>
<td background="/images/borders/crossbg.png">


	
<?php
include "includes/db_connect.php"; 

$select = mysql_query("SELECT * FROM users ORDER by id");
$num = mysql_num_rows($select);

$dead = mysql_query("SELECT * FROM users WHERE status='Dead'");
$numdead = mysql_num_rows($dead);

$alive = mysql_query("SELECT * FROM users WHERE status='Alive'");
$numalive = mysql_num_rows($alive);

	
$tot=mysql_fetch_object(mysql_query("SELECT SUM(cash)AS jackpot2 FROM users WHERE userlevel < 2 AND status='Alive' AND missioncharacter='0'"));	

$totalmoney = $tot->jackpot2;	
	
$fetch=mysql_fetch_array(mysql_query("SELECT SUM(points)AS points3 FROM users WHERE userlevel = 1 AND status='Alive'"));
    $totalpoints=$fetch[0];	
    
$fetch=mysql_fetch_array(mysql_query("SELECT SUM(bullets) FROM users WHERE userlevel < 2 AND status='Alive'"));
    $totalbullets=$fetch[0];

$fetch=mysql_fetch_array(mysql_query("SELECT SUM(messagessent) FROM users"));
    $messagessent=$fetch[0];
	
$tot2=mysql_fetch_object(mysql_query("SELECT SUM(bank)AS jackpot FROM users WHERE userlevel < 2 AND status='Alive'"));	

$totalbank = $tot2->jackpot;
	
$ttcash=$totalmoney+$totalbank;
$peruser=$ttcash / $num;
$perdead=100 / $num * $numdead
?>

<br>
<form name="form1" method="post" action="">

 
<table align="center" width="75%"  cellpadding="1" cellspacing="2" border="1" bordercolor="#444444"> 
    <tr>
	<td class="header" colspan="2" align="center"><font color="#ffffff" SIZE="1" FACE="VERDANA">Game Statistics</font>
	</tr>
	<tr class="wtfs">
       <td width="50%" align="center">
      <font color=#fff size=1 face=verdana>Total Users:</td>
               <td width="50%" align="center">
       <font color=#fff size=1 face=verdana><? echo number_format($num); ?> <i> <font color=silver size=1 face=verdana></font></td>
	</tr>
		<tr class="wtfs">
       <td width="50%" align="center">
      <font color=#fff size=1 face=verdana>Total Users Dead:</td>
               <td width="50%" align="center">
       <font color=#fff size=1 face=verdana><? echo number_format($numdead); ?> (<? echo number_format($perdead); ?>%)</td>
	</tr>
	<tr class="wtfs">
       <td width="50%" align="center">
      <font color=#fff size=1 face=verdana>Game Cash:</td>
               <td width="50%" align="center">
       <font color=#fff size=1 face=verdana>$<?php echo number_format($totalmoney+$totalbank); ?> ($<? echo number_format($peruser); ?> Per Player)</td>
	</tr>
<?

if ($userlevel >= 7) 
{
?>
				<tr>
	<tr class="wtfs">
       <td width="50%" align="center">
      <font color=#fff size=1 face=verdana>Game Points:</td>
               <td width="50%" align="center">
       <font color=#fff size=1 face=verdana><?php echo number_format($totalpoints); ?></td>
	</tr>


	<tr class="wtfs">
       <td width="50%" align="center">
      <font color=#fff size=1 face=verdana>Total Bullets:</td>
               <td width="50%" align="center">
       <font color=#fff size=1 face=verdana><?php echo number_format($totalbullets); ?></td>
	</tr>
<? } ?>

	<tr class="wtfs">
       <td width="50%" align="center">
      <font color=#fff size=1 face=verdana>Total Messages Sent:</td>
               <td width="50%" align="center">
       <font color=#fff size=1 face=verdana><?php echo number_format($messagessent); ?></td>
	</tr>
	<tr>
		
	</table>

	<br>
<table align="center" width="75%"  cellpadding="1" cellspacing="2" border="1" bordercolor="#444444"> 
    <tr>
	<td class="header" colspan="2" align="center"><font color="#ffffff" SIZE="1" FACE="VERDANA">
	</tr>
	

	
				<?
include "includes/db_connect.php"; 

$sql="SELECT * FROM users WHERE status='Dead' AND modkill='0' ORDER by last_attempted DESC LIMIT 10";
$result=mysql_query($sql);

while($rows=mysql_fetch_array($result)){ // Start looping table row 

?>
	<tr class="wtfs">
       <td width="50%" align="center"><a href="viewprofile.php?viewuser=<? echo $rows['username']; ?>"><b><? echo $rows['username']; ?></b></a></td>
       <td width="50%" align="center"><? echo $rows['rank']; ?></td></tr>
	<?
	
	}
	?>
	
	
	</table>
	
	<br>
	</td>
		<td width="8" background="/images/borders/rightb.png" NOWRAP></td>
</tr>
 
<tr>
<td width="8" height="9" background="/images/borders/bottomleft.png"></td>
<td height="9" background="/images/borders/bottom.png"></td>
<td width="8" height="9" background="/images/borders/bottomright.png"></td>
</tr>
</table>
</td>
<td width="250" valign="top">

</form>
	


	  	  <TD width="150" valign="top">
<?php include("rightmenu.php");?>
</TD>
	
	</TR>
	

</table>

</center>
</body>
</html>