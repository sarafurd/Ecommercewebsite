<?php

//die('got here');

include('config/database.php');

// include objects
include_once "objects/product.php";
include_once "objects/product_image.php";
include_once "objects/cart_item.php";

error_reporting(E_ALL);

// get database connection
$database = new Database();
$db = $database->getConnection();

// set page title

// page header html
$product_image = new ProductImage($db);
$cart_item = new CartItem($db);
$product = new Product($db);
$stmt = "";

if(isset($_POST["brand"]))
	{
    $brand = $_POST["brand"];
  	$brand_final = $brand;
    $stmt = $product->getComparableProducts($brand_final);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      //creating box
      echo "<div class='col-md-3 m-b-2 '>";

            // product id for javascript access

            echo "<div class='product-id display-none '>{$id}</div>";

            echo "<a href='product.php?id={$id}' class='product-link'>";
                // select and show first product image
                    echo "<div class='m-b-10px'>";
                      echo "<div class='text-center'>";
                      echo "<img src='imgs/loader.gif' id='loader' style= 'display:none;'>";
                        echo "<img src='uploads/images/{$image}' class='w-100-pct' />";
                    echo "</div>";


                // product name
                echo "<div class='product-name m-b-10px'>{$name}</div>";
            echo "</a>";

            // product price and category name
            echo "<div class='m-b-10px'>";
                echo "&#36;" . number_format($price, 2, '.', ',');
            echo "</div>";

            // add to cart button
            echo "<div class='m-b-10px'>";
                // cart item settings
                $cart_item->user_id=1; // we default to a user with ID "1" for now
                $cart_item->product_id=$id;

                // if product was already added in the cart
                if($cart_item->exists()){
                    echo "<a href='cart.php' class='btn btn-success w-1-pct'>";
                        echo "Update Cart";
                    echo "</a>";
                }
            echo "</div>";
    }


  }
//var_dump($_REQUEST);
	if(isset($_REQUEST["scent"]))
		{
			//echo '<div style="color:green;">green</div>'; die();
			//echo $_REQUEST["scent"]."** received2 **"; die();
			$scent = $_REQUEST["scent"];
			$scent_final = $scent;
			$stmt = $product->compareProductsByScent($scent_final);
			//var_dump($stmt);

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

	      		extract($row);

	      echo "<div class='text-center row m-b-2' >";

	            // product id for javascript access

	            echo "<div class='product-id display-none '>{$id}</div>";


	            echo "<a href='product.php?id={$id}' class='product-link'>";
	                // select and show first product image
	                      echo "<div class='text-center'>";
	                      echo "<img src='imgs/loader.gif' id='loader' style= 'display:none;'>";
	                        echo "<img src='uploads/images/{$image}' class='w-100-pct' />";
	                    echo "</div>"; //close text center


	                // product name
	                echo "<div class='product-name m-b-10px'>{$name}</div>";
	            echo "</a>";

	            // product price and category name
	            echo "<div class='m-b-10px'>";
	                echo "&#36;" . number_format($price, 2, '.', ',');
									echo "<br>Quantity in";
					echo '<br><a href="by_brand.php?brand='.urlencode($brand).'">'.htmlspecialchars($brand).'</a>';
	            echo "</div>";

	            // add to cart button
	            echo "<div class='m-b-10px'>";
	                // cart item settings
	                $cart_item->user_id=1; // we default to a user with ID "1" for now
	                $cart_item->product_id=$id;

	                // if product was already added in the cart
									if($cart_item->exists()){
											echo "<a href='cart.php' class='btn btn-success w-1-pct'>";
													echo "Update Cart";
											echo "</a>";
									}else{
											echo "<a href='add_to_cart.php?id={$id}' class='btn btn-primary w-1-pct text-center'>Add to Cart</a>";
									}
							echo "</div>";
	    }
      echo "</div>";

	  } //else echo 'Nope';

	echo "<div class='text-center'>
	  <a href='#top' style='font-size: 2rem;
		padding: 10px 10px 10px 0;
		color: blue;
		font-weight: 500;
		font-family: raleway;'>TOP</a></div>";

?>
