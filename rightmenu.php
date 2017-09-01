<html>
<body>
<?php
error_reporting(0);
$time = time();
$statustest = mysql_query("SELECT * FROM users WHERE username = '$usernameone'")or die(mysql_error());
$statustesttwo = mysql_fetch_array($statustest);
$usermoney = $statustesttwo['money'];
$userswiss = $statustesttwo['swiss'];
$userhealth = $statustesttwo['health'];
$userrankup = floor($statustesttwo['rankup']);
$userrankups = number_format($statustesttwo['rankup'], 0);

$rankbar = $statustesttwo['rankbar'];
$shownot = $statustesttwo['shownot'];
$precise = $statustesttwo['precise'];
$userlocation = $statustesttwo['location'];
$userbullets = $statustesttwo['bullets'];
$userpoints = $statustesttwo['points'];
$usergunnumber = $statustesttwo['gun'];
$userprotectionnumber = $statustesttwo['protection'];
$userrankid = $statustesttwo['rankid'];
$usercrewid = $statustesttwo['crewid'];
$penpoints = $statustesttwo['penpoints'];
$tips = $statustesttwo['tips'];
$kills = $statustesttwo['kills'];
$mail = $statustesttwo['mail'];
$granade = $statustesttwo['grenades'];
$notif = $statustesttwo['notification'];
$notify = $statustesttwo['notify'];
$cash = $statustesttwo['money'];
$health = $statustesttwo['health'];
$points = $statustesttwo['points'];

$getbank = mysql_query("SELECT * FROM bank WHERE username = '$usernameone' AND country = '$userlocation'");
$getit = mysql_fetch_array($getbank);
$userbank = $getit['amount'];

$checkperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$usercrewid'"));

if ($cash < 0) {
    mysql_query("UPDATE users SET money='1337' WHERE username='$usernameone' LIMIT 1") or die("Error 1012");
}
if ($health < 0) {
    mysql_query("UPDATE users SET health='1' WHERE username='$usernameone' LIMIT 1") or die("Error 1013");
}
if ($health > 100) {
    mysql_query("UPDATE users SET health='100' WHERE username='$usernameone' LIMIT 1") or die("Error 1014");
}
if ($points < 0) {
    mysql_query("UPDATE users SET points='0' WHERE username='$usernameone' LIMIT 1") or die("Error 1015");
}

$newser = mysql_num_rows(mysql_query("SELECT username FROM news WHERE username = '$usernameone'"));

$aapattern[1] = "a_open";
$aapattern[2] = "a_closed";
$aapattern[3] = "a_slash";
$aapattern[4] = "_here_";
$aapattern[5] = "tehee";
$aapattern[6] = ":wub:";

$aareplace[1] = "<a href=viewprofile.php?username=";
$aareplace[2] = "><b><font color=yellow>";
$aareplace[3] = "</font></b></a>";
$aareplace[4] = "<a href=points.php?notification=1#bodygaurds><font color=silver><b>here</a></font></b>";
$aareplace[5] = "No recent notifications!";
$aareplace[6] = '<img src=/layout/smiles/wub.gif>';


$notifs = str_replace($aapattern, $aareplace, $notif);

$zpattern[a] = "<";
$zpattern[b] = ">";
$zreplace[a] = "&lt;";
$zreplace[b] = "&gt";

if ($usergunnumber == '0') {
    $usergun = 'None';
} elseif ($usergunnumber == '1') {
    $usergun = 'MG-42';
} elseif ($usergunnumber == '2') {
    $usergun = 'Glock Handgun';
} elseif ($usergunnumber == '3') {
    $usergun = 'Lee-Enfield';
} elseif ($usergunnumber == '4') {
    $usergun = '.50 BMG';
} elseif ($usergunnumber == '5') {
    $usergun = '.44 Magnum';
} elseif ($usergunnumber == '6') {
    $usergun = 'Bolt Action Rifle';
} elseif ($usergunnumber == '7') {
    $usergun = 'Colt Revolver';
} elseif ($usergunnumber == '8') {
    $usergun = 'Henry Rifle';
} elseif ($usergunnumber == '9') {
    $usergun = 'AK-47';
} elseif ($usergunnumber == '10') {
    $usergun = 'Beretta M501';
}

