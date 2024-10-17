<?php
require "connectDB.php";

$id = $_GET['id'];

// Xoá người dùng
$stmt = $pdo->prepare("DELETE FROM `user` WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit();
