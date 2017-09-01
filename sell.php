<? include 'included.php'; session_start(); ?>
<?
$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR];
$gangsterusername = $usernameone;
$action = $_POST['action'];
$actions = preg_replace($allowed,"",$action);

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
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

            $entertainer = $ent;
            if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}
            $saturated = "/[^0-9]/i";
            $bustraw = $_POST['bust'];
            $bust = preg_replace($saturate,"",$bustraw);

            $gangsterusername = $usernameone;
            $getuserinfoarray = $statustesttwo;
            $rank = $getuserinfoarray['rankid'];
            $getname = $getinfoarray['username'];

            if($rank > 101){die(' ');}

            $getuserinfoarray = $statustesttwo;


            $showcarraw = $_POST['sellcar'];
            $priceraw = $_POST['price'];
            $price = preg_replace($saturated,"",$priceraw);
            if($price > 99999999999){$price = 99999999999;}

            if($price > 0){
                if(isset($_POST['market']))
                {$showcar = preg_replace($saturated,"",$showcarraw);
                    $n = count($showcar);
                    $i = 0;
                    if($n >= 1){
                        $showoutcome++; $outcome = "<font size=1 face=verdana color=white>You have put $n cars for sale!</font>";
                        while ($i < $n){
                            $doit = $showcar[$i];
                            $ifnota = mysql_query("SELECT * FROM cars WHERE id = $doit");



                            if(!$doit){}else{

                                $ifnot = mysql_fetch_array($ifnota);
                                $ifnotname = $ifnot['owner'];
                                if($ifnotname != $gangsterusername){}
                                else{mysql_query("UPDATE cars SET price = '$price' WHERE id = '$doit' AND owner = '$gangsterusername'");}}
                            $i++;}}}}

            $showcarrawa = $_POST['sellcar'];
            if(isset($_POST['stop']))
            {$showcara = preg_replace($saturated,"",$showcarrawa);
                $na = count($showcara);
                $ia = 0;
                if(!$showcara){}
                else{
                    $showoutcome++; $outcome = "<font size=1 face=verdana color=white>You have stopped selling $na cars!</font>";
                    while ($ia < $na){
                        $doita = $showcara[$ia];
                        $ifnota = mysql_query("SELECT * FROM cars WHERE id = $doita");
                        $ifnota = mysql_fetch_array($ifnota);
                        $ifnotnamea = $ifnota['owner'];
                        if($ifnotnamea != $gangsterusername){}
                        else{mysql_query("UPDATE cars SET price = '0' WHERE id = '$doita' AND owner = '$gangsterusername'");}
                        $ia++;}}}

            $selecterraw = $_POST['select'];
            $selecter = preg_replace($saturated,"",$selecterraw);
            if(isset($_POST['next'])){$one = $selecter + 1;}
            elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

            $selectfroma = $one * 30;
            $selecttoa = $selectfrom + 30;
            $selectfrom = preg_replace($saturated,"",$selectfroma);
            $selectto = preg_replace($saturated,"",$selecttoa);

            $carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC LIMIT $selectfrom,$selectto");
            $carlistamount = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername'");
            $carlistamount = mysql_num_rows($carlistamount);

            $getuserinfosql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
            $getuserinfoarray = mysql_fetch_array($getuserinfosql);
            $getdisplay = $getuserinfoarray['displaybusts'];


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
                                Sell Cars
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <form action="" method="post" name="sell">
                                        <table class="regTable" id="carTable" style="margin: auto; margin-bottom: 18px; width: 80%; max-width: 700px;" cellspacing="0" cellpadding="0">
                                            <tbody><tr>
                                                <td colspan="4" class="header">
                                                    My Garage </td>
                                            </tr>
                                            <tr>
                                                <td class="subHeader"></td>
                                                <td class="subHeader" style="border-left: 0; width: 60%;">Car</td>
                                                <td class="subHeader" style="width: 20%;">Damage&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td class="subHeader" style="width: 25%;">&nbsp;Selling for</td>
                                            </tr>
                                            <?
                                            $contador=0;
                                            while($carlists = mysql_fetch_array($carlist)){
                                                $contador++;
                                                $carid = $carlists['carid'];
                                                $carida = $carlists['id'];
                                                $card = $carlists['damage'];
                                                $carnamea = $carlists['carname'];

                                                $forsaleat = number_format($carlists['price']);
                                                $forsaleats = $carlists['price'];
                                                if($forsaleats > '0'){$toecho = "<span style='color:lime;'>$$forsaleat</span>";}else{$toecho = "-";}

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
                                                if($contador==1){?>
                                                    <tr class="row">
                                                        <td class="col noTop"><input type="checkbox" value="<?echo$carida;?>" name="sellcar[]" class="chkbx" style="margin-right: 2px;"></td>
                                                        <td class="col noTop"><a href="viewcar.php?id=<?echo$carida;?>" style="display: inline-block; width: 100%"><?echo $before.' '.$carname;?></a></td>
                                                        <td class="col noTop"><span style="color: #aaaaaa;"><?echo$card;?>%</span></td>
                                                        <td class="col noTop"><span style="color: #aaaaaa;"><?echo$toecho;?></span></td>
                                                    </tr>

                                                <?}else{?>
                                                    <tr class="row">
                                                        <td class="col"><input type="checkbox" value="<?echo$carida;?>" name="sellcar[]" class="chkbx" style="margin-right: 2px;"></td>
                                                        <td class="col"><a href="viewcar.php?id=<?echo$carida;?>" style="display: inline-block; width: 100%"><?echo $before.' '.$carname;?></a></td>
                                                        <td class="col"><span style="color: #aaaaaa;"><?echo$card;?>%</span></td>
                                                        <td class="col"><span style="color: #aaaaaa;"><?echo$toecho;?></span></td>
                                                    </tr>
                                                <?}
                                            }?>
                                            </tbody>
                                        </table>
                                        <? if($carlistamount > 25){?>
                                            <form action = "" method = "post">
                                                <input type="hidden" name="select" value="<? echo $one; ?>">
                                                <?php if($selectfrom != '0'){
                                                    echo'<input type ="submit" value="Previous page" class="textarea curve3px inline_form" style="padding-left: 9px; padding-right: 9px;" name="previous">';
                                                }?>
                                                <input type ="submit" value="Next page" class="textarea curve3px inline_form" style="padding-left: 9px; padding-right: 9px;" name="next">
                                            </form>
                                        <?}?>
                                        <div style="margin-top: 15px; margin-bottom: 14px; ">
                                            <a href="#" class="js-check-toggle" onclick="select_all();">Check / Uncheck All</a>
                                        </div>
                                        <label for="price">Sell for: </label>
                                        <input style="width:200px;" placeholder="Enter price..." type="text" class="textarea" name="price">
                                        <input type ="submit" value="Add to market!" class="textarea curve3px" style="padding-left: 8px; padding-right: 8px; margin-top: 4px; margin-bottom: 3px;" name="market">
                                        <br/>or stop selling selected:
                                        <input tabindex="6" class="textarea curve3px" name="stop" style="padding-left: 8px; padding-right: 8px; margin-top: 4px; margin-bottom: 3px;" value="Stop selling!" type="submit">
                                   </form>
                                </div>
                                <div class="break" style="padding-top: 18px;"></div>
                                <div class="spacer"></div>
                                <div class="break" style="padding-top: 5px;"></div>
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
        }else{
            for(i=0;i<document.getElementsByClassName('chkbx').length;i++){
                document.getElementsByClassName('chkbx')[i].checked=true;
            }
        }
    }
</script>