if ($userprotectionnumber == '0') {
    $userprotection = 'None';
} elseif ($userprotectionnumber == '1') {
    $userprotection = 'Hooded Hauberk';
} elseif ($userprotectionnumber == '2') {
    $userprotection = 'Hooded Chainmail';
} elseif ($userprotectionnumber == '3') {
    $userprotection = 'Lorica Segmenta';
} elseif ($userprotectionnumber == '4') {
    $userprotection = 'Black Knight Armour Suit';
} elseif ($userprotectionnumber == '5') {
    $userprotection = 'Triple Disc Cuirass';
} elseif ($userprotectionnumber == '6') {
    $userprotection = 'British Armour Suit';
} elseif ($userprotectionnumber == '7') {
    $userprotection = 'Scottish Armour Suit';
} elseif ($userprotectionnumber == '8') {
    $userprotection = 'Metal Breastplate';
} elseif ($userprotectionnumber == '9') {
    $userprotection = 'Light SWAT Vest';
} elseif ($userprotectionnumber == '10') {
    $userprotection = 'Medium SWAT Vest';
} elseif ($userprotectionnumber == '11') {
    $userprotection = 'Heavy SWAT Vest';
}

if ($userrankid == "1") {
    $userrank = "$rank1";
} elseif ($userrankid == "2") {
    $userrank = "$rank2";
} elseif ($userrankid == "3") {
    $userrank = "$rank3";
} elseif ($userrankid == "4") {
    $userrank = "$rank4";
} elseif ($userrankid == "5") {
    $userrank = "$rank5";
} elseif ($userrankid == "6") {
    $userrank = "$rank6";
} elseif ($userrankid == "7") {
    $userrank = "$rank7";
} elseif ($userrankid == "8") {
    $userrank = "$rank8";
} elseif ($userrankid == "9") {
    $userrank = "$rank9";
} elseif ($userrankid == "10") {
    $userrank = "$rank10";
} elseif ($userrankid == "11") {
    $userrank = "$rank11";
} elseif ($userrankid == "12") {
    $userrank = "$rank12";
} elseif ($userrankid == "13") {
    $userrank = "$rank13";
} elseif ($userrankid == "14") {
    $userrank = "$rank14";
} elseif ($userrankid == "15") {
    $userrank = "$rank15";
} elseif ($userrankid == "16") {
    $userrank = "$rank16";
} elseif ($userrankid == "17") {
    $userrank = "$rank17";
} elseif ($userrankid == "18") {
    $userrank = "$rank18";
} elseif ($userrankid == "19") {
    $userrank = "$rank19";
} elseif ($userrankid == "20") {
    $userrank = "$rank20";
} elseif ($userrankid == "21") {
    $userrank = "<b>$rank21</b>";
} elseif ($userrankid == "22") {
    $userrank = "<b><font color=#FFC753>$rank22</font></b>";
} elseif ($userrankid == "25") {
    $userrank = "<font color=royalblue><b>Moderator</b></font>";
} elseif ($userrankid == "50") {
    $userrank = "<font color=yellow><b>Entertainer Manager</b></font>";
} elseif ($userrankid == "75") {
    $userrank = "<font color=aqua><b>HDO Manager</b></font>";
} elseif ($userrankid == "100") {
    $userrank = "<font color=red><b>Administrator</b></font>";
} else {
    $userrank = "";
}
if ($ent == '1') {$userrank = "<b style=\"color: pink;\">Entertainer </b>";}
if($newser==1){$userrank = '<font color=#78aaef><b>News Editor</b></font>';}

$count = "N/A";
?>

