<?php
require "connectDB.php";
function crawlDataUser()
{
    global $pdo;
    try {
        // Khởi tạo câu truy vấn cơ bản
        $sql = "SELECT `id`, `cccd`, `hovaten`, `namsinh`, `diachi`, `gioitinh` FROM `user`";

        // Kiểm tra xem có tham số tìm kiếm không
        if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
            $search_query = '%' . $_GET['search_query'] . '%';
            $sql .= " WHERE `hovaten` LIKE :search_query OR `id` LIKE :search_query";
        }

        // Chuẩn bị câu truy vấn
        $stmt = $pdo->prepare($sql);

        // Nếu có tham số tìm kiếm thì binding giá trị vào
        if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
            $stmt->bindParam(':search_query', $search_query, PDO::PARAM_STR);
        }

        // Thực thi truy vấn
        $stmt->execute();

        // Trả về kết quả dưới dạng mảng kết hợp
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return []; // Trả về mảng rỗng nếu có lỗi
    }
}
