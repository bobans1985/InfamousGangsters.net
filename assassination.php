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
<?php
$sql="SELECT * from users WHERE username='$usernameone' LIMIT 1";
$result=mysql_query($sql);
while($rows=mysql_fetch_array($result)){ // Start looping table row  

$missionid = $rows['mission'];

if ($missionid != 3){
echo "Nice Try!! <br> You are not onto that mission yet or you have comleted it!";
//include_once"a.php";
exit();
}

//$username=$_SESSION['real_name'];

//Check is user in jail here <--

$query=mysql_query("SELECT * FROM users WHERE username='$usernameone'");
$fetch=mysql_fetch_object($query);
/*print '<pre>';
var_dump($fetch);
print '</pre>';*/

$healthdrop = rand(10,25);
$newhealth = $fetch->health - $healthdrop;
$guardno = $_GET['guard'];

if ($fetch->status == 'Dead') {
	echo "You are dead!";
	include_once "a.php";
	exit();
}
$need_bullets = 1337 + ($guardno + 1)*1000;
if ($guardno < 0){
echo "You have either completed this or "; 
echo $message;
include_once "a.php";
}elseif ($fetch->bullets <= $need_bullets){
echo "you dont have enough bullets";
include_once "a.php";
}else{
if ($guardno > $fetch->guard){
echo "Your not on that guard yet!";
include_once "a.php";
}else{
if ($fetch->guard == "29" && $fetch->payout == "1"){
echo "<center><b>You have already wiped out the final guard!</b></center>";
include_once "a.php";
exit();
}elseif ($fetch->guard == "29" && $fetch->payout == "0"){
echo "You have wiped out the final Assassin!<br>Well done!";

mysql_query("UPDATE users SET payout='1' WHERE username='$usernameone'");
mysql_query("UPDATE users SET mission='4' WHERE username='$usernameone'");
include_once "a.php";
exit();
}elseif ($guardno == $fetch->guard){
$nextguard = $fetch->guard + 1;
$newbullets = $fetch->bullets - 1337;
mysql_query("UPDATE users SET bullets='$newbullets' WHERE username='$usernameone'");
$moneybon = $fetch->money + (100000000 * ($guardno + 1));
mysql_query("UPDATE users SET money='$moneybon' WHERE username='$usernameone'");
$nextrank = $fetch->rankup + 3.337;
$rankid = $fetch->rankid;
if ($nextrank >= 100) {
	$newrankid = $rankid + 1;
	$newrankup = $nextrank - 100;
	mysql_query("UPDATE users SET rankid='$newrankid', rankup='$newrankup' WHERE username='$usernameone'");
}
else {
	mysql_query("UPDATE users SET rankup='$nextrank' WHERE username='$usernameone'");
}

mysql_query("UPDATE users SET guard='$nextguard' WHERE username='$usernameone'");
if ($newhealth <= 0) {
	mysql_query("UPDATE users SET health='0', status='Dead' WHERE username='$usernameone'");
	mysql_query("DELETE FROM usersonline WHERE username = '$usernameone'");
	header("Location: logout.php?id=" . $sessionid);
}
else {
	mysql_query("UPDATE users SET health='$newhealth' WHERE username='$usernameone'");
}

}}}}

