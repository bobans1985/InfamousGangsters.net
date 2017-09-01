<? include 'included.php'; session_start(); ?>
<?
$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR];
$gangsterusername = $usernameone;

$poster = mysql_real_escape_string($_GET['deletepost']);
$deletepost = preg_replace($allowed,"",$poster);

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'redirect.php'); }
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
            $time = time();


            $doidraw = mysql_real_escape_string($_POST['doid']);
            $cancela = mysql_real_escape_string($_GET['cancel']);
            $kicka = mysql_real_escape_string($_GET['kick']);
            $invintenamea = mysql_real_escape_string($_POST['invite']);
            $doid = preg_replace($allowed,"",$doidraw);
            $cancel = preg_replace($allowed,"",$cancela);
            $kick = preg_replace($allowed,"",$kicka);
            $invitename = preg_replace($saturate,"",$invintenamea);

            $guessopen = mysql_query("SELECT * FROM gametimes WHERE game = 'weekly'");
            $openx = mysql_fetch_array($guessopen);
            $openxox = $openx['time'];

            $getuserinfoarray = $statustesttwo;
            $getname = $getuserinfoarray['username'];
            $timer = ceil($getuserinfoarray['timer']);
            $htime = $timer - $time - 3600;
            $rankid = $getuserinfoarray['rankid'];
            $money = $getuserinfoarray['money'];
            $locationn = $getuserinfoarray['location'];
            $mission = $getuserinfoarray['mission'];

            //$getinva = mysql_query("SELECT * FROM robbery WHERE username = '$gangsterusername'");
            //$rowstwo = mysql_num_rows($getinva);

            if(isset($_POST['joincc'])){
                if($timer > $time){}
                //elseif($rowstwo != '0'){}
                elseif($htime > '0'){}
                else { 
                	//mysql_query("INSERT INTO robbery(username,city) VALUES('$gangsterusername','$locationn')");
                	mysql_query("INSERT INTO oc SET leader = '$gangsterusername'");
                	mysql_query("UPDATE users SET money = money - '100000' WHERE username = '$gangsterusername'");
                    /*if($mission == 4 AND $locationn == Miami){
                        mysql_query("UPDATE users SET missioncount = 0 WHERE ID = '$ida'");
                        $sendinfo = "[color=white][b]Mission complete![/b] [i]Check your missions page for the next mission[/i][/color]";
                        mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$usernameone','$usernameone','1','$adress','$sendinfo')");
                        mysql_query("UPDATE users SET money = money + '2000000' WHERE id = '$ida'");
                        mysql_query("UPDATE users SET mission = '5' WHERE id = '$ida'");
                    }*/
                    echo "You started an OC!";
                }
            }

            if(isset($_POST['leavecc'])){
                //mysql_query("UPDATE users SET money = (money - 250000) WHERE ID = '$ida' AND money >= 250000");
                //if (mysql_affected_rows()==0){die('<font color=white face=verdana size=1>Error, you dont have enough money.</font>');}
                //mysql_query("DELETE FROM robbery WHERE username = '$gangsterusername'");
                $check_leader = mysql_num_rows(mysql_query("SELECT * FROM oc WHERE leader = '$gangsterusername'"));
                if ($check_leader > 0) {
                	$ocid_query_array = mysql_fetch_array(mysql_query("SELECT * FROM oc WHERE leader = '$gangsterusername'"));
                	$ocid = $ocid_query_array['id'];
					mysql_query("DELETE FROM ocinvites WHERE ocid = '$ocid'");
					mysql_query("DELETE FROM oc WHERE id = '$ocid'");
				}
				else {
					mysql_query("DELETE FROM ocinvites WHERE username = '$gangsterusername'");
				}
                echo "You left the OC!";
            }
            
            if (isset($_POST['invite_btn'])) {
				$invite_name = $_POST['invite_name'];
				$ocid = $_POST['crime_id'];
				$already_invited = false;
				$in_other_oc = false;
				$check_invited = mysql_query("SELECT * FROM ocinvites WHERE ocid = '$ocid'");
				while ($users_invited = mysql_fetch_array($check_invited)) {
					if (trim(strtolower($invite_name)) == trim(strtolower($users_invited['username']))) {
						$already_invited = true;
					}
				}
				$check_leader_other_oc = mysql_query("SELECT * FROM oc WHERE leader = '$invite_name'");
				$check_member_other_oc = mysql_query("SELECT * FROM ocinvites WHERE username = '$invite_name' AND status = 'Ready'");
				if (mysql_num_rows($check_leader_other_oc) > 0 || mysql_num_rows($check_member_other_oc) > 0) {
					$in_other_oc = true;
				}
				if (mysql_num_rows($check_invited) < 2) {
					$search_invited = mysql_query("SELECT * FROM users WHERE username = '$invite_name'");
					if (mysql_num_rows($search_invited) == 0) {
						echo "No such user!";
					}
					else {
						$invited_info = mysql_fetch_array($search_invited);
						$invited_name = $invited_info['username'];
						$time = time();
					    $timer_invited = ceil($invited_info['timer']);
					    $htime_invited = $timer_invited - $time;
						if ($already_invited == true) {
							echo "You have already invited " . $invited_info['username'] . " to your OC!";
						}
						elseif (strtolower($invite_name) == strtolower("MrBrown") && $mission == 8) {
							mysql_query("INSERT INTO ocinvites SET ocid = '$ocid', username = 'MrBrown', status = 'Ready', f = '$gangsterusername'");
							echo "You invited MrBrown to your OC!";
						}
						elseif (strtolower($invite_name) == strtolower("MrBrown") && $mission != 8) {
							echo "You can not invite MrBrown to your OC now!";
						}
						elseif ($in_other_oc == true) {
							echo $invited_info['username'] . " is already in Organised Crime!";
						}
						elseif ($htime_invited > 0) {
							echo $invited_info['username'] . " can not participate in the OC now!";
						}
						elseif (strtolower($invited_info['username']) == strtolower($gangsterusername)) {
							echo "You can not invite yourself!";
						}
						else {
							mysql_query("INSERT INTO ocinvites SET ocid = '$ocid', username = '$invited_name', status = 'Pending', f = '$gangsterusername'");
							echo "You invited " . $invited_info['username'] . " to your OC!";
						}
					}
				}
				else echo "You can only fit 3 people in your team!";
			}
			
			if (isset($_POST['invite_id'])) {
				$invite_id = $_POST['invite_id'];
				$inviter_location = $_POST['inviter_location'];
				$my_location = $_POST['my_location'];
				if ($inviter_location != $my_location) {
					echo "You must be same location to do OC!";
				}
				else {
					mysql_query("UPDATE ocinvites SET status = 'Ready' WHERE id ='$invite_id'");
				}
			}
			
			if (isset($_POST['kick_user'])) {
				$kick_user = $_POST['kick_user'];
				mysql_query("DELETE FROM ocinvites WHERE username ='$kick_user'");
				echo 'User kicked from OC!';
			}

            $totalh = $htime / 3600;
            $totalh = floor($totalh);
            if($totalh < '10'){$leading = 0;}

            //$doicommit = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE city = '$locationn'"));
            //if($doicommit >= 3){
            if (isset($_POST['commitoc'])) {
            	
				$crime_team = array();
                $crime_team[0]['username'] = $gangsterusername;
                $crime_id = $_POST['commit_crime_id'];
                $getmembers_query = mysql_query("SELECT * FROM ocinvites WHERE ocid = '$crime_id'");
                $m = 1;
                while ($get_members = mysql_fetch_array($getmembers_query)) {
					$crime_team[$m]['username'] = $get_members['username'];
					$m++;
				}
                $total_reward = 0;
                foreach ($crime_team as $members) {
                    $member_rankid = (int)$members['rankid'];
					if ($member_rankid == 1) $total_reward += 1000000;
	                else $total_reward += ($member_rankid / 2) * 1000000;
				}

                foreach ($crime_team as $members) {
                    $addone = $members['username'];

                    if ($mission == 8 && strtolower($addone) == strtolower("MrBrown")) {
                        //mysql_query("UPDATE users SET missioncount = 0 WHERE ID = '$ccid'");
                        
						$mission_bonus = rand(100000000,200000000);
						$mission_bonus_format = number_format($mission_bonus);
                        
                        $sendinfo = "[color=white][b]Mission complete![/b] [i]Check your missions page for the next mission[/i][/color]";
                        mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) 
                        	VALUES ('$gangsterusername','$gangsterusername','1','','$sendinfo')");
                        mysql_query("UPDATE users SET money = money + '$mission_bonus_format' WHERE username = '$gangsterusername'");
                        mysql_query("UPDATE users SET mission = '9' WHERE username = '$gangsterusername'");
                    
                    	$showoutcome++;
		                $outcome = "You committed the Organised Crime! You made $$mission_bonus_format";
	                    /*$sendinfo = "You successfully committed the organised city crime, you received $$mission_bonus_format!";
	                    mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info,color)
						VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo','yes')");*/
                    	
                    }
                    else {
	                    $checkuserr = mysql_query("SELECT * FROM users WHERE username = '$addone'");
	                    while($inviteinfoa = mysql_fetch_array($checkuserr)){
	                        $percent = $inviteinfoa['rankid'];
	                        $ccid = $inviteinfoa['ID'];
	                        $rank = $inviteinfoa['rankid'];
	                        $addcrewid = $inviteinfoa['crewid'];
	                        $rankup = $inviteinfoa['rankup'];
	                        //$add = $inviteinfoa['addition'];
	                        $usermission = $inviteinfoa['mission'];
	                        $upto = 0;
	                        $upto = $upto + $percent;
	                    }
	                    if($upto <= '8'){$multiply = 0.75;}elseif($upto <= '12'){$multiply = 0.77;}elseif($upto <= '18'){$multiply = 0.82;}elseif($upto <= '25'){$multiply = 0.87;}elseif($upto <= '35'){$multiply = 0.9;}elseif($upto <= '50'){$multiply = 0.92;}elseif($upto <= '60'){$multiply = 0.95;}elseif($upto <= '70'){$multiply = 0.96;}else{$multiply = 1;}

						/*if ($rank == 1) $money_reward = 1000000;
	                	else $money_reward = ($rank / 2) * 1000000;*/
						if ($addone == $gangsterusername) {
							$money_reward = 0.5 * $total_reward;
						}
						else {
							$money_reward = 0.25 * $total_reward;
						}
	                    
	                    $format_money_reward = number_format($money_reward);
	                    
	                    //mysql_query("UPDATE users SET money = (money + $sharerand) WHERE ID = '$ccid'");
	                    mysql_query("UPDATE users SET money = (money + $money_reward) WHERE ID = '$ccid'");
	                    
	                    if ($addone == $gangsterusername) {
		                	$showoutcome++;
		                	$outcome = "You committed the Organised Crime! You made $$format_money_reward";
						}
	                	
	                    if($openxox == 2){ mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$addone'"); }

	                    $time = time();
	                    $newtime = $time + 17 * 3600;
	                    mysql_query("UPDATE users SET timer = '$newtime' WHERE username = '$addone'");

	                    $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$addone'"));
	                    if($addone != $gangsterusername){
	                        if($penpoint > '0'){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$addone'");
	                            $reason = "Did a CC with $gangsterusername";
	                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$addone','$reason')");}}

	                    if($rank == '1'){ $update = '99.999';$newrank = "$rank2";}
	                    elseif($rank == '2'){ $update = '45';$newrank = "$rank3";}
	                    elseif($rank == '3'){ $update = '28';$newrank = "$rank4";}
	                    elseif($rank == '4'){ $update = '16';$newrank = "$rank5";}
	                    elseif($rank == '5'){ $update = '13';$newrank = "$rank6";}
	                    elseif($rank == '6'){ $update = '8';$newrank = "$rank7";}
	                    elseif($rank == '7'){ $update = '7';$newrank = "$rank8";}
	                    elseif($rank == '8'){ $update = '6';$newrank = "$rank9";}
	                    elseif($rank == '9'){ $update = '4.8';$newrank = "$rank10";}
	                    elseif($rank == '10'){ $update = '4.25';$newrank = "$rank11";}
	                    elseif($rank == '11'){ $update = '4.09';$newrank = "$rank12";}
	                    elseif($rank == '12'){ $update = '3.36';$newrank = "$rank13";}
	                    elseif($rank == '13'){ $update = '3';$newrank = "$rank14";}
	                    elseif($rank == '14'){ $update = '3';$newrank = "$rank15";}
	                    elseif($rank == '15'){ $update = '2.54';$newrank = "$rank16";}
	                    elseif($rank == '16'){ $update = '2.35';$newrank = "$rank17";}
	                    elseif($rank == '17'){ $update = '1.85';$newrank = "$rank18";}
	                    elseif($rank == '18'){ $update = '1.25';$newrank = "$rank19";}
	                    elseif($rank == '19'){ $update = '0.95';$newrank = "$rank20";}
	                    elseif($rank == '20'){ $update = '0.45';$newrank = "$rank21";}
	                    elseif($rank == '21'){ $update = '0.18';$newrank = "$rank22";}

	                    $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$addcrewid' AND perk = '1'"));
	                    $refreward2 = mysql_num_rows(mysql_query("SELECT * FROM referralrewards WHERE rank > '$time'"));
	                    if($crewperk > 0 AND $rank > 1 || $refreward2 > 0){
	                        if($rank == '1'){ $update = '99.999';$newrank = "$rank2";}
	                        elseif($rank == '2'){ $update = '99.999';$newrank = "$rank3";}
	                        elseif($rank == '3'){ $update = '45';$newrank = "$rank4";}
	                        elseif($rank == '4'){ $update = '28';$newrank = "$rank5";}
	                        elseif($rank == '5'){ $update = '16';$newrank = "$rank6";}
	                        elseif($rank == '6'){ $update = '13';$newrank = "$rank7";}
	                        elseif($rank == '7'){ $update = '8';$newrank = "$rank8";}
	                        elseif($rank == '8'){ $update = '7';$newrank = "$rank9";}
	                        elseif($rank == '9'){ $update = '6';$newrank = "$rank10";}
	                        elseif($rank == '10'){ $update = '4.8';$newrank = "$rank11";}
	                        elseif($rank == '11'){ $update = '4.25';$newrank = "$rank12";}
	                        elseif($rank == '12'){ $update = '4.09';$newrank = "$rank13";}
	                        elseif($rank == '13'){ $update = '3.36';$newrank = "$rank14";}
	                        elseif($rank == '14'){ $update = '3';$newrank = "$rank15";}
	                        elseif($rank == '15'){ $update = '3';$newrank = "$rank16";}
	                        elseif($rank == '16'){ $update = '2.54';$newrank = "$rank17";}
	                        elseif($rank == '17'){ $update = '1.35';$newrank = "$rank18";}
	                        elseif($rank == '18'){ $update = '1.85';$newrank = "$rank19";}
	                        elseif($rank == '19'){ $update = '1.25';$newrank = "$rank20";}
	                        elseif($rank == '20'){ $update = '0.95';$newrank = "$rank21";}
	                        elseif($rank == '21'){ $update = '0.25';$newrank = "<font color=#FFC753>$rank22</font>";}
	                    }

	                    $updater = $update * $multiply;
	                    $sendinfoa = "You successfully committed the organised city crime, you received $$format_money_reward!";
	                    mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info,color)
						VALUES ('$addone','$addone','2','$userip','$sendinfoa','yes')");
						
	                    if($rank <= 21){
	                        if(($rankup + $updater) > ('100')){
	                            $newrankup = $rankup + $updater - 100;
	                            $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
	                            $homeinfo = "ranked to \[b\]$newrank\[\/b\]!";
	                            mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$addone','$homeinfo','1')");
	                            mysql_query("UPDATE users SET rankid = rankid + 1 WHERE username = '$addone'");
	                            mysql_query("UPDATE users SET rankup = $newrankup WHERE username = '$addone'");
	                            mysql_query("UPDATE users SET bullets = bullets + 1000 WHERE username = '$addone'");
	                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
								VALUES ('$addone','$addone','2','$userip','$sendinfo')");}
	                        else{mysql_query("UPDATE users SET rankup = rankup + $updater WHERE username = '$addone'");}
	                    }
                    }
                    mysql_query("DELETE FROM ocinvites WHERE username = '$addone'");
                }
                mysql_query("DELETE FROM oc WHERE id = '$crime_id'");
            }
            //}
                    
					$fulllocation = array(
						'Las Vegas' 	=> "Las Vegas, Nevada",
					    'Los Angeles' 	=> "Los Angeles, California",
					    'New York' 		=> "New York City, New York",
					    'Chicago' 		=> "Chicago, Illionis",
					    'Miami' 		=> "Miami, Florida",
					    'Seatle' 		=> "Seatle, Washington",
					    'Dallas' 		=> "Dallas, Texas",
					);
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
                                Organised Crime
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <? //$canileave = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE username = '$gangsterusername'")); ?>
                                    <?php
                                    	$crime_leader = mysql_num_rows(mysql_query("SELECT * FROM oc WHERE leader = '$gangsterusername'")); 
                                    	$crime_invite = mysql_num_rows(mysql_query("SELECT * FROM ocinvites 
                                    		WHERE username = '$gangsterusername' AND status = 'Ready'"));
                                    	if ($crime_leader >= 1) {
											$get_crime_array = mysql_fetch_array(mysql_query("SELECT * FROM oc WHERE leader = '$gangsterusername'"));
											$get_crime_id = $get_crime_array['id'];
											$get_crime_members = mysql_num_rows(mysql_query("SELECT * FROM ocinvites WHERE ocid = '$get_crime_id' AND status = 'Ready'"));
										}
                                    ?>

                                    <form method="post" action="">
                                        <?if($crime_leader >= 1 || $crime_invite >= 1){ ?>
                                            <div class="js-show-on-complete" style="">
                                            	<?php if ($crime_leader >= 1 && $get_crime_members == 2): ?>
                                            	<input type="hidden" name="commit_crime_id" value="<?=$get_crime_id?>">
                                                <button class="textarea curve3px" name="commitoc" style="font-size: 11.5px; padding: 8px 13px 7px 13px;margin-left: 20px; margin-right: 20px; ">
                                                    Commit OC
                                                </button>
                                                <?php endif; ?>
                                                <button class="textarea curve3px" name="leavecc" style="font-size: 11.5px; padding: 8px 13px 7px 13px;margin-left: 20px; margin-right: 20px; ">
                                                    Leave OC
                                                </button>
                                            </div>
                                        <?}else{?>
                                            <?if($htime <= '0'){?>
                                                <div class="js-show-on-complete" style="">
                                                    <button class="textarea curve3px" name="joincc" style="font-size: 11.5px; padding: 8px 13px 7px 13px;margin-left: 20px; margin-right: 20px; ">
                                                        Create OC <span style="color: silver;">($100,000)</span>
                                                    </button>
                                                </div>
                                            <?}else{?>
                                            <div class="js-show-on-complete" style="">
	                                            <font style="display: block; padding: 20px; margin-top: 5px; margin-bottom: 8px; font-size: 12px;">
													Time remaining before you can participate in an OC:
													<b id="oc_timer" class="js-hrminsec-countdown" data-time-left="<?=$htime?>" style="margin-left: 2px; color: #FFC753;"><?php echo date("H:i:s", $htime); ?></b>
												</font>
												<!--
                                            	<span>Time remaining before you can participate in an OC:
                                            		<b id="oc_timer" class="js-hrminsec-countdown" data-time-left="25630" style="margin-left: 2px; color: #FFC753;"><?php echo date("H:i:s", $htime); ?></b>
                                            		
                                            	</span>-->
                                            	<!--
                                                <button class="textarea curve3px" disabled="disabled" name="create" style="font-size: 11.5px; padding: 8px 13px 7px 13px;margin-left: 20px; margin-right: 20px; ">
                                                    Wait <span style="color: gold;">(<?echo"<b>".$leading." ".$totalh." ".date("H:i:s", $timer - $time)."";?>)</span>
                                                </button>
                                                -->
                                            </div>
                                            <?}?>
                                        <?}?>
                                    </form>
                                    <div class="break" style="padding-top: 22px;"></div>
                                    <div class="spacer"></div>

									<? if($htime <= '0'){?>
                                    <? if($crime_leader >= 1 || $crime_invite >= 1){ ?>
                                    <table class="regTable" style="margin: auto; margin-top: 29px; margin-bottom: 15px; width: 87%; max-width: 685px;" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="5" class="header">
                                                Your OC Team
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="subHeader" style="border-left: 0; width: 25%;">Invited</td>
                                            <td class="subHeader" style="width: 25%;">Rank&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td class="subHeader" style="width: 25%;">&nbsp;&nbsp;&nbsp;Location&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td class="subHeader" colspan="2" style="width: 25%;">&nbsp;&nbsp;&nbsp;Status&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                        <?php //$getuserss = mysql_query("SELECT * FROM robbery WHERE city = '$locationn'");
	                                        $get_crime_leader = mysql_query("SELECT * FROM oc WHERE leader = '$gangsterusername'");
	                                        $get_crime_invite = mysql_query("SELECT * FROM ocinvites WHERE username = '$gangsterusername'");
	                                        if (mysql_num_rows($get_crime_leader) > 0) {
	                                        	$get_crime_array = mysql_fetch_array($get_crime_leader);
	                                        	$get_crime_id = $get_crime_array['id'];
	                                        }
	                                        if (mysql_num_rows($get_crime_invite) > 0) {
	                                        	$get_crime_array = mysql_fetch_array($get_crime_invite);
	                                        	$get_crime_id = $get_crime_array['ocid'];
	                                        }
	                                        $_crime = array();
	                                        $_crime_info = mysql_fetch_array(mysql_query("SELECT * FROM oc WHERE id = '$get_crime_id'"));
	                                        $_crime_leader_name = $_crime_info['leader'];
	                                        $get_leader = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$_crime_leader_name'"));
	                                        $_crime['leader'] = array(
	                                        	'username' => $_crime_leader_name,
	                                        	'rankid' => $get_leader['rankid'],
	                                        );
	                                        $_crime['members'] = array();
	                                        $_crime_members_query = mysql_query("SELECT * FROM ocinvites WHERE ocid = '$get_crime_id'");
	                                        while ($_crime_member = mysql_fetch_array($_crime_members_query)) {
	                                        	$_crime_member_name = $_crime_member['username'];
	                                       		$get_member = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$_crime_member_name'"));
	                                        	$_crime['members'][] = array(
													'username' => $_crime_member_name,
	                                        		'rankid' => $get_member['rankid'],
	                                        		'location' => $get_member['location'],
	                                        		'invite_status' => $_crime_member['status'],
												);
											}
											
                                                $leaderrankid = $_crime['leader']['rankid'];
                                                
                                                if ($leaderrankid >= "1" && $leaderrankid < "22") {
                                                	$leader_rank = ${"rank" . $leaderrankid};
                                                } elseif ($leaderrankid == "22") {
                                                    $leader_rank = "<b style='color:#FFC753'>" . ${"rank" . $leaderrankid} . "</b>";
                                                } elseif ($leaderrankid == "25") {
                                                    $leader_rank = "<b style='color:royalblue'>Moderator</b>";
                                                } elseif ($leaderrankid == "50") {
                                                    $leader_rank = "<b style='color:yellow'>Entertainer Manager</b>";
                                                } elseif ($leaderrankid == "75") {
                                                    $leader_rank = "<b style='color:aqua'>HDO Manager</b>";
                                                } elseif ($leaderrankid == "100") {
                                                    $leader_rank = "<b style='color:red'>Administrator</b>";
                                                } else {
                                                    $leader_rank = "";
                                                }
										?>
                                            <tr>
                                                <td class="col noTop">
                                                    <a href="viewprofile.php?username=<?=$gangsterusername?>" style="display: inline-block; width: 100%">
                                                        <?
                                                            echo "<b style=\"float: right; color: #FFC753;\">LEADER&nbsp;</b>";
                                                        ?>
                                                        <?echo $_crime['leader']['username']?> &nbsp;
                                                    </a>
                                                </td>
                                                <td class="col noTop"><span style="color: #aaaaaa;"><?echo $leader_rank;?></span>&nbsp;</td>
                                                <td class="col noTop"><span style="color: #aaaaaa;"><?echo $fulllocation[$locationn]?></span>&nbsp;</td>
                                                <td class="col noTop"><span style="color: #FFC753;"><b>Accepted</b></span></td>
                                                <td class="col noTop"><span style="color: #aaaaaa;"></span></td>
                                            </tr>
                                        <?php
                                            foreach ($_crime['members'] as $member){
                                                $usersname = $member['username'];
                                                $user_invite_status = $member['invite_status'];
                                                $userrankid = $member['rankid'];
                                                $user_location = $member['location'];
                                                if ($userrankid >= "1" && $userrankid < "22") {
                                                	$userrank = ${"rank" . $userrankid};
                                                } elseif ($userrankid == "22") {
                                                    $userrank = "<b style='color:#FFC753'>" . ${"rank" . $userrankid} . "</b>";
                                                } elseif ($userrankid == "25") {
                                                    $userrank = "<b style='color:royalblue'>Moderator</b>";
                                                } elseif ($userrankid == "50") {
                                                    $userrank = "<b style='color:yellow'>Entertainer Manager</b>";
                                                } elseif ($userrankid == "75") {
                                                    $userrank = "<b style='color:aqua'>HDO Manager</b>";
                                                } elseif ($userrankid == "100") {
                                                    $userrank = "<b style='color:red'>Administrator</b>";
                                                } else {
                                                    $userrank = "";
                                                }
                                            ?>
                                                <tr>
                                                    <td class="col noTop">
                                                        <a href="viewprofile.php?username=<?=$usersname?>" style="display: inline-block; width: 100%">
                                                            <?php echo $usersname; ?> &nbsp;
                                                        </a>
                                                    </td>
                                                    <td class="col noTop"><span style="color: #aaaaaa;"><?echo $userrank;?></span>&nbsp;</td>
                                                    <td class="col noTop"><span style="color: #aaaaaa;"><?echo $fulllocation[$user_location]?></span>&nbsp;</td>
                                                    <td class="col noTop">
                                                    	<?php if ($user_invite_status == 'Ready'): ?>
                                                    		<span style="color: #FFC753;"><b>Accepted</b></span>
                                                    	<?php else: ?>
                                                    		<span style="color: white;">Waiting...</span>
                                                    	<?php endif; ?>
                                                    </td>
                                                    <?php if ($_crime['leader']['username'] == $gangsterusername): ?>
                                                	<td class="col noTop">
                                                		<form action="" method="post" class="kick_<?=$usersname?>">
                                                			<input type="hidden" name="kick_user" value="<?=$usersname?>">
                                                		</form>
                                                		<span class="kick_member" style="color: #aaaaaa; cursor: pointer;" kick_user="<?=$usersname?>">Kick</span></td>
                                                	<?php else: ?>
                                                	<td class="col noTop"><span style="color: #aaaaaa;"></span></td>
                                                	<?php endif; ?>
                                                </tr>
                                            <?}
                                        ?>
                                        </tbody>
                                    </table>
                                    <?php if ($crime_leader >= 1 && $get_crime_members < 2): ?>
	                                <div style="margin-bottom: 14px;">
	                                	<form method="post">
	                                        <label>Invite User: <input name="invite_name" class="textarea js-filter-searches" placeholder="Enter Username..." type="text"></label>
	                                        <input type="hidden" name="crime_id" value="<?=$get_crime_id?>">
	                                        <input type="submit" class="textarea" name="invite_btn" value="Invite">
                                        </form>
                                    </div>
                                    <?php endif; ?>
                                    <?} else {?>
	                                    <?php
	                                    	$who_invited_query = mysql_query("SELECT * FROM ocinvites WHERE username = '$gangsterusername'");
	                                    	$inviters = array();
	                                    	while ($who_invited = mysql_fetch_array($who_invited_query)) {
												$inviter_name = $who_invited['f'];
	                                        	$invite_id = $who_invited['id'];
	                                        	$inviter_find = mysql_query("SELECT * FROM users WHERE username = '$inviter_name'");
	                                        	$inviter_info = mysql_fetch_array($inviter_find);
	                                        	if (mysql_num_rows($inviter_find) > 0) {
		                                    		$inviters[] = array(
		                                    			'inviter_name' => $who_invited['f'],
		                                    			'invite_id' => $who_invited['id'],
		                                    			'inviter_rankid' => $inviter_info['rankid'],
		                                    			'inviter_location' => $inviter_info['location'],
		                                    		);
	                                        	}
											}
	                                    ?>
                                        <table class="regTable" style="margin: auto; margin-top: 29px; margin-bottom: 15px; width: 87%; max-width: 685px;" cellspacing="0" cellpadding="0">
	                                        <tbody>
		                                        <tr>
		                                            <td colspan="5" class="header">
		                                                Users who have invited you
		                                            </td>
		                                        </tr>
		                                        <tr>
		                                            <td class="subHeader" style="border-left: 0; width: 25%; text-align: center;">Invited</td>
		                                            <td class="subHeader" style="width: 25%; text-align: center;">Rank</td>
		                                            <td class="subHeader" style="width: 25%; text-align: center;">Location</td>
		                                            <td class="subHeader" colspan="2" style="width: 25%; text-align: center;">Actions</td>
		                                        </tr>
		                                        <?php if (!empty($inviters)): ?>
		                                        <?php foreach ($inviters as $inviter): ?>
		                                        <?php
		                                        	$inviter_name = $inviter['inviter_name'];
		                                        	$invite_id = $inviter['invite_id'];
			                                        $userrankid = $inviter['inviter_rankid'];
			                                        $inviter_location = $inviter['inviter_location'];
	                                                if ($userrankid >= "1" && $userrankid < "22") {
	                                                	$userrank = ${"rank" . $userrankid};
	                                                } elseif ($userrankid == "22") {
	                                                    $userrank = "<b style='color:#FFC753'>" . ${"rank" . $userrankid} . "</b>";
	                                                } elseif ($userrankid == "25") {
	                                                    $userrank = "<b style='color:royalblue'>Moderator</b>";
	                                                } elseif ($userrankid == "50") {
	                                                    $userrank = "<b style='color:yellow'>Entertainer Manager</b>";
	                                                } elseif ($userrankid == "75") {
	                                                    $userrank = "<b style='color:aqua'>HDO Manager</b>";
	                                                } elseif ($userrankid == "100") {
	                                                    $userrank = "<b style='color:red'>Administrator</b>";
	                                                } else {
	                                                    $userrank = "";
	                                                }
		                                        ?>
			                                        <tr>
			                                            <td class="subHeader" style="border-left: 0; width: 25%; text-align: center;">
	                                                        <a href="viewprofile.php?username=<?=$inviter_name?>" style="display: inline-block; width: 100%">
	                                                            <?php echo $inviter_name; ?> &nbsp;
	                                                        </a>
	                                                    </td>
			                                            <td class="subHeader" style="width: 25%; text-align: center;"><?=$userrank?></td>
			                                            <td class="subHeader" style="width: 25%; text-align: center;"><?=$fulllocation[$inviter_location]?></td>
			                                            <td class="subHeader" style="width: 12.5%; text-align: center;" invite_id="<?=$invite_id?>">
			                                            	<form action="" method="post" class="accept_<?=$invite_id?>">
			                                            		<input type="hidden" name="invite_id" value="<?=$invite_id?>">
			                                            		<input type="hidden" name="inviter_location" value="<?=$inviter_location?>">
			                                            		<input type="hidden" name="my_location" value="<?=$locationn?>">
			                                            	</form>
			                                            	<span class="accept_invite" style="color: #FFC753; cursor: pointer;">Accept</span>
			                                            </td>
			                                            <td class="subHeader" style="width: 12.5%; text-align: center;" invite_id="<?=$invite_id?>">
			                                            	<span class="decline_invite" style="color: #aaaaaa; cursor: pointer;">Deny</span>
			                                            </td>
			                                        </tr>
		                                        <?php endforeach; ?>
		                                        <?php else: ?>
			                                        <tr>
			                                            <td colspan="3" class="col noTop">
			                                                No invites
			                                            </td>
			                                        </tr>
		                                        <?php endif; ?>
	                                        </tbody>
                                        </table>
                                    <?}?>
                                    <?}?>
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
				if (isset($_POST['add_oc_comment'])) {
					echo $_POST['reply_user'];
					$content = $_POST['sendinfo'];
					$likes = 0;
					$time = date('Y-m-d H:i:s');
					if (isset($_POST['reply_user']) && $_POST['reply_user'] != '') {
						$replyto = $_POST['reply_user'];
					}
					else {
						$replyto = 'none';
					}
					mysql_query("INSERT INTO ocforum 
						SET username = '$gangsterusername', 
						content = '$content', 
						likes = '$likes', 
						time = '$time', 
						replyto = '$replyto'");
				}
            ?>
        	<?php
        		$oc_forum = mysql_query("SELECT * FROM ocforum ORDER BY id DESC");
        	?>
        	<?php while ($oc_forum_messages = mysql_fetch_array($oc_forum)): ?>
        	<?php 
        		$postid = $oc_forum_messages['id'];
            	$showlikes = $oc_forum_messages['likes']; 
            	$liked = $oc_forum_messages['liked'];
            	$liked_array = explode(',', $liked);
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
                                <div class="menuHeader noTop" style="text-align: left; padding-left: 6px;  font-size: 10px;">
                                    <span style="float: right;">
                                    	<?php if (!in_array($gangsterusername, $liked_array)): ?>
                                        <a href="#" rel="nofollow" class="like_oc_post" like_post_id="<?=$postid?>" who_likes="<?=$gangsterusername?>" who_liked="<?=$liked?>">Like</a>
                                        <span class="miniSep" id="like177181"> - </span>
                                        <?php endif; ?>
                                        <span style="cursor: pointer; color: silver; font-size: 10px;" class="masterTooltip">
                                        	<?php
                                                $now = new DateTime();
                                                $time = DateTime::createFromFormat('Y-m-d H:i:s', $oc_forum_messages['time']);
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
                                            ?>
                                        </span>
                                    </span>
                                    <a href="viewprofile.php?username=<?=$oc_forum_messages['username']?>" style=""><?=$oc_forum_messages['username']?></a>
                                    <span class="show_likes" who_liked="<?=$liked?>" <?if($showlikes==0){?>style="display: none;"<?}?> id="p<?echo$postid;?>">
                                        <span class="miniSep"> - </span>
                                        <a href="#" onclick="return false;" id="u<?echo$postid;?>" style="font-weight: bold; color: lime;">+<?echo$showlikes;?></a>
                                    </span>
                                    <?
                                    if($oc_forum_messages['username'] != $gangsterusername){?>
                                        <span class="miniSep">&nbsp;-&nbsp;</span>
                                        <a href="#" onclick="replyToPost('<? echo $oc_forum_messages['username'];?>'); return false;" style="color: #676767;">Reply</a>
                                    <?} ?>
                                </div>
                                <div style="padding: 5px; margin: auto; color: #fefefe; text-align: left; max-height: 350px; overflow-y: auto;">
                                    <? echo nl2br($oc_forum_messages['content']); ?>
                                </div>
                                <div class="break" style="padding-top: 5px;">
                                    <div class="spacer"></div>
                                    <?php if ($rankid >= 22): ?>
                                    <div class="break" style="padding-top: 4px;">
                                        <a href="#" rel="nofollow" class="delete_oc_post" del_post_id="<?=$postid?>" style="display: inline-block; margin-left: 5px; margin-right: 2px; padding-bottom: 5px;">Delete</a>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ($oc_forum_messages['replyto'] != 'none'): ?>
                                    <div class="break" style="padding-top: 4px;">
                                        <div style="text-align: right; padding: 5px; padding-right: 6px; padding-top: 1px;">
                                        	Replied to: <a href="viewprofile.php?username=<?=$oc_forum_messages['replyto']?>"><?=$oc_forum_messages['replyto']?></a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
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
            <?php endwhile; ?>
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
                                Add comment
                            </div>
                            <form action="" method="post" style="padding: 3px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; min-width: 220px; width: 65%; max-width: 410px; box-sizing: border-box;">
	                                <div id="replyForm" style="display: none; padding: 2px; padding-bottom: 4px;">
	                                    Replying to: <input readonly="readonly" name="reply_user" class="textarea" value="" id="replyingToCommentUsername" type="text">&nbsp;&nbsp;
	                                    <a href="#" onclick="cancelReply(); return false;">(cancel)</a>
	                                </div>
                                    <textarea tabindex="5" name="sendinfo" style="box-sizing: border-box; height: 130px; width: 100%;" id="msgOrComment" placeholder="Enter Comment..." class="textarea inline_form" ></textarea>
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
                                    <input type ="submit" tabindex="6" style="padding-left: 8px; padding-right: 8px; margin-top: 4px; margin-bottom: 3px;" value="Post Comment!" class="textarea curve3px" name="add_oc_comment">
                                </div>
                                <div class="break" style="padding-top: 12px;">
                                    <div class="spacer"></div>
                                </div>
                            </form>
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
            <script>
            	$(document).ready(function() {
            		
            		$(".accept_invite").on("click", function() {
            			var invite_id = $(this).parent("td").attr("invite_id");
            			$(".accept_" + invite_id).submit();
            			/*var crime_data = {
							invite_id: invite_id,
							action: 'accept',	
						};
						$.post("crime_actions.php", crime_data, function(response) {
							if (response) window.location.reload(true);
						});*/
            		});
            		$(".decline_invite").on("click", function() {
            			var invite_id = $(this).parent("td").attr("invite_id");
            			var crime_data = {
							invite_id: invite_id,
							action: 'decline',	
						};
						$.post("crime_actions.php", crime_data, function(response) {
							if (response) window.location.reload(true);
						});
            		});
            		$(".kick_member").on("click", function() {
            			if (confirm('Are you sure?')) {
							var kick_user = $(this).attr("kick_user");
							$(".kick_" + kick_user).submit();
						}
            		});
            		
            		$(".like_oc_post").on("click", function() {
            			var like_post_id = $(this).attr("like_post_id");
            			var who_likes = $(this).attr("who_likes");
            			var who_liked = $(this).attr("who_liked");
            			var add_like_data = {
            				like_post_id: like_post_id, 
            				who_likes: who_likes, 
            				who_liked: who_liked
            			};
						$.post("crime_actions.php", add_like_data, function(response) {
							if (response) window.location.reload(true);
						});
            		});
            		$(".delete_oc_post").on("click", function() {
            			var del_post_id = $(this).attr("del_post_id");
						$.post("crime_actions.php", {del_post_id: del_post_id}, function(response) {
							if (response) window.location.reload(true);
						});
            		});
            		
            	});
            </script>
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
<!--
		<div id="hoverDiv" class="hoverDiv show_oc_likes" style="padding-top: 170px; display: none;">
		    <table class="menuTable curve10px" style="width: 280px; z-index: 2000;  overflow: hidden;" cellspacing="0" cellpadding="0" align="center">
		        <tbody>
		        <tr>
		            <td class="topleft"></td>
		            <td class="top"></td>
		            <td class="topright"></td>
		        </tr>
		        <tr>
		            <td class="left"></td>
		            <td>
		                <div style="position: relative; display: block;">
		                    <div class="menuHeader noTop shadowTest" style="width: 100%; box-sizing: border-box; -moz-box-sizing: border-box; position: absolute;">
		                        Liked By:
		                        <a href="#" onclick="closeLikes(); return false;" style="margin-left: -35px; float: right;  opacity: 0.80; filter: alpha(opacity=80); -ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=80)';">close</a>
		                    </div>
		                    <div class="main recentAc preventscroll" id="likedBy" style="line-height: 150%;">
		                    	<div style="padding: 12px; padding-left: 14px;">
		                    		<a href="viewprofile.php?username=Lol" style="margin-top: 5px; font-size: 10px;">Lol</a><br>
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
		</div>-->
</body>
</html>