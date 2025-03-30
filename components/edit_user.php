<?php 
    include '../connectdtb.php';  
     $message = "";
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = isset($_POST['password']) ? $_POST['password'] : ''; // Kiểm tra nếu password tồn tại

        $sql = "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $password, $id);
        
        if (mysqli_stmt_execute($stmt)) {
          $message = "<p class='success'>Cập nhật thành công!</p>";
           
        } else {
           $message = "<p class='error'>Lỗi khi cập nhật: " . mysqli_error($conn) . "</p>";
        }
        
        mysqli_stmt_close($stmt);
    }
?>

<html>
    <head>
        <title>Chỉnh sửa người dùng</title>
    </head>
    <style>
        /* Reset mặc định */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Bố cục trang */
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container chứa form */
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        /* Tiêu đề */
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Thông báo */
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            text-align: center;
            border-radius: 5px;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            text-align: center;
            border-radius: 5px;
        }

        /* Nhãn input */
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        /* Input */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        /* Nút cập nhật */
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Nút quay lại */
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            background-color: #ccc;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #aaa;
        }

    </style>
    <body>

        <?php 
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM users WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
        ?>
                  <div class="container">
                  <h1>Edit User</h1>
               <!-- Show message day -->
               <?php if ($message != "") echo $message; ?>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
            <p>
                <label>Họ tên:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            </p>
            <p>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </p>
            <p>
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>" required>
            </p>
            <button type="submit" name="update">Cập nhật</button>
            <a href="../admin.php">Quay lại</a>
        </form>
    </div>
        <?php 
            } else {
                echo "<p>Không tìm thấy người dùng.</p>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<p>Không có người dùng nào.</p>";
        }
        mysqli_close($conn);
        ?>
    </body>
</html>
