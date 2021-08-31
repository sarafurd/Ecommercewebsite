
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
<link rel="stylesheet" href="stylesheet/sidebar.css" media = "screen" type = "text/css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type = "text/javascript" src = "js/toggleSidebar.js"></script>
<header>
  <a href="#"></a>
  <div class="main">
      <div class="logo">
          <img src="imgs/logo.jpg" />
      </div>
      <div id="sidebar">
          <div class="toggle-btn" onclick="toggleSidebar(this)">
              <span></span>
              <span></span>
              <span></span>
          </div>
          <div class="list">
            <div class="item"><li><a href = "oasisgardenreviews.php">Reviews</a></li></div>
            <div class="item"><li><a href = "oasisgardenaboutus.php">About Us</a></li></div>
            <div class="item"><li><a href = "filter.php">Store</a></li></div>
            <div class="item"><li><a href = "oasisgardencontactus.php">Contact Us</a></li></div>
            <div class="item"><li><a href = "emailsubscription.php">Subscribe</a></li></div>
            <div class="item"><li><a href = "chatbox-index.php">Chat box</a></li></div>
            <div class="item"><li><a href = "logout.php">Log out</a></li></div>
          </div>
      </div>
  </div>


      <li <?php echo $page_title=="Cart" ? "class='active'" : ""; ?> >
          <a href="cart.php">
            <?php
                    //count the products in the Cart
                    $cart_item = new CartItem($db);
                    $cart_item->user_id=1; //default to user iwth ID "1" for now
                    $cart_count = $cart_item->count();
                ?>
                Cart <span class="badge" id="comparison-count"><?php echo $cart_count ?></span>
          </a>
      </li>




<!-- /navbar -->
