<? include 'included.php'; session_start(); ?>
<?php
$paymentemail = "a.burn121.12@gmail.com";
$itemname = "$usernameone";

?>
<html>
<head>
<title>:: Tough Dons</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png">
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
</script>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
 <?php
 if($_POST['option1'] == 1 ){ 
    header("Location: /sms1.php"); 
} 
if($_POST['option2'] == 1 ){ 
    header("Location: /sms2.php"); 
} 
if($_POST['option3'] == 1 ){ 
    header("Location: /sms3.php"); 
} 
if($_POST['option4'] == 1 ){ 
    header("Location: http://www.tinkergraphics.com"); 
} 
else { 
    header("Location: /donate.php"); 
}  
?>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap">Donate</td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%"><tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png"><br>

  <table align="center" width="55%" cellpadding="0" cellspacing="1" class="section">
    <tr>
      <td width="100%"><div class=tab>Donate (SMS) </div></td>
    </tr>
    <tr>
      <td><div class="button1"><input type="radio" onclick="window.location='/sms1.php';" />250<?php if($smstimes != 1){ ?><font color=khaki> *<?php echo $smstimes ?></font><?php } ?> Points [�3.00]
</div></td>
    </tr>
    <tr>
      <td><div class="button1"><input type="radio" onclick="window.location='/sms2.php';" />600<?php if($smstimes != 1){ ?><font color=khaki> *<?php echo $smstimes ?></font><?php } ?> Points [�6.00]</div></td>
    </tr>
    <tr>
      <td><div class="button1"><input type="radio" onclick="window.location='/sms3.php';" />
        <font color=yellow><b>800
        <?php if($smstimes != 1){ ?><font color=khaki> *<?php echo $smstimes ?></font><?php } ?> Points</b></font> [�9.00]</div></td>
    </tr>
  </table><br>
  <center><font size="1" face="verdana" color="white">If you have any queries regarding this service or experience any issues please contact support on
0844 375 4020 or contact support at <a href=mailto:support@glpayment.co.uk>support@glpayment.co.uk</a></font> <br>
<br>
<img src="paypal.png" width="64" height="64"><br>
<br><form action='https://www.paypal.com/cgi-bin/webscr/' method='post' target='_blank'>
<table align="center" width="55%" cellpadding="0" cellspacing="1" class="section">
  <tr>
    <td width="100%"><div class=tab>Donate (PayPal) </div></td>
  </tr>
  <tr>
    <td><div class="button1">
        <input type="radio" name="amount" value="5.00">
        550
        <?php if($smstimes != 1){ ?>
        <font color=khaki> *<?php echo $smstimes ?></font>
        <?php } ?>
        Points [&pound;5.00] </div></td>
  </tr>
  <tr>
    <td><div class="button1">
       <input type="radio" name="amount" value="10.00">
        1,250
        <?php if($smstimes != 1){ ?>
        <font color=khaki> *<?php echo $smstimes ?></font>
        <?php } ?>
        Points [&pound;10.00]</div></td>
  </tr>
  <tr>
    <td><div class="button1">
        <input type="radio" name="amount" value="20.00">
        3,250
        <?php if($smstimes != 1){ ?>
        <font color=khaki> *<?php echo $smstimes ?></font>
        <?php } ?>
        Points [&pound;20.00]</div></td>
  </tr>
   <tr>
    <td><div class="button1">
        <input type="radio" name="amount" value="50.00">
        10,000
        <?php if($smstimes != 1){ ?>
        <font color=khaki> *<?php echo $smstimes ?></font>
        <?php } ?>
        Points [&pound;50.00]</div></td>
  </tr>
  <input type=hidden name=cmd value='_xclick'>
<input type=hidden name=currency_code value ='GBP'>
<input type=hidden name=business value='<? echo "$paymentemail"; ?>'>
<input type=hidden name=item_name value='<? echo "$itemname"; ?>'> 
   <tr>
   
     <td><input type=submit name=submit value='Buy' class="textbox" style="width:100%;"></td>
   </tr>
</table>  </form>
  </center>
  <br>

<td class=menuright><img style="display: block" alt="" src="blank.gif" width=8></td>
</tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menubottomleft><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
<td class=menubottommain><img style="display: block" alt="" src="blank.gif"></td>
<td class=menubottomright><img style="display: block" alt="" src="blank.gif" width="8" height="9"></td>
</tr></tbody></table></div>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>