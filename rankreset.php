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
            <?
            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $nameraw = $_POST['name'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $name = preg_replace($saturate,"",$nameraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;

            $playersql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
            $playerarray = mysql_fetch_array($playersql);
            $rankid = $playerarray['rankid'];

            $ranksql = mysql_query("SELECT * FROM rankreset WHERE username = '$gangsterusername'");
            $rankarray = mysql_fetch_array($ranksql);
            $times = $rankarray['times'];

            if($_POST['resetrankk'] AND $rankid == 22 AND $times < 5){
                mysql_query("UPDATE users SET rankid = '1', rankup = '0' WHERE ID = '$ida'");
                $alreadyreset = mysql_num_rows(mysql_query("SELECT * FROM rankreset WHERE username = '$usernameone'"));
                mysql_query("UPDATE users SET mail=mail+'1' WHERE username='Mitch'");
                $f = ("$gangsterusername has just reset their rank, reward is needed.");
                mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('Mitch','Rank Reset','1','$userip','$f')");
                if($alreadyreset < 1){ mysql_query("INSERT INTO rankreset(username,times) VALUES ('$usernameone','1')"); }
                else{ mysql_query("UPDATE rankreset SET times = (times + 1) WHERE username = '$usernameone'"); }
                echo('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=rankreset.php">');} ?>
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
                                Rank Reset
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <? if($rankid==22 AND $times < 5){ ?>
                                        <font size=1 face=verdana color=white>At the rank of State Gangster you have the option to reset your rank and start from Newbie.<br>
                                            <b>Why would I do this?</b>
                                            When resetting your rank, you will receive the following:<br><br>

                                            <i>First time:<br>
                                                - 500 points<br>
                                                - $150,000,000<br>
                                                - An achievement for your profile</i><br><br>

                                            <i>Second time:<br>
                                                - 750 points<br>
                                                - $300,000,000<br>
                                                - An achievement for your profile</i><br><br>

                                            <i>Third time:<br>
                                                - 1,000 points<br>
                                                - $500,000,000<br>
                                                - An achievement for your profile</i><br><br>

                                            <i>Fourth time:<br>
                                                - 2,000 points<br>
                                                - $750,000,000<br>
                                                - An achievement for your profile</i><br><br>

                                            <i>Fifth time:<br>
                                                - 3,000 points<br>
                                                - $1,000,000,000<br>
                                                - An achievement for your profile</font></i><br><br>

                                        <font color=red size=2 face=verdana><b><center>NOTE* To claim your rewards please message the helpdesk to claim.</font></b></center><br>

                                        <form action="" method="post" style="padding: 20px 0;">
                                            <span>Reset rank and claim rewards</span>
                                            <input type=submit name=doall  value="Commit" style="visibility:hidden;">
                                            <input class="textarea curve3px" name=resetrankk value="Reset" type="submit">
                                        </form>
                                    <?php }else{
                                        echo "<center><font color=khaki size=4 face=verdana><b>If you're seeing this, you're below the rank.<br>Or you have reached the maximum resets you can do!</font></b></center>";
                                    } ?>

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
        </td>
    </tr>
</table>
</body>
</html>