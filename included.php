<?php
error_reporting(0);
include 'checkme.php';
$starttime = microtime();
$startarray = explode(" ", $starttime);
$starttime = $startarray[1] + $startarray[0];

$bar = $_SERVER['PHP_SELF'];
include 'connecter.php';

$time = time();

$autounmute = mysql_query("SELECT username,autounmute FROM muted WHERE autounmute > '0'");
while ($arrforautounmute = mysql_fetch_array($autounmute)) {
    $umutingtime = $arrforautounmute['autounmute'];
    $unmuteid = $arrforautounmute['username'];
    if ($time > $umutingtime) {
        mysql_query("DELETE FROM muted WHERE username = '$unmuteid'");
    }
}

$usarsone = rand(0, 750);

if ($usarsone <= '1') {
    $del = $time - 7500;
    mysql_query("DELETE FROM usersonline WHERE time < '$del'");
}
$deletetime2 = time() - 172800;
mysql_query("DELETE FROM protection WHERE time < '$deletetime2'");

$timer = time() - 4000;
$time = time();
$hospsql = "SELECT * FROM gametimes WHERE game = 'hospital' AND time < '$time'";
$hospsq = mysql_query($hospsql);
$hosprows = mysql_num_rows($hospsq);
if ($hosprows != 0) {
    $timerd = time() + 3600 * 12;
    $h1 = mt_rand(1, 5000000);
    $h2 = mt_rand(1, 5000000);
    $h3 = mt_rand(1, 5000000);
    $h4 = mt_rand(1, 5000000);
    $h5 = mt_rand(1, 5000000);
    mysql_query("UPDATE casinos SET maxbet = '$h1' WHERE casino = 'Hospital' AND location = 'Las Vegas'");
    mysql_query("UPDATE casinos SET maxbet = '$h2' WHERE casino = 'Hospital' AND location = 'Los Angeles'");
    mysql_query("UPDATE casinos SET maxbet = '$h3' WHERE casino = 'Hospital' AND location = 'New York'");
    mysql_query("UPDATE gametimes SET time = '$timerd' WHERE game = 'hospital'");
}

$time = time();
$travsql = "SELECT * FROM gametimes WHERE game = 'travel' AND time < '$time'";
$travsq = mysql_query($travsql);
$travrows = mysql_num_rows($travsq);
if ($travrows != 0) {
    $timerd = time() + 3600 * 12;
    $h1 = mt_rand(1, 10000000);
    $h2 = mt_rand(1, 10000000);
    $h3 = mt_rand(1, 10000000);
    $h4 = mt_rand(1, 10000000);
    $h5 = mt_rand(1, 10000000);
    mysql_query("UPDATE casinos SET maxbet = '$h1' WHERE casino = 'Airport' AND location = 'Las Vegas'");
    mysql_query("UPDATE casinos SET maxbet = '$h2' WHERE casino = 'Airport' AND location = 'Los Angeles'");
    mysql_query("UPDATE casinos SET maxbet = '$h3' WHERE casino = 'Airport' AND location = 'New York'");
    mysql_query("UPDATE gametimes SET time = '$timerd' WHERE game = 'travel'");
}

$jaila = "DELETE FROM jail WHERE time <= '$time'";
$jail = mysql_query($jaila);

$sessionidbefore = $_COOKIE['PHPSESSID'];
$userip = $_SERVER[REMOTE_ADDR];

$saturate = "/[^a-z0-9]/i";
$sessionid = preg_replace($saturate, "", $sessionidbefore);
$time = time();

$doit = mt_rand(0, 2000);

$timetime = time();
$newbuf = $timetime + 1800;

