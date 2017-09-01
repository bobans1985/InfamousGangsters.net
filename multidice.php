<? include 'included.php'; session_start(); ?>
<?

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$poster = $_GET['deletepost'];
$betraw = mysql_real_escape_string($_POST['bet']);
$joinraw = mysql_real_escape_string($_POST['join']);
$autoraw = mysql_real_escape_string($_POST['auto']);
$sessionid = preg_replace($saturate, "", $sessionidraw);
$join = preg_replace($saturated, "", $joinraw);
$bet = preg_replace($saturated, "", $betraw);
$auto = preg_replace($saturated, "", $autoraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$username = $usernameone;
$userarray = $statustesttwo;
$userlocation = $userarray['location'];
$userrankid = $myrank;
$usermoney = $userarray['money'];
$penpoints = $userarray['penpoints'];
$deletepost = preg_replace($saturated, "", $poster);

$checkindb = mysql_num_rows(mysql_query("SELECT * FROM mdgprofit WHERE username = '$usernameone'"));
if ($checkindb < 1) {
    mysql_query("INSERT INTO `mdgprofit` (username,id) VALUES ('$usernameone','')");
}
?>
<?php

if ($bar == '/leftmenu.php') {
    die('<font color=black face=verdana size=1>Go away.</font>');
}
$gimtime = time();

$usernameone = $usernameone;
$user = $statustesttwo['username'];
$rankid = $statustesttwo['rankid'];
$crewid = $statustesttwo['crewid'];
$notice = $statustesttwo['notice'];
$live = $statustesttwo['live'];
$hdo = $statustesttwo['hdo'];
$rr = $statustesttwo['rr'];
$silencer = $statustesttwo['silencer'];
$mails = $statustesttwo['mail'];

if ($crewid != '0') {
    $crewbosssql = mysql_query("SELECT boss FROM crews WHERE boss = '$user'");
    $crewboss = mysql_num_rows($crewbosssql);
} else {
    $crewboss = 0;
}

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
            <?


            if ($mdgtest > '7') {
                die('<font color=white face=verdana size=1>Message admin and say you saw error MDG</font>');
            }

            if (isset($_POST['bet'])) {
                if ($mdgtest == '3') {
                } elseif ($bet > $usermoney) {
                } elseif ($auto <= '1' AND $auto != '') {
                } elseif ($auto >= '1000') {
                } elseif ($bet == '0') {
                } elseif (!$bet) {
                } elseif ($bet > '99999999999') {
                } else {
                    mysql_query("UPDATE users SET money = money - $bet WHERE ID ='$ida' AND money >= '$bet'");
                    if (mysql_affected_rows() == 0) {
                        die('<font color=white face=verdana size=1>Error 1.</font>');
                    }

                    mysql_query("UPDATE mdgprofit SET winnings = winnings - $bet, games = games + 1 WHERE username = '$usernameone'");

                    mysql_query("INSERT INTO mdg(username,bet,autoroll)
VALUES ('$username','$bet','$auto')");
                    $getgameid = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE username = '$usernameone' ORDER BY id DESC"));
                    $gameid = $getgameid['id'];
                    mysql_query("INSERT INTO mdice(username,number,id) VALUES ('$usernameone','1','$gameid')");
                }
            }

            if ($_GET['game']) {
                $join = $_GET['game'];
                $rollorjoin = mysql_num_rows(mysql_query("SELECT * FROM mdg WHERE username = '$usernameone' AND id = '$join'"));
                if ($rollorjoin < 1) {
                    $jointest = mysql_num_rows(mysql_query("SELECT * FROM mdg WHERE id = '$join'"));
                    $joinoktest = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id = '$join' AND username = '$username'"));
                    $joininfo = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE id = '$join'"));
                    $joinbet = $joininfo['bet'];
                    $joinname = $joininfo['username'];
                    $joinnuma = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id = '$join'"));
                    $joinnum = $joinnuma + 1;
                    if ($jointest == '0') {
                    } elseif ($joinoktest > '0') {
                    } elseif ($joinbet > $usermoney) {
                    } elseif ($joinname == $username) {
                    } else {
                        mysql_query("UPDATE users SET money = (money - $joinbet) WHERE ID ='$ida' AND money >= '$joinbet'");
                        if (mysql_affected_rows() == 0) {
                            die('<font color=white face=verdana size=1>Error 2.</font>');
                        }

                        mysql_query("UPDATE mdgprofit SET winnings = winnings - $joinbet, games = games + 1 WHERE username = '$usernameone'");

                        mysql_query("INSERT INTO mdice(username,number,id) VALUES ('$username','$joinnum','$join')");
                    }
                } elseif ($rollorjoin > 0) {
                    $rollcheck = mysql_num_rows(mysql_query("SELECT * FROM mdg WHERE username = '$username'"));
                    $rollida = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE username = '$username'"));
                    $rollid = $_GET['game'];
                    if ($rollcheck < '1') {
                    } else {
                        $rollamount = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id = '$rollid'"));
                        $rand = mt_rand(1, $rollamount);

                        $winner = mysql_fetch_array(mysql_query("SELECT * FROM mdice WHERE number = '$rand' AND id = '$rollid'"));
                        $winnername = $winner['username'];
                        $win = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE id = '$rollid'"));
                        $wintotal = $win['bet'] * $rollamount;
                        $wintotala = number_format($wintotal);

                        $sendinfo = "You joined a dice game created by \[b\]$username\[\/b\]! The dice rolled $rand!\[br\]That means \[b\]$winnername\[\/b\] won $\[b\]$wintotala\[\/b\]!";
                        $sendnotif = "You joined a dice game created by $username! The dice rolled $rand! That means $winnername won $$wintotala!";
                        $selecttos = mysql_query("SELECT * FROM mdice WHERE id = '$rollid'");
                        while ($to = mysql_fetch_array($selecttos)) {
                            $sendto = $to['username'];
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
							VALUES ('$sendto','$sendto','2','$userip','$sendinfo')");
							mysql_query("UPDATE users SET mail='1', notification='$sendnotif', notify='1' WHERE username='$sendto'");
                        }

                        mysql_query("DELETE FROM mdg WHERE id = '$rollid'");
                        if (mysql_affected_rows() == 0) {
                            die('<font color=white face=verdana size=1>Error roll 1</font>');
                        }
                        mysql_query("DELETE FROM mdice WHERE id = '$rollid'");
                        if (mysql_affected_rows() == 0) {
                            die('<font color=white face=verdana size=1>Error roll 2</font>');
                        }

                        mysql_query("UPDATE users SET money = money + '$wintotal' WHERE username = '$winnername'");
                        mysql_query("UPDATE mdgprofit SET winnings = winnings + $wintotal, won = won + 1 WHERE username = '$winnername'");
                    }
                }
            }

            $doautorolll = mysql_query("SELECT * FROM mdg WHERE autoroll > '1'");
            while ($doautoroll = mysql_fetch_array($doautorolll)) {
                $autorollid = $doautoroll['id'];
                $autorollnumber = $doautoroll['autoroll'];
                $autorolluser = $doautoroll['username'];
                $rollcheck = mysql_num_rows(mysql_query("SELECT * FROM mdg WHERE id='$autorollid'"));
                if ($rollcheck < '1') {
                } else {
                    $rollamount = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id='$autorollid'"));
                    if ($autorollnumber == $rollamount) {
                        $rand = mt_rand(1, $rollamount);
                        $winner = mysql_fetch_array(mysql_query("SELECT * FROM mdice WHERE number='$rand' AND id='$autorollid'"));
                        $winnername = $winner['username'];
                        $win = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE id='$autorollid'"));
                        $wintotal = $win['bet'] * $rollamount;
                        $wintotala = number_format($wintotal);
                        $sendinfo = "You joined a dice game created by \[b\]$autorolluser\[\/b\]! The dice rolled $rand!\[br\]That means \[b\]$winnername\[\/b\] won $\[b\]$wintotala\[\/b\]!";
                        $selecttos = mysql_query("SELECT * FROM mdice WHERE id='$autorollid'");
                        while ($to = mysql_fetch_array($selecttos)) {
                            $sendto = $to['username'];
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$sendto','$sendto','2','$userip','$sendinfo')");
                            mysql_query("UPDATE users SET mail='1', notification='$sendnotif', notify='1' WHERE username='$sendto'");
                        }
                        mysql_query("DELETE FROM mdg WHERE id='$autorollid'");
                        if (mysql_affected_rows() == 0) {
                            die('<font color=white face=verdana size=1>Error roll 1</font>');
                        }
                        mysql_query("DELETE FROM mdice WHERE id='$autorollid'");
                        if (mysql_affected_rows() == 0) {
                            die('<font color=white face=verdana size=1>Error roll 2</font>');
                        }
                        mysql_query("UPDATE users SET money=money+'$wintotal' WHERE username='$winnername'");
                        mysql_query("UPDATE mdgprofit SET winnings = winnings + $wintotal, won = won + 1 WHERE username = '$winnername'");
                    }
                }
            }

            $deaddoautorolll = mysql_query("SELECT * FROM mdg");
            while ($deaddoautoroll = mysql_fetch_array($deaddoautorolll)) {
                $deadautorollid = $deaddoautoroll['id'];
                $deadautorolluser = $deaddoautoroll['username'];
                $isuserdead = mysql_query("SELECT status FROM users WHERE username = '$deadautorolluser'");
                $wellarethey = mysql_fetch_array($isuserdead);
                $deadornot = $wellarethey['status'];
                if ($deadornot == Alive) {
                } else {
                    $rollcheck = mysql_num_rows(mysql_query("SELECT * FROM mdg WHERE id='$deadautorollid'"));
                    if ($rollcheck < '1') {
                    } else {
                        $rollamount = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id='$deadautorollid'"));
                        $rand = mt_rand(1, $rollamount);
                        $winner = mysql_fetch_array(mysql_query("SELECT * FROM mdice WHERE number='$rand' AND id='$deadautorollid'"));
                        $winnername = $winner['username'];
                        $win = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE id='$deadautorollid'"));
                        $wintotal = $win['bet'] * $rollamount;
                        $wintotala = number_format($wintotal);
                        $sendinfo = "You joined a dice game created by \[b\]$deadautorolluser\[\/b\]! The dice rolled $rand!\[br\]That means \[b\]$winnername\[\/b\] won $\[b\]$wintotala\[\/b\]!";
                        $selecttos = mysql_query("SELECT * FROM mdice WHERE id='$deadautorollid'");
                        while ($to = mysql_fetch_array($selecttos)) {
                            $sendto = $to['username'];
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$sendto','$sendto','2','$userip','$sendinfo')");
                            mysql_query("UPDATE users SET mail='1' WHERE username='$sendto'");
                        }
                        mysql_query("DELETE FROM mdg WHERE id='$deadautorollid'");
                        if (mysql_affected_rows() == 0) {
                            die('<font color=white face=verdana size=1>Error roll 1</font>');
                        }
                        mysql_query("DELETE FROM mdice WHERE id='$deadautorollid'");
                        if (mysql_affected_rows() == 0) {
                            die('<font color=white face=verdana size=1>Error roll 2</font>');
                        }
                        mysql_query("UPDATE users SET money=money+'$wintotal' WHERE username='$winnername'");
                        mysql_query("UPDATE mdgprofit SET winnings = winnings + $wintotal, won = won + 1 WHERE username = '$winnername'");
                    }
                }
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
                                Multi Dice Game
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <? if ($mdgtest < '4') { ?>
                                        <form method="post">
                                            <input name="actions" value="1" type="hidden">
                                            <table class="regTable"
                                                   style="min-width: 230px; width: 85%; max-width: 350px;"
                                                   cellspacing="0" cellpadding="0" align="center">
                                                <tbody>
                                                <tr>
                                                    <td class="header" colspan="2">
                                                        Create Game
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col noTop" style="border-left: 0;">
                                                        <label style="display: block; padding: 0;"
                                                               for="money_bet">Bet:</label>
                                                    </td>
                                                    <td class="col is-btn-wrapper noTop">
                                                        <input autocomplete=off id="bet" name=bet class="textarea noTop"
                                                               style="width: 100%; height: 28px;"
                                                               placeholder="Enter Money..." type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col" style="border-left: 0;">
                                                        <label style="display: block; padding: 0;" for="predication">Auto
                                                            Roll:</label>
                                                    </td>
                                                    <td class="col is-btn-wrapper noTop ">
                                                        <div class="textarea" style="padding: 0; font-size: 0;">
                                                            <input type="text" class="textarea"
                                                                   style="border: 0; box-shadow: 0; width: 100%; height: 28px; border-radius: 0;"
                                                                   placeholder="Enter Numbre of Player..." name=auto>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="col is-btn-wrapper noTop"
                                                        style="border-left: 0;">
                                                        <input name=dobet class="textarea"
                                                               style="width: 100%; height: 28px; border-left: 0;"
                                                               value="Create" type="submit">
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    <? } ?>
                                    <div class="break" style="padding-top: 25px;">
                                        <div class="spacer"></div>
                                        <div style="text-align: center; padding: 9px; padding-top: 20px; font-size: 13px;">
                                            Games:
                                        </div>
                                        <? $mdgs = mysql_query("SELECT * FROM mdg ORDER BY id DESC");
                                        $howmany = mysql_num_rows($mdgs); ?>
                                        <style>
                                            #left {
                                                float: left;
                                            }

                                            #right {
                                                float: right;
                                            }
                                        </style>
                                        <form action="" method="post">
                                            <table style="padding: 20px; padding-top: 10px;" cellspacing="0"
                                                   cellpadding="0">
                                                <tbody>
                                                <?
                                                if ($howmany < 1) {
                                                    echo "<tr>
                                                                            <td style=\"text-align: left; font-size: 10.5px; padding-bottom: 3px; color: #ffffff;\" valign=\"top\">
                                                                                <span style=\"display: inline-block; \">There are currently no games to join!</span>
                                                                            </td>
                                                                        </tr>";
                                                }
                                                while ($getgame = mysql_fetch_array($mdgs)) {

                                                    $start = 0;

                                                    $id = $getgame['id'];
                                                    $creator = $getgame['username'];
                                                    $gamebet = $getgame['bet'];
                                                    $ar = $getgame['autoroll'];
                                                    $gamebeta = number_format($gamebet);
                                                    $getjoin = mysql_query("SELECT * FROM mdice WHERE id = $id ORDER BY number ASC");

                                                    if ($creator == $usernameone) {
                                                        $cula = '222222';
                                                        $culas = ' color=white';
                                                        $rollit = "(<b>Roll</b>)";
                                                    } else {
                                                        $cula = '282828';
                                                        $culas = ' color=silver';
                                                        $rollit = "(<b>Join</b>)";
                                                    }
//                                                                        echo"<tr><td width=100%><div class=button1>"; echo "<a href=multidice.php?game=$id>$rollit</a>";
                                                    ?>
                                                    <tr>
                                                        <td rowspan="4" style="padding-right: 26px;" valign="middle">
                                                            <input name="join_id" value="" type="radio">
                                                            <a href=multidice.php?game=<? echo $id; ?>><? echo $rollit; ?></a>
                                                        </td>
                                                        <td style="text-align: left; font-size: 10.5px; padding-bottom: 4px; color: #ffffff;"
                                                            valign="top">
                                                            <? while ($getjoined = mysql_fetch_array($getjoin)) {
                                                                $start++;
                                                                $getnames = $getjoined['username'];
                                                                if ($start == 1) {
                                                                    echo "<a href=viewprofile.php?username=$getnames style=\"font-weight: bold; font-size: 11px;\">$befo$getnames$afta</a>";
                                                                } else {
                                                                    echo "<span style=\"margin-left: 7px; margin-right: 7px;\">-</span><a href=viewprofile.php?username=$getnames style=\"font-weight: bold; font-size: 11px;\">$befo$getnames$afta</a>";
                                                                }
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left; font-size: 10.5px; padding-bottom: 3px; color: #ffffff;"
                                                            valign="top">
                                                            <span style="display: inline-block; width: 90px; ">Bet:</span>
                                                            <span style="color: #eeeeee;">$<? echo $gamebeta; ?> </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left; font-size: 10.5px; padding-bottom: 3px;  color: silver;"
                                                            valign="top">
                                                            <span style="display: inline-block; width: 90px; color: #ffffff;">Pot:</span>
                                                            <span style="color: #FFC753;">$<? $allbet = number_format($gamebet * $start);
                                                                echo $allbet; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left; font-size: 10.5px; padding-bottom: 3px; color: silver;"
                                                            valign="top">
                                                            <span style="display: inline-block;width: 90px;  color: #ffffff;">Auto Roll:</span>
                                                            <span style="color: #eeeeee;"><? echo $ar; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td style="text-align: left; padding-bottom: 12px; padding-top: 8px;">
                                                            <input class="curve3px textarea js-join-game-btn"
                                                                   style="margin-left: -2px; margin-bottom: 5px; padding: 7px;  width: 90px; display: none;"
                                                                   id="join_13915" value="JOIN" type="submit">
                                                        </td>
                                                    </tr>
                                                <? } ?>
                                                </tbody>
                                            </table>
                                        </form>
                                        <div class="break" style="padding-top: 29px;">
                                            <div class="spacer"></div>
                                            <div class="break" style="padding-top: 23px;">
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