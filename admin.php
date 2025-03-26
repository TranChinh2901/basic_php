<?php 
    session_start();
    if(!isset($_SESSION['email']) || $_SESSION['role'] != 1){
        header(('location:user.php'));
    }
?>

<html>
    <head>
        <title>Admin Page</title>
    </head>
    <body>
        <h1>Admin Page</h1>
        <h3>welcome admin</h3>
        <p>Hello everyone I'm a admin </p>
        <a href="logout.php">
            <button type="submit" name="dangxuat">
                Đăng xuất
            </button>
        </a>
    </body>
</html>