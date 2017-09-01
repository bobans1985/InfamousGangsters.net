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
<table align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td width="8" height="22" background="/layout/topleft.png"></td><td height="22" background="/layout/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><b>Bullet Calculator</b></font></td><td width="8" height="22" background="/layout/topright.png"></td></tr><tr><td width="8" background="/layout/leftb.png" NOWRAP></td><td background="/layout/crossbg.png">

<?php
$gun_1 = "MG-42";
$gun_2 = "Glock Handgun";
$gun_3 = "Lee-Enfield";
$gun_4 = ".50 BMG";
$gun_5 = ".44 Magnum";
$gun_6 = "Bolt Action Rifle";
$gun_7 = "Colt Revolver";
$gun_8 = "Henry Rifle";
$gun_9 = "AK-47";
$gun_10 = "Beretta M501";

$protection_1 = "Hooded Hauberk";
$protection_2 = "Hooded Chainmail";
$protection_3 = "Lorica Segmenta";
$protection_4 = "Black Knight Armour Suit";
$protection_5 = "Triple Disc Cuirass";
$protection_6 = "British Armour Suit";
$protection_7 = "Scottish Armour Suit";
$protection_8 = "Metal Breastplate";
$protection_9 = "Light SWAT Vest";

$rank_1 = "Newbie";
$rank_2 = "Tramp";
$rank_3 = "Minor";
$rank_4 = "Vandal";
$rank_5 = "Crafter";
$rank_6 = "Respected Crafter";
$rank_7 = "Businessman";
$rank_8 = "Respected Businessman";
$rank_9 = "State Businessman";
$rank_10 = "Hitman";
$rank_11 = "Respected Hitman";
$rank_12 = "State Hitman";
$rank_13 = "Godfather";
$rank_14 = "Respected Godfather";
$rank_15 = "State Godfather";
$rank_16 = "Don";
$rank_17 = "Respected Don";
$rank_18 = "State Don";
$rank_19 = "Gangster";
$rank_20 = "Respected Gangster";
$rank_21 = "American Gangster";
$rank_22 = "State Gangster";

