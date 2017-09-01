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
        function removeSubmit(nombre){
            location.href='block.php?remove='+nombre;
        }
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

            $poster = mysql_real_escape_string($_GET['deletepost']);
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $demotehdoraw = mysql_real_escape_string($_POST['demotehdo']);
            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $deletepost = preg_replace($saturated,"",$poster);
            $userip = $_SERVER[REMOTE_ADDR];
            $nameraw = mysql_real_escape_string($_GET['name']);
            $name = preg_replace($saturate,"",$nameraw);
            $gangsterusername = $usernameone;

            $playerarray = $statustesttwo;
            $playerrank = $playerarray['rankid'];

            $newqraw = mysql_real_escape_string($_POST['newq']);
            $newq = htmlentities($newqraw, ENT_QUOTES);

            $getsugs = mysql_query("SELECT * FROM suggestions WHERE username = '$name'");
            $getsugrows = mysql_num_rows($getsugs);
            $getsug = mysql_fetch_array($getsugs);

            $getsugid = $getsug['id'];
            $gitname = $getsug['username'];

            if(isset($_POST['dopost'])) {

                $mutedusernamesql = mysql_query("SELECT username,ip FROM muted WHERE username = '$gangsterusername'")or die(mysql_error());
                $mutedusernamerows = mysql_num_rows($mutedusernamesql);
                $mutedusernamearray = mysql_fetch_array($mutedusernamesql);
                $mutedusernameone = $mutedusernamearray['username'];
                $mutedipone = $mutedusernamearray['ip'];

                $mutedipsql = mysql_query("SELECT username,ip FROM muted WHERE ip = '$userip'")or die(mysql_error());
                $mutediprows  = mysql_num_rows($mutedipsql);
                $mutediparray = mysql_fetch_array($mutedipsql);
                $mutedusernametwo = $mutediparray['username'];
                $mutediptwo = $mutediparray['ip'];

                if($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}
                elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}

                if(!$newq){}
                else{
                    mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername','$topicid','$userip','hdo','$newq','$myrank')");
                    mysql_query("UPDATE users SET posts = (posts + 1) WHERE ID = '$ida'");
                    $showoutcome++; $outcome = "<font size=1 face=verdana color=white>Your question has been submitted, please wait for a HDO to reply to your question.</font>";}}

            $namesi = $_POST['name'];
            $alloweds = "/[^a-z0-9\\\\]/i";
            $namej = preg_replace($alloweds,"",$namesi);

            $check = mysql_query("SELECT * FROM blocked WHERE username = '$namej' AND yourname = '$usernameone'");
            $checkrows = mysql_num_rows($check);

            $selectis=mysql_query("SELECT * FROM users WHERE username = '$namej'");
            $selicis =mysql_fetch_array($selectis);
            $selectoname=$selicis['username'];
            $selectoid=$selicis['ID'];

            if(isset($_GET['remove'])){
                $namej=$_GET['remove'];
                $check = mysql_query("SELECT * FROM blocked WHERE username = '$namej' AND yourname = '$usernameone'");
                $checkrows = mysql_num_rows($check);
                if(!$namej){}
                elseif($checkrows == '0'){ $showoutcome++; $outcome = "You do not have this user blocked";}
                else{
                    mysql_query("DELETE FROM blocked WHERE username = '$namej' AND yourid = '$ida'");
                    $showoutcome++; $outcome = "You unblocked <a href=viewprofile.php?username=$namej><b>$namej</b></a>!";}

            }

            if(isset($_POST['add'])) {
                if(!$selectoname){}
                elseif($checkrows != '0'){ $showoutcome++; $outcome = "You have already blocked <b>$namej</b>";}
                elseif($selectoname == $usernameone){ $showoutcome++; $outcome = "No";}
                else{
                    $checkifblock = mysql_query("SELECT * FROM blocked WHERE id = $selectoid AND yourid = $ida");
                    $checkifblockrows = mysql_num_rows($checkifblock);

                    if($checkifblockrows > '0'){ $showoutcome++; $outcome = "You have already blocked <b>$namej</b>";}
                    else{

                        $showoutcome++; $outcome = "<a href=viewprofile.php?username=$selectoname><b>$selectoname</b></a>: was added to block list!";
                        mysql_query("INSERT INTO blocked(username,id,yourid,yourname)
VALUES ('$selectoname','$selectoid','$ida','$usernameone')");}}}

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
                                Blocked Users
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <form action="block.php" method="post">
                                    <div class="miniMenu shadowTest curve3px" style="min-width: 245px; max-width: 500px; width: 80%; margin-top: 30px;">
                                        <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                            Users I've Blocked from messaging me:
                                        </div>
                                        <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                            <tbody>
                                            <tr style="border-bottom: 1px solid #080808;">
                                                <td class="statsDivHeader" style="width: 40%;border-left: 0;  border-bottom: 0;">User</td>
                                                <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0;">Action</td>
                                            </tr>
                                            <?
                                            $findgangstersql  = "SELECT * FROM blocked WHERE yourid = '$ida' ORDER BY id DESC";
                                            $findgangsterresult = mysql_query($findgangstersql);
                                            $findgangsternumrows = mysql_num_rows($findgangsterresult);

                                            if($findgangsternumrows == '0'){
                                                echo "<tr>
                                                <td class=\"statsDiv\" colspan=\"2\">
                                                    <span class=\"statsDivStatic noTop\" href=\"#\" style=\"font-size: 11.25px;\">-</span>
                                                </td>
                                            </tr> ";
                                            }else{
                                                while($tima = mysql_fetch_array($findgangsterresult)){
                                                    $therename = $tima['username'];
                                                    $thetime = $tima['time'];

                                                    echo"<tr>
                                                        <td class='statsDiv' style=\"width: 85%\">
                                                            <a style=\"font-size: 11.25px;\" href=viewprofile.php?username=$therename>$therename</a>
                                                        </td>
                                                        <td class='statsDiv' style=\"color: #999999;\">
                                                            <a href='#' onclick=removeSubmit('".$therename."'); name='remove' style=\"border-top: none; font-size: 11.25px;\">Unblock</a>
                                                        </td>
                                                        </tr>";}
                                                echo"<tr><td colspan=2 class='statsDiv' style='text-align: right;'><span class='statsDivStatic'>Total users blocked: $findgangsternumrows</span></td></tr>";
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>
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