<?php

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$nameraw = $_POST['name'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$name = preg_replace($saturate,"",$nameraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
 
$playerarray = $statustesttwo;
$playerrank = $playerarray['rankid'];

$reasonraw = $_POST['reason'];
$reason = htmlentities($reasonraw, ENT_QUOTES);
$dmsg = $reason;

if($playerrank < '25'){die(' ');}
$to = 'Blank';

$bansql = mysql_query("SELECT * FROM users WHERE username = '$name'");
$banrows = mysql_num_rows($bansql);
$banarray = mysql_fetch_array($bansql);
$banip = $banarray['latestip'];
$ban = $banarray['username'];
$banrank = $banarray['rankid'];
$status = $banarray['status'];
$crewid = $banarray['crewid'];

if(!$reason){$reason = "No reason given.";}

if(isset($_POST['dobg'])){ 
if(!$name){}
elseif($banrows < '1'){$showoutcome++; $outcome = '<font color=white face=verdana size=1>No such user!</font>';}
elseif(($status ==  'Dead' || $status == 'Modkilled')){$showoutcome++; $outcome = '<font color=white face=verdana size=1>User is already dead!</font>';}
elseif(($banrank >= '25')&&($playerrank < 100)){$showoutcome++; $outcome = '<font color=white face=verdana size=1>Want to be demoted?</font>';}
else{
$postinfo = "[b]Modkilled bodyguard:[/b] $ban [b]Reason:[/b] $reason";
mysql_query("UPDATE users SET kills = kills + 1 WHERE username = '$gangsterusername'");
mysql_query("UPDATE users SET deathmessage = '$dmsg' WHERE username = '$ban'");
mysql_query("INSERT INTO modkill(victim,reason,killer,killerip,rankid)
VALUES ('$ban','$reason','$gangsterusername','$userip','$banrank')");
mysql_query("INSERT INTO attempts(username,victim,ip,type)
VALUES ('$gangsterusername','$ban','$userip','1')");
mysql_query("INSERT INTO forumposts(username,topicid,type,post,rankid,esc)
VALUES ('$gangsterusername','8025','hdof','$postinfo','$playerrank','1')");
$showoutcome++; $outcome = "<font color=white face=verdana size=1>You modkilled </font><a href=viewprofile.php?username=$ban><font color=white face=verdana size=1>$ban</a></font>";

$hitlist = mysql_query("SELECT * FROM hitlist WHERE username = '$ban'");
$hitlistrows = mysql_num_rows($hitlist);
if($hitlistrows > '0'){
while ($array = mysql_fetch_array($hitlist)){
$amount = $array['amount'];
$victimid = $array['id'];
mysql_query("DELETE FROM hitlist WHERE id = '$victimid'");
mysql_query("UPDATE users SET money = (money + $amount) WHERE username = '$gangsterusername'");}}

mysql_query("UPDATE users SET status = 'Modkilled' WHERE username = '$ban'");
mysql_query("DELETE FROM usersonline WHERE username = '$ban'");
mysql_query("DELETE FROM hospital WHERE username = '$ban'");
mysql_query("DELETE FROM robbery WHERE invite = '$ban'");
mysql_query("DELETE FROM blackjack WHERE username = '$ban'");
mysql_query("DELETE FROM jail WHERE username = '$ban'");
mysql_query("DELETE FROM travel WHERE username = '$ban'");
mysql_query("UPDATE cars SET price = '0' WHERE owner = '$ban'");

$bank = mysql_query("SELECT * FROM bank WHERE username = '$ban'");
$banks = mysql_num_rows($bank);
if($banks != '0'){
$banka = mysql_fetch_array($bank);
$amount = $banka['amount'];
mysql_query("UPDATE users SET money = (money + $amount) WHERE username = '$ban'");
mysql_query("DELETE FROM bank WHERE username = '$ban'");
}

$casinotest = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$ban'"));
if($casinotest == '1'){$showoutcome++; $outcome = "<br><br><font color=white face=verdana size=1>There casino has been dropped!</font>";mysql_query("UPDATE casinos SET owner = '$to' WHERE owner = '$ban'");mysql_query("UPDATE casinos SET nickname = '$to' WHERE nickname = '$ban'");}
elseif($casinotest > '1'){$showoutcome++; $outcome = "<br><br><font color=white face=verdana size=1>There casinos have been dropped!</font>";mysql_query("UPDATE casinos SET owner = '$gangsterusername' WHERE owner = '$ban'");mysql_query("UPDATE casinos SET nickname = '$gangsterusername' WHERE nickname = '$ban'");}else{}

mysql_query("UPDATE bodyguards SET username = ' ', status = '0' WHERE guarding = '$ban'");
mysql_query("UPDATE bodyguards SET username = ' ', status = '0' WHERE username = '$ban'");

if($crewid != '0'){
$boss = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss = '$ban'"));

if($boss > '0'){$members = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid = '$crewid' AND status = 'Alive'"));

if($members < 1){ mysql_query("DELETE FROM crews WHERE boss = '$ban'");
mysql_query("DELETE FROM forumtopics WHERE type = '$crewid'");
mysql_query("DELETE FROM forumposts WHERE type = '$crewid'");
mysql_query("DELETE FROM applicants WHERE crewid = '$crewid'");
mysql_query("DELETE FROM recruiters WHERE crewid = '$crewid'");
mysql_query("UPDATE users SET crewid = '0' WHERE crewid = '$crewid'");}

else{

$newbossa = mysql_query("SELECT * FROM users WHERE crewid = '$crewid' AND status = 'Alive' ORDER BY rankid DESC LIMIT 0,1");
$newboss = mysql_fetch_array($newbossa);
$newbossname = $newboss['username'];
mysql_query("UPDATE crews SET boss = '$newbossname' WHERE id = '$crewid'");}}}}}
?>
