<? include 'included.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" href="layout/style.css" type="text/css"/>
    <title>Infamous Gangsters</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/main3.js"></script>
    

    <style>
        .stat.title {
            margin-top: 9px;
        }

         {
            margin-top: 14px;
        }

        .btm-statbreak {
            height: 7px;
            display: block;
        }
    </style>
    <script>
        if (window.innerHeight > 700) {
            document.getElementById('crewFeedScrollID').style.maxHeight = "330px";
        }

        var unixTime = 1498981670.58;
        var muteSound = false;

        $('input, select, textarea').focus(function () {
            $('meta[name=viewport]').attr('content', 'width=device-width,initial-scale=1,maximum-scale=1.0');
        });
        $('input, select, textarea').blur(function () {
            $('meta[name=viewport]').attr('content', 'width=device-width,initial-scale=1,maximum-scale=10');
        });
    </script>
    <script type="text/javascript">
        function emotion(em) {
            $('#topicinfo').html($('#topicinfo').html() + em);
        }
    </script>
</head>
<body id="body">
<div id="alertBox"></div>
<div class="headerFloat">
    <div class="header">
        <table class="resize" cellspacing="0">
            <tr>
                <td width="220px" valign="top">
                    <div class="curve2px searchBox" id="searchBox">
                        <img class="searchBoxIcon" src="images/search.png">
                        <input name="search" autocomplete="off" class="searchBoxInput" maxlength="22" type="text"
                               id="search" placeholder="Search User..." onclick="this.select(); reClick();"
                               onfocus="document.getElementById('searchBox').style.border='2px solid #E6B34B'; "
                               onblur="document.getElementById('searchBox').style.border='';">
                    </div>
                </td>
                <td valign="top" class="centerTd">
                    <? include "cpanel_top.php";?>
                </td>
                <td width="233px" valign="top" class="centerTd">
                    <?php include "relative_block.php"; ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="curve4pxBottom searchFloat preventscroll" id="searchResults"
                         style="text-align: center;"></div>
                </td>
            </tr>
        </table>
    </div>
