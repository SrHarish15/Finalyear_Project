<?php
include 'connection.php';
// $connection=mysqli_connect("localhost:3307","root","");
// $db=mysqli_select_db($connection,'demo');
if(isset($_POST['sign']))
{

    $username=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];

    $pass=password_hash($password,PASSWORD_DEFAULT);
    $sql="select * from login where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);
    if($num==1){

        echo "<h1><center>Account already exists</center></h1>";
    }
    else{
    
    $query="insert into login(name,email,password,gender) values('$username','$email','$pass','$gender')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
      
       
        header("location:signin.php");
       
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
        
    }
}


   
}
?>



<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<style>
    body{
        background:white;
    }
    .regform{
      margin-top:50px;
      border: 2px solid rgba(255,255,255,0.1);
      box-shadow: 10px 10px 40px rgba(8,7,16,0.6);
    }
    input{
        border: 2px solid rgba(255,255,255,0.1);
        box-shadow: 5px 5px 10px rgba(8,7,16,0.6);
        
    }
    label{
        font-size:19px;
   
    }
    #heading{
        font-family:cursive;
    }
</style>
    
</head>
<body>

    <div class="container">
    <div class="regform">
       
        <form action=" " method="post">
      
            
            <p id="heading">Create your account</p>
            
            <div class="input">
                <label class="textlabel" for="name">User name</label><br>
                
                <input type="text" id="name" name="name"  style="margin-top:10px;" required/>
             </div>
             <div class="input">
                <label class="textlabel" for="email">Email</label>
                <input type="email" id="email" name="email"  style="margin-top:10px;" required/>

        
        
              

             </div>
             <label class="textlabel" for="password">Password</label>
             <div class="password">
              
                <input type="password" name="password" id="password"  style="margin-top:10px;" required/>
                <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>                
			
             </div>
    
             <div class="radio">
                
                <input type="radio" name="gender" id="male" value="male" style="border:none;box-shadow:none" required/>
                <label for="male" >Male</label>
                <input type="radio" name="gender" id="female" value="female" style="border:none;box-shadow:none">
                <label for="female" >Female</label>

             </div>
             <div class="btn">
                <button type="submit" name="sign" style="background:lightgray;color:black;font-size:20px">Continue</button>
             </div>
       
                
            <div class="signin-up">
                 <p style="font-size: 20px; text-align: center;">Already have an account? <a href="signin.php"> Sign in</a></p>
             </div>
         

        </form>
        </div>
        <!-- <div class="right">
            <img src="cover.jpg" alt="" width="800" height="700">
        </div> -->
       
    </div>
  

    <!-- <script src="login.js"></script> -->
    <script src="admin/login.js"></script>
       
</body>
</html>