?>
                        <div class="main curve2px">
                            <div class="menuHeader noTop">
                                Mission Task
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <table class="regTable" style="margin: auto; margin-bottom: 18px; width: 90%; max-width: 1200px;"
                                           cellspacing="0" cellpadding="0">
                                        <tbody style="width:100%">
											<tr>
												<td colspan="2" class="header">
													Assassination
												</td>
											</tr>
											<tr class='row'>
												<td class='col noTop'>
													<center>
															Kill the assassins and protect Donald Trump secretary of state <br>
															You Will Be Greatly Rewarded <br>
															You can leave here at anytime and return at anytime you want and you will still be on the same assassin! <br>
															Dont forget to keep visiting the hospital or the points page <br>
															as each assassin tends to pack quite a shot and if you dont REFILL your health, you WILL die so keep an eye on your health bar <br>
															NOTE:We WILL NOT Revive You If You Die!! <br>
														<br>
														<!--
														<center>
															<a href="assassination.php?guard=1"><font color=white>Refresh!</font></a>
															<font color=white> || </font>
															<a href="Hospital.php"><font color=white>Heal!</font></a>
															<font color=white> || </font>
															<a href="BF.php"><font color=white>Bullets!</font></a>
														</center>
														-->
													</center>
												</td>
											</tr>
                                        </tbody>
                                    </table>
									<table width="50%" border="0" align="center">
									<?php
										$assassins_list = array(
											"CaptainPrice", 
											"Pelayo", 
											"Gaz", 
											"ImranZakhaev", 
											"JohnMacTavish", 
											"KhaledAl-Asad", 
											"Vasquez", 
											"MacMillan", 
											"Nikolai", 
											"Kamarov", 
											"PaulJackson",  
											"Daletski", 
											"VictorZakhaev", 
											"VladimirMakarov", 
											"SoapMacTavish", 
											"Blake", 
											"Carlos", 
											"Coen",  
											"Gaines", 
											"Salvatore", 
											"Hassler", 
											"Kaylor", 
											"Lehmkuhl", 
											"Letlev", 
											"Markhov", 
											"Massey", 
											"Dimitriy", 
											"Randall", 
											"Roebuck", 
											"Roycewicz", 
											"Schuster", 
											"Stavro", 
											"Telinov", 
											"Swift"
										);
									?>
									<?php for ($i = 0; $i <= 33; $i++): ?>
										<?php if ($i == 0 || $i % 5 == 0): ?>
											<tr>
										<?php endif; ?>
											<td>
												<?php if ($fetch->guard == $i): ?>
													<a href="viewprofile.php?username=<?=$assassins_list[$i]?>">Assassin: <b style='color:gold'><?=$assassins_list[$i]?></b></a>
												<?php endif; ?>	
											</td>
										<?php if ($i == 4 || $i % 5 == 4): ?>
											</tr>
										<?php endif; ?>
									<?php endfor; ?>
									    <!--
									    <tr>
									      <td><?php if ($fetch->guard == "0"){ echo "<a href='assassination.php?guard=0'>Assassin 1</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "1"){ echo "<a href='assassination.php?guard=1'>Assassin 2</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "2"){ echo "<a href='assassination.php?guard=2'>Assassin 3</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "3"){ echo "<a href='assassination.php?guard=3'>Assassin 4</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "4"){ echo "<a href='assassination.php?guard=4'>Assassin 5</a>"; } ?></td>
									    </tr>
									    <tr>
									      <td><?php if ($fetch->guard == "5"){ echo "<a href='assassination.php?guard=5'>Assassin 6</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "6"){ echo "<a href='assassination.php?guard=6'>Assassin 7</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "7"){ echo "<a href='assassination.php?guard=7'>Assassin 8</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "8"){ echo "<a href='assassination.php?guard=8'>Assassin 9</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "9"){ echo "<a href='assassination.php?guard=9'>Assassin 10</a>"; } ?></td>
									    </tr>
									    <tr>
									      <td><?php if ($fetch->guard == "10"){ echo "<a href='assassination.php?guard=10'>Assassin 11</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "11"){ echo "<a href='assassination.php?guard=11'>Assassin 12</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "12"){ echo "<a href='assassination.php?guard=12'>Assassin 13</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "13"){ echo "<a href='assassination.php?guard=13'>Assassin 14</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "14"){ echo "<a href='assassination.php?guard=14'>Assassin 15</a>"; } ?></td>
									    </tr>
									    <tr>
									      <td><?php if ($fetch->guard == "15"){ echo "<a href='assassination.php?guard=15'>Assassin 16</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "16"){ echo "<a href='assassination.php?guard=16'>Assassin 17</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "17"){ echo "<a href='assassination.php?guard=17'>Assassin 18</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "18"){ echo "<a href='assassination.php?guard=18'>Assassin 19</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "19"){ echo "<a href='assassination.php?guard=19'>Assassin 20</a>"; } ?></td>
									    </tr>
									    <tr>
									      <td><?php if ($fetch->guard == "20"){ echo "<a href='assassination.php?guard=20'>Assassin 21</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "21"){ echo "<a href='assassination.php?guard=21'>Assassin 22</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "22"){ echo "<a href='assassination.php?guard=22'>Assassin 23</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "23"){ echo "<a href='assassination.php?guard=23'>Assassin 24</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "24"){ echo "<a href='assassination.php?guard=24'>Assassin 25</a>"; } ?></td>
									    </tr>
									    <tr>      
									      <td><?php if ($fetch->guard == "25"){ echo "<a href='assassination.php?guard=25'>Assassin 26</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "26"){ echo "<a href='assassination.php?guard=26'>Assassin 27</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "27"){ echo "<a href='assassination.php?guard=27'>Assassin 28</a>"; } ?></td>
									      <td><?php if ($fetch->guard == "28"){ echo "<a href='assassination.php?guard=28'>Assassin 29</a>"; } ?></td>
									    </tr>
									    -->
									</table>
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
                                          style="position: relative; top: -0.75px;">�</span></span>
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