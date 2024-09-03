<?php
require "connection.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="logo/logo.png" />
</head>

<body>
    <div class="col-12 container-fluid  vh-100">

        <div class="row ">
            <div class="col-12" style="height: 10vh; background-color:black;">
                <div class="row col-12 ">
                    <h1 class="mt-2 fw-bold text-light col-6" id="welCome">Dashboard</h1>
                    <!-- <input type="text" id="STNum" class=" col-6 mt-3" onkeyup="stnum();" placeholder="Search from style number......" class="inputDash" /> -->
                    <div class="user-box1">
                        <input type="text" id="STNum" onkeyup="stnum();" required="required">
                        <div class="  lbg">
                            <label>Search</label>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-12  text-center subContainer ">

                <div class="row">



                    <div class="area col-6" style=" height:20vh">
                        <div class="row">
                            <div class="col-5 transparent mt-1" style="height: 20vh; margin-left:20px; border-radius:20px;">
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-center align align-items-center " style="height: 20vh; border-radius:20px 0px 0px 20px; background-color: black;">
                                        <span class="fs-3 fw-bold text-white ">Total <br>Cut Qty</span>

                                    </div>
                                    <div class="col-6 d-flex justify-content-center align align-items-center" style="height: 20vh;">
                                        <?php
                                        $cut_qty_rs = Database::search("SELECT SUM(cut_qty_total) AS total FROM `style` WHERE `status_id`='1'");
                                        $cut_qty_data = $cut_qty_rs->fetch_assoc();
                                        $total_cut_qty = $cut_qty_data['total']; // Access the 'total' key from the associative array
                                        ?>
                                        <span class="fs-1 fw-bold"><?php echo ($total_cut_qty) ?></span>
                                    </div>

                                </div>
                            </div>
                            <div class=" offset-1 col-5 transparent mt-1 " style="height: 20vh; border-radius:20px;">
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-center align align-items-center" style="height: 20vh; border-radius:20px 0px 0px 20px; background-color: black;">
                                        <span class="fs-3 fw-bold text-white">Total <br> Styles</span>
                                    </div>
                                    <div class="col-6 d-flex justify-content-center align align-items-center" style="height: 20vh;">



                                        <?php

                                        $cut_style_rs = Database::search("SELECT * FROM `style`  WHERE `status_id`= '1'");
                                        $cut_style_num = $cut_style_rs->num_rows;

                                        ?>

                                        <span class="fs-1 fw-bold "><?php echo ($cut_style_num) ?></span>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clock-container col-6 mt-4">
                        <div id="time"></div>
                        <div id="date"></div>
                    </div>


                </div>





                <div class=" col-12 table mt-3" id="table" style=" max-height: 52vh;">
                    <div class="col-12 tableHead">
                        <div class="row">
                            <div class="col-3 th "> Style Number</div>
                            <div class="col-3 th "> Factory</div>
                            <div class="col-3 th "> Merchant</div>
                            <div class="col-3 th "> Date</div>
                        </div>
                    </div>
                    <?php





                    $style_rs = Database::search("SELECT * FROM `style` INNER JOIN `merchant` ON style.merchant_mid = merchant.mid");



                    $style_num = $style_rs->num_rows;

                    for ($z = 0; $z < $style_num; $z++) {
                        $style_data = $style_rs->fetch_assoc();
                    ?>
                        <div class="col-12 tableRow" onclick="loadStyle(<?php echo ($style_data['st_num']) ?>);">
                            <div class="row">
                                <div class="col-3 tr "> <?php echo ($style_data["st_num"]) ?></div>
                                <div class="col-3 tr "> <?php echo ($style_data["factory"]) ?></div>
                                <div class="col-3 tr "> <?php echo ($style_data["fname"]) ?></div>
                                <div class="col-3 tr "> <?php echo ($style_data["date_time"]) ?></div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>




                </div>




            </div>
            <!-- footer -->
            <div class="col-12 d-flex align-items-center fixed-bottom" style="height: 15vh; background-color:black;">
                <div class="row col-12 ">
                    <div class="col-6">
                        <p class=" mt-1 text-light col-6"> Copyright &copy; 2024 Kelly Felder All Right Reserved.</p>



                    </div>


                    <div class="col-6 text-end">
                        <span class="mt-1  text-light">Powerd By: ModulaVers Systems(PVT)LTD</span>
                        <br>
                        <span class="mt-1  text-light"> Contacts : +94765772504</span>



                    </div>

                    <hr style="background-color: white; margin-left:0.75%">


                </div>

            </div>
            <!-- footer -->



        </div>



        <script src="script.js"></script>

        <script src="bootstrap.bundle.js"></script>
</body>

</html>