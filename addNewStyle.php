<?php

require "connection.php";

$Mid=$_GET["mid"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Style</title>
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



                        <div class="row col-12  d-flex justify-content-center align-items-center" style="padding: 20px 0px 0px 0px; margin-top: 20vh; ">

                            <div class="col-4  image mt-5">

                                <input type="file" class="d-none" id="image" />

                                <label onclick="changeImage();" for="image"><img src="logo/logo.png" class="img-fluid " width=" auto" height="50px" alt="" id="viweImg"></label>
                            </div>
                            <div class="col-8 contents mt-5">

                                <div class="box col-12">
                                    <input type="text" name="" id="style_num" required="required">

                                    <div class="lbg4">
                                        <label>Style Number</label>
                                    </div>
                                </div>
                                <div class="box col-12">

                                    <input type="text" name="" id="fac" required="required">

                                    <div class="lbg4">
                                        <label>Factory</label>
                                    </div>
                                </div>
                                <div class="box col-12">
                                    <input type="text" name="" id="fab_con" required="required">

                                    <div class="lbg4">
                                        <label>Consumtion</label>
                                    </div>
                                </div>
                                <div class="box col-12">

                                    <input type="text" name="" id="fus" required="required">

                                    <div class="lbg4">
                                        <label>Fusing</label>
                                    </div>
                                </div>
                                <div class="box col-12">

                                    <input type="text" name="" id="designer" required="required">

                                    <div class="lbg4">
                                        <label>Designer</label>
                                    </div>
                                </div>

                                <div class="box col-12">

                                    <select name="" id="item">
                                        <option value="0" style="background-color: black;">Item</option>

                                        <?php
                                        $item_rs = Database::search("SELECT * FROM `item`");


                                        $item_num = $item_rs->num_rows;

                                        for ($z = 0; $z < $item_num; $z++) {

                                            $item_data = $item_rs->fetch_assoc();

                                        ?>
                                            <option value="<?php echo ($item_data["id"]) ?>" style="background-color: black;"><?php echo ($item_data["item"]) ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>




                            </div>



                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-6 mt-2">



                                        <div class="box col-12">



                                            <select name="" id="match">
                                                <option value="0" style="background-color: black;">Matching Status</option>
                                                <option value="1" style="background-color: black;">Yes</option>
                                                <option value="2" style="background-color: black;">No</option>
                                            </select>
                                        </div>

                                        <div class="box col-12">



                                            <input type="text" name="" id="pipine_width" required="required">

                                            <div class="lbg4">
                                                <label>Pipine Width</label>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-6 mt-2">

                                        <div class="box col-12">

                                            <!-- <input type="text" name="" required="required"> -->
                                            <select name="" id="pipine_way">
                                                <option value="0" style="background-color: black;">Pinine Way</option>
                                                <option value="1" style="background-color: black;">Length Wise</option>
                                                <option value="2" style="background-color: black;">Width Wise</option>
                                                <option value="3" style="background-color: black;">Buyers</option>
                                            </select>

                                        </div>

                                        <div class="box col-12">
                                            <input type="text" name="" id="pipine_con" required="required">

                                            <div class="lbg4">
                                                <label>Pipine Consumtion</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="col-6 mb-3 ">


                                <button class=" button col-12" onclick='addStyle(<?php echo($Mid) ?>);'>Add Style before Fabrics</button>


                            </div>
                            <div class="col-12  ">

                                <div class="row" style="border-top: 1px solid white;">
                                    <div class="col-6 mt-3">
                                        <div class="row">
                                            <div class="col-6">

                                                <div class="box col-12">

                                                    <input type="text" name="" id="ref" required="required">

                                                    <div class="lbg4">
                                                        <label>Ref No</label>
                                                    </div>
                                                </div>

                                                <div class="box col-12">
                                                    <input type="text" name=""  id="colour" required="required">

                                                    <div class="lbg4">
                                                        <label>Fabric Colour</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-6">

                                                <div class="box col-12">

                                                    <input type="text" name=""  id="fabQty" required="required">

                                                    <div class="lbg4">
                                                        <label>Fabric Qty</label>
                                                    </div>
                                                </div>

                                                <div class="box col-12">
                                                    <input type="text" name="" id="orderQty" required="required">

                                                    <div class="lbg4">
                                                        <label>Order Qty</label>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>





                                    </div>
                                    <div class="col-6 mt-3 ">


                                        <div class=" col-12 table mb-4" id="table_fab" style="top: -15px;  ">
                                            <div class="col-12 tableHead">
                                                <div class="row">
                                                    <div class="col-6 th text-center ">Refference</div>
                                                    <div class="col-6 th text-center"> Colour</div>

                                                </div>
                                            </div>




                                            <div class="col-12 tableRow" id="row" style="border-top: 1px solid white; color: white;">
                                                <div class="row">
                                                    <div class="col-12 tr1 ">No fabrics</div>



                                                </div>
                                            </div>



                                            





                                        </div>



                                    </div>

                                    <button class=" button col-12 mb-2" onclick="addFab(document.getElementById('style_num').value);">Add Fabrics</button>

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