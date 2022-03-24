    <?php
        include_once('db_connection.php');
    include('session_auth.php');


    if(isset($_POST["query"]))
    {
     $search = mysqli_real_escape_string($link, $_POST["query"]);
     $query = "SELECT * FROM book_table 
      WHERE isbn LIKE '%".$search."%'
      OR title LIKE '%".$search."%'
      OR author LIKE '%".$search."%'


      ";



    }
    else
    {
     $query = "
      SELECT * FROM book_table ORDER BY id DESC ";
    }
    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result) > 0)
    {
        ?>

        <div id="result">
        <table class="table table-bordered  table-hover text-center" style="margin-bottom:10% ;">

      <thead class="thead-light">
        <tr>
          <th scope="col">ISBN</th>
          <th scope="col">Title</th>
          <th scope="col">Atuhor</th>
          <th scope="col">Catagory</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>

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
            <td><?php echo $row[5]; ?></td>
          <td><?php echo $row[6]; ?></td>
            <td> 
                <?php
                

                if($row[6] > 0 )
                {
                   
                    ?>
                        
                    <a href="issue_book.php?book_id=<?php echo $row[0] ?>" > 
                    <button type="button" class="btn btn-outline-info" >issue</button> 
                    </a>
                <?php
                }
                else 
                {
                   echo  '<button type="button"  class="btn btn-outline-info "disabled>issued</button>';
                }
                ?>


                 </td>
              <td>   <a href="javascript:edit_id('<?php echo $row[0]; ?>')" > 
                <button class="btn btn-warning" style="color:#fff; margin: 0 8% 0 0" ;><i class="far fa-edit"></i> Edit</button>
                </a>


                <a href="javascript:delete_id('<?php echo $row[0]; ?>') ">
           <button class="btn btn-danger" style="color:#fff;" ><i class="fas fa-trash"></i> Delete</button>


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


        ?>