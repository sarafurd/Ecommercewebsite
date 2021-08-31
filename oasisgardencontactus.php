<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <script type = "text/javascript" src = "js/toggleSidebar.js"></script>
    <link rel="stylesheet" href="stylesheet/sidebar.css" media = "screen" type = "text/css"/>
</head>
<body>
    <header>
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
    </header>
    <div class="Photo">
        <div class="container">
            <form method = "POST" name = "contactform" form action="contact-form-handler.php">
                <p>
                <label for="username">Username:</label> <br>
                <input type="text" id="fname" name="name" placeholder="Name or Username" />
                </p>
<!--
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Last Name" />
-->
                <p>
                <label for="email">Email:</label> <br>
                <input type="text" id="email" name="email" placeholder="Email" />
                </p>
                <p>
                <label for="subject">Subject:</label> <br>
                <textarea id="subject" name="subject" placeholder="Comment" style="height:200px"></textarea>
                </p>
                <input type="submit" value="Submit" />
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
<!--yeet-->
