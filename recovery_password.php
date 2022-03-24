<?php
include('bootstrap_links.php');
include_once('db_connection.php');
?>



       
           <center><h3 style="font-family:Lucida Console; " >Password Recovery page</h3></center>

             <div class="shadow-lg p-3 mb-5 bg-white rounded">
             <form method="post" class="container-fluid text-center">
     <h6 style="font-family:Lucida Console; " >Enter New Password</h6>

             <div>
                        <input type="password" class="form-control  container-fluid col-lg-3 fms" placeholder="Password" name="password" required=""
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  onchange="form.password.pattern = RegExp.escape(this.value)" title="At least 8 charactors, 1 Decimal  , uper&lower case"/>
                    </div>
         <div>
                        <input type="password" class="form-control  container-fluid col-lg-3 fms" placeholder="Password" name="confirm_password" required=""
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  onchange="form.password.pattern = RegExp.escape(this.value)" title="At least 8 charactors, 1 Decimal  , uper&lower case" value="" />
                    </div>
             <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit round" type="submit" name="submit" value="Update">
                    </div> </form> 
                    <div>
                        
             <?php  
                        
               if(isset($_POST['submit'])){
                   $password=$_POST["password"];
                   $email=$_GET[email];
                
        if ($_POST["password"] == $_POST["confirm_password"]) {
            
            
            
        
        $query = "UPDATE  user_table SET password='".md5($password)."' WHERE email='$email'";
		
         
        
        if(mysqli_query($link,$query)){
        echo '  <script>
              confirm("Successfuly Updated Password");
              window.location.href="user_login.php";
              </script>';
        }
        else 
    {
        echo '  <script>
              confirm("Not  Updated Password");
              window.location.href="user_login.php";
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
 
    