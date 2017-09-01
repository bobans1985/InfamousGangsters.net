<? include 'included.php'; ?>
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
                        $saturate = "/[^a-z0-9]/i";
                        $saturated = "/[^0-9]/i";
                        $sessionidraw = $_COOKIE['PHPSESSID'];
                        $sessionid = preg_replace($saturate,"",$sessionidraw);
                        $userip = $_SERVER[REMOTE_ADDR];
                        $gangsterusername = $usernameone;
                        $playerrank = $myrank;
                        $playerarray =$statustesttwo;
                        $playerrank = $playerarray['rankid'];
                        $email = $playerarray['email'];
                        $verified = $playerarray['verify'];
                        $ref = $playerarray['ref'];

                        if($verified == 'verified'){die('<font color=silver face=verdana size=1>Your account is already verified!'); }

                        if($_POST['verify'] AND $_POST['email']){
                            $newemail = $_POST['email'];
                            if(!preg_match("/^[\ a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{1,20}$/i", $_POST['email'])){ $showoutcome++; $outcome = "The email you entered is invalid!"; }else{
                                $verifnum = rand(1111,9999);
                                $to = "$newemail";
                                $subject = "TD - Email Verification";
                                $header = "From:  Infamous Gangsters - Email Verification <admins@infamousgangsters.net>\r\n" .
                                    'Reply-To: Infamous Gangsters <noreply@infamousgangsters.net>' . "\r\n" .
                                    'X-Mailer: PHP/' . phpversion() . "\r\n" .
                                    "MIME-Version: 1.0\r\n" .
                                    "Content-Type: text/html; charset=utf-8\r\n" .
                                    "Content-Transfer-Encoding: 8bit\r\n\r\n";
                                $body = "Your verification code is $verifnum!";
                                if (mail($to, $subject, $body, $header)){ $showoutcome++; $outcome = "An email has been sent, please check your inbox!";
                                    mysql_query("UPDATE users SET verify = '$verifnum', email = '$newemail' WHERE ID = '$ida'");
                                }}}

                        if($_POST['code'] AND $_POST['verifyit']){
                            $newcode = $_POST['code'];
                            $getcodee = mysql_query("SELECT verify FROM users WHERE ID = '$ida'");
                            $doit = mysql_fetch_array($getcodee);
                            $getcode = $doit['verify'];
                            if($newcode == $getcode AND $getcode > 0){
                                mysql_query("UPDATE users SET verify = 'verified', money = money + 7500000 WHERE ID = '$ida'");
                                $showoutcome++; $outcome = "Your account is now verified!"; }
                            else{ $showoutcome++; $outcome = "The verification code you entered is incorrect!";
                            }}
                        ?>
                        <? if ($showoutcome >= 1) { ?>
                            <span><? echo $outcome; ?></span>
                        <? } ?>
                        <div class="main curve2px">
                            <div class="menuHeader noTop">
                               Verify Email
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-bottom: 6px; text-align: center;">
                                    <form method="post" style="padding: 16px; font-size: 12px;">
                                        Verifiying your email will give you <b style="color: gold;">$7,500,000!</b>
                                        <br><br>
                                        <input type="text" name=email class="textarea inline_form" style="font-size: 12px; padding: 5px; padding-left: 6px;" placeholder="Enter Email...">
                                        <input type=submit name=verify class="textarea inline_form" style="font-size: 12px; padding: 5px; padding-left: 7px;" value="Send Verification Email!">
                                    </form>
                                    <form method=post>
                                        <input type="text" name=code class="textarea inline_form" style="font-size: 12px; padding: 5px; padding-left: 6px;" placeholder="Enter your code....">
                                        <input type=submit name=verifyit class="textarea inline_form" style="font-size: 12px; padding: 5px; padding-left: 6px;" value="Verify">
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
                                Verify Email
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

