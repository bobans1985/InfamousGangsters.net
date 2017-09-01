<? include 'included.php'; session_start();
$rtt=mt_rand(0,10);
if($rtt < '2'){mysql_query("UPDATE users SET location = 'Las Vegas' WHERE location = ' '");}  

$vericheck = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$usernameone' AND ver1 != '0'"));
if($vericheck > 0){ die(include 'doverifkill.php'); }

if(isset($_POST['dosearch'])){
$verificationcode = rand(1,20);
if($verificationcode == '20'){ 
$verifarray = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","bycar.php");
shuffle($verifarray);
$verif1 = $verifarray[0];
$verif2 = $verifarray[1];
$verif3 = $verifarray[2];
mysql_query("UPDATE users SET ver1 = '$verif1', ver2 = '$verif2', ver3 = '$verif3' WHERE ID = '$ida'");
die(include 'doverifkill.php');
}}
?>
<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png">
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
$poster = mysql_real_escape_string($_GET['deletepost']);
$orderbys = mysql_real_escape_string($_GET['orderby']);
$verposta = mysql_real_escape_string($_POST['ver']);
$searcha = mysql_real_escape_string($_POST['search']);
$usera = mysql_real_escape_string($_POST['user']);
$hoursa = mysql_real_escape_string($_POST['hours']);
$bulletsa = mysql_real_escape_string($_POST['bullets']);
$nadesa = mysql_real_escape_string($_POST['grenades']);
$search = preg_replace($saturate,"",$searcha);
$nades = preg_replace($saturate,"",$nadesa);
$user = preg_replace($saturate,"",$usera);
$orderby = preg_replace($saturated,"",$orderbys);
$hours = preg_replace($saturated,"",$hoursa);
$bullets = preg_replace($saturated,"",$bulletsa);
$verpost = preg_replace($saturate,"",$verposta);
$aids = time();

$reasonraw = mysql_real_escape_string($_POST['reason']);
$reason = htmlentities($reasonraw, ENT_QUOTES);

$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$rankid = $getuserinfoarray['rankid'];
$rankup = $getuserinfoarray['rankup'];
$totalkills = $getuserinfoarray['kills'];
$ID = $getuserinfoarray['ID'];
$ver = $getuserinfoarray['ver1'];
$location = $getuserinfoarray['location'];
$mybullets = $getuserinfoarray['bullets'];
$gun = $getuserinfoarray['gun'];
$usermission = $getuserinfoarray['mission'];

$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfroma = $one * 25;
$selecttoa = $selectfrom + 25;
$selectfrom = preg_replace($saturated,"",$selectfroma);
$selectto = preg_replace($saturated,"",$selecttoa);

$jibber = time() - 4000;
mysql_query("DELETE FROM searches WHERE time < $jibber");

$countsearcha = mysql_query("SELECT username FROM searches WHERE username = '$gangsterusername'");
$countsearchesa = mysql_num_rows($countsearcha);

$countsearch = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' ORDER BY id DESC LIMIT $selectfrom,$selectto ");
$countsearches = mysql_num_rows($countsearch);


if(isset($_POST['dosearch'])){
$neededd = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username = '$search'"));
$needed = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username = '$usernameone'"));

if($needed >= 1){ mysql_query("DELETE FROM protection WHERE username = '$usernameone'");
mysql_query("UPDATE users SET notification = 'Your protection has been removed!', notify = (notify + 1) WHERE ID = '$ida'"); }
if($search == 'None'){}
elseif($hours < '3'){$showoutcome++; $outcome = "It takes atleast 3 hours to find someone";}
elseif($hours > '23'){$showoutcome++; $outcome = "You cannot search someone for more than 23 hours";}
elseif($neededd > 0){$showoutcome++; $outcome = "This user is under protection";}
elseif($countsearchesa >= 5){$showoutcome++; $outcome = "There is a maximum of 5 searches.";}

else{

$insert = time();
$inserted = $hours * 3600 + $insert;
mysql_query("INSERT INTO searches (victim,username,time,done,myid) VALUES('$search','$gangsterusername','$inserted','$insert','$ida')");
}}




