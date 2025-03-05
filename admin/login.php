 <?php
//  $connection=mysqli_connect("localhost:3307","root","");
// $db=mysqli_select_db($connection,'demo');
include '../connection.php';
$acc=0;
$msg=0;
if(isset($_POST['signup']))
{

    $username=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $location=$_POST['district'];

    $pass=password_hash($password,PASSWORD_DEFAULT);
    $sql="select * from admin where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        $acc=1;
        // echo "<h1> already account is created </h1>";
        // echo '<script type="text/javascript">alert("already Account is created")</script>';
        // echo "<h1><center>Account already exists</center></h1>";
    }
    else{
    
    $query="insert into admin(name,email,password,location) values('$username','$email','$pass','$location')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
        // $_SESSION['email']=$email;
        // $_SESSION['name']=$row['name'];
        // $_SESSION['gender']=$row['gender'];
       
        // header("location:#");
        // echo "<h1><center>Account does not exists </center></h1>";
        //  echo '<script type="text/javascript">alert("Account created successfully")</script>'; -->
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
        
    }
}


   
}
 ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="login.css">
         
    <!--<title>Login & Registration Form</title>-->
<style>
  *{
    padding:0;
    margin: 0;
    box-sizing: border-box;
  }
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 58px;
    font-size: 14px;
    font-weight: 300;
}
input{
  
}
form *{
    font-family: 'Poppins',sans-serif;
    color:black;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
    color:black;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
button:hover{
  cursor:pointer;
}

</style>
  </head>
<body>
    
    <div class="container">
        <div class="forms">
        
            <div class="form login">
                <?php
                if($msg==1){
                    echo '<p ><center style=\"color:#06C167;\">Account created successfully</center></p>';
                }
                ?>
            <?php
                if($acc==1){
                  echo ' <p ><center style=\"color:crimson;\">Account already exists</center></p>';
                }
                ?>
     <div class="log">
               

                <form action=" " method="post">
                <h3 class="title">Login</h3>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email"  style=" border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 10px 20px rgba(8,7,16,0.6);" crequired>
                       
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password" placeholder="Enter your password" style=" border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 10px 20px rgba(8,7,16,0.6);" required>
                     
                    </div>
                    
                        <button type="submit" name="Login" style="color:black;font-size:18px;margin-top:60px;padding:15px 140px; border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 10px 10px 10px rgba(8,7,16,0.6);">Login</button>
                    
                </form>
            </div>
            
</div>
</body>
</html>  
                <?php
                if($msg==1){
                  echo '<p ><center style=\"color:crimson;\">Account already exists</center></p>';
                }
                ?>
        

<?php


$msg=0;
if (isset($_POST['Login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sanitized_emailid =  mysqli_real_escape_string($connection, $email);
  $sanitized_password =  mysqli_real_escape_string($connection, $password);
  // $hash=password_hash($password,PASSWORD_DEFAULT);

  $sql = "select * from admin where email='$sanitized_emailid'";
  $sql = "select * from admin where password='$sanitized_password'";
  $result = mysqli_query($connection, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($sanitized_password, $row['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['location'] = $row['location'];
        header("location:main.html");
      } else {
        $msg=1;
      }
    }
  } else {
    echo "<h1><center>Account does not exists </center></h1>";
  }
}
?>
