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
        /*function emotion(em) {
            $('#topicinfo').html($('#topicinfo').html() + em);
        }*/
		
         function topicEmotion(em) {
			 $('#editprofile').val($('#editprofile').val() + em);
         }
         function postEmotion(em) {
			 $('#newpost').val($('#newpost').val() + em);
         }
        function emotions(em) { document.smileys.editprofile.value=document.smiley.newpost.value+em;}
        function editit()
        {document.getElementById("editee").style.display = "block";}
        function hideit()
        {document.getElementById("editee").style.display = "none";}
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
            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $topicidraw = $_GET['topicid'];
            $poster = $_GET['deletepost'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $topicid = preg_replace($saturated,"",$topicidraw);
            $deletepost = preg_replace($saturated,"",$poster);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;

            $time = time();
            $edittopicraw= $_POST['edittopic'];
            $edittopic = htmlentities($edittopicraw , ENT_QUOTES);

            $playerarray = $statustesttwo;
            $playerrank = $playerarray['rankid'];

            $hdoperson = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone'"));
            $ahdoperson = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone' AND deletetopic = '1'"));

            $editsql = mysql_query("SELECT * FROM forumtopics WHERE topicid = '$topicid' AND type = 'd'");
            $editarray = mysql_fetch_array($editsql);
            $editname = $editarray['creator'];
            $posttits = mysql_num_rows(mysql_query("SELECT * FROM forumtopics WHERE topicid = '$topicid'"));
            $noposts = mysql_num_rows(mysql_query("SELECT * FROM forumtopics WHERE topicid = '$topicid'"));
            $titdate = $editarray['dte'];
            if($titdate == '0000-00-00 00:00:00'){$titdate = '<font color=silver face=verdana size=1>Time/Date: Not Available</font>';}else{$titdate = $titdate;}
            if(($rankid >= '25')||($editname == $gangsterusername)||($ahdoperson > '0')){
                if(isset($_POST['edit'])) { if(!$edittopic){}else{
                    mysql_query("UPDATE forumtopics SET info = '$edittopic' WHERE topicid = '$topicid' AND type = 'd'");
                }}}

            if($_POST['rate']){
                $rating = $_POST['rating'];
                $doneitalready = mysql_num_rows(mysql_query("SELECT * FROM picturerate WHERE username = '$usernameone' AND topicid = '$topicid'"));
                if($doneitalready > 0){ $showoutcome++; $outcome = "You have already rated this topic!"; }
                else{
                    mysql_query("INSERT INTO `picturerate` (username,topicid,rating) VALUES ('$usernameone','$topicid','$rating')");
                    $showoutcome++; $outcome = "You rated the topic a $rating!";
                }}

            $editsql = mysql_query("SELECT * FROM forumtopics WHERE topicid = '$topicid' AND type = 'd'");
            $editarray = mysql_fetch_array($editsql);
            $topicinfoe = $editarray['info'];

            $newpostraw = $_POST['newpost'];
            $newpost = htmlentities($newpostraw, ENT_QUOTES);

            $topiccheck = mysql_num_rows($editsql);
            $gettopicidarray = $editarray;
            $topictitleraw = html_entity_decode($gettopicidarray['title'], ENT_NOQUOTES);
            $topiccreator = $gettopicidarray['creator'];
            $topicinforaw = html_entity_decode($gettopicidarray['info'], ENT_NOQUOTES);
            $toplocked = $gettopicidarray['locked'];

            $zpattern[a] = "<";
            $zpattern[b] = ">";
            $zpattern[c] = "fuck";

            $zreplace[a] = "&lt;";
            $zreplace[b] = "&gt;";
            $zreplace[d] = "<span id=nawty>fuck</span>";

            $i = 0;
            $while = mysql_query("SELECT word FROM blacklist");
            while ($all = mysql_fetch_array($while)){
                $i = $i + 1;
                $zpattern[$i] = $all['word'];
                $zreplace[$i] = "infamousgangsters";}

            $topictitleraw = str_replace($zpattern,$zreplace,$topictitleraw);

            $apattern[1] = "/\[b\](.*?)\[\/b\]/is";
            $apattern[2] = "/\[u\](.*?)\[\/u\]/is";
            $apattern[3] = "/\[i\](.*?)\[\/i\]/is";
            $apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
            $apattern[13] = "/\[s\](.*?)\[\/s\]/is";
            $apattern[14] = "/\[user\](.*?)\[\/user\]/is";
            $apattern[16] = "/\[personv\](.*?)\[\/personv\]/is";

            $areplace[1] = "<b>$1</b>";
            $areplace[2] = "<u>$1</u>";
            $areplace[3] = "<i>$1</i>";
            $areplace[5] = "<font color=\"$1\">$2</font>";
            $areplace[13] = "<s>$1</s>";
            $areplace[14] = "<a href=viewprofile.php?username=\"$1\"><b>$1</b></a>";
            $areplace[16] = "$usernameone";


            $topictitlerawa = preg_replace($apattern,$areplace,$topictitleraw);

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

            $topictitleadmin = str_replace($bpattern, $breplace, $topictitlerawa);
            $topicinforawz = str_replace($zpattern,$zreplace,$topicinforaw);

            $dpattern[1] = "/\[b\](.*?)\[\/b\]/is";
            $dpattern[2] = "/\[u\](.*?)\[\/u\]/is";
            $dpattern[3] = "/\[i\](.*?)\[\/i\]/is";
            $dpattern[4] = "/\[center\](.*?)\[\/center\]/is";
            $dpattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
            $dpattern[6] = "/\[img\](.*?)\[\/img\]/is";
            $dpattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
            $dpattern[8] = "/\[br\]/is";
            $dpattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
            $dpattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
            $dpattern[11] = "/\[left\](.*?)\[\/left\]/is";
            $dpattern[12] = "/\[right\](.*?)\[\/right\]/is";
            $dpattern[13] = "/\[s\](.*?)\[\/s\]/is";
            $dpattern[14] = "/\[youtube\](.*?)\[\/youtube\]/is";
            $dpattern[16] = "/\[personv\](.*?)\[\/personv\]/is";
            $dpattern[17] = "/\[user\](.*?)\[\/user\]/is";

            $dreplace[1] = "<b>$1</b>";
            $dreplace[2] = "<u>$1</u>";
            $dreplace[3] = "<i>$1</i>";
            $dreplace[4] = "<center>$1</center>";
            $dreplace[5] = "<font color=\"$1\">$2</font>";
            $dreplace[6] = "<img src=\"$1\">";
            $dreplace[7] = "<font face=\"$1\">$2</font>";
            $dreplace[8] = "<br>";
            $dreplace[9] = "<font size=\"$1\">$2</font><font size=\"1\">";
            $dreplace[10] = "<blockquote><b><font color=7e96ac>$1</font></b></blockquote>";
            $dreplace[11] = "<div align=\"left\">$1</div>";
            $dreplace[12] = "<div align=\"right\">$1</div>";
            $dreplace[13] = "<s>$1</s>";
            $dreplace[14] = "<object width=315 height=225><param name=movie value=http://www.youtube.com/v/$1&autoplay=1></param><param name=wmode value=transparent></param><embed src=http://www.youtube.com/v/$1&autoplay=1 type=application/x-shockwave-flash wmode=transparent width=325 height=250></embed></object>";
            $dreplace[16] = "$usernameone";
            $dreplace[17] = "<a href=viewprofile.php?username=\"$1\"><b>$1</b></a>";

            $topicinfoa = preg_replace($dpattern,$dreplace,$topicinforawz);

            $cpattern[1] = ":arrow:";
            $cpattern[2] = ":D";
            $cpattern[3] = ":S";
            $cpattern[4] = "8)";
            $cpattern[5] = ":cry:";
            $cpattern[6] = "8|";
            $cpattern[7] = ":evil:";
            $cpattern[8] = ":!:";
            $cpattern[9] = ":idea:";
            $cpattern[10] = ":lol:";
            $cpattern[11] = ":mad:";
            $cpattern[12] = ":?:";
            $cpattern[13] = ":redface:";
            $cpattern[14] = ":rolleyes:";
            $cpattern[15] = ":(";
            $cpattern[16] = ":)";
            $cpattern[17] = ":o";
            $cpattern[18] = ":tdn:";
            $cpattern[19] = ":P";
            $cpattern[20] = ":tup:";
            $cpattern[21] = ":twisted:";
            $cpattern[22] = ";)";
            $cpattern[23] = ":slepy:";
            $cpattern[24] = ":whistle:";
            $cpattern[25] = ":wub:";
            $cpattern[26] = ":muah:";
            $cpattern[27] = ":zipped:";
            $cpattern[28] = ":love:";
            $cpattern[29] = ":sarcasm:";

            $creplace[1] = '<img src=/layout/smiles/arrow.gif class="smileys">';
            $creplace[2] = '<img src=/layout/smiles/biggrin.gif class="smileys">';
            $creplace[3] = '<img src=/layout/smiles/confused.gif class="smileys">';
            $creplace[4] = '<img src=/layout/smiles/cool.gif class="smileys">';
            $creplace[5] = '<img src=/layout/smiles/cry.gif class="smileys">';
            $creplace[6] = '<img src=/layout/smiles/eek.gif class="smileys">';
            $creplace[7] = '<img src=/layout/smiles/evil.gif class="smileys">';
            $creplace[8] = '<img src=/layout/smiles/exclaim.gif class="smileys">';
            $creplace[9] = '<img src=/layout/smiles/idea.gif class="smileys">';
            $creplace[10] = '<img src=/layout/smiles/lol.gif class="smileys">';
            $creplace[11] = '<img src=/layout/smiles/mad.gif class="smileys">';
            $creplace[12] = '<img src=/layout/smiles/question.gif class="smileys">';
            $creplace[13] = '<img src=/layout/smiles/redface.gif class="smileys">';
            $creplace[14] = '<img src=/layout/smiles/rolleyes.gif class="smileys">';
            $creplace[15] = '<img src=/layout/smiles/sad.gif class="smileys">';
            $creplace[16] = '<img src=/layout/smiles/smile.gif class="smileys">';
            $creplace[17] = '<img src=/layout/smiles/surprised.gif class="smileys">';
            $creplace[18] = '<img src=/layout/smiles/tdown.gif class="smileys">';
            $creplace[19] = '<img src=/layout/smiles/toungue.gif class="smileys">';
            $creplace[20] = '<img src=/layout/smiles/tup.gif class="smileys">';
            $creplace[21] = '<img src=/layout/smiles/twisted.gif class="smileys">';
            $creplace[22] = '<img src=/layout/smiles/wink.gif class="smileys">';
            $creplace[23] = '<img src=/layout/smiles/slepy.png class="smileys">';
            $creplace[24] = '<img src=/layout/smiles/whistle.gif class="smileys">';
            $creplace[25] = '<img src=/layout/smiles/wub.gif class="smileys">';
            $creplace[26] = '<img src=/layout/smiles/muah.gif class="smileys">';
            $creplace[27] = '<img src=/layout/smiles/zipped.gif class="smileys">';
            $creplace[28] = '<img src=/layout/smiles/love.gif class="smileys">';
            $creplace[29] = '<img src=/layout/smiles/sarcasm.gif class="smileys">';

            $topicinfo = str_replace($cpattern,$creplace,$topicinfoa);

            $toplocked = $gettopicidarray['locked'];
            $creatorrank = $gettopicidarray['rankid'];

            if($creatorrank >= 25)
            {$topictitle = $topictitleadmin;}else{$topictitle = $topictitleraw;}

            if(isset($_POST['dopost'])) {
                $mutedusernamesql = mysql_query("SELECT username,ip FROM muted WHERE  username = '$gangsterusername'")or die(mysql_error());
                $mutedusernamerows = mysql_num_rows($mutedusernamesql);
                $mutedusernamearray = mysql_fetch_array($mutedusernamesql);
                $mutedusernameone = $mutedusernamearray['username'];
                $mutedipone = $mutedusernamearray['ip'];

                $mutedipsql = mysql_query("SELECT username,ip FROM muted WHERE  ip = '$userip'")or die(mysql_error());
                $mutediprows  = mysql_num_rows($mutedipsql);
                $mutediparray = mysql_fetch_array($mutedipsql);
                $mutedusernametwo = $mutediparray['username'];
                $mutediptwo = $mutediparray['ip'];

                if($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}
                elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}

                if(!$newpost){}
                elseif($toplocked == 'yes'){$showoutcome++; $outcome = "<font color=C11B17 face=verdana size=1><b>This topic has been locked!</b></font>";}
                elseif($topiccheck == '0'){$showoutcome++; $outcome = '<font color=red face=verdana size=1><b>No such topic!</b></font><META HTTP-EQUIV="Refresh" CONTENT="2; URL=dforum.php">';}
                else{
                    if($ida == '6131'){$playerrank = '24';}
                    mysql_query("UPDATE forumtopics SET time = '$time' WHERE topicid = '$topicid' AND type = 'd'");
                    
                    $post_time = date('Y-m-d H:i:s');
                    
                     if(isset($_POST['reply_user'])){
                        $reply_user=$_POST['reply_user'];
                        mysql_query("INSERT INTO forumposts(username,topicid,ip,time,type,post,rankid,reply)
VALUES ('$gangsterusername','$topicid','$userip','$post_time','d','$newpost','$playerrank','$reply_user')");
                    }else{
                        mysql_query("INSERT INTO forumposts(username,topicid,ip,time,type,post,rankid,esc)
VALUES ('$gangsterusername','$topicid','$userip','$post_time','d','$newpost','$playerrank')");
                    }
                    mysql_query("UPDATE users SET posts = (posts + 1) WHERE username = '$usernameone'");

                    if($topiccreator != $usernameone){
                        mysql_query("UPDATE forumtopics SET new = (new + 1) WHERE topicid = '$topicid'");}}

                if($ida == '6131'){$playerrank = $myrank;}}
            if($usernameone == $topiccreator){
                mysql_query("UPDATE forumtopics SET new = '0' WHERE topicid = '$topicid'");}

            if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($rankid == '25')||($hdoperson > '0')){
                if(isset($_POST['delete'])) {
                    mysql_query("DELETE FROM forumtopics WHERE type = 'd' AND topicid = '$topicid'");
                    mysql_query("DELETE FROM forumposts WHERE type = 'd' AND topicid = '$topicid'");
                }}

            if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($rankid == '25')){
                if(isset($_POST['sticky'])) {
                    mysql_query("UPDATE forumtopics SET id = '2' WHERE topicid = '$topicid' AND type = 'd'");
                }}

            if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($rankid == '25')){
                if(isset($_POST['important'])) {
                    mysql_query("UPDATE forumtopics SET id = '3' WHERE topicid = '$topicid' AND type = 'd'");
                }}

            if($rankid == '100'){
                if(isset($_POST['update'])) {
                    mysql_query("UPDATE forumtopics SET id = '4' WHERE topicid = '$topicid' AND type = 'd'");
                }}

            if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($rankid == '25')){
                if(isset($_POST['undo'])) {
                    mysql_query("UPDATE forumtopics SET id = '1' WHERE topicid = '$topicid' AND type = 'd'");
                }}

            if(($topiccreator == $gangsterusername)||($rankid == '100')||($rankid == '75')||($rankid == '50')||($rankid == '25')||($hdoperson > '0')){
                if(isset($_GET['lock'])) { $showoutcome++; $outcome = '<font color=white face=verdana size=1>Topic locked</font>';mysql_query("UPDATE forumtopics SET locked = 'yes' WHERE topicid = '$topicid' AND type = 'd'");}
            }

            if(($rankid == '100')||($rankid == '75')||($rankid == '25')||($hdoperson > '0')){
                if(isset($_GET['unlock'])) {$showoutcome++; $outcome = '<font color=white face=verdana size=1>Topic Unlocked</font>';mysql_query("UPDATE forumtopics SET locked = 'no' WHERE topicid = '$topicid' AND type = 'd'");}
            }

            $selecterraw = $_POST['select'];
            $selecter = preg_replace($saturated,"",$selecterraw);
            if(isset($_POST['next'])){$one = $selecter + 1;}
            elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

            $selectfroma = $one * 25;
            $selecttoa = $selectfrom + 25;
            $selectfrom = preg_replace($saturated,"",$selectfroma);
            $selectto = preg_replace($saturated,"",$selecttoa);

            if(($rankid >= '50')||($hdoperson > '0')){
                if(isset($_GET['deletepost'])) {
                    mysql_query("DELETE FROM forumposts WHERE type = 'd' AND topicid = '$topicid' AND id = '$deletepost'");
                    mysql_query("UPDATE forumtopics SET time = '$time', posts = (posts - 1)  WHERE topicid = '$topicid' AND esc = '0'");
                }}

            $gettopicid = mysql_query("SELECT * FROM forumtopics WHERE topicid = '$topicid' AND type = 'd'");
            $gettopicidarray = mysql_fetch_array($gettopicid);
            $exists = mysql_num_rows($gettopicid);
            if($exists == '0'){$showoutcome++; $outcome = '<font color=red face=verdana size=1><b>No such topic!</b></font><META HTTP-EQUIV="Refresh" CONTENT="2; URL=dforum.php">';}

            $topictitleraw = html_entity_decode($gettopicidarray['title'], ENT_NOQUOTES);
            $topiccreator = $gettopicidarray['creator'];
            $topicinforaw = html_entity_decode($gettopicidarray['info'], ENT_NOQUOTES);
            $topictitleraw = str_replace($zpattern,$zreplace,$topictitleraw);
            $topictitlerawa = preg_replace($apattern,$areplace,$topictitleraw);
            $topictitleadmin = str_replace($bpattern, $breplace, $topictitlerawa);
            $topicinforawz = str_replace($zpattern,$zreplace,$topicinforaw);

            $topicinfo = str_replace($cpattern,$creplace,$topicinfoa);

            $ssssss = $gettopicidarray['info'];
            ?>

            <script>
                function ajaxFunctionhis(){
                    var ajaxRequest;
                    try{ajaxRequest = new XMLHttpRequest();} catch (e){
                        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
                            try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){
                                alert("Your browser broke!");return false;}}}

                    var strhehe = "<?echo$noposts;?>&topicid=<?echo$topicid;?>&rand="+Math.random();
                    ajaxRequest.open("GET", "newpost2.php?posts=" + strhehe, true);
                    ajaxRequest.send(null);
                    ajaxRequest.onreadystatechange = function(){
                        if(ajaxRequest.readyState == 4){if(ajaxRequest.responseText){document.getElementById("county").style.display = "block";document.getElementById("county").innerHTML = ajaxRequest.responseText;}}}
                    setTimeout("ajaxFunctionhis()",6000);
                }
            </script>

            <style>
                #left { float: left; }
                #right { float: right; }
            </style>

            <? $checkratings = mysql_num_rows(mysql_query("SELECT * FROM picturerate WHERE topicid = '$topicid'")); ?>

            <script language="javascript">
                function dorate() { var ele = document.getElementById("togglerate"); var text = document.getElementById("displayrate");
                    if(ele.style.display == "block") { ele.style.display = "none"; text.innerHTML = "<b><font color=khaki>Rate?</font></b>"; }else{
                        ele.style.display = "block"; text.innerHTML = "<b><font color=khaki>Rate?</font></b>"; }}

                function dorates() { var ele = document.getElementById("togglerates"); var text = document.getElementById("displayrates");
                    if(ele.style.display == "block") { ele.style.display = "none"; text.innerHTML = "<div align=right><font color=khaki size=1 face=verdana>View Ratings Here (<b><?echo$checkratings?></b>)</font></div>"; }else{
                        ele.style.display = "block"; text.innerHTML = "<div align=right><font color=khaki size=1 face=verdana>View Ratings Here (<b><?echo$checkratings?></b>)</font></div>"; }}
            </script>
            <? if ($showoutcome >= 1) { ?>
                <span><? echo $outcome; ?></span>
            <? } ?>
            <table class="menuTable curve10px" style="min-width: 300px;" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td>
                        <div class="main forumPost">
                            <div class="menuHeader noTop">
                                <div style="text-align: left; padding-left: 3px; padding-right: 3px;">
                                <span style="float: right; cursor: pointer; color: silver; font-size: 10px;" class="masterTooltip"><?
                                        $now = new DateTime();
                                        $time = DateTime::createFromFormat('Y-m-d H:i:s', $titdate);
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
                                        ?></span>
                                    <? if($countone > '20'){
                                        echo'This user tried to post more than 20 smilies, this is <b>NOT</b> allowed';
                                    }else{echo $topictitle;
                                    } ?>
                                    <span class="miniSep">-</span><a href="viewprofile.php?username=<? echo $topiccreator; ?>"><?echo"$topiccreator</a>";?>
                                </div>
                            </div>
                            <div style="padding: 12px; padding-left: 9px; padding-right: 9px;  padding-bottom: 15px; margin: auto; color: #fefefe;">
                                <? if($counttwo > '20'){
                                    echo'This user tried to post more than 20 smilies, this is <b>NOT</b> allowed';
                                }else{
                                    echo nl2br($topicinfo);
                                }?>
                            </div>
                            <div class="spacer"></div>
                            <div style="display: table; width: 100%; padding: 9px; padding-top: 5px; padding-bottom: 5px;">
                                <form action = "" method = "post" id="response">
                                    <a href="#response">Add Comment</a>
                                    <span class="miniSep">-</span>
                                    <?if(($topiccreator == $gangsterusername)||($rankid >= '25')||($hdoperson > '0')){
                                        echo"<input type =submit value='Edit' class='textarea inline_form curve3px' name=editlink onClick=\"editit();window.location='#';return false;\">";
                                    }?>
                                </form>
                                <div style="display: table-cell; text-align: right;">
                                    <?
                                    if(($topiccreator == $gangsterusername)||($rankid >= '25')||($hdoperson > '0')){
                                        if($toplocked != 'yes'){$cu = 'white';}
                                        else{$cu='white';}
                                        echo"<a href=dviewtopic.php?topicid=$topicid&lock=1 style=color:$cu;><b> Lock </b></a>";}
                                    if(($rankid >= '25')||($ahdo > '0')){
                                        if($toplocked == 'yes'){$cu = 'white';}
                                        else{$cu='white';}
                                        echo"<span class=\"miniSep\"> - </span><a href=dviewtopic.php?topicid=$topicid&unlock=1 style=color:$cu;><b>Unlock </b></a>";
                                    }?>
                                </div>

                            </div>
                            <div class="spacer"></div>
                            <div class="break" style="padding-top: 6px;">
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
            <div id=editee style="display:none;" name=edit>
                <div style="margin: auto; max-width: 413px;">
                    <form action="dviewtopic.php?topicid=<?echo$topicid;?>" method="post" name="smileys" style="text-align: center;">
                        <span>Edit Topic <a onclick="hideit();" href="#">(hide)</a></span><br>
                        <textarea name="edittopic" style="height: 120px; width: 100%; text-align: left;" class="textarea inline_form" id ="editprofile"><? $inforaw = str_replace("<br />", "\n", $ssssss);$info =html_entity_decode($inforaw); echo$info;?></textarea><br>
                        <img class="smileys" src="/layout/smiles/arrow.gif" onClick="topicEmotion(':arrow:')">
                         <img onClick="topicEmotion(':D')" src="/layout/smiles/biggrin.gif" class="smileys">
                         <img src="/layout/smiles/confused.gif" onClick="topicEmotion(':S')" class="smileys">
                         <img src="/layout/smiles/cry.gif" onClick="topicEmotion(':cry:')" class="smileys">
                         <img src="/layout/smiles/cool.gif" onClick="topicEmotion('8)')" class="smileys">
                         <img src="/layout/smiles/eek.gif" onClick="topicEmotion('8|')" class="smileys">
                         <img onClick="topicEmotion(':evil:')" src="/layout/smiles/evil.gif" class="smileys">
                         <img onClick="topicEmotion(':!:')" src="/layout/smiles/exclaim.gif" class="smileys">
                         <img onClick="topicEmotion(':idea:')" src="/layout/smiles/idea.gif" class="smileys">
                         <img onClick="topicEmotion(':lol:')" src="/layout/smiles/lol.gif" class="smileys">
                         <img onClick="topicEmotion(':mad:')" src="/layout/smiles/mad.gif" class="smileys">
                         <img onClick="topicEmotion(':?:')" src="/layout/smiles/question.gif" class="smileys">
                         <img onClick="topicEmotion(':redface:')" src="/layout/smiles/redface.gif" class="smileys">
                         <img onClick="topicEmotion(':rolleyes:')" src="/layout/smiles/rolleyes.gif" class="smileys">
                         <img onClick="topicEmotion(':(')" src="/layout/smiles/sad.gif" class="smileys">
                         <img onClick="topicEmotion(':)')" src="/layout/smiles/smile.gif" class="smileys">
                         <img onClick="topicEmotion(':o')" src="/layout/smiles/surprised.gif" class="smileys">
                         <img onClick="topicEmotion(':P')" src="/layout/smiles/toungue.gif" class="smileys">
                         <img onClick="topicEmotion(':twisted:')" src="/layout/smiles/twisted.gif" class="smileys">
                         <img onClick="topicEmotion(';)')" src="/layout/smiles/wink.gif" class="smileys">
                         <img onClick="topicEmotion(':tdn:')" src="/layout/smiles/tdown.gif" class="smileys">
                         <img onClick="topicEmotion(':tup:')" src="/layout/smiles/tup.gif" class="smileys">
                         <img onClick="topicEmotion(':zipped:')" src="/layout/smiles/zipped.gif" class="smileys">
                         <img onClick="topicEmotion(':love:')" src="/layout/smiles/love.gif" class="smileys">
                         <img onClick="topicEmotion(':sarcasm:')" src="/layout/smiles/sarcasm.gif" class="smileys"><br>
                        <input type ="submit" value="Update topic" class="textarea inline_form curve3px" name="edit">
                    </form>
                </div>
            </div>
            <? $countposts = mysql_num_rows(mysql_query("SELECT * FROM forumposts WHERE topicid = '$topicid' AND esc = '1'"));
           ?>
                <form action = "dviewtopic.php?topicid=<?echo$topicid;?>" method = "post" style="padding: 7px; text-align: center;">
                    <input type="hidden" name="select" value="<? echo $one; ?>">
                    <?php if($selectfrom != '0'){
                        echo'<input type ="submit" value="Previous page" class="textarea curve3px inline_form" style="padding-left: 9px; padding-right: 9px;" name="previous">';
                    }?>
                    <input type ="submit" value="Next page" class="textarea curve3px inline_form" style="padding-left: 9px; padding-right: 9px;" name="next">
                </form>
            <script language="javascript">
                function dorates() { var ele = document.getElementById("togglerates"); var text = document.getElementById("displayrates");
                    if(ele.style.display == "block") { ele.style.display = "none"; text.innerHTML = ""; }else{
                        ele.style.display = "block"; text.innerHTML = ""; }}
            </script>
            <?php
            $getposts = mysql_query("SELECT username,rankid,id,post,time,reply FROM forumposts WHERE topicid = '$topicid' AND type = 'd' ORDER BY id DESC LIMIT $selectfrom,$selectto ");
            while($getpostsarray = mysql_fetch_array($getposts)){
            $postname = $getpostsarray['username'];
            $rankcolor = $getpostsarray['rankid'];
            $postid = $getpostsarray['id'];
            $time = $getpostsarray['time'];
                $reply= $getpostsarray['reply'];
            $postinforawa = html_entity_decode($getpostsarray['post'], ENT_NOQUOTES);
            $postinforawb = $postinforawa;

            $postinforawz = str_replace($zpattern,$zreplace,$postinforawb);

            $epattern[1] = "/\[b\](.*?)\[\/b\]/is";
            $epattern[2] = "/\[u\](.*?)\[\/u\]/is";
            $epattern[3] = "/\[i\](.*?)\[\/i\]/is";
            $epattern[4] = "/\[center\](.*?)\[\/center\]/is";
            $epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
            $epattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
            $epattern[8] = "/\[br\]/is";
            $epattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
            $epattern[11] = "/\[left\](.*?)\[\/left\]/is";
            $epattern[12] = "/\[right\](.*?)\[\/right\]/is";
            $epattern[13] = "/\[s\](.*?)\[\/s\]/is";
            $epattern[16] = "/\[personv\](.*?)\[\/personv\]/is";

            $ereplace[1] = "<b>$1</b>";
            $ereplace[2] = "<u>$1</u>";
            $ereplace[3] = "<i>$1</i>";
            $ereplace[4] = "<center>$1</center>";
            $ereplace[5] = "<font color=\"$1\">$2</font>";
            $ereplace[7] = "<font face=\"$1\">$2</font>";
            $ereplace[8] = "<br>";
            $ereplace[10] = "<blockquote><b><font color=7e96ac>$1</font></b></blockquote>";
            $ereplace[11] = "<div align=\"left\">$1</div>";
            $ereplace[12] = "<div align=\"right\">$1</div>";
            $ereplace[13] = "<s>$1</s>";
            $ereplace[16] = "$usernameone";

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

            $postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);

                $aahdoperson = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$postname'"));
                $newsperson = mysql_num_rows(mysql_query("SELECT * FROM news WHERE username = '$postname'"));
                $thdonew = mysql_num_rows(mysql_query("SELECT * FROM traineehdos WHERE username = '$postname'"));
                $aaentperson = mysql_num_rows(mysql_query("SELECT * FROM entertainers WHERE username = '$postname'"));

                if($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";}
                elseif($rankcolor == '75'){$color = "<font color=aqua face=verdana size=1><b>$postname</b></font>";}
                elseif($rankcolor == '50'){$color = "<font color=yellow face=verdana size=1><b>$postname</b></font>";}
                elseif($rankcolor == '25'){$color = "<font color=royalblue face=verdana size=1><b>$postname</b></font>";}
                elseif($rankcolor == '22'){$color = "<font color=#FFC753 face=verdana size=1><b>$postname</b></font>";}
                elseif($shdoperson == '1'){$color = "<font color=#43a403 face=verdana size=1><b>$postname</b></font>";}
                elseif($aahdoperson == '1'){$color = "<font color=lime face=verdana size=1><b>$postname</b></font>";}
                elseif($newsperson == '1'){$color = "<font color=#78aaef face=verdana size=1><b>$postname</b></font>";}
                elseif($aaentperson == '1'){$color = "<font color=pink face=verdana size=1><b>$postname</b></font>";}
                elseif($thdonew == '1'){$color = "<font color=orange face=verdana size=1><b>$postname</b></font>";}
                else{$color = "<b>$postname</b>";}
            ?>

                <script>
                    function getitnow<?echo$postid;?>(){
                        urnamed=<?echo$postid;?>;
                        var ajaxRequest;
                        try{ajaxRequest = new XMLHttpRequest();} catch (e){
                            try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
                                try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){
                                    alert("Your browser broke1!");return false;}}}
                        var strhehefd = "&topic=<?echo$topicid;?>&rand="+Math.random();
                        ajaxRequest.open("GET", "likecomment.php?id=" + urnamed + strhehefd, true);
                        ajaxRequest.send(null);

                        ajaxRequest.onreadystatechange = function(){
                            if(ajaxRequest.readyState == 4){
                                if(ajaxRequest.responseText){
                                    document.getElementById("p<?echo$postid;?>").style.display='inline-block';
                                    document.getElementById("u<?echo$postid;?>").innerHTML = "" + ajaxRequest.responseText + "";
                                }}}}
                </script>

            <?
            $getlikes = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE commentid = '$postid'"));
            if($getlikes > 0){ $getlikes = "($getlikes)"; }else{ $getlikes = ""; }
            $getulike = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE commentid = '$postid' AND likeid = '$ida'"));
            if($getulike > 0){ $liketext = "<font color=lime><b>Like"; }else{ $liketext = "Like"; }
            ?>

                <table class="menuTable curve10px" style="" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                        <td class="topleft"></td>
                        <td class="top"></td>
                        <td class="topright"></td>
                    </tr>
                    <tr>
                        <td class="left"></td>
                        <td>
                            <div class="main forumPost">
                                <div class="menuHeader noTop" style="text-align: left; padding-left: 6px;  font-size: 10px;">
                                        <span style="float: right;">
                                            <a href=# onclick='getitnow<?echo$postid;?>();'>Like</a>
                                            <span class="miniSep" id="like177181"> - </span>
                                            <span style="cursor: pointer; color: silver; font-size: 10px;" class="masterTooltip"><?
                                                $now = new DateTime();
                                                $time = DateTime::createFromFormat('Y-m-d H:i:s', $time);
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
                                                ?></span>
                                        </span>
                                    <a href="viewprofile.php?username=<? echo $postname?>"><? echo $color; ?></a>
                                    <? $showlikes = mysql_num_rows(mysql_query("SELECT * FROM likes WHERE commentid = '$postid'"));
                                    ?>
                                    <span onclick="openLikes(<?echo$postid;?>);" <?if($showlikes==0){?>style="display: none;"<?}?> id="p<?echo$postid;?>">
                                            <span class="miniSep"> - </span>
                                            <a href="#" onclick="return false;" id="u<?echo$postid;?>"" style="font-weight: bold; color: lime;">+<?echo$showlikes;?></a>
                                        </span>
                                    <?
                                    if($postname!=$gangsterusername){?>
                                        <span class="miniSep">&nbsp;-&nbsp;</span>
                                        <a href="#" onclick="replyToPost('<? echo $postname;?>'); return false;" style="color: #676767;">Reply</a>
                                    <?} ?>
                                </div>
                                <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe; text-align: left;">
                                    <? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
                                    }else{echo nl2br($postinfo);} ?>
                                </div>
                                <div class="break" style="padding-top: 4px;">
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 4px;">
                                        <?
                                        if($reply!=null){
                                            echo "<div style=\"text-align: right; padding: 5px; padding-right: 6px; padding-top: 1px;\">Replied to: <a href=\"viewprofile.php?username=$reply\">$reply</a></div>";
                                        }
                                        ?>
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
            <?}?>
            <? $countposts = mysql_num_rows(mysql_query("SELECT * FROM forumposts WHERE topicid = '$topicid' AND esc = '1'"));
            ?>
                <form action = "dviewtopic.php?topicid=<?echo$topicid;?>" method = "post" style="padding: 7px; text-align: center;">
                    <input type="hidden" name="select" value="<? echo $one; ?>">
                    <?php if($selectfrom != '0'){
                        echo'<input type ="submit" value="Previous page" class="textarea curve3px inline_form" style="padding-left: 9px; padding-right: 9px;" name="previous">';
                    }?>
                    <input type ="submit" value="Next page" class="textarea curve3px inline_form" style="padding-left: 9px; padding-right: 9px;" name="next">
                </form>
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td>
                        <div class="main">
                            <div class="menuHeader noTop">
                                <div style="text-align: center;">
                                    Add Comment
                                </div>
                            </div>
                            <br/>
                            <form action = "" method = "post" id="response" style="text-align:center;">
                                <?
                                if($ahdoperson > '0'){
                                    echo'<input type ="submit" value="DELETE" class=\'textarea inline_form curve3px\' name="delete">';
                                }
                                if($rankid >= '25'){
                                    echo'<input type ="submit" value="DELETE" class=\'textarea inline_form curve3px\' name="delete">
                    <input type ="submit" value="LIMITED" class=\'textarea inline_form curve3px\' name="dj">
                    <input type ="submit" value="STICKY" class=\'textarea inline_form curve3px\' name="sticky">
                    <input type ="submit" value="IMPORTANT" class=\'textarea inline_form curve3px\' name="important">
                    <input type ="submit" value="NORMAL" class=\'textarea inline_form curve3px\' name="undo">';
                                }
                                ?>
                            </form>
                            <div style="margin: auto; max-width: 413px;">
                                <form action="dviewtopic.php?topicid=<?echo$topicid;?>" method="post" name="smiley" style="text-align:center;">
                                    <div id="replyForm" style="display: none; padding: 2px; padding-bottom: 4px;">
                                        Replying to: <input readonly="readonly" name="reply_user" class="textarea" value="" id="replyingToCommentUsername" type="text">&nbsp;&nbsp;
                                        <a href="#" onclick="cancelReply(); return false;">(cancel)</a>
                                    </div>
                                    <textarea name="newpost" style="height: 120px; width: 100%;text-align: left;" placeholder="Enter Comment..." class='textarea inline_form curve3px' id ="newpost"></textarea><br>
                                    <img class="smileys" src="/layout/smiles/arrow.gif" onClick="postEmotion(':arrow:')">
                                     <img onClick="postEmotion(':D')" src="/layout/smiles/biggrin.gif" class="smileys">
                                     <img src="/layout/smiles/confused.gif" onClick="postEmotion(':S')" class="smileys">
                                     <img src="/layout/smiles/cry.gif" onClick="postEmotion(':cry:')" class="smileys">
                                     <img src="/layout/smiles/cool.gif" onClick="postEmotion('8)')" class="smileys">
                                     <img src="/layout/smiles/eek.gif" onClick="postEmotion('8|')" class="smileys">
                                     <img onClick="postEmotion(':evil:')" src="/layout/smiles/evil.gif" class="smileys">
                                     <img onClick="postEmotion(':!:')" src="/layout/smiles/exclaim.gif" class="smileys">
                                     <img onClick="postEmotion(':idea:')" src="/layout/smiles/idea.gif" class="smileys">
                                     <img onClick="postEmotion(':lol:')" src="/layout/smiles/lol.gif" class="smileys">
                                     <img onClick="postEmotion(':mad:')" src="/layout/smiles/mad.gif" class="smileys">
                                     <img onClick="postEmotion(':?:')" src="/layout/smiles/question.gif" class="smileys">
                                     <img onClick="postEmotion(':redface:')" src="/layout/smiles/redface.gif" class="smileys">
                                     <img onClick="postEmotion(':rolleyes:')" src="/layout/smiles/rolleyes.gif" class="smileys">
                                     <img onClick="postEmotion(':(')" src="/layout/smiles/sad.gif" class="smileys">
                                     <img onClick="postEmotion(':)')" src="/layout/smiles/smile.gif" class="smileys">
                                     <img onClick="postEmotion(':o')" src="/layout/smiles/surprised.gif" class="smileys">
                                     <img onClick="postEmotion(':P')" src="/layout/smiles/toungue.gif" class="smileys">
                                     <img onClick="postEmotion(':twisted:')" src="/layout/smiles/twisted.gif" class="smileys">
                                     <img onClick="postEmotion(';)')" src="/layout/smiles/wink.gif" class="smileys">
                                     <img onClick="postEmotion(':tdn:')" src="/layout/smiles/tdown.gif" class="smileys">
                                     <img onClick="postEmotion(':tup:')" src="/layout/smiles/tup.gif" class="smileys">
                                     <img onClick="postEmotion(':zipped:')" src="/layout/smiles/zipped.gif" class="smileys">
                                     <img onClick="postEmotion(':love:')" src="/layout/smiles/love.gif" class="smileys">
                                     <img onClick="postEmotion(':sarcasm:')" src="/layout/smiles/sarcasm.gif" class="smileys"><br>
                                    <input type ="submit" value="Post comment!" class='textarea inline_form curve3px' name="dopost">
                                </form>
                            </div>
                            <div class="spacer"></div>
                            <div class="break" style="padding-top: 6px;">
                            </div>
                        </div></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
                </tbody>
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
<div id="hoverDiv" class="hoverDiv" style="padding-top: 170px; display: none;">
    <table class="menuTable curve10px" style="width: 280px; z-index: 2000;  overflow: hidden;" cellspacing="0" cellpadding="0" align="center">
        <tbody><tr>
            <td class="topleft"></td>
            <td class="top"></td>
            <td class="topright"></td>
        </tr>
        <tr>
            <td class="left"></td>
            <td>
                <div style="position: relative; display: block;">
                    <div class="menuHeader noTop shadowTest" style="width: 100%; box-sizing: border-box; -moz-box-sizing: border-box; position: absolute;">
                        Liked By:
                        <a href="#" onclick="closeLikes(); return false;" style="margin-left: -35px; float: right;  opacity: 0.80; filter: alpha(opacity=80); -ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=80)';">close</a>
                    </div>
                    <div class="main recentAc preventscroll" id="likedBy" style="line-height: 150%;"></div>
                </div>
            </td>
            <td class="right"></td>
        </tr>
        <tr>
            <td class="bottomleft"></td>
            <td class="bottom"></td>
            <td class="bottomright"></td>
        </tr>
        </tbody></table>
</div>
</body>
</html>