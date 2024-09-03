<?php

require "connection.php";

$e= $_GET["e"];

$rs = Database::search("SELECT * FROM `cutting` WHERE `email`='".$e."'");
$num = $rs->num_rows;

if($num == 1){

    $data = $rs->fetch_assoc();
    $status = $data["active_status_id"];

    if($status == 1){

        Database::iud("UPDATE `cutting` SET `active_status_id`='2' WHERE `email`='".$e."'");
        echo ("deactivated");

    }else if($status == 2){

        Database::iud("UPDATE `cutting` SET `active_status_id`='1' WHERE `email`='".$e."'");
        echo ("activated");

    }

}else{
    echo ("Something Went Wrong. Please try again later.");
}

?>