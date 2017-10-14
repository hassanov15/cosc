<!DOCTYPE HTML>

<?php

    //Start the session
    session_start();

	if(isset($_POST['attempts'])){
	
		$_SESSION['attempts'] = $_SESSION['attempts'];
		echo "attempts". $_SESSION['attempts'];
	}

	 
	if (isset($_SESSION['loginCount']))
	{
	   $_SESSION['loginCount']++;
	   if ($_SESSION['loginCount'] == 100)
	   {
		if($_SESSION['loggedIn']== false){
		echo 'too many attempts!'.$_SESSION['loginCount'];
	       exit;
		}
	   }
	} else {
	   			$_SESSION['loginCount'] = 0 ;
		
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
			echo" attempts are: ". $_SESSION['loginCount'];
		//	echo date('Y m d H:i:s', $_SESSION[time()]);
			

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
            <input type="submit" name="login " value="Log In!">
			
		
        </form>
    </body>
<form action="registration.php">
			<input type= "submit" name="Sign-Up" value="Sign-Up">
			</form>
			<input type= "submit" name="attempts" value="attempts">
</html>

<?php

try {
    $db = new PDO('mysql:127.0.0.1;=$servername;dbname=cosc', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['submit'])){
      $username=$_POST['username'];
      $password=$_POST['password'];
if(empty($username) || empty($password)){
echo "<p><a href= 'index.php'> TRY AGAIN</a>”;

}else{
        $query= "SELECT * FROM users WHERE username=:username AND password=:password";
        $statement=$db->prepare($query);
        $statement->execute(array(
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ));
        $count=$statement->rowCount();
        if($count>0){
            $_SESSION['username']=$_POST['username'];
            $_SESSION['is authenticated']= true;
            header("location:success.php”);
}
    
    }
    
    }
catch(PDOException $e)
    {
    $message = $e->getMessage();
    }
    //$db = null;
    if(isset( $_POST['attempts'])){
     echo "attempts are ".$_SESSION['attempts'];
     echo "<p><a href= 'index.php'> HOME PAGE</a>"; 
}
?>