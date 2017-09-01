<?php
include "connecter.php";
?>
<table width="230">
<?php 	
if (htmlentities($_POST['users'])){
$user_username=mysql_real_escape_string(htmlentities($_POST['users']));

$query="SELECT * FROM users WHERE username LIKE '$user_username%' AND robot='0' AND username !='Mitch' LIMIT 0,50";
$result=mysql_query($query);
$total=mysql_num_rows($result);
if ($total == "0"){ ?>
    <a style="border-top: 0; cursor: default;">No Users Found Matching "<?echo$user_username;?>"</a>
<?php }
while($a=mysql_fetch_array($result)){
$user = $a['username'];
$stat = $a['status'];
$online = mysql_num_rows(mysql_query("SELECT * FROM usersonline WHERE username='$user'"));
?>
    <a href="viewprofile.php?username=<?echo$user;?>" class="None" id="2">
        <span class="<?if($online>0){echo 'online';}else{echo'offline';};?> txtShadow">•</span>
        <span class="<?echo strtolower($stat);?> txtShadow"><?echo$stat;?></span>
        <span class="crewInfo txtShadow"></span>
        <?echo$user;?>
    </a>
<? }} ?>
</table>