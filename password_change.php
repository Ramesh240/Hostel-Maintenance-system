<?php
session_start(); 
if (empty($_SESSION['sess_user'])) {
    header('Location: ./index.php');
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hostel Maintenance Module</title>
    
    <link rel="stylesheet" type="text/css" href="./Css/style.css">
    <link rel="stylesheet" type="text/css" href="./Css/style_password_change.css">
    <link rel="stylesheet" type="text/css" href="./Css/bootstrap.min.css">
  </head>

  <body>
    <nav class="navbar navbar-dark navbar-expand-lg d-flex">
      <a class="navbar-brand bd-highlight" href="./home.php">Hostel Maintenance Module</a>
    </nav>

    <form method="POST" action="">
      <?php
      if(isset($_POST["submit"])){
        if(!empty($_POST['pass1']) && !empty($_POST['pass2']) && !empty($_POST['pass3'])){
            $user=$_SESSION['sess_user'];
            $pass1=$_POST['pass1'];
            $pass2=$_POST['pass2'];
            $pass3=$_POST['pass3'];
            $con=mysqli_connect('localhost','root','','users') or die(mysql_error());
            mysqli_select_db($con,'users') or die("cannot select DB");
            $query=mysqli_query($con,"SELECT * FROM login WHERE username='".$user."' AND password='".$pass1."'");
            $numrows=mysqli_num_rows($query);
            if($numrows!=0){
                while($row=mysqli_fetch_assoc($query)){
                    $dbusername=$row['username'];
                    $dbpassword=$row['password'];
                }
                if($user == $dbusername && $pass1 == $dbpassword){
                    if($pass2 == $pass3){
                        $query=mysqli_query($con,"UPDATE login SET password='$pass2' WHERE username='$user'");

                        /* Redirect browser */
                        header("Location: ./index.php");
                    }
                    else{
                        echo "<p class='error'>*Feilds new password and confirm password must be same!</p>";
                    }
                }
            }
            else{
                echo "<p class='error'>*Invalid current password!</p>";
            }
        }
        else{
            echo "<p class='error'>*All fields are mandatory!</p>";
        }
      }  
      ?>
      <div class="row m-4 p-2">
        <img class="col-md-3" src="./Images/http.svg" alt="Lock"></img>
        <input class="col-md-9" type="password" name="pass1" placeholder="Current Password">
      </div>
      <div class="row m-4 p-2">
        <img class="col-md-3" src="./Images/http.svg" alt="Lock"></img>
        <input class="col-md-9" type="password" name="pass2" placeholder="New Password">
      </div>
      <div class="row m-4 p-2">
        <img class="col-md-3" src="./Images/http.svg" alt="Lock"></img>
        <input class="col-md-9" type="password" name="pass3" placeholder="Confirm Password">
      </div>
      <button type="submit" name="submit" class="btn btn-outline-dark m-4 p-1"><img class="col-md-3" src="./Images/change.svg" alt="Lock"></img>&nbsp;Change</button>
    </form>
  </body>

  <div class="footer">
    <p>
      &copy; All Rights reserved to <a href="http://www.rvrjcce.ac.in/">RVR &amp; JC College of Engineering</a>, Chowdavaram, Guntur - 522019.&nbsp;
      <a href="./site_credits.php">Site Credits</a>
    </p>
  </div>
</html>