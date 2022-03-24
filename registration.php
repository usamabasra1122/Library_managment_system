<!DOCTYPE html>
<html>


<head>
	<title> Registration Form </title>
	 <?php include('bootstrap_links.php'); ?>
    
</head>



<body  >
    <?php
	include('db_connection.php');
    
      if (isset($_POST['submit'])){
		$fname = stripslashes($_REQUEST['firstname']); 
		$lname = stripslashes($_REQUEST['lastname']); 
		$username = stripslashes($_REQUEST['username']);   
		$email = stripslashes($_REQUEST['email']);
		$password = stripslashes($_REQUEST['password']);
		$contectno = stripslashes($_REQUEST['contectno']);

        $query = "INSERT into  admin_table(firstname, lastname,username,email, password, contectno) VALUES ('$fname','$lname','$username', '$email','".md5($password)."', '$contectno')";
		
		
        $result = mysqli_query($link,$query);
        if($result){
        echo '  <script>
              confirm("Successfuly registerd are you want to go login form");
              window.location.href="login.php";
              </script>';
        
        }
    }   
?>
    
    
<center>
<div class="col-lg-12 text-center ">
    <h3 style="font-family:Lucida Console ; margin-top:10px;">Library Management System</h3>
</div>
	<div class="form_div">
	<form method="post" class="container-fluid text-center">
            <h5 style="font-family:Lucida Console" > Registration Form</h5>

           
                    <div>
                        <input type="text" class="form-control container-fluid col-lg-3 fms" placeholder="FirstName" name="firstname" required="" 
                            title="Enter your Valid name" pattern="[a-zA-Z]+"/>
                    </div>
                    <div>
                        <input type="text" class="form-control container-fluid col-lg-3 fms" placeholder="LastName" name="lastname" required=""
                               title="Enter your Valid name" pattern="[a-zA-Z]+"/>
                    </div>

                    <div>
                        <input type="text" class="form-control container-fluid col-lg-3 fms" placeholder="Username" name="username" required=""
                               title="Enter your Valid name" pattern="[a-zA-Z0-9]+"/>
                    </div>
        
                    <div>
                        <input type="emal" class="form-control container-fluid col-lg-3 fms" placeholder="E-mail" name="email" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control  container-fluid col-lg-3 fms" placeholder="Password" name="password" required=""
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  onchange="form.password.pattern = RegExp.escape(this.value)" title="At least 8 charactors, 1 Decimal  , uper&lower case"/>
                    </div>
                    
        
                    <div>
                        <input type="tel" class="form-control container-fluid col-lg-3 fms" placeholder="Contact No" name="contectno" required="" 
                               pattern="[0-9].{10}"  title="Enter accordingly ####-######"/>
                    </div>
        
                     

                    
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit round" type="submit" name="submit" value="Register">
                    </div>

        </form>
		</div>

</center>

</body>

</html>