<? include 'included.php'; session_start();

$tyn = rand(0,7);
if($tyn == '3'){
    $deletetopicssql = mysql_query("SELECT topicid FROM forumtopics WHERE id = '1' AND esc = '1' ORDER BY time DESC LIMIT 34,35");
    while($deletetopics = mysql_fetch_array($deletetopicssql))
    {$dtopicid = $deletetopics['topicid'];
        $deleted = mysql_query("DELETE FROM forumtopics WHERE topicid = '$dtopicid'");
        $deleted = mysql_query("DELETE FROM likes WHERE topic = '$dtopicid'");
        $deleteda = mysql_query("DELETE FROM forumposts WHERE topicid = '$dtopicid'");}
}

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
            //$('#topicinfo').html($('#topicinfo').html() + em);
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
                            <div class="menuHeader noTop">
                                Main Forum
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <?php
                                    $saturate = "/[^a-z0-9]/i";
                                    $sessionidraw = $_COOKIE['PHPSESSID'];
                                    $sessionid = preg_replace($saturate,"",$sessionidraw);
                                    $userip = $_SERVER[REMOTE_ADDR];
                                    $gangsterusername = $usernameone;
                                    $rank = $myrank;


                                    $forumtopicraw = $_POST['newtopic'];
                                    $forumtopicinforaw  = $_POST['newtopicinfo'];
                                    /*$forumtopic = htmlentities($forumtopicraw, ENT_QUOTES);
                                    $forumtopicinfo = htmlentities($forumtopicinforaw, ENT_QUOTES);*/
                                    $forumtopic = htmlspecialchars($forumtopicraw);
                                    $forumtopicinfo = htmlspecialchars($forumtopicinforaw);
                                    $time = time();
                                    if($forumtopic){

                                        $topicchecksql = mysql_query("SELECT * FROM forumtopics WHERE title = '$forumtopic' AND esc = '1'");
                                        $topiccheck = mysql_num_rows($topicchecksql);

                                        $topicchecksqltwo = mysql_query("SELECT * FROM forumtopics WHERE creator = '$gangsterusername' AND id = '1' AND esc = '1'");
                                        $topicchecktwo = mysql_num_rows($topicchecksqltwo);}


                                    if(isset($_POST['do'])) {

                                        $mutedusernamesql = mysql_query("SELECT * FROM muted WHERE  username = '$gangsterusername'")or die(mysql_error());
                                        $mutedusernamerows = mysql_num_rows($mutedusernamesql);
                                        $mutedusernamearray = mysql_fetch_array($mutedusernamesql);
                                        $mutedusernameone = $mutedusernamearray['username'];
                                        $mutedipone = $mutedusernamearray['ip'];

                                        $mutedipsql = mysql_query("SELECT * FROM muted WHERE  ip = '$userip'")or die(mysql_error());
                                        $mutediprows  = mysql_num_rows($mutedipsql);
                                        $mutediparray = mysql_fetch_array($mutedipsql);
                                        $mutedusernametwo = $mutediparray['username'];
                                        $mutediptwo = $mutediparray['ip'];

                                        if($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}
                                        elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");}


                                        if((!$forumtopic)||(!$forumtopicinfo)){}
                                        elseif($topiccheck > '0'){ echo'<font color="white" face="verdana" size="1">A topic with the same name already exists!</font>';}
                                        elseif($topicchecktwo > '10'){ echo'<font color="white" face="verdana" size="1">You cannot have more than 10 topics on the forum at one time!</font>';}
                                        else{
											$topic_dte = date('Y-m-d H:i:s');
                                        	mysql_query("INSERT INTO forumtopics(creator,id,time,type,title,info,rankid,dte,esc)
											VALUES ('$gangsterusername','1','$time','main','$forumtopic','$forumtopicinfo','$rank','$topic_dte','1')");
                                            mysql_query("UPDATE users SET topics = (topics + 1) WHERE ID = '$ida'");
                                        }
                                    }

                                    if(isset($_POST['clear'])) {
                                        if($rank != '100'){echo"<font color=white face=verdana size=1>Nice try</font>";}
                                        else{
                                            $deleteall = mysql_query("SELECT * FROM forumtopics WHERE esc = '1' AND id= '1'");
                                            while($deletealla = mysql_fetch_array($deleteall)){
                                                $deleteid = $deletealla['topicid'];
                                                mysql_query("DELETE FROM forumtopics WHERE esc = '1' AND topicid = '$deleteid'");
                                                mysql_query("DELETE FROM forumposts WHERE esc = '1' AND topicid = '$deleteid'");}
                                            echo"<font color=white face=verdana size=1><b>Forum wiped!</b></font>";}}

                                    ?>
                                    <table class="miniMenu miniMain forum" style="width: 81%; max-width: 950px;" width="100%" cellspacing="0">
                                        <tbody>
                                        <tr style="text-align: center;">
                                            <td class="statsDivHeader" style="font-size: 11px; background-color: rgba(32,32,32,0.94); border-left: 0;">Title</td>
                                            <td class="statsDivHeader" style="font-size: 11px; background-color: rgba(32,32,32,0.94); padding-right: 15px;" width="20%">Author</td>
                                            <td class="statsDivHeader" style="font-size: 11px; background-color: rgba(32,32,32,0.94);" width="10%">Posts</td>
                                        </tr>

                                        <?php
                                        $selecttopicssql = mysql_query("SELECT * FROM forumtopics WHERE esc = '1' AND id = '1' ORDER BY time DESC");

                                        $selectstickysql = mysql_query("SELECT * FROM forumtopics WHERE esc = '1' AND id = '2' ORDER BY time DESC");

                                        $selectimportantsql = mysql_query("SELECT * FROM forumtopics WHERE esc = '1' AND id = '3' ORDER BY time DESC");

                                        $selectdjsql = mysql_query("SELECT * FROM forumtopics WHERE esc = '1' AND id = '4' ORDER BY time DESC");
                                        $ifdj = mysql_num_rows($selectdjsql);



                                        $apattern[1] = "/\[b\](.*?)\[\/b\]/is";
                                        $apattern[2] = "/\[u\](.*?)\[\/u\]/is";
                                        $apattern[3] = "/\[i\](.*?)\[\/i\]/is";
                                        $apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
                                        $apattern[13] = "/\[s\](.*?)\[\/s\]/is";


                                        $areplace[1] = "<b>$1</b>";
                                        $areplace[2] = "<u>$1</u>";
                                        $areplace[3] = "<i>$1</i>";
                                        $areplace[5] = "<font color=\"$1\">$2</font>";
                                        $areplace[13] = "<s>$1</s>";

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

                                        while($selectimportant = mysql_fetch_array($selectimportantsql))
                                        {
                                            $ititle = html_entity_decode($selectimportant ['title'], ENT_QUOTES);
                                            $itopicid = $selectimportant['topicid'];
                                            $ilocked = $selectimportant['locked'];
                                            $icreator = $selectimportant['creator'];
                                            $iforumrank = $selectimportant['rankid'];
                                            $selecthdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$icreator' AND type = 'senior'"));
                                            if($iforumrank == 100){ $rcolor4 = "red><b>"; }elseif($iforumrank == 25){ $rcolor4 = "royalblue><b>"; }elseif($selecthdo > 0){ $rcolor4 = "lime><b>"; }else{ $rcolor4 = "silver>"; }

                                            $zpattern[a] = "<";
                                            $zpattern[b] = ">";

                                            $zreplace[a] = "&lt;";
                                            $zreplace[b] = "&gt;";

                                            $i = 0;
                                            $while = mysql_query("SELECT word FROM blacklist");
                                            while ($all = mysql_fetch_array($while)){
                                                $i = $i + 1;
                                                $zpattern[$i] = $all['word'];
                                                $zreplace[$i] = "stategangsters";}

                                            $ititle = str_replace($zpattern,$zreplace,$ititle);

                                            if($iforumrank >= '25'){

                                                $ititlea = preg_replace($apattern,$areplace,$ititle);


                                                $ititle = str_replace($bpattern,$breplace,$ititlea);
                                            }

                                            $itopicpost = mysql_num_rows(mysql_query("SELECT * FROM forumposts WHERE topicid = '$itopicid'"));
                                            ?>
                                        <?if($i==1){?>
                                        <tr>
                                            <td class="statsDiv"><a href="viewtopic.php?topicid=<?echo$itopicid;?>" style="border-top: 0;"><span style="color: #FFC753;"><b>IMPORTANT</b>:</span> <?echo$ititle;?><? if($ilocked == 'yes'){?><span style="color: #777777; padding-left: 3px;">(Locked)</span><?}?></a></td>
                                            <td class="statsDiv"><a href="viewprofile.php?username=<?echo$icreator;?>" style="border-top: 0;"><?echo$icreator;?></a></td>
                                            <td class="statsDivStatic" style="border-top: 0; color: silver;"><?echo$itopicpost;?></td>
                                        </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="statsDiv"><a href="viewtopic.php?topicid=<?echo$itopicid;?>"><span style="color: #FFC753;"><b>IMPORTANT</b>:</span> <?echo$ititle;?><? if($ilocked == 'yes'){?><span style="color: #777777; padding-left: 3px;">(Locked)</span><?}?></a></td>
                                                <td class="statsDiv"><a href="viewprofile.php?username=<?echo$icreator;?>"><?echo$icreator;?></a></td>
                                                <td class="statsDivStatic" style="color: silver;"><?echo$itopicpost;?></td>
                                            </tr>
                                        <?}?>

                                        <?}?>
                                        <?
                                        while($selectsticky = mysql_fetch_array($selectstickysql))
                                        {
                                            $stitle = html_entity_decode($selectsticky['title'], ENT_QUOTES);
                                            $stopicid = $selectsticky['topicid'];
                                            $slocked = $selectsticky['locked'];
                                            $screator = $selectsticky['creator'];
                                            $sforumrank = $selectsticky['rankid'];
                                            $selecthdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$screator' AND type = 'senior'"));
                                            if($sforumrank == 100){ $rcolor3 = "red><b>"; }elseif($sforumrank == 25){ $rcolor3 = "royalblue><b>"; }elseif($selecthdo > 0){ $rcolor3 = "lime><b>"; }else{ $rcolor3 = "silver>"; }

                                            $stitle = str_replace($zpattern,$zreplace,$stitle);

                                            if($sforumrank >= '25'){
                                                $stitlea = preg_replace($apattern,$areplace,$stitle);
                                                $stitle = str_replace($bpattern,$breplace,$stitlea);
                                            }

                                            $stopicpost = mysql_num_rows(mysql_query("SELECT * FROM forumposts WHERE topicid = '$stopicid'"));
                                            ?>

                                            <tr>
                                                <td class="statsDiv"><a href="viewtopic.php?topicid=<?echo$stopicid;?>"><span style="color: #FFC753;"><b>STICKY</b>:</span> <?echo$stitle;?><? if($slocked == 'yes'){?><span style="color: #777777; padding-left: 3px;">(Locked)</span><?}?></a></td>
                                                <td class="statsDiv"><a href="viewprofile.php?username=<?echo$screator;?>"><?echo$screator;?></a></td>
                                                <td class="statsDivStatic" style="color: silver;"><?echo$stopicpost;?></td>
                                            </tr>

                                        <?}?>

                                        <?if($ifdj > 0){?><? } ?>
                                        <?
                                        while($selectdj = mysql_fetch_array($selectdjsql))
                                        {
                                            $stitle = html_entity_decode($selectdj['title'], ENT_QUOTES);
                                            $stopicid = $selectdj['topicid'];
                                            $slocked = $selectdj['locked'];
                                            $screator = $selectdj['creator'];
                                            $sforumrank = $selectdj['rankid'];
                                            $selecthdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$screator' AND type = 'senior'"));
                                            if($sforumrank == 100){ $rcolor2 = "red><b>"; }elseif($sforumrank == 25){ $rcolor2 = "royalblue><b>"; }elseif($selecthdo > 0){ $rcolor2 = "lime><b>"; }else{ $rcolor2 = "silver>"; }

                                            $stitle = str_replace($zpattern,$zreplace,$stitle);

                                            if($sforumrank >= '25'){
                                                $stitlea = preg_replace($apattern,$areplace,$stitle);
                                                $stitle = str_replace($bpattern,$breplace,$stitlea);
                                            }

                                            $stopicpost = mysql_num_rows(mysql_query("SELECT * FROM forumposts WHERE topicid = '$stopicid'"));
                                            ?>

                                            <tr>
                                                <td class="statsDiv"><a href="viewtopic.php?topicid=<?echo$stopicid;?>"><?echo$stitle;?><? if($slocked == 'yes'){?><span style="color: #777777; padding-left: 3px;">(Locked)</span><?}?></a></td>
                                                <td class="statsDiv"><a href="viewprofile.php?username=<?echo$screator;?>"><?echo$screator;?></a></td>
                                                <td class="statsDivStatic" style="color: silver;"><?echo$stopicpost;?></td>
                                            </tr>

                                        <?}?>

                                        <?if($ifdj > 0){?><? } ?>
                                        <?
                                        while($selecttopics = mysql_fetch_array($selecttopicssql))
                                        {
                                            $title = html_entity_decode($selecttopics['title'], ENT_QUOTES);
                                            $topicid = $selecttopics['topicid'];
                                            $locked = $selecttopics['locked'];
                                            $creator = $selecttopics['creator'];
                                            $forumrank = $selecttopics['rankid'];
                                            $selecthdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$creator' AND type = 'senior'"));
                                            if($forumrank == 100){ $rcolor = "red><b>"; }elseif($forumrank == 25){ $rcolor = "royalblue><b>"; }elseif($selecthdo > 0){ $rcolor = "lime><b>"; }else{ $rcolor = "silver>"; }

                                            $title = str_replace($zpattern,$zreplace,$title);

                                            if($forumrank >= '25'){
                                                $titlea = preg_replace($apattern,$areplace,$title);
                                                $title = str_replace($bpattern,$breplace,$titlea);
                                            }

                                            $topicpost = mysql_num_rows(mysql_query("SELECT * FROM forumposts WHERE topicid = '$topicid'"));
                                            ?>

                                            <? if($creator == $usernameone){$cls = 222222;}else{$cls = 282828;} ?>

                                            <tr>
                                                <td class="statsDiv"><a href="viewtopic.php?topicid=<?echo$topicid;?>"><?echo$title;?><? if($locked == 'yes'){?><span style="color: #777777; padding-left: 3px;">(Locked)</span><?}?></a></td>
                                                <td class="statsDiv"><a href="viewprofile.php?username=<?echo$creator;?>"><?echo$creator;?></a></td>
                                                <td class="statsDivStatic" style="color: silver;"><?echo$topicpost;?></td>
                                            </tr>

                                        <?}?>
                                        </tbody>
                                    </table>

                                    <div class="break" style="margin-top: 25px;">
                                        <div class="spacer"></div>
                                        <div class="break" style="margin-top: 4px;">
                                            <form action="" method="post" name="smiley" style="padding: 3px; margin: auto; text-align: center; color: #fefefe;">
                                                <div style="margin: auto; min-width: 220px; width: 65%; max-width: 413px; box-sizing: border-box;">
                                                    <label style="display: inline-block; padding: 12px; padding-bottom: 3px;" for="title">Title:</label><br>
                                                <input type="text" class="textarea inline_form" name="newtopic" placeholder="Enter Title..."><br>
                                                    <label style="display: inline-block; padding: 3px; padding-top: 6px;" for="msgOrComment">Content:</label><br>
                                                <textarea name="newtopicinfo" placeholder="Enter Content..." class="textarea inline_form" id ="topicinfo" style="height: 130px; width: 100%;"></textarea><br>
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
                                                <input type ="submit" value="Create topic!" style="padding-left: 8px; padding-right: 8px; margin-top: 4px; margin-bottom: 3px;" class="textarea curve3px inline_form" name="do">
                                                </div>
                                            </form>

                                            <div class="break" style="margin-top: 15px;">
                                                <div class="spacer"></div>
                                                <div class="break" style="margin-top: 4px;">
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