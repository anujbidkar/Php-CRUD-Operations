<!DOCTYPE html>
<?php ob_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1>
    Users Data
    </h1>
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <td>Sr No</td>
            <td>Name</td>
            <td>Email</td>
            <td>Passsword</td>
            <td>Gender</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
        </thead>

    <?php 
     $connection = mysqli_connect('localhost','root','','php');

     if($connection)
     {


        $read_query = "SELECT * FROM users";
       
        $result = mysqli_query($connection,$read_query);

        if($result)
        {
            $i=1;
            while($row = mysqli_fetch_array($result))
            {
              $id = $row['id'];
              $name = $row['user_name'];
              $user_email = $row['user_email'];
              $user_password = $row['user_password'];
              $gender = $row['gender'];
            ?>
                <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $user_email;?></td>
                <td><?php echo $user_password;?></td>
                <td><?php echo $gender;?></td>
                <td>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>">
  Update
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <div class="form-grup">
            <form action="" method="POST">
                    <label for="name">Name:</label>
                    <input type="text" value="<?php echo $name;?>" class="form-control" name="u_name" id="">
                    <input type="hidden" value="<?php echo $id;?>" class="form-control" name="u_id" id="">
                </div>
                <div class="form-grup">
                    <label for="name">Email:</label>
                    <input type="text" value="<?php echo $user_email;?>" class="form-control" name="u_email" id="">
                </div>
                <div class="form-grup">
                    <label for="name">Password:</label>
                    <input type="text" value="<?php echo $user_password;?>" class="form-control" name="u_pass" id="">
                </div>
                <div class="form-grup">
                    <label for="name">Gender:</label>
                    <input type="text" value="<?php echo $gender;?>" class="form-control" name="u_gender" id="">
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_btn" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
                </td>
                <td>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModel<?php echo $i;?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="deleteModel<?php echo $i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
        Are You Sure Want To Delete <?php echo $name; ?> User?  
        <input type="hidden" value="<?php echo $id;?>" name="delete_id" id="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="delete_btn" class="btn btn-danger">Delete User</button>
        </form>
      </div>
    </div>
  </div>
</div>
                </td>
                </tr>
           


           
           <?php
           $i++;
        }

           
        }
        else
        {
            echo "Error :".mysqli_error($connection);
        }
     }

        ?>



        <?php
            if(isset($_POST['update_btn']))
            {
                    $id = $_POST['u_id'];
                    $name = $_POST['u_name'];
                    $email = $_POST['u_email'];
                    $pass = $_POST['u_pass'];
                    $gender = $_POST['u_gender'];


                    $update_query = "UPDATE users SET user_name='$name' , user_email='$email' , user_password='$pass',gender='$gender' WHERE id='$id' ";
                    $result_update = mysqli_query($connection,$update_query);
                    if($result_update)
                    {
                        header("Location:read.php");
                    }
                    else
                    {
                        echo "Error :".mysqli_error($connection);
                    }


            }
            if(isset($_POST['delete_btn']))
            {
                    $id = $_POST['delete_id'];
                 


                    $delete_query = "DELETE FROM users WHERE id='$id' ";
                    $result_delete = mysqli_query($connection,$delete_query);
                    if($result_delete)
                    {
                        header("Location:read.php");
                    }
                    else
                    {
                        echo "Error :".mysqli_error($connection);
                    }


            }
           
            
        ?>
</tbody>
</table>

</body>
</html>