<!-- <!DOCTYPE html>
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
            <span class="error"><?php echo $errorName; ?></span>
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
</html> -->

<?php 
  // $cookieName = "user";
  // $cookieValue = "Nguyen Van A";
  // setcookie($cookieName, $cookieValue, time()+(86400), "/" );

  // // if(isset($_COOKIE[$cookieName])){
  // //   echo "Cookie " . $cookieName . " is set"
  // // }
  // if(isset($_COOKIE[$cookieName])) {
  //   echo "Cookie " . $cookieName . "Đang tồn tại";
  // } else {
  //   echo "Cookie " . $cookieName . "Không tồn tại";
  // }


  // session_start();
  // $_SESSION["name"] = "Nguyen Van A";

  // echo $_SESSION["name"];




  // $ip = "217.0.0.1";
  // if(filter_var($ip, FILTER_VALIDATE_IP)){
  //   echo "IP hop le";
  // } else {
  //   echo "IP khong hop le";
  // }



  $email = "Tranchinh@gmail.com";

  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Email hop le";
  } else {
    echo "Email khong hop le";
  }
?>