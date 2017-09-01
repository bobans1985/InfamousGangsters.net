<? include 'included.php'; session_start();

mysql_query("DELETE FROM achievements");
mysql_query("DELETE FROM recordsrank");

$recordsinfo = mysql_query("SELECT * FROM users WHERE username = '$usernameone'");
$donee = mysql_fetch_array($recordsinfo);
$record1 = number_format($donee['crimes']);
$record2 = number_format($donee['donecrimes']);
$record3 = number_format($donee['consecutivecrimes']);
$record4 = number_format($donee['thefts']);
$record5 = number_format($donee['donethefts']);
$record6 = number_format($donee['consecutivethefts']);
$record7 = number_format($donee['jailbusts']);
$record8 = number_format($donee['donebusts']);
$record9 = number_format($donee['joint']);
$record10 = number_format($donee['carsmelted']);
$record11 = number_format($donee['totalmelted']);
$record12 = number_format($donee['totalcmelted']);
$record13 = number_format($donee['kills']);
$record14 = number_format($donee['casinos']);
$record15 = number_format($donee['ptsspent']);
$record16 = number_format($donee['moneycrimes']);
$record17 = number_format($donee['winnings']);
$record18 = number_format($donee['oilprofit']);

include 'rr1.php';
include 'rr2.php';
include 'rr3.php';
include 'rr4.php';
include 'rr5.php';
include 'rr6.php';
include 'rr7.php';
include 'rr8.php';
include 'rr9.php';
include 'rr10.php';
include 'rr11.php';
include 'rr12.php';
include 'rr13.php';
include 'rr14.php';
include 'rr15.php';
include 'rr16.php';
include 'rr17.php';
include 'rr18.php';

$toptencrimes = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY crimes DESC LIMIT 0,15");
$toptendonecrimes = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY donecrimes DESC LIMIT 0,15");
$toptenconsecutivecrimes = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY consecutivecrimes DESC LIMIT 0,15");

$toptenthefts = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY thefts DESC LIMIT 0,15");
$toptendonethefts = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY donethefts DESC LIMIT 0,15");
$toptenconsecutivethefts = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY consecutivethefts DESC LIMIT 0,15");

$toptenjailbusts = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY jailbusts DESC LIMIT 0,15");
$toptendonebusts = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY donebusts DESC LIMIT 0,15");
$toptenjoints = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY joint DESC LIMIT 0,15");

$toptencarsmelteds = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY carsmelted DESC LIMIT 0,15");
$toptentotalmelteds = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY totalmelted DESC LIMIT 0,15");
$toptencrewbullets = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY totalcmelted DESC LIMIT 0,15");

$toptenkills = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY kills DESC LIMIT 0,15");
$toptencasinowins = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY casinos DESC LIMIT 0,15");
$toptenpointsspents = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY ptsspent DESC LIMIT 0,15");

$toptenmoneycrimes = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY moneycrimes DESC LIMIT 0,15");
$toptendrugprofits = mysql_query("SELECT * FROM users WHERE rankid < 26 ORDER BY winnings DESC LIMIT 0,15");
$topteninvestmentprofits = mysql_query("SELECT * FROM users WHERE rankid < 26 ORDER BY oilprofit DESC LIMIT 0,15");

$blackjackprofit = mysql_query("SELECT * FROM casinoprofit WHERE rankid < 25 ORDER BY blackjack DESC LIMIT 0,15");
$racesprofit = mysql_query("SELECT * FROM casinoprofit WHERE rankid < 25 ORDER BY races DESC LIMIT 0,15");
$rouletteprofit = mysql_query("SELECT * FROM casinoprofit WHERE rankid < 25 ORDER BY roulette DESC LIMIT 0,15");

