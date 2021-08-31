<?php
SESSION_START();
include('chatbox-header.php');
$loginError = '';
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
	include ('chatbox-chat.php');
	$chat = new Chat();
	$user = $chat->loginUsers($_POST['username'], $_POST['pwd']);
	if(!empty($user)) {
		$_SESSION['username'] = $user[0]['username'];
		$_SESSION['userid'] = $user[0]['userid'];
		$chat->updateUserOnline($user[0]['userid'], 1);
		$lastInsertId = $chat->insertUserLoginDetails($user[0]['userid']);
		$_SESSION['login_details_id'] = $lastInsertId;
		header("Location:chatbox-index.php");
	} else {
		$loginError = "Invalid username or password!";
	}
}
?>
<?php include('chatbox-container.php');?>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<h4>Chat Login:</h4>
			<form method="post">
				<div class="form-group">
				<?php if ($loginError ) { ?>
					<div class="alert alert-warning"><?php echo $loginError; ?></div>
				<?php } ?>
				</div>
				<div class="form-group">
					<label for="username">User:</label>
					<input type="username" class="form-control" name="username" required>
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" name="pwd" required>
				</div>
				<button type="submit" name="login" class="btn btn-info">Login</button>
			</form>
			<br>
			<p><b>User</b> : adam<br><b>Password</b> : 123</p>
			<p><b>User</b> : rose<br><b>Password</b> : 123</p>
			<p><b>User</b> : smith<br><b>Password</b>: 123</p>
			<p><b>User</b> : merry<br><b>Password</b>: 123</p>
		</div>

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
<?php include('chatbox-footer.php');?>
