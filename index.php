<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thư viện</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    require "controller/controller.php";
    // start page
    $listUser = crawlDataUser();
    ?>
</head>

<body>
    <?php
    // Lấy thông báo từ tham số URL nếu có
    $message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';
    // Hiển thị thông báo nếu có
    if ($message) {
        echo '<div class="alert alert-success text-center" role="alert">' . $message . '</div>';
    }
    ?>
    <header>
        <h1 class="title-h1">LibManage - Quản lý người dùng thư viện</h1>
        <div class="div_search-and-add container d-flex justify-content-between">
            <a href="add.php">
                <button class="btn-add btn btn-primary" type="submit">Thêm người dùng</button>
            </a>

            <nav class="navbar navbar-light bg-light">
                <form class="form-inline d-flex" method="GET" action="">
                    <input class="form-control mr-sm-2" style="width: 300px;" name="search_query" type="search" placeholder="Nhập tên hoặc ID" aria-label="Search" value="<?php echo isset($_GET['search_query']) ? htmlspecialchars($_GET['search_query']) : ''; ?>">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            </nav>

        </div>
    </header>
    <main>
        <table class="table table-striped" style="width: 80%;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Xem</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listUser as $user): ?>
                    <tr>
                        <th scope="row"><?php echo $user['id']; ?></th>
                        <td><?php echo htmlspecialchars($user['hovaten']); ?></td>
                        <td><?php echo htmlspecialchars($user['gioitinh']); ?></td>
                        <td><a href="view.php?id=<?php echo $user['id']; ?>" class="btn btn-info">Xem</a></td>
                        <td><a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Sửa</a></td>
                        <td><a href="delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Xoá</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>


    <!-- run js -->
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>