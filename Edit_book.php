

<?php
error_reporting(0);
    include_once('db_connection.php');
    include('session_auth.php');


    if(isset($_GET['edit_id']))
{
	$sql_query="SELECT * FROM book_table WHERE id=".$_GET['edit_id'];
	$result_set=mysqli_query($link,$sql_query);
	$fetched_row=mysqli_fetch_row($result_set);
      
}



    if(isset($_POST['update_btn']))
{
	
	$isbn = $_POST['isbn'];
	$title = $_POST['title'];
	$author = $_POST['author']; 
	$catagory = $_POST['catagory'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
    
	
	$sql_query = "UPDATE  book_table SET  isbn='$isbn' ,title='$title',author='$author',catagory='$catagory',price='$price',quantity='$quantity'   WHERE id=".$_GET['edit_id'];
    
        
        if(mysqli_query($link, $sql_query))
	{
		?>
		<script type="text/javascript">
		alert('Data Updated Successfully ');
		window.location.href='index.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert('Not Updated');
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
    <center style="margin-top :6.5% ;">

       
         <h3 style="font-family:Lucida Console" >Enter Book</h3>

        <form method="POST" class="container-fluid text-center " style=" position:relative;">
                         <div class="form-inline">
                            <label style="margin-left:32%; width:100px; ">ISBN</label>
                            <input type="number" class="form-control col-lg-3 fms"  name="isbn" required="" pattern="^[0-9]+" value="<?php echo $fetched_row[1]; ?>"/>
                        </div>


                        <div class="form-inline">
                            <label style="margin-left:32%; width:100px;  ">Title</label>
                               <input type="text" class="form-control  col-lg-3 fms"  name="title" required="" pattern="^[a-z A-Z]+" value="<?php echo $fetched_row[2]; ?>" title="Enter Correct information"/>
                        </div>
                       <div class="form-inline">
                            <label style="margin-left:32%; width:100px; ">Author</label>
                               <input type="text" class="form-control  col-lg-3 fms"  name="author" required="" pattern="^[a-z A-Z]+" title="Enter Correct information" value="<?php echo $fetched_row[3]; ?>"/>
                        </div>

                       <div class="form-inline">
                            <label style="margin-left:32%; width:100px;  ">Catagory</label>
                               <input type="text" class="form-control  col-lg-3 fms" name="catagory" required="" pattern="^[a-z A-Z]+" title="Enter Correct information" value="<?php echo $fetched_row[4]; ?>"/>
                        </div>
                       <div class="form-inline">
                            <label style="margin-left:32%; width:100px;  ">Price</label>
                               <input type="number" class="form-control   col-lg-3 fms"  name="price" required="" pattern="^[0-9]+" title="Enter Correct information" value="<?php echo $fetched_row[5]; ?>"/>
                        </div>
                       <div class="form-inline">
                            <label style="margin-left:32%; width:100px;  ">Quantiy</label>
                               <input type="number" class="form-control  col-lg-3 fms" name="quantity" required="" pattern="^[0-9]+" title="Enter Correct information" value="<?php echo $fetched_row[6]; ?>"/>
                        </div>
           
                         
                    
                       


                        <div class="col-lg-12  col-lg-push-3">
                            <input class="btn btn-default submit round" type="submit" name="update_btn" value="ADD">
                        </div>

            </form>
      

    </center>


    
        <?php
        include_once('footer.php');
        ?>
</body>
    </html>