<? include 'included.php'; session_start();


mysql_query("DELETE FROM bank WHERE amount <= '0'");


$timeraw = time();
$timeh = $timeraw + 43200;
$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$username = $usernameone;

$userarray = $statustesttwo;
$userswiss = $userarray['swiss'];
$usermoney = $userarray['money'];
$myranky = $userarray['rankid'];

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$username'");
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
        function dayMinHrCountdown() {
            var counters = $(".js-hrminsec-countdown");
            for (var i = 0; i < counters.length; i++) {
                var counter = $(counters[i]);
                var timeLeft = parseInt($(counter).attr("data-time-left"));
                if (timeLeft <= 0) {
                    var availableText = $(counter).attr("data-available-text") != undefined ? $(counter).attr("data-available-text") : "Available!";
                    $(counter).html(availableText);
                    continue;
                }
                var hrs = Math.floor(timeLeft / 3600);
                var mins = Math.floor((Math.floor(timeLeft % 3600)) / 60);
                var secs = Math.floor((Math.floor(timeLeft % 60)) % 60);
                if (secs <= 9) secs = '0' + secs;
                if (mins <= 9) mins = '0' + mins;
                if (hrs <= 9) hrs = '0' + hrs;
                $(counter).html(hrs + ':' + mins + ':' + secs);
                timeLeft--;
                $(counter).attr("data-time-left", timeLeft);
                if (timeLeft <= 0) $(".js-show-on-complete").slideDown(250);
            }
            window.setTimeout(dayMinHrCountdown, 1000);
        }
        window.onload = dayMinHrCountdown;
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

            if($userswiss == '0'){$swissdisbaledone = ' ';}
            elseif($userswiss != '0'){$swissdisbaledtwo = ' ';}

            $saturated = "/[^0-9]/i";
            $saturatedname = "/[^a-z0-9]/i";
            $swissdepositraw = mysql_real_escape_string($_POST['swissdepositamount']);
            $swisswithdrawraw = mysql_real_escape_string($_POST['swisswithdrawamount']);
            $bankdepositraw = mysql_real_escape_string($_POST['bankdepositamount']);
            $bankwithdrawraw = mysql_real_escape_string($_POST['bankwithdrawamount']);
            $sendmoneyraw = mysql_real_escape_string($_POST['sendamount']);
            $sendtoraw = mysql_real_escape_string($_POST['sendto']);
            $vera = mysql_real_escape_string($_POST['ver']);
            $withdrawvalue=mysql_real_escape_string($_POST['bankdepositwithdraw']);
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $verpost = preg_replace($saturate,"",$vera);
            $swissdeposit = preg_replace($saturated,"",$swissdepositraw);
            $swisswithdraw = preg_replace($saturated,"",$swisswithdrawraw);
            $bankdeposit = preg_replace($saturated,"",$bankdepositraw);
            $bankwithdraw = preg_replace($saturated,"",$bankwithdrawraw);
            $sendmoney = preg_replace($saturated,"",$sendmoneyraw);
            $sendto = preg_replace($saturatedname,"",$sendtoraw);
            $value=preg_replace($saturated,"",$withdrawvalue);
            $swissdeposittwo = number_format($swissdeposit);
            $swisswithdrawtwo = number_format($swisswithdraw);
            $bankdeposittwo = number_format($bankdeposit);
            $bankwithdrawtwo = number_format($bankwithdraw);
            $sendmoneytwo= number_format($sendmoney);

            if($sendto){

                $sendtotestsql = mysql_query("SELECT * FROM users WHERE username = '$sendto'");
                $sendtotestrows = mysql_num_rows($sendtotestsql);
                $sendtotestarray = mysql_fetch_array($sendtotestsql);
                $sendtostatus = $sendtotestarray['status'];
                $sendtoname = $sendtotestarray['username'];
                $sendtoid = $sendtotestarray['ID'];
            }

            $normalbanktestsql = mysql_query("SELECT * FROM bank WHERE username = '$username'");
            $normalbanktestrows = mysql_num_rows($normalbanktestsql);
            $normalbanktestarray = mysql_fetch_array($normalbanktestsql);

            $normalbankbalance = $normalbanktestarray['amount'];
            $normalbanktime = $normalbanktestarray['time'];
            $normalbankinterest=$normalbanktestarray['interest'];
            $normalbanktimetotall = time() - $normalbanktime;
            if( $normalbankinterest==0.01){
                $normalbankinterestpossible = $normalbanktimetotall/21600;
                $difference = 21600-$normalbanktimetotall;
            }elseif( $normalbankinterest==0.0225){
                $normalbankinterestpossible = $normalbanktimetotall/43200;
                $difference = 43200-$normalbanktimetotall;
            }elseif( $normalbankinterest==0.05){
                $normalbankinterestpossible = $normalbanktimetotall/86400;
                $difference = 86400-$normalbanktimetotall;
            }
            $total=$difference;
            $normalbankbalancenew = round($normalbankbalance*(1+$normalbankinterest),2);

            if($difference<=0){
                mysql_query("UPDATE users SET money = money + '$normalbankbalancenew' WHERE ID = '$ida'");
                mysql_query("DELETE FROM bank WHERE username = '$username'");
            }

            if (isset($_POST['swissdeposit'])) {
                $entertainer = $ent;
                if(!$swissdeposit){$showoutcome++; $outcome = "You did not enter an amount to deposit!";}
                elseif($entertainer != '0'){$showoutcome++; $outcome = "Entertainers can not use this feature!";}
                elseif($swissdeposit > $usermoney){$showoutcome++; $outcome = "You don't have enough money!";}
                else{
                    mysql_query("UPDATE users SET money = (money - $swissdeposit) WHERE ID = '$ida' AND money >= '$swissdeposit'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
                    mysql_query("UPDATE users SET swiss = (swiss + $swissdeposit) WHERE ID = '$ida'");
                    $showoutcome++; $outcome = "You deposited <font style=\"color: #FFC753;\">$<b>$swissdeposittwo</b></font> into your Swiss Bank account!";}
            }

            if (isset($_POST['swisswithdraw'])) {
                if(!$swisswithdraw){$showoutcome++; $outcome = "You did not enter an amount to withdraw!";}
                elseif($swisswithdraw > $userswiss){$showoutcome++; $outcome = "You don't have that much money in your swiss bank!";}
                else{
                    mysql_query("UPDATE users SET swiss = (swiss - $swisswithdraw) WHERE ID = '$ida' AND swiss >= '$swisswithdraw'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

                    mysql_query("UPDATE users SET money = (money + $swisswithdraw) WHERE ID = '$ida'");
                    $showoutcome++; $outcome = "You withdrew <font style=\"color: #FFC753;\">$<b>$swisswithdrawtwo</font></b> from your Swiss Bank account!";}
            }
            $swisstotal = mysql_query("SELECT * FROM users WHERE id = '$ida'");
            $swisstotala=mysql_fetch_array($swisstotal);
            $swisstotalb=$swisstotala['swiss'];

            if (isset($_POST['bankdeposit'])) {
                $entertainer = $ent;
                if(!$bankdeposit){$showoutcome++; $outcome = "You did not enter an amount to deposit!";}
                elseif($entertainer != '0'){$showoutcome++; $outcome = "As entertainer you cannot use this feature!";}
                elseif($normalbanktestrows != '0'){$showoutcome++; $outcome = "You can only insert money into your bank when it is empty!";}
                elseif($bankdeposit > $usermoney){$showoutcome++; $outcome = "You don't have enough money!";}
                else{

                    mysql_query("UPDATE users SET money = (money - $bankdeposit) WHERE ID = '$ida' AND money >= '$bankdeposit'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}

                    if($_POST['bankdeposittype']==1){
                        $interest=0.01;
                    }else if($_POST['bankdeposittype']==2){
                        $interest=0.0225;
                    }else if($_POST['bankdeposittype']==3){
                        $interest=0.05;
                    }

                    $bankinsertsql = "INSERT INTO bank(username, amount, time, rankid, interest)
VALUES ('$usernameone', '$bankdeposit', '$timeraw', '$myranky', '$interest')";
                    $bankinsert = mysql_query($bankinsertsql);
                    $showoutcome++; $outcome = "You deposited <font style=\"color: #FFC753;\">$<b>$bankdeposittwo</b></font> into your Bank Account!";}
            }

            if (isset($_POST['bankwithdraw'])) {
                if($value>$normalbankbalance){$showoutcome++; $outcome = "Not enough in your Bank Account!";}
                elseif($value==$normalbankbalance){
                    mysql_query("UPDATE users SET money = money + '$value' WHERE ID = '$ida'");
                    mysql_query("DELETE FROM bank WHERE username = '$username'");
                    $showoutcome++; $outcome = "You withdrew <font style=\"color: #FFC753;\">$<b>".number_format($value)."</b></font> from your Bank Account!";
                }elseif($value!='' && $value<=$normalbankbalance){
                    mysql_query("UPDATE users SET money = money + '$value' WHERE ID = '$ida'");
                    mysql_query("UPDATE bank SET amount = amount - '$value' WHERE username = '$username'");
                    $showoutcome++; $outcome = "You withdrew <font style=\"color: #FFC753;\">$<b>".number_format($value)."</b></font> from your Bank Account!";
                }
            }

            if (isset($_POST['sendamount'])) {
                if(!$sendmoney){$showoutcome++; $outcome = "You did not enter an amount to send";}
                elseif(!$sendto){$showoutcome++; $outcome = "You did not enter an player to send to";}
                elseif($sendtotestrows == '0'){$showoutcome++; $outcome = "No such user";}
                elseif($sendmoney > $usermoney){$showoutcome++; $outcome = "You don't have enough money";}
                elseif($username == $sendtoname){$showoutcome++; $outcome = "You cannot send money to yourself";}
                else{
                    $penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username ='$sendtoname'"));
                    if($penpoint > '0'){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
                        $reason = "$username sent $$sendmoneytwo to $sendto";
                        mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

                    mysql_query("UPDATE users SET money = money - '$sendmoney' WHERE ID = '$ida' AND money >= '$sendmoney'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 5.</font>');}

                    mysql_query("UPDATE users SET money = money + '$sendmoney' WHERE ID = '$sendtoid'");

                    mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $$sendmoneytwo.', notify = (notify + 1) WHERE ID = '$sendtoid'");

                    $insertsentsql = "INSERT INTO moneysent(username,amount,sent,ip)
VALUES ('$username','$sendmoney','$sendtoname','$playerip')";
                    $insertsentresult = mysql_query($insertsentsql);
                    $showoutcome++; $outcome = "You sent <font style=\"color: #FFC753;\">$<b>$sendmoneytwo</b></font> to <a href=viewprofile.php?username=$sendto><b>$sendto</b></a>!";
                }
            }

            $normalbanktestsql = mysql_query("SELECT * FROM bank WHERE username = '$username'");
            $normalbanktestrows = mysql_num_rows($normalbanktestsql);
            $normalbanktestarray = mysql_fetch_array($normalbanktestsql);
            $normalbankbalance = $normalbanktestarray['amount'];
            $normalbanktime = $normalbanktestarray['time'];
            $normalbankinterest=$normalbanktestarray['interest'];
            $normalbanktimetotall = time() - $normalbanktime;
            if( $normalbankinterest==0.01){
                $normalbankinterestpossible = $normalbanktimetotall/21600;
                $difference = 21600-$normalbanktimetotall;
            }elseif( $normalbankinterest==0.0225){
                $normalbankinterestpossible = $normalbanktimetotall/43200;
                $difference = 43200-$normalbanktimetotall;
            }elseif( $normalbankinterest==0.05){
                $normalbankinterestpossible = $normalbanktimetotall/86400;
                $difference = 86400-$normalbanktimetotall;
            }
            $total=$difference;
            $normalbankbalancenew = round($normalbankbalance*(1+$normalbankinterest),2);

            if($normalbanktestrows == '0'){}
            elseif($normalbanktestrows != '0'){}

            $lasttensql =mysql_query("SELECT * FROM moneysent WHERE username = '$username' ORDER BY id DESC LIMIT 0,25");
            $cntsent = mysql_num_rows($lasttensql);
            $lasttenrsql =mysql_query("SELECT * FROM moneysent WHERE sent = '$username' ORDER BY id DESC LIMIT 0,25");
            $cntrec = mysql_num_rows($lasttenrsql);
            ?>
            <? if ($showoutcome >= 1) { ?>
                <span class="updated"><? echo $outcome; ?></span>
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
                                Bank Account
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <script>

                                        $(document).on("keyup", "#bank_deposit_amount", calculateProfit);
                                        $(document).on("change", "#bank_deposit_type", calculateProfit);

                                        function calculateProfit(){

                                            var value = parseToInt($("#bank_deposit_amount").val());

                                            if(value > 10000000000) value = 10000000000;
                                            var type = parseInt($("#bank_deposit_type").val());

                                            var multiply = 1;

                                            switch(type){
                                                case 1:
                                                    multiply = 0.01;
                                                    break;
                                                case 2:
                                                    multiply = 0.0225;
                                                    break;
                                                case 3:
                                                    multiply = 0.05;
                                                    break;
                                            }


                                            if(value <= 0){
                                                $("#bank_profit_row").css("visibility", "hidden");
                                            }
                                            else{
                                                $("#bank_profit_row").css("visibility", "visible");

                                                var profitRaw = Math.floor(value * multiply);
                                                if(profitRaw > 2000000000) profitRaw = 2000000000;
                                                var profit = numberWithCommas(profitRaw);
                                                $("#potential_profit").html("$" + profit);

                                            }
                                        }


                                        function numberWithCommas(x) {
                                            var parts = x.toString().split(".");
                                            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            return parts.join(".");
                                        }

                                        function parseToInt(x){
                                            return x.replace(/\D/g,'');
                                        }
                                    </script>
                                    <table width="100%">
                                        <tbody>
                                        <tr>
                                            <td style="width: 50%; padding: 30px; padding-right: 0; padding-top: 38px;" valign="top" align="center">
                                                <div style="visibility: hidden; height: 30px;" id="bank_profit_row">
                                                    Profit: <b id="potential_profit" style="color: #FFC753;"></b>
                                                </div>

                                                <table class="regTable" style="margin-left: 10px; margin-top: 6px; margin-right: 0; min-width: 230px; margin-bottom: 35px; width: 85%; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                                    <form method=post>
                                                        <tbody>
                                                        <tr>
                                                            <td class="header" colspan="2">
                                                                Interest Bank Account
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col noTop" style="width: 50%; padding-right: 10px;">Balance: </td>
                                                            <td class="col noTop" style="padding-right: 10px;"><span style="<?if($normalbankbalance!=0)echo"color: #FFC753;font-weight:bold;";else echo"color: silver;";?>">$<? echo number_format($normalbankbalance); ?></span></td>

                                                        </tr>
                                                        <? if($normalbanktestrows > '0'){ ?>
                                                            <tr>
                                                                <td class="col">Interest:</td>
                                                                <td class="col"><span style="<?if($normalbankbalance!=0)echo"color: #FFC753;font-weight:bold;";else echo"color: silver;";?>">$<?echo number_format($normalbankbalancenew);?></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col">Time Left:</td>
                                                                <td class="col">
                                                                    <?echo "<span class=\"js-hrminsec-countdown\" data-time-left=\"".$total."\"></span>"; ?>
                                                                </td>
                                                            </tr>

                                                        <? } ?>
                                                        <?if($normalbanktestrows > '0'){?>
                                                        <form method="post">
                                                            <tr>
                                                                <td><input name="bankdepositwithdraw" class="textarea" style="border-left: 0; width: 100%;" placeholder="Enter Amount..." type="text"></td>
                                                                <td><input type="submit" value="Withdraw" class="textarea" name="bankwithdraw" style="width: 100%; " <? echo $bankdisbaledone; ?>></td>
                                                            </tr>
                                                        </form>
                                                        <?}else{?>
                                                            <tr>
                                                                <td colspan="2" class="textarea" style="border-left: 0; padding-left: 0; padding-right: 0; padding-top: 5px; padding-bottom: 3px; cursor: pointer;">
                                                                    <select name="bankdeposittype" id="bank_deposit_type" class="textarea" style="padding-left: 0; border-radius: 0; border: none; box-shadow: none; border-left: 0; width: 100%;">
                                                                        <option value="1">6 hours (1% interest)</option>
                                                                        <option value="2" selected="selected">12 hours (2.25% interest)</option>
                                                                        <option value="3">24 hours (5% interest)</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input id="bank_deposit_amount" name="bankdepositamount" class="textarea inline_form" style="border-left: 0; width: 100%;" placeholder="Enter Amount..." type="text"></td>
                                                                <td><input type ="submit" class="textarea curve2pxBottomRight" style="width: 100%; padding-left: 6px; padding-right: 6px;" name="bankdeposit"  value="Deposit"></td>
                                                            </tr>
                                                            <tr style="opacity: 0.3;">
                                                                <td><input disabled="" id="username" name="bank_withdraw_amount" class="textarea curve2pxBottomLeft" style="border-left: 0; width: 100%;" placeholder="Enter Amount..." type="text"></td>
                                                                <td><input disabled="" name="bank_withdraw_btn" class="textarea curve2pxBottomRight" style="width: 100%; padding-left: 6px; padding-right: 6px;" value="Withdraw" type="submit"></td>
                                                            </tr>
                                                        <?}?>
                                                    </form>
                                                </table>

                                                <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody>
                                                    <tr>
                                                        <td class="header" colspan="2">
                                                            Swiss Bank Account
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col noTop" style="width: 50%; padding-right: 10px;">Balance: </td>
                                                        <?
                                                        if($swisstotalb==0){?>
                                                        <td class="col noTop" style="color: #FFC753; padding-right: 10px;"><span style="color: silver;">$0</span></td>
                                                        <?}else{?>
                                                            <td class="col noTop" style="color: #FFC753; padding-right: 10px;"><span style="color: #FFC753;">$<b><?echo number_format($swisstotalb);?></b></span></td>
                                                        <?}?>
                                                    </tr>
                                                    <form method=post>
                                                    <tr>
                                                        <td><input  name="swissdepositamount" class="textarea" style="border-left: 0; width: 100%;" placeholder="Enter Amount..." type="text"></td>
                                                        <td><input name="swissdeposit" <? echo $swissdisbaledtwo; ?> class="textarea" style="width: 100%; padding-left: 6px; padding-right: 6px;" value="Deposit" type="submit"></td>
                                                    </tr>
                                                    </form>
                                                    <form method=post>
                                                        <?
                                                        if($swisstotalb==0){?>
                                                            <tr style="opacity: 0.3;">
                                                                <td><input name="swisswithdrawamount" disabled="disabled" class="textarea curve2pxBottomLeft" style="border-left: 0; width: 100%;" placeholder="Enter Amount..." type="text"></td>
                                                                <td><input name="swisswithdraw" disabled="disabled" class="textarea curve2pxBottomRight" style="width: 100%; padding-left: 6px; padding-right: 6px;" value="Withdraw" type="submit" <? echo $swissdisbaledone; ?>></td>
                                                            </tr>
                                                        <?}else{?>
                                                            <tr>
                                                                <td><input name="swisswithdrawamount" class="textarea curve2pxBottomLeft" style="border-left: 0; width: 100%;" placeholder="Enter Amount..." type="text"></td>
                                                                <td><input name="swisswithdraw" class="textarea curve2pxBottomRight" style="width: 100%; padding-left: 6px; padding-right: 6px;" value="Withdraw" type="submit" <? echo $swissdisbaledone; ?>></td>
                                                            </tr>
                                                        <?}?>
                                                    </form>
                                                    </tbody>
                                                </table>
                                            </td>

                                            <td style="padding: 30px; padding-top: 0;" align="center">
                                                <table class="regTable" style="margin-left: 10px; margin-right: 0; min-width: 230px; margin-bottom: 11px; width: 85%; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody>
                                                    <tr>
                                                        <td class="header" colspan="2">
                                                            Transfer Money
                                                        </td>
                                                    </tr>
                                                    <form method=post>
                                                    <tr>
                                                        <td><input name="sendto" class="textarea noTop" style="border-left: 0; width: 100%;" onclick="this.value=''" placeholder="Enter Username..." type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="sendamount" class="textarea" style="border-left: 0; width: 100%;" placeholder="Enter Amount..." type="text" onclick="this.value='$'"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input name="sendsubmit" class="textarea curve3pxBottom" style="border-left: 0; width: 100%; padding-left: 6px; padding-right: 6px;" value="Send" type="submit">
                                                        </td>
                                                    </tr>
                                                    </form>
                                                    </tbody>
                                                </table>

                                                <table class="regTable" style="margin-left: 10px; margin-right: 0; margin-bottom: 11px; min-width: 350px; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody><tr>
                                                        <td class="header" colspan="2">
                                                            Last 25 Sent
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="preventscroll" style="max-height: 200px; overflow-y: auto;">
                                                                <table class="regTable inner" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                    <?php
                                                                    if($cntsent < 1){ echo "<tr class=\"row\">
                                                                        <td class=\"col noTop\" style=\"color: #dddddd; padding-right: 10px; \">No records yet.</td>
                                                                    </tr>"; }else{
                                                                        while($lasttenarray = mysql_fetch_array($lasttensql)){
                                                                            $senttime = $lasttenarray['time'];
                                                                            $lasttento = $lasttenarray['sent'];
                                                                            $lasttenamount = number_format($lasttenarray['amount']);
                                                                            $now=new DateTime();
                                                                            $time=DateTime::createFromFormat('Y-m-d H:i:s',$senttime);
                                                                            $diff=$now->diff($time);
                                                                            echo "<tr class=\"row\">
                                                                                    <td class=\"col noTop\" style=\"padding-right: 10px; color: #cccccc;\">Sent <span style=\"color: #eeeeee;\">$$lasttenamount</span> to <a href=\"viewprofile.php?username=$lasttento\">$lasttento</a></td>
                                                                                    <td class=\"col noTop\" style=\"padding-right: 10px; font-size: 9px; width: 15%; color: #777777; \"><span class=\"masterTooltip\" title=\" ".$time->format('Y-m-d H:i:s')."\">";

                                                                            if($diff->format('%a')>10){
                                                                                echo $time->format('Y-m-d');
                                                                            }
                                                                            elseif($diff->format('%h')<=0) {
                                                                                echo $diff->format('%i minutes ago');
                                                                            }elseif($diff->format('%a')<=0) {
                                                                                echo $diff->format('%h hours ago');
                                                                            }else{
                                                                                echo $diff->format('%a days ago');
                                                                            }
                                                                                    echo"</span>
                                                                                    </td>
                                                                                </tr>";
                                                                        }} ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table class="regTable" style="margin-left: 10px; margin-right: 0;  min-width: 350px; max-width: 350px;" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody><tr>
                                                        <td class="header" colspan="2">
                                                            Last 25 Received
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="preventscroll" style="max-height: 200px; overflow-y: auto;">
                                                                <table class="regTable inner" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                    <?php
                                                                    if($cntrec == 0){ echo "<tr class=\"row\">
                                                                        <td class=\"col noTop\" style=\"color: #dddddd; padding-right: 10px; \">No records yet.</td>
                                                                    </tr>"; }else{
                                                                        while($lasttenrarray = mysql_fetch_array($lasttenrsql)){
                                                                            $rectime = $lasttenrarray['time'];
                                                                            $lasttenrto = $lasttenrarray['username'];
                                                                            $lasttenramount = number_format($lasttenrarray['amount']);
                                                                            $now=new DateTime();
                                                                            $time=DateTime::createFromFormat('Y-m-d H:i:s',$rectime);
                                                                            $diff=$now->diff($time);
                                                                            echo "<tr class=\"row\">
                                                                                    <td class=\"col noTop\" style=\"padding-right: 10px; color: #cccccc;\">Received <span style=\"color: #eeeeee;\">$$lasttenramount</span> from <a href=\"viewprofile.php?username=$lasttenrto\">$lasttenrto</a></td>
                                                                                    <td class=\"col noTop\" style=\"padding-right: 10px; font-size: 9px; width: 15%; color: #777777; \"><span class=\"masterTooltip\" title=\" ".$time->format('Y-m-d H:i:s')."\">";

                                                                            if($diff->format('%a')>10){
                                                                                echo $time->format('Y-m-d');
                                                                            }
                                                                            elseif($diff->format('%h')<=0) {
                                                                                echo $diff->format('%i minutes ago');
                                                                            }elseif($diff->format('%a')<=0) {
                                                                                echo $diff->format('%h hours ago');
                                                                            }else{
                                                                                echo $diff->format('%a days ago');
                                                                            }
                                                                            echo"</span>
                                                                                    </td>
                                                                                </tr>";
                                                                            }
                                                                    } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                            </td>
                                            <td valign="top">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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