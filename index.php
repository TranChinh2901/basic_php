<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="xuly.php" method="POST">
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Enter your name">
                <br>
            <label for="">Email</label>
            <input type="text" name="email" placeholder="Enter your email">
            <br>
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Enter your password">
            <br>
            <label for="">Giới tính</label>
          <div>
            <input type="radio" name="gioitinh" value="Nam">Nam
            <input type="radio" name="gioitinh" value="Nữ">Nữ
          </div>
            <input type="submit" value="Submit">
        </form>
</body>
</html>