<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    

<?php
    session_start();
    include 'connectdtb.php';
   
    $error = "";

    if(isset($_POST['dangnhap'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

         //Kiem tra email hoặc pass có tồn tại hay không
        if(empty($email) || empty($password)) {
            $error = "❌ Email hoặc password không được để trống";
        } else {
            // Kiểm tra xem email có tồn tại không
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);

            if($user && $password == $user['password']) {
                $_SESSION['email'] =$email;
                $_SESSION['role'] = $user['role'];

                 // Điều hướng theo role
                 if($user['role'] == 1) {
                    header('location:admin.php');
                 } else if ($user['role'] == 2) {
                    header('location:manager.php');
                 } else {
                    header('location:user.php');
                 }
                 exit();
            } 
            else {
                $error = "❌ Email hoặc password không chính xác";	
            }
        } 
    }
?>

<form action="login.php" method="POST">
   <div class="flex-label">
   <label>Email</label>
   <input type="text" name="email"> 
   </div>
    <br>
    <label>Password</label>
    <input type="password" name="password">
    <br>
    <button type="submit" name="dangnhap">
        Login
    </button>
    <button type="submit" name="resect">
        Reload
    </button>

    <div class="if-you-dont-have-an-account">
        Nếu bạn chưa có tk >  <a href="register.php"> register</a>
    </div>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
</form>


</body>
</html>