<?php


error_reporting(0);

include('session_auth.php');
include_once('db_connection.php');

	


if(isset($_GET['delete_id']))
{
    
	$del_query="DELETE FROM book_table WHERE id=".$_GET['delete_id'];
	mysqli_query($link , $del_query);
	header("Location: $_SERVER[PHP_SELF]");
}

	?>

<!DOCTYPE html>
<html >
<head>

	<title>HOME LMS </title>
	<?php include('bootstrap_links.php'); ?>
    
    
    
    <script type="text/javascript">

        function edit_id(id)
{
	if(confirm('Are you Sure to edit ?'))
	{
		window.location.href='edit_book.php?edit_id='+id;
	}
}
        
        
        
      function delete_id	(id)
{
	if(confirm('Are you Sure to Delete ?'))
	{
		window.location.href='index.php?delete_id='+id;
        
        
        
	}
}
        
        
        
     
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch_data.php",   method:"POST",data:{query:query},success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
    
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>	

   
</head>
  	

	<?php
          include_once('header.php');
    ?>



<body  style="font-family:Lucida Console; background-color: #fff     ; margin-top: 7%  ; " > 
    
    
    
    
    
    <div class="container-fluid " style="position:absolute;">

        <nav class="navbar navbar-light bg-light " style="background-color: #e3sddd !important;">
  <a class="navbar-brand">Books Table</a>   
  <form class="form-inline" method="POST">
    <input class="form-control mr-sm-2" type="search" placeholder="ISBN/Title/Author" aria-label="Search" id="search_text">
    <button class="btn btn-outline my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
  </form>
</nav>
        <div id="result" > <!-- this div will b replaced -->
           </div>
        
   
</body>
       
   
</html>
    
    <?php
          include_once('footer.php');
    ?>
    
