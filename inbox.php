<? include 'included.php'; session_start();

$loleh = 1;

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$deleteidraw = $_GET['deleteid'];
$froms = $_GET['from'];
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate, "", $sessionidraw);
$from = preg_replace($saturate, "", $froms);
$deleteid = preg_replace($saturated, "", $deleteidraw);
$userip = $_SERVER[REMOTE_ADDR];
$gangsterusername = $usernameone;
$playerrank = $myrank;

if (isset($_POST['deleteall'])) {
    mysql_query("UPDATE messages SET d = '1' WHERE sentto = '$gangsterusername' ");
}

if (isset($_GET['deleteid'])) {
    $deletelinksql = mysql_query("SELECT sentfrom FROM messages WHERE id = '$deleteid' AND sentto = '$gangsterusername'");
    $deletelinkrows = mysql_num_rows($deletelinksql);

    if ($deletelinkrows < '1') {
    } else {
        mysql_query("UPDATE messages SET d = '1' WHERE id = '$deleteid'");
    }
}

$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated, "", $selecterraw);
if (isset($_POST['next'])) {
    $one = $selecter + 1;
} elseif (isset($_POST['previous'])) {
    $one = $selecter - 1;
} else {
    $one = '0';
}

$selectfrom = $one * 10;
$selectto = $selectfrom + 10;