if ($_POST['submit']){

$rank1=$_POST['victimrank'];
$rank2=$_POST['rank'];
$health1=$_POST['health'];
$gun1=$_POST['gun'];
$protection1=$_POST['protection'];
$usvest=$_POST['svest'];

if($health1>=101||$health1<=0){
die("Invalid information!");
}

if($protection1>=10||$protection1<0){
die("Invalid information!");
}

if($gun1>=11||$gun1<0){
die("Invalid information!");
}


if($rank2>=23||$rank2<=0){
die("Invalid information!");
}

if($rank1>=23||$rank1<=0){
die("Invalid information!");
}

if ($rank1 == "1"){ $killbullets="7000";}
elseif ($rank1 == "2"){ $killbullets="7500";}
elseif ($rank1 == "3"){ $killbullets="8000";}
elseif ($rank1 == "4"){ $killbullets="8500";}
elseif ($rank1 == "5"){ $killbullets="9000";}
elseif ($rank1 == "6"){ $killbullets="9500";}
elseif ($rank1 == "7"){ $killbullets="10000";}
elseif ($rank1 == "8"){ $killbullets="12000";}
elseif ($rank1 == "9"){ $killbullets="15500";}
elseif ($rank1 == "10"){ $killbullets="17000";}
elseif ($rank1 == "11"){ $killbullets="19000";}
elseif ($rank1 == "12"){ $killbullets="26000";}
elseif ($rank1 == "13"){ $killbullets="33000";}
elseif ($rank1 == "14"){ $killbullets="40000";}
elseif ($rank1 == "15"){ $killbullets="47000";}
elseif ($rank1 == "16"){ $killbullets="53000";}
elseif ($rank1 == "17"){ $killbullets="67000";}
elseif ($rank1 == "18"){ $killbullets="81000";}
elseif ($rank1 == "19"){ $killbullets="95000";}
elseif ($rank1 == "20"){ $killbullets="102000";}
elseif ($rank1 == "21"){ $killbullets="127000";}
elseif ($rank1 == "22"){ $killbullets="152000";}

if ($rank2 == "1"){ $lessbullets="0";}
elseif ($rank2 == "2"){ $lessbullets="200";}
elseif ($rank2 == "3"){ $lessbullets="400";}
elseif ($rank2 == "4"){ $lessbullets="600";}
elseif ($rank2 == "5"){ $lessbullets="800";}
elseif ($rank2 == "6"){ $lessbullets="1000";}
elseif ($rank2 == "7"){ $lessbullets="1200";}
elseif ($rank2 == "8"){ $lessbullets="1400";}
elseif ($rank2 == "9"){ $lessbullets="1600";}
elseif ($rank2 == "10"){ $lessbullets="1800";}
elseif ($rank2 == "11"){ $lessbullets="2000";}
elseif ($rank2 == "12"){ $lessbullets="2200";}
elseif ($rank2 == "13"){ $lessbullets="2400";}
elseif ($rank2 == "14"){ $lessbullets="2600";}
elseif ($rank2 == "15"){ $lessbullets="2800";}
elseif ($rank2 == "16"){ $lessbullets="3000";}
elseif ($rank2 == "17"){ $lessbullets="3200";}
elseif ($rank2 == "18"){ $lessbullets="3400";}
elseif ($rank2 == "19"){ $lessbullets="3600";}
elseif ($rank2 == "20"){ $lessbullets="3800";}
elseif ($rank2 == "21"){ $lessbullets="4000";}
elseif ($rank2 == "22"){ $lessbullets="4200";}

if ($gun1 == "0"){ $gunless="0";}
elseif ($gun1 == "1"){ $gunless="100";}
elseif ($gun1 == "2"){ $gunless="200";}
elseif ($gun1 == "3"){ $gunless="500";}
elseif ($gun1 == "4"){ $gunless="750";}
elseif ($gun1 == "5"){ $gunless="1000";}
elseif ($gun1 == "6"){ $gunless="1250";}
elseif ($gun1 == "7"){ $gunless="1500";}
elseif ($gun1 == "8"){ $gunless="1750";}
elseif ($gun1 == "9"){ $gunless="1800";}
elseif ($gun1 == "10"){ $gunless="2000";}

if ($protection1 == "0"){ $protectionadd="0";}
elseif ($protection1 == "1"){ $protectionadd="100";}
elseif ($protection1 == "2"){ $protectionadd="200";}
elseif ($protection1 == "3"){ $protectionadd="500";}
elseif ($protection1 == "4"){ $protectionadd="750";}
elseif ($protection1 == "5"){ $protectionadd="1000";}
elseif ($protection1 == "6"){ $protectionadd="1250";}
elseif ($protection1 == "7"){ $protectionadd="1500";}
elseif ($protection1 == "8"){ $protectionadd="1750";}
elseif ($protection1 == "9"){ $protectionadd="1800";}
elseif ($protection == "10"){ $protectionadd="2000";}
elseif ($protection == "11"){ $protectionadd="4000";}

$start = $killbullets-$lessbullets;
$second = $start-$gunless;
$third = $second+$protectionadd;
$forth = $third/100;
$kill_needed1 = $forth*$health1;

if($kill_needed1<=0){
$needed2 = 1;
}else{
$needed2 = number_format($kill_needed1);
}
echo "<b><font color=white size=1 face=verdana>$needed2 bullets are required!</b><br>";
}
?>


<br><table cellpadding=0 cellspacing=5 align=center><form method=post><tr><td colspan=2 align=center></td></tr>
<tr><td><font color=white face=verdana size=1>Victims Rank:</font></td><td>
<SELECT NAME="victimrank" class=textbox>
<OPTION value=1><?php echo "$rank_1"; ?></OPTION>
<OPTION value=2><?php echo "$rank_2"; ?></OPTION>
<OPTION value=3><?php echo "$rank_3"; ?></OPTION>
<OPTION value=4><?php echo "$rank_4"; ?></OPTION>
<OPTION value=5><?php echo "$rank_5"; ?></OPTION>
<OPTION value=6><?php echo "$rank_6"; ?></OPTION>
<OPTION value=7><?php echo "$rank_7"; ?></OPTION>
<OPTION value=8><?php echo "$rank_8"; ?></OPTION>
<OPTION value=9><?php echo "$rank_9"; ?></OPTION>
<OPTION value=10><?php echo "$rank_10"; ?></OPTION>
<OPTION value=11><?php echo "$rank_11"; ?></OPTION>
<OPTION value=12><?php echo "$rank_12"; ?></OPTION>
<OPTION value=13><?php echo "$rank_13"; ?></OPTION>
<OPTION value=14><?php echo "$rank_14"; ?></OPTION>
<OPTION value=15><?php echo "$rank_15"; ?></OPTION>
<OPTION value=16><?php echo "$rank_16"; ?></OPTION>
<OPTION value=17><?php echo "$rank_17"; ?></OPTION>
<OPTION value=18><?php echo "$rank_18"; ?></OPTION>
<OPTION value=19><?php echo "$rank_19"; ?></OPTION>
<OPTION value=20><?php echo "$rank_20"; ?></OPTION>
<OPTION value=21><?php echo "$rank_21"; ?></OPTION>
<OPTION value=22><?php echo "$rank_22"; ?></OPTION>
</SELECT></td></tr>

