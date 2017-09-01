<? include 'included.php'; session_start(); ?>
<?php
$time = time();
$times = $time + 300;
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$casinoidraw = mysql_real_escape_string($_POST['casino']);
$buyidraw = mysql_real_escape_string($_POST['points']);
$moneyidraw = mysql_real_escape_string($_POST['money']);
$sellamountraw = mysql_real_escape_string($_POST['sellamount']);
$sellraw = mysql_real_escape_string($_POST['sell']);
$buyamountraw = mysql_real_escape_string($_POST['buyamount']);
$buyraw = mysql_real_escape_string($_POST['buyprice']);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$casinoid = preg_replace($saturated,"",$casinoidraw);
$buyid = preg_replace($saturated,"",$buyidraw);
$moneyid = preg_replace($saturated,"",$moneyidraw);
$sellamount = preg_replace($saturated,"",$sellamountraw);
$buyamount = preg_replace($saturated,"",$buyamountraw);
$sell = preg_replace($saturated,"",$sellraw);
$buy = preg_replace($saturated,"",$buyraw);
$userip = $_SERVER[REMOTE_ADDR];
$gangsterusername = $usernameone;

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jaill.php'); }
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
            $getuserinfoarray = $statustesttwo;
            $username = $getuserinfoarray['username'];
            $points = $getuserinfoarray['points'];
            $money = $getuserinfoarray['money'];
            $rank = $getuserinfoarray['rankid'];
            $rankup = $getuserinfoarray['rankup'];

            $entertainer = $ent;
            if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

            if(isset($_POST['casino'])){
                $casinopost = mysql_query("SELECT * FROM buycasinos WHERE id = '$casinoid'");
                $two = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$gangsterusername'"));
                $casinoposts = mysql_fetch_array($casinopost);
                $casinorows = mysql_num_rows($casinopost);
                $casinopricetag = $casinoposts['price'];
                $casinoowner = $casinoposts['username'];
                $casino = $casinoposts['type'];
                $casinocity = $casinoposts['city'];
                if($casinoowner == $username){$showoutcome++; $outcome = "You cancelled your offer!"; mysql_query("DELETE FROM buycasinos WHERE id = '$casinoid'");}
                elseif(!$casinoid){}
                elseif($casinorows == '0'){die('<font color=white face=verdana size=1>Offer does not exist</font>');}
                elseif($casinopricetag > $money){$showoutcome++; $outcome = "You dont have enough money!";}
                else{$showoutcome++; $outcome = "You bought the casino!";
                    mysql_query("DELETE FROM buycasinos WHERE id = '$casinoid'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

                    mysql_query("UPDATE users SET money = (money - $casinopricetag) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET money = (money + $casinopricetag) WHERE username = '$casinoowner'");
                    mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = '$casino' AND location = '$casinocity'");
                    mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = '$casino' AND location = '$casinocity'");
                    $sendinfo = "\[b\]$username\[\/b\] bought your casino for \[b\]$$casinopricetag\[\/b\]!";
                    mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$casinoowner','$casinoowner','no','$userip','$sendinfo')");
                    mysql_query("INSERT INTO pointssent(username,amount,sent,ip,quicktrade)
VALUES ('$username','$casinopricetag','$casinoowner','$userip','no')");
                    mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashbought your $casinocity $casino for $$casinopricetag.' WHERE username = '$casinoowner'");
                }}

            elseif(isset($_POST['points'])){
                $buypost = mysql_query("SELECT * FROM buypoints WHERE id = '$buyid'");
                $buyposts = mysql_fetch_array($buypost);
                $buyrows = mysql_num_rows($buypost);
                $pricetag = $buyposts['price'];
                $pricetags = number_format($pricetag);
                $buyname = $buyposts['username'];
                $buyamount = $buyposts['points'];
                $hidden = $buyposts['hidden'];
                $buyamounts = number_format($buyamount);

                if($hidden == 'yes'){$type = 'yes';}else{$type = 'no';}
                if($buyname == $username){
                    mysql_query("DELETE FROM buypoints WHERE id = '$buyid'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

                    $showoutcome++; $outcome = "You cancelled your offer!";mysql_query("UPDATE users SET points = (points + $buyamount) WHERE ID = '$ida'");}
                elseif(!$buyid){}
                elseif($buyrows == '0'){die('<font color=white face=verdana size=1>Offer does not exist</font>');}
                elseif($pricetag > $money){$showoutcome++; $outcome = "You dont have enough money!";}
                else{$showoutcome++; $outcome = "You accepted the offer!";
                    mysql_query("DELETE FROM buypoints WHERE id = '$buyid'");

                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

                    mysql_query("UPDATE users SET money = (money - $pricetag) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET points = (points + $buyamount) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET money = (money + $pricetag) WHERE username = '$buyname'");
                    $sendinfo = "\[b\]$username\[\/b\] bought your \[b\]$buyamounts\[\/b\] points for $\[b\]$pricetags\[\/b\]!";
                    mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$buyname','$buyname','no','$userip','$sendinfo')");
                    mysql_query("INSERT INTO moneysent(username,amount,sent,ip,quicktrade)
VALUES ('$username','$pricetag','$buyname','$userip','$type')");
                    mysql_query("INSERT INTO pointssent(username,amount,sent,ip,quicktrade)
VALUES ('$buyname','$buyamount','$username','$userip','$type')");

                    mysql_query("UPDATE users SET notify = '1',notification = 'a_open$usernameone a_closed$usernameone a_slashbought your $buyamounts points for $$pricetags.' WHERE username = '$buyname'");
                }}

            elseif(isset($_POST['money'])){
                $buypost = mysql_query("SELECT * FROM buymoney WHERE id = '$moneyid'");
                $buyposts = mysql_fetch_array($buypost);
                $buyrows = mysql_num_rows($buypost);
                $pricetag = $buyposts['price'];
                $pricetags = number_format($pricetag);
                $buyname = $buyposts['username'];
                $buyamount = $buyposts['points'];
                $hidden = $buyposts['hidden'];
                $buyamounts = number_format($buyamount);

                if($hidden == 'yes'){$type = 'yes';}else{$type = 'no';}

                if($buyname == $username){
                    mysql_query("DELETE FROM buymoney WHERE id = '$moneyid'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}

                    $showoutcome++; $outcome = "You cancelled your offer!"; mysql_query("UPDATE users SET money = (money + $pricetag) WHERE username = '$username'");}
                elseif(!$moneyid){}
                elseif($buyrows == '0'){die('<font color=white face=verdana size=1>Offer does not exist</font>');}
                elseif($buyamount  > $points){$showoutcome++; $outcome = "You dont have enough points!";}
                else{$showoutcome++; $outcome = "You accepted the offer!";
                    mysql_query("DELETE FROM buymoney WHERE id = '$moneyid'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}

                    mysql_query("UPDATE users SET points = points - $buyamount WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET money = money + $pricetag WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET points = points + $buyamount WHERE username = '$buyname'");
                    $sendinfo = "\[b\]$username\[\/b\] bought your $\[b\]$pricetags\[\/b\] for \[b\]$buyamounts\[\/b\] points!";
                    mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$buyname','$buyname','no','$userip','$sendinfo')");
                    mysql_query("INSERT INTO moneysent(username,amount,sent,ip,quicktrade)
VALUES ('$buyname','$pricetag','$username','$userip','$type')");
                    mysql_query("INSERT INTO pointssent(username,amount,sent,ip,quicktrade)
VALUES ('$username','$buyamount','$buyname','$userip','$type')");

                    mysql_query("UPDATE users SET notify = '1',notification = 'a_open$username a_closed$username a_slashbought your $$pricetags for $buyamounts points.' WHERE username = '$buyname'");
                }}

            elseif(isset($_POST['sellamount'])){
                $tomeni = mysql_num_rows(mysql_query("SELECT * FROM buypoints WHERE username = '$usernameone'"));
                if($sellamount == 0){}
                elseif($tomeni >= '30'){$showoutcome++; $outcome = "You can only put 30 offers up at one time!";}
                elseif($sell == 0){}
                elseif($sell > 750000){$showoutcome++; $outcome = "You can\'t sell above $750,000!";}
                elseif($sell < 500000){$showoutcome++; $outcome = "You can\'t sell below $500,000!";}
                elseif($sellamount > $points){$showoutcome++; $outcome = "You dont have enough points!";}
                else{$newtime = time()+86400;
                    if(mysql_real_escape_string($_POST['hidesell']) == '1'){$hidden = 'yes';}else{$hidden = 'no';}
                    if($sell > 99999999999){$sell = 99999999999;}
                    $selltotal = ceil($sell * $sellamount);
                    mysql_query("UPDATE users SET points = points - $sellamount WHERE ID = '$ida' AND points >= '$sellamount'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}

                    mysql_query("INSERT INTO buypoints(username,price,points,time,hidden,per)
VALUES ('$username','$selltotal','$sellamount','$newtime','$hidden','$sell')");}}

            elseif(isset($_POST['buyamount'])){
                $tomenia =mysql_num_rows(mysql_query("SELECT * FROM buymoney WHERE username = '$usernameone'"));
                $buytotal = ceil($buy * $buyamount);
                if($buyamount == 0){}
                elseif($tomenia >= '30'){$showoutcome++; $outcome = "You can only put 30 offers up at one time!";}
                elseif($buy == 0){}
                elseif($buy > 750000){$showoutcome++; $outcome = "You can\'t buy above $750,000!";}
                elseif($buy < 500000){$showoutcome++; $outcome = "You can\'t buy below $500,000!";}
                elseif($buytotal > $money){$showoutcome++; $outcome = "You dont have enough money!";}
                else{$newtime = time()+86400;
                    if(mysql_real_escape_string($_POST['hidebuy']) == '1'){$hidden = 'yes';}else{$hidden = 'no';}
                    if($buy > 99999999999){$buy = 99999999999;}
// echo $hidden;
                    mysql_query("UPDATE users SET money = (money - $buytotal) WHERE ID = '$ida' AND money >= '$buy'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 5.</font>');}

                    mysql_query("INSERT INTO buymoney(username,price,points,time,hidden,per)
VALUES ('$username','$buytotal','$buyamount','$newtime','$hidden','$buy')");}}

            $casinoslist = mysql_query("SELECT * FROM buycasinos ORDER BY price ASC");
            $pointslist = mysql_query("SELECT * FROM buypoints ORDER BY per ASC");
            $moneylist = mysql_query("SELECT * FROM buymoney ORDER BY per DESC");

            // print_r($_POST);

            $money = $statustesttwo['money'];
            $buycarraw = $_POST['buy'];
            if(isset($_POST['buy']))
            {
                $alltotal = 0;

                $buycar = preg_replace($saturated,"",$buycarraw);
                $n = count($buycar);
                $i = 0;
//                echo "<h1>".$_POST['buy']."</h1>";
                $amount = 0;
                $saturated = "/[^0-9]/i";
                $getida = $_GET['id'];
                $getid = preg_replace($saturated,"",$getida);

                if($n >= 1){
                    $countcars = 0;
                    while ($i < $n){
                        $doit = $buycar[$i];
                        // echo $doit;
                        if($getid >= 11){ $ifnota = mysql_query("SELECT * FROM cars WHERE id = '$doit' AND carid >= '$getid'"); }
                        else{ $ifnota = mysql_query("SELECT * FROM cars WHERE id = '$doit' AND carid = '$getid'"); }
                        $ifnot = mysql_fetch_array($ifnota);
                        // print_r($ifnot);
                        $ifnotname = $ifnot['owner'];
                        $carprice = $ifnot['price'];
                        $carname = $ifnot['carname'];
                        if($ifnotname == $gangsterusername){
                            mysql_query("UPDATE cars SET price = '0' WHERE id = '$doit'");
                            $showoutcome++; $outcome = "<font size=1 face=verdana color=white>You cancelled your offer!</font>";
                        }
                        elseif($carprice < 1){}
                        elseif($carprice > $money){$showoutcome++; $outcome = "<font size=1 face=verdana color=white>You don't have enough money!</font>";}
                        else{

                            $roflcheckplzok = mysql_fetch_array(mysql_query("SELECT id FROM suggestions WHERE username = '$ifnotname'"));
                            $roflcheckplzodok = $roflcheckplzok['id'];




                            mysql_query("UPDATE users SET money = (money - $carprice) WHERE ID = '$ida' AND money >= '$carprice'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
                            $countcars++;
                            $alltotal = $alltotal + $carprice;
                            if($getid == 1){$carinfom = 'Volvo';}
                            elseif($getid == 2){$carinfom = 'Renault Clio';}
                            elseif($getid == 3){$carinfom = 'Porsche 911';}
                            elseif($getid == 4){$carinfom = 'BMW';}
                            elseif($getid == 5){$carinfom = 'Aston Martin';}
                            elseif($getid == 6){$carinfom = 'Alfa Romeo';}
                            elseif($getid == 7){$carinfom = 'Continental GT';}
                            elseif($getid == 8){$carinfom = 'Maybach 62';}
                            elseif($getid == 9){$carinfom = 'Maserati';}
                            elseif($getid == 10){$carinfom = 'Audi TT';}
                            elseif($getid == 11){$carinfom = 'Porsche Carrera GT';}
                            elseif($getid == 12){$carinfom = 'Pagani Zonda';}
                            elseif($getid == 13){$carinfom = $carnamea;}
                            elseif($getid == 14){$carinfom = 'Bugatti Veyron';}
                            elseif($getid == 15){$carinfom = 'Ferrari 458 Italia';}
                            elseif($getid == 16){$carinfom = 'Lamborghini Murcielago';}
                            elseif($getid == 17){$carinfom = 'Koenigsegg Agera R';}
                            elseif($getid == 18){$carinfom = 'Lamborghini Aventador';}
                            elseif($getid == 19){$carinfom = 'Audi Prologue';}
                            if($getid == 12){$before = '[color=red][b]Very Rare:[/color][/b]';}
                            elseif($getid == 9){$before = '[color=red][b]Rare:[/color][/b]';}
                            elseif($getid == 10){$before = '[color=red][b]Rare:[/color][/b]';}
                            elseif($getid == 11){$before = '[color=red][b]Rare:[/color][/b]';}
                            elseif($getid == 13){$before = '[color=red][b]Custom:[/color][/b]';}
                            elseif($getid >= 14){$before = '[color=#0066FF][b]Super Rare:[/color][/b]';}
                            else{$before = '';}

                            $cprice = number_format($carprice);
                            $totl = $totl + $carprice;
                            $tottee = number_format($totl);
                            $sendinfo = "\[b\]$gangsterusername\[\/b\] bought your $before $carinfom for $\[b\]$cprice\[\/b\]!";
                            mysql_query("INSERT INTO moneysent(username,amount,sent,ip)
	VALUES ('$gangsterusername','$carprice','$ifnotname','$userip')");

                            mysql_query("INSERT INTO messages(sentto,sentfrom,new,info)
	VALUES ('$ifnotname','$usernameone','1','$sendinfo')");

                            mysql_query("UPDATE cars SET owner = '$gangsterusername' WHERE id = $doit");
                            mysql_query("UPDATE cars SET price = '0' WHERE id = '$doit'");
                            mysql_query("UPDATE cars SET garage = '0' WHERE id = '$doit'");
                            mysql_query("UPDATE users SET money = (money + $carprice) WHERE ID = '$roflcheckplzodok'");
                            $carpricef = number_format($carprice);

                            $nottime = time();

                            $insertnot = "<a href=viewprofile.php?username=$gangsterusername style=color:white;><b>$gangsterusername</b> bought your $before $carinfom for $<b>$carpricef</b>!</a>";
                            $rawinsertlog = "INSERT INTO notifications(youid,info,time)
	VALUES ('$roflcheckplzodok','$insertnot','$nottime')";
                            $insertlog = mysql_query($rawinsertlog);



                            mysql_query("DELETE FROM travel WHERE carid = '$doit'");
                            $amount = $amount + 1;}
                        $getinfo = mysql_fetch_array(mysql_query("SELECT username,money FROM users WHERE ID = '$ida'"));
                        $money = $getinfo['money'];
                        $i = $i + 1;
                    }
                }}

            if(($amount == 0)||(!$amount)){}elseif($amount == 1){$showoutcome++; $outcome = "<font size=1 face=verdana color=white>You bought the car!</font>";

                $usersql = mysql_query("SELECT * FROM users WHERE username = '$usernameone'");
                $statustesttwo = mysql_fetch_array($usersql);


            }elseif($amount > 1){$showoutcome++; $outcome = "<font size=1 face=verdana color=white>You bought the cars!</font>";}

            ?>
            <? if ($showoutcome >= 1) { ?>
                <span><? echo $outcome; ?></span>
            <? } ?>
            <? if(isset($_GET['id'])){

                $carid=$_GET['id'];

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
                elseif($carid == 13){$carname = 'Custom Cars';}
                elseif($carid == 14){$carname = 'Bugatti Veyron';}
                elseif($carid == 15){$carname = 'Ferrari 458 Italia';}
                elseif($carid == 16){$carname = 'Lamborghini Murcielago';}
                elseif($carid == 17){$carname = 'Koenigsegg Agera R';}
                elseif($carid == 18){$carname = 'Lamborghini Aventador';}
                elseif($carid == 19){$carname = 'Audi Prologue';}

                if($carid == 10){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
                elseif($carid == 11){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
                elseif($carid == 12){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
                elseif($carid == 13){$before = '<b><font color=red face=verdana size=1>Custom:</b></font>';}
                elseif($carid == 16){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
                elseif($carid == 17){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
                elseif($carid >= 14 && $carid != 16 && $carid != 17){$before = '<b><font color=#0066FF face=verdana size=1>Super Rare:</b></font>';}
                else{$before = '';}

                ?>

                <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="topleft"></td>
                        <td class="top"></td>
                        <td class="topright"></td>
                    </tr>
                    <tr>
                        <td class="left"></td>
                        <td>
                            <div class="main">
                                <div class="menuHeader noTop">
                                    <? echo $before." ".$carname; ?>
                                </div>
                                <div style="padding: 8px; padding-top: 34px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;">
                                    <form action="" method="post">
                                        <table class="regTable" style="min-width: 550px !important; width: auto !important; max-width: 650px !important;" cellspacing="0" cellpadding="0" align="center">
                                            <tbody><tr>
                                                <td class="subHeader" colspan="2" style="border-left: 0; width: 56%;">Model</td>
                                                <td class="subHeader" style="width: 18%;">Damage</td>
                                                <td class="subHeader" style="width: 26%;">Price</td>
                                            </tr>
                                            <?php
                                            $getid=$_GET['id'];
                                            $selecterraw = $_POST['select'];
                                            $selecter = preg_replace($saturated,"",$selecterraw);
                                            if(isset($_POST['next'])){$one = $selecter + 1;}
                                            elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

                                            $selectfroma = $one * 16;
                                            $selecttoa = $selectfrom + 16;
                                            $selectfrom = preg_replace($saturated,"",$selectfroma);
                                            $selectto = preg_replace($saturated,"",$selecttoa);
                                            if($getid >= 14){ $list = mysql_query("SELECT * FROM cars WHERE carid >= '$getid' AND price != '0' ORDER BY price ASC, damage LIMIT $selectfrom,$selectto"); }
                                            else{ $list = mysql_query("SELECT * FROM cars WHERE carid = '$getid' AND price != '0' ORDER BY price ASC, damage LIMIT $selectfrom,$selectto"); }
                                            $carlistamount = mysql_query("SELECT * FROM cars WHERE carid = '$getid' AND price != '0'");
                                            $carlistamount = mysql_num_rows($carlistamount);
                                            // print_r("SELECT * FROM cars WHERE carid = '$getid' AND price != '0' ORDER BY price ASC, damage LIMIT $selectfrom,$selectto");

                                            while($carlists = mysql_fetch_array($list)){
                                                $carid = $carlists['carid'];
                                                $carida = $carlists['id'];
                                                $card = $carlists['damage'];

                                                if($card==0){$card="<span style=\"color: green;\">$card%</span>";}
                                                elseif($card<=35){$card="<span style=\"color: #cccccc;\">$card%</span>";}
                                                elseif($card<=50){$card="<span style='color: #FFC2B2;'>$card%</span>";}
                                                elseif($card<=75){$card="<span style='color: #FF8566;'>$card%</span>";}
                                                elseif($card<=100){$card="<span style='color: red;'>$card%</span>";}

                                                $price = $carlists['price'];
                                                $pricea = number_format($price);
                                                $carnamea = $carlists['carname'];
                                                $garage = $carlists['garage'];
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

                                                if($garage == '1'){ $beforee = '<font size=1 color=grey face=verdana><b>Hidden Car:</b></font>'; }else{ $beforee = ''; }
                                                if($carid == 10){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
                                                elseif($carid == 11){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
                                                elseif($carid == 12){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
                                                elseif($carid == 13){$before = '<b><font color=red face=verdana size=1>Custom:</b></font>';}
												elseif($carid == 16){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
												elseif($carid == 17){$before = '<b><font color=red face=verdana size=1>Rare:</b></font>';}
												elseif($carid >= 14 && $carid != 16 && $carid != 17){$before = '<b><font color=#0066FF face=verdana size=1>Super Rare:</b></font>';}
                                                else{$before = '';}?>
                                                <tr>
                                                    <td class="col " style="width: 1%;"><input name="buy[]" value="<? echo$carida;?>" type="checkbox"></td>
                                                    <td class="col " style="padding-right: 10px;"><a href="viewcar.php?id=<? echo$carida;?>" style="display: block;"><? echo $before." ".$carname; ?></a></td>
                                                    <td class="col " style="padding-right: 10px;"><? echo$card;?></td>
                                                    <td class="col " style="color: silver; padding-right: 10px; ">$<?echo $pricea;?></td>
                                                </tr>
                                            <?}

                                            if($carlistamount==0){?>
                                                <tr>
                                                    <td class="col noTop" colspan="45">None for sale</td>
                                                </tr>
                                            <?} ?>
                                            </tbody>
                                        </table>
                                        <br>
                                        <input name="buycar" class="textarea curve3px" style="margin-top: 18px; padding-left: 9px; padding-right: 9px;" value="Buy Selected!" type="submit">
                                    </form>
                                </div>
                                <div class="break" style="padding-top: 30px;"></div>
                                <div class="spacer"></div>
                                <div class="break" style="padding-top: 23px;"></div>
                            </div>
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
                                Buy Cars
                            </div>
                            <div style="padding: 8px; padding-top: 39px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;">
                                <?php
                                $saturated = "/[^0-9]/i";
                                $getida = $_GET['id'];
                                $getid = preg_replace($saturated,"",$getida);

                                $car14 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid >= '14'"));
                                $car13 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '13'"));
                                $car12 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '12'"));
                                $car11 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '11'"));
                                $car10 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '10'"));
                                $car9 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '9'"));
                                $car8 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '8'"));
                                $car7 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '7'"));
                                $car6 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '6'"));
                                $car5 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '5'"));
                                $car4 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '4'"));
                                $car3 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '3'"));
                                $car2 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '2'"));
                                $car1 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE price > '0' AND carid = '1'"));

                                $countcar14 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid >= '14'"));
                                $countcar13 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '13'"));
                                $countcar12 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '12'"));
                                $countcar11 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '11'"));
                                $countcar10 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '10'"));
                                $countcar9 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '9'"));
                                $countcar8 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '8'"));
                                $countcar7 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '7'"));
                                $countcar6 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '6'"));
                                $countcar5 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '5'"));
                                $countcar4 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '4'"));
                                $countcar3 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '3'"));
                                $countcar2 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '2'"));
                                $countcar1 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE carid = '1'"));
                                ?>
                                <form method="get">
                                    <table class="regTable" style="min-width: 450px; width: 96%; max-width: 650px;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody><tr>
                                            <td class="header" colspan="45" style="padding: 11px;">
                                                Market:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="subHeader" colspan="2" style="border-left: 0; width: 56%;">Car</td>
                                            <td class="subHeader" style="width: 22%;">Total for Sale</td>
                                            <td class="subHeader" style="width: 22%;">Total in Game</td>
                                        </tr>
                                        <tr>
                                            <td class="col noTop" style="width: 1%;"><input name="id" id="car14" value="14" type="radio"></td>
                                            <td class="col noTop" style="padding-right: 10px;"><label for="car14" style="display: block;"><b style="color: red;">Super Rare</b></label></td>
                                            <td class="col noTop" style="padding-right: 10px;"><?if($car14>0){echo$car14;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col noTop" style="padding-right: 10px; "><?echo $countcar14;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car13" value="13" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car13" style="display: block;"><b style="color: khaki;">Custom Cars</b></label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car13>0){echo$car13;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar13;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car1" value="12" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car1" style="display: block;"><span style="color: red;"><b>Rare:</b></span> Pagani Zonda</b></label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car12>0){echo$car12;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar12;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car2" value="11" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car2" style="display: block;"><span style="color: red;"><b>Rare:</b></span> Porsche Carrera GT</label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car11>0){echo$car11;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar11;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car3" value="10" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car3" style="display: block;"><span style="color: red;"><b>Rare:</b></span> Audi TT</label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car10>0){echo$car10;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar10;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car4" value="9" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car4" style="display: block;"><span style="color: red;"><b>Rare:</b></span> Maserati</label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car9>0){echo$car9;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar9;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car5" value="8" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car5" style="display: block;">Maybach 62</label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car8>0){echo$car8;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar8;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car6" value="7" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car6" style="display: block;">Continental GT</label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car7>0){echo$car7;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar7;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car7" value="6" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car7" style="display: block;">Alfa Romeo</label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car6>0){echo$car6;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar6;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car8" value="5" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car8" style="display: block;">Aston Martin</label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car5>0){echo$car5;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar5;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car9" value="4" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car9" style="display: block;">BMW</label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car4>0){echo$car4;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar4;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car10" value="3" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car10" style="display: block;">Porsche 911</label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car3>0){echo$car3;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar3;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car11" value="2" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car11" style="display: block;">Renault Clio</label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car2>0){echo$car2;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar2;?></td>

                                        </tr><tr>
                                            <td class="col " style="width: 1%;"><input name="id" id="car12" value="1" type="radio"></td>
                                            <td class="col " style="padding-right: 10px;"><label for="car12" style="display: block;">Volvo</label></td>
                                            <td class="col " style="padding-right: 10px;"><?if($car1>0){echo$car1;}else{echo "<span style=\"color: #666666;\">-</span>";}?></td>
                                            <td class="col " style="padding-right: 10px; "><?echo $countcar1;?></td>

                                        </tr> <tr>
                                            <td colspan="45"><input class="textarea" style="border-left: 0; width: 100%;" value="Find" type="submit"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <div class="break" style="padding-top: 30px;"></div>
                                <div class="spacer"></div>
                                <div class="break" style="padding-top: 23px;"></div>
                            </div>




                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">

                                    <?php if($getid >0 AND ${"car".$getid} > 0){ ?>

                                        </form>
                                        <?php } ?>
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