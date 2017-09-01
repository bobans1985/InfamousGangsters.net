<? include 'included.php'; session_start();

$lasvegasdicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Las Vegas'"));
$lasvegasdice = $lasvegasdicea['owner'];
$lasvegasdicee = $lasvegasdicea['owner'];
$lasvegasdicemaxbet = number_format($lasvegasdicea['maxbet']);
$howmanyuserslasvegas = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'Las Vegas'"));

$losangelesdicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Los Angeles'"));
$losangelesdice = $losangelesdicea['owner'];
$losangelesdicee = $losangelesdicea['owner'];
$losangelesdicemaxbet = number_format($losangelesdicea['maxbet']);
$howmanyuserslosangeles = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'Los Angeles'"));

$newyorkdicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'New York'"));
$newyorkdice = $newyorkdicea['owner'];
$newyorkdicee = $newyorkdicea['owner'];
$newyorkdicemaxbet = number_format($newyorkdicea['maxbet']);
$howmanyusersnewyork = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'New York'"));

$seatledicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Seatle'"));
$seatledice = $seatledicea['owner'];
$seatledicee = $seatledicea['owner'];
$seatledicemaxbet = number_format($seatledicea['maxbet']);
$howmanyusersseatle = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'Seatle'"));

$dallasdicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Dallas'"));
$dallasdice = $dallasdicea['owner'];
$dallasdicee = $dallasdicea['owner'];
$dallasdicemaxbet = number_format($newyorkdicea['maxbet']);
$howmanyusersdallas = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'Dallas'"));

$chicagodicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Chicago'"));
$chicagodice = $chicagodicea['owner'];
$chicagodicee = $chicagodicea['owner'];
$chicagodicemaxbet = number_format($chicagodicea['maxbet']);
$howmanyuserschicago = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'Chicago'"));

$miamidicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Miami'"));
$miamidice = $miamidicea['owner'];
$miamidicee = $miamidicea['owner'];
$miamidicemaxbet = number_format($miamidicea['maxbet']);
$howmanyusersmiami = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'Miami'"));

$lasvegasbja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Las Vegas'"));
$lasvegasblackjack = $lasvegasbja['owner'];
$lasvegasblackjackk = $lasvegasbja['owner'];
$lasvegasbjmaxbet = number_format($lasvegasbja['maxbet']);

$losangelesbja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Los Angeles'"));
$losangelesblackjack = $losangelesbja['owner'];
$losangelesblackjackk = $losangelesbja['owner'];
$losangelesbjmaxbet = number_format($losangelesbja['maxbet']);

$newyorkbja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'New York'"));
$newyorkblackjack = $newyorkbja['owner'];
$newyorkblackjackk = $newyorkbja['owner'];
$newyorkbjmaxbet = number_format($newyorkbja['maxbet']);

$seatlebja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Seatle'"));
$seatleblackjack = $seatlebja['owner'];
$seatleblackjackk = $seatlebja['owner'];
$seatlebjmaxbet = number_format($seatlebja['maxbet']);

$dallasbja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Dallas'"));
$dallasblackjack = $dallasbja['owner'];
$dallasblackjackk = $dallasbja['owner'];
$dallasbjmaxbet = number_format($dallasbja['maxbet']);

$chicagobja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Chicago'"));
$chicagoblackjack = $chicagobja['owner'];
$chicagoblackjackk = $chicagobja['owner'];
$chicagobjmaxbet = number_format($chicagobja['maxbet']);

$miamibja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Miami'"));
$miamiblackjack = $miamibja['owner'];
$miamiblackjackk = $miamibja['owner'];
$miamibjmaxbet = number_format($miamibja['maxbet']);

$lasvegasrta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Las Vegas'"));
$lasvegasracetrack = $lasvegasrta['owner'];
$lasvegasracetrackk = $lasvegasrta['owner'];
$lasvegasrtmaxbet = number_format($lasvegasrta['maxbet']);

