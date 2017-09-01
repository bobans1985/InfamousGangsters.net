<? include 'included.php'; session_start(); ?>
<?

$tyn = rand(0,5);
if($tyn == '3'){
    $deletetopicssql = mysql_query("SELECT id FROM forumposts WHERE type = 'crewor' ORDER BY id DESC LIMIT 16,50");
    while($deletetopics = mysql_fetch_array($deletetopicssql))
    {$dtopicid = $deletetopics['id'];
        $deleted = mysql_query("DELETE FROM forumposts WHERE id = '$dtopicid'");}}

$time = time();
$times = $time + 300;
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR];
$getida = mysql_real_escape_string($_GET['dropid']);
$getid = preg_replace($saturated,"",$getida);
$gangsterusername = $usernameone;

$jailtest = mysql_query("SELECT * FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }

$crewboss = mysql_query("SELECT boss FROM crews WHERE boss = '$usernameone'");
$boss = $crewboss;
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
        <td valign="top" class="main">
            <?php
            $saturate = "/[^a-z0-9]/i";
            $allowed = "/[^0-9]/i";
            $time = time();
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $newpostraw = $_POST['newpost'];
            $newpost = htmlentities($newpostraw, ENT_QUOTES);
            $setrewarda = mysql_real_escape_string($_POST['reward']);
            $bustbutton = ceil($time / 20);
            $bustraw = mysql_real_escape_string($_POST["$bustbutton"]);
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $setreward = preg_replace($allowed,"",$setrewarda);
            $bust = preg_replace($allowed,"",$bustraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;

            $getuserinfoarray = $statustesttwo;
            $getname = $getuserinfoarray['username'];
            $rankid = $getuserinfoarray['rankid'];
            $crewid = $getuserinfoarray['crewid'];
            $add = $getuserinfoarray['addition'];
            $playerrank = $getuserinfoarray['rankid'];

            $crewunderbosscheck = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$getname' AND crew = '$crewid' AND cc = '1'"));
            $crewbosscheck = mysql_query("SELECT * FROM crews WHERE boss = '$getname'");
            $crewbosscheckrows = $crewboss;
            if($crewbosscheckrows == 0 AND $crewunderbosscheck == 0){die('<font color=white size=1 face=verdana>Your not a crewboss!</font>');}

            $crewinfo = mysql_fetch_array(mysql_query("SELECT timer FROM crews WHERE id = '$crewid'"));
            $crewor = $crewinfo['timer'];
            $or = $crewor - $time;
            if($add = '28800'){
                $or = $crewor - $time - 7200;
            }

            $totalh = $or / 3600;
            $totalh = floor($totalh);
            if($totalh < '10'){$leading = 0;}

            if(isset($_POST['commit'])){
                if($or > '0'){
                    $showoutcome++; $outcome = "You must wait before you can commit the CC!";
                }else{

                    $newtime = $time + 36000;
                    mysql_query("UPDATE crews SET timer = '$newtime' WHERE id = '$crewid'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error.</font>');}

                    $getmembers = mysql_query("SELECT username,rankid,rankup,ID FROM users WHERE crewid = '$crewid' AND status = 'Alive'");
                    while($members = mysql_fetch_array($getmembers)){
                        $name = $members['username'];
                        $rank = $members['rankid'];
                        $rankup = $members['rankup'];
                        $namecrewid = $members['crewid'];
                        $ids = $members['ID'];
                        $usermission = $members['mission'];

                        if($usermission == 6){
                            mysql_query("UPDATE users SET missioncount = 0 WHERE ID = '$ids'");
                            $sendinfo = "[color=white][b]Mission complete![/b] [i]Check your missions page for the next mission[/i][/color]";
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$name','$name','1','$adress','$sendinfo')");
                            mysql_query("UPDATE users SET money = money + '5000000' WHERE id = '$ids'");
                            mysql_query("UPDATE users SET mission = '7' WHERE id = '$ids'");
                        }

                        if($rank == '1'){ $update = '99.999';$newrank = 'Civilian';}
                        elseif($rank == '2'){ $update = '45';$newrank = 'Recruit';}
                        elseif($rank == '3'){ $update = '28';$newrank = 'Vandal';}
                        elseif($rank == '4'){ $update = '16';$newrank = 'Crafter';}
                        elseif($rank == '5'){ $update = '13';$newrank = 'Respected Crafter';}
                        elseif($rank == '6'){ $update = '9';$newrank = 'Businessman';}
                        elseif($rank == '7'){ $update = '7';$newrank = 'Respected Businessman';}
                        elseif($rank == '8'){ $update = '6';$newrank = 'Infamous Businessman';}
                        elseif($rank == '9'){ $update = '5.6';$newrank = 'Hitman';}
                        elseif($rank == '10'){ $update = '5.45';$newrank = 'Respected Hitman';}
                        elseif($rank == '11'){ $update = '5.09';$newrank = 'Infamous Hitman';}
                        elseif($rank == '12'){ $update = '4.36';$newrank = 'Godfather';}
                        elseif($rank == '13'){ $update = '4';$newrank = 'Respected Godfather';}
                        elseif($rank == '14'){ $update = '4';$newrank = 'Infamous Godfather';}
                        elseif($rank == '15'){ $update = '2.54';$newrank = 'Don';}
                        elseif($rank == '16'){ $update = '2.35';$newrank = 'Respected Don';}
                        elseif($rank == '17'){ $update = '2.85';$newrank = 'Infamous Don';}
                        elseif($rank == '18'){ $update = '2.25';$newrank = 'Gangster';}
                        elseif($rank == '19'){ $update = '1.95';$newrank = 'Respected Gangster';}
                        elseif($rank == '20'){ $update = '1.45';$newrank = 'American Gangster';}
                        elseif($rank == '21'){ $update = '1.25';$newrank = 'Infamous Gangsters';}

                        $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$namecrewid' AND perk = '1'"));
                        if($crewperk > 0 AND $rank > 1){
                            if($rank == '1'){ $update = '99.999';$newrank = 'Civilian';}
                            elseif($rank == '2'){ $update = '99.999';$newrank = 'Recruit';}
                            elseif($rank == '3'){ $update = '45';$newrank = 'Vandal';}
                            elseif($rank == '4'){ $update = '28';$newrank = 'Crafter';}
                            elseif($rank == '5'){ $update = '16';$newrank = 'Respected Crafter';}
                            elseif($rank == '6'){ $update = '13';$newrank = 'Businessman';}
                            elseif($rank == '7'){ $update = '11';$newrank = 'Respected Businessman';}
                            elseif($rank == '8'){ $update = '9';$newrank = 'Infamous Businessman';}
                            elseif($rank == '9'){ $update = '7';$newrank = 'Hitman';}
                            elseif($rank == '10'){ $update = '5.6';$newrank = 'Respected Hitman';}
                            elseif($rank == '11'){ $update = '5.45';$newrank = 'Infamous Hitman';}
                            elseif($rank == '12'){ $update = '5.09';$newrank = 'Godfather';}
                            elseif($rank == '13'){ $update = '4.36';$newrank = 'Respected Godfather';}
                            elseif($rank == '14'){ $update = '4';$newrank = 'Infamous Godfather';}
                            elseif($rank == '15'){ $update = '4';$newrank = 'Don';}
                            elseif($rank == '16'){ $update = '3.54';$newrank = 'Respected Don';}
                            elseif($rank == '17'){ $update = '3.35';$newrank = 'Infamous Don';}
                            elseif($rank == '18'){ $update = '2.85';$newrank = 'Gangster';}
                            elseif($rank == '19'){ $update = '2.25';$newrank = 'Respected Gangster';}
                            elseif($rank == '20'){ $update = '1.95';$newrank = 'American Gangster';}
                            elseif($rank == '21'){ $update = '1.45';$newrank = '<font color=#FFC753>Infamous Gangsters</font>';}
                        }

                        $guessopen = mysql_query("SELECT * FROM gametimes WHERE game = 'weekly'");
                        $openx = mysql_fetch_array($guessopen);
                        $openxox = $openx['time'];

                        $sendinfoa = "You successfully committed an organised city crime with your crew!";
                        mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info,color) VALUES ('$name','$name','2','$adress','$sendinfoa','yes')");
                        if($openxox == 2){ mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$name'"); }


                        if($rank <= 21){
                            if(($rankup + $update) > ('100')){
                                $newrankup = $rankup + $update - 100;
                                $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                $homeinfo = "ranked to \[b\]$newrank\[\/b\]!";
                                mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$name','$homeinfo','1')");
                                mysql_query("UPDATE users SET rankid = rankid + 1, rankup = $newrankup, bullets = bullets + 1000 WHERE ID = '$ids'");
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$name','$name','2','$userip','$sendinfo')");}
                            else{mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ids'");}}
                    }
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
                    $moneyrand = mt_rand(100000,400000) * 2;
                    $moneyrander = number_format($moneyrand);
                    $showoutcome++; $outcome = "You and your crew successfully stole <font color=khaki>$<b>$moneyrander</font></b>!";
                    mysql_query("UPDATE users SET money = (money + $moneyrand) WHERE ID = '$ida'");
                }}

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
                else{
                    $posttits++;
                    if(($senior == '1')&&($playerrank < '25')){$playerrank = '123';}
                    $post_time = date('Y-m-d H:i:s');
                    mysql_query("INSERT INTO forumposts(username,ip,time,type,post,rankid,esc)
VALUES ('$gangsterusername','$userip','$post_time','crewoc','$newpost','$playerrank','1')");
                }}

            $crewinfo = mysql_fetch_array(mysql_query("SELECT timer FROM crews WHERE id = '$crewid'"));
            $crewor = $crewinfo['timer'];
            $or = $crewor - $time - $chk;
            if($add = '28800'){
                $or = $crewor - $time - 7200;
            }

            $totalh = $or / 3600;
            $totalh = floor($totalh);
            if($totalh == '10'){$leading = ' ';}elseif($totalh <= '9'){$leading = 0;}
            ?>
            <script>
                function ajaxFunctionhis(){
                    var ajaxRequest;
                    try{ajaxRequest = new XMLHttpRequest();} catch (e){
                        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
                            try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){
                                alert("Your browser broke!");return false;}}}

                    var strhehe = "<?echo$noposts;?>&topicid=<?echo$topicid;?>&rand="+Math.random();
                    ajaxRequest.open("GET", "newpost.php?posts=" + strhehe, true);
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

            <? $checkfollow = mysql_num_rows(mysql_query("SELECT * FROM followtopic WHERE username = '$usernameone' AND topicid = '$topicid'"));
            if($checkfollow > 0){ $unorfollow = "Unfollow Topic"; $numberit = "2"; }else{ $unorfollow = "Follow Topic"; $numberit = "1"; } ?>
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
                                Crew City Crime
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <form action="" method="post" style="padding-top: 10px; font-size: 12px;">
                                        <span>
                                            <?if($or <= '0'){
                                                echo"You are now <b><font color=gold>available</font></b> to commit this crew city crime";
                                            }else{
                                                echo"You must wait ";echo"<font color=red><b>$leading";echo"$totalh";echo date( ":i:s", $crewor - $time);echo"</font></b> before you can join a city crime again";
                                            }?>
                                        </span>
                                        <input type ="submit" name="commit" class="textarea curve3px" value="Commit">
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
            <?php

            $selecterraw = $_POST['select'];
            $selecter = preg_replace($saturated,"",$selecterraw);
            if(isset($_POST['next'])){$one = $selecter + 1;}
            elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

            $selectfroma = $one * 25;
            $selecttoa = $selectfrom + 25;
            $selectfrom = preg_replace($saturated,"",$selectfroma);
            $selectto = preg_replace($saturated,"",$selecttoa);

            $getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'crewoc' ORDER BY id DESC LIMIT $selectfrom,$selectto");
            ?>
            <form action = "" method = "post" style="text-align:center;margin:10px 0px;">
                <input type="hidden" name="select" value="<? echo $one; ?>">
                <?php if($selectfrom != '0'){
                    echo'<input type ="submit" value="Previous page" class="textarea curve3px inline_form" style="padding-left: 9px; padding-right: 9px;" name="previous">';
                }?>
                <input type ="submit" value="Next page" class="textarea curve3px inline_form" style="padding-left: 9px; padding-right: 9px;" name="next">
            </form>

            <?while($getpostsarray = mysql_fetch_array($getposts)){
                $postname = $getpostsarray['username'];
                $rankcolor = $getpostsarray['rankid'];
                $postid = $getpostsarray['id'];
                $liyks = $getpostsarray['likes'];
                if($liyks < '1'){$liyks = '';}if($liyks >= '1'){


                    $liyks = "+$liyks";}
                $time = $getpostsarray['time'];
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

                $freplace[1] = '<img src=/layout/smiles/arrow.gif class="smileys" style="margin-right: 1px;">';
                $freplace[2] = '<img src=/layout/smiles/biggrin.gif class="smileys" style="margin-right: 1px;">';
                $freplace[3] = '<img src=/layout/smiles/confused.gif class="smileys" style="margin-right: 1px;">';
                $freplace[4] = '<img src=/layout/smiles/cool.gif class="smileys" style="margin-right: 1px;">';
                $freplace[5] = '<img src=/layout/smiles/cry.gif class="smileys" style="margin-right: 1px;">';
                $freplace[6] = '<img src=/layout/smiles/eek.gif class="smileys" style="margin-right: 1px;">';
                $freplace[7] = '<img src=/layout/smiles/evil.gif class="smileys" style="margin-right: 1px;">';
                $freplace[8] = '<img src=/layout/smiles/exclaim.gif class="smileys" style="margin-right: 1px;">';
                $freplace[9] = '<img src=/layout/smiles/idea.gif class="smileys" style="margin-right: 1px;">';
                $freplace[10] = '<img src=/layout/smiles/lol.gif class="smileys" style="margin-right: 1px;">';
                $freplace[11] = '<img src=/layout/smiles/mad.gif class="smileys" style="margin-right: 1px;">';
                $freplace[12] = '<img src=/layout/smiles/question.gif class="smileys" style="margin-right: 1px;">';
                $freplace[13] = '<img src=/layout/smiles/redface.gif class="smileys" style="margin-right: 1px;">';
                $freplace[14] = '<img src=/layout/smiles/rolleyes.gif class="smileys" style="margin-right: 1px;">';
                $freplace[15] = '<img src=/layout/smiles/sad.gif class="smileys" style="margin-right: 1px;">';
                $freplace[16] = '<img src=/layout/smiles/smile.gif class="smileys" style="margin-right: 1px;">';
                $freplace[17] = '<img src=/layout/smiles/surprised.gif class="smileys" style="margin-right: 1px;">';
                $freplace[18] = '<img src=/layout/smiles/tdown.gif class="smileys" style="margin-right: 1px;">';
                $freplace[19] = '<img src=/layout/smiles/toungue.gif class="smileys" style="margin-right: 1px;">';
                $freplace[20] = '<img src=/layout/smiles/tup.gif class="smileys" style="margin-right: 1px;">';
                $freplace[21] = '<img src=/layout/smiles/twisted.gif class="smileys" style="margin-right: 1px;">';
                $freplace[22] = '<img src=/layout/smiles/wink.gif class="smileys" style="margin-right: 1px;">';
                $freplace[23] = '<img src=/layout/smiles/slepy.png class="smileys" style="margin-right: 1px;">';
                $freplace[24] = '<img src=/layout/smiles/whistle.gif class="smileys" style="margin-right: 1px;">';
                $freplace[25] = '<img src=/layout/smiles/wub.gif class="smileys" style="margin-right: 1px;">';
                $freplace[26] = '<img src=/layout/smiles/muah.gif class="smileys" style="margin-right: 1px;">';
                $freplace[27] = '<img src=/layout/smiles/zipped.gif class="smileys" style="margin-right: 1px;">';
                $freplace[28] = '<img src=/layout/smiles/love.gif class="smileys" style="margin-right: 1px;">';
                $freplace[29] = '<img src=/layout/smiles/sarcasm.gif class="smileys" style="margin-right: 1px;">';

                $postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);

                $usershdo = mysql_query("SELECT hdo FROM users WHERE username = '$postname'");
                $arethey = mysql_fetch_array($usershdo);
                $hdoperson = $arethey['hdo'];
                $shdoperson = mysql_num_rows(mysql_query("SELECT * FROM senior WHERE username = '$postname'"));

                if($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";}
                elseif($rankcolor == '75'){$color = "<font color=aqua face=verdana size=1><b>$postname</b></font>";}
                elseif($rankcolor == '50'){$color = "<font color=yellow face=verdana size=1><b>$postname</b></font>";}
                elseif($rankcolor == '25'){$color = "<font color=blue face=verdana size=1><b>$postname</b></font>";}
                elseif($shdoperson == '1'){$color = "<font color=#43a403 face=verdana size=1><b>$postname</b></font>";}
                elseif($hdoperson == '1'){$color = "<font color=lime face=verdana size=1><b>$postname</b></font>";}
                else{$color = "<font color=white face=verdana size=1>$postname</font>";}
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
                                </div>
                                <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe; text-align: left;">
                                    <? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
                                    }else{echo nl2br($postinfo);} ?>
                                </div>
                                <div class="break" style="padding-top: 4px;">
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 4px;">
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
                                Add Comment
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <form action="" method="post" name="smiley">
                                        <div style="margin: auto; min-width: 220px; width: 65%; max-width: 410px;">
                                            <textarea class="textarea" name="newpost" id="newpost" style="height: 120px; width: 100%;" placeholder="Enter Comment..."></textarea>
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
                                            <br/>
                                            <br><input name="dopost" class="textarea curve3px" style="padding-left: 8px; padding-right: 8px; margin-top: 4px; margin-bottom: 3px;" value="Post Comment" type="submit">
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