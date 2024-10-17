<?php
// Kết nối đến cơ sở dữ liệu
require "../connectDB.php";

try {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];
    $cccd = $_POST['cccd'];
    $hovaten = $_POST['hovaten'];
    $namsinh = $_POST['namsinh'];
    $diachi = $_POST['diachi'];
    $gioitinh = $_POST['gioitinh'];

    // Câu lệnh SQL cập nhật thông tin người dùng
    $sql = "UPDATE `user` SET `cccd` = ?, `hovaten` = ?, `namsinh` = ?, `diachi` = ?, `gioitinh` = ? WHERE `id` = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cccd, $hovaten, $namsinh, $diachi, $gioitinh, $id]);

    // Chuyển hướng về trang view.php
    header("Location: ../view.php?id=" . $id . "&message=Thay đổi thông tin thành công");
    exit();
} catch (PDOException $e) {
    echo 'Lỗi kết nối: ' . $e->getMessage();
}
