<?php
include "config.php";

function validation($pattern, $data)
{
    preg_match($pattern, $data) ? $res = true : $res = false;
    return $res;

}

function checkAdmin($login, $pass)
{
    $link = connectToDB();

    $query = "SELECT * FROM admin";

    $result = mysqli_query($link, $query);
    $res = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $res[] = $row;
    }
    (($login == $res[0]['login']) && ($pass == $res[0]['password'])) ? $answ = true : $answ = false;

    return $answ;
}

function saveMessage($user_name, $email, $message, $date)
{
    $link = connectToDB();

    $query = "INSERT INTO guest_book(user_name, email, message, date_create) VALUES ('$user_name', '$email', '$message', '$date')";
    $result = mysqli_query($link, $query);
    $result ? $res = true : $res = false;
    return $res;
}

function getMessages()
{
    $link = connectToDB();

    $query = "SELECT * FROM guest_book ORDER BY date_create DESC";

    $result = mysqli_query($link, $query);
    $res = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $res[] = $row;
    }
    return $res;
}

function getPost($id)
{
    $link = connectToDB();

    $query = "SELECT user_name, email, message FROM guest_book WHERE id='$id'";

    $result = mysqli_query($link, $query);
    $res = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $res[] = $row;
    }
    return $res;
}

function updateAdminStat($stat)
{
    $link = connectToDB();

    $query = "UPDATE admin SET sing_in='$stat'";

    mysqli_query($link, $query) ? $res = true : $res = false;
    return $res;
}

function getAdminStat()
{
    $link = connectToDB();

    $query = "SELECT sing_in FROM admin";

    $result = mysqli_query($link, $query);
    $res = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $res[] = $row;
    }
    return $res[0]['sing_in'];
}

function updateMessage($id, $user_name, $email, $message)
{
    $link = connectToDB();

    $query = "UPDATE guest_book SET user_name='$user_name',email='$email',message='$message' WHERE id= '$id'";

    mysqli_query($link, $query) ? $res = true : $res = false;
    return $res;
}

function connectToDB()
{
    $link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    return $link;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}