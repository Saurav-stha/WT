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
    <title>Signup Page</title>
    <link rel="stylesheet" href="./edit.css">
    <style>
        .main{
            margin-top: 7%;
        }
        body{
            background-image: url("./pic.jpg");
            background-size: cover;
            background-repeat: no-repeat; 
            background-attachment: fixed;       
        }
    </style>
</head>
<body>
    <div class="main">
        <?php
        if (isset($_POST['submit'])){
            $username = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordRepeat = $_POST['passwordRepeat'];

            $passwordHash = password_hash($password,PASSWORD_DEFAULT);
            $errors = array();
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn,$sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount>0){
                array_push($errors,"Email already exists.");
            }
            if (count($errors)>0){
                foreach($errors as $error){
                    echo "<script>alert('$error');</script>";            
                }
            }
            else{
                
                $sql = "INSERT INTO users (fname,email,password) VALUES (?,?,?) ";
                $stmt = mysqli_stmt_init($conn);
                $prepStmt = mysqli_stmt_prepare($stmt,$sql);
                if ($prepStmt){
                    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$passwordHash);
                    mysqli_stmt_execute($stmt);
                    header("Location: login.php");
                }else{
                    echo "<script>alert('Having some problems with server.')</script>";// havign problems
                    die("something went wrong");
                }
            }
        }
        ?>
        <h1>Sign Up</h1>
        <form action="signup.php" method="POST">
            <input type="text" name="name" placeholder="Username "required>
            <br>    
            <input type="email" name="email" id="email" placeholder="Email" required>
            <br>
            <input type="password" name="password" id="password" placeholder="Password"required>
            <br>
            <input type="password" name="passwordRepeat" placeholder="Confirm Password" id="confirm" required>
            <br>
            <div id="submit_center">
                <p>Already have an account?</p>
                <a href="./login.php" id="login">Log In</a>
            </div>
            <br>
            <input type="submit" name="submit" id="submit">
        </form>
    </div>
    <script>
        document.getElementById("confirm").addEventListener("blur",confirm);

        function confirm(event){
            pw =(document.getElementById("password")).value;
            conf_pw=(document.getElementById("confirm")).value;
            if(pw!=conf_pw){
                alert("Password not matching");
                event.preventDefault();
            }            
        }

        var email=document.getElementById("submit").addEventListener("click",check);

        function check(event) {
            var password = document.getElementById("password");
            var strongRegex = new RegExp("^(?=.*[a-zA-Z0-9])(?=.*[0-9])(?=.{8,})");

            if (!strongRegex.test(password.value)) {
                alert("Invalid Password.")
                alert('Must contain at least one number & be more than 7 characters.');
                event.preventDefault();
                return false;
                
            }
        }
    </script>
</body>
</html>