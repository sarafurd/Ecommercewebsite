<?php
    include 'server.php';
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

                    <!-- Address -->
                    <div class = "mb-3">
                        <label> Home Address </label>
                        <input type = "text" name = "address"
                        class = "form-control">
                    </div>

                    <!-- City -->
                    <div class = "mb-3">
                        <label> City </label>
                        <input type = "text" name = "city"
                        class = "form-control">
                    </div>

                    <!-- State -->
                    <div class = "mb-3">
                        <label> State </label>
                        <input type = "text" name = "state"
                        class = "form-control">
                    </div>

                    <!-- ZIP Code -->
                    <div class = "mb-3">
                        <label> Zip </label>
                        <input type = "text" name = "zip"
                        class = "form-control">
                    </div>

                    <div class="mb-3">
                        <input type="submit" class = "btn btn-primary" value="Save"
                        name="address_user">
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
