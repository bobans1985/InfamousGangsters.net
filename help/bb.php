<?php
//Dispute owns
//Dispute coded this, it gets removed I kill.
//returns bb'ised code
function dobbcodes($text, $img = "true"){
#Safety and entities
    $text = htmlentities($text, ENT_QUOTES);
#Newlines
#Bold text
    $text = preg_replace('(\[b\](.+?)\[/b\])', '<strong>$1</strong>', $text);
#image
    if($img == "true"){
        $text = preg_replace('(\[img\]http://(.+?)\[/(?:img)?\])', '<img border="" src="http://$1">', $text);
        $text = preg_replace('(\[img\](.+?)\[/(?:img)?\])', '<img border="" src="http://$1">', $text);
        $post =preg_replace('¬\\\¬is','',$text);}}
function inboxbb($post, $img = "true"){
#Newlines
//Dispute owns
//Dispute coded this, it gets removed I kill.
    $post=preg_replace('¬\[size=(.*?)](.*?)\[/size]¬is','<font size=\\1>\\2</font>',$post);
    $post = str_replace(array("\r\n", "[br]", "\r"), '<br>', $post);
    $post = str_replace("[hr]", " <hr> ", $post);
    return $post;}
//Dispute owns
//Dispute coded this, it gets removed I kill.
function forumbb($post){
    $zpattern[a] = "<";
    $zpattern[b] = ">";
    $zreplace[a] = "&lt;";
    $zreplace[b] = "&gt;";
    $postinforawz = str_replace($zpattern, $zreplace, $post);
    $epattern[1] = "/\[b\](.*?)\[\/b\]/is";
    $epattern[2] = "/\[u\](.*?)\[\/u\]/is";
    $epattern[3] = "/\[i\](.*?)\[\/i\]/is";
    $epattern[4] = "/\[center\](.*?)\[\/center\]/is";
    $epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
    $epattern[6] = "/\[img\](.*?)\[\/img\]/is";
    $epattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
    $epattern[8] = "/\[br\]/is";
    $epattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
    $epattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
    $epattern[11] = "/\[left\](.*?)\[\/left\]/is";
    $epattern[12] = "/\[right\](.*?)\[\/right\]/is";
    $epattern[13] = "/\[s\](.*?)\[\/s\]/is";
    $ereplace[1] = "<b>$1</b>";
    $ereplace[2] = "<u>$1</u>";
    $ereplace[3] = "<i>$1</i>";
    $ereplace[4] = "<center>$1</center>";
    $ereplace[5] = "<font color=\"$1\">$2</font>";
    $ereplace[6] = "<img src=\"$1\">";
    $ereplace[7] = "<font face=\"$1\">$2</font>";
    $ereplace[8] = "<br>";
    $ereplace[9] = "<font size=\"$1\">$2</font>";
    $ereplace[10] = "<blockquote><b>$1</b></blockquote>";
    $ereplace[11] = "<div align=\"left\">$1</div>";
    $ereplace[12] = "<div align=\"right\">$1</div>";
    $ereplace[13] = "<s>$1</s>";
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

    $freplace[1] = '<img src=/layout/smiles/arrow.gif class="smileys">';
    $freplace[2] = '<img src=/layout/smiles/biggrin.gif class="smileys">';
    $freplace[3] = '<img src=/layout/smiles/confused.gif class="smileys">';
    $freplace[4] = '<img src=/layout/smiles/cool.gif class="smileys">';
    $freplace[5] = '<img src=/layout/smiles/cry.gif class="smileys">';
    $freplace[6] = '<img src=/layout/smiles/eek.gif class="smileys">';
    $freplace[7] = '<img src=/layout/smiles/evil.gif class="smileys">';
    $freplace[8] = '<img src=/layout/smiles/exclaim.gif class="smileys">';
    $freplace[9] = '<img src=/layout/smiles/idea.gif class="smileys">';
    $freplace[10] = '<img src=/layout/smiles/lol.gif class="smileys">';
    $freplace[11] = '<img src=/layout/smiles/mad.gif class="smileys">';
    $freplace[12] = '<img src=/layout/smiles/question.gif class="smileys">';
    $freplace[13] = '<img src=/layout/smiles/redface.gif class="smileys">';
    $freplace[14] = '<img src=/layout/smiles/rolleyes.gif class="smileys">';
    $freplace[15] = '<img src=/layout/smiles/sad.gif class="smileys">';
    $freplace[16] = '<img src=/layout/smiles/smile.gif class="smileys">';
    $freplace[17] = '<img src=/layout/smiles/surprised.gif class="smileys">';
    $freplace[18] = '<img src=/layout/smiles/tdown.gif class="smileys">';
    $freplace[19] = '<img src=/layout/smiles/toungue.gif class="smileys">';
    $freplace[20] = '<img src=/layout/smiles/tup.gif class="smileys">';
    $freplace[21] = '<img src=/layout/smiles/twisted.gif class="smileys">';
    $freplace[22] = '<img src=/layout/smiles/wink.gif class="smileys">';
    $freplace[23] = '<img src=/layout/smiles/slepy.png class="smileys">';
    $freplace[24] = '<img src=/layout/smiles/whistle.gif class="smileys">';
    $freplace[25] = '<img src=/layout/smiles/wub.gif class="smileys">';
    $freplace[26] = '<img src=/layout/smiles/muah.gif class="smileys">';
    $freplace[27] = '<img src=/layout/smiles/zipped.gif class="smileys">';
    $freplace[28] = '<img src=/layout/smiles/love.gif class="smileys">';
    $freplace[29] = '<img src=/layout/smiles/sarcasm.gif class="smileys">';

    $postinfo = str_replace($fpattern, $freplace, $postinforawb);
    return $postinfo;}
//Dispute owns
//Dispute coded this, it gets removed I kill.
function sitefilter($post, $img = "false"){
#Safety and entities
#Newlines
    $post = nl2br($post);
    $post =preg_replace('¬\\\¬is','',$post);
    $post = str_replace("<br />", "/r/n", $post);
    return $post;}
//Dispute owns
//Dispute coded this, it gets removed I kill.
function tbox($post, $img = "false"){
#Safety and entities
#Newlines
    $post = nl2br($post);
    $post =preg_replace('¬\\\¬is','',$post);
    $post = str_replace("/r/n", "", $post);
    $post = str_replace("<br />", "", $post);
    return $post;} ?>
