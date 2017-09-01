<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<? include 'included2.php'; 


$adress = $_SERVER['REMOTE_ADDR'];
$hiok = mysql_query("SELECT * FROM logintimes WHERE ip = '$adress' ORDER BY time desc LIMIT 1");
$ffs = mysql_num_rows($hiok);
$ffss = mysql_fetch_array($hiok);
$getlast = $ffss['username'];

if($_GET['fb']){
$we = mysql_num_rows(mysql_query("SELECT * FROM igref WHERE ip = '$adress'"));
if($we == '0'){
mysql_query("INSERT INTO igref(ip)VALUES ('$adress')");}
}
if($_GET['n']){$hehe = 'passwordlog';}else{$hehe = 'usernamelog';}
?>
<div align="center"><img src="../index.jpg">
  <table cellpadding="0" cellspacing="2" class="mainmenutable" align=center bgcolor="#222222"> 
    <tr><td height="15" bgcolor="#282828" colspan="2"><center>
      <font size="1" face="verdana" color="white">Tough Dons </font>
    </center></td></tr>
    <form action="userlogin.php" method="post" name="f">
    <tr><td width="100" height="8" bgcolor="#333333" align=left><label for=tt><font color="white" face="verdana" size="1">&nbsp;Username:</font></label></td><td height="8" bgcolor="#282828"><input type="text" name="usernamelog" id="tt"  class="textbox" value="<?if($_GET['n']){echo$_GET['n'];}?>"></td></tr>
    <tr><td width="100" height="8" bgcolor="#333333" align=left><label for=tts><font color="white" face="verdana" size="1">&nbsp;Password:</font></td><td height="8" bgcolor="#282828"><input type="password" name="passwordlog" id=tts class="textbox"></label></td></tr>
    <tr><td height="8" bgcolor="#161616" colspan="2"><center><input type="submit" name="login" class="textboxs" value="Log In"></center></td></tr>
    </form>
      </table>
</div>
