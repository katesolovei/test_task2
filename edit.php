<?php
include "funcs_sec_task.php";

if (isset($_GET['id'])):?>
    <!DOCTYPE html >
    <html>
    <head>
        <title> Edit Post </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <h2 class="title"><p> Edit Post </p></h2>
    <div class="title">
        <?php
        $id = $_GET['id'];
        $post_info = getPost($id);
        ?>
        <form name="editForm" action="admin.php" method="post" id="editForm">
            <div>
                <?php foreach ($post_info as $post):?>
                <div>
                    <input class="form_class input_field" type="text" name="userName" value="<?php echo $post['user_name']?>" pattern="[A-Za-z0-9]*" title="Allows only letters and numbers">
                </div>
                <div>
                    <input class="form_class input_field" type="email" name="email" value="<?php echo $post['email']?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Input your email as example@ex.ex">
                </div>
                <div>
                <textarea class="form_class input_field" name="message"><?php echo $post['message']?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <div>
                    <input class="form_class submit_btn" type="submit" name="update" value="Update">
                </div>
    <?php endforeach;?>
            </div>
        </form>
    </div>
<?php endif; ?>