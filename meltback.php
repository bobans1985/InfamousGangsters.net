<? include 'included.php'; session_start(); ?>
<?

$usermission = $statustesttwo['mission'];
$usercrewid = $statustesttwo['crewid'];

if($usercrewid != '0'){
    $theperc = 30;
}

$time = time();
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR];
$getida = mysql_real_escape_string($_GET['dropid']);
$getid = preg_replace($saturated,"",$getida);
$vera = mysql_real_escape_string($_POST['ver']);
$verpost = preg_replace($saturate,"",$vera);
$doits = $_POST['id'];
$doit = preg_replace($saturated,"",$doits);
$gangsterusername = $usernameone;

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'redirect.php'); }
$vericheck = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$usernameone' AND ver1 != '0'"));
if($vericheck > 999999999999){ die(include 'doverifmelt.php'); }

if(isset($_POST['melt'])){
    $verificationcode = rand(1,9);
    if($verificationcode == '999999999999'){
        $verifarray = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
        shuffle($verifarray);
        $verif1 = $verifarray[0];
        $verif2 = $verifarray[1];
        $verif3 = $verifarray[2];
        mysql_query("UPDATE users SET ver1 = '$verif1', ver2 = '$verif2', ver3 = '$verif3' WHERE ID = '$ida'");
        die(include 'doverifmelt.php');
    }}
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
    <script>
        function crimesCountdown(load){
            if(load){
                var table = document.getElementById('table_melt');
                var inmates = table.getElementsByTagName('span');
                for(var i = 0; i < inmates.length; i++){
                    if(inmates[i].id == 'countdown'){
                        var timeleft = parseInt(inmates[i].innerHTML);
                        if(timeleft > 0){
                            if(timeleft == 1){
                                inmates[i].innerHTML = '0';
                            } else {
                                inmates[i].innerHTML = timeleft - 1;
                            }}}}}
            setTimeout("crimesCountdown(true)",1000);
        }
        window.onload = crimesCountdown;
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
            $points = $getuserinfoarray['points'];
            $userlocation = $getuserinfoarray['location'];

            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $getida = $_POST['id'];
            $getid = preg_replace($saturated,"",$getida);

            $getuserinfoarray = $statustesttwo;
            $ID = $getuserinfoarray['ID'];
            $melt = $getuserinfoarray['melt'];
            $crewid = $getuserinfoarray['crewid'];
            $ref = $getuserinfoarray['refby'];
            $ver = $getuserinfoarray['ver'];
            $input = $getuserinfoarray['input'];
            $inputrand = mt_rand(0,20);
            if($inputrand <= '5'){$newinput = 1;}
            $melttime = $melt - $time;


            $guessopen = mysql_query("SELECT * FROM gametimes WHERE game = 'weekly'");
            $openx = mysql_fetch_array($guessopen);
            $openxox = $openx['time'];

            if(isset($_POST['melt'])){
                if($melt > $time){$showoutcome++; $outcome = "Please wait $melttime seconds!</font>";}
                else{
                    $n = count($doit);
                    if($n==1)$carsLabel = "car"; else $carsLabel = "cars";
                    for($i=0;$i<$n;$i++){
                        if($doit_str = $doit[$i]){
                            $ifnota = mysql_query("SELECT * FROM cars WHERE id = $doit_str");
                            $ifnot = mysql_fetch_array($ifnota);
                            $ifnotname = $ifnot['owner'];
                            $meltbullets = $ifnot['bullets'];
                            $meltdamage = $ifnot['damage'];
                            if($ifnotname == $gangsterusername){
                                mysql_query("DELETE FROM cars WHERE id = '$doit_str'");
                                if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
                                if($meltdamage == '0'){ $meltamount = $meltbullets; }
                                else{

                                    $meltdamaged = 100 - $meltdamage;
                                    $meltamounttwo = $meltdamaged * $meltbullets;
                                    $meltamount = ceil($meltamounttwo / 100);
                                }
                                $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '4'"));
                                if($crewperk > 0){ $meltamountt = ($meltamount * 1.25); $meltamount = round($meltamountt); }
                                mysql_query("UPDATE users SET totalmelted = (totalmelted + $meltamount) WHERE ID = '$ida'");
                                mysql_query("UPDATE users SET carsmelted = (carsmelted + 1) WHERE ID = '$ida'");
                                if($openxox == 2){ mysql_query("UPDATE weeklychal SET total = (total + $meltamount) WHERE username = '$usernameone'"); }
                                mysql_query("UPDATE missiontasks SET meltcars = meltcars + 1 WHERE username = '$usernameone'");

                                if($crewid >= 1){
                                    $usercrewsql = mysql_query("SELECT melted,cash FROM crews WHERE id = '$usercrewid'");
                                    $usercrewarray = mysql_fetch_array($usercrewsql);
                                    $theperc = 30;
                                    $crewmelted = $usercrewarray['melted'];
                                    $crewcash = $usercrewarray['cash'];
                                    $crewmelt = $meltamount * $theperc / 100;
                                    $startmelting = mysql_num_rows(mysql_query("SELECT * FROM crewsbullets WHERE username = '$usernameone'"));
                                    if($startmelting < 1){ mysql_query("INSERT INTO `crewsbullets` (crewid,username) VALUES ('$crewid','$usernameone')"); }
                                    mysql_query("UPDATE crewsbullets SET melted = (melted + $crewmelt) WHERE username = '$usernameone'");
                                    $meltcheck = mysql_query("SELECT * FROM crewsbullets WHERE username = '$usernameone'");
                                    $domelt = mysql_fetch_array($meltcheck);
                                    $creward = $domelt['reward'];
                                    $cmelted = $domelt['melted'];
                                    if(($cmelted - $creward) >= 1000 AND $crewcash >= $crewmelted){
                                        mysql_query("UPDATE crewsbullets SET reward = (reward + 1000), earned = (earned + $crewmelted) WHERE username = '$usernameone'");
                                        mysql_query("UPDATE users SET money = (money + $crewmelted) WHERE ID = '$ida'");
                                        mysql_query("UPDATE crews SET cash = (cash - $crewmelted) WHERE id = '$crewid'");
                                        mysql_query("UPDATE users SET notification = 'You have just received your melting reward!', notify = (notify + 1) WHERE ID = '$ida'");
                                    }
                                    $mymelt = ceil($meltamount - $crewmelt);
                                    mysql_query("UPDATE users SET bullets = (bullets + $mymelt), crewbullets = (crewbullets + $crewmelt) WHERE ID = '$ida'");
                                    mysql_query("UPDATE users SET totalcmelted = (totalcmelted + $crewmelt) WHERE ID = '$ida'");
                                    mysql_query("UPDATE missiontasks SET crewbullets = crewbullets + $crewmelt WHERE username = '$usernameone'");
                                    mysql_query("UPDATE missiontasks SET meltbullets = meltbullets + $mymelt WHERE username = '$usernameone'");
                                    mysql_query("UPDATE crews SET bullets = bullets + $crewmelt WHERE id = '$crewid'");
                                }
                                else{
                                    mysql_query("UPDATE users SET bullets = bullets + $meltamount WHERE ID = '$ida'");
                                    mysql_query("UPDATE missiontasks SET meltbullets = meltbullets + $meltamount WHERE username = '$usernameone'");
                                }

                                $lmmelt = $meltamount * 90/100;
                                $lmmymelt = ceil($meltamount - $lmmelt);
                                mysql_query("UPDATE casinos SET bullets = (bullets + $lmmymelt) WHERE casino = 'Landmark' AND location = '$userlocation'");

                                $totalbullets = $meltamount + $totalbullets;
                            }}
                        $times = $time + (320 * $n);
                        mysql_query("UPDATE users SET melt = '$times' WHERE ID = '$ida'");

                        if($crewid == 0){
                            $showoutcome++; $outcome = "You melted $n $carsLabel and earned <font color=yellow><b>$totalbullets</b></font> bullets!"; }else{
                            $showoutcome++; $outcome = "You melted $n $carsLabel and earned <font color=yellow><b>$totalbullets</b></font> bullets, Your crew took <b>$theperc</b>% of them!";
                        }}}}

            $getmelt = mysql_query("SELECT melt FROM users WHERE username = '$usernameone'");
            $getm = mysql_fetch_array($getmelt);
            $melt = $getm['melt'];
            $time = time();
            $melttime = $melt - $time;
            if($melttime > 0){ $checkamount = round($melttime / 320 * 5); }else{ $checkamount = 5; }

            if($_POST['reset']){
                if($melttime > 0){ $getamount = round($melttime / 320 * 5); }else{ $getamount = 5; }
                if($points < '$getamount'){$showoutcome++; $outcome = "You dont have enough points!";}
                else{
                    mysql_query("UPDATE users SET points = (points - $getamount) WHERE ID = '$ida' AND points >= '$getamount'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
                    mysql_query("UPDATE users SET ptsspent = (ptsspent + $getamount) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET melt = '0' WHERE ID = '$ida'");
                    $showoutcome++; $outcome = "You can now melt cars again!";}}

            $selecterraw = $_POST['select'];
            $selecter = preg_replace($saturated,"",$selecterraw);
            if(isset($_POST['next'])){$one = $selecter + 1;}
            elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

            $selectfroma = $one * 30;
            $selecttoa = $selectfrom + 30;
            $selectfrom = preg_replace($saturated,"",$selectfroma);
            $selectto = preg_replace($saturated,"",$selecttoa);

            $getuserinfosql = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
            $getuserinfoarray = mysql_fetch_array($getuserinfosql);
            $melt = $getuserinfoarray['melt'];
            $melttime = $melt - $time;

            $carlistamount = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername'");
            $carlistamount = mysql_num_rows($carlistamount);

            $carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' AND garage = '0' AND price = '0' ORDER BY carid DESC, damage LIMIT $selectfrom,$selectto");
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
                                Melt Car
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
<!--                                    <form method=post><br>-->
<!--                                        <input type=submit name=doall class=textbox value="Commit" style="visibility:hidden;">-->
<!--                                        <input type=submit name=reset class=textbox value="Reset: --><?//echo$checkamount;?><!-- points">-->
<!--                                    </form>-->
                                    <form action="melt.php" method="post" id="table_melt">
                                        &nbsp;<? if($melttime <= 0){?>
                                            <button class="textarea curve3px" name="melt" style="font-size: 11.5px; padding: 8px 13px 7px 13px; margin: 0 0 11px 0;">
                                                Melt: <span class="crimeTimer" data-counter="-1"><span style="color: gold;">Available</span></span>
                                            </button>
                                        <?}else{?>
                                            <button class="textarea curve3px" name="melt" style="font-size: 11.5px; padding: 8px 13px 7px 13px; margin: 0 0 11px 0;">
                                                Melt: <span style="color: #999999;" id=countdown><?echo$melttime;?> seconds</>
                                            </button>
                                        <?}?>
                                        <div class="break" style="padding-top: 8px;"></div>
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 23px;"></div>
                                        <table class="regTable" id="carTable" style="margin: auto; margin-bottom: 18px; width: 80%; max-width: 700px;" cellspacing="0" cellpadding="0">
                                            <tbody><tr>
                                                <td colspan="5" class="header">
                                                    My Garage </td>
                                            </tr>
                                            <tr>
                                                <td class="subHeader"></td> <td class="subHeader" style="border-left: 0; width: 60%;">Car</td>
                                                <td class="subHeader" style="width: 20%;">Damage&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td class="subHeader" style="width: 20%;">Bullets&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td class="subHeader" style="width: 20%;">&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            </tr>
                                            <?
                                            if($carlistamount == 0){
                                                echo "<tr><td colspan=3 align=center><div class=button1>You do not have any cars to melt!</td></tr>";
                                            }else{
                                                $contador=0;
                                                while($carlists = mysql_fetch_array($carlist)){
                                                    $contador++;
                                                    $carid = $carlists['carid'];
                                                    $carida = $carlists['id'];
                                                    $carbullets = $carlists['bullets'];
                                                    $card = $carlists['damage'];
                                                    $carnamea = $carlists['carname'];
                                                    $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '4'"));
                                                    if($crewperk > 0){ $carbullets = $carbullets * 1.25; $carbullets = round($carbullets); }
                                                    if($card == '0'){$bullets = $carbullets;}else{
                                                        $damaged = 100 - $card;
                                                        $damagedtwo = $damaged * $carbullets;
                                                        $bullets = ceil($damagedtwo / 100);
                                                    }
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
                                                    else{$before = '';}?>
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
                                                    <?if($contador==1){?>
                                                        <tr class="row" id="car_<?echo$carida;?>">
                                                            <td class="col noTop"><input value="<?echo$carida;?>" name='id[]' style="margin-right: 2px;" type="radio"></td>
                                                            <td class="col noTop"><a href="viewcar.php?id=<?echo$carida;?>" style="display: inline-block; width: 100%"><?echo$before." ".$carname;?></a></td>
                                                            <td class="col noTop"><span style="color: #aaaaaa;"><?echo$card;?>%</span><input type=checkbox name=id value="<?echo$carida;?>" style='vertical-align:middle;visibility:hidden;width:1px;'></td>
                                                            <td class="col noTop"><span style="color: #aaaaaa;"><?echo$bullets;?> bullets</span><input type=checkbox name=id value="<?echo$carida;?>" style='vertical-align:middle;visibility:hidden;width:1px;'></td>
                                                            <td class="col noTop"><a onclick="drop_<?echo$carida;?>();" href="#"><label style="display: inline-block; width: 100%; opacity: 0.6;">Drop</label></a></td>
                                                        </tr>
                                                    <?}else{?>
                                                        <tr class="row" id="car_<?echo$carida;?>">
                                                            <td class="col"><input value="<?echo$carida;?>" name='id[]' style="margin-right: 2px;" type="radio"></td>
                                                            <td class="col"><a href="viewcar.php?id=<?echo$carida;?>" style="display: inline-block; width: 100%"><?echo$before." ".$carname;?></a></td>
                                                            <td class="col"><span style="color: #aaaaaa;"><?echo$card;?>%</span><input type=checkbox name=id value="<?echo$carida;?>" style='vertical-align:middle;visibility:hidden;width:1px;'></td>
                                                            <td class="col"><span style="color: #aaaaaa;"><?echo$bullets;?> bullets</span><input type=checkbox name=id value="<?echo$carida;?>" style='vertical-align:middle;visibility:hidden;width:1px;'></td>
                                                            <td class="col"><a onclick="drop_<?echo$carida;?>();" href="#"><label style="display: inline-block; width: 100%; opacity: 0.6;">Drop</label></a></td>
                                                        </tr>
                                                    <?}?>
                                                <?}}?>
                                            </tbody>
                                        </table>
                                    </form>
                                    <? if($carlistamount > 30){?>
                                        <form action = "" method = "post"><center><input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></center></form>
                                    <?}else{echo"<br>";}?>
                                    <div class="break" style="padding-top: 15px;">
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 4px;">
                                            <?
                                            $totalcrimes = number_format($getuserinfoarray['carsmelted']);
                                            $concrimes = number_format($getuserinfoarray['totalmelted']);
                                            $crimessuccess = number_format($getuserinfoarray['crewbullets']);
                                            ?>
                                            <div style="text-align: right; padding: 5px; padding-right: 6px; padding-top: 1px;">
                                                <span style="float: left;">Total Melted: <b style="color: silver;"><?echo$totalcrimes;?></b></span>
                                            </div>
                                        </div>
                                    </div>
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