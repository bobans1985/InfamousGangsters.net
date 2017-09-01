<? include 'includeme.php'; 
$findraw = $_GET['id'];
$allowed = "/[^0-9]/i";
$find = preg_replace($allowed,"",$findraw);
$chek = mysql_num_rows(mysql_query("SELECT * FROM forumposts WHERE id = '$find'"));
$cheks = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE likeid = '$ida' AND commentid = '$find'"));
$getem = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE commentid = '$find'"));
if(!$find){die(' ');}
if($chek < '1'){die(' ');}
if($cheks < '1'){if($getem > '0'){echo"+$getem";}}else{
 
mysql_query("UPDATE forumposts SET likes = (likes - 1) WHERE id = '$find'");
mysql_query("DELETE FROM likes WHERE likeid = '$ida' AND commentid = '$find'");
$getem = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE commentid = '$find'"));if($getem > '0'){echo"+$getem";}}
?>