<?php
require "../connectDB.php";

// Kiểm tra xem có dữ liệu từ form hay không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_id = isset($_POST['admin_id']) ? $_POST['admin_id'] : 0;
    $admin_email = isset($_POST['admin_email']) ? $_POST['admin_email'] : '';
    $admin_password = isset($_POST['admin_password']) ? $_POST['admin_password'] : '';

    // Kiểm tra nếu có ảnh được tải lên
    if (isset($_FILES['upload_image']) && $_FILES['upload_image']['error'] == 0) {
        $image_name = $_FILES['upload_image']['name'];
        $image_tmp_name = $_FILES['upload_image']['tmp_name'];
        $image_size = $_FILES['upload_image']['size'];
        $image_type = $_FILES['upload_image']['type'];

        // Kiểm tra định dạng file (chỉ cho phép jpg, jpeg, png)
        $allowed = ['jpg', 'jpeg', 'png'];
        $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        if (in_array($image_ext, $allowed)) {
            // Tạo tên file mới để tránh xung đột tên file
            $new_image_name = uniqid("IMG-", true) . '.' . $image_ext;
            $upload_dir = '../image/'; // Thư mục lưu trữ ảnh
            $upload_path = $upload_dir . $new_image_name;

            // Di chuyển file từ tmp vào thư mục lưu trữ
            if (move_uploaded_file($image_tmp_name, $upload_path)) {
                // Ảnh đã được tải lên thành công, cập nhật đường dẫn ảnh trong CSDL
                $image = "image/" . $new_image_name;
            } else {
                echo "Không thể tải lên ảnh.";
                exit;
            }
        } else {
            echo "Định dạng file không hợp lệ. Chỉ cho phép JPG, JPEG, PNG.";
            exit;
        }
    } else {
        // Không có ảnh mới được tải lên, giữ nguyên ảnh cũ
        $image = isset($_POST['images']) ? $_POST['images'] : '';
    }

    // Cập nhật thông tin quản trị viên trong cơ sở dữ liệu
    $sql = "UPDATE `users` SET `admin_email` = :admin_email, `admin_password` = :admin_password, `images` = :images WHERE `admin_id` = :admin_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':admin_email', $admin_email);
    $stmt->bindParam(':admin_password', $admin_password);
    $stmt->bindParam(':images', $image);
    $stmt->bindParam(':admin_id', $admin_id);

    if ($stmt->execute()) {
        // Chuyển hướng về trang thông tin người dùng với thông báo
        header("Location: ../index.php?id=" . $id . "&message=Thêm thông tin thành công");
        exit();
    } else {
        echo "Cập nhật thông tin thất bại.";
    }
} else {
    echo "Không có dữ liệu từ form.";
}
