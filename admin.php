<?php 
    session_start();
    if(!isset($_SESSION['email']) || $_SESSION['role'] != 1){
        header('location:login.php');
    }

    include 'connectdtb.php';

    if(isset($_POST['delete_user'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM users WHERE id = ?";
        $result = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($result, "i", $id);

        if(mysqli_stmt_execute($result)) {
            $_SESSION['message'] = "NGười dùng được xóa thành công!";
        } else {
            $_SESSION['message'] = "Lỗi khi xóa" . mysqli_error($conn);
        }
        mysqli_stmt_close($result);
        header('location:admin.php');
        exit();
    }
    //Tuỳ chỉnh số lượng hiển thị tk ở đâyđây
    // $sql = "SELECT * FROM users LIMIT 0,3";

    //RANDOM các sản phẩm và thứ tự xuất hiện( có thể đổi chỗ cho nhau khi reload page)
    // $sql = "SELECT * FROM users ORDER BY RAND()";
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    
?>

<html>
    <head>
        <title>Admin Page</title>
    </head>
    <style>
            body {
                font-family: Arial, sans-serif;
            }
            .flex_head{
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .logout{
                width: 160px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            th, td {
                border: 1px solid #ccc;
                padding: 10px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
            button {
                padding: 5px 10px;
                cursor: pointer;
            }
            .edit-btn {
                background-color: #4CAF50;
                color: white;
                border: none;
            }
            .delete-btn {
                background-color: #f44336;
                color: white;
                border: none;
            }
        </style>

    <body>
     <h1>Admin</h1>
       <div class="flex_head">
       <h2>Danh sách người dùng</h2>
        <a href="login.php">
            <button type="submit" name="dangxuat" class="logout">
                Đăng xuất
            </button>
        </a>
       </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Quyền</th>
                <th>Hành động</th>
            </tr>
            <?php
                if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . ($row['role'] == 1 ? 'Admin' : ($row['role'] == 2 ? 'Manger' : 'User')) . "</td>";
                        echo "<td>
                        <a href='components/edit_user.php?id=".$row['id']."'><button class='edit-btn'>Sửa</button></a>
                        <form method='POST' action='admin.php' style='display:inline;'>
                            <input type='hidden' name='id' value='".$row['id']."'>
                            <button type='submit' name='delete_user' class='delete-btn' onclick='return confirm(\"Bạn có chắc chắn muốn xóa người dùng này?\");'>
                                Xóa
                            </button>
                        </form>
                    </td>";
                    

                                                                                                            

                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </body>
</html>