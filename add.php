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
        <form action="controller/insert_user.php" method="post">
            <div class="mb-3">
                <label for="hovaten" class="form-label">Họ và Tên</label>
                <input type="text" class="form-control" id="hovaten" name="hovaten" required>
            </div>
            <div class="mb-3">
                <label for="cccd" class="form-label">CCCD</label>
                <input type="text" class="form-control" id="cccd" name="cccd" required>
            </div>
            <div class="mb-3">
                <label for="namsinh" class="form-label">Năm Sinh</label>
                <input type="number" class="form-control" id="namsinh" name="namsinh" required>
            </div>
            <div class="mb-3">
                <label for="diachi" class="form-label">Địa Chỉ</label>
                <input type="text" class="form-control" id="diachi" name="diachi" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Giới Tính</label><br>
                <input type="radio" id="gioitinh" name="gioitinh" value="Nam"> Nam
                <input type="radio" id="gioitinh" name="gioitinh" value="Nữ"> Nữ
            </div>
            <button type="submit" class="btn btn-primary">Thêm Thông Tin</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>