if ($doit < '9') {
    mysql_query("UPDATE bulletfactory SET time = '$newbuf' WHERE time < '$time'");
    if (mysql_affected_rows() == 1) {

        mysql_query("UPDATE bulletfactory SET time = '$newbuf'");
        mysql_query("UPDATE casinos SET bullets = (bullets + 100), bulletssell = (bulletssell + 100) WHERE casino = 'Bullets'");
        mysql_query("UPDATE emoney SET time = '$newbuf'");

        mysql_query("UPDATE users SET money = (money + 0) WHERE ent > '0' AND status = 'Alive'");

        $deletetime2 = time() - 172800;
        mysql_query("DELETE FROM protection WHERE time < '$deletetime2'");

        $quicktrade = mysql_query("SELECT username,id FROM buycasinos WHERE time < '$time'");
        while ($casinos = mysql_fetch_array($quicktrade)) {
            $naym = $casinos['username'];
            $casinoid = $casinos['id'];
            mysql_query("DELETE FROM buycasinos WHERE id = '$casinoid'");
            $sendinfo = "Your casino has been on quicktrade for more than 24 hours, it has now been removed from quicktrade!";
            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$naym','$naym','no','$userip','$sendinfo')");
        }

        $quicktrades = mysql_query("SELECT username,id,points FROM buypoints WHERE time < '$time'");
        while ($casinoss = mysql_fetch_array($quicktrades)) {
            $naym = $casinoss['username'];
            $pointid = $casinoss['id'];
            $amount = $casinoss['points'];
            mysql_query("DELETE FROM buypoints WHERE id = '$pointid'");
            if (mysql_affected_rows() == 1) {

                $sendinfo = "Your $amount points have been on quicktrade for more than 24 hours, they have now been removed from quicktrade!";
                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$naym','$naym','no','$userip','$sendinfo')");
                mysql_query("UPDATE users SET points = points + $amount WHERE username = '$naym'");
            }
        }

        $quicktradess = mysql_query("SELECT username,id,price FROM buymoney WHERE time < '$time'");
        while ($casinosss = mysql_fetch_array($quicktradess)) {
            $naym = $casinosss['username'];
            $pointid = $casinosss['id'];
            $amount = number_format($casinosss['price']);
            $amounta = $casinosss['price'];
            mysql_query("DELETE FROM buymoney WHERE id = '$pointid'");
            if (mysql_affected_rows() == 1) {
                $sendinfo = "Your $$amount has been on quicktrade for more than 24 hours, it has now been removed from quicktrade!";
                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$naym','$naym','no','$userip','$sendinfo')");
                mysql_query("UPDATE users SET money = money + $amounta WHERE username = '$naym'");
            }
        }
    }
}

$ja = mt_rand(0, 100);
if ($ja == '1') {
    mysql_query("DELETE FROM hospital WHERE hours <= '0'");
}

if ($doit == '56') {

    $hosp = mysql_query("SELECT username,time,hours FROM hospital");
    while ($hospital = mysql_fetch_array($hosp)) {
        $tem = time();
        $pus = $tem + 3600;
        $hname = $hospital['username'];
        $hospitaltime = $hospital['time'];
        $hours = $hospital['hours'];

        $roflcheckplz = mysql_fetch_array(mysql_query("SELECT id FROM suggestions WHERE username = '$hname'"));
        $roflcheckplzod = $roflcheckplz['id'];

        $healthcheck = mysql_fetch_array(mysql_query("SELECT health,ID FROM users WHERE ID = '$roflcheckplzod'"));
        $healthc = floor($healthcheck['health']);
        $healthid = $healthcheck['ID'];

        if ($healthc >= '100') {
            mysql_query("DELETE FROM hospital WHERE username = '$hname'");
        } elseif ($hospitaltime < $tem) {
            mysql_query("UPDATE hospital SET hours = hours - 1 WHERE username = '$hname'");

            if ($healthc >= 90) {
                mysql_query("UPDATE users SET health = '100' WHERE ID = '$healthid'");
                mysql_query("DELETE FROM hospital WHERE username = '$hname'");
            } else {
                mysql_query("UPDATE users SET health = (health + 10) WHERE ID = '$healthid'");
                mysql_query("UPDATE hospital SET time = '$pus' WHERE username = '$hname'");
            }
        }
    }
}

