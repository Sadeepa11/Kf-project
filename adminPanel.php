<?php
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="logo/logo.png" />
</head>

<body>
    <div class="container-fluid  vh-100">
        <div class="row">

            <div class="col-2 bg-dark" style="height: 89vh; ">

                <div class="row">
                    <div class="col-12 logo1" style="background-color: black;">

                    </div>
                    <div class="col-12 mt-3 ">

                        <span class="navi_ac" style="color: white;">Dashboard</span>

                    </div>
                    <div class="col-12 mt-5 d-flex align-items-center ">




                        <span class="navi col-12" onclick="window.location = 'manageSystem.php';">Manage Users</span>




                    </div>


                </div>

            </div>
            <div class="col-10 " style="height: 89vh;">
                <div class="row">

                    <div class="col-8  text-center" style="height: 89vh;">

                        <h1>Dashboard</h1>
                        <hr class="mb-3"><br>

                        <div class="row" style="margin-top: -40px;">



                            <div class="col-5 transparent mt-1 " style="height: 15vh; margin-left:20px; border-radius:20px; ">
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-center align align-items-center " style="height: 15vh; border-radius:20px 0px 0px 20px; background-color: black;">
                                        <span class="fs-5 fw-bold text-white ">Total <br>Cut Qty</span>

                                    </div>
                                    <div class="col-6 d-flex justify-content-center align align-items-center" style="height: 15vh;">
                                        <?php
                                        $cut_qty_rs = Database::search("SELECT SUM(cut_qty_total) AS total FROM `style` WHERE `status_id`='1'");
                                        $cut_qty_data = $cut_qty_rs->fetch_assoc();
                                        $total_cut_qty = $cut_qty_data['total'];
                                        ?>
                                        <span class="fs-1 fw-bold"><?php echo ($total_cut_qty) ?></span>
                                    </div>

                                </div>
                            </div>
                            <div class=" offset-1 col-5 transparent mt-1 " style="height: 15vh; border-radius:20px;">
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-center align align-items-center" style="height: 15vh; border-radius:20px 0px 0px 20px; background-color: black;">
                                        <span class="fs-5 fw-bold text-white">Total <br> Styles</span>
                                    </div>
                                    <div class="col-6 d-flex justify-content-center align align-items-center" style="height: 15vh;">



                                        <?php

                                        $cut_style_rs = Database::search("SELECT * FROM `style`  WHERE `status_id`= '1'");
                                        $cut_style_num = $cut_style_rs->num_rows;

                                        ?>

                                        <span class="fs-1 fw-bold "><?php echo ($cut_style_num) ?></span>


                                    </div>
                                </div>
                            </div>

                            <!-- <div class="user-box2 d-flex justify-content-center align-items-center">
                                <input type="text" id="STNum" onkeyup="stnum();" required="required">
                                <div class="  lbg">
                                    <label>Search</label>
                                </div>
                            </div> -->



                            <div class="row">
                                <div class="col-12  mt-4" style="height: 50px;">
                                    <div class="user-box2 offset-1 col-10 d-flex justify-content-center align-items-center">
                                        <input type="text" id="STNum" onkeyup="stnum();" required="required">
                                        <div class="  lbg mt-4">
                                            <label>Search</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>






                        <div class=" col-12 table mb-4" id="table" style="top: -15px;">
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
                                <div class="col-12 tableRow">

                                <!-- onclick="loadStyle();" -->
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
                    <div class="col-4 text-center " style="height: 89vh;">

                        <div class="clock-container col-12 mt-4">
                            <div id="time"></div>
                            <div id="date"></div>
                        </div>

                        <br>

                        <h3>Merchants</h3>

                        <div class=" col-10 table" id="table">
                            <div class="col-12 tableHead text-center">
                                <div class="row">
                                    <div class="col-4 th "> id</div>
                                    <div class="col-8 th "> Name</div>
                                </div>
                            </div>
                            <?php





                            $style_rs = Database::search("SELECT * FROM `merchant`");



                            $style_num = $style_rs->num_rows;

                            for ($z = 0; $z < $style_num; $z++) {
                                $style_data = $style_rs->fetch_assoc();
                            ?>
                                <div class="col-12 tableRow" onclick="loadMerchnat();">
                                    <div class="row">
                                        <div class="col-4 tr "> <?php echo ($style_data["mid"]) ?></div>
                                        <div class="col-8 tr "> <?php echo ($style_data["fname"]) ?></div>

                                    </div>
                                </div>
                            <?php
                            }
                            ?>




                        </div>

                    </div>
                </div>

            </div>


            <!-- footer -->
            <div class="col-12 d-flex align-items-center fixed-bottom" style="height: 11vh; background-color:black;">
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




    </div>













    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>