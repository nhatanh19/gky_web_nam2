<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/add.css">
</head>

<body>
    <!-- Nút trở về trang chủ -->
    <a href="index.php" class="btn btn-primary return-home">Trở về trang chủ</a>
    <div class="center-block">
        <h1 class="my-4 text-center">Thêm người dùng</h1>
        <!-- Cập nhật enctype để hỗ trợ tải file -->
        <form action="controller/insert_user.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="admin_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="admin_email" name="admin_email" required>
            </div>
            <div class="mb-3">
                <label for="admin_password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="admin_password" name="admin_password" required>
            </div>
            <div class="mb-3">
                <label for="images" class="form-label">Tải lên ảnh</label>
                <input type="file" class="form-control" id="images" name="images" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm người dùng</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>