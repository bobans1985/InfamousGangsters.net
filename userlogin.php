<?php

session_start();

mysql_connect("localhost", "infamous_game", "codeman123") or die('Database error1');
mysql_select_db("infamous_game") or die('Database error');
error_reporting(0);

session_start();
$seshion = session_id();
$_COOKIE['PHPSESSID'];

$time = time();
mysql_query("DELETE FROM log WHERE error < '$time'");

$player = $_POST['usernamelog'];
$playerpassword = $_POST['passwordlog'];
$playerip = $_SERVER['REMOTE_ADDR'];
$playerbrowserbefore = $_SERVER['HTTP_USER_AGENT'];
$allowed = "/[^a-z0-9]/i";
$allowedtwo = "/[^a-z0-9\\040\\.\\[\\]\\=\\<\\>\\#\\$\\@\\&\\{\\}\\%\\+\\|\\(\\)\\?\\~\\:\\/\\-\\;\\_\\\\]/i";

$playername = preg_replace($allowed, "", $player);
$playerbrowser = preg_replace($allowedtwo, "", $playerbrowserbefore);
$sesh = preg_replace($allowed, "", $seshion);

$result = mysql_query("SELECT * FROM users WHERE username = '$playername'");
$rows = mysql_fetch_array($result);

$username = $rows['username'];
$password = $rows['password'];
$status = $rows['status'];
$deatha = $rows['deathmessage'];
$helthy = $rows['health'];
$rnkup = floor($rows['rankup']);
$mail = $rows['mail'];
$loca = $rows['location'];
$change = $rows['chnge'];

if ($change == '0') {
    $playerpassword = $_POST['passwordlog'];
}
$deathb = html_entity_decode($deatha, ENT_NOQUOTES);

$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";
$deathc = str_replace($zpattern, $zreplace, $deathb);

$apattern[1] = "/\[b\](.*?)\[\/b\]/is";
$apattern[2] = "/\[u\](.*?)\[\/u\]/is";
$apattern[3] = "/\[i\](.*?)\[\/i\]/is";
$apattern[4] = "/\[center\](.*?)\[\/center\]/is";
$apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$apattern[6] = "/\[img\](.*?)\[\/img\]/is";
$apattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
$apattern[8] = "/\[br\]/is";
$apattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
$apattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
$apattern[11] = "/\[left\](.*?)\[\/left\]/is";
$apattern[12] = "/\[right\](.*?)\[\/right\]/is";
$apattern[13] = "/\[s\](.*?)\[\/s\]/is";

$areplace[1] = "<b>$1</b>";
$areplace[2] = "<u>$1</u>";
$areplace[3] = "<i>$1</i>";
$areplace[4] = "<center>$1</center>";
$areplace[5] = "<font color=\"$1\">$2</font>";
$areplace[6] = "<img src=\"$1\">";
$areplace[7] = "<font face=\"$1\">$2</font>";
$areplace[8] = "<br>";
$areplace[9] = "<font size=\"$1\">$2</font><font size=\"1\">";
$areplace[10] = "<blockquote><b>$1</b></blockquote>";
$areplace[11] = "<div align=\"left\">$1</div>";
$areplace[12] = "<div align=\"right\">$1</div>";
$areplace[13] = "<s>$1</s>";

$deathd = preg_replace($apattern, $areplace, $deathc);

$bpattern[1] = ":arrow:";
$bpattern[2] = ":D";
$bpattern[3] = ":S";
$bpattern[4] = "8)";
$bpattern[5] = ":cry:";
$bpattern[6] = "8|";
$bpattern[7] = ":evil:";
$bpattern[8] = ":!:";
$bpattern[9] = ":idea:";
$bpattern[10] = ":lol:";
$bpattern[11] = ":mad:";
$bpattern[12] = ":?:";
$bpattern[13] = ":redface:";
$bpattern[14] = ":rolleyes:";
$bpattern[15] = ":(";
$bpattern[16] = ":)";
$bpattern[17] = ":o";
$bpattern[18] = ":tdn:";
$bpattern[19] = ":P";
$bpattern[20] = ":tup:";
$bpattern[21] = ":twisted:";
$bpattern[22] = ";)";

