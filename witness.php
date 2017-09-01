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
            $playerarray =$statustesttwo;
            $playerrank = $playerarray['rankid'];


            mysql_query("UPDATE witnessstatements SET new='0' WHERE username='$usernameone'");

            if ($_POST['sell'] && $_POST['ws']){
                $amount = $_POST['amount'];
                if ($amount == 0 || !$amount || ereg('[^0-9]',$amount)){ $showoutcome++; $outcome = "The amount you entered is invalid!"; }else{
                    if($amount >= "5000000001"){ $showoutcome++; $outcome = "You are not allowed to sell a statement for more then $5,000,000,000!"; }else{

                        $sws = $_POST['ws'];
                        foreach($sws as $witness){
                            mysql_query("UPDATE witnessstatements SET sale='yes', price='$amount' WHERE id='$witness' AND username='$usernameone'");
                            $showoutcome++; $outcome = "You are now selling the witness statement(s)!";
                        }}}}

            if ($_POST['delete'] && $_POST['ws']){
                $sws = $_POST['ws'];
                foreach($sws as $witness){
                    mysql_query("DELETE FROM witnessstatements WHERE username='$usernameone' AND id='$witness'");
                    mysql_query("UPDATE witnessstatements SET sale='yes', price='$amount' WHERE id='$witness' AND username='$usernameone'");
                    $showoutcome++; $outcome = "You deleted the witness statement(s)!";
                }}

            if ($_POST['buy'] && $_POST['wss']){
                $wssell = $_POST['wss'];
                foreach($wssell as $checkboxid){

                    $sql="SELECT * from witnessstatements WHERE id='$checkboxid'"; $result=mysql_query($sql);
                    while($rows=mysql_fetch_array($result)){
                        $idd = $rows['id'];
                        $whogotit = $rows['username'];
                        $whokilled = $rows['killer'];
                        $whodied = $rows['killed'];
                        $theprice = $rows['price'];
                        $theprice2=number_format($theprice);
                        $getuserinfo=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$usernameone'"));

                        if($whogotit == $username){
                            mysql_query("UPDATE witnessstatements SET sale='0', price='0' WHERE id='$checkboxid' AND username='$usernameone'");
                            $showoutcome++; $outcome = "You removed your statement(s)!"; }else{

                            if ($getuserinfo->money < $theprice){
                                $showoutcome++; $outcome = "You can not afford to buy the statement(s)";  }else{
                                mysql_query("UPDATE users SET money = (money + '$theprice'), mail='1' WHERE username='$whogotit'");
                                mysql_query("UPDATE users SET money = (money - '$theprice') WHERE username='$usernameone'");
                                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$whogotit','$whogotit','1','$userip','$usernameone bought your witness statement for $$theprice2')");
                                mysql_query("UPDATE witnessstatements SET username='$usernameone', sale='0', price='0' WHERE id='$checkboxid' AND sale='yes'");
                                $showoutcome++; $outcome = "You bought the statement(s)!"; }}}}}

            $keepuser = $_POST['searchws'];
            if($_POST['searchit']){
                $usersearched = $_POST['searchws'];
                $finduserws = mysql_num_rows(mysql_query("SELECT * FROM witnessstatements WHERE killed = '$usersearched'"));
                if($finduserws > 0){ $showoutcome++; $outcome = "There are $finduserws users with the witness statement for $usersearched!"; $dorest = 1; }
                else{ $showoutcome++; $outcome = "No users have this witness statement!";
                }}

            if($_POST['findwho']){
                $finduserws = mysql_num_rows(mysql_query("SELECT * FROM witnessstatements WHERE killed = '$keepuser'"));
                if($finduserws < 1){ $showoutcome++; $outcome = "There are no witnesses of this kill!"; }
                elseif($points < '100'){$showoutcome++; $outcome = "This costs 100 points!"; }
                else{
                    mysql_query("UPDATE users SET points = (points - '100') WHERE username = '$usernameone' AND points >= '100'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error ws001.</font>');}
                    $theresult = 1;
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
                                Witness Statements
                            </div>
                            <div style="padding: 5px; padding-top: 35px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;">

                                <form action="" method="post" style="margin-bottom: 25px;">
                                    <label for="lookup">Look up Witness Statement: </label>
                                    <input name="searchws" id="lookup" class="textarea" placeholder="Enter a Valid User..." value="<?echo$keepuser;?>" type="text">
                                    <input class="textarea" name="searchit" style="padding-left: 11px; padding-right: 11px;" value="Lookup!" type="submit">
                                    <?if($dorest == 1){?>
                                        <input type="submit" class="textarea" name="findwho" value="Find Who">
                                        <a onclick="alert('This costs 100 points and will message you who has the witness statement to <?echo$keepuser?>');"><font color=white>(<font color=red><b>?</b></font><font color=white>)</a>
                                    <? } ?>
                                </form>

                                <? if($theresult == 1){
                                    echo "<br><font color=red><b>Be sure to save this message if you want to keep hold of it</b></font><br>
                                    The following users have the witness statement for $keepuser:<br>";
                                    $getuserss = mysql_query("SELECT * FROM witnessstatements WHERE killed = '$keepuser' ORDER BY id DESC LIMIT 0,20");
                                    while($getusers = mysql_fetch_array($getuserss)){
                                        $wsuser = $getusers['username'];
                                        echo "$wsuser<br>";
                                    }} ?>
                                <br><br>

                                <?if(isset($_POST['searchit'])){?>
                                    <table class="regTable qt" id="carTable" style="margin: auto; margin-bottom: 25px; width: 95%; max-width: 720px;" cellspacing="0" cellpadding="0">
                                        <tbody><tr>
                                            <td colspan="5" class="header">Lookup Result</td>
                                        </tr>
                                        <tr>
                                            <td class="subHeader" style="width: 60%;">Statement</td>
                                            <td class="subHeader" style="width: 20%;">Time</td>
                                        </tr>
                                        <? $iftrue=mysql_query("SELECT * FROM witnessstatements WHERE username='$usernameone'");
                                        if(mysql_num_rows($iftrue) <= 0){ echo"<tr><td class=\"col noTop\" colspan=\"5\">No statement could be found.</td></tr>";
                                        }else{
                                            while($row = mysql_fetch_array( $iftrue )){
                                            $id = $row['id'];
                                            $killer = $row['killer'];
                                            $killed = $row['killed'];
                                            $sale = $row['sale'];
                                            $time = $row['timeleft'];
                                            $price = number_format($row['price']);
                                            ?>
                                                <tr class="row">
                                                    <td class="col">
                                                        You witnessed <a href="viewprofile.php?username=<?echo$killer;?>"><b><?echo$killer;?></b></a> shoot
                                                        <a href="viewprofile.php?username=<?echo$killed;?>"><b><?echo$killed;?></b></a>! They died!
                                                    </td>
                                                    <td class="col">
                                                        <span class="masterTooltip" title="<?$title_time=DateTime::createFromFormat('U',$time); echo $title_time->format('Y-m-d H:i:s');?>">
                                                            <?
                                                            $now=new DateTime();
                                                            $time=DateTime::createFromFormat('U',$time);
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
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?} ?>
                                        <?}?>
                                        </tbody>
                                    </table>
                                <?}?>
                                <div class="break" style="padding-top: 10px;"></div>
                                <div class="spacer"></div>
                                <div class="break" style="padding-top: 24px;"></div>
                                <table class="regTable qt" id="carTable" style="margin: auto; margin-bottom: 0px; width: 95%; max-width: 720px;" cellspacing="0" cellpadding="0">
                                    <tbody><tr>
                                        <td colspan="5" class="header">My Statements</td>
                                    </tr>
                                    <tr>
                                        <td class="subHeader" style="width: 60%;" colspan="2">Statement</td>
                                        <td class="subHeader" style="width: 20%;">Time</td>
                                    </tr>
                                    <form method='post' action=''>
                                    <? $iftrue=mysql_query("SELECT * FROM witnessstatements WHERE username='$usernameone'");
                                    if(mysql_num_rows($iftrue <= 0)){ echo"<tr><td class=\"col noTop\" colspan=\"5\">No statement could be found.</td></tr>";
                                    }else{
                                        while($row = mysql_fetch_array( $iftrue )){
                                            $id = $row['id'];
                                            $killer = $row['killer'];
                                            $killed = $row['killed'];
                                            $sale = $row['sale'];
                                            $time = $row['timeleft'];
                                            $price = number_format($row['price']);
                                            ?>
                                            <tr class="row">
                                                <td class="col" style="width: 1%;">
                                                    <input name="ws[]" type="checkbox" value="<? echo $id; ?>" style="vertical-align:middle;">
                                                </td>
                                                <td class="col">
                                                    You witnessed <a href="viewprofile.php?username=<?echo$killer;?>"><b><?echo$killer;?></b></a> shoot
                                                    <a href="viewprofile.php?username=<?echo$killed;?>"><b><?echo$killed;?></b></a>! They died!
                                                </td>
                                                <td class="col">
                                                        <span class="masterTooltip" title="<?$title_time=DateTime::createFromFormat('U',$time); echo $title_time->format('Y-m-d H:i:s');?>">
                                                            <?
                                                            $now=new DateTime();
                                                            $time=DateTime::createFromFormat('U',$time);
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
                                                        </span>
                                                </td>
                                            </tr>
                                        <?} ?>
                                        <tr class="row">
                                            <td class="col" colspan="2">
                                                <input type="text" name="amount" class="textarea" style="width:100%;" placeholder="Enter a Amount...">
                                            </td>
                                            <td class="col">
                                                <input type="submit" class="textarea" style="width:100%" name="sell" value="Sell">
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <td class="col" colspan="3">
                                                <input type="submit" name="delete" class="textarea" style="width:100%;" value="Delete Statements">
                                            </td>
                                        </tr>
                                        </form>
                                    <?}?>
                                    </tbody>
                                </table>
                                <div class="break" style="padding-top: 30px;"></div>
                                <div class="spacer"></div>
                                <div class="break" style="padding-top: 24px;"></div>
                                <table class="regTable qt" id="carTable" style="margin: auto; margin-bottom: 0px; width: 95%; max-width: 720px;" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr>
                                        <td colspan="5" class="header">For Sale</td>
                                    </tr>
                                    <tr>
                                        <td class="subHeader" style="width: 60%;" colspan="2">Statement</td>
                                        <td class="subHeader" style="width: 20%;">Price</td>
                                    </tr>
                                    <form method='post' action=''>
                                        <?
                                        $ifbother = mysql_num_rows(mysql_query("SELECT * FROM witnessstatements WHERE sale = 'yes' AND killed = '$keepuser'"));
                                        $iftruee = mysql_num_rows(mysql_query("SELECT * FROM witnessstatements WHERE sale='yes'"));
                                        if($iftruee <= 0){ echo"<tr><td class=\"col noTop\" colspan=\"5\">There are no statements for sale!</td></tr>"; }
                                        elseif($dorest == 1 AND $ifbother >= 1){
                                            $result = mysql_query("SELECT * FROM witnessstatements WHERE killed = '$keepuser' AND sale = 'yes' ORDER BY price ASC"); $iftrue=mysql_num_rows($result);
                                            while($row = mysql_fetch_array( $result )){
                                                $idd = $row['id'];
                                                $whows = $row['username'];
                                                $killer = $row['killer'];
                                                $killed = $row['killed'];
                                                $sale = $row['sale'];
                                                $price = number_format($row['price']);
                                        ?>
                                            <tr class="row">
                                                <td class="col" style="width: 1%;">
                                                    <input name="ws[]" type="checkbox" value="<? echo $idd; ?>" style="vertical-align:middle;">
                                                </td>
                                                <td class="col">
                                                    You witnessed
                                                    <b><font color=red>Username Hidden</font></b>
                                                    kill <a href="viewprofile.php?username=<?php echo "$killed"; ?>"><b><?echo$killed;?></b></a>
                                                </td>
                                                <td class="col">
                                                        <span><b><?echo"$$price";?></b></span>
                                                </td>
                                            </tr>
                                        <?}
                                        } else{
                                            $result = mysql_query("SELECT * FROM witnessstatements WHERE sale='yes' ORDER BY price ASC");
                                            $iftrue=mysql_num_rows($result);
                                            while($row = mysql_fetch_array( $result )){
                                                $idd = $row['id'];
                                                $whows = $row['username'];
                                                $killer = $row['killer'];
                                                $killed = $row['killed'];
                                                $sale = $row['sale'];
                                                $price = number_format($row['price']);
                                        ?>
                                            <tr class="row">
                                                <td class="col" style="width: 1%;">
                                                    <input name="wss[]" type="checkbox" value="<? echo $idd; ?>" style="vertical-align:middle;">
                                                </td>
                                                <td class="col">
                                                    You witnessed
                                                    <b><font color=red>Username Hidden</font></b>
                                                    kill <a href="viewprofile.php?username=<?php echo "$killed"; ?>"><b><?echo$killed;?></b></a>
                                                </td>
                                                <td class="col">
                                                    <span><b><?echo"$$price";?></b></span>
                                                </td>
                                            </tr>
                                            <?
                                            }
                                        } ?>
                                        <tr class="row">
                                            <td class="col" colspan="3">
                                                <input type="submit" class="textarea" style="width:100%" name="buy" value="Buy">
                                            </td>
                                        </tr>
                                    </form>
                                    </tbody>
                                </table>
                                <div class="break" style="padding-top: 30px;"></div>
                                <div class="spacer"></div>
                                <div class="break" style="padding-top: 24px;"></div>
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