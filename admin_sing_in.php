<?php
include "funcs_sec_task.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Sing In</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<div class="title">
    <h2 class="title"><p>Admin sing in</p></h2>
    <form name="guestForm" action="admin.php" method="post" id="guestForm">
        <div>
            <div>
                <input class="form_class input_field" type="text" placeholder="Login" name="adminLogin" required>
            </div>
            <div>
                <input class="form_class input_field" type="password" placeholder="Password" name="password" required>
            </div>
            <div>
                <input class="form_class submit_btn" type="submit" name="singIn" value="Sing In">
            </div>
        </div>
    </form>
</div>