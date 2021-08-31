<?php
session_start();
include('chatbox-header.php');
?>

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<script type = "text/javascript" src = "js/toggleSidebar.js"></script>
<link rel="stylesheet" href="stylesheet/sidebar.css" media = "screen" type = "text/css"/>
<link href="stylesheet/chatbox-style.css" rel="stylesheet" id="bootstrap-css">
<script src="js/chatbox-chat-js.js"></script>
<style>
.modal-dialog {
    width: 400px;
    margin: 30px auto;
}
</style>
<?php include('chatbox-container.php');?>
<div class="container">
	<br>
	<?php if(isset($_SESSION['userid']) && $_SESSION['userid']) { ?>
		<div class="chat">
			<div id="frame">
				<div id="sidepanel">
					<div id="profile">
					<?php
					include ('chatbox-chat.php');
					$chat = new Chat();
					$loggedUser = $chat->getUserDetails($_SESSION['userid']);
					echo '<div class="wrap">';
					$currentSession = '';
					foreach ($loggedUser as $user) {
						$currentSession = $user['current_session'];
						echo '<img id="profile-img" src="userpics/'.$user['avatar'].'" class="online" alt="" />';
						echo  '<p>'.$user['username'].'</p>';
							echo '<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>';
							echo '<div id="status-options">';
							echo '<ul>';
								echo '<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>';
								echo '<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>';
								echo '<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>';
								echo '<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>';
							echo '</ul>';
							echo '</div>';
							echo '<div id="expanded">';
							echo '<a href="chatbox-logout.php">Logout</a>';
							echo '</div>';
					}
					echo '</div>';
					?>
					</div>
					<div id="search">
						<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
						<input type="text" placeholder="Search contacts..." />
					</div>
					<div id="contacts">
					<?php
					echo '<ul>';
					$chatUsers = $chat->chatUsers($_SESSION['userid']);
					foreach ($chatUsers as $user) {
						$status = 'offline';
						if($user['online']) {
							$status = 'online';
						}
						$activeUser = '';
						if($user['userid'] == $currentSession) {
							$activeUser = "active";
						}
						echo '<li id="'.$user['userid'].'" class="contact '.$activeUser.'" data-touserid="'.$user['userid'].'" data-tousername="'.$user['username'].'">';
						echo '<div class="wrap">';
						echo '<span id="status_'.$user['userid'].'" class="contact-status '.$status.'"></span>';
						echo '<img src="userpics/'.$user['avatar'].'" alt="" />';
						echo '<div class="meta">';
						echo '<p class="name">'.$user['username'].'<span id="unread_'.$user['userid'].'" class="unread">'.$chat->getUnreadMessageCount($user['userid'], $_SESSION['userid']).'</span></p>';
						echo '<p class="preview"><span id="isTyping_'.$user['userid'].'" class="isTyping"></span></p>';
						echo '</div>';
						echo '</div>';
						echo '</li>';
					}
					echo '</ul>';
					?>
					</div>
					<div id="bottom-bar">
						<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
						<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
					</div>
				</div>
				<div class="content" id="content">
					<div class="contact-profile" id="userSection">
					<?php
					$userDetails = $chat->getUserDetails($currentSession);
					foreach ($userDetails as $user) {
						echo '<img src="userpics/'.$user['avatar'].'" alt="" />';
							echo '<p>'.$user['username'].'</p>';
							echo '<div class="social-media">';
								echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
								echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
								 echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
							echo '</div>';
					}
					?>
					</div>
					<div class="messages" id="conversation">
					<?php
					echo $chat->getUserChat($_SESSION['userid'], $currentSession);
					?>
					</div>
					<div class="message-input" id="replySection">
						<div class="message-input" id="replyContainer">
							<div class="wrap">
								<input type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="Write your message..." />
								<button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } else { ?>
    <div class="main">
        <div class="logo">
            <img src="imgs/logo.jpg" style="align:center" />
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
		<br>
		<br>
		<strong><a href="chatbox-login.php"><h3>Login To Access Chat System</h3></a></strong>
    <header>

	<?php } ?>
	<br>
	<br>
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

<?php include('chatbox-footer.php');?>
