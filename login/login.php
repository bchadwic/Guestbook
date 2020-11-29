<?php
/**
 *  login/login.php
 *  Ben Chadwick
 *  11-25-2020
 *  Login form for demo purposes
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// If the form has been submitted
$err = false;
$username = "";
// should be moved above public_html
require('logincreds.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the username
    $username = strtolower(trim($_POST['username']));
    $password = trim($_POST['password']);

    // If they are correct

    if ($username == $adminUser && $password == $adminPassword){
        $_SESSION['loggedin'] = true;
        header("location: ../admin.php");

    }

    // Set an error
    $err = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <style>
        .err {
            color: darkred;
        }
    </style>
</head>
<body>
<div class="container">

    <h1>Login Page</h1>

    <form action="#" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username;?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        <?php
                if($err){
                echo '<span class="err">Incorrect login</span><br>';
                }
         ?>

        <button type="submit" class="btn btn-primary">Login</button>
        <a href="../index.php" class="btn btn-primary" role="button">Form</a>
    </form>

</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
