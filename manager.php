<?php
  session_start();
  if(!isset($_SESSION['email']) || $_SESSION['role'] != 2) {
        header('location:login.php');
  }
?>
<h1>Hello Manager</h1>
   <a href="logout.php">
            <button type="submit" name="dangxuat">
                Đăng xuất
            </button>
        </a>