$breplace[1] = '<img src=/more/smiles/arrow.gif>';
$breplace[2] = '<img src=/more/smiles/biggrin.gif>';
$breplace[3] = '<img src=/more/smiles/confused.gif>';
$breplace[4] = '<img src=/more/smiles/cool.gif>';
$breplace[5] = '<img src=/more/smiles/cry.gif>';
$breplace[6] = '<img src=/more/smiles/eek.gif>';
$breplace[7] = '<img src=/more/smiles/evil.gif>';
$breplace[8] = '<img src=/more/smiles/exclaim.gif>';
$breplace[9] = '<img src=/more/smiles/idea.gif>';
$breplace[10] = '<img src=/more/smiles/lol.gif>';
$breplace[11] = '<img src=/more/smiles/mad.gif>';
$breplace[12] = '<img src=/more/smiles/question.gif>';
$breplace[13] = '<img src=/more/smiles/redface.gif>';
$breplace[14] = '<img src=/more/smiles/rolleyes.gif>';
$breplace[15] = '<img src=/more/smiles/sad.gif>';
$breplace[16] = '<img src=/more/smiles/smile.gif>';
$breplace[17] = '<img src=/more/smiles/surprised.gif>';
$breplace[18] = '<img src=/more/smiles/tdown.gif>';
$breplace[19] = '<img src=/more/smiles/toungue.gif>';
$breplace[20] = '<img src=/more/smiles/tup.gif>';
$breplace[21] = '<img src=/more/smiles/twisted.gif>';
$breplace[22] = '<img src=/more/smiles/wink.gif>';
$death = str_replace($bpattern, $breplace, $deathd);

$playerid = $rows['ID'];

$getdr = mysql_query("SELECT * FROM happychristmas WHERE username = '$username'");
$dorows = mysql_fetch_array($getdr);
$collected = $dorows['collected'];
$tryme = gmdate('Y-m-d');

$check = mysql_query("SELECT username FROM users WHERE username = '$username'")
or die(mysql_error());
$checktwo = mysql_num_rows($check);

$checkthree = mysql_query("SELECT * FROM log WHERE username = '$username'")
or die(mysql_error());
$checkfour = mysql_num_rows($checkthree);

$checkfive = mysql_query("SELECT * FROM log WHERE ip = '$playerip'")
or die(mysql_error());
$checksix = mysql_num_rows($checkfive);

$checkseven = mysql_query("SELECT * FROM banned WHERE ip = '$playerip'")
or die(mysql_error());
$checkeight = mysql_num_rows($checkseven);

$checknine = mysql_query("SELECT * FROM banned WHERE username = '$username'")
or die(mysql_error());
$checkten = mysql_num_rows($checknine);


$welcomemessage = 'Welcome <b style="color: rgb(255, 199, 83); ">' . $username . '</b>, Redirecting<span id="dot1" class="dot" style="visibility: visible; display: inline;">.</span><span id="dot2" class="dot" style="visibility: visible; display: inline;">.</span><span id="dot3" class="dot" style="visibility: visible; display: inline;">.</span>';


$resultu = mysql_query("SELECT error FROM log WHERE username = '$username'");
$rowsu = mysql_fetch_array($resultu);
$timeone = $rowsu['error'];

$resultv = mysql_query("SELECT error FROM log WHERE ip = '$playerip'");
$rowsv = mysql_fetch_array($resultv);
$timetwo = $rowsv['error'];

$errorone = $timeone - $time;
$errortwo = $timetwo - $time;


