<?php
  // connect to database
  include 'server.php';
  include 'config/database.php';
  //Only including this to make it work, but if you're shoving all your tables database, disregard this one and reconfigure as needed.


  //I DON'T KNOW WHY THIS WORKS AND I DON'T CARE
  // IT'S THE LAST DAY
define('DB_SERVERS', 'localhost');
define('DB_USERNAMES', 'root');
define('DB_PASSWORDS', '');
define('DB_NAMES', 'accounts');

//connect to database
$testdb = mysqli_connect(DB_SERVERS, DB_USERNAMES, DB_PASSWORDS, DB_NAMES);

// Check connection
if($testdb === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

  // include objects
  include_once "objects/product.php";
  include_once "objects/product_image.php";
  include_once "objects/cart_item.php";

  // get database connection
  $database = new Database();
  $db = $database->getConnection();

  // initialize objects
  $product = new Product($db);
  $product_image = new ProductImage($db);
  $cart_item = new CartItem($db);

  // set page title
  $page_title="Checkout";

  // include page header html
  include 'layout_head.php';

  //testing out whether or not i can print something.
    $sql = "SELECT address, city, state, zip, flname, credit, expiration, secCode
    FROM users
    WHERE username = '" . $_SESSION['username'] . "'
    ";

  //  echo "username =".$_SESSION['username'];
    //Error, expects parameter 1 to be mysqli
    $testing = mysqli_query($testdb, $sql) or die("can't connect");

    //Expects 1 parameter, 0 given.
    if ($testing == false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }


  // $cart_count variable is initialized in navigation.php
  if($cart_count>0){

      $cart_item->user_id=1;
      $stmt=$cart_item->read();

      $total=0;
      $item_count=0;

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          extract($row);

          $sub_total=$price*$quantity;

          echo "<div class='cart-row'>";
              echo "<div class='col-md-8'>";

                  echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";
                  echo $quantity>1 ? "<div>{$quantity} items</div>" : "<div>{$quantity} item</div>";

              echo "</div>";

              echo "<div class='col-md-4'>";
                  echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>";
              echo "</div>";
          echo "</div>";

          $item_count += $quantity;
          $total+=$sub_total;
      }

      while($row = mysqli_fetch_assoc($testing)) {
        echo "<p>";
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
        echo "</p>";

      }
      echo "<div class='col-md-12 text-align-center'>";
          echo "<div class='cart-row'>";
              if($item_count>1){
                  echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
              }else{
                  echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
              }
              echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";

              echo "<a href='place_order.php' class='btn btn-lg btn-success m-b-10px'>";
                  echo "<span class='glyphicon glyphicon-shopping-cart'></span> Place Order";
              echo "</a>";
          echo "</div>";
      echo "</div>";

  }else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "No products found in your cart!";
        echo "</div>";
    echo "</div>";
  }

include 'layout_foot.php';
?>
