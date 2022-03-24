<?php
require('db_connection.php');

session_start();


if (isset($_POST['submit'])){
		
		$email = $_REQUEST['email']; 
        $password = $_REQUEST['password'];
		
	    $query = "SELECT * FROM admin_table WHERE email='$email' and password='".md5($password)."'";
		$result = mysqli_query($link,$query);
        $record = mysqli_fetch_row($result);
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['email'] = $email;
            $_SESSION['name'] = $record[1]." ".$record[2];
			
			header("Location: index.php"); 
            }else{
				echo '<script>
              confirm("Incorrect User and Password");
              window.location.href="login.php";
              </script>';

        }
}
?>













<!DOCTYPE html>
<html>


<head>
	<title> Login Form </title>
	 <?php include('bootstrap_links.php'); ?>
    
    
  
    
    
    
    
    
    
    


</head>
<div class="col-lg-12 text-center ">
    <h2 style="font-family:Lucida Console ; margin-top:50px;">Library Management System</h2>
</div>


<body class="login" >
	<div class="form_div">
	<form name="login_form" action="" method="post" class="container-fluid text-center">
        
            <h3 style="font-family:Lucida Console" >Admin Login Form</h3>

           
               <div style="margin-bottom:10px;" class="col-md-3  container-fluid "> <input class="form-control" type="email" name="email"  placeholder="E-mail" required=""/> </div>
			   
          
              <div style="margin-bottom:10px" class="col-md-3  container-fluid "	>  <input class="form-control" type="password" name="password"  placeholder="Password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  onchange="form.password.pattern = RegExp.escape(this.value)" title="At least 8 charactors, 1 Decimal  , uper&lower case"/>  </div>
              <div> <input class="btn btn-default submit round	" type="submit" name="submit" value="Login" onclick="check_form()"> </div>
               
			<div class="primary" style="font-family:Lucida Console "> <a  style="margin-right:150px" href='Forget_password.php'>Forget password?</a>
                    <a href='registration.php'> Create Account </a>
                </p>
			</div>	
			
			<div class="alert alert-primary col-md-6  container-fluid alert_box " role="alert">
                Admin login form
		
			</div>
                


        </form>
		</div>



</body>

</html>