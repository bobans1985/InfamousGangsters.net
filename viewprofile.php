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
        function msg()
        {document.getElementById("msgs").style.display = "block";document.smiley.sendinfo.focus();}

        function closes()
        {document.getElementById("msgs").style.display = "none";}
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
        <td valign="top">
            <?

            $autoplay = $statustesttwo['autoplay'];
            $button = $statustesttwo['sentmsgs'];
            $myid= $statustesttwo['ID'];
            $myname= $statustesttwo['username'];

            $button = ceil($button / 5);

            $time = time();

            $allowed = "/[^a-z0-9]/i";
            $getusernameraw = mysql_real_escape_string($_GET['username']);
            $getusername = preg_replace($allowed,"",$getusernameraw);

            $getsugsql = mysql_query("SELECT * FROM suggestions WHERE username = '$getusername'");
            $getsugsqla = mysql_fetch_array($getsugsql);
            $getsugid = $getsugsqla['id'];

            $oidod = mysql_query("SELECT * FROM datesjoined WHERE username = '$getusername' ORDER BY id DESC LIMIT 1");
            $fdsf = mysql_fetch_array($oidod);
            $timejoined = $fdsf['time'];

            $getinfosql = mysql_query("SELECT * FROM users WHERE ID = '$getsugid'");
            $getinfoarray = mysql_fetch_array($getinfosql);
            $getname = $getinfoarray['username'];
            $roboteh = $getinfoarray['robot'];
            $mission_bot = $getinfoarray['mission_bot'];
            $getcrewid = $getinfoarray['crewid'];
            $hdo = $getinfoarray['hdo'];
            $newser = mysql_num_rows(mysql_query("SELECT username FROM news WHERE username = '$getname'"));

            $ifprotected = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username = '$getname'"));

            $traineeba = mysql_num_rows(mysql_query("SELECT * FROM trainehdos WHERE username = '$getname'"));

            $aahdoperson = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$getname'"));



            $appear = $getinfoarray['appear'];
            $enty = $getinfoarray['ent'];
            $getrankid = $getinfoarray['rankid'];
            $pts = number_format($getinfoarray['points']);
            $getrankup = number_format($getinfoarray['rankup'], 2);
            $gethealth = floor($getinfoarray['health']);
            $bullets = number_format($getinfoarray['bullets']);
            $getmoneyid = $getinfoarray['money'];
            $page = $getinfoarray['page'];
            $swiss = number_format($getinfoarray['swiss']);
            $displaybusts = $getinfoarray['displaybusts'];
            $displaykills = $getinfoarray['displaykills'];
            $userids = $getinfoarray['ID'];
            $displaybustsa = $getinfoarray['casinowins'];
            $activity = $getinfoarray['activity'];
            $busts = $getinfoarray['donebusts'];
            $kills = $getinfoarray['kills'];
            $casinos = $getinfoarray['casinos'];
            $views = $getinfoarray['views'];
            $viewsa = $getinfoarray['showviews'];
            $hdos = $getinfoarray['hdo'];
            $showhonours = $getinfoarray['showhonours'];
            $showhonours2 = $getinfoarray['showhonours2'];
            $zzpattern[a] = "<";
            $zzpattern[b] = ">";
            $zzreplace[a] = "&lt;";
            $zzreplace[b] = "&gt;";
            $musics = html_entity_decode($getinfoarray['music'],ENT_NOQUOTES);
            $music = str_replace($zzpattern,$zzreplace,$musics);
            $quoteraw = html_entity_decode($getinfoarray['quote'],ENT_NOQUOTES);
            $quote = str_replace($zzpattern,$zzreplace,$quoteraw);

            $pm = $getinfoarray['personal'];
            $getmoneyidtwo = number_format($getinfoarray['money']);
            $getstatusid = $getinfoarray['status'];
            $getsmsgssent = $getinfoarray['sentmsgs'];
            $getsmsgsrecieved = $getinfoarray['recievedmsgs'];
            $tickets = $getinfoarray['tickets'];
            $ppoints = $getinfoarray['penpoints'];
            $getprofileidrawraw = html_entity_decode($getinfoarray['profile'], ENT_NOQUOTES);

            $profileviews = mysql_query("SELECT * FROM users WHERE username = '$getusername'");
            $profileviewsa = mysql_fetch_array($profileviews);
            $profileviewsam = $profileviewsa['profileviews'];
            mysql_query("UPDATE users SET profileviews = (profileviews + 1) WHERE username = '$getusername'");


            $zpattern[a] = "<";
            $zpattern[b] = ">";

            $zreplace[a] = "&lt;";
            $zreplace[b] = "&gt;";

            $i = 0;
            $while = mysql_query("SELECT word FROM blacklist");
            while ($all = mysql_fetch_array($while)){
                $i = $i + 1;
                $zpattern[$i] = $all['word'];
                $zreplace[$i] = "ToughDons";}

            $getprofileidrawrawa = str_replace($zpattern,$zreplace,$getprofileidrawraw);

            $apattern[1] = "/\[b\](.*?)\[\/b\]/is";
            $apattern[2] = "/\[u\](.*?)\[\/u\]/is";
            $apattern[3] = "/\[i\](.*?)\[\/i\]/is";
            $apattern[4] = "/\[center\](.*?)\[\/center\]/is";
            $apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
            $apattern[6] = "/\[img\](.*?)\[\/img\]/is";
            $apattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
            $apattern[8] = "/\[br\]/is";
            $apattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
            $apattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
            $apattern[11] = "/\[left\](.*?)\[\/left\]/is";
            $apattern[12] = "/\[right\](.*?)\[\/right\]/is";
            $apattern[13] = "/\[s\](.*?)\[\/s\]/is";
            $apattern[14] = "/\[user\](.*?)\[\/user\]/is";
            $apattern[15] = "/\[twitter\](.*?)\[\/twitter\]/is";
            $apattern[16] = "/\[personv\](.*?)\[\/personv\]/is";
            $apattern[17] = "/\[youtube\](.*?)\[\/youtube\]/is";

            $areplace[1] = "<b>$1</b>";
            $areplace[2] = "<u>$1</u>";
            $areplace[3] = "<i>$1</i>";
            $areplace[4] = "<center>$1</center>";
            $areplace[5] = "<font color=\"$1\">$2</font><font color=\"silver\">";
            $areplace[6] = "<img src=\"$1\">";
            $areplace[7] = "<font face=\"$1\">$2</font>";
            $areplace[8] = "<br>";
            $areplace[9] = "<font size=\"$1\">$2</font><font size=\"1\">";
            $areplace[10] = "<blockquote><b>$1</b></blockquote>";
            $areplace[11] = "<div align=\"left\">$1</div>";
            $areplace[12] = "<div align=\"right\">$1</div>";
            $areplace[13] = "<s>$1</s>";
            $areplace[14] = "<a href='viewprofile.php?username=$1'>$1</a>";
            $areplace[15] = "<a href='https://twitter.com/$1' target='_blank'>$1</a>";
            $areplace[16] = "$usernameone";
            $areplace[17] = "<object width=280 height=220><param name=movie value=http://www.youtube.com/v/$1></param><param name=wmode value=transparent></param><embed src=http://www.youtube.com/v/$1 type=application/x-shockwave-flash wmode=transparent width=280 height=220></embed></object>";

            $agetprofileid = preg_replace($apattern,$areplace,$getprofileidrawrawa);

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

            $getprofileid = str_replace($bpattern,$breplace,$agetprofileid, $countthree);

            $getstatussql = mysql_query("SELECT username FROM usersonline WHERE id = '$userids'");
            $getstatusnumrows = mysql_num_rows($getstatussql);

            $gtrow = mysql_query("SELECT username FROM senior WHERE username = '$getname'");
            $gtrows = mysql_num_rows($gtrow);
            if($gtrows > '0'){$hehehe = 'Senior ';}
            if($gtrows > '0'){$hehecolor = 'lime';}else{$hehecolor = 'lime';}
            if($getstatusarray == '0'){$getstatus == '';}else{$getstatus = '(<font color=lime face=verdana size=1><b>Online</b></font>)';}

            if($getcrewid == '0'){$getcrew = '<b>Crew</b>: <span class="profileItemVal">None</span>';}
            elseif($getcrewid != '0'){
                $getcrewsql = mysql_query("SELECT boss,id,name FROM crews WHERE id = '$getcrewid'");
                $getcrewarray = mysql_fetch_array($getcrewsql);

                $getcrewboss = $getcrewarray['boss'];
                $getcrewid = $getcrewarray['id'];
                $getcrewnameraw = html_entity_decode($getcrewarray['name'],ENT_NOQUOTES);
                $getcrewname = str_replace($zpattern,$zreplace,$getcrewnameraw);
                $getcrewunderboss = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE username = '$getname'"));

                if($getcrewboss == $getname){$getcrew = "<b>Boss Of</b>: <a href=\"viewcrew.php?crewid=$getcrewid\">$getcrewname</a>";}
                elseif($getcrewunderboss >= 1){$getcrew = "<b>Underboss Of</b>: <a href=\"viewcrew.php?crewid=$getcrewid\">$getcrewname</a>";}
                else{$getcrew = "<b>Crew</b>: <a href=\"viewcrew.php?crewid=$getcrewid\">$getcrewname</a>";}}

            if($getrankid == '1'){ $getrank = "$rank1"; }
            elseif($getrankid == '2'){ $getrank = "$rank2";}
            elseif($getrankid == '3'){ $getrank = "$rank3";}
            elseif($getrankid == '4'){ $getrank = "$rank4";}
            elseif($getrankid == '5'){ $getrank = "$rank5";}
            elseif($getrankid == '6'){ $getrank = "$rank6";}
            elseif($getrankid == '7'){ $getrank = "$rank7";}
            elseif($getrankid == '8'){ $getrank = "$rank8";}
            elseif($getrankid == '9'){ $getrank = "$rank9";}
            elseif($getrankid == '10'){ $getrank = "$rank10";}
            elseif($getrankid == '11'){ $getrank = "$rank11";}
            elseif($getrankid == '12'){ $getrank = "$rank12";}
            elseif($getrankid == '13'){ $getrank = "$rank13";}
            elseif($getrankid == '14'){ $getrank = "$rank14";}
            elseif($getrankid == '15'){ $getrank = "$rank15";}
            elseif($getrankid == '16'){ $getrank = "$rank16";}
            elseif($getrankid == '17'){ $getrank = "$rank17";}
            elseif($getrankid == '18'){ $getrank = "$rank18";}
            elseif($getrankid == '19'){ $getrank = "$rank19";}
            elseif($getrankid == '20'){ $getrank = "$rank20";}
            elseif($getrankid == '21'){ $getrank = "<b>$rank21</b>";}
            elseif($getrankid == '22'){ $getrank = "<b><font color='#FFC753'>$rank22</font></b>";}
            elseif($getrankid == '24'){ $getrank = 'Account being viewed';}
            elseif($getrankid == '25'){ $getrank = '<font color=royalblue><b>Moderator</b></font>';}
            elseif($getrankid == '50'){ $getrank = '<font color=yellow><b>Entertainer Manager</b></font>';}
            elseif($getrankid == '75'){ $getrank = '<font color=aqua><b>HDO Manager</b></font>';}
            elseif($getrankid == '100'){ $getrank = '<font color=red><b>Administrator</b></font>';}
            else{$getrank = '';}


            $etestrows = $enty;

            $regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
            $regbankarray = mysql_fetch_array($regbanksql );
            $regbank = $regbankarray['amount'];
            $regbankformat = number_format($regbank);

            $getmoneyid = $getmoneyid  + $regbank;

            if($getmoneyid == '0'){$getmoney = 'Broke';}
            elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
            elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
            elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
            elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
            elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
            elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
            elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'Monumental Billionaire';}
            elseif ($getmoneyid > '24999999999') { $getmoney = '<b>Colossal Billionaire</b>'; }

            if($getstatusnumrows == '0'){$getstatustwo = '(<span style="color:red;">Offline</span>)';}
            if($getname == 'None'){$getstatustwo = '(<span class="twinkle2" style="color:lime;">Online</span>)';}elseif($getstatusnumrows > '0'){$getstatustwo = '(<span class="twinkle2" style="color:lime;">Online</span>)';}

            if(!$getprofileid) { $getprofile = '&nbsp;'; }
            else { $getprofile = nl2br($getprofileid); }

            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($allowed,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterrankraw = $usernameone;

            $gangsterusernamearray = $statustesttwo;
            $gangsterrank = $gangsterusernamearray['rankid'];
            if($gangsterrank >= '100'){

                $bodyguards = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE username = '$getname'"));
                $bodyguardsa = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$getname'"));
                $bgcount = $bodyguards + $bodyguardsa;
            }


            $tony = $gangsterusernamearray['tony'];

            if($getstatusid == 'Dead'){$getstatus = '<span style="color: #666666;">Dead</span>';}
            elseif($getstatusid == 'Modkilled'){$getstatus = '<font color=red><b>*Modkilled*</b></font>';}
            else{$getstatus = 'Alive';}

            $tame = time();
            $ac = $tame - $activity;

            $at = $ac;

            if($at >= '31536000'){$ac = '1 Year ago';}
            elseif($at >= '5308400'){$ac = '2 Months ago';}
            elseif($at >= '4000000'){$ac = '1 & 1/2 Months ago';}
            elseif($at >= '2678400'){$ac = '1 Month ago';}
            elseif($at >= '1209600'){$ac = '2 Weeks ago';}
            elseif($at >= '604800'){$ac = '1 Week ago';}
            elseif($at >= '518400'){$ac = '6 Days ago';}
            elseif($at >= '432000'){$ac = '5 Days ago';}
            elseif($at >= '345600'){$ac = '4 Days ago';}
            elseif($at >= '259200'){$ac = '3 Days ago';}
            elseif($at >= '172800'){$ac = '2 Days ago';}
            elseif($at >= '86400'){$ac = 'Yesterday';}
            elseif($at >= '3600'){$one = floor($at / 3600);
                $ac = "$one Hours Ago";}
            else{$ac = "$at seconds ago";}
            $radni = mt_rand(0,3);


            $getcars = mysql_query("SELECT * FROM cars WHERE owner = '$getname' AND display = 'yes' ORDER BY carid DESC LIMIT 0,30");
            $getnotes=mysql_fetch_array(mysql_query("SELECT * FROM `notes` WHERE yourid = '$myid' AND theirid = '$userids'"));

            if(isset($_POST['note'])){
                $exit_note=mysql_num_rows(mysql_query("SELECT * FROM `notes` WHERE yourid = '$myid' AND theirid = '$userids'"));
                if($exit_note!=0){
                    mysql_query("UPDATE `notes` SET note = '".$_POST['note']."' WHERE yourid = '$myid' AND theirid = '$userids'");
                }else{
                    mysql_query("INSERT INTO `notes` (yourid,theirid,note) VALUES ('$myid','$userids','".$_POST['note']."')");
                }
                echo "Notes updated!";
            }

            ?>
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
                                View Profile: <span style="color: #FFC753;"><? echo $getname; ?></span>
                                <?if($hdo != 0){?>
                                    <span style="padding-left: 8px; color: #999999;">-</span>
                                    <span style="padding-left: 8px; color: lime;">HDO</span>
                                <?}?>
                            </div>

                            <?if ($roboteh != 0 && $mission_bot == 0){?>
                                <div class="profileItem" style="color: white; font-size: 120%; text-align: center; padding: 10px; padding-top: 13px; background-color: #333333;">
                                    Robot Account
                                </div>
                            <?}?>
                            <?if ($mission_bot == 1){?>
                                <div class="profileItem" style="color: white; font-size: 120%; text-align: center; padding: 10px; padding-top: 13px; background-color: #333333;">
                                    Mission Bot
                                </div>
                            <?}?>
                            <?
                            $check = mysql_query("SELECT * FROM hitlist WHERE username = '$getname'");
                            $rows = mysql_num_rows($check);
                            $hitlist=mysql_fetch_array($check);
                            if($rows == '1' && $getstatusid=="Alive"){
                                if($hitlist['type']==1)
                                    echo "<a class=\"profileItem\" href=\"hitlist.php\" style=\"display: block; color: white; font-size: 120%; text-align: center; padding: 10px; padding-top: 13px; background-color: maroon;\">
                                    Hitlisted for $".number_format($hitlist['amount'])." </a>";
                                elseif($hitlist['type']==2)
                                    echo "<a class=\"profileItem\" href=\"hitlist.php\" style=\"display: block; color: white; font-size: 120%; text-align: center; padding: 10px; padding-top: 13px; background-color: maroon;\">
                                    Hitlisted for ".number_format($hitlist['amount'])." points</a>";
                            }
                            ?>
                            <div class="shadowTest" style="position: relative; background-color: #323232; padding-top: 0px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;border-bottom: 1px solid #252525;">
                                <div style="position: absolute;right: 0;top: 0.5px;font-size: 0; text-align: right;">
                                    <?
                                    if($getinfoarray['image']!=null){?>
                                        <img onclick="openAvatar();" class="curve4pxBottomLeft shadowTest" style="									    background-color: #262626;
									    border-left: 2px solid #191919;
									    border-bottom: 2px solid #191919;
						    			cursor: pointer;
									    max-height: 113px;
									    max-width: 185px; margin-right: 0;" src="<?echo$getinfoarray['image'];?>">
                                    <?} ?>
                                </div>
                                <div class="profileItem" style="padding-top: 3px;">
                                    Username:
                                    <a href="#" onclick="openMsgForm(); return false;"><? echo $getname; ?></a>
                                </div>
                                <div class="profileItem">
                                    <? echo $getcrew; ?>
                                </div>
                                <div class="profileItem">
                                    Rank:
                                    <span class="profileItemVal">
                                        <?if($etestrows > '0'){echo"<b style=\"color: pink;\">Entertainer </b>";}else{echo "$getrank";} ?>
                                    </span>
                                </div>
                                <div class="profileItem">
                                    Wealth:
                                    <span class="profileItemVal">
                                        <?echo "$getmoney";?>
                                    </span>
                                </div>
                                <div class="profileItem">
                                    Status:
                                    <span class="profileItemVal">
                                        <? echo $getstatus; ?> <? echo $getstatustwo; ?>
                                    </span>
                                </div>
                                <?php  if($displaybusts == 'yes'){?>
                                <div class="profileItem">
                                    Jailbusts:
                                    <span class="profileItemVal">
                                        <?php echo$busts;?>
                                    </span>
                                </div>
                                <?}?>
                                <?php  if($displaykills == 'yes'){?>
                                    <div class="profileItem">
                                        Number Of Kills:
                                        <span class="profileItemVal"><?echo$kills;?></span>
                                    </div>
                                <?}?>
                                <?if($displaybustsa == '2'){?>
                                <div class="profileItem">
                                    Casino Wins:
                                    <span class="profileItemVal">
                                        <?php echo$casinos;?>
                                    </span>
                                </div>
                                <?}?>
                                <div class="profileItem">
                                    Messages Sent:
                                    <span class="profileItemVal"><? echo $getsmsgssent; ?></span>
                                </div>
                                <div class="profileItem" style=" padding-bottom: 3px; ">
                                    Messages Received:
                                    <span class="profileItemVal"><? echo $getsmsgsrecieved; ?></span>
                                </div>
                            <? while($getcarsarray = mysql_fetch_array($getcars)){
                            $carid = $getcarsarray['carid'];
                            $carida = $getcarsarray['id'];
                            $carnamea = $getcarsarray['carname'];
                            if($carid == 1){$carname = 'Volvo';}
                            elseif($carid == 2){$carname = 'Renault Clio';}
                            elseif($carid == 3){$carname = 'Porsche 911';}
                            elseif($carid == 4){$carname = 'BMW';}
                            elseif($carid == 5){$carname = 'Aston Martin';}
                            elseif($carid == 6){$carname = 'Alfa Romeo';}
                            elseif($carid == 7){$carname = 'Continental GT';}
                            elseif($carid == 8){$carname = 'Maybach 62';}
                            elseif($carid == 9){$carname = 'Maserati';}
                            elseif($carid == 10){$carname = 'Audi TT';}
                            elseif($carid == 11){$carname = 'Porsche Carrera GT';}
                            elseif($carid == 12){$carname = 'Pagani Zonda';}
                            elseif($carid == 13){$carname = $carnamea;}
                            elseif($carid == 14){$carname = 'Bugatti Veyron';}
                            elseif($carid == 15){$carname = 'Ferrari 458 Italia';}
                            elseif($carid == 16){$carname = 'Lamborghini Murcielago';}
                            elseif($carid == 17){$carname = 'Koenigsegg Agera R';}
                            elseif($carid == 18){$carname = 'Lamborghini Aventador';}
                            elseif($carid == 19){$carname = 'Audi Prologue';}
                            if($carid == 12){$before = '<b><font color=red face=verdana size=1>Very Rare:</b></font>';}
                            elseif($carid == 9){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
                            elseif($carid == 10){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
                            elseif($carid == 11){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
                            elseif($carid == 13){$before = '<b><font color=red face=verdana size=1>Custom:</b></font>';}
							elseif($carid == 16){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
							elseif($carid == 17){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
							elseif($carid >= 14 && $carid != 16 && $carid != 17){$before = '<b><font color=#0066FF face=verdana size=1>Super Rare:</b></font>';}
                            else{ $before = ''; }?>
                                <div class="profileItem">
                                    <a href="viewcar.php?id=<?echo $carida;?>" style="display: inline-block; width: 100%">Car: <?echo $before." ".$carname;?></a>
                                </div>
                            <?}?>
                                <?php if($showhonours >= 2 || $showhonours2 >= 2){
                                    $sql = mysql_query("SELECT * FROM achievements WHERE username = '$getname'");
                                    $sql2 = mysql_query("SELECT * FROM achievements WHERE username = '$getname'");
                                    $count_cachievements=mysql_num_rows($sql);
                                    $count_achievements=mysql_num_rows($sql2);
                                    $total=$count_cachievements+$count_achievements;

                                    if($total!=0) {
                                        echo "<div class=\"profileItemBig\">
                                           Honours (<b style=\"color: #FFC753;\">$total</b>):
                                        </div>";
                                    }
                                } ?>
                                <?php if($showhonours >= 2){ include 'achievements.php'; } ?>
                                <?php if($showhonours2 >= 2){ include 'cachievements.php'; } ?>
                            </div>
                        <div style="background-color: #333333; padding-bottom: 5px; width: 100%; text-align: left; font-size:10px;">
                            <div class="activityToggleHolder">
                                <div onclick="openActivity();" class="shadowTest curve3pxBottom noSelect activityToggle">
                                    Public&nbsp;Activity&nbsp;<img style="margin-left: 2px; margin-right: 0px; height: 7px;" src="images/down.png">
                                </div>
                            </div>
                            <div class="profile" style="min-height: 90px; padding: 13px; padding-top: 25px;">
                                <? if($countthree > '20'){
                                    echo'This user tried to post more than 20 smilies, this is <b>NOT</b> allowed';
                                }else{
                                    echo $getprofile;
                                }?>
                                <?php
                                if(!$music){

                                }else{
                                    $music=explode("v=",$music)[1];
                                    ?>
                                    <div style="text-align: center; margin: 10px; margin-top: 20px;">
                                        <iframe class="youtubeVid" src="https://www.youtube.com/embed/<?echo$music;?>?autoplay=<?if($autoplay){echo"1";}else{echo"0";}?>" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                <?}?>

                            </div>
                            <div class="spacer"></div>
                            <div style="text-align: center; padding: 5px;"><a href="#" onclick="rotateArrow(); return false;" class="notesToggle">Show / Hide My Notes on <? echo $getname; ?><img style="padding-left: 2px; margin-top: -1px; height: 7px;" id="arrow" src="images/down.png"></a></div>
                            <div class="spacer"></div>
                            <div id="mynotes" style="display: none;">
                                <br class="break" style="margin-top: 4px;">
                                <form method="post" action="" style="width:40%; margin: auto; text-align: center;">
                                    <textarea class="textarea" id="note" name="note" style="width: 100%; height: 150px;" placeholder="Write Note..."><?if($getnotes!=null){echo $getnotes['note'];}?></textarea><br>
                                    <input style="margin-top: -2px; padding-left: 6px; margin-bottom: 5px; padding-right: 6px;  display: block; float: right;" class="textarea" value="Save Changes" type="submit">
                                    <div style="clear: both;"></div>
                                </form>
                                <br class="break" style="padding-top: 3px;">
                                <div class="spacer"></div>
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
            <div id="clickOff" class="clickOff" style="display: none;"></div>
            <div id="hoverDiv" class="hoverDiv" style="display: none;left:0;">
                <table class="menuTable curve10px" style="width: 100px; z-index: 2000;  overflow: hidden;" cellspacing="0" cellpadding="0" align="center">
                    <tbody><tr>
                        <td class="topleft"></td>
                        <td class="top"></td>
                        <td class="topright"></td>
                    </tr>
                    <tr>
                        <td class="left"></td>
                        <td style="position: relative;">
                            <img src="<?echo $getinfoarray['image']?>" id="myAv" style="border: 0px none; min-width: 100px; min-height: 50px; max-height: 338.3px; max-width: 1215.74px;">
                            <a href="#" onclick="closeAvatar(); return false;" class="shadowTest curve4pxBottomLeft close" style="background-color: #333333; border-left: 2px solid #111111; border-bottom: 2px solid #111111;">close</a>
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
            <div id="hoverDiv2" class="hoverDiv" style="display: none;left:0;">
                <form method="post" name="smiley" action="send.php?sendto=<?echo$getusername;?>">
                    <input name="recipient" value="KingOfTheNorth" type="hidden">
                    <table class="menuTable curve10px" style="margin-top: 60px; width: 50px; z-index: 2000;" cellspacing="0" cellpadding="0" align="center">
                        <tbody><tr>
                            <td class="topleft"></td>
                            <td class="top"></td>
                            <td class="topright"></td>
                        </tr>
                        <tr>
                            <td class="left"></td>
                            <td>
                                <div class="main curve2px">
                                    <div class="menuHeader noTop">
                                        Send Message to: <span style="color: #FFC753;"><?echo $getname;?></span>
                                        <a href="#" onclick="closeMsgForm(); return false;" style="margin-left: -35px; float: right; opacity: 0.80; filter: alpha(opacity=80); -ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=80)';">close</a>
                                    </div>
                                    <textarea class="textarea" name="sendinfo" style="width: 100%; border-left: 0; border-right: 0; height: 150px; box-sizing: border-box;" id="msgOrComment" placeholder="Enter Message..."></textarea><br>
                                    <table style="margin-top: -2px;" width="100%" cellspacing="0" cellpadding="0">
                                        <tbody><tr>
                                            <td style="padding-left: 3px;" nowrap="">
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
                                            </td>
                                            <td nowrap="">
                                                <input class="textarea" style="margin-left: 4px; border-bottom: 0; border-right: 0; padding-left: 11px; padding-right: 11px; display: inline-block;" name="<? echo"$button";?>" value="Send Message" type="submit">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
                </form>
            </div>
            <div id="hoverDiv3" class="hoverDiv" style="padding-top: 60px;display: none;left: 0;">
                <div class="txtShadow recentAcFilter" style="white-space: nowrap;">
                    <span style="padding-right: 7px;">Show:</span>
                    <a href="#" onclick="allAC(); return false;">All</a> <span class="recentAcSplitter">-</span>
                    <a href="#" onclick="killsAC(); return false;">Kills</a> <span class="recentAcSplitter">-</span>
                    <a href="#" onclick="ranksAC(); return false;">Promotions</a> <span class="recentAcSplitter">-</span>
                    <a href="#" onclick="achievementsAC(); return false;">Achievements</a> <span class="recentAcSplitter">-</span>
                    <a href="#" onclick="casinosAC(); return false;">Casinos</a>
                </div>
                <table class="menuTable curve10px" style="width: 380px; z-index: 2000;  overflow: hidden;" cellspacing="0" cellpadding="0" align="center">
                    <tbody><tr>
                        <td class="topleft"></td>
                        <td class="top"></td>
                        <td class="topright"></td>
                    </tr>
                    <tr>
                        <td class="left"></td>
                        <td>
                            <div style="position: relative; display: block;">
                                <div class="menuHeader noTop shadowTest" style="color: silver; width: 100%; box-sizing: border-box; -moz-box-sizing: border-box; position: absolute;">
                                    Public Activity
                                    <a href="#" onclick="closeActivity(); return false;" style="margin-left: -35px; float: right;  opacity: 0.80; filter: alpha(opacity=80); -ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=80)';">close</a>
                                </div>
                                <div class="main recentAc preventscroll" id="recentAc" style="max-height: 238.8px;">
                                    <?
                                    $kills = mysql_query("SELECT * FROM kills WHERE killer = '$getname'");
                                    while($kill = mysql_fetch_array($kills)){
                                    $now=new DateTime();
                                    $time=DateTime::createFromFormat('Y-m-d H:i:s',$kill['time']);
                                    $diff=$now->diff($time);
                                        ?>

                                    <div class="js-activity-div killsAc">
                                        <?if($myname==$getname){?>
                                            <a href="#" class="js-delete-ac" data-id="<?echo $kill['id']?>" data-table="6" style="margin-top: 1px; float: right; font-size: 9px;">&nbsp;&nbsp;[Delete]</a>
                                        <?} ?>
                                        <span class="masterTooltip recentAcTime" style="display: inline-block;" title="<?$title_time=DateTime::createFromFormat('Y-m-d H:i:s',$kill['time']); echo $title_time->format('Y-m-d H:i:s');?>">
                                            <?
                                            if($diff->format('%a')>10){
                                                echo $time->format('Y-m-d');
                                            }elseif($diff->format('%i')<=0) {
                                                echo "Just now";
                                            }elseif($diff->format('%h')<=0) {
                                                echo $diff->format('%i mins ago');
                                            }elseif($diff->format('%a')<=0) {
                                                echo $diff->format('%h hrs ago');
                                            }else{
                                                echo $diff->format('%a days ago');
                                            }
                                            ?>
                                        </span>
                                        <a href="viewprofile.php?username=<?echo $kill['killer']?>"><?echo $kill['killer']?></a>
                                        killed
                                        <a href="viewprofile.php?username=<?echo $kill['victim']?>"><?echo $kill['victim']?></a>
                                    </div>
                                    <?}?>
                                    <?
                                    $bjbets = mysql_query("SELECT * FROM casinoblackjackbets WHERE username = '$getname' AND result = 'win'");
                                    while($bet = mysql_fetch_array($bjbets)){
                                        $now=new DateTime();
                                        $time=DateTime::createFromFormat('d.m.y',$bet['time']);
                                        $diff=$now->diff($time);
                                        ?>

                                        <div class="js-activity-div casinosAc">
                                            <?if($myname==$getname){?>
                                                <a href="#" class="js-delete-ac" data-table="5" data-id="<?echo $bet['id']?>" style="margin-top: 1px; float: right; font-size: 9px;">&nbsp;&nbsp;[Delete]</a>
                                            <?} ?>
                                        <span class="masterTooltip recentAcTime" style="display: inline-block;" title="<?$title_time=DateTime::createFromFormat('d.m.y',$bet['time']); echo $title_time->format('Y-m-d');?>">
                                            <?
                                            if($diff->format('%a')>10){
                                                echo $time->format('Y-m-d');
                                            } else{
                                                echo $diff->format('%a days ago');
                                            }
                                            ?>
                                        </span>
                                            <a href="viewprofile.php?username=<?echo $bet['username']?>"><?echo $bet['username']?></a>
                                            won
                                            <span style="color: #E3E3E3;"><?echo $bet['location']?> Blackjack Game</span>.
                                        </div>
                                    <?}?>
                                    <?
                                    $dicebets = mysql_query("SELECT * FROM casinodicebets WHERE username = '$getname' AND result = 'win'");
                                    while($bet = mysql_fetch_array($dicebets)){
                                        $now=new DateTime();
                                        $time=DateTime::createFromFormat('d.m.y',$bet['time']);
                                        $diff=$now->diff($time);
                                        ?>

                                        <div class="js-activity-div casinosAc">
                                            <?if($myname==$getname){?>
                                                <a href="#" class="js-delete-ac" data-table="4" data-id="<?echo $bet['id']?>" style="margin-top: 1px; float: right; font-size: 9px;">&nbsp;&nbsp;[Delete]</a>
                                            <?} ?>
                                        <span class="masterTooltip recentAcTime" style="display: inline-block;" title="<?$title_time=DateTime::createFromFormat('d.m.y',$bet['time']); echo $title_time->format('Y-m-d');?>">
                                            <?
                                            if($diff->format('%a')>10){
                                                echo $time->format('Y-m-d');
                                            } else{
                                                echo $diff->format('%a days ago');
                                            }
                                            ?>
                                        </span>
                                            <a href="viewprofile.php?username=<?echo $bet['username']?>"><?echo $bet['username']?></a>
                                            won
                                            <span style="color: #E3E3E3;"><?echo $bet['location']?> Dice Game</span>.
                                        </div>
                                    <?}?>
                                    <?
                                    $racingbets = mysql_query("SELECT * FROM casinoracebets WHERE username = '$getname' AND result = 'win'");
                                    while($bet = mysql_fetch_array($racingbets)){
                                        $now=new DateTime();
                                        $time=DateTime::createFromFormat('d.m.y',$bet['time']);
                                        $diff=$now->diff($time);
                                        ?>

                                        <div class="js-activity-div casinosAc">
                                            <?if($myname==$getname){?>
                                                <a href="#" class="js-delete-ac" data-table="3" data-id="<?echo $bet['id']?>" style="margin-top: 1px; float: right; font-size: 9px;">&nbsp;&nbsp;[Delete]</a>
                                            <?} ?>
                                        <span class="masterTooltip recentAcTime" style="display: inline-block;" title="<?$title_time=DateTime::createFromFormat('d.m.y',$bet['time']); echo $title_time->format('Y-m-d');?>">
                                            <?
                                            if($diff->format('%a')>10){
                                                echo $time->format('Y-m-d');
                                            } else{
                                                echo $diff->format('%a days ago');
                                            }
                                            ?>
                                        </span>
                                            <a href="viewprofile.php?username=<?echo $bet['username']?>"><?echo $bet['username']?></a>
                                            won
                                            <span style="color: #E3E3E3;"><?echo $bet['location']?> Horse Racing Game</span>.
                                        </div>
                                    <?}?>
                                    <?
                                    $roulettebets = mysql_query("SELECT * FROM casinoroulettebets WHERE username = '$getname' AND result = 'win'");
                                    while($bet = mysql_fetch_array($roulettebets)){
                                        $now=new DateTime();
                                        $time=DateTime::createFromFormat('d.m.y',$bet['time']);
                                        $diff=$now->diff($time);
                                        ?>

                                        <div class="js-activity-div casinosAc">
                                            <?if($myname==$getname){?>
                                                <a href="#" class="js-delete-ac" data-table="2" data-id="<?echo $bet['id']?>" style="margin-top: 1px; float: right; font-size: 9px;">&nbsp;&nbsp;[Delete]</a>
                                            <?} ?>
                                        <span class="masterTooltip recentAcTime" style="display: inline-block;" title="<?$title_time=DateTime::createFromFormat('d.m.y',$bet['time']); echo $title_time->format('Y-m-d');?>">
                                            <?
                                            if($diff->format('%a')>10){
                                                echo $time->format('Y-m-d');
                                            } else{
                                                echo $diff->format('%a days ago');
                                            }
                                            ?>
                                        </span>
                                            <a href="viewprofile.php?username=<?echo $bet['username']?>"><?echo $bet['username']?></a>
                                            won
                                            <span style="color: #E3E3E3;"><?echo $bet['location']?> Roulette Game</span>.
                                        </div>
                                    <?}?>
                                    <?
                                    $ranks = mysql_query("SELECT * FROM home WHERE username = '$getname' AND (type = '1' OR type = '3')");
                                    while($rank = mysql_fetch_array($ranks)){
                                        $now=new DateTime();
                                        $time=DateTime::createFromFormat('Y-m-d H:i:s',$rank['time']);
                                        $diff=$now->diff($time);
                                        ?>

                                        <div class="js-activity-div ranksAc">
                                            <?if($myname==$getname){?>
                                                <a href="#" class="js-delete-ac" data-table="1" data-id="<?echo $rank['id']?>" style="margin-top: 1px; float: right; font-size: 9px;">&nbsp;&nbsp;[Delete]</a>
                                            <?} ?>
                                        <span class="masterTooltip recentAcTime" style="display: inline-block;" title="<?$title_time=DateTime::createFromFormat('Y-m-d H:i:s',$rank['time']); echo $title_time->format('Y-m-d H:i:s');?>">
                                            <?
                                            if($diff->format('%a')>10){
                                                echo $time->format('Y-m-d');
                                            }elseif($diff->format('%i')<=0) {
                                                echo "Just now";
                                            }elseif($diff->format('%h')<=0) {
                                                echo $diff->format('%i mins ago');
                                            }elseif($diff->format('%a')<=0) {
                                                echo $diff->format('%h hrs ago');
                                            }else{
                                                echo $diff->format('%a days ago');
                                            }
                                            ?>
                                        </span>
                                            <a href="viewprofile.php?username=<? echo $getname; ?>"><? echo $getname; ?></a>
                                            <?
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

                                            $text = preg_replace($epattern,$ereplace,$rank['update']);


                                            echo $text;
                                            ?>
                                        </div>
                                    <?}?>
                                    <div class="js-activity-div noAcToShow" style="display: none;">No Activity.</div>
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
            <?if($etestrows > '0') {

                $lasttensql = mysql_query("SELECT * FROM moneysent WHERE username = '$getname' ORDER BY id DESC LIMIT 0,200");
                $cntsent = mysql_num_rows($lasttensql);
                $lasttenrsql = mysql_query("SELECT * FROM moneysent WHERE sent = '$getname' ORDER BY id DESC LIMIT 0,200");
                $cntrec = mysql_num_rows($lasttenrsql);?>

                <div style="text-align: center; padding-top: 20px; vertical-align: top;">
                    <div style="display: inline-block; width: 40%; text-align: center;">
                        Money - Last 200 Sent
                        <div class="preventscroll" style="margin-top: 7px; max-height: 150px; overflow-y: auto;">
                            <table class="regTable inner" cellspacing="0" cellpadding="0">
                                <tbody>
                                <?php
                                if($cntsent < 1){ echo "<tr class=\"row\">
                                <td class=\"col noTop\" style=\"color: #dddddd; padding-right: 10px; \">No records yet.</td>
                                </tr>"; }else{
                                    $cont=0;
                                    while($lasttenarray = mysql_fetch_array($lasttensql)){
                                        $cont++;
                                        $senttime = $lasttenarray['time'];
                                        $lasttento = $lasttenarray['sent'];
                                        $lasttenamount = number_format($lasttenarray['amount']);
                                        $now=new DateTime();
                                        $time=DateTime::createFromFormat('Y-m-d H:i:s',$senttime);
                                        $diff=$now->diff($time);
                                        if($cont==1){
                                            echo "<tr class=\"row\">
                                         <td class=\"col noTop\" style=\"padding-right: 10px; color: #cccccc;\">Sent <span style=\"color: #eeeeee;\">$$lasttenamount</span> to <a href=\"viewprofile.php?username=$lasttento\">$lasttento</a></td>
                                         <td class=\"col noTop\" style=\"padding-right: 10px; font-size: 9px; width: 15%; color: #777777; \"><span class=\"masterTooltip\" title=\" ".$time->format('Y-m-d H:i:s')."\">";

                                            if($diff->format('%a')>10){
                                                echo $time->format('Y-m-d');
                                            }
                                            elseif($diff->format('%h')<=0) {
                                                echo $diff->format('%i minutes ago');
                                            }elseif($diff->format('%a')<=0) {
                                                echo $diff->format('%h hours ago');
                                            }else{
                                                echo $diff->format('%a days ago');
                                            }
                                            echo"</span>
                                        </td>
                                        </tr>";
                                        }else{
                                            echo "<tr class=\"row\">
                                         <td class=\"col \" style=\"padding-right: 10px; color: #cccccc;\">Sent <span style=\"color: #eeeeee;\">$$lasttenamount</span> to <a href=\"viewprofile.php?username=$lasttento\">$lasttento</a></td>
                                         <td class=\"col \" style=\"padding-right: 10px; font-size: 9px; width: 15%; color: #777777; \"><span class=\"masterTooltip\" title=\" ".$time->format('Y-m-d H:i:s')."\">";

                                            if($diff->format('%a')>10){
                                                echo $time->format('Y-m-d');
                                            }
                                            elseif($diff->format('%h')<=0) {
                                                echo $diff->format('%i minutes ago');
                                            }elseif($diff->format('%a')<=0) {
                                                echo $diff->format('%h hours ago');
                                            }else{
                                                echo $diff->format('%a days ago');
                                            }
                                            echo"</span>
                                        </td>
                                        </tr>";
                                        }
                                    }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="display: inline-block; width: 40%; text-align: center; vertical-align: top;">
                        Money - Last 200 Received
                        <div class="preventscroll" style="margin-top: 7px; max-height: 150px; overflow-y: auto;">
                            <table class="regTable inner" cellspacing="0" cellpadding="0">
                                <tbody>
                                <?php
                                if($cntrec == 0){ echo "<tr class=\"row\">
                                                                        <td class=\"col noTop\" style=\"color: #dddddd; padding-right: 10px; \">No records yet.</td>
                                                                    </tr>"; }else{
                                    $cont=0;
                                    while($lasttenrarray = mysql_fetch_array($lasttenrsql)){
                                        $cont++;
                                        $rectime = $lasttenrarray['time'];
                                        $lasttenrto = $lasttenrarray['username'];
                                        $lasttenramount = number_format($lasttenrarray['amount']);
                                        $now=new DateTime();
                                        $time=DateTime::createFromFormat('Y-m-d H:i:s',$rectime);
                                        $diff=$now->diff($time);
                                        if($cont==1){
                                            echo "<tr class=\"row\">
                                                                                    <td class=\"col noTop\" style=\"padding-right: 10px; color: #cccccc;\">Received <span style=\"color: #eeeeee;\">$$lasttenamount</span> from <a href=\"viewprofile.php?username=$lasttento\">$lasttento</a></td>
                                                                                    <td class=\"col noTop\" style=\"padding-right: 10px; font-size: 9px; width: 15%; color: #777777; \"><span class=\"masterTooltip\" title=\" ".$time->format('Y-m-d H:i:s')."\">";

                                            if($diff->format('%a')>10){
                                                echo $time->format('Y-m-d');
                                            }
                                            elseif($diff->format('%h')<=0) {
                                                echo $diff->format('%i minutes ago');
                                            }elseif($diff->format('%a')<=0) {
                                                echo $diff->format('%h hours ago');
                                            }else{
                                                echo $diff->format('%a days ago');
                                            }
                                            echo"</span>
                                                                                    </td>
                                                                                </tr>";
                                        }else{
                                            echo "<tr class=\"row\">
                                                                                    <td class=\"col \" style=\"padding-right: 10px; color: #cccccc;\">Received <span style=\"color: #eeeeee;\">$$lasttenamount</span> from <a href=\"viewprofile.php?username=$lasttento\">$lasttento</a></td>
                                                                                    <td class=\"col \" style=\"padding-right: 10px; font-size: 9px; width: 15%; color: #777777; \"><span class=\"masterTooltip\" title=\" ".$time->format('Y-m-d H:i:s')."\">";

                                            if($diff->format('%a')>10){
                                                echo $time->format('Y-m-d');
                                            }
                                            elseif($diff->format('%h')<=0) {
                                                echo $diff->format('%i minutes ago');
                                            }elseif($diff->format('%a')<=0) {
                                                echo $diff->format('%h hours ago');
                                            }else{
                                                echo $diff->format('%a days ago');
                                            }
                                            echo"</span>
                                                                                    </td>
                                                                                </tr>";
                                        }
                                    }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?}?>
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