$diceprofit = mysql_query("SELECT * FROM casinoprofit WHERE rankid < 25 ORDER BY dice DESC LIMIT 0,15");
$overallprofit = mysql_query("SELECT * FROM casinoprofit WHERE rankid < 25 ORDER BY overall DESC LIMIT 0,15");
$mdgprofit = mysql_query("SELECT * FROM mdgprofit ORDER BY winnings DESC LIMIT 0,15");

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
                                Hall of Fame
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div class="break" style="padding-top: 6px;">
                                    <div class="miniMenu shadowTest curve3px" id="crimes" style="vertical-align: top; margin-left: -8px; margin-bottom: 5px;  display: inline-block; width: 43%; min-width: 175px; max-width: 325px;">
                                        <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                            Crimes Committed:
                                        </div>
                                        <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                            <tbody>
                                            <tr style="border-bottom: 1px solid #080808;text-align:center;">
                                                <td class="statsDivHeader" style="border-right: 0; border-left: 0; border-bottom: 0;" width="1%"></td>
                                                <td class="statsDivHeader" style="border-bottom: 0;">Username</td>
                                                <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0;">Total</td>
                                            </tr>
                                            <? $consecutivecrimesall = 0;
                                            $ranking = 0;
                                            while($toptendonecrime = mysql_fetch_array($toptendonecrimes)) {
                                                $donecrimesall++;
                                                $ranking++;
                                                $donecrimename = $toptendonecrime['username'];
                                                if ($getusername == $donecrimename) {
                                                    $bgcolor = "maroon";
                                                } else {
                                                    $bgcolor = "#222222";
                                                }
                                                $yesno1 = mysql_num_rows(mysql_query("SELECT * FROM achievements WHERE username='$donecrimename'"));
                                                if ($yesno1 <= '0') {
                                                    mysql_query("INSERT INTO `achievements` (`username`,`donecrimesfame`) VALUES ('$donecrimename','$donecrimesall')");
                                                } else {
                                                    mysql_query("UPDATE achievements SET donecrimesfame = '$donecrimesall' WHERE username = '$donecrimename' LIMIT 1");
                                                }
                                                $donecrimess = number_format($toptendonecrime['donecrimes']);
                                                if ($ranking <= 3) {
                                                    if ($ranking == 1) {
                                                        echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><span style='color: #FFC753;'><b>#" . $ranking . "</b></span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color: #FFC753;border-top:0px;' href='viewprofile.php?username=$donecrimename'><b>$donecrimename</b></a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #FFC753; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><b>" . $donecrimess . "</b></span>
                                                </td>
                                                </tr>";
                                                    } else {
                                                        echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; '>
                                                    <span class='statsDivStatic'><span style='color: #efefef;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#efefef' href='viewprofile.php?username=$donecrimename'>$donecrimename</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #efefef;'>
                                                    <span class='statsDivStatic'>" . $donecrimess . "</span>
                                                </td>
                                                </tr>";
                                                    }
                                                } else {
                                                    if($ranking==4){
                                                        echo "<tr style='border-top: 2px solid #212121;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$donecrimename'>$donecrimename</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $donecrimess . "</span>
                                                </td>
                                                </tr>";
                                                    }else{
                                                        echo "<tr>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$donecrimename'>$donecrimename</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $donecrimess . "</span>
                                                </td>
                                                </tr>";
                                                    }
                                                }
                                            }
                                            $all_crimes = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY donecrimes DESC");
                                            $i = 1;
                                            while ($current_crime = mysql_fetch_array($all_crimes)) {
												if ($current_crime['username'] == $usernameone) {
													$my_donecrimes = $current_crime['donecrimes'];
													$my_crime_rank = $i;
													break;
												}
												$i++;
											}
                                            /*$getme = mysql_query("SELECT * FROM recordsrank WHERE username = '$usernameone'");
                                            $result = mysql_fetch_array($getme);
                                            $first2 = $result['2'];*/
                                            if ($my_crime_rank > 15) {
	                                            echo "<tr style='border-top: 2px solid #222222; background-color: #383838;'>
	                                                <td class='statsDiv' style='color: #999999;'>
	                                                    <span class='statsDivStatic'>#".$my_crime_rank."</span>
	                                                </td>
	                                                <td class='statsDiv'>
	                                                    <a href='viewprofile.php?username=$usernameone'>$usernameone</>
	                                                </td>
	                                                <td class='statsDiv' style='color: #999999;'>
	                                                    <span class='statsDivStatic'>".$my_donecrimes."</span>
	                                                </td>
	                                            </tr>";
											}
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="miniMenu shadowTest curve3px" id="gtas" style="vertical-align: top; margin-left: 12px; margin-bottom: 5px;  display: inline-block; width: 43%; min-width: 175px; max-width: 325px;">
                                        <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                            Successful GTAs:
                                        </div>
                                        <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                            <tbody>
                                            <tr style="border-bottom: 1px solid #080808;text-align:center;">
                                                <td class="statsDivHeader" style="border-right: 0; border-left: 0; border-bottom: 0;" width="1%"></td>
                                                <td class="statsDivHeader" style="border-bottom: 0;">Username</td>
                                                <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0;">Total</td>
                                            </tr>
                                            <? $donestealsall = 0;
                                            $ranking = 0;
                                            while($toptendonetheft = mysql_fetch_array($toptendonethefts)) {
                                                $donestealsall++;
                                                $ranking++;
                                                $donestealname = $toptendonetheft['username'];
                                                if ($getusername == $donestealname) {
                                                    $bgcolor = "maroon";
                                                } else {
                                                    $bgcolor = "#222222";
                                                }
                                                $yesno1 = mysql_num_rows(mysql_query("SELECT * FROM achievements WHERE username='$donestealname'"));
                                                if ($yesno1 <= '0') {
                                                    mysql_query("INSERT INTO `achievements` (`username`,`donestealsfame`) VALUES ('$donestealname','$donestealsall')");
                                                } else {
                                                    mysql_query("UPDATE achievements SET donestealsfame = '$donestealsall' WHERE username = '$donestealname' LIMIT 1");
                                                }
                                                $donestealss = number_format($toptendonetheft['donethefts']);
                                                if ($ranking <= 3) {
                                                    if ($ranking == 1) {
                                                        echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><span style='color: #FFC753;'><b>#" . $ranking . "</b></span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color: #FFC753;border-top:0px;' href='viewprofile.php?username=$donestealname'><b>$donestealname</b></a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #FFC753; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><b>" . $donestealss . "</b></span>
                                                </td>
                                                </tr>";
                                                    } else {
                                                        echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; '>
                                                    <span class='statsDivStatic'><span style='color: #efefef;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#efefef' href='viewprofile.php?username=$donestealname'>$donestealname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #efefef;'>
                                                    <span class='statsDivStatic'>" . $donestealss . "</span>
                                                </td>
                                                </tr>";
                                                    }
                                                } else {
                                                    if ($ranking == 4) {
                                                        echo "<tr style='border-top: 2px solid #212121;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$donestealname'>$donestealname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $donestealss . "</span>
                                                </td>
                                                </tr>";
                                                    } else {
                                                        echo "<tr>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$donestealname'>$donestealname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $donestealss . "</span>
                                                </td>
                                                </tr>";
                                                    }
                                                }
                                            }
                                            $all_thefts = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY donethefts DESC");
                                            $i = 1;
                                            while ($current_theft = mysql_fetch_array($all_thefts)) {
												if ($current_theft['username'] == $usernameone) {
													$my_donethefts = $current_theft['donethefts'];
													$my_theft_rank = $i;
													break;
												}
												$i++;
											}
                                            /*$getme = mysql_query("SELECT * FROM recordsrank WHERE username = '$usernameone'");
                                            $result = mysql_fetch_array($getme);
                                            $first5 = $result['5'];*/
                                            if ($my_theft_rank > 15) {
	                                            echo "<tr style='border-top: 2px solid #222222; background-color: #383838;'>
	                                                <td class='statsDiv' style='color: #999999;'>
	                                                    <span class='statsDivStatic'>#".$my_theft_rank."</span>
	                                                </td>
	                                                <td class='statsDiv'>
	                                                    <a href='viewprofile.php?username=$usernameone'>$usernameone</>
	                                                </td>
	                                                <td class='statsDiv' style='color: #999999;'>
	                                                    <span class='statsDivStatic'>".$my_donethefts."</span>
	                                                </td>
	                                            </tr>";
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="break" id="sec2" style="padding-top: 18px;">
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 19px;">
                                            <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: -8px; margin-bottom: 5px;  display: inline-block; width: 43%; min-width: 175px; max-width: 325px;">
                                                <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                                    Successful Jail Busts:
                                                </div>
                                                <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                                    <tbody>
                                                    <tr style="border-bottom: 1px solid #080808;text-align:center;">
                                                        <td class="statsDivHeader" style="border-right: 0; border-left: 0; border-bottom: 0;" width="1%"></td>
                                                        <td class="statsDivHeader" style="border-bottom: 0;">Username</td>
                                                        <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0;">Total</td>
                                                    </tr>

                                                    <? $donebustsall = 0;
                                                    $ranking = 0;
                                                    while($toptendonebust = mysql_fetch_array($toptendonebusts)) {
                                                        $donebustsall++;
                                                        $ranking++;
                                                        $donebustname = $toptendonebust['username'];
                                                        if ($getusername == $donebustname) {
                                                            $bgcolor = "maroon";
                                                        } else {
                                                            $bgcolor = "#222222";
                                                        }
                                                        $yesno1 = mysql_num_rows(mysql_query("SELECT * FROM achievements WHERE username='$donebustname'"));
                                                        if ($yesno1 <= '0') {
                                                            mysql_query("INSERT INTO `achievements` (`username`,`donebustsfame`) VALUES ('$donebustname','$donebustsall')");
                                                        } else {
                                                            mysql_query("UPDATE achievements SET donebustsfame = '$donebustsall' WHERE username = '$donebustname' LIMIT 1");
                                                        }
                                                        $donebustss = number_format($toptendonebust['donebusts']);
                                                        if ($ranking <= 3) {
                                                            if ($ranking == 1) {
                                                                echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><span style='color: #FFC753;'><b>#" . $ranking . "</b></span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color: #FFC753;border-top:0;' href='viewprofile.php?username=$donebustname'><b>$donebustname</b></a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #FFC753; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><b>" . $donebustss . "</b></span>
                                                </td>
                                                </tr>";
                                                            } else {
                                                                echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; '>
                                                    <span class='statsDivStatic'><span style='color: #efefef;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#efefef' href='viewprofile.php?username=$donebustname'>$donebustname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #efefef;'>
                                                    <span class='statsDivStatic'>" . $donebustss . "</span>
                                                </td>
                                                </tr>";
                                                            }
                                                        } else {
                                                            if ($ranking == 4) {
                                                                echo "<tr style='border-top: 2px solid #212121;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$donebustname'>$donebustname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $donebustss . "</span>
                                                </td>
                                                </tr>";
                                                            } else {
                                                                echo "<tr>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$donebustname'>$donebustname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $donebustss . "</span>
                                                </td>
                                                </tr>";
                                                            }
                                                        }
                                                    }
		                                            $all_busts = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY donebusts DESC");
		                                            $i = 1;
		                                            while ($current_bust = mysql_fetch_array($all_busts)) {
														if ($current_bust['username'] == $usernameone) {
															$my_donebusts = $current_bust['donebusts'];
															$my_bust_rank = $i;
															break;
														}
														$i++;
													}
                                                    /*$getme = mysql_query("SELECT * FROM recordsrank WHERE username = '$usernameone'");
                                                    $result = mysql_fetch_array($getme);
                                                    $first8 = $result['8'];*/
                                                    if ($my_bust_rank > 15) {
                                                    echo "<tr style='border-top: 2px solid #222222; background-color: #383838;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'>#".$my_bust_rank."</span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a href='viewprofile.php?username=$usernameone'>$usernameone</>
                                                </td>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'>".$my_donebusts."</span>
                                                </td>
                                            </tr>";
													}
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="miniMenu shadowTest curve3px" style="vertical-align: top; margin-left: 12px; margin-bottom: 5px;  display: inline-block; width: 43%; min-width: 175px; max-width: 325px;">
                                                <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                                    Consecutive Jailbusts:
                                                </div>
                                                <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                                    <tbody>
                                                    <tr style="border-bottom: 1px solid #080808;text-align:center;">
                                                        <td class="statsDivHeader" style="border-right: 0; border-left: 0; border-bottom: 0;" width="1%"></td>
                                                        <td class="statsDivHeader" style="border-bottom: 0;">Username</td>
                                                        <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0;">Total</td>
                                                    </tr>
                                                    <? $jointsall = 0;
                                                    $ranking = 0;
                                                    while($toptenjoint = mysql_fetch_array($toptenjoints)) {
                                                        $jointsall++;
                                                        $ranking++;
                                                        $jointname = $toptenjoint['username'];
                                                        if ($getusername == $jointname) {
                                                            $bgcolor = "maroon";
                                                        } else {
                                                            $bgcolor = "#222222";
                                                        }
                                                        $yesno1 = mysql_num_rows(mysql_query("SELECT * FROM achievements WHERE username='$jointname'"));
                                                        if ($yesno1 <= '0') {
                                                            mysql_query("INSERT INTO `achievements` (`username`,`jointsfame`) VALUES ('$jointname','$jointsall')");
                                                        } else {
                                                            mysql_query("UPDATE achievements SET jointsfame = '$jointsall' WHERE username = '$jointname' LIMIT 1");
                                                        }
                                                        $jointss = number_format($toptenjoint['joint']);
                                                        if ($ranking <= 3) {
                                                            if ($ranking == 1) {
                                                                echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><span style='color: #FFC753;'><b>#" . $ranking . "</b></span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color: #FFC753;border-top:0;' href='viewprofile.php?username=$jointname'><b>$jointname</b></a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #FFC753; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><b>" . $jointss . "</b></span>
                                                </td>
                                                </tr>";
                                                            } else {
                                                                echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; '>
                                                    <span class='statsDivStatic'><span style='color: #efefef;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#efefef' href='viewprofile.php?username=$jointname'>$jointname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #efefef;'>
                                                    <span class='statsDivStatic'>" . $jointss . "</span>
                                                </td>
                                                </tr>";
                                                            }
                                                        } else {
                                                            if ($ranking == 4) {
                                                                echo "<tr style='border-top: 2px solid #212121;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$jointname'>$jointname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $jointss . "</span>
                                                </td>
                                                </tr>";
                                                            } else {
                                                                echo "<tr>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$jointname'>$jointname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $jointss . "</span>
                                                </td>
                                                </tr>";
                                                            }
                                                        }
                                                    }
                                                    $all_joints = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY joint DESC");
		                                            $i = 1;
		                                            while ($current_joint = mysql_fetch_array($all_joints)) {
														if ($current_joint['username'] == $usernameone) {
															$my_joints = $current_joint['joint'];
															$my_joint_rank = $i;
															break;
														}
														$i++;
													}
                                                    /*$getme = mysql_query("SELECT * FROM recordsrank WHERE username = '$usernameone'");
                                                    $result = mysql_fetch_array($getme);
                                                    $first9 = $result['9'];*/
                                                    if ($my_joint_rank > 15) {
                                                    echo "<tr style='border-top: 2px solid #222222; background-color: #383838;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'>#".$my_joint_rank."</span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a href='viewprofile.php?username=$usernameone'>$usernameone</>
                                                </td>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'>".$my_joints."</span>
                                                </td>
                                            </tr>";
													}
                                                     ?>

                                                    </tbody></table>
                                            </div>
                                            <div class="break" id="sec3" style="padding-top: 18px;">
                                                <div class="spacer"></div>
                                                <div class="break" style="padding-top: 19px;">
                                                    <div class="miniMenu shadowTest curve3px" id="bullets" style="vertical-align: top; margin-left: -8px; margin-bottom: 5px;  display: inline-block; width: 43%; min-width: 175px; max-width: 325px;">
                                                        <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                                            Bullets Melted:
                                                        </div>
                                                        <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                                            <tbody>
                                                            <tr style="border-bottom: 1px solid #080808;text-align:center;">
                                                                <td class="statsDivHeader" style="border-right: 0; border-left: 0; border-bottom: 0;" width="1%"></td>
                                                                <td class="statsDivHeader" style="border-bottom: 0;">Username</td>
                                                                <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0;">Total</td>
                                                            </tr>
                                                            <? $bulletsall = 0;
                                                            $ranking = 0;
                                                            while($toptentotalmelted = mysql_fetch_array($toptentotalmelteds)) {
                                                                $bulletsall++;
                                                                $ranking++;
                                                                $bulletsname = $toptentotalmelted['username'];
                                                                if ($getusername == $bulletsname) {
                                                                    $bgcolor = "maroon";
                                                                } else {
                                                                    $bgcolor = "#222222";
                                                                }
                                                                $yesno1 = mysql_num_rows(mysql_query("SELECT * FROM achievements WHERE username='$bulletsname'"));
                                                                if ($yesno1 <= '0') {
                                                                    mysql_query("INSERT INTO `achievements` (`username`,`totalmeltedfame`) VALUES ('$bulletsname','$bulletsall')");
                                                                } else {
                                                                    mysql_query("UPDATE achievements SET totalmeltedfame = '$bulletsall' WHERE username = '$bulletsname' LIMIT 1");
                                                                }
                                                                $bulletss = number_format($toptentotalmelted['totalmelted']);
                                                                if ($ranking <= 3) {
                                                                    if ($ranking == 1) {
                                                                        echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><span style='color: #FFC753;'><b>#" . $ranking . "</b></span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color: #FFC753;border-top:0;' href='viewprofile.php?username=$bulletsname'><b>$bulletsname</b></a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #FFC753; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><b>" . $jointss . "</b></span>
                                                </td>
                                                </tr>";
                                                                    } else {
                                                                        echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; '>
                                                    <span class='statsDivStatic'><span style='color: #efefef;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#efefef' href='viewprofile.php?username=$bulletsname'>$bulletsname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #efefef;'>
                                                    <span class='statsDivStatic'>" . $bulletss . "</span>
                                                </td>
                                                </tr>";
                                                                    }
                                                                } else {
                                                                    if ($ranking == 4) {
                                                                        echo "<tr style='border-top: 2px solid #212121;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$bulletsname'>$bulletsname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $bulletss . "</span>
                                                </td>
                                                </tr>";
                                                                    } else {
                                                                        echo "<tr>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$bulletsname'>$bulletsname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $bulletss . "</span>
                                                </td>
                                                </tr>";
                                                                    }
                                                                }
                                                            }
                                                            $all_melted = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY totalmelted DESC");
				                                            $i = 1;
				                                            while ($current_melted = mysql_fetch_array($all_melted)) {
																if ($current_melted['username'] == $usernameone) {
																	$my_melted = $current_melted['joint'];
																	$my_melted_rank = $i;
																	break;
																}
																$i++;
															}
                                                            /*$getme = mysql_query("SELECT * FROM recordsrank WHERE username = '$usernameone'");
                                                            $result = mysql_fetch_array($getme);
                                                            $first11 = $result['11'];*/
                                                            if ($my_melted_rank > 15) {
                                                            echo "<tr style='border-top: 2px solid #222222; background-color: #383838;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'>#".$my_melted_rank."</span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a href='viewprofile.php?username=$usernameone'>$usernameone</>
                                                </td>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'>".$my_melted."</span>
                                                </td>
                                            </tr>";
															}
                                                             ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="miniMenu shadowTest curve3px" id="points" style="vertical-align: top; margin-left: 12px; margin-bottom: 5px;  display: inline-block; width: 43%; min-width: 175px; max-width: 325px;">
                                                        <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                                            Points Spent On Account:
                                                        </div>
                                                        <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                                            <tbody>
                                                            <tr style="border-bottom: 1px solid #080808;text-align:center;">
                                                                <td class="statsDivHeader" style="border-right: 0; border-left: 0; border-bottom: 0;" width="1%"></td>
                                                                <td class="statsDivHeader" style="border-bottom: 0;">Username</td>
                                                                <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0;">Total</td>
                                                            </tr>
                                                            <? $pointsall = 0;
                                                            $ranking = 0;
                                                            while($toptenpointsspent = mysql_fetch_array($toptenpointsspents)) {
                                                                $pointsall++;
                                                                $ranking++;
                                                                $pointname = $toptenpointsspent['username'];
                                                                if ($getusername == $pointname) {
                                                                    $bgcolor = "maroon";
                                                                } else {
                                                                    $bgcolor = "#222222";
                                                                }
                                                                $yesno1 = mysql_num_rows(mysql_query("SELECT * FROM achievements WHERE username='$pointname'"));
                                                                if ($yesno1 <= '0') {
                                                                    mysql_query("INSERT INTO `achievements` (`username`,`pointsspentfame`) VALUES ('$pointname','$pointsall')");
                                                                } else {
                                                                    mysql_query("UPDATE achievements SET pointsspentfame = '$pointsall' WHERE username = '$pointname' LIMIT 1");
                                                                }
                                                                $pointss = number_format($toptenpointsspent['ptsspent']);
                                                                if ($ranking <= 3) {
                                                                    if ($ranking == 1) {
                                                                        echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><span style='color: #FFC753;'><b>#" . $ranking . "</b></span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color: #FFC753;border-top:0;' href='viewprofile.php?username=$pointname'><b>$pointname</b></a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #FFC753; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><b>" . $pointss . "</b></span>
                                                </td>
                                                </tr>";
                                                                    } else {
                                                                        echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; '>
                                                    <span class='statsDivStatic'><span style='color: #efefef;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#efefef' href='viewprofile.php?username=$pointname'>$pointname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #efefef;'>
                                                    <span class='statsDivStatic'>" . $pointss . "</span>
                                                </td>
                                                </tr>";
                                                                    }
                                                                } else {
                                                                    if ($ranking == 4) {
                                                                        echo "<tr style='border-top: 2px solid #212121;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$pointname'>$pointname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $pointss . "</span>
                                                </td>
                                                </tr>";
                                                                    } else {
                                                                        echo "<tr>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$pointname'>$pointname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $pointss . "</span>
                                                </td>
                                                </tr>";
                                                                    }
                                                                }
                                                            }
                                                            $all_ptsspent = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY ptsspent DESC");
				                                            $i = 1;
				                                            while ($current_ptsspent = mysql_fetch_array($all_ptsspent)) {
																if ($current_ptsspent['username'] == $usernameone) {
																	$my_ptsspent = $current_ptsspent['joint'];
																	$my_ptsspent_rank = $i;
																	break;
																}
																$i++;
															}
                                                            /*$getme = mysql_query("SELECT * FROM recordsrank WHERE username = '$usernameone'");
                                                            $result = mysql_fetch_array($getme);
                                                            $first15 = $result['15'];*/
                                                            if ($my_ptsspent_rank > 15) {
                                                            echo "<tr style='border-top: 2px solid #222222; background-color: #383838;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'>#".$my_ptsspent_rank."</span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a href='viewprofile.php?username=$usernameone'>$usernameone</>
                                                </td>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'>".$my_ptsspent."</span>
                                                </td>
                                            </tr>";
															}
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="break" id="sec4" style="padding-top: 18px;">
                                                        <div class="spacer"></div>
                                                        <div class="break" style="padding-top: 19px;">
                                                            <div class="miniMenu shadowTest curve3px" id="casinos" style="vertical-align: top; margin-left: -8px; margin-bottom: 5px;  display: inline-block; width: 43%; min-width: 175px; max-width: 325px;">
                                                                <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                                                    Casinos Won:
                                                                </div>
                                                                <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                                                    <tbody>
                                                                    <tr style="border-bottom: 1px solid #080808;text-align:center;">
                                                                        <td class="statsDivHeader" style="border-right: 0; border-left: 0; border-bottom: 0;" width="1%"></td>
                                                                        <td class="statsDivHeader" style="border-bottom: 0;">Username</td>
                                                                        <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0;">Total</td>
                                                                    </tr>
                                                                    <? $casinowinsall = 0;
                                                                    $ranking = 0;
                                                                    while($toptencasinowin = mysql_fetch_array($toptencasinowins)) {
                                                                        $casinowinsall++;
                                                                        $ranking++;
                                                                        $casinowinname = $toptencasinowin['username'];
                                                                        if ($getusername == $casinowinname) {
                                                                            $bgcolor = "maroon";
                                                                        } else {
                                                                            $bgcolor = "#222222";
                                                                        }
                                                                        $yesno1 = mysql_num_rows(mysql_query("SELECT * FROM achievements WHERE username='$casinowinname'"));
                                                                        if ($yesno1 <= '0') {
                                                                            mysql_query("INSERT INTO `achievements` (`username`,`casinowinsfame`) VALUES ('$casinowinname','$casinowinsall')");
                                                                        } else {
                                                                            mysql_query("UPDATE achievements SET casinowinsfame = '$casinowinsall' WHERE username = '$casinowinname' LIMIT 1");
                                                                        }
                                                                        $casinowinss = number_format($toptencasinowin['casinos']);
                                                                        if ($ranking <= 3) {
                                                                            if ($ranking == 1) {
                                                                                echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><span style='color: #FFC753;'><b>#" . $ranking . "</b></span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color: #FFC753;border-top:0;' href='viewprofile.php?username=$casinowinname'><b>$casinowinname</b></a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #FFC753; border-top: 0;'>
                                                    <span class='statsDivStatic' style='border-top: 0;'><b>" . $casinowinss . "</b></span>
                                                </td>
                                                </tr>";
                                                                            } else {
                                                                                echo "<tr style='background-color: #303030;'>
                                                <td class='statsDiv' style='color: #999999; background-color: #303030; '>
                                                    <span class='statsDivStatic'><span style='color: #efefef;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#efefef' href='viewprofile.php?username=$casinowinname'>$casinowinname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #efefef;'>
                                                    <span class='statsDivStatic'>" . $casinowinss . "</span>
                                                </td>
                                                </tr>";
                                                                            }
                                                                        } else {
                                                                            if ($ranking == 4) {
                                                                                echo "<tr style='border-top: 2px solid #212121;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$casinowinname'>$casinowinname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $casinowinss . "</span>
                                                </td>
                                                </tr>";
                                                                            } else {
                                                                                echo "<tr>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'><span style='color: #bbbbbb;'>#" . $ranking . "</span></span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a style='color:#bbbbbb' href='viewprofile.php?username=$casinowinname'>$casinowinname</a>                                               
                                                </td>                                              
                                                <td class='statsDiv' style='color: #999999; color: #bbbbbb;'>
                                                    <span class='statsDivStatic'>" . $casinowinss . "</span>
                                                </td>
                                                </tr>";
                                                                            }
                                                                        }
                                                                    }
		                                                            $all_casinos = mysql_query("SELECT * FROM users WHERE rankid < 25 ORDER BY casinos DESC");
						                                            $i = 1;
						                                            while ($current_casinos = mysql_fetch_array($all_casinos)) {
																		if ($current_casinos['username'] == $usernameone) {
																			$my_casinos = $current_casinos['joint'];
																			$my_casinos_rank = $i;
																			break;
																		}
																		$i++;
																	}
                                                                    /*$getme = mysql_query("SELECT * FROM recordsrank WHERE username = '$usernameone'");
                                                                    $result = mysql_fetch_array($getme);
                                                                    $first14 = $result['14'];*/
                                                                    if ($my_casinos_rank > 15) {
                                                                    echo "<tr style='border-top: 2px solid #222222; background-color: #383838;'>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'>#".$my_casinos_rank."</span>
                                                </td>
                                                <td class='statsDiv'>
                                                    <a href='viewprofile.php?username=$usernameone'>$usernameone</>
                                                </td>
                                                <td class='statsDiv' style='color: #999999;'>
                                                    <span class='statsDivStatic'>".$my_casinos."</span>
                                                </td>
                                            </tr>";
																	}
                                                                    ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
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