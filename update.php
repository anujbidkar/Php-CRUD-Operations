<!DOCTYPE html>
<html lang="en">
<head>
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <h1>
    Update User
    </h1>

    <table class="table table-hover table-bordered">
        <thead>
                <tr>
                <th>Sr No</th>
                <th>Usern Name</th>
                <th>User Email</th>
                <th>User Password</th>
                <th>Action</th>
                </tr>

        </thead>

        <tbody>
            <?php
            $connection = mysqli_connect('localhost','root','','my_blog');

            if($connection)
            {
                $query_read = "SELECT * FROM `users`";

                $result = mysqli_query($connection,$query_read);

                if($result)
                {
                    $i=1;
                    while($abc = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $abc['user_name'];?></td>
                        <td><?php echo $abc['user_email'];?></td>
                        <td><?php echo $abc['user_password'];?></td>
                        <td>
                                    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Are You Sure Want To Delete This ? -->
        <form action="" me>
        <input type="text" value="<?php echo $abc['id']; ?>" name="" id="">
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Delete User</button>
      </div>
      </form>
    </div>
  </div>
</div>
                        </td>
                    </tr>


                    <?
                    $i++;
                    }
                    
                }
                else
                {
                    echo "Error :".mysqli_error($connection);
                }


            }
            else
            {
                echo "Error";
            }





            ?>



        
        </tbody>
    </table>





</body>
</html>