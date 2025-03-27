<?php
    session_start();
    include 'connectdtb.php';

    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        //kiem tra ton tai hay khong
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        if($password == $user['password']){
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $user['role'];
            
            if($user['role'] == 1) {
                header('location:admin.php');
            } else if ($user['role'] == 2) {
                header('location:manager.php');
            } else {
                header('location:user.php');
            }
            exit();
        } else {
            echo "Dang nhap that bai";
        }
    }
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
    <a href="register.php"> register</a>
    <button type="submit" name="resect">
        Reset
    </button>
</form>
