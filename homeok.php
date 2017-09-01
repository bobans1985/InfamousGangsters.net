<? include 'includeme.php'; 
$findraw = $_GET['id'];
$allowed = "/[^0-9]/i";
$find = preg_replace($allowed,"",$findraw);
$chek = mysql_num_rows(mysql_query("SELECT * FROM home WHERE id = '$find'"));
$cheks = mysql_num_rows(mysql_query("SELECT * FROM homeok WHERE likeid = '$ida' AND commentid = '$find'"));
if(!$find){die(' ');}
if($chek < '1'){die(' ');}
if($cheks > '0'){die(' ');}
mysql_query("UPDATE `home` SET `like` = `like` + '1' WHERE `id` = '$find'");

mysql_query("INSERT INTO homeok(likeid,commentid,name)
VALUES ('$ida','$find','$usernameone')");
$getem = mysql_num_rows(mysql_query("SELECT * FROM homeok WHERE commentid = '$find'"));echo"+$getem";
?>