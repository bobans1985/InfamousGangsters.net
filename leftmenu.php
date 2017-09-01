<?php
error_reporting(0);

if ($bar == '/leftmenu.php') {
    die();
}
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
if ($protectedfd > 0) {
    $propowned = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone'"));
    $buymoney = mysql_num_rows(mysql_query("SELECT * FROM buymoney WHERE username = '$usernameone'"));
    $buycasinos = mysql_num_rows(mysql_query("SELECT * FROM buycasinos WHERE username = '$usernameone'"));
    $buypoints = mysql_num_rows(mysql_query("SELECT * FROM buypoints WHERE username = '$usernameone'"));

    $crewowned = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss = '$usernameone'"));
    $histlistowned = mysql_num_rows(mysql_query("SELECT * FROM hitlist WHERE killer = '$usernameone'"));
    $killowned = mysql_num_rows(mysql_query("SELECT * FROM kills WHERE killer = '$usernameone'"));
    if ($propowned > 0 || $crewowned > 0 || $histlistowned > 0 || $killowned > 0 || $buycasinos > 0 || $buymoney > 0 || $buypoints > 0) {
        mysql_query("UPDATE users SET notification = 'Your protection has been removed!', notify = (notify + 1) WHERE username = '$usernameone'");
        mysql_query("DELETE FROM protection WHERE username = '$usernameone'");
    }
}

$ahdoban = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone' AND ban = '1'"));
$ahdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone' AND type = 'senior'"));
$newswriter = mysql_num_rows(mysql_query("SELECT * FROM news WHERE username='$usernameone'"));

$seniortestsql = mysql_query("SELECT * FROM senior WHERE username = '$usernameone'");
$senior = mysql_num_rows($seniortestsql);
if (($hdo > '0') || ($rankid >= '25')) {

    $gutnewhd = mysql_query("SELECT * FROM hdonew");
    $gutnewshd = mysql_fetch_array($gutnewhd);
    $tishere = $gutnewshd['number'];
}

$fueleffec = $statustesttwo['fueleffec'];
$timea = time();

$timeleftto = $fueleffec - $timea;

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);

$counnewsqlq = mysql_query("SELECT * FROM forumtopics WHERE creator = '$user'");
$counneweoqa = mysql_num_rows($counnewsqlq);

if ($crewid != '0') {
    $crewbosssql = mysql_query("SELECT boss FROM crews WHERE boss = '$user' AND id = '$crewid'");
    $crewboss = mysql_num_rows($crewbosssql);
    $crewunderboss1 = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$user' AND management = '1'"));
    $crewunderboss2 = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$user' AND profile = '1'"));
    $crewunderboss3 = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$user' AND cc = '1'"));
} else {
    $crewboss = 0;
    $crewunderboss = 0;
}

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

$userownsproperty = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'prop' AND casino <>'Landmark'"));
$userownscasino = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'casi'"));

?>
    <script>

        function runme() {
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
                        return false;
                    }
                }
            }

            var str = "<?echo $ida;?>";
            var strhehe = "&rand=" + Math.random();
            var strhehes = "&userid=<?echo $ida;?>";
            ajaxRequest.open("GET", "checknewmail.php?&id=" + str + strhehes + strhehe, true);

            ajaxRequest.send(null);
// Create a function that will receive data sent from the server
            ajaxRequest.onreadystatechange = function () {
                if (ajaxRequest.readyState == 4) {

                }
            }
            setTimeout("runme()", 13000);
        }

        setTimeout("runme()", 10000);
        setTimeout("changetitleto()", 20000);

        function changetitleto() {
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

                        alert("Your browser broke!");
                        return false;
                    }
                }
            }

            var strhehe = "<?echo $ida;?>&rand=" + Math.random();
            ajaxRequest.open("GET", "titlemail.php?userid=" + strhehe, true);
            ajaxRequest.send(null);
            ajaxRequest.onreadystatechange = function () {
                if (ajaxRequest.readyState == 4) {
                    if (ajaxRequest.responseText) {
                        document.title = ajaxRequest.responseText;
                    }
                }
            }
        }

    </script>
    <?
    function maketime($until)
    {
        $difference = $until - time();
        $days = floor($difference / 86400);
        $difference = $difference - ($days * 86400);
        $hours = floor($difference / 3600);
        $difference = $difference - ($hours * 3600);
        $minutes = floor($difference / 60);
        $difference = $difference - ($minutes * 60);
        $seconds = $difference;
        $output = " " . sprintf("%02u", $hours) . ":" . sprintf("%02u", $minutes) . ":" . sprintf("%02u", $seconds) . " ";
        return $output;
    }

    function pstime($until)
    {
        $difference = $until - time();
        $days = floor($difference / 86400);
        $difference = $difference - ($days * 86400);
        $hours = floor($difference / 3600);
        $difference = $difference - ($hours * 3600);
        $minutes = floor($difference / 60);
        $difference = $difference - ($minutes * 60);
        $seconds = $difference;
        $output = " " . sprintf("%02u", $minutes) . ":" . sprintf("%02u", $seconds) . " ";
        return $output;
    }

    ?>