$losangelesrta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Los Angeles'"));
$losangelesracetrack = $losangelesrta['owner'];
$losangelesracetrackk = $losangelesrta['owner'];
$losangelesrtmaxbet = number_format($losangelesrta['maxbet']);

$newyorkrta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'New York'"));
$newyorkracetrack = $newyorkrta['owner'];
$newyorkracetrackk = $newyorkrta['owner'];
$newyorkrtmaxbet = number_format($newyorkrta['maxbet']);

$seatlerta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Seatle'"));
$seatleracetrack = $seatlerta['owner'];
$seatleracetrackk = $seatlerta['owner'];
$seatlertmaxbet = number_format($seatlerta['maxbet']);

$dallasrta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Dallas'"));
$dallasracetrack = $dallasrta['owner'];
$dallasracetrackk = $dallasrta['owner'];
$dallasrtmaxbet = number_format($dallasrta['maxbet']);

$miamita = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Miami'"));
$miamiracetrack = $miamita['owner'];
$miamiracetrackk = $miamita['owner'];
$miamirtmaxbet = number_format($miamita['maxbet']);

$chicagota = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Chicago'"));
$chicagoracetrack = $chicagota['owner'];
$chicagoracetrackk = $chicagota['owner'];
$chicagortmaxbet = number_format($chicagota['maxbet']);

$lasvegasrlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Las Vegas'"));
$lasvegasroulette = $lasvegasrlta['owner'];
$lasvegasroulettee = $lasvegasrlta['owner'];
$lasvegasrltmaxbet = number_format($lasvegasrlta['maxbet']);

$losangelesrlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Los Angeles'"));
$losangelesroulette = $losangelesrlta['owner'];
$losangelesroulettee = $losangelesrlta['owner'];
$losangelesrltmaxbet = number_format($losangelesrlta['maxbet']);

$newyorkrlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'New York'"));
$newyorkroulette = $newyorkrlta['owner'];
$newyorkroulettee = $newyorkrlta['owner'];
$newyorkrltmaxbet = number_format($newyorkrlta['maxbet']);

$seatlerlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Seatle'"));
$seatleroulette = $seatlerlta['owner'];
$seatleroulettee = $seatlerlta['owner'];
$seatlerltmaxbet = number_format($seatlerlta['maxbet']);

$dallasrlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Dallas'"));
$dallasroulette = $dallasrlta['owner'];
$dallasroulettee = $dallasrlta['owner'];
$dallasrltmaxbet = number_format($dallasrlta['maxbet']);

$miamirlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Miami'"));
$miamiroulette = $miamirlta['owner'];
$miamiroulettee = $miamirlta['owner'];
$miamirltmaxbet = number_format($miamirlta['maxbet']);

$chicagorlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Chicago'"));
$chicagoroulette = $chicagorlta['owner'];
$chicagoroulettee = $chicagorlta['owner'];
$chicagorltmaxbet = number_format($chicagorlta['maxbet']);

$lasvegasbfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bulletssell FROM casinos WHERE casino = 'Bullets' AND location = 'Las Vegas'"));
$lasvegasbf = $lasvegasbfa['owner'];
$lasvegasbff = $lasvegasbfa['owner'];
$lasvegasbfftmaxbet = number_format($lasvegasbfa['maxbet']);
$lasvegasbfftbullets = number_format($lasvegasbfa['bulletssell']);

$losangelesbfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bulletssell FROM casinos WHERE casino = 'Bullets' AND location = 'Los Angeles'"));
$losangelesbf = $losangelesbfa['owner'];
$losangelesbff = $losangelesbfa['owner'];
$losangelesbfftmaxbet = number_format($losangelesbfa['maxbet']);
$losangelesbfftbullets = number_format($losangelesbfa['bulletssell']);

$miamibfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bulletssell FROM casinos WHERE casino = 'Bullets' AND location = 'Miami'"));
$miamibf = $miamibfa['owner'];
$miamibff = $miamibfa['owner'];
$miamibfftmaxbet = number_format($miamibfa['maxbet']);
$miamibfftbullets = number_format($miamibfa['bulletssell']);

$chicagobfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bulletssell FROM casinos WHERE casino = 'Bullets' AND location = 'Chicago'"));
$chicagobf = $chicagobfa['owner'];
$chicagobff = $chicagobfa['owner'];
$chicagobfftmaxbet = number_format($chicagobfa['maxbet']);
$chicagobfftbullets = number_format($chicagobfa['bulletssell']);

$newyorkbfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bulletssell FROM casinos WHERE casino = 'Bullets' AND location = 'New York'"));
$newyorkbf = $newyorkbfa['owner'];
$newyorkbff = $newyorkbfa['owner'];
$newyorkbfftmaxbet = number_format($newyorkbfa['maxbet']);
$newyorkbfftbullets = number_format($newyorkbfa['bulletssell']);

$seatlebfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bulletssell FROM casinos WHERE casino = 'Bullets' AND location = 'Seatle'"));
$seatlebf = $seatlebfa['owner'];
$seatlebff = $seatlebfa['owner'];
$seatlebfftmaxbet = number_format($seatlebfa['maxbet']);
$seatlebfftbullets = number_format($seatlebfa['bulletssell']);

$dallasbfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bulletssell FROM casinos WHERE casino = 'Bullets' AND location = 'Dallas'"));
$dallasbf = $dallasbfa['owner'];
$dallasbff = $dallasbfa['owner'];
$dallasbfftmaxbet = number_format($dallasbfa['maxbet']);
$dallasbfftbullets = number_format($dallasbfa['bulletssell']);

$lasvegashospa = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Las Vegas' AND casino = 'Hospital'"));
$lasvegashosp = $lasvegashospa['owner'];
$lasvegashospp = $lasvegashospa['owner'];

$losangeleshospa = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Los Angeles' AND casino = 'Hospital'"));
$losangeleshosp = $losangeleshospa['owner'];
$losangeleshospp = $losangeleshospa['owner'];

$newyorkhospa = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'New York' AND casino = 'Hospital'"));
$newyorkhosp = $newyorkhospa['owner'];
$newyorkhospp = $newyorkhospa['owner'];

$seatlehospa = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Seatle' AND casino = 'Hospital'"));
$seatlehosp = $seatlehospa['owner'];
$seatlehospp = $seatlehospa['owner'];

$dallashospa = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Dallas' AND casino = 'Hospital'"));
$dallashosp = $dallashospa['owner'];
$dallashospp = $dallashospa['owner'];

$miamihospa = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Miami' AND casino = 'Hospital'"));
$miamihosp = $miamihospa['owner'];
$miamihospp = $miamihospa['owner'];

$chicagohospa = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Chicago' AND casino = 'Hospital'"));
$chicagohosp = $newyorkhospa['owner'];
$chicagohospp = $newyorkhospa['owner'];

$lasvegasarmourya = mysql_fetch_array(mysql_query("SELECT owner FROM casinos WHERE location = 'Las Vegas' AND casino = 'Armoury'"));
$lasvegasarmoury = $lasvegasarmourya['owner'];
$lasvegasarmouryy = $lasvegasarmourya['owner'];

$losangelesarmourya = mysql_fetch_array(mysql_query("SELECT owner FROM casinos WHERE location = 'Los Angeles' AND casino = 'Armoury'"));
$losangelesarmoury = $losangelesarmourya['owner'];
$losangelesarmouryy = $losangelesarmourya['owner'];

$newyorkarmourya = mysql_fetch_array(mysql_query("SELECT owner FROM casinos WHERE location = 'New York' AND casino = 'Armoury'"));
$newyorkarmoury = $newyorkarmourya['owner'];
$newyorkarmouryy = $newyorkarmourya['owner'];

