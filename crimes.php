<? include 'included.php'; session_start(); ?>
<?
$time = time();
$times = $time + 300;
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$vera = mysql_real_escape_string($_POST['ver']);
$sessionid = preg_replace($saturate, "", $sessionidraw);
$verpost = preg_replace($saturate, "", $vera);
$userip = $_SERVER[REMOTE_ADDR];
$gangsterusername = $usernameone;
$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if ($jailtester != '0') {
    die(include 'redirect.php');
}
$check = $statustesttwo['sentmsgs'];

$stealbulletsbutton = "7";
$stealfrombutton = "6";
$kidnapbutton = "5";
$robbutton = "4";
$mugbutton = "3";
$hustlebutton = "2";
$begbutton = "1";
$hidden = "hi";
$timea = time();

/*$vericheck = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$usernameone' AND ver1 != '0'"));
if ($vericheck > 100000000000) {
    die(include 'doverifcrimes.php');
}*/

/*if ((isset($_POST['c1'])) || (isset($_POST['c2'])) || (isset($_POST['c3'])) || (isset($_POST['c4'])) || (isset($_POST['c5'])) || (isset($_POST['c6'])) || (isset($_POST['c7'])) || (isset($_POST['doall']))) {
    $verificationcode = rand(1, 60);
    if ($verificationcode == '600000000000') {
        $verifarray = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        shuffle($verifarray);
        $verif1 = $verifarray[0];
        $verif2 = $verifarray[1];
        $verif3 = $verifarray[2];
        mysql_query("UPDATE users SET ver1 = '$verif1', ver2 = '$verif2', ver3 = '$verif3' WHERE ID = '$ida'");
        die(include 'doverifcrimes.php');
    }
}*/
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
    <script language="javascript">
        /*checked = false;
        function checkAll() {
            if (checked == false) {
                checked = true
            } else {
                checked = false
            }
            for (var i = 0; i < document.getElementById('crimes').elements.length; i++) {
                document.getElementById('crimes').elements[i].checked = checked;
            }
        }*/
    </script>

    <script language="javascript">
        checked = false;
        function checkAll() {
            if (checked == false) {
                checked = true
            } else {
                checked = false
            }
            for (var i = 0; i < document.getElementById('crimes').elements.length; i++) {
                document.getElementById('crimes').elements[i].checked = checked;
            }
        }
    </script>
    <!--<script>
        /*function crimesCountdown(load) {
            if (load) {
                var table = document.getElementById('crimesTable');
                var inmates = table.getElementsByTagName('span');
                for (var i = 0; i < inmates.length; i++) {
                    if (inmates[i].id == 'countdown') {
                        var timeleft = parseInt(inmates[i].innerHTML);
                        if (timeleft > 0) {
                            if (timeleft == 1) {
                                inmates[i].innerHTML = '0';
                            } else {
                                inmates[i].innerHTML = timeleft - 1;
                            }
                        }
                    }
                }
            }
            setTimeout("crimesCountdown(true)", 1000);
        }
        window.onload = crimesCountdown;*/
    </script>-->
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

            $time = time();


            $getuserinfoarray = $statustesttwo;
            $username = $getuserinfoarray['username'];
            $reward = $getuserinfoarray['reward'];
            $rank = $getuserinfoarray['rankid'];
            $crewid = $getuserinfoarray['crewid'];
            $rankup = $getuserinfoarray['rankup'];
            $userlocation = $getuserinfoarray['location'];
            $mission = $getuserinfoarray['mission'];
            $missioncount = $getuserinfoarray['missioncount'];
            $ID = $getuserinfoarray['ID'];
            $ver = $getuserinfoarray['ver1'];
            $input = $getuserinfoarray['input'];
            $nowcrimes = $getuserinfoarray['nowcrimes'];
            $consecutivecrimes = $getuserinfoarray['consecutivecrimes'];
            $inputrand = mt_rand(0, 20);
            if ($inputrand == '0') {
                $newinput = 1;
            }

            $getida = mysql_real_escape_string($_GET['id']);
            $getid = preg_replace($saturated, "", $getida);
            $kidnapraw = $getuserinfoarray['kidnap'];
            $mugraw = $getuserinfoarray['mug'];
            $stealfromraw = $getuserinfoarray['stealfrom'];
            $stealbulletsraw = $getuserinfoarray['stealbullets'];
            $robraw = $getuserinfoarray['rob'];
            $hustleraw = $getuserinfoarray['hustle'];
            $begraw = $getuserinfoarray['beg'];
            $crewida = $getuserinfoarray['crewid'];
            $kidnap = $kidnapraw - $time;
            $mug = $mugraw - $time;
            $stealfrom = $stealfromraw - $time;
            $stealbullets = $stealbulletsraw - $time;
            $rob = $robraw - $time;
            $hustle = $hustleraw - $time;
            $beg = $begraw - $time;

            mysql_query("DELETE FROM referralrewards WHERE crimes != '0' AND crimes < '$time'");
            mysql_query("DELETE FROM referralrewards WHERE rank != '0' AND rank < '$time'");

            $crewperkk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '2'"));
            $refreward = mysql_num_rows(mysql_query("SELECT * FROM referralrewards WHERE crimes > '$time'"));
            $refreward2 = mysql_num_rows(mysql_query("SELECT * FROM referralrewards WHERE rank > '$time'"));
            if ($crewperkk > 0) {
                $moneyby = 1.25;
            } else {
                $moneyby = 1;
            }
            if ($refreward > 0) {
                $moneyby = 2;
            }
            ?>



            <?
            $guessopen = mysql_query("SELECT * FROM gametimes WHERE game = 'weekly'");
            $openx = mysql_fetch_array($guessopen);
            $openxox = $openx['time'];
			$outcomes = array();
			$jail_outcome = '<table class="menuTable curve1px" style="margin-bottom: 1px;" cellspacing="0" cellpadding="0">
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
												<div class="menuHeader noTop" style="text-align: left; padding-left: 5px; padding-top: 6px;">
													<span style="color: red;">Busted</span>
												</div>
												<div style="padding: 6px; padding-top: 7px; color: #fefefe;">
													You got caught, you are now in jail!
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
							</table>';

            if ($_POST['doall']) {
				if (isset($_POST['captcha_need']) && $_POST['captcha'] != $_SESSION['rand_code']) {
					$showoutcome++; $outcome = "Verification code is not valid!";
				}
				elseif ((isset($_POST['captcha_need']) && $_POST['captcha'] == $_SESSION['rand_code']) || !isset($_POST['captcha_need'])) {
						$verificationcode = rand(1, 25);
						if ($verificationcode == '25') {
							$showcaptcha = true;
						}else{
                if ($rank >= 10 AND $stealbullets <= 0) {
                    $rand = mt_rand(0, 9);
                    $jailtime = $time + 200;
                    $times = $time + 7000;
                    $bulletrand = round(mt_rand(25, 125) * $moneyby);
                    $moneyrand = mt_rand(50000, 100000) * $moneyby;
                    mysql_query("UPDATE users SET stealbullets = '$times' WHERE ID = '$ida' AND stealbullets <= '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    if ($rand == 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE loggedin SET crimesfailed = (crimesfailed + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");
                        echo $jail_outcome;include "crimes_add_right.php";die();
                    } else {
                        if ($rank == '10') {
                            $update = '1';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.89';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.82';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.78';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.7';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.67';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.635';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.639';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.59';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.46';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.34';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.8';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }
                    }

                    $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                    if ($crewperk > 0 || $refreward2 > 0) {
                        if ($rank == '10') {
                            $update = '1';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.1';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.89';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.82';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.78';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.7';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.67';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.635';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.639';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.59';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.46';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.12';
                            $newrank = "<font color=#FFC753>$rank22</font>";
                        } else {
                            $update = '0';
                        }

                        if ($rank <= 22) {
                            if (($rankup + $update) > ('100')) {
                                $rank++;
                                $newrankup = $rankup + $update - 100;
                                $rankup = $newrankup;

                                $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                $homeinfo = "ranked to \[b\]$newrank\[\/b\]!";
                                mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','1')");
                                mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000 WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                                if ($crewida != 0) {
                                    mysql_query("UPDATE crews SET bullets = bullets + $bulletrand WHERE id = '$crewida'");
                                }
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
                            } else {
                                $rankup = $rankup + $update;
                                mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                                $c7po = $moneyrand;
                                if ($crewid != 0) {
                                    mysql_query("UPDATE crews SET bullets = bullets + $bulletrand WHERE id = '$crewida'");
                                    mysql_query("UPDATE missiontasks SET crewbullets = (crewbullets + 1) WHERE username = '$usernameone'");
                                }
                                mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
                            }
                        }
                        if ($rank >= 25) {
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                        }
                        if ($openxox == 2) {
                            mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                        }
                        mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE missiontasks SET crime7 = crime7 + 1 WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                        $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                        $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                        $currentc = $consecutivecrime['nowcrimes'];
                        $currentcon = $consecutivecrime['consecutivecrimes'];
                        if ($currentc > $currentcon) {
                            mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                        }
                    }
                }

                if ($rank >= 9 AND $stealfrom <= 0) {
                    $rand = mt_rand(0, 10);
                    $jailtime = $time + 185;
                    $times = $time + 2200;
                    mysql_query("UPDATE users SET stealfrom = '$times' WHERE ID = '$ida' AND stealfrom <= '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    $moneyrand = mt_rand(0, 1250000) * $moneyby;
                    if ($rand == 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE loggedin SET crimesfailed = (crimesfailed + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");
                        echo $jail_outcome;include "crimes_add_right.php";die();
                    } else {
                        if ($rank == '9') {
                            $update = '0.95';
                            $newrank = "$rank10";
                        } elseif ($rank == '10') {
                            $update = '0.95';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.94';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.92';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.88';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.82';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.8';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.765';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.689';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.6';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.43';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.24';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.1';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }

                        $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                        if ($crewperk > 0 || $refreward2 > 0) {
                            if ($rank == '9') {
                                $update = '0.95';
                                $newrank = "$rank10";
                            } elseif ($rank == '10') {
                                $update = '0.95';
                                $newrank = "$rank11";
                            } elseif ($rank == '11') {
                                $update = '0.95';
                                $newrank = "$rank12";
                            } elseif ($rank == '12') {
                                $update = '0.94';
                                $newrank = "$rank13";
                            } elseif ($rank == '13') {
                                $update = '0.92';
                                $newrank = "$rank14";
                            } elseif ($rank == '14') {
                                $update = '0.88';
                                $newrank = "$rank15";
                            } elseif ($rank == '15') {
                                $update = '0.82';
                                $newrank = "$rank16";
                            } elseif ($rank == '16') {
                                $update = '0.8';
                                $newrank = "$rank17";
                            } elseif ($rank == '17') {
                                $update = '0.765';
                                $newrank = "$rank18";
                            } elseif ($rank == '18') {
                                $update = '0.689';
                                $newrank = "$rank19";
                            } elseif ($rank == '19') {
                                $update = '0.6';
                                $newrank = "$rank20";
                            } elseif ($rank == '20') {
                                $update = '0.43';
                                $newrank = "$rank21";
                            } elseif ($rank == '21') {
                                $update = '0.24';
                                $newrank = "<font color=#FFC753>$rank22</font>";
                            } else {
                                $update = '0';
                            }
                        }

                        if ($rank <= 22) {
                            if (($rankup + $update) > ('100')) {
                                $rank++;
                                $newrankup = $rankup + $update - 100;
                                $rankup = $newrankup;
                                $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                $homeinfo = "ranked to \[b\]$newrank\[\/b\]!";
                                mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','1')");
                                mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = money + $moneyrand WHERE ID = '$ida'");
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
                            } else {
                                $rankup = $rankup + $update;
                                if ($moneyrand == '0') {
                                    $moneyrand = '1';
                                }
                                mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                            }
                        }
                        if ($rank >= 25) {
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                        }
                        if ($openxox == 2) {
                            mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                        }
                        mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE missiontasks SET crime6 = crime6 + 1 WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                        $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                        $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                        $currentc = $consecutivecrime['nowcrimes'];
                        $currentcon = $consecutivecrime['consecutivecrimes'];
                        if ($currentc > $currentcon) {
                            mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                        }
                        $c6po = $moneyrand;
                    }
                }

                if ($rank >= 7 AND $kidnap <= 0) {
                    $rand = mt_rand(0, 9);
                    $jailtime = $time + 150;
                    $times = $time + 1000;
                    mysql_query("UPDATE users SET kidnap = '$times' WHERE ID = '$ida' AND kidnap <= '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    $moneyrand = mt_rand(60000, 165000) * 3 * $moneyby;
                    if ($rand == 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE loggedin SET crimesfailed = (crimesfailed + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");
                        echo $jail_outcome;include "crimes_add_right.php";die();
                    } else {
                        if ($rank == '7') {
                            $update = '1.4';
                            $newrank = "$rank8";
                        } elseif ($rank == '8') {
                            $update = '1.4';
                            $newrank = "$rank9";
                        } elseif ($rank == '9') {
                            $update = '1.19';
                            $newrank = "$rank10";
                        } elseif ($rank == '10') {
                            $update = '0.899';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.88';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.867';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.86';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.828';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.8';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.739';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.667';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.523';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.467';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.2';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.09';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }

                        $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                        if ($crewperk > 0 || $refreward2 > 0) {
                            if ($rank == '7') {
                                $update = '1.4';
                                $newrank = "$rank8";
                            } elseif ($rank == '8') {
                                $update = '1.4';
                                $newrank = "$rank9";
                            } elseif ($rank == '9') {
                                $update = '1.4';
                                $newrank = "$rank10";
                            } elseif ($rank == '10') {
                                $update = '1.19';
                                $newrank = "$rank11";
                            } elseif ($rank == '11') {
                                $update = '0.899';
                                $newrank = "$rank12";
                            } elseif ($rank == '12') {
                                $update = '0.88';
                                $newrank = "$rank13";
                            } elseif ($rank == '13') {
                                $update = '0.867';
                                $newrank = "$rank14";
                            } elseif ($rank == '14') {
                                $update = '0.86';
                                $newrank = "$rank15";
                            } elseif ($rank == '15') {
                                $update = '0.828';
                                $newrank = "$rank16";
                            } elseif ($rank == '16') {
                                $update = '0.8';
                                $newrank = "$rank17";
                            } elseif ($rank == '17') {
                                $update = '0.739';
                                $newrank = "$rank18";
                            } elseif ($rank == '18') {
                                $update = '0.667';
                                $newrank = "$rank19";
                            } elseif ($rank == '19') {
                                $update = '0.523';
                                $newrank = "$rank20";
                            } elseif ($rank == '20') {
                                $update = '0.467';
                                $newrank = "$rank21";
                            } elseif ($rank == '21') {
                                $update = '0.2';
                                $newrank = "<font color=#FFC753>$rank22</font>";
                            } else {
                                $update = '0';
                            }
                        }

                        if ($rank <= 22) {
                            if (($rankup + $update) > ('100')) {
                                $rank++;
                                $newrankup = $rankup + $update - 100;
                                $rankup = $newrankup;
                                $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                $homeinfo = "ranked to \[b\]$newrank\[\/b\]!";
                                mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','1')");
                                mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = money + $moneyrand WHERE ID = '$ida'");
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
                            } else {
                                $rankup = $rankup + $update;
                                mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                            }
                        }

                        $moneyr = number_format($moneyrand);
                        $kidnaprand = mt_rand(0, 32);
                        if ($kidnaprand == '1') {
                            mysql_query("UPDATE users SET grenades = (grenades + 1) WHERE ID = '$ida'");
                        }
                        if ($rank >= 25) {
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                        }
                        if ($openxox == 2) {
                            mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                        }
                        mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE missiontasks SET crime5 = crime5 + 1 WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                        $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                        $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                        $currentc = $consecutivecrime['nowcrimes'];
                        $currentcon = $consecutivecrime['consecutivecrimes'];
                        if ($currentc > $currentcon) {
                            mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                        }
                        $c5po = $moneyrand;
                    }
                }

                if ($rank >= 5 AND $rob <= 0) {
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    $rand = mt_rand(0, 12);
                    $jailtime = $time + 120;
                    $times = $time + 800;
                    $moneyrand = mt_rand(15000, 80000) * 3 * $moneyby;
                    mysql_query("UPDATE users SET rob = '$times' WHERE ID = '$ida' AND rob <= '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    if ($rand == 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE loggedin SET crimesfailed = (crimesfailed + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");
                        echo $jail_outcome;include "crimes_add_right.php";die();
                    } else {
                        if ($rank == '5') {
                            $update = '3';
                            $newrank = "$rank6";
                        } elseif ($rank == '6') {
                            $update = '1.9';
                            $newrank = "$rank7";
                        } elseif ($rank == '7') {
                            $update = '1.95';
                            $newrank = "$rank8";
                        } elseif ($rank == '8') {
                            $update = '1.69';
                            $newrank = "$rank9";
                        } elseif ($rank == '9') {
                            $update = '1.21';
                            $newrank = "$rank10";
                        } elseif ($rank == '10') {
                            $update = '0.899';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.84';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.76';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.69';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.6';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.5';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.49';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.41';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.37';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.29';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.09';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.0695';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }

                        $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                        if ($crewperk > 0 || $refreward2 > 0) {
                            if ($rank == '5') {
                                $update = '3';
                                $newrank = "$rank6";
                            } elseif ($rank == '6') {
                                $update = '3';
                                $newrank = "$rank7";
                            } elseif ($rank == '7') {
                                $update = '1.9';
                                $newrank = "$rank8";
                            } elseif ($rank == '8') {
                                $update = '1.95';
                                $newrank = "$rank9";
                            } elseif ($rank == '9') {
                                $update = '1.69';
                                $newrank = "$rank10";
                            } elseif ($rank == '10') {
                                $update = '1.21';
                                $newrank = "$rank11";
                            } elseif ($rank == '11') {
                                $update = '0.899';
                                $newrank = "$rank12";
                            } elseif ($rank == '12') {
                                $update = '0.84';
                                $newrank = "$rank13";
                            } elseif ($rank == '13') {
                                $update = '0.76';
                                $newrank = "$rank14";
                            } elseif ($rank == '14') {
                                $update = '0.69';
                                $newrank = "$rank15";
                            } elseif ($rank == '15') {
                                $update = '0.6';
                                $newrank = "$rank16";
                            } elseif ($rank == '16') {
                                $update = '0.5';
                                $newrank = "$rank17";
                            } elseif ($rank == '17') {
                                $update = '0.49';
                                $newrank = "$rank18";
                            } elseif ($rank == '18') {
                                $update = '0.41';
                                $newrank = "$rank19";
                            } elseif ($rank == '19') {
                                $update = '0.37';
                                $newrank = "$rank20";
                            } elseif ($rank == '20') {
                                $update = '0.29';
                                $newrank = "$rank21";
                            } elseif ($rank == '21') {
                                $update = '0.09';
                                $newrank = "$rank22";
                            } else {
                                $update = '0';
                            }
                        }

                        if ($rank <= 22) {
                            if (($rankup + $update) > ('100')) {
                                $rank++;
                                $newrankup = $rankup + $update - 100;
                                $rankup = $newrankup;
                                $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                $homeinfo = "\[b\]$usernameone\[\/b\] has been promoted to \[b\]$newrank\[\/b\]!";
                                mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','2')");
                                mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = money + $moneyrand WHERE ID = '$ida'");
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
                            } else {
                                $rankup = $rankup + $update;
                                mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
                            }
                        }
                        if ($rank >= 25) {
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                        }
                        if ($openxox == 2) {
                            mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                        }
                        mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE missiontasks SET crime4 = crime4 + 1 WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                        $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                        $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                        $currentc = $consecutivecrime['nowcrimes'];
                        $currentcon = $consecutivecrime['consecutivecrimes'];
                        if ($currentc > $currentcon) {
                            mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                        }
                        $c4po = $moneyrand;
                    }
                }

                if ($rank >= 3 AND $mug <= 0) {
                    $rand = mt_rand(0, 15);
                    $jailtime = $time + 65;
                    $times = $time + 110;
                    mysql_query("UPDATE users SET mug = '$times' WHERE ID = '$ida' AND mug < '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    $moneyrand = mt_rand(7000, 30000) * 3 * $moneyby;
                    if ($rand == 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE loggedin SET crimesfailed = (crimesfailed + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");
                        echo $jail_outcome;include "crimes_add_right.php";die();
                    } else {
                        if ($rank == '3') {
                            $update = '25.99';
                            $newrank = "$rank4";
                        } elseif ($rank == '4') {
                            $update = '9.75';
                            $newrank = "$rank5";
                        } elseif ($rank == '5') {
                            $update = '2.99';
                            $newrank = "$rank6";
                        } elseif ($rank == '6') {
                            $update = '2.75';
                            $newrank = "$rank7";
                        } elseif ($rank == '7') {
                            $update = '1.95';
                            $newrank = "$rank8";
                        } elseif ($rank == '8') {
                            $update = '0.86';
                            $newrank = "$rank9";
                        } elseif ($rank == '9') {
                            $update = '0.78';
                            $newrank = "$rank10";
                        } elseif ($rank == '10') {
                            $update = '0.699';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.55';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.4';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.39';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.36';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.34';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.34';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.31';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.23';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.1';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.09';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.0795';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }

                        $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                        if ($crewperk > 0 || $refreward2 > 0) {
                            if ($rank == '3') {
                                $update = '25.99';
                                $newrank = "$rank4";
                            } elseif ($rank == '4') {
                                $update = '25.99';
                                $newrank = "$rank5";
                            } elseif ($rank == '5') {
                                $update = '9.75';
                                $newrank = "$rank6";
                            } elseif ($rank == '6') {
                                $update = '2.99';
                                $newrank = "$rank7";
                            } elseif ($rank == '7') {
                                $update = '2.75';
                                $newrank = "$rank8";
                            } elseif ($rank == '8') {
                                $update = '1.95';
                                $newrank = "$rank9";
                            } elseif ($rank == '9') {
                                $update = '0.86';
                                $newrank = "$rank10";
                            } elseif ($rank == '10') {
                                $update = '0.78';
                                $newrank = "$rank11";
                            } elseif ($rank == '11') {
                                $update = '0.699';
                                $newrank = "$rank12";
                            } elseif ($rank == '12') {
                                $update = '0.55';
                                $newrank = "$rank13";
                            } elseif ($rank == '13') {
                                $update = '0.4';
                                $newrank = "$rank14";
                            } elseif ($rank == '14') {
                                $update = '0.39';
                                $newrank = "$rank15";
                            } elseif ($rank == '15') {
                                $update = '0.36';
                                $newrank = "$rank16";
                            } elseif ($rank == '16') {
                                $update = '0.34';
                                $newrank = "$rank17";
                            } elseif ($rank == '17') {
                                $update = '0.34';
                                $newrank = "$rank18";
                            } elseif ($rank == '18') {
                                $update = '0.31';
                                $newrank = "$rank19";
                            } elseif ($rank == '19') {
                                $update = '0.23';
                                $newrank = "$rank20";
                            } elseif ($rank == '20') {
                                $update = '0.1';
                                $newrank = "$rank21";
                            } elseif ($rank == '21') {
                                $update = '0.09';
                                $newrank = "$rank22";
                            } else {
                                $update = '0';
                            }
                        }

                        if ($rank <= 22) {
                            if (($rankup + $update) > ('100')) {
                                $rank++;
                                $newrankup = $rankup + $update - 100;
                                $rankup = $newrankup;
                                $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                $homeinfo = "\[b\]$usernameone\[\/b\] has been promoted to \[b\]$newrank\[\/b\]!";
                                mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','2')");
                                mysql_query("UPDATE users SET rankid = (rankid + 1), rankup = '$newrankup', bullets = (bullets + 1000) ,money = (money + $moneyrand) WHERE ID = '$ida'");
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
                            } else {
                                $rankup = $rankup + $update;
                                mysql_query("UPDATE users SET money = (money + $moneyrand) WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET rankup = (rankup + $update) WHERE ID = '$ida'");
                            }
                        }
                        if ($rank >= 25) {
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                        }
                        if ($openxox == 2) {
                            mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                        }
                        mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE missiontasks SET crime3 = crime3 + 1 WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                        $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                        $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                        $currentc = $consecutivecrime['nowcrimes'];
                        $currentcon = $consecutivecrime['consecutivecrimes'];
                        if ($currentc > $currentcon) {
                            mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                        }
                        $c3po = $moneyrand;
                    }
                }

                if ($rank >= 1 AND $hustle <= 0) {
                    $rand = mt_rand(0, 16);
                    $jailtime = $time + 20;
                    $times = $time + 40;
                    mysql_query("UPDATE users SET hustle = '$times' WHERE ID = '$ida' AND hustle <= '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    $moneyrand = mt_rand(3000, 13000) * 3 * $moneyby;
                    if ($rand == 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE loggedin SET crimesfailed = (crimesfailed + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");
                        echo $jail_outcome;include "crimes_add_right.php";die();
                    } else {
                        if ($rank == '2') {
                            $update = '12';
                            $newrank = "$rank3";
                        } elseif ($rank == '3') {
                            $update = '8';
                            $newrank = "$rank4";
                        } elseif ($rank == '4') {
                            $update = '4';
                            $newrank = "$rank5";
                        } elseif ($rank == '5') {
                            $update = '2.6';
                            $newrank = "$rank6";
                        } elseif ($rank == '6') {
                            $update = '2.35';
                            $newrank = "$rank7";
                        } elseif ($rank == '7') {
                            $update = '1.55';
                            $newrank = "$rank8";
                        } elseif ($rank == '8') {
                            $update = '0.73';
                            $newrank = "$rank9";
                        } elseif ($rank == '9') {
                            $update = '0.59';
                            $newrank = "$rank10";
                        } elseif ($rank == '10') {
                            $update = '0.48';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.37';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.29';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.24';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.2';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.14';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.1';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.09';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.09';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.05';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.035';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.015';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }

                        $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                        if ($crewperk > 0 || $refreward2 > 0) {
                            if ($rank == '2') {
                                $update = '12';
                                $newrank = "$rank3";
                            } elseif ($rank == '3') {
                                $update = '12';
                                $newrank = "$rank4";
                            } elseif ($rank == '4') {
                                $update = '8';
                                $newrank = "$rank5";
                            } elseif ($rank == '5') {
                                $update = '4';
                                $newrank = "$rank6";
                            } elseif ($rank == '6') {
                                $update = '2.6';
                                $newrank = "$rank7";
                            } elseif ($rank == '7') {
                                $update = '2.35';
                                $newrank = "$rank8";
                            } elseif ($rank == '8') {
                                $update = '1.55';
                                $newrank = "$rank9";
                            } elseif ($rank == '9') {
                                $update = '0.73';
                                $newrank = "$rank10";
                            } elseif ($rank == '10') {
                                $update = '0.59';
                                $newrank = "$rank11";
                            } elseif ($rank == '11') {
                                $update = '0.48';
                                $newrank = "$rank12";
                            } elseif ($rank == '12') {
                                $update = '0.37';
                                $newrank = "$rank13";
                            } elseif ($rank == '13') {
                                $update = '0.29';
                                $newrank = "$rank14";
                            } elseif ($rank == '14') {
                                $update = '0.24';
                                $newrank = "$rank15";
                            } elseif ($rank == '15') {
                                $update = '0.2';
                                $newrank = "$rank16";
                            } elseif ($rank == '16') {
                                $update = '0.14';
                                $newrank = "$rank17";
                            } elseif ($rank == '17') {
                                $update = '0.1';
                                $newrank = "$rank18";
                            } elseif ($rank == '18') {
                                $update = '0.09';
                                $newrank = "$rank19";
                            } elseif ($rank == '19') {
                                $update = '0.09';
                                $newrank = "$rank20";
                            } elseif ($rank == '20') {
                                $update = '0.05';
                                $newrank = "$rank21";
                            } elseif ($rank == '21') {
                                $update = '0.035';
                                $newrank = "$rank22";
                            } else {
                                $update = '0';
                            }
                        }

                        if ($rank <= 22) {
                            if (($rankup + $update) > ('100')) {
                                $rank++;
                                $newrankup = $rankup + $update - 100;
                                $rankup = $newrankup;

                                if ($newrank == 'fgre') {
                                    $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                    mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$ida'");
                                } else {
                                    $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                }
                                $homeinfo = "\[b\]$usernameone\[\/b\] has been promoted to \[b\]$newrank\[\/b\]!";
                                mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','2')");
                                mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = money + $moneyrand WHERE ID = '$ida'");
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','1','$userip','$sendinfo')");
                            } else {
                                $rankup = $rankup + $update;
                                mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
                            }
                        }
                        if ($rank >= 25) {
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                        }
                        if ($openxox == 2) {
                            mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                        }
                        mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE missiontasks SET crime2 = crime2 + 1 WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                        $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                        $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                        $currentc = $consecutivecrime['nowcrimes'];
                        $currentcon = $consecutivecrime['consecutivecrimes'];
                        if ($currentc > $currentcon) {
                            mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                        }
                        $c2po = $moneyrand;
                    }
                }

                if ($rankid >= 1 AND $beg <= 0) {
                    $rand = mt_rand(0, 20);
                    $jailtime = $time + 15;
                    $times = $time + 20;
                    mysql_query("UPDATE users SET beg = '$times' WHERE ID = '$ida' AND beg <= '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    $moneyrand = mt_rand(1000, 3500) * 3 * $moneyby;
                    if ($rand == 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE loggedin SET crimesfailed = (crimesfailed + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");
                        echo $jail_outcome;include "crimes_add_right.php";die();
                    } else {
                        if ($rank == '1') {
                            $update = '101';
                            $newrank = "$rank2";
                        } elseif ($rank == '2') {
                            $update = '15';
                            $newrank = "$rank3";
                        } elseif ($rank == '3') {
                            $update = '8.9';
                            $newrank = "$rank4";
                        } elseif ($rank == '4') {
                            $update = '5.75';
                            $newrank = "$rank5";
                        } elseif ($rank == '5') {
                            $update = '2.69';
                            $newrank = "$rank6";
                        } elseif ($rank == '6') {
                            $update = '2.3';
                            $newrank = "$rank7";
                        } elseif ($rank == '7') {
                            $update = '1.7';
                            $newrank = "$rank8";
                        } elseif ($rank == '8') {
                            $update = '0.9';
                            $newrank = "$rank9";
                        } elseif ($rank == '9') {
                            $update = '0.65';
                            $newrank = "$rank10";
                        } elseif ($rank == '10') {
                            $update = '0.55';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.4';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.3';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.23';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.17';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.1';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.08';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.048';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.039';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.023';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.022';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.013';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }

                        $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                        if ($crewperk > 0 || $refreward2 > 0) {
                            if ($rank == '1') {
                                $update = '101';
                                $newrank = "$rank2";
                            } elseif ($rank == '2') {
                                $update = '101';
                                $newrank = "$rank3";
                            } elseif ($rank == '3') {
                                $update = '15';
                                $newrank = "$rank4";
                            } elseif ($rank == '4') {
                                $update = '8.9';
                                $newrank = "$rank5";
                            } elseif ($rank == '5') {
                                $update = '5.75';
                                $newrank = "$rank6";
                            } elseif ($rank == '6') {
                                $update = '2.69';
                                $newrank = "$rank7";
                            } elseif ($rank == '7') {
                                $update = '2.3';
                                $newrank = "$rank8";
                            } elseif ($rank == '8') {
                                $update = '1.7';
                                $newrank = "$rank9";
                            } elseif ($rank == '9') {
                                $update = '0.9';
                                $newrank = "$rank10";
                            } elseif ($rank == '10') {
                                $update = '0.65';
                                $newrank = "$rank11";
                            } elseif ($rank == '11') {
                                $update = '0.55';
                                $newrank = "$rank12";
                            } elseif ($rank == '12') {
                                $update = '0.4';
                                $newrank = "$rank13";
                            } elseif ($rank == '13') {
                                $update = '0.3';
                                $newrank = "$rank14";
                            } elseif ($rank == '14') {
                                $update = '0.23';
                                $newrank = "$rank15";
                            } elseif ($rank == '15') {
                                $update = '0.17';
                                $newrank = "$rank16";
                            } elseif ($rank == '16') {
                                $update = '0.1';
                                $newrank = "$rank17";
                            } elseif ($rank == '17') {
                                $update = '0.08';
                                $newrank = "$rank18";
                            } elseif ($rank == '18') {
                                $update = '0.048';
                                $newrank = "$rank19";
                            } elseif ($rank == '19') {
                                $update = '0.039';
                                $newrank = "$rank20";
                            } elseif ($rank == '20') {
                                $update = '0.023';
                                $newrank = "$rank21";
                            } elseif ($rank == '21') {
                                $update = '0.022';
                                $newrank = "$rank22";
                            } else {
                                $update = '0';
                            }
                        }

                        if ($rank <= 22) {
                            if (($rankup + $update) > ('100')) {
                                $rank++;
                                $newrankup = $rankup + $update - 100;
                                $rankup = $newrankup;
                                if ($newrank == 'ghrthetrh') {
                                    $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                    mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$ida'");
                                } else {
                                    $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                }
                                $homeinfo = "\[b\]$usernameone\[\/b\] has been promoted to \[b\]$newrank\[\/b\]!";
                                mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','2')");
                                mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = (money + $moneyrand) WHERE ID = '$ida'");
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','1','$userip','$sendinfo')");
                            } else {
                                $rankup = $rankup + $update;
                                mysql_query("UPDATE users SET money = (money + $moneyrand) WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET rankup = (rankup + $update) WHERE ID = '$ida'");
                            }
                        }
                        if ($rank >= 25) {
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                        }
                        if ($openxox == 2) {
                            mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                        }
                        mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                        mysql_query("UPDATE missiontasks SET crime1 = crime1 + 1 WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                        $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                        $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                        $currentc = $consecutivecrime['nowcrimes'];
                        $currentcon = $consecutivecrime['consecutivecrimes'];
                        if ($currentc > $currentcon) {
                            mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                        }
                        if ($mission == 1 AND $userlocation == Miami) {
                            $newmcount = $missioncount + 1;
                            mysql_query("UPDATE users SET missioncount = $newmcount WHERE ID = '$ida'");
                            if ($newmcount >= 200) {
                                $sendinfo = "[color=white][b]Mission complete![/b] [i]Check your missions page for the next mission[/i][/color]";
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$usernameone','$usernameone','1','$adress','$sendinfo')");
                                mysql_query("UPDATE users SET money = money + '10000000' WHERE id = '$ida'");
                                mysql_query("UPDATE users SET mission = '2' WHERE id = '$ida'");
                                mysql_query("UPDATE users SET missioncount = 0 WHERE ID = '$ida'");
                            }
                        }
                        $c1po = $moneyrand;
                    }
                }
                $amountearned = $c1po + $c2po + $c3po + $c4po + $c5po + $c6po + $c7po;
                $amountearnedd = number_format($amountearned);
                $showoutcome++;
                $outcome = "You committed all available crimes and earned <font color=silver>$<b>$amountearnedd</b></font>!";
				array_push($outcomes, $outcome);
			}}}

            if (isset($_POST['c7'])) {
                if ($rank < 10) {
                    echo "";
                } elseif ($stealbullets > '0') {
                    echo "";
                } else {
                    $rand = mt_rand(0, 5);
                    $jailtime = $time + 200;
                    $times = $time + 7000;
                    $bulletrand = round(mt_rand(25, 125) * $moneyby);
                    $moneyrand = mt_rand(50000, 100000) * $moneyby;

                    mysql_query("UPDATE users SET stealbullets = '$times' WHERE ID = '$ida' AND stealbullets <= '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");

                    if ($rand == 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");
                        mysql_query("UPDATE loggedin SET crimesfailed = (crimesfailed + 1) WHERE username = '$usernameone'");

                        echo $jail_outcome;include "crimes_add_right.php";die();
                    }

                    if ($rank == '10') {
                        $update = '1';
                        $newrank = "$rank11";
                    } elseif ($rank == '11') {
                        $update = '0.89';
                        $newrank = "$rank12";
                    } elseif ($rank == '12') {
                        $update = '0.82';
                        $newrank = "$rank13";
                    } elseif ($rank == '13') {
                        $update = '0.78';
                        $newrank = "$rank14";
                    } elseif ($rank == '14') {
                        $update = '0.7';
                        $newrank = "$rank15";
                    } elseif ($rank == '15') {
                        $update = '0.67';
                        $newrank = "$rank16";
                    } elseif ($rank == '16') {
                        $update = '0.635';
                        $newrank = "$rank17";
                    } elseif ($rank == '17') {
                        $update = '0.639';
                        $newrank = "$rank18";
                    } elseif ($rank == '18') {
                        $update = '0.59';
                        $newrank = "$rank19";
                    } elseif ($rank == '19') {
                        $update = '0.46';
                        $newrank = "$rank20";
                    } elseif ($rank == '20') {
                        $update = '0.34';
                        $newrank = "$rank21";
                    } elseif ($rank == '21') {
                        $update = '0.8';
                        $newrank = "$rank22";
                    } else {
                        $update = '0';
                    }

                    $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                    if ($crewperk > 0 || $refreward2 > 0) {
                        if ($rank == '10') {
                            $update = '1';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.1';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.89';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.82';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.78';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.7';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.67';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.635';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.639';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.59';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.46';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.12';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }
                    }

                    if ($rank <= 22) {
                        if (($rankup + $update) > ('100')) {
                            $rank++;
                            $newrankup = $rankup + $update - 100;
                            $rankup = $newrankup;


                            $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                            $homeinfo = "\[b\]$usernameone\[\/b\] has been promoted to \[b\]$newrank\[\/b\]!";
                            mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','2')");
                            mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000 WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                            if ($crewid != 0) {
                                mysql_query("UPDATE crews SET bullets = bullets + $bulletrand WHERE id = '$crewida'");
                            }
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
                        } else {
                            $rankup = $rankup + $update;
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                            if ($crewid != 0) {
                                mysql_query("UPDATE crews SET bullets = bullets + $bulletrand WHERE id = '$crewida'");
                            }
                            if ($openxox == 2) {
                                mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                            }
                            mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
                        }
                    }
                    if ($rank >= 25) {
                        mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                    }
                    mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                    if ($crewid != 0) {
                        mysql_query("UPDATE missiontasks SET crewbullets = (crewbullets + $bulletrand) WHERE username = '$usernameone'");
                    }
                    mysql_query("UPDATE missiontasks SET crime7 = crime7 + 1 WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                    $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                    $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                    $currentc = $consecutivecrime['nowcrimes'];
                    $currentcon = $consecutivecrime['consecutivecrimes'];
                    if ($currentc > $currentcon) {
                        mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                    }

                    $moneyr = number_format($moneyrand);
                    if ($crewida != 0) {
                        $showoutcome++;
                        $outcome = "You successfully produced <b><font color=silver>$bulletrand</font></b> bullets for your crew gaining <font color=silver>$<b>$moneyr</b></font>!";
						array_push($outcomes, $outcome);
					} else {
                        $showoutcome++;
                        $outcome = "You successfully produced and sold <b><font color=silver>$bulletrand</font></b> bullets gaining <font color=silver>$<b>$moneyr</b></font>!";
						array_push($outcomes, $outcome);
					}
                }
            }

            if (isset($_POST['c6'])) {
                if ($rank < 9) {
                    echo "";
                } elseif ($stealfrom > '0') {
                    echo "";
                } else {
                    $rand = mt_rand(0, 6);
                    $jailtime = $time + 185;
                    $times = $time + 2200;
                    mysql_query("UPDATE users SET stealfrom = '$times' WHERE ID = '$ida' AND stealfrom <= '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    $timetwo = time() - 1600;
                    $moneyrand = mt_rand(0, 2500000) * $moneyby;
                    $stealnamea = mysql_fetch_array(mysql_query("SELECT username,money,antisteal FROM users WHERE ID != '$ida' AND money > '$moneyrand' AND robot != '1' AND status = 'Alive' ORDER BY RAND() LIMIT 1"));
                    $stealname = $stealnamea['username'];
                    $stealmoney = $stealnamea['money'];
                    $anti = $stealnamea['antisteal'];

                    if ($stealmoney >= 100000000) {
                        $moneyrand = 2500000;
                        $moneyr = number_format($moneyrand);
                    } elseif ($stealmoney >= 1000000) {
                        $moneyrand = mt_rand(0, 1000000);
                        $moneyr = number_format($moneyrand);
                    } elseif ($stealmoney == 0) {
                        $moneyrand = 0;
                        $moneyr = number_format($moneyrand);
                    } elseif ($stealmoney < 1000000) {
                        $moneyrand = mt_rand(0, $stealmoney);
                        $moneyr = number_format($moneyrand);
                    } else {
                        $moneyrand = mt_rand(0, $stealmoney);
                        $moneyr = number_format($moneyrand);
                    }


                    if ($rand < 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");
                        mysql_query("UPDATE loggedin SET crimesfailed = (crimesfailed + 1) WHERE username = '$usernameone'");

                        echo $jail_outcome;include "crimes_add_right.php";die();
                    }

                    if ($rank == '9') {
                        $update = '0.95';
                        $newrank = "$rank10";
                    } elseif ($rank == '10') {
                        $update = '0.95';
                        $newrank = "$rank11";
                    } elseif ($rank == '11') {
                        $update = '0.94';
                        $newrank = "$rank12";
                    } elseif ($rank == '12') {
                        $update = '0.92';
                        $newrank = "$rank13";
                    } elseif ($rank == '13') {
                        $update = '0.88';
                        $newrank = "$rank14";
                    } elseif ($rank == '14') {
                        $update = '0.82';
                        $newrank = "$rank15";
                    } elseif ($rank == '15') {
                        $update = '0.8';
                        $newrank = "$rank16";
                    } elseif ($rank == '16') {
                        $update = '0.765';
                        $newrank = "$rank17";
                    } elseif ($rank == '17') {
                        $update = '0.689';
                        $newrank = "$rank18";
                    } elseif ($rank == '18') {
                        $update = '0.6';
                        $newrank = "$rank19";
                    } elseif ($rank == '19') {
                        $update = '0.43';
                        $newrank = "$rank20";
                    } elseif ($rank == '20') {
                        $update = '0.24';
                        $newrank = "$rank21";
                    } elseif ($rank == '21') {
                        $update = '0.1';
                        $newrank = "$rank22";
                    } else {
                        $update = '0';
                    }

                    $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                    if ($crewperk > 0 || $refreward2 > 0) {
                        if ($rank == '9') {
                            $update = '0.95';
                            $newrank = "$rank10";
                        } elseif ($rank == '10') {
                            $update = '0.95';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.95';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.94';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.92';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.88';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.82';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.8';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.765';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.689';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.6';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.43';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.8';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }
                    }

                    if ($rank <= 22) {
                        if (($rankup + $update) > ('100')) {
                            $rank++;
                            $newrankup = $rankup + $update - 100;
                            $rankup = $newrankup;
                            $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                            $homeinfo = "\[b\]$usernameone\[\/b\] has been promoted to \[b\]$newrank\[\/b\]!";
                            mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','2')");
                            mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = money + $moneyrand WHERE ID = '$ida'");
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)

VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
                        } else {
                            $rankup = $rankup + $update;
                            if ($moneyrand == '0') {
                                $moneyrand = '1';
                            }
                            mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                        }
                    }
                    if ($rank >= 25) {
                        mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                    }
                    if ($openxox == 2) {
                        mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                    }
                    mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE missiontasks SET crime6 = crime6 + 1 WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                    $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                    $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                    $currentc = $consecutivecrime['nowcrimes'];
                    $currentcon = $consecutivecrime['consecutivecrimes'];
                    if ($currentc > $currentcon) {
                        mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                    }

                    if ($anti > $time) {
                        $showoutcome++;
                        $outcome = "You successfully stole $<b><font color=silver>0</font></b> from <a href=viewprofile.php?username=$stealname>$stealname</a>!</font>";
						array_push($outcomes, $outcome);
					} else {
                        $showoutcome++;
                        $outcome = "You successfully stole <font color=silver>$<b>$moneyr</b></font> from </font><a href=viewprofile.php?username=$stealname>$stealname</a>!";
						array_push($outcomes, $outcome);
						if ($moneyrand == '1') {
                            $moneyrand = '0';
                        }
                        mysql_query("UPDATE users SET money = money - $moneyrand WHERE username = '$stealname'");
                        $sendinfo = "\[b\]$gangsterusername\[\/b\] stole $\[b\]$moneyr\[\/b\] from you!";
                        mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$stealname','$stealname','2','$userip','$sendinfo')");
                        mysql_query("INSERT INTO moneysent(username,amount,sent,ip)
VALUES ('$stealname','$moneyrand','$gangsterusername','$userip')");
                    }
                }
            }

            if (isset($_POST['c5'])) {
                if ($rank < 7) {
                    echo "";
                } elseif ($kidnap > '0') {
                    echo "";
                } else {
                    $rand = mt_rand(0, 9);
                    $jailtime = $time + 150;
                    $times = $time + 1000;
                    mysql_query("UPDATE users SET kidnap = '$times' WHERE ID = '$ida' AND kidnap <= '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    $moneyrand = mt_rand(60000, 165000) * 3 * $moneyby;

                    if ($rand == 2) {
                        mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");

                        echo $jail_outcome;include "crimes_add_right.php";die();
                    }

                    if ($rank == '7') {
                        $update = '1.4';
                        $newrank = "$rank8";
                    } elseif ($rank == '8') {
                        $update = '1.4';
                        $newrank = "$rank9";
                    } elseif ($rank == '9') {
                        $update = '1.19';
                        $newrank = "$rank10";
                    } elseif ($rank == '10') {
                        $update = '0.899';
                        $newrank = "$rank11";
                    } elseif ($rank == '11') {
                        $update = '0.88';
                        $newrank = "$rank12";
                    } elseif ($rank == '12') {
                        $update = '0.867';
                        $newrank = "$rank13";
                    } elseif ($rank == '13') {
                        $update = '0.86';
                        $newrank = "$rank14";
                    } elseif ($rank == '14') {
                        $update = '0.828';
                        $newrank = "$rank15";
                    } elseif ($rank == '15') {
                        $update = '0.8';
                        $newrank = "$rank16";
                    } elseif ($rank == '16') {
                        $update = '0.739';
                        $newrank = "$rank17";
                    } elseif ($rank == '17') {
                        $update = '0.667';
                        $newrank = "$rank18";
                    } elseif ($rank == '18') {
                        $update = '0.523';
                        $newrank = "$rank19";
                    } elseif ($rank == '19') {
                        $update = '0.467';
                        $newrank = "$rank20";
                    } elseif ($rank == '20') {
                        $update = '0.2';
                        $newrank = "$rank21";
                    } elseif ($rank == '21') {
                        $update = '0.09';
                        $newrank = "$rank22";
                    } else {
                        $update = '0';
                    }

                    $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                    if ($crewperk > 0 || $refreward2 > 0) {
                        if ($rank == '7') {
                            $update = '1.4';
                            $newrank = "$rank8";
                        } elseif ($rank == '8') {
                            $update = '1.4';
                            $newrank = "$rank9";
                        } elseif ($rank == '9') {
                            $update = '1.4';
                            $newrank = "$rank10";
                        } elseif ($rank == '10') {
                            $update = '1.19';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.899';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.88';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.867';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.86';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.828';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.8';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.739';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.667';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.523';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.467';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.2';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }
                    }

                    if ($rank <= 22) {
                        if (($rankup + $update) > ('100')) {
                            $rank++;
                            $newrankup = $rankup + $update - 100;
                            $rankup = $newrankup;
                            $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                            $homeinfo = "\[b\]$usernameone\[\/b\] has been promoted to \[b\]$newrank\[\/b\]!";
                            mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','2')");
                            mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = money + $moneyrand WHERE ID = '$ida'");
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
                        } else {
                            $rankup = $rankup + $update;
                            mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                        }
                    }

                    $moneyr = number_format($moneyrand);
                    if ($rank >= 25) {
                        mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                    }
                    if ($openxox == 2) {
                        mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                    }
                    mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE missiontasks SET crime5 = crime5 + 1 WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                    $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                    $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                    $currentc = $consecutivecrime['nowcrimes'];
                    $currentcon = $consecutivecrime['consecutivecrimes'];
                    if ($currentc > $currentcon) {
                        mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                    }

                    $showoutcome++;
                    //$outcome = "You were successful in fixing a game of poker! You won <font color=yellow>$<b>$moneyr</b></font> for the win!";
                    $outcome = "You successfully held a police officer up for ransom and made <span style='color: silver;'>$<b>$moneyr</b></span>. ";
					array_push($outcomes, $outcome);
				}
            }

            if (isset($_POST['c4'])) {
                $moneyrand = mt_rand(15000, 80000) * 3 * $moneyby;
                if ($rank < 5) {
                    echo "";
                } elseif ($rob > '0') {
                    echo "";
                } else {
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    $rand = mt_rand(0, 12);
                    $jailtime = $time + 120;
                    $times = $time + 800;
                    mysql_query("UPDATE users SET rob = '$times' WHERE ID = '$ida' AND rob <= '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }

                    if ($rand == 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");
                        mysql_query("UPDATE loggedin SET crimesfailed = (crimesfailed + 1) WHERE username = '$usernameone'");

                        echo $jail_outcome;include "crimes_add_right.php";die();
                    }

                    if ($rank == '5') {
                        $update = '3';
                        $newrank = "$rank6";
                    } elseif ($rank == '6') {
                        $update = '1.9';
                        $newrank = "$rank7";
                    } elseif ($rank == '7') {
                        $update = '1.95';
                        $newrank = "$rank8";
                    } elseif ($rank == '8') {
                        $update = '1.69';
                        $newrank = "$rank9";
                    } elseif ($rank == '9') {
                        $update = '1.21';
                        $newrank = "$rank10";
                    } elseif ($rank == '10') {
                        $update = '0.899';
                        $newrank = "$rank11";
                    } elseif ($rank == '11') {
                        $update = '0.84';
                        $newrank = "$rank12";
                    } elseif ($rank == '12') {
                        $update = '0.76';
                        $newrank = "$rank13";
                    } elseif ($rank == '13') {
                        $update = '0.69';
                        $newrank = "$rank14";
                    } elseif ($rank == '14') {
                        $update = '0.6';
                        $newrank = "$rank15";
                    } elseif ($rank == '15') {
                        $update = '0.5';
                        $newrank = "$rank16";
                    } elseif ($rank == '16') {
                        $update = '0.49';
                        $newrank = "$rank17";
                    } elseif ($rank == '17') {
                        $update = '0.41';
                        $newrank = "$rank18";
                    } elseif ($rank == '18') {
                        $update = '0.37';
                        $newrank = "$rank19";
                    } elseif ($rank == '19') {
                        $update = '0.29';
                        $newrank = "$rank20";
                    } elseif ($rank == '20') {
                        $update = '0.09';
                        $newrank = "$rank21";
                    } elseif ($rank == '21') {
                        $update = '0.0695';
                        $newrank = "$rank22";
                    } else {
                        $update = '0';
                    }

                    $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                    if ($crewperk > 0 || $refreward2 > 0) {
                        if ($rank == '5') {
                            $update = '3';
                            $newrank = "$rank6";
                        } elseif ($rank == '6') {
                            $update = '3';
                            $newrank = "$rank7";
                        } elseif ($rank == '7') {
                            $update = '1.9';
                            $newrank = "$rank8";
                        } elseif ($rank == '8') {
                            $update = '1.95';
                            $newrank = "$rank9";
                        } elseif ($rank == '9') {
                            $update = '1.69';
                            $newrank = "$rank10";
                        } elseif ($rank == '10') {
                            $update = '1.21';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.899';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.84';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.76';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.69';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.6';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.5';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.49';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.41';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.37';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.29';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.09';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }
                    }

                    if ($rank <= 22) {
                        if (($rankup + $update) > ('100')) {
                            $rank++;
                            $newrankup = $rankup + $update - 100;
                            $rankup = $newrankup;
                            $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                            $homeinfo = "\[b\]$usernameone\[\/b\] has been promoted to \[b\]$newrank\[\/b\]!";
                            mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','2')");
                            mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = money + $moneyrand WHERE ID = '$ida'");
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
                        } else {
                            $rankup = $rankup + $update;
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
                        }
                    }
                    if ($rank >= 25) {
                        mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                    }
                    if ($openxox == 2) {
                        mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                    }
                    mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE missiontasks SET crime4 = crime4 + 1 WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                    $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                    $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                    $currentc = $consecutivecrime['nowcrimes'];
                    $currentcon = $consecutivecrime['consecutivecrimes'];
                    if ($currentc > $currentcon) {
                        mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                    }

                    $moneyr = number_format($moneyrand);
                    $showoutcome++;
                    //$outcome = "You successfully kidnapped the prime minister! And received <font color=yellow>$<b>$moneyr</b></font> for his return!";
                    $outcome = "You successfully extorted some local dealers and made <span style='color: silver;'>$<b>$moneyr</b></span>. ";
					array_push($outcomes, $outcome);
				}
            }

            if (isset($_POST['c3'])) {
                if ($rank < 3) {
                    echo "";
                } elseif ($mug > '0') {
                    echo "";
                } else {
                    $rand = mt_rand(0, 15);
                    $jailtime = $time + 65;
                    $times = $time + 110;

                    mysql_query("UPDATE users SET mug = '$times' WHERE ID = '$ida' AND mug < '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    $moneyrand = mt_rand(7000, 30000) * 3 * $moneyby;

                    if ($rand == 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");

                        echo $jail_outcome;include "crimes_add_right.php";die();
                    }

                    if ($rank == '3') {
                        $update = '25.99';
                        $newrank = "$rank4";
                    } elseif ($rank == '4') {
                        $update = '9.75';
                        $newrank = "$rank5";
                    } elseif ($rank == '5') {
                        $update = '2.99';
                        $newrank = "$rank6";
                    } elseif ($rank == '6') {
                        $update = '2.75';
                        $newrank = "$rank7";
                    } elseif ($rank == '7') {
                        $update = '1.95';
                        $newrank = "$rank8";
                    } elseif ($rank == '8') {
                        $update = '0.86';
                        $newrank = "$rank9";
                    } elseif ($rank == '9') {
                        $update = '0.78';
                        $newrank = "$rank10";
                    } elseif ($rank == '10') {
                        $update = '0.699';
                        $newrank = "$rank11";
                    } elseif ($rank == '11') {
                        $update = '0.55';
                        $newrank = "$rank12";
                    } elseif ($rank == '12') {
                        $update = '0.4';
                        $newrank = "$rank13";
                    } elseif ($rank == '13') {
                        $update = '0.39';
                        $newrank = "$rank14";
                    } elseif ($rank == '14') {
                        $update = '0.36';
                        $newrank = "$rank15";
                    } elseif ($rank == '15') {
                        $update = '0.34';
                        $newrank = "$rank16";
                    } elseif ($rank == '16') {
                        $update = '0.34';
                        $newrank = "$rank17";
                    } elseif ($rank == '17') {
                        $update = '0.31';
                        $newrank = "$rank18";
                    } elseif ($rank == '18') {
                        $update = '0.23';
                        $newrank = "$rank19";
                    } elseif ($rank == '19') {
                        $update = '0.1';
                        $newrank = "$rank20";
                    } elseif ($rank == '20') {
                        $update = '0.09';
                        $newrank = "$rank21";
                    } elseif ($rank == '21') {
                        $update = '0.0795';
                        $newrank = "$rank22";
                    } else {
                        $update = '0';
                    }

                    $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                    if ($crewperk > 0 || $refreward2 > 0) {
                        if ($rank == '3') {
                            $update = '25.99';
                            $newrank = "$rank4";
                        } elseif ($rank == '4') {
                            $update = '25.99';
                            $newrank = "$rank5";
                        } elseif ($rank == '5') {
                            $update = '9.75';
                            $newrank = "$rank6";
                        } elseif ($rank == '6') {
                            $update = '2.99';
                            $newrank = "$rank7";
                        } elseif ($rank == '7') {
                            $update = '2.75';
                            $newrank = "$rank8";
                        } elseif ($rank == '8') {
                            $update = '1.95';
                            $newrank = "$rank9";
                        } elseif ($rank == '9') {
                            $update = '0.86';
                            $newrank = "$rank10";
                        } elseif ($rank == '10') {
                            $update = '0.78';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.699';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.55';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.4';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.39';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.36';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.34';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.34';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.31';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.23';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.1';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.09';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }
                    }

                    if ($rank <= 22) {
                        if (($rankup + $update) > ('100')) {
                            $rank++;
                            $newrankup = $rankup + $update - 100;
                            $rankup = $newrankup;
                            $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                            $homeinfo = "\[b\]$usernameone\[\/b\] has been promoted to \[b\]$newrank\[\/b\]!";
                            mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','2')");

                            mysql_query("UPDATE users SET rankid = (rankid + 1), rankup = '$newrankup', bullets = (bullets + 1000) ,money = (money + $moneyrand) WHERE ID = '$ida'");
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
                        } else {
                            $rankup = $rankup + $update;
                            mysql_query("UPDATE users SET money = (money + $moneyrand) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET rankup = (rankup + $update) WHERE ID = '$ida'");
                        }
                    }
                    if ($rank >= 25) {
                        mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                    }
                    if ($openxox == 2) {
                        mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                    }
                    mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE missiontasks SET crime3 = crime3 + 1 WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                    $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                    $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                    $currentc = $consecutivecrime['nowcrimes'];
                    $currentcon = $consecutivecrime['consecutivecrimes'];
                    if ($currentc > $currentcon) {
                        mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                    }

                    $moneyr = number_format($moneyrand);
                    $showoutcome++;
                    //$outcome = "You successfully robbed the bank! And got away with <font color=yellow>$<b>$moneyr</b></font>!";
                    $outcome = "You successfully stole from a supermarket and got away with goods worth <span style='color: silver;'>$<b>$moneyr</b></span>. ";
					array_push($outcomes, $outcome);
                }
            }

            if (isset($_POST['c2'])) {
                if ($rank < 1) {
                    echo "";
                } elseif ($hustle > '0') {
                    echo "";
                } else {
                    $rand = mt_rand(0, 16);
                    $jailtime = $time + 20;
                    $times = $time + 40;

                    mysql_query("UPDATE users SET hustle = '$times' WHERE ID = '$ida' AND hustle <= '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    $moneyrand = mt_rand(3000, 13000) * 3 * $moneyby;

                    if ($rand == 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");
                        mysql_query("UPDATE loggedin SET crimesfailed = (crimesfailed + 1) WHERE username = '$usernameone'");

                        echo $jail_outcome;include "crimes_add_right.php";die();
                    }

                    if ($rank == '2') {
                        $update = '12';
                        $newrank = "$rank3";
                    } elseif ($rank == '3') {
                        $update = '8';
                        $newrank = "$rank4";
                    } elseif ($rank == '4') {
                        $update = '4';
                        $newrank = "$rank5";
                    } elseif ($rank == '5') {
                        $update = '2.6';
                        $newrank = "$rank6";
                    } elseif ($rank == '6') {
                        $update = '2.35';
                        $newrank = "$rank7";
                    } elseif ($rank == '7') {
                        $update = '1.55';
                        $newrank = "$rank8";
                    } elseif ($rank == '8') {
                        $update = '0.73';
                        $newrank = "$rank9";
                    } elseif ($rank == '9') {
                        $update = '0.59';
                        $newrank = "$rank10";
                    } elseif ($rank == '10') {
                        $update = '0.48';
                        $newrank = "$rank11";
                    } elseif ($rank == '11') {
                        $update = '0.37';
                        $newrank = "$rank12";
                    } elseif ($rank == '12') {
                        $update = '0.29';
                        $newrank = "$rank13";
                    } elseif ($rank == '13') {
                        $update = '0.24';
                        $newrank = "$rank14";
                    } elseif ($rank == '14') {
                        $update = '0.2';
                        $newrank = "$rank15";
                    } elseif ($rank == '15') {
                        $update = '0.14';
                        $newrank = "$rank16";
                    } elseif ($rank == '16') {
                        $update = '0.1';
                        $newrank = "$rank17";
                    } elseif ($rank == '17') {
                        $update = '0.09';
                        $newrank = "$rank18";
                    } elseif ($rank == '18') {
                        $update = '0.09';
                        $newrank = "$rank19";
                    } elseif ($rank == '19') {
                        $update = '0.05';
                        $newrank = "$rank20";
                    } elseif ($rank == '20') {
                        $update = '0.035';
                        $newrank = "$rank21";
                    } elseif ($rank == '21') {
                        $update = '0.015';
                        $newrank = "$rank22";
                    } else {
                        $update = '0';
                    }

                    $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                    if ($crewperk > 0 || $refreward2 > 0) {
                        if ($rank == '2') {
                            $update = '12';
                            $newrank = "$rank3";
                        } elseif ($rank == '3') {
                            $update = '12';
                            $newrank = "$rank4";
                        } elseif ($rank == '4') {
                            $update = '8';
                            $newrank = "$rank5";
                        } elseif ($rank == '5') {
                            $update = '4';
                            $newrank = "$rank6";
                        } elseif ($rank == '6') {
                            $update = '2.6';
                            $newrank = "$rank7";
                        } elseif ($rank == '7') {
                            $update = '2.35';
                            $newrank = "$rank8";
                        } elseif ($rank == '8') {
                            $update = '1.55';
                            $newrank = "$rank9";
                        } elseif ($rank == '9') {
                            $update = '0.73';
                            $newrank = "$rank10";
                        } elseif ($rank == '10') {
                            $update = '0.59';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.48';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.37';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.29';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.24';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.2';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.14';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.1';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.09';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.09';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.05';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.035';
                            $newrank = "$rank22";
                        } else {
                            $update = '0';
                        }
                    }

                    if ($rank <= 22) {
                        if (($rankup + $update) > ('100')) {
                            $rank++;
                            $newrankup = $rankup + $update - 100;
                            $rankup = $newrankup;

                            if ($newrank == 'fgre') {
                                $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$ida'");
                            } else {
                                $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                            }
                            $homeinfo = "\[b\]$usernameone\[\/b\] has been promoted to \[b\]$newrank\[\/b\]!";
                            mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','2')");
                            mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = money + $moneyrand WHERE ID = '$ida'");
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','1','$userip','$sendinfo')");
                        } else {
                            $rankup = $rankup + $update;
                            mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
                        }
                    }
                    if ($rank >= 25) {
                        mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                    }
                    if ($openxox == 2) {
                        mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                    }
                    mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE missiontasks SET crime2 = crime2 + 1 WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                    $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                    $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                    $currentc = $consecutivecrime['nowcrimes'];
                    $currentcon = $consecutivecrime['consecutivecrimes'];
                    if ($currentc > $currentcon) {
                        mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                    }

                    $moneyr = number_format($moneyrand);
                    $showoutcome++;
                    //$outcome = "You successfully mugged the dealer! And got away with <font color=yellow>$<b>$moneyr</b></font>!";
                    $outcome = "You successfully pick-pocketed in the town centre and stole goods worth <span style='color: silver;'>$<b>$moneyr</b></span>. ";
					array_push($outcomes, $outcome);
                }
            }

            if (isset($_POST['c1'])) {
                if ($rank < 1) {
                    echo "";
                } elseif ($beg > '0') {
                    echo "";
                } else {
                    $rand = mt_rand(0, 20);
                    $jailtime = $time + 15;
                    $times = $time + 20;
                    mysql_query("UPDATE users SET beg = '$times' WHERE ID = '$ida' AND beg <= '$time'");
                    if (mysql_affected_rows() == 0) {
                        die(' ');
                    }
                    mysql_query("UPDATE users SET crimes = (crimes + 1) WHERE ID = '$ida'");
                    $moneyrand = mt_rand(1000, 3500) * 3 * $moneyby;

                    if ($rand == 1) {
                        mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");
                        mysql_query("UPDATE users SET nowcrimes = 0 WHERE ID = '$ida'");
                        mysql_query("UPDATE loggedin SET crimesfailed = (crimesfailed + 1) WHERE username = '$usernameone'");

                        echo $jail_outcome;include "crimes_add_right.php";die();
                    }

                    if ($rank == '1') {
                        $update = '101';
                        $newrank = "$rank2";
                    } elseif ($rank == '2') {
                        $update = '15';
                        $newrank = "$rank3";
                    } elseif ($rank == '3') {
                        $update = '8.9';
                        $newrank = "$rank4";
                    } elseif ($rank == '4') {
                        $update = '5.75';
                        $newrank = "$rank5";
                    } elseif ($rank == '5') {
                        $update = '2.69';
                        $newrank = "$rank6";
                    } elseif ($rank == '6') {
                        $update = '2.3';
                        $newrank = "$rank7";
                    } elseif ($rank == '7') {
                        $update = '1.7';
                        $newrank = "$rank8";
                    } elseif ($rank == '8') {
                        $update = '0.9';
                        $newrank = "$rank9";
                    } elseif ($rank == '9') {
                        $update = '0.65';
                        $newrank = "$rank10";
                    } elseif ($rank == '10') {
                        $update = '0.55';
                        $newrank = "$rank11";
                    } elseif ($rank == '11') {
                        $update = '0.4';
                        $newrank = "$rank12";
                    } elseif ($rank == '12') {
                        $update = '0.3';
                        $newrank = "$rank13";
                    } elseif ($rank == '13') {
                        $update = '0.23';
                        $newrank = "$rank14";
                    } elseif ($rank == '14') {
                        $update = '0.17';
                        $newrank = "$rank15";
                    } elseif ($rank == '15') {
                        $update = '0.1';
                        $newrank = "$rank16";
                    } elseif ($rank == '16') {
                        $update = '0.08';
                        $newrank = "$rank17";
                    } elseif ($rank == '17') {
                        $update = '0.048';
                        $newrank = "$rank18";
                    } elseif ($rank == '18') {
                        $update = '0.039';
                        $newrank = "$rank19";
                    } elseif ($rank == '19') {
                        $update = '0.023';
                        $newrank = "$rank20";
                    } elseif ($rank == '20') {
                        $update = '0.022';
                        $newrank = "$rank21";
                    } elseif ($rank == '21') {
                        $update = '0.013';
                        $newrank = "$rank22";
                    } else {
                        $update = '0';
                    }

                    $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '1'"));
                    if ($crewperk > 0 || $refreward2 > 0) {
                        if ($rank == '1') {
                            $update = '101';
                            $newrank = "$rank2";
                        } elseif ($rank == '2') {
                            $update = '101';
                            $newrank = "$rank3";
                        } elseif ($rank == '3') {
                            $update = '15';
                            $newrank = "$rank4";
                        } elseif ($rank == '4') {
                            $update = '8.9';
                            $newrank = "$rank5";
                        } elseif ($rank == '5') {
                            $update = '5.75';
                            $newrank = "$rank6";
                        } elseif ($rank == '6') {
                            $update = '2.69';
                            $newrank = "$rank7";
                        } elseif ($rank == '7') {
                            $update = '2.3';
                            $newrank = "$rank8";
                        } elseif ($rank == '8') {
                            $update = '1.7';
                            $newrank = "$rank9";
                        } elseif ($rank == '9') {
                            $update = '0.9';
                            $newrank = "$rank10";
                        } elseif ($rank == '10') {
                            $update = '0.65';
                            $newrank = "$rank11";
                        } elseif ($rank == '11') {
                            $update = '0.55';
                            $newrank = "$rank12";
                        } elseif ($rank == '12') {
                            $update = '0.4';
                            $newrank = "$rank13";
                        } elseif ($rank == '13') {
                            $update = '0.3';
                            $newrank = "$rank14";
                        } elseif ($rank == '14') {
                            $update = '0.23';
                            $newrank = "$rank15";
                        } elseif ($rank == '15') {
                            $update = '0.17';
                            $newrank = "$rank16";
                        } elseif ($rank == '16') {
                            $update = '0.1';
                            $newrank = "$rank17";
                        } elseif ($rank == '17') {
                            $update = '0.08';
                            $newrank = "$rank18";
                        } elseif ($rank == '18') {
                            $update = '0.048';
                            $newrank = "$rank19";
                        } elseif ($rank == '19') {
                            $update = '0.039';
                            $newrank = "$rank20";
                        } elseif ($rank == '20') {
                            $update = '0.023';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.022';
                            $newrank = "<font color=#FFC753>$rank22</font>";
                        } else {
                            $update = '0';
                        }
                    }

                    if ($rank <= 22) {
                        if (($rankup + $update) > ('100')) {
                            $rank++;
                            $newrankup = $rankup + $update - 100;
                            $rankup = $newrankup;
                            if ($newrank == 'ghrthetrh') {
                                $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$ida'");
                            } else {
                                $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                            }
                            $homeinfo = "ranked to \[b\]$newrank\[\/b\]!";
                            mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','1')");
                            mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = (money + $moneyrand) WHERE ID = '$ida'");
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','1','$userip','$sendinfo')");
                        } else {
                            $rankup = $rankup + $update;
                            mysql_query("UPDATE users SET money = (money + $moneyrand) WHERE ID = '$ida'");
                            mysql_query("UPDATE users SET rankup = (rankup + $update) WHERE ID = '$ida'");
                        }
                    }
                    if ($rank >= 25) {
                        mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
                    }
                    if ($openxox == 2) {
                        mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                    }
                    mysql_query("UPDATE users SET moneycrimes = (moneycrimes + $moneyrand) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET donecrimes = (donecrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET nowcrimes = (nowcrimes + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE missiontasks SET crime1 = crime1 + 1 WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesdone = (crimesdone + 1) WHERE username = '$usernameone'");
                    mysql_query("UPDATE loggedin SET crimesearned = (crimesearned + $moneyrand) WHERE username = '$usernameone'");
                    $consecutivecrimee = mysql_query("SELECT consecutivecrimes,nowcrimes FROM users WHERE id = '$ida'");
                    $consecutivecrime = mysql_fetch_array($consecutivecrimee);
                    $currentc = $consecutivecrime['nowcrimes'];
                    $currentcon = $consecutivecrime['consecutivecrimes'];
                    if ($currentc > $currentcon) {
                        mysql_query("UPDATE users SET consecutivecrimes = $currentc WHERE ID = '$ida'");
                    }
                    if ($mission == 1 AND $userlocation == Miami) {
                        $newmcount = $missioncount + 1;
                        mysql_query("UPDATE users SET missioncount = $newmcount WHERE ID = '$ida'");
                        if ($newmcount >= 200) {
                            $sendinfo = "[color=white][b]Mission complete![/b] [i]Check your missions page for the next mission[/i][/color]";
                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$usernameone','$usernameone','1','$adress','$sendinfo')");
                            mysql_query("UPDATE users SET money = money + '10000000' WHERE id = '$ida'");
                            mysql_query("UPDATE users SET mission = '2' WHERE id = '$ida'");
                            mysql_query("UPDATE users SET missioncount = 0 WHERE ID = '$ida'");
                        }
                    }

                    $moneyr = number_format($moneyrand);
                    $showoutcome++;
                    //$outcome = "You successfully scared the family! And made <font color=yellow>$<b>$moneyr</b></font> for the threat!";
                    $outcome = "You successfully begged on the streets and made <span style='color: silver;'>$<b>$moneyr</b></span>.";
					array_push($outcomes, $outcome);
                }
            }

            $userstatss = mysql_query("SELECT * FROM users WHERE id = '$userid'");
            $userstat = mysql_fetch_array($userstatss);
            $time1 = $userstat['crime1'];
            $time2 = $userstat['crime2'];
            $time3 = $userstat['crime3'];
            $time4 = $userstat['crime4'];
            $time5 = $userstat['crime5'];
            $time6 = $userstat['crime6'];
            $time7 = $userstat['crime7'];
            $time8 = $userstat['crime8'];
            $time9 = $userstat['crime9'];
            $time10 = $userstat['crime10'];

            $statustest = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
            $getuserinfoarray = mysql_fetch_array($statustest);

            $kidnapraw = $getuserinfoarray['kidnap'];
            $mugraw = $getuserinfoarray['mug'];
            $stealfromraw = $getuserinfoarray['stealfrom'];
            $stealbulletsraw = $getuserinfoarray['stealbullets'];
            $robraw = $getuserinfoarray['rob'];
            $hustleraw = $getuserinfoarray['hustle'];
            $begraw = $getuserinfoarray['beg'];

            $kidnap = $kidnapraw - $time;
            $mug = $mugraw - $time;
            $stealfrom = $stealfromraw - $time;
            $stealbullets = $stealbulletsraw - $time;
            $rob = $robraw - $time;
            $hustle = $hustleraw - $time;
            $beg = $begraw - $time;
            ?>
            <? /*if ($showoutcome >= 1) { ?>
                <span><? echo $outcome; ?></span>
            <? }*/ ?>
			<? if ($showoutcome >= 1) { ?>
				<?php foreach ($outcomes as $outcome): ?>
				<table class="menuTable curve1px" style="margin-bottom: 1px;" cellspacing="0" cellpadding="0">
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
									<div class="menuHeader noTop" style="text-align: left; padding-left: 5px; padding-top: 6px;">
										<span style="color: #FFC753;">Success</span>
									</div>
									<div style="padding: 6px; padding-top: 7px; color: #fefefe;">
										<? echo $outcome; ?>
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
				<?php endforeach; ?>
			<? } ?>
			
            <script>
				function crimesCountdown(load){
					if(load){
						var table = document.getElementById('crimes');
						var inmates = table.getElementsByTagName('span');
						for(var i = 0; i < inmates.length; i++){
							if(inmates[i].id == 'countdown'){
								var timeleft = parseInt(inmates[i].innerHTML);
								if(timeleft >= 0){
									if(timeleft == 0){
										inmates[i].innerHTML = '<b>Available</b>';
										inmates[i].style.color = 'gold';
										var checkbox_id = inmates[i].getAttribute("checkbox_id");
										document.getElementById(checkbox_id).name = checkbox_id;
									} else {
										var newtimeleft = timeleft - 1;
										inmates[i].innerHTML = newtimeleft;
									}
								}
							}
						}
					}
					setTimeout("crimesCountdown(true)",1000);
				}
				window.onload = crimesCountdown;
            </script>
			
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
                                Crimes
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <? $showstats = mysql_num_rows(mysql_query("SELECT * FROM loggedin WHERE username = '$usernameone' AND crimesdone > '0' || username = '$usernameone' AND crimesfailed > '0'"));
                                    ?>
                                        <form id="crimes" method="post">

                                            <div class="miniMenu shadowTest curve3px" id="crimesTable" style="vertical-align: top; margin-left: 2px; margin-bottom: 8px; display: inline-block; width: 75%; max-height: 900px; min-width: 350px; max-width: 660px;">
                                                <div class="miniMenuHeader noTop" style="color: white;">
                                                    Offences
                                                </div>
                                                <div class="miniMain" style="max-height: 900px;">
                                                    <div class="regDivHeader crime" style="border-left: 0; width: 60%;">Action</div><div class="regDivHeader crime" style="width: 20%;">Timer</div><div class="regDivHeader crime" style="width: 20%;">Risk</div>
                                                </div>
                                                <div class="row relative">
                                                    <? if ($rank < "10") { ?>
                                                        <div class="regDivStatic  noTop  crime" style="width: 60%;">
                                                            <label for="ref8"><span
                                                                        style="display: block; cursor: pointer;"><input
                                                                            class="crime_check  unavailable"
                                                                            id="ref8" value="8" name="crime[]"
                                                                            type="checkbox">Produce bullets for your crew</span></label>
                                                        </div>
                                                        <div class="regDivStatic  noTop  crime" style="width: 20%;">
                                                                <span class="crimeTimer" data-counter="-1"><span
                                                                            style="color: #888888;">Not Available</span></span>
                                                        </div>
														<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">Not Available</span></div>
                                                        <div class="unavailableCrime"></div>
                                                    <? } else {
                                                        if ($stealbullets > 0) { ?>
                                                            <div class="regDivStatic  noTop  crime"
                                                                 style="width: 60%;"><label for="ref8"><span
                                                                            style="display: block; cursor: pointer;"><input
                                                                                class="crime_check  unavailable"
                                                                                id="c7" value="7" name="crime[]"
                                                                                type="checkbox">Produce bullets for your crew</span></label>
                                                            </div>
                                                            <div class="regDivStatic  noTop  crime"
                                                                 style="width: 20%;"><span 
																			checkbox_id="c7"
                                                                            style="color: #999999;" id="countdown"><? echo $stealbullets ?></span>
                                                            </div>
															<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">16%</span></div>
                                                            <!--<div class="unavailableCrime"></div>-->
                                                        <? } else {
                                                            ?>
                                                            <div class="regDivStatic  noTop  crime"
                                                                 style="width: 60%;"><label for="ref8"><span
                                                                            style="display: block; cursor: pointer;"><input
                                                                                class="crime_check  js-crime-checkbox"
                                                                                id="c7" value="7" name="c7"
                                                                                type="checkbox">Produce bullets for your crew</span></label>
                                                            </div>
                                                            <div class="regDivStatic  noTop  crime"
                                                                 style="width: 20%;"><span class="crimeTimer"
                                                                                           data-counter="-1"><span
                                                                            style="color: gold;"><b>Available</b></span></span>
                                                            </div>
															<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">16%</span></div>
                                                            <?
                                                        }
                                                    } ?>
                                                </div>
                                                <div class="row relative">
                                                    <? if ($rank < "9") { ?>
                                                        <div class="regDivStatic  crime" style="width: 60%;">
                                                            <label for="ref8"><span
                                                                        style="display: block; cursor: pointer;"><input
                                                                            class="crime_check  unavailable"
                                                                            id="ref6" value="6" name="crime[]"
                                                                            type="checkbox">Steal from another player</span></label>
                                                        </div>
                                                        <div class="regDivStatic  noTop  crime" style="width: 20%;">
                                                                <span class="crimeTimer" data-counter="-1"><span
                                                                            style="color: #888888;">Not Available</span></span>
                                                        </div>
														<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">Not Available</span></div>
                                                        <div class="unavailableCrime"></div>
                                                    <? } else {
                                                        if ($stealfrom > 0) { ?>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 60%;"><label for="ref8"><span
                                                                            style="display: block; cursor: pointer;"><input
                                                                                class="crime_check  unavailable"
                                                                                id="c6" value="6" name="crime[]"
                                                                                type="checkbox">Steal from another player</span></label>
                                                            </div>
                                                            <div class="regDivStatic  crime"
                                                                 style="width: 20%;"><span
																		checkbox_id="c6"
                                                                        style="color: #999999;" id="countdown"><? echo $stealfrom ?></span>
                                                            </div>
															<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">14%</span></div>
                                                            <!--<div class="unavailableCrime"></div>-->
                                                        <? } else {
                                                            ?>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 60%;"><label for="ref8"><span
                                                                            style="display: block; cursor: pointer;"><input
                                                                                class="crime_check  js-crime-checkbox"
                                                                                id="c6" value="6" name="c6"
                                                                                type="checkbox">Steal from another player</span></label>
                                                            </div>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 20%;"><span class="crimeTimer"
                                                                                           data-counter="-1"><span
                                                                            style="color: gold;"><b>Available</b></span></span>
                                                            </div>
															<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">14%</span></div>
                                                            <?
                                                        }
                                                    } ?>
                                                </div>
                                                <div class="row relative">
                                                    <? if ($rank < "7") { ?>
                                                        <div class="regDivStatic crime" style="width: 60%;">
                                                            <label for="ref8"><span
                                                                        style="display: block; cursor: pointer;"><input
                                                                            class="crime_check  unavailable"
                                                                            id="ref5" value="5" name="crime[]"
                                                                            type="checkbox">Kidnap a police officer for ransom</span></label>
                                                        </div>
                                                        <div class="regDivStatic  noTop  crime" style="width: 40%;">
                                                                <span class="crimeTimer" data-counter="-1"><span
                                                                            style="color: #888888;">Not Available</span></span>
                                                        </div>
														<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">Not Available</span></div>
                                                        <div class="unavailableCrime"></div>
                                                    <? } else {
                                                        if ($kidnap > 0) { ?>
                                                            <div class="regDivStatic  crime"
                                                                 style="width: 60%;"><label for="ref8"><span
                                                                            style="display: block; cursor: pointer;"><input
                                                                                class="crime_check  unavailable"
                                                                                id="c5" value="5" name="crime[]"
                                                                                type="checkbox">Kidnap a police officer for ransom</span></label>
                                                            </div>
                                                            <div class="regDivStatic  crime"
                                                                 style="width: 20%;"><span
																		checkbox_id="c5"
                                                                        style="color: #999999;" id="countdown"><? echo $kidnap ?></span>
                                                            </div>
															<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">10%</span></div>
                                                            <!--<div class="unavailableCrime"></div>-->
                                                        <? } else {
                                                            ?>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 60%;"><label for="ref8"><span
                                                                            style="display: block; cursor: pointer;"><input
                                                                                class="crime_check  js-crime-checkbox"
                                                                                id="c5" value="5" name="c5"
                                                                                type="checkbox">Kidnap a police officer for ransom</span></label>
                                                            </div>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 20%;"><span class="crimeTimer"
                                                                                           data-counter="-1"><span
                                                                            style="color: gold;"><b>Available</b></span></span>
                                                            </div>
															<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">10%</span></div>
                                                            <?
                                                        }
                                                    } ?>
                                                </div>
                                                <div class="row relative">
                                                    <? if ($rank < "5") { ?>
                                                        <div class="regDivStatic crime" style="width: 60%;">
                                                            <label for="ref8"><span
                                                                        style="display: block; cursor: pointer;"><input
                                                                            class="crime_check  unavailable"
                                                                            id="ref5" value="4" name="crime[]"
                                                                            type="checkbox">Extort local dealers</span></label>
                                                        </div>
                                                        <div class="regDivStatic crime" style="width: 40%;">
                                                                <span class="crimeTimer" data-counter="-1"><span
                                                                            style="color: #888888;">Not Available</span></span>
                                                        </div>
														<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">Not Available</span></div>
                                                        <div class="unavailableCrime"></div>
                                                    <? } else {
                                                        if ($rob > 0) { ?>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 60%;"><label for="ref8"><span
                                                                            style="display: block; cursor: pointer;"><input
                                                                                class="crime_check  unavailable"
                                                                                id="c4" value="4" name="crime[]"
                                                                                type="checkbox">Extort local dealers</span></label>
                                                            </div>
                                                            <div class="regDivStatic  crime"
                                                                 style="width: 20%;"><span
																		checkbox_id="c4"
                                                                        style="color: #999999;" id="countdown"><? echo $rob ?></span>
                                                            </div>
															<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">7%</span></div>
                                                            <!--<div class="unavailableCrime"></div>-->
                                                        <? } else {
                                                            ?>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 60%;"><label for="ref8"><span
                                                                            style="display: block; cursor: pointer;"><input
                                                                                class="crime_check  js-crime-checkbox"
                                                                                id="c4" value="4" name="c4"
                                                                                type="checkbox">Extort local dealers</span></label>
                                                            </div>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 20%;"><span class="crimeTimer"
                                                                                           data-counter="-1"><span
                                                                            style="color: gold;"><b>Available</b></span></span>
                                                            </div>
															<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">7%</span></div>
                                                            <?
                                                        }
                                                    } ?>
                                                </div>
                                                <div class="row relative">
                                                    <? if ($rank < "3") { ?>
                                                        <div class="regDivStatic crime" style="width: 60%;">
                                                            <label for="ref8"><span
                                                                        style="display: block; cursor: pointer;"><input
                                                                            class="crime_check  unavailable"
                                                                            id="ref5" value="3" name="crime[]"
                                                                            type="checkbox">Steal from a supermarket</span></label>
                                                        </div>
                                                        <div class="regDivStatic crime" style="width: 40%;">
                                                                <span class="crimeTimer" data-counter="-1"><span
                                                                            style="color: #888888;">Not Available</span></span>
                                                        </div>
														<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">Not Available</span></div>
                                                        <div class="unavailableCrime"></div>
                                                    <? } else {
                                                        if ($mug > 0) { ?>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 60%;"><label for="ref8"><span
                                                                            style="display: block; cursor: pointer;"><input
                                                                                class="crime_check  unavailable"
                                                                                id="c3" value="3" name="crime[]"
                                                                                type="checkbox">Steal from a supermarket</span></label>
                                                            </div>
                                                            <div class="regDivStatic  crime"
                                                                 style="width: 20%;"><span
																		checkbox_id="c3"
                                                                        style="color: #999999;" id="countdown"><? echo $mug ?></span>
                                                            </div>
															<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">6%</span></div>
                                                            <!--<div class="unavailableCrime"></div>-->
                                                        <? } else {
                                                            ?>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 60%;"><label for="ref8"><span
                                                                            style="display: block; cursor: pointer;"><input
                                                                                class="crime_check  js-crime-checkbox"
                                                                                id="c3" value="3" name="c3"
                                                                                type="checkbox">Steal from a supermarket</span></label>
                                                            </div>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 20%;"><span class="crimeTimer"
                                                                                           data-counter="-1"><span
                                                                            style="color: gold;"><b>Available</b></span></span>
                                                            </div>
															<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">6%</span></div>
                                                            <?
                                                        }
                                                    } ?>
                                                </div>
                                                <div class="row relative">
                                                    <? if ($rank < "1") { ?>
                                                        <div class="regDivStatic crime" style="width: 60%;">
                                                            <label for="ref8"><span
                                                                        style="display: block; cursor: pointer;"><input
                                                                            class="crime_check  unavailable"
                                                                            id="ref5" value="2" name="crime[]"
                                                                            type="checkbox">Pickpocket in the town centre</span></label>
                                                        </div>
                                                        <div class="regDivStatic crime" style="width: 40%;">
                                                                <span class="crimeTimer" data-counter="-1"><span
                                                                            style="color: #888888;">Not Available</span></span>
                                                        </div>
														<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">Not Available</span></div>
                                                        <div class="unavailableCrime"></div>
                                                    <? } else {
                                                        if ($hustle > 0) { ?>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 60%;"><label for="ref8"><span
                                                                            style="display: block; cursor: pointer;"><input
                                                                                class="crime_check  unavailable"
                                                                                id="c2" value="2" name="crime[]"
                                                                                type="checkbox">Pickpocket in the town centre</span></label>
                                                            </div>
                                                            <div class="regDivStatic  crime"
                                                                 style="width: 20%;"><span
																		checkbox_id="c2"
                                                                        style="color: #999999;" id="countdown"><? echo $hustle ?></span>
                                                            </div>
															<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">5%</span></div>
                                                            <!--<div class="unavailableCrime"></div>-->
                                                        <? } else {
                                                            ?>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 60%;"><label for="ref8"><span
                                                                            style="display: block; cursor: pointer;"><input
                                                                                class="crime_check  js-crime-checkbox"
                                                                                id="c2" value="2" name="c2"
                                                                                type="checkbox">Pickpocket in the town centre</span></label>
                                                            </div>
                                                            <div class="regDivStatic crime"
                                                                 style="width: 20%;"><span class="crimeTimer"
                                                                                           data-counter="-1"><span
                                                                            style="color: gold;"><b>Available</b></span></span>
                                                            </div>
															<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">5%</span></div>
                                                            <?
                                                        }
                                                    } ?>
                                                </div>
                                                <div class="row relative">
                                                    <? if ($beg > 0) { ?>
                                                        <div class="regDivStatic crime" style="width: 60%;">
                                                            <label for="ref8"><span
                                                                        style="display: block; cursor: pointer;"><input
                                                                            class="crime_check  unavailable" id="c1"
                                                                            value="1" name="crime[]"
                                                                            type="checkbox">Beg on the streets</span></label>
                                                        </div>
                                                        <div class="regDivStatic  crime"
                                                             style="width: 20%;"><span
																	checkbox_id="c1"
                                                                    style="color: #999999;" id="countdown"><? echo $beg ?></span>
                                                        </div>
														<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">4%</span></div>
                                                        <!--<div class="unavailableCrime"></div>-->
                                                    <? } else { ?>
                                                        <div class="regDivStatic crime" style="width: 60%;">
                                                            <label for="ref8"><span
                                                                        style="display: block; cursor: pointer;"><input
                                                                            class="crime_check  js-crime-checkbox"
                                                                            id="c1" value="1" name="c1"
                                                                            type="checkbox">Beg on the streets</span></label>
                                                        </div>
                                                        <div class="regDivStatic crime" style="width: 20%;">
                                                                <span class="crimeTimer" data-counter="-1"><span
                                                                            style="color: gold;"><b>Available</b></span></span>
                                                        </div>
														<div class="regDivStatic  crime" style="width: 20%;"><span style="color: #bbbbbb;">4%</span></div>
                                                    <? } ?>
                                                </div>
                                            </div>

                                            <div class="break" style="padding-top: 7px;">
                                                <span id="check_uncheck_crime" class="js-check-toggle" style="cursor: pointer;"
                                                   data-class-to-check="js-crime-checkbox">Check / Uncheck All</span>
                                                <span class="miniSep">-</span>
                                                <input class="textarea curve3px"
                                                       style="padding-left: 6px; padding-right: 6px; margin-bottom: 12px;"
                                                       value="Commit Selected!" type="submit">
                                                
                                                <script>
                                                	$(document).ready(function() {
                                                		$("#check_uncheck_crime").on("click",checkToggle);
                                                	});
                                                	
                                                </script>
												
										<?php if ($showcaptcha == true): ?>
										<div style="margin-top: 10px; margin-bottom: 10px;">
											<label for="captcha_txt"><img src="captcha_generate.php" style="height: 24px;"></label>
											<input class="textarea" value="" id="captcha_txt" name="captcha" placeholder="Enter Code..." type="text">
											<input type="hidden" name="captcha_need" value="1">
											<!--<input type="submit" value="Submit" class="textarea" style="display: inline-block" name="captcha_btn">-->
										</div>
										<?php endif; ?>

                                                <div class="break" style="padding-top: 15px;">
                                                    <div class="spacer"></div>
                                                    <div class="break" style="padding-top: 4px;">
                                                        <?
                                                        $totalcrimes = number_format($getuserinfoarray['crimes']);
                                                        $totalcrimess = $getuserinfoarray['crimes'];
                                                        $concrimes = number_format($getuserinfoarray['nowcrimes']);
                                                        $crimessuccess = $getuserinfoarray['donecrimes'];
                                                        $crimesmoney = $getuserinfoarray['moneycrimes'];
                                                        if ($totalcrimess > 0) {
                                                            $crimesrating = floor($crimessuccess / $totalcrimess * 100);
                                                        } else {
                                                            $crimesrating = 0;
                                                        }
                                                        ?>
                                                        <div style="text-align: right; padding: 5px; padding-right: 6px; padding-top: 1px;">
                                                            <span style="float: left;">Crime Profit: <b
                                                                        style="color: silver;">$<? echo number_format($crimesmoney); ?></b>
                                                                <span class="miniSep">-</span> Crimes Committed: <b
                                                                        style="color: silver;"><? echo $totalcrimes; ?></b>
                                                                <span class="miniSep">-</span> Success Rate Crimes: <b
                                                                        style="color: silver;"><? echo $crimesrating; ?>
                                                                    %</b>
                                                                <span class="miniSep">-</span> Current Consecutive Crimes: <b
                                                                        style="color: silver;"><? echo $concrimes; ?></b>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
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

