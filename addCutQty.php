<?php
require "connection.php";

$ref = $_POST["ref"];
$cutQty = $_POST["cutQty"];
$st_id = $_POST["st_id"];


if ($ref == 0) {
    // echo ("Please Select the Refference!!!");
} else if (empty($cutQty)) {

    // echo ("Please Enter the Cut Qty!!!");
} else {

    $fabrics_rs = Database::search("SELECT * FROM `fabrics`  WHERE `ref`= '" . $ref . "'");

    $fabrics_data = $fabrics_rs->fetch_assoc();



    $style_has_fab_rs = Database::search("SELECT * FROM `style_has_fabrics` WHERE style_id='" . $st_id . "' AND `fabrics_id`='" . $fabrics_data["id"] . "'");
    $style_has_fab_data = $style_has_fab_rs->fetch_assoc();



    // $new_cut_qty=$style_has_fab_data["final_cutQty"] + $cutQty;




    Database::iud("UPDATE `style_has_fabrics` SET `final_cutQty`='" . $cutQty . "' WHERE `style_id`='" . $st_id . "' AND `fabrics_id`='" . $fabrics_data["id"] . "'");

    $cut_qty_rs = Database::search("SELECT SUM(final_cutQty) AS total FROM `style_has_fabrics` WHERE `style_id`='" . $st_id . "'");
    $cut_qty_data = $cut_qty_rs->fetch_assoc();
    $total_cut_qty = $cut_qty_data['total'];
    // $style_rs = Database::search("SELECT * FROM `style` WHERE id='" . $st_id . "'");
    // $style_data = $style_rs->fetch_assoc();



    // $new_cutQty=$style_data["cut_qty_total"] + $total_cut_qty;



    Database::iud("UPDATE `style` SET `cut_qty_total`='" . $total_cut_qty . "' WHERE `id`='" . $st_id . "'");

    echo($total_cut_qty);
}
