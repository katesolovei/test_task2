<?php
include "funcs_sec_task.php";

if (isset($_POST['singIn'])) {
    $login = test_input($_POST['adminLogin']);
    $pass = test_input($_POST['password']);
    if (checkAdmin($login, $pass)) {
        updateAdminStat(1);} else {
        updateAdminStat(0);
        header("Location: admin_sing_in.php");
    }
}

if ((isset($_POST['update']))) {
    $user_name = test_input($_POST['userName']);
    $email = test_input($_POST['email']);
    $message = test_input($_POST['message']);
    $id = test_input($_POST['id']);
    $patternName = '/^[A-Za-z0-9]+$/i';
    $patternEmail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
    if (validation($patternName, $user_name) && validation($patternEmail, $email)) {
        updateMessage($id, $user_name, $email, $message);
    }
}

if (getAdminStat() == '1'):?>
    <!DOCTYPE html>
    <html>
<head>
    <title>Guest Book</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<h2 class="title"><p>Guest Book</p></h2>
<table>
    <?php
    $list = getMessages();

    if ($list) :?>
        <div>
        <?php foreach ($list as $mess): ?>
            <tr>
                <td>
                    <div class="us_info"><?php echo $mess['user_name']; ?></div>
                </td>
                <td>
                    <div class="us_info"><?php echo $mess['email']; ?></div>
                </td>
                <td>
                    <div class="us_info"><?php echo $mess['date_create']; ?></br></div>
                </td>
                <td rowspan="2">
                    <a class="us_info edit_link" href="edit.php?id=<?php echo $mess['id']; ?>">Edit</a></td>
            </tr>
            <tr>
                <td>
                    <div class="message"><?php echo $mess['message'] ?></div>
                </td>
            </tr>
            </div>
        <?php endforeach; ?>
        </div>
    <?php endif; ?>
</table>
<form action="guest_book.php" method="post" class="title">
    <input class="form_class submit_btn"  type="submit" name="submit_log_out" value="Back to guest book">
</form>
<?php
endif; ?>