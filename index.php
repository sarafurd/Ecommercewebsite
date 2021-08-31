<?php

//Starting the session once again to start variable data
session_start();

//check to make sure the user is actually logged in.
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
            <title> Account </title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="stylesheet/mode.css" >
    </head>

    <body>
        <div class= "d-flex justify-content-center">
            <div class="header">

            </div>



            <div class = "container">
              <?php include "oasisgarden.php"; ?>
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="error success" >
                    <h3>
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <?php  if (isset($_SESSION['username'])) : ?>
                <p>
                    Welcome
                    <strong>
                        <?php echo $_SESSION['username']; ?>
                    </strong>
                </p>
                <p>
                    <a href="credit.php" style="color: blue;">
                        Click here to add credit card info <br>
                    </a>

                    <a href="address.php" style="color: blue;">
                        Click here to add shipping address <br>
                    </a>
                </p>
            <?php endif ?>

            </div>
        </div>

        <div class="wrapper" onclick="darkModeFunction()">
        <input type="checkbox" name="check" class="switch">
      </div>
      <!-- This is the dark mode toggle button -->

      <!-- this is the script tag for the toggle button -->
      <script type="text/javascript" src="main.js"></script>
      <script>
        // copy this js function into main.js
        function darkModeFunction() {
          var element = document.body;
          element.classList.toggle("dark-mode");
        }
      </script>

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

    </body>
</html>