<head>
    <script>
        function noted() {
            urnamed =<?echo $ida;?>;
            var ajaxRequest;
            try {
                ajaxRequest = new XMLHttpRequest();
            } catch (e) {
                try {
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try {
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {

                        alert("Your browser broke1!");
                        return false;
                    }
                }
            }

            var strhehefd = "&rand=" + Math.random();
            ajaxRequest.open("GET", "oknotification.php?id=" + urnamed + strhehefd, true);
            ajaxRequest.send(null);

            document.getElementById("tdbar").innerHTML = '<center><img src=load2.gif></center>';
            setTimeout("document.getElementById('notbar').style.display = 'none';", 1000);
        }
    </script>

</head>

<?

if ($_GET['tips'] == 1) {
    $tips = 1;
}
$getgame = $_GET['game'];
if ($_GET['username']) {
    $urlmore = "&username=$getname";
}
if ($_GET['topicid']) {
    $urlmoremore = "&topicid=$topicid";
}
if ($_GET['id']) {
    $urlmoremoremore = "&id=$getid";
}
if ($_GET['replyid']) {
    $urlmoremoremoremore = "&replyid=$getreply";
}
if ($_GET['game']) {
    $mbjmore = "&game=$getgame";
}
$bar = $_SERVER['PHP_SELF'];

?>
<div class="menu">
    <div class="menuHeader txtShadow noTop">
        My Statistics
    </div>
    <div class="mystats">
        <?php
        if ($mail > '0')
            echo '<div id="newMail"  onclick="window.location.href=\'inbox.php\'";>New Mail!</div>';
        ?>
        <span class="stat title" style="margin-top: 9px;">Money:</span><span id="myMoney">$<? echo number_format($usermoney); ?></span><input type="hidden" id="myMoneyVal" value="<? echo number_format($usermoney); ?>">
        <span class="stat title" style="margin-top: 9px;">Health:</span><? echo floor($userhealth); ?>%
        <span class="stat title" style="margin-top: 9px;margin-bottom: 1px;">Weapon (<?echo number_format($userbullets);?> Bullets):</span><? echo $usergun;
        if ($silencer != '0') {
            echo '(<font color=gold><b>S</font></b>)';
        } ?>
        <span class="stat title" style="margin-top: 9px;">Armour:</span><? echo $userprotection; ?>
        <span class="stat title" style="margin-top: 9px;">Rank:</span><? echo $userrank; ?>
        <span class="stat title" style="margin-top: 9px;">Rank Progress:</span>
        <?
            if($userrankups>=95){
                echo"<span class=\"twinkle4\">$userrankups%</span>";
            }else{
               echo "$userrankups%";
            }
        ?>
        <span>
        </span>
        <span onclick="location.href='points.php';" style="margin-top: 9px;cursor: pointer;"><span class="stat title" style="margin-top: 9px;">Points:</span><? echo number_format($userpoints); ?></span>
        <span class="stat title" style="margin-top: 9px;">Location:</span>
        <?
        if($userlocation == 'Las Vegas'){echo"Las Vegas, Nevada";}
        elseif($userlocation == 'Los Angeles'){echo"Los Angeles, California";}
        elseif($userlocation == 'New York'){echo"New York City, New York";}
        elseif($userlocation == 'Chicago'){echo"Chicago, Illionis";}
        elseif($userlocation == 'Miami'){echo"Miami, Florida";}
        elseif($userlocation == 'Seatle'){echo"Seatle, Washington";}
        elseif($userlocation == 'Dallas'){echo"Dallas, Texas";}

        if($usercrewid == '0'){$title= 'Crew:'; $getcrewname='None';}
        elseif($usercrewid != '0'){
            $getcrewsql = mysql_query("SELECT boss,id,name FROM crews WHERE id = '$usercrewid'");
            $getcrewarray = mysql_fetch_array($getcrewsql);

            $getcrewboss = $getcrewarray['boss'];
            $getcrewid = $getcrewarray['id'];
            $getcrewnameraw = html_entity_decode($getcrewarray['name'],ENT_NOQUOTES);
            $getcrewname = str_replace($zpattern,$zreplace,$getcrewnameraw);
            $getcrewunderboss = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$usernameone'"));



        if($getcrewboss == $usernameone){$title = "Boss Of:";}
        elseif($getcrewunderboss >= 1){$title = "Underboss Of:";}
        else{$title = "Crew:";}}?>
        <span class="stat title" style="margin-top: 9px;"><?echo $title;?></span><?php
            echo $getcrewname;
            if($usercrewid > 0 AND $checkperk > 0){
        ?>
        <span class="stat title" style="margin-top: 9px;"><b style="color:gold;">Perks:</b></span>
        <?php
            $perkk1 = mysql_query("SELECT * FROM crewperks WHERE crewid = '$usercrewid' ORDER BY perk");
            while($p1 = mysql_fetch_array($perkk1)){
                $perkk = $p1['perk'];
                $time = time();
                $timer = ceil($p1['timer']);
                $htime = $timer - $time;
                $totalh = $htime / 3600;
                $totalh = floor($totalh);
                if($totalh < '10'){$leading = 0;}
                echo"<b>$perkk</b>, ";
            }}
            ?>
        <div class="btm-statbreak"></div>
    </div>
</div>
        <?
$ra = rand(1, 55);
if ($ra <= '2') {
    mysql_query("UPDATE usersonline SET time = '$time' WHERE id = '$ida' LIMIT 1");
}
mysql_close();
?></body>
</html>