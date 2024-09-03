<?php

require "connection.php";



$pw = $_POST["pw"];
$e = $_POST["e"];
// echo($pw);


if ($e == null) {

    echo ("Enter Your Email");
} else if ($pw == null) {

    echo ("Enter Your Password");
} else {

    $rs = Database::search("SELECT * FROM `cutting` WHERE  `email`='" . $e . "' AND `pw`='" . $pw . "' AND `active_status_id`='1'");
    $num = $rs->num_rows;
    $data = $rs->fetch_assoc();


    if ($num == 0) {

        echo ("Please try again !!!");
    } else {

        echo ("Success");
    }
}
