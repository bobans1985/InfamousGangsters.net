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
            $('#topicinfo').val($('#topicinfo').val() + em);
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
                            <div class="menuHeader noTop" style="text-align: left;">
                                Post article:
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <?php
                                    $saturate = "/[^a-z0-9]/i";
                                    $saturated = "/[^0-9]/i";
                                    $topicidraw = $_GET['id'];
                                    $sessionidraw = $_COOKIE['PHPSESSID'];
                                    $sessionid = preg_replace($saturate,"",$sessionidraw);
                                    $topicid = preg_replace($saturated,"",$topicidraw);
                                    $userip = $_SERVER[REMOTE_ADDR];
                                    $gangsterusername = $usernameone;

                                    $mutedusernamesql = mysql_query("SELECT * FROM muted WHERE username = '$gangsterusername'")or die(mysql_error());
                                    $mutedusernamerows = mysql_num_rows($mutedusernamesql);
                                    $mutedusernamearray = mysql_fetch_array($mutedusernamesql);
                                    $mutedusernameone = $mutedusernamearray['username'];
                                    $mutedipone = $mutedusernamearray['ip'];

                                    $mutedipsql = mysql_query("SELECT * FROM muted WHERE ip = '$userip'")or die(mysql_error());
                                    $mutediprows  = mysql_num_rows($mutedipsql);
                                    $mutediparray = mysql_fetch_array($mutedipsql);
                                    $mutedusernametwo = $mutediparray['username'];
                                    $mutediptwo = $mutediparray['ip'];

                                    if($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
                                    elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}

                                    $newscheck = mysql_query("SELECT username FROM news WHERE username = '$usernameone'");
                                    $news = mysql_num_rows($newscheck);

                                    $getuserinfoarray = $statustesttwo;
                                    $getrank = $getuserinfoarray['rankid'];

                                    $topicchecksql = mysql_query("SELECT * FROM forumposts WHERE id = '$topicid' AND type = 'news'");
                                    $topiccheck = mysql_fetch_array($topicchecksql);
                                    $topiccreator = $topiccheck['username'];
                                    $topicinfo = $topiccheck['post'];
                                    $tehe = $topiccheck['id'];
                                    $inforaw = str_replace("<br />", "\n", $topicinfo);
                                    $info = html_entity_decode($inforaw);

                                    ?>
                                    <div style="text-align: center">
                                        <form action="news.php" method="post" name="smiley">
                                            <input type=hidden value=<?echo$tehe;?> name=getit>
                                            <textarea name="edittopic" cols="42" rows="11" class="textarea inline_form" id ="editprofile" style="text-align: left;"><? if(($topiccreator == $gangsterusername)||($getrank >= '25')||($news  > '0')){echo"$info";} ?></textarea><br>
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
                                            <img onClick="emotion(':sarcasm:')" src="/layout/smiles/sarcasm.gif" class="smileys"><br>
                                            <input type ="submit" value="Update News" class="textarea inline_form" name="edit">
                                        </form>
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

