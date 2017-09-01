<? include 'included.php'; session_start(); ?>
<?
$time = time();
$times = $time + 300;
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR];
$doits = $_POST['id'];
$action = mysql_real_escape_string($_POST['action']);
$actionsell = mysql_real_escape_string($_POST['actionsell']);
$doit = preg_replace($saturated,"",$doits);
$actions = preg_replace($saturated,"",$action);
$actionss = preg_replace($saturated,"",$actionsell);
$gangsterusername = $usernameone;
$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jaill.php'); }

$rep = $statustesttwo['repair'];
$usermission = $statustesttwo['mission'];
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
    <SCRIPT LANGUAGE="JavaScript">
        function checkAll(field) {
            for (i = 0; i < field.length; i++)
                field[i].checked = true;
        }
        function uncheckAll(field) {
            for (i = 0; i < field.length; i++)
                field[i].checked = false;
        }
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
            if(isset($_POST['repairit']))
            {$buycar = $doit;
                $n = count($buycar);
                $i = 0;

                if($n >= 1){
                    while ($i < $n){
                        $doit = $buycar[$i];
                        if(2 == '1'){}
                        else{

                            $ifnota = mysql_query("SELECT * FROM cars WHERE id = '$doit'");
                            $ifnot = mysql_fetch_array($ifnota);
                            $ifnotname = $ifnot['owner'];
                            $damage = $ifnot['damage'];
                            $carname = $ifnot['carname'];
                            $carid = $ifnot['carid'];

                            if($carid == 1){$carinfom = 'Volvo'; $repairprice = '1000';}
                            elseif($carid == 2){$carinfom = 'Renault Clio'; $repairprice = '2500';}
                            elseif($carid == 3){$carinfom = 'Porsche 911'; $repairprice = '5000';}
                            elseif($carid == 4){$carinfom = 'BMW'; $repairprice = '100000';}
                            elseif($carid == 5){$carinfom = 'Aston Martin'; $repairprice = '125000';}
                            elseif($carid == 6){$carinfom = 'Alfa Romeo'; $repairprice = '320000';}
                            elseif($carid == 7){$carinfom = 'Continental GT'; $repairprice = '475000';}
                            elseif($carid == 8){$carinfom = 'Maybach 62'; $repairprice = '650000';}
                            elseif($carid == 9){$carinfom = 'Maserati'; $repairprice = '1000000';}
                            elseif($carid == 10){$carinfom = 'Audi TT'; $repairprice = '1000000';}
                            elseif($carid == 11){$carinfom = 'Porsche Carrera GT'; $repairprice = '1000000';}
                            elseif($carid == 12){$carinfom = 'Pagani Zonda'; $repairprice = '2250000';}
                            elseif($carid == 13){$carinfom = $carname; $repairprice = '0';}
                            elseif($carid == 14){$carinfom = 'Bugatti Veyron'; $repairprice = '10000000';}
                            elseif($carid == 15){$carinfom = 'Ferrari 458 Italia'; $repairprice = '10000000';}
                            elseif($carid == 16){$carinfom = 'Lamborghini Murcielago'; $repairprice = '10000000';}
                            elseif($carid == 17){$carinfom = 'Koenigsegg Agera R'; $repairprice = '10000000';}
                            elseif($carid == 18){$carinfom = 'Lamborghini Aventador'; $repairprice = '10000000';}
                            elseif($carid == 19){$carinfom = 'Audi Prologue'; $repairprice = '10000000';}

                            if($carid == 12){$before = '<b><font color=red face=verdana size=1>Very Rare:&nbsp;</b></font>';}
                            elseif($carid == 9){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                            elseif($carid == 10){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                            elseif($carid == 11){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                            elseif($carid == 16){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                            elseif($carid == 17){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                            elseif($carid == 13){$before = '<b><font color=red face=verdana size=1>Custom:&nbsp;</b></font>';}
                            elseif($carid >= 14 && $carid != 16 && $carid != 17){$before = '<b><font color=#0066FF face=verdana size=1>Super Rare:&nbsp;</b></font>';}
                            else{$before = '';}

                            $cost = round($repairprice / 100 * $damage);

                            if(!$ifnotname){}
                            elseif($ifnotname != $gangsterusername){}
                            elseif($damage < 1){}
                            else{
                                $getusermoney = mysql_query("SELECT money FROM users WHERE ID = '$ida'");
                                $getit = mysql_fetch_array($getusermoney);
                                $money = $getit['money'];

                                if($money >= $cost){
									if ($damage > 80) {
										mysql_query("DELETE FROM cars WHERE id = '$doit' AND owner = '$gangsterusername'");
										mysql_query("UPDATE users SET money = money - '$cost' WHERE id = '$ida'");
									}
									else {
										$counts = $counts + 1;
										mysql_query("UPDATE cars SET damage = '0' WHERE id = '$doit' AND owner = '$gangsterusername'");
										mysql_query("UPDATE users SET money = money - '$cost' WHERE id = '$ida'"); 
									}
								}
                                else{
									
								}
							}
                            $i = $i + 1;

                            $statustest = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
                            $statustesttwo = mysql_fetch_array($statustest);
                            $rep = $statustesttwo['repair'];



						}}
					if ($n == 1 && $counts == 0) {
						echo "You failed fixing your <b color='white'>$carinfom</b>! You lost the car!";
					}
					elseif ($n == 1 && $counts == 0) {
						echo "You successfully fixed $counts out of $n cars!";
					}
					else {
						if ($counts == $n) {
							echo "You successfully fixed $counts out of $n cars!";
						}
						elseif ($counts < $n) {
							$lost = $n - $counts;
							echo "You successfully fixed $counts out of $n cars! You lost $lost cars!";
						}
					}
                }}

            $showcarraw = $_POST['id'];
            $priceraw = $_POST['price'];
            $price = preg_replace($saturated,"",$priceraw);
            if($price > 99999999999){$price = 99999999999;}

            if($price > 0 AND $_POST['sellit']){
                if($actionss == '1')
                {$showcar = preg_replace($saturated,"",$showcarraw);
                    $n = count($showcar);
                    $i = 0;
                    if($n >= 1){
                        $showoutcome++; $outcome = "<font size=1 face=verdana color=white>You have put $n cars for sale!</font>";
                        while ($i < $n){
                            $doit = $showcar[$i];
                            $ifnota = mysql_query("SELECT * FROM cars WHERE id = '$doit'");

                            if(!$doit){}else{

                                $ifnot = mysql_fetch_array($ifnota);
                                $ifnotname = $ifnot['owner'];
                                $pricerange = $ifnot['price'];
                                if($ifnotname != $gangsterusername){}
                                if($pricerange > 0){ $showoutcome++; $outcome = "<font size=1 face=verdana color=white>You can't update a cars price if the car is already up for sale.</font>";}
                                else{mysql_query("UPDATE cars SET price = '$price' WHERE id = '$doit' AND owner = '$gangsterusername'");}}
                            $i++;}}}}

            $showcarrawa = $_POST['id'];
            if($actionss == '2')
            {$showcara = preg_replace($saturated,"",$showcarrawa);
                $na = count($showcara);
                $ia = 0;
                if(!$showcara){}
                else{
                    $showoutcome++; $outcome = "<font size=1 face=verdana color=white>You have stopped selling $na cars!</font>";
                    while ($ia < $na){
                        $doit = $showcara[$ia];
                        $ifnota = mysql_query("SELECT * FROM cars WHERE id = $doit");
                        $ifnota = mysql_fetch_array($ifnota);
                        $ifnotnamea = $ifnota['owner'];
                        if($ifnotnamea != $gangsterusername){}
                        else{mysql_query("UPDATE cars SET price = '0' WHERE id = '$doit' AND owner = '$gangsterusername'");}
                        $ia++;}}}



            if(isset($_GET['carid'])){
                $docarid = mysql_real_escape_string(strip_tags($_GET['carid']));
                if($docarid < 1 || $docarid > 18){}else{
                    $howmany = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '$docarid'"));
                    if($docarid == 1){ $dotimes = 100; }
                    elseif($docarid == 2){ $dotimes = 200; }
                    elseif($docarid == 3){ $dotimes = 400; }
                    elseif($docarid == 4){ $dotimes = 800; }
                    elseif($docarid == 5){ $dotimes = 1000; }
                    elseif($docarid == 6){ $dotimes = 1500; }
                    elseif($docarid == 7){ $dotimes = 2500; }
                    elseif($docarid == 8){ $dotimes = 3500; }
                    elseif($docarid == 9){ $dotimes = 5000; }
                    elseif($docarid == 10){ $dotimes = 7500; }
                    elseif($docarid == 11){ $dotimes = 12500; }
                    elseif($docarid == 12){ $dotimes = 15000; }
                    elseif($docarid == 13){ $dotimes = 150000; }
                    elseif($docarid >= 14){ $dotimes = 10000000; }
                    $getreward = $howmany * $dotimes;
                    mysql_query("UPDATE users SET money = (money + '$getreward') WHERE username = '$gangsterusername'");
                    mysql_query("DELETE FROM cars WHERE carid = '$docarid' AND owner = '$gangsterusername'");
                    $showoutcome++; $outcome = "You received <font color=khaki>$<b>".number_format($getreward)."</b></font> for dropping the cars!";
                }}

            $selecterraw = $_POST['select'];
            $selecter = preg_replace($saturated,"",$selecterraw);
            if(isset($_POST['next'])){$one = $selecter + 1;}
            elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

            $selectfroma = $one * 30;
            $selecttoa = $selectfrom + 30;
            $selectfrom = preg_replace($saturated,"",$selectfroma);
            $selectto = preg_replace($saturated,"",$selecttoa);

            $carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY bullets DESC, damage LIMIT $selectfrom,$selectto ");

            $carliste = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' LIMIT 51");
            $carlistamount = mysql_num_rows($carliste);

            $cartype1 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '1'")); $getamount1 = number_format($cartype1 * 100);
            $cartype2 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '2'")); $getamount2 = number_format($cartype2 * 200);
            $cartype3 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '3'")); $getamount3 = number_format($cartype3 * 400);
            $cartype4 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '4'")); $getamount4 = number_format($cartype4 * 800);
            $cartype5 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '5'")); $getamount5 = number_format($cartype5 * 1000);
            $cartype6 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '6'")); $getamount6 = number_format($cartype6 * 1500);
            $cartype7 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '7'")); $getamount7 = number_format($cartype7 * 2500);
            $cartype8 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '8'")); $getamount8 = number_format($cartype8 * 3500);
            $cartype9 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '9'")); $getamount9 = number_format($cartype9 * 5000);
            $cartype10 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '10'")); $getamount10 = number_format($cartype10 * 7500);
            $cartype11 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '11'")); $getamount11 = number_format($cartype11 * 12500);
            $cartype12 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '12'")); $getamount12 = number_format($cartype12 * 15000);
            $cartype13 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid = '13'")); $getamount13 = number_format($cartype13 * 150000);
            $cartype14 = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND carid >= '14'")); $getamount14 = number_format($cartype14 * 10000000);
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
                                Repair Cars
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">

                                    <form method=post name=sell id=sell>
                                        <button class="textarea curve3px" name="repairit" style="font-size: 11.5px; padding: 8px 13px 7px 13px; margin: 0 0 11px 0;">
                                            Repair Selected <span style="color: #aaaaaa;">(<span id="amount_selected">0</span>)</span>
                                        </button>
                                        <div class="break" style="padding-top: 8px;">
                                            <div class="spacer"></div>
                                            <div class="break" style="padding-top: 23px;">
                                                <table class="regTable" id="carTable" style="margin: auto; margin-bottom: 18px; width: 80%; max-width: 700px;" cellspacing="0" cellpadding="0">
                                                    <tbody><tr>
                                                        <td colspan="5" class="header">
                                                            My Garage </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="subHeader"></td> <td class="subHeader" style="border-left: 0; width: 60%;">Car</td>
                                                        <td class="subHeader" style="width: 20%;">Damage&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td class="subHeader" style="width: 25%;">&nbsp;Repair&nbsp;Chance&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td class="subHeader" style="width: 20%;">&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    </tr>
                                                    <?
                                                    $contador=0;
                                                    while($carlists = mysql_fetch_array($carlist)){
                                                        $contador++;
                                                        $carid = $carlists['carid'];
                                                        $carida = $carlists['id'];
                                                        $card = $carlists['damage'];
                                                        $carnamea = $carlists['carname'];
                                                        $garage = $carlists['garage'];
                                                        $chance = 100 - $card;
                                                        if($chance >= 50){$colorr = khaki;}else{$colorr = silver;}

                                                        $forsaleat = number_format($carlists['price']);
                                                        $forsaleats = $carlists['price'];
                                                        if($forsaleats > '0'){$toecho = "For $<b>$forsaleat</b>";}else{$toecho = "Not for sale";}

                                                        if($carid == 1){$carname = 'Volvo'; $repairprice = '1000';}
                                                        elseif($carid == 2){$carname = 'Renault Clio'; $repairprice = '2500';}
                                                        elseif($carid == 3){$carname = 'Porsche 911'; $repairprice = '5000';}
                                                        elseif($carid == 4){$carname = 'BMW'; $repairprice = '100000';}
                                                        elseif($carid == 5){$carname = 'Aston Martin'; $repairprice = '125000';}
                                                        elseif($carid == 6){$carname = 'Alfa Romeo'; $repairprice = '320000';}
                                                        elseif($carid == 7){$carname = 'Continental GT'; $repairprice = '475000';}
                                                        elseif($carid == 8){$carname = 'Maybach 62'; $repairprice = '650000';}
                                                        elseif($carid == 9){$carname = 'Maserati'; $repairprice = '650000';}
                                                        elseif($carid == 10){$carname = 'Audi TT'; $repairprice = '1000000';}
                                                        elseif($carid == 11){$carname = 'Porsche Carrera GT'; $repairprice = '1000000';}
                                                        elseif($carid == 12){$carname = 'Pagani Zonda'; $repairprice = '1000000';}
                                                        elseif($carid == 13){$carname = $carnamea; $repairprice = '0';}
                                                        elseif($carid == 14){$carname = 'Bugatti Veyron'; $repairprice = '10000000';}
                                                        elseif($carid == 15){$carname = 'Ferrari 458 Italia'; $repairprice = '10000000';}
                                                        elseif($carid == 16){$carname = 'Lamborghini Murcielago'; $repairprice = '10000000';}
                                                        elseif($carid == 17){$carname = 'Koenigsegg Agera R'; $repairprice = '10000000';}
                                                        elseif($carid == 18){$carname = 'Lamborghini Aventador'; $repairprice = '10000000';}
                                                        elseif($carid == 19){$carname = 'Audi Prologue'; $repairprice = '10000000';}

                                                        if($garage == '1'){ $beforee = '<font size=1 color=grey face=verdana><b>Hidden Car:&nbsp;</b></font>'; }else{ $beforee = ''; }
                                                        if($carid == 12){$before = '<b><font color=red face=verdana size=1>Very Rare:&nbsp;</b></font>';}
                                                        elseif($carid == 9){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                                                        elseif($carid == 10){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                                                        elseif($carid == 11){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
														elseif($carid == 16){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
														elseif($carid == 17){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                                                        elseif($carid == 13){$before = '<b><font color=red face=verdana size=1>Custom:&nbsp;</b></font>';}
                                                        elseif($carid >= 14 && $carid != 16 && $carid != 17){$before = '<b><font color=#0066FF face=verdana size=1>Super Rare:&nbsp;</b></font>';}
                                                        else{$before = '';}

                                                        $aaa = number_format(round($repairprice / 100 * $card));

                                                        if($contador==1){?>
                                                            <tr class="row" id="car_<?echo$carida;?>">
                                                                <td class="col noTop"><input type=checkbox onclick='change_value();' value=<?echo$carida;?> name='id[]' class='chkbx js-checkbox-count js-repair-checkbox' style="margin-right: 2px;"></td>
                                                                <td class="col noTop"><a href="viewcar.php?id=<?echo$carida;?>" style="display: inline-block; width: 100%"><?echo $beforee.' '.$before.' '.$carname;?></a></td>
                                                                <td class="col noTop"><span style="color: #aaaaaa;"><?echo$card;?>%</span><input type=checkbox style='visibility:hidden; vertical-align: middle;'></td>
                                                                <td class="col noTop"><span style="color: #aaaaaa;">$<?echo$aaa;?></span><input type=checkbox style='visibility:hidden; vertical-align: middle;'></td>
                                                                <td class="col noTop"><a onclick="drop_<?echo$carida;?>();" href="#"><label style="display: inline-block; width: 100%; opacity: 0.6;">Drop</label></a></td>
                                                            </tr>

                                                        <?}else{?>
                                                            <tr id="car_<?echo$carida;?>" class="row">
                                                                <td class="col"><input type=checkbox onclick='change_value();' value=<?echo$carida;?> name='id[]' class='chkbx js-checkbox-count js-repair-checkbox' style="margin-right: 2px;"></td>
                                                                <td class="col"><a href="viewcar.php?id=<?echo$carida;?>" style="display: inline-block; width: 100%"><?echo $beforee.' '.$before.' '.$carname;?></a></td>
                                                                <td class="col"><span style="color: #aaaaaa;"><?echo$card;?>%</span><input type=checkbox style='visibility:hidden; vertical-align: middle;'></td>
                                                                <td class="col"><span style="color: #aaaaaa;">$<?echo$aaa;?></span><input type=checkbox style='visibility:hidden; vertical-align: middle;'></td>
                                                                <td class="col"><a onclick="drop_<?echo$carida;?>();" href="#"><label style="display: inline-block; width: 100%; opacity: 0.6;">Drop</label></td>
                                                            </tr>
                                                        <?}?>
                                                        <script>
                                                            function drop_<?echo$carida;?>(){
                                                                var ajaxRequest;
                                                                try{ajaxRequest = new XMLHttpRequest();} catch (e){
                                                                    try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
                                                                        try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){
                                                                            alert("Your browser broke1!");return false;}}}
                                                                ajaxRequest.open("GET", "cardrop.php?id=<?echo$carida;?>", true);
                                                                ajaxRequest.send(null);

                                                                ajaxRequest.onreadystatechange = function(){
                                                                    if(ajaxRequest.readyState == 4){
                                                                        if(ajaxRequest.responseText){
                                                                            document.getElementById("car_<?echo$carida;?>").style.display='none';
                                                                        }}}}
                                                        </script>
                                                    <?}?>
                                                    </tbody>
                                                </table>
                                                <div style="margin-top: 15px; margin-bottom: 14px; ">
                                                    <a href="#" class="js-check-toggle" onclick="select_all();">Check / Uncheck All</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form><br>

                                        <? if($carlistamount > 25){?>
                                            <form action = "" method = "post">
                                                <input type="hidden" name="select" value="<? echo $one; ?>">
                                                <?php if($selectfrom != '0'){
                                                    echo'<input type ="submit" value="Previous page" class="textarea curve3px inline_form" style="padding-left: 9px; padding-right: 9px;" name="previous">';
                                                }?>
                                                <input type ="submit" value="Next page" class="textarea curve3px inline_form" style="padding-left: 9px; padding-right: 9px;" name="next">
                                            </form>
                                        <?}?>
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
<script>
    function change_value(){
        var num=0;
        for(i=0;i<document.getElementsByClassName('chkbx').length;i++){
            if(document.getElementsByClassName('chkbx')[i].checked)
                num++;
        }
        console.log(num);
        document.getElementById('amount_selected').innerHTML=num;
    }
    function select_all(){
        var num=0;
        for(i=0;i<document.getElementsByClassName('chkbx').length;i++){
            if(document.getElementsByClassName('chkbx')[i].checked)
                num++;
        }
        if(num==document.getElementsByClassName('chkbx').length){
            for(i=0;i<document.getElementsByClassName('chkbx').length;i++){
                document.getElementsByClassName('chkbx')[i].checked=false;
            }
            document.getElementById('amount_selected').innerHTML='0';
        }else{
            for(i=0;i<document.getElementsByClassName('chkbx').length;i++){
                document.getElementsByClassName('chkbx')[i].checked=true;
            }
            document.getElementById('amount_selected').innerHTML=i;
        }
    }
</script>