$seatlearmourya = mysql_fetch_array(mysql_query("SELECT owner FROM casinos WHERE location = 'Seatle' AND casino = 'Armoury'"));
$seatlearmoury = $seatlearmourya['owner'];
$seatlearmouryy = $seatlearmourya['owner'];

$dallasarmourya = mysql_fetch_array(mysql_query("SELECT owner FROM casinos WHERE location = 'Dallas' AND casino = 'Armoury'"));
$dallasarmoury = $dallasarmourya['owner'];
$dallasarmouryy = $dallasarmourya['owner'];

$miamiarmourya = mysql_fetch_array(mysql_query("SELECT owner FROM casinos WHERE location = 'Miami' AND casino = 'Armoury'"));
$miamiarmoury = $miamiarmourya['owner'];
$miamiarmouryy = $miamiarmourya['owner'];

$chicagoarmourya = mysql_fetch_array(mysql_query("SELECT owner FROM casinos WHERE location = 'Chicago' AND casino = 'Armoury'"));
$chicagoarmoury = $chicagoarmourya['owner'];
$chicagoarmouryy = $chicagoarmourya['owner'];

$lasvegasairporta = mysql_fetch_array(mysql_query("SELECT owner,nickname,profit FROM casinos WHERE location = 'Las Vegas' AND casino = 'Airport'"));
$lasvegasairport = $lasvegasairporta['owner'];
$lasvegasairportt = $lasvegasairporta['owner'];
$lasvegasairportprofit = number_format($lasvegasairporta['profit']);

$losangelesairporta = mysql_fetch_array(mysql_query("SELECT owner,nickname,profit FROM casinos WHERE location = 'Los Angeles' AND casino = 'Airport'"));
$losangelesairport = $losangelesairporta['owner'];
$losangelesairportt = $losangelesairporta['owner'];
$losangelesairportprofit = number_format($losangelesairporta['profit']);

$newyorkairporta = mysql_fetch_array(mysql_query("SELECT owner,nickname,profit FROM casinos WHERE location = 'New York' AND casino = 'Airport'"));
$newyorkairport = $newyorkairporta['owner'];
$newyorkairportt = $newyorkairporta['owner'];
$newyorkairportprofit = number_format($newyorkairporta['profit']);

$seatleairporta = mysql_fetch_array(mysql_query("SELECT owner,nickname,profit FROM casinos WHERE location = 'Seatle' AND casino = 'Airport'"));
$seatleairport = $seatleairporta['owner'];
$seatleairportt = $seatleairporta['owner'];
$seatleairportprofit = number_format($seatleairporta['profit']);

$dallasairporta = mysql_fetch_array(mysql_query("SELECT owner,nickname,profit FROM casinos WHERE location = 'Dallas' AND casino = 'Airport'"));
$dallasairport = $dallasairporta['owner'];
$dallasairportt = $dallasairporta['owner'];
$dallasairportprofit = number_format($dallasairporta['profit']);

$miamiairporta = mysql_fetch_array(mysql_query("SELECT owner,nickname,profit FROM casinos WHERE location = 'Miami' AND casino = 'Airport'"));
$miamiairport = $miamiairporta['owner'];
$miamiairportt = $miamiairporta['owner'];
$miamiairportprofit = number_format($miamiairporta['profit']);

$chicagoairporta = mysql_fetch_array(mysql_query("SELECT owner,nickname,profit FROM casinos WHERE location = 'Chicago' AND casino = 'Airport'"));
$chicagoairport = $chicagoairporta['owner'];
$chicagoairportt = $chicagoairporta['owner'];
$chicagoairportprofit = number_format($chicagoairporta['profit']);

$lasvegaslandmarka = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Las Vegas' AND casino = 'Landmark'"));
$lasvegaslandmark = $lasvegaslandmarka['owner'];
$lasvegaslandmarkk = $lasvegaslandmarka['owner'];

$losangeleslandmarka = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Los Angeles' AND casino = 'Landmark'"));
$losangeleslandmark = $losangeleslandmarka['owner'];
$losangeleslandmarkk = $losangeleslandmarka['owner'];

