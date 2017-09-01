<?
$sql = mysql_query("SELECT * FROM achievements WHERE username = '$getname'");
$rows = mysql_fetch_array($sql);

$do1 = $rows['blackjackprofit'];
$do2 = $rows['racesprofit'];
$do3 = $rows['rouletteprofit'];
$do4 = $rows['diceprofit'];
$do5 = $rows['overallprofit'];
$do6 = $rows['mdgprofit'];
$do7 = $rows['drugprofitfame'];


$docountall = 0;
if($do1 > '0'){$docountall++;}
if($do2 > '0'){$docountall++;}
if($do3 > '0'){$docountall++;}
if($do4 > '0'){$docountall++;}
if($do5 > '0'){$docountall++;}
if($do6 > '0'){$docountall++;}
if($do7 > '0'){$docountall++;}

if($docountall>='1'){
if($do1 > '0'){
if($do1 == '1'){$doexone = "style='color:gold;font-weight:bold;'";}else{$doexone = "style='color:silver;'";}
echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $doexone>#$do1 Blackjack Gambler</a>
     </div>";}
if($do2 > '0'){
if($do2 == '1'){$doextwo = "style='color:gold;font-weight:bold;'";}else{$doextwo = "style='color:silver;'";}
echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $doextwo>#$do2 Races Gambler</a>
     </div>";}
if($do3 > '0'){
if($do3 == '1'){$doexthree = "style='color:gold;font-weight:bold;'";}else{$doexthree = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $doexthree>#$do3 Roulette Gambler</a>
     </div>";}
if($do4 > '0'){
if($do4 == '1'){$doexfour = "style='color:gold;font-weight:bold;'";}else{$doexfour = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $doexfour>#$do4 Dice Gambler</a>
     </div>";}
if($do5 > '0'){
if($do5 == '1'){$doexfive = "style='color:gold;font-weight:bold;'";}else{$doexfive = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $doexfive>#$do5 Casino Gambler</a>
     </div>";}
if($do6 > '0'){
if($do6 == '1'){$doexsix = "style='color:gold;font-weight:bold;'";}else{$doexsix = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $doexsix>#$do6 Multidice Gambler</a>
     </div>";}
if($do7 > '0'){
if($do7 == '1'){$doexsev = "style='color:gold;font-weight:bold;'";}else{$doexsev = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $doexsev>#$do7 Multi Blackjack Gambler</a>
     </div>";}
}?>