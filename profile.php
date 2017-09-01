<? include 'included.php';
ini_set('upload_tmp_dir','./tmp');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" href="layout/style.css" type="text/css"/>
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
            var txt = $.trim(em);
            var box = $("#editprofile2");
            box.val(box.val() + txt);
        }
    </script>
    <script>
        function checkAll(field) {
            for (t = 0; t < field.length; t++)
                field[t].checked = true;
        }
        function uncheckAll(field) {
            for (t = 0; t < field.length; t++)
                field[t].checked = false;
        }

        function showdiv() {
            document.getElementById("front").style.display = "block";
            document.getElementById("linkone").style.display = "none";
            document.getElementById("linktwo").style.display = "block";
        }

        function hidediv() {
            document.getElementById("front").style.display = "none";
            document.getElementById("linkone").style.display = "block";
            document.getElementById("linktwo").style.display = "none";

        }


        function hidedivav() {
            document.getElementById("textareatits").style.display = "none";
            document.getElementById("avatartits").style.display = "block";

        }


        function hidedivavy() {
            document.getElementById("textareatits").style.display = "block";
            document.getElementById("avatartits").style.display = "none";

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
            $zpattern[a] = "<";
            $zpattern[b] = ">";
            $zreplace[a] = "&lt;";
            $zreplace[b] = "&gt;";
            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate, "", $sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $bustraw = $_POST['bust'];
            $killsraw = $_POST['kills'];
            $casinosraw = $_POST['casinosa'];
            $viewera = $_POST['views'];
            $newmusicraw = $_POST['music'];
            $newstatusraw = $_POST['status'];
            $dohonours = $_POST['honours'];
            $dohonours2 = $_POST['honours2'];
            $tippy = $_POST['gametips'];
            $notty = $_POST['notifications'];
            $newmusic = htmlentities($newmusicraw, ENT_QUOTES);
            $newstatus = htmlentities($newstatusraw, ENT_QUOTES);
            $bust = preg_replace($saturate, "", $bustraw);
            $kills = preg_replace($saturate, "", $killsraw);
            $casinos = preg_replace($saturate, "", $casinosraw);
            $viewer = preg_replace($saturate, "", $viewera);
            $tippy = preg_replace($saturated, "", $tippy);
            $notty = preg_replace($saturated, "", $notty);

            $gangsterusername = $usernameone;


            $getuserinfoarray = $statustesttwo;
            $getuserprofile = $getuserinfoarray['profile'];
            $getpassword = $getuserinfoarray['password'];
            $getdisplay = $getuserinfoarray['displaybusts'];
            $autoplay = $getuserinfoarray['autoplay'];
            $gettips = $getuserinfoarray['tips'];
            $getnote = $getuserinfoarray['shownot'];

            $userprofiles = str_replace("<br />", "\n", $getuserprofile);

            $profilesubmitraw = $_POST['editprofile2'];
            $profilesubmit = htmlentities($profilesubmitraw, ENT_QUOTES);

            if(isset($_POST['newAvatarSubmit'])){
                if(isset($_FILES['profile_image'])){
                    $errors= array();
                    $file_name = $_FILES['profile_image']['name'];
                    $file_size =$_FILES['profile_image']['size'];
                    $file_tmp =$_FILES['profile_image']['tmp_name'];
                    $file_type=$_FILES['profile_image']['type'];
                    $file_ext=strtolower(end(explode('.',$_FILES['profile_image']['name'])));

                    $expensions= array("jpeg","jpg","png");

                    if(in_array($file_ext,$expensions)=== false){
                        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                    }

                    if($file_size > 2097152){
                        $errors[]='File size must be excately 2 MB';
                    }

                    if(empty($errors)==true){
                        $temp = explode(".", $_FILES["profile_image"]["name"]);
                        $newfilename = $ida. '_profile.' . end($temp);
                        move_uploaded_file($file_tmp,"./images/profile/".$newfilename);
                        mysql_query("UPDATE users SET image = './images/profile/".$newfilename."' WHERE ID = '$ida'");

                        echo "Avatar Image Updated!";
                    }else{
                        echo "An error ocurred!";
                    }
                }

            }
            else if(isset($_GET['removeAv'])){
                mysql_query("UPDATE users SET image = NULL WHERE ID = '$ida'");
                echo "Avatar Image Removed!";
            }

            if (isset($_POST['music'])) {
                mysql_query("UPDATE users SET music = '$newmusic' WHERE ID = '$ida'");
                $showoutcome++;
                $outcome = "Your music has been updated!";
            } if (isset($_POST['status'])) {
                mysql_query("UPDATE users SET quote = '$newstatus' WHERE ID = '$ida'");
                $showoutcome++;
                $outcome = "Your status has been updated!<META HTTP-EQUIV=Refresh CONTENT='1; URL=viewprofile.php?username=$usernameone'>";
            } if(isset($_POST['showon'])){
                if (isset($_POST['changeautoplay'])) {
                    mysql_query("UPDATE users SET autoplay = '1' WHERE ID = '$ida'");
                }else{
                    mysql_query("UPDATE users SET autoplay = '0' WHERE ID = '$ida'");
                }
                if (isset($_POST['mute'])) {
                    mysql_query("UPDATE users SET mute = '1' WHERE ID = '$ida'");
                }else {
                    mysql_query("UPDATE users SET mute = '0' WHERE ID = '$ida'");
                }
                if (isset($_POST['blockCasino'])) {
                    mysql_query("UPDATE users SET blockcasinos='1' WHERE ID = '$ida'");
                }else {
                    mysql_query("UPDATE users SET blockcasinos='0' WHERE ID = '$ida'");
                }
            }if (isset($_POST['editprofile2'])) {
                mysql_query("UPDATE users SET profile = '$profilesubmit' WHERE ID = '$ida'");

                $getuserinfosqldone = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
                $getuserinfoarraydone = mysql_fetch_array($getuserinfosqldone);
                $getuserprofiledtwo = $getuserinfoarraydone['profile'];
                $getuserprofiledone = str_replace("<br />", "\n", $getuserprofiledtwo);
                $showoutcome++;
                $outcome = "Profile updated!";
            } if (isset($_POST['showon'])) {
                $showoutcome++;
                $outcome = "Profile updated!";
                if (!$bust) {
                    mysql_query("UPDATE users SET displaybusts = 'no' WHERE ID = '$ida'");
                } else {
                    mysql_query("UPDATE users SET displaybusts = 'yes' WHERE ID = '$ida'");
                }


                if (!$kills) {
                    mysql_query("UPDATE users SET displaykills = 'no' WHERE ID = '$ida'");
                } else {
                    mysql_query("UPDATE users SET displaykills = 'yes' WHERE ID = '$ida'");
                }


                if (!$casinos) {
                    mysql_query("UPDATE users SET casinowins = '1' WHERE ID = '$ida'");
                } else {
                    mysql_query("UPDATE users SET casinowins = '2' WHERE ID = '$ida'");
                }


                if (!$dohonours) {
                    mysql_query("UPDATE users SET showhonours = '1' WHERE ID = '$ida'");
                } else {
                    mysql_query("UPDATE users SET showhonours = '2' WHERE ID = '$ida'");
                }

                if (!$dohonours2) {
                    mysql_query("UPDATE users SET showhonours2 = '1' WHERE ID = '$ida'");
                } else {
                    mysql_query("UPDATE users SET showhonours2 = '2' WHERE ID = '$ida'");
                }

                if (!$tippy) {
                    mysql_query("UPDATE users SET tips = '1' WHERE ID = '$ida'");
                } else {
                    mysql_query("UPDATE users SET tips = '0' WHERE ID = '$ida'");
                }


                if (!$notty) {
                    mysql_query("UPDATE users SET shownot = '1' WHERE ID = '$ida'");
                } else {
                    mysql_query("UPDATE users SET shownot = '0' WHERE ID = '$ida'");
                }

            }


            if (isset($_POST['oldpassword'])) {


                $oldpass = $_POST['oldpassword'];
                $newpass = $_POST['newpassword'];
                $confirm = $_POST['newpasswordconfirm'];


                if (strlen($_POST['oldpassword']) > '50') {
                    $showoutcome++;
                    $outcome = "Entered info is incorrect!";
                } elseif (strlen($_POST['newpassword']) > '50') {
                    $showoutcome++;
                    $outcome = "Entered info is incorrect!";
                } elseif (strlen($_POST['newpasswordconfirm']) > '50') {
                    $showoutcome++;
                    $outcome = "Entered info is incorrect!";
                } elseif ($oldpass != $getpassword) {
                    $showoutcome++;
                    $outcome = "Entered info is incorrect!";
                } elseif ($newpass != $confirm) {
                    $showoutcome++;
                    $outcome = "Passwords did not match!";
                } else {
                    mysql_query("UPDATE users SET password = '$newpass' WHERE ID = '$ida'");
                    mysql_query("DELETE FROM usersonline WHERE username = '$gangsterusername'");
                    $showoutcome++;
                    $outcome = "Password changed!";
                }
            }

            $showcarraw = $_POST['showcar'];
            if (isset($_POST['doshow'])) {
                $showcar = preg_replace($saturated, "", $showcarraw);
                mysql_query("UPDATE cars SET display = ' ' WHERE owner = '$gangsterusername'");
                $n = count($showcar);
                $i = 0;
                $showoutcome++;
                $outcome = "Profile updated!";
                if ($showcar) {
                    if ($n >= 1) {
                        while ($i < $n) {
                            $doit = $showcar[$i];
                            $ifnota = mysql_query("SELECT * FROM cars WHERE id = $doit");
                            $ifnot = mysql_fetch_array($ifnota);
                            $ifnotname = $ifnot['owner'];
                            if ($ifnotname != $gangsterusername) {
                            } else {
                                mysql_query("UPDATE cars SET display = 'yes' WHERE id = '$doit' AND owner = '$gangsterusername'");
                            }
                            $i++;
                        }
                    }
                }
            }

            $selecterraw = $_POST['select'];
            $selecter = preg_replace($saturated, "", $selecterraw);
            if (isset($_POST['next'])) {
                $one = $selecter + 1;
            } elseif (isset($_POST['previous'])) {
                $one = $selecter - 1;
            } else {
                $one = '0';
            }

            $selectfroma = $one * 30;
            $selecttoa = $selectfrom + 30;
            $selectfrom = preg_replace($saturated, "", $selectfroma);
            $selectto = preg_replace($saturated, "", $selecttoa);

            $carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC LIMIT $selectfrom,$selectto");
            $carlistamount = mysql_query("SELECT id FROM cars WHERE owner = '$gangsterusername'");
            $carlistamount = mysql_num_rows($carlistamount);

            $getuserinfosql = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
            $getuserinfoarray = mysql_fetch_array($getuserinfosql);
            $getdisplay = $getuserinfoarray['displaybusts'];
            $getdisplayss = $getuserinfoarray['casinowins'];
            $getdisplaysshonours = $getuserinfoarray['showhonours'];
            $getdisplaysshonours2 = $getuserinfoarray['showhonours2'];
            $getdisplays = $getuserinfoarray['displaykills'];
            $getdisplayv = $getuserinfoarray['showviews'];
            $musics = html_entity_decode($getuserinfoarray['music'], ENT_QUOTES);
            $music = str_replace($zpattern, $zreplace, $musics);
            $qwot = html_entity_decode($getuserinfoarray['quote'], ENT_QUOTES);
            $quote = str_replace($zpattern, $zreplace, $qwot);
            $getuserprofile = $getuserinfoarray['profile'];
            $autoplay = $getuserinfoarray['autoplay'];
            $blockcasino = $getuserinfoarray['blockcasinos'];
            $gettips = $getuserinfoarray['tips'];
            $getnote = $getuserinfoarray['shownot'];


            $getav = mysql_query("SELECT * FROM suggestions WHERE id = '$ida'");
            $getavarray = mysql_fetch_array($getav);
            $getav = $getavarray['avatar'];


            if ($getav) {
                $avatar = "avatars/$getav";
            } else {
                $avatar = "Untitled-1.png";
            }

            $musica = html_entity_decode($getuserinfoarray['music'], ENT_QUOTES);
            $music = str_replace($zpattern, $zreplace, $musica);

            $userprofile = str_replace("<br />", "\n", $getuserprofile);

            $names = $_POST['name'];
            $name = preg_replace($saturate, "", $names);

            if ($name) {
                $check = "SELECT username,ID FROM users WHERE username = '$name'";
                $checksql = mysql_query($check);
                $checkrows = mysql_num_rows($checksql);
            }

            if (isset($_POST['add'])) {
                $checkifs = "SELECT * FROM friends WHERE myid = '$ida'";
                $checkifsqls = mysql_query($checkifs);
                $checkifrowss = mysql_num_rows($checkifsqls);
                if ($checkifrowss >= '50') {
                    die('<font color=white face=verdana size=1>Friendship is limited to maximum of 50!</font>');
                }

                if (!$name) {
                } elseif ($checkrows != '1') {
                    $showoutcome++;
                    $outcome = "No such user!";
                } else {
                    $checkarray = mysql_fetch_array($checksql);
                    $checkname = $checkarray['username'];
                    $checkid = $checkarray['ID'];

                    $checkif = "SELECT * FROM friends WHERE thereid = '$checkid' AND myid = '$ida'";
                    $checkifsql = mysql_query($checkif);
                    $checkifrows = mysql_num_rows($checkifsql);

                    if ($checkifrows > '0') {
                        $showoutcome++;
                        $outcome = "You have already added that user!";
                    } else {
                        mysql_query("INSERT INTO friends(thereusername,thereid,myusername,myid)
VALUES ('$checkname','$checkid','$usernameone','$ida')");
                        mysql_query("UPDATE users SET notify = '1',notification = 'a_open$usernameone a_closed$usernameone a_slashadded you to his friends list.' WHERE ID = '$checkid'");
                        $showoutcome++;
                        $outcome = "You added <a href=viewprofile.php?username=$checkname>$checkname</a> to your friend list!";
                    }
                }
            } elseif (isset($_POST['remove'])) {
                if (!name) {
                } elseif ($checkrows != '1') {
                    $showoutcome++;
                    $outcome = "No such user!";
                } else {
                    $checkarray = mysql_fetch_array($checksql);
                    $checkname = $checkarray['username'];
                    $checkid = $checkarray['ID'];

                    $checkif = "SELECT * FROM friends WHERE thereid = '$checkid' AND myid = '$ida'";
                    $checkifsql = mysql_query($checkif);
                    $checkifrows = mysql_num_rows($checkifsql);

                    if ($checkifrows != '1') {
                        $showoutcome++;
                        $outcome = "You have not added that user!";
                    } else {
                        mysql_query("DELETE FROM friends WHERE thereid = '$checkid' AND myid = '$ida'");
                        $showoutcome++;
                        $outcome = "You removed <a href=viewprofile.php?username=$checkname>$checkname</a> from your friend list.";
                    }
                }
            }
            ?>
            <? if ($showoutcome >= 1) { ?>
                <span><? echo $outcome; ?></span>
            <? }
            $getuserinfosql = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
            $getuserinfoarray = mysql_fetch_array($getuserinfosql);
            $autoplay = $getuserinfoarray['autoplay'];
            $blockcasino = $getuserinfoarray['blockcasinos'];
            $mute = $getuserinfoarray['mute'];
            ?>
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="main">
                        <div class="menuHeader noTop">
                            Edit Profile
                        </div>
                        <div style="overflow-y: auto; overflow-x: hidden; padding: 5px; margin: auto; margin-top: 25px; text-align: center; color: #fefefe;">
                            <div style="padding-bottom: 22px;">
                                <a href="#" onclick="switchProfileView('pass'); return false;">Change Password</a>
                                <span style="color: #555555; padding-left: 7px; padding-right: 7px;"> - </span>
                                <a href="#" onclick="switchProfileView('friendsList');  return false;">Friends List</a>
                                <span style="color: #555555; padding-left: 7px; padding-right: 7px;"> - </span>
                                <a href="#" onclick="switchProfileView('notepad');  return false;">My Notepad</a>
                                <span style="color: #555555; padding-left: 7px; padding-right: 7px;"> - </span>
                                <a href="viewprofile.php?username=<? echo $gangsterusername; ?>">My Profile</a>
                            </div>
                            <div class="profileDiv" style="padding-bottom: 11px; display: none;" id="notepadDiv">
                                <form method="post" name="smiley">
                                <div class="miniMenu shadowTest curve4pxAllButBottomRight"
                                     style="width: 100%; max-width: 356px; vertical-align: top;">
                                    <div class="miniMenuHeader noTop">
                                        Edit Notepad:
                                    </div>
                                    <div class="miniMain" style="overflow: hidden;">
                                        <textarea placeholder="Update Notepad..." class="textarea curve2pxBottom" id="editprofile" name="editprofile" style="border: 0; -moz-box-sizing: border-box; box-sizing: border-box; width: 100%; height: 222px; margin-bottom: -2px;" tabindex="2"><?php echo $userprofile; ?></textarea>
                                    </div>
                                </div>
                                    <br/><br/>
                                    <input type="submit" value="Update notes"
                                           class="textarea curve3px inline_form"/>
                                </form>
                            </div>
                            <div class="profileDiv" style="padding-bottom: 11px; display: none;" id="passwordDiv">
                                <form action="" method="post">
                                    <label style="color: silver; display: inline-block; width: 53px; text-align: right; padding-right: 4px;"
                                           for="current1">Current: </label>
                                    <input type="password" class="inline_form textarea curve3pxTopRight"
                                           name="oldpassword"><br>
                                    <label style="color: silver; display: inline-block; width: 53px; text-align: right; padding-right: 4px;"
                                           for="confirm">New: </label>
                                    <input type="password" class="textarea inline_form" name="newpassword"><br>
                                    <label style="color: silver; display: inline-block; width: 53px; text-align: right; padding-right: 4px;"
                                           for="confirm">Confirm: </label>
                                    <input type="password" class="textarea inline_form curve3pxBottomRight"
                                           name="newpasswordconfirm"><br/><br/>
                                    <input type="submit" value="Change Password" class="textarea curve3px inline_form"/>
                                </form>
                            </div>
                            <div class="profileDiv" style="padding-bottom: 11px; display: none;" id="friendsListDiv">

                                <div class="miniMenu shadowTest curve3px"
                                     style="vertical-align: top; margin-left: 2px; margin-right: 0; margin-bottom: 5px;  display: inline-block; width: 46%; min-width: 150px; max-width: 270px;">
                                    <div class="miniMenuHeader noTop" style="padding: 7px;">
                                        Users you've added:
                                    </div>
                                    <div class="miniMain preventscroll" id="myFriendsDiv" style="max-height: 200px;">
                                        <table width="100%" cellspacing="0">
                                            <tbody>
                                            <?php
                                            $findgangstersql  = "SELECT * FROM friends WHERE myid = '$ida' ORDER BY id";
                                            $findgangsterresult = mysql_query($findgangstersql);
                                            $findgangsternumrows = mysql_num_rows($findgangsterresult);

                                            if($findgangsternumrows == '0'){}else{
                                                while($tima = mysql_fetch_array($findgangsterresult)){
                                                    $therename = $tima['thereusername'];
                                                    $date = $tima['date'];
                                                    echo"<tr>
                                                        <td class='statsDiv'>
                                                            <a class='statsDivStatics' href=viewprofile.php?username=$therename>$therename</a>
                                                        </td>
                                                        </tr>";
                                                }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="miniMenu shadowTest curve3px"
                                     style="vertical-align: top; margin-left: 2px; margin-right: 0; margin-bottom: 5px;  display: inline-block; width: 46%; min-width: 150px; max-width: 270px;">
                                    <div class="miniMenuHeader noTop" style="padding: 7px;">
                                        Users that've added you:
                                    </div>
                                    <div class="miniMain" style="max-height: 300px;">
                                        <table width="100%" cellspacing="0">
                                            <tbody>
                                            <?php
                                            $findgangstersql  = "SELECT * FROM friends WHERE thereid = '$ida' ORDER BY id";
                                            $findgangsterresult = mysql_query($findgangstersql);
                                            $findgangsternumrows = mysql_num_rows($findgangsterresult);

                                            if($findgangsternumrows == '0'){}else{
                                                while($tima = mysql_fetch_array($findgangsterresult)){
                                                    $therename = $tima['myusername'];
                                                    $date = $tima['date'];
                                                    echo"<tr>
                                                        <td class='statsDiv'>
                                                            <a class='statsDivStatics' href=viewprofile.php?username=$therename>$therename</a>
                                                        </td>
                                                        </tr>";
                                                }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div style="padding-top: 13px;padding-bottom: 10px;">
                                    <form action="" method="post">
                                        <label for="newFriend">Add Friend: </label>
                                        <input type=text class="textarea inline_form" name=name>
                                        <input type=submit name=add class="textarea curve3pxRight" value="Add friend">
                                        <input type=submit name=remove class="textarea curve3pxRight" value="Remove friend">
                                    </form>
                                </div>
                            </div>
                            <div class="break" style="padding-top: 10px;"></div>
                            <div class="spacer"></div>
                            <div class="break" style="padding-top: 22px;"></div>
                            <form id="All" action="" method="post">
                            <div style="display: inline-block; margin-bottom: 10px;">
                                <div class="miniMenu shadowTest curve4pxAllButBottomRight" style="width: 100%; max-width: 1000px; vertical-align: top;">
                                    <div class="miniMenuHeader noTop">
                                        Edit Profile:
                                    </div>
                                    <div class="miniMain" style="overflow: hidden;max-height: 270px;">
                                        <div id=textareatits <?php if($_GET['showav']==1){echo"style=display:none;";}?>>
<!--                                            <form action="" method="post" name="smiley">-->
                                                <textarea name="editprofile2" class="textarea curve2pxBottom" style="border: 0; width: 100%; height: 222px; margin-bottom: -2px;" tabindex="2" id="editprofile2"><?php echo $userprofile;?></textarea>
<!--                                            </form>-->
                                        </div>
                                    </div>
                                </div>
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
                                <img onClick="emotion(':sarcasm:')" src="/layout/smiles/sarcasm.gif" class="smileys">
                            </div>
                            <div style="margin-left: 3px; display: inline-block; vertical-align: top;">

                                <div class="miniMenu shadowTest curve3px" style="width: 100%; max-width: 270px; min-width: 200px; margin-bottom: 6px;">
                                    <div class="miniMenuHeader noTop">
                                        Update Avatar Image:
                                    </div>
                                    <div class="miniMain">
                                        <div class="miniMainDiv txtShadow" style="border-top: 0;">
                                            <label for="showHonours" style="display: block; width: 100%;" onclick="openAvatar();">Select Image....</label>
                                        </div>
                                    </div>
                                </div>

<!--                                <form action="" method="post">-->
                                <div class="miniMenu shadowTest curve3px"
                                     style="width: 100%; max-width: 270px; min-width: 200px; margin-bottom: 6px;">
                                    <div class="miniMenuHeader noTop">
                                        Display on My Profile:
                                    </div>
                                    <div class="miniMain">
                                        <div class="miniMainDiv txtShadow" style="border-top: 0;">
                                            <input type=checkbox name=honours id=honours value=1 style="float: right; margin-right: -1px;" <?php  if($getdisplaysshonours == '2'){echo"CHECKED";}?>>
                                            <label for=honours style="display: block; width: 100%;">&nbsp;Achievements:</label>
                                        </div>
                                        <div class="miniMainDiv txtShadow">
                                            <input type=checkbox name=honours2 id=honours2 value=1 style="float: right; margin-right: -1px;" <?php  if($getdisplaysshonours2 == '2'){echo"CHECKED";}?>>
                                            <label for=honours2 style="display: block; width: 100%;">&nbsp;Casino Achievements:</label>
                                        </div>
                                        <div class="miniMainDiv txtShadow">
                                            <input type=checkbox name=kills id=kills style="float: right; margin-right: -1px;" value=no <?php  if($getdisplays == 'yes'){echo"CHECKED";}?>>
                                            <label for=kills style="display: block; width: 100%;">&nbsp;No of Kills:</label>
                                        </div>
                                        <div class="miniMainDiv txtShadow">
                                            <input type=checkbox name=bust id=bust style="float: right; margin-right: -1px;" value=no <?php  if($getdisplay == 'yes'){echo"CHECKED";}?>>
                                            <label for=bust style="display: block; width: 100%;">&nbsp;No of Jailbusts:</label>
                                        </div>
                                        <div class="miniMainDiv txtShadow">
                                            <input type=checkbox name=casinosa id=casinosa style="float: right; margin-right: -1px;" value=1 <?php  if($getdisplayss == '2'){echo"CHECKED";}?>>
                                            <label for=casinosa style="display: block; width: 100%;">&nbsp;No of Casino Wins:</label>
                                        </div>
                                    </div>
                                </div>
<!--                                </form>-->
                                <div class="miniMenu shadowTest curve3px" style="width: 100%; max-width: 270px; min-width: 200px;">
                                    <div class="miniMenuHeader noTop">
                                        Miscellaneous:
                                    </div>
                                    <div class="miniMain">
                                        <div class="miniMainDiv txtShadow" style="border-top: 0;"><input value="1" style="float: right; margin-right: -1px;" name="mute" id="mute" <?if($mute==true){echo "checked=true";}?> type="checkbox"><label for="mute" style="display: block; width: 100%;">Mute Crewfeed:</label></div>
                                        <div class="miniMainDiv txtShadow"><input value="1" style="float: right; margin-right: -1px;" name="changeautoplay" id="autoPlay" <?if($autoplay==true){echo "checked=true";}?> type="checkbox"><label for="autoPlay" style="display: block; width: 100%;">Autoplay YouTube Videos:</label></div>
                                        <div class="miniMainDiv txtShadow"><input value="1" style="float: right; margin-right: -1px;" name="blockCasino" id="blockCasino" <?if($blockcasino){echo "checked=true";}?> type="checkbox"><label for="blockCasino" style="display: block; width: 100%;">Block Casinos:</label></div>
                                        <input class="textarea" style="width: 100%; border-bottom: 0; border-left: 0; border-right: 0;" name="music" value="<?php echo$music;?>" placeholder="My YouTube Profile Video (Link)..." autocomplete="off" type="text">
<!--                                        </form>-->
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center; padding: 7px; padding-top: 2px;">
                                <input class="textarea curve3px"  tabindex="3" style="padding-left: 8px; padding-right: 8px;" name="showon" value="Save Changes!" type="submit" onclick="var form=document.getElementById('All'); for(i=0;i<form.elements.length;i++)console.log(form.elements[i]);">
                            </div>
                            </form>
                            <div style="margin-top: 15px;">
                                <br/>
                                <center>
                                    <input name="CheckAll" type="button" value="Check all" onclick="checkAll(document.sell['showcar[]'])" class="textarea curve3pxRight">
                                    <input name="unCheckAll" type="button" value="Uncheck all" onclick="uncheckAll(document.sell['showcar[]'])" class="textarea curve3pxRight">
                                </center>
                                <br/>
                                <form action="" method="post" name="sell">
                                <table class="regTable" id="carTable"
                                       style="margin: auto; margin-bottom: 18px; width: 80%; max-width: 700px;"
                                       cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr>
                                        <td colspan="5" class="header">
                                            Show on Profile:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="subHeader"></td>
                                        <td class="subHeader" style="border-left: 0; width: 60%;">Car</td>
                                        <td class="subHeader" style="width: 20%;">Damage&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <?php
                                    $contador=0;
                                    while($carlists = mysql_fetch_array($carlist)){
                                        $carid = $carlists['carid'];
                                        $carida = $carlists['id'];
                                        $card = $carlists['damage'];
                                        $checkedraw = $carlists['display'];
                                        $carname = $carlists['carname'];
                                        $carnamea = $carlists['carname'];

                                        if($checkedraw == 'yes'){$checked = 'CHECKED';}else{$checked = ' ';}


                                        if($carid == 1){$carname = 'Volvo';}
                                        elseif($carid == 2){$carname = 'Renault Clio';}
                                        elseif($carid == 3){$carname = 'Porsche 911';}
                                        elseif($carid == 4){$carname = 'BMW';}
                                        elseif($carid == 5){$carname = 'Aston Martin';}
                                        elseif($carid == 6){$carname = 'Alfa Romeo';}
                                        elseif($carid == 7){$carname = 'Continental GT';}
                                        elseif($carid == 8){$carname = 'Maybach 62';}
                                        elseif($carid == 9){$carname = 'Maserati';}
                                        elseif($carid == 10){$carname = 'Audi TT';}
                                        elseif($carid == 11){$carname = 'Porsche Carrera GT';}
                                        elseif($carid == 12){$carname = 'Pagani Zonda';}
                                        elseif($carid == 13){$carname = $carnamea;}
                                        elseif($carid == 14){$carname = 'Bugatti Veyron';}
                                        elseif($carid == 15){$carname = 'Ferrari 458 Italia';}
                                        elseif($carid == 16){$carname = 'Lamborghini Murcielago';}
                                        elseif($carid == 17){$carname = 'Koenigsegg Agera R';}
                                        elseif($carid == 18){$carname = 'Lamborghini Aventador';}
                                        elseif($carid == 19){$carname = 'Audi Prologue';}
                                        if($carid == 12){$before = '<b><font color=red face=verdana size=1>Very Rare:&nbsp;</b></font>';}
                                        elseif($carid == 9){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                                        elseif($carid == 10){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                                        elseif($carid == 11){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
										elseif($carid == 16){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
										elseif($carid == 17){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                                        elseif($carid == 13){$before = '<b><font color=red face=verdana size=1>Custom:&nbsp;</b></font>';}
                                        elseif($carid >= 14 && $carid != 16 && $carid != 17){$before = '<b><font color=#0066FF face=verdana size=1>Super Rare:&nbsp;</b></font>';}
                                        else{ $before = ''; }
                                        if($contador==0){
                                            echo"<tr class='row'>
                                                <td class='col noTop' style=\"width: 1%;\"><input type=checkbox value=$carida name='showcar[]' $checked style='vertical-align:middle;'></td>
                                                <td class='col noTop'>                                                  
                                                    <a href=viewcar.php?id=$carida>$before$carname</a>
                                                </td>
                                                <td class='col noTop' align=left>
                                                    &nbsp;$card%<input type=checkbox style='visibility:hidden; vertical-align: middle;'>
                                                </tr>
                                        ";
                                        }else{
                                            echo"<tr class='row'>
                                                <td class='col' style=\"width: 1%;\"><input type=checkbox value=$carida name='showcar[]' $checked style='vertical-align:middle;'></td>
                                                <td class='col'>                                                  
                                                    <a href=viewcar.php?id=$carida>$before$carname</a>
                                                </td>
                                                <td class='col' align=left>
                                                    &nbsp;$card%<input type=checkbox style='visibility:hidden; vertical-align: middle;'>
                                                </tr>
                                        ";
                                        }

                                        $contador++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                    <?php  if($carlistamount > 50){?>
                                    <div style="padding: 7px; margin-bottom: 5px; text-align: center;">
                                        <form action = "" method = "post">
                                            <input type="hidden" name="select" value="<?php  echo $one; ?>">
                                            <?php if($selectfrom != '0'){
                                                echo'<input type ="submit" value="Prev page" class="textarea curve3px" name="previous">';}?>
                                            <input type ="submit" value="Next page" class="textarea curve3px" name="next">
                                        </form>
                                    </div>
                                    <?php }else{echo"<br>";}?>
                                    <input type="submit" value="Save Changes!" class="textarea curve3pRight" name="doshow">
                                </form>
                            </div>
                            <div class="spacer"></div>
                            <div class="break" style="padding-top: 7px;"></div>
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

include 'included.php';

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
                                <div id="crewFeedChat" style="max-width: 218px;"></div>
                                <form method="post" onsubmit="submitCrewFeed(); return false;">
                                    <input type="hidden" value="<?echo $statustesttwo['username'];?>" id="feed_name">
                                    <input type="hidden" value="<?echo $statustesttwo['crewid'];?>" id="feed_crew">
                                    <input class="textarea" id="feed_msg"                                           style="box-sizing: border-box; -moz-box-sizing: border-box; width: 100%; position: absolute; bottom: 0; margin-bottom: -1px; border-top: 2px solid rgba(20, 20, 20, 0.8); border-bottom: 0; border-left: 0; border-right: 0;"                                           placeholder="Enter Message..." type="text">                                </form>                            </div>                        </div>                    </td>                    <td class="right"></td>                </tr>                <tr>                    <td class="bottomleft"></td>                    <td class="bottom"></td>                    <td class="bottomright"></td>                </tr>            </table><div style="padding: 10px; font-size: 9.5px; opacity:0.7; text-align: center;">You can mute sounds in <a href="profile.php">Edit Profile</a>		</div>
            <?}?>
        </td>
    </tr>
</table>
<div id="clickOff" class="clickOff" style="display: none;"></div>
<div id="hoverDiv" class="hoverDiv" style="display: none;">
    <form method="post" action="" enctype="multipart/form-data">
        <input class="textarea curve2px" style="background-color: #eeeeee; color: black; padding-left: 7px; padding-right: 7px;" onclick="$('#newAvatar').click(); return false;" value="Select File to Upload..." type="submit">
        <div style="display: inline-block; padding-left: 3px; padding-right: 3px;" id="list"></div>
        <input id="newAvatar" name="profile_image" style="display: none;" type="file">
        <input name="newAvatarSubmit" value="Upload File" class="textarea curve3px" style="padding-left: 7px; padding-right: 7px;" type="submit">
        <a href="#" style="padding-left: 4px;" onclick="closeAvatar(); return false;">(Close)</a>	<div style="padding: 10px;"><span style="color: silver;">Max Size:</span> 500KB. <span style="color: silver;">Allowed Formats:</span> JPG, JPEG, PNG, GIF.</div>
    </form>
    <? if ($getuserinfoarray['image']!=null){?>
    <table class="menuTable curve10px" style="width: 100px; z-index: 2000;  overflow: hidden;" cellspacing="0" cellpadding="0" align="center">
        <tbody><tr>
            <td class="topleft"></td>
            <td class="top"></td>
            <td class="topright"></td>
        </tr>
        <tr>
            <td class="left"></td>
            <td style="position: relative;">
                <img src="<?echo $getuserinfoarray['image'];?>" id="myAv" style="border: 0px none; min-height: 50px; min-width: 100px; max-height: 728.25px; max-width: 1516.8px;">
                <a href="profile.php?removeAv=1" class="shadowTest curve4pxBottomRight delete" style="background-color: maroon; border-right: 2px solid #111111; border-bottom: 2px solid #111111;">remove</a>
                <a href="#" onclick="closeAvatar();  return false;" class="shadowTest curve4pxBottomLeft close" style="background-color: #333333; border-left: 2px solid #111111; border-bottom: 2px solid #111111;">close</a>
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
    <?}?>
</div>
</body>
</html>






