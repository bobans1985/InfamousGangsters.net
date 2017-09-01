<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <title>Tough Society</title>
    <link rel="icon" type="image/png" href="images/icon.png">
    <script src="javascript/jquery.min.js?"></script>
    <script src="javascript/main3.js"></script>
    
    <script> window.ga = window.ga || function () {
                (ga.q = ga.q || []).push(arguments)
            };
        ga.l = +new Date;
        ga('create', 'UA-83823402-1', 'auto');
        ga('send', 'pageview'); </script>
    <script async src='https://www.google-analytics.com/analytics.js'></script>
    <script> var adFeed = false; </script>
</head>
<body id="body">
<div id="fb-root"></div>
<script> (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=183959336788";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk')); </script>
<div id="alertBox"></div>
<div class="headerFloat">
    <div class="header">
        <table class="resize" cellspacing="0">
            <tr>
                <td width="220px" valign="top">
                    <div class="curve2px searchBox" id="searchBox"><img class="searchBoxIcon" src="images/search.png">
                        <input name="search" autocomplete="off" class="searchBoxInput" maxlength="22" type="text"
                               id="search" placeholder="Search User..." onclick="this.select(); reClick();"
                               onfocus="document.getElementById('searchBox').style.border='2px solid #E6B34B'; "
                               onblur="document.getElementById('searchBox').style.border='';"></div>
                </td>
                <td valign="top" class="centerTd">
                    <? include "cpanel_top.php";?>
                </td>
                <td width="233px" valign="top" class="centerTd">
                    <div class="relativeBlock">
                        <div class="rightTopBox curve3px " onclick="openNotifications();" id="toggleNot"><span
                                    id="notificationsNo"><span style="color: #cccccc;">No Notifications</span></span>
                        </div>
                        <div class="notificationCentre curve3px" id="notificationDiv">
                            <div class="preventscroll" id="notificationDivContent"
                                 style="text-align: center; max-height: 300px; overflow-y: auto;"></div>
                            <div id="clearNotifications"
                                 style="border-top: 1px solid #353535; text-align: center; background-color: #404040; opacity: 0.9;">
                                <a href="#" onclick="clearNotifications(); return false;"
                                   style="display: inline-block; width: 100%; padding-left: 3px; padding-top: 5px; padding-bottom: 5px; font-size: 10px; color: #888888 !important;">Clear</a>
                            </div>
                        </div>
                        <a tabindex="-2" href="logout.php?session=50189b9769bef22dee396d35296e01e6"
                           class="rightTopBoxSide curve3px">Sign Out</a></div>
    </div>
    </td> </tr>
    <tr>
        <td colspan="3">
            <div class="curve4pxBottom searchFloat preventscroll" id="searchResults" style="text-align: center;"></div>
        </td>
    </tr>
    </table> </div>
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
                    <td class="menu">
                        <div class="menuHeader txtShadow noTop">Information</div>
                        <a href="iprules.php">IP Rules</a> <a href="faq.php">FAQ</a> <a href="statistics.php">Game
                            Statistics</a> <a href="referral.php">Referral System</a> <a href="usersonline.php">Users
                            Online</a> <a href="properties.php?type=casino">Casinos</a> <a href="properties.php">Properties</a>
                        <a href="profile.php">Edit Profile</a> <a href="news.php">Latest News</a> <a
                                href="helpdesk.php">Help Desk</a> <a href="mystats.php">My Statistics</a> <a
                                href="verifyemail.php" style="color: gold;">Verify Email Address</a> <a
                                href="myproperties.php">Manage My Properties</a> <a href="missions.php">My Missions</a>
                        <a href="promos.php" style="color: gold;">Promo Codes</a> <a href="record.php"
                                                                                     style="border-bottom: 0;">Top 15
                            Records</a>
                        <div class="menuHeader txtShadow">Messaging</div>
                        <a href="send.php">Create Message</a> <a href="inbox.php"><span
                                    class="curve2px menuNotification" id="new_messages_indicator"
                                    style="display: none;">0</span>Inbox</a> <a href="crewforum.php">Crew Forum</a> <a
                                href="forum.php">Forum</a> <a href="dforum.php">Designer Forum</a> <a href="eforum.php"
                                                                                                      style="border-bottom: 0;"><span
                                    style="float: right; margin-right: 5px;"> </span>Entertainment Forum</a>
                        <div class="menuHeader txtShadow">Ranking</div>
                        <a href="crimes.php">Crimes</a> <a href="gta.php"><span
                                    style="font-size: 10px; float: right; color: #FFC753;">&#10004;&nbsp;</span>GTA</a>
                        <a href="jail.php"><span style="float: right; margin-right: 5px;">2 </span>Jail</a> <a
                                href="melt.php"><span style="font-size: 10px; float: right; color: #FFC753;">&#10004;&nbsp;</span>Melt
                            Cars</a> <a href="repair.php">Repair</a> <a href="oc.php" style="border-bottom: 0;"><span
                                    style="font-size: 10px; float: right; color: #FFC753;">&#10004;&nbsp;</span>Organised
                            Crime</a>
                        <div class="menuHeader txtShadow">Money / Points</div>
                        <a href="bank.php">Bank Account</a> <a href="points.php">Points</a> <a
                                href="drugs.php">Drugs</a> <a href="races.php">Horse Racing</a> <a href="blackjack.php">Blackjack</a>
                        <a href="roulette.php">Roulette</a> <a href="dicegame.php">Dice Game</a> <a
                                href="multidice.php">Multi Dice Game</a> <a href="betting.php"
                                                                            style="border-left-color: #FFC753;">Sport
                            Betting</a> <a href="retrieval.php" style="border-bottom: 0;">Dead > Alive</a>
                        <div class="menuHeader txtShadow">Buy / Sell</div>
                        <a href="quicktrade.php">Quicktrade</a> <a href="buy.php">Buy Cars</a> <a href="sell.php">Sell
                            Cars</a> <a href="armoury.php" style="border-bottom: 0;">Buy Weapons / Armour</a>
                        <div class="menuHeader txtShadow">Travel</div>
                        <a href="travel.php">Car</a> <a href="airport.php">Airport</a>
                        <div class="menuHeader txtShadow">Offence</div>
                        <a href="hitlist.php">Hitlist</a> <a href="bulletfactory.php">Bullet Factory</a> <a
                                href="kill.php">Kill</a> <a href="attempts.php">Attempts</a> <a href="ws.php"
                                                                                                style="border-bottom: 0;">Witness
                            Statements</a>
                        <div class="menuHeader txtShadow">Crews</div>
                        <a href="crews.php">Crews</a> <a href="crewbullets.php">Crew Bullets</a></td>
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
                    <td>
                        <div class="main curve2px">
                            <div class="menuHeader noTop"> Users Online</div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; width: 93%; padding-top: 16px; padding-bottom: 6px; text-align: left;">
                                    <span class="onlineSep"> - </span><a href="viewprofile.php?username=AlexO"><b
                                                style="color: red;">AlexO</b></a><span class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=Patto"><b
                                                style="color: red;">Patto</b></a><span class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=Bear"><b style="color: Dodgerblue;">Bear</b></a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=Bellosom">Bellosom</a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=Flowsz"><b
                                                style="color: lime;">Flowsz</b></a><span class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=Heart"><b
                                                style="color: #FFC753;"><u>Heart</u></b></a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=AxO"><span
                                                style="color: #838383;">AxO</span></a><span class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=Apocalypse">Apocalypse</a><span
                                            class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=FlyBoi">FlyBoi</a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=mrjaba"><span
                                                style="color: #838383;">mrjaba</span></a><span
                                            class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=QueenOfDisaster">QueenOfDisaster</a><span
                                            class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=Migos">Migos</a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=ManLikeBlaze"><span
                                                style="color: #838383;">ManLikeBlaze</span></a><span class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=menan123">menan123</a><span
                                            class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=bubonicChronic">bubonicChronic</a><span
                                            class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=KingOfTheNorth">KingOfTheNorth</a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=Despacito"><b
                                                style="color: lime;">Despacito</b></a><span class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=CASISDEAD">CASISDEAD</a><span
                                            class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=D3mons">D3mons</a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=Iwinyoulose">Iwinyoulose</a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=Section18">Section18</a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=Aladdin">Aladdin</a><span
                                            class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=Egg">Egg</a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=Verdict">Verdict</a><span
                                            class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=Direct">Direct</a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=Criminal">Criminal</a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=GodOfDeath">GodOfDeath</a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=Smh"><span
                                                style="color: #838383;">Smh</span></a><span class="onlineSep"> - </span><a
                                            href="viewprofile.php?username=felon"><span
                                                style="color: #838383;">felon</span></a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=Murciel"><span
                                                style="color: #838383;">Murciel</span></a><span
                                            class="onlineSep"> - </span><a href="viewprofile.php?username=Lynchh"><span
                                                style="color: #838383;">Lynchh</span></a><span
                                            class=\"onlineSep\"> - </span></div>
                                <div class="break" style="padding-top: 17px;">
                                    <div class="spacer" style="margin-bottom: 1px;"></div>
                                    <table width="100%" cellpadding="0" cellspacing="0" style="min-height: 31px;">
                                        <tr>
                                            <td style="text-align: left; padding: 3px; padding-right: 2px;">
                                                <div class="fb-like" data-href="http://www.facebook.com/ToughSociety"
                                                     data-send="false" data-width="350" data-show-faces="false"
                                                     data-colorscheme="dark" style="padding-left: 8px;"></div>
                                            </td>
                                            <td align="right" style="padding: 5px;">
                                                <div style="padding-right: 4px; white-space: no-wrap;"><span
                                                            style="color: #fefefe;"><b style="color: #FFC753;">31</b>&nbsp;Users&nbsp;Online</span><span
                                                            style="padding-left: 9px; padding-right: 9px; color: #dfdfdf;">-</span><a
                                                            href="faq.php#key"><b>Key</b></a></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="spacer"></div>
                                    <div class="break" style="padding-top: 4px;"></div>
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
                    <td>
                        <div class="menu">
                            <div class="menuHeader txtShadow noTop"> My Statistics</div>
                            <div class="mystats">
                                <div id="newMail" style="display: none;" onclick="window.location.href='inbox.php'" ;>
                                    New Mail!
                                </div>
                                <span class="stat title">Money:</span><span id="myMoney">$3,905,769</span><input
                                        type="hidden" id="myMoneyVal" value="3905769"> <span
                                        class="stat title">Health:</span>100% <span class="stat title"
                                                                                    style="margin-bottom: 1px;">Weapon (2,536 Bullets):</span>None
                                <span class="stat title">Armour:</span>None <span class="stat title">Rank:</span>Respected
                                Thug <span class="stat title">Rank Progress:</span><span>88%</span> <span
                                        onclick="location.href='points.php';" style="cursor: pointer;"><span
                                            class="stat title">Points:</span>0</span> <span class="stat title hot">Location:</span>Dallas,
                                Texas <span class="stat">Crew:</span>
                                <div style='margin-top: 2px;'></div>
                                <div style='position: relative; display: inline-block; height: 9px; width: 7px; top: 1px; margin-right: 5px; background-color: #ffffff;'></div>
                                Carehome
                                <div class="btm-statbreak"></div>
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
                                        style="z-index: 0; margin-top: 1px; float: right; color: white; opacity: 0.88; font-size: 9px;">3 <span
                                            class="membersOnline twinkle"
                                            style="position: relative; top: -0.75px;">•</span></span></div>
                            <div class="preventscroll crewFeedScroll" id="crewFeedScrollID" style="max-height: 330px;">
                                <div id="crewFeedChat" style="max-width: 218px;">
                                    <table cellpadding="0" cellspacing="0" class="feedPost"
                                           style="margin-left: -1px; background: #232323;">
                                        <tr>
                                            <td colspan="2" class="feedPostComment"
                                                style="border-left: 3px solid green; padding: 7px;"><a
                                                        href="viewprofile.php?username=ManLikeBlaze">ManLikeBlaze</a>
                                                joined <a href="viewcrew.php?crewid=130">Carehome</a>!
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=GodOfDeath"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">GodOfDeath</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="&nbsp;&nbsp;Today at 4:32:10 pm&nbsp;&nbsp;" style=" ">2 hrs ago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">i can</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=Iwinyoulose"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">Iwinyoulose</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="&nbsp;&nbsp;Today at 4:26:32 pm&nbsp;&nbsp;" style=" ">2 hrs ago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">Who can oc</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost"
                                           style="margin-left: -1px; background: #232323;">
                                        <tr>
                                            <td colspan="2" class="feedPostComment"
                                                style="border-left: 3px solid green; padding: 7px;"><a
                                                        href="viewprofile.php?username=Iwinyoulose">Iwinyoulose</a>
                                                committed a Crew OC!
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=GodOfDeath"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">GodOfDeath</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="&nbsp;&nbsp;Today at 4:16:31 pm&nbsp;&nbsp;" style=" ">2 hrs ago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">Thanks <img class="smileyBB"
                                                                                                src="images/smileys/smile.gif">
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=HowCome"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">HowCome</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="&nbsp;&nbsp;Today at 4:16:18 pm&nbsp;&nbsp;" style=" ">2 hrs ago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">Shoot meJakeem2283473</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost"
                                           style="margin-left: -1px; background: #232323;">
                                        <tr>
                                            <td colspan="2" class="feedPostComment"
                                                style="border-left: 3px solid green; padding: 7px;"><a
                                                        href="viewprofile.php?username=GodOfDeath">GodOfDeath</a> joined
                                                <a href="viewcrew.php?crewid=130">Carehome</a>!
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost"
                                           style="margin-left: -1px; background: #232323;">
                                        <tr>
                                            <td colspan="2" class="feedPostComment"
                                                style="border-left: 3px solid green; padding: 7px;"><a
                                                        href="viewprofile.php?username=HowCome">HowCome</a> joined <a
                                                        href="viewcrew.php?crewid=130">Carehome</a>!
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost"
                                           style="margin-left: -1px; background: #232323;">
                                        <tr>
                                            <td colspan="2" class="feedPostComment"
                                                style="border-left: 3px solid red; padding: 7px;"><a
                                                        href="viewprofile.php?username=paganz">paganz</a> has been
                                                Killed</a>!
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=reebox"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">reebox</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 10:16:26 pm" style=" ">20 hrs ago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">some one got to shoot.</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=X10"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">X10</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 10:15:37 pm" style=" ">20 hrs ago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">Y you shooting? Your in this crew
                                                shooting members
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost"
                                           style="margin-left: -1px; background: #232323;">
                                        <tr>
                                            <td colspan="2" class="feedPostComment"
                                                style="border-left: 3px solid red; padding: 7px;"><a
                                                        href="viewprofile.php?username=Needtoo">Needtoo</a> has been
                                                Killed</a>!
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost"
                                           style="margin-left: -1px; background: #232323;">
                                        <tr>
                                            <td colspan="2" class="feedPostComment"
                                                style="border-left: 3px solid red; padding: 7px;"><a
                                                        href="viewprofile.php?username=Avengers">Avengers</a> has been
                                                Killed</a>!
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost"
                                           style="margin-left: -1px; background: #232323;">
                                        <tr>
                                            <td colspan="2" class="feedPostComment"
                                                style="border-left: 3px solid red; padding: 7px;"><a
                                                        href="viewprofile.php?username=Perm">Perm</a> has been
                                                Killed</a>!
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost"
                                           style="margin-left: -1px; background: #232323;">
                                        <tr>
                                            <td colspan="2" class="feedPostComment"
                                                style="border-left: 3px solid red; padding: 7px;"><a
                                                        href="viewprofile.php?username=2Chainz">2Chainz</a> has been
                                                Killed</a>!
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost"
                                           style="margin-left: -1px; background: #232323;">
                                        <tr>
                                            <td colspan="2" class="feedPostComment"
                                                style="border-left: 3px solid red; padding: 7px;"><a
                                                        href="viewprofile.php?username=Can">Can</a> has been <a
                                                        href="hitlist.php">Hitlisted</a>!
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=Can"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">Can</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 9:37:15 pm" style=" ">21 hrs ago</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">See if I can buy</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=Can"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">Can</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 9:36:29 pm" style=" ">21 hrs ago</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">Hitlist me</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=Perm"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">Perm</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 8:35:00 pm" style=" ">22 hrs ago</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">rip</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost"
                                           style="margin-left: -1px; background: #232323;">
                                        <tr>
                                            <td colspan="2" class="feedPostComment"
                                                style="border-left: 3px solid red; padding: 7px;"><a
                                                        href="viewprofile.php?username=Hilly">Hilly</a> has been
                                                Killed</a>!
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=Aladdin"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">Aladdin</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 8:14:47 pm" style=" ">22 hrs ago</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">Can you fund me to get bg</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=IQ"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">IQ</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 8:14:27 pm" style=" ">22 hrs ago</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">i know for a fact i will die anyway
                                                i think we are getting wiped
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost"
                                           style="margin-left: -1px; background: #232323;">
                                        <tr>
                                            <td colspan="2" class="feedPostComment"
                                                style="border-left: 3px solid green; padding: 7px;"><a
                                                        href="viewprofile.php?username=IQ">IQ</a> was bought off the
                                                Hitlist!
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=IQ"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">IQ</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 8:06:58 pm" style=" ">23 hrs ago</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">hitlist</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=IQ"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">IQ</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 8:06:51 pm" style=" ">23 hrs ago</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">boss buy me off gitlist pls</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=Egg"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">Egg</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 8:03:47 pm" style=" ">23 hrs ago</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">Need 5points to travel</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=Egg"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">Egg</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 8:03:25 pm" style=" ">23 hrs ago</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">Nef</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=Egg"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">Egg</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 8:03:17 pm" style=" ">23 hrs ago</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">Bed</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=Perm"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">Perm</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 7:56:15 pm" style=" ">23 hrs ago</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">whos verdict</td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" class="feedPost ">
                                        <tr>
                                            <td align="left"><a href="viewprofile.php?username=Egg"
                                                                style="display: inline-block; padding-top: 2px; "
                                                                class="">Egg</a></td>
                                            <td align="right"><span
                                                        class="masterTooltip crewFeedTimeStamp curve2pxBottom "
                                                        title="Yesterday at 7:47:57 pm" style=" ">23 hrs ago</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="feedPostComment">Only little cause I don't have
                                                much
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <form method="post" onsubmit="submitCrewFeed(); return false;"><input autocomplete="off"
                                                                                                      type="text"
                                                                                                      class="textarea"
                                                                                                      id="crewFeedMessage"
                                                                                                      style="box-sizing: border-box; -moz-box-sizing: border-box; width: 100%; position: absolute; bottom: 0; margin-bottom: -1px; border-top: 2px solid rgba(20, 20, 20, 0.8); border-bottom: 0; border-left: 0; border-right: 0;"
                                                                                                      placeholder="Enter Message...">
                                </form>
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
            <div style="padding: 10px; font-size: 9.5px; opacity:0.7; text-align: center;">You can mute sounds in <a
                        href="profile.php">Edit Profile</a>
        </td>
    </tr>
</table>
</body>
<script>if (window.innerHeight > 700) {
        document.getElementById('crewFeedScrollID').style.maxHeight = "330px";
    }</script>

<script> var unixTime = 1499109198.08;
    var muteSound = false; </script>
<script> $('input, select, textarea').focus(function () {
        $('meta[name=viewport]').attr('content', 'width=device-width,initial-scale=1,maximum-scale=1.0');
    });
    $('input, select, textarea').blur(function () {
        $('meta[name=viewport]').attr('content', 'width=device-width,initial-scale=1,maximum-scale=10');
    }); </script>
</html>