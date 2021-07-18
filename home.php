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
    <link rel="stylesheet" type="text/css" href="./Css/style_home.css">
    <link rel="stylesheet" type="text/css" href="./Css/bootstrap.min.css">
  </head>

  <body>
  	<nav class="navbar navbar-dark navbar-expand-lg d-flex justify-content-between">
  	  <a class="navbar-brand bd-highlight" href="./home.php">Hostel Maintenance Module</a>
      <ul class="navbar-nav" style="padding-right: 2%">
  		  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="./Images/person.svg" alt="User"></img>&nbsp;
            <?php
            $name=$_SESSION['sess_user'];
            echo "$name";
            ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="./password_change.php"><img src="./Images/http.svg" alt="Lock"></img>&nbsp;Password Change</a></li>
            <li><a class="dropdown-item" href="./logout.php"><img src="./Images/logout.svg" alt="Logout"></img>&nbsp;Logout</a></li>
          </ul>
          </li>
  	  </ul>
    </nav>
    &nbsp;
    <nav class="navbar navbar-dark navbar-expand-lg d-flex justify-content-between" id="menu" style="height: 40px;">
      <ul class="navbar-nav">
        <li class="nav-item p-1">
          <button class="btn" onclick="home()"><img src="./Images/home.svg" alt="Home"></img>&nbsp;Home</button>
        </li>
        <li class="nav-item dropdown p-1">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="./Images/stats.svg" alt="Stats"></img>&nbsp;&nbsp;Statistics
          </a>
          <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" role="button" onclick="daily()" href="#">Daily Details</a></li>
            <li><a class="dropdown-item" role="button" onclick="monthly()" href="#">Monthly Details</a></li>
            <li><a class="dropdown-item" role="button" onclick="yearly()" href="#">Yearly Details</a></li>
          </ul>
        </li>
        <li class="nav-item p-1">
          <button class="btn" onclick="cp()"><img src="./Images/inventory.svg" alt="Inventory"></img>&nbsp;Consolidated Purchase</button>
        </li>
        <li class="nav-item p-1">
          <button class="btn" onclick="cis()"><img src="./Images/category.svg" alt="category"></img>&nbsp;Consolidated Item Issue</button>
        </li>
        <li class="nav-item dropdown p-1">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="./Images/summarize.svg" alt="Report"></img>&nbsp;Reports
          </a>
          <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" role="button" onclick="sr()" href="#">Sales Report</a></li>
            <li><a class="dropdown-item" role="button" onclick="iir()" href="#">Item Issue Report</a></li>
            <li><a class="dropdown-item" role="button" onclick="ir()" href="#">Itemwise Report</a></li>
          </ul>
        </li>
        <li class="nav-item p-1">
          <button class="btn" onclick="add()"><img src="./Images/add.svg" alt="Add"></img>&nbsp;Add Item</button>
        </li>
      </ul>
    </nav>
    &nbsp;
    &nbsp;
    <p id="main"></p>

    <script type="text/javascript" src="./Js/bootstrap.min.js"></script>
    <script>
        function home(){
            document.getElementById("main").innerHTML='Home'
        }
        function daily(){
            document.getElementById("main").innerHTML='Daily Details'
        }
        function monthly(){
            document.getElementById("main").innerHTML='Monthly Details'
        }
        function yearly(){
            document.getElementById("main").innerHTML='Yearly Details'
        }
        function cp(){
            document.getElementById("main").innerHTML='Consolidated Purchase'
        }
        function cis(){
            document.getElementById("main").innerHTML='Consolidated Item Issue'
        }
        function sr(){
            document.getElementById("main").innerHTML='Sales Report'
        }
        function iir(){
            document.getElementById("main").innerHTML='Item Issue Report'
        }
        function ir(){
            document.getElementById("main").innerHTML='Itemwise Report'
        }
        function add(){
            document.getElementById("main").innerHTML='Add Item'
        }
    </script>
  </body>

  <div class="footer">
    <p>
      &copy; All Rights reserved to <a href="http://www.rvrjcce.ac.in/">RVR &amp; JC College of Engineering</a>, Chowdavaram, Guntur - 522019.&nbsp;
      <a href="./site_credits.php">Site Credits</a>
    </p>
  </div>
</html>