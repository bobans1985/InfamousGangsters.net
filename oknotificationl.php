<html><head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head><body onload=titi();>
<?
include 'includes.php'; 

$findraw = $_GET['id'];
$allowed = "/[^0-9]/i";
$find = preg_replace($allowed,"",$findraw);
if(!$find){die(' ');}

mysql_query("UPDATE users SET bignotif = '0' WHERE id = '$find'");



?>
</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head></html>