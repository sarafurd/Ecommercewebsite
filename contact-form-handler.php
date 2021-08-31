<?php
//connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_contact";

//CONNECT TO DATABASE
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}

//Variables from contact.php
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$subject = $_REQUEST['subject'];

//Setting up Variable for inserting
$sql = "INSERT INTO users VALUES ('$name', '$email', '$subject')";

    //INSERTS OR DIE
    if(mysqli_query($conn, $sql))
    {
        echo "Success! ";
    } else {
        echo "Error: Please Try Again";
    }

    //close connection
    mysqli_close($conn);

    //Goes to thank you.html
    header('Location: contact-form-thank-you.html');

?>



<!--
/* prototype php code
    $emailAddress = $_POST['emailAddress'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $yourStory= $_POST['yourStory'];
    echo "<h3>Welcome to our mailing list $firstName, we will email you at $emailAddress</h3>";
    include_once('./config/database.php');
    $db = new Database();
    $conn = $db->getConnection ();
    $insert = "INSERT INTO your_story (first_name, last_name, email_address, your_story, inserted_date)
    VALUES (?,?,?,?, SYSDATE())";
    $stmt=$conn->prepare($insert);
    $stmt->bindParam(1, $firstName, PDO::PARAM_STR);
    $stmt->bindParam(2, $lastName, PDO::PARAM_STR);
    $stmt->bindParam(3, $emailAddress, PDO::PARAM_STR);
    $stmt->bindParam(4, $yourStory, PDO::PARAM_STR);
    $stmt->execute();
    echo $insert;
    //declare variables
$errors = '';
$name = $_POST['name'];
$email_address = $_POST['email'];
$messages = $_POST['subject'];
$message = wordwrap($messages, 70);
//check for errors within the fields (only basic checking gotta work on improving security second sprint)
//If any of the fields are empty, Send out an error
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']))
    {
        $errors .= "\n Error: All fields are required to have text in them \n";
    }
//Check to see if email is valid
//preg_match() is a case-insenstive search to match any of the characters found here in a string for email addresses
if (!preg_match ("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_address))
{
    $errors .= "\n Error: Invalid Email Address";
}
//if there are no errors, then set up the information and send it out to the dev
if ( empty($errors))
{
    //populate email
    //"Essential Oil Customer Support email from: $name"
    $to = 'KevinN4065@gmail.com';
    $email_subject = 'Testing sendmail.exe';
    $email_body = 'You have received a new message from a customer. '. " Details from user: \n Name: $name \n Email: $email_address \n Message \n $message";
    $headers = 'From: Lumirakun@gmail.com';

    //send
    //Currently doesnt send an email for some reason so gotta figure that out
    if(mail($to, $email_subject, $email_body, $headers))
    {
        echo "Your mail is sent successfully.";
    }
    else
    {
        echo "Your mail is not sent. Try Again.";
    }

    //redirect to a success confirmation page and tell the user we'll get to you shortly if there are no errors
    //header('Location: contact-form-thank-you.html');
}
?>
-->

</body>
</html>
