<?
$thehdos = mysql_query("SELECT * FROM hdos ORDER BY time");
while($hdos = mysql_fetch_array($thehdos)){
$hdoname = $hdos['username'];
$promotedby = $hdos['promotedby'];
$promotedtime = $hdos['time'];

$getstatuss = mysql_query("SELECT status FROM users WHERE username = '$hdoname'");
$getstatus = mysql_fetch_array($getstatuss);
$hdostatus = $getstatus['status'];

$postinfo = "[b]Username[/b]: $hdoname [b]Status[/b]: $hdostatus [b]Type[/b]: Help Desk Operator [b]Promoted by[/b]: $promotedby [b]When[/b]: $promotedtime";
mysql_query("INSERT INTO forumposts(topicid,type,post,rankid,esc)
VALUES ('8023','hdof','$postinfo','$playerrank','1')");
}
?>