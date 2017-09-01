<?
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$nameraw = $_POST['demote'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$name = preg_replace($saturate,"",$nameraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$playerarray = $statustesttwo;
$playerrank = $playerarray['rankid'];

if($playerrank < '25'){die(' ');}

if(isset($_POST['demote'])) { 
$query = mysql_query("SELECT * FROM users WHERE username = '$name'");
$rows = mysql_num_rows($query);
$array = mysql_fetch_array($query);
$status = $array['status'];
$equery = mysql_query("SELECT * FROM entertainers WHERE username = '$name'");
$erows = mysql_num_rows($equery);
if($rows < '1'){$showoutcome++; $outcome = "<font color=white face=verdana size=1>No such user!</font>";}
elseif($erows == '0'){$showoutcome++; $outcome = "<font color=white face=verdana size=1>User is not an entertainer!</font>";}
else{
mysql_query("DELETE FROM entertainers WHERE username = '$name'");
$showoutcome++; $outcome = "<font color=white face=verdana size=1>User <b>$name</b> is no longer a entertainer!</font>";
mysql_query("UPDATE users SET ent = '0' WHERE username = '$name'");}
    mysql_query("DELETE FROM home WHERE username = '$name' AND type = '3'");}
?> 
