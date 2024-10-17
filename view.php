<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem thông tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/view.css">
</head>

<body>
    <!-- Nút trở về trang chủ -->
    <a href="index.php" class="btn btn-primary return-home">Trở về trang chủ</a>

    <?php
    require "connectDB.php";
    // Lấy ID từ tham số URL (ví dụ: index.php?id=1)
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    // Lấy thông báo từ tham số URL nếu có
    $message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';
    // Câu lệnh SQL
    $sql = "SELECT `id`, `cccd`, `hovaten`, `namsinh`, `diachi`, `gioitinh` FROM `user` WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    ?>
    <div class="center-block">
        <h1 class="my-4 text-center">Thông tin người dùng</h1>

        <?php
        // Hiển thị thông báo nếu có
        if ($message) {
            echo '<div class="alert alert-success text-center" role="alert">' . $message . '</div>';
        }
        // Kiểm tra kết quả
        if ($stmt->rowCount() > 0) {
            // Hiển thị dữ liệu
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="card mb-4">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row['hovaten']) . '</h5>';
                echo '<p class="card-text"><strong>ID:</strong> ' . htmlspecialchars($row['id']) . '</p>';
                echo '<p class="card-text"><strong>CCCD:</strong> ' . htmlspecialchars($row['cccd']) . '</p>';
                echo '<p class="card-text"><strong>Giới tính:</strong> ' . htmlspecialchars($row['gioitinh']) . '</p>';
                echo '<p class="card-text"><strong>Năm sinh:</strong> ' . htmlspecialchars($row['namsinh']) . '</p>';
                echo '<p class="card-text"><strong>Địa chỉ:</strong> ' . htmlspecialchars($row['diachi']) . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Không tìm thấy người dùng với ID này.</p>';
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>