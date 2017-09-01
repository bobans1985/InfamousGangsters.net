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
            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;
            $playerrank = $myrank;
            $playerarray = $statustesttwo;
            $playerrank = $playerarray['rankid'];
            $getcrewid = $playerarray['crewid'];
            $drugtime = $playerarray['drugtime'];

            $guessopen = mysql_query("SELECT * FROM gametimes WHERE game = 'weekly'");
            $openx = mysql_fetch_array($guessopen);
            $openxox = $openx['time'];

            if($getcrewid == 0){die('<font color=white size=1 face=verdana>You must join  a crew to do this!</font>');}

            $getcrewinfoo = mysql_query("SELECT * FROM crews WHERE id = '$getcrewid'");
            $getcrewinfo = mysql_fetch_array($getcrewinfoo);
            $owner = $getcrewinfo['boss'];
            $drugprice = $getcrewinfo['drugprice'];
            $crewmoney = 400000 - $drugprice;

            if ($_POST['create']){
                if((time() < $drugtime) ) { $showoutcome++; $outcome = "You can not produce any more drugs yet!";}else{
                    $timestart = time();
                    $total_time=time()+1800;
                    mysql_query("UPDATE users SET drugtime = '$total_time', money = (money + '$drugprice'), crewdrugs = (crewdrugs + 1) WHERE ID = '$ida'");
                    mysql_query("UPDATE crews SET cash = (cash + '$crewmoney') WHERE id = '$getcrewid'");
                    mysql_query("UPDATE missiontasks SET crewmoney = crewmoney + $crewmoney WHERE username = '$usernameone'");
                    if($openxox == 2){ mysql_query("UPDATE weeklychal SET total = (total + 1) WHERE username = '$usernameone'"); }
                    $showoutcome++; $outcome = "You successfully produced drugs for your crew!";
                }}

            if ($_POST['change']){
                $giveamount = mysql_real_escape_string(htmlentities($_POST['price']));
                if (ereg('[^0-9]', $_POST['price'])){ $showoutcome++; $outcome = "Invalid amount."; }else{
                    if ($giveamount <= 0){ $showoutcome++; $outcome = "Price per drug must be between $1 and $750,000";
                    }elseif($giveamount > 400000){ $showoutcome++; $outcome = "Price per drug must be between $1 and $750,000"; }else{
                        $sendamount1=number_format($_POST['price']);
                        mysql_query("UPDATE crews SET drugprice='$giveamount' WHERE id='$getcrewid'");
                        $showoutcome++; $outcome = "Price per drug is now $$sendamount1!";
                    }}}

            $crewusersinfosql = mysql_query("SELECT * FROM users WHERE crewid = '$getcrewid' ORDER BY crewdrugs DESC");
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
                                Crews Drugs
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">

                                <? if($owner == $usernameone){ ?>
                                <div align="center" style="padding-top:20px;">
                                    <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 550px;text-align: center;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                        <tr>
                                            <td class="header" colspan="3">
                                                Edit Track Stats
                                            </td>
                                        </tr>
                                        <form method=post>
                                            <tr>
                                                <td class="col noTop">
                                                    <span>Change drug price:</span>
                                                </td>
                                                <td class="col noTop">
                                                    <input type=text name=price class="textarea" style="width:100%; height:100%;">
                                                </td>
                                                <td class="col noTop">
                                                    <input type=submit value="Do it" class="textarea curve3px" name=change>
                                                </td>
                                            </tr>
                                        </form>
                                        </tbody>
                                    </table>
                                </div>
                                <?}?>
                                <div class="miniMenu shadowTest curve3px" style="min-width: 245px; max-width: 700px; width: 80%; margin-top: 30px;">
                                    <div class="miniMenuHeader noTop" style="padding: 7px; color: #ffffff;">
                                        Drugs Produced:
                                    </div>
                                    <table class="miniMain txtShadow" padding="0" style="border-collapse: collapse; " width="100%;" cellspacing="2">
                                        <tbody><tr style="border-bottom: 1px solid #080808;">
                                            <td class="statsDivHeader" style="border-right: 0; border-left: 0; border-bottom: 0;" width="1%"></td>
                                            <td class="statsDivHeader" style="width: 40%; border-bottom: 0;">User</td>
                                            <td class="statsDivHeader" style="padding-right: 15px; border-bottom: 0; width: 40%;">Total</td>
                                        </tr>
                                        <?
                                        $num = 0;
                                        $total_melted=0;
                                        while($crewusersinfoarray = mysql_fetch_array($crewusersinfosql)){

                                            $num++;
                                            $melted = $crewusersinfoarray['crewdrugs'];
                                            $meltedname = $crewusersinfoarray['username'];
                                            $total_melted=$total_melted+$melted;

                                            if($num==1){?>
                                                <tr style="background-color: #303030;">
                                                    <td class="statsDiv" style="color: #999999; background-color: #303030;border-top:none;">
                                                        <span class="statsDivStatic" style="border-top: none; font-size: 11.25px;"><span style="color: #FFC753;">#<?echo $num;?></span></span>
                                                    </td>
                                                    <td class="statsDiv">
                                                        <a style="border-top: none; color: #FFC753; font-size: 11.25px;" href="viewprofile.php?username=<?echo $meltedname;?>"><?echo $meltedname;?></a>
                                                    </td>
                                                    <td class="statsDiv" style="color: #999999; color: #FFC753; border-top: none;">
                                                        <span class="statsDivStatic" style="border-top: none; font-size: 11.25px;"><?echo $melted;?></span>
                                                    </td>
                                                </tr>
                                            <?}elseif($num==2){?>
                                                <tr style="background-color: #303030;">
                                                    <td class="statsDiv" style="color: #999999; background-color: #303030; ">
                                                        <span class="statsDivStatic" style=" font-size: 11.25px;"><span style="color: #efefef;">#<?echo $num;?></span></span>
                                                    </td>
                                                    <td class="statsDiv">
                                                        <a style=" color: #efefef; font-size: 11.25px;" href="viewprofile.php?username=<?echo $meltedname;?>"><?echo $meltedname;?></a>
                                                    </td>
                                                    <td class="statsDiv" style="color: #999999; color: #efefef; ">
                                                        <span class="statsDivStatic" style=" font-size: 11.25px;"><?echo $melted;?></span>
                                                    </td>
                                                </tr>
                                            <?}elseif($num==3){?>
                                                <tr style="background-color: #303030;">
                                                    <td class="statsDiv" style="color: #999999; background-color: #303030; ">
                                                        <span class="statsDivStatic" style=" font-size: 11.25px;"><span style="color: #dadada;">#<?echo $num;?></span></span>
                                                    </td>
                                                    <td class="statsDiv">
                                                        <a style=" color: #dadada; font-size: 11.25px;" href="viewprofile.php?username=<?echo $meltedname;?>"><?echo $meltedname;?></a>
                                                    </td>
                                                    <td class="statsDiv" style="color: #999999; color: #dadada; ">
                                                        <span class="statsDivStatic" style=" font-size: 11.25px;"><?echo $melted;?></span>
                                                    </td>
                                                </tr>
                                            <?}elseif($num==4){?>
                                                <tr style="border-top: 2px solid #212121;">
                                                    <td class="statsDiv" style="color: #999999;  border-top: none;">
                                                        <span class="statsDivStatic" style="border-top: none; font-size: 11.25px;"><span style="color: #bbbbbb;">#<?echo $num;?></span></span>
                                                    </td>
                                                    <td class="statsDiv">
                                                        <a style="border-top: none; color: #bbbbbb; font-size: 11.25px;" href="viewprofile.php?username=<?echo $meltedname;?>"><?echo $meltedname;?></a>
                                                    </td>
                                                    <td class="statsDiv" style="color: #999999; color: #bbbbbb; border-top: none;">
                                                        <span class="statsDivStatic" style="border-top: none; font-size: 11.25px;"><?echo $melted;?></span>
                                                    </td>
                                                </tr>
                                            <?}else{?>
                                                <tr style="">
                                                    <td class="statsDiv" style="color: #999999;  ">
                                                        <span class="statsDivStatic" style=" font-size: 11.25px;"><span style="color: #bbbbbb;">#<?echo $num;?></span></span>
                                                    </td>
                                                    <td class="statsDiv">
                                                        <a style=" color: #bbbbbb; font-size: 11.25px;" href="viewprofile.php?username=<?echo $meltedname;?>"><?echo $meltedname;?></a>
                                                    </td>
                                                    <td class="statsDiv" style="color: #999999; color: #bbbbbb; ">
                                                        <span class="statsDivStatic" style=" font-size: 11.25px;"><?echo $melted;?></span>
                                                    </td>
                                                </tr>
                                            <?}
                                        }?>

                                        </tbody>
                                    </table>
                                </div>
                                <form action="" method="post" style="padding-top: 10px;">
                                    <span>You will receive <font style="color: #FFC753;">$<b><?echo number_format($drugprice);?></b></font> leaving your crew with <font style="color: #FFC753;">$<b><?echo number_format($crewmoney);?></b></font></span>
                                    <input type ="submit" name="create" class="textarea curve3px" value="Produce!">
                                </form>
                                <div style="margin-bottom: 17px; color: #ffffff; font-size: 12px; margin-top: 25px;">
                                    Total Melted: <b style="color: silver;"><?echo$total_melted;?></b> <span class="miniSep">-</span>
                                    Average Per User: <b style="color: silver;"><?echo $total_melted/$num;?></b>
                                </div>
                                <div class="break" style="margin-top: 35px;"></div>
                                <div class="spacer"></div>
                                <div class="break" style="margin-top: 4px;"></div>
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

