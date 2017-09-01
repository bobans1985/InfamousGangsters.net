<? include 'included.php'; session_start();?>
<html>
<head>
<title>:: State Gangsters</title><link rel="stylesheet" href="layout/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/layout/icon.png" type="image/x-icon" />
</head>
<body background="/layout/wallpaper.png" onload="ajaxFunction();document.teehee.username.select();">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>

<script type="text/javascript" src="cuload.js"></script>
<script type="text/javascript">
$(function(){
$("#display").load('find.php');
$('#input').keyup(function(){
$("#display").empty().html('<img src="load2.gif">');
var input = $("#input").val();
$.post("find.php", { users: input},
function(data){
$("#display").html(data);
}); }); })
</script>

<td width="100%" valign="top">
<table width=100%><tr>
<input type="submit" value="User:" class="textbox">
<input type="text" name="user" id='input' class="textbox">
</tr></table>
<table align="center" cellpadding="0" width=100% cellspacing="0">
<tbody><tr>
<td class=menutopleft><img style="display: block" height=22 width=8 alt="" src="blank.gif"></td>
<td class=menutopbar height=22 style="white-space: nowrap"><font color="#222222"><b>Find User</b></font></td>
<td class=menutopend><IMG style="display: block" height=20 alt="" src="blank.gif" width=28></td>
<td class=menutopmain><IMG style="display: block" height=22 width=30px alt="" src="blank.gif" ></td>
<td class=menutopright><IMG style="display: block" height=22 alt="" src="blank.gif" width=8></td></tr></tbody></table>
<table cellspacing=0 cellpadding=0 style="width: 100%">
<tbody><tr>
<td class=menuleft><img style="display: block" alt="" src="blank.gif" width=8></td>
<td background="/layout/crossbg.png" id=myTD><br>
<table align="center" cellpadding="0" cellspacing="0" class="section">
<tr><td align=center colspan=2><div class=tab>Find Users</td></tr>
<tr><td width=130><div class=tab>Username:</td><td width=100><div class=tab>Status:</td></tr>
<tr><td colspan=2><div id="display"></div></td></tr>
</table><br>

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

