<?php
// Kết nối đến cơ sở dữ liệu
require "../connectDB.php";

try {
    // Lấy dữ liệu từ form
    $cccd = $_POST['cccd'];
    $hovaten = $_POST['hovaten'];
    $namsinh = $_POST['namsinh'];
    $diachi = $_POST['diachi'];
    $gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : 'Nam'; // Mặc định là Nam

    // Hàm sinh ID mới
    function generateID()
    {
        return 'VKU' . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    }

    $id = generateID();
    $inserted = false;

    // Lặp cho đến khi insert thành công( id là khoá chính)
    while (!$inserted) {
        // Kiểm tra xem ID có trùng lặp không
        $checkSql = "SELECT COUNT(*) FROM `user` WHERE `id` = ?";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->execute([$id]);
        $count = $checkStmt->fetchColumn();

        if ($count > 0) {
            // Nếu trùng lặp, sinh ID mới
            $id = generateID();
        } else {
            // Câu lệnh SQL để thêm thông tin người dùng
            $sql = "INSERT INTO `user` (`id`, `cccd`, `hovaten`, `namsinh`, `diachi`, `gioitinh`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $inserted = $stmt->execute([$id, $cccd, $hovaten, $namsinh, $diachi, $gioitinh]);
        }
    }

    // Chuyển hướng về trang thông tin người dùng với thông báo
    header("Location: ../index.php?id=" . $id . "&message=Thêm thông tin thành công");
    exit();
} catch (PDOException $e) {
    echo 'Lỗi kết nối: ' . $e->getMessage();
}
