<?php
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manange System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="logo/logo.png" />
</head>

<body>
    <div class="container-fluid vh-100">
        <div class="row">

            <div class="col-2 bg-dark" style="height: 89vh; ">

                <div class="row">
                    <div class="col-12 logo1" style="background-color: black;">

                    </div>
                    <div class="col-12 mt-3 ">

                        <span class="navi" onclick="window.location = 'adminPanel.php';">Dashboard</span>

                    </div>
                    <div class="col-12 mt-5 d-flex align-items-center ">

                        <span class="navi_ac col-12">Manage Users</span>

                    </div>


                </div>

            </div>
            <div class="col-10 " style="height: 89vh;">
                <div class="row">

                    <div class="col-12  text-center" style="height: 89vh;">

                        <h1>Manage Users</h1>
                        <hr><br>


                        <div class="col-12   ">
                            <div class="row gap-5 mt-5  d-flex justify-content-center align-items-center">
                                <div class="  col-5  transparent card1">

                                    <h2 class="card-header">
                                        Manage Cutting Admin
                                    </h2>
                                    <div class="card-body">
                                        <p class="card-text">
                                            This section allows you to have full control over Cutting Admin management. Add new Cutting Admins to the team and delete existing ones as needed. Streamline your workforce by adding skilled professionals and maintain an organized administration. Click below to access the Cutting Admin management interface and ensure your team has the right members for successful operations.
                                        </p>
                                        <a href="manageCutting.php" class="btn btn-dark">Cutting Admin Management</a>
                                    </div>

                                </div>
                                <div class=" col-5 transparent card1">

                                    <h2 class="card-header">
                                        Manage Merchants
</h2>
                                    <div class="card-body">
                                        <p class="card-text">
                                            Take charge of your merchant management. Add new merchants to your platform and remove existing ones seamlessly. Ensure a dynamic and thriving network by managing your merchants effectively. Click below to access the Merchant Management interface and optimize your platform with the right business partners.
                                        </p>
                                        <a href="manageMerchant.php" class="btn btn-dark">Merchants Management</a>
                                    </div>
                                </div>
                            </div>

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