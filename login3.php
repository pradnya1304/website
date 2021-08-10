<?php
$host="localhost";
$user="root";
$password="";
$db="demo";


$conn = mysqli_connect($host,$user,$password);
$db = mysqli_select_db($conn, "demo");

if (isset($_POST['submit'])){
	if(!empty($_POST['CreateUsername']) && !empty($_POST['CreateEmail']) && !empty($_POST['CreatePassword']) )
	{
		$name=$_POST['CreateUsername'];
		$email=$_POST['CreateEmail'];
		$password=$_POST['CreatePassword'];
	    $conn=mysqli_connect('localhost','root','') or die(mysqli_error());  //PDO, mysql, mysqli
	    mysqli_select_db($conn,'demo') or die("cannot select DB");  
	    
	    $query=mysqli_query($conn,"SELECT * FROM loginform WHERE email='".$email."'");  
	    $numrows=mysqli_num_rows($query); 
        
		if($numrows==0)  
	    {  
	    $sql="INSERT INTO loginform (name,email,password) VALUES('$name','$email', '$password')";  
	  
	    $result=mysqli_query($conn ,$sql);  
	        if($result){  
			    header('Location: login3.php');  
			    } 
			else {  
			    echo "Failure!";  
			    }  
			  
	} 
    else {  
	    echo "That username already exists! Please try again with another.";  
	    }
}
else {  
    echo "All fields are required!";  
	}

}

if(isset($_POST['submit'])){

	$email2=$_POST['email'];
	$password=$_POST['password'];

	$sql= mysqli_query($conn, "SELECT * FROM loginform WHERE email='".$email2."' AND password='".$password."'limit 1");

	$result=mysqli_num_rows($sql);

	if($result==1){
		header('Location: index.html');
	}
	else{
		echo" you have entered incorrect password";
		exit();
	}
}


?>







<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="login.css">
	<h2></h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form  method="POST" action="#">
			<h1>Create Account</h1>
			
			<span>or use your email for registration</span>
			<input type="text" name="CreateUsername" placeholder="Name" />
			<input type="email" name="CreateEmail" placeholder="Email" />
			<input type="password" name="CreatePassword" placeholder="Password" />
			<button type="submit" name="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="POST" action="#">
			<h1>Sign in</h1>
			
			<span>or use your account</span>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<button type="submit" name="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>

</footer>
</head>
<script src="main.js"></script>
<body>

</body>
</html>