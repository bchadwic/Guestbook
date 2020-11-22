
<?php
/*
ini_set('display_errors', 1);
error_reporting(E_ALL);*/

$database = "bchadwi1_grc";
$username = "bchadwi1_grcuser";
$password = "JheZQG7B8fG2VW9";
$hostname = "localhost";

$cnxn = @mysqli_connect($hostname, $username, $password, $database)
or die("There was a problem");

require('functions.php');
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="images/icon.png">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <title>Thank You</title>
</head>
<body>
<h1 class="jumbotron text-center display-3 titleJumbotron">Thank You!</h1>


<?php


$jobTitle = $_POST['jTitle'];
$company = $_POST['company'];
$comment = $_POST['commentArea'];


$isValid = true;

if(!empty($_POST['fName'])){
    $fname = $_POST['fName'];
} else {
    $isValid = false;
    echo "<h4 class='text-center'>Please enter a first name</h4>";
}

if(!empty($_POST['lName'])){
    $lname = $_POST['lName'];
} else {
    $isValid = false;
    echo "<h4 class='text-center'>Please enter a last name</h4>";
}

$email = "";

if(!(!isset($_POST['mailCheck']) && $_POST['email'] == "")){
    if(!validMail($_POST['email'])){
        echo "<h4 class='text-center'>Please put in a valid email</h4>";
        $isValid = false;
    } else {
        $email = $_POST['email'];
    }
} else {
    $email = $_POST['email'];
}

if(validLinkedIn($_POST['linkedIn'])){
    $linkedIn = $_POST['linkedIn'];
} else {
    echo "<h4 class='text-center'>Please enter a valid LinkedIn link</h4>";
    $isValid = false;
}


if(isset($_POST['mailCheck'])){
        $mailCheck = $_POST['mail'];
} else {
    $mailCheck = "No";
}

$meetType = $_POST['meetType'];
if($meetType == "3") {
    if (!empty($_POST['other'])) {
        $meetType = $_POST['other'];
        } else {
            echo "<h4 class='text-center'>Please enter a valid meet type</h4>";
            $isValid = false;
        }
}  else if (validMeetType($meetType)){
    $meetType = $_POST['meetType'];
} else {
    echo "<h4 class='text-center'>Please enter a valid meet type</h4>";
    $isValid = false;
}

$fname = mysqli_real_escape_string($cnxn, $fname);
$lname = mysqli_real_escape_string($cnxn, $lname);
$job_title = mysqli_real_escape_string($cnxn, $jobTitle);
$company = mysqli_real_escape_string($cnxn, $company);
$linked = mysqli_real_escape_string($cnxn, $linkedIn);
$email = mysqli_real_escape_string($cnxn, $email);
$meet = mysqli_real_escape_string($cnxn, $meetType);
$message = mysqli_real_escape_string($cnxn, $comment);
$mailing = mysqli_real_escape_string($cnxn, $email);

if(!$isValid){
    return;
} else {
    echo "<h4 class='text-center'>First name is $fname<h4>";
    echo "<h4 class='text-center'>Last name is $lname<h4>";
    echo "<h4 class='text-center'>Email is $email<h4>";
    echo "<h4 class='text-center'>Job is $jobTitle<h4>";
    echo "<h4 class='text-center'>Company is $company<h4>";
    echo "<h4 class='text-center'>Linkedin is $linkedIn<h4>";
    echo "<h4 class='text-center'>Meet type is $meetType<h4>";
    echo "<h4 class='text-center'>Comment is $comment<h4>";
    echo "<h4 class='text-center'>Mail check is $mailCheck<h4>";
}

$sql = "INSERT INTO guestbook(`FirstName`, `LastName`, `Email`, `JobTitle`, `Company`, `LinkedIn`, `MeetType`, `Comment`,`MailList`)
                        VALUES ('$fname','$lname','$email','$jobTitle','$company','$linkedIn','$meetType','$comment','$mailCheck')";

$success = mysqli_query($cnxn, $sql);
if(!$success) {
    echo "<p>Something went wrong</p>";
    return;
}
?>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>
</html>
