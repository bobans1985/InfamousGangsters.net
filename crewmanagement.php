<? include 'included.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" href="layout/style.css" type="text/css" />
    <title>Infamous Gangsters</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/main3.js"></script>
    

    <style>
        .stat.title {
            margin-top: 9px;
        }

        .stat.title:first-of-type {
            margin-top: 14px;
        }

        .btm-statbreak {
            height: 7px;
            display: block;
        }
    </style>
    <script>
        if (window.innerHeight > 700) {
            document.getElementById('crewFeedScrollID').style.maxHeight = "330px";
        }

        var unixTime = 1498981670.58;
        var muteSound = false;

        $('input, select, textarea').focus(function () {
            $('meta[name=viewport]').attr('content', 'width=device-width,initial-scale=1,maximum-scale=1.0');
        });
        $('input, select, textarea').blur(function () {
            $('meta[name=viewport]').attr('content', 'width=device-width,initial-scale=1,maximum-scale=10');
        });
    </script>
    <script type="text/javascript">
        function emotion(em) {
            $('#topicinfo').html($('#topicinfo').html() + em);
        }
    </script>
</head>
<body id="body">
<div id="alertBox"></div>
<div class="headerFloat">
    <div class="header">
        <table class="resize" cellspacing="0">
            <tr>
                <td width="220px" valign="top">
                    <div class="curve2px searchBox" id="searchBox">
                        <img class="searchBoxIcon" src="images/search.png">
                        <input name="search" autocomplete="off" class="searchBoxInput" maxlength="22" type="text"
                               id="search" placeholder="Search User..." onclick="this.select(); reClick();"
                               onfocus="document.getElementById('searchBox').style.border='2px solid #E6B34B'; "
                               onblur="document.getElementById('searchBox').style.border='';">
                    </div>
                </td>
                <td valign="top" class="centerTd">
                    <? include "cpanel_top.php";?>
                </td>
                <td width="233px" valign="top" class="centerTd">
                    <?php include "relative_block.php"; ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="curve4pxBottom searchFloat preventscroll" id="searchResults"
                         style="text-align: center;"></div>
                </td>
            </tr>
        </table>
    </div>
