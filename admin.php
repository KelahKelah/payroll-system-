<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!-- Mobile first style to render proper zooming effect -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- comenting out the default bootstrap -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script> -->
<link rel="stylesheet" type="text/css" href="/css/style.css"/>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"/>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <style type="text/css">
        .wrapper{
            width: 850px;
            /* height: 1400px; */
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        table {
            background: white;
        }
        body {
           font-family: Roboto;
           background: #003366;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

          <!-- menu starts here  -->
         <div class="container">
        <ul class="nav nav-tabs">
         <li class="active"><a href="home.php">Home</a></li>
          <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="admin.php">Administration <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="#">Add New Admin</a></li>
         <li><a href="#">Add New Employee</a></li>
         <li><a href="#">View All Employee</a></li>                           
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
          <li><a href="salary.php">My Salary</a></li>
       <li><a href="#">Logout</a></li>
         </ul>
        </div>
         <!-- menu ends here -->



         <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" style="color:white";>Employees Details</h2>
                        <a href="create.php" class="btn btn-primary pull-right">Add New Employee</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM employees";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            // table-responsive class is for a responsive table on mobile device
                            echo "<table class='table table-bordered table-hover table-responsive'>";
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>#</th>";
                                    echo "<th>Name</th>";
                                    echo "<th>Employee_id</th>";
                                    echo "<th>asset</th>";
                                    echo "<th>Contract_type</th>";
                                    echo "<th>Project_Location</th>";
                                    echo "<th>Account_Number</th>";
                                    echo "<th>Pension_pin</th>";
                                    echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['employee_id'] . "</td>";
                                        echo "<td>" . $row['asset'] . "</td>";
                                        echo "<td>" . $row['contract_type'] . "</td>";
                                        echo "<td>" . $row['project_location'] . "</td>";
                                        echo "<td>" . $row['acc_number'] . "</td>";
                                        echo "<td>" . $row['pension_pin'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
           </div>
         </div>    
</body>
</html>