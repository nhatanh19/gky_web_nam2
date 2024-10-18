<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/edit.css">
</head>

<body>
    <!-- Nút trở về trang chủ -->
    <a href="index.php" class="btn btn-primary return-home">Trở về trang chủ</a>

    <?php
    require "connectDB.php";
    // Lấy ID từ tham số URL (ví dụ: index.php?id=1)
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    // Câu lệnh SQL
    $sql = "SELECT `admin_id`, `admin_email`, `admin_password`, `images` FROM `users` WHERE `admin_id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    ?>
    <div class="center-block">
        <h1 class="my-4 text-center">Chỉnh sửa thông tin tài khoản</h1>
        <?php
        // Kiểm tra kết quả
        if ($stmt->rowCount() > 0) {
            // Hiển thị dữ liệu
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
            <form method="POST" action="controller/update_user.php" enctype="multipart/form-data">
                <!-- Hiển thị ID -->
                <div class="mb-3">
                    <label for="admin_id" class="form-label">ID tài khoản</label>
                    <input type="text" class="form-control" id="admin_id" name="admin_id" value="<?php echo htmlspecialchars($row['admin_id']); ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="admin_email" class="form-label">Email tài khoản</label>
                    <input type="email" class="form-control" id="admin_email" name="admin_email" value="<?php echo htmlspecialchars($row['admin_email']); ?>" required>
                </div>

                <!-- Hiển thị mật khẩu và thêm tính năng xem mật khẩu -->
                <div class="mb-3">
                    <label for="admin_password" class="form-label">Mật khẩu</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="admin_password" name="admin_password" value="<?php echo htmlspecialchars($row['admin_password']); ?>" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">Hiển thị</button>
                    </div>
                </div>

                <div class="mb-3 avatar" style="flex-direction: column; display: flex;">
                    <label for="images" class="form-label">Ảnh hiện tại</label>
                    <img style="width: 200px;" src="<?php echo htmlspecialchars($row['images']); ?>" alt="">
                </div>
                <!-- Nút tải lên ảnh -->
                <div class="mb-3">
                    <label for="upload_image" class="form-label">Tải lên ảnh mới</label>
                    <input type="file" class="form-control" id="upload_image" name="upload_image" accept="image/*">
                </div>

                <button type="submit" class="btn btn-success">Thay đổi thông tin</button>
            </form>
        <?php
        } else {
            echo '<div class="alert alert-warning text-center" role="alert">';
            echo 'Không tìm thấy quản trị viên với ID này.';
            echo '</div>';
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        // Hàm để hiển thị mật khẩu
        function togglePassword() {
            var passwordField = document.getElementById("admin_password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>

</html>