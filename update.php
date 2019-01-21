<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $employee_id = $asset = $contract_type = $project_location = $acc_number = $pension_pin = "";
$name_err = $employee_id_err = $asset_err = $contract_type_err = $project_location_err = $acc_number_err = $pension_pin_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // validate employee id
    $input_employee_id = trim($_POST["employee_id"]);
    if(empty($input_employee_id)) {
        $employee_id_err = "please enter a valid id." ;
    } else{
        $employee_id = $input_employee_id;
    }

    // validate asset
    $input_asset = trim($_POST["asset"]);
    if(empty($input_asset)){
        $asset_err = "please enter a value.";
    } else{
        $asset = $input_asset;
    }

    // validate contract type
    $input_contract_type = trim($_POST["contract_type"]);
    if(empty($contract_type)){
        $contract_type = "please enter a value";
    } else{
        $contract_type = $input_contract_type;
    }

    // Validate address address
    $input_project_location = trim($_POST["project_location"]);
    if(empty($input_project_location)){
        $project_location_err = "Please enter an location.";     
    } else{
        $project_location = $input_project_location;
    }
    
    // Validate salary
    $input_acc_number = trim($_POST["acc_number"]);
    if(empty($input_acc_number)){
        $acc_number_err = "Please enter your acc number amount.";     
    } elseif(!ctype_digit($input_acc_number)){
        $acc_number_err = "Please enter a positive value.";
    } else{
        $acc_number = $input_acc_number;
    }
    
    // validate pension pin
    $input_pension_pin = trim($_POST["pension_pin"]);
    if(empty($input_pension_pin)){
        $pension_pin_err = "please enter the pension pin.";
    } else{
        $pension_pin = $input_pension_pin;
    }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($employee_id_err) && empty($asset_err) && empty($contract_type_err) && 
    empty($project_location_err) && empty($acc_number_err) && empty($pension_pin_err)){
        // Prepare an update statement
        $sql = "UPDATE employees SET name=?, employee_id=?, asset=?, contract_type=?, project_locatio=?, acc_number=?, pension_pin?, WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssi", $param_name, $param_employee_id, $param_contract_typ, $param_project_location, 
            $param_acc_number, $param_pension_pin, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_employee_id = $employee_id;
            $param_asset = $asset;
            $param_contract_type = $contract_type;
            $param_project_location = $project_location;
            $param_acc_number = $acc_number;
            $param_pension_pin = $pension_pin;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: admin.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
// defining $link
$link = "";

        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $employee_id = $row["employee_id"];
                    $asset = $row["asset"];
                    $contract_type = $row["contract_type"];
                    $project_location = $row["project_location"];
                    $acc_number = $row["acc_number"];
                    $pension_pin = $row["pension_pin"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        body {
           font-family: Roboto;
           background: #003366;
           color: white;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>

                        </div><div class="form-group <?php echo (!empty($employee_id_err)) ? 'has-error' : ''; ?>">
                            <label>Employee Id</label>
                            <input type="text" name="employee_id" class="form-control" value="<?php echo $employee_id; ?>">
                            <span class="help-block"><?php echo $employee_id_err;?></span>

                        </div><div class="form-group <?php echo (!empty($asset_err)) ? 'has-error' : ''; ?>">
                            <label>Asset</label>
                            <input type="text" name="asset" class="form-control" value="<?php echo $asset; ?>">
                            <span class="help-block"><?php echo $asset_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($contract_type_err)) ? 'has-error' : ''; ?>">
                            <label for="sel1">Select Contract Type:</label>
                                <select name="contract_type" class="form-control" id="sel1"><?php echo $contract_type; ?>
                                <option>Paco Support</option>
                                <option>Log Data</option>
                                <option>HSSE Services</option>
                                <option>Geo Information Support</option>
                                </select>
                                <span><?php echo $contract_type_err;?></span>
                        </div>   

                        <div class="form-group <?php echo (!empty($project_location_err)) ? 'has-error' : ''; ?>">
                            <label for="sel1">Project Location</label>
                                <select name="contract_type" class="form-control" id="sel1"><?php echo $project_location; ?>
                                <option>Agbada Rumuahia</option>
                                <option>Obigbo</option>
                                <option>Lagos</option>
                                <option>Shell Ph</option>
                                </select>
                                <span><?php echo $project_location_err;?></span>
                        </div>   

                        <div class="form-group <?php echo (!empty($acc_number_err)) ? 'has-error' : ''; ?>">
                            <label>Account Number</label>
                            <input type="text" name="acc_number" class="form-control" value="<?php echo $acc_number; ?>">
                            <span class="help-block"><?php echo $acc_number_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($pension_pin_err)) ? 'has-error' : ''; ?>">
                            <label>Pension Pin</label>
                            <input type="text" name="pension_pin" class="form-control" value="<?php echo $pension_pin; ?>">
                            <span class="help-block"><?php echo $pension_pin_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

                        