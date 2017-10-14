<?php

try {
   $conn = new PDO('mysql:127.0.0.1;=$servername;dbname=cosc', 'root', '');
   if(isset($_POST['save'])){
   $name=$_POST['username'];
   $email=$_POST['email'];
   $pass1=$_POST['password'];
   $hash=password_hash($pass1,PASSWORD_DEFAULT);
   $insert=$conn->prepare("INSERT INTO users(username, password, email)
               values(:username,:password,:email)");
   $insert->bindParam('username',$name);
   $insert->bindParam('email',$email);
   $insert->bindParam('password',$pass1);
   $insert->execute();
   header("location:index.php");

   }

   }
catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }
   $conn = null;
?>

<html>
    <head>
        <title>Login Page</title>
    </head>
    
    <body>
        <!-- Output error message if any -->
        
        
        <!-- form for login -->
        <form method="post" action="registration.php">
           <label for="email">Email:</label><br/>
			<input type="text" name="email"><br/>
			 <label for="username">Username:</label><br/>
            <input type="text" name="username"><br/>
            <label for="password">Password:</label><br/>
            <input type="password" name="password"><br/>
            <input type="submit" name="save" >
		
        </form>
    </body>
</html>