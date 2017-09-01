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
        <td valign="top">
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
                                IP Rules
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <div style="margin: auto; width: 86%;">
                                        It is against the rules to send money/points/casinos, sell cars or commit OCs with users sharing your current IP address.
                                        <div class="break" style="margin-top: 2px;">
                                            It is also against the rules to have more than 1 alive account at a time.
                                            <div class="break" style="margin-top: 2px;">
                                                Any user suspected of having multiple alive accounts will have all of them killed; with the possibility of having their wealth seized.
                                            </div>
                                            <div class="break" style="margin-top: 20px;">
                                                <div class="miniMenu forumPost shadowTest curve3px" style="display: block; position: relative;">
                                                    <div class="miniMenuHeader noTop" style="position: absolute; width: 100%;">
                                                        IP Addresses you have signed in with:
                                                    </div>
                                                    <div class="preventscroll miniMenuLinks" style="padding-top: 25px;">
                                                        <?php  $penpoints = $statustesttwo['penpoints']; ?>
                                                        <?php
                                                        $saturate = "/[^a-z0-9]/i";
                                                        $sessionidraw = $_COOKIE['PHPSESSID'];
                                                        $sessionid = preg_replace($saturate,"",$sessionidraw);
                                                        $playerip = $_SERVER['REMOTE_ADDR'];
                                                        $gangstername = $usernameone;

                                                        $ipadressessql = mysql_query("SELECT * FROM ipadresses WHERE username = '$gangstername' ORDER BY id ASC");
                                                        while($ipadressessarray = mysql_fetch_array($ipadressessql))
                                                        {
                                                            $ipsrelated = $ipadressessarray['ip'];
                                                            if($ipsrelated!=$playerip){
                                                                echo '<a style="border-top: 1px solid #3c3c3c;" href="ipsharing.php" class="ipLinks">'.$ipsrelated.'</a>';
                                                            }else{
                                                                echo '<a style="background-color: #444444" href="ipsharing.php" class="ipLinks"><span style="float: right; color: #FFC753;">- Current IP -</span>'.$ipsrelated.'</a>';
                                                            }
                                                        }
                                                        ?>
<!--                                                        <a id="ip37826" style=" background-color: #444444;" href="iprules.php?ip=95.18.58.135" onclick="getRelated('95.18.58.135', 'ip37826'); return false;" class="ipLinks">-->
<!--                                                            <span style="float: right; color: #FFC753;">- Current IP -</span>-->
<!--                                                            95.18.58.135-->
<!--                                                        </a>-->
<!--                                                        <a id="ip37812" style="border-top: 1px solid #3c3c3c; " href="iprules.php?ip=81.100.37.232" onclick="getRelated('81.100.37.232', 'ip37812'); return false;" class="ipLinks">-->
<!--                                                            81.100.37.232-->
<!--                                                        </a>-->
<!--                                                        <a id="ip37824" style="border-top: 1px solid #3c3c3c; " href="iprules.php?ip=95.18.45.124" onclick="getRelated('95.18.45.124', 'ip37824'); return false;" class="ipLinks">-->
<!--                                                            95.18.45.124-->
<!--                                                        </a>-->
                                                    </div>
                                                </div>
                                                <div class="break" style="margin-top: 20px;">
                                                    <div class="miniMenu shadowTest curve3px" style="display: block;position: relative;">
                                                        <div class="miniMenuHeader noTop" style="position: absolute; width: 100%; box-sizing: border-box; -moz-box-sizing: border-box;">
                                                            <img id="miniLoader" src="layout_images/ajax-loader.gif">
                                                            Accounts signed in from: <span id="relatedTo" style="color: #FFC753;"><?php echo $_SERVER['REMOTE_ADDR']; ?></span>
                                                        </div>
                                                        <div class="preventscroll miniMenuLinks" style="padding-top: 26px;">
                                                            <div id="relatedToDiv">
                                                                <?php
                                                                $saturate = "/[^a-z0-9]/i";
                                                                $sessionidraw = $_COOKIE['PHPSESSID'];
                                                                $sessionid = preg_replace($saturate,"",$sessionidraw);
                                                                $playerip = $_SERVER['REMOTE_ADDR'];


                                                                $gangsterip = $playerip;
                                                                $gangstername = $usernameone;
                                                                $usernamessql = mysql_query("SELECT username FROM ipadresses WHERE ip = '$gangsterip' ORDER BY id ASC");
                                                                while($usernamesarray = mysql_fetch_array($usernamessql))
                                                                {
                                                                    $usersrelated = $usernamesarray['username'];
                                                                    echo "<a href=viewprofile.php?username=$usersrelated>$usersrelated</a>";
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