$sessionidtest = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$sessioncheck = mysql_num_rows($sessionidtest);

$getusername = mysql_fetch_array($sessionidtest);
$usernameone = $getusername['username'];

if ($usernameone == 'None') {
    die(' ');
}

$useronlineip = $getusername['ip'];
$usasid = $getusername['id'];

$statustestt = mysql_query("SELECT * FROM rankreset WHERE username = '$usernameone'");
$statustestttwo = mysql_fetch_array($statustestt);
$timesss = $statustestttwo['times'];

$statustest = mysql_query("SELECT * FROM users WHERE ID = '$usasid'");
$statustesttwo = mysql_fetch_array($statustest);

$deadalive = $statustesttwo['status'];
$locition = $statustesttwo['location'];
$mails = $statustesttwo['mail'];
$coon = $statustesttwo['coon'];
$ida = $statustesttwo['ID'];
$passy = $statustesttwo['password'];
$tips = $statustesttwo['tips'];
$stop = $statustesttwo['stop'];
$pointss = $statustesttwo['points'];
$pts = $statustesttwo['penpoints'];
$nwa = $statustesttwo['newee'];
$myrank = $statustesttwo['rankid'];
$ucrewid = $statustesttwo['crewid'];
$change = $statustesttwo['chnge'];
$usermd = md5($statustesttwo['username']);
$omfg = $statustesttwo['rankid'];
$ent = $statustesttwo['ent'];
$refid = $statustesttwo['refid'];
$checkstaff = $statustesttwo['checkstaff'];
$playeripp = $statustesttwo['latestip'];


//if (($myrank >= "25" AND $checkstaff < '1')) {
//    mysql_query("UPDATE users SET rankid = '1', status = 'Modkilled' WHERE username='$usernameone'");
//    mysql_query("DELETE FROM usersonline WHERE ip ='$playeripp' AND username='$usernameone'");
//}

if (($locition == "Staff Land" AND $myrank < '25')) {
    mysql_query("UPDATE users SET location='Las Vegas' WHERE username='$usernameone'");
}

$referreduser = mysql_num_rows(mysql_query("SELECT * FROM referral WHERE referred = '$usernameone' AND ranked = '0'"));
$refverified = mysql_num_rows(mysql_query("SELECT verify FROM users WHERE username = '$usernameone' AND verify = 'verified'"));
if ($referreduser > 0 AND $refverified > 0 AND $myrank >= 6) {
    mysql_query("UPDATE referral SET ranked = 1 WHERE referred = '$usernameone'");
    $getit = mysql_query("SELECT * FROM referral WHERE referred = '$usernameone'");
    $doit = mysql_fetch_array($getit);
    $gotuser = $doit['username'];
    mysql_query("UPDATE users SET refpoints = refpoints + 1 WHERE username = '$gotuser'");
    mysql_query("UPDATE missiontasks SET referrals = referrals + 1 WHERE username = '$gotuser'");
}

$tym = time();

if ($pts > '3') {
    die('<font color=black face=verdana size=1><b>Too many penalty points!</b></font>');
}

