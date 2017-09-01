<?php
$getpropinfoo = mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone' AND type = 'casi'");
$cont=0;
while($getpropinfo = mysql_fetch_array($getpropinfoo)) {
    $cont++;
    if($cont>=7){
        break;
    }
    $proplocation = $getpropinfo['location'];
    $propprop = $getpropinfo['casino'];
    $propprofit = number_format($getpropinfo['profit']);
    $propmaxbet = number_format($getpropinfo['maxbet']);
    if ($proplocation == "Las Vegas") {
        $doloc = "1";
    } elseif ($proplocation == "Los Angeles") {
        $doloc = "2";
    } elseif ($proplocation == "New York") {
        $doloc = "3";
    } elseif ($proplocation == "Staff Land") {
        $doloc = "6";
    }

    if ($proplocation == 'Las Vegas') {
        $location_name = "LV";
    } elseif ($proplocation == 'Los Angeles') {
        $location_name = "LA";
    } elseif ($proplocation == 'New York') {
        $location_name = "NY";
    } elseif ($proplocation == 'Chicago') {
        $location_name = "CH";
    } elseif ($proplocation == 'Miami') {
        $location_name = "MI";
    } elseif ($proplocation == 'Seatle') {
        $location_name = "ST";
    } elseif ($proplocation == 'Dallas') {
        $location_name = "DL";
    }
    if ($propprop == "Dice") {
        ?>
        <div class="relativeBlock" id="casinoBox<?
        echo $cont; ?>">
            <div class="casinoBox curve3px" id="casinoClick<?
            echo $cont; ?>" onclick="selectCasino('casino<?
            echo $cont; ?>');"><?
                echo $location_name; ?> DC: <span style="font-weight:bold;<?if($propprofit==0){echo "color:silver;";}elseif($propprofit>0){echo "color:lime;";}elseif($propprofit<0){echo "color:red;";}?>" id="profit_<?
                echo $cont; ?>">$<?
                    echo $propprofit; ?></span></div>
            <div class="updateCasino curve3px" id="casino<?
            echo $cont; ?>">
                <div id="casinoLoader<?
                echo $cont; ?>" class="casinoLoaderDiv">
                    <img src="layout_images/ajax-loader.gif" class="casinoLoaderAnim">
                </div>
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '1', '<?
                echo $proplocation; ?>', 'resetdiceprofit');" class="updateCasinoSubmit txtShadow curve1pxTop"
                       style="margin-top: 0;" value="Reset Profit" type="submit">
                <div class="updateCasinoSplitter"></div>
                <input id="newMax<?
                echo $cont; ?>" class="updateCasinoTextbox" placeholder="Set Max..." type="text">
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '2', '<?
                echo $proplocation; ?>', 'setmaxdice');" class="updateCasinoSubmit txtShadow" value="Update Maximum Bet"
                       type="submit">
                <div class="updateCasinoSplitter"></div>
                <input id="newOwner<?
                echo $cont; ?>" class="updateCasinoTextbox" placeholder="Send To..." type="text">
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '3', '<?
                echo $proplocation; ?>', 'setownerdice');" class="updateCasinoSubmit txtShadow" value="Send Casino"
                       type="submit">
                <div class="updateCasinoSplitter"></div>
                <input id="newPrice<?
                echo $cont; ?>" class="updateCasinoTextbox" placeholder="Sell For..." type="text">
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '4', '<?
                echo $proplocation; ?>', 'setpricedice');" class="updateCasinoSubmit curve1pxBottom txtShadow"
                       value="Add To Quicktrade" type="submit">
            </div>
        </div>
    <?
    } elseif ($propprop == "Races") {
        ?>
        <div class="relativeBlock" id="casinoBox<?
        echo $cont; ?>">
            <div class="casinoBox curve3px" id="casinoClick<?
            echo $cont; ?>" onclick="selectCasino('casino<?
            echo $cont; ?>');"><?
                echo $location_name; ?> RC: <span style="font-weight: bold;<?if($propprofit==0){echo "color:silver;";}elseif($propprofit>0){echo "color:lime;";}elseif($propprofit<0){echo "color:red;";}?>" id="profit_<?
                echo $cont; ?>">$<?
                    echo $propprofit; ?></span></div>
            <div class="updateCasino curve3px" id="casino<?
            echo $cont; ?>">
                <div id="casinoLoader<?
                echo $cont; ?>" class="casinoLoaderDiv">
                    <img src="layout_images/ajax-loader.gif" class="casinoLoaderAnim">
                </div>
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '1', '<?
                echo $proplocation; ?>', 'resetraceprofit');" class="updateCasinoSubmit txtShadow curve1pxTop"
                       style="margin-top: 0;" value="Reset Profit" type="submit">
                <div class="updateCasinoSplitter"></div>
                <input id="newMax<?
                echo $cont; ?>" class="updateCasinoTextbox" placeholder="Set Max..." type="text">
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '2', '<?
                echo $proplocation; ?>', 'setmaxrace');" class="updateCasinoSubmit txtShadow" value="Update Maximum Bet"
                       type="submit">
                <div class="updateCasinoSplitter"></div>
                <input id="newOwner<?
                echo $cont; ?>" class="updateCasinoTextbox" placeholder="Send To..." type="text">
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '3', '<?
                echo $proplocation; ?>', 'setownerrace');" class="updateCasinoSubmit txtShadow" value="Send Casino"
                       type="submit">
                <div class="updateCasinoSplitter"></div>
                <input id="newPrice<?
                echo $cont; ?>" class="updateCasinoTextbox" placeholder="Sell For..." type="text">
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '4', '<?
                echo $proplocation; ?>', 'setpricerace');" class="updateCasinoSubmit curve1pxBottom txtShadow"
                       value="Add To Quicktrade" type="submit">
            </div>
        </div>
    <?
    } elseif ($propprop == "Roulette") {
        ?>
        <div class="relativeBlock" id="casinoBox<?
        echo $cont; ?>">
            <div class="casinoBox curve3px" id="casinoClick<?
            echo $cont; ?>" onclick="selectCasino('casino<?
            echo $cont; ?>');"><?
                echo $location_name; ?> RLT: <span style="font-weight: bold;<?if($propprofit==0){echo "color:silver;";}elseif($propprofit>0){echo "color:lime;";}elseif($propprofit<0){echo "color:red;";}?>" id="profit_<?
                echo $cont; ?>">$<?
                    echo $propprofit; ?></span></div>
            <div class="updateCasino curve3px" id="casino<?
            echo $cont; ?>">
                <div id="casinoLoader<?
                echo $cont; ?>" class="casinoLoaderDiv">
                    <img src="layout_images/ajax-loader.gif" class="casinoLoaderAnim">
                </div>
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '1', '<?
                echo $proplocation; ?>', 'resetrltprofit');" class="updateCasinoSubmit txtShadow curve1pxTop"
                       style="margin-top: 0;" value="Reset Profit" type="submit">
                <div class="updateCasinoSplitter"></div>
                <input id="newMax<?
                echo $cont; ?>" class="updateCasinoTextbox" placeholder="Set Max..." type="text">
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '2', '<?
                echo $proplocation; ?>', 'setmaxrlt');" class="updateCasinoSubmit txtShadow" value="Update Maximum Bet"
                       type="submit">
                <div class="updateCasinoSplitter"></div>
                <input id="newOwner<?
                echo $cont; ?>" class="updateCasinoTextbox" placeholder="Send To..." type="text">
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '3', '<?
                echo $proplocation; ?>', 'setownerrlt');" class="updateCasinoSubmit txtShadow" value="Send Casino"
                       type="submit">
                <div class="updateCasinoSplitter"></div>
                <input id="newPrice<?
                echo $cont; ?>" class="updateCasinoTextbox" placeholder="Sell For..." type="text">
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '4', '<?
                echo $proplocation; ?>', 'setpricerlt');" class="updateCasinoSubmit curve1pxBottom txtShadow"
                       value="Add To Quicktrade" type="submit">
            </div>
        </div>
    <?
    } elseif ($propprop == "Blackjack") {
        ?>
        <div class="relativeBlock" id="casinoBox<?
        echo $cont; ?>">
            <div class="casinoBox curve3px" id="casinoClick<?
            echo $cont; ?>" onclick="selectCasino('casino<?
            echo $cont; ?>');"><?
                echo $location_name; ?> BJ: <span style="font-weight: bold; <?if($propprofit==0){echo "color:silver;";}elseif($propprofit>0){echo "color:lime;";}elseif($propprofit<0){echo "color:red;";}?>" id="profit_<?
                echo $cont; ?>">$<?
                    echo $propprofit; ?></span></div>
            <div class="updateCasino curve3px" id="casino<?
            echo $cont; ?>">
                <div id="casinoLoader<?
                echo $cont; ?>" class="casinoLoaderDiv">
                    <img src="layout_images/ajax-loader.gif" class="casinoLoaderAnim">
                </div>
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '1', '<?
                echo $proplocation; ?>', 'resetbjprofit');" class="updateCasinoSubmit txtShadow curve1pxTop"
                       style="margin-top: 0;" value="Reset Profit" type="submit">
                <div class="updateCasinoSplitter"></div>
                <input id="newMax<?
                echo $cont; ?>" class="updateCasinoTextbox" placeholder="Set Max..." type="text">
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '2', '<?
                echo $proplocation; ?>', 'setmaxbj');" class="updateCasinoSubmit txtShadow" value="Update Maximum Bet"
                       type="submit">
                <div class="updateCasinoSplitter"></div>
                <input id="newOwner<?
                echo $cont; ?>" class="updateCasinoTextbox" placeholder="Send To..." type="text">
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '3', '<?
                echo $proplocation; ?>', 'setownerbj');" class="updateCasinoSubmit txtShadow" value="Send Casino"
                       type="submit">
                <div class="updateCasinoSplitter"></div>
                <input id="newPrice<?
                echo $cont; ?>" class="updateCasinoTextbox" placeholder="Sell For..." type="text">
                <input onclick="updateCasinoInfo('<?
                echo $cont; ?>', '4', '<?
                echo $proplocation; ?>', 'setpricebj');" class="updateCasinoSubmit curve1pxBottom txtShadow"
                       value="Add To Quicktrade" type="submit">
            </div>
        </div>
    <?
    }
}?>