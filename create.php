<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Welcome to HTML
    </h1>

    <form action="" method="post">
      
        <label for="User Name">User Name<span style="color:red"> <sup>*</sup></span>  : </label> <br>
        <input  type="text" name="u_name" id=""> <br>
    
    <br>
        <label for="User Email">Email<span style="color:red"> <sup>*</sup></span>  :</label> <br>
        <input  type="email" name="u_email" id=""> <br>
    
    
    <br>
        <label for="User Password">Password<span style="color:red"> <sup>*</sup></span>  :</label> <br>
        <input  type="password" name="u_password" id=""> <br>

        <br>
        <br>
        <button name="register_btn" type="submit">
            Register
        </button>
    
    
    </form>
    

    <?php

        if(isset($_POST['register_btn']))
        {
        
            $name = $_POST['u_name'];
            $email = $_POST['u_email'];
            $pass = $_POST['u_password'];

            $connection = mysqli_connect('localhost','root','','php');

            if($connection)
            {
            $create_query = "INSERT INTO users(user_name,user_email,user_password2) VALUES('$name','$email','$pass')";

            $result = mysqli_query($connection,$create_query);


            if($result)
            {
                echo "data inserted successfully";
            }
            else
            {
                echo "Error :    ".mysqli_error($connection);
            }





            }
            else
            {
                echo "error in connection";
            }

           

        }




    ?>





</body>
</html>