if (isset($_COOKIE['PHPSESSID'])) {

    if (!preg_match("/^[a-z0-9]{5,35}$/i", $_COOKIE["PHPSESSID"])) {
        mysql_query("DELETE FROM loggedin WHERE username = '$usernameone'");
        die('<META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php"><body bgcolor=white><font color=black face=verdana size=1><b>Session error, log in again!</b></font></body>');
    } elseif ($sessioncheck == 0) {
        mysql_query("DELETE FROM loggedin WHERE username = '$usernameone'");
        die('<META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php"><body bgcolor=white><font color=black face=verdana size=1><b>Session error, log in again!</b></font></body>');
    } elseif ($sessioncheck > 1) {
        mysql_query("DELETE FROM loggedin WHERE username = '$usernameone'");
        mysql_query("DELETE FROM usersonline WHERE session = '$sessionid' AND ip = '$userip' AND id != '$ida'");
    } elseif ($useronlineip != $userip) {
        mysql_query("DELETE FROM loggedin WHERE username = '$usernameone'");
        mysql_query("DELETE FROM usersonline WHERE session = '$sessionid'");
        die('<font color="black" face="verdana" size="1"><b>Another IP address has logged into your account. Your session has been destroyed.</b></font>');
    }
} elseif (!$_COOKIE['PHPSESSID']) {
    mysql_query("DELETE FROM loggedin WHERE username = '$usernameone'");
    die('<META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php"><body bgcolor=white><font color=black face=verdana size=1><b>Session error, log in again!</b></font></body>');
}

if ($_GET['not'] == '1') {
    echo "";
    mysql_query("UPDATE users SET notify = '0' WHERE ID = '$ida'");
    $hide = 1;
}

if ($_GET['notification'] == '1') {
    mysql_query("UPDATE users SET notify = '0' WHERE ID = '$ida'");
    $hide = 1;
}

$getperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$ucrewid'"));
if ($getperk > 0) {
    $perkk1 = mysql_query("SELECT * FROM crewperks WHERE crewid = '$ucrewid' ORDER BY perk");
    while ($p1 = mysql_fetch_array($perkk1)) {
        $perkk = $p1['perk'];
        $time = time();
        $timer = ceil($p1['timer']);
        $htime = $timer - $time;
        $totalh = $htime / 3600;
        $totalh = floor($totalh);
        if ($totalh < '10') {
            $leading = 0;
        }
    }
}

$crewunderbosscheck = mysql_query("SELECT * FROM crewsunderboss ORDER BY username");
while ($checkinfo = mysql_fetch_array($crewunderbosscheck)) {
    $crewunderbossusername = $checkinfo['username'];
    $crewunderbosscrew = $checkinfo['crew'];
    $runcrewunderbosscheck = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$crewunderbossusername' AND crewid = '$crewunderbosscrew'"));
    if ($runcrewunderbosscheck < 1) {
        mysql_query("DELETE FROM crewsunderboss WHERE username = '$crewunderbossusername'");
    }
}

$time = time();
$landmarkinfo = mysql_query("SELECT * FROM casinos WHERE casino = 'Landmark' AND maxbet < '$time'");
while ($lminfo = mysql_fetch_array($landmarkinfo)) {
    $lmlocation = $lminfo['location'];
    $howmanyusers = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = '$lmlocation'"));
    $currentearns = $howmanyusers / 100 * 1000000;
    $timerd = time() + 3600 * 12;
    mysql_query("UPDATE casinos SET maxbet = '$timerd', bulletssell = (bulletssell + $currentearns) WHERE casino = 'Landmark' AND location = '$lmlocation'");
}

$doallhospital = mysql_query("SELECT * FROM hospital");
while ($hospitalrows = mysql_fetch_array($doallhospital)) {
    $hospusername = $hospitalrows['username'];
    $hospamount = $hospitalrows['amount'];
    $hosphours = $hospitalrows['hours'];
    $hosptime = $hospitalrows['time'];
    $checktime = time() - $hosptime;
    $dodo = $hospamount * 3600;
    $hospactualtime = $hosptime + $dodo;
    if (time() - $hospactualtime >= 3600) {
        mysql_query("UPDATE users SET health = health + '10' WHERE username = '$hospusername'");
        mysql_query("UPDATE hospital SET amount = amount + '1' WHERE username = '$hospusername'");
        $healthcheck = mysql_fetch_array(mysql_query("SELECT health FROM users WHERE username = '$hospusername'"));
        $healthc = floor($healthcheck['health']);
        if ($healthc >= 91) {
            mysql_query("UPDATE users SET health = '100' WHERE username = '$hospusername'");
            mysql_query("DELETE FROM hospital WHERE username = '$hospusername'");
        }
    }
    if ($hospamount == $hosphours) {
        mysql_query("DELETE FROM hospital WHERE username = '$hospusername'");
    }
}

