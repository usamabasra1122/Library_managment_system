<!DOCTYPE html>
<html>


<head>
	<title>Forget Password </title>
	 <?php include('bootstrap_links.php'); ?>
    

</head>



<body  >
    <?php
	include('db_connection.php');
    
 
?>
    
    
<center>
<div class="col-lg-12 text-center ">
    <h3 style="font-family:Lucida Console ; margin-top:10px;">Library Management System</h3>
</div>
	<div class="form_div">
	<form method="post" class="container-fluid text-center" id="confirm_form">
            <h5 style="font-family:Lucida Console ;margin-bottom:100px;" >Forget Password Form</h5>

          <h6 style="font-family:Lucida Console; " >Enter required Information</h6>

           
                    
                    <div>
                        <input type="text" class="form-control container-fluid col-lg-3 fms" placeholder="E-mail" name="email" required=""/>
                    </div>
                    
                    
        
                    <div>
                        <input type="tel" class="form-control container-fluid col-lg-3 fms" placeholder="Contact No" name="contectno" required="" 
                               pattern="[0-9].{10}"  title="Enter accordingly ##########"/>
                    </div>
        
                     

                    
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit round" type="submit" name="submit" value="Register">
                    </div>

        </form>
		</div>

</center>

</body>

</html>


<?php

   
if (isset($_POST['submit'])){
		
		$email = $_REQUEST['email']; 
        $contectno = $_REQUEST['contectno'];
		
    
    $query = "SELECT * FROM user_table WHERE email='$email' and contectno='$contectno'";
    $result = mysqli_query($link,$query);
		if (mysqli_num_rows($result))
        {
            ?>
            <script type="text/javascript">
                 var email = "<?php echo $email;?>";
			
              alert("Congratulation your account is found");
              window.location.href="recovery_password.php?email="+email;
              
              
              </script>;
<?php
            
        }
    else
    {
        ?>
<script type="text/javascript">
                 
              alert(" your account is NOT found");
              window.location.href="user_login.php";
              
              
              </script>;
        
        
        
    <?php   
    }
        
        
        
    
}
?>