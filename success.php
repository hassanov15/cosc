<?php
    // Start the session
    //ob_start();
    session_start();

    // Check to see if actually logged in. If not, redirect to login page
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header("Location: index.php");
	
	
    }else{
		echo "Today is " . date("Y/m/d") . "<br>";
			echo "Welcome". $_SESSION['username'];
			echo"<br>";
		
	
}
?>

<h1>hello user UR Logged In!</h1>
<form method="post" action="logout.php">
    <input type="submit" value="Logout">
</form>