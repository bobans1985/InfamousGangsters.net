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
            $('#editprofile').val($('#editprofile').val() + em);
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
                <td valign="top" class="centerTd"><? include "cpanel_top.php";?></td>
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
            $zpattern[a] = "<";
            $zpattern[b] = ">";
            $zreplace[a] = "&lt;";
            $zreplace[b] = "&gt;";

            $saturate = "/[^a-z0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;

            $playerarray = $statustesttwo;
            $gangsterusername = $playerarray['username'];
            $getcrewid = $playerarray['crewid'];

            $crewunderbosscheck = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$gangsterusername' AND crew = '$getcrewid' AND profile = '1'"));
            $crewbosscheck = mysql_query("SELECT * FROM crews WHERE boss = '$gangsterusername'");
            $crewbosscheckrows = $crewboss;
            if($crewbosscheckrows == 0 AND $crewunderbosscheck == 0){die('<font color=white size=1 face=verdana>Your not a crewboss!</font>');}

            $profilesubmitraw = $_POST['editprofile'];
            $profilesubmit = htmlentities($profilesubmitraw, ENT_QUOTES);

            if(isset($_POST['editprofile'])) {
                mysql_query("UPDATE crews SET crewprofile = '$profilesubmit' WHERE id = '$crewid'");
                $showoutcome++; $outcome = "Crew profile updated!";}

            $creweditprof = mysql_query("SELECT * FROM crews WHERE id = '$crewid'");
            $getcrewprofx = mysql_fetch_array($creweditprof);
            $getuserprofile = $getcrewprofx['crewprofile'];

            $fpattern[1] = ":arrow:";
            $fpattern[2] = ":D";
            $fpattern[3] = ":S";
            $fpattern[4] = "8)";
            $fpattern[5] = ":cry:";
            $fpattern[6] = "8|";
            $fpattern[7] = ":evil:";
            $fpattern[8] = ":!:";
            $fpattern[9] = ":idea:";
            $fpattern[10] = ":lol:";
            $fpattern[11] = ":mad:";
            $fpattern[12] = ":?:";
            $fpattern[13] = ":redface:";
            $fpattern[14] = ":rolleyes:";
            $fpattern[15] = ":(";
            $fpattern[16] = ":)";
            $fpattern[17] = ":o";
            $fpattern[18] = ":tdn:";
            $fpattern[19] = ":P";
            $fpattern[20] = ":tup:";
            $fpattern[21] = ":twisted:";
            $fpattern[22] = ";)";
            $fpattern[23] = ":slepy:";
            $fpattern[24] = ":whistle:";
            $fpattern[25] = ":wub:";
            $fpattern[26] = ":muah:";
            $fpattern[27] = ":zipped:";
            $fpattern[28] = ":love:";
            $fpattern[29] = ":sarcasm:";

            $freplace[1] = '<img src=/layout/smiles/arrow.gif class="smileys">';
            $freplace[2] = '<img src=/layout/smiles/biggrin.gif class="smileys">';
            $freplace[3] = '<img src=/layout/smiles/confused.gif class="smileys">';
            $freplace[4] = '<img src=/layout/smiles/cool.gif class="smileys">';
            $freplace[5] = '<img src=/layout/smiles/cry.gif class="smileys">';
            $freplace[6] = '<img src=/layout/smiles/eek.gif class="smileys">';
            $freplace[7] = '<img src=/layout/smiles/evil.gif class="smileys">';
            $freplace[8] = '<img src=/layout/smiles/exclaim.gif class="smileys">';
            $freplace[9] = '<img src=/layout/smiles/idea.gif class="smileys">';
            $freplace[10] = '<img src=/layout/smiles/lol.gif class="smileys">';
            $freplace[11] = '<img src=/layout/smiles/mad.gif class="smileys">';
            $freplace[12] = '<img src=/layout/smiles/question.gif class="smileys">';
            $freplace[13] = '<img src=/layout/smiles/redface.gif class="smileys">';
            $freplace[14] = '<img src=/layout/smiles/rolleyes.gif class="smileys">';
            $freplace[15] = '<img src=/layout/smiles/sad.gif class="smileys">';
            $freplace[16] = '<img src=/layout/smiles/smile.gif class="smileys">';
            $freplace[17] = '<img src=/layout/smiles/surprised.gif class="smileys">';
            $freplace[18] = '<img src=/layout/smiles/tdown.gif class="smileys">';
            $freplace[19] = '<img src=/layout/smiles/toungue.gif class="smileys">';
            $freplace[20] = '<img src=/layout/smiles/tup.gif class="smileys">';
            $freplace[21] = '<img src=/layout/smiles/twisted.gif class="smileys">';
            $freplace[22] = '<img src=/layout/smiles/wink.gif class="smileys">';
            $freplace[23] = '<img src=/layout/smiles/slepy.png class="smileys">';
            $freplace[24] = '<img src=/layout/smiles/whistle.gif class="smileys">';
            $freplace[25] = '<img src=/layout/smiles/wub.gif class="smileys">';
            $freplace[26] = '<img src=/layout/smiles/muah.gif class="smileys">';
            $freplace[27] = '<img src=/layout/smiles/zipped.gif class="smileys">';
            $freplace[28] = '<img src=/layout/smiles/love.gif class="smileys">';
            $freplace[29] = '<img src=/layout/smiles/sarcasm.gif class="smileys">';


            $user_profile = str_replace($fpattern, $freplace, $getuserprofile);

            $userprofile = str_replace("<br />", "\n", $getuserprofile);
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
                        <form class="main curve2px" name="smiley" method="post" action="">
                            <div class="menuHeader noTop">
                                Edit Crew Profile
                            </div>
                            <div style="padding: 5px; margin-top: 21px; text-align: center;">
                                <a href="viewcrew.php?crewid=<?echo$getcrewid;?>"><b>View Crew Profile</b></a>
                                <div class="break" style="padding-top: 12px;"></div>
                                <div class="spacer"></div>
                                <div class="break" style="padding-top: 4px;"></div>
                                <div class="miniMenu shadowTest curve4pxAllButBottomRight" style="margin-top: 15px; width: 100%; max-width: 500px;">
                                    <div class="miniMenuHeader noTop">
                                        Profile:
                                    </div>
                                    <div class="miniMain" style="overflow: hidden;">
                                        <textarea placeholder="Set Profile..." class="textarea curve2pxBottom" name="editprofile" style="border: 0; width: 100%; height: 222px; margin-bottom: -2px;" tabindex="2" id ="editprofile"><?php echo $userprofile;?></textarea>
                                    </div>
                                </div>
                                <img class="smileys" src="/layout/smiles/arrow.gif" onClick="emotion(':arrow:')">
                                <img onClick="emotion(':D')" src="/layout/smiles/biggrin.gif" class="smileys">
                                <img src="/layout/smiles/confused.gif" onClick="emotion(':S')" class="smileys">
                                <img src="/layout/smiles/cry.gif" onClick="emotion(':cry:')" class="smileys">
                                <img src="/layout/smiles/cool.gif" onClick="emotion('8)')" class="smileys">
                                <img src="/layout/smiles/eek.gif" onClick="emotion('8|')" class="smileys">
                                <img onClick="emotion(':evil:')" src="/layout/smiles/evil.gif" class="smileys">
                                <img onClick="emotion(':!:')" src="/layout/smiles/exclaim.gif" class="smileys">
                                <img onClick="emotion(':idea:')" src="/layout/smiles/idea.gif" class="smileys">
                                <img onClick="emotion(':lol:')" src="/layout/smiles/lol.gif" class="smileys">
                                <img onClick="emotion(':mad:')" src="/layout/smiles/mad.gif" class="smileys">
                                <img onClick="emotion(':?:')" src="/layout/smiles/question.gif" class="smileys">
                                <img onClick="emotion(':redface:')" src="/layout/smiles/redface.gif" class="smileys">
                                <img onClick="emotion(':rolleyes:')" src="/layout/smiles/rolleyes.gif" class="smileys">
                                <img onClick="emotion(':(')" src="/layout/smiles/sad.gif" class="smileys">
                                <img onClick="emotion(':)')" src="/layout/smiles/smile.gif" class="smileys">
                                <img onClick="emotion(':o')" src="/layout/smiles/surprised.gif" class="smileys">
                                <img onClick="emotion(':P')" src="/layout/smiles/toungue.gif" class="smileys">
                                <img onClick="emotion(':twisted:')" src="/layout/smiles/twisted.gif" class="smileys">
                                <img onClick="emotion(';)')" src="/layout/smiles/wink.gif" class="smileys">
                                <img onClick="emotion(':tdn:')" src="/layout/smiles/tdown.gif" class="smileys">
                                <img onClick="emotion(':tup:')" src="/layout/smiles/tup.gif" class="smileys">
                                <img onClick="emotion(':zipped:')" src="/layout/smiles/zipped.gif" class="smileys">
                                <img onClick="emotion(':love:')" src="/layout/smiles/love.gif" class="smileys">
                                <img onClick="emotion(':sarcasm:')" src="/layout/smiles/sarcasm.gif" class="smileys">
                            </div>
                            <div class="break" style="padding-top: 7px;"></div>
                            <div class="spacer"></div>
                            <div style="text-align: center; padding: 7px; padding-top: 5px;">
                                <input class="textarea curve3px"  tabindex="3" style="padding-left: 8px; padding-right: 8px;" value="Save Changes!" type="submit">
                            </div>
                            <div class="spacer"></div>
                            <div class="break" style="padding-top: 7px;"></div>
                        </form>
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