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
            $saturated = "/[^a-z0-9]/i";
            $ah = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $userraw = mysql_real_escape_string($_POST['user']);
            $user = preg_replace($saturate,"",$userraw);
            $gangsterusername = $usernameone;
            $createcrewraw = mysql_real_escape_string($_POST['createcrew']);
            $applyidraw = mysql_real_escape_string($_POST['apply']);
            $crewidraw = mysql_real_escape_string($_POST['crewid']);
            $applyid = preg_replace($saturated,"",$applyidraw);
            $crewid = preg_replace($ah,"",$crewidraw);
            $createcrew = htmlentities($createcrewraw, ENT_QUOTES);
            $newnameraw = mysql_real_escape_string($_POST['newname']);

            $newname = htmlentities($newnameraw, ENT_QUOTES);

            $hdotestnumrows = $hdo;

            $getinfoarray = $statustesttwo;
            $myrank = $getinfoarray['rankid'];
            $helf = $getinfoarray['health'];
            $getcrewid = $getinfoarray['crewid'];
            $getname = $getinfoarray['username'];
            $getrank = $getinfoarray['rankid'];
            $getmoney = $getinfoarray['money'];
            $crewbulletsb = $getinfoarray['crewbullets'];

            $news = mysql_num_rows(mysql_query("SELECT username FROM news WHERE username = '$usernameone'"));

            $aahdoperson = mysql_num_rows(mysql_query("SELECT username FROM hdos WHERE username = '$usernameone'"));



            if (isset($_POST['crewid'])) {
                if(($aahdoperson < '1')&&($getrank < '25')&&($news > '1')){}elseif(!$crewid){}
                else{$crewcheck = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE id = '$crewid'"));
                    $crewchecktwo = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE name = '$newname'"));
                    if($crewcheck < '1'){$showoutcome++; $outcome = "Crew id does not exist!</font>";}
                    elseif(($crewid == '1')&&($myrank != '100')){$showoutcome++; $outcome = "Want to be demoted?</font>";}
                    elseif($crewchecktwo > '0'){$showoutcome++; $outcome = "Crew name already in use!</font>";}
                    else{mysql_query("UPDATE crews SET name = '$newname' WHERE id = '$crewid'");mysql_query("UPDATE crews SET hdo = '$gangsterusername' WHERE id = '$crewid'");$showoutcome++; $outcome = "Crew name changed!</font>";}}}

            $entertainer = $ent;

            $getcrewssql = mysql_query("SELECT name,boss,id FROM crews ORDER BY id ASC");
            $getcrewsamount = mysql_num_rows($getcrewssql);

            $createcheck = mysql_query("SELECT name FROM crews WHERE name = '$createcrew'");
            $createcheckrows = mysql_num_rows($createcheck);


            if (isset($_POST['leavecrew'])) {
                mysql_query("UPDATE crews SET underboss = '' WHERE underboss = '$getname'");
                mysql_query("UPDATE users SET crewid = '0', crewdrugs = '0' WHERE username = '$getname'");
                mysql_query("DELETE FROM recruiters WHERE username = '$getname'");
                mysql_query("DELETE FROM crewsbullets WHERE username = '$getname'");
                mysql_query("UPDATE users SET rr = '0' WHERE username = '$getname'");
                $showoutcome++; $outcome = "You left your crew!</font>";
            }


            if(isset($_POST['createcrew'])) {

                $crewbosschecksql = mysql_query("SELECT boss FROM crews WHERE boss = '$getname'");
                $crewbosscheck = mysql_num_rows($crewbosschecksql);
                if($crewbosscheck > '0'){$showoutcome++; $outcome = "Your already in a crew!</font>";}
                if(!$createcrew){}
                elseif($getcrewid != '0'){$showoutcome++; $outcome = "Your already in a crew!</font>";}
                elseif($getcrewsamount >= '8'){
                    $showoutcome++; $outcome = "All crew slots have been taken!</font>";}
                elseif($entertainer != '0'){$showoutcome++; $outcome = "As entertainer you cannot use this feature!</font>";}
                elseif($getrank < '9'){$showoutcome++; $outcome = "You must be atleast a Hitman to create a crew!</font>";}
                elseif($getmoney < '35000000'){$showoutcome++; $outcome = "You dont have enough money, creating a crew costs $35,000,000!</font>";}
                elseif($createcheckrows > '0'){$showoutcome++; $outcome = "That crew name is already taken!</font>";}
                else{
                    $time = time();
                    $timer = $time + 36000;
                    mysql_query("INSERT INTO crews(boss,bullets,crewprofile,name,timer)
VALUES ('$getname', '0', ' ','$createcrew','$timer')");
                    mysql_query("UPDATE users SET money = money - '35000000' WHERE username = '$getname'");
                    $updatecrewid = mysql_fetch_array(mysql_query("SELECT * FROM crews WHERE boss = '$getname'"));
                    $updateid = $updatecrewid['id'];
                    mysql_query("UPDATE users SET crewid = '$updateid' WHERE username = '$getname'");
                    mysql_query("DELETE FROM applicants WHERE username = '$gangsterusername'");
                    mysql_query("UPDATE users SET crewbullets = '0' WHERE ID = '$ida'");
                    $showoutcome++; $outcome = "Crew succesfully created!</font>";
                }}

            $checkcrewid = mysql_query("SELECT * FROM crews WHERE id = '$applyid'");
            $checkcrewidrows = mysql_num_rows($checkcrewid);
            $checkcrewidarray = mysql_fetch_array($checkcrewid);
            $checkappcrewraw=html_entity_decode($checkcrewidarray['name'],ENT_QUOTES);
            $checkappcrew = str_replace($zpattern,$zreplace,$checkappcrewraw);

            $crewnamesql = mysql_query("SELECT * FROM crews WHERE id = '$applyid'");
            $crewnamearray = mysql_fetch_array($crewnamesql);
            $crewnameraw = $crewnamearray['name'];
            $crewnameraww = $crewnamearray['wmessage'];
            $crewboss = $crewnamearray['boss'];
            $crewname= htmlentities($crewnameraw,ENT_QUOTES);

            $checkapplications = mysql_query("SELECT * FROM applicants WHERE username = '$getname'");
            $checkapp = mysql_num_rows($checkapplications);

            $checkapparray = mysql_fetch_array($checkapplications);
            $waitingstage = $checkapparray['stage'];
            $waitingcrewa = html_entity_decode($checkapparray['crewname'],ENT_QUOTES);
            $waitingcrew = str_replace($zpattern,$zreplace,$waitingcrewa);

            if(isset($_POST['apply'])) {
                $iscrewrecuitingg = mysql_query("SELECT * FROM crews WHERE id = '$applyid'");
                $iscrewrecuiting = mysql_fetch_array($iscrewrecuitingg);
                $hmmm = $iscrewrecuiting['manageapp'];
                $getitsname = $iscrewrecuiting['name'];

                $rtettseb= mysql_query("SELECT * FROM crews WHERE boss = '$usernameone' AND id = '$applyid'");
                $gfdgdsg = mysql_num_rows($rtettseb);

                if($gfdgdsg > '0'){ mysql_query("UPDATE users SET crewid = '$applyid' WHERE ID = '$ida'");
                    mysql_query("DELETE FROM applicants WHERE username = '$usernameone'");
                    die('<font color=white face=verdana size=1>Welcome Back!</font>');}

                if($myrank >= '25'){ mysql_query("UPDATE users SET crewid = '$applyid' WHERE ID = '$ida'");
                    mysql_query("DELETE FROM applicants WHERE username = '$usernameone'");
                    $message= "join";
                    mysql_query("INSERT INTO crewfeed(crew,message, user) VALUES ('$applyid', '$message', '$usernameone')");
                    die('<font color=white face=verdana size=1>Joined!</font>');}

                if($getcrewid != '0'){}
                elseif($checkcrewidrows == '0'){$showoutcome++; $outcome = "Error, crew doest not exist!</font>";}
                elseif($hmmm == 'reject'){$showoutcome++; $outcome = "This crew is rejecting all applications!</font>";}
                elseif($hmmm == 'accept'){ mysql_query("DELETE FROM applicants WHERE username = '$getname'");
                    mysql_query("UPDATE users SET crewbullets = '0' WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET crewid = '$applyid' WHERE id = '$ida'");
                    $showoutcome++; $outcome = "You are now a member of $getitsname!</font>";
                    mysql_query("UPDATE users SET mail=mail+'1' WHERE username='$getname'");
                    $f = ("$crewnameraww");
                    mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$getname','$crewboss','1','$userip','$f')");
                    $message= "join";
                    mysql_query("INSERT INTO crewfeed(crew,message, user) VALUES ('$applyid', '$message', '$getname')");
                }
                elseif($checkapp != '0'){

                    mysql_query("UPDATE applicants SET crewid = '$applyid' WHERE username = '$getname'");
                    mysql_query("UPDATE applicants SET crewname = '$checkappcrew' WHERE username = '$getname'");
                    mysql_query("UPDATE applicants SET stage = '0' WHERE username = '$getname'");
                    mysql_query("UPDATE users SET crewbullets = '0' WHERE ID = '$ida'");
                    $showoutcome++; $outcome = "Application sent!</font>";

                    mysql_query("UPDATE users SET notification = 'New <b>Crew Application' WHERE crewid = '$applyid' AND rr != '0'");
                    mysql_query("UPDATE users SET notify = notify + 1 WHERE crewid = '$applyid' AND rr != '0'");

                }
                else{ mysql_query("INSERT INTO applicants(username,crewid,ip,stage,crewname)
VALUES ('$getname', '$applyid','$userip','0','$checkappcrew')");
                    $showoutcome++; $outcome = "Application sent!</font>";
                    mysql_query("UPDATE users SET notification = 'New Crew Applicants!' WHERE crewid = '$applyid' AND rr != '0'");
                    mysql_query("UPDATE users SET notify = notify + 1 WHERE crewid = '$applyid' AND rr != '0'");


                }}

            ?>
            <? if ($showoutcome >= 1) { ?>
                <span><? echo $outcome; ?></span>
            <? }

            $statustest = mysql_query("SELECT * FROM users WHERE username = '$usernameone'")or die(mysql_error());
            $statustesttwo = mysql_fetch_array($statustest);
            $getinfoarray = $statustesttwo;
            $myrank = $getinfoarray['rankid'];
            $helf = $getinfoarray['health'];
            $getcrewid = $getinfoarray['crewid'];
            $getname = $getinfoarray['username'];
            $getrank = $getinfoarray['rankid'];
            $getmoney = $getinfoarray['money'];
            $crewbulletsb = $getinfoarray['crewbullets'];

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
                                Crews
                            </div>
                            <div style="padding: 5px; padding-top: 32px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;">

                                <div style="font-size: 11px; text-align: center;margin-bottom: 27px;">
                                    <?if($checkapp != '0'){
                                    if($waitingstage == '0'){
                                        echo"<b style=\"color: #FFC753;\">Status</b>: You have applied for <a href=\"viewcrew.php?crewid=137\"><b>$waitingcrew</b></a>...";
                                    } elseif($waitingstage == '1'){
                                        echo"<b style=\"color: #FFC753;\">Status</b>: You have acepted for <a href=\"viewcrew.php?crewid=137\"><b>$waitingcrew</b></a>!";
                                        mysql_query("DELETE FROM applicants WHERE username = '$getname' AND stage = '1'");
                                    }else{
                                        echo"<b style=\"color: #FFC753;\">Status</b>: You have refused for <a href=\"viewcrew.php?crewid=137\"><b>$waitingcrew</b></a>!";
                                        mysql_query("DELETE FROM applicants WHERE username = '$getname' AND stage = '2'");
                                    }
                                    }?>
                                </div>

                                <form method="post" action="">
                                    <table class="regTable" style="margin-bottom: 23px; width: 95%; max-width: 800px;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody><tr>
                                            <td class="header" colspan="45" style="padding-top: 9px; padding-bottom: 9px;">
                                                All Crews
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="subHeader" colspan="3" style="width: 33%;">Name</td>
                                            <td class="subHeader" style="width: 18%;">Boss</td>
                                            <td class="subHeader" style="width: 18%;">Underboss</td>
                                            <td class="subHeader" style="width: 9%;">Members</td>
                                        </tr>
                                        <?php
                                        $getcrewssqll = mysql_query("SELECT name,boss,id FROM crews WHERE id = 1 ORDER BY id ASC");
                                        while($getcrewsarrayy = mysql_fetch_array($getcrewssqll))
                                        {
                                            $crewnameraw = html_entity_decode($getcrewsarrayy['name'], ENT_QUOTES);
                                            $crewname = str_replace($zpattern,$zreplace,$crewnameraw);
                                            $crewid = $getcrewsarrayy['id'];
                                            $crewboss = $getcrewsarrayy['boss'];
                                            $manageapp = $getcrewsarrayyy['manageapp'];

                                            if($isthereunderboss > 0){
                                                $getcrewunderboss = mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$crewid'");
                                                $underbossinfo = mysql_fetch_array($getcrewunderboss);
                                                $crewunderboss = $underbossinfo['username'];
                                            }else{
                                                $crewunderboss="-";
                                            }

                                            if($getcrewid == $crewid){ $recruitment = "<input type=submit name=leavecrew value=Leave class=textbox style='width:100%;'>"; }elseif($getcrewid > 0 || $getrank < '25'){ $recruitment = "<input type=submit name=doall class=textbox style='visibility:hidden;width:1%;'>"; }else{ $recruitment = "<input type=hidden name=apply value=$crewid><input type=submit value=Apply class=textbox style='width:100%;'>"; }
                                            if($crewid == '1'){$dis = 'disaaabled';}else{$dis = ' ';}
                                            $crewmembers = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid='1'"));
                                            $ifselling = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE type != '' AND id = '1'"));
                                            if($ifselling > '0'){ $sellc = "<b>(For sale)</b>"; }else{ $sellc = ""; }?>
                                            <tr class="row">
                                                <td class="col " style="width: 1%;"><input name="apply" value="<?echo$crewid;?>" type="radio"></td>
                                                <td class="col " style="font-size: 11px; padding-right: 10px; color: #ffffff;"><a href="viewcrew.php?crewid=<?echo $crewid;?>"><?echo $crewname;?></a></td>
                                                <td class="col " style="text-align: right; border-left: 0;padding-left: 4px !important; padding-right: 4px !important;">
                                                    <div style="">
                                                    </div>
                                                </td>
                                                <td class="col " style="font-size: 11px; padding-right: 10px; color: #ffffff;"><a href="viewprofile.php?username=<?echo $crewboss;?>"><?echo $crewboss;?></a></td>
                                                <td class="col " style="font-size: 11px; padding-right: 10px; color: #ffffff;"><a href="viewcrew.php?crewid=<?echo $crewunderboss;?>"><?echo $crewunderboss;?></a></td>
                                                <td class="col " style="font-size: 11px; padding-right: 10px; color: #ffffff;"><?echo $crewmembers;?></td>
                                            </tr>
                                        <?
                                        }

                                        $getcrewssqlll = mysql_query("SELECT name,boss,id,manageapp FROM crews WHERE id > 1 ORDER BY id ASC");
                                        while($getcrewsarrayyy = mysql_fetch_array($getcrewssqlll))
                                        {
                                            $crewnameraw = html_entity_decode($getcrewsarrayyy['name'], ENT_QUOTES);
                                            $crewname = str_replace($zpattern,$zreplace,$crewnameraw);
                                            $crewid = $getcrewsarrayyy['id'];
                                            $crewboss = $getcrewsarrayyy['boss'];
                                            $manageapp = $getcrewsarrayyy['manageapp'];

                                            $isthereunderboss = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$crewid'"));
                                            if($isthereunderboss > 0){
                                                $getcrewunderboss = mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$crewid'");
                                                $underbossinfo = mysql_fetch_array($getcrewunderboss);
                                                $crewunderboss = $underbossinfo['username'];
                                            }else{
                                                $crewunderboss="-";
                                            }

                                            if($getcrewid == $crewid){ $recruitment = "<input type=submit name=leavecrew value=Leave class=textbox style='width:100%;'>"; }elseif($getcrewid > 0 || $manageapp == 'reject'){ $recruitment = "<input type=submit name=doall class=textbox style='visibility:hidden;width:1%;'>"; }elseif($manageapp == 'accept'){ $recruitment = "<input type=hidden name=apply value=$crewid><input type=submit value=Join class=textbox style='width:100%;'>"; }elseif($manageapp == 'manual'){ $recruitment = "<input type=hidden name=apply value=$crewid><input type=submit value=Apply class=textbox style='width:100%;'>"; }
                                            if($crewid == '1'){$dis = 'disaaabled';}else{$dis = ' ';}
                                            $crewmembers = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid='$crewid'"));
                                            $ifselling = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE type != '' AND id = '$crewid'"));
                                            if($ifselling > 0){ $sellc = "<b>(For sale)</b>"; }else{ $sellc = ""; }?>

                                            <tr class="row">
                                                <td class="col " style="width: 1%;"><input name="apply" value="<?echo$crewid;?>" type="radio"></td>
                                                <td class="col " style="font-size: 11px; padding-right: 10px; color: #ffffff;"><a href="viewcrew.php?crewid=<?echo $crewid;?>"><?echo $crewname;?></a></td>
                                                <td class="col " style="text-align: right; border-left: 0;padding-left: 4px !important; padding-right: 4px !important;">
                                                    <div style="">
                                                    </div>
                                                </td>
                                                <td class="col " style="font-size: 11px; padding-right: 10px; color: #ffffff;"><a href="viewprofile.php?username=<?echo $crewboss;?>"><?echo $crewboss;?></a></td>
                                                <td class="col " style="font-size: 11px; padding-right: 10px; color: #ffffff;"><a href="viewcrew.php?crewid=<?echo $crewunderboss;?>"><?echo $crewunderboss;?></a></td>
                                                <td class="col " style="font-size: 11px; padding-right: 10px; color: #ffffff;"><?echo $crewmembers;?></td>
                                            </tr>
                                        <?}?>
                                        </tbody>
                                    </table>
                                    <div style="margin-bottom: 17px; color: #aaaaaa; font-size: 11px;">
                                        Total Crews: <b style="color: #ffffff;"><?echo $getcrewsamount;?></b> / <b style="color: #ffffff;">8</b>
                                    </div>
                                    <?if($getcrewid =='0'){?>
                                        <input value="Apply to Crew" class="textarea curve3px" style="font-size: 11.5px; padding: 8px 13px 7px 13px;" type="submit">
                                    <?}else{?>
                                        <input value="Leave Crew" name="leavecrew" class="textarea curve3px" style="font-size: 11.5px; padding: 8px 13px 7px 13px;" type="submit">
                                    <?}?>
                                </form>
                                <? if($getcrewsamount < 8){
                                    echo'<div class="break" style="padding-top: 25px;"></div>
                                <div class="spacer"></div>
                                <div class="break" style="padding-top: 23px;"></div><form action="" method="post" style="margin-top: 29px; font-size: 12px;">Create Crew (<b style="color:silver;">$35,000,000</b>): <input type ="text" name="createcrew" class="textarea" placeholder="Enter Crew Name..."><input type ="submit" name="docreate" class="textarea curve3px" value="Create crew!"></form>';
                                } ?>
                                <?if(($rankid >= 25)||($aahdoperson > '0')){echo"<br><form method=post><input type =text name=crewid class=textarea placeholder='Enter a Crew ID...'><input type=text name=newname class=textarea placeholder='Enter a new name...'><input type=submit class='textarea curve3px' value='Change crew name'></form>";}?>

                                <div class="break" style="padding-top: 25px;"></div>
                                <div class="spacer"></div>
                                <div class="break" style="padding-top: 23px;"></div>
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
            $timetwo = $time - 3000;

            $acount = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid='$getcrewid' and activity >= '$timetwo'"));

            if($getcrewid == 0){?>
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
                                            <input class="textarea" id="feed_msg"
                                                   style="box-sizing: border-box; -moz-box-sizing: border-box; width: 100%; position: absolute; bottom: 0; margin-bottom: -1px; border-top: 2px solid rgba(20, 20, 20, 0.8); border-bottom: 0; border-left: 0; border-right: 0;"
                                                   placeholder="Enter Message..." type="text">
                                        </form>
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
                <?}?>
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
                                            style="z-index: 0; margin-top: 1px; float: right; color: white; opacity: 0.88; font-size: 9px;"><? echo $acount;?> <span
                                                class="membersOnline twinkle"
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
                                        <input class="textarea" id="feed_msg"
                                               style="box-sizing: border-box; -moz-box-sizing: border-box; width: 100%; position: absolute; bottom: 0; margin-bottom: -1px; border-top: 2px solid rgba(20, 20, 20, 0.8); border-bottom: 0; border-left: 0; border-right: 0;"
                                               placeholder="Enter Message..." type="text">
                                    </form>
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
            <?}?>
        </td>
    </tr>
</table>
</body>
</html>