</div>
<table cellspacing="0" class="resize" id="block">
    <tr>
        <td width="224px" style="min-width: 224px;" valign="top">
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <?php include 'leftmenu.php'; ?>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
        </td>
        <td valign="top">
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="top">
                        <div class="main forumPost curve2px">
                            <div class="menuHeader noTop">
                                <div style="text-align: left; padding-left: 3px; padding-right: 3px;">
                                    <span style="float: right; cursor: pointer; color: silver; font-size: 10px;"
                                          title="2016/09/06 10:06:12 pm" class="masterTooltip">1 day ago</span>
                                    <span style="color: #FFC753;"><b>IMPORTANT</b>:</span>IG Reference Guide<span
                                            style="color: #777777; padding-left: 3px;">(Locked)</span><span
                                            class="miniSep"></span><a href="viewprofile.php?username=DonCorleone"><b
                                                style="color: red;"></b></a>
                                </div>
                            </div>
                            <div style="padding: 12px; padding-left: 9px; padding-right: 9px;  padding-bottom: 15px; margin: auto; color: #fefefe;">
                                <?php
                                $saturate = "/[^a-z0-9]/i";
                                $saturated = "/[^0-9]/i";
                                $sessionidraw = $_COOKIE['PHPSESSID'];
                                $sessionid = preg_replace($saturate, "", $sessionidraw);
                                $userip = $_SERVER[REMOTE_ADDR];
                                $gangsterusername = $usernameone;

                                $playerrank = $myrank;

                                $time = time();
                                $edittopicraw = $_POST['edittopic'];
                                $edittopic = htmlentities($edittopicraw, ENT_QUOTES);
                                $playerarray = $statustesttwo;
                                $playerrank = $playerarray['rankid'];


                                $editsql = mysql_query("SELECT * FROM forumtopics WHERE title = 'FAQ'");
                                $editarray = mysql_fetch_array($editsql);
                                $editname = $editarray['creator'];

                                if (($rankid == '100') || ($rankid == '75')) {
                                    if (isset($_POST['edit'])) {
                                        if (!$edittopic) {
                                        } else {
                                            mysql_query("UPDATE forumtopics SET info = '$edittopic' WHERE type = 'faq'");
                                        }
                                    }
                                }


                                $topicinforaw = html_entity_decode($editarray['info'], ENT_NOQUOTES);

                                $zpattern[a] = "<";
                                $zpattern[b] = ">";
                                $zpattern[c] = "[div id=key]";
                                $zpattern[d] = "[/div]";
                                $zreplace[a] = "&lt;";
                                $zreplace[b] = "&gt;";
                                $zreplace[c] = "<div id=key>";
                                $zreplace[d] = "</div>";


                                $topicinforawz = str_replace($zpattern, $zreplace, $topicinforaw);
                                $dpattern[1] = "/\[b\](.*?)\[\/b\]/is";
                                $dpattern[2] = "/\[u\](.*?)\[\/u\]/is";
                                $dpattern[3] = "/\[i\](.*?)\[\/i\]/is";
                                $dpattern[4] = "/\[center\](.*?)\[\/center\]/is";
                                $dpattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
                                $dpattern[6] = "/\[img\](.*?)\[\/img\]/is";
                                $dpattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
                                $dpattern[8] = "/\[br\]/is";
                                $dpattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
                                $dpattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
                                $dpattern[11] = "/\[left\](.*?)\[\/left\]/is";
                                $dpattern[12] = "/\[right\](.*?)\[\/right\]/is";
                                $dpattern[13] = "/\[s\](.*?)\[\/s\]/is";

                                $dreplace[1] = "<b>$1</b>";
                                $dreplace[2] = "<u>$1</u>";
                                $dreplace[3] = "<i>$1</i>";
                                $dreplace[4] = "<center>$1</center>";
                                $dreplace[5] = "<font color=\"$1\">$2</font>";
                                $dreplace[6] = "<img src=\"$1\">";
                                $dreplace[7] = "<font face=\"$1\">$2</font>";
                                $dreplace[8] = "<br>";
                                $dreplace[9] = "<font size=\"$1\">$2</font><font size=\"1\">";
                                $dreplace[10] = "<blockquote><b>$1</b></blockquote>";
                                $dreplace[11] = "<div align=\"left\">$1</div>";
                                $dreplace[12] = "<div align=\"right\">$1</div>";
                                $dreplace[13] = "<s>$1</s>";

                                $topicinfoa = preg_replace($dpattern, $dreplace, $topicinforawz);

                                $cpattern[1] = ":arrow:";
                                $cpattern[2] = ":D";
                                $cpattern[3] = ":S";
                                $cpattern[4] = "8)";
                                $cpattern[5] = ":cry:";
                                $cpattern[6] = "8|";
                                $cpattern[7] = ":evil:";
                                $cpattern[8] = ":!:";
                                $cpattern[9] = ":idea:";
                                $cpattern[10] = ":lol:";
                                $cpattern[11] = ":mad:";
                                $cpattern[12] = ":?:";
                                $cpattern[13] = ":redface:";
                                $cpattern[14] = ":rolleyes:";
                                $cpattern[15] = ":(";
                                $cpattern[16] = ":)";
                                $cpattern[17] = ":o";
                                $cpattern[18] = ":tdn:";
                                $cpattern[19] = ":P";
                                $cpattern[20] = ":tup:";
                                $cpattern[21] = ":twisted:";
                                $cpattern[22] = ";)";
                                $cpattern[23] = ":slepy:";
                                $cpattern[24] = ":whistle:";
                                $cpattern[25] = ":wub:";
                                $cpattern[26] = ":muah:";
                                $cpattern[27] = ":zipped:";
                                $cpattern[28] = ":love:";
                                $cpattern[29] = ":sarcasm:";

                                $creplace[1] = '<img src=/layout/smiles/arrow.gif class="smileys">';
                                $creplace[2] = '<img src=/layout/smiles/biggrin.gif class="smileys">';
                                $creplace[3] = '<img src=/layout/smiles/confused.gif class="smileys">';
                                $creplace[4] = '<img src=/layout/smiles/cool.gif class="smileys">';
                                $creplace[5] = '<img src=/layout/smiles/cry.gif class="smileys">';
                                $creplace[6] = '<img src=/layout/smiles/eek.gif class="smileys">';
                                $creplace[7] = '<img src=/layout/smiles/evil.gif class="smileys">';
                                $creplace[8] = '<img src=/layout/smiles/exclaim.gif class="smileys">';
                                $creplace[9] = '<img src=/layout/smiles/idea.gif class="smileys">';
                                $creplace[10] = '<img src=/layout/smiles/lol.gif class="smileys">';
                                $creplace[11] = '<img src=/layout/smiles/mad.gif class="smileys">';
                                $creplace[12] = '<img src=/layout/smiles/question.gif class="smileys">';
                                $creplace[13] = '<img src=/layout/smiles/redface.gif class="smileys">';
                                $creplace[14] = '<img src=/layout/smiles/rolleyes.gif class="smileys">';
                                $creplace[15] = '<img src=/layout/smiles/sad.gif class="smileys">';
                                $creplace[16] = '<img src=/layout/smiles/smile.gif class="smileys">';
                                $creplace[17] = '<img src=/layout/smiles/surprised.gif class="smileys">';
                                $creplace[18] = '<img src=/layout/smiles/tdown.gif class="smileys">';
                                $creplace[19] = '<img src=/layout/smiles/toungue.gif class="smileys">';
                                $creplace[20] = '<img src=/layout/smiles/tup.gif class="smileys">';
                                $creplace[21] = '<img src=/layout/smiles/twisted.gif class="smileys">';
                                $creplace[22] = '<img src=/layout/smiles/wink.gif class="smileys">';
                                $creplace[23] = '<img src=/layout/smiles/slepy.png class="smileys">';
                                $creplace[24] = '<img src=/layout/smiles/whistle.gif class="smileys">';
                                $creplace[25] = '<img src=/layout/smiles/wub.gif class="smileys">';
                                $creplace[26] = '<img src=/layout/smiles/muah.gif class="smileys">';
                                $creplace[27] = '<img src=/layout/smiles/zipped.gif class="smileys">';
                                $creplace[28] = '<img src=/layout/smiles/love.gif class="smileys">';
                                $creplace[29] = '<img src=/layout/smiles/sarcasm.gif class="smileys">';
                                $topicinfo = str_replace($cpattern, $creplace, $topicinfoa);
                                $toplocked = $gettopicidarray['locked'];
                                $newpostraw = $_POST['newpost'];
                                $newpost = htmlentities($newpostraw, ENT_QUOTES);

                                ?>
                                <table width="85%" cellpadding="0" cellspacing="1">

                                    <div id="termsText"
                                         style="padding: 20px; font-size: 10px; font-family: Verdana;text-align: left;">

                                        <center>
                                            <span style="font-size: 25px;"><span style="color: white;"><b>FAQ</b></span></span><br/><br/>
                                            <br/>- - - - - -<br/>

                                            <br/><span style="color: red; font-size: 11px;"><u><b>CHEATING/HACKING WILL NOT BE TOLERATED!</b></u></span><br/>

                                            <span style="color: red; font-size: 11px;">- </span><span
                                                    style="color: white; font-size: 11px;">We advise all users to read Important and Sticky topics in the Forum for the Game Rules.</span><span
                                                    style="color: red;"> -</span><br/>
                                            <br/>- - - - - -<br/>
                                            <br/><br/>

                                            <br/><font color="white"><br/>
                                                <center><b><font size="2">Player Ranks</b></center>
                                            </font><br/>
                                            <span>Hobo</span><br/>
                                            <span>Civilian</span><br/>
                                            <span>Recruit</span><br/>
                                            <span>Vandal</span><br/>
                                            <span>Crafter</span><br/>
                                            <span>Respected Crafter</span><br/>
                                            <span>Businessman</span><br/>
                                            <span>Respected Businessman</span><br/>
                                            <span>Infamous Businessman</span><br/>
                                            <span>Hitman</span><br/>
                                            <span>Respected Hitman</span><br/>
                                            <span>Infamous Hitman</span><br/>
                                            <span>Godfather</span><br/>
                                            <span>Respected Godfather</span><br/>
                                            <span>Infamous Godfather</span><br/>
                                            <span>Don</span><br/>
                                            <span>Respected Don</span><br/>
                                            <span>Infamous Don</span><br/>
                                            <span>Gangster</span><br/>
                                            <span>Respected Gangster</span><br/>
                                            <span><b>American Gangster</b></span><br/>
                                            <span style="color: gold;"><b>Infamous Gangster</b></span>
                                            <br/>
                                            <b><br/><u>Money Ranks</u></b><br/>

                                            <br/><span>$0 = Broke</span><br/>
                                            <span>$1 - $499,999 = Very Poor</span><br/>
                                            <span>$500,000 - $999,999 = Poor</span><br/>
                                            <span>$1,000,000 - $4,999,999 = Rich</span><br/>
                                            <span>$5,000,000 - $9,999,999 = Quite Rich</span><br/>
                                            <span>$10,000,000 - $49,999,999 = Extremely Rich</span><br/>
                                            <span>$50,000,000 - $999,999,999 = Immensely Rich</span><br/>
                                            <span>$1,000,000,000 - $24,999,999,999 = Monumental Billionaire</span><br/>
                                            <span>$25,000,000,000 + = </span><b>Colossal Billionaire</b>
                                            <br/><br/><br/><br/>
                                        </center>

                                        <center><b><font size="2">IP - Rules</b></font></center>
                                        <br/><br/> This page will show you all the accounts on each IP you have logged
                                        into The Mafia Town on.
                                        If you find there are more than one alive account on your IP, you are therefore
                                        excluded frommaking money / point transactions with those accounts. For each
                                        rule broken, you will receive
                                        a penalty point, the more penalty points you have the more chance you have of
                                        being
                                        Modkilled or Banned.<br/><br/>

                                        <center><b><font size="2">Game Network</b></font></center>
                                        <br/><br/>You can find the FAQ / TOS on here.
                                        This is also a place for users to see recent activity and chat to others
                                        <br/><br/>

                                        <center><b><font size="2">Game Statistics</b></font></center>
                                        <br/><br/>This page will be automatically updated, showing how many users are dead / alive, total
                                        game money, average player money and the last 30 kills.<br/><br/>

                                        <center><b><font size="2">Referral System</b></font></center>
                                        <br/><br/>
                                        On this page, you will find your own referral link. This is used to recruit people to
                                        The Mafia Town, may it be your friends, family or random posts on other websites.
                                        Success on recruiting people will be rewarded with the stated rewards on
                                        the Referral Page.
                                        They also need to be verified & Respected Crafter for you to get your reward.
                                        <br/><br/>

                                        <center><b><font size="2">Users Online</b></font></center>
                                        <br/><br/>
                                        This is where you will be able to
                                        see which players are currently online, you will be able to identify which users are in a crew,
                                        not in a crew and who are staff. The Key for users are shown on the side
                                        of the page.<br/><br/>
                                        <b><u>Key:</b></u>
                                        <b><br/><font color="red">Example</font></b> Administrators<br/>
                                        <b><font color="aqua">Example</font></b> HDO Managers<br/>
                                        <b><font color="royalblue">Example</font></b> Moderators<br/>
                                        <b><font color="yellow">Example</font></b> Entertainer Managers<br/>
                                        <b><font color="lime">Example</font></b> Help Desk Operators (HDO&#039;s)<br/>
                                        <b><font color="pink">Example</font></b> Entertainers<br/>
                                        <font color="white"><u><b>Example</u></font></b> Infamous Gangster (Highest Rank)<br/>
                                        <b><font color="#78aaef">Example</font></b> News Editors<br/>
                                        <font color="white">Example</font> Players In A Crew<br/>
                                        <font color="gray">Example</font> Crewless Players<br/>
                                        <font color="white"><b>Example</b></font> Someone on your friend list
                                        <br/><br/>

                                        <center><b><font size="2">Edit Profile</b></font></center>
                                        <br/><br/>
                                        This page is for editing your profile and changing your password. Here you can edit your
                                        quote, access your Notepad and see your stats. You can also choose whether you want to
                                        show the other users your personal achievements, kills, jail busts, casino&#039;s won and your cars.<br/>
                                        <br/>

                                        <center><b><font size="2">Latest News</b></font></center>
                                        <br/><br/>On this page, you will find game news and updates, keep checking back
                                        to find all the latest news.<br/><br/>

                                        <center><b><font size="2">Helpdesk</b></font></center>
                                        <br/><br/>
                                        This is better known as a Help Desk. If you have a problem or need help with something that
                                        is not stated in our FAQ, you can post a ticket and one of our members of staff will answer
                                        your ticket. Please be patient while you are waiting for your reply, as staff members may be
                                        busy or need to think about the answer to your question.
                                        <br/><br/>

                                        <center><b><font size="2">My Statistics</b></font></center>
                                        <br/><br/>On this page you will be able to find out a number of interesting
                                        stats from your account. You can see how long your account has been alive, how
                                        much money you have won or lost at casinos as well as how many casinos you have
                                        won and lost. You can see your ranking statistics such as successful and failed
                                        attempts at crimes and how much money you have made from them along with your
                                        jailbust attempts, jailbust records and successful/failed GTA attempts. You can
                                        also see how many Exclusive and Rare cars you have stolen. At the bottom of the
                                        page you can see your shooting statistics. Things such as how many players you
                                        have killed, how many bullets you used to shoot at people and how many bullets
                                        you have made through melting and bullet factories. <br/><br/>

                                        <center><b><font size="2">Purchase Points</b></font></center>
                                        <br/><br/>This page will currently redirect you to the points page where you
                                        will be able to purchase points from there.<br/><br/>

                                        <center><b><font size="2">Top 15 Records</b></font></center>
                                        <br/><br/>This page shows a list of all the top players in a variety of
                                        different areas. This page shows the top 10 players in, Successful Jailbusts,
                                        Longest Successful Bust Streak, Total Number of Bullets Melted, Total Bullets
                                        melted for crew, Most Casino Wins and Most Points Spent on Account. All
                                        achievements are relevant to just one account and can be shown on your profile
                                        as your Honours. Your profile will show anywhere up to the 35th best however the
                                        Hall of Fame only shows the Top 15.<br/><br/>

                                        <center><b><font size="2">Create Message</b></font></center>
                                        <br/><br/>This page is where you send a message to another player, simply type
                                        their name into the<br/>
                                        box provided, type your message into the box below and click send<br/><br/>

                                        <center><b><font size="2">Inbox</b></font></center>
                                        <br/><br/>
                                        This page is where you will find your messages. You can also block people from messaging
                                        you by clicking on the Block User button and entering the persons name in the box provided.
                                        If your inbox gets full, you can clear it by clicking the Clear Inbox button.
                                        <br/><br/>

                                        <center><b><font size="2">Crew Forum</b></font></center>
                                        <br/><br/>This is where you can view and create topics that only you and the
                                        members of your crew can see. The boss of the Crew has access to message
                                        everyone in his/her Crew. By entering the message once, when the boss clicks the
                                        send message it is distributed to each and every player within their Crew. The
                                        boss can aso edit topics to make them Sticky/Important and can use BB codes in
                                        their topic titles. Only the crew Boss can do this.<br/><br/>

                                        <center><b><font size="2">Forum</b></font></center>
                                        <br/><br/>
                                        This page is for everyone to communicate with each other. You will also find the
                                        Game and Forum rules which you must follow in order to avoid being Banned or Modkilled.
                                        <br/><br/>

                                        <center><b><font size="2">Designers Forum</b></font></center>
                                        <br/><br/>This is where you can show off your latest designs, or post topics
                                        about buying pics or pic competitions. This is all the designers forum is to be
                                        used for.<br/><br/>

                                        <center><b><font size="2">Entertainment Forum</b></font></center>
                                        <br/><br/>This is where games are made by entertainers and you can make big cash
                                        by winning their games.<br/><br/>

                                        <center><b><font size="2">Crimes</b></font></center>
                                        <br/><br/>
                                        This page is where you do crimes to earn money and rank up. At a low rank you will only be
                                        able to do the lower crimes, but as you rank higer you can do the higher crimes to earn bigger
                                        rewards and further rank progress.
                                        <br/><br/>

                                        <center><b><font size="2">GTA</b></font></center>
                                        <br/><br/>
                                        This is another way to gain rankup, it is better known as a Grand Theft Auto. With the cars
                                        you steal, you will be able to sell them to other users for cash, or melt them for bullets.
                                        <br/><br/>

                                        <center><b><font size="2">Jail</b></font></center>
                                        <br/><br/>
                                        When you fail a crime or you fail to steal a car, you will
                                        be sentenced to jail. Other users will
                                        have the opportunity to bust you out and receive the reward that you set but also run the risk
                                        of failing and being put into jail themselves. However if you want to leave jail instantly, there
                                        is an option to leave jail, costing you 3 points. If users are in jail, you will see this:
                                        <span style="color: red;">Jail <b>(2)</b></span>
                                            with the number depending on how many people are in jail.
                                        <br/><br/><br/>

                                        <center><b><font size="2">Melt Cars</b></font></center>
                                        <br/><br/>On this page you can melt cars for bullets. Each car is worth a
                                        different amount of bullets and any damaged cars will lower the amount of
                                        bullets you will receive for melting. The number of bullets received for a 0%
                                        damaged car is as follows:
                                        <br/><br/>
                                        <b><font size="2">Repair</font></b>
                                        <br/><br/>Here you can try and repair your cars that are damaged, the higher the
                                        damage of the car, the less chance you have of being able to repair it. You will
                                        receive a very small about of exp for repairing a car.<br/><br/>

                                        <center><b><font size="2">Organised Crime</b></font></center>
                                        <br/><br/>
                                        The city crime is the biggest crime, which you can only commit every 12
                                        hours. To join all you need to do is click join, then once 3 other users have joined, the crime will automatically
                                        commit giving each user the same amount of cash.
                                        <br/><br/>

                                        <center><b><font size="2">Bank Account</b></font></center>
                                        <br/><br/>Here you are able to send money to other users. You can also put your money into your
                                        Interest Bank to gain 1% interest on what you put in there, however please be aware that if
                                        you die while your money is in your Interest Bank, it can not be retrieved. There is also a
                                        swiss bank which you wont receive any interest from, however if you die you will be able to retrieve your money.
                                        <br/><br/>

                                        <center><b><font size="2">Points</b></font></center>
                                        <br/><br/>
                                        The points page is where you can buy extra&#039;s for your account with your game points and
                                        send gifts to other users. When sending a gift, you simply enter the name of the user you
                                        wish to send the gift to, click the gift you wish to send to them and it will charge you the
                                        amount it says and send the gift to the chosen user. This page is also used for sending
                                        points to other users, inviting users to be your Bodyguard if you have purchased a slot and
                                        viewing your last 10 send and received points.
                                        <br/><br/>

                                        <center><b><font size="2">Lottery</b></font></center>
                                        <br/><br/>
                                        Here you can buy lottery tickets for a chance to win the amount in the pot. Each ticket costs
                                        $100,000 and you can either select 4 numbers from 1-25 or you can buy a random ticket
                                        that will select 4 random numbers for you. If there is no winner, it will be a rollover, so the
                                        money in the pot will stay and more will be added. The draw for the lottery is every 24 hours,
                                        if there are no winners after three days then the system will choose a random purchased
                                        ticket to be the winner.
                                        <br/><br/>

                                        <center><b><font size="2">Property Investment</b></font></center>
                                        <br/><br/>
                                        The property investment is a page where you can buy shares in a company. An example:
                                        If you bought 5,000 shares in [CI] Contracted Industries for $1,500,000 and the shares rate
                                        went up to $1,600,000, you would be making an extra $100,000 per every share you bought,
                                        however if the price decreses to $1,400,000, you will lose $100,000 per share. There will be a
                                        random time limit showing when the shares rate will change, giving you the chance to sell
                                        the amount of shares you bought. The maximum shares you can buy per go is 5,000.
                                        <br/><br/>


                                        <center><b><font size="2">Blackjack</b></font></center>
                                        <br/><br/>
                                        Another name for Blackjack is 21, where the aim of the game is to make your cards value&#039;s
                                        add up to or get close to 21. You place a bet and if you win you double the amount you bet
                                        and if you lose you lose the cash. If you and the dealer get the same amount, you are
                                        refunded with the money you placed down on that bet and if when you press bet and you get
                                        21 on the first two cards, you will get Blackjack which means you get double your cash plus half of the bet on top.
                                        <br/><br/>

                                        <center><b><font size="2">Greyhound Racing</b></font></center>
                                        <br/><br/>
                                        On racetrack, you will be able to chose which colour you think will win, if you are correct, you
                                        will win the odds shown on the colour. If you lose, you win nothing.
                                        <br/><br/>

                                        <center><b><font size="2">Roulette</b></font></center>
                                        <br/><br/>
                                        Roulette looks more complicating as there are many ways to bet. If you wish to bet on a
                                        number, you can chose a number from 1-36. You can also bet on red, black, odd, even and more.
                                        <br/><br/>

                                        <center><b><font size="2">Dice Game</b></font></center>
                                        <br/><br/>
                                        The Dice Game is very simple. All you have to do is enter the amount of game money you
                                        wish to gamble, followed by the number of sides you want on the dice and the dice number
                                        you want to pick. The number of sides you pick will have a +5% number increase, meaning if
                                        you pick 50 sides, 5% of 50 is 2.5, therefore you could get the number 52 come out even
                                        though you have only chosen 50 sides.
                                        <br/><br/>

                                        <center><b><font size="2">Multi Dice Game</b></font></center>
                                        <br/><br/>
                                        This page is for users to gamble with each other. The creator of the game will set the amount
                                        it will cost people to join. If the amount is $1,000,000 then it will cost 1,000,000 for users to
                                        join. The more people who join, the more money is in the pot. When the creator is ready to
                                        roll, they will click Roll Dice and every user that joined will receive a message looking like this:<br/>
                                        You joined a dice game created by <b>XRatedViper</b>! The dice rolled <b>1</b>!<br/>
                                        That means <b>XRatedViper</b> won $<b>4,000,000</b>!
                                        <br/><br/>

                                        <center><b><font size="2">Dead &gt; Alive</b></font></center>
                                        <br/><br/>
                                        If you die, and you ave money in your Swiss account, points and Cars in your
                                        Retrievable Garage, you can get them back from this page. Simply type in the Username and
                                        Password for your dead account, and your Money, Points and Cars will transfer to your new account.
                                        <br/><br/>

                                        <center><b><font size="2">Quicktrade</b></font></center>
                                        <br/><br/>
                                        On the Quick Trade, you can exchange money and points with other users on the game
                                        without being scammed. You can also buy Properties and Casino&#039;s which users put up for sale
                                        via their Casino/Property page.
                                        <br/><br/>

                                        <center><b><font size="2">Buy/Sell Weapons and Armour</b></font></center>
                                        <br/><br/>This page is where you will buy your Weapons, Armour and
                                        Cars.<br/><br/>

                                        <center><b><font size="2">Buy Cars</b></font></center>
                                        <br/><br/>This page is where you can search for cars you want to buy. Simply
                                        select the type of car you want and hit &quot;find&quot; to see the cars other
                                        users have put up for sale. Here you can make the selection on what car you want
                                        by checking the box(s) next to the selected car(s) and clicking the &quot;Buy
                                        now&quot; button.<br/><br/>

                                        <center><b><font size="2">Sell Cars</b></font></center>
                                        <br/><br/>This page is where you can put your cars up for sale. Simply select
                                        the car and price and click &quot;Add to market&quot; and your car shall be up
                                        for sale. You can select the whole page of cars by clicking &quot;Check All&quot;
                                        at the bottom of the page.<br/><br/>

                                        <center><b><font size="2">Travel By Car</b></font></center>
                                        <br/><br/>On this page you can travel between the 5 cities currently on Tough
                                        Society by car. These locations are:<br/><br/>Las Vegas, Nevada<br/>Seattle,
                                        Washington<br/>New York City, New York<br/>Chicago, Illinois<br/>Dallas,
                                        Texas<br/>Los Angeles, California<br/>Miami, Florida <br/><br/>

                                        <center><b><font size="2">Travel by Airport</b></font></center>
                                        <br/><br/>On this page you can travel between the 5 cities currently on Tough
                                        Society by plane. These locations are:<br/><br/>Las Vegas, Nevada<br/>Seattle,
                                        Washington<br/>New York City, New York<br/>Chicago, Illinois<br/>Dallas,
                                        Texas<br/>Los Angeles, California<br/>Miami, Florida <br/><br/>Airports are used
                                        for instant travel at the cost of points. Using the airport usually costs 5
                                        points, however this may change depending on if the city you&#039;re currently
                                        in is a &quot;Hot or Cold&quot; location.<br/>Airports in the <font
                                                color="78aaef">Cold</font> location will instead cost 8 points to use
                                        whereas Airports in the <font color="FFC753">Hot</font> location will be
                                        free!<br/><br/>Airports are owned by players of Tough Society and points you use
                                        here will go to the owner of the airport you used.<br/><br/>

                                        <center><b><font size="2">Hitlist</b></font></center>
                                        <br/><br/>
                                        The Wanted list is used for getting other users killed. If you want another user dead, and you don&#039;t
                                        have the bullets, you can put them on the list for a sum of money and another user with the
                                        bullets will kill them and receive the money you put up. If you look at it the other way round,
                                        you can go onto that page to look for targets for yourself to kill to earn some money.
                                        <br/><br/>

                                        <center><b><font size="2">Bullet Factory</b></font></center>
                                        <br/><br/>
                                        The bullet factory is where you can buy bullets, the owner of the Bullet Factory will set a price
                                        that you have to pay per bullet so not all Bullet Factory&#039;s will have the same prices.
                                        <br/><br/>

                                        <center><b><font size="2">Kill</b></font></center>
                                        <br/><br/>
                                        Here you will be able to shoot a user providing you have a gun and bullets. Some users may
                                        have bodyguards, which you will need to shoot before you can shoot the user. It will take you
                                        3 hours to find the user, once you find them you will need to travel to their location if you are
                                        not already. If you fail to kill the user, you will have to wait 2 hours before shooting again as
                                        the target will be recovering. The bullet calculator can be found on the<br/>
                                        <span>Help Site: </span><span style="color: red;"><b>www.infamousgangsters.net/helpdesk.php</b></span><span
                                                style="color: gray;">.</span>
                                        <br/><br/>

                                        <center><b><font size="2">Attempts</b></font></center>
                                        <br/><br/>Here is where you can see the last 75 attempts you have made to kill
                                        and the last 75 attempts that have been made on your life. If someone has shot
                                        at you and failed, your health will drop to between 1% and 99% depending on how
                                        many bullets they shot at you. Your health will regenerate automatically by 10%
                                        per hour. You can speed up this regeneration by buying the &quot;+25% Health&quot;
                                        option on the Points page.<br/><br/>


                                        <center><b><font size="2">Witness Statements</b></font></center>
                                        <br/><br/>Here is where you can find a log of all the kills you have witnessed
                                        being performed by other players as well as a time stamp so you can see when the
                                        kill took place. Next to the witness statement you will see an access code.
                                        These are codes you can use to trade with other players for currency or just to
                                        let other people know about a kill. If you receive an access code from another
                                        player you will have to enter that code into the &#039;Look up Witness Statement&#039;
                                        box at the top of the page where you will then be able to see the relevant
                                        witness statement attached to it.<br/><br/><br/><br/>

                                        <center><b><font size="2">Crews</b></font></center>
                                        <br/><br/>On this page is where you can see all the crew currently in existence.
                                        There is a maximum of 20 crews on Tough Society. You can apply at a crew here
                                        and see how much of a melting % of melted cars goes to the crew. To change a
                                        name of your crew you must drop a message with the Help Desk. If you wish to
                                        leave your crew your health will drop to a maximum of 50%.<br/><br/>

                                        <center><b><font size="2">Crew Bullets</b></font></center>
                                        <br/><br/>This is the leaderboard of all current members of your crew and their
                                        total melted bullets. <br/><br/>
                                        <center> - - - - - - -<br/><br/><br/>Any form of macroing or scripting to gain
                                            an advantage is strictly prohibited. Anyone caught doing this will be
                                            modkilled/banned.<br/><br/>Anyone caught Safety Shooting their or someone
                                            elses Bodyguards will be modkilled immediately.<br/><br/>- - - - - - -
                                        </center>
                                        <br/><br/>

                                        <center><b><font size="2">Official Emails</b></font></center>
                                        <br/><br/><b>Fake Emails</b> are a big problem, you can tell if the Email is
                                        fake by checking the email address. If it is
                                        and it asks you to reply to a <b>different</b> email address you know its a
                                        fake.<br/><br/>If a staff member needs a response from you we will contact you
                                        via PM through the game ourselves and never use an outside source to contact
                                        players.<br/><br/><br/>

                                        <center><b><font size="2">Protecting your account</b></font></center>
                                        <br/><br/>1. Don&#039;t give your password to ANYONE. NOT EVEN STAFF.<br/><br/>2.
                                        Don&#039;t save your password on your computer. MEMORISE IT.<br/><br/>3. Don&#039;t
                                        trust anyone from outside sources! Use the <a href="helpdesk.php">Helpdesk
                                            Link</a>!<br/><br/>4. Get an anti-virus and keep it updated. AVG: <br/><br/>http://free.avg.com/ww.download?prd=afe<br/><br/>If
                                        you do get hacked or forget your password, you can reset it on the login page by
                                        clicking &quot;Forgot Password&quot;.<br/><br/><b>Anyone that gets hacked will
                                            not be refunded, it&#039;s your reasonability to keep your password
                                            secure!</b><br/><br/><br/><br/><b><font color="khaki">Killing HDO&#039;s
                                                just for doing their jobs is NOT allowed. This will result in a modkill
                                                and a revive for the HDO.</font></b><br/><br/>

                                        <center><b><font size="2">Robot Bodyguards:</b></font></center>
                                        <br/>When you buy a robot boduguard, an account will be created with a random
                                        username.<br/><br/>The rank of the account will be random, between Mobster and
                                        RMafioso, it will have 100% health and a SWAT Vest.<br/><br/>You will not be
                                        able to find these robot accounts on the find user page.<br/><br/>You can only
                                        have a maximum of 2 robot bodyguards, and 3 regular bodyguards.
                                    </div>
                                </table>
                            </div> <!-- End of Terms Text -->
                        </div>
                    </td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
        </td>
        <td width="232px" style="min-width: 232px;" valign="top">
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td><? include 'rightmenu.php'; ?></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
            <?

include 'included.php'; session_start();

$getinfoarray = $statustesttwo;
$getcrewid = $getinfoarray['crewid'];
$getname = $getinfoarray['username'];

$time = time();
$timetwo = $time-3000;

$acount = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid='$getcrewid' and activity >= '$timetwo'"));

            if($getcrewid==0){?>
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td>
                        <div class="crewFeed" style="position: relative;">
                            <div class="menuHeader noTop"
                                 style="position: absolute; margin-top: -1px; width: 100%; box-sizing: border-box; -moz-box-sizing: border-box; z-index: 1;">
                                Crew Feed
                                <span style="z-index: 0; margin-top: 1px; float: right; color: white; opacity: 0.88; font-size: 9px;"></span>
                            </div>
                            <div style="margin-left: -9px; padding-bottom: 13px; padding-top: 38px; text-align: center;">
                                <a href="crews.php">Join a Crew</a>
                            </div>
                        </div>
                    </td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
            <?}else{?>
            <table class="menuTable curve10px" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td>
                        <div class="crewFeed" style="position: relative;">
                            <div class="menuHeader noTop"
                                 style="position: absolute; margin-top: -1px; width: 100%; box-sizing: border-box; -moz-box-sizing: border-box; z-index: 1;">
                                Crew Feed <span
                                        style="z-index: 0; margin-top: 1px; float: right; color: white; opacity: 0.88; font-size: 9px;"><? echo $acount;?>
                                    <span class="membersOnline twinkle"
                                          style="position: relative; top: -0.75px;">•</span></span>
                                <?
                        $getcrewsql = mysql_query("SELECT boss,id,name FROM crews WHERE id = '$getcrewid'");
                        $getcrewarray = mysql_fetch_array($getcrewsql);

                        $getcrewboss = $getcrewarray['boss'];
                        if($getcrewboss == $getname){?>
                                <a style="margin-left: -35px; float: right; padding-left: 3px; margin-right: 8px; padding-top: 0px; font-size: 9px; opacity: 0.25;"
                                   href="#" onclick="clearFeed();">wipe</a>
                                <?}?>
                            </div>
                            <div class="preventscroll crewFeedScroll" id="crewFeedScrollID" style="max-height: 330px;">
                                <div id="crewFeedChat" style="max-width: 218px;">
                                    <?
                                        if(isset($_SESSION['chat'])){
                                            echo $_SESSION['chat'];
                                        }
                                    ?>
                                </div>
                                <form method="post" onsubmit="submitCrewFeed(); return false;">
                                    <input type="hidden" value="<?echo $statustesttwo['username'];?>" id="feed_name">
                                    <input type="hidden" value="<?echo $statustesttwo['crewid'];?>" id="feed_crew">
                                    <input class="textarea" id="feed_msg"                                           style="box-sizing: border-box; -moz-box-sizing: border-box; width: 100%; position: absolute; bottom: 0; margin-bottom: -1px; border-top: 2px solid rgba(20, 20, 20, 0.8); border-bottom: 0; border-left: 0; border-right: 0;"                                           placeholder="Enter Message..." type="text">                                </form>                            </div>                        </div>                    </td>                    <td class="right"></td>                </tr>                <tr>                    <td class="bottomleft"></td>                    <td class="bottom"></td>                    <td class="bottomright"></td>                </tr>            </table><div style="padding: 10px; font-size: 9.5px; opacity:0.7; text-align: center;">You can mute sounds in <a href="profile.php">Edit Profile</a>		</div>
            <?}?>
        </td>
    </tr>
</table>
</body>
</html>

