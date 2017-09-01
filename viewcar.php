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

            $time = time();
            $times = $time + 300;
            $saturate = "/[^a-z0-9]/i";
            $saturated = "/[^0-9]/i";
            $sessionidraw = $_COOKIE['PHPSESSID'];
            $sessionid = preg_replace($saturate,"",$sessionidraw);
            $userip = $_SERVER[REMOTE_ADDR];
            $getida = mysql_real_escape_string($_GET['id']);
            $moddropa = mysql_real_escape_string($_GET['x']);
            $getid = preg_replace($saturated,"",$getida);
            $moddrop = preg_replace($saturated,"",$moddropa);
            $gangsterusername = $usernameone;
            $cash = $statustesttwo['money'];

            if(isset($_GET['id'])){
                $dropexist = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE id = $getid"));
                if($dropexist < '1'){ }
                else{
                    $getpic = mysql_fetch_array(mysql_query("SELECT * FROM cars WHERE id = $getid"));
                    $getcarid = $getpic['carid'];
                    $getdmg = $getpic['damage'];
                    $getowner = $getpic['owner'];
                    $carname = $getpic['carname'];
                    $carimage = $getpic['image'];
                    $pwice = $getpic['price'];
                    $garage = $getpic['garage'];
					$speed = $getpic['speed'];
					$bullets = $getpic['bullets'];
                    if($garage == '1'){ $comment = "<font size=1 color=khaki face=verdana>&nbsp;Remove from Garage</font>"; }else{ $comment = "<font size=1 color=khaki face=verdana>&nbsp;Add to Garage</font>"; }
                    if($garage == '1'){ $yesorno = "0"; }else{ $yesorno = "1"; }
                    if($getcarid == 1){$getcarname = 'Volvo';}
                    elseif($getcarid == 2){$getcarname = 'Renault Clio';}
                    elseif($getcarid == 3){$getcarname = 'Porsche 911';}
                    elseif($getcarid == 4){$getcarname = 'BMW';}
                    elseif($getcarid == 5){$getcarname = 'Aston Martin';}
                    elseif($getcarid == 6){$getcarname = 'Alfa Romeo';}
                    elseif($getcarid == 7){$getcarname = 'Continental GT';}
                    elseif($getcarid == 8){$getcarname = 'Maybach 62';}
                    elseif($getcarid == 9){$getcarname = 'Maserati';}
                    elseif($getcarid == 10){$getcarname = 'Audi TT';}
                    elseif($getcarid == 11){$getcarname = 'Porsche Carrera GT';}
                    elseif($getcarid == 12){$getcarname = 'Pagani Zonda';}
                    elseif($getcarid == 13){$getcarname = $carname;}
                    elseif($getcarid == 14){$getcarname = 'Bugatti Veyron';}
                    elseif($getcarid == 15){$getcarname = 'Ferrari 458 Italia';}
                    elseif($getcarid == 16){$getcarname = 'Lamborghini Murcielago';}
                    elseif($getcarid == 17){$getcarname = 'Koenigsegg Agera R';}
                    elseif($getcarid == 18){$getcarname = 'Lamborghini Aventador';}
                    elseif($getcarid == 19){$getcarname = 'Audi Prologue';}
                    if($getcarid == 12){$before = '<b><font color=red face=verdana size=1>Very Rare:&nbsp;</b></font>';}
                    elseif($getcarid == 9){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                    elseif($getcarid == 10){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                    elseif($getcarid == 11){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
                    elseif($getcarid == 13){$before = '<b><font color=red face=verdana size=1>Custom:&nbsp;</b></font>';}
                    elseif($getcarid >= 14){$before = '<b><font color=#0066FF face=verdana size=1>Super Rare:&nbsp;</b></font>';}
                }}

            if($_POST['editcust'] && strip_tags($_POST['custname']) || strip_tags($_POST['link']) && $gangsterusername == $getowner){
                $custname = $_POST['custname'];
                $custname = strip_tags($custname);
                $link = $_POST['link'];
                $link = strip_tags($link);
                if (!$_POST['custname'] && strip_tags($_POST['link'])){mysql_query("UPDATE cars SET image='$link' WHERE id='$getid'"); }else{
                    if (!$_POST['link'] && strip_tags($_POST['custname'])){mysql_query("UPDATE cars SET carname='$custname' WHERE id='$getid'"); }else{
                        mysql_query("UPDATE cars SET car='$custname', image='$link' WHERE id='$getid'");
                    }}}

            if($getcarid == '1'){ $price = '1000'; }
            if($getcarid == '2'){ $price = '2500'; }
            if($getcarid == '3'){ $price = '100000'; }
            if($getcarid == '4'){ $price = '500000'; }
            if($getcarid == '5'){ $price = '1000000'; }
            if($getcarid == '6'){ $price = '10000000'; }
            if($getcarid == '7'){ $price = '25000000'; }
            if($getcarid == '8'){ $price = '50000000'; }
            if($getcarid == '9'){ $price = '100000000'; }
            if($getcarid == '10'){ $price = '150000000'; }
            if($getcarid == '11'){ $price = '200000000'; }
            if($getcarid == '12'){ $price = '250000000'; }
            if($getcarid == '13'){ $price = '300000000'; }

            if(isset($_POST['editcust'])){
                if(isset($_FILES['link'])){
                    $errors= array();
                    $file_name = $_FILES['link']['name'];
                    $file_size =$_FILES['link']['size'];
                    $file_tmp =$_FILES['link']['tmp_name'];
                    $file_type=$_FILES['link']['type'];
                    $file_ext=strtolower(end(explode('.',$_FILES['link']['name'])));

                    $expensions= array("jpeg","jpg","png");

                    if(in_array($file_ext,$expensions)=== false){
                        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                    }

                    if($file_size > 2097152){
                        $errors[]='File size must be excately 2 MB';
                    }

                    if(empty($errors)==true){
                        $temp = explode(".", $_FILES["link"]["name"]);
                        $newfilename = $getid. '.' . end($temp);
                        move_uploaded_file($file_tmp,"./images/car_image/".$newfilename);
                        mysql_query("UPDATE cars SET image = './images/car_image/".$newfilename."' WHERE ID = '$getid'");

                        echo "Car Image Updated!";
                    }else{
                        echo "An error ocurred!";
                    }
                }

            }

            if(isset($_GET['add'])){
                $yessornoo = mysql_real_escape_string(strip_tags($_GET['add']));
                if($yessornoo != '1' AND $yessornoo != '0'){ $showoutcome++; $outcome = "Error..."; }else{
                    $typeofcar = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$usernameone' AND carid = '$getcarid' AND id = '$getid'"));
                    if($typeofcar <= '0'){ $showoutcome++; $outcome = "There was a problem with your action!"; }else{
                        if($getcarid >= '14'){ $showoutcome++; $outcome = "This is not possible!"; }else{
                            $mycar = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE owner = '$usernameone' AND id = '$getid'"));
                            if($mycar <= '0'){ $showoutcome++; $outcome = "This is not your car!"; }else{
                                if($cash < $price){ $showoutcome++; $outcome = "You can not afford this!"; }else{
                                    if($garage == 1 AND $yessornoo == 1){ $showoutcome++; $outcome = "This car is already in the garage!"; }else{
                                        if($yessornoo == '0'){ $showoutcome++; $outcome = "Your car has been removed!";
                                            mysql_query("UPDATE cars SET garage = '0' WHERE id = '$getid'"); }else{
                                            $showoutcome++; $outcome = "Your car is now in the retrievable garage!";
                                            mysql_query("UPDATE cars SET garage = '1' WHERE id = '$getid'");
                                            mysql_query("UPDATE users SET money = (money - '$price') WHERE username = '$usernameone'");
                                        }}}}}}}}

            $getuserinfoarray = $statustesttwo;
            $crewid = $getuserinfoarray['crewid'];
            $steal = $getuserinfoarray['steal'];
            $rank = $myrank;

            $crewperk = mysql_num_rows(mysql_query("SELECT * FROM crewperks WHERE crewid = '$crewid' AND perk = '4'"));
            if($crewperk > 0){ $bullets = $bullets * 1.25; $bullets = round($bullets); }
            if($getdmg == '0'){$bullets_final = $bullets;}else {
                $damaged = 100 - $getdmg;
                $damagedtwo = $damaged * $bullets;
                $bullets_final = ceil($damagedtwo / 100);
            }

            $img = mysql_query("SELECT * FROM cars WHERE id = '$getid'");
            $imgrows = mysql_num_rows($img);
            $getpic = mysql_fetch_array(mysql_query("SELECT * FROM cars WHERE id = $getid"));
            $getcarid = $getpic['carid'];
            $getdmg = $getpic['damage'];
            $getowner = $getpic['owner'];
            $carname = $getpic['carname'];
            $carimage = $getpic['image'];
            $pwice = $getpic['price'];
            $garage = $getpic['garage'];
            $speed = $getpic['speed'];
            $bullets = $getpic['bullets'];
            ?>
            <? if ($showoutcome >= 1) { ?>
                <span><? echo $outcome; ?></span>
            <? } ?>
            <table class="menuTable curve10px" id="mainTable" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td>
                        <div class="main">
                            <div class="menuHeader noTop">
                                View Car
                            </div>
                            <div style="padding: 5px; padding-top: 8px; padding-bottom: 0; margin: auto; text-align: center; color: #fefefe;">
                                <div class="car">
                                    <? if($getcarid != '13'){
                                        $pictureinfo = "./layout/car/$getcarid.jpg";
                                    }else{
                                        if($carimage != null){
                                            $pictureinfo = $carimage;
                                        } else{
                                            $pictureinfo = "./q.png";
                                        }
                                    } ?>
                                    <img src="<?php echo$pictureinfo; ?>" style="width: 100%;">
                                    <div class="info"><span class="owner">Owner: <a href="viewprofile.php?username=<?echo$getowner;?>"><?echo$getowner;?></a></span> <?echo$getcarname;?></div>
                                </div>
                                <div class="car more-info">
                                    <div class="row-info">
                                        <div class="col title">Damage</div>
                                        <div class="col"><span style="color: green;"><?echo$getdmg;?>%</span></div>
                                        <div class="col title">Travel Time</div>
                                        <div class="col"><span style="color: #eeeeee;"><?echo$speed;?></span></div>
                                    </div>
                                    <div class="row-info">
									<? if($getcarid < '14'){ ?>
                                            <?if($gangsterusername == $getowner){?>
											<div class="col title"><a href=viewcar.php?id=<?echo$getid;?>&add=<?echo$yesorno;?>>&nbsp;<?echo$comment;?></a></div>
											<div class="col">$<?echo number_format($price);?></div>                                              
                                            
									<?}}else{?>
                                        <div class="col title">-</div>
                                        <div class="col">-</div>
                                    <?}?>

                                        <div class="col title">Bullets</div>
                                        <div class="col"><span style="color: #eeeeee;"><?echo$bullets_final?> bullets</span></div>
                                    </div>
                                </div>
                                <?if($getcarid == '13' AND $gangsterusername == $getowner){?>
                                    <form method='post' action='' enctype="multipart/form-data">
                                        <table class="regTable" id="carTable" style="margin: auto; margin-bottom: 18px; width: 80%; max-width: 700px;" cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td colspan="3" class="header">
                                                    Change Custom
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col noTop">
                                                    <input class="textarea" name="custname" style="width: 100%;" type="text" placeholder="Enter a new name...">
                                                </td>
                                                <td class="col noTop">
                                                    <input class="textarea" name="link" style="width: 100%;" type="file" placeholder="Upload a image...">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="42" class="col noTop" style="width: 100%;">
                                                    <input class="textarea curve3px" value="Change Custom" name="editcust" style="width: 100%;" type="submit">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                <?}?>

                                <div class="break" style="padding-top: 12px;">
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 15px;">                                     
                                        <table class="regTable" id="carTable"
                                               style="margin: auto; margin-bottom: 18px; width: 80%; max-width: 700px;"
                                               cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td colspan="5" class="header">
                                                    My Garage
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="subHeader" style="border-left: 0; width: 60%;">Car</td>
                                                <td class="subHeader" style="width: 20%;">Damage&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            </tr>
                                            <?php

                                                $showcar = preg_replace($saturated, "", $showcarraw);
                                                mysql_query("UPDATE cars SET display = ' ' WHERE owner = '$gangsterusername'");
                                                $n = count($showcar);
                                                $i = 0;
                                                $showoutcome++;
                                                $outcome = "Profile updated!";
                                                if ($showcar) {
                                                    if ($n >= 1) {
                                                        while ($i < $n) {
                                                            $doit = $showcar[$i];
                                                            $ifnota = mysql_query("SELECT * FROM cars WHERE id = $doit");
                                                            $ifnot = mysql_fetch_array($ifnota);
                                                            $ifnotname = $ifnot['owner'];
                                                            if ($ifnotname != $gangsterusername) {
                                                            } else {
                                                                mysql_query("UPDATE cars SET display = 'yes' WHERE id = '$doit' AND owner = '$gangsterusername'");
                                                            }
                                                            $i++;
                                                        }
                                                    }
                                                }
                                            $selecterraw = $_POST['select'];
                                            $selecter = preg_replace($saturated, "", $selecterraw);
                                            if (isset($_POST['next'])) {
                                                $one = $selecter + 1;
                                            } elseif (isset($_POST['previous'])) {
                                                $one = $selecter - 1;
                                            } else {
                                                $one = '0';
                                            }

                                            $selectfroma = $one * 30;
                                            $selecttoa = $selectfrom + 30;
                                            $selectfrom = preg_replace($saturated, "", $selectfroma);
                                            $selectto = preg_replace($saturated, "", $selecttoa);

                                            $carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC LIMIT $selectfrom,$selectto");
                                            $carlistamount = mysql_query("SELECT id FROM cars WHERE owner = '$gangsterusername'");
                                            $carlistamount = mysql_num_rows($carlistamount);
											$contador=0;
                                            while($carlists = mysql_fetch_array($carlist)){
                                                $carid = $carlists['carid'];
                                                $carida = $carlists['id'];
                                                $card = $carlists['damage'];
                                                $checkedraw = $carlists['display'];
                                                $carname = $carlists['carname'];
                                                $carnamea = $carlists['carname'];

                                                if($checkedraw == 'yes'){$checked = 'CHECKED';}else{$checked = ' ';}


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
                                                else{ $before = ''; }
												if($contador==0){
													echo"<tr>
                                                <td class='col noTop'>
                                                    <a href=viewcar.php?id=$carida>$before$carname</a>
                                                </td>
                                                <td class='col noTop' align=left>
                                                    &nbsp;$card%<input type=checkbox style='visibility:hidden; vertical-align: middle;'>
                                                </tr>";
												}else{
													echo"<tr>
                                                <td class='col'>
                                                    <a href=viewcar.php?id=$carida>$before$carname</a>
                                                </td>
                                                <td class='col' align=left>
                                                    &nbsp;$card%<input type=checkbox style='visibility:hidden; vertical-align: middle;'>
                                                </tr>";
												}                                             
										$contador++;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <?php  if($carlistamount > 50){?>
                                        <div style="padding: 7px; margin-bottom: 5px; text-align: center;">
                                            <form action = "" method = "post">
                                                <input type="hidden" name="select" value="<?php  echo $one; ?>">
                                                <?php if($selectfrom != '0'){
                                                    echo'<input type ="submit" value="Prev page" class="textarea curve3px" name="previous">';}?>
                                                <input type ="submit" value="Next page" class="textarea curve3px" name="next">
                                            </form>
                                        </div>
                                        <?php }else{echo"<br>";}?>
                                        <div class="break" style="padding-top: 22px;">
                                        </div>
                                    </div>
                                </div></div></div></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
                </tbody>
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