</div>
<table cellspacing="0" class="resize" id="block">
    <tr>
        <td width="224px" style="min-width: 224px;" valign="top">
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <?php include 'leftmenu.php'; ?>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
        </td>
        <td valign="top" class="main">
            <?php
            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;

            $playeridraw = mysql_real_escape_string($_POST['select']);
            $giveraw = mysql_real_escape_string($_POST['give']);
            $givecashraw = mysql_real_escape_string($_POST['cash']);
            $perca = mysql_real_escape_string($_POST['perc']);
            $playerid = preg_replace($saturated,"",$playeridraw);
            $perc = preg_replace($saturated,"",$perca);
            $give = preg_replace($saturated,"",$giveraw);
            $givecash = preg_replace($saturated,"",$givecashraw);
            $givea = number_format($give);
            $givecasha = number_format($givecash);
            $renameraw = mysql_real_escape_string($_POST['change']);
            $applyidraw = mysql_real_escape_string($_POST['apply']);
            $applyid = preg_replace($saturated,"",$applyidraw);
            $rename = htmlentities($renameraw, ENT_QUOTES);

            $createcheckrows = $crewboss;

            $getinfoarray = $statustesttwo;
            $getcrewid = $getinfoarray['crewid'];
            $getname = $getinfoarray['username'];
            $getrank = $getinfoarray['rankid'];
            $getmoney = $getinfoarray['money'];
            $getid = $getinfoarray['ID'];

            $crewunderbosscheck = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$getname' AND crew = '$getcrewid' AND management = '1'"));
            $crewbosscheck = mysql_query("SELECT * FROM crews WHERE boss = '$getname'");
            $crewbosscheckrows = $crewboss;
            if($crewbosscheckrows == 0 AND $crewunderbosscheck == 0){die('<font color=white size=1 face=verdana>Your not a crewboss!</font>');}

            $crewbosscheck = mysql_query("SELECT * FROM crews WHERE id = '$getcrewid'");
            $crewinfoarray = mysql_fetch_array($crewbosscheck);
            $crewbullets = $crewinfoarray['bullets'];
            $crewbank = $crewinfoarray['cash'];
            $melt = $crewinfoarray['melt'];
            $currentboss = $crewinfoarray['boss'];

            if(isset($_POST['kickdead'])){

                $getdeadall = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid = '$getcrewid' AND status = 'Dead' || status = 'Modkilled'"));
                $getdeadunderboss = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid = '$getcrewid' AND status = 'Dead' AND username = '$underboss'"));
                if($getdeadunderboss > 0){ mysql_query("UPDATE crews SET underboss = '' WHERE id = '$getcrewid'"); }
                mysql_query("UPDATE users SET crewid = '0' WHERE crewid = '$getcrewid' AND status = 'Dead' || status = 'Modkilled'");
                $showoutcome++; $outcome = "You kicked all your dead members</font>";}




            if($playerid){

                $checkif = mysql_query("SELECT * FROM users WHERE ID = '$playerid'");
                $checkifrows = mysql_num_rows($checkif);
                $checkifarray = mysql_fetch_array($checkif);
                $checkifcrew = $checkifarray['crewid'];
                $checkifname = $checkifarray['username'];
                $checkifstatus = $checkifarray['status'];
                $checkrecruiterrows = $checkifarray['rr'];
                $checkid = $checkifarray['ID'];
            }

            if(isset($_POST['recruiter'])){
                if(!$playerid){ }
                elseif($checkifcrew != $getcrewid){$showoutcome++; $outcome = "That person is not in your crew";}
                elseif($checkrecruiterrows > '0'){$showoutcome++; $outcome = "That player is already a recruiter!</font>";}
                else{
                    mysql_query("UPDATE users SET rr = '1' WHERE ID = '$checkid'");
                    $showoutcome++; $outcome = "<a href=viewprofile.php?username=$checkifname><b>$checkifname</b></a> is now a recruiter!</font>";}}

            elseif(isset($_POST['undorecruiter'])){
                if(!$playerid){ }
                elseif($checkifcrew != $getcrewid){$showoutcome++; $outcome = "That person is not in your crew";}
                elseif($checkifname == $underboss){$showoutcome++; $outcome = "You cant remove this persons recruiting rights!";}
                elseif($checkrecruiterrows == '0'){$showoutcome++; $outcome = "That player is not a recruiter!</font>";}
                else{mysql_query("UPDATE users SET rr = '0' WHERE ID = '$checkid'");
                    $showoutcome++; $outcome = "<a href=viewprofile.php?username=$checkifname><b>$checkifname</b></a> is no longer a recruiter!</font>";}}

            elseif(isset($_POST['makeunderboss'])){
                $alreadyunderboss = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$checkifname'"));
                if(!$playerid){ }
                elseif($checkifcrew != $getcrewid){$showoutcome++; $outcome = "That person is not in your crew";}
                elseif($alreadyunderboss >= 1){$showoutcome++; $outcome = "That person is already your underboss";}
                elseif($currentboss == $checkifname){$showoutcome++; $outcome = "This user owns the crew";}
                else{ mysql_query("UPDATE crews SET underboss = '$checkifname' WHERE ID = '$checkifcrew'");
                    mysql_query("DELETE FROM `crewsunderboss` WHERE crew = '$checkifcrew'");
                    mysql_query("INSERT INTO `crewsunderboss` (username,crew) VALUES ('$checkifname','$checkifcrew')");
                    mysql_query("UPDATE users SET rr = '1' WHERE ID = '$checkid'");
                    $showoutcome++; $outcome = "<a href=viewprofile.php?username=$checkifname><b>$checkifname</b></a> is now your underboss!</font>";}}

            elseif(isset($_POST['clearunderboss'])){
                mysql_query("DELETE FROM `crewsunderboss` WHERE crew = '$getcrewid'");
                $showoutcome++; $outcome = "Underboss has been cleared!</font>";}

            elseif(isset($_POST['allow1'])){
                $getinfoalready = mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$getcrewid'");
                $inforesults = mysql_fetch_array($getinfoalready);
                $crewmanagement = $inforesults['management'];
                $crewprofile = $inforesults['profile'];
                $crewcc = $inforesults['cc'];
                if($crewmanagement == 0){
                    mysql_query("UPDATE crewsunderboss SET management = '1' WHERE crew = '$getcrewid'");
                    $showoutcome++; $outcome = "Your underboss now has access to crew management!</font>"; }
                else{
                    mysql_query("UPDATE crewsunderboss SET management = '0' WHERE crew = '$getcrewid'");
                    $showoutcome++; $outcome = "Your underboss no longer has access to crew management!</font>"; }
            }

            elseif(isset($_POST['allow2'])){
                $getinfoalready = mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$getcrewid'");
                $inforesults = mysql_fetch_array($getinfoalready);
                $crewmanagement = $inforesults['management'];
                $crewprofile = $inforesults['profile'];
                $crewcc = $inforesults['cc'];
                if($crewprofile == 0){
                    mysql_query("UPDATE crewsunderboss SET profile = '1' WHERE crew = '$getcrewid'");
                    $showoutcome++; $outcome = "Your underboss now has access to crew profile!</font>"; }
                else{
                    mysql_query("UPDATE crewsunderboss SET profile = '0' WHERE crew = '$getcrewid'");
                    $showoutcome++; $outcome = "Your underboss no longer has access to crew profile!</font>"; }
            }

            elseif(isset($_POST['allow3'])){
                $getinfoalready = mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$getcrewid'");
                $inforesults = mysql_fetch_array($getinfoalready);
                $crewmanagement = $inforesults['management'];
                $crewprofile = $inforesults['profile'];
                $crewcc = $inforesults['cc'];
                if($crewcc == 0){
                    mysql_query("UPDATE crewsunderboss SET cc = '1' WHERE crew = '$getcrewid'");
                    $showoutcome++; $outcome = "Your underboss now has access to crew city crime!</font>"; }
                else{
                    mysql_query("UPDATE crewsunderboss SET cc = '0' WHERE crew = '$getcrewid'");
                    $showoutcome++; $outcome = "Your underboss no longer has access to crew city crime!</font>"; }
            }

            elseif(isset($_POST['kick'])){
                if(!$playerid){ }
                elseif($playerid == $getid){$showoutcome++; $outcome = "You cannot kick the crewboss</font>";}
                elseif($checkifcrew != $getcrewid){$showoutcome++; $outcome = "That person is not in your crew";}
                else{
                    if($underboss == '$checkifname'){ mysql_query("UPDATE crews SET underboss = '' WHERE id = '$getcrewid'"); }
                    mysql_query("UPDATE users SET crewid = '0', crewdrugs = '0' WHERE ID = '$playerid' AND crewid != '0'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
                    mysql_query("DELETE FROM recruiters WHERE username = '$checkifname'");mysql_query("UPDATE users SET rr = '0' WHERE ID = '$checkid'");
                    mysql_query("DELETE FROM crewsbullets WHERE username = '$checkifname'");
                    $showoutcome++; $outcome = "You kicked <a href=viewprofile.php?username=$checkifname><b>$checkifname</b></a> from your crew!</font>";}}

            elseif(isset($_POST['sendcrew'])){
                if(!$playerid){ }
                elseif($playerid == $getid){$showoutcome++; $outcome = "You're already the crew boss!</font>";}
                elseif($checkifname == $underboss){$showoutcome++; $outcome = "This user is your underboss, demote him first!</font>";}
                elseif($checkifcrew != $getcrewid){$showoutcome++; $outcome = "That person is not in your crew";}
                elseif($checkifstatus == 'Dead'){$showoutcome++; $outcome = "You cannot give the crew to a dead player";}
                else{mysql_query("UPDATE crews SET boss = '$checkifname' WHERE id = '$getcrewid' AND boss = '$gangsterusername'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
                    $showoutcome++; $outcome = "You gave the crew to<a href=viewprofile.php?username=$checkifname><b> $checkifname</b></a>!</font>";}}

            elseif((isset($_POST['give'])) &&($give > '0')){
                if((!$playerid)||(!$give)){ }
                elseif($checkifcrew != $getcrewid){$showoutcome++; $outcome = "That person is not in your crew";}
                elseif($give > $crewbullets){$showoutcome++; $outcome = "You dont have that many crew bullets";}
                else{
                    mysql_query("UPDATE crews SET bullets = bullets - $give WHERE id = '$getcrewid' AND bullets >= '$give'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}
                    mysql_query("UPDATE users SET bullets = bullets + '$give' WHERE ID = '$checkid'");

                    $showoutcome++; $outcome = "You gave $givea bullets to<a href=viewprofile.php?username=$checkifname><b> $checkifname</b></a>!</font>";}}

            elseif((isset($_POST['cash']))&&($givecash > '0')){
                if((!$playerid)||(!$givecash)){}
                elseif($checkifcrew != $getcrewid){$showoutcome++; $outcome = "That person is not in your crew";}
                elseif($givecash > $crewbank){$showoutcome++; $outcome = "You dont have that much in your crew bank";}
                else{
                    mysql_query("UPDATE crews SET cash = cash - '$givecash' WHERE id = '$getcrewid' AND cash >= '$givecash'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}

                    mysql_query("UPDATE users SET money = money + '$givecash' WHERE ID = '$checkid'");

                    $showoutcome++; $outcome = "You gave <font color=#FFC753>$<b>$givecasha</b></font> to<a href=viewprofile.php?username=$checkifname><b> $checkifname</b></a>!</font>";
                }}

            if($_POST['sellcrew']){
                $saturated = "/[^0-9]/i";
                $amountraw = mysql_real_escape_string($_POST['amount']);
                $amount = preg_replace($saturated,"",$amountraw);
                if($amount > 0){
                    $method = 'points';
                    mysql_query("UPDATE crews SET sell = '$amount', type = '$method' WHERE id = '$getcrewid'");
                    $showoutcome++; $outcome = "You are now selling your crew!";
                }else{
                    mysql_query("UPDATE crews SET sell = '', type = '' WHERE id = '$getcrewid'");
                    $showoutcome++; $outcome = "You are no longer selling your crew!";
                }
            }

            $getappss = mysql_query("SELECT * FROM crews WHERE id = '$getcrewid'");
            $getapps = mysql_fetch_array($getappss);
            $hmmm = $getapps['manageapp'];

            $radiobutton=$_POST['radiobutton'];
            if ($_POST['manageapp']){
                if($radiobutton == 1){
                    mysql_query("UPDATE crews SET manageapp='manual' WHERE id='$getcrewid'");
                    $showoutcome++; $outcome = "Your applications are now done manually!";
                }else{
                    if($radiobutton == 2){
                        mysql_query("UPDATE crews SET manageapp='accept' WHERE id='$getcrewid'");
                        $showoutcome++; $outcome = "All applications will be accepted automatically!";
                    }else{
                        if($radiobutton == 3){
                            mysql_query("UPDATE crews SET manageapp='reject' WHERE id='$getcrewid'");
                            $showoutcome++; $outcome = "All applications will be rejected automatically!";
                        }}}}

            $crewusersinfosql = mysql_query("SELECT * FROM users WHERE crewid = '$getcrewid' ORDER BY rankid DESC");
            ?>
            <?php
            $saturate = "/[^a-z0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $perk = mysql_real_escape_string($_POST["perk"]);

            $gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
            $gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
            $gangsterusername = $gangsterusernamearray['username'];

            $getuserinfosql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
            $getuserinfoarray = mysql_fetch_array($getuserinfosql);
            $crewid = $getuserinfoarray['crewid'];
            $getname = $getinfoarray['username'];
            $money = $getinfoarray['money'];

            if($crewid == '0'){die('<font color=white face=verdana size=1>Your not in a crew</font>');}

            $time = time();
            if(isset($_POST['perk_1'])){
                    $times = $time + 3600;
                    mysql_query("UPDATE users SET points = (points - 2000) WHERE id = '$ida' AND points > '2000'");
                    if (mysql_affected_rows()==0){ die('<font color=white face=verdana size=1>You do not have enough points!</font>'); }
                    mysql_query("INSERT INTO `crewperksbought` (username,id,perk,crewid) VALUES ('$usernameone','','1','$crewid')");
                    $perk1 = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                    if($perk1 > 0){ mysql_query("UPDATE crewperks SET timer = (timer + 3600) WHERE crewid = '$crewid' AND perk = '1'"); }
                    else{ mysql_query("INSERT INTO `crewperks` (crewid,perk,timer) VALUES ('$crewid','1','$times')");
                    }
                $showoutcome++; $outcome = "You bought the perk!";
            }
            if(isset($_POST['perk_2'])){
                    $times = $time + 3600;
                    mysql_query("UPDATE users SET points = (points - 2000) WHERE id = '$ida' AND points > '2000'");
                    if (mysql_affected_rows()==0){ die('<font color=white face=verdana size=1>You do not have enough points!</font>'); }
                    mysql_query("INSERT INTO `crewperksbought` (username,id,perk,crewid) VALUES ('$usernameone','','2','$crewid')");
                    $perk2 = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '2'"));
                    if($perk2 > 0){ mysql_query("UPDATE crewperks SET timer = (timer + 3600) WHERE crewid = '$crewid' AND perk = '2'"); }
                    else{ mysql_query("INSERT INTO `crewperks` (crewid,perk,timer) VALUES ('$crewid','2','$times')");
                    }
                $showoutcome++; $outcome = "You bought the perk!";
            }
            if(isset($_POST['perk_3'])){
                    $times = $time + 43200;
                    mysql_query("UPDATE users SET points = (points - 2000) WHERE id = '$ida' AND points > '2000'");
                    if (mysql_affected_rows()==0){ die('<font color=white face=verdana size=1>You do not have enough cash!</font>'); }
                    mysql_query("INSERT INTO `crewperksbought` (username,id,perk,crewid) VALUES ('$usernameone','','3','$crewid')");
                    $perk3 = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '3'"));
                    if($perk3 > 0){ mysql_query("UPDATE crewperks SET timer = (timer + 43200) WHERE crewid = '$crewid' AND perk = '3'"); }
                    else{ mysql_query("INSERT INTO `crewperks` (crewid,perk,timer) VALUES ('$crewid','3','$times')");
                    }
                $showoutcome++; $outcome = "You bought the perk!";
            }
            if(isset($_POST['perk_4'])){
                    $times = $time + 3600;
                    mysql_query("UPDATE users SET points = (points - 2000) WHERE id = '$ida' AND points > '2000'");
                    if (mysql_affected_rows()==0){ die('<font color=white face=verdana size=1>You do not have enough cash!</font>'); }
                    mysql_query("INSERT INTO `crewperksbought` (username,id,perk,crewid) VALUES ('$usernameone','','4','$crewid')");
                    $perk4 = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '4'"));
                    if($perk4 > 0){ mysql_query("UPDATE crewperks SET timer = (timer + 3600) WHERE crewid = '$crewid' AND perk = '4'"); }
                    else{ mysql_query("INSERT INTO `crewperks` (crewid,perk,timer) VALUES ('$crewid','4','$times')");
                    }
                $showoutcome++; $outcome = "You bought the perk!";
            }
            if(isset($_POST['perk_5'])){
                    $times = $time + 3600;
                    mysql_query("UPDATE users SET points = (points - 2000) WHERE id = '$ida' AND points > '2000'");
                    if (mysql_affected_rows()==0){ die('<font color=white face=verdana size=1>You do not have enough cash!</font>'); }
                    mysql_query("INSERT INTO `crewperksbought` (username,id,perk,crewid) VALUES ('$usernameone','','5','$crewid')");
                    $perk5 = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '5'"));
                    if($perk5 > 0){ mysql_query("UPDATE crewperks SET timer = (timer + 3600) WHERE crewid = '$crewid' AND perk = '5'"); }
                    else{ mysql_query("INSERT INTO `crewperks` (crewid,perk,timer) VALUES ('$crewid','5','$times')");
                    }
                $showoutcome++; $outcome = "You bought the perk!";
            }
            if(isset($_POST['perk_6'])){
                    $times = $time + 3600;
                    mysql_query("UPDATE users SET points = (points - 2000) WHERE id = '$ida' AND points > '2000'");
                    if (mysql_affected_rows()==0){ die('<font color=white face=verdana size=1>You do not have enough cash!</font>'); }
                    mysql_query("INSERT INTO `crewperksbought` (username,id,perk,crewid) VALUES ('$usernameone','','6','$crewid')");
                    $perk6 = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '6'"));
                    if($perk6 > 0){ mysql_query("UPDATE crewperks SET timer = (timer + 3600) WHERE crewid = '$crewid' AND perk = '6'"); }
                    else{ mysql_query("INSERT INTO `crewperks` (crewid,perk,timer) VALUES ('$crewid','6','$times')");
                    }
                $showoutcome++; $outcome = "You bought the perk!";
            }

            if($crewperk == 0){ $currentperk = "<b>None</b>"; }
            elseif($crewperk == 1){ $currentperk = "<b>Perk 1</b> - <i>Extra Rankup</i>"; }
            elseif($crewperk == 2){ $currentperk = "<b>Perk 2</b> - <i>Extra Money</i>"; }
            elseif($crewperk == 3){ $currentperk = "<b>Perk 3</b> - <i>Harder to be Killed</i>"; }
            elseif($crewperk == 4){ $currentperk = "<b>Perk 4</b> - <i>Cars worth more bullets</i>"; }
            elseif($crewperk == 5){ $currentperk = "<b>Perk 5</b> - <i>Jail Busting</i>"; }
            elseif($crewperk == 6){ $currentperk = "<b>Perk 6</b> - <i>Car Stealing</i>"; }

            $getperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid'"));

            $crewbosscheck = mysql_query("SELECT * FROM crews WHERE id = '$getcrewid'");
            $crewinfoarray = mysql_fetch_array($crewbosscheck);
            $crewbullets = $crewinfoarray['bullets'];
            $crewbank = $crewinfoarray['cash'];
            $melt = $crewinfoarray['melt'];
            $currentboss = $crewinfoarray['boss'];

            ?>
            <? if ($showoutcome >= 1) { ?>
                <span><? echo $outcome; ?></span>
            <? } ?>
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="top">
                        <div class="main curve2px">
                            <div class="menuHeader noTop">
                                Crew Management
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <span id="notification" class="info js-parent" data-finish-text="...">
                                        <? if($getperk > 0){
                                            $perkk1 = mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' ORDER BY perk");
                                            while($p1 = mysql_fetch_array($perkk1)){
                                                $perkk = $p1['perk'];
                                                $time = time();
                                                $timer = ceil($p1['timer']);
                                                $htime = $timer - $time;
                                                $totalh = $htime / 3600;
                                                $totalh = floor($totalh);
                                                if($totalh < 10){$leading = 0;}
                                                else{$leading='';}
                                                echo"Time left with perk $perkk: <font color=silver>";echo"$leading";echo"$totalh";echo date( ":i:s", $timer - $time); echo "</font><br>";
                                            }}
                                        ?>
                                    </span><br/>
                                    <form action="" method="post">
                                        <table class="regTable" style="min-width: 450px; width: 100%; max-width: 700px;margin-bottom: 23px;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody><tr>
                                            <td class="header" colspan="45" style="padding: 11px;">
                                                Members:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="subHeader" colspan="2" style="border-left: 0; width: 22%;">Username</td>
                                            <td class="subHeader" style="width: 20%;">Rank</td>
                                            <td class="subHeader" style="width: 20%;">Bullets</td>
                                            <td class="subHeader" style="width: 20%;">Armour</td>
                                            <td class="subHeader" style="width: 20%;">Weapon</td>
                                            <td class="subHeader" style="width: 54%;">Recruiter</td>
                                        </tr>
                                        <?
                                        $cont=0;
                                        while($crewusersinfoarray = mysql_fetch_array($crewusersinfosql)){
                                            $cont++;
                                            $crewusername = $crewusersinfoarray['username'];
                                            $crewuserrank = $crewusersinfoarray['rankid'];
                                            $crewcrewid = $crewusersinfoarray['crewid'];
                                            $crewuserstatus = $crewusersinfoarray['status'];
                                            $crewusergun = $crewusersinfoarray['gun'];
                                            $crewuserpro = $crewusersinfoarray['protection'];
                                            $activity = $crewusersinfoarray['activity'];
                                            $buls = number_format($crewusersinfoarray['bullets']);
                                            $crewuserid = $crewusersinfoarray['ID'];
                                            $ents= $crewusersinfoarray['ent'];
                                            $bodyguards = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$crewusername' AND status = '2'"));

                                            if($crewuserstatus == 'Dead' || $crewuserstatus == 'Modkilled')
                                            {$colorone = '#550000';}
                                            else{$colorone = '';}

                                            if($crewusergun == '0'){ $crewgun = 'None';}
                                            elseif($crewusergun == '1'){ $crewgun = 'MG-42';}
                                            elseif($crewusergun == '2'){ $crewgun = 'Glock Handgun';}
                                            elseif($crewusergun == '3'){ $crewgun = 'Lee-Enfield';}
                                            elseif($crewusergun == '4'){ $crewgun = '.50 BMG';}
                                            elseif($crewusergun == '5'){ $crewgun = '.44 Magnum';}
                                            elseif($crewusergun == '6'){ $crewgun = 'Bolt Action Rifle';}
                                            elseif($crewusergun == '7'){ $crewgun = 'Colt Revolver';}
                                            elseif($crewusergun == '8'){ $crewgun = 'Henry Rifle';}
                                            elseif($crewusergun == '9'){ $crewgun = 'AK-47';}
                                            elseif($crewusergun == '10'){$crewgun = 'Beretta M501';}
                                            else{$crewgun = 'Error, please contact the administrator immediately';}

                                            if($crewuserpro == '0'){ $crewpro = 'None';}
                                            elseif($crewuserpro == '1'){ $crewpro = 'Hooded Hauberk';}
                                            elseif($crewuserpro == '2'){ $crewpro = 'Hooded Chainmail';}
                                            elseif($crewuserpro == '3'){ $crewpro = 'Lorica Segmenta';}
                                            elseif($crewuserpro == '4'){ $crewpro = 'Black Knight Armour Suit';}
                                            elseif($crewuserpro == '5'){ $crewpro = 'Triple Disc Cuirass';}
                                            elseif($crewuserpro == '6'){ $crewpro = 'British Armour Suit';}
                                            elseif($crewuserpro == '7'){ $crewpro = 'Scottish Armour Suit';}
                                            elseif($crewuserpro == '8'){ $crewpro = 'Metal Breastplate';}
                                            elseif($crewuserpro == '9'){ $crewpro = 'Light SWAT Vest';}
                                            elseif($crewuserpro == '10'){ $crewpro = 'Medium SWAT Vest';}
                                            elseif($crewuserpro == '11'){ $crewpro = 'Heavy SWAT Vest';}
                                            else{$crewpro = 'Error, please contact the administrator immediately';}

                                            $etests = $ents;

                                            if($etests > '0'){$crewrank = 'Entertainer';}
                                            elseif($crewuserrank == '1'){ $crewrank = "$rank1";}
                                            elseif($crewuserrank == '2'){ $crewrank = "$rank2";}
                                            elseif($crewuserrank == '3'){ $crewrank = "$rank3";}
                                            elseif($crewuserrank == '4'){ $crewrank = "$rank4";}
                                            elseif($crewuserrank == '5'){ $crewrank = "$rank5";}
                                            elseif($crewuserrank == '6'){ $crewrank = "$rank6";}
                                            elseif($crewuserrank == '7'){ $crewrank = "$rank7";}
                                            elseif($crewuserrank == '8'){ $crewrank = "$rank8";}
                                            elseif($crewuserrank == '9'){ $crewrank = "$rank9";}
                                            elseif($crewuserrank == '10'){ $crewrank = "$rank10";}
                                            elseif($crewuserrank == '11'){ $crewrank = "$rank11";}
                                            elseif($crewuserrank == '12'){ $crewrank = "$rank12";}
                                            elseif($crewuserrank == '13'){ $crewrank = "$rank13";}
                                            elseif($crewuserrank == '14'){ $crewrank = "$rank14";}
                                            elseif($crewuserrank == '15'){ $crewrank = "$rank15";}
                                            elseif($crewuserrank == '16'){ $crewrank = "$rank16";}
                                            elseif($crewuserrank == '17'){ $crewrank = "$rank17";}
                                            elseif($crewuserrank == '18'){ $crewrank = "$rank18";}
                                            elseif($crewuserrank == '19'){ $crewrank = "$rank19";}
                                            elseif($crewuserrank == '20'){ $crewrank = "$rank20";}
                                            elseif($crewuserrank == '21'){ $crewrank = "$rank21";}
                                            elseif($crewuserrank == '22'){ $crewrank = "$rank22";}
                                            elseif($crewuserrank == '25'){ $crewrank = 'Moderator';}
                                            elseif($crewuserrank == '50'){ $crewrank = 'Entertainer Manager';}
                                            elseif($crewuserrank == '75'){ $crewrank = 'HDO Manager';}
                                            elseif($crewuserrank == '100'){ $crewrank = 'Administrator';}
                                            else{$crewrank = 'Error, please contact the administrator immediately';}
                                            $etests = 0;
                                            $rrightsrows = $crewusersinfoarray['rr'];

                                            $crewusernameunderboss = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$crewusername' AND crew = '$crewcrewid'"));
                                            if($crewusernameunderboss>0){
                                                $underboss=true;
                                            }else{
                                                $underboss=false;
                                            }
                                            $crewunderbosscheck = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss = '$crewusername' AND id = '$crewcrewid'"));

                                            if($crewunderbosscheck>0){
                                                $boss=true;
                                            }else{
                                                $boss=false;
                                            }
                                            if($rrightsrows == '0'){$colorthree = "";$recruiter = "";}else{$colorthree = "(R)";$recruiter = "Recruiter";}

                                            if($cont==1){?>
                                                <tr >
                                                    <td class="col noTop" style="width: 1%;<?if($colorone!=''){echo "background-color:".$colorone.";";}elseif($boss){echo "background-color:#2b2b2b;";}?>"><input name="select" id="select<?echo$cont;?>" value="<?echo$crewuserid;?>" type="radio"></td>
                                                    <td class="col noTop" style="padding-right: 10px;<?if($colorone!=''){echo "background-color:".$colorone.";";}elseif($boss){echo "background-color:#2b2b2b;";}?>"><a href=viewprofile.php?username=<?echo$crewusername;?>><?echo$crewusername;?></a><?if($boss){echo " (Boss)";}elseif($underboss){echo " (Underboss)";}?></td>
                                                    <td class="col noTop" style="padding-right: 10px;<?if($colorone!=''){echo "background-color:".$colorone.";";}elseif($boss){echo "background-color:#2b2b2b;";}?>"><?echo$crewrank;?></td>
                                                    <td class="col noTop" style="padding-right: 10px;<?if($colorone!=''){echo "background-color:".$colorone.";";}elseif($boss){echo "background-color:#2b2b2b;";}?>"><?echo$buls;?></td>
                                                    <td class="col noTop" style="padding-right: 10px;<?if($colorone!=''){echo "background-color:".$colorone.";";}elseif($boss){echo "background-color:#2b2b2b;";}?>"><?echo $crewpro;?></td>
                                                    <td class="col noTop" style="padding-right: 10px;<?if($colorone!=''){echo "background-color:".$colorone.";";}elseif($boss){echo "background-color:#2b2b2b;";}?>"><?echo $crewgun;?></td>
                                                    <td class="col noTop" style="padding-right: 10px;<?if($colorone!='' && $recruiter==''){echo "background-color:".$colorone."";}elseif($recruiter=="Recruiter"){echo "background-color:#b69246;";}elseif($boss){echo "background-color:#2b2b2b;";}?>"></td>
                                                </tr>
                                            <?}else{?>
                                                <tr <?if($colorone!=''){echo "style='background-color:".$colorone."'";}?>>
                                                    <td class="col " style="width: 1%;<?if($colorone!=''){echo "background-color:".$colorone.";";}elseif($boss){echo "background-color:#2b2b2b;";}?>"><input name="select" id="select<?echo$cont;?>" value="<?echo$crewuserid;?>" type="radio"></td>
                                                    <td class="col " style="padding-right: 10px;<?if($colorone!=''){echo "background-color:".$colorone.";";}elseif($boss){echo "background-color:#2b2b2b;";}?>"><a href=viewprofile.php?username=<?echo$crewusername;?>><?echo$crewusername;?></a><?if($boss){echo " (Boss)";}elseif($underboss){echo " (Underboss)";}?></td>
                                                    <td class="col " style="padding-right: 10px;<?if($colorone!=''){echo "background-color:".$colorone.";";}elseif($boss){echo "background-color:#2b2b2b;";}?>"><?echo$crewrank;?></td>
                                                    <td class="col " style="padding-right: 10px;<?if($colorone!=''){echo "background-color:".$colorone.";";}elseif($boss){echo "background-color:#2b2b2b;";}?>"><?echo$buls;?></td>
                                                    <td class="col " style="padding-right: 10px;<?if($colorone!=''){echo "background-color:".$colorone.";";}elseif($boss){echo "background-color:#2b2b2b;";}?>"><?echo $crewpro;?></td>
                                                    <td class="col " style="padding-right: 10px;<?if($colorone!=''){echo "background-color:".$colorone.";";}elseif($boss){echo "background-color:#2b2b2b;";}?>"><?echo $crewgun;?></td>
                                                    <td class="col " style="padding-right: 10px;<?if($colorone!='' && $recruiter==''){echo "background-color:".$colorone."";}elseif($recruiter=="Recruiter"){echo "background-color:#b69246;";}elseif($boss){echo "background-color:#2b2b2b;";}?>"></td>
                                                </tr>
                                            <?}?>
                                        <?}?>
                                        </tbody>
                                        </table>

                                        <input type="submit" value="Kick" class="textarea" name="kick">
                                        <input type="submit" value="Give Crew" class="textarea" name="sendcrew">
                                        <input type="submit" value="Kick Dead Members" class="textarea" name="kickdead">
                                        <input type="submit" value="Make Underboss" class="textarea" name="makeunderboss">
                                        <input type="submit" value="Remove Underboss" class="textarea" name="clearunderboss">
                                        <input type="submit" value="Make Recruiter" class="textarea" name="recruiter">
                                        <input type="submit" value="Remove Recruiter" class="textarea" name="undorecruiter">

                                        <div class="break" style="padding-top: 19px;"></div>
                                        <div class="spacer"></div>
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 19px;"></div>
                                        <div style="margin-top: 29px; font-size: 12px;">
                                            <span style="color:#a8a8a8;">Crew Cash:</span> <? echo number_format($crewbank);?>
                                            <input type="text" class="textarea" placeholder="Enter amount to Send..." name="cash">
                                            <input type="submit" value="Give Cash" class="textarea" name="docash">
                                        </div>

                                        <div style="margin-top: 29px; font-size: 12px;">
                                            <span style="color:#a8a8a8;">Crew Bullets:</span> <? echo number_format($crewbullets);?>
                                            <input type="text" class="textarea" placeholder="Enter amount to Send..." name="give">
                                            <input type="submit" value="Give Bullets" class="textarea" name="dogive">
                                        </div>
                                    </form>

                                    <div class="break" style="padding-top: 19px;"></div>
                                    <div class="spacer"></div>
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 19px;"></div>

                                    <? if($crewbosscheckrows > 0){
                                        $crewunderboss1 = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$crewid' AND management = '1'"));
                                        $crewunderboss2 = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$crewid' AND profile = '1'"));
                                        $crewunderboss3 = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$crewid' AND cc = '1'"));
                                        if($crewunderboss1 > 0){ $underbosstext = "Deny"; }else{ $underbosstext = "Allow"; }
                                        if($crewunderboss2 > 0){ $underbosstext2 = "Deny"; }else{ $underbosstext2 = "Allow"; }
                                        if($crewunderboss3 > 0){ $underbosstext3 = "Deny"; }else{ $underbosstext3 = "Allow"; }
                                        ?>
                                        <table class="regTable" style="min-width: 450px; width: 96%; max-width: 260px;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody><tr>
                                                <td class="header" colspan="2" style="padding: 11px;">
                                                    Underboss Access:
                                                </td>
                                            </tr>
                                            <form method=post>
                                            <tr>
                                                <td class="col noTop" style="padding-right: 10px;width: 70%;"><?echo$underbosstext;?> access to management</td>
                                                <td class="col noTop" style="padding-right: 10px;width: 30%;"><input type=submit name=allow1 value="Select" class="textarea" style="width: 100%;"></td>
                                            </tr>
                                            </form>
                                            <form method=post>
                                            <tr>
                                                <td class="col " style="padding-right: 10px;width: 70%;"><?echo$underbosstext2;?> access to crew profile</td>
                                                <td class="col " style="padding-right: 10px;width: 30%;"><input type=submit name=allow2 value="Select" class="textarea" style="width: 100%;"></td>
                                            </tr>
                                            </form>
                                            <form method=post>
                                            <tr>
                                                <td class="col " style="padding-right: 10px;width: 70%;"><?echo$underbosstext3;?> access to crew city crime</td>
                                                <td class="col " style="padding-right: 10px;width: 30%;"><input type=submit name=allow3 value="Select" class="textarea" style="width: 100%;"></td>
                                            </tr>
                                            </form>
                                            </tbody>
                                        </table>
                                    <? } ?>

                                    <div class="break" style="padding-top: 19px;"></div>
                                    <div class="spacer"></div>
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 19px;"></div>

                                    <?
                                    if($hmmm == 'manual'){ $dobgcolor = "222222"; }else{ $dobgcolor = "282828"; }
                                    if($hmmm == 'accept'){ $dobgcolor2 = "222222"; }else{ $dobgcolor2 = "282828"; }
                                    if($hmmm == 'reject'){ $dobgcolor3 = "222222"; }else{ $dobgcolor3 = "282828"; }
                                    ?>
                                    <table class="regTable" style="min-width: 450px; width: 96%; max-width: 260px;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody><tr>
                                            <td class="header" colspan="2" style="padding: 11px;">
                                                Recruitment:
                                            </td>
                                        </tr>
                                        <form method=post>
                                            <tr>
                                                <td class="col noTop" style="padding-right: 10px;width: 70%;">Manage manually</td>
                                                <td class="col noTop" style="padding-right: 10px;width: 30%;">
                                                    <input type="hidden" name="radiobutton" value="1">
                                                    <input type=submit name=manageapp value="Select" class="textarea" style="width: 100%;">
                                                </td>
                                            </tr>
                                        </form>
                                        <form method=post>
                                            <tr>
                                                <td class="col " style="padding-right: 10px;width: 70%;">Accept all users automatically</td>
                                                <td class="col " style="padding-right: 10px;width: 30%;">
                                                    <input type="hidden" name="radiobutton" value="2">
                                                    <input type=submit name=manageapp value="Select" class="textarea" style="width: 100%;">
                                                </td>
                                            </tr>
                                        </form>
                                        <form method=post>
                                            <tr>
                                                <td class="col " style="padding-right: 10px;width: 70%;">Reject all users automatically</td>
                                                <td class="col " style="padding-right: 10px;width: 30%;">
                                                    <input type="hidden" name="radiobutton" value="3">
                                                    <input type=submit name=manageapp value="Select" class="textarea" style="width: 100%;">
                                                </td>
                                            </tr>
                                        </form>
                                        </tbody>
                                    </table>

                                    <div class="break" style="padding-top: 19px;"></div>
                                    <div class="spacer"></div>
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 19px;"></div>

                                    <form action="" method="post" style="font-size: 12px;">
                                        <span style="color:#a8a8a8;">Add crew to quicktrade (setting to 0 will remove the offer):</span>
                                        <input type="text" class="textarea" name="amount" placeholder="Enter Points Amount...">
                                        <input class="textarea curve3px" name="sellcrew" value="Update" type="submit">
                                    </form>

                                    <div class="break" style="padding-top: 19px;"></div>
                                    <div class="spacer"></div>
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 19px;"></div>

                                    <form action="" method="post" style="margin-top: 29px; font-size: 12px;">
                                        Perk: Earn extra rankup as easy as your previous rank (2,000 Points) <input type ="submit" name="perk_1" class="textarea curve3px" value="Buy">
                                    </form>
                                    <form action="" method="post" style="margin-top: 29px; font-size: 12px;">
                                        Perk: Earn 25% extra money through crimes (2,000 Points) <input type ="submit" name="perk_2" class="textarea curve3px" value="Buy">
                                    </form>
                                    <form action="" method="post" style="margin-top: 29px; font-size: 12px;">
                                        Perk: Bullets required to be killed will value two ranks above (2,000 Points) <input type ="submit" name="perk_3" class="textarea curve3px" value="Buy">
                                    </form>
                                    <form action="" method="post" style="margin-top: 29px; font-size: 12px;">
                                        Perk: Cars are worth 25% extra bullets when melting (2,000 Points) <input type ="submit" name="perk_4" class="textarea curve3px" value="Buy">
                                    </form>
                                    <form action="" method="post" style="margin-top: 29px; font-size: 12px;">
                                        Perk: Higher success rate of jail busting (2,000 Points) <input type ="submit" name="perk_5" class="textarea curve3px" value="Buy">
                                    </form>
                                    <form action="" method="post" style="margin-top: 29px; font-size: 12px;">
                                        Perk: Increase chances of stealing better cars (2,000 Points) <input type ="submit" name="perk_6" class="textarea curve3px" value="Buy">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
        </td>
        <td width="232px" style="min-width: 232px;" valign="top">
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td><? include 'rightmenu.php'; ?></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
            <?

include 'included.php'; session_start();

$getinfoarray = $statustesttwo;
$getcrewid = $getinfoarray['crewid'];
$getname = $getinfoarray['username'];

$time = time();
$timetwo = $time-3000;

$acount = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid='$getcrewid' and activity >= '$timetwo'"));

            if($getcrewid==0){?>
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td>
                        <div class="crewFeed" style="position: relative;">
                            <div class="menuHeader noTop"
                                 style="position: absolute; margin-top: -1px; width: 100%; box-sizing: border-box; -moz-box-sizing: border-box; z-index: 1;">
                                Crew Feed
                                <span style="z-index: 0; margin-top: 1px; float: right; color: white; opacity: 0.88; font-size: 9px;"></span>
                            </div>
                            <div style="margin-left: -9px; padding-bottom: 13px; padding-top: 38px; text-align: center;">
                                <a href="crews.php">Join a Crew</a>
                            </div>
                        </div>
                    </td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
            <?}else{?>
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td>
                        <div class="crewFeed" style="position: relative;">
                            <div class="menuHeader noTop"
                                 style="position: absolute; margin-top: -1px; width: 100%; box-sizing: border-box; -moz-box-sizing: border-box; z-index: 1;">
                                Crew Feed <span
                                        style="z-index: 0; margin-top: 1px; float: right; color: white; opacity: 0.88; font-size: 9px;"><? echo $acount;?>
                                    <span class="membersOnline twinkle"
                                          style="position: relative; top: -0.75px;">•</span></span>
                                <?
                        $getcrewsql = mysql_query("SELECT boss,id,name FROM crews WHERE id = '$getcrewid'");
                        $getcrewarray = mysql_fetch_array($getcrewsql);

                        $getcrewboss = $getcrewarray['boss'];
                        if($getcrewboss == $getname){?>
                                <a style="margin-left: -35px; float: right; padding-left: 3px; margin-right: 8px; padding-top: 0px; font-size: 9px; opacity: 0.25;"
                                   href="#" onclick="clearFeed();">wipe</a>
                                <?}?>
                            </div>
                            <div class="preventscroll crewFeedScroll" id="crewFeedScrollID" style="max-height: 330px;">
                                <div id="crewFeedChat" style="max-width: 218px;">
                                    <?
                                        if(isset($_SESSION['chat'])){
                                            echo $_SESSION['chat'];
                                        }
                                    ?>
                                </div>
                                <form method="post" onsubmit="submitCrewFeed(); return false;">
                                    <input type="hidden" value="<?echo $statustesttwo['username'];?>" id="feed_name">
                                    <input type="hidden" value="<?echo $statustesttwo['crewid'];?>" id="feed_crew">
                                    <input class="textarea" id="feed_msg"                                           style="box-sizing: border-box; -moz-box-sizing: border-box; width: 100%; position: absolute; bottom: 0; margin-bottom: -1px; border-top: 2px solid rgba(20, 20, 20, 0.8); border-bottom: 0; border-left: 0; border-right: 0;"                                           placeholder="Enter Message..." type="text">                                </form>                            </div>                        </div>                    </td>                    <td class="right"></td>                </tr>                <tr>                    <td class="bottomleft"></td>                    <td class="bottom"></td>                    <td class="bottomright"></td>                </tr>            </table><div style="padding: 10px; font-size: 9.5px; opacity:0.7; text-align: center;">You can mute sounds in <a href="profile.php">Edit Profile</a>		</div>
            <?}?>
        </td>
    </tr>
</table>
</body>
</html>