<? 
$ok = mysql_query("SELECT * FROM `oil`");
$afk = mysql_fetch_array($ok);
$one = $afk['crudeoil'];
$two = $afk['petrol'];
$three = $afk['diesel'];
$four = $afk['jet'];
$update = $afk['nextupdate']; 
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
if($one < 30000){ mysql_query("UPDATE `oil` SET `crudeoil`='30000'"); }
if($two < 30000){ mysql_query("UPDATE `oil` SET `petrol`='30000'"); }
if($three < 30000){ mysql_query("UPDATE `oil` SET `diesel`='30000'"); }
if($four < 30000){ mysql_query("UPDATE `oil` SET `jet`='30000'"); }

if($one > 20000000){ mysql_query("UPDATE `oil` SET `crudeoil`='20000000'"); }
if($two > 20000000){ mysql_query("UPDATE `oil` SET `petrol`='20000000'"); }
if($three > 20000000){ mysql_query("UPDATE `oil` SET `diesel`='20000000'"); }
if($four > 20000000){ mysql_query("UPDATE `oil` SET `jet`='20000000'"); }

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
?>