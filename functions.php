<?php
/*
 * Ben Chadwick
 * functions.php validates the guestbook inputs
 * created 11/21/20
 */

function validMail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}

function validLinkedIn($linkedin)
{
    if($linkedin != "") {
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $linkedin)) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function validMeetType($meetType)
{
    if ($meetType == "0") {
        return false;
    }
    $validMeet = array("Meetup", "Job Fair", "No Meet");
    foreach ($meetType as $meetArray) {
        if (!in_array($meetArray, $validMeet)) {
            return false;
        }
    }
    return true;
}
