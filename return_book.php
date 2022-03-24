
<?php 
    include('session_auth.php');

        include('db_connection.php');
 
 if(isset($_POST['submit']))
 {
     

        
         $sql_book_query = "DELETE FROM issuebook_table  WHERE isbn=".$_POST['isbn'];
       if( mysqli_query($link,$sql_book_query))
           
       {
        $sqlquery = "SELECT * FROM book_table  WHERE isnb=".$_POST['isbn'];
        $result=mysqli_query($link,$sqlquery);
        $fetch_rows=mysqli_fetch_row($result);
        
           
        
        
        $quantity= $fetch_rows[6] + 1;
       
        
        
        
        
        $sql_query = "UPDATE  book_table SET  quantity='$quantity'   WHERE isbn=".$_POST['isbn'];
        mysqli_query($link,$sql_query);
        echo '<script>
          alert("book is Returnd");
          </script>';
     
        
        
        
    }
    else
    {
        echo '<script>
          alert("book is not returned");
          </script>';
        
    }
	    
        
    }
 

?>




<!DOCTYPE html>
<html >
<head>

	<title>Return Book </title>
 <?php include('bootstrap_links.php'); ?>

</head>
  	

	



<body  style="font-family:Lucida Console; background-color: #fff     !important ; " > 
   <?php
          include_once('header.php');
    ?>
    
<div style="margin-top:7%" >
 <form method="post" class="container-fluid text-center">
            <h5 style="font-family:Lucida Console" >Book return Form</h5>

                    <div>
                        <input type="text" class="form-control container-fluid col-lg-3 fms" placeholder="ISBN" name="isbn" required=""/>
                    </div>
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit round" type="submit" name="submit" value="Return">
                    </div>

        </form>
		</div>
   
    
  
      
    <?php
          include_once('footer.php');
    ?>
</body>
