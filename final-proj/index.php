<?php
session_start();
if (!isset($_SESSION['user'])){
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>DASHBOARD</title>
    <style>
        *{
            margin: 0;padding:0;
        }
        body{
            background-color: rgb(56,57,59);
        }
        main{
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 2vh;
        }
       
        div img{
            height:30px;
            width:40px;
            margin: 10px;
        }
        h1{
            display: flex;
            color: whitesmoke;
        }
        ul li{
            display: inline-block;
            padding: 0 25px;
            border-right: 2px solid whitesmoke;
        }
        ul li a{
            text-decoration: none;
            color:whitesmoke;
            padding: 10px;
        }
        ul li a:focus{
            color: black;
            border-radius: 10px;
        }
        ul li a:hover{
            color: black;
            height:100vh;
            background-color: whitesmoke;
        }
        li:last-child{
            border:none;
        }
        input{
            border-radius: 20px;
            padding: 10px;
        }
    
        button ,button a{
            text-decoration: none;
            background-color: rgb(44, 40, 40);
            border:none;
            color: whitesmoke;
            padding:12px;
            border-radius:10px;
        }
        h1#wel{
            margin-top: 10%;    
            margin-left: 40%;
        }
    </style>
</head>
<body>
    <main>  
        <h1>ADMIN</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Activity</a></li>
                <li><a href="#">Control</a></li>
                <li><a href="#">Support</a></li>
            </ul>
        </nav>
        <input type="text" placeholder="Search">

        <button><a href="logout.php">LOGOUT</a></button>
    </main>
    <h1 id="wel">Welcome
    <?php
        echo $_SESSION['user'];
        ?>
    </h1>
    
</body>
</html>