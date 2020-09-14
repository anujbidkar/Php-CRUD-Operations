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
        <label for="">Gender</label><br>
        <input type="checkbox" name="u_gender" value="Male" id="">Male
        <input type="checkbox" name="u_gender" value="Female" id="">Female
        
        <br>
        <label for="">Education</label><br>
        <input type="checkbox" name="u_eudcation[]" value="10th" id="">10th
        <input type="checkbox" name="u_eudcation[]" value="12th" id="">12th

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
            // $gender = $_POST['u_gender'];
            $u_eudcation = implode(", ", $_POST['u_eudcation']);
           

            $connection = mysqli_connect('localhost','root','','php');

            if($connection)
            {
$create_query = "INSERT INTO users(user_name,user_email,user_password,gender) VALUES('$name','$email','$pass','$u_eudcation')";

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