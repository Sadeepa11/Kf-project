<?php
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cutting Admin Management</title>
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
                        <h2>Add New Cutting Sector User</h2>


                        <div class="user-box">
                            <input type="text" name="" id="f" required="required">
                            <div class="  lbg">
                                <label>First Name</label>
                            </div>
                        </div>
                        <div class="user-box">
                            <input type="text" name="" id="l" required="required">
                            <div class="  lbg">
                                <label>Last Name</label>
                            </div>
                        </div>
                        <div class="user-box">
                            <input type="text" id="e2" required="required">
                            <div class="  lbg">
                                <label>Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="user-box col-6">
                                <input type="password" id="pw2" required="required">
                                <div class="  lbg2">
                                    <label>Password</label>
                                </div>

                                <i class="bi bi-eye icon2" id="eye2" onclick="showPassword2();"></i>

                            </div>
                            <div class="user-box col-6">
                                <input type="password" id="rpw" required="required">
                                <div class="  lbg2">
                                    <label>Re-Password</label>
                                </div>

                                <i class="bi bi-eye icon2" id="eye3" onclick="showPassword3();"></i>

                            </div>

                        </div>

                        <div class="row">
                            <button class=" offset-1 col-10 btn btn-secondary fw-bold " onclick="cuttingReg();" style="border-radius: 20px;">Register</button>
                            
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





                        $style_rs = Database::search("SELECT * FROM `cutting`");



                        $style_num = $style_rs->num_rows;

                        for ($z = 0; $z < $style_num; $z++) {
                            $style_data = $style_rs->fetch_assoc();

                            $rs = Database::search("SELECT * FROM `active_status` WHERE `id`='" . $style_data["active_status_id"] . "'");
                            $data = $rs->fetch_assoc();
                        ?>
                            <div class="col-12 tableRow" onclick="loadMerchnat();">
                                <div class="row">
                                    <div class="col-4 tr "> <?php echo ($style_data["fname"]) ?></div>
                                    <div class="col-8 tr" onclick="changeStatus('<?php echo $style_data['email']; ?>');"> <?php echo $data["active_status_name"]; ?></div>


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