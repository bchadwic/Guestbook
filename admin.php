<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

if(!isset($_SESSION['loggedin'])){
    $_SESSION[] = $_SERVER['SCRIPT_URI'];
    header("location: login/login.php");
}

$database = "bchadwi1_grc";
$username = "bchadwi1_grcuser";
$password = "JheZQG7B8fG2VW9";
$hostname = "localhost";

$cnxn = @mysqli_connect($hostname, $username, $password, $database)
or die("There was a problem");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
          crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

</head>
<body>


<h1 class="jumbotron titleJumbotron">Admin Page</h1>
<div class="container d-flex justify-content-center" id="main">
    <table id="guestbook-table" class="display" style="width:80%">
        <thead>
        <tr>
            <td>Date</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Job Title</td>
            <td>Company</td>
            <td>LinkedIn</td>
            <td>Meet Type</td>
            <td>Comment</td>
            <td>Mail List</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM guestbook";
        $result = mysqli_query($cnxn, $sql);

        foreach ($result as $row) {
            $date = date("M d, Y g:i a", strtotime($row['Date']));
            $firstName = $row['FirstName'];
            $lastName = $row['LastName'];
            $email = $row['Email'];
            $jobTitle = $row['JobTitle'];
            $company = $row['Company'];
            $linkedIn = $row['LinkedIn'];
            $meetType = $row['MeetType'];
            $comment = $row['Comment'];
            $mailList = $row['MailList'];
            

                echo "<tr>";
                echo "<td>$date</td>";
                echo "<td>$firstName</td>";
                echo "<td>$lastName</td>";
                echo "<td>$email</td>";
                echo "<td>$jobTitle</td>";
                echo "<td>$company</td>";
                echo "<td>$linkedIn</td>";
                echo "<td>$meetType</td>";
                echo "<td>$comment</td>";
                echo "<td>$mailList</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
        </table>

</div>

<div class="container d-flex justify-content-center mb-5">
    <a href="index.php" class="btn btn-primary" role="button">Form</a>
    <a href="login/logout.php" class="btn btn-primary ml-5" role="button">Logout</a>
</div>



<script crossorigin="anonymous" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function() {
        $('#guestbook-table').DataTable( {
            "order": [[ 1, "desc" ]]
        } );
    } );

</script>
</body>
</html>
