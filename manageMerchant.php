<?php
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchants Management</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="logo/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

    <div class="container-fluid vh-100 bg-light">

        <div class="col-12">
            <div class="row">
                <div class="col-8 vh-100  " style="background-color: black;">

                    <div class="login-box1 " id="reg">
                        <h2>Add New Merchant</h2>


                        <div class="user-box">
                            <input type="text" name="" id="mf" required="required">
                            <div class="  lbg">
                                <label>First Name</label>
                            </div>
                        </div>
                        <div class="user-box">
                            <input type="text" name="" id="ml" required="required">
                            <div class="  lbg">
                                <label>Last Name</label>
                            </div>
                        </div>
                        <div class="user-box">
                            <input type="text" id="me2" required="required">
                            <div class="  lbg">
                                <label>Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="user-box col-6">
                                <input type="password" id="mpw2" required="required">
                                <div class="  lbg2">
                                    <label>Password</label>
                                </div>

                                <i class="bi bi-eye icon2" id="meye2" onclick="mshowPassword2();"></i>

                            </div>
                            <div class="user-box col-6">
                                <input type="password" id="mrpw" required="required">
                                <div class="  lbg2">
                                    <label>Re-Password</label>
                                </div>

                                <i class="bi bi-eye icon2" id="meye3" onclick="mshowPassword3();"></i>

                            </div>

                        </div>

                        <div class="row">
                            <button class=" offset-1 col-10 btn btn-secondary fw-bold " onclick="mReg();" style="border-radius: 20px;">Register</button>
                            
                        </div>

                    </div>
                </div>


                <div class="col-4 vh-100  text-center  mt-2 ">


                    <h3>Cutting Sector Users</h3>
                    <hr><br>

                    <div class=" col-12 table" id="table">
                        <div class="col-12 tableHead text-center">
                            <div class="row">
                                <div class="col-4 th "> Name</div>
                                <div class="col-8 th "> Status</div>
                            </div>
                        </div>
                        <?php





                        $style_rs = Database::search("SELECT * FROM `merchant`");



                        $style_num = $style_rs->num_rows;

                        for ($z = 0; $z < $style_num; $z++) {
                            $style_data = $style_rs->fetch_assoc();

                            $rs = Database::search("SELECT * FROM `active_status` WHERE `id`='" . $style_data["active_status_id"] . "'");
                            $data = $rs->fetch_assoc();
                        ?>
                            <div class="col-12 tableRow" onclick="loadMerchnat();">
                                <div class="row">
                                    <div class="col-4 tr "> <?php echo ($style_data["fname"]) ?></div>
                                    <div class="col-8 tr" onclick="changeStatusMer('<?php echo $style_data['email']; ?>');"> <?php echo $data["active_status_name"]; ?></div>


                                </div>
                            </div>
                        <?php
                        }
                        ?>




                    </div>







                </div>

            </div>
        </div>



    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>