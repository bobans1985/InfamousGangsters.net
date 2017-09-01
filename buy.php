<? include 'included.php'; session_start(); ?>
<?
$fg = rand(0,5);

if($fg == 1){
    $deletetopicssql = mysql_query("SELECT * FROM forumposts WHERE type = 'buy' ORDER BY id DESC LIMIT 10,11");
    while($deletetopics = mysql_fetch_array($deletetopicssql))
    {$dtopicid = $deletetopics['id'];
        $deleted = mysql_query("DELETE FROM forumposts WHERE id = '$dtopicid'");}}

$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$gunnumberraw = $_GET['gun'];
$gunnumber = preg_replace($allowed,"",$gunnumberraw);
$pronumberraw = $_GET['pro'];
$pronumber = preg_replace($allowed,"",$pronumberraw);
$gangsterusername = $usernameone;

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'redirect.php'); }
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
        .col label {
            padding-top:0;
            padding-bottom:0;
        }
        .col-1 {
            display:inline-block;
            padding-left:10px;
            padding-right:10px;
            margin-bottom:20px;
            width:45%;
            vertical-align:top;
        }
        @media all and (max-width: 1200px) {
            .col-1 {
                display:block;
                width:85%;
                margin-left:auto;
                margin-right:auto;
                padding-left:auto;
                padding-right:auto;
            }
            .col-1 table {
                min-width:0;
            }
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

            $entertainer = $ent;
            if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

            $getuserinfoarray = $statustesttwo;
            $getpro = $getuserinfoarray['protection'];
            $getname = $getuserinfoarray['username'];
            $getgun = $getuserinfoarray['gun'];
            $getmoney = $getuserinfoarray['money'];
            $usermoney = $getuserinfoarray['money'];
            $rankid = $getuserinfoarray['rankid'];
            $userrankid = $getuserinfoarray['rankid'];
            $userlocation = $getuserinfoarray['location'];
            $newlocation = $_GET['location'];
            if($newlocation == 1){ $newlocation = "Las Vegas"; }
            elseif($newlocation == 2){ $newlocation = "Los Angeles"; }
            elseif($newlocation == 3){ $newlocation = "New York"; }
            $makenewmaybe = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$usernameone' AND casino = 'Armoury' AND location = '$newlocation'"));
            if($makenewmaybe > 0){ $userlocation = "$newlocation"; }

            $ownersql = mysql_query("SELECT * FROM casinos WHERE casino = 'Armoury' AND owner = '$usernameone' AND location = '$userlocation'");
            $owner = mysql_num_rows($ownersql);
            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Armoury' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $ownerprofit = $ownerinfoarray['profit'];
            $ownerprofittwo = number_format($ownerinfoarray['profit']);
            $ownerstatssql = mysql_query("SELECT * FROM users WHERE username = '$ownername'");
            $ownerstatsarray = mysql_fetch_array($ownerstatssql);
            $ownermoney = $ownerstatsarray['money'];

            $getgunplus = $getgun + 1;
            $getproplus = $getpro + 1;

            if($gunnumber == '1'){ $oopsgun = 'MG-42';}
            elseif($gunnumber == '2'){ $oopsgun = 'Glock Handgun';}
            elseif($gunnumber == '3'){ $oopsgun = 'Lee-Enfield';}
            elseif($gunnumber == '4'){ $oopsgun = '.50 BMG';}
            elseif($gunnumber == '5'){ $oopsgun = '.44 Magnum';}
            elseif($gunnumber == '6'){ $oopsgun = 'Bolt Action Rifle';}
            elseif($gunnumber == '7'){ $oopsgun = 'Colt Revolver';}
            elseif($gunnumber == '8'){ $oopsgun = 'Henry Rifle';}
            elseif($gunnumber == '9'){ $oopsgun = 'AK-47';}

            if($gunnumber == '1'){ $gunprice = '54000';}
            elseif($gunnumber == '2'){ $gunprice = '124000';}
            elseif($gunnumber == '3'){ $gunprice = '450000';}
            elseif($gunnumber == '4'){ $gunprice = '720500';}
            elseif($gunnumber == '5'){ $gunprice = '1200000';}
            elseif($gunnumber == '6'){ $gunprice = '2676000';}
            elseif($gunnumber == '7'){ $gunprice = '4750000';}
            elseif($gunnumber == '8'){ $gunprice = '7000000';}
            elseif($gunnumber == '9'){ $gunprice = '11575000';}
            else{$gunprice = 'error';}

            if($pronumber == '1'){ $oopspro = 'Hooded Hauberk';}
            elseif($pronumber == '2'){ $oopspro = 'Hooded Chainmail';}
            elseif($pronumber == '3'){ $oopspro = 'Lorica Segmenta';}
            elseif($pronumber == '4'){ $oopspro = 'Black Knight Armour Suit';}
            elseif($pronumber == '5'){ $oopspro = 'Triple Disc Cuirass';}
            elseif($pronumber == '6'){ $oopspro = 'British Armour Suit';}
            elseif($pronumber == '7'){ $oopspro = 'Scottish Armour Suit';}
            elseif($pronumber == '8'){ $oopspro = 'Metal Breastplate';}
            elseif($pronumber == '9'){ $oopspro = 'Light SWAT Vest';}

            if($pronumber == '1'){ $proprice = '23000';}
            elseif($pronumber == '2'){ $proprice = '88000';}
            elseif($pronumber == '3'){ $proprice = '250000';}
            elseif($pronumber == '4'){ $proprice = '780000';}
            elseif($pronumber == '5'){ $proprice = '900000';}
            elseif($pronumber == '6'){ $proprice = '1345000';}
            elseif($pronumber == '7'){ $proprice = '3853000';}
            elseif($pronumber == '8'){ $proprice = '8770000';}
            elseif($pronumber == '9'){ $proprice = '11523000';}
            else{$proprice = 'error';}

            if(isset($_GET['gun'])) {
                if($gunnumber > 9){ }
                elseif($gunprice == 'error'){$showoutcome++; $outcome = "Error</font>";}
                elseif($gunnumber == $getgun){$showoutcome++; $outcome = "You already have that gun!</font>";}
                elseif($gunnumber < $getgun){$showoutcome++; $outcome = "You already have a more advanced gun than that!</font>";}
                elseif($gunnumber > $getgunplus){$showoutcome++; $outcome = "You must buy the $oopsgun before you can buy that gun!</font>";}
                elseif($getmoney < $gunprice){$showoutcome++; $outcome = "You don't have enough money!</font>";}
                else{

                    mysql_query("UPDATE users SET gun = '$gunnumber' WHERE ID = '$ida' AND gun = '$getgun'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}


                    mysql_query("UPDATE users SET money = money - $gunprice WHERE ID = '$ida'  AND money >= '$gunprice'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

                    mysql_query("UPDATE casinos SET profit = (profit + $gunprice) WHERE casino = 'Armoury' AND location = '$userlocation'");
                    mysql_query("UPDATE users SET money = (money + $gunprice) WHERE username = '$ownername'");

                    $showoutcome++; $outcome = "You bought the <span style=\"color: #FFC753;\"><b>$oopsgun</b></span>!";}


                $usersql = mysql_query("SELECT * FROM users WHERE username = '$usernameone'");
                $statustesttwo = mysql_fetch_array($usersql);}

            if(isset($_GET['pro'])) {
                if(($pronumber > 9)||($pronumber < 1)){ }
                elseif($proprice == 'error'){$showoutcome++; $outcome = "Error</font>";}
                elseif($pronumber == $getpro){$showoutcome++; $outcome = "You already have that armour!</font>";}
                elseif($pronumber < $getpro){$showoutcome++; $outcome = "You already have a more advanced armour than that!</font>";}
                elseif($pronumber > $getproplus){$showoutcome++; $outcome = "You must buy the $oopspro before you can buy that armour!</font>";}
                elseif($getmoney < $proprice){$showoutcome++; $outcome = "You don't have enough money!</font>";}
                else{
                    mysql_query("UPDATE users SET protection = '$pronumber' WHERE ID = '$ida'  AND protection = '$getpro'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}
                    mysql_query("UPDATE users SET money = money - $proprice WHERE ID = '$ida'  AND money >= '$proprice'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}
                    mysql_query("UPDATE casinos SET profit = (profit + $proprice) WHERE casino = 'Armoury' AND location = '$userlocation'");
                    mysql_query("UPDATE users SET money = (money + $proprice) WHERE username = '$ownername'");
                    $showoutcome++; $outcome = "You bought the <span style=\"color: #FFC753;\"><b>$oopspro</b></span>!</font>";}


                $usersql = mysql_query("SELECT * FROM users WHERE username = '$usernameone'");
                $statustesttwo = mysql_fetch_array($usersql); }

            $saturated = "/[^0-9]/i";
            $setownerrawraw = mysql_real_escape_string($_POST['setownerbuy']);
            $priceraw = mysql_real_escape_string($_POST['setpricebuy']);
            $givea = mysql_real_escape_string($_POST['give']);
            $vera = mysql_real_escape_string($_POST['ver']);

            $ver = preg_replace($saturate,"",$vera);
            $amount = preg_replace($saturated,"",$amounta);
            $setownerraw = preg_replace($saturate,"",$setownerrawraw);
            $price = preg_replace($saturated,"",$priceraw);
            $give = preg_replace($saturated,"",$givea);
            $setmaxtwo = number_format($setmax);

            if(($ownername == 'None')){
                if(isset($_POST['takeoverbuy'])){
                    if($usermoney < '50000000'){$showoutcome++; $outcome = "You don't have enough money! Taking over an armoury costs $<b>50,000,000</b>!</font>";}
                    else{$showoutcome++; $outcome = "You now own the Armoury store!";
                        mysql_query("UPDATE users SET money = money - '50000000' WHERE username = '$usernameone'");
                        mysql_query("UPDATE casinos SET owner = '$usernameone' WHERE location = '$userlocation' AND casino = 'Armoury'");
                        mysql_query("UPDATE casinos SET nickname = '$usernameone' WHERE location = '$userlocation' AND casino = 'Armoury'");
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Armoury'");}}}


            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Armoury' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $ownerprofit = $ownerinfoarray['profit'];

            if(($owner != '0')||($userrankid == '100')){
                $setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
                $setownerinfoarray = mysql_fetch_array($setownerinfosql);
                $setownerinforows = mysql_num_rows($setownerinfosql);
                $setowner = $setownerinfoarray['username'];
                $setownerstatus = $setownerinfoarray['status'];
                $ssskkk = $setownerinfoarray['rankid'];
                $ssskkkid = $setownerinfoarray['ID'];

                if(isset($_POST['setownerbuy'])) {
                    if(!$setowner){die (' ');}

                    $anum_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$setownerraw' AND blockcasinos='1'"));
                    if ($anum_true == "1"){
                        die("<font size=2 face=verdana color=silver>$setownerraw doesnt allow Armourys to be sent to him/her.</font>");}

                    if($setowner == $ownername){$showoutcome++; $outcome = "You already own the store!</font>";}
                    elseif($setownerinforows == '0'){$showoutcome++; $outcome = "No such user!</font>";}
                    elseif(($ssskkk > '25')&&($userrankid != '100')){$showoutcome++; $outcome = "You cannot send this store to a staff member!</font>";}
                    elseif($setownerstatus == 'Dead'){$showoutcome++; $outcome = "You cannot send this store to dead player!</font>";}
                    else{

                        $cunt = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner'"));
                        $cunts = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner' AND casino = 'Armoury'"));
                        if($cunt > '3' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has 2 properties!</font>');}
                        if($cunts > '0' AND $setowner != 'None'){die('<font color=white face=verdana size=1>That user already has a Armoury!</font>');}

                        $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
                        if(($penpoint > '0')&&($setowner != $username)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
                            $reason = "$username sent $userlocation armoury store to $setowner";
                            mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

                        mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Armoury' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Armoury' AND location = '$userlocation'");
                        mysql_query("UPDATE casinos SET maxbet = '5000' WHERE casino= 'Armoury' AND location = '$userlocation'");
                        $showoutcome++; $outcome = "You gave the store to <a href=viewprofile.php?username=$setowner><b>$setownerraw</b>!</a>";
                        mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Armoury'");

                        mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Armoury store.' WHERE username = '$ssskkkid'");}}}

            $ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Armoury' AND location = '$userlocation'");
            $ownerinfoarray = mysql_fetch_array($ownerinfosql);
            $ownername = $ownerinfoarray['owner'];
            $ownerprofit = $ownerinfoarray['profit'];

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['resetbuyprofit'])) {
                    $showoutcome++; $outcome = "Profit reset!</font>";
                    mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Armoury' AND location = '$userlocation'");}}

            if(($owner != '0')||($userrankid == '100')){
                if(isset($_POST['setpricebuy'])) {
                    mysql_query("DELETE FROM buycasinos WHERE type = 'Armoury' AND city = '$userlocation'");
                    $buytime = time()+86400;
                    mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Armoury')");
                    $showoutcome++; $outcome = "The casino has been added to quicktrade!</font>";
                }}
            $getuserinfoarray = $statustesttwo;
            $getpro = $getuserinfoarray['protection'];
            $getname = $getuserinfoarray['username'];
            $getgun = $getuserinfoarray['gun'];
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
                                Weapon & Armoury Store
                            </div>
                            <div style="min-width: 400px; padding: 5px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;">
                                <div class="break" style="padding-top: 32px;"></div>
                                <form method="get" class="col-1" action="">
                                    <table class="regTable" style="width: 98%; max-width: 600px;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody><tr>
                                            <td class="header" colspan="45" style="padding: 11px;">
                                                Buy Weapon:
                                            </td>
                                        </tr>
                                        <tr style="text-align:center;">
                                            <td class="subHeader" colspan="2" style="border-left: 0; width: 57%;">Weapon</td>
                                            <td class="subHeader" style="width: 40%;">Price</td>
                                        </tr>
                                        <?if($getgun==0){?>
                                        <tr>
                                            <td class="col noTop" style="width: 1%;"><input  name="gun" id="gun1" value="1" type="radio"></td>
                                            <td class="col noTop" style="padding-right: 10px; font-weight: bold;"><label for="gun1" style="display: block; ">MG-42</label></td>
                                            <td class="col noTop" style="padding-right: 10px; font-weight: bold;">$<b>54,000</b></td>

                                        </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col noTop" style="width: 1%;"><input disabled="" name="gun" id="gun1" value="1" type="radio"></td>
                                                <td class="col noTop" style="padding-right: 10px; color:#888888;"><label for="gun1" style="display: block; ">MG-42</label></td>
                                                <td class="col noTop" style="padding-right: 10px; color:#888888;">$<b>54,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getgun==1){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="gun" id="gun2" value="2" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="gun2" style="display: block; ">Glock Handgun</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>124,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="gun" id="gun1" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;"><label for="gun1" style="display: block; ">Glock Handgun</label></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;">$<b>124,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getgun==2){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="gun" id="gun3" value="3" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="gun3" style="display: block; ">Lee-Enfield</label></td>
                                                <td class="col " style="padding-right: 10px;font-weight: bold;">$<b>450,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="gun" id="gun1" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;"><label for="gun1" style="display: block; ">Lee-Enfield</label></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;">$<b>450,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getgun==3){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="gun" id="gun4" value="4" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="gun4" style="display: block; ">.50 BMG</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>720,500</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="gun" id="gun1" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;"><label for="gun1" style="display: block; ">.50 BMG</label></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;">$<b>720,500</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getgun==4){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="gun" id="gun5" value="5" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="gun5" style="display: block; ">.44 Magnum</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>1,200,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="gun" id="gun1" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;"><label for="gun1" style="display: block; ">.44 Magnum</label></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;">$<b>1,200,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getgun==5){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="gun" id="gun6" value="6" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="gun6" style="display: block; ">Bolt Action Rifle</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>2,676,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="gun" id="gun1" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;"><label for="gun1" style="display: block; ">Bolt Action Rifle</label></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;">$<b>2,676,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getgun==6){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="gun" id="gun7" value="7" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="gun7" style="display: block; ">Colt Revolver</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>4,750,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="gun" id="gun1" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;"><label for="gun1" style="display: block; ">Colt Revolver</label></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;">$<b>4,750,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getgun==7){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="gun" id="gun8" value="8" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="gun8" style="display: block; ">Henry Rifle</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>7,000,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="gun" id="gun1" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;"><label for="gun1" style="display: block; ">Henry Rifle</label></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;">$<b>7,000,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getgun==8){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="gun" id="gun9" value="9" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="gun9" style="display: block; ">AK-47</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>11,575,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="gun" id="gun1" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;"><label for="gun1" style="display: block; ">AK-47</label></td>
                                                <td class="col" style="padding-right: 10px; color:#888888;">$<b>11,575,000</b></td>

                                            </tr>
                                        <?}?>
                                         <tr>
                                            <td colspan="45"><input class="textarea" style="border-left: 0; width: 100%;" value="Buy" type="submit"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <form method="get" class="col-1" action="">
                                    <table class="regTable" style="width: 98%; max-width: 600px;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody><tr>
                                            <td class="header" colspan="45" style="padding: 11px;">
                                                Buy Armour:
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td class="subHeader" colspan="2" style="border-left: 0; width: 57%;">Weapon</td>
                                            <td class="subHeader" style="width: 40%;">Price</td>
                                        </tr>
                                        <?if($getpro==0){?>
                                            <tr>
                                                <td class="col noTop" style="width: 1%;"><input name="pro" id="armour2" value="1" type="radio"></td>
                                                <td class="col noTop" style="padding-right: 10px; font-weight: bold;"><label for="armour2" style="display: block; ">Hooded Hauberk</label></td>
                                                <td class="col noTop" style="padding-right: 10px; font-weight: bold;">$<b>23,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col noTop" style="width: 1%;"><input disabled="" name="pro" id="armour2" value="1" type="radio"></td>
                                                <td class="col noTop" style="padding-right: 10px; color: #888888;"><label for="armour2" style="display: block; ">Hooded Hauberk</label></td>
                                                <td class="col noTop" style="padding-right: 10px;color: #888888; ">$<b>23,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getpro==1){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input name="pro" id="armour3" value="2" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="armour3" style="display: block; ">Hooded Chainmail</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>88,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="pro" id="armour2" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color: #888888;"><label for="armour2" style="display: block; ">Hooded Chainmail</label></td>
                                                <td class="col" style="padding-right: 10px;color: #888888; ">$<b>88,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getpro==2){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input name="pro" id="armour4" value="3" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="armour4" style="display: block; ">Lorica Segmenta</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>250,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="pro" id="armour2" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color: #888888;"><label for="armour2" style="display: block; ">Lorica Segmenta</label></td>
                                                <td class="col" style="padding-right: 10px;color: #888888; ">$<b>250,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getpro==3){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="pro" id="armour5" value="4" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="armour5" style="display: block; ">Black Knight Armour Suit</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>780,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="pro" id="armour2" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color: #888888;"><label for="armour2" style="display: block; ">Black Knight Armour Suit</label></td>
                                                <td class="col" style="padding-right: 10px;color: #888888; ">$<b>780,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getpro==4){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="pro" id="armour6" value="5" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="armour6" style="display: block; ">Triple Disc Cuirass</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>900,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="pro" id="armour2" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color: #888888;"><label for="armour2" style="display: block; ">Triple Disc Cuirass</label></td>
                                                <td class="col" style="padding-right: 10px;color: #888888; ">$<b>900,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getpro==5){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="pro" id="armour7" value="6" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="armour7" style="display: block; ">British Armour Suit</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>1,345,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="pro" id="armour2" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color: #888888;"><label for="armour2" style="display: block; ">British Armour Suit</label></td>
                                                <td class="col" style="padding-right: 10px;color: #888888; ">$<b>1,345,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getpro==6){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="pro" id="armour8" value="7" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="armour8" style="display: block; ">Scottish Armour Suit</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>3,853,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="pro" id="armour2" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color: #888888;"><label for="armour2" style="display: block; ">Scottish Armour Suit</label></td>
                                                <td class="col" style="padding-right: 10px;color: #888888; ">$<b>3,853,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getpro==7){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="pro" id="armour9" value="8" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="armour9" style="display: block; ">Metal Breastplate</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>8,770,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="pro" id="armour2" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color: #888888;"><label for="armour2" style="display: block; ">Metal Breastplate</label></td>
                                                <td class="col" style="padding-right: 10px;color: #888888; ">$<b>8,770,000</b></td>

                                            </tr>
                                        <?}?>
                                        <?if($getpro==8){?>
                                            <tr>
                                                <td class="col " style="width: 1%;"><input  name="pro" id="armour10" value="9" type="radio"></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;"><label for="armour10" style="display: block; ">Light SWAT Vest</label></td>
                                                <td class="col " style="padding-right: 10px; font-weight: bold;">$<b>11,523,000</b></td>

                                            </tr>
                                        <?}else{?>
                                            <tr>
                                                <td class="col" style="width: 1%;"><input disabled="" name="pro" id="armour2" value="1" type="radio"></td>
                                                <td class="col" style="padding-right: 10px; color: #888888;"><label for="armour2" style="display: block; ">Light SWAT Vest</label></td>
                                                <td class="col" style="padding-right: 10px;color: #888888; ">$<b>11,523,000</b></td>

                                            </tr>
                                        <?}?>
                                         <tr>
                                            <td colspan="45"><input class="textarea" style="border-left: 0; width: 100%;" value="Buy" type="submit"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <? if(($ownername == 'None')){
                                    echo'<form method=post><input type=submit value="Take Over Store" class="textarea curve3px" name=takeoverbuy></form>';
                                } ?>

                                <div class="break" style="padding-top: 32px;"></div>
                                <div class="spacer"></div>
                                <div style="padding-top: 21px; padding-bottom: 7px; color: #aaaaaa; font-size: 115%;">
                                    Owner: <a href="viewprofile.php?username=<?echo$ownername;?>" style="color: #ffffff;"><?echo$ownername;?></a><span style="color: #555555; padding-left: 7px; padding-right: 7px;"> - </span>
                                    Price: <span>100%</span>
                                </div>
                                <div class="break" style="padding-top: 15px;">
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 4px;"></div>
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