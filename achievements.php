<?
$sql = mysql_query("SELECT * FROM achievements WHERE username = '$getname'");
$rows = mysql_fetch_array($sql);

$ucrimesfame = $rows['crimesfame'];
$udonecrimesfame = $rows['donecrimesfame'];
$uconcrimesfame = $rows['consecutivecrimesfame'];
$ugtasfame = $rows['stealsfame'];
$udonegtasfame = $rows['donestealsfame'];
$ucongtasfame = $rows['consecutivestealsfame'];
$ubustsfame = $rows['bustsfame'];
$udonebustsfame = $rows['donebustsfame'];
$uconbustsfame = $rows['jointsfame'];
$ucarsmeltedfame = $rows['carsmeltedfame'];
$utotalmeltedfame = $rows['totalmeltedfame'];
$ucbulletfame = $rows['cbulletfame'];
$ukillsfame = $rows['killsfame'];
$ucasinowinsfame = $rows['casinowinsfame'];
$upointsspentfame = $rows['pointsspentfame'];
$umoneycrimes = $rows['moneycrimes'];
$uinvestmentprofit = $rows['investmentprofit'];

$countall = 0;
if($ucrimesfame > '0'){$countall++;}
if($udonecrimesfame > '0'){$countall++;}
if($uconcrimesfame > '0'){$countall++;}
if($ugtasfame > '0'){$countall++;}
if($udonegtasfame > '0'){$countall++;}
if($ucongtasfame > '0'){$countall++;}
if($ubustsfame > '0'){$countall++;}
if($udonbustsfame > '0'){$countall++;}
if($uconbustsfame > '0'){$countall++;}
if($ucarsmeltedfame > '0'){$countall++;}
if($utotalmeltedfame > '0'){$countall++;}
if($ucbulletfame > '0'){$countall++;}
if($ukillsfame > '0'){$countall++;}
if($ucasinowinsfame > '0'){$countall++;}
if($upointsspentfame > '0'){$countall++;}
if($umoneycrimes > '0'){$countall++;}
if($uinvestmentprofit > '0'){$countall++;}

if($countall>='1'){
if($ucrimesfame > '0'){
if($ucrimesfame == '1'){$exone = "style='color:gold;font-weight:bold;'";}else{$exone = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exone>#$ucrimesfame Crime Attempts</a>
     </div>";}
if($udonecrimesfame > '0'){
if($udonecrimesfame == '1'){$extwo = "style='color:gold;font-weight:bold;'";}else{$extwo = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $extwo>#$udonecrimesfame Successful Crimes Committed</a>
     </div>";}
if($uconcrimesfame > '0'){
if($uconcrimesfame == '1'){$exthree = "style='color:gold;font-weight:bold;'";}else{$exthree = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exthree>#$uconcrimesfame Consecutive Crimes</a>
     </div>";}
if($ugtasfame > '0'){
if($ugtasfame == '1'){$exfour = "style='color:gold;font-weight:bold;'";}else{$exfour = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exfour>#$ugtasfame Car Steal Attempts</a>
     </div>";}
if($udonegtasfame > '0'){
if($udonegtasfame == '1'){$exfive = "style='color:gold;font-weight:bold;'";}else{$exfive = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exfive>#$udonegtasfame Successful Steals Committed</a>
     </div>";}
if($ucongtasfame > '0'){
if($ucongtasfame == '1'){$exsix = "style='color:gold;font-weight:bold;'";}else{$exsix = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exsix>#$ucongtasfame Consecutive Cars Stolen</a>
     </div>";}
if($ubustsfame > '0'){
if($ubustsfame == '1'){$exseven = "style='color:gold;font-weight:bold;'";}else{$exseven = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exseven>#$ubustsfame Jail Attempts</a>
     </div>";}
if($udonebustsfame > '0'){
if($udonebustsfame == '1'){$exeight = "style='color:gold;font-weight:bold;'";}else{$exeight = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exeight>#$udonebustsfame Successful Jail Busts</a>
     </div>";}
if($uconbustsfame > '0'){
if($uconbustsfame == '1'){$exnine = "style='color:gold;font-weight:bold;'";}else{$exnine = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exnine>#$uconbustsfame Consecutive Jail Busts</a>
     </div>";}
if($ucarsmeltedfame > '0'){
if($ucarsmeltedfame == '1'){$exten = "style='color:gold;font-weight:bold;'";}else{$exten = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exten>#$ucarsmeltedfame Cars Melted</a>
     </div>";}
if($utotalmeltedfame > '0'){
if($utotalmeltedfame == '1'){$exeleven = "style='color:gold;font-weight:bold;'";}else{$exeleven = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exeleven>#$utotalmeltedfame Bullets Melted</a>
     </div>";}
if($ucbulletfame > '0'){
if($ucbulletfame == '1'){$extwelve = "style='color:gold;font-weight:bold;'";}else{$extwelve = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $extwelve>#$ucbulletfame Crew Bullets Melted</a>
     </div>";}
if($ukillsfame > '0'){
if($ukillsfame == '1'){$exthirteen = "style='color:gold;font-weight:bold;'";}else{$exthirteen = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exthirteen>#$ukillsfame Most Kills</a>
     </div>";}
if($ucasinowinsfame > '0'){
if($ucasinowinsfame == '1'){$exfourteen = "style='color:gold;font-weight:bold;'";}else{$exfourteen = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exfourteen>#$ucasinowinsfame Most Casino Wins</a>
     </div>";}
if($upointsspentfame > '0'){
if($upointsspentfame == '1'){$exfifthteen = "style='color:gold;font-weight:bold;'";}else{$exfifthteen = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exfifthteen>#$upointsspentfame Most Points Spent</a>
     </div>";}
if($umoneycrimes > '0'){
if($umoneycrimes == '1'){$exsixteen = "style='color:gold;font-weight:bold;'";}else{$exsixteen = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exsixteen>#$umoneycrimes Most Money Earnt Through Crimes</a>
     </div>";}
if($uinvestmentprofit > '0'){
if($uinvestmentprofit == '1'){$exeighteen = "style='color:gold;font-weight:bold;'";}else{$exeighteen = "style='color:silver;'";}
    echo"<div class=\"profileItem\">
          <a href=gamerecords.php?username=$getname $exeighteen>#$uinvestmentprofit Most Property Investment Profit</a>
     </div>";}
}?>