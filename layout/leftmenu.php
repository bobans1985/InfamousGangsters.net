<?php
error_reporting(0);

if($bar == '/leftmenu.php'){die();}
$gimtime = time();
$datetime = date('Y-m-d H:i:s');

$usernameone = $usernameone;
$user = $statustesttwo['username'];
$ida = $statustesttwo['ID'];
$rankid = $statustesttwo['rankid'];
$thelocation = $statustesttwo['location'];
$crewid = $statustesttwo['crewid'];
$hdo = $statustesttwo['hdo'];
$rr = $statustesttwo['rr'];
$silencer = $statustesttwo['silencer'];
$mails = $statustesttwo['mail'];
$mitopics = $statustesttwo['topics'];
$thdotestnumrowssss = $statustesttwo['thdo'];
$mission = $statustesttwo['mission'];
$latestip = $statustesttwo['latestip'];
$latestip = $statustesttwo['latestip'];
$cash = number_format($statustesttwo['money']);
$points = number_format($statustesttwo['points']);
$url = $statustesttwo['page'];
$bignotif = $statustesttwo['bignotif'];

$protectedfd = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username = '$usernameone'"));
if($protectedfd > 0){
$propowned = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone'"));
$buymoney = mysql_num_rows(mysql_query("SELECT * FROM buymoney WHERE username = '$usernameone'"));
$buycasinos = mysql_num_rows(mysql_query("SELECT * FROM buycasinos WHERE username = '$usernameone'"));
$buypoints = mysql_num_rows(mysql_query("SELECT * FROM buypoints WHERE username = '$usernameone'"));

$crewowned = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss = '$usernameone'"));
$histlistowned = mysql_num_rows(mysql_query("SELECT * FROM hitlist WHERE killer = '$usernameone'"));
$killowned = mysql_num_rows(mysql_query("SELECT * FROM kill WHERE username = '$usernameone'"));
if($propowned > 0 || $crewowned > 0 || $histlistowned > 0 || $killowned > 0 || $buycasinos > 0 || $buymoney > 0 || $buypoints > 0){ mysql_query("UPDATE users SET notification = 'Your protection has been removed!', notify = (notify + 1) WHERE username = '$usernameone'"); mysql_query("DELETE FROM protection WHERE username = '$usernameone'"); }
}

$ahdoban = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone' AND ban = '1'"));
$ahdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone' AND type = 'senior'"));
$newswriter = mysql_num_rows(mysql_query("SELECT * FROM news WHERE username='$usernameone'"));

$seniortestsql = mysql_query("SELECT * FROM senior WHERE username = '$usernameone'");
$senior = mysql_num_rows($seniortestsql);
 if(($hdo > '0') || ($rankid >= '25')){

$gutnewhd = mysql_query("SELECT * FROM hdonew");
$gutnewshd = mysql_fetch_array($gutnewhd);
$tishere = $gutnewshd['number'];}

$fueleffec = $statustesttwo['fueleffec'];
$timea = time();

$timeleftto = $fueleffec - $timea;

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);

$counnewsqlq = mysql_query("SELECT * FROM forumtopics WHERE creator = '$user'");
$counneweoqa = mysql_num_rows($counnewsqlq);

if($crewid != '0'){
$crewbosssql = mysql_query("SELECT boss FROM crews WHERE boss = '$user' AND id = '$crewid'");
$crewboss = mysql_num_rows($crewbosssql);
$crewunderboss1 = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$user' AND management = '1'"));
$crewunderboss2 = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$user' AND profile = '1'"));
$crewunderboss3 = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$user' AND cc = '1'"));
}else{$crewboss = 0; $crewunderboss = 0;}

mysql_query("INSERT INTO `pagevisits` (`username`, `ip`, `page`, `cash`, `points` ) VALUES ( '$usernameone', '$latestip', '$url', '$cash', '$points')");	

$openclose = mysql_query("SELECT * FROM gametimes WHERE game = 'betting'");
$isit = mysql_fetch_array($openclose);
$isitopen = $isit['time'];

$openclosee = mysql_query("SELECT * FROM gametimes WHERE game = 'weekly'");
$isitt = mysql_fetch_array($openclosee);
$isitopenn = $isitt['time'];

$openclosee = mysql_query("SELECT * FROM gametimes WHERE game = 'eforumx'");
$isitt = mysql_fetch_array($openclosee);
$isitopennn = $isitt['time'];

