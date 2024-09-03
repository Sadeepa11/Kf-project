<?php
require "connection.php";


$memail = $_GET["me"];
$mrs = Database::search("SELECT * FROM `merchant` WHERE `email`='" . $memail . "'");
$mdata = $mrs->fetch_assoc();
$mid = $mdata["mid"];
$style_rs = Database::search("SELECT * FROM `style` WHERE `merchant_mid` = '" . $mid . "'");
$style_num = $style_rs->num_rows;
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
                        <input type="text" id="MSTNum"onkeyup="mstnum('<?php echo $mdata['mid']; ?>');"
 required="required">
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

                            <div class=" offset-1 col-5 transparent mt-1 " style="height: 20vh; border-radius:20px;">
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-center align align-items-center" style="height: 20vh; border-radius:20px 0px 0px 20px; background-color: black;">
                                        <span class="fs-3 fw-bold text-white">Total <br> Styles</span>
                                    </div>
                                    <div class="col-6 d-flex justify-content-center align align-items-center" style="height: 20vh;">
                                      
                                        <span class="fs-1 fw-bold "><?php echo ($style_num) ?></span>


                                    </div>
                                </div>
                            </div>

                            <div class=" offset-1 col-5 transparent mt-1 " style="height: 20vh; border-radius:20px;">
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-center align align-items-center" style="height: 20vh; border-radius:20px 0px 0px 20px; background-color: black;">
                                        <span class="fs-3 fw-bold text-white">Add <br>New Style</span>
                                    </div>
                                    <div class="col-6 d-flex justify-content-center align align-items-center" style="height: 20vh;">
                                        <span class=" add" onclick="addSt('<?php echo $mdata['mid']; ?>');">+</span>
                                        <!-- <span class=" add" onclick="window.location='addNewStyle.php?mid='+<?php echo($mdata['mid']) ?>">+</span> -->
                                        

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





                <div class=" col-9 table mt-5" id="mtable" style=" max-height: 47vh;">
                    <div class="col-12 tableHead">
                        <div class="row">
                            <div class="col-3 th "> Style Number</div>
                            <div class="col-3 th "> Factory</div>
                            <div class="col-3 th "> Date</div>
                            <div class="col-3 th "> Status</div>
                        </div>
                    </div>
                    <?php





                    for ($z = 0; $z < $style_num; $z++) {
                        $style_data = $style_rs->fetch_assoc();

                        $status_rs = Database::search("SELECT * FROM `status` WHERE `id` = '" . $style_data["status_id"] . "'");
                        $status_data = $status_rs->fetch_assoc();



                    ?>
                        <div class="col-12 tableRow" onclick="mloadStyle();">
                            <div class="row">
                                <div class="col-3 tr "> <?php echo ($style_data["st_num"]) ?></div>
                                <div class="col-3 tr "> <?php echo ($style_data["factory"]) ?></div>
                                <div class="col-3 tr "> <?php echo ($style_data["date_time"]) ?></div>
                                <div class="col-3 tr "> <?php echo ($status_data["status_name"]) ?></div>
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