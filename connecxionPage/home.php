<?php 
//Log Out button
    session_start();
    $var_value =  $_SESSION['userName'];
    if(isset($_POST['submit'])) {
        session_destroy();
        header("Location: http://localhost/connecxionPage/login.php");
    }
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        body{
            height:500px;
            background: url("akin-oiou7Ya0u4Y-unsplash.jpg");
            /* background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('akin-oiou7Ya0u4Y-unsplash.jpg'); */
            background-size:cover;
            text-align: center;
        }
        nav{
            margin-top:4% !important;
            background:#112030;
        }
        .navbar-brand{
            font-weight:bold;
            color:#FFFFFF;
        }
        .navbar-brand span{
            color:#E90204;
            
        }
        .nav-link{
            color:#FFFFFF;
            font-size:14px;
        }
        .nav-link:hover,
        .nav-link span{
            color:#E90204;
        }
        .cyrcle{
            width:200px;
            height:200px;
            border-radius:50%;
            border:3px solid #8EA1B8;
            background: url("Capture4.PNG");
            margin-top:5%;
        }
        p{
            color:#D2DDE3;
            font-size:50px;
            font-weight:lighter;
        }
        button{
            border:0px;
            background:#112030;
            color:#E90204;
            padding-top:5px;
            font-size:14px;
        }
        #name{
            color:#E90204;
            margin-top:-20px;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<nav id="navbar-example2" class="navbar px-5 mx-5">
  <a class="navbar-brand" href="#">PRO<span>CAR</span></a>
  <ul class="nav nav-pills">
    <li class="nav-item px-3">
      <a class="nav-link" href="#fat">Home</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="#fat">About</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="#mdo">Projects</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="#mdo">Contact</a>
    </li>
    <li class="nav-item px-3">
      <form method="post">
        <button type="submit" name="submit">Log Out</button>
    </form>
    </li>
    
  </ul>
</nav>
<center><div class="cyrcle">
</div>
<p id="demo"></p>
<p id="name">
   <?php echo $var_value; ?>
   </p>
</center>
    <script>
        var i = 0;  
        var txt = 'Welcome Home Dear,';
        var speed = 100;

        function typeWriter() {
        if (i < txt.length) {
            document.getElementById("demo").innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
        }
        typeWriter();
    </script>
</body>
</html>