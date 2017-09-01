<? include 'included.php'; session_start();

$reward = $statustesttwo['reward'];
$money = $statustesttwo['money'];
$userlocation = $statustesttwo['location'];
$time = time();
$jailtimee = $time + 320;

if ($reward > $money) {
    mysql_query("UPDATE users SET reward = '0' WHERE ID = '$ida'");
    mysql_query("UPDATE jail SET reward = '0' WHERE username = '$usernameone'");
}


$tyn = rand(0, 10);
if ($tyn == '3') {
    $deletetopicssql = mysql_query("SELECT id FROM forumposts WHERE type = 'jail' ORDER BY id DESC LIMIT 10,50");
    while ($deletetopics = mysql_fetch_array($deletetopicssql)) {
        $dtopicid = $deletetopics['id'];
        $deleted = mysql_query("DELETE FROM forumposts WHERE id = '$dtopicid'");
    }
}

$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$time = time();
$sessionidraw = $_COOKIE['PHPSESSID'];
$setrewarda = mysql_real_escape_string($_POST['reward']);
$getforma = $_GET['deletejail'];
$vera = mysql_real_escape_string($_POST['ver']);
$verpost = preg_replace($saturate, "", $vera);
$poster = $_GET['deletepost'];
$bustbutton = ceil($time / 50);
$bustraw = mysql_real_escape_string($_POST["$bustbutton"]);
$sessionid = preg_replace($saturate, "", $sessionidraw);
$setreward = preg_replace($allowed, "", $setrewarda);
$deletepost = preg_replace($allowed, "", $poster);
$getform = preg_replace($allowed, "", $getforma);
$bust = preg_replace($allowed, "", $bustraw);
$userip = $_SERVER[REMOTE_ADDR];

/*$vericheck = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$usernameone' AND ver1 != '0'"));
if ($vericheck > 0) {
    die(include 'doverifjail.php');
}*/

