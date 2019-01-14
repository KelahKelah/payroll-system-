<?php
include('login.php'); // Include Login Script
if ((isset($_SESSION['username']) != ''))
{
header('Location: home.php');
}
?>
 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login </title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
 
<body>
<h1>Login To Your Account</h1>
<div class="loginBox">
<br><br>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label>Username:</label><br>
<input type="text" name="username" placeholder="username" /><br><br>
<label>Password:</label><br>
<input type="password" name="password" placeholder="password" />  <br><br>
<input type="submit" name="submit" value="Login" />
</form>
<div class="error"><?php echo $error;?></div>
</div>
</body>
</html>




