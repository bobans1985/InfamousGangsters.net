<? include 'included.php'; session_start(); ?>
<?
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
        .label-point-option-td{background-color:#2f2f2f;}
        .label-point-option-td.hide{border-top:1px solid #444444;}
        .label-point-option{display:block;padding:9px;}
        .label-point-option-td.hide .label-point-option{padding:8px;}
        .auction-table{margin-bottom:30px;max-width:270px;min-width:270px;}
        .left-col{float:left;text-align:center;width:310px;padding-left:12px;}
        .main-col{overflow:hidden;text-align:center;}
        .split-col{width:50%;overflow:hidden;float:left;padding-left:12px;padding-right:12px;text-align:center;}
        .col{color:#CFCFCF!important;}
        .qt .col{padding-top:6px;padding-bottom:6px;}
        @media screen and (max-width: 1280px){
            .left-col{float:none;text-align:center;width:100%;padding-left:0;}
            .split-col{float:none;width:100%;padding-right:0;padding-left:0;padding-bottom:35px;}
            .split-col.last{padding-bottom:5px;}
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
                elseif($casinopricetag > $points){$showoutcome++; $outcome = "You dont have enough points!";}
                else{$showoutcome++; $outcome = "You bought the casino!";
                    mysql_query("DELETE FROM buycasinos WHERE id = '$casinoid'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

                    mysql_query("UPDATE users SET points = (points - $casinopricetag) WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET points = (points + $casinopricetag) WHERE username = '$casinoowner'");
                    mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = '$casino' AND location = '$casinocity'");
                    mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = '$casino' AND location = '$casinocity'");
                    $sendinfo = "\[b\]$username\[\/b\] bought your casino for \[b\]$casinopricetag\[\/b\] points!";
                    mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$casinoowner','$casinoowner','no','$userip','$sendinfo')");
                    mysql_query("INSERT INTO pointssent(username,amount,sent,ip,quicktrade)
VALUES ('$username','$casinopricetag','$casinoowner','$userip','no')");
                    mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashbought your $casinocity $casino for $casinopricetag points.' WHERE username = '$casinoowner'");
                }}

            if(isset($_POST['points'])){
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

            if(isset($_POST['money'])){
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

            if(isset($_POST['sellamount'])){
                $tomeni = mysql_num_rows(mysql_query("SELECT * FROM buypoints WHERE username = '$usernameone'"));
                if($sellamount == 0){}
                elseif($tomeni >= '30'){$showoutcome++; $outcome = "You can only put 30 offers up at one time!";}
                elseif($sell == 0){}
                elseif($sellamount > $points){$showoutcome++; $outcome = "You dont have enough points!";}
                else{
                    $newtime = time()+86400;
                    if(mysql_real_escape_string($_POST['hidesell']) == '1'){$hidden = 'yes';}else{$hidden = 'no';}
                    if($sell > 99999999999){$sell = 99999999999;}
                    if(isset($_POST['sell_points_option'])){
                        if($_POST['sell_points_option']==2){
                            $selltotal = $sell;
                            $sell=ceil($selltotal/$sellamount);
                        }else {
                            $selltotal = ceil($sell * $sellamount);
                        }
                    }

                    mysql_query("UPDATE users SET points = points - $sellamount WHERE ID = '$ida' AND points >= '$sellamount'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}

                    mysql_query("INSERT INTO buypoints(username,price,points,time,hidden,per)
VALUES ('$username','$selltotal','$sellamount','$newtime','$hidden','$sell')");}}

            if(isset($_POST['buyamount'])){
                $tomenia =mysql_num_rows(mysql_query("SELECT * FROM buymoney WHERE username = '$usernameone'"));
                $buytotal = ceil($buy * $buyamount);
                if($buyamount == 0){}
                elseif($tomenia >= '30'){$showoutcome++; $outcome = "You can only put 30 offers up at one time!";}
                elseif($buy == 0){}
                elseif($buytotal > $money){$showoutcome++; $outcome = "You dont have enough money!";}
                else{$newtime = time()+86400;
                    if(mysql_real_escape_string($_POST['hidebuy']) == '1'){$hidden = 'yes';}else{$hidden = 'no';}
                    if($buy > 99999999999){$buy = 99999999999;}
                    if(isset($_POST['sell_money_option'])){
                        if($_POST['sell_money_option']==2){
                            $buytotal = $buy;
                            $buy=ceil($buytotal/$buyamount);
                        }else {
                            $buytotal = ceil($buy * $buyamount);
                        }
                    }
                    mysql_query("UPDATE users SET money = (money - $buytotal) WHERE ID = '$ida' AND money >= '$buy'");
                    if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 5.</font>');}

                    mysql_query("INSERT INTO buymoney(username,price,points,time,hidden,per)
VALUES ('$username','$buytotal','$buyamount','$newtime','$hidden','$buy')");}}

            if(isset($_POST['buy_crew'])){

                $crewa = mysql_query("SELECT * FROM crews WHERE id = '".$_POST['crew']."'");
                $crews= mysql_fetch_array($crewa);
                $crews_row=mysql_num_rows($crewa);
                $price_crew = $crews['sell'];
                $format_price_crew= number_format($price_crew);
                $boss_crew = $crews['boss'];
                $name_crew = $crews['name'];


                if($boss_crew == $username){

                    $showoutcome++; $outcome = "You cancelled your offer!";
                    //mysql_query("UPDATE users SET points = (point + $price_crew) WHERE username = '$username'");
                    mysql_query("UPDATE crews SET sell = 0, boss='$username' WHERE id = '".$crews['id']."'");
                }
                elseif($crews_row == '0'){die('<font color=white face=verdana size=1>Offer does not exist</font>');}
                elseif($price_crew  > $points){$showoutcome++; $outcome = "You dont have enough points!";}
                else{$showoutcome++; $outcome = "You accepted the offer!";

                    mysql_query("UPDATE users SET points = points - $price_crew WHERE ID = '$ida'");
                    mysql_query("UPDATE users SET points = points + $price_crew WHERE username = '$boss_crew'");
                    mysql_query("UPDATE crews SET sell = 0, boss='$username' WHERE id = '".$crews['id']."'");
                    $sendinfo = "\[b\]$username\[\/b\] bought your \[b\]$name_crew\[\/b\] for \[b\]$format_price_crew\[\/b\] points!";
                    mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$boss_crew','$username','no','$userip','$sendinfo')");

                    mysql_query("UPDATE users SET notify = '1',notification = 'a_open$username a_closed$username a_slashbought your $name_crew for $format_price_crew points.' WHERE username = '$buyname'");
                }

            }

            $casinoslist = mysql_query("SELECT * FROM buycasinos ORDER BY price ASC");
            $pointslist = mysql_query("SELECT * FROM buypoints ORDER BY per ASC");
            $moneylist = mysql_query("SELECT * FROM buymoney ORDER BY per DESC");
            $crewlist = mysql_query("SELECT * FROM crews WHERE sell <>0 ORDER BY name DESC");
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
                                Quick Trade
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">
                                    <div class="left-col">
                                        <form method="post">
                                        <table class="regTable auction-table" cellspacing="0" cellpadding="0" align="center">
                                            <tbody><tr>
                                                <td class="header" colspan="2">
                                                    Sell Points
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input name="sellamount" autocomplete="off" class="textarea noTop" style="border-left: 0; width: 100%;" placeholder="Enter Amount..." type="text"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input name="sell" autocomplete="off" class="textarea" style="border-left: 0; width: 105%;" placeholder="Enter Price per Point..." type="text">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="label-point-option-td">
                                                    <label class="label-point-option" style="font-size:10px;text-align:center;">Per Point:&nbsp;&nbsp;<input name="sell_points_option" value="1" type="radio"></label>
                                                </td>
                                                <td class="label-point-option-td" style="border-left: 1px solid #444444;">
                                                    <label class="label-point-option" style="font-size:10px;text-align:center;">Total Price:&nbsp;&nbsp;<input name="sell_points_option" value="2" type="radio"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="label-point-option-td hide">
                                                    <label class="label-point-option" style="font-size:10px;text-align:center;">Hide Username:&nbsp;&nbsp;<input type="checkbox" name="hidesell" value="1"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input class="textarea curve3pxBottom" style="border-left: 0; width: 100%; padding-left: 6px; padding-right: 6px;"  value="Sell" type="submit">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </form>
                                    </div>
                                    <div class="main-col">
                                        <form method="post" style="display: inline;">
                                            <table class="regTable qt" id="carTable" style="margin: auto; margin-bottom: 25px; width: 95%; max-width: 550px;" cellspacing="0" cellpadding="0">
                                                <tbody><tr>
                                                    <td colspan="5" class="header">Buy Points</td>
                                                </tr>
                                                <tr>
                                                    <td class="subHeader" style="border-left: 0;"></td>
                                                    <td class="subHeader" style="width: 25%;">Username</td>
                                                    <td class="subHeader" style="width: 25%;">Points</td>
                                                    <td class="subHeader" style="width: 25%;">Total Price</td>
                                                    <td class="subHeader" style="width: 25%;">Per Point</td>
                                                </tr>
                                                <?
                                                $cont=0;
                                                while($points = mysql_fetch_array($pointslist)){
                                                    $cont++;
                                                    $price = number_format($points['price']);
                                                    $name = $points['username'];
                                                    $id = $points['id'];
                                                    $amount = number_format($points['points']);
                                                    $hidden = $points['hidden'];
                                                    $perpoint = number_format($points[per]);

                                                    if($points['hidden']== 'yes'){$name = "[Username Hidden]";$link = "$name";}
                                                    else{$name = $name;$link = "<a href=viewprofile.php?username=$name>$name</a>";}
                                                    ?>
                                                    <tr class="row">
                                                        <td class="col noTop">
                                                            <input class="js-buy-points-checkbox" name="points" value="<?echo$id;?>" type="checkbox">
                                                        </td>
                                                        <td class="col noTop">
                                                            <?echo$link;?>
                                                        </td>
                                                        <td class="col noTop"><?echo$amount;?></td>
                                                        <td class="col noTop">$<?echo$price;?></td>
                                                        <td class="col noTop">$<?echo$perpoint;?></td>
                                                    </tr>
                                                <?}
                                                if($cont==0){?>
                                                    <tr class="row">
                                                        <td class="col noTop" colspan="5">No offers at this time</td>
                                                    </tr>
                                                <?} ?>
                                                </tbody>
                                            </table>
                                            <input class="textarea curve3px" style="padding-left: 9px; padding-right: 9px;" value="Buy Points" type="submit">
                                        </form>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="break" style="padding-top: 30px;"></div>
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 30px;">
                                        <div class="split-col">
                                            <form method="post" style="display: inline;">
                                                <input name="said_price" id="said_price" value="0" type="hidden">
                                                <table class="regTable qt" id="carTable" style="margin: auto; margin-bottom: 25px; width: 95%; max-width: 550px;" cellspacing="0" cellpadding="0">
                                                    <tbody><tr>
                                                        <td colspan="5" class="header">Casinos &amp; Properties for Sale</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="subHeader" style="border-left: 0;"></td>
                                                        <td class="subHeader" style="width: 25%;">Owner</td>
                                                        <td class="subHeader" style="width: 25%;">Type</td>
                                                        <td class="subHeader" style="width: 25%;">Location</td>
                                                        <td class="subHeader" style="width: 25%;">Points</td>
                                                    </tr>
                                                    <script>

                                                        $(document).on("click", ".js-select-prop", function(){

                                                            var price = $(this).attr("data-price");
                                                            $("#said_price").val(price);
                                                        });

                                                    </script>
                                                    <?
                                                    $cont=0;
                                                    while($casinos = mysql_fetch_array($casinoslist)){
                                                        $cont++;
                                                        $price = number_format($casinos['price']);
                                                        $owner = $casinos['username'];
                                                        $id = $casinos['id'];
                                                        $city = $casinos['city'];
                                                        $type = $casinos['type'];
                                                        if($type=='Bullets'){$type='Bullet Factory';}?>
                                                        <tr class="row">
                                                            <td class="col ">
                                                                <input class="js-select-prop" name="casino" value="<?echo$id;?>" type="radio">
                                                            </td>
                                                            <td class="col ">
                                                                <a href="viewprofile.php?username=<?echo$owner;?>" style="display: inline-block; width: 100%"><?echo$owner;?></a>
                                                            </td>
                                                            <td class="col "><?echo$type;?></td>
                                                            <td class="col ">
                                                                <?
                                                                if($city == 'Las Vegas'){echo "Las Vegas, Nevada";}
                                                                elseif($city == 'Los Angeles'){echo "Los Angeles, California";}
                                                                elseif($city == 'New York'){echo "New York City, New York";}
                                                                elseif($city == 'Chicago'){echo "Chicago, Illionis";}
                                                                elseif($city == 'Miami'){echo "Miami, Florida";}
                                                                elseif($city == 'Seatle'){echo "Seatle, Washington";}
                                                                elseif($city == 'Dallas'){echo "Dallas, Texas";}
                                                                ?>
                                                            </td>
                                                            <td class="col "><?echo$price;?></td>
                                                        </tr>
                                                    <?}
                                                    if($cont==0){?>
                                                        <tr class="row">
                                                            <td class="col noTop" colspan="5">No offers at this time</td>
                                                        </tr>
                                                    <?} ?>
                                                    </tbody>
                                                </table>
                                                <input class="textarea curve3px" style="padding-left: 9px; padding-right: 9px;" value="Buy" type="submit">
                                            </form>
                                        </div>
                                        <div class="split-col last">
                                            <form method="post" style="display: inline;">
                                                <input name="said_crew_price" id="said_crew_price" value="0" type="hidden">
                                                <table class="regTable qt" id="carTable" style="margin: auto; margin-bottom: 25px; width: 95%; max-width: 550px;" cellspacing="0" cellpadding="0">
                                                    <tbody><tr>
                                                        <td colspan="5" class="header">Crews for Sale</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="subHeader" style="border-left: 0;"></td>
                                                        <td class="subHeader" style="width: 33%;">Owner</td>
                                                        <td class="subHeader" style="width: 33%;">Crew</td>
                                                        <td class="subHeader" style="width: 33%;">Points</td>
                                                    </tr>
                                                    <script>

                                                        $(document).on("click", ".js-select-crew", function(){

                                                            var price = $(this).attr("data-price");
                                                            $("#said_crew_price").val(price);
                                                        });

                                                    </script>
                                                    <?
                                                    $cont=0;
                                                    while($crew = mysql_fetch_array($crewlist)){
                                                        $cont++;
                                                        $price = number_format($crew['sell']);
                                                        $name = $crew['name'];
                                                        $id = $crew['id'];
                                                        $crewowner = $crew['boss'];
                                                        ?>
                                                        <tr class="row">
                                                            <td class="col noTop">
                                                                <input class="js-select-prop" name="crew" value="<?echo$id;?>" type="radio">
                                                            </td>
                                                            <td class="col noTop">
                                                                <a href=viewprofile.php?username=<?echo$crewowner;?>><?echo$crewowner;?></a>
                                                            </td>
                                                            <td class="col noTop"><?echo$name;?></td>
                                                            <td class="col noTop"><?echo$price;?></td>
                                                        </tr>
                                                    <?}
                                                    if($cont==0){?>
                                                        <tr class="row">
                                                            <td class="col noTop" colspan="5">No offers at this time</td>
                                                        </tr>
                                                    <?} ?>
                                                    </tbody>
                                                </table>
                                                <input class="textarea curve3px" style="padding-left: 9px; padding-right: 9px;" name="buy_crew" value="Buy" type="submit">
                                            </form>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="break" style="padding-top: 30px;"></div>
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 30px;"></div>
                                        <div class="left-col">
                                            <table class="regTable auction-table" cellspacing="0" cellpadding="0" align="center">
                                                <tbody><tr>
                                                    <td class="header" colspan="2">
                                                        Buy Points
                                                    </td>
                                                </tr>
                                                <form method="post">
                                                <tr>
                                                    <td colspan="2"><input name="buyamount" autocomplete="off" class="textarea noTop" style="border-left: 0; width: 100%;" placeholder="Enter Amount..." type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input name="buyprice" autocomplete="off" class="textarea" style="border-left: 0; width: 105%;" placeholder="Enter Price per Point..." type="text">
                                                    </td>
                                                </tr>
                                                    <tr>
                                                        <td class="label-point-option-td">
                                                            <label class="label-point-option" style="font-size:10px;text-align:center;">Per Point:&nbsp;&nbsp;<input name="sell_money_option" value="1" type="radio"></label>
                                                        </td>
                                                        <td class="label-point-option-td" style="border-left: 1px solid #444444;">
                                                            <label class="label-point-option" style="font-size:10px;text-align:center;">Total Price:&nbsp;&nbsp;<input name="sell_money_option" value="2" type="radio"></label>
                                                        </td>
                                                    </tr>
                                                <tr>
                                                    <td colspan="2" class="label-point-option-td hide">
                                                        <label class="label-point-option" style="font-size:10px;text-align:center;">Hide Username:&nbsp;&nbsp;<input name="hidebuy" value="1" type="checkbox"></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input class="textarea curve3pxBottom" style="border-left: 0; width: 100%; padding-left: 6px; padding-right: 6px;" value="Buy" type="submit">
                                                    </td>
                                                </tr>
                                                </form>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="main-col">
                                            <form method="post" style="display: inline;">
                                                <table class="regTable qt" id="carTable" style="margin: auto; margin-bottom: 25px; width: 95%; max-width: 550px;" cellspacing="0" cellpadding="0">
                                                    <tbody><tr>
                                                        <td colspan="5" class="header">Buy Money</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="subHeader" style="border-left: 0;"></td>
                                                        <td class="subHeader" style="width: 25%;">Username</td>
                                                        <td class="subHeader" style="width: 25%;">Points</td>
                                                        <td class="subHeader" style="width: 25%;">Total Price</td>
                                                        <td class="subHeader" style="width: 25%;">Per Point</td>
                                                    </tr>
                                                    <?
                                                    $cont=0;
                                                    while($moneys = mysql_fetch_array($moneylist)){
                                                        $cont++;
                                                        $price = number_format($moneys['price']);
                                                        $name = $moneys['username'];
                                                        $id = $moneys['id'];
                                                        $amount = number_format($moneys['points']);
                                                        $hiddens = $moneys['hidden'];

                                                        if($hiddens == 'yes'){$link = "#";  $name = "[Username Hidden]";}
                                                        else{$name = $name;$link = "viewprofile.php?username=$name";}
                                                        $perpoint = number_format($moneys[per]);?>

                                                        <tr class="row">
                                                            <td class="col ">
                                                                <input class="js-buy-points-checkbox" name="money" value="<?echo$id;?>" type="checkbox">
                                                            </td>
                                                            <td class="col ">
                                                                <a href="<?echo$link;?>" style="display: inline-block; width: 100%"><?echo$name;?></a>
                                                            </td>
                                                            <td class="col "><?echo$amount;?></td>
                                                            <td class="col ">$<?echo$price;?></td>
                                                            <td class="col ">$<?echo$perpoint;?></td>
                                                        </tr>
                                                    <?}
                                                    if($cont==0){?>
                                                        <tr class="row">
                                                            <td class="col noTop" colspan="5">No offers at this time</td>
                                                        </tr>
                                                    <?} ?>
                                                    </tbody>
                                                </table>
                                                <input class="textarea curve3px" style="padding-left: 9px; padding-right: 9px;" name="buy_money_offers" value="Buy Money" type="submit">
                                            </form>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="break" style="padding-top: 30px;"></div>
                                        <div class="spacer"></div>
                                        <div class="break" style="padding-top: 4px;">
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