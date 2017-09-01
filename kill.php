<? include 'included.php'; session_start();

$rtt=mt_rand(0,10);
if($rtt < '2'){mysql_query("UPDATE users SET location = 'Las Vegas' WHERE location = ' '");}

/*$vericheck = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$usernameone' AND ver1 != '0'"));
if($vericheck > 0){ die(include 'doverifkill.php'); }

if(isset($_POST['dosearch'])){
    $verificationcode = rand(1,20);
    if($verificationcode == '20'){
        $verifarray = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","bycar.php");
        shuffle($verifarray);
        $verif1 = $verifarray[0];
        $verif2 = $verifarray[1];
        $verif3 = $verifarray[2];
        mysql_query("UPDATE users SET ver1 = '$verif1', ver2 = '$verif2', ver3 = '$verif3' WHERE ID = '$ida'");
        die(include 'doverifkill.php');
    }}*/
$fulllocation = array(
	'Las Vegas' 	=> "Las Vegas, Nevada",
    'Los Angeles' 	=> "Los Angeles, California",
    'New York' 		=> "New York City, New York",
    'Chicago' 		=> "Chicago, Illionis",
    'Miami' 		=> "Miami, Florida",
    'Seatle' 		=> "Seatle, Washington",
    'Dallas' 		=> "Dallas, Texas",
);
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
        .col {
            padding-bottom:15px;
            width:50%;
        }
        .left-col {
            float:left;
        }
        .right-col {
            float:right;
        }
        @media screen and (max-width: 1280px) {
            .col {
                width:100%;
                text-align:center;
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
            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $poster = mysql_real_escape_string($_GET['deletepost']);
            $orderbys = mysql_real_escape_string($_GET['orderby']);
            $verposta = mysql_real_escape_string($_POST['ver']);
            $searcha = mysql_real_escape_string($_POST['search']);
            $usera = mysql_real_escape_string($_POST['user']);
            $hoursa = mysql_real_escape_string($_POST['hours']);
            $bulletsa = mysql_real_escape_string($_POST['bullets']);
            $nadesa = mysql_real_escape_string($_POST['grenades']);
            $search = preg_replace($saturate,"",$searcha);
            $nades = preg_replace($saturate,"",$nadesa);
            $user = preg_replace($saturate,"",$usera);
            $orderby = preg_replace($saturated,"",$orderbys);
            $hours = preg_replace($saturated,"",$hoursa);
            $bullets = preg_replace($saturated,"",$bulletsa);
            $verpost = preg_replace($saturate,"",$verposta);
            $aids = time();

            $reasonraw = mysql_real_escape_string($_POST['reason']);
            $reason = htmlentities($reasonraw, ENT_QUOTES);

            $gangsterusername = $usernameone;

            $getuserinfoarray = $statustesttwo;
            $rankid = $getuserinfoarray['rankid'];
            $rankup = $getuserinfoarray['rankup'];
            $totalkills = $getuserinfoarray['kills'];
            $ID = $getuserinfoarray['ID'];
            $ver = $getuserinfoarray['ver1'];
            $location = $getuserinfoarray['location'];
            $mybullets = $getuserinfoarray['bullets'];
            $gun = $getuserinfoarray['gun'];
            $usermission = $getuserinfoarray['mission'];
            $missionid = $getuserinfoarray['mission'];
            $current_guard = $getuserinfoarray['guard'];

            $selecterraw = $_POST['select'];
            $selecter = preg_replace($saturated,"",$selecterraw);
            if(isset($_POST['next'])){$one = $selecter + 1;}
            elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

            $selectfroma = $one * 25;
            $selecttoa = $selectfrom + 25;
            $selectfrom = preg_replace($saturated,"",$selectfroma);
            $selectto = preg_replace($saturated,"",$selecttoa);

            $jibber = time() - 4000;
            mysql_query("DELETE FROM searches WHERE time < $jibber");

            $countsearcha = mysql_query("SELECT username FROM searches WHERE username = '$gangsterusername'");
            $countsearchesa = mysql_num_rows($countsearcha);

            $countsearch = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' ORDER BY id DESC");
            $countsearches = mysql_num_rows($countsearch);
			
			$assassins_list = array(
				"Captain Price", 
				"Pelayo", 
				"Gaz", 
				"Imran Zakhaev", 
				"John MacTavish", 
				"Khaled Al-Asad", 
				"Vasquez", 
				"MacMillan", 
				"Nikolai", 
				"Kamarov", 
				"Paul Jackson",  
				"Daletski", 
				"Victor Zakhaev", 
				"Vladimir Makarov", 
				"Soap MacTavish", 
				"Blake", 
				"Carlos", 
				"Coen",  
				"Gaines", 
				"Salvatore", 
				"Hassler", 
				"Kaylor", 
				"Lehmkuhl", 
				"Letlev", 
				"Markhov", 
				"Massey", 
				"Dimitriy", 
				"Randall", 
				"Roebuck", 
				"Roycewicz", 
				"Schuster", 
				"Stavro", 
				"Telinov", 
				"Swift"
			);
			function simple_assassins($a) {
				return strtolower(str_replace(' ', '', $a));
			}
			$assassins_list_simpled = array_map('simple_assassins', $assassins_list);

			function setDead($ban, $crewid) {
				mysql_query("DELETE FROM usersonline WHERE username = '$ban'");
				mysql_query("DELETE FROM buycasinos WHERE username = '$ban'");
				mysql_query("DELETE FROM oac WHERE target = '$ban'");
				mysql_query("DELETE FROM hospital WHERE username = '$ban'");
				mysql_query("DELETE FROM robbery WHERE invite = '$ban'");
				mysql_query("DELETE FROM blackjack WHERE username = '$ban'");
				mysql_query("DELETE FROM jail WHERE username = '$ban'");
				mysql_query("DELETE FROM buycasinos WHERE username = '$ban'");
				mysql_query("DELETE FROM travel WHERE username = '$ban'");
				mysql_query("DELETE FROM crewsunderboss WHERE username = '$ban'");
				mysql_query("DELETE FROM bank WHERE username = '$ban'");
				mysql_query("DELETE FROM buycasinos WHERE username = '$ban'");
				mysql_query("DELETE FROM bodyguards WHERE username = '$ban'");
				if($crewid != '0'){
					$boss = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss = '$ban'"));

					if($boss > '0'){
						$getreelid = mysql_fetch_array(mysql_query("SELECT * FROM crews WHERE boss = '$ban'"));
						$gytid = $getreelid['id'];

						$isthereunderboss = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$gytid'"));
						if($isthereunderboss > 0){
							$getcrewunderboss = mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$gytid'");
							$underbossinfo = mysql_fetch_array($getcrewunderboss);
							$crewunderboss = $underbossinfo['username']; }

						$members = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid = '$gytid' AND status = 'Alive'"));
						if($members < 1){ mysql_query("DELETE FROM crews WHERE boss = '$ban'");
							mysql_query("DELETE FROM applicants WHERE crewid = '$gytid'");
							mysql_query("DELETE FROM recruiters WHERE crewid = '$gytid'");
							mysql_query("UPDATE users SET crewid = '0' WHERE crewid = '$gytid'");}

						elseif($isthereunderboss > '0'){
							mysql_query("UPDATE crews SET boss = '$crewunderboss' WHERE id = '$gytid'");
							mysql_query("DELETE FROM crewsunderboss WHERE crew = '$gytid'"); }

						else{
							$newbossa = mysql_query("SELECT username FROM users WHERE crewid = '$gytid' AND status = 'Alive' ORDER BY rankid DESC LIMIT 0,1");
							$newboss = mysql_fetch_array($newbossa);
							$newbossname = $newboss['username'];
							mysql_query("UPDATE crews SET boss = '$newbossname' WHERE id = '$gytid'");
						}
					}
				}
				mysql_query("UPDATE users SET status = 'Dead' WHERE username = '$ban' AND status = 'Alive'");
			}
			
            if(isset($_POST['dosearch'])){
				if (isset($_POST['captcha_need']) && $_POST['captcha'] != $_SESSION['rand_code']) {
					$showoutcome++; $outcome = "Verification code is not valid!";
				}
				elseif ((isset($_POST['captcha_need']) && $_POST['captcha'] == $_SESSION['rand_code']) || !isset($_POST['captcha_need'])) {
						$verificationcode = rand(1, 25);
						if ($verificationcode == '25') {
							$showcaptcha = true;
						}
						else {
                $neededd = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username = '$search'"));
                $needed = mysql_num_rows(mysql_query("SELECT * FROM protection WHERE username = '$usernameone'"));
                $hours='3';

                if($needed >= 1){ mysql_query("DELETE FROM protection WHERE username = '$usernameone'");
                    mysql_query("UPDATE users SET notification = 'Your protection has been removed!', notify = (notify + 1) WHERE ID = '$ida'"); }
                if($search == 'None'){}
                elseif($search == 'ChrisStrydes' && $missionid != 2){
                	if ($missionid < 2) {
						$showoutcome++;
						$outcome = "<span style='color:red'>ERROR:</span> You must complete mission #$missionid!";
					}
					if ($missionid > 2) {
						$showoutcome++;
						$outcome = "<span style='color:red'>ERROR:</span> You have already completed this mission!";
					}
				}
                elseif(in_array(strtolower(str_replace(' ', '', $search)), $assassins_list_simpled) && $missionid != 3){
                	if ($missionid < 3) {
						$showoutcome++;
						$outcome = "<span style='color:red'>ERROR:</span> You must complete mission #$missionid!";
					}
					if ($missionid > 3) {
						$showoutcome++;
						$outcome = "<span style='color:red'>ERROR:</span> You have already completed this mission!";
					}
				}
				elseif(in_array(strtolower(str_replace(' ', '', $search)), $assassins_list_simpled) && $missionid == 3){
					$curr_assassin_index = array_search(strtolower(str_replace(' ', '', $search)), $assassins_list_simpled);
					if ($current_guard < $curr_assassin_index) {
						$showoutcome++;
						//$outcome = "<span style='color:red'>ERROR:</span> You must kill Assassin <b style='color:gold'>" . $assassins_list[$current_guard] . "</b> now!";
						$outcome = "<span style='color:red'>ERROR:</span> You must kill <b style='color:gold'>" . $assassins_list[$current_guard] . "</b> before you can kill <b style='color:gold'>" . $assassins_list[$curr_assassin_index] . "</b>!";
					}
					elseif ($current_guard > $curr_assassin_index) {
						$showoutcome++;
						//$outcome = "<span style='color:red'>ERROR:</span> You must kill Assassin <b style='color:gold'>" . $assassins_list[$current_guard] . "</b> now!";
						$outcome = "<span style='color:red'>ERROR:</span> You have already killed <b style='color:gold'>" . $assassins_list[$curr_assassin_index] . "</b>. You must kill <b style='color:gold'>" . $assassins_list[$current_guard] . "</b> now!";
					}
	                else{

	                    $insert = time();
	                    $inserted = $hours * 3600 + $insert;
	                    mysql_query("INSERT INTO searches (victim,username,time,done,myid) VALUES('$search','$gangsterusername','$inserted','$insert','$ida')");
	                }
				}
                elseif($search == 'NicolasSarkozy' && $missionid != 5){
                	if ($missionid < 5) {
						$showoutcome++;
						$outcome = "<span style='color:red'>ERROR:</span> You must complete mission #$missionid!";
					}
					if ($missionid > 5) {
						$showoutcome++;
						$outcome = "<span style='color:red'>ERROR:</span> You have already completed this mission!";
					}
				}
                elseif($search == 'OsamaBinLaden' && $missionid != 7){
                	if ($missionid < 7) {
						$showoutcome++;
						$outcome = "<span style='color:red'>ERROR:</span> You must complete mission #$missionid!";
					}
					if ($missionid > 7) {
						$showoutcome++;
						$outcome = "<span style='color:red'>ERROR:</span> You have already completed this mission!";
					}
				}
                elseif($search == 'DonaldTrump' && $missionid != 10){
                	if ($missionid < 10) {
						$showoutcome++;
						$outcome = "<span style='color:red'>ERROR:</span> You must complete mission #$missionid!";
					}
					if ($missionid > 10) {
						$showoutcome++;
						$outcome = "<span style='color:red'>ERROR:</span> You have already completed this mission!";
					}
				}
                elseif($hours < '3'){$showoutcome++; $outcome = "It takes atleast 3 hours to find someone";}
                elseif($hours > '23'){$showoutcome++; $outcome = "You cannot search someone for more than 23 hours";}
                elseif($neededd > 0){$showoutcome++; $outcome = "This user is under protection";}
                elseif($countsearchesa >= 5){$showoutcome++; $outcome = "There is a maximum of 5 searches.";}

                else{

                    $insert = time();
                    $inserted = $hours * 3600 + $insert;
                    mysql_query("INSERT INTO searches (victim,username,time,done,myid) VALUES('$search','$gangsterusername','$inserted','$insert','$ida')");
                }
			}}}

            elseif(isset($_POST['dokill'])){
				if (isset($_POST['captcha_need']) && $_POST['captcha'] != $_SESSION['rand_code']) {
					$showoutcome++; $outcome = "Verification code is not valid!";
				}
				elseif ((isset($_POST['captcha_need']) && $_POST['captcha'] == $_SESSION['rand_code']) || !isset($_POST['captcha_need'])) {


                $pime = time(); $chei = floor($pime/240);
                if($chei != $_POST['cheki']){}else{
						$verificationcode = rand(1, 25);
						if ($verificationcode == '25') {
							$showcaptcha = true;
						}
						else {

                    $penpoints =$statustesttwo['penpoints'];

                    $checkuser = mysql_num_rows(mysql_query("SELECT username FROM users WHERE username = '$user'"));
                    $checkstaff = mysql_num_rows(mysql_query("SELECT username FROM users WHERE username = '$user' AND rankid < '25'"));
                    $protectedlol = mysql_num_rows(mysql_query("SELECT username FROM protection WHERE username = '$user'"));

					$bodyguard_query = mysql_query("SELECT * FROM bodyguards WHERE guarding='$usernameone'");
					$bodyguards = array();
					if (mysql_num_rows($bodyguard_query) > 0) {
						while ($bodyguard = mysql_fetch_object($bodyguard_query)) {
							$bodyguards[] = $bodyguard->username;
						}
						//print_r ($bodyguards);
					}

                    if(!$bullets){}
                    elseif($checkuser != '1'){$showoutcome++; $outcome = "No such user";}
                    elseif($checkstaff != '1'){$showoutcome++; $outcome = "You cannot shoot a member of <b>Infamous Gangsters</b>";}
                    elseif($protectedlol > '0'){$showoutcome++; $outcome = "This user is under protection";}
                    elseif($penpoints >= '2'){$showoutcome++; $outcome = "You have 2 or more penalty points and as a result cannot use the kill feature. Contact the Helpdesk or a member of <b>Infamous Gangsters</b> and explain why you got them, and hopefully they will clear them for you.";}
                    elseif($mybullets < $bullets){$showoutcome++; $outcome = "You dont have enough bullets";}

                    elseif($gun == '0'){$showoutcome++; $outcome = "You dont have a gun!";}
                    else{
                        $getinfo = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$user'"));
                        $getalive = $getinfo['status'];
                        
                        $user = $getinfo['username'];
                        $userkillid = $getinfo['ID'];
                        if($user == 'None'){die(' ');}
                        elseif($user == $gangsterusername){die(' ');}
                        elseif($user == 'Mitch'){die(' ');}

                        $getrankid = $getinfo['rankid'];
                        $protection = $getinfo['protection'];
                        $health = $getinfo['health'];
                        $userrecover = $getinfo['recover'];
                        $killlocation = $getinfo['location'];
                        $crewid = $getinfo['crewid'];

                        $timesby = mt_rand(65,104);
                        if($timesby < '100'){$timesby = 100;}

                        $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '3'"));
                        if($crewperk > 0 AND $getrankid < 21){ $getrankid = $getrankid + 2; }
                        if($crewperk > 0 AND $getrankid == 21){ $getrankid = 22; }

                        if ($getrankid == "1"){ $killbulletss="7000";}
                        elseif ($getrankid == "2"){ $killbulletss="7500";}
                        elseif ($getrankid == "3"){ $killbulletss="8000";}
                        elseif ($getrankid == "4"){ $killbulletss="8500";}
                        elseif ($getrankid == "5"){ $killbulletss="9000";}
                        elseif ($getrankid == "6"){ $killbulletss="9500";}
                        elseif ($getrankid == "7"){ $killbulletss="10000";}
                        elseif ($getrankid == "8"){ $killbulletss="12000";}
                        elseif ($getrankid == "9"){ $killbulletss="15500";}
                        elseif ($getrankid == "10"){ $killbulletss="17000";}
                        elseif ($getrankid == "11"){ $killbulletss="19000";}
                        elseif ($getrankid == "12"){ $killbulletss="26000";}
                        elseif ($getrankid == "13"){ $killbulletss="33000";}
                        elseif ($getrankid == "14"){ $killbulletss="40000";}
                        elseif ($getrankid == "15"){ $killbulletss="47000";}
                        elseif ($getrankid == "16"){ $killbulletss="53000";}
                        elseif ($getrankid == "17"){ $killbulletss="67000";}
                        elseif ($getrankid == "18"){ $killbulletss="81000";}
                        elseif ($getrankid == "19"){ $killbulletss="95000";}
                        elseif ($getrankid == "20"){ $killbulletss="102000";}
                        elseif ($getrankid == "21"){ $killbulletss="127000";}
                        elseif ($getrankid == "22"){ $killbulletss="152000";}

                        if ($rankid == "1"){ $lessbullets="0";}
                        elseif ($rankid == "2"){ $lessbullets="200";}
                        elseif ($rankid == "3"){ $lessbullets="400";}
                        elseif ($rankid == "4"){ $lessbullets="600";}
                        elseif ($rankid == "5"){ $lessbullets="800";}
                        elseif ($rankid == "6"){ $lessbullets="1000";}
                        elseif ($rankid == "7"){ $lessbullets="1200";}
                        elseif ($rankid == "8"){ $lessbullets="1400";}
                        elseif ($rankid == "9"){ $lessbullets="1600";}
                        elseif ($rankid == "10"){ $lessbullets="1800";}
                        elseif ($rankid == "11"){ $lessbullets="2000";}
                        elseif ($rankid == "12"){ $lessbullets="2200";}
                        elseif ($rankid == "13"){ $lessbullets="2400";}
                        elseif ($rankid == "14"){ $lessbullets="2600";}
                        elseif ($rankid == "15"){ $lessbullets="2800";}
                        elseif ($rankid == "16"){ $lessbullets="3000";}
                        elseif ($rankid == "17"){ $lessbullets="3200";}
                        elseif ($rankid == "18"){ $lessbullets="3400";}
                        elseif ($rankid == "19"){ $lessbullets="3600";}
                        elseif ($rankid >= "20"){ $lessbullets="3800";}
                        elseif ($rankid >= "21"){ $lessbullets="4000";}
                        elseif ($rankid >= "22"){ $lessbullets="4200";}

                        if ($gun == "0"){ $gunless="0";}
                        elseif ($gun == "1"){ $gunless="100";}
                        elseif ($gun == "2"){ $gunless="200";}
                        elseif ($gun == "3"){ $gunless="500";}
                        elseif ($gun == "4"){ $gunless="750";}
                        elseif ($gun == "5"){ $gunless="1000";}
                        elseif ($gun == "6"){ $gunless="1250";}
                        elseif ($gun == "7"){ $gunless="1500";}
                        elseif ($gun == "8"){ $gunless="1750";}
                        elseif ($gun == "9"){ $gunless="1800";}
                        elseif ($gun == "10"){ $gunless="2000";}

                        if ($protection == "0"){ $protectionadd="0";}
                        elseif ($protection == "1"){ $protectionadd="100";}
                        elseif ($protection == "2"){ $protectionadd="200";}
                        elseif ($protection == "3"){ $protectionadd="500";}
                        elseif ($protection == "4"){ $protectionadd="750";}
                        elseif ($protection == "5"){ $protectionadd="1000";}
                        elseif ($protection == "6"){ $protectionadd="1250";}
                        elseif ($protection == "7"){ $protectionadd="1500";}
                        elseif ($protection == "8"){ $protectionadd="1750";}
                        elseif ($protection == "9"){ $protectionadd="1800";}
                        elseif ($protection == "10"){ $protectionadd="2000";}
                        elseif ($protection == "11"){ $protectionadd="4000";}

                        $start = $killbulletss - $lessbullets;
                        $second = $start - $gunless;
                        $third = $second + $protectionadd;
                        $forth = $third / 100;
                        $amountneeded = $forth * $health;
                        $amountneeded = $amountneeded * 1;
                        $lastamount = round($amountneeded);

                        $new = round($bullets / $lastamount * 100);
                        $isit = $health - $new;

                        $penis = time();

                        $recover = time()+3600;
                        $dun = time()-10800;
                        $countsearchaaa = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' AND victim = '$user' ORDER BY id ASC LIMIT 1");
                        $rews = mysql_num_rows($countsearchaaa);
                        $countsearcha = mysql_fetch_array($countsearchaaa);
                        $donot = $countsearcha['done'];
                        $getbg = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$user' AND status = '2' ORDER BY id ASC LIMIT 0,1");
                        $getbgrows = mysql_num_rows($getbg);

                        $connectmea = mysql_query("SELECT * FROM users WHERE username = '$user'");
                        $connectme = mysql_fetch_array($connectmea);
                        $recoverybabe = $connectme['recover'];
                        $recoverthis = $recoverybabe - $aids;

                        if($getalive != 'Alive'){$showoutcome++; $outcome = "<span style='color:red'>ERROR:</span> This user is already dead!";}
                        elseif($rews == '0'){$showoutcome++; $outcome = "You do not know where this person is!";}
                        elseif($donot >= $dun){$showoutcome++; $outcome = "This user has not been found!";}
                        //elseif($userrecover > $penis){$showoutcome++; $outcome = "Target recovering! Recovered in $recoverthis seconds</font>";}
                        elseif($userrecover > $penis){$showoutcome++; $outcome = "<span style='color:red'>ERROR:</span> You have to wait before you make your next kill.";}
                        elseif($location != $killlocation){$showoutcome++; $outcome = "<span style='color:red'>ERROR:</span> You must travel to <b style='color:#FFC753;'>" . $fulllocation[$killlocation] . "</b> to kill this user!";}
                        elseif($bullets < 1000 && $getbgrows == '0'){$showoutcome++; $outcome = "This is not enough bullets to harm your victim!";}
                        elseif($getbgrows != '0'){
                            $getbginfo = mysql_fetch_array($getbg);
                            $bgname = $getbginfo['username'];
                            $showoutcome++; $outcome = "This user has a bodyguard named <b style='color:gold'>$bgname</b>, you will need to kill him before you can shoot at $user";}
                        elseif($isit > '0'){
                        	if (strtolower($user) == strtolower("ChrisStrydes") && $missionid == 2){
                        		$rand4 = rand(25,55);
								if (empty($bodyguards)) {
									mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets', `health`=`health`-'$rand4' WHERE username='$usernameone'");

									echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>ChrisStrydes</b>, He survived the shots. He shot back at you!";
								}
								else {
									$bodyguard_is_alive = false;
									foreach ($bodyguards as $bodyguard) {
										$bodyguard_info = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$bodyguard'"));
										if ($bodyguard_info['status'] == 'Dead' || $bodyguard_info['health'] <= 0) {
											$bodyguard_is_alive = false;
										}
										else {
											$bodyguard_is_alive = true;
											mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets' WHERE username='$usernameone'");
											mysql_query("UPDATE users SET `health`=`health`-'$rand4' WHERE username='$bodyguard'");
											if ($bodyguard_info['health'] - $rand4 <= 0) {
												setDead($bodyguard, $bodyguard_info['crewid']);
												echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>ChrisStrydes</b>, He survived the shots. He shot back at your bodyguard <b style='color:gold'>$bodyguard</b>! Your bodyguard <b style='color:gold'>$bodyguard</b> is dead!";
											}
											else {
												echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>ChrisStrydes</b>, He survived the shots. He shot back at your bodyguard <b style='color:gold'>$bodyguard</b>!";
											}
											break;
										}
									}
									if ($bodyguard_is_alive == false) {
										mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets', `health`=`health`-'$rand4' WHERE username='$usernameone'");

										if ($health - $rand4 <= 0) {
											setDead($usernameone, $crewid);
											echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>ChrisStrydes</b>, He survived the shots. He shot back at you! You are dead!";
										}
										else {
											echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>ChrisStrydes</b>, He survived the shots. He shot back at you!";
										}
									}
								}
                        	}
                        	elseif(in_array(strtolower(str_replace(' ', '', $user)), $assassins_list_simpled) && $missionid == 3){
								$rand4 = rand(25,55);
								$curr_assassin_index = array_search(strtolower(str_replace(' ', '', $user)), $assassins_list_simpled);
								$current_assassin = $assassins_list[$curr_assassin_index];

								if (empty($bodyguards)) {
									mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets', `health`=`health`-'$rand4' WHERE username='$usernameone'");

									echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>$current_assassin</b>, He survived the shots. He shot back at you!";
								}
								else {
									$bodyguard_is_alive = false;
									foreach ($bodyguards as $bodyguard) {
										$bodyguard_info = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$bodyguard'"));
										if ($bodyguard_info['status'] == 'Dead' || $bodyguard_info['health'] <= 0) {
											$bodyguard_is_alive = false;
										}
										else {
											$bodyguard_is_alive = true;
											mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets' WHERE username='$usernameone'");
											mysql_query("UPDATE users SET `health`=`health`-'$rand4' WHERE username='$bodyguard'");
											if ($bodyguard_info['health'] - $rand4 <= 0) {
												setDead($bodyguard, $bodyguard_info['crewid']);
												echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>$current_assassin</b>, He survived the shots. He shot back at your bodyguard <b style='color:gold'>$bodyguard</b>! Your bodyguard <b style='color:gold'>$bodyguard</b> is dead!";
											}
											else {
												echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>$current_assassin</b>, He survived the shots. He shot back at your bodyguard <b style='color:gold'>$bodyguard</b>!";
											}
											break;
										}
									}
									if ($bodyguard_is_alive == false) {
										mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets', `health`=`health`-'$rand4' WHERE username='$usernameone'");

										if ($health - $rand4 <= 0) {
											setDead($usernameone, $crewid);
											echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>$current_assassin</b>, He survived the shots. He shot back at you! You are dead!";
										}
										else {
											echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>$current_assassin</b>, He survived the shots. He shot back at you!";
										}
									}
								}
							}
							elseif (strtolower($user) == strtolower("NicolasSarkozy") && $missionid == 5){
								$rand4 = rand(25,55);
								if (empty($bodyguards)) {
									mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets', `health`=`health`-'$rand4' WHERE username='$usernameone'");

									echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Nicolas Sarkozy</b>, He survived the shots. He shot back at you!";
								}
								else {
									$bodyguard_is_alive = false;
									foreach ($bodyguards as $bodyguard) {
										$bodyguard_info = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$bodyguard'"));
										if ($bodyguard_info['status'] == 'Dead' || $bodyguard_info['health'] <= 0) {
											$bodyguard_is_alive = false;
										}
										else {
											$bodyguard_is_alive = true;
											mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets' WHERE username='$usernameone'");
											mysql_query("UPDATE users SET `health`=`health`-'$rand4' WHERE username='$bodyguard'");
											if ($bodyguard_info['health'] - $rand4 <= 0) {
												setDead($bodyguard, $bodyguard_info['crewid']);
												echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Nicolas Sarkozy</b>, He survived the shots. He shot back at your bodyguard <b style='color:gold'>$bodyguard</b>! Your bodyguard <b style='color:gold'>$bodyguard</b> is dead!";
											}
											else {
												echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Nicolas Sarkozy</b>, He survived the shots. He shot back at your bodyguard <b style='color:gold'>$bodyguard</b>!";
											}
											break;
										}
									}
									if ($bodyguard_is_alive == false) {
										mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets', `health`=`health`-'$rand4' WHERE username='$usernameone'");

										if ($health - $rand4 <= 0) {
											setDead($usernameone, $crewid);
											echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Nicolas Sarkozy</b>, He survived the shots. He shot back at you! You are dead!";
										}
										else {
											echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Nicolas Sarkozy</b>, He survived the shots. He shot back at you!";
										}
									}
								}
							}
		                    elseif (strtolower($user) == strtolower("OsamaBinLaden") && $missionid == 7){
								$rand4 = rand(25,55);
								if (empty($bodyguards)) {
									mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets', `health`=`health`-'$rand4' WHERE username='$usernameone'");

									echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Osama Bin Laden</b>, He survived the shots. He shot back at you!";
								}
								else {
									$bodyguard_is_alive = false;
									foreach ($bodyguards as $bodyguard) {
										$bodyguard_info = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$bodyguard'"));
										if ($bodyguard_info['status'] == 'Dead' || $bodyguard_info['health'] <= 0) {
											$bodyguard_is_alive = false;
										}
										else {
											$bodyguard_is_alive = true;
											mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets' WHERE username='$usernameone'");
											mysql_query("UPDATE users SET `health`=`health`-'$rand4' WHERE username='$bodyguard'");
											if ($bodyguard_info['health'] - $rand4 <= 0) {
												setDead($bodyguard, $bodyguard_info['crewid']);
												echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Osama Bin Laden</b>, He survived the shots. He shot back at your bodyguard <b style='color:gold'>$bodyguard</b>! Your bodyguard <b style='color:gold'>$bodyguard</b> is dead!";
											}
											else {
												echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Osama Bin Laden</b>, He survived the shots. He shot back at your bodyguard <b style='color:gold'>$bodyguard</b>!";
											}
											break;
										}
									}
									if ($bodyguard_is_alive == false) {
										mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets', `health`=`health`-'$rand4' WHERE username='$usernameone'");

										if ($health - $rand4 <= 0) {
											setDead($usernameone, $crewid);
											echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Osama Bin Laden</b>, He survived the shots. He shot back at you! You are dead!";
										}
										else {
											echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Osama Bin Laden</b>, He survived the shots. He shot back at you!";
										}
									}
								}
							}
		                    elseif (strtolower($user) == strtolower("DonaldTrump") && $missionid == 10){
								$rand4 = rand(25,55);
								if (empty($bodyguards)) {
									mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets', `health`=`health`-'$rand4' WHERE username='$usernameone'");

									echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Donald Trump</b>, He survived the shots. He shot back at you!";
								}
								else {
									$bodyguard_is_alive = false;
									foreach ($bodyguards as $bodyguard) {
										$bodyguard_info = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$bodyguard'"));
										if ($bodyguard_info['status'] == 'Dead' || $bodyguard_info['health'] <= 0) {
											$bodyguard_is_alive = false;
										}
										else {
											$bodyguard_is_alive = true;
											mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets' WHERE username='$usernameone'");
											mysql_query("UPDATE users SET `health`=`health`-'$rand4' WHERE username='$bodyguard'");
											if ($bodyguard_info['health'] - $rand4 <= 0) {
												setDead($bodyguard, $bodyguard_info['crewid']);
												echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Donald Trump</b>, He survived the shots. He shot back at your bodyguard <b style='color:gold'>$bodyguard</b>! Your bodyguard <b style='color:gold'>$bodyguard</b> is dead!";
											}
											else {
												echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Donald Trump</b>, He survived the shots. He shot back at your bodyguard <b style='color:gold'>$bodyguard</b>!";
											}
											break;
										}
									}
									if ($bodyguard_is_alive == false) {
										mysql_query("UPDATE users SET `bullets`=`bullets`-'$bullets', `health`=`health`-'$rand4' WHERE username='$usernameone'");

										if ($health - $rand4 <= 0) {
											setDead($usernameone, $crewid);
											echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Donald Trump</b>, He survived the shots. He shot back at you! You are dead!";
										}
										else {
											echo "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>Donald Trump</b>, He survived the shots. He shot back at you!";
										}
									}
								}
							}
                        	else {
								$showoutcome++; $outcome = "You shot <b style='color:gold'>$bullets</b> bullets at $user but he survived! $user lost $new% health!";

	                            $bulletsshot = number_format($bullets);
	                            $homeinfo = "\[b\]$usernameone\[\/b\] shot at \[b\]$user\[\/b\] with $bulletsshot bullets, they survived the shots!";
	                            mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$user','$homeinfo','2')");
	                            mysql_query("UPDATE users SET recover = '$recover' WHERE ID = '$userkillid'");
	                            mysql_query("UPDATE users SET health = (health - $new) WHERE ID = '$userkillid'");
	                            mysql_query("UPDATE users SET bullets = (bullets - $bullets) WHERE ID = '$ida'");
	                            mysql_query("UPDATE loggedin SET killfailed = (killfailed + 1) WHERE username = '$usernameone'");
	                            mysql_query("INSERT INTO attempts(username,victim,ip,type,bullets)
								VALUES ('$gangsterusername','$user','$userip','2','$bullets')");
							}
                            
						}
                        else{
                            $ban = $user;
                            $check_mission_bot = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$ban'"));
                            if ($check_mission_bot['mission_bot'] == 0) {
                            	mysql_query("UPDATE users SET status = 'Dead' WHERE username = '$ban' AND status = 'Alive'");
                            	if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1><span style="color:red">ERROR:</span> This user is already dead!</font>');}
							}

                            if($_POST['showname'] == 1){ $meh = 1; }else{ $meh = 0; }
                            $bulletsshot = number_format($bullets);
                            mysql_query("UPDATE users SET kills = kills + 1 WHERE ID = '$ida' AND kills = '$totalkills'");
                            if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
                            mysql_query("INSERT INTO attempts(username,victim,ip,type,bullets)VALUES ('$gangsterusername','$ban','$userip','1','$bullets')");
                            //$showoutcome++; $outcome = "You shot at $ban, he died from the shots!";
                            $showoutcome++; $outcome = "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>$ban</b>, he died!";
                            if($meh == 1){ $homeinfo = "\[b\]$usernameone\[\/b\] shot at \[b\]$ban\[\/b\] with $bulletsshot bullets, they died from the shots!"; }
                            else{ $homeinfo = "\[b\]$ban\[\/b\] was shot at with $bulletsshot bullets, they died from the shots!"; }
                            mysql_query("INSERT INTO home(`username`,`update`,`type`) VALUES ('$gangsterusername','$homeinfo','2')");
                            mysql_query("DELETE FROM usersonline WHERE username = '$ban'");
                            mysql_query("DELETE FROM buycasinos WHERE username = '$ban'");
                            mysql_query("UPDATE users SET deathmessage = '$reason' WHERE username = '$ban'");
                            mysql_query("UPDATE loggedin SET killdone = (killdone + 1) WHERE username = '$usernameone'");

                            $ifoac = mysql_num_rows(mysql_query("SELECT * FROM oac WHERE target = '$ban'"));
                            if($ifoac != 0){
                                $getrewardinfo = mysql_query("SELECT * FROM oac WHERE target = '$ban'");
                                $getinfo = mysql_fetch_array($getrewardinfo);
                                $givereward = $getinfo['reward'];

                                mysql_query("DELETE FROM oac WHERE target = '$ban'");
                                mysql_query("UPDATE users SET money = (money + $givereward) WHERE ID = '$ida'");

                                if($rankid == '1'){ $update = '1.5';$newrank = 'Civilian';}
                                elseif($rankid == '2'){ $update = '0.9';$newrank = 'Recruit';}
                                elseif($rankid == '3'){ $update = '0.4';$newrank = 'Vandal';}
                                elseif($rankid == '4'){ $update = '0.2';$newrank = 'Crafter';}
                                elseif($rankid == '5'){ $update = '0.14';$newrank = 'Respected Crafter';}
                                elseif($rankid == '6'){ $update = '0.09';$newrank = 'Businessman';}
                                elseif($rankid == '7'){ $update = '0.04';$newrank = 'Respected Businessman';}
                                elseif($rankid == '8'){ $update = '0.02';$newrank = 'Infamous Businessman';}
                                elseif($rankid == '9'){ $update = '0.01';$newrank = 'Hitman';}
                                elseif($rankid == '10'){ $update = '0.009';$newrank = 'Respected Hitman';}
                                elseif($rankid == '11'){ $update = '0.008';$newrank = 'Infamous Hitman';}
                                elseif($rankid == '12'){ $update = '0.006';$newrank = 'Godfather';}
                                elseif($rankid == '13'){ $update = '0.004';$newrank = 'Respected Godfather';}
                                elseif($rankid == '14'){ $update = '0.00099';$newrank = 'Infamous Godfather';}
                                elseif($rankid == '15'){ $update = '0.00098';$newrank = 'Don';}
                                elseif($rankid == '16'){ $update = '0.00097';$newrank = 'Respected Don';}
                                elseif($rankid == '17'){ $update = '0.0007';$newrank = 'Infamous Don';}
                                elseif($rankid == '18'){ $update = '0.0006';$newrank = 'Gangster';}
                                elseif($rankid == '19'){ $update = '0.0005';$newrank = 'Respected Gangster';}
                                elseif($rankid == '20'){ $update = '0.0004';$newrank = '<b>American Gangster</b>';}
                                elseif($rankid == '21'){ $update = '0.0003';$newrank = '<font color=#FFC753><b>Infamous Gangster</b></font>';}

                                if($rankid <= 21){
                                    if(($rankup + $update) > ('100')){
                                        $newrankup = $rankup + $update - 100;
                                        $sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
                                        mysql_query("UPDATE users SET rankid = rankid + 1, money = (money + '$givereward') WHERE ID = '$ida'");
                                        mysql_query("UPDATE users SET rankup = $newrankup WHERE ID = '$ida'");
                                        mysql_query("UPDATE users SET bullets = bullets + 1000 WHERE ID = '$ida'");
                                        mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
                                    }else{mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
                                    }}}
                            if($ifoac < 1){
                                $ws = mysql_query("SELECT * FROM usersonline WHERE username != '$gangsterusername' ORDER BY RAND()");
                                $wsrows = mysql_num_rows($ws);
                                if($wsrows > '0'){

                                    if($silencer == '1'){$change = 13;}else{$change = 8;}
                                    $manya = ceil($wsrows / $change);
                                    $wsa = mysql_query("SELECT * FROM usersonline WHERE username != '$gangsterusername' AND username != 'Steven' AND username != 'Mitch' ORDER BY RAND() LIMIT $manya");
                                    while($sendtopeople = mysql_fetch_array($wsa)){
                                        $sendtoname = $sendtopeople['username'];
                                        $timeleftt=time();
                                        mysql_query("INSERT INTO witnessstatements(username,killer,killed,timeleft) VALUES ('$sendtoname','$gangsterusername','$ban','$timeleftt')");
                                        mysql_query("UPDATE users SET notification = 'You have a new witness statement!', notify = (notify + 1) WHERE username = '$sendtoname'");
                                    }}}

                            mysql_query("INSERT INTO kills(`victim`,`reason`,`killer`,`killerip`,`rankid`,`show`)
VALUES ('$ban','$reason','$gangsterusername','$userip','$getrankid','$meh')");

                            $hitlist = mysql_query("SELECT * FROM hitlist WHERE username = '$ban'");
                            $hitlistrows = mysql_num_rows($hitlist);
                            if($hitlistrows > '0'){
                                while ($array = mysql_fetch_array($hitlist)){
                                    $htype = $array['type'];
                                    $amount = $array['amount'];
                                    $victimid = $array['id'];

                                    mysql_query("DELETE FROM hitlist WHERE id = '$victimid'");
                                    if($htype == 1){ mysql_query("UPDATE users SET money = (money + $amount) WHERE ID = '$ida'"); }else{
                                        mysql_query("UPDATE users SET points = (points + $amount) WHERE ID = '$ida'"); }
                                }}
                            $missioncrew = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$ban' AND crewid > '0'"));
                            mysql_query("UPDATE users SET bullets = (bullets - $bullets) WHERE ID = '$ida'");
                            mysql_query("UPDATE `missiontasks` SET `kill` = `kill` + '1' WHERE `username` = '$usernameone'");
                            if($missioncrew > '0'){ mysql_query("UPDATE missiontasks SET killcrew = killcrew + 1 WHERE username = '$usernameone'"); }
                            mysql_query("DELETE FROM hospital WHERE username = '$ban'");
                            mysql_query("DELETE FROM robbery WHERE invite = '$ban'");
                            mysql_query("DELETE FROM blackjack WHERE username = '$ban'");
                            mysql_query("DELETE FROM jail WHERE username = '$ban'");
                            mysql_query("DELETE FROM buycasinos WHERE username = '$ban'");
                            mysql_query("DELETE FROM travel WHERE username = '$ban'");
                            mysql_query("UPDATE cars SET price = '0' WHERE owner = '$ban'");
                            mysql_query("UPDATE cars SET owner = '$gangsterusername' WHERE owner = '$ban' AND garage != '1'");
                            mysql_query("DELETE FROM crewsunderboss WHERE username = '$ban'");
                            
                            if (trim(strtolower($user)) == strtolower("ChrisStrydes") && $missionid == 2){
								$newadd = rand(40000000,85000000);
								$newadd2 = number_format($newadd);
								$date = date("Y-m-d H:i:s");

								mysql_query("UPDATE users SET `mission`=`mission`+'1', `money`=`money`+'$newadd' WHERE username='$usernameone'");
								mysql_query("UPDATE users SET `mail`='1', `bullets`=`bullets`+'50000' WHERE username='$usernameone'");
								mysql_query("INSERT INTO `messages` (`sentto`, `sentfrom`, `info`, `time`, `new`, `d`) 
								VALUES ('$usernameone', '$usernameone', 'You recieved <b>$$newadd2</b> and <b>50000</b> bullets from rescuing the president pt2, please check missions for your next mission!', '$date', '0', '0')");
							
                            }

                            elseif(in_array(trim(strtolower(str_replace(' ', '', $user))), $assassins_list_simpled) && $missionid == 3){
								$curr_assassin_index = array_search(strtolower(str_replace(' ', '', $user)), $assassins_list_simpled);
								$current_assassin = $assassins_list[$curr_assassin_index];
                            	mysql_query("UPDATE users SET `guard`=`guard`+'1' WHERE username='$usernameone'");
								$date = date("Y-m-d H:i:s");
								if ($current_guard == 32) {
									mysql_query("UPDATE users SET `mail`='1', `bullets`=`bullets`+'50000' WHERE username='$usernameone'");
									mysql_query("INSERT INTO `messages` (`sentto`, `sentfrom`, `info`, `time`, `new`, `d`) 
									VALUES ('$usernameone', '$usernameone', 'You recieved <b style=\'color:gold\'>50000 bullets</b> from killing <b style=\'color:gold\'>$current_assassin</b>!', '$date', '0', '0')");
									
								}
								if ($current_guard == 33) {
									mysql_query("UPDATE users SET `mission`=`mission`+'1' WHERE username='$usernameone'");
									mysql_query("UPDATE users SET `mail`='1', `points`=`points`+'1000' WHERE username='$usernameone'");
									mysql_query("INSERT INTO `messages` (`sentto`, `sentfrom`, `info`, `time`, `new`, `d`) 
									VALUES ('$usernameone', '$usernameone', 'You recieved <b style=\'color:gold\'>1000 points</b> from killing <b style=\'color:gold\'>$current_assassin</b>!', '$date', '0', '0')");
								}
                            }

                            elseif (trim(strtolower($user)) == strtolower("NicolasSarkozy") && $missionid == 5){
								$newadd = rand(350000000,400000000);
								$newadd2 = number_format($newadd);
								$date = date("Y-m-d H:i:s");

								mysql_query("UPDATE users SET `mission`=`mission`+'1', `money`=`money`+'$newadd' WHERE username='$usernameone'");
								mysql_query("UPDATE users SET `mail`='1', `bullets`=`bullets`+'50000' WHERE username='$usernameone'");
								mysql_query("INSERT INTO `messages` (`sentto`, `sentfrom`, `info`, `time`, `new`, `d`) 
								VALUES ('$usernameone', '$usernameone', 'You recieved <b>$$newadd2</b> and <b>50,000</b> bullets from killing the french president, please check missions for your next mission!', '$date', '0', '0')");
							}

                            elseif (trim(strtolower($user)) == strtolower("OsamaBinLaden") && $missionid == 7){
								$newadd = rand(450000000,500000000);
								$newadd2 = number_format($newadd);
								$date = date("Y-m-d H:i:s");

								mysql_query("UPDATE users SET `mission`=`mission`+'1', `money`=`money`+'$newadd' WHERE username='$usernameone'");
								mysql_query("UPDATE users SET `mail`='1', `bullets`=`bullets`+'60000' WHERE username='$usernameone'");
								mysql_query("INSERT INTO `messages` (`sentto`, `sentfrom`, `info`, `time`, `new`, `d`) 
								VALUES ('$usernameone', '$usernameone', 'You recieved <b>$$newadd2</b> and <b>60,000</b> bullets from killing Osama Bin Laden, please check missions for your next mission!', '$date', '0', '0')");
							}

                            elseif (trim(strtolower($user)) == strtolower("DonaldTrump") && $missionid == 10){
								$newadd = rand(600000000,1000000000);
								$newadd2 = number_format($newadd);
								$date = date("Y-m-d H:i:s");

								mysql_query("UPDATE users SET `mission`=`mission`+'1', `money`=`money`+'$newadd' WHERE username='$usernameone'");
								mysql_query("UPDATE users SET `mail`='1', `points`=`points`+'1500' WHERE username='$usernameone'");
								mysql_query("INSERT INTO `messages` (`sentto`, `sentfrom`, `info`, `time`, `new`, `d`) 
								VALUES ('$usernameone', '$usernameone', 'You recieved <b>$$newadd2</b> and <b>1500</b> points from killing Donald Trump. Well Done! You have completed all the current missions!', '$date', '0', '0')");
							}

                            $bank = mysql_query("SELECT * FROM bank WHERE username = '$ban'");
                            $banks = mysql_num_rows($bank);
                            if($banks != '0'){
                                $banka = mysql_fetch_array($bank);
                                $amount = $banka['amount'];
                                mysql_query("UPDATE users SET money = (money + $amount) WHERE username = '$ban'");
                                mysql_query("DELETE FROM bank WHERE username = '$ban'");
                            }

                            $casinotest = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$ban'"));
                            if($casinotest == '1'){$showoutcome++; $outcome = "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>$ban</b>! He died! You now own there casino!";mysql_query("UPDATE casinos SET owner = '$gangsterusername' WHERE owner = '$ban'");mysql_query("UPDATE casinos SET nickname = '$gangsterusername' WHERE nickname = '$ban'");}
                            elseif($casinotest > '1'){$showoutcome++; $outcome = "You shot <b style='color:gold'>$bullets</b> bullets at <b style='color:gold'>$ban</b>! He died! You now own there casinos!</font>";mysql_query("UPDATE casinos SET owner = '$gangsterusername' WHERE owner = '$ban'");mysql_query("UPDATE casinos SET nickname = '$gangsterusername' WHERE nickname = '$ban'");}else{}

                            mysql_query("DELETE FROM buycasinos WHERE username = '$ban'");
                            mysql_query("DELETE FROM bodyguards WHERE username = '$ban'");

                            if($crewid != '0'){
                                $boss = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss = '$ban'"));

                                if($boss > '0'){
                                    $getreelid = mysql_fetch_array(mysql_query("SELECT * FROM crews WHERE boss = '$ban'"));
                                    $gytid = $getreelid['id'];

                                    $isthereunderboss = mysql_num_rows(mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$gytid'"));
                                    if($isthereunderboss > 0){
                                        $getcrewunderboss = mysql_query("SELECT * FROM crewsunderboss WHERE crew = '$gytid'");
                                        $underbossinfo = mysql_fetch_array($getcrewunderboss);
                                        $crewunderboss = $underbossinfo['username']; }

                                    $members = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid = '$gytid' AND status = 'Alive'"));
                                    if($members < 1){ mysql_query("DELETE FROM crews WHERE boss = '$ban'");
                                        mysql_query("DELETE FROM applicants WHERE crewid = '$gytid'");
                                        mysql_query("DELETE FROM recruiters WHERE crewid = '$gytid'");
                                        mysql_query("UPDATE users SET crewid = '0' WHERE crewid = '$gytid'");}

                                    elseif($isthereunderboss > '0'){
                                        mysql_query("UPDATE crews SET boss = '$crewunderboss' WHERE id = '$gytid'");
                                        mysql_query("DELETE FROM crewsunderboss WHERE crew = '$gytid'"); }

                                    else{
                                        $newbossa = mysql_query("SELECT username FROM users WHERE crewid = '$gytid' AND status = 'Alive' ORDER BY rankid DESC LIMIT 0,1");
                                        $newboss = mysql_fetch_array($newbossa);
                                        $newbossname = $newboss['username'];
                                        mysql_query("UPDATE crews SET boss = '$newbossname' WHERE id = '$gytid'");}}}
			}}}}}}

            $countsearcha = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername'");
            $countsearchesa = mysql_num_rows($countsearcha);
            while($getsearchess = mysql_fetch_array($countsearcha)){
                $searchnamee = $getsearchess['victim'];
                $victimdead = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$searchnamee' AND status = 'Dead'"));
                if($victimdead > 0){ mysql_query("DELETE FROM searches WHERE victim = '$searchnamee'"); }}

            if($orderby == '1'){
                $countsearch = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' ORDER BY victim ASC LIMIT $selectfrom,$selectto ");}

            elseif($orderby == '2'){
                $countsearch = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' ORDER BY id ASC LIMIT $selectfrom,$selectto ");}


            else{
                $countsearch = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' ORDER BY id DESC LIMIT $selectfrom,$selectto ");}

            $countsearches = mysql_num_rows($countsearch);
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
                                Kill
                            </div>
                            <div style="padding: 8px; padding-top: 32px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;">
                                <table class="regTable" style="margin-bottom: 3px; width: 90%; max-width: 480px;" cellspacing="0" cellpadding="0" align="center">
                                    <tbody><tr>
                                        <td class="header" colspan="2">
                                            Kill User
                                        </td>
                                    </tr>
                                    <form method="post">
                                        <input type=hidden name=cheki value=<? $pime = time(); $chei = floor($pime/240); echo"$chei"; ?>>
                                        <tr>
                                            <td><input name="user" class="textarea noTop" style="border-left: 0; width: 100%;" placeholder="Enter Victim's Username..." value="" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td><input name="bullets" class="textarea" style="border-left: 0; width: 100%;" placeholder="Enter Bullets..." value="" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td><textarea name="reason" class="textarea" style="height: 69px; border-left: 0; width: 100%;" placeholder="Enter Death Message (Optional)..."></textarea></td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0; background-color: #323232;">
                                                <label style="padding: 8px; text-align: center; display: block;font-size:10px;" for="make_public">Hide to Public Activity and Game Stats: <input style="margin-left: 3px;" id="make_public" name=showname value="1" type="checkbox"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="dokill" class="textarea curve3pxBottom" style="border-left: 0; width: 100%; padding-left: 6px; padding-right: 6px;" value="Shoot" type="submit">
                                            </td>
                                        </tr>
										<?php if ($showcaptcha == true): ?>
										<div style="margin-top: 10px; margin-bottom: 10px;">
											<label for="captcha_txt"><img src="captcha_generate.php" style="height: 24px;"></label>
											<input class="textarea" value="" id="captcha_txt" name="captcha" placeholder="Enter Code..." type="text">
											<input type="hidden" name="captcha_need" value="1">
											<!--<input type="submit" value="Submit" class="textarea" style="display: inline-block" name="captcha_btn">-->
										</div>
										<?php endif; ?>
                                    </form>
                                    </tbody>
                                </table>
                                <center>
                                    <a href="calc.php" style="display: inline-block; margin-top: 7px; padding: 3px; font-size: 12px; " target="_blank">How many bullets do I need to fire?</a>
                                </center>
                                <div class="break" style="padding-top: 39px;"></div>
                                <div class="spacer"></div>
                                <div class="break" style="padding-top: 37px;"></div>
                                <div class="col left-col">
                                    <div style="font-size: 12px;margin-bottom: 14px;">To kill a user, you must first locate them:</div>
                                    <table class="regTable" style="margin-bottom: 11px; width: 300px; min-width: 0;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody><tr>
                                            <td class="header" colspan="2">
                                                Search User
                                            </td>
                                        </tr>
                                        <form method="post">
                                            <tr>
                                                <td colspan="2"><input name="search" autofocus="" class="textarea noTop" style="border-left: 0; width: 100%;" placeholder="Enter Username..." value="" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input name="dosearch" class="textarea curve3pxBottom" style="border-left: 0; width: 100%; padding-left: 6px; padding-right: 6px;" value="Find" type="submit">
                                                </td>
                                            </tr>
										<?php if ($showcaptcha == true): ?>
										<div style="margin-top: 10px; margin-bottom: 10px;">
											<label for="captcha_txt"><img src="captcha_generate.php" style="height: 24px;"></label>
											<input class="textarea" value="" id="captcha_txt" name="captcha" placeholder="Enter Code..." type="text">
											<input type="hidden" name="captcha_need" value="1">
											<!--<input type="submit" value="Submit" class="textarea" style="display: inline-block" name="captcha_btn">-->
										</div>
										<?php endif; ?>
                                        </form>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col right-col">
                                    <div style="font-size: 12px;margin-bottom: 14px;">Each search takes 3 hours to complete:</div>
                                    <div style="margin-bottom: 14px;">
                                        <label>Filter: <input class="textarea js-filter-searches" placeholder="Enter username..." type="text"></label>
                                    </div>
                                    <table id="kill_search_tb" class="regTable" style="margin-bottom: 11px; width: 93%; min-width: 330px; max-width: 480px;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                        <tr>
                                            <td class="header" colspan="2">
                                                My Searches (<span style="color: silver;"><?echo$countsearchesa;?></span>)
                                            </td>
                                        </tr>
                                        <?if($countsearchesa != '0'){?>
                                        <form method=post>
                                            <? while($getsearches = mysql_fetch_array($countsearch)){
                                                $searchname = $getsearches['victim'];
                                                $searchtime = $getsearches['time'];
                                                $searchdone = $getsearches['done'];
                                                $tewy = $getsearches['id'];
                                                $tym = time();
                                                $threehours = $tym - 10800;
                                                $timeleft = $searchtime - $tym;
                                                $totalh = $timeleft / 3600;
                                                $totalh = floor($totalh);
                                                if($totalh < '10'){ $leading = 0;}else{$leading = "";}
                                                if($searchdone <= $threehours){
                                                    $getsug = mysql_fetch_array(mysql_query("SELECT * FROM suggestions WHERE username = '$searchname'"));
                                                    $getsugid = $getsug['id'];

                                                    $getnameinfo = mysql_query("SELECT location FROM users WHERE ID = '$getsugid'");
                                                    $getnameinfoarray = mysql_fetch_array($getnameinfo);
                                                    $getnamelocation = $getnameinfoarray['location'];

                                                    $status = "Found <a href=\"viewprofile.php?username=".$searchname."\"><b>".$searchname."</b></a> in ".$getnamelocation;
                                                }else{
                                                    $status = "Searching for <a href=\"viewprofile.php?username=".$searchname."\"><b>".$searchname."</b></a>...";
                                                }
                                                ?>
                                                <script>

                                                    function delsearch<?echo$tewy;?>(){
                                                        urnamed=<?echo$tewy;?>;
                                                        var ajaxRequest;
                                                        try{ajaxRequest = new XMLHttpRequest();} catch (e){
                                                            try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
                                                                try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){
                                                                    alert("Your browser broke1!");return false;}}}

                                                        var strhehefd = "&rand="+Math.random();
                                                        ajaxRequest.open("GET", "delsrch.php?id=" + urnamed + strhehefd, true);
                                                        ajaxRequest.send(null);
                                                       var row2= document.getElementById('srchbar<?echo$tewy;?>');
                                                        row2.parentNode.removeChild(row2);


                                                        if(document.getElementById('kill_search_tb').getElementsByTagName("tbody")[0].getElementsByTagName("tr").length==1){
                                                            var texto="<td class='col' colspan='3' style='color: #dddddd; padding-right: 10px;'>No searches to show.</td>";
                                                            document.getElementById('kill_search_tb').getElementsByTagName("tbody")[0].innerHTML+=texto;
                                                        }

                                                    }
                                                </script>
                                                <tr id=srchbar<?echo$tewy;?>>
                                                    <td colspan="2">
                                                        <div class="preventscroll" style="max-height: 300px; overflow-y: auto; margin-top: -1px;">
                                                            <table class="regTable inner" cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                <tr class="row js-search-row">
                                                                    <td class="col " style="border-left: 4px solid #D77D00;  padding-right: 10px;">
                                                                        <?echo$status;?>
                                                                    </td>
                                                                    <td class="col" style="width: 20%; padding-right: 10px; color: #a0a0a0;">
                                                                        <span class="timers" data-time-left="<?echo$timeleft;?>"><? if($timeleft < '0'){echo"00:00:00";}else{echo "$leading";echo "$totalh"; echo date( ":i:s", $searchtime - $tym);}?></span>
                                                                    </td>
                                                                    <td class="col" style="width: 20%; padding-right: 10px; color: #a0a0a0;">
                                                                        <a href="#" onclick="delsearch<?echo$tewy;?>(); return false;" style="opacity:0.5;">(delete)</a>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?}
                                            }else{?>
                                                <td class="col" colspan="3" style="color: #dddddd; padding-right: 10px;">No searches to show.</td>
                                            <?}?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="clear"></div>
                                <div class="break" style="padding-top: 10px;"></div>
                                <div class="spacer"></div>
                                <div class="break" style="padding-top: 23px;"></div>
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
<script>
    function timers(){
        var counters=$(".timers");
        for(var i=0;i<counters.length;i++){
            var counter=$(counters[i]);
            var timeLeft=parseInt($(counter).attr("data-time-left"));
            if(timeLeft<=0){
                $(counter).html("Available!");
                counter.parent().eq(0).parent().eq(0).children(0).eq(0).css('border-left','4px solid green');
                continue;
            }
            var hrs=Math.floor(timeLeft/3600);
            var mins=Math.floor((Math.floor(timeLeft%3600))/ 60);
            var secs=Math.floor((Math.floor(timeLeft%60))%60);
            if(secs<=9)secs='0'+ secs;
            if(mins<=9)mins='0'+ mins;
            if(hrs<=9)hrs='0'+ hrs;
            $(counter).html(hrs+':'+ mins+':'+ secs);
            timeLeft--;
            $(counter).attr("data-time-left",timeLeft);
        }
        setTimeout(timers,1000);
    }
    $(document).on("ready",timers());
</script>
</body>
</html>