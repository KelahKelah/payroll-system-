<?php
session_start();
if(session_destroy())
{
header("Location: index.php");
}
 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
     body {
           font-family: Roboto;
           background: #003366;
           color: white;
        }
    </style> 
    <script src="main.js"></script>

</head>
<body>
    
<!-- menu starts here  -->
<div class="container">
  <ul class="nav nav-tabs">
    <li><a href="#">Home</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="admin.php">Administration <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Employees</a></li>
        <li><a href="#">Records</a></li>
        <li><a href="#">Reports</a></li>                        
      </ul>
    </li>
     <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Payslip<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Deductions</a></li>
        <li><a href="#">Bonuses</a></li>                     
      </ul>
    </li>
    <li><a href="#">Pensions</a></li>
    <li><a href="#">My Salary</a></li>
    <li><a href="login.php">Login</a></li> 
  </ul>
</div>
<!-- menu ends here -->

</body>
</html>





