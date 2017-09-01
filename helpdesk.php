<? include 'included.php'; session_start(); ?>
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
        function emotion(em) {
            $('#newpost').val($('#newpost').val() + em);
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
            <?php
            $poster = $_GET['deletepost'];
            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $nameraw = mysql_real_escape_string($_POST['name']);
            $demotehdoraw = mysql_real_escape_string($_POST['demotehdo']);
            $deleteraw = mysql_real_escape_string($_GET['dticket']);
            $sessionid = preg_replace($saturate, "", $sessionidraw);
            $deletepost = preg_replace($saturated, "", $poster);
            $name = preg_replace($saturate, "", $nameraw);
            $delete = preg_replace($saturated, "", $poster);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;

            $playerarray = $statustesttwo;
            $playerrank = $playerarray['rankid'];
            $thdotestnumrows = $playerarray['hdo'];
            $latestip = $playerarray['latestip'];

            $ahdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone'"));
            $ahdoban = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$usernameone' AND ban = '1'"));
            $newqraw = mysql_real_escape_string($_POST['newq']);
            $newq = htmlentities($newqraw, ENT_QUOTES);

            $ticketsans = mysql_fetch_object(mysql_query("SELECT SUM(tickets)AS worldtotal FROM users"));
            $totalanswered = number_format($ticketsans->worldtotal);

            if ($usernameone == 'Pentium') {
                if (isset($_GET['deletepost'])) {
                    mysql_query("DELETE FROM forumposts WHERE type = 'hdo' AND id = '$deletepost'");
                }
            }

            if (isset($_POST['dopost'])) {
                $mutedusernamesql = mysql_query("SELECT username,ip FROM muted WHERE username = '$gangsterusername'") or die(mysql_error());
                $mutedusernamerows = mysql_num_rows($mutedusernamesql);
                $mutedusernamearray = mysql_fetch_array($mutedusernamesql);
                $mutedusernameone = $mutedusernamearray['username'];
                $mutedipone = $mutedusernamearray['ip'];

                $mutedipsql = mysql_query("SELECT username,ip FROM muted WHERE ip = '$userip'") or die(mysql_error());
                $mutediprows = mysql_num_rows($mutedipsql);
                $mutediparray = mysql_fetch_array($mutedipsql);
                $mutedusernametwo = $mutediparray['username'];
                $mutediptwo = $mutediparray['ip'];

                if ($mutedusernamerows > '0') {
                    die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>Staff</b> to be unmuted!");
                } elseif ($mutediprows > '0') {
                    die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>Staff</b> to be unmuted!");
                }

                if (!$newq) {
                } else {
                    if (($playerrank < '25') && ($ahdo < '1')) {
                        mysql_query("UPDATE hdonew SET number = (number + 1)");
                    }
                    mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername','$topicid','$userip','hdo','$newq','$myrank')");
                    mysql_query("UPDATE gametimes SET time = (time + 1) WHERE game = 'helpdesk'");
                    $showoutcome++;
                    $outcome = "A staff member will reply to your question shortly!";
                }
            }

            if ($name) {
                $exist = mysql_query("SELECT * FROM users WHERE username = '$name'");
                $exista = mysql_num_rows($exist);
                $namearray = mysql_fetch_array($exist);
                $namerank = $namearray['rankid'];

                $muteuserchecktwo = mysql_query("SELECT * FROM muted WHERE username = '$name'");
                $muteusertwo = mysql_num_rows($muteuserchecktwo);
            }

            if (isset($_POST['perm'])) {
                if ($playerrank < 25 AND $ahdo < 1) {
                } else {
                    $permcheck = mysql_query("SELECT * FROM permission WHERE username = '$name'");
                    $perm = mysql_num_rows($permcheck);

                    if (!$name) {
                    } elseif ($exista < '1') {
                        $showoutcome++;
                        $outcome = "No such user!";
                    } elseif ($perm != '0') {
                        $showoutcome++;
                        $outcome = "User already has permission!";
                    } else {
                        $getipsql = mysql_query("SELECT latestip FROM users WHERE ID = '$ida'");
                        $getiparray = mysql_fetch_array($getipsql);
                        $ip = $getiparray['latestip'];
                        mysql_query("INSERT INTO permission(username,gaveby,gavebyip)
VALUES ('$name','$gangsterusername','$ip')");
                        $showoutcome++;
                        $outcome = "Player <b>$name</b> can now message <b>Administrators</b>!";
                        mysql_query("INSERT INTO helpdesklogs(ip,usernameone,thereuser,reason) VALUES ('$latestip','$usernameone','$name','$name was given permission by $usernameone')");
                    }
                }
            }

            if (isset($_POST['clearpost'])) {
                if ($exista < '1') {
                } else {
                    $getclearnamee = mysql_query("SELECT username FROM users WHERE username = '$name'");
                    $getclearname = mysql_fetch_array($getclearnamee);
                    $lmao = $getclearname['username'];
                    mysql_query("DELETE FROM forumposts WHERE username = '$lmao'");
                    mysql_query("DELETE FROM forumtopics WHERE creator = '$lmao'");
                    mysql_query("DELETE FROM messages WHERE sentto = '$lmao'");
                    mysql_query("DELETE FROM messages WHERE sentfrom = '$lmao'");
                    $showoutcome++;
                    $outcome = "Player <b>$lmao</b> has been cleared!";
                    mysql_query("INSERT INTO helpdesklogs(ip,usernameone,thereuser,reason) VALUES ('$latestip','$usernameone','$name','$name was cleared by $usernameone')");
                }
            }

			
            if (isset($_POST['cancel_permission'])) {
                if ($exista < '1') {
                } else {
                    $getclearnamee = mysql_query("SELECT username FROM users WHERE username = '$name'");
                    $getclearname = mysql_fetch_array($getclearnamee);
                    $lmao = $getclearname['username'];
                    mysql_query("DELETE FROM permission WHERE username = '$lmao'");
                    $showoutcome++;
                    $outcome = "Player <b>$lmao</b> doesn't have permission now!";
                    mysql_query("INSERT INTO helpdesklogs(ip,usernameone,thereuser,reason) VALUES ('$latestip','$usernameone','$name','$usernameone cancel permission for $name')");
                }
            }

			
			
            if ($_POST['mute'] && $_POST['who']){
                $getipsql = mysql_query("SELECT * FROM users WHERE username = '$name'");
                $getiparray = mysql_fetch_array($getipsql);
                $saturate = "/[^a-z0-9]/i";
                $saturated = "/[^0-9]/i";
                $sessionidraw = $_COOKIE['PHPSESSID'];
                $muteip = $getiparray['latestip'];
                $names = $_POST['who'];
                $reasons = $_POST['reason'];
                $name = preg_replace($saturate,"",$names);
                $reason = preg_replace($saturate,"",$reasons);
                $ifuser = mysql_num_rows(mysql_query("SELECT username FROM users WHERE username = '$name'"));
                if($reason == ""){ $showoutcome++; $outcome="<font size=1 face=verdana>Please enter a reason!";
                }elseif($ifuser == 0){ $showoutcome++; $outcome="<font size=1 face=verdana>No such user!";
                }else{

                    if($_POST['automute'] == 1){
                        $hours = $_POST['hours'];
                        $days = $_POST['days'];
                        $totalh = $hours * 3600;
                        $totald = $days * 86400;
                        $endtot = $totald + $totalh;
                        $endtot = time()+$endtot;
                    }else{ $endtot = 0; }

                    mysql_query("INSERT INTO muted(username,ip,reason,mutedby,autounmute)
VALUES ('$name','$muteip','$reason','$gangsterusername','$endtot')");
                    $postinfo = "[b]Muted:[/b] $name [b]Reason:[/b] $reason";
                    mysql_query("INSERT INTO forumposts(username,topicid,type,post,rankid,esc)
VALUES ('$gangsterusername','6','hdof','$postinfo','$playerrank','1')");
                    $showoutcome++; $outcome="<font size=1 face=verdana>You have muted <b>$name</b>";}}

            $unmute = strip_tags($_GET['id']);
            if($unmute) {
                mysql_query("DELETE FROM muted WHERE username = '$unmute'");
                $showoutcome++; $outcome="<font size=1 face=verdana>You have unmuted <b>$unmute</b>!";}

            $promotechecksql = mysql_query("SELECT * FROM users WHERE username = '$name'");
            $promotecheck = mysql_num_rows($promotechecksql);

            if ($gangsterusername == 'Pentium') {
                if (isset($_POST['dop'])) {
                    if (!$name) {
                    } elseif ($promotecheck < '1') {
                    } else {
                        $promotearray = mysql_fetch_array($promotechecksql);
                        $promotename = $promotearray['username'];
                        $ifalreadyhdo = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$promotename' AND type = 'senior'"));
                        if ($ifalreadyhdo < 1) {
                            mysql_query("DELETE FROM hdos WHERE username = '$promotename'");
                            mysql_query("INSERT INTO hdos(username,promotedby,type) VALUES ('$promotename','$gangsterusername','senior')");
                            mysql_query("INSERT INTO helpdesklogs(ip,usernameone,thereuser,reason) VALUES ('$latestip','$usernameone','$promotename','$promotename was promoted by $usernameone')");
                            $showoutcome++;
                            $outcome = "<b>$promotename</b> is now a HDO!";
                        } else {
                            mysql_query("DELETE FROM hdos WHERE username = '$promotename'");
                            $showoutcome++;
                            $outcome = "<b>$promotename</b> has been demoted!";
                        }
                    }
                } elseif (isset($_POST['hdoban'])) {
                    if (!$name) {
                    } else {
                        $ifalready = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$name' AND ban = '1'"));
                        if ($ifalready > 0) {
                            mysql_query("UPDATE hdos SET ban = 0 WHERE username = '$name'");
                        } else {
                            mysql_query("UPDATE hdos SET ban = 1 WHERE username = '$name'");
                        }
                        $showoutcome++;
                        $outcome = "<b>$name</b> can now use the ban advertisers tool!";
                        mysql_query("INSERT INTO helpdesklogs(ip,usernameone,thereuser,reason) VALUES ('$latestip','$usernameone','$name','$name was allowed the ban tool by $usernameone')");
                    }
                } elseif (isset($_POST['hdodelete'])) {
                    if (!$name) {
                    } else {
                        $ifalready = mysql_num_rows(mysql_query("SELECT * FROM hdos WHERE username = '$name' AND deletetopic = '1'"));
                        if ($ifalready > 0) {
                            mysql_query("UPDATE hdos SET deletetopic = 0 WHERE username = '$name'");
                        } else {
                            mysql_query("UPDATE hdos SET deletetopic = 1 WHERE username = '$name'");
                        }
                        $showoutcome++;
                        $outcome = "<b>$name</b> can now delete forum topics!";
                        mysql_query("INSERT INTO helpdesklogs(ip,usernameone,thereuser,reason) VALUES ('$latestip','$usernameone','$name','$name was allowed the delete tool by $usernameone')");
                    }
                }
            }
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
                                Help Desk
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-bottom: 6px; text-align: center;">
                                    <form action="" method="post" name="smiley">
                                        <div style="margin: auto; min-width: 420px; width: 65%; max-width: 500px; box-sizing: border-box;">
                                            <div style="padding: 12px;">You may ask questions here. A staff member will respond as soon as possible.</div>
                                            <div style="padding-left: 2px; text-align: center; padding-top: 3px; text-align: right; color: #dddddd;">
                                                <textarea name="newq" class="textarea inline_form" style="box-sizing: border-box; height: 100px; width: 100%;" id="newpost"></textarea><br>
                                                <center>
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
                                                </center>
                                                <br/><input type="submit" value="Ask Question" class="textarea curve3Px"
                                                            name="dopost">
                                            </div>
                                        </div>
                                    </form>

                                    <? if (($playerrank >= '25') || ($ahdo > '0')){ ?>
                                    <span>Total tickets answered:<span
                                                style="color:khaki;"><b> <? echo $totalanswered ?></b></span><br><br>

                                            <form action="" method="post">
                                                <input type="text" name="name" onclick="this.value=''"
                                                       placeholder="Enter Username.." class="textarea inline_form">
                                                <input type="submit" name="perm" class="textarea curve3Px"
                                                       value="Admin Permission">
                                                <input type="submit" name="clearpost" class="textarea curve3Px"
                                                       value="Clear advertiser">
                                                <input type="submit" name="cancel_permission" class="textarea curve3Px"
                                                       value="Remove Permission">
                                                <? if ($gangsterusername == 'Pentium'){ ?>
                                                <input type="submit" name="dop" class="textarea curve3Px"
                                                       value="Promote/Demote HDO">
                                                <input type="submit" name="hdoban" class="textarea curve3Px"
                                                       value="Allow HDO Ban">
                                                <input type="submit" name="hdodelete" class="textarea curve3Px"
                                                       value="Allow HDO Topics">
                                        <? }?>
                                            </form>
                                        <br/>
                                        <form action="" method="post" name="mute" style="text-align: center;">
                                        <input type="text" class="textarea" name="who" placeholder="Enter a Username..." value="<?php echo$name?>">
                                        <input type="text" class="textarea" placeholder="Enter a Reason..." name="reason">
                                        <br/><br/>
                                        <input type="checkbox" class="textarea" name="automute" value="1"> Set mute timer?:

                                        <select name="days" class="textarea">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select> Days and

                                        <select name="hours" class="textarea">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                        </select> Hours
                                        <br><br>

                                        <input type="submit" name="mute" class="textarea curve3px" value="Mute">
                                        </form>
                                        <?} ?>

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
            $selecter = preg_replace($saturated, "", $selecterraw);
            if (isset($_POST['next'])) {
                $one = $selecter + 1;
            } elseif (isset($_POST['previous'])) {
                $one = $selecter - 1;
            } else {
                $one = '0';
            }

            $selectfroma = $one * 30;
            $selecttoa = $selectfrom + 30;
            $selectfrom = preg_replace($saturated, "", $selectfroma);
            $selectto = preg_replace($saturated, "", $selecttoa);

            $getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'hdo' ORDER BY id DESC LIMIT $selectfrom,$selectto"); ?>
            <? if (($playerrank >= '25') || ($ahdo > '0')) { ?>
                <form action="helpdesk.php" method="post">
                    <div style="text-align: center;width: 100%;padding: 5px 0;">
                        <input type="hidden" name="select" value="<? echo $one; ?>">
                        <?php if ($selectfrom != '0') {
                            echo '<input type ="submit" value="Previous page" class="textarea curve3Px" name="previous">';
                        } ?>
                        <input type="submit" value="Next page" class="textarea curve3Px" name="next">
                    </div>
                </form>
                <?

                mysql_query("UPDATE gametimes SET time = '0' WHERE game = 'helpdesk'");
                while ($getpostsarray = mysql_fetch_array($getposts)) {
                    $postname = $getpostsarray['username'];
                    $postid = $getpostsarray['id'];
                    $postinforawa = html_entity_decode($getpostsarray['post'], ENT_QUOTES);
                    $postinforawb = $postinforawa;
                    $postime = $getpostsarray['time'];

                    $zpattern[a] = "<";
                    $zpattern[b] = ">";

                    $zreplace[a] = "&lt;";
                    $zreplace[b] = "&gt;";

                    $i = 0;
                    $while = mysql_query("SELECT word FROM blacklist");
                    while ($all = mysql_fetch_array($while)) {
                        $i = $i + 1;
                        $zpattern[$i] = $all['word'];
                        $zreplace[$i] = "infamousgangsters";
                    }

                    $postinforawz = $postinforawb;

                    $epattern[1] = "/\[b\](.*?)\[\/b\]/is";
                    $epattern[2] = "/\[u\](.*?)\[\/u\]/is";
                    $epattern[3] = "/\[i\](.*?)\[\/i\]/is";
                    $epattern[4] = "/\[center\](.*?)\[\/center\]/is";
                    $epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
                    $epattern[6] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
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
                    $ereplace[6] = "<font size=\"$1\">$2</font>";
                    $ereplace[7] = "<font face=\"$1\">$2</font>";
                    $ereplace[8] = "<br>";
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

                    $rankcolor = $getpostsarray['rankid'];

                    if ($rankcolor == '100') {
                        $color = "<font color=red face=verdana size=1><b>$postname</b></font>";
                    } elseif ($rankcolor == '50') {
                        $color = "<font color=yellow face=verdana size=1><b>$postname</b></font>";
                    } elseif ($rankcolor == '25') {
                        $color = "<font color=blue face=verdana size=1><b>$postname</b></font>";
                    } else {
                        $color = "<font color=white face=verdana size=1>$postname</font>";
                    }
                    ?>
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
                                    <div class="menuHeader noTop"
                                         style="text-align: left; padding-left: 6px;  font-size: 10px;">
                                        <span style="float: right;">
                                            <span style="cursor: pointer; color: silver; font-size: 10px;"
                                                  class="masterTooltip"><? echo $postime; ?></span>
                                        </span>
                                        <a href=viewprofile.php?username=<? echo $postname ?>><? echo $color; ?></a>
                                    </div>
                                    <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe; text-align: left; max-height: 350px; overflow-y: auto;">
                                        <? if ($countthree > '20') {
                                            echo "This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
                                        } else {
                                            echo nl2br($postinfo);
                                        } ?>
                                    </div>
                                    <div class="break" style="padding-top: 5px;">
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 4px;">
                                            <? if ($ida == '2') {
                                                echo "<a href=helpdesk.php?deletepost=$postid style='display: inline-block; margin-left: 5px; margin-right: 2px; padding-bottom: 5px;'>Delete</a> -";
                                            } ?>
                                            <a href=send.php?ticket=<? echo $postid; ?>
                                               style="display: inline-block; margin-left: 2px; margin-right: 2px; padding-bottom: 5px;">&nbsp;Reply</a>
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
                <? }
            } ?>
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