$ranksql = mysql_query("SELECT * FROM rankreset WHERE username = '$usernameone'");
$rankarray = mysql_fetch_array($ranksql);
$timess = $rankarray['times'];
?><?php
if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) 
		$browser = 'ie';
elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) 
		$browser = 'firefox';
		
		elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE) 
			$browser = 'Google Chrome';
			
			else 
				$browser = 'BROWSER NO DETECTED';
?><head><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?
function maketime($until){
$difference = $until - time(); $days = floor($difference/86400);
$difference = $difference - ($days*86400); $hours = floor($difference/3600);
$difference = $difference - ($hours*3600); $minutes = floor($difference/60);
$difference = $difference - ($minutes*60); $seconds = $difference;
$output = " ".sprintf( "%02u", $hours ).":".sprintf( "%02u", $minutes ).":".sprintf( "%02u", $seconds )." "; return $output; }

function pstime($until){
$difference = $until - time(); $days = floor($difference/86400);
$difference = $difference - ($days*86400); $hours = floor($difference/3600);
$difference = $difference - ($hours*3600); $minutes = floor($difference/60);
$difference = $difference - ($minutes*60); $seconds = $difference;
$output = " ".sprintf( "%02u", $minutes ).":".sprintf( "%02u", $seconds )." "; return $output; }
?>

<title>:: Tough Dons</title>
</head>
<script language="javascript"> 
function domod() { var ele = document.getElementById("togglemod"); var text = document.getElementById("displaymod");
if(ele.style.display == "block") { ele.style.display = "none"; text.innerHTML = "<b>Open Tools</b>"; }else{
ele.style.display = "block"; text.innerHTML = "<b>Close Tools</b>"; }} 
</script>
<? 
$ifent = mysql_num_rows(mysql_query("SELECT * FROM entertainers WHERE username = '$usernameone'"));
$ifhdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone'"));
$ifprotected = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username = '$usernameone'"));
$citycrime = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE city = '$thelocation'"));
$newws = mysql_num_rows(mysql_query("SELECT * FROM witnessstatements WHERE username = '$usernameone' AND new != '0'"));
$newticket = mysql_num_rows(mysql_query("SELECT * FROM gametimes WHERE game = 'helpdesk' AND time >= '1'"));
if($mission == 0 AND $thelocation == Miami){ $jailnum = mysql_num_rows(mysql_query("SELECT * FROM jail")); }else{ $jailnum = mysql_num_rows(mysql_query("SELECT * FROM jail WHERE username != 'George'")); }
$landmarker = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND location = '$thelocation' AND casino = 'Landmark'"));
$lmown = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = 'None' AND location = '$thelocation' AND casino = 'Landmark'")); 
$checkverify = mysql_num_rows(mysql_query("SELECT ID,verify FROM users WHERE ID = '$ida' AND verify = 'verified'"));
?>


<style>
.commitbox{background-color: #414141; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404; color: white; font-family: verdana; font-size: 12px;}
.dotd{border:1px solid black;}
</style>

<script>
function lnoted(){
urnamed=<?echo$ida;?>;
	var ajaxRequest;  
	try{ajaxRequest = new XMLHttpRequest();} catch (e){
        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
	try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){

alert("Your browser broke1!");return false;}}}
	
var strhehefd = "&rand="+Math.random();
	ajaxRequest.open("GET", "oknotificationl.php?id=" + urnamed + strhehefd, true);
        ajaxRequest.send(null); 

document.getElementById("tdbar").innerHTML = '<center><img src=load2.gif></center>';


         setTimeout("document.getElementById('lnotbar').style.display = 'none';",1000);
     }
</script>

<? 
if($_GET['username']){$urlmore = "&username=$getname";}
if($_GET['topicid']){$urlmoremore = "&topicid=$topicid";}
if($_GET['id']){$urlmoremoremore = "&id=$getid";}
if($_GET['replyid']){$urlmoremoremoremore = "&replyid=$getreply";}
$bar =  $_SERVER['PHP_SELF'];
$ifhdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone'"));
$showbignotif = mysql_num_rows(mysql_query("SELECT * FROM gametimes WHERE game = 'notif' AND time = '1'"));
if($showbignotif == '1' AND $bignotif == '1'){
$getthenotiff = mysql_query("SELECT * FROM gametimes WHERE game = 'notif'");
$getthenotif = mysql_fetch_array($getthenotiff);
$notifmessage = $getthenotif['message'];
?>
<table align="center" cellpadding="0" width=100% cellspacing="0" id=lnotbar>
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Game Notification <? echo"<a href=$bar?not=1$urlmore$urlmoremore$urlmoremoremoreurlmoremoremoremore onclick='lnoted();return false;'>(<font color=khaki>x</font>)</a>"; ?></b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png" width=100%>
<table width=100% cellpadding="0" cellspacing="1" align="center">
<tr><td height="20"></tr>
<tr><td align=center><font color="white" size="1" face="verdana"><?echo nl2br($notifmessage);?></font></td></tr>
<tr><td height="20"></td></tr>
</tbody></table></td>
<td class=menuright><img style="display: block" alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div><? } ?>

