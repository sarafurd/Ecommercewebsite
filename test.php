<?php
include 'server.php';
?>

<?php
//testing out whether or not i can print something.
$sql = "SELECT address, city, state, zip, flname, credit, expiration, secCode
        FROM users
        WHERE username = '" . $_SESSION['username'] . "'
        ";

$testing = mysqli_query($db, $sql);

if (! $testing) {
    die('Could not grab data: ' . mysqli_error());
}

while($row = mysqli_fetch_assoc($testing)) {
    echo "SHIPPING ADDRESS <br>";
    echo "Address: " . $row["address"];
    echo "<br>";
    echo "City: " . $row["city"];
    echo "<br>";
    echo "State: " . $row["state"];
    echo "<br>";
    echo "Zip: " . $row["zip"];
    echo "<br> <br>";
    echo "Credit Card <br>";
    echo "Name: " . $row["flname"];
    echo "<br>";
    echo "Credit Card: " . substr($row["credit"], -4);
    echo "<br>";
    echo "Expiration: " . $row["expiration"];
    echo "<br>";
    echo "Security Code: ". $row["secCode"];


};

?>