if(isset($_GET['block'])) {

    $name= $_GET['block'];

    $getsugs = mysql_query("SELECT * FROM suggestions WHERE username = '$name'");
    $getsugrows = mysql_num_rows($getsugs);
    $getsug = mysql_fetch_array($getsugs);

    $getsugid = $getsug['id'];
    $gitname = $getsug['username'];

    if($getsugrows != '1'){ $showoutcome++; $outcome = "No such user";}
    elseif($name == $gangsterusername){ $showoutcome++; $outcome = "No";}
    else{
        $checkifblock = mysql_query("SELECT * FROM blocked WHERE id = $getsugid AND yourid = $ida");
        $checkifblockrows = mysql_num_rows($checkifblock);

        if($checkifblockrows > '0'){ $showoutcome++; $outcome = "You have already blocked this user";}
        else{

            $showoutcome++; $outcome = "You blocked <a href=viewprofile.php?username=$name><b>$name</b></a>!";
            mysql_query("INSERT INTO blocked(username,id,yourid,yourname)
VALUES ('$gitname','$getsugid','$ida','$gangsterusername')");}}}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" href="layout/style.css" type="text/css"/>
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
        function filter() {
            document.getElementById("filters").style.display = "block";
        }
        function hidefilter() {
            document.getElementById("filters").style.display = "none";
        }
        function shithouse<?echo $msgid;?>()
        {
            var answer = confirm("Would you like to block <?echo $postname;?> from messaging you?");
            if (answer)
                location.href = 'block.php?name=<?echo $postname;?>';
            else
                alert("This user will not be blocked.");
        }
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
            <? if ($showoutcome >= 1) { ?>
                <span><? echo $outcome; ?></span>
            <? } ?>
            <form action="" method="post">
                            <div style="width: 100%; text-align: center; padding: 11px;">
                                <input class="textarea curve3px inline_form" value="Delete All" name="Delete All" style="padding-left: 8px; padding-right: 8px;" type="submit">
                                <input class="textarea curve3px inline_form" value="View Sent Mail" onclick="location.href='sentmess.php';" style="padding-left: 8px; padding-right: 8px;" type="button">
                                <input class="textarea curve3px inline_form" value="Filter By..." onclick="filter();" style="padding-left: 8px; padding-right: 8px;" type="button">
                                <input class="textarea curve3px inline_form" value="Blocked Users" onclick="location.href='block.php';" style="padding-left: 8px; padding-right: 8px;" type="button">
                            </div>
                            <div style="margin-bottom: 9px; text-align: center;">
                                <input type="hidden" name="select" value="<? echo $one; ?> "><?php if ($selectfrom != '0') {
                                echo '<input type ="submit" value="Previous page" class="inline_form textarea curve3px" name="previous" style="padding-left: 9px; padding-right: 9px;">';
                                } ?>
                                <input type="submit" value="Next page" class="textarea curve3px inline_form" name="next" style="padding-left: 9px; padding-right: 9px;">
                            </div>
                        </form>
                        <div id=filters style="display:none; width: 100%; text-align: center; padding: 0px 11px 11px;";>
                            <form method=get name=fromform>
                                <input type="text" name="from" placeholder="By User..." class="textarea inline_form" <? if ($from) {echo "value=$from";} ?> id="from">
                                <input type=submit class="textarea inline_form" value="Find">
                            </form>
                        </div>
                        <?php
                        if (!$from) {
                            $getposts = mysql_query("SELECT * FROM messages WHERE d = '0' AND sentto = '$gangsterusername' ORDER BY id DESC LIMIT $selectfrom,$selectto ");
                        }
                        if ($from) {
                            $getposts = mysql_query("SELECT * FROM messages WHERE d = '0' AND sentto = '$gangsterusername' AND sentfrom = '$from' ORDER BY id DESC LIMIT $selectfrom,$selectto ");
                        }
                        $ts = 0;
                        while ($getpostsarray = mysql_fetch_array($getposts)){
                        $postname = $getpostsarray['sentfrom'];
                        $postinforawa = html_entity_decode($getpostsarray['info'], ENT_NOQUOTES);
                        $new = $getpostsarray['new'];
                        $msgid = $getpostsarray['id'];
                        $colorid = $getpostsarray['color'];
                        $time = $getpostsarray['time'];

                        $zpattern[a] = "<";
                        $zpattern[b] = ">";

                        $zreplace[a] = "&lt;";
                        $zreplace[b] = "&gt;";

                        $i = 0;
                        $while = mysql_query("SELECT * FROM blacklist");
                        while ($all = mysql_fetch_array($while)) {
                            $i = $i + 1;
                            $zpattern[$i] = $all['word'];
                            $zreplace[$i] = "stategangsters";
                        }

                        $postinforawz = $postinforawa;
                        $epattern[1] = "/\[b\](.*?)\[\/b\]/is";
                        $epattern[2] = "/\[u\](.*?)\[\/u\]/is";
                        $epattern[3] = "/\[i\](.*?)\[\/i\]/is";
                        $epattern[4] = "/\[center\](.*?)\[\/center\]/is";
                        $epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
                        $epattern[6] = "/\[img\](.*?)\[\/img\]/is";
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
                        $postinforawb = preg_replace($epattern, $ereplace, $postinforawz);
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

                        $postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);


                        if (($new == '1') || ($colorid == 'yes')) {
                            $ts++;
                            $color = "<font color=lime face=verdana size=1><b>$postname</b></font>";
                            $tiym = "<font color=silver face=verdana size=1>&nbsp;&nbsp;&nbsp;$time</font>";
                        } else {
                            $color = "<font color=silver face=verdana size=1>$postname</font>";
                            $tiym = "<font color=silver face=verdana size=1>&nbsp;&nbsp;&nbsp;$time</font>";
                        }
                        ?>

                        <div class="messageDiv" id="message527202" style="margin-top: 4px;">
                            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td class="topleft"></td>
                                    <td class="top"></td>
                                    <td class="topright"></td>
                                </tr>
                                <tr>
                                    <td class="left"></td>
                                    <td>
                                        <div class="main">
                                            <div class="menuHeader noTop" style="text-align: left; padding-left: 6px;  font-size: 10px;">
                                                <span style="float: right;">
                                                    <span style="cursor: pointer; color: silver; font-size: 10px;" class="masterTooltip">
													<?
                                                        /*$now=new DateTime();
                                                        $time=DateTime::createFromFormat('Y-m-d H:i:s',$time);
                                                        $diff=$now->diff($time);
                                                        if($diff->format('%a')>10){
                                                            echo $time->format('Y-m-d H:i:s');
                                                        }
                                                        elseif($diff->format('%h')<=0) {
                                                            echo $diff->format('%i minutes ago');
                                                        }elseif($diff->format('%a')<=0) {
                                                            echo $diff->format('%h hours ago');
                                                        }else{
                                                            echo $diff->format('%a days ago');
                                                        }*/
														//echo $time;
														$now = new DateTime();
														$time = DateTime::createFromFormat('Y-m-d H:i:s', $time);
                                                        //var_dump($now->getTimezone());
														$diff = $now->diff($time);
                                                        
														if ($diff->d > 10 || $diff->m > 0 || $diff->y > 0) {
															echo $time->format('Y-m-d H:i:s');
														} elseif ($diff->d > 0) {
															echo $diff->format('%d days ago');
														} elseif ($diff->h > 0) {
															echo $diff->format('%h hours ago');
														} elseif ($diff->i > 0) {
															echo $diff->format('%i minutes ago');
														} else {
															echo $diff->format('%s seconds ago');
														}
                                                    ?>
                                                    </span>
                                                </span>
                                                <a href="viewprofile.php?username=<? echo $postname; ?>" style=""><? echo $color; ?></a>
                                            </div>
                                            <div style="padding: 5px; margin: auto; color: #fefefe; text-align: left; max-height: 350px; overflow-y: auto;">
                                                <? if ($countthree > '2000') {
                                                    echo "This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
                                                } else {
                                                    echo nl2br($postinfo);
                                                } ?>
                                            </div>
                                            <div class="break" style="padding-top: 5px;">
                                                <div class="spacer"></div>
                                                <div class="break" style="padding-top: 4px;">
                                                    <a href="inbox.php?deleteid=<? echo $msgid; ?>" onclick="del<? echo $msgid; ?>();return false;" style="display: inline-block; margin-left: 5px; margin-right: 2px; padding-bottom: 5px;">Delete</a> -
                                                    <a href="inbox.php?from=<? echo $postname ?>" style="display: inline-block; margin-left: 2px; margin-right: 2px; padding-bottom: 5px;">Expand</a> -
                                                    <a href="send.php?replyid=<? echo $msgid; ?>" style="display: inline-block; margin-left: 2px; margin-right: 2px; padding-bottom: 5px;">Reply</a>
                                                    <span style="float: right;">
                                                        <?if($postname!=$gangsterusername){?>
                                                        <a href="inbox.php?block=<?echo $postname;?>" style="display: inline-block; margin-left: 2px; margin-right: 2px; padding-bottom: 5px;">Block User</a>
                                                        <?}?>
                                                    </span>
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
                                </tbody>
                            </table>
                        </div>
                    <?
                    }

                    mysql_query("UPDATE messages SET color = 'no',new = '2' WHERE sentto = '$gangsterusername'");
                    mysql_query("UPDATE users SET mail = '0' WHERE ID = '$ida'");
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
                                    <input type="hidden" value="<?echo $statustesttwo['username'];?>" id="feed_name">
                                    <input type="hidden" value="<?echo $statustesttwo['crewid'];?>" id="feed_crew">
                                    <input class="textarea" id="feed_msg"                                           style="box-sizing: border-box; -moz-box-sizing: border-box; width: 100%; position: absolute; bottom: 0; margin-bottom: -1px; border-top: 2px solid rgba(20, 20, 20, 0.8); border-bottom: 0; border-left: 0; border-right: 0;"                                           placeholder="Enter Message..." type="text">                                </form>                            </div>                        </div>                    </td>                    <td class="right"></td>                </tr>                <tr>                    <td class="bottomleft"></td>                    <td class="bottom"></td>                    <td class="bottomright"></td>                </tr>            </table><div style="padding: 10px; font-size: 9.5px; opacity:0.7; text-align: center;">You can mute sounds in <a href="profile.php">Edit Profile</a>		</div>
            <?}?>
        </td>
    </tr>
</table>
</body>
<script>
    function del <?echo $msgid;?>() {
        var urnamed =<?echo $msgid;?>;
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
        ajaxRequest.open("GET", "msgdel.php?id=" + urnamed + strhehefd, true);
        ajaxRequest.send(null);


        document.getElementById("tidbar<?echo $msgid;?>").innerHTML = '<img src=loading.gif>';
        setTimeout("document.getElementById('taidbar<?echo $msgid;?>').style.display = 'none';", 350);
    }
</script>
</html>