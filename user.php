<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        header(('location:login.php'));
    }
?>

<html>

    <head>
        <title>User Page</title>
    </head>
    <body>
        <h1>User Page</h1>
        <h3>welcome user</h3>
        <p>Hello everyone I'm a user </p>
    </body>
<a href="logout.php">
            <button type="submit" name="dangxuat">
                Đăng xuất
            </button>
        </a>
</html>
   