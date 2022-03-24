  

<nav class=" navbar  navbar-expand-lg navbar-light bg-light fixed-top 	 "  style="background-color: #fff     !important ;" >
  <a class="navbar-brand" href="index.php"><span style="font-size: 2em; color:  orange;"><i class="fas fa-book"></i></span>
</i></a>
<h4 >LMS</h4>
<dir style="margin-left: 1%"></dir>
 <button    class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse  " id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_book.php">Add Book</a> 
      </li>
        
    
      

      
        
        <li class="nav-item">
        <a class="nav-link" href="return_book.php">Return Book</a>
      </li>
        
         <li class="nav-item">
        <a class="nav-link" href="registered_users.php">Registered user</a>
      </li>
        
      

     
       
      
    </ul>


    
  </div>

     <div class="btn-group " >
          <div class="btn-group dropleft" role="group">
            <button  style="background-color:gray;" type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="sr-only" >Toggle Dropleft</span>
            </button>
            <div class="dropdown-menu">
                  <a href="profile.php" class="dropdown-item"> <i class="fas fa-user-edit"></i></i>  Edit-Profile</a>
               
                <a href="logout.php" style="text-decoration:none" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>  sign-out </a>
               
               
                
               </div>
          </div>
             <div style="margin-right:5%; background-color:white; " class="btn btn-secondary" > <a href="" style="text-decoration:none"> <i class="fas fa-user-tie"></i> <?php echo $_SESSION['name'] ?> </a>  </div>

          
        </div>
    </nav>