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
    $sql = "SELECT `id`, `cccd`, `hovaten`, `namsinh`, `diachi`, `gioitinh` FROM `user` WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    ?>
    <div class="center-block">
        <h1 class="my-4 text-center">Chỉnh sửa thông tin người dùng</h1>
        <?php
        // Kiểm tra kết quả
        if ($stmt->rowCount() > 0) {
            // Hiển thị dữ liệu
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
            <form method="POST" action="controller/update_user.php">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                <div class="mb-3">
                    <label for="cccd" class="form-label">CCCD</label>
                    <input type="text" class="form-control" id="cccd" name="cccd" value="<?php echo htmlspecialchars($row['cccd']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="hovaten" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" id="hovaten" name="hovaten" value="<?php echo htmlspecialchars($row['hovaten']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="namsinh" class="form-label">Năm sinh</label>
                    <input type="number" class="form-control" id="namsinh" name="namsinh" value="<?php echo htmlspecialchars($row['namsinh']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi" value="<?php echo htmlspecialchars($row['diachi']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="gioitinh" class="form-label">Giới tính</label>
                    <select class="form-select" id="gioitinh" name="gioitinh" required>
                        <option value="Nam" <?php if ($row['gioitinh'] == 'Nam') echo 'selected'; ?>>Nam</option>
                        <option value="Nữ" <?php if ($row['gioitinh'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Thay đổi thông tin</button>
            </form>
        <?php
        } else {
            echo '<div class="alert alert-warning text-center" role="alert">';
            echo 'Không tìm thấy người dùng với ID này.';
            echo '</div>';
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>