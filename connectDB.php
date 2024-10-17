<?php
$host = 'localhost'; // Thay đổi nếu cần thiết
$db = 'qlythuvien-gky';
$user = 'root'; // Tên người dùng MySQL
$pass = ''; // Mật khẩu MySQL
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Dừng thực thi nếu không thể kết nối
}
