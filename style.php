<?php

require "connection.php";

$st_num = $_GET["st_num"];


$style_rs = Database::search("SELECT * FROM `style` INNER JOIN `merchant` ON style.merchant_mid = merchant.mid WHERE style.st_num='" . $st_num . "'");
$style_data = $style_rs->fetch_assoc();





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($st_num) ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="logo/logo.png" />
</head>

<body>

    <div class="container-fluid vh-100 bg-dark">

        <div class="row d-flex justify-content-center align-items-center">
            <div class="offeset-1 col-10 style-box mt-3 d-flex justify-content-center align-items-center">

                <div class="row col-12">
                    <div class="offset-1 col-10 style-box-inner d-flex justify-content-center align-items-center">
                        <h2>New Style</h2>

                    </div>
                    <div class="offset-1 col-10 mt-3 style-box-inner-1 d-flex justify-content-center align-items-center">



                        <div class="row col-12  d-flex justify-content-center align-items-center" style="padding: 20px 0px 0px 0px; margin-top: 45vh;">

                            <div class="col-4  image mt-5">

                                <img src="<?php echo ($style_data["img"]) ?>" class="img-fluid" alt="" style="width: 100%; height: 45vh;">
                            </div>
                            <div class="col-8 contents mt-5">

                                <div class="box1 col-12 mt-4">
                                    <input type="text" name="" value="<?php echo ($st_num) ?>" required="required" readonly>

                                    <div class="  lbg4">
                                        <label>Style Number</label>
                                    </div>
                                </div>

                                <div class="box1 col-12">
                                    <input type="text" name="" value="<?php echo ($style_data['factory']) ?>" required="required" readonly>

                                    <div class="  lbg4">
                                        <label>Factory Name</label>
                                    </div>
                                </div>


                                <div class="box1 col-12">
                                    <input type="text" name="" value="<?php echo ($style_data['fname']) ?> <?php echo ($style_data['lname']) ?>" required="required" readonly>

                                    <div class="  lbg4">
                                        <label>Merchandiser</label>
                                    </div>
                                </div>
                                <div class="box1 col-12">
                                    <input type="text" name="" value="<?php echo ($style_data['designer']) ?>" required="required" readonly>

                                    <div class="  lbg4">
                                        <label>Designer</label>
                                    </div>
                                </div>

                                <?php
                                $item_rs = Database::search("SELECT * FROM `item` WHERE `id`='" . $style_data['item_id'] . "'");
                                $item_data = $item_rs->fetch_assoc();


                                ?>
                                <div class="box1 col-12">
                                    <input type="text" name="" value="<?php echo ($item_data['item']) ?>" required="required" readonly>

                                    <div class="lbg4">
                                        <label>Item</label>
                                    </div>
                                </div>
                                <div class="box1 col-12">
                                    <input type="text" name="" value="<?php echo ($style_data['date_time']) ?>" required="required">

                                    <div class="lbg4">
                                        <label>Date</label>
                                    </div>
                                </div>






                            </div>

                            <div class="col-12  ">



                                <div class=" col-12 table mb-4" id="table" style="top: -15px;  max-height: 20vh;">
                                    <div class="col-12 tableHead">
                                        <div class="row">
                                            <div class="col-3 th text-center ">Refference</div>
                                            <div class="col-3 th text-center"> Colour</div>
                                            <div class="col-3 th text-center"> Fabric Qty</div>
                                            <div class="col-3 th text-center"> Order Qty</div>
                                        </div>
                                    </div>
                                    <?php


                                    // $fab_rs = Database::search("SELECT * FROM `style_has_fabrics` WHERE `style_id`='" .$style_data["id"] . "'");

                                    $fab_rs = Database::search("SELECT * FROM `style_has_fabrics` 
                                      INNER JOIN `fabrics` ON style_has_fabrics.fabrics_id = fabrics.id 
                                       WHERE `style_has_fabrics`.`style_id`='" . $style_data["id"] . "'");


                                    $fab_num = $fab_rs->num_rows;


                                    for ($z = 0; $z < $fab_num; $z++) {
                                        $fab_data = $fab_rs->fetch_assoc();

                                    ?>
                                        <div class="col-12 tableRow">
                                            <div class="row">
                                                <div class="col-3 tr1 "> <?php echo ($fab_data["ref"]) ?></div>
                                                <div class="col-3 tr1 "> <?php echo ($fab_data["colour"]) ?></div>
                                                <div class="col-3 tr1 "> <?php echo ($fab_data["fabrics_qty"]) ?></div>
                                                <div class="col-3 tr1 "> <?php echo ($fab_data["cut_qty"]) ?></div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>




                                </div>




                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 ">

                                        <div class="box1 col-12">
                                            <input type="text" name="" value="<?php echo ($style_data['fab_con']) ?>" required="required" readonly>

                                            <div class="lbg4">
                                                <label>Consumtion</label>
                                            </div>
                                        </div>
                                        <div class="box1 col-12">

                                            <input type="text" name="" value="<?php echo ($style_data['fus']) ?>" required="required" readonly>

                                            <div class="lbg4">
                                                <label>Fusing</label>
                                            </div>
                                        </div>

                                        <div class="box1 col-12">
                                            <?php

                                            $matching_rs = Database::search("SELECT * FROM `matching` WHERE `id`='" . $style_data['matching_id'] . "'");
                                            $matching_data = $matching_rs->fetch_assoc();

                                            ?>


                                            <input type="text" name="" value="<?php echo ($matching_data['matching']) ?>" required="required" readonly>

                                            <div class="lbg4">
                                                <label>Matching</label>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-6">
                                        <div class="box1 col-12">
                                            <?php

                                            $pipin_rs = Database::search("SELECT * FROM `pipine` WHERE `id`='" . $style_data['pipine_id'] . "'");
                                            $pipin_data = $pipin_rs->fetch_assoc();



                                            ?>


                                            <input type="text" name="" value="<?php echo ($pipin_data['sts']) ?>" required="required" readonly>

                                            <div class="lbg4">
                                                <label>Pipine</label>
                                            </div>
                                        </div>
                                        <div class="box1 col-12">

                                            <?php


                                            if ($style_data['pipine_way_id'] == 0) {
                                            ?>

                                                <input type="text" name="" value=" No" required="required" readonly>
                                            <?php
                                            } else {


                                                $pipine_rs = Database::search("SELECT * FROM `pipine_way` WHERE `id`='" . $style_data['pipine_way_id'] . "'");
                                                $pipine_data = $pipine_rs->fetch_assoc();
                                            ?>
                                                <input type="text" name="" value="<?php echo ($style_data['pipine_width']) ?> <?php echo ($pipine_data['way']) ?>" required="required" readonly>
                                            <?php
                                            }
                                            ?>


                                            <div class="lbg4">
                                                <label>Pipine Way</label>
                                            </div>
                                        </div>

                                        <div class="box1 col-12">
                                            <input type="text" name="" value="<?php echo ($style_data['pipine_con']) ?>" required="required" readonly>

                                            <div class="lbg4">
                                                <label>Pipine Consumtion</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="col-12  mb-3 " style="border-top: 1px solid white;">
                                <div class="row">
                                    <div class="col-6 mt-3">

                                        <div class="box col-12">

                                            <select name="" id="ref">
                                                <option value="0" style="background-color: black;">Fabric Refference</option>

                                                <?php
                                                $fab1_rs = Database::search("SELECT * FROM `style_has_fabrics` 
                                                                            INNER JOIN `fabrics` ON style_has_fabrics.fabrics_id = fabrics.id 
                                                                            WHERE `style_has_fabrics`.`style_id`='" . $style_data["id"] . "'");


                                                $fab1_num = $fab1_rs->num_rows;

                                                for ($z = 0; $z < $fab1_num; $z++) {

                                                    $fab1_data = $fab1_rs->fetch_assoc();

                                                ?>
                                                    <option value="<?php echo ($fab1_data["ref"]) ?>" style="background-color: black;"><?php echo ($fab1_data["ref"]) ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="box col-12">
                                            <input type="text" name="" id="cutQty" required="required">

                                            <div class="lbg4">
                                                <label>Cut Qty</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="button col-12" onclick="addCutQty('<?php echo ($style_data['id']) ?>');">Add</button>
                                        </div>

                                    </div>

                                    <div class="col-6  d-flex justify-content-center align-items-center">

                                        <div class="row">

                                            <h3 class="text-white col-10">Total Cut Qty</h3>

                                            <h2 class=" text-white col-2" id="tot"><?php echo ($style_data['cut_qty_total']); ?></h2>

                                        </div>





                                    </div>
                                </div>
                            </div>

                            <div class="col-12 bg-success mb-3 ">
                                <div class="row">
                                    <div class="col-12">

                                    </div>
                                </div>
                            </div>

                        </div>




                    </div>

                </div>


            </div>
        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>