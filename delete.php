<?php

include 'included.php';

if(isset($_POST['action']) && isset($_POST['activityID'])){
    if($_POST['action']=="1"){
        mysql_query("DELETE FROM home WHERE id = '".$_POST['activityID']."'");
    }else if($_POST['action']=="2"){
        mysql_query("DELETE FROM casinoroulettebets WHERE id = '".$_POST['activityID']."'");
    }else if($_POST['action']=="3"){
        mysql_query("DELETE FROM casinoracebets WHERE id = '".$_POST['activityID']."'");
    }else if($_POST['action']=="4"){
        mysql_query("DELETE FROM casinodicebets WHERE id = '".$_POST['activityID']."'");
    }else if($_POST['action']=="5"){
        mysql_query("DELETE FROM casinoblackjackbets WHERE id = '".$_POST['activityID']."'");
    }else if($_POST['action']=="6"){
        mysql_query("DELETE FROM kills WHERE id = '".$_POST['activityID']."'");
    }
    echo "ok";
}
?>