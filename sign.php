<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Spartan' rel='stylesheet'>
    <style>
        input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  
input[type=submit]{
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }
  
  input[type=submit]:hover {
    opacity: 0.8;
  }

  form{
    margin-top: 150px;
    margin-left: 550px;
    width: 25%;
  }
  .sign{
    text-decoration: none;
    color: #04AA6D;
  }
    </style>

    <script>
        $(document).ready(function(){
            $(".sign").click(function(){
                $("form").hide();
            })
        })
    </script>
</head>
<body class="body">

    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";

        $db = "shop";

        $conn = new mysqli($servername, $username, $password, $db) or die("Connection Failed");

        
        
        if(!empty($_POST['save']))
        {

            $stmt = $conn->prepare("INSERT INTO user (email, pass) VALUES (?, ?)");
            $stmt->bind_param("ss", $user, $password);

            $user=$_POST['name'];
            $password=$_POST['password'];

            $stmt->execute();
            
            echo '<script>alert("Account Signed Up Successfully")</script>';

            $stmt->close();
            $conn->close();

            include 'login.php';
        }

    ?>

    <form method="post">
        <div class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="name" required>
        
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
                
            <input class type="submit" name="save" value="Sign Up">

        </div>
    </form>
  
</body>
</html>