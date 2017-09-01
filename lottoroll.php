<? $lotto="SELECT * from lotto_main";
$lottoresult=mysql_query($lotto);
while($lottorows=mysql_fetch_array($lottoresult)){ 
$draw = $lottorows['draw'];
$rollover = $lottorows['rollover'];
$pot = $lottorows['pot']; }  
$pot = $pot;
$lottotimeleft = $draw - time() ;
$newdraw = time()+(24*3600);
$morethanoneticketpls=mysql_num_rows(mysql_query("SELECT * FROM lotto"));

if($lottotimeleft <= 0){
$thewinningtickets = array("1","2","3","4","5","6","7","8","9","10","11","12","12","14","15","16","17","18","19","20","21","22","23","24","25"); shuffle($thewinningtickets);
$winningticketone = $thewinningtickets[0]; $winningtickettwo = $thewinningtickets[1]; $winningticketthree = $thewinningtickets[2]; $winningticketfour = $thewinningtickets[3];

function lottonumbers($winningticketone,$winningtickettwo,$winningticketthree,$winningticketfour) {
$array1 = array("$winningticketone","$winningtickettwo","$winningticketthree","$winningticketfour"); sort($array1,SORT_NUMERIC);
$no = $array1[0]; $nt = $array1[1]; $nth = $array1[2]; $nf = $array1[3]; 
$nlast = "".$no."-".$nt."-".$nth."-".$nf.""; return $nlast; }

$list1 = lottonumbers($winningticketone,$winningtickettwo,$winningticketthree,$winningticketfour);
$listk1 = explode("-",$list1);
$onee = $listk1[0];
$twoo = $listk1[1];
$threee = $listk1[2];
$fourr = $listk1[3];

if($userlevel>=9999999999){ $onee=1; $twoo=2; $threee=3; $fourr=4; }

if($rollover>='50' AND $morethanoneticketpls>='1'){ $a = mysql_query("SELECT * FROM `lotto` ORDER BY RAND() LIMIT 1");
$b = mysql_fetch_array($a); $onee = $b['one']; $twoo = $b['two']; $threee = $b['three']; $fourr = $b['four']; }

mysql_query("UPDATE `lotto_main` SET `draw`='$newdraw'");
mysql_query("UPDATE `lotto_main` SET `one`='$onee', `two`='$twoo', `three`='$threee', `four`='$fourr'");

$getlottowinner = mysql_query("SELECT username FROM lotto WHERE one='$onee' AND two='$twoo' AND three='$threee' AND four='$fourr' ORDER BY id");
$hmw = mysql_num_rows($getlottowinner);
while($getwinner = mysql_fetch_array($getlottowinner)){
$winname = $getwinner['username'];

if($hmw >= 1){ 
$winamount = round($pot / $hmw); 
$winamount1 = number_format($winamount); }else{ 
$winamount = $pot; 
$winamount1 = number_format($winamount); }

if($hmw == '1'){
mysql_query("UPDATE users SET swiss = (swiss + '$winamount'), notify = (notify + 1), mail = (mail + 1), notification = 'You won the lottery off $$winamount1' WHERE username='$winname'");
mysql_query("UPDATE users SET mail = (mail + 1) WHERE username='Mitch'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$winname','Lottery System','1','$userip','You won the lottery! $$winamount1 has been added to your swissbank.')");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('Mitch','Lottery System','1','$userip','$winname won $$winamount1')");
mysql_query("UPDATE `lotto_main` SET `lastwinamount`='$winamount',`pot`='150000000',`rollover`='0',`lastwin`='1'");
mysql_query("DELETE FROM `lotto`"); }

if($hmw >= '2'){
mysql_query("UPDATE users SET swiss = (swiss + '$winamount'), notify = (notify + 1), mail = (mail + 1), notification = '$hmw users including you won the lottery, a share off $$winamount1' WHERE username='$winname'");
mysql_query("UPDATE users SET mail = (mail + 1) WHERE username='Mitch'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$winname','Lottery System','1','$userip','$hmw users including you won the lottery! Your share of $$winamount1 has been added to your swissbank.')");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('Mitch','Lottery System','1','$userip','$winname won $$winamount1')");
mysql_query("UPDATE `lotto_main` SET `lastwinamount`='$winamount',`pot`='150000000',`rollover`='0',`lastwin`='$hmw'");
mysql_query("DELETE FROM `lotto`"); }}

if($hmw == '0'){
mysql_query("UPDATE `lotto_main` SET `pot`=`pot`+'5000000',`rollover`=rollover+'1',`lastwin`='No Winners',`lastwinamount`='$pot'");
mysql_query("DELETE FROM `lotto`"); }} ?>