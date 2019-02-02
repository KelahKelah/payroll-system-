<?php
	include("check.php");	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<!-- custom css -->
<link rel="stylesheet" href="css/style.css" type="text/css">

<!-- bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style>
body {
           font-family: Roboto;
           background: #003366;
        }

</style>

</head>
<body>
<!-- menu starts here  -->
  <nav>
        <ul class="nav nav-tabs">
         <li><a href="home.php">Home</a></li>
          <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="admin.php">Administration <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="admin.php">View All Employee</a></li>            
        <li><a href="#">Add New Admin</a></li>
         <li><a href="create.php">Add New Employee</a></li>
      </ul>
         </li>
         <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="salary.php">Salary Schdule<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="salary.php">View All</a></li>
           <li><a href="payslip.php">My Payslip</a></li>                     
          </ul>
         </li>
          <li><a href="#">Pensions</a></li>
       <li><a href="#">Logout</a></li>
         </ul>
        </nav>
         <!-- menu ends here -->


<h1 class="hello">Welcome <em><?php echo $login_user;?>!</em></h1>

<!-- background image -->
  <div class="container-fluid">
              <img src="images/3.jpg" style="width:auto;border:0;padding:0;margin:0;" alt="payroll">
          </div>
 <br><br>

<!-- categories start -->
<div class="text-center page-header">
<h1 style="color:#003366;">Payroll Management System</h1>
</div>
<br>
<br>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="images/1.png" alt="Paris" width="400" height="300"><br>
        <h2><strong>Manage Payroll</strong></h2>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="images/2.png" alt="New York" width="400" height="300"><br>
        <h2><strong>Manage Employees</strong></h2>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="images/1.png" alt="San Francisco" width="400" height="300"><br>
        <h2><strong>Manage Payslips</strong></h2>
      </div>
    </div>
  </div><br>
  
<a href="logout.php" style="font-size:18px">Logout?</a>
</body>
</html>