if ($usermd == $passy) {
    echo "<br><font color=khaki face=verdana size=1>&nbsp;&nbsp;Please change your password as it is to easy to guess! <a href=profiles.php#linkone><u>Click here</u></a></font><br>";
}

if (isset($_POST['newpasswordi'])) {
    $newpasse = $_POST['newpasswordi'] . "5432543___32432";
    $newpassr = $_POST['newpasswordconfirmi'] . "5432543___32432";
    $newpass = md5($newpasse);
    $confirm = md5($newpassr);

    if (strlen($_POST['newpasswordi']) > '50') {
        echo '<font color=white face=verdana size=1>Entered info is incorrect!</font>';
    } elseif (strlen($_POST['newpasswordconfirmi']) > '50') {
        echo '<font color=white face=verdana size=1>Entered info is incorrect!</font>';
    } elseif ($newpass != $confirm) {
        echo '<font color=white face=verdana size=1>Passwords did not match!</font>';
    } else {
        mysql_query("UPDATE users SET password = '$newpass' WHERE ID = '$ida'");
        mysql_query("DELETE FROM usersonline WHERE username = '$gangsterusername'");
        mysql_query("UPDATE users SET chnge = '0' WHERE username = '$usernameone'");
        mysql_query("DELETE FROM loggedin WHERE username = '$usernameone'");
        die('<font color=black face=verdana size=1><b>Password changed</b>, please re-login!</font><META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php">4');
    }
}

