<?php 
session_start();
?>
<div class="nav-bar">

<nav>
	<a class="home-btn nav-text" href="..\php\homepage.php">Home</a>
	<a class="settings-btn nav-text" href="#settings">Settings</a>
	<a class="login-btn nav-text" href="..\php\signup.php">Sign Up</a>

	<?php
		if(isset($_SESSION["useruid"])){
			echo "<a class='nav-text' 'href='profile.php'> Profile Page </a>";
			echo "<a class='nav-text' href='..\includes\logout.inc.php'> Log Out </a>";
		}
		else {
			echo "<a class='nav-text' href='signup.php'> Sign Up </a>";
			echo "<a class='nav-text' href='login.php'> Log In </a>";
		}
	?>
</nav>
</div>