$newyorklandmarka = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'New York' AND casino = 'Landmark'"));
$newyorklandmark = $newyorklandmarka['owner'];
$newyorklandmarkk = $newyorklandmarka['owner'];

$miamilandmarka = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Miami' AND casino = 'Landmark'"));
$miamilandmark = $miamilandmarka['owner'];
$miamilandmarkk = $miamilandmarka['owner'];

$chicagolandmarka = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Chicago' AND casino = 'Landmark'"));
$chicagolandmark = $chicagolandmarka['owner'];
$chicagolandmarkk = $chicagolandmarka['owner'];


$userownsproperty = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'prop' AND casino <>'Landmark'"));
$userownscasino = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'casi'"));
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

         {
            margin-top: 14px;
        }

        .btm-statbreak {
            height: 7px;
            display: block;
        }
        .cityPropsTableData {
            padding-right: 0px;
            padding-left: 0px;
            max-width: 126px;
            width:126px;
        }
        .propDiv > span{
            padding: 4px;
            padding-right: 4px;
            padding-left: 4px;
            padding-left: 6px;
            padding-right: 6px;
            color: #d0d0d0;
            text-decoration: none;
            display: block;
            font: 10px verdana,tahoma,arial;
            border-top: 1px solid #3c3c3c;
            border-left: 1px solid rgb(45,45,45);
            text-overflow: ellipsis;
            overflow: hidden;
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
        <td valign="top">
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
                                Cities Information
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: center;">

                                    <table width="100%" cellspacing="0" align="center">
                                        <tbody>
                                        <tr>
                                            <td valign="top" nowrap="" align="center">
                                                <div class="miniMenu shadowTest curve3px cityBlock" style="position: relative; ">
                                                    <div class="miniMenuHeader cityBlockName curve2pxTop cityDetails">
                                                        Las Vegas, Nevada<br>
                                                        <span class="cityResidents">Residents: <?echo$howmanyuserslasvegas;?> </span>
                                                    </div>
                                                    <img class="cityBlockImage" src="images/cities/lv.png">
                                                </div>
                                                <table class="shadowTest curve3px cityProps miniMain miniMenu cityPropsTable" style="display: inline-block; max-width: 10000px;" cellspacing="0">
                                                    <tbody><tr>
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Bullet Factory</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Armoury</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Airport</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height: 23px;"><? if($lasvegasbf != 'None') {echo"<a href=\"viewprofile.php?username=$lasvegasbf\" class=\"cityPropsTableData\">$lasvegasbff</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height: 23px;"><? if($lasvegasarmoury != 'None') {echo"<a href=\"viewprofile.php?username=$lasvegasarmoury\" class=\"cityPropsTableData\">$lasvegasarmoury</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height: 23px;"><? if($lasvegasairport != 'None') {echo"<a href=\"viewprofile.php?username=$lasvegasairport\" class=\"cityPropsTableData\">$lasvegasairport</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><?echo$lasvegasbfftbullets;?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">∞</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData nil">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Bullet Cost</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><? if($lasvegasbfftmaxbet=='0'){echo"<font style='color:lime;font-weight:bold;'>FREE</font>";}else{echo"$$lasvegasbfftmaxbet";}?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">100%</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" <?if($lasvegasairportprofit=='5'){echo"style='color:lime;font-weight:bold;'";}elseif($lasvegasairportprofit=='20' || $lasvegasairportprofit=='15'){echo"style='color:red;font-weight:bold;'";}?>><?echo$lasvegasairportprofit;?> Points</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding: 0;">
                                                <div class="spacer" style="margin-top: -1px; margin-bottom: 3px;"></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" cellspacing="0" align="center">
                                        <tbody><tr>
                                            <td valign="top" nowrap="" align="center">
                                                <div class="miniMenu shadowTest curve3px cityBlock" style="position: relative; ">
                                                    <div class="miniMenuHeader cityBlockName curve2pxTop cityDetails">
                                                        New York City, New York <br>
                                                        <span class="cityResidents">Residents: <?echo$howmanyusersnewyork;?> </span>
                                                    </div>
                                                    <img class="cityBlockImage" src="images/cities/ny.png">
                                                </div>
                                                <table class="shadowTest curve3px cityProps miniMain miniMenu cityPropsTable" style="display: inline-block; max-width: 10000px;" cellspacing="0">
                                                    <tbody><tr>
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Bullet Factory</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Armoury</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Airport</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($newyorkbff != 'None') {echo"<a href=\"viewprofile.php?username=$newyorkbff\" class=\"cityPropsTableData\">$newyorkbff</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($newyorkarmoury != 'None') {echo"<a href=\"viewprofile.php?username=$newyorkarmoury\" class=\"cityPropsTableData\">$newyorkarmoury</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($newyorkairport != 'None') {echo"<a href=\"viewprofile.php?username=$newyorkairport\" class=\"cityPropsTableData\">$newyorkairport</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><?echo$newyorkbfftbullets;?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">∞</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData nil">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Bullet Cost</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><? if($newyorkbfftmaxbet=='0'){echo"<font style='color:lime;font-weight:bold;'>FREE</font>";}else{echo"$$newyorkbfftmaxbet";}?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">100%</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" <?if($newyorkairportprofit=='5'){echo"style='color:lime;font-weight:bold;'";}elseif($newyorkairportprofit=='20' || $newyorkairportprofit=='15'){echo"style='color:red;font-weight:bold;'";}?>><?echo$newyorkairportprofit;?>  Points</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding: 0;">
                                                <div class="spacer" style="margin-top: -1px; margin-bottom: 3px;"></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" cellspacing="0" align="center">
                                        <tbody>
                                        <tr>
                                            <td valign="top" nowrap="" align="center">
                                                <div class="miniMenu shadowTest curve3px cityBlock" style="position: relative; ">
                                                    <div class="miniMenuHeader cityBlockName curve2pxTop cityDetails">
                                                        Seattle, Washington <br>
                                                        <span class="cityResidents">Residents: <?echo$howmanyusersseatle;?> </span>
                                                    </div>
                                                    <img class="cityBlockImage" src="images/cities/seattle.jpg">
                                                </div>
                                                <table class="shadowTest curve3px cityProps miniMain miniMenu cityPropsTable" style="display: inline-block; max-width: 10000px;" cellspacing="0">
                                                    <tbody><tr>
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Bullet Factory</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Armoury</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Airport</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height: 23px;"><? if($seatlebf != 'None') {echo"<a href=\"viewprofile.php?username=$seatlebf\" class=\"cityPropsTableData\">$seatlebff</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height: 23px;"><? if($seatlearmoury != 'None') {echo"<a href=\"viewprofile.php?username=$seatlearmoury\" class=\"cityPropsTableData\">$seatlearmoury</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height: 23px;"><? if($seatleairport != 'None') {echo"<a href=\"viewprofile.php?username=$seatleairport\" class=\"cityPropsTableData\">$seatleairport</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><?echo$seatlebfftbullets;?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">∞</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData nil">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Bullet Cost</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><? if($seatlebfftmaxbet=='0'){echo"<font style='color:lime;font-weight:bold;'>FREE</font>";}else{echo"$$seatlebfftmaxbet";}?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">100%</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" <?if($seatleairportprofit=='5'){echo"style='color:lime;font-weight:bold;'";}elseif($seatleairportprofit=='20' || $seatleairportprofit=='15'){echo"style='color:red;font-weight:bold;'";}?>><?echo$seatleairportprofit;?> Points</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding: 0;">
                                                <div class="spacer" style="margin-top: -1px; margin-bottom: 3px;"></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" cellspacing="0" align="center">
                                        <tbody><tr>
                                            <td valign="top" nowrap="" align="center">
                                                <div class="miniMenu shadowTest curve3px cityBlock" style="position: relative; ">
                                                    <div class="miniMenuHeader cityBlockName curve2pxTop cityDetails">
                                                        Chicago, Illinois <br>
                                                        <span class="cityResidents">Residents: <?echo$howmanyuserschicago;?> </span>
                                                    </div>
                                                    <img class="cityBlockImage" src="images/cities/chic.png">
                                                </div>
                                                <table class="shadowTest curve3px cityProps miniMain miniMenu cityPropsTable" style="display: inline-block; max-width: 10000px;" cellspacing="0">
                                                    <tbody><tr>
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Bullet Factory</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Armoury</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Airport</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($chicagobff != 'None') {echo"<a href=\"viewprofile.php?username=$chicagobff\" class=\"cityPropsTableData\">$chicagobff</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($chicagoarmoury != 'None') {echo"<a href=\"viewprofile.php?username=$chicagoarmoury\" class=\"cityPropsTableData\">$chicagoarmoury</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($chicagoairport != 'None') {echo"<a href=\"viewprofile.php?username=$chicagoairport\" class=\"cityPropsTableData\">$chicagoairport</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><?echo$chicagobfftbullets;?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">∞</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData nil">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Bullet Cost</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><? if($chicagobfftmaxbet=='0'){echo"<font style='color:lime;font-weight:bold;'>FREE</font>";}else{echo"$$chicagobfftmaxbet";}?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">100%</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" <?if($chicagoairportprofit=='5'){echo"style='color:lime;font-weight:bold;'";}elseif($chicagoairportprofit=='20' || $chicagoairportprofit=='15'){echo"style='color:red;font-weight:bold;'";}?> ><?echo$chicagoairportprofit;?>  Points</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding: 0;">
                                                <div class="spacer" style="margin-top: -1px; margin-bottom: 3px;"></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" cellspacing="0" align="center">
                                        <tbody><tr>
                                            <td valign="top" nowrap="" align="center">
                                                <div class="miniMenu shadowTest curve3px cityBlock" style="position: relative; ">
                                                    <div class="miniMenuHeader cityBlockName curve2pxTop cityDetails">
                                                        Dallas, Texas <br>
                                                        <span class="cityResidents">Residents: <?echo$howmanyusersdallas;?> </span>
                                                    </div>
                                                    <img class="cityBlockImage" src="images/cities/texas.png">
                                                </div>
                                                <table class="shadowTest curve3px cityProps miniMain miniMenu cityPropsTable" style="display: inline-block; max-width: 10000px;" cellspacing="0">
                                                    <tbody><tr>
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Bullet Factory</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Armoury</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Airport</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($dallasbff != 'None') {echo"<a href=\"viewprofile.php?username=$dallasbff\" class=\"cityPropsTableData\">$dallasbff</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($dallasarmoury != 'None') {echo"<a href=\"viewprofile.php?username=$dallasarmoury\" class=\"cityPropsTableData\">$dallasarmoury</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($dallasairport != 'None') {echo"<a href=\"viewprofile.php?username=$dallasairport\" class=\"cityPropsTableData\">$dallasairport</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><?echo$dallasbfftbullets;?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">∞</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData nil">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Bullet Cost</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><? if($dallasbfftmaxbet=='0'){echo"<font style='color:lime;font-weight:bold;'>FREE</font>";}else{echo"$$dallasbfftmaxbet";}?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">100%</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" <?if($dallasairportprofit=='5'){echo"style='color:lime;font-weight:bold;'";}elseif($dallasairportprofit=='20' || $dallasairportprofit=='15'){echo"style='color:red;font-weight:bold;'";}?>><?echo$dallasairportprofit;?>  Points</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding: 0;">
                                                <div class="spacer" style="margin-top: -1px; margin-bottom: 3px;"></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" cellspacing="0" align="center">
                                        <tbody><tr>
                                            <td valign="top" nowrap="" align="center">
                                                <div class="miniMenu shadowTest curve3px cityBlock" style="position: relative; ">
                                                    <div class="miniMenuHeader cityBlockName curve2pxTop cityDetails">
                                                        Los Angeles, California <br>
                                                        <span class="cityResidents">Residents: <?echo$howmanyuserslosangeles;?> </span>
                                                    </div>
                                                    <img class="cityBlockImage" src="images/cities/la.png">
                                                </div>
                                                <table class="shadowTest curve3px cityProps miniMain miniMenu cityPropsTable" style="display: inline-block; max-width: 10000px;" cellspacing="0">
                                                    <tbody><tr>
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Bullet Factory</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Armoury</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Airport</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($losangelesbff != 'None') {echo"<a href=\"viewprofile.php?username=$losangelesbff\" class=\"cityPropsTableData\">$losangelesbff</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($losangelesarmoury != 'None') {echo"<a href=\"viewprofile.php?username=$losangelesarmoury\" class=\"cityPropsTableData\">$losangelesarmoury</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($losangelesairport != 'None') {echo"<a href=\"viewprofile.php?username=$losangelesairport\" class=\"cityPropsTableData\">$losangelesairport</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><?echo$losangelesbfftbullets;?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">∞</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData nil">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Bullet Cost</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><? if($losangelesbfftmaxbet=='0'){echo"<font style='color:lime;font-weight:bold;'>FREE</font>";}else{echo"$$losangelesbfftmaxbet";}?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">100%</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" <?if($losangelesairportprofit=='5'){echo"style='color:lime;font-weight:bold;'";}elseif($losangelesairportprofit=='20' || $losangelesairportprofit=='15'){echo"style='color:red;font-weight:bold;'";}?>><?echo$losangelesairportprofit;?>  Points</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding: 0;">
                                                <div class="spacer" style="margin-top: -1px; margin-bottom: 3px;"></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" cellspacing="0" align="center">
                                        <tbody><tr>
                                            <td valign="top" nowrap="" align="center">
                                                <div class="miniMenu shadowTest curve3px cityBlock" style="position: relative; ">
                                                    <div class="miniMenuHeader cityBlockName curve2pxTop cityDetails">
                                                        Miami, Florida <br>
                                                        <span class="cityResidents">Residents: <?echo$howmanyusersmiami;?> </span>
                                                    </div>
                                                    <img class="cityBlockImage" src="images/cities/miami.png">
                                                </div>
                                                <table class="shadowTest curve3px cityProps miniMain miniMenu cityPropsTable" style="display: inline-block; max-width: 10000px;" cellspacing="0">
                                                    <tbody><tr>
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Bullet Factory</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Armoury</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Airport</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($miamibff != 'None') {echo"<a href=\"viewprofile.php?username=$miamibff\" class=\"cityPropsTableData\">$miamibff</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($miamiarmoury != 'None') {echo"<a href=\"viewprofile.php?username=$miamiarmoury\" class=\"cityPropsTableData\">$miamiarmoury</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($miamiairport != 'None') {echo"<a href=\"viewprofile.php?username=$miamiairport\" class=\"cityPropsTableData\">$miamiairport</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Stock</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><?echo$miamibfftbullets;?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">∞</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData nil">-</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Bullet Cost</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Price</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" style="border-left: 0;"><? if($miamibfftmaxbet=='0'){echo"<font style='color:lime;font-weight:bold;'>FREE</font>";}else{echo"$$miamibfftmaxbet";}?></span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData">100%</span></td>
                                                        <td class="propDiv"><span class="propDivStatic cityPropsTableData" <?if($miamiairportprofit=='5'){echo"style='color:lime;font-weight:bold;'";}elseif($miamiairportprofit=='20' || $miamiairportprofit=='15'){echo"style='color:red;font-weight:bold;'";}?> ><?echo$miamiairportprofit;?>  Points</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding: 0;">
                                                <div class="spacer" style="margin-top: -1px; margin-bottom: 3px;"></div>
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






