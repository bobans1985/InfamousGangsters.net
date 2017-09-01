<html><head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" /></head>
<?
include 'included.php'; session_start();

$findraw = $_GET['id'];
$allowed = "/[^0-9]/i";
$find = preg_replace($allowed,"",$findraw);
if(!$find){die(' ');}

if(isset($_GET['id'])) {
$getowner = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$usernameone' AND id = '$find'"));
if($getowner < 1){ die(); }else{
mysql_query("DELETE FROM cars WHERE id = '$find' AND owner = '$usernameone'");
}}
?>
</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head></html>