<?php
error_reporting(0);
    include_once('db_connection.php');
include('session_auth.php');

    if(isset($_POST['submit']))
{
	
	$isbn = $_POST['isbn'];
	$title = $_POST['title'];
	$author = $_POST['author']; 
	$catagory = $_POST['catagory'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	
	
	$sql_query = "INSERT INTO book_table(id,isbn,title,author,catagory,price,quantity) VALUES(NULL,'$isbn','$title','$author','$catagory','$price','$quantity')";
	
	if(mysqli_query($link, $sql_query))
	{
		?>
		<script type="text/javascript">
		alert('Data Added Successfully ');
		window.location.href='index.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert('Error');
		</script>
		<?php
	}
	
}
    
?>















<!DOCTYPE html>
    <html>


    <head>
         <?php include('bootstrap_links.php'); ?>

        <title>Add Book Form </title>
        
    </head>



    <body style="background-color: #fff     !important ; " >
         <?php
              include_once('header.php');
        ?>
    <center style="margin-top:6.5%">

       
         <h3 style="font-family:Lucida Console" >Enter Book</h3>

        <form method="post" class="container-fluid text-center">
                         <div>
                            <input type="number" class="form-control container-fluid col-lg-3 fms" placeholder="ISBN" name="isbn" required="" max-lenght="5" />
                        </div>


                        <div>
                            <input type="text" class="form-control container-fluid col-lg-3 fms" placeholder="Book Title" name="title" required=""  pattern="^[a-z A-Z]+" title="Enter Correct information"/>
                        </div>
                        <div>
                            <input type="text" class="forntrol container-fluid col-lg-3 fms" placeholder="Author Name" name="author" required="" pattern="^[a-z A-Z]+" title="Enter Correct information"/>
                        </div>

                        <div>
                            <input type="text" class="form-control container-fluid col-lg-3 fms" placeholder="catagory" name="catagory" required="" pattern="^[a-z A-Z]+" title="Enter Correct information"/>
                        </div>
                        <div>
                            <input type="number" class="form-control  container-fluid col-lg-3 fms" placeholder="Price" name="price" required="" pattern="[0-9]+" title="Enter Correct information"/>
                        </div>
                        <div>
                            <input type="number" class="form-control container-fluid col-lg-3 fms" placeholder="Quantity" name="quantity" required="" pattern="[0-9]+" title="Enter Correct information"/>
                        </div>
                       


                        <div class="col-lg-12  col-lg-push-3">
                            <input class="btn btn-default submit round" type="submit" name="submit" value="ADD">
                        </div>

            </form>
      

    </center>


    
        <?php
        include_once('footer.php');
        ?>
</body>
    </html>