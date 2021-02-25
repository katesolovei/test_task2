<?php
include "funcs_sec_task.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guest Book</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h2 class="title"><p>Guest Book</p></h2>
<table>
    <?php
    if (isset($_POST['submit'])) {
        $user_name = test_input($_POST['userName']);
        $email = test_input($_POST['email']);
        $message = test_input($_POST['message']);
        $create_date = date('Y-m-d H:i:s');
        $patternName = '/^[A-Za-z0-9]+$/i';
        $patternEmail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
        if (validation($patternName, $user_name) && validation($patternEmail, $email)) {
            saveMessage($user_name, $email, $message, $create_date);
        }
    }
if(isset($_POST['submit_log_out'])) updateAdminStat(0);
    $list = getMessages();

    if ($list) :?>
        <div>
        <?php foreach ($list as $mess): ?>
            <div>
                <div class="us_info"><?php echo $mess['user_name'] ?></div>
                <div class="us_info"><?php echo $mess['email'] ?></div>
                <div class="us_info"><?php echo $mess['date_create'] ?></br></div>
            </div>
            <div class="message"><?php echo $mess['message'] ?></div>
            </div>
        <?php endforeach;
    endif;
    //    }
    ?>
</table>
<div class="title">
    <form name="guestForm" action="guest_book.php" method="post" id="guestForm">
        <div>
            <div>
                <input class="form_class input_field" type="text" placeholder="Name" name="userName" required
                       pattern="[A-Za-z0-9]*" title="Allows only letters and numbers">
            </div>
            <div>
                <input class="form_class input_field" type="email" placeholder="Email" name="email" required
                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Input your email as example@ex.ex">
            </div>
            <div>
                <textarea class="form_class input_field" placeholder="Input your message" name="message"
                          required></textarea>
            </div>
            <div>
                <input class="form_class submit_btn" type="submit" name="submit" value="Send">
            </div>
        </div>
    </form>
    <a href="admin_sing_in.php">Are you admin?</a>
</div>
</body>
</html>
