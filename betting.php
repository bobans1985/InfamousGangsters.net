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
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $newpostraw = $_POST['newpost'];
            $newpost = htmlentities($newpostraw, ENT_QUOTES);
            $dobet = mysql_real_escape_string($_POST['placebet']);
            $betraw = mysql_real_escape_string($_POST['amount']);
            $whobetraw = mysql_real_escape_string($_POST['whobet']);
            $whowon = mysql_real_escape_string($_POST['whowon']);
            $bet = preg_replace($saturated,"",$betraw);
            $whobet = preg_replace($saturated,"",$whobetraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;
            $playerrank = $myrank;
            $playerarray =$statustesttwo;
            $playerrank = $playerarray['rankid'];
            $playermoney = $playerarray['money'];
            $betprofit = $playerarray['betprofit'];

            if($playerrank < 0){ die('<font size=1 face=verdana color=white>There is currently no events to bet on!'); }
            $entertainer = $ent;
            if($entertainer != '0'){die('<font color=white face=verdana size=1>As you are an entertainer you cannot view this page</font>');}

            $openclose = mysql_query("SELECT * FROM gametimes WHERE game = 'betting'");
            $isit = mysql_fetch_array($openclose);
            $isitopen = $isit['time'];

            $oneodd = "1.30"; $twoodd = "2.00"; $threeodd = "2.60";
            $fourodd = "1.10"; $fiveodd = "1.10"; $sixodd = "1.50"; $sevenodd = "2.00";
            $eightodd = "1.05"; $nineodd = "1.70"; $tenodd = "1.20"; $elevenodd = "2.30";
            $twelveodd = "1.20"; $thirteenodd = "2.80"; $fourteenodd = "2.80"; $fifthteenodd = "3.60";
            $sixteenodd = "2.95"; $seventeenodd = "4.80"; $eighteenodd = "3.00"; $nineteenodd = "4.80";
            $teamone = "Manchester United"; $teamtwo = "Draw"; $teamthree = "Chelsea";
            $date = "26/08/2013 20:00";
            $gameid="23314";

            if($_POST['refund'] AND $_POST['refunduser']){
                $theuser = $_POST['refunduser'];
                $getuserr = mysql_query("SELECT * FROM bettingshop WHERE username = '$theuser'");
                $getuser = mysql_fetch_array($getuserr);
                $theuser = $getuser['username'];
                $theamount = $getuser['amount'];
                mysql_query("UPDATE users SET money = money + $theamount WHERE username = '$theuser'");
                mysql_query("UPDATE users SET betprofit = betprofit + $theamount WHERE username = '$theuser'");
                mysql_query("DELETE FROM bettingshop WHERE username = '$theuser'");
            }

            if($_POST['placebet'] AND $whobet > '0' AND $isitopen == 1){
                $getbet = mysql_num_rows(mysql_query("SELECT * FROM bettingshop WHERE username = '$usernameone'"));
                if($playermoney < $bet){ $showoutcome++; $outcome = "You can not afford this bet!"; }
                elseif( $bet >  4000000000){ $showoutcome++; $outcome = "The maximum bet is  $4,000,000,000"; }
                elseif($getbet > 0){ $showoutcome++; $outcome = "You already have a bet!"; }
                else{
                    mysql_query("UPDATE users SET money = money - '$bet' WHERE ID = '$ida' AND money >= '$bet'");
                    if(mysql_affected_rows()==0){die('<font color=white face=verdana size=1>Error 1.</font>');}
                    mysql_query("UPDATE users SET betprofit = betprofit - '$bet' WHERE ID = '$ida'");
                    if($whobet == 1){ $doodd = "$oneodd"; }
                    elseif($whobet == 2){ $doodd = "$twoodd"; }
                    elseif($whobet == 3){ $doodd = "$threeodd"; }
                    elseif($whobet == 4){ $doodd = "$fourodd"; }
                    elseif($whobet == 5){ $doodd = "$fiveodd"; }
                    elseif($whobet == 6){ $doodd = "$sixodd"; }
                    elseif($whobet == 7){ $doodd = "$sevenodd"; }
                    elseif($whobet == 8){ $doodd = "$eightodd"; }
                    elseif($whobet == 9){ $doodd = "$nineodd"; }
                    elseif($whobet == 10){ $doodd = "$tenodd"; }
                    elseif($whobet == 11){ $doodd = "$elevenodd"; }
                    elseif($whobet == 12){ $doodd = "$twelveodd"; }
                    elseif($whobet == 13){ $doodd = "$thirteenodd"; }
                    elseif($whobet == 14){ $doodd = "$fourteenodd"; }
                    elseif($whobet == 15){ $doodd = "$fifthteenodd"; }
                    elseif($whobet == 16){ $doodd = "$sixteenodd"; }
                    elseif($whobet == 17){ $doodd = "$seventeenodd"; }
                    elseif($whobet == 18){ $doodd = "$eighteenodd"; }
                    elseif($whobet == 19){ $doodd = "$nineteenodd"; }
                    mysql_query("INSERT INTO `bettingshop` (username,amount,odd,value) VALUES ('$usernameone','$bet','$doodd','$whobet')");
                    $showoutcome++; $outcome = "Your bet have been placed! Good luck!";
                }}

            if($_POST['changeit']){
                if($isitopen == 1){ mysql_query("UPDATE gametimes SET time = 0 WHERE game = 'betting'"); $showoutcome++; $outcome = "Betting has been closed!"; }
                else{ mysql_query("UPDATE gametimes SET time = 1 WHERE game = 'betting'"); $showoutcome++; $outcome = "Betting is now open!";
                }}

            if($_POST['adminroll'] AND $_POST['whowon']){
                if($whowon == 4 || $whowon == 5 || $whowon == 6 || $whowon == 7 || $whowon == 2){ $whowon2 = 2; }
                if($whowon == 8 || $whowon == 10 || $whowon == 12 || $whowon == 14 || $whowon == 16 || $whowon == 18 || $whowon == 1){ $whowon2 = 1; }
                if($whowon == 9 || $whowon == 11 || $whowon == 13 || $whowon == 15 || $whowon == 17 || $whowon == 19 || $whowon == 3){ $whowon2 = 3; }
                $getwinners = mysql_query("SELECT * FROM bettingshop WHERE value = '$whowon' or value = '$whowon2' ORDER BY id");
                while($doroll = mysql_fetch_array($getwinners)){
                    $winname = $doroll['username'];
                    $winamount = $doroll['amount'];
                    $winodd = $doroll['odd'];
                    $totalwin = $winamount * $winodd;
                    mysql_query("UPDATE users SET money = money + '$totalwin' WHERE username = '$winname'");
                    mysql_query("UPDATE users SET betprofit = betprofit + '$totalwin' WHERE username = '$winname'");
                }
                mysql_query("DELETE FROM bettingshop WHERE id >= '0'");
                $showoutcome++; $outcome = "Payments have been sent out!";
            }

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
                    mysql_query("INSERT INTO forumposts(username,ip,type,post,rankid,esc)
VALUES ('$gangsterusername','$userip','betting','$newpost','$playerrank','1')");
                }}
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
                                Sport Betting
                            </div>
                            <div style="padding: 5px; padding-top: 30px; font-size: 13px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin-bottom: 10px; color: #aaaaaa; font-size: 10px; line-height: 170%; text-align: center;">
                                    Note: Bets with money are paid out into Swiss Bank accounts<br>
                                    <font size="1" color="#aaaaaa">Money Max Bet:
                                        <b><font color="white">$4,000,000,000</font></b>
                                    </font>
                                </div>
                                <font size="1" color="#aaaaaa">
                                    <font size="1" color="#aaaaaa">
                                <?if(isset($_GET['game'])){?>
                                    <div style="margin: auto; width: 95%; max-width: 700px;margin-top: 20px;">
                                        <table class="regTable" style="max-width: 1000px; margin-bottom: 27px; width: 100%;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody><tr>
                                                <td class="header" colspan="45" style="padding-top: 12px; padding-bottom: 10px; font-size: 14px; color: white;">
                                                    <?echo$teamone;?> &nbsp;vs&nbsp; <?echo$teamone;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="subHeader" style="width: 40%;">Last bets</td>
                                                <td class="subHeader" style="width: 20%;">Home</td>
                                                <td class="subHeader" style="width: 20%;">Draw</td>
                                                <td class="subHeader" style="width: 20%;">Away</td>
                                            </tr>
                                            <tr class="row">
                                                <td class="col noTop" style="font-size: 12px; padding-right: 10px; color: #ffffff;"><? $event_date=DateTime::createFromFormat('d/m/Y H:i',$date); echo$event_date->format('l g:iA');?></td>
                                                <td class="col noTop" style="text-align: center; font-size: 12px; padding-right: 10px; color: #ffffff;"><?echo$oneodd;?></td>
                                                <td class="col noTop" style="text-align: center; font-size: 12px; padding-right: 10px; color: #ffffff;"><?echo$twoodd;?></td>
                                                <td class="col noTop" style="text-align: center; font-size: 12px; padding-right: 10px; color: #ffffff;"><?echo$threeodd;?></td>
                                            </tr>
                                            </tbody></table>
                                        <form method="post" style="margin-bottom: 24px; text-align: center;">
                                            Bet:
                                            <select name="whobet" class="textarea" style="margin-left: 2px; height: 25px; position: relative; top: -0.78px;  width: 150px;">
                                                <option value="0">- - Selection - -</option>
                                                <option value="1"><?echo$teamone;?></option>
                                                <option value="2">Draw</option>
                                                <option value="3"><?echo$teamone;?></option>
                                            </select>
                                            <input name="amount" maxlength="20" style="position: relative; top: -0.8px;" class="textarea" placeholder="Enter Bet..." value="" type="text">
                                            <input class="textarea" style="width: 80px; position: relative; top: -0.8px;" value="Place Bet" name="placebet" type="submit">
                                        </form>
                                        <div style="margin-bottom: 4px; text-align: left;">My Bets:</div>
                                        <?
                                        $getmybet = mysql_query("SELECT * FROM bettingshop WHERE username = '$usernameone'");
                                        $if = mysql_num_rows($getmybet);
                                        $getit = mysql_fetch_array($getmybet);
                                        $amountt = number_format($getit['amount']);
                                        $oddd = $getit['odd'];
                                        $valuee = $getit['value'];
                                        if($valuee == 1){ $yourbet = $teamone; }
                                        elseif($valuee == 2){ $yourbet = "Draw"; }
                                        elseif($valuee == 3){ $yourbet = $teamthree; }
                                        elseif($valuee == 4){ $yourbet = "Draw"; }
                                        elseif($valuee == 5){ $yourbet = "Draw"; }
                                        elseif($valuee == 6){ $yourbet = "Draw"; }
                                        elseif($valuee == 7){ $yourbet = "Draw"; }
                                        elseif($valuee == 8){ $yourbet = $teamone; }
                                        elseif($valuee == 9){ $yourbet = $teamthree; }
                                        elseif($valuee == 10){ $yourbet = $teamone; }
                                        elseif($valuee == 11){ $yourbet = $teamthree; }
                                        elseif($valuee == 12){ $yourbet = $teamone; }
                                        elseif($valuee == 13){ $yourbet = $teamthree; }
                                        elseif($valuee == 14){ $yourbet = $teamone; }
                                        elseif($valuee == 15){ $yourbet = $teamthree; }
                                        elseif($valuee == 16){ $yourbet = $teamone; }
                                        elseif($valuee == 17){ $yourbet = $teamthree; }
                                        elseif($valuee == 18){ $yourbet = $teamone; }
                                        elseif($valuee == 19){ $yourbet = $teamthree; }
                                        if($if < 1){ echo "<div style=\"text-align: left; color: silver; padding: 4px;font-size: 88%;\">None</div>"; }else{ ?>
                                            <div style="text-align: left; padding: 4px;font-size: 88%;"> <span style="color: silver;"><?echo $amountt;?></span> on <span style="color: silver;"><?echo$yourbet;?></span>
                                                @<span style="color: silver;">&nbsp;<?echo$oddd;?>&nbsp;</span>- &nbsp;[returns: <span style="color: #FFC753;">$<?echo round($amountt*$oddd,0);?></span>]
                                            </div>
                                        <?}?>

                                        <br class="break" style="margin-top: 24px;">
                                        <div class="spacer" style="width: 100%;"></div>
                                        <br class="break" style="margin-top: 18px;">
                                        <div style="margin-bottom: 4px; text-align: left;">Total bets on this market by all players:</div>
                                        <div style="text-align: left; padding: 4px; padding-bottom: 0;">
                                            <div style="font-size: 88%;">
                                                    <?php  $getamount = mysql_query("SELECT * FROM bettingshop");
                                                    $nobets = mysql_num_rows($getamount);
                                                    $count_A=0;
                                                    $count_B=0;
                                                    $count_Draw=0;
                                                    while($doitnow = mysql_fetch_array($getamount)){
                                                        $msa = $doitnow['amount'] + $msa;
                                                        if($doitnow['value']==1)
                                                            $count_A++;
                                                        else if($doitnow['value']==2)
                                                            $count_Draw++;
                                                        else if($doitnow['value']==3)
                                                            $count_B++;
                                                    }
                                                    $total=$count_A+$count_B+$count_Draw;
                                                    ?>
                                                <span style="color: silver;"><?echo "$".number_format($msa);?></span>
                                                <div style="margin-top: 4px;">
                                                    Manchester Utd: <span style="color: silver;"><?echo round(($count_A*100)/$total,0);?>%</span> &nbsp;-&nbsp;
                                                    Draw: <span style="color: silver;"><?echo round(($count_Draw*100)/$total,0);?>%</span> &nbsp;-&nbsp;
                                                    West Ham: <span style="color: silver;"><?echo round(($count_B*100)/$total,0);?>%</span>
                                                </div>
                                            </div>
                                            <br class="break" style="margin-top: 24px;">
                                            <div class="spacer" style="width: 100%;"></div>
                                            <br class="break" style="margin-top: 23px;">
                                            <a href="betting.php">Back to all events</a>
                                        </div>
                                    </div>


                                    <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                        <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                            <table align="center" width="85%" cellpadding="0" cellspacing="1" class="section">
                                                <?if($usernameone == 'Steven' || $usernameone == 'Mitch'){ echo "<form method=post><input type=text class=textbox name=whowon> <input type=submit class=textbox name=adminroll value='Pay bets'> <input type=submit class=textbox name=changeit value='Open/Close bets'></form><br><br>"; }?>

                                        </div>
                                    </div>
                                <?}else{?>
                                    <table class="regTable" style="margin-bottom: 23px; width: 95%; max-width: 700px;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody><tr>
                                            <td class="header" colspan="45" style="padding-top: 9px; padding-bottom: 9px;">
                                                All Events
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="subHeader" style="width: 45%;">Match</td>
                                            <td class="subHeader" style="width: 22%;">Last bets</td>
                                            <td class="subHeader" style="width: 11%;">Home</td>
                                            <td class="subHeader" style="width: 11%;">Draw</td>
                                            <td class="subHeader" style="width: 11%;">Away</td>
                                        </tr>
                                        <tr class="row">
                                            <? if ($isitopen != 1){?>
                                                <td class="col noTop" colspan="10" style="font-size: 11px; padding-right: 10px; color: #ffffff;">
                                                    No games available
                                                </td>
                                            <?}else{?>
                                        <tr class="row">
                                            <td class="col noTop" style="font-size: 12px; padding-right: 10px; color: #ffffff;">
                                                <a href="betting.php?game=<?echo $gameid;?>"><?echo $teamone?> vs <?echo $teamthree;?></a>
                                            </td>
                                            <td class="col noTop" style="font-size: 12px; padding-right: 10px; color: #ffffff;"><? $event_date=DateTime::createFromFormat('d/m/Y H:i',$date); echo$event_date->format('l g:iA');?></td>
                                            <td class="col noTop" style="text-align: center; font-size: 12px; padding-right: 10px; color: #ffffff;"><?echo$oneodd;?></td>
                                            <td class="col noTop" style="text-align: center; font-size: 12px; padding-right: 10px; color: #ffffff;"><?echo$twoodd;?></td>
                                            <td class="col noTop" style="text-align: center; font-size: 12px; padding-right: 10px; color: #ffffff;"><?echo$threeodd;?></td>
                                        </tr>
                                        <?}?>
                                        </tr>
                                        </tbody>
                                    </table>
                                <?}?>
                                        <br class="break" style="margin-top: 32px;">
                                        <div class="spacer"></div>
                                        <br class="break" style="padding-top: 3px;">
                                    </font>
                                </font>
                                <?if($rankid >= 100){?>
                                    <table class="regTable" style="min-width: 360px; width: 96%; max-width: 360px;margin:20px auto;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody><tr>
                                            <td class="header" colspan="2" style="padding: 11px;">
                                                Admin Bet Check
                                            </td>
                                        </tr>
                                        <?
                                        $doitall = mysql_query("SELECT * FROM bettingshop ORDER BY time DESC");
                                        while($doit = mysql_fetch_array($doitall)){
                                            $doitusername = $doit['username'];
                                            $doitamount = $doit['amount'];
                                            $doittime = $doit['time'];

                                            echo "<tr>
                                                            <td class=\"col noTop\" colspan='2' style=\"padding-right: 10px;width: 70%;\">$doitusername bet $".number_format($doitamount)." at $doittime</td>
                                                        </tr>";
                                        } ?>
                                        <form method=post>
                                            <tr>
                                                <td class="col " style="padding-right: 10px;width: 70%;"><input type="text" class="textarea" placeholder="Refund User..." style="width: 100%;" name=refunduser></td>
                                                <td class="col " style="padding-right: 10px;width: 30%;"><input type="submit" value="Do It" class="textarea" style="width: 100%;" name=refund></td>
                                            </tr>
                                        </form>
                                        </tbody>
                                    </table>
                                <?}?>
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

            $getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'betting' ORDER BY id DESC LIMIT $selectfrom,$selectto");
            ?>
            <form action = "betting.php" method = "post" style="text-align:center;margin-top:10px;">
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
                                                $now=new DateTime();
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
                                    <form action="betting.php" method="post" name="smiley">
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