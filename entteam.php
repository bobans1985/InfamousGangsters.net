<?
mysql_query("DELETE FROM forumposts WHERE topicid = '8021'");

$theents = mysql_query("SELECT * FROM entertainers ORDER BY time");
while($ents = mysql_fetch_array($theents)){
$entname = $ents['username'];
$promotedby = $ents['promotedby'];
$promotedtime = $ents['time'];

$getstatuss = mysql_query("SELECT status FROM users WHERE username = '$entname'");
$getstatus = mysql_fetch_array($getstatuss);
$entstatus = $getstatus['status'];

$postinfo = "[b]Username:[/b] $entname [b]Status:[/b] $entstatus [b]Promoted by[/b]: $promotedby [b]When[/b]: $promotedtime";
mysql_query("INSERT INTO forumposts(topicid,type,post,rankid,esc)
VALUES ('8021','hdof','$postinfo','$playerrank','1')");
}
?>