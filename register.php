<?php
include 'server.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- UTF-8 is the standard for most websites so using it here as well -->
    <meta charset="UTF-8">
    <title>Register</title>
    <!-- Using bootstrap to make my life easier -->
    <!-- because life is easier when someone reinvents the wheel for you -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        body{ font: 14px Arial; }
        .wrapper{ width: 325px; padding: 25px; }
    </style>
</head>

<body>
    <div class ="d-flex justify-content-center">
        <div class = "wrapper">
            <img src="imgs/logo.jpg" alt="..." class="img-thumbnail">

            <form method = "post" action = "register.php">
                <?php include 'error.php'; ?>

                <div class="mb-3">
                    <label>Username </label>
                    <input type = "text" name = "username"
                        class = "form-control">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email"
                    class = "form-control">
                </div>

                <div class = "mb-3">
                    <label>Password</label>
                    <input type="password" name="password_1"
                    class = "form-control">
                </div>

                <div class = "mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password_2"
                    class = "form-control">
                </div>

                <div class = "mb-3">
                    <input type = "submit" class="btn btn-primary"
                    value = "Register"
                    name = "reg_user">
                    </input>
                </div>

                <p>
                    Have an account?
                    <a href = "login.php">
                        Login here!
                    </a>
                </p>
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
</body>
</html>
