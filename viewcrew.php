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
            $allowed = "/[^0-9]/i";
            $allow = "/[^a-z0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $playerip = $_SERVER['REMOTE_ADDR'];
            $sessionid = preg_replace($allow,"",$sessionidraw);
            $getcrewidraw = $_GET['crewid'];
            $getcrewid = preg_replace($allowed,"",$getcrewidraw);

            $username = $usernameone;
            $userarray = $statustesttwo;
            $myrank = $userarray['rankid'];
            $userspoints = $userarray['points'];
            $usersmoney = $userarray['money'];
            $time = time();

            $crewinfosql = mysql_query("SELECT * FROM crews WHERE id = '$getcrewid'");
            $crewinfoarray = mysql_fetch_array($crewinfosql);
            $crewnameraw = $crewinfoarray['name'];
            $crewperk = $crewinfoarray['perk'];
            $change = $crewinfoarray['hdo'];
            if($getcrewid == 1){ $crewboss = "Jack"; }else{ $crewboss = $crewinfoarray['boss']; }
            $createdby = $crewinfoarray['createdby'];
            $sell = number_format($crewinfoarray['sell']);
            $selll = $crewinfoarray['sell'];
            $type = $crewinfoarray['type'];
            $crewor = $crewinfoarray['timer'];
            $isthereunderboss = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$getcrewid'"));
            if($isthereunderboss > 0){
                $getcrewunderboss = mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$getcrewid'");
                $underbossinfo = mysql_fetch_array($getcrewunderboss);
                $crewunderboss = "<a href=\"viewprofile.php?username=".$underbossinfo['username']."\">".$underbossinfo['username']."</a>"; }
            else{
                $crewunderboss='-';
            }

            $pbuyers = mysql_query("SELECT * FROM crewperksbought WHERE crewid = '$getcrewid' ORDER BY id DESC");
            $checkbuy = mysql_num_rows($pbuyers);
            $total_perks='';
            if($checkbuy < 1){
                $total_perks='None';
            } else{
                $cont=0;
                $perkk1 = mysql_query("SELECT * FROM crewperks WHERE crewid = '$getcrewid' ORDER BY perk");
                while($p1 = mysql_fetch_array($perkk1)){
                    $cont++;
                    $perkk = $p1['perk'];
                    $time = time();
                    $timer = ceil($p1['timer']);
                    $htime = $timer - $time;
                    $totalh = $htime / 3600;
                    $totalh = floor($totalh);
                    if($totalh < '10'){$leading = 0;}
                    if($cont==1){
                        $total_perks.="$perkk";
                    }else{
                        $total_perks.=", $perkk";
                    }
                }
//                while($getit = mysql_fetch_array($pbuyers)){
//                    $cont++;
//                    if($cont==1){
//                        if($getit['perk'] == 0){ $total_perks = "<b>None</b>"; }
//                        elseif($getit['perk'] == 1){ $total_perks = "Extra Rankup"; }
//                        elseif($getit['perk'] == 2){ $total_perks = "Extra Money"; }
//                        elseif($getit['perk'] == 3){ $total_perks = "Harder to be Killed"; }
//                        elseif($getit['perk'] == 4){ $total_perks = "Cars worth more bullets"; }
//                        elseif($getit['perk'] == 5){ $total_perks = "Jail Busting"; }
//                        elseif($getit['perk'] == 6){ $total_perks = "Car Stealing"; }
//                    }else{
//                        if($getit['perk'] == 0){ $total_perks = "<b>None</b>"; }
//                        elseif($getit['perk'] == 1){ $total_perks = $total_perks." & Extra Rankup"; }
//                        elseif($getit['perk'] == 2){ $total_perks = $total_perks." & Extra Money"; }
//                        elseif($getit['perk'] == 3){ $total_perks = $total_perks." & Harder to be Killed"; }
//                        elseif($getit['perk'] == 4){ $total_perks = $total_perks." & Cars worth more bullets"; }
//                        elseif($getit['perk'] == 5){ $total_perks = $total_perks." & Jail Busting"; }
//                        elseif($getit['perk'] == 6){ $total_perks = $total_perks." & Car Stealing"; }
//                    }
//                }
            }

            $getboss = mysql_query("SELECT addition FROM users WHERE username = '$crewboss'");
            $getarray = mysql_fetch_array($getboss);
            $add = $getarray['addition'];
            $or = $crewor - $time - $chk;
            if($add = '28800'){ $or = $crewor - $time - 7200; }
            $totalh = $or / 3600;
            $totalh = floor($totalh);
            if($totalh == '10'){$leading = ' ';}elseif($totalh <= '9'){$leading = 0;}

            if($type == 'points'){ $hmm = "$sell points"; }else{ $hmm = "$$sell"; }
            $members = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid='$getcrewid'"));
            $crewprofilerawraw = html_entity_decode($crewinfoarray['crewprofile'],  ENT_NOQUOTES);
            $crewnamea = html_entity_decode($crewnameraw, ENT_NOQUOTES);
            $zpattern[a] = "<";
            $zpattern[b] = ">";
            $zreplace[a] = "&lt;";
            $zreplace[b] = "&gt;";
            $crewname = str_replace($zpattern,$zreplace,$crewnamea);
            $crewprofilerawrawa = str_replace($zpattern,$zreplace,$crewprofilerawraw);

            if($getcrewid != '0'){
                $crewmemberssql = mysql_query("SELECT username,status FROM users WHERE crewid = '$getcrewid' ORDER BY id ASC");}

            if(($myrank == '100')||($myrank == '75')){
                if(isset($_POST['clearprofile'])) {
                    mysql_query("UPDATE crews SET crewprofile = 'Profile cleared by $username!' WHERE id = '$getcrewid'");
                    echo'<font color="silver" size="1" face="verdana">Profile cleared!</font>'; }}

            if($_POST['buycrew']){
                $ifowner = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss = '$usernameone'"));
                if($ifowner >= 1){ echo "<font color=white size=1 face=verdana>You already own a crew!"; }
                elseif($type == 'points' AND $userspoints < $selll){ echo "<font color=white size=1 face=verdana>You do not have enough points to buy this crew!"; }
                elseif($type == 'money' AND $usersmoney < $selll){ echo "<font color=white size=1 face=verdana>You do not have enough money to buy this crew!"; }
                else{
                    if($type == 'points'){ mysql_query("UPDATE users SET points = (points - '$selll') WHERE id = '$ida'");
                        mysql_query("UPDATE users SET points = (points + '$selll') WHERE username = '$crewboss'"); }
                    if($type == 'money'){ mysql_query("UPDATE users SET money = (money - '$selll') WHERE id = '$ida'");
                        mysql_query("UPDATE users SET money = (money + '$selll') WHERE username = '$crewboss'"); }
                    mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$crewboss','$crewboss','1','$userip','$usernameone bought your crew!')");
                    mysql_query("UPDATE users SET mail = (mail + 1) WHERE username = '$crewboss'");
                    mysql_query("UPDATE users SET crewid = '$getcrewid' WHERE id = '$ida'");
                    mysql_query("DELETE FROM applicants WHERE username = '$usernameone'");
                    mysql_query("DELETE FROM recruiters WHERE username = '$usernameone'");
                    mysql_query("UPDATE crews SET boss = '$usernameone' WHERE id = '$getcrewid'");
                    mysql_query("UPDATE crews SET sell = '0', type = '' WHERE id = '$getcrewid'");
                    echo "<font color=white size=1 face=verdana>You are the new boss of $crewnamea!"; }} ?>
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
                                Crew Profile: <span style="color: #FFC753;"><?echo $crewname;?></span>
                            </div>
                            <? $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$getcrewid'"));
                            $areyouforsale = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE id = '$getcrewid' AND type != ''"));?>
                            <div class="shadowTest" style="position: relative; background-color: #323232; padding-top: 0px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;border-bottom: 1px solid #252525;">
                                <div style="position: absolute; right: 70%; top: 60px;">
                                    <? if($crewperk > 0){ ?>
                                        <div>
                                            <?
                                            $crewhasperks = mysql_query("SELECT * FROM crewperks WHERE crewid = '$getcrewid' ORDER BY perk");
                                            while($crewperkss = mysql_fetch_array($crewhasperks)){
                                                $crewperkk = $crewperkss['perk'];
                                                echo "<img src=layout/perks/perk$crewperkk.png>"; }
                                            ?>
                                        </div>
                                    <? } ?>
                                    </div>
                                </div>
                                <div class="profileItem" style="padding-top: 3px;">
                                    Crew:
                                    <span class="profileItemVal"><?echo $crewname;?></span>
                                </div>
                                <div class="profileItem">
                                    Boss:
                                    <a href="viewprofile.php?username=<? echo $crewboss; ?>"><? echo $crewboss; ?></a> </div>
                                <div class="profileItem">
                                    Underboss:
                                    <? echo $crewunderboss; ?> </div>
                                <div class="profileItem">
                                    Crew Perks:
                                    <span class="profileItemVal"><?echo $total_perks;?></span>
                                </div>
                                <div class="profileItem">
                                    Crew Members:
                                    <span class="profileItemVal"><? echo number_format($members); ?></span>
                                </div>
                                <div class="profileItem" style=" padding-bottom: 3px; ">
                                    Crew OC:
                                    <?if($or < 1){echo"<span style=\"color: lime;\">Available</span>";}else{echo"<span style='color:red;'>".$leading;echo"$totalh";echo date( ":i:s", $crewor - $time)."</span>";}?>
                                </div>
                                <? if($myrank >= '100'){?>
                                    <div class="profileItem" style=" padding-bottom: 3px; ">
                                        <a href="admincrewforum.php?crewid=<?echo$getcrewid;?>"><b>View Crew Forum:</b></a>
                                    </div>
                                <?}?>
                            </div>
                            <div style="background-color: #333333; padding-bottom: 5px; width: 100%; text-align: left;">

                                <?if(($myrank == '100')||($myrank == '75')){
                    echo('<form action="" method="post" style="text-align: center;padding-top: 10px;margin-bottom: 0px;"><input type="submit" value="Clear profile" class="textarea curve3px" name="clearprofile"></form>');
                }?>

                <div class="profile" style="min-height: 90px; padding: 15px; color: silver;font-size: 10px;">
                                    <span style="color: #aaaaaa; margin: 1px; display: inline-block;">Crew Members:</span>
                                    <?
                                    $cont=0;
                                    while($crewmembersarray = mysql_fetch_array($crewmemberssql)){
                                        $cont++;
                                        $members = $crewmembersarray['username'];
                                        $membersstatus = $crewmembersarray['status'];

                                        if($membersstatus == 'Alive'){
                                            if($cont==1){
                                                echo"<a style=\" display: inline-block; font-weight: bold; margin: 1px;\" href=\"viewprofile.php?username=$members\">$members</a>";
                                            }else{
                                                echo"<span style=\"color: #777777;\"> - </span><a style=\" display: inline-block; font-weight: bold; margin: 1px;\" href=\"viewprofile.php?username=$members\">$members</a>";
                                            }
                                        } else{
                                            if($cont==1){
                                                echo"<a style=\" display: inline-block; font-weight: bold; margin: 1px;color:black;\" href=\"viewprofile.php?username=$members\">$members(RIP)</a>";
                                            }else{
                                                echo"<span style=\"color: #777777;\"> - </span><a style=\" display: inline-block; font-weight: bold; margin: 1px; color:black;\" href=\"viewprofile.php?username=$members\">$members(RIP)</a>";
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="break" style="padding-top: 13px;"></div>
                                    <div class="spacer" style="width: 100%;"></div>
                                    <div class="break" style="padding-top: 26px;"></div>
                                    <?
                                    $apattern[1] = "/\[b\](.*?)\[\/b\]/is";
                                    $apattern[2] = "/\[u\](.*?)\[\/u\]/is";
                                    $apattern[3] = "/\[i\](.*?)\[\/i\]/is";
                                    $apattern[4] = "/\[center\](.*?)\[\/center\]/is";
                                    $apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
                                    $apattern[6] = "/\[img\](.*?)\[\/img\]/is";
                                    $apattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
                                    $apattern[8] = "/\[br\]/is";
                                    $apattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
                                    $apattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
                                    $apattern[11] = "/\[left\](.*?)\[\/left\]/is";
                                    $apattern[12] = "/\[right\](.*?)\[\/right\]/is";
                                    $apattern[13] = "/\[s\](.*?)\[\/s\]/is";
                                    $apattern[14] = "/\[2872267\](.*?)\[\/2872267\]/is";
                                    $areplace[1] = "<b>$1</b>";
                                    $areplace[2] = "<u>$1</u>";
                                    $areplace[3] = "<i>$1</i>";
                                    $areplace[4] = "<center>$1</center>";
                                    $areplace[5] = "<font color=\"$1\">$2</font><font color=\"silver\">";
                                    $areplace[6] = "<img src=\"$1\">";
                                    $areplace[7] = "<font face=\"$1\">$2</font>";
                                    $areplace[8] = "<br>";
                                    $areplace[9] = "<font size=\"$1\">$2</font><font size=\"1\">";
                                    $areplace[10] = "<blockquote><b>$1</b></blockquote>";
                                    $areplace[11] = "<div align=\"left\">$1</div>";
                                    $areplace[12] = "<div align=\"right\">$1</div>";
                                    $areplace[13] = "<s>$1</s>";
                                    $areplace[14] = "<object width=315 height=225><param name=movie value=http://www.youtube.com/v/$1&autoplay=1></param><param name=wmode value=transparent></param><embed src=http://www.youtube.com/v/$1&autoplay=1 type=application/x-shockwave-flash wmode=transparent width=325 height=250></embed></object>";

                                    $crewprofilerawrawb = preg_replace($apattern,$areplace,$crewprofilerawrawa);

                                    $bpattern[1] = ":arrow:";
                                    $bpattern[2] = ":D";
                                    $bpattern[3] = ":S";
                                    $bpattern[4] = "8)";
                                    $bpattern[5] = ":cry:";
                                    $bpattern[6] = "8|";
                                    $bpattern[7] = ":evil:";
                                    $bpattern[8] = ":!:";
                                    $bpattern[9] = ":idea:";
                                    $bpattern[10] = ":lol:";
                                    $bpattern[11] = ":mad:";
                                    $bpattern[12] = ":?:";
                                    $bpattern[13] = ":redface:";
                                    $bpattern[14] = ":rolleyes:";
                                    $bpattern[15] = ":(";
                                    $bpattern[16] = ":)";
                                    $bpattern[17] = ":o";
                                    $bpattern[18] = ":tdn:";
                                    $bpattern[19] = ":P";
                                    $bpattern[20] = ":tup:";
                                    $bpattern[21] = ":twisted:";
                                    $bpattern[22] = ";)";
                                    $bpattern[23] = ":slepy:";
                                    $bpattern[24] = ":whistle:";
                                    $bpattern[25] = ":wub:";
                                    $bpattern[26] = ":muah:";
                                    $bpattern[27] = ":zipped:";
                                    $bpattern[28] = ":love:";
                                    $bpattern[29] = ":sarcasm:";

                                    $breplace[1] = '<img src=/layout/smiles/arrow.gif class="smileys">';
                                    $breplace[2] = '<img src=/layout/smiles/biggrin.gif class="smileys">';
                                    $breplace[3] = '<img src=/layout/smiles/confused.gif class="smileys">';
                                    $breplace[4] = '<img src=/layout/smiles/cool.gif class="smileys">';
                                    $breplace[5] = '<img src=/layout/smiles/cry.gif class="smileys">';
                                    $breplace[6] = '<img src=/layout/smiles/eek.gif class="smileys">';
                                    $breplace[7] = '<img src=/layout/smiles/evil.gif class="smileys">';
                                    $breplace[8] = '<img src=/layout/smiles/exclaim.gif class="smileys">';
                                    $breplace[9] = '<img src=/layout/smiles/idea.gif class="smileys">';
                                    $breplace[10] = '<img src=/layout/smiles/lol.gif class="smileys">';
                                    $breplace[11] = '<img src=/layout/smiles/mad.gif class="smileys">';
                                    $breplace[12] = '<img src=/layout/smiles/question.gif class="smileys">';
                                    $breplace[13] = '<img src=/layout/smiles/redface.gif class="smileys">';
                                    $breplace[14] = '<img src=/layout/smiles/rolleyes.gif class="smileys">';
                                    $breplace[15] = '<img src=/layout/smiles/sad.gif class="smileys">';
                                    $breplace[16] = '<img src=/layout/smiles/smile.gif class="smileys">';
                                    $breplace[17] = '<img src=/layout/smiles/surprised.gif class="smileys">';
                                    $breplace[18] = '<img src=/layout/smiles/tdown.gif class="smileys">';
                                    $breplace[19] = '<img src=/layout/smiles/toungue.gif class="smileys">';
                                    $breplace[20] = '<img src=/layout/smiles/tup.gif class="smileys">';
                                    $breplace[21] = '<img src=/layout/smiles/twisted.gif class="smileys">';
                                    $breplace[22] = '<img src=/layout/smiles/wink.gif class="smileys">';
                                    $breplace[23] = '<img src=/layout/smiles/slepy.png class="smileys">';
                                    $breplace[24] = '<img src=/layout/smiles/whistle.gif class="smileys">';
                                    $breplace[25] = '<img src=/layout/smiles/wub.gif class="smileys">';
                                    $breplace[26] = '<img src=/layout/smiles/muah.gif class="smileys">';
                                    $breplace[27] = '<img src=/layout/smiles/zipped.gif class="smileys">';
                                    $breplace[28] = '<img src=/layout/smiles/love.gif class="smileys">';
                                    $breplace[29] = '<img src=/layout/smiles/sarcasm.gif class="smileys">';

                                    $crewprofile = nl2br(str_replace($bpattern,$breplace,$crewprofilerawrawb));
                                    if(!$crewprofile){echo'No profile has been set';}else{echo"$crewprofile";} ?>
                                    <div class="break" style="padding-top: 12px;"></div>
                                    <div class="spacer"></div>
                                </div>
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