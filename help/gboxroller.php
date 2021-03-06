<? include '../included.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="../javascript/jquery.min.js"></script>
    <script src="../javascript/main3.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/layout.css">
    <link rel="stylesheet" href="../layout/style.css" type="text/css" />
    <title>Infamous Gangsters</title>
    <link rel="icon" type="image/png" href="../images/icon.png">
    <script src="../javascript/global.php"></script>
    <script src="../javascript/jquery.mousewheel.js"></script>
    <style>
        .stat.title:first-of-type {
            margin-top: 9px;
        }
        .stat.title {
            margin-top: 9px;
        }

        {
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
                        <img class="searchBoxIcon" src="../images/search.png">
                        <input name="search" autocomplete="off" class="searchBoxInput" maxlength="22" type="text"
                               id="search" placeholder="Search User..." onclick="this.select(); reClick();"
                               onfocus="document.getElementById('searchBox').style.border='2px solid #E6B34B'; "
                               onblur="document.getElementById('searchBox').style.border='';">
                    </div>
                </td>
                <td valign="top" class="centerTd">
                    <? include "../cpanel_top.php";?>
                </td>
                <td width="233px" valign="top" class="centerTd">
                    <?php include "../relative_block.php"; ?>
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
                    <?php include '../leftmenu.php'; ?>
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
            <table class="menuTable curve10px" id="content" cellspacing="0" cellpadding="0">
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
                                Money G-Box Generator
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: left;">
                                    <?php
                                    function arraymerge($array,$value){
                                        $ok = array("$value");
                                        $array = array_merge($array,$ok);
                                        return $array; }

                                    if($_POST['submit']){
                                        $players = $_POST['players'];
                                        $amount = $_POST['money'];
                                        $amountwe = $_POST['money'];
                                        $bonus = $_POST['bonus'];
                                        if($bonus == "disabled"){
                                            echo "<font size=1 color=white face=verdana>Please choose whether you want to use bonus box!</font>";
                                        }elseif($bonus == 2){
                                            $array = array();
                                            for($i = 1;$i < $players;$i++){
                                                if($players >= 35){
                                                    $kk = rand(10,25);
                                                }else{
                                                    $kk = rand(15,50); }
                                                $k = "0."."$kk.";
                                                $rand = round($amount*$k);
                                                $array=arraymerge($array,$rand);
                                                $amount = $amount-$rand; }

                                            $array=arraymerge($array,$amount);
                                            shuffle($array);
                                            for($i =0;$i<$players;$i++){

                                                $as = $i;
                                                $rand = $array[$as];
                                                $tg = $i+1;
                                                echo "<font size=1 color=white face=verdana><b>Box ".$tg."</b> wins $".number_format($rand)."</font><br />"; }
                                            echo "<font size=1 color=white face=verdana><br />Total Money = <b>$".number_format($amountwe)."</b></font>"; }
                                        else{
                                            $array = array();
                                            for($i = 0;$i < $players;$i++){
                                                if($players >= 35){
                                                    $kk = rand(10,25);
                                                }else{
                                                    $kk = rand(15,50); }
                                                $k = "0."."$kk.";
                                                $rand = round($amount*$k);
                                                $array=arraymerge($array,$rand);
                                                $amount = $amount-$rand; }

                                            $array=arraymerge($array,$amount);

                                            shuffle($array);
                                            for($i =0;$i<$players;$i++){

                                                $as = $i;
                                                $rand = $array[$as];
                                                $tg = $i+1;
                                                echo "<font size=1 color=white face=verdana><b>Box ".$tg."</b> wins $".number_format($rand)."</font><br />";}

                                            $dd=$players ;
                                            $aye = $array[$dd];
                                            $mb = rand(1,$players);
                                            echo "<font size=1 color=white face=verdana><b>Bonus Box is ".$mb."</b> which wins $".number_format($aye)."</font><br />";
                                            $azx  = $amountwe-$aye;
                                            $edcv = $aye+$azx;
                                            echo "<font size=1 color=white face=verdana><br /><b>$".number_format($azx)."</b> + <b>$".number_format($aye)."</b> = $".number_format($edcv)."</font>"; }} ?>

                                        <form action="" method="post" style="text-align: center;">
                                            <input type="text" name="players" placeholder="Number of players..." class="textarea"/>
                                            <input type="text" name="money" placeholder="Total money...." class="textarea"/>
                                            <SELECT NAME="bonus" class="textarea" style="width: 20%;padding: 0;">
                                                <option value="disabled">Bonus Box...</option>
                                                <OPTION value="1">Yes</OPTION>
                                                <OPTION value="2">No</OPTION>
                                            </SELECT>
                                            <input type="submit" name="submit" value="Roll" class="textarea curve3px" />
                                        </form>
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
                    <td><? include '../rightmenu.php'; ?></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
            <?

            include '../included.php'; session_start();

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
                                    <a href="../crews.php">Join a Crew</a>
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