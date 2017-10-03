<!DOCTYPE HTML>

<?php

    // Start the session
    session_start();

	 
	if (isset($_SESSION['loginCount']))
	{
	   $_SESSION['loginCount']++;
	   if ($_SESSION['loginCount'] ==15)
	   {
	     echo 'Bog Off!';
	     exit;
	   }
	} else {
	   $_SESSION['loginCount'] =0 ;
		
	}


    // Defines username and password. Retrieve however you like,
    $username = array("user","hassan");
    $password = array("password","ali");

    // Error message
    $error = "";

    // Checks to see if the user is already logged in. If so, refirect to correct page.
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        $error = "success";
        header('Location: success.php');
    } 
        
    // Checks to see if the username and password have been entered.
    // If so and are equal to the username and password defined above, log them in.
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] == $username[0] && $_POST['password'] == $password[0]) {
            $_SESSION['loggedIn'] = true;
            header('Location: success.php');
        } 
		else if($_POST['username'] == $username[1] && $_POST['password'] == $password[1]) {
	            $_SESSION['loggedIn'] = true;
	            header('Location: success.php');
		}else {
            $_SESSION['loggedIn'] = false;
            $error = "Invalid username and password!";
			echo" the number is ",$_SESSION['loginCount'];
			//echo date('Y m d H:i:s', $_SESSION[time()]);
			

        }
    }
?>

<html>
    <head>
        <title>Login Page</title>
    </head>
    
    <body>
        <!-- Output error message if any -->
        <?php echo $error; ?>
        
        <!-- form for login -->
        <form method="post" action="index.php">
            <label for="username">Username:</label><br/>
            <input type="text" name="username" id="username"><br/>
            <label for="password">Password:</label><br/>
            <input type="password" name="password" id="password"><br/>
            <input type="submit" value="Log In!">
        </form>
    </body>
</html>