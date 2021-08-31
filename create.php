<?php
// Include config file
require_once "config.php";

// Creating variables for creating the account
$username = "";
$password = "";
$passwordRepeat = "";
$error = "";
$passError = "";
$passReError = "";

// Processing the form data
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check the username
    if(empty(trim($_POST["username"]))){
        $error = "Please enter a username.";
    } else{
        // Check the database to see if any usernames are taken
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // bind the parameters to the variables
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Execute the statement and if it fails return an error
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                //If there's a matching username return with a notification saying it's taken otherwise plug the user input into the username
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $error = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Something went wrong! Try again later! ";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Check Password
    if(empty(trim($_POST["password"]))){
        $passError = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 9){
        $passError = "Password must have atleast 9 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Check confirm password and see if it matches with the original password.
    if(empty(trim($_POST["passwordRepeat"]))){
        $passReError = "Please confirm password.";
    } else{
        $passwordRepeat = trim($_POST["passwordRepeat"]);
        if(empty($passError) && ($password != $passwordRepeat)){
            $passReError = "Password did not match.";
        }
    }

    // Check for the errors and if they're empty go ahead with the account creation.
    if(empty($error) && empty($passError) && empty($passReError)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters and make a hash for the password (probably not the best way but we're not deploying this so it's fine)
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            // Execute the statement
            if(mysqli_stmt_execute($stmt)){
                // If things go well then take the user to login page.
                header("location: login.php");
            } else{
                // If it didn't then just shoot ourselves in the head
                echo "Welp something went wrong, try again later.  Maybe it'll work.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- html5 standard: UTF-8 -->
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <!-- using bootstrap to make life easier -->
    <!-- using bootstrap 5.0.0 beta3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        body{ font: 14px Arial; }
        .wrapper{ width: 325px; padding: 25px; }
    </style>
</head>
<body>
    <div class="wrapper">
    <img src="imgs/logo.jpg">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <!-- With each field, check if value is invalid and if it is echo the error -->
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control
                <?php echo (!empty($error)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $error; ?></span>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control
                <?php echo (!empty($passError)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $passError; ?></span>
            </div>
            <div id="passwordHelpBlock" class="form-text">
              Your password must be at least 9 characters and must not contain spaces.
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="passwordRepeat" class="form-control
                <?php echo (!empty($passReError)) ? 'is-invalid' : ''; ?>" value="<?php echo $passwordRepeat; ?>">
                <span class="invalid-feedback"><?php echo $passReError; ?></span>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Clear">
            </div>

            <p>Have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>

    <footer>
        <div class="row">

            <div class="column">
                <a href="https://www.facebook.com/OasisFullertonStore">
                    <img src="imgs/facebook.png" alt="facebook" >
                </a>
            </div>
            <div class="column">
                <a href="https://www.instagram.com/oasisestore/">
                    <img src="imgs/instagram.png" alt="instagram" >
                </a>
            </div>
            <div class="column">
                <a href="https://twitter.com/oasisstore2">
                    <img src="imgs/twitter.png" alt="twitter" >
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