<script language="javascript">
    function domod() {
        var ele = document.getElementById("togglemod");
        var text = document.getElementById("displaymod");
        if (ele.style.display == "block") {
            ele.style.display = "none";
            text.innerHTML = "<b>Open Tools</b>";
        } else {
            ele.style.display = "block";
            text.innerHTML = "<b>Close Tools</b>";
        }
    }
    function dopromote() {
        var ele = document.getElementById("togglepromote");
        var text = document.getElementById("displaypromote");
        if (ele.style.display == "block") {
            ele.style.display = "none";
            text.innerHTML = "<b>Open Tools</b>";
        } else {
            ele.style.display = "block";
            text.innerHTML = "<b>Close Tools</b>";
        }
    }
</script>
<?
$ifent = mysql_num_rows(mysql_query("SELECT * FROM entertainers WHERE username = '$usernameone'"));
$ifhdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone'"));
$ifprotected = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username = '$usernameone'"));
$citycrime = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE city = '$thelocation'"));
$newws = mysql_num_rows(mysql_query("SELECT * FROM witnessstatements WHERE username = '$usernameone' AND new != '0'"));
$newticket = mysql_num_rows(mysql_query("SELECT * FROM gametimes WHERE game = 'helpdesk' AND time >= '1'"));
if ($mission == 0 AND $thelocation == Miami) {
    $jailnum = mysql_num_rows(mysql_query("SELECT * FROM jail"));
} else {
    $jailnum = mysql_num_rows(mysql_query("SELECT * FROM jail WHERE username != 'George'"));
}
$landmarker = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND location = '$thelocation' AND casino = 'Landmark'"));
$lmown = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = 'None' AND location = '$thelocation' AND casino = 'Landmark'"));
$checkverify = mysql_num_rows(mysql_query("SELECT ID,verify FROM users WHERE ID = '$ida' AND verify = 'verified'"));
?>


<style>
    .commitbox {
        background-color: #414141;
        border-bottom: 1px solid #626262;
        border-left: 1px solid #040404;
        border-right: 1px solid #626262;
        border-top: 1px solid #040404;
        color: white;
        font-family: verdana;
        font-size: 12px;
    }

    .dotd {
        border: 1px solid black;
    }
</style>

<script>
    function lnoted() {
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
        ajaxRequest.open("GET", "oknotificationl.php?id=" + urnamed + strhehefd, true);
        ajaxRequest.send(null);

        document.getElementById("tdbar").innerHTML = '<center><img src=load2.gif></center>';
        setTimeout("document.getElementById('lnotbar').style.display = 'none';", 1000);
    }
</script>

<?
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
$bar = $_SERVER['PHP_SELF'];
$ifhdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone'"));
$ifent = mysql_num_rows(mysql_query("SELECT * FROM entertainers WHERE username = '$usernameone'"));
$ifnews = mysql_num_rows(mysql_query("SELECT * FROM news WHERE username = '$usernameone'"));
$showbignotif = mysql_num_rows(mysql_query("SELECT * FROM gametimes WHERE game = 'notif' AND time = '1'"));
if ($showbignotif == '1' AND $bignotif == '1') {
    $getthenotiff = mysql_query("SELECT * FROM gametimes WHERE game = 'notif'");
    $getthenotif = mysql_fetch_array($getthenotiff);
    $notifmessage = $getthenotif['message'];
}
?>

