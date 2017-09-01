<? include 'includeme.php';

if(isset($_POST['topic']) && isset($_POST['viewlikes'])){
    $postid=$_POST['topic'];
    $showlikes = mysql_query("SELECT * FROM likes WHERE commentid = '$postid'");
    $texto="<div style=\"padding: 12px; padding-left: 14px;\">";
while($showlikesarray = mysql_fetch_array($showlikes)) {
    $likename = $showlikesarray['name'];
    $texto.="<a href=\"viewprofile.php?username=$likename\" style=\"margin-top: 5px; font-size: 10px;\">$likename</a><br>";
}
$texto.="</div>";
    echo $texto;
}

$findraw = $_GET['id'];
$findtraw = $_GET['topic'];
$allowed = "/[^a-z0-9]/i";
$find = preg_replace($allowed,"",$findraw);
$findi = preg_replace($allowed,"",$findtraw);
$chek = mysql_num_rows(mysql_query("SELECT * FROM forumposts WHERE id = '$find'"));
$cheks = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE likeid = '$ida' AND commentid = '$find'"));
$chekss = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE likeid = '$ida' AND topic = '$findi'"));
$cheksss = mysql_num_rows(mysql_query("SELECT * FROM forumposts WHERE id = '$find' AND username = '$usernameone'"));
if(!$find){die('');}
if($chek < '1'){die('');}
if($cheks > '0'){die('');}
if($chekss > '8'){die('');}
if($cheksss > '0'){die('');}
mysql_query("INSERT INTO likes(likeid,commentid,topic,name)
VALUES ('$ida','$find','$findi','$usernameone')");
$getem = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE commentid = '$find'"));
echo "+ $getem";


?> 