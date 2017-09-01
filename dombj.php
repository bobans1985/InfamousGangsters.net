<?
include 'included2.php'; 

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$timeleftraw = $_GET['timeleft'];
$dogameidraw = $_GET['gameid'];
$timeleft = preg_replace($saturated,"",$timeleftraw);
$dogameid = preg_replace($saturated,"",$dogameidraw);

echo "$dogameidraw";
echo "$timeleft";

$getthetimeleft = mysql_query("SELECT * FROM blackjackmulti WHERE id = '$dogameidraw'");
$results = mysql_fetch_array($getthetimeleft);
$dotime = time();
$thenewtime = $results['time'];
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=crimes.php'>"; 
?>