<?
include 'includes.php';

$getinfoarray = $statustesttwo;

$findraw = $getinfoarray['ID'];
$allowed = "/[^0-9]/i";
$find = preg_replace($allowed,"",$findraw);
if(!$find){die(' ');}

mysql_query("UPDATE users SET notify = '0', notification = '' WHERE ID = '$find'");

?>
