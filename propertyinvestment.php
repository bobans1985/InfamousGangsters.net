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
            <?php
            $entertainer = $ent;
            if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $gangsterusername = $usernameone;
            $playerarray = $statustesttwo;
            $playerrank = $myrank;
            $playerrank = $playerarray['rankid'];
            $profitt = $playerarray['oilprofit'];
            $shareslimit = $playerarray['shares'];

            $userarray = $statustesttwo;
            $cash = $userarray['money'];
            $cashh = number_format($cash);
            ?>

            <?
            $ok = mysql_query("SELECT * FROM `oil`");
            $afk = mysql_fetch_array($ok);
            $one = $afk['crudeoil'];
            $two = $afk['petrol'];
            $three = $afk['diesel'];
            $four = $afk['jet'];
            $update = $afk['nextupdate'];

            if($update < time()){
                $porm = rand(1,2);
                if($porm == 1){$decide = "p";}
                if($porm == 2){$decide = "m";}
                $onekk = rand(1,11);
                $twokk = rand(10,99);
                $change = "".$onekk.".".$twokk;
                $abc = $one/100;
                $bcd = $abc*$change;
                $increase = floor($bcd);

                if($decide == "p"){ mysql_query("UPDATE `oil` SET `c`='1', `crudeoil`=crudeoil+'$increase',`cp`='$change',`cc`='$increase'");
                }else{ mysql_query("UPDATE `oil` SET `c`='2', `crudeoil`=crudeoil-'$increase',`cp`='$change',`cc`='$increase'");
                }
                $porm1 = rand(1,2);
                if($porm1 == 1){$decide1 = "p";}
                if($porm1 == 2){$decide1 = "m";}
                $onekk = rand(1,11);
                $twokk = rand(10,99);
                $change = "".$onekk.".".$twokk;
                $abc = $two/100;
                $bcd = $abc*$change;
                $increase = floor($bcd);
                if($decide1 == "p"){ mysql_query("UPDATE `oil` SET `p`='1', `petrol`=petrol+'$increase',`pp`='$change',`pc`='$increase'");
                }else{ mysql_query("UPDATE `oil` SET `p`='2', `petrol`=petrol-'$increase',`pp`='$change',`pc`='$increase'");
                }
                $porm2 = rand(1,2);
                if($porm2 == 1){$decide2 = "p";}
                if($porm2 == 2){$decide2 = "m";}
                $onekk = rand(1,11);
                $twokk = rand(10,99);
                $change = "".$onekk.".".$twokk;
                $abc = $three/100;
                $bcd = $abc*$change;
                $increase = floor($bcd);
                if($decide2 == "p"){ mysql_query("UPDATE `oil` SET `d`='1', `diesel`=diesel+'$increase',`dp`='$change',`dc`='$increase'");
                }else{ mysql_query("UPDATE `oil` SET `d`='2', `diesel`=diesel-'$increase',`dp`='$change',`dc`='$increase'");
                }
                $porm3 = rand(1,2);
                if($porm3 == 1){$decide3 = "p";}
                if($porm3 == 2){$decide3 = "m";}
                $onekk = rand(1,11);
                $twokk = rand(10,99);
                $change = "".$onekk.".".$twokk;
                $abc = $four/100;
                $bcd = $abc*$change;
                $increase = floor($bcd);
                if($decide3 == "p"){ mysql_query("UPDATE `oil` SET `j`='1', `jet`=jet+'$increase',`jp`='$change',`jc`='$increase'");
                }else{ mysql_query("UPDATE `oil` SET `j`='2', `jet`=jet-'$increase',`jp`='$change',`jc`='$increase'");
                }
                $timer = rand(1,30);
                $timeadd = 60*$timer;
                $addtime = time() + $timeadd;
                mysql_query("UPDATE `oil` SET `nextupdate`='$addtime'");
            }
            $one = $afk['crudeoil'];
            $two = $afk['petrol'];
            $three = $afk['diesel'];
            $four = $afk['jet'];
            $ten = $afk['cp'];
            $nine = $afk['pp'];
            $eight = $afk['dp'];
            $seven = $afk['jp'];
            $twenty = $afk['cc'];
            $nineteen = $afk['pc'];
            $eightteen = $afk['dc'];
            $seventeen = $afk['jc'];
            $overallprofit = $afk['profit'];
            $colour1 = $afk['c'];
            $colour2 = $afk['p'];
            $colour3 = $afk['d'];
            $colour4 = $afk['j'];

            $as = mysql_query("SELECT * FROM `propertyinvestment` WHERE `username`='$usernameone'");
            $arr = mysql_fetch_array($as); $yesorno=mysql_num_rows($as);
            $co = $arr['ms'];
            $cop = $arr['msp'];
            $p = $arr['ci'];
            $pp = $arr['cip'];
            $d = $arr['be'];
            $dp = $arr['bep'];
            $j = $arr['bb'];
            $jp = $arr['bbp'];
            $usersoilprofit = $userstat['oilprofit'];
            $profit = $usersoilprofit;
            function nonegative($input) {
                $input = preg_replace("/[^0-9]/", "", $input);
                return $input;
            }
            $crudeunits = nonegative($_POST['crude']);
            $petrol = nonegative($_POST['petrol']);
            $diesel = nonegative($_POST['diesel']);
            $jetfuel = nonegative($_POST['jet']);
            $checkunits = $co+$p+$d+$j;

            if($_POST['buy'] && is_numeric($_POST['crude'])){
                $price = $one*$crudeunits;
                $checkcash = $cash - $price;
                if($checkcash < 0){
                    $showoutcome++; $outcome = "You do not have enough cash!";
                }else{
                    $checkco = $checkunits+$crudeunits;
                    if($checkco > $shareslimit){ $showoutcome++; $outcome = "You can only have a maximum of $shareslimit shares!"; }else{
                        mysql_query("UPDATE users SET money = (money - '$price'), oilprofit = (oilprofit - '$price') WHERE username='$usernameone'");
                        if($yesorno>='1'){ mysql_query("UPDATE propertyinvestment SET ms=ms+'$crudeunits', msp='$one' WHERE username='$usernameone'"); }
                        if($yesorno<='0'){ mysql_query("INSERT INTO `propertyinvestment` (`username`,`ms`,`msp`) VALUES ('$usernameone','$crudeunits','$one')"); }
                        mysql_query("UPDATE oil SET profit=profit+'$price'");
                        $pilogsafter = mysql_fetch_array(mysql_query("SELECT money FROM users WHERE username = '$usernameone' LIMIT 1"));
                        $moneyafter = number_format($pilogsafter['money']);
                        mysql_query("INSERT INTO `pilogs` (`username`,`what`,`before`,`after`) VALUES ('$usernameone','Bought $crudeunits shares in MS for ".number_format($price)."','$cashh','$moneyafter')");
                        $showoutcome++; $outcome = "You successfully bought ".number_format($crudeunits)." shares in <font color=lime><b>[MS] Macro Studios</font></b> for <font color=yellow>$<b>".number_format($price)."</font></b>!";
                    }}}
            if($_POST['pbuy'] && is_numeric($_POST['petrol'])){
                $price = $two*$petrol;
                $checkcash = $cash - $price;
                if($checkcash < 0){
                    $showoutcome++; $outcome = "You do not have enough cash!"; }else{
                    $checkco = $checkunits+$petrol;
                    if($checkco > $shareslimit){ $showoutcome++; $outcome = "You can only have a maximum of $shareslimit shares!"; }else{
                        mysql_query("UPDATE users SET money = (money - '$price'), oilprofit = (oilprofit - '$price') WHERE username='$usernameone'");
                        if($yesorno>='1'){ mysql_query("UPDATE propertyinvestment SET ci=ci+'$petrol', cip='$two' WHERE username='$usernameone'"); }
                        if($yesorno<='0'){ mysql_query("INSERT INTO `propertyinvestment` (`username`,`ci`,`cip`) VALUES ('$usernameone','$petrol','$two')"); }
                        mysql_query("UPDATE `oil` SET `profit`=profit+'$price'");
                        $pilogsafter = mysql_fetch_array(mysql_query("SELECT money FROM users WHERE username = '$usernameone' LIMIT 1"));
                        $moneyafter = number_format($pilogsafter['money']);
                        mysql_query("INSERT INTO `pilogs` (`username`,`what`,`before`,`after`) VALUES ('$usernameone','Bought $petrol shares in CI for ".number_format($price)."','$cashh','$moneyafter')");
                        $showoutcome++; $outcome = "You successfully bought ".number_format($petrol)." shares in <font color=orange><b>[CI] Contracted Industries</font></b> for <font color=yellow>$<b>".number_format($price)."</b></font>!";
                    }}}

            if($_POST['dbuy'] && is_numeric($_POST['diesel'])){
                $price = $three*$diesel;
                $checkcash = $cash - $price;
                if($checkcash < 0){
                    $showoutcome++; $outcome = "You do not have enough cash!"; }else{
                    $checkco = $checkunits+$diesel;
                    if($checkco > $shareslimit){ $showoutcome++; $outcome = "You can only have a maximum of $shareslimit shares!"; }else{
                        mysql_query("UPDATE users SET money = (money - '$price'), oilprofit = (oilprofit - '$price') WHERE username='$usernameone'");
                        if($yesorno>='1'){ mysql_query("UPDATE propertyinvestment SET be=be+'$diesel', bep='$three' WHERE username='$usernameone'"); }
                        if($yesorno<='0'){ mysql_query("INSERT INTO `propertyinvestment` (`username`,`be`,`bep`) VALUES ('$usernameone','$diesel','$three')"); }
                        mysql_query("UPDATE `oil` SET `profit`=profit+'$price'");
                        $pilogsafter = mysql_fetch_array(mysql_query("SELECT money FROM users WHERE username = '$usernameone' LIMIT 1"));
                        $moneyafter = number_format($pilogsafter['money']);
                        mysql_query("INSERT INTO `pilogs` (`username`,`what`,`before`,`after`) VALUES ('$usernameone','Bought $diesel shares in BE for ".number_format($price)."','$cashh','$moneyafter')");
                        $showoutcome++; $outcome = "You successfully bought ".number_format($diesel)." shares in <font color=red><b>[BE] BioElectronics</font></b> for <font color=yellow>$<b>".number_format($price)."</font></b>!";
                    }}}

            if($_POST['jbuy'] && is_numeric($_POST['jet'])){
                $price = $four*$jetfuel;
                $checkcash = $cash - $price;
                if($checkcash < 0){
                    $showoutcome++; $outcome = "You do not have enough cash!"; }else{
                    $checkco = $checkunits+$jetfuel;
                    if($checkco > $shareslimit){ $showoutcome++; $outcome = "You can only have a maximum of $shareslimit shares!"; }else{
                        mysql_query("UPDATE users SET money = (money - '$price'), oilprofit = (oilprofit - '$price') WHERE username='$usernameone'");
                        if($yesorno>='1'){ mysql_query("UPDATE propertyinvestment SET bb=bb+'$jetfuel', bbp='$four' WHERE username='$usernameone'"); }
                        if($yesorno<='0'){ mysql_query("INSERT INTO `propertyinvestment` (`username`,`bb`,`bbp`) VALUES ('$usernameone','$jetfuel','$four')"); }
                        mysql_query("UPDATE `oil` SET `profit`=profit+'$price'");
                        $pilogsafter = mysql_fetch_array(mysql_query("SELECT money FROM users WHERE username = '$usernameone' LIMIT 1"));
                        $moneyafter = number_format($pilogsafter['money']);
                        mysql_query("INSERT INTO `pilogs` (`username`,`what`,`before`,`after`) VALUES ('$usernameone','Bought $jetfuel shares in BB for ".number_format($price)."','$cashh','$moneyafter')");
                        $showoutcome++; $outcome = "You successfully bought ".number_format($jetfuel)." shares in <font color=pink><b>[BB] Billionaire Broadway</b></font> for <font color=yellow>$<b>".number_format($price)."</font></b>!";
                    }}}

            if($_POST['sell']){
                if($co <= 0){ $showoutcome++; $outcome = "You do not have any shares in this property"; }else{
                    $addmoney = $co*$one;
                    mysql_query("UPDATE users SET money = (money + '$addmoney'), oilprofit = (oilprofit + '$addmoney') WHERE username='$usernameone'");
                    mysql_query("UPDATE propertyinvestment SET ms='0', msp='0' WHERE username='$usernameone'");
                    mysql_query("UPDATE `oil` SET `profit`=profit-'$addmoney'");
                    $pilogsafter = mysql_fetch_array(mysql_query("SELECT money FROM users WHERE username = '$usernameone' LIMIT 1"));
                    $moneyafter = number_format($pilogsafter['money']);
                    mysql_query("INSERT INTO `pilogs` (`username`,`what`,`before`,`after`) VALUES ('$usernameone','Sold $co shares in MS for ".number_format($addmoney)."','$cashh','$moneyafter')");
                    $showoutcome++; $outcome = "You successfully sold ".number_format($co)." shares of <font color=lime><b>[MS] Macro Studios</font></b> for <font color=yellow>$<b>".number_format($addmoney)."</font></b>!";
                }}

            if($_POST['psell']){
                if($p <= 0){ $showoutcome++; $outcome = "You do not have shares in this property"; }else{
                    $addmoney = $p*$two;
                    mysql_query("UPDATE users SET money = (money + '$addmoney'), oilprofit = (oilprofit + '$addmoney') WHERE username='$usernameone'");
                    mysql_query("UPDATE propertyinvestment SET ci='0', cip='0' WHERE username='$usernameone'");
                    mysql_query("UPDATE `oil` SET `profit`=profit-'$addmoney'");
                    $pilogsafter = mysql_fetch_array(mysql_query("SELECT money FROM users WHERE username = '$usernameone' LIMIT 1"));
                    $moneyafter = number_format($pilogsafter['money']);
                    mysql_query("INSERT INTO `pilogs` (`username`,`what`,`before`,`after`) VALUES ('$usernameone','Sold $p shares in CI for ".number_format($addmoney)."','$cashh','$moneyafter')");
                    $showoutcome++; $outcome = "You successfully sold ".number_format($p)." shares of <font color=orange><b>[CI] Contracted Industries</font></b> for <font color=yellow>$<b>".number_format($addmoney)."</b></font>!";
                }}

            if($_POST['dsell']){
                if($d <= 0){ $showoutcome++; $outcome = "You do not have shares in this property"; }else{
                    $addmoney = $d*$three;
                    mysql_query("UPDATE users SET money = (money + '$addmoney'), oilprofit = (oilprofit + '$addmoney') WHERE username='$usernameone'");
                    mysql_query("UPDATE propertyinvestment SET be='0', bep='0' WHERE username='$usernameone'");
                    mysql_query("UPDATE `oil` SET `profit`=profit-'$addmoney'");
                    $pilogsafter = mysql_fetch_array(mysql_query("SELECT money FROM users WHERE username = '$usernameone' LIMIT 1"));
                    $moneyafter = number_format($pilogsafter['money']);
                    mysql_query("INSERT INTO `pilogs` (`username`,`what`,`before`,`after`) VALUES ('$usernameone','Sold $d shares in BE for ".number_format($addmoney)."','$cashh','$moneyafter')");
                    $showoutcome++; $outcome = "You successfully sold ".number_format($d)." shares of <font color=red><b>[BE] BioElectronics</font></b> for <font color=yellow>$<b>".number_format($addmoney)."</font></b>!";
                }}

            if($_POST['jsell']){
                if($j <= 0){ $showoutcome++; $outcome = "You do not have shares in this property"; }else{
                    $addmoney = $j*$four;
                    mysql_query("UPDATE users SET money = (money + '$addmoney'), oilprofit = (oilprofit + '$addmoney') WHERE username='$usernameone'");
                    mysql_query("UPDATE propertyinvestment SET bb='0', bbp='0' WHERE username='$usernameone'");
                    mysql_query("UPDATE `oil` SET `profit`=profit-'$addmoney'");
                    $pilogsafter = mysql_fetch_array(mysql_query("SELECT money FROM users WHERE username = '$usernameone' LIMIT 1"));
                    $moneyafter = number_format($pilogsafter['money']);
                    mysql_query("INSERT INTO `pilogs` (`username`,`what`,`before`,`after`) VALUES ('$usernameone','Sold $j shares in BB for ".number_format($addmoney)."','$cashh','$moneyafter')");
                    $showoutcome++; $outcome = "You successfully sold ".number_format($j)." shares of <font color=pink><b>[BB] Billionaire Broadway</b></font> for <font color=yellow>$<b>".number_format($addmoney)."</font></b>!";
                }}

            $as = mysql_query("SELECT * FROM `propertyinvestment` WHERE `username`='$usernameone'");
            $arr = mysql_fetch_array($as);
            $co = $arr['ms'];
            $cop = $arr['msp'];
            $p = $arr['ci'];
            $pp = $arr['cip'];
            $d = $arr['be'];
            $dp = $arr['bep'];
            $j = $arr['bb'];
            $jp = $arr['bbp'];
            $qwerty = $cop*$co;
            $asdfg = $one*$co;
            $profitlossone = $asdfg-$qwerty;
            $poi = $two*$p;
            $lkj = $pp*$p;
            $profitlosstwo = $poi - $lkj;
            $rfv = $three*$d;
            $edc = $dp*$d;
            $profitlossthree = $rfv - $edc;
            $aswd = $four*$j;
            $axzc = $jp*$j;
            $profitlossfour = $aswd - $axzc;
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
                                Property Investment <font color=yellow face=verdana size=1>Prices will update in <?php echo maketime($update); ?>
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <? $getamount = mysql_query("SELECT * FROM propertyinvestment");
                                    while($doitnow = mysql_fetch_array($getamount)){
                                        $msa = $doitnow['ms'] + $msa;
                                        $msap = $doitnow['ms'] * $doitnow['msp'] + $msap;
                                        $cia = $doitnow['ci'] + $cia;
                                        $ciap = $doitnow['ci'] * $doitnow['cip'] + $ciap;
                                        $bea = $doitnow['be'] + $bea;
                                        $beap = $doitnow['be'] * $doitnow['bep'] + $beap;
                                        $bba = $doitnow['bb'] + $bba;
                                        $bbap = $doitnow['bb'] * $doitnow['bbp'] + $bbap;
                                        $stockshares = $msa + $cia + $bea + $bba;
                                        $stockamount = $msap + $ciap + $beap + $bbap; }
                                    echo "<font color=silver face=verdana size=1>&nbsp;There is currently <b>$".number_format($stockamount)."</b> invested in to <b>".number_format($stockshares)."</b> shares";
                                    ?>
                                    <form action="propertyinvestment.php" method="post" style="padding-top: 20px;">

                                        <table width=100% align=center>
                                            <td width=50%>
                                                <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; width: 100%;max-width: 95%; margin-bottom: 11px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody>
                                                    <tr>
                                                        <td class="header" colspan="2">
                                                            [MS] Macro Studios
                                                        </td>
                                                    </tr>
                                                        <tr>
                                                            <td class="col noTop">
                                                                Property Value:</b> $<?php echo number_format($one); ?> (Cost of share)
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col">
                                                                Value <?php if ($colour1 == 2){ echo "decreased"; } else { echo "increased"; } ?> by
                                                                <font color=<?if ($colour1 == 2){ echo "red"; } else { echo "green"; } ?>>$<?php echo number_format($twenty); ?></font>
                                                                <font size=1 face=verdana color=white>(<?php if($colour1 == 2){echo "-";} else{echo "+"; } ?><?php echo $ten; ?>%)</font>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col" style="text-align: center;">
                                                                Buy share(s): <input type="text" maxlength="4" size="10" value="# of shares" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" name="crude" class="textarea">
                                                                <input name="buy" value="Buy" size="1" type="submit" class="textarea curve3px" >
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <td width=50%>
                                                <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; width: 100%;max-width: 95%; margin-bottom: 11px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody>
                                                    <tr>
                                                        <td class="header" colspan="2">
                                                            [CI] Contracted Industries
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col noTop">
                                                            Property Value:</b> $<?php echo number_format($two); ?> (Cost of share)
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col">
                                                            Value <?php if ($colour2 == 2){ echo "decreased"; } else { echo "increased"; } ?> by
                                                            <font color=<?if ($colour2 == 2){ echo "red"; } else { echo "green"; } ?>>$<?php echo number_format($nineteen); ?></font>
                                                            <font size=1 face=verdana color=white>(<?php if($colour2 == 2){echo "-";} else{echo "+"; } ?><?php echo $nine; ?>%)</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col" style="text-align: center;">
                                                            Buy share(s): <input type="text" maxlength="4" size="10" value="# of shares" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" name="petrol" class="textarea">
                                                            <input name="pbuy" value="Buy" size="1" type="submit" class="textarea curve3px" >
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                        </table>

                                        <table width=100% align=center>
                                            <td width=50%>
                                                <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; width: 100%;max-width: 95%; margin-bottom: 11px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody>
                                                    <tr>
                                                        <td class="header" colspan="2">
                                                            [BE] BioElectronics
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col noTop">
                                                            Property Value:</b> $<?php echo number_format($three); ?> (Cost of share)
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col">
                                                            Value <?php if ($colour3 == 2){ echo "decreased"; } else { echo "increased"; } ?> by
                                                            <font color=<?if ($colour3 == 2){ echo "red"; } else { echo "green"; } ?>>$<?php echo number_format($eightteen); ?></font>
                                                            <font size=1 face=verdana color=white>(<?php if($colour3 == 2){echo "-";} else{echo "+"; } ?><?php echo $eight; ?>%)</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col" style="text-align: center;">
                                                            Buy share(s): <input type="text" maxlength="4" size="10" value="# of shares" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" name="diesel" class="textarea">
                                                            <input name="dbuy" value="Buy" size="1" type="submit" class="textarea curve3px" >
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            <td width=50%>
                                                <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; width: 100%;max-width: 95%; margin-bottom: 11px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody>
                                                    <tr>
                                                        <td class="header" colspan="2">
                                                            [BB] Billionaire Broadway
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col noTop">
                                                            Property Value:</b> $<?php echo number_format($four); ?> (Cost of share)
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col">
                                                            Value <?php if ($colour4 == 2){ echo "decreased"; } else { echo "increased"; } ?> by
                                                            <font color=<?if ($colour4 == 2){ echo "red"; } else { echo "green"; } ?>>$<?php echo number_format($seventeen); ?></font>
                                                            <font size=1 face=verdana color=white>(<?php if($colour4 == 2){echo "-";} else{echo "+"; } ?><?php echo $seven; ?>%)</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col" style="text-align: center;">
                                                            Buy share(s): <input type="text" maxlength="4" size="10" value="# of shares" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" name="jet" class="textarea">
                                                            <input name="jbuy" value="Buy" size="1" type="submit" class="textarea curve3px" >
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                        </table>
                                    </form>

                                    <? if($co >= 1 || $p >= 1 || $d >= 1 || $j >= 1){ ?>
                                        <form action="propertyinvestment.php" method="post">
                                            <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; width: 100%;max-width: 97%; margin-bottom: 11px;" cellspacing="0" cellpadding="0" align="center">
                                                <tbody>
                                                <tr>
                                                    <td class="header" colspan="5">
                                                        Your Stock
                                                    </td>
                                                </tr>
                                                <tr>
                                                <td class="subHeader" style="border-left: 0; width: 40%;">Property</td>
                                                <td class="subHeader" style="width: 20%;"># of Shares</td>
                                                <td class="subHeader" style="width: 20%;">Bought At</td>
                                                <td class="subHeader" style="width: 20%;">Profit</td>
                                                <td class="subHeader" style="width: 20%;">Sell</td>
                                                </tr>
                                                <? if($co >= 1){ ?><tr>
                                                    <td class="col noTop" style="border-left: 0; width: 40%;"><font size=1 face=verdana color=lime><b>&nbsp;[MS] Macro Studios<input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=white><b>&nbsp;<?php echo number_format($co); ?><input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=white><b>&nbsp;$<?php echo number_format($cop); ?><input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=<?php if ($profitlossone < 0){ echo "red"; } else { echo "green"; } ?>><b>&nbsp;$<?php echo number_format($profitlossone); ?><input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=white><input type="submit" name="sell" value="Sell Shares" size="1" class="textarea curve3px"></td>
                                                    </tr><? } ?>
                                                <? if($p >= 1){ ?><tr>
                                                    <td class="col noTop" style="border-left: 0; width: 40%;"><font size=1 face=verdana color=orange><b>&nbsp;[CI] Contracted Industries<input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=white><b>&nbsp;<?php echo number_format($p); ?><input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=white><b>&nbsp;$<?php echo number_format($pp); ?><input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=<?php if ($profitlosstwo < 0){ echo "red"; } else { echo "green"; } ?>><b>&nbsp;$<?php echo number_format($profitlosstwo); ?><input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=white><input type="submit" name="psell" value="Sell Shares" size="1" class="textarea curve3px"></td>
                                                    </tr><? } ?>
                                                <? if($d >= 1){ ?><tr>
                                                    <td class="col noTop" style="border-left: 0; width: 40%;"><font size=1 face=verdana color=red><b>&nbsp;[BE] BioElectronics<input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=white><b>&nbsp;<?php echo number_format($d); ?><input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=white><b>&nbsp;$<?php echo number_format($dp); ?><input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=<?php if ($profitlossthree < 0){ echo "red"; } else { echo "green"; } ?>><b>&nbsp;$<?php echo number_format($profitlossthree); ?><input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=white><input type="submit" name="dsell" value="Sell Shares" size="1" class="textarea curve3px"></td>
                                                    </tr><? } ?>
                                                <? if($j >= 1){ ?><tr>
                                                    <td class="col noTop" style="border-left: 0; width: 40%;"><font size=1 face=verdana color=pink><b>&nbsp;[BB] Billionaire Broadway<input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=white><b>&nbsp;<?php echo number_format($j); ?><input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=white><b>&nbsp;$<?php echo number_format($jp); ?><input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=<?php if ($profitlossfour < 0){ echo "red"; } else { echo "green"; } ?>><b>&nbsp;$<?php echo number_format($profitlossfour); ?><input type="submit" class="textbox" style="visibility:hidden; vertical-align:middle;"></td>
                                                    <td class="col noTop" style="width: 20%;"><font size=1 face=verdana color=white><input type="submit" name="jsell" value="Sell Shares" size="1" class="textarea curve3px"></td>
                                                    </tr><? } ?>
                                                </tbody>
                                            </table>
                                        </form>
                                    <? } ?>
                                    <div class="break" style="padding-top: 15px;">
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 4px;">
                                            <?
                                            $totalcrimes = number_format($getuserinfoarray['carsmelted']);
                                            $concrimes = number_format($getuserinfoarray['totalmelted']);
                                            $crimessuccess = number_format($getuserinfoarray['crewbullets']);
                                            ?>
                                            <div style="text-align: right; padding: 5px; padding-right: 6px; padding-top: 1px;">
                                                <span style="float: left;">Property Investment Profit: <b style="color: silver;">$<?echo number_format($profitt);?></b></span>
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