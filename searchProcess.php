<?php

// Assuming this is part of a larger file

// Correct the $_POST usage
$stNum = $_POST["stNum"];
if ($stNum == null) {
    echo ("Please Enter the Style Number");
} else {
?>
    <div class=" col-12 table" id="table">
        <div class="col-12 tableHead">
            <div class="row">
                <div class="col-3 th "> Style Number</div>
                <div class="col-3 th "> Factory</div>
                <div class="col-3 th "> Merchant</div>
                <div class="col-3 th "> Date</div>
            </div>
        </div>
        <?php
        require "connection.php";



        // Assuming Database::search returns a mysqli result set
        $rs = Database::search("SELECT * FROM `style` INNER JOIN `merchant` ON style.merchant_mid = merchant.mid WHERE `st_num` LIKE '%" . $stNum . "%'");

        // Check if there are rows
        if ($rs->num_rows > 0) {
            // Use a loop to fetch each row
            while ($data = $rs->fetch_assoc()) {
                // Output your HTML here for each row
        ?>
                <div class="col-12 tableRow" onclick="loadStyle();">
                    <div class="row">
                        <div class="col-3 tr "> <?php echo ($data["st_num"]) ?></div>
                        <div class="col-3 tr "> <?php echo ($data["factory"]) ?></div>
                        <div class="col-3 tr "> <?php echo ($data["fname"]) ?></div>
                        <div class="col-3 tr "> <?php echo ($data["date_time"]) ?></div>
                    </div>
                </div>
    </div>
<?php
            }
        } else {
            // Handle the case where no results are found
            echo "No results found.";
        }

        // Close the result set
        $rs->close();
    }
?>