/*if (isset($_POST['dobust'])) {
    $verificationcode = rand(1, 25);
    if ($verificationcode == '25') {
        $verifarray = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        shuffle($verifarray);
        $verif1 = $verifarray[0];
        $verif2 = $verifarray[1];
        $verif3 = $verifarray[2];
        mysql_query("UPDATE users SET ver1 = '$verif1', ver2 = '$verif2', ver3 = '$verif3' WHERE ID = '$ida'");
        die(include 'doverifjail.php');
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
            $gangsterusername = $usernameone;

            $getuserinfoarray = $statustesttwo;
            $getname = $gangsterusername;
            $getmoney = $getuserinfoarray['money'];
            $getreward = $getuserinfoarray['reward'];
            $bustss = $getuserinfoarray['jailbusts'];
            $busts = $getuserinfoarray['jailbusts'];
            $donebusts = $getuserinfoarray['donebusts'];
            $rankid = $getuserinfoarray['rankid'];
            $getrewarda = number_format($getreward);
            $rank = $getuserinfoarray['rankid'];
            $joint = $getuserinfoarray['joint'];
            $now = $getuserinfoarray['now'];
            $ver = $getuserinfoarray['ver1'];
            $jailrand = $getuserinfoarray['jailrand'];
            $points = $getuserinfoarray['points'];
            $mission = $getuserinfoarray['mission'];
            $userloc = $getuserinfoarray['location'];
			$presbust = $getuserinfoarray['presbust'];

            $guessopen = mysql_query("SELECT * FROM gametimes WHERE game = 'weekly'");
            $openx = mysql_fetch_array($guessopen);
            $openxox = $openx['time'];

            if ($_POST['timetojail']) {
                $checkjaill = mysql_num_rows(mysql_query("SELECT * FROM jail WHERE username='$gangsterusername'"));
                if ($checkjaill >= '1') {
                    $showoutcome++;
                    $outcome = "<font size=1 face=verdana color=yellow>Jack can only be jailed once!</font>";
                } else {
                    mysql_query("INSERT INTO jail(username,time,reward) VALUES ('Jack','$jailtimee','10000000')");
                    if (mysql_affected_rows() == 0) {
                        die('<font color=white face=verdana size=1>Error 11.</font>');
                    }
                }
            }

            if (isset($_POST['leavejail'])) {
                if ($points < '3') {
                    $showoutcome++;
                    $outcome = "You do not have enough points!";
                } else {
                    mysql_query("UPDATE users SET points = (points - 3) WHERE ID = '$ida' AND points >= '3'");
                    if (mysql_affected_rows() == 0) {
                        die('<font color=white face=verdana size=1>Error 11.</font>');
                    }
                    mysql_query("UPDATE users SET ptsspent = (ptsspent + 3) WHERE ID = '$ida'");
                    mysql_query("DELETE FROM jail WHERE username = '$gangsterusername'");

                    $showoutcome++;
                    $outcome = "You are no longer in jail!";
                }
            }

            $inputrand = mt_rand(0, 35);
            if ($inputrand == '0') {
                $newinput = 1;
            }

            $jailtest = mysql_query("SELECT username FROM jail WHERE username = '$getname'");
            $jailtester = mysql_num_rows($jailtest);

            if ($rankid == '100') {
                if (isset($_GET['deletepost'])) {
                    mysql_query("DELETE FROM forumposts WHERE type = 'jail' AND id = '$deletepost'");
                }
            }

            if (isset($_POST['deleteall'])) {
                if (($rankid < '25') && ($senior < '0')) {
                } else {
                    mysql_query("DELETE FROM forumposts WHERE type = 'jail'");
                    $showoutcome++;
                    $outcome = "Posts deleted!";
                }
            }


            $newpostraw = $_POST['newpost'];
            $newpost = htmlentities($newpostraw, ENT_QUOTES);
            if (isset($_POST['dopost'])) {


                $mutedusernamesql = mysql_query("SELECT * FROM muted WHERE  username = '$gangsterusername'") or die(mysql_error());
                $mutedusernamerows = mysql_num_rows($mutedusernamesql);
                $mutedusernamearray = mysql_fetch_array($mutedusernamesql);
                $mutedusernameone = $mutedusernamearray['username'];
                $mutedipone = $mutedusernamearray['ip'];

                $mutedipsql = mysql_query("SELECT * FROM muted WHERE ip = '$userip'") or die(mysql_error());
                $mutediprows = mysql_num_rows($mutedipsql);
                $mutediparray = mysql_fetch_array($mutedipsql);
                $mutedusernametwo = $mutediparray['username'];
                $mutediptwo = $mutediparray['ip'];


                if (!$newpost) {
                } elseif ($mutedusernamerows > '0') {
                    die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");
                } elseif ($mutediprows > '0') {
                    die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>State Gangsters</b> to be unmuted!");
                } else {
                	$post_time = date('Y-m-d H:i:s');
                    mysql_query("INSERT INTO forumposts(username,topicid,ip,time,type,post,rankid)
VALUES ('$gangsterusername',' ','$userip','$post_time','jail','$newpost','$rank')");
                    mysql_query("UPDATE users SET posts = (posts + 1) WHERE ID = '$ida'");
                }
            }

            $checkbust = mysql_num_rows(mysql_query("SELECT * FROM jail WHERE id = '$bust'"));
            $bustee = mysql_fetch_array(mysql_query("SELECT * FROM jail WHERE id = '$bust'"));
            $busteename = $bustee['username'];
            $busteetime = $bustee['time'];
            $missiontotal = $busteetime - $time;


            $getsug = mysql_fetch_array(mysql_query("SELECT * FROM suggestions WHERE username = '$busteename'"));
            $getsugid = $getsug['id'];
            $getsugusername = $getsug['username'];

            $busteereward = $bustee['reward'];
            $busteerewarda = number_format($busteereward);

            $timea = time();

            $hidden = ceil($time / 500);

            $inputrand = mt_rand(0, 60);
            if ($inputrand == '0') {
                $newinput = 1;
            }

            if (isset($_POST["bustbutton"])) {
				if (isset($_POST['captcha_need']) && $_POST['captcha'] != $_SESSION['rand_code']) {
					$showoutcome++; $outcome = "Verification code is not valid!";
				}
				elseif ((isset($_POST['captcha_need']) && $_POST['captcha'] == $_SESSION['rand_code']) || !isset($_POST['captcha_need'])) {
						$verificationcode = rand(1, 25);
						if ($verificationcode == '25') {
							$showcaptcha = true;
						}
						else {
				
				$check_in_jail = mysql_query("SELECT * FROM jail WHERE username='$usernameone'");
				$nums = mysql_num_rows($check_in_jail);
				
                    $loca = rand(1,7);
                    if($loca == '1'){$locationbust = 'Las Vegas';}
                    elseif($loca == '2'){$locationbust = 'Los Angeles';}
                    elseif($loca == '3'){$locationbust = 'New York';}
                    elseif($loca == '4'){$locationbust = 'Seatle';}
                    elseif($loca == '5'){$locationbust = 'Miami';}
                    elseif($loca == '6'){$locationbust = 'Chicago';}
                    elseif($loca == '7'){$locationbust = 'Dallas';}
					
				if ($nums == "1"){
					echo "You can not bust someone when you are in jail";
				} else{
					if ($_POST['bust_mission'] == "DonaldTrump" && $mission == 1){
						$find_prisoner = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='DonaldTrump'"));
						$prisoner_location = $find_prisoner['location'];
						if ($prisoner_location == $thelocation) {
							$bust_relocate = array(50, 100, 250, 300, 350, 450);
							if ($presbust < 500){
								$prestime=time() + 150;
								if (!in_array($presbust, $bust_relocate)) {
									echo "You were caught trying to save Mr Trump, You are now also being held hostage!";
								}
								else {
									mysql_query("UPDATE users SET location = '$locationbust' WHERE username='DonaldTrump'");
									echo "You failed to bust Donald Trump! he now has been relocated please travel to every city to find him!";
								}
								mysql_query("UPDATE users SET `presbust`=`presbust`+'1' WHERE username='$usernameone'");
								mysql_query("INSERT INTO `jail` (`username`, `id`, `time`, `reward`) VALUES ('$usernameone', '', '$prestime', '$0')");
								mysql_query("UPDATE `users` SET `totaljc`=`totaljc`+'1' WHERE username='$usernameone'");
							}
							else {
								$newadd = rand(50000000,100000000);
								$newadd2 = number_format($newadd);
								$mission = $mission + 1;
								mysql_query("UPDATE users SET `presbust`='0', `mission`=`mission`+'1', `money`=`money`+'$newadd' WHERE username='$usernameone'");
								mysql_query("UPDATE users SET mail='1' WHERE username='$usernameone'");
								mysql_query("INSERT INTO `messages` (`sentto`, `sentfrom`, `info`, `time`, `new`, `d`) 
								VALUES ('$usernameone', '$usernameone', 'You recieved <b>$$newadd2</b> from rescuing Mr Trump, please check missions for your next mission!', '$datetime', '0', '0')");
								//mysql_query("INSERT INTO `logs` ( `id` , `who` , `action` , `date` , `ip` ) VALUES ('', '$usernameone', 'Recieved $<b>$newadd2</b> from the first mission!', '$date, '$realip')");

								echo "You busted Mr Trump from jail!";
							}
						}
					}
					if ($_POST['bust_mission'] == "MrBrown" && $mission == 4){
						$find_prisoner = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='MrBrown'"));
						$prisoner_location = $find_prisoner['location'];
						if ($prisoner_location == $thelocation) {
							$bust_relocate = array(50, 100, 250, 300, 350, 450, 550, 600, 650);
							if ($presbust < 700){
								$prestime=time() + 150;
								if (!in_array($presbust, $bust_relocate)) {
									echo "You were caught trying to save Mr Brown, You are now also being held hostage!";
								}
								else {
									mysql_query("UPDATE users SET location = '$locationbust' WHERE username='MrBrown'");
									echo "You failed to bust Mr Brown! he now has been relocated please travel to every city to find him!";
								}
								mysql_query("UPDATE users SET `presbust`=`presbust`+'1' WHERE username='$usernameone'");
								mysql_query("INSERT INTO `jail` (`username`, `id`, `time`, `reward`) VALUES ('$usernameone', '', '$prestime', '$0')");
								mysql_query("UPDATE `users` SET `totaljc`=`totaljc`+'1' WHERE username='$usernameone'");
							}
							else {
								$newadd = rand(200000000,300000000);
								$newadd2 = number_format($newadd);
								$mission = $mission + 1;
								mysql_query("UPDATE users SET `presbust`='0', `mission`=`mission`+'1', `money`=`money`+'$newadd' WHERE username='$usernameone'");
								mysql_query("UPDATE users SET mail='1' WHERE username='$usernameone'");
								mysql_query("INSERT INTO `messages` (`sentto`, `sentfrom`, `info`, `time`, `new`, `d`) 
								VALUES ('$usernameone', '$usernameone', 'You recieved <b>$$newadd2</b> from rescuing Mr Brown, please check missions for your next mission!', '$datetime', '0', '0')");
								//mysql_query("INSERT INTO `logs` ( `id` , `who` , `action` , `date` , `ip` ) VALUES ('', '$usernameone', 'Recieved $<b>$newadd2</b> from the first mission!', '$date, '$realip')");

								echo "You busted Mr Brown from jail!";
							}
						}
					}
					if ($_POST['bust_mission'] == "SheikhMohammed" && $mission == 6){
						$find_prisoner = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='SheikhMohammed'"));
						$prisoner_location = $find_prisoner['location'];
						if ($prisoner_location == $thelocation) {
							$bust_relocate = array(50, 100, 250, 300, 350, 450, 550, 600, 650, 750, 800, 950);
							if ($presbust < 1000){
								$prestime=time() + 150;
								if (!in_array($presbust, $bust_relocate)) {
									echo "You were caught trying to save Sheikh Mohammed, You are now also being held hostage!";
								}
								else {
									mysql_query("UPDATE users SET location = '$locationbust' WHERE username='SheikhMohammed'");
									echo "You failed to bust Sheikh Mohammed! he now has been relocated please travel to every city to find him!";
								}
								mysql_query("UPDATE users SET `presbust`=`presbust`+'1' WHERE username='$usernameone'");
								mysql_query("INSERT INTO `jail` (`username`, `id`, `time`, `reward`) VALUES ('$usernameone', '', '$prestime', '$0')");
								mysql_query("UPDATE `users` SET `totaljc`=`totaljc`+'1' WHERE username='$usernameone'");
							}
							else {
								$newadd = rand(480000000,520000000);
								$newadd2 = number_format($newadd);
								$mission = $mission + 1;
								mysql_query("UPDATE users SET `presbust`='0', `mission`=`mission`+'1', `money`=`money`+'$newadd' WHERE username='$usernameone'");
								mysql_query("UPDATE users SET mail='1' WHERE username='$usernameone'");
								mysql_query("INSERT INTO `messages` (`sentto`, `sentfrom`, `info`, `time`, `new`, `d`) 
								VALUES ('$usernameone', '$usernameone', 'You recieved <b>$$newadd2</b> from rescuing Sheikh Mohammed, please check missions for your next mission!', '$datetime', '0', '0')");
								//mysql_query("INSERT INTO `logs` ( `id` , `who` , `action` , `date` , `ip` ) VALUES ('', '$usernameone', 'Recieved $<b>$newadd2</b> from the first mission!', '$date, '$realip')");

								echo "You busted the Sheikh from jail!";
							}
						}
					}
				}
                if ($checkbust < '1') {
                } elseif ($jailtester > '0') {
                    $showoutcome++;
                    $outcome = "You are in jail!";
                } else {
                    $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '5'"));
                    if ($crewperk > 0) {
                        $busts = $busts * 10;
                    }
                    $rand = mt_rand(0, 2000);
                    if ($rankid == 100) {
                        $if = 1900;
                    } elseif ($busts < 2) {
                        $if = 315;
                    } elseif ($busts < 3) {
                        $if = 465;
                    } elseif ($busts < 4) {
                        $if = 590;
                    } elseif ($busts < 15) {
                        $if = 670;
                    } elseif ($busts < 35) {
                        $if = 770;
                    } elseif ($busts < 50) {
                        $if = 970;
                    } elseif ($busts < 75) {
                        $if = 1079;
                    } elseif ($busts < 125) {
                        $if = 1150;
                    } elseif ($busts < 200) {
                        $if = 1236;
                    } elseif ($busts < 500) {
                        $if = 1300;
                    } elseif ($busts < 2000) {
                        $if = 1440;
                    } elseif ($busts < 5000) {
                        $if = 1610;
                    } elseif ($busts < 10000) {
                        $if = 1720;
                    } elseif ($busts < 15000) {
                        $if = 1900;
                    } elseif ($busts < 500000) {
                        $if = 1950;
                    }
                    mysql_query("UPDATE users SET jailbusts = (jailbusts + 1) WHERE ID = '$ida'");

                    $time = time();
                    $jailtime = $time + 60;

                    if ($rand > $if) {
                        $showoutcome++;
                        $outcome = "<font color=red><b>You got caught!</b></font> You are now in jail too!";
                        mysql_query("UPDATE users SET now = '0' WHERE ID = '$ida'");
                        mysql_query("UPDATE loggedin SET jailfailed = (jailfailed + 1) WHERE username = '$usernameone'");
                        mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$getreward')");
                    } else {
                        mysql_query("DELETE FROM jail WHERE id = '$bust'");
                        if (mysql_affected_rows() == 0) {
                            die("<font color=white face=verdana size=1>User is no longer in jail</font>");
                        }
                        mysql_query("UPDATE users SET donebusts = (donebusts + 1) WHERE ID = '$ida'");
                        $showoutcome++;
                        $outcome = "You successfully busted <b>$busteename</b> out of jail, You received <font color=yellow>$<b>$busteerewarda</b></font>!";
                        $nows = $now + 1;
                        if ($nows > $joint) {
                            mysql_query("UPDATE users SET joint = $nows WHERE ID = '$ida'");
                        }
                        mysql_query("UPDATE users SET now = (now + 1) WHERE ID = '$ida'");
                        if ($openxox == 1) {
                            mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'");
                        }
                        mysql_query("UPDATE missiontasks SET busts = busts + 1 WHERE username = '$usernameone'");
                        if ($missiontotal < 10) {
                            mysql_query("UPDATE missiontasks SET busts10 = busts10 + 1 WHERE username = '$usernameone'");
                        }
                        if ($missiontotal > 60) {
                            mysql_query("UPDATE missiontasks SET busts60 = busts60 + 1 WHERE username = '$usernameone'");
                        }
                        mysql_query("UPDATE loggedin SET jaildone = (jaildone + 1) WHERE username = '$usernameone'");
                        mysql_query("UPDATE loggedin SET jailearned = (jailearned + $busteereward) WHERE username = '$usernameone'");
                        mysql_query("UPDATE users SET money = money - $busteereward WHERE ID = '$getsugid' AND money >= '$busteereward'");
                        if (mysql_affected_rows() != 0) {
                            mysql_query("UPDATE users SET money = money + $busteereward WHERE ID = '$ida'");
                            mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$usernameone','','Busted $getsugusername for $$busteerewarda','$datetime','jailbust')");
                            mysql_query("INSERT INTO moneylogs(`username`,`id`,`action`,`time`,`where`) VALUES ('$getsugusername','','Got busted by $usernameone for $$busteerewarda','$datetime','jailbust')");
                        } else {
                            mysql_query("UPDATE users SET reward = '0' WHERE username = '$busteename'");
                        }
                        $sendinfo = "\[b\]$getname\[\/b\] has set you free from jail, and gained $\[b\]$busteerewarda\[\/b\] for the bust!";
                        mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$busteename','$busteename','2','$userip','$sendinfo')");

                        $rankup = $getuserinfoarray['rankup'];
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
                            $update = '0.033';
                            $newrank = "$rank21";
                        } elseif ($rank == '21') {
                            $update = '0.022';
                            $newrank = "$rank22";
                        }
                        if ($rank <= 21) {
                            if (($rankup + $update) > ('100')) {
                                $newrankup = $rankup + $update - 100;
                                $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                mysql_query("UPDATE users SET rankid = rankid + 1 WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET rankup = $newrankup WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET bullets = bullets + 1000 WHERE ID = '$ida'");
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
                            } else {
                                mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
                            }
                        }
                    }
                }
			}}} elseif (isset($_POST['reward'])) {

                $entertainer = $ent;
                if ($entertainer != '0') {
                    die('<font color=white face=verdana size=1>As entertainer you cannot do this</font>');
                }

                if ($setreward > $getmoney) {
                    $showoutcome++;
                    $outcome = "You dont have enough money!";
                } elseif ($setreward > 99999999999) {
                } elseif ($jailtester > '0') {
                    $showoutcome++;
                    $outcome = "You cant change the reward while your in jail!";
                } elseif ($setreward == $getreward) {
                    $showoutcome++;
                    $outcome = "Your reward has been set!";
                } else {
                    if (!$setreward) {
                        $setreward = 0;
                    }
                    mysql_query("UPDATE users SET reward = '$setreward' WHERE ID = '$ida' AND money >= '$setreward'");
                    if (mysql_affected_rows() == 0) {
                        die('<font color=white face=verdana size=1>Error.</font>');
                    }

                    mysql_query("UPDATE jail SET reward = '$setreward' WHERE username = '$getname'");
                    $showoutcome++;
                    $outcome = "You reward has been set!";
                }
            }
            $getuserinfosql = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
            $getuserinfoarray = mysql_fetch_array($getuserinfosql);
            $getreward = $getuserinfoarray['reward'];
            $getrewarda = number_format($getreward);
            $joint = $getuserinfoarray['joint'];
            $jailrand = $getuserinfoarray['jailrand'];
            $ID = $getuserinfoarray['ID'];
            $now = $getuserinfoarray['now'];

            $getprisoners = mysql_query("SELECT * FROM jail ORDER BY reward DESC");
            $getprisonerscount = mysql_num_rows($getprisoners);
            ?>
            <script>
                function crimesCountdown(load) {
                    if (load) {
                        var table = document.getElementById('jail_table');
                        var inmates = table.getElementsByTagName('span');
                        for (var i = 0; i < inmates.length; i++) {
                            if (inmates[i].id == 'countdown') {
                                var timeleft = parseInt(inmates[i].innerHTML);
                                if (timeleft > 0) {
                                    if (timeleft == 1) {
                                        inmates[i].innerHTML = '0 seconds';
                                    } else {
                                        inmates[i].innerHTML = timeleft - 1+' seconds';
                                    }
                                }
                            }
                        }
                    }
                    setTimeout("crimesCountdown(true)", 1000);
                }
                window.onload = crimesCountdown;
            </script>
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
                                Jail
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <div style="padding: 5px; padding-top: 8px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;">
                                        <div class="break" style="padding-top: 15px;">
                                            <form method="post" id="jail">
                                                Set Bust Reward: <input placeholder="Set reward..." class="textarea"
                                                                        name="reward" style="padding-left: 6px;" type="text"
                                                                        value="<? echo "$$getrewarda"; ?>">
                                                <input value="Set!" class="textarea curve3pxRight"
                                                       style="padding-left: 9px; padding-right: 9px;" type="submit">
                                            </form>
                                            <div class="break" style="padding-top: 19px;">
                                                <div class="spacer"></div>
                                                <div class="break" style="padding-top: 23px;">
                                                    <form method="post" action="jail.php" style="display:inline-block;width: 100%;">
                                                    <table class="regTable" id="jail_table"
                                                           style="margin-left: 12px; margin-right: 12px; width: 75%; margin: auto;min-width: 580px;"
                                                           cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td colspan="4" class="header">
                                                                Inmates
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="subHeader" colspan="2"
                                                                style="border-left: 0; width: 40%;">User
                                                            </td>
                                                            <td class="subHeader" style="width: 35%;">Sentence</td>
                                                            <td class="subHeader" style="width: 25%;">Bust Reward</td>
                                                        </tr>
														<?php
															//var_dump($mission);
														?>
															
                                                        <?
                                                        $time = time();

                                                        $getmoney = $getuserinfoarray['money'];
                                                        $getreward = $getuserinfoarray['reward'];
                                                        $bustss = $getuserinfoarray['jailbusts'];
                                                        $failed = $getuserinfoarray['failedbusts'];
                                                        $rankid = $getuserinfoarray['rankid'];
                                                        $getrewarda = number_format($getreward);
                                                        $rank = $getuserinfoarray['rankid'];
                                                        $joint = $getuserinfoarray['joint'];
                                                        $now = $getuserinfoarray['now'];
                                                        $ver = $getuserinfoarray['ver1'];
                                                        $jailrand = $getuserinfoarray['jailrand'];
                                                        $ida = $getuserinfoarray['ID'];

                                                        $bustbutton = ceil($time / 50);
                                                        $is_mission_1 = false;
                                                        $is_mission_4 = false;
                                                        $is_mission_6 = false;
														
                                                        if ($mission == 1) {
															$find_prisoner = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='DonaldTrump'"));
															$prisoner_location = $find_prisoner['location'];
															if ($prisoner_location == $thelocation) $is_mission_1 = true;
														}
                                                        if ($mission == 4) {
															$find_prisoner = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='MrBrown'"));
															$prisoner_location = $find_prisoner['location'];
															if ($prisoner_location == $thelocation) $is_mission_4 = true;
														}
                                                        if ($mission == 6) {
															$find_prisoner = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='SheikhMohammed'"));
															$prisoner_location = $find_prisoner['location'];
															if ($prisoner_location == $thelocation) $is_mission_6 = true;
														}
                                                        if ($getprisonerscount <= '0' && $is_mission_1 == false && $is_mission_4 == false && $is_mission_6 == false) {
                                                            echo "<td colspan=\"4\" class=\"col noTop\" style=\"width: 100%;\">Nobody is in jail</td>";
                                                        }
                                                        if ($mission == 1 || $mission == 4 || $mission == 6) { ?>
															<?php if ($mission == 1):?>
															<?php
																$find_prisoner = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='DonaldTrump'"));
																$prisoner_location = $find_prisoner['location'];
																if ($prisoner_location == $thelocation):
															?>
                                                                <tr class="row">
                                                                    <td class="col noTop"
                                                                        style="text-align: center; width: 3%; padding-right: 10px; ">
                                                                        <input style="opacity: 0.2;" tabindex="33"
                                                                               name="bust_mission" value="DonaldTrump" type="radio">
                                                                    </td>
                                                                    <td class="col link noTop">
                                                                        <a href="viewprofile.php?username=DonaldTrump"
                                                                           style="display: inline-block; width: 100%">Donald Trump</a>
                                                                    </td>
                                                                    <td class="col noTop" style="text-align:center">
                                                                        <span style="" class="crimeTimer" data-counter="-1">
																			<span style="color: #bbbbbb;" id=countdown><? echo "Held Hostage";?></span>
																		</span>
                                                                    </td>
                                                                    <td class="col noTop" style="text-align:center">
                                                                        -
                                                                    </td>
                                                                </tr>
															<?php endif; ?>
															<?php endif; ?>
															<?php if ($mission == 4):?>
															<?php
																$find_prisoner = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='MrBrown'"));
																$prisoner_location = $find_prisoner['location'];
																if ($prisoner_location == $thelocation):
															?>
																<tr class="row">
                                                                    <td class="col noTop"
                                                                        style="text-align: center; width: 3%; padding-right: 10px; ">
                                                                        <input style="opacity: 0.2;" tabindex="33"
                                                                               name="bust_mission" value="MrBrown" type="radio">
                                                                    </td>
                                                                    <td class="col link noTop">
                                                                        <a href="viewprofile.php?username=MrBrown"
                                                                           style="display: inline-block; width: 100%">Mr Brown</a>
                                                                    </td>
                                                                    <td class="col noTop" style="text-align:center">
                                                                        <span style="" class="crimeTimer" data-counter="-1">
																			<span style="color: #bbbbbb;" id=countdown><? echo "Held Hostage";?></span>
																		</span>
                                                                    </td>
                                                                    <td class="col noTop" style="text-align:center">
                                                                        -
                                                                    </td>
                                                                </tr>
															<?php endif; ?>
															<?php endif; ?>
															<?php if ($mission == 6):?>
															<?php
																$find_prisoner = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='SheikhMohammed'"));
																$prisoner_location = $find_prisoner['location'];
																if ($prisoner_location == $thelocation):
															?>
																<tr class="row">
                                                                    <td class="col noTop"
                                                                        style="text-align: center; width: 3%; padding-right: 10px; ">
                                                                        <input style="opacity: 0.2;" tabindex="33"
                                                                               name="bust_mission" value="SheikhMohammed" type="radio">
                                                                    </td>
                                                                    <td class="col link noTop">
                                                                        <a href="viewprofile.php?username=SheikhMohammed"
                                                                           style="display: inline-block; width: 100%">Sheikh Mohammed</a>
                                                                    </td>
                                                                    <td class="col noTop" style="text-align:center">
                                                                        <span style="" class="crimeTimer" data-counter="-1">
																			<span style="color: #bbbbbb;" id=countdown><? echo "Held Hostage";?></span>
																		</span>
                                                                    </td>
                                                                    <td class="col noTop" style="text-align:center">
                                                                        -
                                                                    </td>
                                                                </tr>
															<?php endif; ?>
															<?php endif; ?>
														<?php 
														}
														if ($getprisonerscount > '0') {
                                                            while ($getjail = mysql_fetch_array($getprisoners)) {
                                                                $jailreward = $getjail['reward'];
                                                                $jailrewarda = number_format($jailreward);
                                                                $jailtime = $getjail['time'];
                                                                $jailid = $getjail['id'];
                                                                $jailname = $getjail['username'];
                                                                $jailtimea = $jailtime - $time;
                                                                if ($jailtimea < '1') {
                                                                    $jailtimea = '0';
                                                                } ?>
                                                                <tr class="row">
                                                                    <td class="col noTop"
                                                                        style="text-align: center; width: 3%; padding-right: 10px; ">
                                                                        <input style="opacity: 0.2;" tabindex="33"
                                                                               name="<?php echo$bustbutton;?>" value="<?php echo$jailid;?>" type="radio">
                                                                    </td>
                                                                    <td class="col link noTop">
                                                                        <a href="viewprofile.php?username=<? echo $jailname; ?>"
                                                                           style="display: inline-block; width: 100%"><? echo $jailname; ?></a>
                                                                    </td>
                                                                    <td class="col noTop" style="text-align:center">
                                                                        <span style="" class="crimeTimer"
                                                                              data-counter="-1"><span
                                                                                    style="color: #bbbbbb;"
                                                                                    id=countdown><? echo $jailtimea; ?>
                                                                                seconds</span></span>
                                                                    </td>
                                                                    <td class="col noTop" style="text-align:center">
                                                                        <? echo "$$jailrewarda"; ?>
                                                                    </td>
                                                                </tr>
                                                            <? }
                                                        } ?>
                                                        </tbody>
                                                    </table>
                                                    <div class="break" style="padding-top: 19px;">
                                                        <button type="submit" class="textarea js-bust-out curve3px" tabindex="34"
                                                                name="bustbutton"
                                                                style="font-size: 11px; padding: 8px 13px 7px 13px; margin: 0 0 11px 0;">
                                                            Bust Out!
                                                        </button>
												
										<?php if ($showcaptcha == true): ?>
										<div style="margin-top: 10px; margin-bottom: 10px;">
											<label for="captcha_txt"><img src="captcha_generate.php" style="height: 24px;"></label>
											<input class="textarea" value="" id="captcha_txt" name="captcha" placeholder="Enter Code..." type="text">
											<input type="hidden" name="captcha_need" value="1">
											<!--<input type="submit" value="Submit" class="textarea" style="display: inline-block" name="captcha_btn">-->
										</div>
										<?php endif; ?>
                                                        </form>
                                                        <? if ($jailname == $usernameone) { ?>
                                                        <form method="post" action="jail.php" style="display:inline-block">
                                                            <button class="textarea curve3px" name="leavejail"
                                                                    style="font-size: 11px; padding: 8px 13px 7px 13px; margin: 0 0 11px 0; margin-left: 3px;" type="submit">
                                                                Leave Jail <span
                                                                        style="color: silver;">(3 Points)</span>!
                                                            </button>
                                                        </form>
                                                        <? } ?>
                                                        <form method=post><? if ($usernameone == 'Jack') {
                                                                echo "<br/><br/><br/><input type=submit class='textarea cure3px inline_form' name=timetojail value='Jail Admin'>";
                                                            } ?>
                                                            <input name="<? echo $bustbutton; ?>" type="radio"
                                                                   value="<? echo "$hidden"; ?>"
                                                                   STYLE="visibility:hidden">
                                                        </form>
                                                        <div class="break" style="padding-top: 29px;">
                                                            <div class="spacer"></div>
                                                            <div class="break" style="padding-top: 4px;">
                                                                <?
                                                                $totalcrimes = number_format($getuserinfoarray['jailbusts']);
                                                                $totalcrimes = $getuserinfoarray['jailbusts'];
                                                                $concrimes = number_format($getuserinfoarray['now']);
                                                                $crimessuccess = $getuserinfoarray['donebusts'];
                                                                if ($totalcrimes == 0) {
                                                                    $rating = 0;
                                                                } else {
                                                                    $rating = round($crimessuccess / $totalcrimes * 100);
                                                                }
                                                                ?>
                                                                <div style="text-align: right; padding: 5px; padding-right: 6px; padding-top: 1px;">
                                                                    Busts: <b
                                                                            style="color: #bbbbbb;"><? echo $totalcrimes; ?></b>
                                                                    <span class="miniSep">-</span>
                                                                    Success Rate: <b
                                                                            style="color: #bbbbbb;"><? echo "$rating%"; ?></b>
                                                                    <span class="miniSep">-</span>
                                                                    Current Consecutive Busts: <b
                                                                            style="color: #bbbbbb;"><? echo $concrimes; ?></b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <? $mtr = mt_rand(0, 50000000);
                                    if ($jailrand == '1') {
                                        echo "<font color=white face=verdana size=1>Code:</font><input type=textarea name=ver class=textbox><img src=vercode1.php?id=$ID&hi=$mtr><br>";
                                    } ?>
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


            $getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'jail' ORDER BY id DESC");

            while ($getpostsarray = mysql_fetch_array($getposts)) {
                $postname = $getpostsarray['username'];
                $postid = $getpostsarray['id'];
                $time = $getpostsarray['time'];
                $postinforawa = html_entity_decode($getpostsarray['post'], ENT_NOQUOTES);
                $postinforawb = $postinforawa;

                $zpattern[a] = "<";
                $zpattern[b] = ">";

                $zreplace[a] = "&lt;";
                $zreplace[b] = "&gt;";

                $i = 0;
                $while = mysql_query("SELECT * FROM blacklist");
                while ($all = mysql_fetch_array($while)) {
                    $i = $i + 1;
                    $zpattern[$i] = $all['word'];
                    $zreplace[$i] = "stategangsters";
                }


                $postinforawz = str_replace($zpattern, $zreplace, $postinforawb);

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
                $epattern[14] = "/\[size\](.*?)\[\/size\]/is";


                $ereplace[1] = "<b>$1</b>";
                $ereplace[2] = "<u>$1</u>";
                $ereplace[3] = "<i>$1</i>";
                $ereplace[4] = "<center>$1</center>";
                $ereplace[5] = "<font color=\"$1\">$2</font>";
                $ereplace[7] = "<font face=\"$1\">$2</font>";
                $ereplace[8] = "<br>";
                $ereplace[10] = "<blockquote><b>$1</b></blockquote>";
                $ereplace[11] = "<div align=\"left\">$1</div>";
                $ereplace[12] = "<div align=\"right\">$1</div>";
                $ereplace[13] = "<s>$1</s>";
                $ereplace[14] = "<size>$1</size>";


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

                $postinfo = str_replace($fpattern, $freplace, $postinforawb);

                $rankcolor = $getpostsarray['rankid'];

                if ($rankcolor == '100') {
                    $color = "<font color=red face=verdana size=1><b>$postname</b></font>";
                } elseif ($rankcolor == '75') {
                    $color = "<font color=aqua face=verdana size=1><b>$postname</b></font>";
                } elseif ($rankcolor == '50') {
                    $color = "<font color=yellow face=verdana size=1><b>$postname</b></font>";
                } elseif ($rankcolor == '25') {
                    $color = "<font color=blue face=verdana size=1><b>$postname</b></font>";
                } else {
                    $color = "<font color=white face=verdana size=1>$postname</font>";
                }
                ?>

                <script>
                    function getitnow<?echo$postid;?>(){
                        urnamed=<?echo$postid;?>;
                        var ajaxRequest;
                        try{ajaxRequest = new XMLHttpRequest();} catch (e){
                            try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
                                try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){
                                    alert("Your browser broke1!");return false;}}}
                        var strhehefd = "&topic=<?echo$topicid;?>&rand="+Math.random();
                        ajaxRequest.open("GET", "likecomment.php?id=" + urnamed + strhehefd, true);
                        ajaxRequest.send(null);

                        ajaxRequest.onreadystatechange = function(){
                            if(ajaxRequest.readyState == 4){
                                if(ajaxRequest.responseText){
                                    document.getElementById("p<?echo$postid;?>").style.display='inline-block';
                                    document.getElementById("u<?echo$postid;?>").innerHTML = "" + ajaxRequest.responseText + "";
                                }}}}
                </script>

                <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
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
                                    <span class="miniSep">&nbsp;-&nbsp;</span>
                                    <a href="#response" style="color: #676767;">Reply</a>
                                </div>
                                <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe; text-align: left;">
                                    <? if ($countthree > '20') {
                                        echo "This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
                                    } else {
                                        echo nl2br($postinfo);
                                    } ?>
                                </div>
                                <div class="break" style="padding-top: 4px;">
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 4px;">
                                    </div>
                                </div></div></td>
                        <td class="right"></td>
                    </tr>
                    <tr>
                        <td class="bottomleft"></td>
                        <td class="bottom"></td>
                        <td class="bottomright"></td>
                    </tr>
                    </tbody>
                </table>
            <? } ?>
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0" id="response">
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
                            <div class="menuHeader noTop">
                                <div style="text-align: center;">
                                    Add Comment
                                </div>
                            </div>
                            <form method="post" style="padding: 3px; margin: auto; text-align: center; color: #fefefe;">
                                <form action="jail.php" method="post" name="smiley">
                                    <div style="margin: auto; min-width: 220px; width: 65%; max-width: 410px;">
                                        <textarea name="newpost" class="textarea inline_form"
                                                  style="height: 120px; width: 100%;" placeholder="Enter Comment..."
                                                  id="newpost"></textarea><br>
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
                                        <input type="submit" value="Post comment"
                                               style="padding-left: 8px; padding-right: 8px; margin-top: 4px; margin-bottom: 3px;"
                                               class="textarea curve3px inline_form"
                                               name="dopost">
                                    </div>
                                </form>
                                <div class="spacer"></div>
                                <div class="break" style="padding-top: 6px;">
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