<td class="menu">

    <?php if (($ifhdo > '0') || ($rankid >= '25') || ($ifent>'0')){?>
    <?
        if($rankid=='75')
            echo "<div class=\"menuHeader txtShadow noTop\" style='color:aqua;font-weight: bold;'>HDO Moderator Tools</div>";
        elseif($ifhdo>'0')
            echo "<div class=\"menuHeader txtShadow noTop\" style='color:lime;font-weight: bold;'>HDO Tools</div>";
        elseif($rankid=='50')
            echo "<div class=\"menuHeader txtShadow noTop\" style='color:yellow;font-weight: bold;'>Entertainer Moderator Tools</div>";
        elseif($ifent>'0')
            echo "<div class=\"menuHeader txtShadow noTop\" style='color:pink;font-weight: bold;'>Entertainer Tools</div>";
        elseif($ifnews>'0')
            echo "<div class=\"menuHeader txtShadow noTop\" style='color:#78aaef;font-weight: bold;'>News Editor Tools</div>";
        elseif($rankid=='25')
            echo "<div class=\"menuHeader txtShadow noTop\" style='color:royalblue;font-weight: bold;'>Moderator Tools</div>";
        elseif($rankid=='100')
            echo "<div class=\"menuHeader txtShadow noTop\" style='color:red;font-weight: bold;'>Admin Tools</div>";

    ?>
    <a id="displaymod" href="javascript:domod();"><b>Open Tools</b></a>
    <div id="togglemod" style="display: none">
        <?php

        if ($rankid >= '75') {
            echo('<a class="link_menu" href="promotehdo.php" style="color:lime;"><b>Promote HDO</b></a>');
        }else if($rankid >= '50'){
            echo '<a class="link_menu" href="promoteent.php" style="color:pink;"><b>Promote Entertainer</b></a>';
        }if ($rankid >= '100') {
            echo('
                        <a class="link_menu" href="promote_hdomanager.php" style="color:aqua;"><b>Promote HDO Manager</b></a>
                        <a class="link_menu" href="promoteent.php" style="color:pink;;"><b>Promote Entertainer</b></a>
                        <a class="link_menu" href="promote_entmanager.php" style="color:yellow;"><b>Promote Entertainer Manager</b></a>
                        <a class="link_menu" href="promote_newseditor.php" style="color:#78aaef;"><b>Promote News Editors</b></a>
                        <a class="link_menu" href="promote_moderators.php" style="color:royalblue;"><b>Promote Moderators</b></a>'
            );
        }

        if($ifhdo>'0' || $rankid=='75'){
            echo('<a class="link_menu" href="mute.php">Mute User</a>');
        }
        if ($rankid=='75'){
            echo('
                <a class="link_menu" href="ipban.php"><font color=red><b>Ban Advertiser</b></font></a>
                <a href="modkill.php">Modkill</a>                          
            ');
        }
        if($ifent>'0' || $rankid=='50'){
            echo('
                <a class="link_menu" href="mute.php">Mute User</a>
                <a class="link_menu" href="ipban.php"><font color=red><b>Ban Advertiser</b></font></a>
                <a href="modkill.php">Modkill</a>
                <a class="link_menu" href="diceroller.php">Dice Generator</a>
                <a class="link_menu" href="gboxroller.php">Money G-Box Roller</a>
                <a class="link_menu" href="pgboxroller.php">Points G-Box Roller</a>  
                <a class="link_menu" href="anagramgen.php">Anagram Generator</a>
                <a class="link_menu" href="randomgen.php">Number Generator</a>                             
                <a class="link_menu" href="bbcode.php">BB Coding</a>                           
            ');
        }
        elseif ($rankid == '25' || $rankid>='100') {
            echo('
                <a class="link_menu" href="mute.php">Mute User</a>
                <a class="link_menu" href="ipban.php"><font color=red><b>Ban Advertiser</b></font></a>
                <a class="link_menu" href="wordfilter.php">Website Filter</a>
                <a class="link_menu" href="ipcheck.php">Dupe Check</a>
                <a href="signups.php">Recent Signups</a>
                <a href="modkill.php">Modkill</a> 
                <a href="penaltypoints.php">Penalty Points</a>
                <a href="mostrecentmail.php">View Recent Mail</a>
                <a href="viewallmail.php">View Inbox</a>
                <a href="sentmail.php">View Sent Mail</a>                                              
            ');
        }
        if ($rankid >= '100') {
            echo('
                        <a class="link_menu" href="richlist.php">Rich List</a>
                        <a class="link_menu" href="managecash.php">Manage Users Cash</a>
                        <a class="link_menu" href="messageallusers.php">Message All</a>
                        <a class="link_menu" href="messageallonline.php">Message Online</a>
                        <a class="link_menu" href="dosuper.php">Get Super Car</a>
                        <a class="link_menu" href="paypal.php">Paypal Donations</a>
                        <a class="link_menu" href="gamenotif.php">Game Notification</a>
                    ');
        }
        }
        ?>
    </div>
	<style>  
		#blink1 { 
			-webkit-animation: blink1 0.5s linear infinite; 
			animation: blink1 0.5s linear infinite;
			margin-left: 5px;
		} 
		@-webkit-keyframes blink1 { 
			0% { color: rgba(255,215,0,1); } 
			50% { color: #cccccc; } 
			100% { color: rgba(255,215,0,1); } 
		} 
		@keyframes blink1 { 
			0% { color: rgba(255,215,0,1); } 
			50% { color: #cccccc; } 
			100% { color: rgba(255,215,0,1); } 
		}
	</style>
    <div class="menuHeader txtShadow">Information</div>

    <a class="link_menu" href="ipsharing.php">IP Rules</a>
    <a class="link_menu" href="faq.php">FAQ</a>
    <a class="link_menu" href="gamestatistics.php">Game Statistics</a>
    <a class="link_menu" href="refferal.php">Referral System</a>
    <a class="link_menu" href="usersonline.php">Users Online</a>
    <a class="link_menu" href="casino.php">Casinos</a>
    <a class="link_menu" href="cities.php">Properties</a>
    <a class="link_menu" href="profile.php">Edit Profile</a>
    <a class="link_menu" href="news.php">Latest News</a>
        <?php
        if ($ifhdo > 0 || $rankid >= 25) {
			?>
    <a class="link_menu" href="helpdesk.php">Help Desk
		<?php
            if ($newticket >= 1) {
                echo "<span id='blink1'><b>(New Ticket)</b></span>";
            }
        }
		else { ?>
    <a class="link_menu" href="helpdesk.php">Help Desk
		<?php }
        ?>
    </a>
    <a class="link_menu" href="mystats.php">My Statistics</a>
    <a class="link_menu" href="manage_propierties.php">Manage My Properties</a>
    <?php
    if ($checkverify < 1)
        echo('<a class="link_menu" href="verify.php" style="color: gold;"><b>Verify Email Address</b></a>');
    if ($rankid == 22 AND $timess < 5)
        echo('<a class="link_menu" href="rankreset.php"><font color=yellow><b>Rank Reset</b></font></a>');
    if ($ifprotected >= 1)
        echo('<a class="link_menu" href="protection.php">User Protection</a>');
    ?>
    <a class="link_menu" href="missiontasks.php">My Missions</a>
    <?	if ($missionid == 3){?>
	<a class="link_menu" href="assassination.php"><font color=gold><b>Assassination</b></font></a>
	<?}?>
<!--    <a class="link_menu" href="findplayer.php">Find User</a>-->
    <a class="link_menu" href="gamerecords.php">Top 15 Records</a>

    <div class="menuHeader txtShadow">Messaging</div>
    <a class="link_menu" href="send.php">Create Message</a>
    <?php
    if ($mails >= '1') {
        $extratwo = '<span class="curve2px menuNotification" id="new_messages_indicator">'.$mails.'</span>';
    }
    ?>
    <span id=inboxspan><a class="link_menu" href="inbox.php">Inbox <?php echo $extratwo; ?></a></span>
    <a class="link_menu" href="forum.php">Game Forum</a>
    <a class="link_menu" href="dforum.php">Designers Forum</a>
    <?php
    $userarray = $statustesttwo;
    $crewid = $userarray['crewid'];
    $cforum = mysql_num_rows(mysql_query("SELECT * FROM forumtopics WHERE type = '$crewid' AND locked = 'No'"));
    ?>
    <?php
    if ($crewid != '0'){
    ?>
    <a class="link_menu" href="crewforum.php">Crew Forum
        <?php
        if ($cforum >= 1) {
            echo "<span class=\"curve2px menuNotification\" id=\"new_messages_indicator\">$cforum</span>";
        }
        ?>
        <?php
        }
        ?>
    </a>
    <?php
    if ($rankid >= '25' or $hdo > '0') {
        ?>
        <a class="link_menu" href="staffforum.php">Staff Forum</a>
        <?php
    }
        ?>
        <a class="link_menu" href="eforum.php">
            <?php
            if ($isitopennn == 1) {
                echo "<font color=yellow><b>Entertainment Forum</font> <span id=right>OPEN</span> ";
            }
            if ($isitopennn == 0) {
                echo "Entertainment Forum";
            }
            ?>
        </a>


    <div class="menuHeader txtShadow">Ranking</div>
    <a class="link_menu" href="crimes.php">Crimes</a>
    <?
    $getuserinfoarray = $statustesttwo;
    $steal = $getuserinfoarray['steal'];
    $time = time();
    $stealtime = $steal - $time;
        if($stealtime<=0){
            echo '<a class="link_menu" href="steal.php"><span style="font-size: 10px; float: right; color: #FFC753;">✔&nbsp;</span> GTA</a>';
        }else{
            echo '<a class="link_menu" href="steal.php">GTA</a>';
        }
        ?>
    <a class="link_menu" href="jail.php">Jail
        <?php
        if ($jailnum >= 1) {
            echo " <span id=right><font color=silver>(<b>$jailnum</b>)</font></span>";
        }
        ?>
    </a>
    <?
    $getuserinfoarray = $statustesttwo;
    $melt = $getuserinfoarray['melt'];
    $time = time();
    $melttime = $melt - $time;
    if($melttime<=0){
        echo '<a class="link_menu" href="melt.php"><span style="font-size: 10px; float: right; color: #FFC753;">✔&nbsp;</span> Melt Cars</a>';
    }else{
        echo '<a class="link_menu" href="melt.php">Melt Cars</a>';
    }
    ?>
    <a class="link_menu" href="cargarage.php">Repair</a>
    <?
    $getuserinfoarray = $statustesttwo;
    $time = time();
    $timer = ceil($getuserinfoarray['timer']);
    $htime = $timer - $time;
    if($htime<=0){
        echo '<a class="link_menu" href="citycrime.php"><span style="font-size: 10px; float: right; color: #FFC753;">✔&nbsp;</span> Organised Crime</a>';
    }else{
        echo '<a class="link_menu" href="citycrime.php">Organised Crime</a>';
    }
    ?>


    <div class="menuHeader txtShadow">Money / Points</div>
    <a class="link_menu" href="bank.php">Bank Account</a>
    <a class="link_menu" href="points.php">Points</a>
    <a class="link_menu" href="lotto.php">Lottery</a>
    <a class="link_menu" href="propertyinvestment.php">Property Investment</a>
    <?php
    if ($rankid >= 100 || $landmarker > 0 || $lmown > 0) {
        ?>

        <?php
    }
    ?>
    <a class="link_menu" href="racing.php">Horse Racing</a>
    <a class="link_menu" href="blackjack.php">Blackjack</a>
    <a class="link_menu" href="roulette.php">Roulette</a>
    <a class="link_menu" href="dicegame.php">Dice Game</a>
    <a class="link_menu" href="multidice.php">Multi Dice Game</a>
    <?php
    if (($isitopen == 1 || $rankid >= 25)) {
        ?>
        <a class="link_menu" href="betting.php" style="border-left-color: #FFC753;">Sport Betting</a>
        <?php
    }
    ?>
    <a class="link_menu" href="retrieval.php">Dead > Alive</a>

    <div class="menuHeader txtShadow">Buy / Sell</div>
    <a class="link_menu" href="quicktrade.php">Quicktrade</a>
    <a class="link_menu" href="buycar.php">Buy Cars</a>
    <a class="link_menu" href="sell.php">Sell Cars</a>
    <a class="link_menu" href="buy.php">Buy Weapons / Armour</a>


    <div class="menuHeader txtShadow">Travel</div>
    <a class="link_menu" href="bycar.php">Car</a>
    <a class="link_menu" href="byplane.php">Airport</a>

    <div class="menuHeader txtShadow">Offence</div>
    <a class="link_menu" href="hitlist.php">Hitlist</a>
    <a class="link_menu" href="bulletfactory.php">Bullet Factory</a>
    <a class="link_menu" href="kill.php">Kill</a>
    <a class="link_menu" href="attempts.php">Attempts</a>
    <a class="link_menu" href="witness.php">Witness Statements <? if ($newws >= 1) {
            echo " <span id=right><font color=white>(<b>$newws</b>)</font></span>";
        } ?></a>


    <div class="menuHeader txtShadow">Crews</div>
    <a class="link_menu" href="crews.php">Crews</a>
    <?php
    if ($crewid != '0') {
        echo('
                    <a class="link_menu" href="crewdrugs.php">Crew Drugs</a>
                    <a class="link_menu" href="crewbullets.php">Crew Bullets</a>');
        if (($crewboss != '0') || ($rr != '0'))
            echo('<a class="link_menu" href="applications.php">Crew Applications</a>');
        if ($crewunderboss2 != '0')
            echo('<a class="link_menu" href="editcrewprofile.php">Edit Crew Profile</a>');
        if ($crewunderboss1 != '0')
            echo('<a class="link_menu" href="crewmanagement.php">Crew Organisation</a>');
        if ($crewunderboss3 != '0')
            echo('<a class="link_menu" href="crewcc.php">Crew OC</a>');
    }
    if ($crewboss != '0') {
        echo('<a class="link_menu" href="editcrewprofile.php">Edit Crew Profile</a>
                    <a class="link_menu" href="wmessage.php">Welcome Message</a>
                    <a class="link_menu" href="crewmanagement.php">Crew Organisation</a>
                    <a class="link_menu" href="crewcc.php">Crew OC</a>');
    }
    ?>
</td>


<style>
    #left {
        float: left;
    }

    #right {
        float: right;
    }
</style>