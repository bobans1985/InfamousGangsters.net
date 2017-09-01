<? include 'included.php'; session_start();

$seatledicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Seatle'"));
$seatledice = $seatledicea['owner'];
$seatledicee = $seatledicea['owner'];
$seatledicemaxbet = number_format($seatledicea['maxbet']);
$howmanyusersseatle = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'Seatle'"));

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$seatledice'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$seatledicewealth=$getmoney;

$dallasdicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Dallas'"));
$dallasdice = $dallasdicea['owner'];
$dallasdicee = $dallasdicea['owner'];
$dallasdicemaxbet = number_format($newyorkdicea['maxbet']);
$howmanyusersdallas = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'Dallas'"));

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$dallasdice'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$dallasdicewealth=$getmoney;

$seatlebja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Seatle'"));
$seatleblackjack = $seatlebja['owner'];
$seatleblackjackk = $seatlebja['owner'];
$seatlebjmaxbet = number_format($seatlebja['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$seatleblackjack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$seatlebjwealth=$getmoney;

$dallasbja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Dallas'"));
$dallasblackjack = $dallasbja['owner'];
$dallasblackjackk = $dallasbja['owner'];
$dallasbjmaxbet = number_format($dallasbja['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$dallasblackjack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$dallasbjwealth=$getmoney;

$seatlerta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Seatle'"));
$seatleracetrack = $seatlerta['owner'];
$seatleracetrackk = $seatlerta['owner'];
$seatlertmaxbet = number_format($seatlerta['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$seatleracetrack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$seatleracewealth=$getmoney;

$dallasrta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Dallas'"));
$dallasracetrack = $dallasrta['owner'];
$dallasracetrackk = $dallasrta['owner'];
$dallasrtmaxbet = number_format($dallasrta['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$dallasracetrack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$dallasracewealth=$getmoney;

$seatlerlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Seatle'"));
$seatleroulette = $seatlerlta['owner'];
$seatleroulettee = $seatlerlta['owner'];
$seatlerltmaxbet = number_format($seatlerlta['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$seatleroulette'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$seatleroulettewealth=$getmoney;

$dallasrlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Dallas'"));
$dallasroulette = $dallasrlta['owner'];
$dallasroulettee = $dallasrlta['owner'];
$dallasrltmaxbet = number_format($dallasrlta['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$dallasroulette'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$dallasroulettewealth=$getmoney;

$seatlebfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bullets FROM casinos WHERE casino = 'Bullets' AND location = 'Seatle'"));
$seatlebf = $seatlebfa['owner'];
$seatlebff = $seatlebfa['owner'];
$seatlebfftmaxbet = number_format($seatlebfa['maxbet']);
$seatlebfftbullets = number_format($seatlebfa['bullets']);

$dallasbfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bullets FROM casinos WHERE casino = 'Bullets' AND location = 'Dallas'"));
$dallasbf = $dallasbfa['owner'];
$dallasbff = $dallasbfa['owner'];
$dallasbfftmaxbet = number_format($dallasbfa['maxbet']);
$dallasbfftbullets = number_format($dallasbfa['bullets']);

$seatlehospa = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Seatle' AND casino = 'Hospital'"));
$seatlehosp = $seatlehospa['owner'];
$seatlehospp = $seatlehospa['owner'];

$dallashospa = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Dallas' AND casino = 'Hospital'"));
$dallashosp = $dallashospa['owner'];
$dallashospp = $dallashospa['owner'];

$seatlearmourya = mysql_fetch_array(mysql_query("SELECT owner FROM casinos WHERE location = 'Seatle' AND casino = 'Armoury'"));
$seatlearmoury = $seatlearmourya['owner'];
$seatlearmouryy = $seatlearmourya['owner'];

$dallasarmourya = mysql_fetch_array(mysql_query("SELECT owner FROM casinos WHERE location = 'Dallas' AND casino = 'Armoury'"));
$dallasarmoury = $dallasarmourya['owner'];
$dallasarmouryy = $dallasarmourya['owner'];

$seatleairporta = mysql_fetch_array(mysql_query("SELECT owner,nickname,profit FROM casinos WHERE location = 'Seatle' AND casino = 'Airport'"));
$seatleairport = $seatleairporta['owner'];
$seatleairportt = $seatleairporta['owner'];
$seatleairportprofit = number_format($seatleairporta['profit']);

$dallasairporta = mysql_fetch_array(mysql_query("SELECT owner,nickname,profit FROM casinos WHERE location = 'Dallas' AND casino = 'Airport'"));
$dallasairport = $dallasairporta['owner'];
$dallasairportt = $dallasairporta['owner'];
$dallasairportprofit = number_format($dallasairporta['profit']);

$lasvegasdicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Las Vegas'"));
$lasvegasdice = $lasvegasdicea['owner'];
$lasvegasdicee = $lasvegasdicea['owner'];
$lasvegasdicemaxbet = number_format($lasvegasdicea['maxbet']);
$howmanyuserslasvegas = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'Las Vegas'"));

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$lasvegasdice'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$lasvegasdicewealth=$getmoney;

$losangelesdicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Los Angeles'"));
$losangelesdice = $losangelesdicea['owner'];
$losangelesdicee = $losangelesdicea['owner'];
$losangelesdicemaxbet = number_format($losangelesdicea['maxbet']);
$howmanyuserslosangeles = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'Los Angeles'"));

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$losangelesdice'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$losangelesdicewealth=$getmoney;

$newyorkdicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'New York'"));
$newyorkdice = $newyorkdicea['owner'];
$newyorkdicee = $newyorkdicea['owner'];
$newyorkdicemaxbet = number_format($newyorkdicea['maxbet']);
$howmanyusersnewyork = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'New York'"));

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$newyorkdice'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$newyorkdicewealth=$getmoney;

$chicagodicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Chicago'"));
$chicagodice = $chicagodicea['owner'];
$chicagodicee = $chicagodicea['owner'];
$chicagodicemaxbet = number_format($chicagodicea['maxbet']);
$howmanyuserschicago = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'Chicago'"));

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$chicagodice'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$chicagodicewealth=$getmoney;

$miamidicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Miami'"));
$miamidice = $miamidicea['owner'];
$miamidicee = $miamidicea['owner'];
$miamidicemaxbet = number_format($miamidicea['maxbet']);
$howmanyusersmiami = mysql_num_rows(mysql_query("SELECT * FROM users WHERE status = 'Alive' AND location = 'Miami'"));

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$miamidice'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$miamidicewealth=$getmoney;

$lasvegasbja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Las Vegas'"));
$lasvegasblackjack = $lasvegasbja['owner'];
$lasvegasblackjackk = $lasvegasbja['owner'];
$lasvegasbjmaxbet = number_format($lasvegasbja['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$lasvegasblackjack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$lasvegasbjwealth=$getmoney;

$losangelesbja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Los Angeles'"));
$losangelesblackjack = $losangelesbja['owner'];
$losangelesblackjackk = $losangelesbja['owner'];
$losangelesbjmaxbet = number_format($losangelesbja['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$losangelesblackjack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$losangelesbjwealth=$getmoney;

$newyorkbja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'New York'"));
$newyorkblackjack = $newyorkbja['owner'];
$newyorkblackjackk = $newyorkbja['owner'];
$newyorkbjmaxbet = number_format($newyorkbja['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$newyorkblackjack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$newyorkbjwealth=$getmoney;

$chicagobja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Chicago'"));
$chicagoblackjack = $chicagobja['owner'];
$chicagoblackjackk = $chicagobja['owner'];
$chicagobjmaxbet = number_format($chicagobja['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$chicagoblackjack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$chicagobjwealth=$getmoney;

$miamibja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Miami'"));
$miamiblackjack = $miamibja['owner'];
$miamiblackjackk = $miamibja['owner'];
$miamibjmaxbet = number_format($miamibja['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$miamiblackjack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$miamibjwealth=$getmoney;

$lasvegasrta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Las Vegas'"));
$lasvegasracetrack = $lasvegasrta['owner'];
$lasvegasracetrackk = $lasvegasrta['owner'];
$lasvegasrtmaxbet = number_format($lasvegasrta['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$lasvegasracetrack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$lasvegasracewealth=$getmoney;

$losangelesrta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Los Angeles'"));
$losangelesracetrack = $losangelesrta['owner'];
$losangelesracetrackk = $losangelesrta['owner'];
$losangelesrtmaxbet = number_format($losangelesrta['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$losangelesracetrack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$losangelesracewealth=$getmoney;

$newyorkrta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'New York'"));
$newyorkracetrack = $newyorkrta['owner'];
$newyorkracetrackk = $newyorkrta['owner'];
$newyorkrtmaxbet = number_format($newyorkrta['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$newyorkracetrack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$newyorkracewealth=$getmoney;

$miamita = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Miami'"));
$miamiracetrack = $miamita['owner'];
$miamiracetrackk = $miamita['owner'];
$miamirtmaxbet = number_format($miamita['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$miamiracetrack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$miamiracewealth=$getmoney;

$chicagota = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Chicago'"));
$chicagoracetrack = $chicagota['owner'];
$chicagoracetrackk = $chicagota['owner'];
$chicagortmaxbet = number_format($chicagota['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$chicagoracetrack'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$chicagoracewealth=$getmoney;

$lasvegasrlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Las Vegas'"));
$lasvegasroulette = $lasvegasrlta['owner'];
$lasvegasroulettee = $lasvegasrlta['owner'];
$lasvegasrltmaxbet = number_format($lasvegasrlta['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$lasvegasroulette'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$lasvegasroulettewealth=$getmoney;

$losangelesrlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Los Angeles'"));
$losangelesroulette = $losangelesrlta['owner'];
$losangelesroulettee = $losangelesrlta['owner'];
$losangelesrltmaxbet = number_format($losangelesrlta['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$losangelesroulette'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$losangelesroulettewealth=$getmoney;

$newyorkrlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'New York'"));
$newyorkroulette = $newyorkrlta['owner'];
$newyorkroulettee = $newyorkrlta['owner'];
$newyorkrltmaxbet = number_format($newyorkrlta['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$newyorkroulette'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$newyorkroulettewealth=$getmoney;

$miamirlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Miami'"));
$miamiroulette = $miamirlta['owner'];
$miamiroulettee = $miamirlta['owner'];
$miamirltmaxbet = number_format($miamirlta['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$miamiroulette'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$miamiroulettewealth=$getmoney;

$chicagorlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Chicago'"));
$chicagoroulette = $chicagorlta['owner'];
$chicagoroulettee = $chicagorlta['owner'];
$chicagorltmaxbet = number_format($chicagorlta['maxbet']);

$getinfosql = mysql_query("SELECT * FROM users WHERE username='$chicagoroulette'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$getmoneyid = $getinfoarray['money'];

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getname == 'None'){
    $getmoney = '-';
}elseif($getmoneyid == '0'){
    $getmoney = 'Broke';
}
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';}
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';}
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';}
elseif($getmoneyid > '999999999' && $getmoneyid < '25000000000') {$getmoney = 'M. Billionaire';}
elseif ($getmoneyid > '24999999999') { $getmoney = 'C. Billionaire'; }

$chicagoroulettewealth=$getmoney;

$lasvegasbfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bullets FROM casinos WHERE casino = 'Bullets' AND location = 'Las Vegas'"));
$lasvegasbf = $lasvegasbfa['owner'];
$lasvegasbff = $lasvegasbfa['owner'];
$lasvegasbfftmaxbet = number_format($lasvegasbfa['maxbet']);
$lasvegasbfftbullets = number_format($lasvegasbfa['bullets']);

$losangelesbfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bullets FROM casinos WHERE casino = 'Bullets' AND location = 'Los Angeles'"));
$losangelesbf = $losangelesbfa['owner'];
$losangelesbff = $losangelesbfa['owner'];
$losangelesbfftmaxbet = number_format($losangelesbfa['maxbet']);
$losangelesbfftbullets = number_format($losangelesbfa['bullets']);

$miamibfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bullets FROM casinos WHERE casino = 'Bullets' AND location = 'Miami'"));
$miamibf = $miamibfa['owner'];
$miamibff = $miamibfa['owner'];
$miamibfftmaxbet = number_format($miamibfa['maxbet']);
$miamibfftbullets = number_format($miamibfa['bullets']);

$chicagobfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bullets FROM casinos WHERE casino = 'Bullets' AND location = 'Chicago'"));
$chicagobf = $chicagobfa['owner'];
$chicagobff = $chicagobfa['owner'];
$chicagobfftmaxbet = number_format($chicagobfa['maxbet']);
$chicagobfftbullets = number_format($chicagobfa['bullets']);

$newyorkbfa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet,bullets FROM casinos WHERE casino = 'Bullets' AND location = 'New York'"));
$newyorkbf = $newyorkbfa['owner'];
$newyorkbff = $newyorkbfa['owner'];
$newyorkbfftmaxbet = number_format($newyorkbfa['maxbet']);
$newyorkbfftbullets = number_format($newyorkbfa['bullets']);

$lasvegashospa = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Las Vegas' AND casino = 'Hospital'"));
$lasvegashosp = $lasvegashospa['owner'];
$lasvegashospp = $lasvegashospa['owner'];

$losangeleshospa = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'Los Angeles' AND casino = 'Hospital'"));
$losangeleshosp = $losangeleshospa['owner'];
$losangeleshospp = $losangeleshospa['owner'];

$newyorkhospa = mysql_fetch_array(mysql_query("SELECT owner,nickname FROM casinos WHERE location = 'New York' AND casino = 'Hospital'"));
$newyorkhosp = $newyorkhospa['owner'];
$newyorkhospp = $newyorkhospa['owner'];

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


$userownsproperty = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'prop'"));
$userownscasino = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'casi'"));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" href="layout/style.css" type="text/css" />
    <title>Infamous Gangsters</title>
    <link rel="icon" type="image/png" href="images/icon.png">
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
            <table class="menuTable curve10px" id="content" cellspacing="0" cellpadding="0">
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
                                Casinos
                            </div>
                            <div style="min-width: 740px; padding: 8px; padding-left: 4px; padding-right: 4px; margin: auto; text-align: center; color: #fefefe;padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div>

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
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Blackjack</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Horse Racing</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Roulette</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Dice Game</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""> <span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($lasvegasblackjack != 'None') {echo"<a href=\"viewprofile.php?username=$lasvegasblackjack\" class=\"cityPropsTableData\">$lasvegasblackjack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($lasvegasracetrack != 'None') {echo"<a href=\"viewprofile.php?username=$lasvegasracetrack\" class=\"cityPropsTableData\">$lasvegasracetrack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($lasvegasroulette != 'None') {echo"<a href=\"viewprofile.php?username=$lasvegasroulette\" class=\"cityPropsTableData\">$lasvegasroulette</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($lasvegasdice != 'None') {echo"<a href=\"viewprofile.php?username=$lasvegasdice\" class=\"cityPropsTableData\">$lasvegasdice</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($lasvegasblackjack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$lasvegasbjwealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($lasvegasracetrack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$lasvegasracewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($lasvegasroulette != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$lasvegasroulettewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($lasvegasdice != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$lasvegasdicewealth</span>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><? if($lasvegasbjmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$$lasvegasbjmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($lasvegasrtmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$lasvegasrtmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($lasvegasrltmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$lasvegasrltmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($lasvegasdicemaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$lasvegasdicemaxbet</span>";}?></td>
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
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Blackjack</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Horse Racing</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Roulette</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Dice Game</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""> <span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($newyorkblackjack != 'None') {echo"<a href=\"viewprofile.php?username=$newyorkblackjack\" class=\"cityPropsTableData\">$newyorkblackjack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($newyorkracetrack != 'None') {echo"<a href=\"viewprofile.php?username=$newyorkracetrack\" class=\"cityPropsTableData\">$newyorkracetrack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($newyorkroulette != 'None') {echo"<a href=\"viewprofile.php?username=$newyorkroulette\" class=\"cityPropsTableData\">$newyorkroulette</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($newyorkdice != 'None') {echo"<a href=\"viewprofile.php?username=$newyorkdice\" class=\"cityPropsTableData\">$newyorkdice</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($newyorkblackjack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$newyorkbjwealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($newyorkracetrack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$newyorkracewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($newyorkroulette != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$newyorkroulettewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($newyorkdice != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$newyorkdicewealth</span>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><? if($newyorkbjmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$$newyorkbjmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($newyorkrtmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$newyorkrtmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($newyorkrltmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$newyorkrltmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($newyorkdicemaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$newyorkdicemaxbet</span>";}?></td>
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
                                                        Seattle, Washington <br>
                                                        <span class="cityResidents">Residents: <?echo$howmanyusersseatle;?> </span>
                                                    </div>
                                                    <img class="cityBlockImage" src="images/cities/seattle.jpg">
                                                </div>
                                                <table class="shadowTest curve3px cityProps miniMain miniMenu cityPropsTable" style="display: inline-block; max-width: 10000px;" cellspacing="0">
                                                    <tbody><tr>
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Blackjack</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Horse Racing</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Roulette</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Dice Game</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""> <span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($seatleblackjack != 'None') {echo"<a href=\"viewprofile.php?username=$seatleblackjack\" class=\"cityPropsTableData\">$seatleblackjack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($seatleracetrack != 'None') {echo"<a href=\"viewprofile.php?username=$seatleracetrack\" class=\"cityPropsTableData\">$seatleracetrack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($seatleroulette != 'None') {echo"<a href=\"viewprofile.php?username=$seatleroulette\" class=\"cityPropsTableData\">$seatleroulette</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($seatledice != 'None') {echo"<a href=\"viewprofile.php?username=$seatledice\" class=\"cityPropsTableData\">$seatledice</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($seatleblackjack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$seatlebjwealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($seatleracetrack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$seatleracewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($seatleroulette != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$seatleroulettewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($seatledice != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$seatledicewealth</span>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><? if($seatlebjmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$$seatlebjmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($seatlertmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$seatlertmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($seatlerltmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$seatlerltmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($seatledicemaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$seatledicemaxbet</span>";}?></td>
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
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Blackjack</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Horse Racing</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Roulette</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Dice Game</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""> <span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($chicagoblackjack != 'None') {echo"<a href=\"viewprofile.php?username=$chicagoblackjack\" class=\"cityPropsTableData\">$chicagoblackjack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($chicagoracetrack != 'None') {echo"<a href=\"viewprofile.php?username=$chicagoracetrack\" class=\"cityPropsTableData\">$chicagoracetrack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($chicagoroulette != 'None') {echo"<a href=\"viewprofile.php?username=$chicagoroulette\" class=\"cityPropsTableData\">$chicagoroulette</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($chicagodice != 'None') {echo"<a href=\"viewprofile.php?username=$chicagodice\" class=\"cityPropsTableData\">$chicagodice</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($chicagoblackjack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$chicagobjwealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($chicagoracetrack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$chicagoracewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($chicagoroulette != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$chicagoroulettewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($chicagodice != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$chicagodicewealth</span>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><? if($chicagobjmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$$chicagobjmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($chicagortmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$chicagortmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($chicagorltmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$chicagorltmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($chicagodicemaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$chicagodicemaxbet</span>";}?></td>
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
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Blackjack</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Horse Racing</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Roulette</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Dice Game</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""> <span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($dallasblackjack != 'None') {echo"<a href=\"viewprofile.php?username=$dallasblackjack\" class=\"cityPropsTableData\">$dallasblackjack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($dallasracetrack != 'None') {echo"<a href=\"viewprofile.php?username=$dallasracetrack\" class=\"cityPropsTableData\">$dallasracetrack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($dallasroulette != 'None') {echo"<a href=\"viewprofile.php?username=$dallasroulette\" class=\"cityPropsTableData\">$dallasroulette</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($dallasdice != 'None') {echo"<a href=\"viewprofile.php?username=$dallasdice\" class=\"cityPropsTableData\">$dallasdice</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($dallasblackjack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$dallasbjwealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($dallasracetrack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$dallasracewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($dallasroulette != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$dallasroulettewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($dallasdice != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$dallasdicewealth</span>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><? if($dallasbjmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$$dallasbjmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($dallasrtmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$dallasrtmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($dallasrltmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$dallasrltmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($dallasdicemaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$dallasdicemaxbet</span>";}?></td>
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
                                        </tbody></table>
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
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Blackjack</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Horse Racing</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Roulette</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Dice Game</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""> <span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($losangelesblackjack != 'None') {echo"<a href=\"viewprofile.php?username=$losangelesblackjack\" class=\"cityPropsTableData\">$losangelesblackjack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($losangelesracetrack != 'None') {echo"<a href=\"viewprofile.php?username=$losangelesracetrack\" class=\"cityPropsTableData\">$losangelesracetrack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($losangelesroulette != 'None') {echo"<a href=\"viewprofile.php?username=$losangelesroulette\" class=\"cityPropsTableData\">$losangelesroulette</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($losangelesdice != 'None') {echo"<a href=\"viewprofile.php?username=$losangelesdice\" class=\"cityPropsTableData\">$losangelesdice</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($losangelesblackjack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$losangelesbjwealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($losangelesracetrack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$losangelesracewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($losangelesroulette != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$losangelesroulettewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($losangelesdice != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$losangelesdicewealth</span>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><? if($losangelesbjmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$$losangelesbjmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($losangelesrtmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$losangelesrtmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($losangelesrltmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$losangelesrltmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($losangelesdicemaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$losangelesdicemaxbet</span>";}?></td>
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
                                                        <td class="statsDivHeaderDark cityPropsTableData " style="border-left: 0;" nowrap="">Blackjack</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Horse Racing</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Roulette</td>
                                                        <td class="statsDivHeaderDark cityPropsTableData " nowrap="">Dice Game</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv noTop" nowrap=""><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Owner</span></td>
                                                        <td class="statsDiv noTop" nowrap=""> <span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                        <td class="statsDiv noTop"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Owner</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($miamiblackjack != 'None') {echo"<a href=\"viewprofile.php?username=$miamiblackjack\" class=\"cityPropsTableData\">$miamiblackjack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($miamiracetrack != 'None') {echo"<a href=\"viewprofile.php?username=$miamiracetrack\" class=\"cityPropsTableData\">$miamiracetrack</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($miamiroulette != 'None') {echo"<a href=\"viewprofile.php?username=$miamiroulette\" class=\"cityPropsTableData\">$miamiroulette</a>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($miamidice != 'None') {echo"<a href=\"viewprofile.php?username=$miamidice\" class=\"cityPropsTableData\">$miamidice</a>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Wealth</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($miamiblackjack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$miamibjwealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($miamiracetrack != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$miamiracewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($miamiroulette != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$miamiroulettewealth</span>";}?></td>
                                                        <td class="propDiv" nowrap="" style="border-left: 1px solid rgb(45,45,45);height:23px;"><? if($miamidice != 'None') {echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$miamidicewealth</span>";}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader" style="border-left: 0;">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                        <td class="statsDiv"><span class="statsDivStatic cityPropsTableData noTop citySmallHeader">Max Bet</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="propDiv"><? if($miamibjmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\" style=\"border-left: 0;\">$$miamibjmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($miamirtmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$miamirtmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($miamirltmaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$miamirltmaxbet</span>";}?></td>
                                                        <td class="propDiv"><? if($miamidicemaxbet=='999,999,999,999'){echo "<span style=\"color: gold;font-weight: bold;\">Infinite</span>";}else{echo "<span class=\"propDivStatic cityPropsTableData\">$$miamidicemaxbet</span>";}?></td>
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
                            <div class="menuHeader noTop" style="position: absolute; margin-top: -1px; width: 100%; box-sizing: border-box; -moz-box-sizing: border-box; z-index: 1;">
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
<script async src="javascript/jquery.min.js"></script>
<script async src="javascript/main3.js"></script>
</body>
</html>