<table width="100%" align="center" cellpadding="0" cellspacing="0" height="335">
<tbody><tr><td width="250" height="0"></td>
<td width="100%"></td>
<td width="250"></td></tr>
<tr><td valign="top" width="250">
<table align="center" cellpadding="0" width=216 cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Main Menu</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td bgcolor="#333333" width=200>
<div align="center">
<table width="97%" align="center" cellpadding="3" cellspacing="0"><tr><td>
<?php if(($ifhdo > '0') || ($rankid >= '25')){?>
<div class=tab>Staff Tools</div>
<table width=100% class=section><tr><td>
<div class=button>
<a id="displaymod" href="javascript:domod();"><b>Open Tools</b></a>
<div id="togglemod" style="display: none">
<?php if(($ifhdo > '0') || ($rankid >= '25')){ echo('<a href="permission.php">Give/Remove Permission</a>'); }?>

<?php if(($ifhdo > '0') || ($rankid >= '25')){ echo('<a href="mute.php">Mute User</a>'); }?>
<?php if(($ifhdo > '0') || ($rankid >= '25')){ echo('<a href="wordfilter.php">Website Filter</a>'); }?>
<?php if(($ahdoban > '0') || ($rankid >= '25')){ echo('<a href="ipban.php"><font color=red><b>Ban Advertiser</b></font></a>'); }?>

<?if($rankid >= '25'){ echo('
<a href="ipcheck.php">Dupe Check</a>
<a href="signups.php">Recent Signups</a>
<a href="modkill.php">Modkill</a> 
<a href="penaltypoints.php">Penalty Points</a>
<a href="mostrecentmail.php">View Recent Mail</a>
<a href="viewallmail.php">View Inbox</a>
<a href="sentmail.php">View Sent Mail</a>
<a href="promoteent.php">Promote Entertainer</a>
');}
?>
<?if($rankid >= '100'){ echo('
<a href="richlist.php">Rich List</a>
<a href="managecash.php">Manage Users Cash</a>
<a href="messageallusers.php">Message All</a>
<a href="messageallonline.php">Message Online</a>
<a href="dosuper.php">Get Super Car</a>
<a href="paypal.php">Paypal Donations</a>
<a href="updatesms.php">Change Donation times</a>
<a href="gamenotif.php">Game Notification</a>
');}
?>
</div>
</td></tr></table>
<? } ?>

<div class=tab>Information</div>
<table width=100% class=section><tr><td>
<div class=button>
<a href="home.php"><font color=khaki>Game Network</a>
<a href="faq.php">FAQ</a>
<a href="ipsharing.php">IP Sharing</a>
<a href="news.php">Game News</a>
<a href="refferal.php">Referral System</a>
<a href="gamestatistics.php">Game Statistics</a>
<a href="usersonline.php">Users Online</a>
<a href="profile.php">Edit Profile</a>
<?if($checkverify < 1){?><a href="verify.php">Verify Account</a><?}?>
<?php if($rankid == 22 AND $timess < 5){ echo('<a href="rankreset.php"><font color=white><b>Rank Reset</b></font></a>'); } ?>
<?php if($ifprotected >= 1){ echo('<a href="protection.php">User Protection</a>'); } ?>
<a href="helpdesk.php"><font color=yellow><b>Get Help</b><?if($ifhdo > 0 || $rankid >= 25){ if($newticket >= 1){ echo" <font color=red><b>new ticket(s)</b></font>";}}?></a>
<a href="donate.php">Phone / Paypal <?php if($smstimes != 1){ ?><span id=right><font color=khaki><b>X<?php echo $smstimes ?></b></font>&nbsp;</span><?php } ?></a>
<a href="gamerecords.php">Game Records</a>
<a href="cities.php">City Owners</a>
<a href="findplayer.php">Find User</a>
</div>
</td></tr></table>

<div class=tab>Messaging</div>
<table width=100% class=section><tr><td>
<div class=button>
<a href="send.php">Send Message</a>
<?if($mails >= '1'){$extratwo = "<font color=white size=1 face=verdana> (</font><font color=khaki size=1 face=verdana><b>$mails</b></font><font color=white size=1 face=verdana>)</font></a>";}?>
<span id=inboxspan><a href="inbox.php">Inbox <?echo$extratwo;?></a></span>
<a href="forum.php">Game Forums</a>
<?if(($isitopennn == 1||$rankid >= 25||$ifent>0)){?><a href="eforum.php"><?if($isitopennn == 1){echo"<font color=yellow><b>Entertainment Forum</font> <span id=right>OPEN</span> "; }?> <?if($isitopennn == 0){echo"Entertainment Forum"; }?></a><?}?>
</div>
</td></tr></table>

<div class=tab>Ranking</div>
<table width=100% class=section><tr><td>
<div class=button>
<a href="crimes.php">Crimes</a>
<a href="steal.php">Steal Cars</a>
<a href="jail.php">Jail <?if($jailnum >= 1){ echo" <font color=white>(<b>$jailnum</b>)</font>";}?></a>
<a href="citycrime.php">City Crime <?if($citycrime >= 1){ echo" <font color=white>(<b>$citycrime</b>)</font>";}?></a>
<a href="missiontasks.php">Mission Tasks</a>
</div>
</td></tr></table>

<style> 
#left { float: left; }
#right { float: right; }
</style>
<div class=tab>Money / Points</div>
<table width=100% class=section><tr><td>
<div class=button>
<a href="quicktrade.php">Quick Trade</a>
<a href="weeklychal.php">Weekly Challenge<?if($isitopenn == 1){echo"<span id=right>OPEN&nbsp;</span>"; }?></a>
<?if(($isitopen == 1||$rankid >= 25)){?><a href="betting.php"><?if($isitopen == 1){echo"Betting Shop <span id=right>OPEN</span> "; }?> <?if($isitopen == 0){echo"Betting Shop"; }?></a><?}?>
<a href="bank.php">Bank Account</a>
<a href="points.php">Points</a>
<a href="lotto.php">Lottery</a>
<a href="propertyinvestment.php">Property Investment</a>
<?if($rankid >= 100 || $landmarker > 0 || $lmown > 0){?><a href="landmarks.php"><b>Landmark</b></a><?}?>
<a href="blackjack.php">Blackjack</a>
<a href="racing.php">Greyhound Racing</a>
<a href="roulette.php">Roulette</a>
<a href="dicegame.php">Dice Game</a>
<a href="multidice.php">Multi Dice</a>
<a href="multiblackjack.php">Multi Blackjack</a>
<a href="buy.php">Buy</a>
<a href="bycar.php">Travel</a>
<a href="retrieval.php">Dead > Alive</a>
</div>
</td></tr></table>

<div class=tab>Offence</div>
<table width=100% class=section><tr><td>
<div class=button>
<a href="melt.php">Melt Cars</a>
<a href="bulletfactory.php">Bullet Factory</a>
<a href="hitlist.php">Hitlist</a>
<a href="kill.php">Kill User <?if($newws >= 1){ echo" <font color=white>(<b>$newws</b>)</font>";}?></a>
<a href="hospital.php">Hospital</a>
</div>
</td></tr></table>

<div class=tab>Crews</div>
<table width=100% class=section><tr><td>
<div class=button>
<a href="crews.php">Crews</a>
<? if($crewid != '0'){ echo('
<a href="crewdrugs.php">Crew Drugs</a>
<a href="crewperks.php">Crew Perks</a>
<a href="crewbullets.php">Crew Bullets</a>
<a href="crewbank.php">Crew Bank</a>
<a href="crewusersonline.php">Crew Users Online</a>');
if(($crewboss != '0')||($rr != '0')){echo('<a href="applications.php">Applications</a>');}
if($crewunderboss2 != '0'){echo('<a href="editcrewprofile.php">Crew Profile</a>');}
if($crewunderboss3 != '0'){echo('<a href="crewcc.php">Crew City Crime</a>');}
if($crewunderboss1 != '0'){echo('<a href="crewmanagement.php">Crew Management</a>');}}
if($crewboss != '0'){echo('<a href="editcrewprofile.php">Crew Profile</a>
<a href="crewcc.php">Crew City Crime</a>
<a href="wmessage.php">Welcome Message</a>
<a href="crewmanagement.php">Crew Management</a>');}?>
</div>
</td></tr></table>

</td></tr></table>
</div>
</td>
<td class=menuright><img style="display: block" alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>
</td><head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head>

