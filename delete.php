<?php
require "connectDB.php";

$id = $_GET['id'];

// Xoá người dùng
$stmt = $pdo->prepare("DELETE FROM `users` WHERE `admin_id` = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit();
