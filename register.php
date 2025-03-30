<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/register.css">
</head>
<body>
    
<?php
    include 'connectdtb.php';

    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
        if(mysqli_query($conn, $sql)) {
           header('location:login.php');
        } else {
            echo "Dang ky that bai" . mysqli_error($conn);
        }
    }
?>
<form action="register.php" method="POST">
    <label>Tên:</label>
    <input type="text" name="name" required><br>
    
    <label>Email:</label>
    <input type="email" name="email" required><br>
    
    <label>Mật khẩu:</label>
    <input type="password" name="password" required><br>
    
    <label>Chọn Role:</label>
    <select name="role" class="role">
        <option value="0">User</option>
        <option value="1">Admin</option>
        <option value="2">Manager</option>
    </select><br>
    <button type="submit" name="register">Đăng Ký</button>
</form>
</body>
</html>