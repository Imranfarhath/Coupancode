<?php 
include("config.php");
if (isset($_POST['reg']))
	{
	  $uname = $_POST['email'];
	  $pass = $_POST['pass'];
      echo($pass);
	$query="INSERT INTO login (email,password) VALUES ('$uname', '$pass')";

			  
		if ($db->query($query) === TRUE) 
			{	
		echo "<script>alert('Registration Successful');window.location.href='index.html';</script>";
			}
	
	    else 
			{
			echo "<script>alert('Already Registered');window.location.href='register.php';</script>";
			  
			}
	}
	  
?>


<html dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-dark text-light" style="text-align: center;padding-top: 1%; padding-bottom: 1%;">
        <h1>Voucher Verse</h1>
    </div>
    <div class="container col-sm-4 col-lg-3 col-xs-4" style="padding-top: 10%;">
        <form class="form col-xs-1" method="POST" action="#" name="reg" style="border: 2px solid ;padding: 8%;border-radius: 5%;">
            <h1 style="text-align: center;">Register</h1>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
            <br>
            <label for="pass">Password</label>
            <br>
            <input type="password" name="pass" id="pass" class="form-control">
            <button type="submit" class="btn btn-success" name="reg" style="margin-top: 10%;margin-left: 33%">SUBMIT</button>
            </div>
        </form>
        <br>
        <span style="margin-left: 42%;">Already have an account
            <span><a href="login.html">sign in</a></span></span>
</body>
</html>