<?php
include('session_auth.php');
require('db_connection.php');

    

$sql_query="SELECT * FROM admin_table WHERE email='".$_SESSION['email']."'";
	$result_set=mysqli_query($link,$sql_query);
	$fetched_row=mysqli_fetch_row($result_set);
    
    
    


  
    
?>







<!DOCTYPE html>
<html>


<head>
	<title>profile Edit Form </title>
	 <?php include('bootstrap_links.php'); ?>
    
    
    
    
   

</head>



<body>
    <?php
	       
		$fname = stripslashes($_REQUEST['firstname']); 
		$lname = stripslashes($_REQUEST['lastname']); 
		$username = stripslashes($_REQUEST['username']);   
		$email = stripslashes($_REQUEST['email']);
		$password = stripslashes($_REQUEST['password']);
		$contectno = stripslashes($_REQUEST['contectno']);
    if(isset($_POST['submit'])){
        
        if ($_POST["password"] == $_POST["confirm_password"]) {


        
        $query = "UPDATE  admin_table SET firstname='$fname' ,  lastname='$lname' , username='$username' ,email='$email' , password='".md5($password)."' , contectno='$contectno' WHERE email='".$_SESSION['email']."'"  ;
		
		
        $result = mysqli_query($link,$query);
        if($result){
        echo '  <script>
              confirm("Successfuly Updated Profile");
              window.location.href="index.php";
              </script>';
        }
        else 
    {
        echo '  <script>
              confirm("Not  Updated Profile");
              window.location.href="index.php";
              </script>';
        
        
    }
        
        
        
    }
        else
        {
            echo '<script> window.alert("Both the passwords are not  same");
					</script>';
        }
    }
    
      
?>
    
    
<center>
<div class="col-lg-12 text-center ">
    <h3 style="font-family:Lucida Console ; margin-top:10px;">Library Management System</h3>
</div>
	<div class="form_div">
	<form method="post" name="profile_form" class="container-fluid text-center">
            <h5 style="font-family:Lucida Console" >Admin Profile</h5>

           
                    <div>
                        <input type="text" class="form-control container-fluid col-lg-3 fms" placeholder="FirstName" name="firstname" required="" 
                            title="Enter your Valid name" pattern="[a-zA-Z]+"  value="<?php echo $fetched_row[1]; ?>"/>
                    </div>
                    <div>
                        <input type="text" class="form-control container-fluid col-lg-3 fms" placeholder="LastName" name="lastname" required=""
                               title="Enter your Valid name" pattern="[a-zA-Z]+" value="<?php echo $fetched_row[2]; ?>"/>
                    </div>

                    <div>
                        <input type="text" class="form-control container-fluid col-lg-3 fms" placeholder="Username" name="username" required=""
                               title="Enter your Valid name" pattern="[a-zA-Z0-9]+" value="<?php echo $fetched_row[3]; ?>"/>
                    </div>
        
                    <div>
                        <input type="text" class="form-control container-fluid col-lg-3 fms" placeholder="E-mail" name="email" required="" value="<?php echo $fetched_row[4]; ?>"/>
                    </div>
                    <div>
                        <input type="text" class="form-control  container-fluid col-lg-3 fms" placeholder="Password" name="password" required=""
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  onchange="form.password.pattern = RegExp.escape(this.value)" title="At least 8 charactors, 1 Decimal  , uper&lower case" value=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control  container-fluid col-lg-3 fms" placeholder="Password" name="confirm_password" required=""
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  onchange="form.password.pattern = RegExp.escape(this.value)" title="At least 8 charactors, 1 Decimal  , uper&lower case" value="" />
                    </div>
                    
        
                    <div>
                        <input type="tel" class="form-control container-fluid col-lg-3 fms" placeholder="Contact No" name="contectno" required="" 
                               pattern="[0-9].{10}"  title="Enter accordingly ####-######" value="<?php echo "0".$fetched_row[6]; ?>"/>
                    </div>
        
                     

                    
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit round" type="submit" name="submit" value="Update"  >
                    </div>

        </form>
		</div>

</center>

</body>

</html>