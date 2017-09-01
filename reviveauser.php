<?
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$nameraw = $_POST['demote'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$name = preg_replace($saturate,"",$nameraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
$gangsterusername = $gangsterusernamearray['username'];

$playersql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$playerarray = mysql_fetch_array($playersql);
$playerrank = $playerarray['rankid'];

if($playerrank < '25'){die(' ');}

if(isset($_POST['demote'])){ 
$query = mysql_query("SELECT * FROM users WHERE username = '$name'");
$rows = mysql_num_rows($query);
$array = mysql_fetch_array($query);
$status = $array['status'];


if($rows < '1'){$showoutcome++; $outcome = "<font color=white face=verdana size=1>No such user!</font>";}
elseif(($status != 'Dead' && $status != 'Modkilled')){$showoutcome++; $outcome = "<font color=white face=verdana size=1>User is not dead!</font>";}
else{
$postinfo = "[b]Revived:[/b] $name";
mysql_query("UPDATE users SET status = 'Alive' WHERE username = '$name'");
mysql_query("UPDATE users SET deathmessage = ' ' WHERE username = '$name'");
mysql_query("INSERT INTO forumposts(username,topicid,type,post,rankid,esc)
VALUES ('$gangsterusername','8025','hdof','$postinfo','$playerrank','1')");
$showoutcome++; $outcome = "<font color=white face=verdana size=1>User <b>$name</b> has been revived!</font>";}}

?> 
