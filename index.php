<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hostel Maintenance Module</title>
    
    <link rel="stylesheet" type="text/css" href="./Css/style.css">
    <link rel="stylesheet" type="text/css" href="./Css/style_index.css">
    <link rel="stylesheet" type="text/css" href="./Css/bootstrap.min.css">
  </head>

  <body>
  	<nav class="navbar navbar-dark navbar-expand-lg d-flex">
  		<a class="navbar-brand bd-highlight" href="./index.php">Hostel Maintenance Module</a>
	  </nav>

    <p class="logo"><img src="./Images/RVRJC.jpg" alt="Logo"></img></p>

    <form action="" method="POST" autocomplete="on">
      <?php
        if(isset($_POST["submit"])){
        if(!empty($_POST['user']) && !empty($_POST['pass'])){
            $user=$_POST['user'];
            $pass=$_POST['pass'];
            $con=mysqli_connect('localhost','root','','users') or die(mysql_error());
            mysqli_select_db($con,'users') or die("cannot select DB");
            $query=mysqli_query($con,"SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");
            $numrows=mysqli_num_rows($query);
            if($numrows!=0){
                while($row=mysqli_fetch_assoc($query)){
                    $dbusername=$row['username'];
                    $dbpassword=$row['password'];
                }
                if($user == $dbusername && $pass == $dbpassword){
                    session_start();
                    $_SESSION['sess_user']=$user;
                
                    /* Redirect browser */
                    header("Location: ./home.php");
                }
            }
            else{
                echo "<p class='error'>*Invalid username or password!</p>";
            }
        }
        else{
            echo "<p class='error'>*All fields are mandatory!</p>";
        }
      }  
      ?>
      <div class="row m-4 p-2">
        <img class="col-md-3" src="./Images/person.svg" alt="User"></img>
        <input class="col-md-9" type="text" name="user" id="main" placeholder="Username">
      </div>
      <div class="row m-4 p-2">
        <img class="col-md-3" style="height:25px;" src="./Images/http.svg" alt="Lock"></img>
        <input class="col-md-9" type="password" name="pass" placeholder="Password">
      </div>
      <button type="submit" value="Login" name="submit" class="btn btn-outline-dark m-4 p-1"><img class="col-md-3" src="./Images/login.svg" alt="Login"></img>&nbsp;Login</button>
    </form>

  </body>

  <div class="footer">
    <p>
      &copy; All Rights reserved to <a href="http://www.rvrjcce.ac.in/">RVR &amp; JC College of Engineering</a>, Chowdavaram, Guntur - 522019.&nbsp;
      <a href="./site_credits.php">Site Credits</a>
    </p>
  </div>
</html>