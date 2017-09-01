<? include '../included.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="../javascript/jquery.min.js"></script>
    <script src="../javascript/main3.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/layout.css">
    <link rel="stylesheet" href="../layout/style.css" type="text/css"/>
    <title>Infamous Gangsters</title>
    <link rel="icon" type="image/png" href="../images/icon.png">
    <script src="../javascript/global.php"></script>
    <script src="../javascript/jquery.mousewheel.js"></script>
    <style>
        .stat.title:first-of-type {
            margin-top: 9px;
        }

        .stat.title {
            margin-top: 9px;
        }

        {
            margin-top: 14px
        ;
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
            var txt = $.trim(em);
            var box = $("#newpost");
            box.val(box.val() + txt);
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
                        <img class="searchBoxIcon" src="../images/search.png">
                        <input name="search" autocomplete="off" class="searchBoxInput" maxlength="22" type="text"
                               id="search" placeholder="Search User..." onclick="this.select(); reClick();"
                               onfocus="document.getElementById('searchBox').style.border='2px solid #E6B34B'; "
                               onblur="document.getElementById('searchBox').style.border='';">
                    </div>
                </td>
                <td valign="top" class="centerTd">
                    <? include "../cpanel_top.php"; ?>
                </td>
                <td width="233px" valign="top" class="centerTd">
                    <?php include "../relative_block.php"; ?>
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
                    <?php include '../leftmenu.php'; ?>
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
            <table class="menuTable curve10px" id="content" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="topleft"></td>
                    <td class="top"></td>
                    <td class="topright"></td>
                </tr>
                <tr>
                    <td class="left"></td>
                    <td class="top">
                        <div class="main curve2px">
                            <div class="menuHeader noTop">
                                BB Coding
                            </div>
                            <div style="padding: 5px; margin: auto; text-align: center; color: #fefefe;">
                                <div style="margin: auto; padding-top: 16px; padding-bottom: 6px; text-align: left;">
                                    <? include 'bb.php'; ?>

                                    <?php
                                    if ($_POST['send'] && strip_tags($_POST['newpost'])) {
                                        $test = $_POST['newpost'];
                                        $result = "$test";
                                    }
                                    $message=forumbb($result);
                                    echo "$message";
                                    ?>
                                    <center>
                                        <select name='colors' class=textarea style="padding: 0;width: 20%;">
                                            <option style="color:aliceblue;" onClick="emotion('[color=aliceblue]TEXT[/color]')" onClick="emotion('[color=aliceblue]TEXT[/color]')">Aliceblue</option>
                                            <option style="color:antiquewhite;" onClick="emotion('[color=antiquewhite]TEXT[/color]')">AntiqueWhite</option>
                                            <option style="color:aqua;" onClick="emotion('[color=aqua]TEXT[/color]')">Aqua</option>
                                            <option style="color:aquamarine;" onClick="emotion('[color=aquamarine]TEXT[/color]')">Aquamarine</option>
                                            <option style="color:azure;" onClick="emotion('[color=azure]TEXT[/color]')">Azure</option>
                                            <option style="color:beige;" onClick="emotion('[color=beige]TEXT[/color]')">Beige</option>
                                            <option style="color:bisque;" onClick="emotion('[color=bisque]TEXT[/color]')">Bisque</option>
                                            <option style="color:black;" onClick="emotion('[color=black]TEXT[/color]')">Black</option>
                                            <option style="color:blanchedalmond;" onClick="emotion('[color=blanchedalmond]TEXT[/color]')">BlanchedAlmond</option>
                                            <option style="color:blue;" onClick="emotion('[color=blue]TEXT[/color]')">Blue</option>
                                            <option style="color:blueviolet;" onClick="emotion('[color=blueviolet]TEXT[/color]')">BlueViolet</option>
                                            <option style="color:brown;" onClick="emotion('[color=brown]TEXT[/color]')">Brown</option>
                                            <option style="color:burlywood;" onClick="emotion('[color=burlywood]TEXT[/color]')">BurlyWood</option>
                                            <option style="color:cadetblue;" onClick="emotion('[color=cadetblue]TEXT[/color]')">Cadetblue</option>
                                            <option style="color:chartreuse;" onClick="emotion('[color=chartreuse]TEXT[/color]')">Chartreuse</option>
                                            <option style="color:chocolate;" onClick="emotion('[color=chocolate]TEXT[/color]')">Chocolate</option>
                                            <option style="color:coral;" onClick="emotion('[color=coral]TEXT[/color]')">Coral</option>
                                            <option style="color:cornflowerblue;" onClick="emotion('[color=cornflowerblue]TEXT[/color]')">CornflowerBlue</option>
                                            <option style="color:cornsilk;" onClick="emotion('[color=cornsilk]TEXT[/color]')">CornSilk</option>
                                            <option style="color:crimson;" onClick="emotion('[color=crimson]TEXT[/color]')">Crimson</option>
                                            <option style="color:cyan;" onClick="emotion('[color=cyan]TEXT[/color]')">Cyan</option>
                                            <option style="color:darkblue;" onClick="emotion('[color=darkblue]TEXT[/color]')">DarkBlue</option>
                                            <option style="color:darkcyan;" onClick="emotion('[color=darkcyan]TEXT[/color]')">DarkCyan</option>
                                            <option style="color:darkgoldenrod;" onClick="emotion('[color=darkgoldenrod]TEXT[/color]')">DarkGoldenRod</option>
                                            <option style="color:darkgray;" onClick="emotion('[color=darkgray]TEXT[/color]')">DarkGray</option>
                                            <option style="color:darkgrey;" onClick="emotion('[color=darkgrey]TEXT[/color]')">DarkGrey</option>
                                            <option style="color:darkgreen;" onClick="emotion('[color=darkgreen]TEXT[/color]')">DarkGreen</option>
                                            <option style="color:darkkhaki;" onClick="emotion('[color=darkkhaki]TEXT[/color]')">DarkKhaki</option>
                                            <option style="color:darkmagenta;" onClick="emotion('[color=darkmagenta]TEXT[/color]')">DarkMagenta</option>
                                            <option style="color:darkolivegreen;" onClick="emotion('[color=darkolivegreen]TEXT[/color]')">DarkOliveGreen</option>
                                            <option style="color:darkorange;" onClick="emotion('[color=darkorange]TEXT[/color]')">DarkOrange</option>
                                            <option style="color:darkorchid;" onClick="emotion('[color=darkorchid]TEXT[/color]')">DarkOrchid</option>
                                            <option style="color:darkred;" onClick="emotion('[color=darkred]TEXT[/color]')">DarkRed</option>
                                            <option style="color:darksalmon;" onClick="emotion('[color=darksalmon]TEXT[/color]')">DarkSalmon</option>
                                            <option style="color:darkseagreen;" onClick="emotion('[color=darkseagreen]TEXT[/color]')">DarkSeaGreen</option>
                                            <option style="color:darkslateblue;" onClick="emotion('[color=darkslateblue]TEXT[/color]')">DarkSlateBlue</option>
                                            <option style="color:darkslategray;" onClick="emotion('[color=darkslategray]TEXT[/color]')">DarkSlateGray</option>
                                            <option style="color:darkslategrey;" onClick="emotion('[color=darkslategrey]TEXT[/color]')">DarkSlateGrey</option>
                                            <option style="color:darkturquoise;" onClick="emotion('[color=darkturquoise]TEXT[/color]')">DarkTurquoise</option>
                                            <option style="color:darkviolet;" onClick="emotion('[color=darkviolet]TEXT[/color]')">DarkViolet</option>
                                            <option style="color:deeppink;" onClick="emotion('[color=deeppink]TEXT[/color]')">DeepPink</option>
                                            <option style="color:deepskyblue;" onClick="emotion('[color=deepskyblue]TEXT[/color]')">DeepSkyBlue</option>
                                            <option style="color:dimgray;" onClick="emotion('[color=dimgray]TEXT[/color]')">DimGray</option>
                                            <option style="color:dimgrey;" onClick="emotion('[color=dimgrey]TEXT[/color]')">DimGrey</option>
                                            <option style="color:dodgerblue;" onClick="emotion('[color=dodgerblue]TEXT[/color]')">DodgerBlue</option>
                                            <option style="color:firebrick;" onClick="emotion('[color=firebrick]TEXT[/color]')">FireBrick</option>
                                            <option style="color:floralwhite;" onClick="emotion('[color=floralwhite]TEXT[/color]')">FloralWhite</option>
                                            <option style="color:forestgreen;" onClick="emotion('[color=forestgreen]TEXT[/color]')">ForestGreen</option>
                                            <option style="color:fuchsia;" onClick="emotion('[color=fuchsia]TEXT[/color]')">Fuchsia</option>
                                            <option style="color:gainsboro;" onClick="emotion('[color=gainsboro]TEXT[/color]')">GainsBoro</option>
                                            <option style="color:ghostwhite;" onClick="emotion('[color=ghostwhite]TEXT[/color]')">Ghostwhite</option>
                                            <option style="color:gold;" onClick="emotion('[color=gold]TEXT[/color]')">Gold</option>
                                            <option style="color:goldenrod;" onClick="emotion('[color=goldenrod]TEXT[/color]')">GoldrenRod</option>
                                            <option style="color:gray;" onClick="emotion('[color=gray]TEXT[/color]')">Gray</option>
                                            <option style="color:grey;" onClick="emotion('[color=grey]TEXT[/color]')">Grey</option>
                                            <option style="color:green;" onClick="emotion('[color=green]TEXT[/color]')">Green</option>
                                            <option style="color:greenyellow;" onClick="emotion('[color=greenyellow]TEXT[/color]')">GreenYellow</option>
                                            <option style="color:honeydew;" onClick="emotion('[color=honeydew]TEXT[/color]')">HoneyDew</option>
                                            <option style="color:hotpink;" onClick="emotion('[color=hotpink]TEXT[/color]')">HotPink</option>
                                            <option style="color:indianred;" onClick="emotion('[color=indianred]TEXT[/color]')">IndianRed</option>
                                            <option style="color:indigo;" onClick="emotion('[color=indigo]TEXT[/color]')">Indigo</option>
                                            <option style="color:ivory;" onClick="emotion('[color=ivory]TEXT[/color]')">Ivory</option>
                                            <option style="color:khaki;" onClick="emotion('[color=khaki]TEXT[/color]')">Khaki</option>
                                            <option style="color:lavender;" onClick="emotion('[color=lavender]TEXT[/color]')">Lavender</option>
                                            <option style="color:lavenderblush;" onClick="emotion('[color=lavenderblush]TEXT[/color]')">LavenderBlush</option>
                                            <option style="color:lawngreen;" onClick="emotion('[color=lawngreen]TEXT[/color]')">LawnGreen</option>
                                            <option style="color:lemonchiffon;" onClick="emotion('[color=lemonchiffon]TEXT[/color]')">LemonChiffon</option>
                                            <option style="color:lightblue;" onClick="emotion('[color=lightblue]TEXT[/color]')">LightBlue</option>
                                            <option style="color:lightcoral;" onClick="emotion('[color=lightcoral]TEXT[/color]')">LightCoral</option>
                                            <option style="color:lightcyan;" onClick="emotion('[color=lightcyan]TEXT[/color]')">LightCyan</option>
                                            <option style="color:lightgoldenrodyellow;" onClick="emotion('[color=lightgoldenrodyellow]TEXT[/color]')">LightGoldenRodYellow</option>
                                            <option style="color:lightgray;" onClick="emotion('[color=lightgray]TEXT[/color]')">LightGray</option>
                                            <option style="color:lightgrey;" onClick="emotion('[color=lightgrey]TEXT[/color]')">LightGrey</option>
                                            <option style="color:lightgreen;" onClick="emotion('[color=lightgreen]TEXT[/color]')">LightGreen</option>
                                            <option style="color:lightpink;" onClick="emotion('[color=lightpink]TEXT[/color]')">LightPink</option>
                                            <option style="color:lightsalmon;" onClick="emotion('[color=lightsalmon]TEXT[/color]')">LightSalmon</option>
                                            <option style="color:lightseagreen;" onClick="emotion('[color=lightseagreen]TEXT[/color]')">LightSeaGreen</option>
                                            <option style="color:lightskyblue;" onClick="emotion('[color=lightskyblue]TEXT[/color]')">LightSkyBlue</option>
                                            <option style="color:lightslategray;" onClick="emotion('[color=lightslategray]TEXT[/color]')">LightSlateGray</option>
                                            <option style="color:lightslategrey;" onClick="emotion('[color=lightslategrey]TEXT[/color]')">LightSlateGrey</option>
                                            <option style="color:lightsteelblue;" onClick="emotion('[color=lightsteelblue]TEXT[/color]')">LightSteelBlue</option>
                                            <option style="color:lightyellow;" onClick="emotion('[color=lightyellow]TEXT[/color]')">LightYellow</option>
                                            <option style="color:lime;" onClick="emotion('[color=lime]TEXT[/color]')">Lime</option>
                                            <option style="color:limegreen;" onClick="emotion('[color=limegreen]TEXT[/color]')">LimeGreen</option>
                                            <option style="color:linen;" onClick="emotion('[color=linen]TEXT[/color]')">Linen</option>
                                            <option style="color:magenta;" onClick="emotion('[color=magenta]TEXT[/color]')">Magenta</option>
                                            <option style="color:maroon;" onClick="emotion('[color=maroon]TEXT[/color]')">Maroon</option>
                                            <option style="color:mediumaquamarine;" onClick="emotion('[color=mediumaquamarine]TEXT[/color]')">MediumAquaMarine</option>
                                            <option style="color:mediumblue;" onClick="emotion('[color=mediumblue]TEXT[/color]')">MediumBlue</option>
                                            <option style="color:mediumorchid;" onClick="emotion('[color=mediumorchid]TEXT[/color]')">MediumOrchid</option>
                                            <option style="color:mediumpurple;" onClick="emotion('[color=mediumpurple]TEXT[/color]')">MediumPurple</option>
                                            <option style="color:mediumseagreen;" onClick="emotion('[color=mediumseagreen]TEXT[/color]')">MediumSeaGreen</option>
                                            <option style="color:mediumslateblue;" onClick="emotion('[color=mediumslateblue]TEXT[/color]')">MediumSlateBlue</option>
                                            <option style="color:mediumspringgreen;" onClick="emotion('[color=mediumspringgreen]TEXT[/color]')">MediumSpringGreen</option>
                                            <option style="color:mediumturquoise;" onClick="emotion('[color=mediumturquoise]TEXT[/color]')">MediumTurquoise</option>
                                            <option style="color:mediumvioletred;" onClick="emotion('[color=mediumvioletred]TEXT[/color]')">MediumVioletRed</option>
                                            <option style="color:midnightblue;" onClick="emotion('[color=midnightblue]TEXT[/color]')">MidnightBlue</option>
                                            <option style="color:mintcream;" onClick="emotion('[color=mintcream]TEXT[/color]')">MintCream</option>
                                            <option style="color:mistyrose;" onClick="emotion('[color=mistyrose]TEXT[/color]')">MistyRose</option>
                                            <option style="color:moccasin;" onClick="emotion('[color=moccasin]TEXT[/color]')">Moccasin</option>
                                            <option style="color:navajowhite;" onClick="emotion('[color=navajowhite]TEXT[/color]')">NavajoWhite</option>
                                            <option style="color:navy;" onClick="emotion('[color=navy]TEXT[/color]')">Navy</option>
                                            <option style="color:oldlace;" onClick="emotion('[color=oldlace]TEXT[/color]')">OldLace</option>
                                            <option style="color:olive;" onClick="emotion('[color=olive]TEXT[/color]')">Olive</option>
                                            <option style="color:olivedrab;" onClick="emotion('[color=olivedrab]TEXT[/color]')">OliveDrab</option>
                                            <option style="color:orange;" onClick="emotion('[color=orange]TEXT[/color]')">Orange</option>
                                            <option style="color:orangered;" onClick="emotion('[color=orangered]TEXT[/color]')">OrangeRed</option>
                                            <option style="color:orchid;" onClick="emotion('[color=orchid]TEXT[/color]')">Orchid</option>
                                            <option style="color:palegoldenrod;" onClick="emotion('[color=palegoldenrod]TEXT[/color]')">PaleGoldenRod</option>
                                            <option style="color:palegreen;" onClick="emotion('[color=palegreen]TEXT[/color]')">PaleGreen</option>
                                            <option style="color:paleturquoise;" onClick="emotion('[color=paleturquoise]TEXT[/color]')">PaleTurquoise</option>
                                            <option style="color:palevioletred;" onClick="emotion('[color=palevioletred]TEXT[/color]')">PaleVioletRed</option>
                                            <option style="color:papayawhip;" onClick="emotion('[color=papayawhip]TEXT[/color]')">PapayaWhip</option>
                                            <option style="color:peachpuff;" onClick="emotion('[color=peachpuff]TEXT[/color]')">PeachPuff</option>
                                            <option style="color:peru;" onClick="emotion('[color=peru]TEXT[/color]')">Peru</option>
                                            <option style="color:pink;" onClick="emotion('[color=pink]TEXT[/color]')">Pink</option>
                                            <option style="color:plum;" onClick="emotion('[color=plum]TEXT[/color]')">Plum</option>
                                            <option style="color:powderblue;" onClick="emotion('[color=powderblue]TEXT[/color]')">PowderBlue</option>
                                            <option style="color:purple;" onClick="emotion('[color=purple]TEXT[/color]')">Purple</option>
                                            <option style="color:red;" onClick="emotion('[color=red]TEXT[/color]')">Red</option>
                                            <option style="color:rosybrown;" onClick="emotion('[color=rosybrown]TEXT[/color]')">RosyBrown</option>
                                            <option style="color:royalblue;" onClick="emotion('[color=royalblue]TEXT[/color]')">RoyalBlue</option>
                                            <option style="color:saddlebrown;" onClick="emotion('[color=saddlebrown]TEXT[/color]')">SaddleBrown</option>
                                            <option style="color:salmon;" onClick="emotion('[color=salmon]TEXT[/color]')">Salmon</option>
                                            <option style="color:sandybrown;" onClick="emotion('[color=sandybrown]TEXT[/color]')">SandyBrown</option>
                                            <option style="color:seagreen;" onClick="emotion('[color=seagreen]TEXT[/color]')">SeaGreen</option>
                                            <option style="color:seashell;" onClick="emotion('[color=seashell]TEXT[/color]')">SeaShell</option>
                                            <option style="color:sienna;" onClick="emotion('[color=sienna]TEXT[/color]')">Sienna</option>
                                            <option style="color:silver;" onClick="emotion('[color=silver]TEXT[/color]')">Silver</option>
                                            <option style="color:skyblue;" onClick="emotion('[color=skyblue]TEXT[/color]')">SkyBlue</option>
                                            <option style="color:slateblue;" onClick="emotion('[color=slateblue]TEXT[/color]')">SlateBlue</option>
                                            <option style="color:slategray;" onClick="emotion('[color=slategray]TEXT[/color]')">SlateGray</option>
                                            <option style="color:slategrey;" onClick="emotion('[color=slategrey]TEXT[/color]')">SlateGrey</option>
                                            <option style="color:snow;" onClick="emotion('[color=snow]TEXT[/color]')">Snow</option>
                                            <option style="color:springgreen;" onClick="emotion('[color=springgreen]TEXT[/color]')">SpringGreen</option>
                                            <option style="color:steelblue;" onClick="emotion('[color=steelblue]TEXT[/color]')">SteelBlue</option>
                                            <option style="color:tan;" onClick="emotion('[color=tan]TEXT[/color]')">Tan</option>
                                            <option style="color:teal;" onClick="emotion('[color=teal]TEXT[/color]')">Teal</option>
                                            <option style="color:thistle;" onClick="emotion('[color=thistle]TEXT[/color]')">Thistle</option>
                                            <option style="color:tomato;" onClick="emotion('[color=tomato]TEXT[/color]')">Tomato</option>
                                            <option style="color:turquoise;" onClick="emotion('[color=turquoise]TEXT[/color]')">Turquoise</option>
                                            <option style="color:violet;" onClick="emotion('[color=violet]TEXT[/color]')">Violet</option>
                                            <option style="color:wheat;" onClick="emotion('[color=wheat]TEXT[/color]')">Wheat</option>
                                            <option style="color:white;" onClick="emotion('[color=white]TEXT[/color]')">White</option>
                                            <option style="color:whitesmoke;" onClick="emotion('[color=whitesmoke]TEXT[/color]')">WhiteSmoke</option>
                                            <option style="color:yellow;" onClick="emotion('[color=yellow]TEXT[/color]')">Yellow</option>
                                            <option style="color:yellowgreen;" onClick="emotion('[color=yellowgreen]TEXT[/color]')">YellowGreen</option>
                                        </select>

                                        <input type='submit' name='bold' class="textarea curve3px" value='Bold Text' onClick="emotion('[b]TEXT[/b]')">
                                        <input type='submit' name='itallic' class="textarea curve3px" value='Itallic Text' onClick="emotion('[i]TEXT[/i]')">
                                        <input type='submit' name='strike' class="textarea curve3px" value='Strike Text' onClick="emotion('[s]TEXT[/s]')">
                                        <input type='submit' name='center' class="textarea curve3px" value='Center Text' onClick="emotion('[center]TEXT[/center]')">
                                        <input type='submit' name='colour' class="textarea curve3px" value='Colour Text' onClick="emotion('[color=COLOUR HERE]TEXT[/color]')">
                                    </center>
                                    <br>
                                    <center>
                                        <form action="" method="post" name="smiley">
                                            <textarea name="newpost" cols="90" rows="17" class="textarea" id="newpost"></textarea>
                                            <br>
                                            <img class="smileys" src="/layout/smiles/arrow.gif" onClick="emotion(':arrow:')">
                                            <img onClick="emotion(':D')" src="/layout/smiles/biggrin.gif" class="smileys">
                                            <img src="/layout/smiles/confused.gif" onClick="emotion(':S')" class="smileys">
                                            <img src="/layout/smiles/cry.gif" onClick="emotion(':cry:')" class="smileys">
                                            <img src="/layout/smiles/cool.gif" onClick="emotion('8)')" class="smileys">
                                            <img src="/layout/smiles/eek.gif" onClick="emotion('8|')" class="smileys">
                                            <img onClick="emotion(':evil:')" src="/layout/smiles/evil.gif" class="smileys">
                                            <img onClick="emotion(':!:')" src="/layout/smiles/exclaim.gif" class="smileys">
                                            <img onClick="emotion(':idea:')" src="/layout/smiles/idea.gif" class="smileys">
                                            <img onClick="emotion(':lol:')" src="/layout/smiles/lol.gif" class="smileys">
                                            <img onClick="emotion(':mad:')" src="/layout/smiles/mad.gif" class="smileys">
                                            <img onClick="emotion(':?:')" src="/layout/smiles/question.gif" class="smileys">
                                            <img onClick="emotion(':redface:')" src="/layout/smiles/redface.gif" class="smileys">
                                            <img onClick="emotion(':rolleyes:')" src="/layout/smiles/rolleyes.gif" class="smileys">
                                            <img onClick="emotion(':(')" src="/layout/smiles/sad.gif" class="smileys">
                                            <img onClick="emotion(':)')" src="/layout/smiles/smile.gif" class="smileys">
                                            <img onClick="emotion(':o')" src="/layout/smiles/surprised.gif" class="smileys">
                                            <img onClick="emotion(':P')" src="/layout/smiles/toungue.gif" class="smileys">
                                            <img onClick="emotion(':twisted:')" src="/layout/smiles/twisted.gif" class="smileys">
                                            <img onClick="emotion(';)')" src="/layout/smiles/wink.gif" class="smileys">
                                            <img onClick="emotion(':tdn:')" src="/layout/smiles/tdown.gif" class="smileys">
                                            <img onClick="emotion(':tup:')" src="/layout/smiles/tup.gif" class="smileys">
                                            <img onClick="emotion(':zipped:')" src="/layout/smiles/zipped.gif" class="smileys">
                                            <img onClick="emotion(':love:')" src="/layout/smiles/love.gif" class="smileys">
                                            <img onClick="emotion(':sarcasm:')" src="/layout/smiles/sarcasm.gif" class="smileys"><br>
                                            <br>
                                            <input type='submit' name='send' value='Check Codes!' class='textarea curve3px'>
                                            <input type='reset' name='reset' value='Reset!' class='textarea curve3px'>
                                        </form>
                                    </center>
                                </div>
                            </div>
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
                    <td><? include '../rightmenu.php'; ?></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td class="bottomleft"></td>
                    <td class="bottom"></td>
                    <td class="bottomright"></td>
                </tr>
            </table>
            <?

            include '../included.php';
            session_start();

            $getinfoarray = $statustesttwo;
            $getcrewid = $getinfoarray['crewid'];
            $getname = $getinfoarray['username'];

            $time = time();
            $timetwo = $time - 3000;

            $acount = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid='$getcrewid' and activity >= '$timetwo'"));

            if ($getcrewid == 0) {
                ?>
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
                                    <a href="../crews.php">Join a Crew</a>
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
            <? } else {
                ?>
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
                                            style="z-index: 0; margin-top: 1px; float: right; color: white; opacity: 0.88; font-size: 9px;"><? echo $acount; ?>
                                        <span class="membersOnline twinkle"
                                              style="position: relative; top: -0.75px;">•</span></span>
                                    <?
                                    $getcrewsql = mysql_query("SELECT boss,id,name FROM crews WHERE id = '$getcrewid'");
                                    $getcrewarray = mysql_fetch_array($getcrewsql);

                                    $getcrewboss = $getcrewarray['boss'];
                                    if ($getcrewboss == $getname) {
                                        ?>
                                        <a style="margin-left: -35px; float: right; padding-left: 3px; margin-right: 8px; padding-top: 0px; font-size: 9px; opacity: 0.25;"
                                           href="#" onclick="clearFeed();">wipe</a>
                                    <? } ?>
                                </div>
                                <div class="preventscroll crewFeedScroll" id="crewFeedScrollID"
                                     style="max-height: 330px;">
                                    <div id="crewFeedChat" style="max-width: 218px;">
                                        <?
                                        if (isset($_SESSION['chat'])) {
                                            echo $_SESSION['chat'];
                                        }
                                        ?>
                                    </div>
                                    <form method="post" onsubmit="submitCrewFeed(); return false;">
                                        <input type="hidden" value="<? echo $statustesttwo['username']; ?>"
                                               id="feed_name">
                                        <input type="hidden" value="<? echo $statustesttwo['crewid']; ?>"
                                               id="feed_crew">
                                        <input class="textarea" id="feed_msg"
                                               style="box-sizing: border-box; -moz-box-sizing: border-box; width: 100%; position: absolute; bottom: 0; margin-bottom: -1px; border-top: 2px solid rgba(20, 20, 20, 0.8); border-bottom: 0; border-left: 0; border-right: 0;"
                                               placeholder="Enter Message..." type="text"></form>
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
                            href="profile.php">Edit Profile</a></div>
            <? } ?>
        </td>
    </tr>
</table>
</body>
</html>
