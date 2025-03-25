<?php
    session_start();
    if(isset($_SESSION['email'])) {
        header('location:admin.php');
    }


    if(isset($_POST['dangnhap'])) {
       $email = $_POST['email'];
       $password = $_POST['password'];
       

        if($email == 'admin@gmail.com' && $password == '123456') {
            $_SESSION['email'] = $email;
            header('Location:admin.php');
           
        } else if ($email == 'chinh@gmail.com' || $email == 'dai@gmail.com' && $password == '123456') {
            header('Location:user.php');
        } else {
            echo "failed to login";
        }
    };
?>


<form action="login.php" method="POST">
    <label>Email</label>
    <input type="text" name="email"> 
    <br>
    <label>Password</label>
    <input type="password" name="password">
    <br>
    <button type="submit" name="dangnhap">
        Login
    </button>
</form>
