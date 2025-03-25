<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        header(('location:login.php'));
    }
?>

<html>
    <head>
        <title>Admin Page</title>
    </head>
    <body>
        <h1>Admin Page</h1>

        <a href="logout.php">
            <button type="submit" name="dangxuat">
                Đăng xuất
            </button>
        </a>
    </body>
</html>