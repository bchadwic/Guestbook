
<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

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
    <title>Guest Book</title>
    <link rel="icon" type="image/png" href="images/icon.png">

    <!-- link the stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
        <!-- Create a jumbotron with Ben as the title -->
        <h1 class="jumbotron text-center display-3 titleJumbotron">Ben Chadwick</h1>

        <!-- Make a form section to take in all information pertaining to the person -->
        <form id="infoForm" action="confirmation.php" method="post">
        <fieldset class="form-group border p-2 shadow p-3 mb-5 bg-white rounded" id="aboutFieldset">
            <legend>Who are you?</legend>
                <div class="form-group">
                    <label for="fName">First Name</label>
                    <span id="requiredfName" class="d-none required">*required</span>
                    <input type="text" class="form-control" name="fName" id="fName">
                </div>
                <div class="form-group">
                    <label for="lName">Last Name</label>
                    <span id="requiredlName" class="d-none required">*required</span>
                    <input type="text" class="form-control" name="lName" id="lName">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <span id="requiredEmail" class="d-none required">*required</span>
                    <span id="requiredCorrectEmail" class="d-none required">*please enter a valid email</span>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="jTitle">Job Title</label>
                    <span id="requiredjTitle" class="d-none required">*required</span>
                    <input type="text" class="form-control" name="jTitle" id="jTitle">
                </div>
                <div class="form-group">
                    <label for="company">Company</label>
                    <span id="requiredCompany" class="d-none required">*required</span>
                    <input type="text" class="form-control" name="company" id="company">
                </div>
                <div class="form-group">
                    <label for="linkedIn">LinkedIn URL</label>
                    <span id="requiredlinkedIn" class="d-none required">*required</span>
                    <span id="requiredCorrectLinkedIn" class="d-none required">*please enter a valid LinkedIn URL</span>
                    <input type="text" class="form-control" name="linkedIn" id="linkedIn">
                </div>
        </fieldset>

        <!-- Make a form section that asks how I met them -->
        <fieldset class="form-group border p-2 shadow p-3 mb-5 bg-white rounded" id="howFieldset">
            <legend>How did we meet?</legend>
                <!-- Make a drop down menu that is responsive -->
                <div class="form-group">
                    <label for="meetType">Where did we meet?</label>
                    <span id="requiredSelection" class="d-none required">*please select an option</span><br>
                    <!-- if other is chosen the below other comment section will display -->
                    <select id="meetType" name="meetType" onchange="checkOption()">
                        <option value="0">-- Select --</option>
                        <option value="1">Meetup</option>
                        <option value="2">Job Fair</option>
                        <option value="3">Other</option>
                        <option value="4">We haven't met before</option>
                    </select>
                </div>
                <!-- responsive other comment section -->
                <div class="form-group d-none" id="otherInput">
                    <label for="other">Other (please specify)</label>
                    <input class="form-control" type="text" name="other" id="other">
                </div>
                <div class="form-group">
                    <label for="commentArea">Comments</label><br>
                    <textarea class="form-control" name="commentArea" id="commentArea" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="mailCheck" name="mailCheck">
                    <label for="mailCheck"> Please add me to your mailing list!</label>
                </div>
                <div class="form-group">
                    <input type="radio" name="mail" id="html">
                    <label for="html" class="mr-4">HTML</label>
                    <input type="radio" name="mail" id="text">
                    <label for="text">Text</label><br>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
        </fieldset>
        </form>

        <!-- import scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
        <script src="scripts/script.js"></script>
</body>
</html>
