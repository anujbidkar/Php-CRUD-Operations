<!DOCTYPE html>
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

            while($row = mysqli_fetch_array($result))
            {
                $name = $row['user_name']."<br>";
                $id = $row['id']."<br>";
                $email = $row['user_email']."<br>";

            ?>


    <tbody>

           
            <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $name; ?></td>
            </tr>
           

           
           <?php }

           
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