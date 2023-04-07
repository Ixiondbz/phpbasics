<?php include "../includes/functions.php"; ?>
<?php
connect_to_db();
?>
<?php
if (isset($_SESSION['user_email']) or isset($_SESSION['user_phone'])) {
    // kill all sessions
    // session_destroy();

    // set user session values to null
    
    $_SESSION['user_email']=null;
    $_SESSION['user_phone']=null;
    $_SESSION['user_full_name']=null;
    $_SESSION['user_type']=null;
    
    redirect('login.php');
} else redirect('index.php');
