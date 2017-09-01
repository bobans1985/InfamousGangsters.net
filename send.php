<? include 'included.php'; session_start();
$time = time();
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR];
$gangsterusername = $usernameone;

$crew = mysql_real_escape_string($_POST['crew']);

$sendtoraw = mysql_real_escape_string($_REQUEST['sendto']);
$sendinforaw = $_POST['sendinfo'].$_POST['sendinfotwo'];
$getsendraw = mysql_real_escape_string($_GET['sendto']);
$getticketraw = mysql_real_escape_string($_GET['ticket']);
$getreplyraw = mysql_real_escape_string($_GET['replyid']);
$sendto = preg_replace($saturate,"",$sendtoraw);
$getsend = preg_replace($saturate,"",$getsendraw);
$getreply = preg_replace($saturated,"",$getreplyraw);
$ticket = preg_replace($saturated,"",$getticketraw);
$sendinfo = htmlentities($sendinforaw, ENT_QUOTES);

$sendtwoinfo = htmlentities($sendinforaw, ENT_QUOTES);


$getsug = mysql_fetch_array(mysql_query("SELECT * FROM suggestions WHERE username = '$sendto'"));
$getsugid = $getsug['id'];

$sendtochecksql = mysql_query("SELECT username,ID FROM users WHERE ID = '$getsugid'")or die(mysql_error());
$sendtocheckrows = mysql_num_rows($sendtochecksql);
$sendtocheckarray = mysql_fetch_array($sendtochecksql);
$sendtousername = $sendtocheckarray['username'];
$ids = $sendtocheckarray['ID'];

$crewid = $statustesttwo['crewid'];
$button = $statustesttwo['sentmsgs'];
$msgblock = $statustesttwo['msgstop'];
$playerrank = $statustesttwo['rankid'];
$thdotestnumrows = $statustesttwo['thdo'];
$usermission = $statustesttwo['mission'];
$news = mysql_num_rows(mysql_query("SELECT username FROM news WHERE username = '$usernameone'"));

$aahdoperson = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone'"));