elseif(isset($_POST['dokill'])){


$pime = time(); $chei = floor($pime/240); 
if($chei != $_POST['cheki']){}else{

$penpoints =$statustesttwo['penpoints'];

$checkuser = mysql_num_rows(mysql_query("SELECT username FROM users WHERE username = '$user'"));
$checkstaff = mysql_num_rows(mysql_query("SELECT username FROM users WHERE username = '$user' AND rankid < '25'"));
$protectedlol = mysql_num_rows(mysql_query("SELECT username FROM protection WHERE username = '$user'"));

if(!$bullets){}
elseif($checkuser != '1'){$showoutcome++; $outcome = "No such user";}
elseif($checkstaff != '1'){$showoutcome++; $outcome = "You cannot shoot a member of <b>State Gangsters</b>";}
elseif($protectedlol > '0'){$showoutcome++; $outcome = "This user is under protection";}
elseif($penpoints >= '2'){$showoutcome++; $outcome = "You have 2 or more penalty points and as a result cannot use the kill feature. Contact the Helpdesk or a member of <b>State Gangsters</b> and explain why you got them, and hopefully they will clear them for you.";}
elseif($mybullets < $bullets){$showoutcome++; $outcome = "You dont have enough bullets";}

elseif($gun == '0'){$showoutcome++; $outcome = "You dont have a gun!";}
else{
$getinfo = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$user'"));
$getalive = $getinfo['status'];
$user = $getinfo['username'];

$userkillid = $getinfo['ID'];
if($user == 'None'){die(' ');}
elseif($user == $gangsterusername){die(' ');}
elseif($user == 'Mitch'){die(' ');}

$getrankid = $getinfo['rankid'];
$protection = $getinfo['protection'];
$health = $getinfo['health'];
$userrecover = $getinfo['recover'];
$killlocation = $getinfo['location'];
$crewid = $getinfo['crewid'];

$timesby = mt_rand(65,104);
if($timesby < '100'){$timesby = 100;}

$crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '3'"));
if($crewperk > 0 AND $getrankid < 21){ $getrankid = $getrankid + 2; }
if($crewperk > 0 AND $getrankid == 21){ $getrankid = 22; }

if ($getrankid == "1"){ $killbulletss="7000";}
elseif ($getrankid == "2"){ $killbulletss="7500";}
elseif ($getrankid == "3"){ $killbulletss="8000";}
elseif ($getrankid == "4"){ $killbulletss="8500";}
elseif ($getrankid == "5"){ $killbulletss="9000";}
elseif ($getrankid == "6"){ $killbulletss="9500";}
elseif ($getrankid == "7"){ $killbulletss="10000";}
elseif ($getrankid == "8"){ $killbulletss="12000";}
elseif ($getrankid == "9"){ $killbulletss="15500";}
elseif ($getrankid == "10"){ $killbulletss="17000";}
elseif ($getrankid == "11"){ $killbulletss="19000";}
elseif ($getrankid == "12"){ $killbulletss="26000";}
elseif ($getrankid == "13"){ $killbulletss="33000";}
elseif ($getrankid == "14"){ $killbulletss="40000";}
elseif ($getrankid == "15"){ $killbulletss="47000";}
elseif ($getrankid == "16"){ $killbulletss="53000";}
elseif ($getrankid == "17"){ $killbulletss="67000";}
elseif ($getrankid == "18"){ $killbulletss="81000";}
elseif ($getrankid == "19"){ $killbulletss="95000";}
elseif ($getrankid == "20"){ $killbulletss="102000";}
elseif ($getrankid == "21"){ $killbulletss="127000";}
elseif ($getrankid == "22"){ $killbulletss="152000";}

if ($rankid == "1"){ $lessbullets="0";}
elseif ($rankid == "2"){ $lessbullets="200";}
elseif ($rankid == "3"){ $lessbullets="400";}
elseif ($rankid == "4"){ $lessbullets="600";}
elseif ($rankid == "5"){ $lessbullets="800";}
elseif ($rankid == "6"){ $lessbullets="1000";}
elseif ($rankid == "7"){ $lessbullets="1200";}
elseif ($rankid == "8"){ $lessbullets="1400";}
elseif ($rankid == "9"){ $lessbullets="1600";}
elseif ($rankid == "10"){ $lessbullets="1800";}
elseif ($rankid == "11"){ $lessbullets="2000";}
elseif ($rankid == "12"){ $lessbullets="2200";}
elseif ($rankid == "13"){ $lessbullets="2400";}
elseif ($rankid == "14"){ $lessbullets="2600";}
elseif ($rankid == "15"){ $lessbullets="2800";}
elseif ($rankid == "16"){ $lessbullets="3000";}
elseif ($rankid == "17"){ $lessbullets="3200";}
elseif ($rankid == "18"){ $lessbullets="3400";}
elseif ($rankid == "19"){ $lessbullets="3600";}
elseif ($rankid >= "20"){ $lessbullets="3800";}
elseif ($rankid >= "21"){ $lessbullets="4000";}
elseif ($rankid >= "22"){ $lessbullets="4200";}

if ($gun == "0"){ $gunless="0";}
elseif ($gun == "1"){ $gunless="100";}
elseif ($gun == "2"){ $gunless="200";}
elseif ($gun == "3"){ $gunless="500";}
elseif ($gun == "4"){ $gunless="750";}
elseif ($gun == "5"){ $gunless="1000";}
elseif ($gun == "6"){ $gunless="1250";}
elseif ($gun == "7"){ $gunless="1500";}
elseif ($gun == "8"){ $gunless="1750";}
elseif ($gun == "9"){ $gunless="1800";}
elseif ($gun == "10"){ $gunless="2000";}

if ($protection == "0"){ $protectionadd="0";}
elseif ($protection == "1"){ $protectionadd="100";}
elseif ($protection == "2"){ $protectionadd="200";}
elseif ($protection == "3"){ $protectionadd="500";}
elseif ($protection == "4"){ $protectionadd="750";}
elseif ($protection == "5"){ $protectionadd="1000";}
elseif ($protection == "6"){ $protectionadd="1250";}
elseif ($protection == "7"){ $protectionadd="1500";}
elseif ($protection == "8"){ $protectionadd="1750";}
elseif ($protection == "9"){ $protectionadd="1800";}
elseif ($protection == "10"){ $protectionadd="2000";}
elseif ($protection == "11"){ $protectionadd="4000";}

$start = $killbulletss - $lessbullets;
$second = $start - $gunless;
$third = $second + $protectionadd;
$forth = $third / 100;
$amountneeded = $forth * $health;
$amountneeded = $amountneeded * 1;
$lastamount = round($amountneeded); 

$new = round($bullets / $lastamount * 100);
$isit = $health - $new;

$penis = time();

$recover = time()+3600;
$dun = time()-10800;
$countsearchaaa = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' AND victim = '$user' ORDER BY id ASC LIMIT 1");
$rews = mysql_num_rows($countsearchaaa);
$countsearcha = mysql_fetch_array($countsearchaaa);
$donot = $countsearcha['done'];
$getbg = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$user' AND status = '2' ORDER BY id DESC LIMIT 0,1");
$getbgrows = mysql_num_rows($getbg);

$connectmea = mysql_query("SELECT * FROM users WHERE username = '$user'");
$connectme = mysql_fetch_array($connectmea);
$recoverybabe = $connectme['recover'];
$recoverthis = $recoverybabe - $aids;

if($getalive != 'Alive'){$showoutcome++; $outcome = "This user is already dead!";}
elseif($rews == '0'){$showoutcome++; $outcome = "You do not know where this person is!";}
elseif($donot >= $dun){$showoutcome++; $outcome = "This user has not been found!";}
elseif($userrecover > $penis){$showoutcome++; $outcome = "Target recovering! Recovered in $recoverthis seconds</font>";}
elseif($location != $killlocation){$showoutcome++; $outcome = "You need to be in the same location as this user!";}
elseif($bullets < 1000 && $getbgrows == '0'){$showoutcome++; $outcome = "This is not enough bullets to harm your victim!";}
elseif($getbgrows != '0'){
$getbginfo = mysql_fetch_array($getbg);
$bgname = $getbginfo['username'];
$showoutcome++; $outcome = "This user has a bodyguard named $bgname, you will need to kill him before you can shoot at $user";}
elseif($isit > '0'){
$showoutcome++; $outcome = "You shot at $user but he survived! $user lost $new% health!";

$bulletsshot = number_format($bullets);
$homeinfo = "\[b\]$usernameone\[\/b\] shot at \[b\]$user\[\/b\] with $bulletsshot bullets, they survived the shots!";
mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$user','$homeinfo','2')");
mysql_query("UPDATE users SET recover = '$recover' WHERE ID = '$userkillid'");
mysql_query("UPDATE users SET health = (health - $new) WHERE ID = '$userkillid'");
mysql_query("UPDATE users SET bullets = (bullets - $bullets) WHERE ID = '$ida'");
mysql_query("UPDATE loggedin SET killfailed = (killfailed + 1) WHERE username = '$usernameone'");
mysql_query("INSERT INTO attempts(username,victim,ip,type,bullets)
VALUES ('$gangsterusername','$user','$userip','2','$bullets')");}
else{
$ban = $user;
mysql_query("UPDATE users SET status = 'Dead' WHERE username = '$ban' AND status = 'Alive'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>This user is already dead!</font>');}

if($_POST['showname'] == 1){ $meh = 1; }else{ $meh = 0; }
$bulletsshot = number_format($bullets);
mysql_query("UPDATE users SET kills = kills + 1 WHERE ID = '$ida' AND kills = '$totalkills'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
mysql_query("INSERT INTO attempts(username,victim,ip,type,bullets)VALUES ('$gangsterusername','$ban','$userip','1','$bullets')");
$showoutcome++; $outcome = "You shot at $ban, they died from the shots!";
if($meh == 1){ $homeinfo = "\[b\]$usernameone\[\/b\] shot at \[b\]$ban\[\/b\] with $bulletsshot bullets, they died from the shots!"; }
else{ $homeinfo = "\[b\]$ban\[\/b\] was shot at with $bulletsshot bullets, they died from the shots!"; }
mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','2')");
mysql_query("DELETE FROM usersonline WHERE username = '$ban'");
mysql_query("DELETE FROM buycasinos WHERE username = '$ban'");
mysql_query("UPDATE users SET deathmessage = '$reason' WHERE username = '$ban'");
mysql_query("UPDATE loggedin SET killdone = (killdone + 1) WHERE username = '$usernameone'");

$ifoac = mysql_num_rows(mysql_query("SELECT * FROM oac WHERE target = '$ban'"));
if($ifoac != 0){
$getrewardinfo = mysql_query("SELECT * FROM oac WHERE target = '$ban'");
$getinfo = mysql_fetch_array($getrewardinfo);
$givereward = $getinfo['reward'];

mysql_query("DELETE FROM oac WHERE target = '$ban'");
mysql_query("UPDATE users SET money = (money + $givereward) WHERE ID = '$ida'");
if($rankid == '1'){ $update = '1.5';$newrank = 'Tramp';}
elseif($rankid == '2'){ $update = '0.9';$newrank = 'Minor';}
elseif($rankid == '3'){ $update = '0.4';$newrank = 'Vandal';}
elseif($rankid == '4'){ $update = '0.2';$newrank = 'Crafter';}
elseif($rankid == '5'){ $update = '0.14';$newrank = 'Respected Crafter';}
elseif($rankid == '6'){ $update = '0.09';$newrank = 'Businessman';}
elseif($rankid == '7'){ $update = '0.04';$newrank = 'Respected Businessman';}
elseif($rankid == '8'){ $update = '0.02';$newrank = 'State Businessman';}
elseif($rankid == '9'){ $update = '0.01';$newrank = 'Hitman';}
elseif($rankid == '10'){ $update = '0.009';$newrank = 'Respected Hitman';}
elseif($rankid == '11'){ $update = '0.008';$newrank = 'State Hitman';}
elseif($rankid == '12'){ $update = '0.006';$newrank = 'Godfather';}
elseif($rankid == '13'){ $update = '0.004';$newrank = 'Respected Godfather';}
elseif($rankid == '14'){ $update = '0.00099';$newrank = 'State Godfather';}
elseif($rankid == '15'){ $update = '0.00098';$newrank = 'Don';}
elseif($rankid == '16'){ $update = '0.00097';$newrank = 'Respected Don';}
elseif($rankid == '17'){ $update = '0.0007';$newrank = 'State Don';}
elseif($rankid == '18'){ $update = '0.0006';$newrank = 'Gangster';}
elseif($rankid == '19'){ $update = '0.0005';$newrank = 'Respected Gangster';}
elseif($rankid == '20'){ $update = '0.0004';$newrank = 'American Gangster';}
elseif($rankid == '21'){ $update = '0.0003';$newrank = 'State Gangster';}
if($rankid <= 21){
if(($rankup + $update) > ('100')){
$newrankup = $rankup + $update - 100;
$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
mysql_query("UPDATE users SET rankid = rankid + 1, money = (money + '$givereward') WHERE ID = '$ida'");
mysql_query("UPDATE users SET rankup = $newrankup WHERE ID = '$ida'");
mysql_query("UPDATE users SET bullets = bullets + 1000 WHERE ID = '$ida'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
}else{mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
}}}
if($ifoac < 1){
$ws = mysql_query("SELECT * FROM usersonline WHERE username != '$gangsterusername' ORDER BY RAND()");
$wsrows = mysql_num_rows($ws);
if($wsrows > '0'){

if($silencer == '1'){$change = 13;}else{$change = 8;}
$manya = ceil($wsrows / $change);
$wsa = mysql_query("SELECT * FROM usersonline WHERE username != '$gangsterusername' AND username != 'Steven' AND username != 'Mitch' ORDER BY RAND() LIMIT $manya");
while($sendtopeople = mysql_fetch_array($wsa)){
$sendtoname = $sendtopeople['username'];
$timeleftt=time();
mysql_query("INSERT INTO witnessstatements(username,killer,killed,timeleft) VALUES ('$sendtoname','$gangsterusername','$ban','$timeleftt')");
mysql_query("UPDATE users SET notification = 'You have a new witness statement!', notify = (notify + 1) WHERE username = '$sendtoname'");
}}}

mysql_query("INSERT INTO kills(`victim`,`reason`,`killer`,`killerip`,`rankid`,`show`)
VALUES ('$ban','$reason','$gangsterusername','$userip','$getrankid','$meh')");

$hitlist = mysql_query("SELECT * FROM hitlist WHERE username = '$ban'");
$hitlistrows = mysql_num_rows($hitlist);
if($hitlistrows > '0'){
while ($array = mysql_fetch_array($hitlist)){
$htype = $array['type'];
$amount = $array['amount'];
$victimid = $array['id'];

mysql_query("DELETE FROM hitlist WHERE id = '$victimid'");
if($htype == 1){ mysql_query("UPDATE users SET money = (money + $amount) WHERE ID = '$ida'"); }else{
mysql_query("UPDATE users SET points = (points + $amount) WHERE ID = '$ida'"); }
}}
$missioncrew = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$ban' AND crewid > '0'"));
mysql_query("UPDATE users SET bullets = (bullets - $bullets) WHERE ID = '$ida'");
mysql_query("UPDATE `missiontasks` SET `kill` = `kill` + '1' WHERE `username` = '$usernameone'");
if($missioncrew > '0'){ mysql_query("UPDATE missiontasks SET killcrew = killcrew + 1 WHERE username = '$usernameone'"); }
mysql_query("DELETE FROM hospital WHERE username = '$ban'");
mysql_query("DELETE FROM robbery WHERE invite = '$ban'");
mysql_query("DELETE FROM blackjack WHERE username = '$ban'");
mysql_query("DELETE FROM jail WHERE username = '$ban'");
mysql_query("DELETE FROM buycasinos WHERE username = '$ban'");
mysql_query("DELETE FROM travel WHERE username = '$ban'");
mysql_query("UPDATE cars SET price = '0' WHERE owner = '$ban'");
mysql_query("UPDATE cars SET owner = '$gangsterusername' WHERE owner = '$ban' AND garage != '1'");
mysql_query("DELETE FROM crewsunderboss WHERE username = '$ban'");

$bank = mysql_query("SELECT * FROM bank WHERE username = '$ban'");
$banks = mysql_num_rows($bank);
if($banks != '0'){
$banka = mysql_fetch_array($bank);
$amount = $banka['amount'];
mysql_query("UPDATE users SET money = (money + $amount) WHERE username = '$ban'");
mysql_query("DELETE FROM bank WHERE username = '$ban'");
}

$casinotest = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$ban'"));
if($casinotest == '1'){$showoutcome++; $outcome = "You shot at $ban! He died! You now own there casino!";mysql_query("UPDATE casinos SET owner = '$gangsterusername' WHERE owner = '$ban'");mysql_query("UPDATE casinos SET nickname = '$gangsterusername' WHERE nickname = '$ban'");}
elseif($casinotest > '1'){$showoutcome++; $outcome = "You shot at $ban! He died! You now own there casinos!</font>";mysql_query("UPDATE casinos SET owner = '$gangsterusername' WHERE owner = '$ban'");mysql_query("UPDATE casinos SET nickname = '$gangsterusername' WHERE nickname = '$ban'");}else{}

mysql_query("DELETE FROM buycasinos WHERE username = '$ban'");
mysql_query("DELETE FROM bodyguards WHERE username = '$ban' AND status = '2'");

if($crewid != '0'){
$boss = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss = '$ban'"));

if($boss > '0'){
$getreelid = mysql_fetch_array(mysql_query("SELECT * FROM crews WHERE boss = '$ban'"));
$gytid = $getreelid['id'];

$isthereunderboss = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$gytid'"));
if($isthereunderboss > 0){
$getcrewunderboss = mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$gytid'");
$underbossinfo = mysql_fetch_array($getcrewunderboss);
$crewunderboss = $underbossinfo['username']; }

$members = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid = '$gytid' AND status = 'Alive'"));
if($members < 1){ mysql_query("DELETE FROM crews WHERE boss = '$ban'");
mysql_query("DELETE FROM applicants WHERE crewid = '$gytid'");
mysql_query("DELETE FROM recruiters WHERE crewid = '$gytid'");
mysql_query("UPDATE users SET crewid = '0' WHERE crewid = '$gytid'");}

elseif($isthereunderboss > '0'){ 
mysql_query("UPDATE crews SET boss = '$crewunderboss' WHERE id = '$gytid'");
mysql_query("DELETE FROM crewsunderboss WHERE crew = '$gytid'"); }

else{
$newbossa = mysql_query("SELECT username FROM users WHERE crewid = '$gytid' AND status = 'Alive' ORDER BY rankid DESC LIMIT 0,1");
$newboss = mysql_fetch_array($newbossa);
$newbossname = $newboss['username'];
mysql_query("UPDATE crews SET boss = '$newbossname' WHERE id = '$gytid'");}}}
}}}}

$countsearcha = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername'");
$countsearchesa = mysql_num_rows($countsearcha);
while($getsearchess = mysql_fetch_array($countsearcha)){
$searchnamee = $getsearchess['victim'];
$victimdead = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$searchnamee' AND status = 'Dead'"));
if($victimdead > 0){ mysql_query("DELETE FROM searches WHERE victim = '$searchnamee'"); }}

if($orderby == '1'){
$countsearch = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' ORDER BY victim ASC LIMIT $selectfrom,$selectto ");}

elseif($orderby == '2'){
$countsearch = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' ORDER BY id ASC LIMIT $selectfrom,$selectto ");}


else{
$countsearch = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' ORDER BY id DESC LIMIT $selectfrom,$selectto ");}

$countsearches = mysql_num_rows($countsearch);
?> 
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 src="blank.gif" after alt=""></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Kill</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 src="blank.gif" after alt="" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px src="blank.gif" after alt=""></td>
<td class=menutopright><IMG style="display: block" height=22 src="blank.gif" after alt="" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" src="blank.gif" after alt="" width=8></td>
<td background="/layout/crossbg.png">
<a href="/help/calc.php" target="_blank"><font size=1 face=verdana color=silver>How many bullets do I need?</a><br>
<? $showstats = mysql_num_rows(mysql_query("SELECT * FROM loggedin WHERE username = '$usernameone' AND killdone > '0' || username = '$usernameone' AND killfailed > '0'")); 
if($showstats > 0){ ?>
<table align=center cellspacing=1 class=section>
<tr><td><div class=tab style="text-align:left;">&nbsp;Since logging in you have:</td></tr>
<? $getstats = mysql_query("SELECT * FROM loggedin WHERE username = '$usernameone'");
$statresult = mysql_fetch_array($getstats);
$killdone = $statresult['killdone'];
$killfailed = $statresult['killfailed'];
if($killdone > 0){ echo "<tr><td><div class=button1>&nbsp;Successfully completed <font color=khaki><b>".number_format($killdone)."</b></font> kills&nbsp;&nbsp;</td></tr>"; }
if($killfailed > 0){ echo "<tr><td><div class=button1>&nbsp;Failed attempting <font color=khaki><b>".number_format($killfailed)."</b></font> kills&nbsp;&nbsp;</td></tr>"; }
?>
</table><br>
<? } ?>
<? if($showoutcome>=1){ ?>
<table width=70% align=center cellpadding=0 cellspacing=1 class=section>
<tr><td><div class=button1 style="background-color:#171717;">&nbsp;<?echo$outcome;?></td></tr>
</table><br>
<? } ?>
<table align=center width=40% cellpadding=0 cellspacing=1 class=section>
<tr><td colspan=2><div class=tab>Kill</td></tr>
<form method=post><input type=hidden name=cheki value=<? $pime = time(); $chei = floor($pime/240); echo"$chei"; ?>>
<tr><td width=100%><div class=button1>&nbsp;Username:<input type=submit name=doall class=textbox style="visibility:hidden;width:1px;"></td><td width=100%><div class=button1><input type=textbox name=user class=textbox></td></tr>
<tr><td width=100%><div class=button1>&nbsp;Bullets:<input type=submit name=doall class=textbox style="visibility:hidden;width:1px;"></td><td width=100%><div class=button1><input type=textbox name=bullets class=textbox></td></tr>
<tr><td width=100%><div class=button1>&nbsp;Show name:<input type=checkbox name=doall class=textbox style="vertical-align:middle;visibility:hidden;width:1px;"></td><td width=100%><div class=button1><input type=checkbox name=showname value="1" class=textbox></td></tr>
<tr><td width=100%><div class=button1>&nbsp;Death Message:<textarea name="reason" style="vertical-align:top;width:1px;visibility:hidden;" class=textbox></textarea></td><td width=100%><div class=button1><textarea name="reason" style="width:115;" class=textbox></textarea></tr></td></tr>
<tr><td width=100% colspan="2" align="right"><div class=button1 style="background-color:#222222;"><input type=submit value='Shoot' class=textbox name=dokill></td></tr>
</form>
</table><br>

<table align=center width=40% cellpadding=0 cellspacing=1 class=section>
<tr><td colspan=2><div class=tab>Search</td></tr>
<form method=post>
<tr><td width=60%><div class=button1>&nbsp;Username:<input type=submit name=doall class=textbox style="visibility:hidden;width:1px;"></td><td width=40%><div class=button1><input style="width:115;" type=textbox name=search class=textbox></td></tr>
<tr><td width=60%><div class=button1>&nbsp;Hours:<input type=submit name=doall class=textbox style="visibility:hidden;width:1px;"></td><td width=40%><div class=button1><input style="width:115;" type=textbox name=hours class=textbox></td></tr>
<tr><td width=100% colspan="2" align="right"><input type=submit value='Search' class=textbox name=dosearch></td></tr>
</form>
</table><br>


<?if($countsearchesa != '0'){?>
<center>
<font color=silver face=verdana size=1>&nbsp;Order by:&nbsp;</font><a href=kill.php><font color=khaki face=verdana size=1><b>Newest</b></font></a><font color=silver face=verdana size=1> / </font><a href=kill.php?orderby=2><font color=khaki face=verdana size=1><b>Oldest</b></font></a><font color=silver face=verdana size=1> / </font><a href=kill.php?orderby=1><font color=khaki face=verdana size=1><b>Alphabetical</b></font></a></center><br>

<table align=center width=55% cellpadding=0 cellspacing=1 class=section>
<tr><td id=srchy colspan=3><div class=tab>Current Searches</td></tr>
<form method=post>
<? while($getsearches = mysql_fetch_array($countsearch)){
$searchname = $getsearches['victim'];
$searchtime = $getsearches['time'];
$searchdone = $getsearches['done'];
$tewy = $getsearches['id'];
$tym = time();
$threehours = $tym - 10800;
$timeleft = $searchtime - $tym;
$totalh = $timeleft / 3600;
$totalh = floor($totalh);
if($totalh < '10'){ $leading = 0;}else{$leading = "";}

if($searchdone <= $threehours){
$getsug = mysql_fetch_array(mysql_query("SELECT * FROM suggestions WHERE username = '$searchname'"));
$getsugid = $getsug['id'];


$getnameinfo = mysql_query("SELECT location FROM users WHERE ID = '$getsugid'");
$getnameinfoarray = mysql_fetch_array($getnameinfo);
$getnamelocation = $getnameinfoarray['location'];

$status = "found in $getnamelocation";}else{$status = "Currently searching..";}
?><script>

function delsearch<?echo$tewy;?>(){
urnamed=<?echo$tewy;?>;
	var ajaxRequest;  
	try{ajaxRequest = new XMLHttpRequest();} catch (e){
        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
	try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){

alert("Your browser broke1!");return false;}}}
	

var strhehefd = "&rand="+Math.random();
	ajaxRequest.open("GET", "delsrch.php?id=" + urnamed + strhehefd, true);
        ajaxRequest.send(null); 



document.getElementById("srchy").innerHTML = '<img src=loading.gif>';
 setTimeout("document.getElementById('srchy').innerHTML = '<div class=tab>Current Searches';",350);
         setTimeout("document.getElementById('srchbar<?echo$tewy;?>').style.display = 'none';",350);
     }




</script> 
<tr id=srchbar<?echo$tewy;?>><td width=33%><div class=button1>&nbsp;<a href=viewprofile.php?username=<?echo$searchname;?>><?echo$searchname;?></a></td><td width=33%><div class=button1>&nbsp;<?
if($timeleft < '0'){echo"00:00:00";}else{echo "$leading";echo "$totalh"; echo date( ":i:s", $searchtime - $tym);}?></font></td><td width=33%><div class=button1>&nbsp;<?echo$status;?></td><td width=1% align=center><div class=button1><a href=# onclick="delsearch<?echo$tewy;?>(); return false;"><b>x</b></a></font></td></tr><?}?>
</table><br>
<center><form action = "" method = "post"><input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></form></center>
<?}?>
<br>
</td>

<td class=menuright><img style="display: block" src="blank.gif" after alt="" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width:  100%">
<tbody><tr>
<td class=menubottomleft><img style="display:  block" src="blank.gif" after alt="" width="8" height="9"></td>
<td class=menubottommain><img style="display:  block" src="blank.gif" after alt=""></td>
<td class=menubottomright><img style="display:  block" src="blank.gif" after alt="" width="8" height="9"></td>
</tr></tbody></table></div>



</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>