if (isset($_POST['usernamelog'])) {
    if ($checkfour != 0) {
        $login['message']='<div class="error shadow" id="pop" style="position: relative; margin-top:-70px; height: 70px;"> You must wait <b style="color: rgb(255, 199, 83); ">'.$errorone.'</b> seconds before trying again!</div>';
        $login['status']='error';

        print_r(json_encode($login));

    } elseif ($checksix != 0) {
        $login['message']='<div class="error shadow" id="pop" style="position: relative; margin-top:-70px; height: 70px;"> You must wait <b style="color: rgb(255, 199, 83); ">'.$errortwo.'</b> seconds before trying again!</div>';
        $login['status']='error';

        print_r(json_encode($login));
    } else {
        $error = $time + 10;
        $insert = "INSERT INTO log (ip, username, error) VALUES ('$playerip', '$username', '$error')";
        $add_member = mysql_query($insert);
        if ($checktwo != 1) {
            $login['message']='<div class="error shadow" id="pop" style="position: relative; margin-top:-70px; height: 70px;"> <b style="color: red;">ERROR:</b> Incorrect User / Password.</div>';
            $login['status']='error';

            print_r(json_encode($login));

        } elseif ($playerpassword != $password) {
            $login['message']='<div class="error shadow" id="pop" style="position: relative; margin-top:-70px; height: 70px;"> <b style="color: red;">ERROR:</b> Incorrect User / Password.</div>';
            $login['status']='error';

            print_r(json_encode($login));

        } elseif ($checkeight != 0) {
            $login['message']='<div class="error shadow" id="pop" style="position: relative; margin-top:-70px; height: 70px;"> <b style="color: red;">ERROR:</b> Your IP has been banned.</div>';
            $login['status']='error';

            print_r(json_encode($login));
        } elseif ($checkten != 0) {
            $login['message']='<div class="error shadow" id="pop" style="position: relative; margin-top:-70px; height: 70px;"> <b style="color: red;">ERROR:</b> Your account has been banned.</div>';
            $login['status']='error';

            print_r(json_encode($login));
        } elseif ($status == 'Dead') {
            
            $login['message']='<div class="error shadow" id="pop" style="z-index: 4001; top: 150px; height: 430px; width: 700px; margin-left: -350px;">
    <div class="close" onclick="document.getElementById(\'pop\').style.display=\'none\';">(close)</div>
    <span style="font-size: 35px; text-transform: uppercase;">You have been killed</span>
    <br><br><div style="color: #dddddd;margin-top: 20px;">Death Message: '.$death.'</div>
</div>';
            $login['status']='dead';

            print_r(json_encode($login));

        } elseif ($status == 'Modkilled') {

            $login['message']='<div class="error shadow" id="pop" style="z-index: 4001; top: 150px; height: 430px; width: 700px; margin-left: -350px;">
    <div class="close" onclick="document.getElementById(\'pop\').style.display=\'none\';">(close)</div>
    <span style="font-size: 35px; text-transform: uppercase;">You have been modkilled</span>
    <br><br><div style="color: #dddddd;margin-top: 20px;">Death Message: '.$death.'</div>
</div>';
            $login['status']='dead';

            print_r(json_encode($login));

        } else {
            if (!preg_match("/^[a-z0-9]{1,40}$/i", $sesh)) {
                die('<body bgcolor="#222222"><font color="white" face="verdana" size="1"><b>Error, please delete your pc cookies and re-login.</b></font></body>');
            }

            $ipsharingsql = mysql_query("SELECT ip FROM ipadresses WHERE ip = '$playerip' AND username = '$username'");
            $ipsharingresult = mysql_num_rows($ipsharingsql);


            $checksug = mysql_num_rows(mysql_query("SELECT * FROM suggestions WHERE username ='$username'"));
            if ($checksug != '1') {
                mysql_query("INSERT INTO suggestions(username,id) VALUES('$username','$playerid')");
            }


            if ($ipsharingresult == '0') {

                $insertipsql = "INSERT INTO ipadresses (username,ip)
VALUES ('$username','$playerip')";
                $insertipresult = mysql_query($insertipsql);
            }

            $playerip = $_SERVER['REMOTE_ADDR'];

            $ifone = mysql_query("SELECT * FROM usersonline WHERE ip = '$playerip' AND username = '$username'")
            or die(mysql_error());
            $iftwo = mysql_num_rows($ifone);

            $ifthree = mysql_query("SELECT * FROM usersonline WHERE ip = '$playerip' AND session = '$sesh' AND username != '$username'")
            or die(mysql_error());
            $iffour = mysql_num_rows($ifthree);

            $iffive = mysql_query("SELECT * FROM usersonline WHERE ip != '$playerip' AND username = '$username'")
            or die(mysql_error());
            $ifsix = mysql_num_rows($iffive);
            $ifsixarray = mysql_fetch_array($iffive);
            $ifsixip = $ifsixarray['ip'];
            $ifsixsession = $ifsixarray['session'];

            if ($iftwo != 0) {
                mysql_query("UPDATE usersonline SET session = '$sesh' WHERE username = '$username'");
                mysql_query("DELETE FROM loggedin WHERE username = '$username'");
                mysql_query("INSERT INTO `loggedin` (username) VALUES ('$username')");
                mysql_query("UPDATE users SET latestip = '$playerip' WHERE username = '$username'");

                if ($collected != '0000-00-00' AND (strtotime($tryme) - strtotime($collected)) <= 0) {
                    $homepage = "news";
                } else {
                    $homepage = "usersonline";
                }

                mysql_query("UPDATE users SET appear = '0' WHERE username = '$username'");

                $login['message']='<div class="error shadow" id="pop" style="font-size: 12px; position: relative; margin-top:-70px; height: 70px;">'.$welcomemessage.'</div>';
                $login['url']=$homepage.".php";
                $login['status']='success';

                print_r(json_encode($login));

            } elseif ($iffour != 0) {


                $sessionidbefore = $_COOKIE['PHPSESSID'];
                $saturate = "/[^a-z0-9]/i";
                $sessionidnew = preg_replace($saturate, "", $sessionidbefore);

                $sqllolll = "DELETE FROM usersonline WHERE session = '$sessionidnew' AND ip = '$playerip'";
                $resultlolll = mysql_query($sqllolll);

                $logtime = "INSERT INTO logintimes (username,ip,browser)
VALUES ('$username', '$playerip','$playerbrowser')";
                $logtime = mysql_query($logtime);

                mysql_query("UPDATE users SET latestip = '$playerip' WHERE username = '$username'");

                $sessiontime = $time + 1800;

                $usersonline = "INSERT INTO usersonline (session, time, username, ip, id)
VALUES ('$sesh', '$sessiontime', '$username', '$playerip', '$playerid')";
                $online = mysql_query($usersonline);
                mysql_query("DELETE FROM loggedin WHERE username = '$username'");
                mysql_query("INSERT INTO `loggedin` (username) VALUES ('$username')");


                if ($collected != '0000-00-00' AND (strtotime($tryme) - strtotime($collected)) <= 0) {
                    $homepage = "news";
                } else {
                    $homepage = "usersonline";
                }

                $login['message']='<div class="error shadow" id="pop" style="font-size: 12px; position: relative; margin-top:-70px; height: 70px;">'.$welcomemessage.'</div>';
                $login['url']=$homepage.".php";
                $login['status']='success';

                print_r(json_encode($login));


            } elseif ($ifsix != 0) {

                $destorysql = "INSERT INTO destroyed(username, session, ip)
VALUES ('$username', '$ifsixsession', '$ifsixip')";
                $destroyed = mysql_query($destorysql);

                $sqlloll = "DELETE FROM usersonline WHERE username = '$username'";
                $resultloll = mysql_query($sqlloll);

                mysql_query("UPDATE users SET latestip = '$playerip' WHERE username = '$username'");

                $logtime = "INSERT INTO logintimes (username,ip,browser)
VALUES ('$username', '$playerip','$playerbrowser')";
                $logtime = mysql_query($logtime);

                $sessiontime = $time + 1800;

                $usersonline = "INSERT INTO usersonline (session, time, username, ip, id)
VALUES ('$sesh', '$sessiontime', '$username', '$playerip', '$playerid')";
                $online = mysql_query($usersonline);
                mysql_query("DELETE FROM loggedin WHERE username = '$username'");
                mysql_query("INSERT INTO `loggedin` (username) VALUES ('$username')");

                if ($collected != '0000-00-00' AND (strtotime($tryme) - strtotime($collected)) <= 0) {
                    $homepage = "news";
                } else {
                    $homepage = "usersonline";
                }

                $login['message']='<div class="error shadow" id="pop" style="font-size: 12px; position: relative; margin-top:-70px; height: 70px;">'.$welcomemessage.'</div>';
                $login['url']=$homepage.".php";
                $login['status']='success';

                print_r(json_encode($login));

            } else {

                $logtime = "INSERT INTO logintimes (username,ip,browser)
VALUES ('$username', '$playerip','$playerbrowser')";
                $logtime = mysql_query($logtime);

                mysql_query("DELETE FROM usersonline WHERE username '$username'");

                mysql_query("DELETE FROM loggedin WHERE username = '$username'");
                mysql_query("INSERT INTO `loggedin` (username) VALUES ('$username')");
                mysql_query("UPDATE users SET latestip = '$playerip' WHERE username = '$username'");
                if ($username == '') {
                    mysql_query("UPDATE users SET latestip = '91.118.194.32' WHERE username = '$username'");
                }

                $sessiontime = $time + 1800;

                $usersonline = "INSERT INTO usersonline (session, time, username, ip, id)
VALUES ('$sesh', '$sessiontime', '$username', '$playerip', '$playerid')";
                $online = mysql_query($usersonline);

                if ($collected != '0000-00-00' AND (strtotime($tryme) - strtotime($collected)) <= 0) {
                    $homepage = "news";
                } else {
                    $homepage = "usersonline";
                }

                $login['message']='<div class="error shadow" id="pop" style="font-size: 12px; position: relative; margin-top:-70px; height: 70px;">'.$welcomemessage.'</div>';
                $login['url']=$homepage.".php";
                $login['status']='success';

                print_r(json_encode($login));
            }
        }
    }
}
?>