$button = ceil($button / 5);
?>
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
            $('#msgOrComment').val($('#msgOrComment').val() + em);
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

            if($getreply){
                $replynamesqla = mysql_query("SELECT * FROM messages WHERE sentto = '$gangsterusername' AND id = '$getreply' AND d = '0'");
                $replynamerows = mysql_num_rows($replynamesqla);
                $replynamearray = mysql_fetch_array($replynamesqla);
                $replyname = $replynamearray['sentfrom'];
                $replyinforaw = $replynamearray['info'];
                $ooohbz = html_entity_decode($replyinforaw, ENT_NOQUOTES);



                $zpattern[a] = "<";
                $zpattern[b] = ">";

                $zreplace[a] = "&lt;";
                $zreplace[b] = "&gt;";

                $f = 0;

                $while = mysql_query("SELECT * FROM blacklist");
                while ($all = mysql_fetch_array($while)){
                    $f = $f + 1;
                    $zpattern[$f] = $all['word'];
                    $zreplace[$f] = "infamousgangsters";}

                $postinforawz = $ooohbz;
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


                $replyinfo = str_replace("<br />", "\n", $replyinforaw);

                $i = 0;
                $while = mysql_query("SELECT word FROM blacklist");
                while ($all = mysql_fetch_array($while)){
                    $i = $i + 1;
                    $zpattern[$i] = $all['word'];
                    $zreplace[$i] = "infamousgangsters";}

                $replyinfo = $replyinfo;
            }



            if(($ticket) && (($aahdoperson > '0')||($thdotestnumrows > '0')||($news > '0')||($playerrank >= '25'))){
                $getticketinfo = mysql_fetch_array(mysql_query("SELECT username,post FROM forumposts WHERE id = '$ticket'"));
                $ticketname = $getticketinfo['username'];
                $ticketinfo = $getticketinfo['post'];


                $ooohbz = html_entity_decode($ticketinfo, ENT_NOQUOTES);

                $zpattern[a] = "<";
                $zpattern[b] = ">";

                $zreplace[a] = "&lt;";
                $zreplace[b] = "&gt;";

                $f = 0;
                $while = mysql_query("SELECT * FROM blacklist");
                while ($all = mysql_fetch_array($while)){
                    $f = $f + 1;
                    $zpattern[$f] = $all['word'];
                    $zreplace[$f] = "infamousgangsters";}

                $postinforawz = $ooohbz;
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
                $fpattern[23] = ":whistle:";
                $fpattern[24] = ":slepy:";
                $freplace[1] = '<img src=/layout/smiles/arrow.gif>';
                $freplace[2] = '<img src=/layout/smiles/biggrin.gif>';
                $freplace[3] = '<img src=/layout/smiles/confused.gif>';
                $freplace[4] = '<img src=/layout/smiles/cool.gif>';
                $freplace[5] = '<img src=/layout/smiles/cry.gif>';
                $freplace[6] = '<img src=/layout/smiles/eek.gif>';
                $freplace[7] = '<img src=/layout/smiles/evil.gif>';
                $freplace[8] = '<img src=/layout/smiles/exclaim.gif>';
                $freplace[9] = '<img src=/layout/smiles/idea.gif>';
                $freplace[10] = '<img src=/layout/smiles/lol.gif>';
                $freplace[11] = '<img src=/layout/smiles/mad.gif>';
                $freplace[12] = '<img src=/layout/smiles/question.gif>';
                $freplace[13] = '<img src=/layout/smiles/redface.gif>';
                $freplace[14] = '<img src=/layout/smiles/rolleyes.gif>';
                $freplace[15] = '<img src=/layout/smiles/sad.gif>';
                $freplace[16] = '<img src=/layout/smiles/smile.gif>';
                $freplace[17] = '<img src=/layout/smiles/surprised.gif>';
                $freplace[18] = '<img src=/layout/smiles/tdown.gif>';
                $freplace[19] = '<img src=/layout/smiles/toungue.gif>';
                $freplace[20] = '<img src=/layout/smiles/tup.gif>';
                $freplace[21] = '<img src=/layout/smiles/twisted.gif>';
                $freplace[22] = '<img src=/layout/smiles/wink.gif>';
                $freplace[23] = '<img src=/layout/smiles/whistle.gif>';
                $freplace[24] = '<img src=/layout/smiles/slepy.png>';

                $postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);


                $ticketinfo = str_replace("<br />", "\n", $ticketinfo);
                $ticketinfo = $ticketinfo;
                if(isset($_POST["$button"])){
                    $newticket = "$ticketinfo<br/><br/>[b]$gangsterusername Wrote[/b]:\n$sendinfo";
                    if(!$ticketinfo){}else{mysql_query("UPDATE forumposts SET post = '$newticket' WHERE id = '$ticket'");
                        mysql_query("UPDATE users SET tickets = tickets + '1' WHERE username = '$usernameone'");
                    }}}

            if(isset($_POST["$button"])) {
                if(!$sendinfo){}
                else{
                    if($msgblock > '0'){die('<font color="silver" face="verdana" size="1">You have been muted from sending messages!</font>');}

                    if($crew){
                        if($crewboss > 0){
                            $getmembers = mysql_query("SELECT username,ID FROM users WHERE crewid = '$crewid'");
                            while($crewmsg = mysql_fetch_array($getmembers)){
                                $crewname = $crewmsg['username'];
                                $idf = $crewmsg['ID'];
                                mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$idf'");
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$crewname','$gangsterusername','1','$userip','$sendinfo')");}
                            $showoutcome++; $outcome = "Your message to your crew has been sent!";}
                    }

                    else{
                        if(!$sendto){}
                        elseif($sendtocheckrows < '1'){ $showoutcome++; $outcome = "No such user!";}
                        elseif($gangsterusername == $sendtousername){ $showoutcome++; $outcome = "You cannot send messages to yourself!";}
                        elseif(($sendtousername == 'Jack')||($sendtousername == 'Pentium')){

                            $permtblock = mysql_query("SELECT * FROM blocked WHERE id= '$ida' AND yourid = '$ids'");
                            $permdafdblock = mysql_num_rows($permtblock);
                            if(($permdafdblock > '0')&&($playerrank < '25')){die("<font color=silver face=verdana size=1>You have been blocked from messaging <a href=viewprofile.php?username=$sendtousername><b><font color=silver face=verdana size=1>$sendtousername</b></a>!</font>");}

                            $permt = mysql_query("SELECT username FROM permission WHERE username = '$gangsterusername'");
                            $permtblock = mysql_query("SELECT * FROM blocked");
                            $perm = mysql_num_rows($permt);
                            $permdafdblock = mysql_num_rows($permtblock);
                            if(($perm == '0')&&($playerrank < '25')&&($hdo < '1')&&($thdotestnumrows < '1')){die("<font color=silver face=verdana size=1>Username: <b>$gangsterusername</b> does not have permission, you can get permission from the Help Desk.</font>");}
                            else{

                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$sendtousername','$gangsterusername','1','$userip','$sendinfo')");
                                mysql_query("UPDATE users SET sentmsgs = sentmsgs + '1' WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET recievedmsgs = recievedmsgs + '1' WHERE ID = '$ids'");
                                $showoutcome++; $outcome = "Your message has been sent to </font><a href=viewprofile.php?username=$sendtousername>$sendtousername!</a>";
                                mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$ids'");}}
                        else{
                            $permtblock = mysql_query("SELECT * FROM blocked WHERE id= '$ida' AND yourid = '$ids'");
                            $permdafdblock = mysql_num_rows($permtblock);
                            if(($permdafdblock > '0')&&($playerrank < '25')){die("<font color=silver face=verdana size=1>You have been blocked from messaging <a href=viewprofile.php?username=$sendtousername><b><font color=silver face=verdana size=1>$sendtousername</b></a>!</font>");}
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$sendtousername','$gangsterusername','1','$userip','$sendinfo')");
                            mysql_query("UPDATE users SET sentmsgs = sentmsgs + '1' WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET recievedmsgs = recievedmsgs + '1' WHERE ID = '$ids'");
                            if($usermission == 10 AND $sendtousername == 'Garry'){
                                mysql_query("UPDATE users SET maybach = 0, alfas = 0, porsche = 0, pagani = 0 WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET missioncount = 0 WHERE ID = '$ida'");
                                $sendinfo = "[color=white][b]Mission complete![/b] [i]Check your missions page for the next mission[/i][/color]";
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$usernameone','$usernameone','1','$adress','$sendinfo')");
                                mysql_query("UPDATE users SET money = money + '0' WHERE id = '$ida'");
                                mysql_query("UPDATE users SET mission = '11' WHERE id = '$ida'");
                            }
                            if($usermission == 17 AND $sendtousername == 'Garry'){
                                mysql_query("UPDATE users SET missioncount = 0 WHERE ID = '$ida'");
                                $sendinfo = "[color=white][b]Mission complete![/b] [i]Check your missions page for the next mission[/i][/color]";
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$usernameone','$usernameone','1','$adress','$sendinfo')");
                                mysql_query("UPDATE users SET money = money + '1333337' WHERE id = '$ida'");
                                mysql_query("UPDATE users SET mission = '18' WHERE id = '$ida'");
                            }
                            $showoutcome++; $outcome = "Your message has been sent to <a href=viewprofile.php?username=$sendtousername>$sendtousername!</a>";
                            mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$ids'");}}}}
            if($playerrank == '100'){$replynamerows = 1;}
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
                                Send Message
                            </div>
                            <form action="" method="post" style="padding: 3px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; min-width: 220px; width: 65%; max-width: 410px; box-sizing: border-box;">
                                    <label style="display: inline-block; padding: 12px; padding-bottom: 3px;" for="recipient">Username:</label><br>
                                    <input tabindex="4" type="text" placeholder="Enter Username..." class="textarea inline_form" name="sendto" id="sendto" value="<?if(isset($_GET['sendto'])){echo"$getsend";}elseif(isset($_GET['replyid'])){ if($replynamerows < '1'){}else{echo"$replyname";}}elseif(isset($_GET['ticket'])){echo"$ticketname";}?>"><br>
                                    <label style="display: inline-block; padding: 3px; padding-top: 6px;" for="msgOrComment">Message:</label><br>
                                    <textarea tabindex="5" name="sendinfo" style="box-sizing: border-box; height: 130px; width: 100%;" id="msgOrComment" placeholder="Enter Message..." class="textarea inline_form" ></textarea>
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
                                    <input type ="submit" tabindex="6" style="padding-left: 8px; padding-right: 8px; margin-top: 4px; margin-bottom: 3px;" value="Send Message!" class="textarea curve3px" name="<? echo"$button";?>">
                                </div>
                                <div class="break" style="padding-top: 12px;">
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 12px;">
                                        <? if (isset($_GET['replyid'])){
                                            if($replynamerows < '1'){}
                                            else{
                                                $possi= nl2br($postinfo);
                                                echo "<span style=\"display: inline-block; padding-bottom: 3px;\">
                                                    Previous message from <a href=\"viewprofile.php?username=".$replyname."\"><b>".$replyname."</b></a>:</span><br/>";
                                                echo "<div class=\"textarea\" style=\"color: silver; display:  inline-block; max-height: 550px; max-width: 340px; min-width: 220px; text-align: left; overflow-y: auto; overflow-x: hidden; margin: 2px auto;\">".$replyinfo."</div><br/>                                                ";
                                            }
                                        }
                                        elseif (isset($_GET['ticket'])){$possi= nl2br($postinfo); echo"\n\n\n[b] Wrote[/b]:\n$ticketinfo</textarea>";}
                                        elseif($crewboss > 0){echo"<br><font color=white face=verdana size=1>Send to crew members:</font><input type=radio value=crew name=crew><br>";}
                                        ?>
                                        <div class="break" style="padding-top: 12px;">
                                            <div class="spacer"></div>
                                            <div class="break" style="padding-top: 9px;">

                                            </div>
                                        </div>
                                    </div>
                                </div>
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



