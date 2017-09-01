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
        .col {
            padding-bottom:15px;
            width:50%;
        }
        .left-col {
            float:left;
        }
        .right-col {
            float:right;
        }
        @media screen and (max-width: 1280px) {
            .col {
                width:100%;
                text-align:center;
            }
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
            <?php
            $saturate = "/[^a-z0-9]/i";
            $saturater = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $post = $_POST['id'];
            $fora = $_POST['amount'];
            $foraa = $_POST['amountt'];
            $anona = $_POST['anon'];
            $namea = $_POST['name'];
            $selection = $_POST['action'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $postid = preg_replace($saturater,"",$post);
            $for = preg_replace($saturater,"",$fora);
            $forr = preg_replace($saturater,"",$foraa);
            $anon = preg_replace($saturater,"",$anona);
            $name = preg_replace($saturate,"",$namea);
            $type = preg_replace($saturater,"",$selection);
            $userip = $_SERVER[REMOTE_ADDR];
            $reasonraw = $_POST['reason'];
            $reason = htmlentities($reasonraw, ENT_QUOTES);

            $gangsterusername = $usernameone;

            $rank= $myrank;
            $money= $statustesttwo['money'];
            $points= $statustesttwo['points'];

            if(isset($_POST['id'])){
                $check = mysql_query("SELECT * FROM hitlist WHERE id = '$postid'");
                $rows = mysql_num_rows($check);
                if($rows < '1'){}
                else{
                    $array = mysql_fetch_array($check);
                    $nam = $array['username'];
                    $buytype = $array['type'];
                    $buyoff = $array['amount'];
                    $buyoffa = number_format($array['amount']);
                    if($buytype == 1){
                        if($buyoff > $money){$showoutcome++; $outcome = "You dont have enough money!</font>";}
                        mysql_query("UPDATE users SET money = (money - $buyoff) WHERE username = '$gangsterusername'AND money >= '$buyoff'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}}else{
                        if($buyoff > $points){$showoutcome++; $outcome = "You dont have enough points!</font>";}
                        mysql_query("UPDATE users SET points = (points - $buyoff) WHERE username = '$gangsterusername'AND points >= '$buyoff'");
                        if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1 2.</font>');}}

                    mysql_query("DELETE FROM hitlist WHERE id = '$postid'")or die("Error");

                    $sendinfo = "\[b\]$gangsterusername bought you off the hitlist!\[\/b\]";
                    mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$nam','$nam','no','$userip','$sendinfo')");
                    $showoutcome++; $outcome = "You bought $nam off the hitlist!</font>";}}


            elseif(isset($_POST['name'])){
                $check = mysql_query("SELECT * FROM users WHERE username = '$name'");
                $rows = mysql_num_rows($check);
                $check_user_info = mysql_fetch_array($check);
                if($rows < '1'){$showoutcome++; $outcome = "No such user</font>";}
                elseif ($check_user_info['rankid'] >= 25) {
					$showoutcome++;
					$outcome = "You cannot hitlist this person";
				}
                else{
                    $array = mysql_fetch_array($check);
                    $status = $array['status'];
                    if($status == 'Dead'){$showoutcome++; $outcome = "This user is already dead!</font>";}
                    elseif($type == 1 AND $for < '10000000'){$showoutcome++; $outcome = "You cannot hitlist someone for less than $10,000,000!</font>";}
                    elseif($type == 2 AND $for < '100'){$showoutcome++; $outcome = "You cannot hitlist someone for less than 100 points!</font>";}
                    elseif($type == 1 AND $for > $money){$showoutcome++; $outcome = "You dont have enough money!</font>";}
                    elseif($type == 2 AND $for > $points){$showoutcome++; $outcome = "You dont have enough points!</font>";}
                    else{
                        if($type == 1){ mysql_query("UPDATE users SET money = (money - $for) WHERE username = '$gangsterusername' AND money >= '$for'")or die("Error"); }
                        if($type == 2){ mysql_query("UPDATE users SET points = (points - $for) WHERE username = '$gangsterusername' AND points >= '$for'")or die("Error Error"); }
                        $for2 = number_format($for);
                        $homeinfo = "\[b\]$name\[\/b\] has been hitlisted!";
                        mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$name','$homeinfo','2')");
                        mysql_query("INSERT INTO hitlist(username,reason,type,amount,killer)
VALUES ('$name','$reason','$type','$for','$gangsterusername')");
                        $showoutcome++; $outcome = "You added $name to the hitlist!</font>";$sendinfo = "\[b\]You have been hitlisted!\[\/b\]";
                        mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$name','$name','no','$userip','$sendinfo')");}}}

            $hitlist = mysql_query("SELECT * FROM hitlist WHERE type = 1 ORDER BY amount DESC");
            $hitlist2 = mysql_query("SELECT * FROM hitlist WHERE type = 2 ORDER BY amount DESC");
            $raw = mysql_num_rows($hitlist);
            $raw2 = mysql_num_rows($hitlist2);



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
                               Hitlist
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <form method="post">
                                        <table class="regTable" style="min-width: 230px; width: 96%; max-width: 700px;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td class="header" colspan="45" style="padding: 11px;">
                                                    Hitlisted Users:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="subHeader" colspan="2" style="border-left: 0; width: 10%;">Victim</td>
                                                <td class="subHeader" style="width: 10%;">Hitlisted By</td>
                                                <td class="subHeader" style="width: 10%;">Reward</td>
                                                <td class="subHeader" style="width: 10%;">Added</td>
                                                <td class="subHeader" style="width: 25%;">Reason</td>
                                            </tr>
                                            <? if($raw2 == '0' AND $raw == '0'){?>
                                                <tr>
                                                    <td class="col noTop" colspan="6">There is currently nobody on the hitlist!</td>
                                                </tr><?}
                                            while($hit2 = mysql_fetch_array($hitlist2)){
                                                $hitname = $hit2['username'];
                                                $hitamount = number_format($hit2['amount']);
                                                $by = $hit2['killer'];
                                                $id = $hit2['id'];
                                                $time = $hit2['time'];
                                                $reason = html_entity_decode($hit2['reason'],ENT_NOQUOTES);
                                                ?>
                                                <tr>
                                                    <td class="col noTop" style="width: 1%;"><input name="id" value="<?echo$id;?>" type="radio"></td>
                                                    <td class="col noTop" style="width: 10%; padding: 10px; padding-right: 20px;"><a href="viewprofile.php?username=<?echo$hitname;?>"><?echo$hitname;?></a></td>
                                                    <td class="col noTop" style="width: 10%; padding: 10px; padding-right: 20px;"><a href="viewprofile.php?username=<?echo$by;?>"><?echo$by;?></a></td>
                                                    <td class="col noTop" style="width: 10%; padding: 10px; padding-right: 20px;"><?echo$hitamount;?> points</td>
                                                    <td class="col noTop" style="width: 10%; padding: 10px; padding-right: 20px;"><span class="masterTooltip" title="<?$title_time=DateTime::createFromFormat('Y-m-d H:i:s',$time); echo $title_time->format('Y-m-d H:i:s');?>">
                                                            <?
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
                                                            ?>
                                                        </span></td>
                                                    <td class="col noTop" style="width: 25%; padding: 10px; padding-right: 10px;"><div style="white-space: pre-wrap; max-width: 300px; max-height: 300px; overflow: auto;"><?if($reason!=''){echo$reason;}else{echo "-";}?></div></td>

                                                </tr>
                                            <? }
                                            while($hit = mysql_fetch_array($hitlist)){
                                                $hitname2 = $hit['username'];
                                                $hitamount2 = number_format($hit['amount']);
                                                $by2 = $hit['killer'];
                                                $id2 = $hit['id'];
                                                $time2 = $hit['time'];
                                                $reason2 = html_entity_decode($hit['reason'],ENT_NOQUOTES);
                                                ?>
                                                <tr>
                                                    <td class="col noTop" style="width: 1%;"><input name="id" value="<?echo$id2;?>" type="radio"></td>
                                                    <td class="col noTop" style="width: 10%; padding: 10px; padding-right: 20px;"><a href="viewprofile.php?username=<?echo$hitname2;?>"><?echo$hitname2;?></a></td>
                                                    <td class="col noTop" style="width: 10%; padding: 10px; padding-right: 20px;"><a href="viewprofile.php?username=<?echo$by2;?>"><?echo$by2;?></a></td>
                                                    <td class="col noTop" style="width: 10%; padding: 10px; padding-right: 20px;">$<?echo$hitamount2;?></td>
                                                    <td class="col noTop" style="width: 10%; padding: 10px; padding-right: 20px;"><span class="masterTooltip" title="<?$title_time=DateTime::createFromFormat('Y-m-d H:i:s',$time2); echo $title_time->format('Y-m-d H:i:s');?>">
                                                            <?
                                                            $now=new DateTime();
                                                            $time=DateTime::createFromFormat('Y-m-d H:i:s',$time2);
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
                                                            ?>
                                                        </span></td>
                                                    <td class="col noTop" style="width: 25%; padding: 10px; padding-right: 10px;"><div style="white-space: pre-wrap; max-width: 300px; max-height: 300px; overflow: auto;"><?if($reason2!=''){echo$reason2;}else{echo "-";}?></div></td>

                                                </tr>
                                            <? } ?>
                                            <tr>
                                                <td colspan="45"><input name="buy_off" class="textarea" style="border-left: 0; width: 100%;" value="Buy Off!" type="submit"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <div class="break" style="padding-top: 39px;"></div>
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 37px;"></div>
                                    <div style="text-align: center;">
                                        <table class="regTable" style="margin-bottom: 11px; width: 92%; max-width: 400px;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td class="header" colspan="2">
                                                    Add user to Hitlist
                                                </td>
                                            </tr>
                                            <form action="" method="post">
                                                <tr>
                                                    <td><input type="text" name="name" class="textarea noTop" style="border-left: 0; width: 100%;" placeholder="Enter Victim's Username..."></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="amount" class="textarea" style="border-left: 0; width: 100%;" placeholder="Enter Money Reward..."></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <SELECT id="pay_hitlist" NAME="action" class="textarea" style="border-left: 0; width: 100%;">
                                                            <OPTION value=1>Money</OPTION>
                                                            <OPTION value=2>Points</OPTION>
                                                        </SELECT>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><textarea name="reason" class="textarea" style="height: 55px; border-left: 0; width: 100%;" placeholder="Enter Reason (Optional)..."></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td><input type ="submit" style="border-left: 0; width: 100%; padding-left: 6px; padding-right: 6px;" value="Add Hitlist" class="textarea curve3pxBottom" name="do"></td>
                                                </tr>
                                            </form>
                                            </tbody>
                                        </table>
										<script>
											$(document).ready(function() {
												$("#pay_hitlist").on("change", function() {
													var pay_type = $("#pay_hitlist option:selected").val();
													if (pay_type == 1) {
														$("input[name='amount']").attr("placeholder", "Enter Money Reward...");
													}
													if (pay_type == 2) {
														$("input[name='amount']").attr("placeholder", "Amount...");
													}
												});
											});
										</script>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="break" style="padding-top: 10px;"></div>
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 23px;"></div>
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