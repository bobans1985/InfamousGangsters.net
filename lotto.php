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
        <td valign="top" class="main">
            <?php
            $entertainer = $ent;
            if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $doit = $_POST['xamount'];
            $gangsterusername = $usernameone;
            $playerrank = $myrank;
            $playerarray =$statustesttwo;
            $playerrank = $playerarray['rankid'];
            $cash = $playerarray['money'];

            $doit = $_POST['xamount'];
            if($_POST['xtickets'] AND $doit > 0){
                $buycar = $doit;
                $n = $buycar;
                $grr = 100000;
                $totalcash = $grr * $n;
                if($cash < $totalcash){ $showoutcome++; $outcome = "You can not afford to buy this many tickets!"; }
                elseif($doit > 2000){ $showoutcome++; $outcome = "You can only buy 2,000 tickets at a time!"; }
                else{
                    if($n >= 1){

                        $lotto = range(1, 25);
                        for ($i=1; $i <= $n; $i++){
                            $ticket = array();
                            shuffle($lotto);
                            for ($ii=1; $ii <= $i; $ii++){
                                shuffle($lotto); // shuffle the crap out of it
                            }
                            while(count($ticket) < 4) { // add a little extra randomness
                                $rand = array_rand($lotto, 1);
                                if (!in_array($lotto[$rand], $ticket)) {
                                    $ticket[] = $lotto[$rand];
                                }}
                            sort($ticket, SORT_NUMERIC);
                            mysql_query("UPDATE users SET money = (money - '100000') WHERE ID = '$ida' AND money >= '100000'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error, try again.</font>');}
                            mysql_query("UPDATE `lotto_main` SET `pot`=pot+'100000'");
                            $que = ("INSERT INTO `lotto` (`id`,`username`,`one`,`two`,`three`,`four`) VALUES ('','$usernameone','$ticket[0]','$ticket[1]','$ticket[2]','$ticket[3]')"); mysql_query($que);
                        }
                        $showoutcome++; $outcome = "You successfully bought ".number_format($n)." tickets";
                    }}}

            if($_POST['randomsubmit']){
                $possibles = array("1","2","3","4","5","6","7","8","9","10","11","12","12","14","15","16","17","18","19","20","21","22","23","24","25");
                shuffle($possibles);
                $ticketone = $possibles[0];
                $tickettwo = $possibles[1];
                $ticketthree = $possibles[2];
                $ticketfour = $possibles[3];

                function cockmunch($ticketone,$tickettwo,$ticketthree,$ticketfour) {
                    $array = array("$ticketone","$tickettwo","$ticketthree","$ticketfour");
                    sort($array,SORT_NUMERIC);
                    $o = $array[0];
                    $t = $array[1];
                    $th = $array[2];
                    $f = $array[3];
                    $last = "".$o."-".$t."-".$th."-".$f.""; return $last; }

                $list = cockmunch($ticketone,$tickettwo,$ticketthree,$ticketfour);
                $listk = explode("-",$list);
                $yourone = $listk[0];
                $yourtwo = $listk[1];
                $yourthree = $listk[2];
                $yourfour = $listk[3];

                if($cash <= 99999){
                    $showoutcome++; $outcome = "Tickets cost $100,000!"; }else{

                    mysql_query("UPDATE users SET money = (money - '100000') WHERE  ID ='$ida'");
                    mysql_query("INSERT INTO `lotto` (`id`,`username`,`one`,`two`,`three`,`four`) VALUES ('','$usernameone','$yourone','$yourtwo','$yourthree','$yourfour')");
                    mysql_query("UPDATE `lotto_main` SET `pot`=pot+'100000'");
                    $showoutcome++; $outcome = "You successfully bought a lottery ticket with the numbers ".$ticketone.", ".$tickettwo.", ".$ticketthree." and ".$ticketfour."";
                }}

            if($_POST['submit'] && $_POST['one'] && $_POST['two'] && $_POST['three'] && $_POST['four']){
                $one = $_POST['one'];
                $one = preg_replace("/[^0-9]/", "", $one);
                $checkone = substr($one,0,1);
                if($checkone == 0){
                    $one = substr($one,1,2);
                }else{
                    $one = $one;
                }
                $two = $_POST['two'];
                $two = preg_replace("/[^0-9]/", "", $two);
                $checktwo = substr($two,0,1);
                if($checktwo == 0){
                    $two = substr($two,1,2);
                }else{
                    $two = $two;
                }

                $three = $_POST['three'];
                $three = preg_replace("/[^0-9]/", "", $three);
                $checkthree = substr($three,0,1);
                if($checkthree == 0){
                    $three = substr($three,1,2);
                }else{
                    $three = $three;
                }
                $four = $_POST['four'];
                $four = preg_replace("/[^0-9]/", "", $four);
                $checkfour = substr($four,0,1);
                if($checkfour == 0){
                    $four = substr($four,1,2);
                }else{
                    $four = $four;
                }

                $boom = mysql_num_rows(mysql_query("SELECT * FROM `lotto` WHERE `username`='$usernameone' && `one`='$one' && `two`='$two' && `three`='$three' && `four`='$four'"));
                if($boom >= 1){
                    $showoutcome++; $outcome = "You have already bought a ticket with those numbers!";
                }else{
                    if($one >= 26 || $two >= 26 || $three >= 26 || $four >= 26){
                        $showoutcome++; $outcome = "Please choose all numbers between 1 and 25!";
                    }else{
                        if($cash <= 99999){
                            $showoutcome++; $outcome = "Lottery tickets cost $100,000!";
                        }else{
                            if($one == $two || $one == $three || $one == $four || $two == $three || $two == $four || $three == $four){
                                $showoutcome++; $outcome = "Please choose 4 <b>different</b> numbers!";
                            }else{
                                mysql_query("UPDATE users SET money = (money - '100000') WHERE  ID = '$ida'");

                                function summerisgay($one,$two,$three,$four) {
                                    $arrayk = array("$one","$two","$three","$four");
                                    sort($arrayk,SORT_NUMERIC);
                                    $one1 = $arrayk[0];
                                    $two2 = $arrayk[1];
                                    $three3 = $arrayk[2];
                                    $four4 = $arrayk[3];
                                    $lastomg = "".$one1."-".$two2."-".$three3."-".$four4."";
                                    return $lastomg;
                                }

                                $listomg = summerisgay($one,$two,$three,$four);
                                $listkkk = explode("-",$listomg);
                                $chosenone = $listkkk[0];
                                $chosentwo = $listkkk[1];
                                $chosenthree = $listkkk[2];
                                $chosenfour = $listkkk[3];
                                mysql_query("INSERT INTO `lotto` (`id`,`username`,`one`,`two`,`three`,`four`) VALUES ('','$usernameone','$chosenone','$chosentwo','$chosenthree','$chosenfour')");
                                mysql_query("UPDATE `lotto_main` SET `pot`=pot+'100000'");
                                $showoutcome++; $outcome = "You successfully bought a lottery ticket with the numbers ".$one.", ".$two.", ".$three." and ".$four."";
                            }}}}}
            ?>
            <?php
            $getlotteryy = mysql_query("SELECT * FROM lotto_main");
            $getlottery = mysql_fetch_array($getlotteryy);
            $lastwinners = $getlottery['lastwin'];
            $pooot = $getlottery['pot'];
            $rtf = $pooot;
            $t = $getlottery['one'];
            $y = $getlottery['two'];
            $u = $getlottery['three'];
            $aa = $getlottery['four'];
            $lastwinamount = $getlottery['lastwinamount'];
            $rool = $getlottery['rollover'];
            $ttime = $getlottery['draw'];
            $f = $ttime-time();
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
                                Lottery
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <div align=center>
                                        <span style="color:silver;"><b><br>Current Pot</b></span><br>
                                        <font color=yellow size=3>$<b><?php echo number_format($rtf); ?></b></font><br><br>
                                        <?php if($rool >= 1){ ?>
                                            <div align=center>
                                                <span>It was a rollover</span><br>
                                                <font color=yellow size=1>$<b><? echo number_format($lastwinamount); ?></b> was added to the pot</font><br><br>
                                            </div>
                                        <? } ?>
                                    </div>
                                    <div align="center">
                                        <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td class="header" colspan="2">
                                                    Previous draw <? if($lastwinners=="No Winners"){ echo "- There were no winners"; } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col noTop">
                                                    Jackpot: <font color=yellow>$<b><? echo number_format($lastwinamount); ?></b></font>
                                                    <? if($lastwinners=="No Winners"){
                                                        echo "(As there were no winners this money was added to the current jackpot)";
                                                    }else{
                                                        echo "- There was <b>$lastwinners</b> player(s) who won the lottery!";
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col" style="text-align: center;">
                                                    <?php echo "<img src=lottery/".$t.".png> <img src=lottery/".$y.".png> <img src=lottery/".$u.".png> <img src=lottery/".$aa.".png>"; ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table><br/>
                                        <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td class="header" colspan="2">
                                                    The lottery draw will be rolled in <? echo maketime($ttime); ?>
                                                </td>
                                            </tr>
                                            <form action="" method="post">
                                            <tr>
                                                <td class="col noTop">
                                                    A ticket costs $100,000
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col">
                                                    Choose your numbers, <font color=yellow>1 - 25</font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col" style="text-align: center;">
                                                    <input size="4" type="text" class="textarea" name="one">
                                                    <input size="4" type="text" class="textarea" name="two">
                                                    <input size="4" type="text" class="textarea" name="three">
                                                    <input size="4" type="text" class="textarea" name="four">
                                                    <input value="Buy" type="submit" class="textarea curve3px" name="submit"> -
                                                    <input value="Buy Random Ticket" type="submit" class="textarea curve3px" name="randomsubmit">
                                                </td>
                                            </tr>
                                            </form>
                                            <form action="" method="post">
                                            <tr>
                                                <td class="col" style="text-align: center;">
                                                    <label>Buy <b>X</b> amount of tickets:</label>
                                                    <input size="4" type="text" class="textarea" name="xamount">
                                                    <input value="Buy Tickets" type="submit" class="textarea curve3px" name="xtickets">
                                                </td>
                                            </tr>
                                            </form>
                                            </tbody>
                                        </table><br/>
                                        <? $hello1234 = mysql_query("SELECT * FROM `lotto` WHERE username='$usernameone'"); $r1234 = mysql_num_rows($hello1234); ?>
                                        <? $ttb = mysql_query("SELECT * FROM `lotto`"); $tt1234 = mysql_num_rows($ttb); ?>
                                        <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td class="header" colspan="2">
                                                    Your Tickets
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col noTop">
                                                    You have <? echo "$r1234"; ?> tickets!
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col">
                                                    <? echo number_format($tt1234); ?> tickets have been bought this round!
                                                </td>
                                            </tr>
                                            <?
                                            $selecterraw = $_POST['select'];
                                            $selecter = preg_replace($saturated,"",$selecterraw);
                                            if(isset($_POST['next'])){$one = $selecter + 1;}
                                            elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

                                            $selectfroma = $one * 50;
                                            $selecttoa = $selectfrom + 50;
                                            $selectfrom = preg_replace($saturated,"",$selectfroma);
                                            $selectto = preg_replace($saturated,"",$selecttoa);
                                            $ag = mysql_query("SELECT * FROM `lotto` WHERE `username`='$usernameone' ORDER BY id DESC LIMIT $selectfrom,$selectto");
                                            $ggh = mysql_num_rows($ag);
                                            if($ggh <= 0){ ?>
                                            <tr>
                                                <td class="col">
                                                    You currently have no tickets to be shown.
                                                </td>
                                            </tr>
                                            <? }else{ while($ail = mysql_fetch_array($ag)){
                                                $un = $ail['one'];
                                                $duex = $ail['two'];
                                                $tois = $ail['three'];
                                                $twat = $ail['four']; ?>
                                                <tr>
                                                    <td class="col" style="text-align: center;">
                                                        <img src=lottery/<?php echo $un; ?>.png>
                                                        <img src=lottery/<?php echo $duex; ?>.png>
                                                        <img src=lottery/<?php echo $tois; ?>.png>
                                                        <img src=lottery/<?php echo $twat; ?>.png>
                                                    </td>
                                                </tr>
                                                <form action = "lotto.php" method = "post">
                                                    <tr>
                                                        <td class="col" style="text-align: center;">
                                                            <input type="hidden" name="select" value="<? echo $one; ?>">
                                                            <?php if($selectfrom != '0'){
                                                                echo'<input type ="submit" value="Previous page" class="textarea curve3px" name="previous">';
                                                            }?>
                                                            <input type ="submit" value="Next page" class="curve3px textarea" name="next">
                                                        </td>
                                                    </tr>
                                                </form>
                                            <? }} ?>
                                            </tbody>
                                        </table>
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