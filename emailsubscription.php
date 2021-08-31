
<!DOCTYPE html>
<html>
<head>
  <title>Become A Subscriber</title>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script type = "text/javascript" src = "js/toggleSidebar.js"></script>
  <link rel="stylesheet" href="stylesheet/sidebar.css" media = "screen" type = "text/css"/>
</head>
<body>
  <header>
      <div class="main">
          <div class="logo">
              <img src="imgs/logo.jpg">
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
  </header>
  <div class="wrapper">
    <div class="icon"><i class="far fa-envelope"></i></div>
  </div>
  <div class="content">
    <header>Become a Subscriber</header>
    <p>Subscribe with your email and get the latest updates on news in addition
      to promotional deals and coupons on all products.</p>
  </div>
  <form action="emailsubscription.php" method="POST">
    <?php
    $userEmail = ""; //set the empty string
    if(isset($_POST['subscribe'])) {
      $userEmail = $_POST['email'];
      if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $subject = "Thanks for subscribing!";
        $message = "Thanks for subscribing to our website. You will always receive latest updates and promotions. We do not share or sell your information.";
        $sender = "From: test@gmail.com";
        if(mail($userEmail, $subject, $message, $sender)) {
          ?>
          <div class="alert success">Thanks for subscribing!</div>
          <?php
          $userEmail = "";
        } else {
          ?>
          <div class="alert error">Failed while sending your email!</div>
          <?php
        }
      } else {
        ?>
        <div class="alert error"><?php echo $userEmail?>is not a valid email!</div>
        <?php
      }
    }
    ?>
    <div class="field">
      <input type="text" name="email" placeholder="Email Address" required value="<?php echo $userEmail?>">
    </div>
    <div class ="field btn">
      <input type="submit" name="subscribe" value="Subscribe">
    </div>
  </form>
  <div class="text">We do not share your information</div>
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


<!--hope this works-->
<!--lololol-->
<!--more comments-->
