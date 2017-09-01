<?php session_start(); ?>
<?
include 'included2.php'; 

if((strpos($_SERVER['REMOTE_ADDR'], "222.77") === 0)){ die("If you are seeing this please contact a member of staff");}
if((strpos($_SERVER['REMOTE_ADDR'], "27.153") === 0)){ die("If you are seeing this please contact a member of staff");}
if((strpos($_SERVER['REMOTE_ADDR'], "125.78") === 0)){ die("If you are seeing this please contact a member of staff");}
if((strpos($_SERVER['REMOTE_ADDR'], "192.74") === 0)){ die("If you are seeing this please contact a member of staff");}
if((strpos($_SERVER['REMOTE_ADDR'], "142.0") === 0)){ die("If you are seeing this please contact a member of staff");}
if((strpos($_SERVER['REMOTE_ADDR'], "198.2") === 0)){ die("If you are seeing this please contact a member of staff");}
if((strpos($_SERVER['REMOTE_ADDR'], "117.25") === 0)){ die("If you are seeing this please contact a member of staff");}
if((strpos($_SERVER['REMOTE_ADDR'], "199.180") === 0)){ die("If you are seeing this please contact a member of staff");}
if((strpos($_SERVER['REMOTE_ADDR'], "142.4") === 0)){ die("If you are seeing this please contact a member of staff");}
if((strpos($_SERVER['REMOTE_ADDR'], "166.137") === 0)){ die("If you are seeing this please contact a member of staff");}
if((strpos($_SERVER['REMOTE_ADDR'], "216.244") === 0)){ die("If you are seeing this please contact a member of staff");}
?>

<? 
error_reporting(0);
$adress = $_SERVER['REMOTE_ADDR'];

$timenow = time();
$allowedref = "/[^0-9]/i";
// $refraw = $_GET['ref'];
// $locraw= mysql_real_escape_string($_POST['loc']);
// $ref = preg_replace($allowedref,"",$refraw);
// $loc = preg_replace($allowedref,"",$locraw);
// if($loc == 1){ $loc = rand(2,4); if($loc == 2){ $location = 'Las Vegas'; }elseif($loc == 3){ $location = 'Los Angeles';}elseif($loc == 4){ $location = 'New York';}}
// elseif($loc == 2){ $location = 'Las Vegas'; }
// elseif($loc == 3){ $location = 'Los Angeles'; }
// elseif($loc == 4){ $location = 'New York'; }
// else{ $location = 'Las Vegas'; } 

$allowedtwo = "/[^a-z0-9\\040\\.\\[\\]\\=\\<\\>\\&#163;\\$\\@\\&\\{\\}\\%\\+\\|\\(\\)\\?\\~\\:\\/\\-\\;\\_\\\\]/i";
$playerbrowserbefore = $_SERVER['HTTP_USER_AGENT'];
$userpass = $_POST['reqPassword'];
$playerbrowser = preg_replace($allowedtwo,"",$playerbrowserbefore);

$time=time();
mysql_query("DELETE FROM registerlog WHERE error < '$time'");

$usor=mysql_real_escape_string($_POST['reqUsername']);

$allowed = "/[^a-z0-9]/i";
$username = preg_replace($allowed,"",$usor);

$check = mysql_query("SELECT username FROM users WHERE username = '$username'")
or die(mysql_error());
$check2 = mysql_num_rows($check);

$dsjiada = mysql_query("SELECT username FROM suggestions WHERE username = '$username'")
or die(mysql_error());
$fdsfs = mysql_num_rows($dsjiada);



$checkthree = mysql_query("SELECT * FROM registerlog WHERE ip = '$adress'")
or die(mysql_error());
$checkfour = mysql_num_rows($checkthree);

$charlimit = 50;


