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
            $userraw = mysql_real_escape_string($_POST['user']);
            $user = preg_replace($saturate,"",$userraw);

            $gangsterusername = $usernameone;
            $applyidraw = mysql_real_escape_string($_POST['name']);
            $applyid = preg_replace($saturated,"",$applyidraw);


            $getinfoarray = $statustesttwo;
            $getcrewid = $getinfoarray['crewid'];
            $getname = $getinfoarray['username'];

            $crewbosscheckrows = $crewboss;
            $recruitercheckrows = $rr;

            if(($crewbosscheckrows == '0')&&($recruitercheckrows == '0')){die(' ');}

            $crewnamesql = mysql_query("SELECT * FROM crews WHERE id = '$getcrewid'");
            $crewnamearray = mysql_fetch_array($crewnamesql);
            $crewnameraw = $crewnamearray['name'];
            $crewnameraww = $crewnamearray['wmessage'];
            $crewboss = $crewnamearray['boss'];
            $crewname= htmlentities($crewnameraw,ENT_QUOTES);

            $applyidtest = mysql_query("SELECT * FROM applicants WHERE id = '$applyid' AND crewid = '$getcrewid' AND stage = '0'");
            $applyidtestrows = mysql_num_rows($applyidtest);
            $applyidarray = mysql_fetch_array($applyidtest);
            $applyname = $applyidarray['username'];
            $applycrewnameraw = $applyidarray['crewname'];
            $applycrewname =  htmlentities($applycrewnameraw,ENT_QUOTES);

            if(isset($_POST['accept'])){
                if(!$applyid){}
                elseif($applyidtestrows < '1'){echo" ";}
                else{
                    $showoutcome++; $outcome = "Application accepted!</font>";
                    mysql_query("UPDATE users SET mail=mail+'1' WHERE username='$applyname'");
                    $f = ("$crewnameraww");
                    mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$applyname','$crewboss','1','$userip','$f')");
                    $message= "join";
                    mysql_query("INSERT INTO crewfeed(crew,message, user) VALUES ('$getcrewid', '$message', '$applyname')");
                    mysql_query("UPDATE users SET crewid = '$getcrewid' WHERE username = '$applyname'");
                    mysql_query("UPDATE crews SET members = (members + 1) WHERE id = '$getcrewid'");
                    mysql_query("UPDATE applicants SET stage = '1' WHERE username = '$applyname'");}}

            if(isset($_POST['deny'])){
                if(!$applyid){}
                elseif($applyidtestrows < '1'){echo" ";}
                else{
                    $showoutcome++; $outcome = "Application refused!</font>";
                    mysql_query("UPDATE applicants SET stage = '2' WHERE username = '$applyname'");}}

            if(isset($_POST['denyall'])){
                $showoutcome++; $outcome = "Applications refused!</font>";
                mysql_query("UPDATE applicants SET stage = '2' WHERE crewid = '$getcrewid'");}

            $getappsql = mysql_query("SELECT * FROM applicants WHERE crewid = '$getcrewid' AND stage = '0' ORDER BY id ASC");
            $letscheck = mysql_num_rows($getappsql);

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
                                Applications
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                        <table class="regTable" style="min-width: 450px; width: 96%; max-width: 610px;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody><tr>
                                                <td class="header" colspan="45" style="padding: 11px;">
                                                    Crew Applicants
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="subHeader" style="border-left: 0; width: 56%;">Username</td>
                                                <td class="subHeader" style="width: 22%;">Rank</td>
                                                <td class="subHeader" style="width: 22%;">Action</td>
                                            </tr>
                                            <?
                                            $countea = 0;
                                            if($letscheck < 1){
                                                echo"<tr>
                                                <td class=\"col noTop\" colspan='3'>There are currently no users applying to your crew!</td>

                                            </tr>";}
                                            else{
                                                while($getapparray = mysql_fetch_array($getappsql)){
                                                    $countea++;
                                                    $appname = $getapparray['username'];
                                                    $appid = $getapparray['id'];
                                                    $getrank = mysql_query("SELECT * FROM users WHERE username = '$appname'");
                                                    $checkit = mysql_fetch_array($getrank);
                                                    $rankidd = $checkit['rankid'];
                                                    if($rankidd == '1'){ $getrankk = "$rank1"; }
                                                    elseif($rankidd == '2'){ $getrankk = "$rank2";}
                                                    elseif($rankidd == '3'){ $getrankk = "$rank3";}
                                                    elseif($rankidd == '4'){ $getrankk = "$rank4";}
                                                    elseif($rankidd == '5'){ $getrankk = "$rank5";}
                                                    elseif($rankidd == '6'){ $getrankk = "$rank6";}
                                                    elseif($rankidd == '7'){ $getrankk = "$rank7";}
                                                    elseif($rankidd == '8'){ $getrankk = "$rank8";}
                                                    elseif($rankidd == '9'){ $getrankk = "$rank9";}
                                                    elseif($rankidd == '10'){ $getrankk = "$rank10";}
                                                    elseif($rankidd == '11'){ $getrankk = "$rank11";}
                                                    elseif($rankidd == '12'){ $getrankk = "$rank12";}
                                                    elseif($rankidd == '13'){ $getrankk = "$rank13";}
                                                    elseif($rankidd == '14'){ $getrankk = "$rank14";}
                                                    elseif($rankidd == '15'){ $getrankk = "$rank15";}
                                                    elseif($rankidd == '16'){ $getrankk = "$rank16";}
                                                    elseif($rankidd == '17'){ $getrankk = "$rank17";}
                                                    elseif($rankidd == '18'){ $getrankk = "$rank18";}
                                                    elseif($rankidd == '19'){ $getrankk = "$rank19";}
                                                    elseif($rankidd == '20'){ $getrankk = "$rank20";}
                                                    elseif($rankidd == '21'){ $getrankk = "$rank21";}
                                                    elseif($rankidd == '22'){ $getrankk = "<b>$rank22</b>";}
                                                    elseif($rankidd == '24'){ $getrankk = 'Account being viewed';}
                                                    elseif($rankidd == '25'){ $getrankk = 'Moderator';}
                                                    elseif($rankidd == '50'){ $getrankk = 'Entertainer Manager';}
                                                    elseif($rankidd == '75'){ $getrankk = 'HDO Manager';}
                                                    elseif($rankidd == '100'){ $getrankk = 'Administrator';}
                                                    else{$getrankk = '';}

                                                    if($countea==1){?>
                                                        <form method="post" action="">
                                                            <tr>
                                                                <td class="col noTop" style="padding-right: 10px;"><a href=viewprofile.php?username=<?echo$appname;?>><?echo$appname;?></a></td>
                                                                <td class="col noTop" style="padding-right: 10px;"><?echo$getrankk;?></td>
                                                                <td class="col noTop" style="padding-right: 10px; ">
                                                                    <input type=hidden name=name value=<?echo$appid;?>>
                                                                    <input type=submit name=accept value=Accept class="textarea" style="width: 100%">
                                                                </td>

                                                            </tr>
                                                        </form>
                                                    <?}else{?>
                                                        <form method="post" action="">
                                                            <tr>
                                                                <td class="col " style="padding-right: 10px;"><a href=viewprofile.php?username=<?echo$appname;?>><?echo$appname;?></a></td>
                                                                <td class="col " style="padding-right: 10px;"><?echo$getrankk;?></td>
                                                                <td class="col " style="padding-right: 10px; ">
                                                                    <input type=hidden name=name value=<?echo$appid;?>>
                                                                    <input type=submit name=accept value=Accept class="textarea" style="width: 100%">
                                                                </td>

                                                            </tr>
                                                        </form>
                                                    <?}?>
                                            <?}}

                                            if($countea == '0'){

                                                mysql_query("UPDATE users SET notify = '0' WHERE crewid = '$crewid' AND rr != '0' AND notification = 'New Crew Applicants!'");
                                            }

                                            ?>
                                            </tbody>
                                        </table>
                                    <form method="post" action="" style="padding-top: 10px;">
                                        <input type="submit" value="Deny all" class="textarea curve3px" name="denyall">
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