<tr><td><font color=white face=verdana size=1>Victims Protection:</font></td><td>
<SELECT NAME="protection" class=textbox>
<OPTION value=0><?php echo "None"; ?></OPTION>
<OPTION value=1><?php echo "$protection_1"; ?></OPTION>
<OPTION value=2><?php echo "$protection_2"; ?></OPTION>
<OPTION value=3><?php echo "$protection_3"; ?></OPTION>
<OPTION value=4><?php echo "$protection_4"; ?></OPTION>
<OPTION value=5><?php echo "$protection_5"; ?></OPTION>
<OPTION value=6><?php echo "$protection_6"; ?></OPTION>
<OPTION value=7><?php echo "$protection_7"; ?></OPTION>
<OPTION value=8><?php echo "$protection_8"; ?></OPTION>
<OPTION value=9><?php echo "$protection_9"; ?></OPTION>
</SELECT></td></tr>

<tr><td><font color=white face=verdana size=1>Victims Health:</font></td><td><SELECT NAME="health" class=textbox><OPTION value=100>100%</OPTION><OPTION value=99>99%</OPTION><OPTION value=98>98%</OPTION><OPTION value=97>97%</OPTION><OPTION value=96>96%</OPTION><OPTION value=95>95%</OPTION><OPTION value=94>94%</OPTION><OPTION value=93>93%</OPTION><OPTION value=92>92%</OPTION><OPTION value=91>91%</OPTION><OPTION value=90>90%</OPTION><OPTION value=89>89%</OPTION><OPTION value=88>88%</OPTION><OPTION value=87>87%</OPTION><OPTION value=86>86%</OPTION><OPTION value=85>85%</OPTION><OPTION value=84>84%</OPTION><OPTION value=83>83%</OPTION><OPTION value=82>82%</OPTION><OPTION value=81>81%</OPTION><OPTION value=80>80%</OPTION><OPTION value=79>79%</OPTION><OPTION value=78>78%</OPTION><OPTION value=77>77%</OPTION><OPTION value=76>76%</OPTION><OPTION value=75>75%</OPTION><OPTION value=74>74%</OPTION><OPTION value=73>73%</OPTION><OPTION value=72>72%</OPTION><OPTION value=71>71%</OPTION><OPTION value=70>70%</OPTION><OPTION value=69>69%</OPTION><OPTION value=68>68%</OPTION><OPTION value=67>67%</OPTION><OPTION value=66>66%</OPTION><OPTION value=65>65%</OPTION><OPTION value=64>64%</OPTION><OPTION value=63>63%</OPTION><OPTION value=62>62%</OPTION><OPTION value=61>61%</OPTION><OPTION value=60>60%</OPTION><OPTION value=59>59%</OPTION><OPTION value=58>58%</OPTION><OPTION value=57>57%</OPTION><OPTION value=56>56%</OPTION><OPTION value=55>55%</OPTION><OPTION value=54>54%</OPTION><OPTION value=53>53%</OPTION><OPTION value=52>52%</OPTION><OPTION value=51>51%</OPTION><OPTION value=50>50%</OPTION><OPTION value=49>49%</OPTION><OPTION value=48>48%</OPTION><OPTION value=47>47%</OPTION><OPTION value=46>46%</OPTION><OPTION value=45>45%</OPTION><OPTION value=44>44%</OPTION><OPTION value=43>43%</OPTION><OPTION value=42>42%</OPTION><OPTION value=41>41%</OPTION><OPTION value=40>40%</OPTION><OPTION value=39>39%</OPTION><OPTION value=38>38%</OPTION><OPTION value=37>37%</OPTION><OPTION value=36>36%</OPTION><OPTION value=35>35%</OPTION><OPTION value=34>34%</OPTION><OPTION value=33>33%</OPTION><OPTION value=32>32%</OPTION><OPTION value=31>31%</OPTION><OPTION value=30>30%</OPTION><OPTION value=29>29%</OPTION><OPTION value=28>28%</OPTION><OPTION value=27>27%</OPTION><OPTION value=26>26%</OPTION><OPTION value=25>25%</OPTION><OPTION value=24>24%</OPTION><OPTION value=23>23%</OPTION><OPTION value=22>22%</OPTION><OPTION value=21>21%</OPTION><OPTION value=20>20%</OPTION><OPTION value=19>19%</OPTION><OPTION value=18>18%</OPTION><OPTION value=17>17%</OPTION><OPTION value=16>16%</OPTION><OPTION value=15>15%</OPTION><OPTION value=14>14%</OPTION><OPTION value=13>13%</OPTION><OPTION value=12>12%</OPTION><OPTION value=11>11%</OPTION><OPTION value=10>10%</OPTION><OPTION value=9>9%</OPTION><OPTION value=8>8%</OPTION><OPTION value=7>7%</OPTION><OPTION value=6>6%</OPTION><OPTION value=5>5%</OPTION><OPTION value=4>4%</OPTION><OPTION value=3>3%</OPTION><OPTION value=2>2%</OPTION><OPTION value=1>1%</OPTION></SELECT></td></tr>
<tr><td><font color=white face=verdana size=1>Your Rank:</font></td><td>
<SELECT NAME="rank" class=textbox>
<OPTION value=1><?php echo "$rank_1"; ?></OPTION>
<OPTION value=2><?php echo "$rank_2"; ?></OPTION>
<OPTION value=3><?php echo "$rank_3"; ?></OPTION>
<OPTION value=4><?php echo "$rank_4"; ?></OPTION>
<OPTION value=5><?php echo "$rank_5"; ?></OPTION>
<OPTION value=6><?php echo "$rank_6"; ?></OPTION>
<OPTION value=7><?php echo "$rank_7"; ?></OPTION>
<OPTION value=8><?php echo "$rank_8"; ?></OPTION>
<OPTION value=9><?php echo "$rank_9"; ?></OPTION>
<OPTION value=10><?php echo "$rank_10"; ?></OPTION>
<OPTION value=11><?php echo "$rank_11"; ?></OPTION>
<OPTION value=12><?php echo "$rank_12"; ?></OPTION>
<OPTION value=13><?php echo "$rank_13"; ?></OPTION>
<OPTION value=14><?php echo "$rank_14"; ?></OPTION>
<OPTION value=15><?php echo "$rank_15"; ?></OPTION>
<OPTION value=16><?php echo "$rank_16"; ?></OPTION>
<OPTION value=17><?php echo "$rank_17"; ?></OPTION>
<OPTION value=18><?php echo "$rank_18"; ?></OPTION>
<OPTION value=19><?php echo "$rank_19"; ?></OPTION>
<OPTION value=20><?php echo "$rank_20"; ?></OPTION>
<OPTION value=21><?php echo "$rank_21"; ?></OPTION>
<OPTION value=22><?php echo "$rank_22"; ?></OPTION>
</SELECT></td></tr>
<tr><td><font color=white face=verdana size=1>Your Weapon:</font></td><td>
<SELECT NAME="gun" class=textbox>
<OPTION value=0><?php echo "None"; ?></OPTION>
<OPTION value=1><?php echo "$gun_1"; ?></OPTION>
<OPTION value=2><?php echo "$gun_2"; ?></OPTION>
<OPTION value=3><?php echo "$gun_3"; ?></OPTION>
<OPTION value=4><?php echo "$gun_4"; ?></OPTION>
<OPTION value=5><?php echo "$gun_5"; ?></OPTION>
<OPTION value=6><?php echo "$gun_6"; ?></OPTION>
<OPTION value=7><?php echo "$gun_7"; ?></OPTION>
<OPTION value=8><?php echo "$gun_8"; ?></OPTION>
<OPTION value=9><?php echo "$gun_9"; ?></OPTION>
<OPTION value=10><?php echo "$gun_10"; ?></OPTION>
</SELECT></td></tr>
<tr><td></td><td><br><input type=submit name=submit value="Calculate" class="textbox"></td></tr>
</form></table>
<br>
<table cellpadding=0 cellspacing=2 align=center>
<tr><td>
<font color=white face=verdana size=1>Note: Bullet Calc is only 99% accurate.<br>Please note that Special Vests are not counted as apart of this calculation.<br>
We suggest you shoot a little more than asked on requirement!</font>
</td></tr>
</div>
<table width="100%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table></td><td width="8" background="/layout/rightb.png" NOWRAP></td></tr><tr><td width="8" height="9" background="/layout/bottomleft.png"></td><td height="9" background="/layout/bottom.png"></td><td width="8" height="9" background="/layout/bottomright.png"></td></tr></table>
</td>
<td width="100%" valign="top">
</td>
</tr>
</table>
