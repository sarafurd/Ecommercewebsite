<?php
//starting session, necessary for session variables
session_start();
?>

<?php
//Server.php will handle the back end stuff so if you ever have code you need to add to do crap
//put it here

//including config file for connecting to database
require_once "config.php";

//declaring error array
//if you suck at logging in, errors suck
$errors = array();
$_SESSION['success'] = "";

//registration code
if (isset($_POST['reg_user'])) {

    //receive the values entered and store into database
    //doing data sanitization to prevent SQL injections
    //Prepared statements are suffering
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    //Making sure that the fields aren't blank
    if(empty(trim($username))) {
        array_push($errors, "Username is required");
    }

    if(empty(trim($email))) {
        array_push($errors, "Password is required");
    }

    if(empty(trim($password_1))) {
        array_push($errors, "Password is required");
    }

    //check for any matches in the user database when registering (looking for emails).
    //if match then return an error saying there's a match and need a different username.
    $matching = "SELECT * FROM users
    WHERE email = '$email'
    OR username = '$username'
    ";

    $result = mysqli_query($db, $matching);
    if(!$result) {
        echo mysqli_error($db);
    }

    if (mysqli_num_rows($result) == 1) {
        array_push($errors, "email or username is taken, please use another");
    }


    //check to make sure passwords match
    if($password_1 != $password_2) {
        array_push($errors, "Passwords do not match, try again");
    }

    //make sure password is at least 7 characters
    //SHORT PASSWORDS ARE A CRIME PEOPLE
    if(strlen(trim($_POST['password_1'])) < 7) {
        array_push($errors, "Password must be at least 7 characters");
    }

    //if no errors, then register the user
    if (empty($errors)) {

        //encrypt password
        //md5 is a shit password encryption but we're not deploying so it's fine
        $password = md5($password_1);

        //insert data into table
        $query = "INSERT INTO users (username, email, password)
         VALUES('$username', '$email', '$password')";

        mysqli_query($db, $query);

        //storing username of the logged in user to a session variable
        $_SESSION['username'] = $username;

        //welcome message
        $_SESSION['success'] = "You're logged in";

        $_SESSION['user_id'] = mysqli_insert_id($db);

        //Redirect to index.php
        header('location:login.php');
    }
}

//User Login Handler
if (isset($_POST['login_user'])) {

    //More data sanitization to prevent sql injection again
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //Error messages for blank field
    if(empty(trim($username))) {
        array_push($errors, "Username is required");
    }

    if(empty(trim($password))) {
        array_push($errors, "Password is required");
    }

    //checking for errors
    if(empty($errors)) {

        //match passwords
        $password = md5($password);

        //Look through
        $query = "SELECT * FROM users WHERE username = '$username'
        AND password = '$password'";

        $results = mysqli_query($db, $query);

        //check through database for any matches
        if (mysqli_num_rows($results) == 1) {

            //storing username in session variable
            $_SESSION['username'] = $username;

            //welcome message
            $_SESSION['success'] = "You're logged in";

            //redirect user to index.php because fuck the home page
            header('location: index.php');
        } else {
            //SHIT ERRORS
            array_push($errors, "username or password incorrect");
        }
    }
}


//Credit Card Info Handler
if (isset($_POST['credit_user'])) {

    //Data santization
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $crc = mysqli_real_escape_string($db, $_POST['crc']);
    $expire = mysqli_real_escape_string($db, $_POST['expireDate']);
    $src = mysqli_real_escape_string($db, $_POST['srcCode']);


    //Error message for any empty field
    if(empty(trim($name)) || empty(trim($crc)) || empty(trim($expire)) || empty(trim($src))) {
        array_push($errors, "All fields must be filled in");
    }

    //CRC must be 12 characters
    //Push an error if so
    if(strlen(trim($_POST['crc'])) == 12) {
        array_push($errors, "Invalid Credit Card, Try again");
    }


    //If errors are clear then insert
    if(empty($errors)) {

        $query = "UPDATE users
        SET flname = '$name', credit = '$crc', expiration = '$expire', secCode = '$src'
        WHERE username = '" . $_SESSION['username']. "'
        ";

        $result = mysqli_query($db, $query);
        if(!$result) {
            print mysqli_error($db);
            die();
        }

        //take user back to account
        header('location: index.php');
    }
}

//Address Info Handler
if (isset($_POST['address_user'])) {

    //Data sanization
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $zip = mysqli_real_escape_string($db, $_POST['zip']);

    //Empty fields (except for optional)
    if (empty(trim($address)) || empty(trim($city)) || empty(trim($state)) ||
    empty(trim($zip))) {
        array_push($errors, "All fields must be filled in");
    }

    if (!is_numeric($_POST['zip'])) {
        array_push($errors, "Zip should be numbers only");
    }

    //If there is no errors, then go ahead in the insertion
    if(empty($errors)) {

        //prepare for insertion
        $query = "UPDATE users
        SET address = '$address', city = '$city', state = '$state', zip = '$zip'
        WHERE username = '" . $_SESSION['username'] . "'
        ";


        mysqli_query($db, $query);

        header('location: index.php');
    }
}
?>
