<?php

require "connection.php";

$style_num = $_POST["style_num"];
$fac = $_POST["fac"];
$fab_con = $_POST["fab_con"];
$fus = $_POST["fus"];
$designer = $_POST["designer"];
$item = $_POST["item"];
$match = $_POST["match"];
$p_width = $_POST["pipine_width"];
$p_way = $_POST["pipine_way"];
$p_con = $_POST["pipine_con"];
$mid = $_POST["Mid"];


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");



if (empty($p_width) && $p_way == 0) {

//     Database::iud("INSERT INTO `style` 
// (`st_num`,`factory`,`date_time`,`status_id`,`fab_con`,`fus`,`pipine_width`,`matching_id`,`item_id`,`designer`,`pipine_con`,`merchant_mid`,`pipine_id`,`pipine_way_id`) VALUES 
// ('" . $style_num . "','" . $fac . "','" . $date . "','1','" . $fab_con . "','" . $fus . "','" . $p_width . "','" . $match . "','" . $item . "','" . $designer . "','" . $p_con . "','" . $mid . "','2','0')");

Database::iud("INSERT INTO `style` 
(`st_num`,`factory`,`date_time`,`status_id`,`fab_con`,`fus`,`pipine_width`,`matching_id`,`item_id`,`designer`,`pipine_con`,`merchant_mid`,pipine_id) VALUES 
('" . $style_num . "','" . $fac . "','" . $date . "','2','" . $fab_con . "','" . $fus . "','" . $p_width . "','" . $match . "','" . $item . "','" . $designer . "','" . $p_con . "','" . $mid . "','2')");



    echo ("Add Style Without Pipine");
} else {




    Database::iud("INSERT INTO `style` 
(`st_num`,`factory`,`date_time`,`status_id`,`fab_con`,`fus`,`pipine_width`,`pipine_way_id`,`matching_id`,`item_id`,`designer`,`pipine_con`,`merchant_mid`,pipine_id) VALUES 
('" . $style_num . "','" . $fac . "','" . $date . "','2','" . $fab_con . "','" . $fus . "','" . $p_width . "','" . $p_way . "','" . $match . "','" . $item . "','" . $designer . "','" . $p_con . "','" . $mid . "','1')");



    echo ("Add Style With Pipine");
}
if (isset($_FILES["image"])) {
    $image = $_FILES["image"];

    $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
    $file_ex = $image["type"];

    if (!in_array($file_ex, $allowed_image_extentions)) {
        echo ("Please select a valid image.");
    } else {

        $new_file_extention;

        if ($file_ex == "image/jpg") {
            $new_file_extention = ".jpg";
        } else if ($file_ex == "image/jpeg") {
            $new_file_extention = ".jpeg";
        } else if ($file_ex == "image/png") {
            $new_file_extention = ".png";
        } else if ($file_ex == "image/svg+xml") {
            $new_file_extention = ".svg";
        }

        $file_name = "src/style_image/" . $style_num . "_" . uniqid() . $new_file_extention;

        move_uploaded_file($image["tmp_name"], $file_name);


        Database::iud("UPDATE `style` SET `img`='" . $file_name . "' WHERE 
        `st_num`='" . $style_num . "'");
    }
}
