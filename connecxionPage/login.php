<?php
        ////////////create an account////////////
        session_start();
        if(isset($_POST['submit'])) {
            $_SESSION['userName'] = $_POST['Name'] ;
            $plaintext_password = $_POST['password'];
            $hash = password_hash($plaintext_password, 
                    PASSWORD_DEFAULT);
            $user = new stdClass;
            $user->name =$_POST['Name'] ;
            $user->email = $_POST['email'];
            $user->licenseNumber = $_POST['licenseNumber'] ;
            $user->password = $hash ;
            $my_file = file_get_contents('data.json');
            $fileDecode = json_decode($my_file);
            array_push($fileDecode->users, $user);
            if(file_put_contents('data.json', json_encode($fileDecode))){
                header("Location: http://localhost/connecxionPage/home.php");
                exit();
            }
         
        }
        ////////////Log In To your account////////////
        if(isset($_POST['submitt'])) {
            $_SESSION['userName'] = $_POST['Name'] ;
            $username=$_POST['Name'] ;
            $pass=$_POST['pass'];
            $my_file = file_get_contents('data.json');
            $users = (array)json_decode($my_file);
            $msg = 'not found';
            foreach($users["users"] as $user) {

                if($user->name === $username){
                    if(password_verify($pass, $user->password)){
                        $msg='found';
                        header("Location: http://localhost/connecxionPage/home.php");
                        break;
                    }
                }
            }
            if($msg!='found'){
                echo "<script>alert('your email or password must be incorrect !');</script>";
            }
        }
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            background:url('./Capture222.PNG');
            background-size: cover;
            font-family: sans-serif;
            color:#FFFFFF;
        }
        .login, 
        .create{
            width: 50%;
            height: 400px;
            margin-top: 7%;
            margin-left: 25%;
            align-items: center;
            text-align: center;
            display:flex;
        }
        .create{
            display:none;
        }
        .form{
            width:60%;
            height:100%;
            background:#A3B0C2;
            text-align: center;
            padding: 5%;
        }
        .form h3{
            color: #000000;
            font-weight: bold;
        }
        #exampleFormControlInput1{
           margin-bottom: 3%;
           margin-top: 6%;
        }
        .socialmedia{
            display: flex;
            margin-left: 25%;
            margin-top: 8%;
        }
        .cyrcle{
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #112030;
            margin-left: 4%;
            cursor: pointer;
        }
        .cyrcle i{
            margin-top: 10px;
            color:#E90204;
        }
        form p{
            font-size: 13px;
            color: #8a8a8f;
            margin-top: 6%;
        }
        form a {
            display: block;
            font-size: 13px;
            color: #040444;
            float: right;
        }
        form button{
            width: 150px;
            height: 40px;
            border: 0px;
            background:#000000 ;
            color: #FFFFFF;
            display: block;
            border-radius: 5px;
            margin-top: 13%;
            /* margin-left: 20%; */
        }
        button span{
            font-size: 13px;
            font-weight: bold;
        }
        button i{
            font-size: 13px;
            margin-left: 10px;
        }
        .type{
            width:40%;
            height:100%;
            background: #000000;
            color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 3%;
        }
        .type p{
            font-size: 13px;
            color:#E5E8EE;
        }
        .type a{
            width: 120px;
            height: 30px;
            background: #9AA4C4;
            color: #030434;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            padding-top: 5px;
        }
    #createAccount input{
        margin-bottom: 3%;
    }
    #createAccount button{
        margin-top: 5%;
    }
    .create{
        position: absolute;
        top: 0;
        left: 0%;
    }
    #formColor{
        background:#04111C;
    }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<body>
    <!-- connetion interface -->
    <div class="login">
        <div class="form">
        <form method="post">
            <h3>Sign up to Platform</h3>
            <div class="socialmedia">
                <div class="cyrcle">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="cyrcle">
                    <i class="fab fa-google-plus-g"></i>
                </div>
                <div class="cyrcle">
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>
            <p>or use your email account</p>
            <input type="text" class="form-control" name="Name" id="exampleFormControlInput1" placeholder="Full Name" value=""> 
            <input type="password" class="form-control" name="pass" id="inputPassword" placeholder="Password">
            <a href="#">Forget your password ?</a>
            <center><button type="submit" name="submitt" id="connexionBtn"><span>Sign Up</span><i class="fas fa-sign-in-alt"></i></button></center>
        </form>
        </div>
        <div class="type">
            <h4>Welcome Back !</h4>
            <p>to keep in touch with us please enter your personel info </p>
            <a href="#" id="createPage">Create account</a>
        </div>
        
    </div>
    <!-- Create account interface -->
    <div class="create">
        <div class="type" id="formColor">
            <h4>Hello , Freind !</h4>
            <p> enter your account details and start a journey with Us </p>
            <a href="#"id="signUp">Sign Up</a>
        </div>
        <div class="form" id="createColor">
        <form id="createAccount" method="post">
            <h3>Create Account</h3>
            <p>enter your personel details to complete inscription successfuly</p>
            <input type="text" name="Name" class="form-control" id="" placeholder="Full Name">
            <input type="text" name="email" class="form-control" id="" placeholder="name@example.com">
            <input type="text" name="licenseNumber"class="form-control" id="" placeholder="License Number">
            <input type="password" name="password" class="form-control" id="" placeholder="Password">
            <center><button type="submit" name="submit" class="" ><span>Sign Up</span><i class="fas fa-user-alt"></i></button></center>
        </form>
        </div>
        
    </div>




    <!-- jquery link -->
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>

    <!-- js & jquery code -->
    <script>
        // movement from sign up form to create form 
        $('#createPage').click(function(){
            $('.login').css("display","none");
            $('.create').css("display","flex");
        })
        $('#signUp').click(function(){
            $('.create').css("display","none");
            $('.login').css("display","flex");
        })
        

    </script>

    
</body>
</html>