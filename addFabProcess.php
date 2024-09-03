<?php

require "connection.php";

$ref = $_POST["ref"];
$colour = $_POST["colour"];
$fabQty = $_POST["fabQty"];
$orderQty = $_POST["orderQty"];
$styleNum = $_POST["styleNum"];

$rs = Database::search("SELECT * FROM `fabrics` WHERE  `ref`='" . $ref . "' AND `colour`='" . $colour . "'");
$num = $rs->num_rows;
$data = $rs->fetch_assoc();

if ($num == 0) {

    Database::iud("INSERT INTO `fabrics`(`ref`,`colour`)VALUES('" . $ref . "','" . $colour . "')");

    $rs1 = Database::search("SELECT * FROM `fabrics` WHERE  `ref`='" . $ref . "' AND `colour`='" . $colour . "'");
    $data1 = $rs1->fetch_assoc();
    $rs2 = Database::search("SELECT * FROM `style` WHERE  `st_num`='" . $styleNum . "'");
    $data2 = $rs2->fetch_assoc();

    Database::iud("INSERT INTO `style_has_fabrics`(`fabrics_id`,`style_id`,`cut_qty`,`fabrics_qty`)VALUES('" . $data1["id"] . "','" . $data2["id"] . "','" . $orderQty . "','".$fabQty."')");
} else {

    $rs3 = Database::search("SELECT * FROM `fabrics` WHERE  `ref`='" . $ref . "' AND `colour`='" . $colour . "'");
    $data3 = $rs3->fetch_assoc();
    $rs4 = Database::search("SELECT * FROM `style` WHERE  `st_num`='" . $styleNum . "'");
    $data4 = $rs4->fetch_assoc();

    Database::iud("INSERT INTO `style_has_fabrics`(`fabrics_id`,`style_id`,`cut_qty`,`fabrics_qty`)VALUES('" . $data3["id"] . "','" . $data4["id"] . "','" . $orderQty . "','".$fabQty."')");
}

?>





<?php

$style_rs = Database::search("SELECT * FROM `style` WHERE  `st_num`='" . $styleNum . "'");
$style_data = $style_rs->fetch_assoc();

$rs5 = Database::search("SELECT * FROM `style_has_fabrics` WHERE  `style_id`='" . $style_data["id"] . "'");
$num5 = $rs5->num_rows;

if ($num5 > 0) {
    for ($z = 0; $z < $num5; $z++) {
        $data5 = $rs5->fetch_assoc();

        $rs6 = Database::search("SELECT * FROM `fabrics` WHERE  `id`='" . $data5["fabrics_id"] . "'");
        $data6 = $rs6->fetch_assoc();
?>
        <div class="col-12 tableRow" style="border-top: 1px solid white; color: white;" id="row">
            <div class="row">
                <div class="col-4 tr "><?php echo $data6["ref"]; ?></div>
                <div class="col-8 tr"><?php echo $data6["colour"]; ?></div>
            </div>
        </div>
    <?php
    }
} else {
    ?>
    <div class="col-12 tableRow">
        <div class="row">
            <div class="col-12 tr1">No fabrics</div>
        </div>
    </div>
<?php
}
?>