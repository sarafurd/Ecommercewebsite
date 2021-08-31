<?php
    include 'server.php';

//Setting up credit card info for the user
//Need to find a way to only show the last 4 digits of the credit card
//probably strlen or something
//that'll happen in server.php though
?>

<!DOCTYPE html>
<html>
     <!-- UTF-8 is the standard for most websites so using it here as well -->
     <meta charset="UTF-8">
    <title>CRC</title>
    <!-- Using bootstrap to make my life easier -->
    <!-- because life is easier when someone reinvents the wheel for you -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        body{ font: 14px Arial; }
        .wrapper{ width: 325px; padding: 25px; }
    </style>

    <body>
        <div class = "d-flex justify-content-center">
            <div class = "wrapper">
                <form method = "POST" action = "credit.php">
                    <?php include 'error.php'; ?>

                    <!-- Full name -->
                    <div class = "mb-3">
                        <label>Full Name</label>
                        <input type = "text" name = "name"
                        class = "form-control">
                    </div>

                    <!-- Credit card number -->
                    <div class = "mb-3">
                        <label> Credit Card Number </label>
                        <input type = "text" name = "crc"
                        class = "form-control">
                    </div>

                    <!-- expiration date -->
                    <div class = "mb-3">
                        <label> Expiration Date </label>
                        <input type = "text" name = "expireDate"
                        class = "form-control">
                    </div>

                    <!-- security code -->
                    <div class = "mb-3">
                        <label> Security Code </label>
                        <input type = "text" name = "srcCode"
                        class = "form-control">
                    </div>

                    <div class="mb-3">
                    <input type="submit" class = "btn btn-primary" value="Save"
                    name="credit_user">
                    </div>

                </form>
            </div>
        </div>
          <footer>
                <div class="column" align="center">
                    <a href="https://www.facebook.com/OasisFullertonStore">
                        <img src="imgs/facebook.png" alt="facebook" >
                    </a>
                    <a href="https://www.instagram.com/oasisestore/">
                    <img src="imgs/instagram.png" alt="instagram" >
                    </a>
                    <a href="https://twitter.com/oasisstore2">
                    <img src="imgs/twitter.png" alt="twitter" >
                    </a>
            </div>
          </footer>

</html>
