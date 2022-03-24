<?php include_once('db_connection.php');
    include('session_auth.php');


if(isset($_GET['delete_id']))
{
    
	$del_query="DELETE FROM user_table WHERE id=".$_GET['delete_id'];
	mysqli_query($link , $del_query);
	header("Location: $_SERVER[PHP_SELF]");
}


if(isset($_GET['status_id']))
{
    
			$query = "SELECT * FROM user_table WHERE id=".$_GET['status_id'];
			$result = mysqli_query($link,$query);
			$record = mysqli_fetch_row($result);
        $status=$record[7];
	  if($status == 1)
      {
          
        $query = "UPDATE  user_table SET status='0' WHERE id=".$_GET['status_id'];
		 mysqli_query($link,$query);  
          echo '<script>
          alert("User Has been Blocked");
          </script>';
          header("Location: $_SERVER[PHP_SELF]");
      }
    else
    {
        $query = "UPDATE  user_table SET status='1' WHERE id=".$_GET['status_id'];
		 mysqli_query($link,$query);
        echo '<script>
          alert("User Has been UnBlocked");
          </script>';
        header("Location: $_SERVER[PHP_SELF]");
        
    }
   
    
    
    
    
}


?>

<!DOCTYPE html>
<html >
<head>

	<title>users of LMS </title>
	<?php include('bootstrap_links.php'); ?>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    
    
    <script type="text/javascript">   
          function delete_id(id)
{
	if(confirm('Are you Sure to Delete ?'))
	{
		window.location.href='registered_users.php?delete_id='+id;
        
        
        
	}
}
        
        

        
        
        
      function status_id(id)
{
	if(confirm('Are you sure to change status of user?'))
	{
		window.location.href='registered_users.php?status_id='+id;
    }
}
        
        
 </script>

   
</head>
  	

	



<body  style="font-family:Lucida Console; background-color: #fff     !important ; " > 
    
    
    <?php
          include_once('header.php');

        

     $query = "
      SELECT * FROM user_table ORDER BY id DESC ";
    
    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result) > 0)
    {
        ?>

        <div >
        <table class="table table-bordered  table-hover text-center" style="margin-top:10%;">

      <thead class="thead-light">
        <tr>
          
          
          <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">User Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Contact No</th>
            <th scope="col">Status</th>
            <th scope="col">Change Status</th>
            <th scope="col">Remove</th>
            

              </tr>
      </thead>
            <?php
            while($row= mysqli_fetch_row($result))
            {
            ?>

         <tbody>
             <tr>
          <th scope="row"><?php echo $row[1]; ?></th>
          <td><?php echo $row[2]; ?></td>
          <td><?php echo $row[3]; ?></td>
          <td><?php echo $row[4]; ?></td>
            
          <td><?php echo $row[6]; ?></td>
            <td>
            <?php
                

                if($row[7] == 0)
                {
                   

                    echo "<lable style='color:RED;'>Block<lable>";

                }
                else 
                    echo "<lable style='color:green;'>Not Block<lable>";
                ?>
                 
                 
                 </td>
            
                 
                 <td>
                     <a  href="javascript:status_id('<?php echo $row[0]; ?>')">
                <button class="btn btn-danger" style="color:#fff; " ;><i class="fas fa-"></i>change</button>
                </a> 
                     
                     
                     
                     </td>
                 <td>
                     <a href="javascript:delete_id('<?php echo $row[0]; ?>')" > 
                <button class="btn btn-danger" style="color:#fff; margin: 0 8% 0 0" ;><i class="fas fa-trash"></i> Remove</button>
                </a>  
                 </td>  
            </tr>
             
             

      </tbody>
            <?php
                }
                ?>
               </table>
        </div>


          <?php


    }
        else
        {
        echo 'Data Not Found';
        }


        


 
   
      
    
          include_once('footer.php');
    ?>
    
    
    
  </body>
    
</html>


    