if ($change == 1) {
    die('<head><style>
.textbox{background-color: #414141; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404; color: white; font-family: verdana; font-size: 10px; }
</style><body background="/layout/bgtest.png"><br><font color=khaki face=verdana size=2><center><br><br><Br><br>&nbsp;&nbsp;Please change your password:</font><br><Br>
<form method=post>
<font color=white face=verdana size=1>&nbsp;New Password:</font><br>
&nbsp;<input type="textbox" class=textbox name=newpasswordi><br>
<font color=white face=verdana size=1>&nbsp;Confirm New Password:</font><br>
&nbsp;<input type=textbox class=textbox name=newpasswordconfirmi><br>
&nbsp;<input type =submit value="Update Password!" Password class=textbox>
</form></center></body></html>');
}

$rtdd = mt_rand(1, 4);

mysql_query("UPDATE users SET activity = '$time', page = '$bar' WHERE ID = '$ida' LIMIT 1");
if (1 == 2) {

    mysql_query("INSERT INTO paygz(user,page)
VALUES ('$usernameone','$bar')");
}
$raisemaxbet = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'casi' AND maxbet < '1'"));
$casinorows = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'casi'"));
$proprows = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'prop'"));
$randypandy = mt_rand(0, 5);

if (($ida == '1') || ($ida == '2')) {

    $countmoneysqlaaa = mysql_query("SELECT SUM(points) AS b FROM users WHERE rankid < '100'");
    $countmoneyarraysss = mysql_fetch_array($countmoneysqlaaa);
    $countmoneyrassssw = number_format($countmoneyarraysss['b']);
    $fgfdgf = $countmoneyarraysss['b'];

    $ffffff = mysql_query("SELECT SUM(points) AS b FROM buypoints");
    $oodhofd = mysql_fetch_array($ffffff);
    $ojjijij = $oodhofd['b'];

    $fgfdgf = $fgfdgf + $ojjijij;
    $countmoneyrassssw = number_format($fgfdgf);
}

$dicehour = date('G');
if ($dicehour == 19) {
    $getnumberr = mysql_query("SELECT * FROM gametimes WHERE game = 'dice'");
    $getnumber = mysql_fetch_array($getnumberr);
    $thepoint = $getnumber['time'];
    if ($thepoint == 0) {
        $timetwo = $time - 6000;
        $numberonline = mysql_num_rows(mysql_query("SELECT * FROM users WHERE activity >= '$timetwo'"));
        $theprize = (100000 * $numberonline);
        $theprizee = number_format($theprize);
        $getwinnerr = mysql_query("SELECT username FROM users WHERE activity >= '$timetwo' ORDER BY RAND() LIMIT 1");
        $getwinner = mysql_fetch_array($getwinnerr);
        $winnername = $getwinner['username'];
        mysql_query("UPDATE users SET money = money + '$theprize' WHERE username = '$winnername'");
        mysql_query("UPDATE gametimes SET time = 1 WHERE game = 'dice'");
        $domessagee = mysql_query("SELECT username FROM users WHERE activity >= '$timetwo'");
        while ($domessage = mysql_fetch_array($domessagee)) {
            $usersname = $domessage['username'];
            $sendinfo = "\[center\]The daily dice was rolled, $winnername won \[color=yellow\]$\[b\]$theprizee\[\/b\]\[\/color\].\[\/center\]";
            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$usersname','$usersname','1','$userip','$sendinfo')");
            mysql_query("UPDATE users SET mail = (mail + 1) WHERE username = '$usersname'");
        }
    }
}

if ($dicehour > 19) {
    mysql_query("UPDATE gametimes SET time = 0 WHERE game = 'dice'");
}
if ($dicehour < 19) {
    mysql_query("UPDATE gametimes SET time = 0 WHERE game = 'dice'");
}

$possiblydo1 = mysql_num_rows(mysql_query("SELECT username,rankid FROM users WHERE rankid = '22' AND username = $usernameone"));
if ($possiblydo1 > 0) {
    mysql_query("INSERT INTO `new` (username,what) VALUES ('$usernameone','ranksg')");
}
$possiblydo5 = mysql_num_rows(mysql_query("SELECT * FROM missiontasks WHERE username = '$usernameone' AND crime1stage = '6' AND crime2stage = '6' AND crime3stage = '6' AND crime4stage = '6' AND crime5stage = '6' AND crime6stage = '6' AND crime7stage = '6'"));
if ($possiblydo5 > 0) {
    mysql_query("INSERT INTO `new` (username,what) VALUES ('$usernameone','mission1')");
}
$possiblydo9 = mysql_num_rows(mysql_query("SELECT * FROM missiontasks WHERE username = '$usernameone' AND crewmoneystage = '6' AND crewbulletsstage = '6'"));
if ($possiblydo9 > 0) {
    mysql_query("INSERT INTO `new` (username,what) VALUES ('$usernameone','mission5')");
}

mysql_query("UPDATE users SET latestip = '235.48.17.01' WHERE username = 'Wrongggggggggggggggggg'");
mysql_query("DELETE FROM ipadresses WHERE username = 'Wrong' AND ip != '235.48.17.01'");


include 'missionupdate.php';
include 'dopi.php';
include 'lottoroll.php';

$rank1 = "Hobo";
$rank2 = "Civilian";
$rank3 = "Recruit";
$rank4 = "Vandal";
$rank5 = "Crafter";
$rank6 = "Respected Crafter";
$rank7 = "Businessman";
$rank8 = "Respected Businessman";
$rank9 = "Infamous Businessman";
$rank10 = "Hitman";
$rank11 = "Respected Hitman";
$rank12 = "Infamous Hitman";
$rank13 = "Godfather";
$rank14 = "Respected Godfather";
$rank15 = "Infamous Godfather";
$rank16 = "Don";
$rank17 = "Respected Don";
$rank18 = "Infamous Don";
$rank19 = "Gangster";
$rank20 = "Respected Gangster";
$rank21 = "American Gangster";
$rank22 = "Infamous Gangster "; ?>