if (isset($_POST['reqUsername'])){

$gethdo = mysql_query("SELECT * FROM users WHERE hdo > '0' AND status = 'Alive' LIMIT 1");
$gethisname = mysql_fetch_array($gethdo);
$doitnamehehe = $gethisname['username'];


if (!$_POST['reqUsername']) { $onload=" onload=document.freg.desireduser.select()";
$_SESSION['error']='<font face="verdana" size="1" color="red"><b>A username was not entered.</b></font>';
echo '<script>window.location.href = "http://www.infamousgangsters.net/index.php";</script>';
exit();
}
elseif (!$_POST['reqPassword']) { $onload=" onload=document.freg.password.select()";
$_SESSION['error']='<font face="verdana" size="1" color="red"><b>A password was not chosen.</b></font>';
echo '<script>window.location.href = "http://www.infamousgangsters.net/index.php";</script>';
exit();
}
elseif (!preg_match("/^[a-z0-9]{1,15}$/i", $_POST["reqUsername"])) { $onload=" onload=document.freg.desireduser.select()";
$_SESSION['error']='<font face="verdana" size="1" color="red"><b>Usernames can only contain 0-9, A-Z characters, and be a maximum of 15 characters.</b></font>';
echo '<script>window.location.href = "http://www.infamousgangsters.net/index.php";</script>';
exit();
}
elseif (strlen($_POST['reqPassword']) > '50'){ $onload=" onload=document.freg.password.select()";
$_SESSION['error']='<font face="verdana" size="1" color="red"><b>Passwords can only be a maximum of 50 characters.</b></font>';
echo '<script>window.location.href = "http://www.infamousgangsters.net/index.php";</script>';
exit();
}
elseif ($_POST['reqPassword'] == $_POST['reqUsername']) { $onload=" onload=document.freg.desireduser.select()";
$_SESSION['error']='<font face="verdana" size="1" color="red"><b>Your password can not be the same as your username.</b></font>';
echo '<script>window.location.href = "http://www.infamousgangsters.net/index.php";</script>';
exit();
}
elseif (($check2 != 0)&&($fdsfs != 0)) { $onload=" onload=document.freg.desireduser.select()";
$_SESSION['error']='<font face="verdana" size="1" color="red"><b>The username you entered is already in use.</b></font>';
echo '<script>window.location.href = "http://www.infamousgangsters.net/index.php";</script>';
exit();
}

elseif ($checkfour != 0) { $onload="lol";
$_SESSION['error']='<font face="verdana" size="1" color="red"><b>You have recently registered an account on this IP, you must wait a while before creating a new one.</b></font>';
echo '<script>window.location.href = "http://www.infamousgangsters.net/index.php";</script>';
exit();
}

else{ $onload="lol";

mysql_query("UPDATE statis SET allof = (allof+1)");

$error= $time + 1800;
$rawinsertlog = "INSERT INTO registerlog (ip,error)
VALUES ('$adress','$error')";
$insertlog = mysql_query($rawinsertlog);



$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$randver = substr(str_shuffle($alphanum), 0, 5);

mysql_query("DELETE FROM users WHERE username = '$usor'");

$createcrewraw = mysql_real_escape_string($_POST['useremail']);
$newemail = htmlentities($createcrewraw, ENT_QUOTES);
$newtime = time();
$ctimer = time()+(60*60*12);
mysql_query("INSERT INTO `protection` (username,time) VALUES ('$username','$newtime')");
$insert = "INSERT INTO `users` (username, password, email, location) VALUES ('$username', '$userpass', '$newemail', '$location')";
$add_member = mysql_query($insert);

mysql_query("INSERT INTO `missiontasks` (username) VALUES ('$username')");
if($_GET['ref']){ mysql_query("INSERT INTO `referral` (username,referred) VALUES ('$refraw', '$username')"); }

$inserta = "INSERT INTO datesjoined (username,ip,browser)
VALUES ('$username','$adress','$playerbrowser')";
$addamember = mysql_query($inserta);
$uname = mysql_real_escape_string($_POST['reqUsername']);

$ysid = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$usor'"));
$toid = $ysid['ID'];

$sendinfo = "\[br\]\[center\]Welcome to Infamous Gangster!\[br\]If you click Game Network, then click on FAQ on your leftmenu it will give you all basic information on the game.\[br\]You are currently under 48 hours protection from being killed.\[\/center\]\[br\]\[br\]\[b\]\[color=#FFC753\]Tips:\[\/color\]\[\/b\] Make money fast by doing \[b\]\[color=#FFC753\]Crimes\[\/color\]\[\/b\], \[b\]\[color=#FFC753\]City Crime\[\/color\]\[\/b\] and \[b\]\[color=#FFC753\]Steal Cars\[\/color\]\[\/b\]\[br\]\[br\]If you are not sure what to do or how to do something, you can ask a question on the \[b\]\[color=silver\]Get Help\[\/color\]\[\/b\] page and wait for a staff member to answer :)\[br\] NOTE: You can block casinos by going to Edit Profile and clicking Casino Settings and then click Block.";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$username','Pentium','1','$adress','$sendinfo')");
$_SESSION['error']='<font face="verdana" size="1" color="white"><b>Successful!</font><font face="verdana" size="1" color="yellow"> '.$_POST['reqUsername'].'</font> <font face="verdana" size="1" color="white">can now login</font>';
$_SESSION['success']=$_POST['reqUsername'];
echo '<script>window.location.href = "http://www.infamousgangsters.net/index.php";</script>';
exit();
}}
?>