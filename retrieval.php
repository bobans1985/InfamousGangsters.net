<? include 'included.php'; session_start(); ?>
<?

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$nameraw = mysql_real_escape_string($_POST['name']);
$pass = $_POST['password'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$name = preg_replace($saturate,"",$nameraw);
$pass = md5($pass);
$topicid = preg_replace($saturated,"",$topicidraw);
$userip = $_SERVER[REMOTE_ADDR];
$gangsterusername = $usernameone;


$playerarray = $statustesttwo;
$playerrank = $playerarray['rankid'];
$attempts = $playerarray['retrieve'];

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
        .retrieve-item {
            color: silver;
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
            <?
            $tame = time();
            $tames = $tame + 30;
            $left = $attempts - $tame;

            if(isset($_POST['name'])) {
                mysql_query("UPDATE users SET retrieve = '$tames' WHERE ID = '$ida'");
                $test = mysql_query("SELECT * FROM users WHERE username = '$name'");
                $tester = mysql_num_rows($test);
                if($attempts > $tame){$showoutcome++; $outcome = "You must wait $left seconds</font>";}
                elseif(!$pass){$showoutcome++; $outcome = "Password incorrect</font>";}
                elseif($tester != 1){$showoutcome++; $outcome = "No such user</font>";}
                else{
                    $info = mysql_fetch_array($test);
                    $real = $info['password'];
                    $status = $info['status'];
                    $swiss = $info['swiss'];
                    $points = $info['points'];
                    $rnk = $info['rankid'];
                    $mrdi = $info['ID'];
                    $notes = $info['notes'];
                    $refpoints = $info['refpoints'];

                    $changes = $info['chnge'];

                    if($changes == '0'){
                        $riw = $_POST['password']."5432543___32432";
                        $pass = md5($riw);}

                    if($status == 'Alive'){$showoutcome++; $outcome = "This user is not dead</font>";}
                    if($status == 'Modkilled'){$showoutcome++; $outcome = "This user was modkilled</font>";}
                    elseif($real != $pass){$showoutcome++; $outcome = "Password incorrect</font>";}
                    elseif($rnk > '23'){$showoutcome++; $outcome = "No.</font>";}
                    elseif(($swiss == '0')&&($points == '0')&&($refpoints == '0')&&($notes == '')){$showoutcome++; $outcome = "That user has no points/money</font>";}
                    else{
                        mysql_query("UPDATE users SET swiss = '0' WHERE ID = '$mrdi'");
                        if (mysql_affected_rows()!=0) {mysql_query("UPDATE users SET money = money + $swiss WHERE ID = '$ida'");}

                        mysql_query("UPDATE users SET points = '0' WHERE ID = '$mrdi'");
                        if (mysql_affected_rows()!=0) {mysql_query("UPDATE users SET points = points + $points WHERE ID = '$ida'");}

                        mysql_query("UPDATE users SET refpoints = '0' WHERE ID = '$mrdi'");
                        if (mysql_affected_rows()!=0) {mysql_query("UPDATE users SET refpoints = refpoints + $refpoints WHERE ID = '$ida'");}

                        mysql_query("UPDATE cars SET price = '0', garage = '0', owner = '$usernameone' WHERE owner = '$name' AND garage = '1'");
                        mysql_query("UPDATE users SET notes = '$notes' WHERE ID = '$ida'");

                        $showoutcome++; $outcome = "Retrieval complete!</font>";
                        mysql_query("INSERT INTO moneysent(username,amount,sent,ip)
VALUES ('$name','$swiss','$gangsterusername','$userip')");
                        mysql_query("INSERT INTO pointssent(username,amount,sent,ip)
VALUES ('$name','$points','$gangsterusername','$userip')");
                    }}}
            ?>
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
                                Retrieval
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <form method="post" action="retrieval.php" style="padding: 5px; padding-top: 38px; padding-bottom: 30px; margin: auto; font-size: 12px; text-align: center; color: #fefefe;">
                                        Retrieve your <span class="retrieve-item">Points</span>, <a href="refferal.php" class="retrieve-item"><u>Referral Points</u></a>, <span class="retrieve-item">Swiss Bank</span>, <span class="retrieve-item">Inbox</span> &amp; <span class="retrieve-item">Witness Statements</span> from one of your dead accounts:
                                        <table class="regTable" style="margin-top: 30px; min-width: 230px; width: 85%; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody><tr>
                                                <td class="header" colspan="2">
                                                    Retrieve Items
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col noTop" style="border-left: 0;">
                                                    <label style="display: block; padding: 0;" for="username">Username:</label>
                                                </td>
                                                <td class="col is-btn-wrapper noTop">
                                                    <input autocomplete="off" class="textarea noTop" id="username" value="" style="width: 100%; height: 28px;" name="name" placeholder="Enter Username..." type="text">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col" style="border-left: 0;">
                                                    <label style="display: block; padding: 0;" for="password">Password:</label>
                                                </td>
                                                <td class="col is-btn-wrapper noTop">
                                                    <input class="textarea" id="password" value="" style="width: 100%; height: 28px;" name="password" placeholder="Enter Password..." type="password">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="col is-btn-wrapper noTop" style="border-left: 0;">
                                                    <input name="retrieve" class="textarea" style="width: 100%; height: 28px; border-left: 0;" value="Retrieve" type="submit">
                                                </td>
                                            </tr>
                                            </tbody></table>
                                        <div class="break" style="padding-top: 28px;"></div>
                                        <div class="spacer"></div>
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