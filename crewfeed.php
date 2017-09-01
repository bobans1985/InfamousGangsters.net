<?php
include 'included.php'; session_start();
session_start();

$getinfoarray = $statustesttwo;
$getcrewid = $getinfoarray['crewid'];
$getname = $getinfoarray['username'];
$getmute = $getinfoarray['mute'];

if(isset($_GET['delete'])){
    mysql_query("DELETE FROM crewfeed WHERE crew = '$getcrewid'");
}elseif(isset($_GET['check'])){
    $time = date("Y/m/d H:i:s", time() - 7);
    $messages = mysql_query("SELECT * FROM crewfeed WHERE crew = '$getcrewid' AND `time` >= '$time' AND `user` <> '$getname'");
    $contador=mysql_num_rows($messages);
    $data['hora']=$time;
    $data['contador']=$contador;
    $data['prueba']=mysql_fetch_array($messages);
    if($contador==0 || $getmute==true){
        $data['vacio']=true;
    }else{
        $data['vacio']=false;
    }
    $messages = mysql_query("SELECT * FROM crewfeed WHERE crew = '$getcrewid' ORDER BY `time` DESC");

    $cont=0;
    $texto='';
    while($message = mysql_fetch_array($messages)) {

        $zpattern[a] = "<";
        $zpattern[b] = ">";
        $zpattern[c] = "fuck";

        $zreplace[a] = "&lt;";
        $zreplace[b] = "&gt;";
        $zreplace[d] = "<span id=nawty>fuck</span>";

        $i = 0;
        $while = mysql_query("SELECT word FROM blacklist");
        while ($all = mysql_fetch_array($while)){
            $i = $i + 1;
            $zpattern[$i] = $all['word'];
            $zreplace[$i] = "infamousgangsters";
        }


        $postinforawa = html_entity_decode($message['message'], ENT_NOQUOTES);
        $postinforawb = $postinforawa;

        $postinforawz = $postinforawb;

        $epattern[1] = "/\[b\](.*?)\[\/b\]/is";
        $epattern[2] = "/\[u\](.*?)\[\/u\]/is";
        $epattern[3] = "/\[i\](.*?)\[\/i\]/is";
        $epattern[4] = "/\[center\](.*?)\[\/center\]/is";
        $epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
        $epattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
        $epattern[8] = "/\[br\]/is";
        $epattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
        $epattern[11] = "/\[left\](.*?)\[\/left\]/is";
        $epattern[12] = "/\[right\](.*?)\[\/right\]/is";
        $epattern[13] = "/\[s\](.*?)\[\/s\]/is";
        $epattern[16] = "/\[personv\](.*?)\[\/personv\]/is";
        $epattern[17] = "/\[img\](.*?)\[\/img\]/is";

        $ereplace[1] = "<b>$1</b>";
        $ereplace[2] = "<u>$1</u>";
        $ereplace[3] = "<i>$1</i>";
        $ereplace[4] = "<center>$1</center>";
        $ereplace[5] = "<font color=\"$1\">$2</font>";
        $ereplace[7] = "<font face=\"$1\">$2</font>";
        $ereplace[8] = "<br>";
        $ereplace[10] = "<blockquote><b><font color=7e96ac>$1</font></b></blockquote>";
        $ereplace[11] = "<div align=\"left\">$1</div>";
        $ereplace[12] = "<div align=\"right\">$1</div>";
        $ereplace[13] = "<s>$1</s>";
        $ereplace[16] = "$usernameone";
        $ereplace[17] = "<img border=\"\" src=\"$1\">$2</img>";


        $postinforawb = preg_replace($epattern,$ereplace,$postinforawz);

        $fpattern[1] = ":arrow:";
        $fpattern[2] = ":D";
        $fpattern[3] = ":S";
        $fpattern[4] = "8)";
        $fpattern[5] = ":cry:";
        $fpattern[6] = "8|";
        $fpattern[7] = ":evil:";
        $fpattern[8] = ":!:";
        $fpattern[9] = ":idea:";
        $fpattern[10] = ":lol:";
        $fpattern[11] = ":mad:";
        $fpattern[12] = ":?:";
        $fpattern[13] = ":redface:";
        $fpattern[14] = ":rolleyes:";
        $fpattern[15] = ":(";
        $fpattern[16] = ":)";
        $fpattern[17] = ":o";
        $fpattern[18] = ":tdn:";
        $fpattern[19] = ":P";
        $fpattern[20] = ":tup:";
        $fpattern[21] = ":twisted:";
        $fpattern[22] = ";)";
        $fpattern[23] = ":slepy:";
        $fpattern[24] = ":whistle:";
        $fpattern[25] = ":wub:";
        $fpattern[26] = ":muah:";
        $fpattern[27] = ":zipped:";
        $fpattern[28] = ":love:";
        $fpattern[29] = ":sarcasm:";

        $freplace[1] = '<img src=/layout/smiles/arrow.gif class="smileys" style="margin-top: 0;">';
        $freplace[2] = '<img src=/layout/smiles/biggrin.gif class="smileys"style="margin-top: 0;">';
        $freplace[3] = '<img src=/layout/smiles/confused.gif class="smileys"style="margin-top: 0;">';
        $freplace[4] = '<img src=/layout/smiles/cool.gif class="smileysstyle="margin-top: 0;"">';
        $freplace[5] = '<img src=/layout/smiles/cry.gif class="smileys"style="margin-top: 0;">';
        $freplace[6] = '<img src=/layout/smiles/eek.gif class="smileys"style="margin-top: 0;">';
        $freplace[7] = '<img src=/layout/smiles/evil.gif class="smileys"style="margin-top: 0;">';
        $freplace[8] = '<img src=/layout/smiles/exclaim.gif class="smileys"style="margin-top: 0;">';
        $freplace[9] = '<img src=/layout/smiles/idea.gif class="smileys"style="margin-top: 0;">';
        $freplace[10] = '<img src=/layout/smiles/lol.gif class="smileys"style="margin-top: 0;">';
        $freplace[11] = '<img src=/layout/smiles/mad.gif class="smileys"style="margin-top: 0;">';
        $freplace[12] = '<img src=/layout/smiles/question.gif class="smileys"style="margin-top: 0;">';
        $freplace[13] = '<img src=/layout/smiles/redface.gif class="smileys"style="margin-top: 0;">';
        $freplace[14] = '<img src=/layout/smiles/rolleyes.gif class="smileys"style="margin-top: 0;">';
        $freplace[15] = '<img src=/layout/smiles/sad.gif class="smileys"style="margin-top: 0;">';
        $freplace[16] = '<img src=/layout/smiles/smile.gif class="smileys"style="margin-top: 0;">';
        $freplace[17] = '<img src=/layout/smiles/surprised.gif class="smileys"style="margin-top: 0;">';
        $freplace[18] = '<img src=/layout/smiles/tdown.gif class="smileys"style="margin-top: 0;">';
        $freplace[19] = '<img src=/layout/smiles/toungue.gif class="smileys"style="margin-top: 0;">';
        $freplace[20] = '<img src=/layout/smiles/tup.gif class="smileys"style="margin-top: 0;">';
        $freplace[21] = '<img src=/layout/smiles/twisted.gif class="smileys"style="margin-top: 0;">';
        $freplace[22] = '<img src=/layout/smiles/wink.gif class="smileys"style="margin-top: 0;">';
        $freplace[23] = '<img src=/layout/smiles/slepy.png class="smileys"style="margin-top: 0;">';
        $freplace[24] = '<img src=/layout/smiles/whistle.gif class="smileys"style="margin-top: 0;">';
        $freplace[25] = '<img src=/layout/smiles/wub.gif class="smileys"style="margin-top: 0;">';
        $freplace[26] = '<img src=/layout/smiles/muah.gif class="smileys"style="margin-top: 0;">';
        $freplace[27] = '<img src=/layout/smiles/zipped.gif class="smileys"style="margin-top: 0;">';
        $freplace[28] = '<img src=/layout/smiles/love.gif class="smileys"style="margin-top: 0;">';
        $freplace[29] = '<img src=/layout/smiles/sarcasm.gif class="smileys"style="margin-top: 0;">';


        $postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);

        if($message['message'] == 'join') {
            $usersql = mysql_query("SELECT * FROM crews WHERE id = '".$message['crew']."'");
            $crews = mysql_fetch_array($usersql);
            $texto.="<table class=\"feedPost\" style=\"margin-left: -1px; background: #232323;\" cellspacing=\"0\" cellpadding=\"0\">
                <tbody>
                <tr>
                    <td colspan=\"2\" class=\"feedPostComment\" style=\"border-left: 3px solid green; padding: 7px;\">
                    <a href=\"viewprofile.php?username=".$message['user']."\">".$message['user']." </a>
                    joined
                    <a href=\"viewcrew.php?crewid=".$message['crew']."\"> ".$crews['name']."</a>!
                    </td>
                </tr>
                </tbody>
            </table>";
        }else if ($message['message'] == 'dead') {
            $texto.="<table class=\"feedPost\" style=\"margin-left: -1px; background: #232323;\" cellspacing=\"0\" cellpadding=\"0\">
                <tbody>
                <tr>
                    <td colspan=\"2\" class=\"feedPostComment\" style=\"border-left: 3px solid red; padding: 7px;\">
                    <a href=\"viewprofile.php?username=".$message['user']."\">".$message['user']." </a>
                    has been killed!
                    </td>
                </tr>
                </tbody>
            </table>";
        }else{
            $now=new DateTime();
            $time=DateTime::createFromFormat('Y-m-d H:i:s',$message['time']);
            $diff=$now->diff($time);
            if($cont==0){
                $texto.="<table class=\"feedPost newCrewFeedMessage\" cellspacing=\"0\" cellpadding=\"0\">
                    <tbody>
                    <tr>
                        <td align=\"left\"><a href=\"viewprofile.php?username=".$message['user']."\" style=\"display: inline-block; padding-top: 2px; \" class=\"newCrewFeedTitle\">".$message['user']."</a></td>
                        <td align=\"right\">
                            <span class=\"masterTooltip crewFeedTimeStamp curve2pxBottom newCrewFeedTitle\" title=\"".$time->format('Y-m-d H:i:s')."\">";
                                if($diff->format('%a')>10){
                                    $texto.=$time->format('Y-m-d');
                                }elseif($diff->format('%i')<=0) {
                                    $texto.="Just now";
                                }elseif($diff->format('%h')<=0) {
                                    $texto.=$diff->format('%i mins ago');
                                }elseif($diff->format('%a')<=0) {
                                    $texto.=$diff->format('%h hrs ago');
                                }else{
                                    $texto.=$diff->format('%a days ago');
                                }
                $texto.="</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=\"2\" class=\"feedPostComment\">";
                if($countthree > '20'){
                    $texto.="This user tried to post more than 20 smilies, this is < b>NOT </b > allowed";
                }else{
                    $texto.=nl2br($postinfo);
                }
                $texto.="</td>
                    </tr>
                    </tbody>
                </table>";
            }else{
                $texto.="<table class=\"feedPost\" cellspacing=\"0\" cellpadding=\"0\">
                    <tbody>
                    <tr>
                        <td align=\"left\"><a href=\"viewprofile.php?username=".$message['user']."\" style=\"display: inline-block; padding-top: 2px; \" >".$message['user']."</a></td>
                        <td align=\"right\">
                            <span class=\"masterTooltip crewFeedTimeStamp curve2pxBottom\" title=\"".$time->format('Y-m-d H:i:s')."\">";
                if($diff->format('%a')>10){
                    $texto.=$time->format('Y-m-d');
                }elseif($diff->format('%i')<=0) {
                    $texto.="Just now";
                }elseif($diff->format('%h')<=0) {
                    $texto.=$diff->format('%i mins ago');
                }elseif($diff->format('%a')<=0) {
                    $texto.=$diff->format('%h hrs ago');
                }else{
                    $texto.=$diff->format('%a days ago');
                }
$texto.="</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=\"2\" class=\"feedPostComment\">";
if($countthree > '20'){
    $texto.="This user tried to post more than 20 smilies, this is < b>NOT </b > allowed";
}else{
    $texto.=nl2br($postinfo);
}
$texto.="</td>
                    </tr>
                    </tbody>
                </table>";
            }
        }
        $cont++;
    }
    $_SESSION['chat']=$texto;
    $data['texto']=$texto;
    print_r(json_encode($data));

}elseif(isset($_POST['message']) && isset($_POST['username']) && isset($_POST['crew'])){

    $crew=$_POST['crew'];
    $message=$_POST['message'];
    $user=$_POST['username'];

    $zpattern[a] = "<";
    $zpattern[b] = ">";
    $zpattern[c] = "fuck";

    $zreplace[a] = "&lt;";
    $zreplace[b] = "&gt;";
    $zreplace[d] = "<span id=nawty>fuck</span>";

    $i = 0;
    $while = mysql_query("SELECT word FROM blacklist");
    while ($all = mysql_fetch_array($while)){
        $i = $i + 1;
        $zpattern[$i] = $all['word'];
        $zreplace[$i] = "infamousgangsters";
    }


    $postinforawa = html_entity_decode($message, ENT_NOQUOTES);
    $postinforawb = $postinforawa;

    $postinforawz = str_replace($zpattern,$zreplace,$postinforawb);

    $epattern[1] = "/\[b\](.*?)\[\/b\]/is";
    $epattern[2] = "/\[u\](.*?)\[\/u\]/is";
    $epattern[3] = "/\[i\](.*?)\[\/i\]/is";
    $epattern[4] = "/\[center\](.*?)\[\/center\]/is";
    $epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
    $epattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
    $epattern[8] = "/\[br\]/is";
    $epattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
    $epattern[11] = "/\[left\](.*?)\[\/left\]/is";
    $epattern[12] = "/\[right\](.*?)\[\/right\]/is";
    $epattern[13] = "/\[s\](.*?)\[\/s\]/is";
    $epattern[16] = "/\[personv\](.*?)\[\/personv\]/is";

    $ereplace[1] = "<b>$1</b>";
    $ereplace[2] = "<u>$1</u>";
    $ereplace[3] = "<i>$1</i>";
    $ereplace[4] = "<center>$1</center>";
    $ereplace[5] = "<font color=\"$1\">$2</font>";
    $ereplace[7] = "<font face=\"$1\">$2</font>";
    $ereplace[8] = "<br>";
    $ereplace[10] = "<blockquote><b><font color=7e96ac>$1</font></b></blockquote>";
    $ereplace[11] = "<div align=\"left\">$1</div>";
    $ereplace[12] = "<div align=\"right\">$1</div>";
    $ereplace[13] = "<s>$1</s>";
    $ereplace[16] = "$usernameone";

    $postinforawb = preg_replace($epattern,$ereplace,$postinforawz);

    $fpattern[1] = ":arrow:";
    $fpattern[2] = ":D";
    $fpattern[3] = ":S";
    $fpattern[4] = "8)";
    $fpattern[5] = ":cry:";
    $fpattern[6] = "8|";
    $fpattern[7] = ":evil:";
    $fpattern[8] = ":!:";
    $fpattern[9] = ":idea:";
    $fpattern[10] = ":lol:";
    $fpattern[11] = ":mad:";
    $fpattern[12] = ":?:";
    $fpattern[13] = ":redface:";
    $fpattern[14] = ":rolleyes:";
    $fpattern[15] = ":(";
    $fpattern[16] = ":)";
    $fpattern[17] = ":o";
    $fpattern[18] = ":tdn:";
    $fpattern[19] = ":P";
    $fpattern[20] = ":tup:";
    $fpattern[21] = ":twisted:";
    $fpattern[22] = ";)";
    $fpattern[23] = ":slepy:";
    $fpattern[24] = ":whistle:";
    $fpattern[25] = ":wub:";
    $fpattern[26] = ":muah:";
    $fpattern[27] = ":zipped:";
    $fpattern[28] = ":love:";
    $fpattern[29] = ":sarcasm:";

    $freplace[1] = '<img src=/layout/smiles/arrow.gif class="smileys" style="margin-top: 0;">';
    $freplace[2] = '<img src=/layout/smiles/biggrin.gif class="smileys"style="margin-top: 0;">';
    $freplace[3] = '<img src=/layout/smiles/confused.gif class="smileys"style="margin-top: 0;">';
    $freplace[4] = '<img src=/layout/smiles/cool.gif class="smileysstyle="margin-top: 0;"">';
    $freplace[5] = '<img src=/layout/smiles/cry.gif class="smileys"style="margin-top: 0;">';
    $freplace[6] = '<img src=/layout/smiles/eek.gif class="smileys"style="margin-top: 0;">';
    $freplace[7] = '<img src=/layout/smiles/evil.gif class="smileys"style="margin-top: 0;">';
    $freplace[8] = '<img src=/layout/smiles/exclaim.gif class="smileys"style="margin-top: 0;">';
    $freplace[9] = '<img src=/layout/smiles/idea.gif class="smileys"style="margin-top: 0;">';
    $freplace[10] = '<img src=/layout/smiles/lol.gif class="smileys"style="margin-top: 0;">';
    $freplace[11] = '<img src=/layout/smiles/mad.gif class="smileys"style="margin-top: 0;">';
    $freplace[12] = '<img src=/layout/smiles/question.gif class="smileys"style="margin-top: 0;">';
    $freplace[13] = '<img src=/layout/smiles/redface.gif class="smileys"style="margin-top: 0;">';
    $freplace[14] = '<img src=/layout/smiles/rolleyes.gif class="smileys"style="margin-top: 0;">';
    $freplace[15] = '<img src=/layout/smiles/sad.gif class="smileys"style="margin-top: 0;">';
    $freplace[16] = '<img src=/layout/smiles/smile.gif class="smileys"style="margin-top: 0;">';
    $freplace[17] = '<img src=/layout/smiles/surprised.gif class="smileys"style="margin-top: 0;">';
    $freplace[18] = '<img src=/layout/smiles/tdown.gif class="smileys"style="margin-top: 0;">';
    $freplace[19] = '<img src=/layout/smiles/toungue.gif class="smileys"style="margin-top: 0;">';
    $freplace[20] = '<img src=/layout/smiles/tup.gif class="smileys"style="margin-top: 0;">';
    $freplace[21] = '<img src=/layout/smiles/twisted.gif class="smileys"style="margin-top: 0;">';
    $freplace[22] = '<img src=/layout/smiles/wink.gif class="smileys"style="margin-top: 0;">';
    $freplace[23] = '<img src=/layout/smiles/slepy.png class="smileys"style="margin-top: 0;">';
    $freplace[24] = '<img src=/layout/smiles/whistle.gif class="smileys"style="margin-top: 0;">';
    $freplace[25] = '<img src=/layout/smiles/wub.gif class="smileys"style="margin-top: 0;">';
    $freplace[26] = '<img src=/layout/smiles/muah.gif class="smileys"style="margin-top: 0;">';
    $freplace[27] = '<img src=/layout/smiles/zipped.gif class="smileys"style="margin-top: 0;">';
    $freplace[28] = '<img src=/layout/smiles/love.gif class="smileys"style="margin-top: 0;">';
    $freplace[29] = '<img src=/layout/smiles/sarcasm.gif class="smileys"style="margin-top: 0;">';


    $postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);

	$msg_time = date('Y-m-d H:i:s');

    mysql_query("INSERT INTO crewfeed(crew,message,time,user) VALUES ('$crew','$message','$msg_time','$user')");

    $now=new DateTime();
    echo "<table class=\"feedPost newCrewFeedMessage\" cellspacing=\"0\" cellpadding=\"0\">
            <tbody>
            <tr>
                <td align=\"left\"><a href=\"viewprofile.php?username=$user\" style=\"display: inline-block; padding-top: 2px; \" class=\"newCrewFeedTitle\">$user</a></td>
                <td align=\"right\">
                <span class=\"masterTooltip crewFeedTimeStamp curve2pxBottom newCrewFeedTitle\" title=\"$now->format('Y-m-d H:i:s')\">Just now</span>
                </td>
            </tr>
            <tr>
                <td colspan=\"2\" class=\"feedPostComment\">";
                if($countthree > '20'){
                    echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
                }else{
                    echo nl2br($postinfo);
                }
            echo"</td>
            </tr>
            </tbody>
        </table>";
}else {

    $messages = mysql_query("SELECT * FROM crewfeed WHERE crew = '$getcrewid' ORDER BY `time` ASC");
    $cont = 0;
    while ($message = mysql_fetch_array($messages)) {

        $zpattern[a] = "<";
        $zpattern[b] = ">";
        $zpattern[c] = "fuck";

        $zreplace[a] = "&lt;";
        $zreplace[b] = "&gt;";
        $zreplace[d] = "<span id=nawty>fuck</span>";

        $i = 0;
        $while = mysql_query("SELECT word FROM blacklist");
        while ($all = mysql_fetch_array($while)) {
            $i = $i + 1;
            $zpattern[$i] = $all['word'];
            $zreplace[$i] = "infamousgangsters";
        }


        $postinforawa = html_entity_decode($message['message'], ENT_NOQUOTES);
        $postinforawb = $postinforawa;

        $postinforawz = str_replace($zpattern, $zreplace, $postinforawb);

        $epattern[1] = "/\[b\](.*?)\[\/b\]/is";
        $epattern[2] = "/\[u\](.*?)\[\/u\]/is";
        $epattern[3] = "/\[i\](.*?)\[\/i\]/is";
        $epattern[4] = "/\[center\](.*?)\[\/center\]/is";
        $epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
        $epattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
        $epattern[8] = "/\[br\]/is";
        $epattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
        $epattern[11] = "/\[left\](.*?)\[\/left\]/is";
        $epattern[12] = "/\[right\](.*?)\[\/right\]/is";
        $epattern[13] = "/\[s\](.*?)\[\/s\]/is";
        $epattern[16] = "/\[personv\](.*?)\[\/personv\]/is";

        $ereplace[1] = "<b>$1</b>";
        $ereplace[2] = "<u>$1</u>";
        $ereplace[3] = "<i>$1</i>";
        $ereplace[4] = "<center>$1</center>";
        $ereplace[5] = "<font color=\"$1\">$2</font>";
        $ereplace[7] = "<font face=\"$1\">$2</font>";
        $ereplace[8] = "<br>";
        $ereplace[10] = "<blockquote><b><font color=7e96ac>$1</font></b></blockquote>";
        $ereplace[11] = "<div align=\"left\">$1</div>";
        $ereplace[12] = "<div align=\"right\">$1</div>";
        $ereplace[13] = "<s>$1</s>";
        $ereplace[16] = "$usernameone";

        $postinforawb = preg_replace($epattern, $ereplace, $postinforawz);

        $fpattern[1] = ":arrow:";
        $fpattern[2] = ":D";
        $fpattern[3] = ":S";
        $fpattern[4] = "8)";
        $fpattern[5] = ":cry:";
        $fpattern[6] = "8|";
        $fpattern[7] = ":evil:";
        $fpattern[8] = ":!:";
        $fpattern[9] = ":idea:";
        $fpattern[10] = ":lol:";
        $fpattern[11] = ":mad:";
        $fpattern[12] = ":?:";
        $fpattern[13] = ":redface:";
        $fpattern[14] = ":rolleyes:";
        $fpattern[15] = ":(";
        $fpattern[16] = ":)";
        $fpattern[17] = ":o";
        $fpattern[18] = ":tdn:";
        $fpattern[19] = ":P";
        $fpattern[20] = ":tup:";
        $fpattern[21] = ":twisted:";
        $fpattern[22] = ";)";
        $fpattern[23] = ":slepy:";
        $fpattern[24] = ":whistle:";
        $fpattern[25] = ":wub:";
        $fpattern[26] = ":muah:";
        $fpattern[27] = ":zipped:";
        $fpattern[28] = ":love:";
        $fpattern[29] = ":sarcasm:";

        $freplace[1] = '<img src=/layout/smiles/arrow.gif class="smileys" style="margin-top: 0;">';
        $freplace[2] = '<img src=/layout/smiles/biggrin.gif class="smileys"style="margin-top: 0;">';
        $freplace[3] = '<img src=/layout/smiles/confused.gif class="smileys"style="margin-top: 0;">';
        $freplace[4] = '<img src=/layout/smiles/cool.gif class="smileysstyle="margin-top: 0;"">';
        $freplace[5] = '<img src=/layout/smiles/cry.gif class="smileys"style="margin-top: 0;">';
        $freplace[6] = '<img src=/layout/smiles/eek.gif class="smileys"style="margin-top: 0;">';
        $freplace[7] = '<img src=/layout/smiles/evil.gif class="smileys"style="margin-top: 0;">';
        $freplace[8] = '<img src=/layout/smiles/exclaim.gif class="smileys"style="margin-top: 0;">';
        $freplace[9] = '<img src=/layout/smiles/idea.gif class="smileys"style="margin-top: 0;">';
        $freplace[10] = '<img src=/layout/smiles/lol.gif class="smileys"style="margin-top: 0;">';
        $freplace[11] = '<img src=/layout/smiles/mad.gif class="smileys"style="margin-top: 0;">';
        $freplace[12] = '<img src=/layout/smiles/question.gif class="smileys"style="margin-top: 0;">';
        $freplace[13] = '<img src=/layout/smiles/redface.gif class="smileys"style="margin-top: 0;">';
        $freplace[14] = '<img src=/layout/smiles/rolleyes.gif class="smileys"style="margin-top: 0;">';
        $freplace[15] = '<img src=/layout/smiles/sad.gif class="smileys"style="margin-top: 0;">';
        $freplace[16] = '<img src=/layout/smiles/smile.gif class="smileys"style="margin-top: 0;">';
        $freplace[17] = '<img src=/layout/smiles/surprised.gif class="smileys"style="margin-top: 0;">';
        $freplace[18] = '<img src=/layout/smiles/tdown.gif class="smileys"style="margin-top: 0;">';
        $freplace[19] = '<img src=/layout/smiles/toungue.gif class="smileys"style="margin-top: 0;">';
        $freplace[20] = '<img src=/layout/smiles/tup.gif class="smileys"style="margin-top: 0;">';
        $freplace[21] = '<img src=/layout/smiles/twisted.gif class="smileys"style="margin-top: 0;">';
        $freplace[22] = '<img src=/layout/smiles/wink.gif class="smileys"style="margin-top: 0;">';
        $freplace[23] = '<img src=/layout/smiles/slepy.png class="smileys"style="margin-top: 0;">';
        $freplace[24] = '<img src=/layout/smiles/whistle.gif class="smileys"style="margin-top: 0;">';
        $freplace[25] = '<img src=/layout/smiles/wub.gif class="smileys"style="margin-top: 0;">';
        $freplace[26] = '<img src=/layout/smiles/muah.gif class="smileys"style="margin-top: 0;">';
        $freplace[27] = '<img src=/layout/smiles/zipped.gif class="smileys"style="margin-top: 0;">';
        $freplace[28] = '<img src=/layout/smiles/love.gif class="smileys"style="margin-top: 0;">';
        $freplace[29] = '<img src=/layout/smiles/sarcasm.gif class="smileys"style="margin-top: 0;">';


        $postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);

        if ($message['message'] == 'join') {
            $usersql = mysql_query("SELECT * FROM crews WHERE id = '".$message['crew']."'");
            $crews = mysql_fetch_array($usersql);
            ?>
            <table class="feedPost" style="margin-left: -1px; background: #232323;" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td colspan="2" class="feedPostComment" style="border-left: 3px solid green; padding: 7px;">
                        <a href="viewprofile.php?username=<?echo $message['user']; ?>"><?echo $message['user']; ?> </a>
                        joined
                        <a href="viewcrew.php?crewid=<?echo $message['crew']; ?>"><?echo $crews['name']; ?></a>!
                    </td>
                </tr>
                </tbody>
            </table>
        <? } else if ($message['message'] == 'dead') {
            ?>
            <table class="feedPost" style="margin-left: -1px; background: #232323;" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td colspan="2" class="feedPostComment" style="border-left: 3px solid red; padding: 7px;">
                        <a href="viewprofile.php?username=<?echo $message['user']; ?>"><?echo $message['user']; ?> </a>
                        has been killed!
                    </td>
                </tr>
                </tbody>
            </table>

        <? } else {
            $now = new DateTime();
            $time = DateTime::createFromFormat('Y-m-d H:i:s', $message['time']);
            $diff = $now->diff($time);
            if ($cont == 0) {
                ?>
                <table class="feedPost newCrewFeedMessage" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td align="left"><a href="viewprofile.php?username=<?
                            echo $message['user']; ?>" style="display: inline-block; padding-top: 2px; "
                                            class="newCrewFeedTitle"><?
                                echo $message['user']; ?></a></td>
                        <td align="right">
                            <span class="masterTooltip crewFeedTimeStamp curve2pxBottom newCrewFeedTitle"
                                  title="<? echo $time->format('Y-m-d H:i:s') ?>">
                                <?
                                if ($diff->format('%a') > 10) {
                                    echo $time->format('Y-m-d');
                                } elseif ($diff->format('%i') <= 0) {
                                    echo "Just now";
                                } elseif ($diff->format('%h') <= 0) {
                                    echo $diff->format('%i mins ago');
                                } elseif ($diff->format('%a') <= 0) {
                                    echo $diff->format('%h hrs ago');
                                } else {
                                    echo $diff->format('%a days ago');
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=\"2\" class=\"feedPostComment\">
                            <?
                            if ($countthree > '20') {
                                echo "This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
                            } else {
                                echo nl2br($postinfo);
                            } ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            <?
            } else {
                ?>
                <table class="feedPost" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td align="left"><a href="viewprofile.php?username=<?
                            echo $message['user']; ?>" style="display: inline-block; padding-top: 2px; "><?
                                echo $message['user']; ?></a></td>
                        <td align="right">
                            <span class="masterTooltip crewFeedTimeStamp curve2pxBottom"
                                  title="<? echo $time->format('Y-m-d H:i:s') ?>">
                                <?
                                if ($diff->format('%a') > 10) {
                                    echo $time->format('Y-m-d');
                                } elseif ($diff->format('%i') <= 0) {
                                    echo "Just now";
                                } elseif ($diff->format('%h') <= 0) {
                                    echo $diff->format('%i mins ago');
                                } elseif ($diff->format('%a') <= 0) {
                                    echo $diff->format('%h hrs ago');
                                } else {
                                    echo $diff->format('%a days ago');
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=\"2\" class=\"feedPostComment\">
                            <?
                            if ($countthree > '20') {
                                echo "This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
                            } else {
                                echo nl2br($postinfo);
                            } ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            <?
            }
        }
        $cont++; ?>
    <?
    }
    if ($cont == 0) {
        ?>
        <table class="feedPost newCrewFeedMessage" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td colspan="2" class="feedPostComment">Feed is empty.</td>
            </tr>
            </tbody>
        </table>
    <?
    }
}?>


