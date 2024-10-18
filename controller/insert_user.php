<?php
require "../connectDB.php";

// Kiểm tra nếu form đã được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    // Xử lý upload ảnh
    if (isset($_FILES['images']) && $_FILES['images']['error'] === 0) {
        $image_name = $_FILES['images']['name'];
        $image_tmp_name = $_FILES['images']['tmp_name'];
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $new_image_name = 'IMG-' . uniqid() . '.' . $image_ext;
        $upload_dir = '../image/'; // Thư mục lưu ảnh

        // Tạo thư mục nếu chưa tồn tại
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        // Di chuyển file ảnh vào thư mục
        $upload_path = $upload_dir . $new_image_name;
        if (move_uploaded_file($image_tmp_name, $upload_path)) {
            // Tải lên thành công, lưu thông tin vào CSDL
            $stmt = $pdo->prepare("INSERT INTO `users` (`admin_email`, `admin_password`, `images`) VALUES (?, ?, ?)");
            $new_image_name = "image/" . $new_image_name;
            $stmt->execute([$admin_email, $admin_password, $new_image_name]);

            // Chuyển hướng về trang chủ hoặc thông báo thành công
            header("Location: ../index.php");
            exit();
        } else {
            echo "Không thể tải lên ảnh.";
        }
    } else {
        echo "Có lỗi khi tải lên ảnh.";
    }
}
