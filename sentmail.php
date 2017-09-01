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
        <td valign="top" style="text-align: center;">

            <?php
            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $getnameraw = $_GET['name'];
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $getname = preg_replace($saturate,"",$getnameraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;
            $playerarray = $statustesttwo;
            $playerrank = $playerarray['rankid'];

            if(!$getname){$getname = $gangsterusername;}else{$getname = $getname;}

            $ahdoban = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone' AND ban = '1'"));

            if($playerrank < '25'){die(' ');}

            $selecterraw = $_POST['select'];
            $selecter = preg_replace($saturated,"",$selecterraw);
            if(isset($_POST['next'])){$one = $selecter + 1;}
            elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

            $selectfrom = $one * 20;
            $selectto = $selectfrom + 20;

            ?>
            <form action = "" method = "get">
                <input type="text" name="name" class="textbox inline_form" value="<? if(!$getname){echo"$gangsterusername";}else{echo"$getname";}?>">
                <input type="submit" class="textbox inline_form" value="View mail">
            </form>

            <div style="width: 100%; text-align: center; padding: 11px;">
                <input class="textarea curve3px" value="Delete All" onclick="deleteAllMessages();" style="padding-left: 8px; padding-right: 8px;" type="submit">
                <input class="textarea curve3px" value="Filter By..." onclick="$('#filterDiv').toggle();" style="padding-left: 8px; padding-right: 8px;" type="submit">
                <input class="textarea curve3px" value="Blocked Users" onclick="location.href='./';" style="padding-left: 8px; padding-right: 8px;" type="submit">
            </div>
            <div style="width: 100%; text-align: center; padding: 0px 11px 11px; display: none;" id="filterDiv">
                <form method="get" action="inbox.php">
                    <input name="by_user" placeholder="By User..." class="textarea" type="text"><input class="textarea curve3pxRight" value="Find" type="submit">
                </form>
                <form method="get" action="inbox.php">
                    <input name="by_word" placeholder="By Keyword..." class="textarea" type="text"><input class="textarea curve3pxRight" value="Find" type="submit">
                </form>
            </div>
            <form action = "" method = "post" style="margin-bottom: 9px; text-align: center;">
                <input type="hidden" name="select" value="<? echo $one; ?>">
                <?php if($selectfrom != '0'){
                    echo '<input name="previous" class="textarea curve3px inline_form" value="Prev page" style="padding-left: 9px; padding-right: 9px;" type="submit">';
                    echo '<input name="next" class="textarea curve3px inline_form" value="Next page" style="padding-left: 9px; padding-right: 9px;" type="submit">';
                }else{
                    echo '<input name="previous" disabled="disabled" class="textarea curve3px inline_form" value="Previous page" style="opacity: 0.5; cursor: default; padding-left: 9px; padding-right: 9px;" type="submit">';
                    echo '<input name="next" class="textarea curve3px inline_form" value="Next page" style="padding-left: 9px; padding-right: 9px;" type="submit">';
                }?>
            </form>

            <?php
            $getposts = mysql_query("SELECT * FROM messages WHERE sentfrom = '$getname' AND sentto != 'Mitch' AND sentfrom != 'Mitch' ORDER BY id DESC LIMIT $selectfrom,$selectto ");

            while($getpostsarray = mysql_fetch_array($getposts))
            {
            $postname = $getpostsarray['sentto'];
            $postinforawa = html_entity_decode($getpostsarray['info'], ENT_NOQUOTES);
            $new = $getpostsarray['new'];
            $msgid = $getpostsarray['id'];
            $colorid = $getpostsarray['color'];

            $zpattern[a] = "<";
            $zpattern[b] = ">";
            $zreplace[a] = "&lt;";
            $zreplace[b] = "&gt;";
            $postinforawz = str_replace($zpattern,$zreplace,$postinforawa);
            $epattern[1] = "/\[b\](.*?)\[\/b\]/is";
            $epattern[2] = "/\[u\](.*?)\[\/u\]/is";
            $epattern[3] = "/\[i\](.*?)\[\/i\]/is";
            $epattern[4] = "/\[center\](.*?)\[\/center\]/is";
            $epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
            $epattern[6] = "/\[img\
](.*?)\[\/img\]/is";
            $epattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
            $epattern[8] = "/\[br\]/is";
            $epattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
            $epattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
            $epattern[11] = "/\[left\](.*?)\[\/left\]/is";
            $epattern[12] = "/\[right\](.*?)\[\/right\]/is";
            $epattern[13] = "/\[s\](.*?)\[\/s\]/is";
            $ereplace[1] = "<b>$1</b>";
            $ereplace[2] = "<u>$1</u>";
            $ereplace[3] = "<i>$1</i>";
            $ereplace[4] = "<center>$1</center>";
            $ereplace[5] = "<font color=\"$1\">$2</font>";
            $ereplace[6] = "<img src=\"$1\">";
            $ereplace[7] = "<font face=\"$1\">$2</font>";
            $ereplace[8] = "<br>";
            $ereplace[9] = "<font size=\"$1\">$2</font>";
            $ereplace[10] = "<blockquote><b>$1</b></blockquote>";
            $ereplace[11] = "<div align=\"left\">$1</div>";
            $ereplace[12] = "<div align=\"right\">$1</div>";
            $ereplace[13] = "<s>$1</s>";
            $postinforawb = preg_replace($epattern,$ereplace,$postinforawz);
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

            $postinfo = str_replace($fpattern, $freplace, $postinforawb);

            if(($new == 'yes')||($colorid == 'yes')){$color = "<font color=lime face=verdana size=1><b>$postname</b></font>";}
            elseif($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";}
            elseif($rankcolor == '75'){$color = "<font color=aqua face=verdana size=1><b>$postname</b></font>";}
            elseif($rankcolor == '50'){$color = "<font color=yellow face=verdana size=1><b>$postname</b></font>";}
            elseif($rankcolor == '25'){$color = "<font color=blue face=verdana size=1><b>$postname</b></font>";}
            else{$color = "<font color=white face=verdana size=1>$postname</font>";}
            ?>
            <table class='menuTable curve10px' cellspacing='0' cellpadding='0'>
                <tr>
                    <td class='topleft'></td>
                    <td class='top'></td>
                    <td class='topright'></td>
                </tr>
                <tr>
                    <td class='left'></td>
                    <td class='top'>
                        <div class='main curve2px'>
                            <div class='menuHeader noTop'>
                                <b>Message sent to</b>: <a href="viewprofile.php?username=<?php echo $postname;?>"><?php echo $color; ?></a>
                            </div>
                            <div style='padding: 5px; margin: auto; text-align: center; color: #fefefe; max-width: 1024px;'>
                                <div style='margin: auto; width: 93%; padding-top: 16px; padding-bottom: 6px; text-align: center;'>
                                    <table align='center' width='85%' cellpadding='0' cellspacing='1' class='section'>
                                        <? if($countthree > '20'){
                                            echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
                                        }else{
                                            echo nl2br($postinfo);
                                        } ?>
                                    </table>
                                </div>
                            </div>
                    </td>
                    <td class='right'></td>
                </tr>
                <tr>
                    <td class='bottomleft'></td>
                    <td class='bottom'></td>
                    <td class='bottomright'></td>
                </tr>
            </table>
                        <?
                        }
                        ?>
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
                                                <input type="hidden" value="<?echo $statustesttwo['username'];?>"
                                                       id="feed_name">
                                                <input type="hidden" value="<?echo $statustesttwo['crewid'];?>"
                                                       id="feed_crew">
                                                <input class="textarea" id="feed_msg"
                                                       style="box-sizing: border-box; -moz-box-sizing: border-box; width: 100%; position: absolute; bottom: 0; margin-bottom: -1px; border-top: 2px solid rgba(20, 20, 20, 0.8); border-bottom: 0; border-left: 0; border-right: 0;"
                                                       placeholder="Enter Message..." type="text">
                                            </form>
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
                        <?}?>
                    </td>
                </tr>
            </table>
</body>
</html>







