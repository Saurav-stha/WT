<?php
session_start();
if (isset($_SESSION['user'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>LOGIN</title>
    <link rel="stylesheet" href="./edit.css">
    <style>
        body{           
            background-image: url("./pic1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .main{ 
            margin-top:10%;
        }
    </style>
    
</head>
<body>
    <div class="main">
        
        <h1 id="hero">Welcome back,</h1>
        <br>
        <form action="login.php" method="POST">
            <input type="email" name="email" id="email" required placeholder="Email">
            <br>
            <input type="password" name="password" id="password" required placeholder="Password">
            <br>
            <div id="submit_center">
                <p>Don't have an account?</p>
                <a href="./signup.php" id="signup"><i class="fa fa-fw fa-wrench"></i>Sign up</a>
            </div>
            <br>
            <input type="submit" name="login" value="Login" id="submit">
             
        </form>
    </div>
    <?php
        if (isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            require_once "database.php";

            $sql = "SELECT * FROM users WHERE email = '$email' ";
            $result = mysqli_query($conn,$sql);
            $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
            if ($user){
                if (password_verify($password,$user['password'])){
                    session_start();
                    $_SESSION['user']=$user['fname'];
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert'>PASSWORD DOES NOT MATCH.</div>";
                }
            }else{
                echo "<div class='alert'>Not Registered</div>";
            }
        }
        ?>       
    <script>
        var password = document.getElementById("password");
        var strongRegex = new RegExp("^(?=.*[a-zA-Z0-9])(?=.*[0-9])(?=.{8,})");

        if (!strongRegex.test(password.value)) {
            alert("Invalid Password.")
            alert('Must contain at least one alphabet and a number & be more than 8 characters.');
            email.focus;
            event.preventDefault();
            return false;
            
        }
    </script>
</body>
</html>