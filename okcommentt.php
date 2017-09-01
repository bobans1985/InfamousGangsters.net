<? include 'includeme.php'; 
$findraw = $_GET['id'];
$findtraw = $_GET['topic'];
$allowed = "/[^0-9]/i";
$find = preg_replace($allowed,"",$findraw);
$findi = preg_replace($allowed,"",$findtraw);
$chek = mysql_num_rows(mysql_query("SELECT * FROM forumposts WHERE id = '$find'"));
$cheks = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE likeid = '$ida' AND commentid = '$find'"));
$chekss = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE likeid = '$ida' AND topic = '$findi'"));
if(!$find){die(' ');}
if($chek < '1'){die(' ');}
if($cheks > '0'){die(' ');}
if($chekss > '8'){die('Error');}
mysql_query("UPDATE forumposts SET likes = (likes + 1) WHERE id = '$find'");
mysql_query("INSERT INTO likes(likeid,commentid,topic,name)
VALUES ('$ida','$find','$findi','$usernameone')");
$getem = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE commentid = '$find'"));echo"+$getem";
?>