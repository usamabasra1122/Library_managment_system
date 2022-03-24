<?php include('session_auth.php');
        include('db_connection.php');
 
 if(isset($_POST['submit']))
 {
     $book_id=$_GET['book_id'];
    $email=$_POST['email'];

   $sql_q="SELECT * FROM user_table WHERE email="."'$email'";
	$result_set=mysqli_query($link,$sql_q);
	$row=mysqli_fetch_row($result_set);
     
    if($row = 1)
    {
        
        $sql_book_query = "SELECT * FROM book_table  WHERE id=".$_GET['book_id'];
        $result=mysqli_query($link,$sql_book_query);
        $fetch_rows=mysqli_fetch_row($result);
        $isbn = $fetch_rows[1];
        
$insert_query = "INSERT INTO issuebook_table(id,user_email,book_id , isbn) VALUES(NULL,'$email','$book_id', '$isbn')";
	
	if(mysqli_query($link,$insert_query))
    {
        
         
        
        
        $quantity= $fetch_rows[6] - 1;  
        
        $sql_query = "UPDATE  book_table SET  quantity='$quantity'   WHERE id=".$_GET['book_id'];
        mysqli_query($link,$sql_query);
        echo '<script>
          alert("book is  issued");
          </script>';
     
        
        
        
    }
    else
    {
        echo '<script>
          alert("book is not issued");
          </script>';
        
    }
	    
        
    }
     else 
     {
         echo '<script>
          alert("user is not found");
          </script>';
     }
    
     
 }




?>



<!DOCTYPE html>
<html >
<head>

	<title>Issue Book </title>
 <?php include('bootstrap_links.php'); ?>

</head>
  	

	



<body  style="font-family:Lucida Console; background-color: #fff     !important ; " > 
   <?php
          include_once('header.php');
    ?>
    
<div style="margin-top:7%" >
 <form method="post" class="container-fluid text-center">
            <h5 style="font-family:Lucida Console" >Book issue Form</h5>

                    <div>
                        <input type="email" class="form-control container-fluid col-lg-3 fms" placeholder="User E-mail" name="email" required=""/>
                    </div>
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit round" type="submit" name="submit" value="Issue">
                    </div>

        </form>
		</div>
   
    
  
      
    <?php
          include_once('footer.php');
    ?>
</body>
