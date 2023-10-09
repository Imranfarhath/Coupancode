<html>
<head>
  <script src="jquery-3.3.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
</head>
</html>

<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "SELECT * FROM login WHERE email = '$myusername' and password = '$mypassword'";// faculty id pass
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	  
		
      if($count == 1) {
        // session_register("myusername");
		 $_SESSION['loggedin'] = TRUE;
         $_SESSION['login_user'] = $myusername;
         
		 if($myusername=="hr")
		 {
		?>
		<script>
		
		swal.fire({
				icon: 'success',
                title: 'Success',
                text: 'Login Successful'
}).then(function() {
    window.location = "hr";
});
		 </script>
		<?php
		 }
		 else
		 {	 
		 ?>
		<script>
		
		swal.fire({
				icon: 'success',
                title: 'Success',
                text: 'Login Successful'
}).then(function() {
    window.location = "index.html";
});
		 </script>
		 <?php
		 }
	  }
	  else
	  {
		  ?>
         <script>
		
		swal.fire({
				icon: 'error',
                title: 'Incorrect Username/Password',
                text: 'check username and password'
}).then(function() {
    window.location = "logins.php";
});
        </script>
		<?php
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
        <form class="form col-xs-1" method="post" style="border: 2px solid ;padding: 8%;border-radius: 5%;">
            <h1 style="text-align: center;">Login</h1>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
            <br>
            <label for="pass">Password</label>
            <br>
            <input type="password" name="pass" id="pass" class="form-control">
            <button type="submit" class="btn btn-success" style="margin-top: 10%;margin-left: 33%">SUBMIT</button>
        </form>
        <br>
            <span style="margin-left: 20%;">Don't have an account?
                <span class="wr"><a href="register.php">sign up</a></span></span>
    </div>
        
</body>
</html>