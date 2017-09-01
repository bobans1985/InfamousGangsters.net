<html><head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head><body onload=titi();>
<?
include 'included2.php'; 

$findraw = $_GET['id'];
$allowed = "/[^0-9]/i";
$find = preg_replace($allowed,"",$findraw);
if(!$find){die(' ');}

if(isset($_GET['id'])) {

mysql_query("UPDATE messages SET d = '1' WHERE id = '$find'");}




?>
</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head></html>