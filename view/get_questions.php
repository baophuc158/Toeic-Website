<?php
    include('minz_connect_db.php');
    $MaDe = 'test1';
    $MaDV = '0';
    $query = "SELECT * from noidungon join dekiemtra_doanvan_noidungon on noidungon.MaCH = dekiemtra_doanvan_noidungon.MaCH where (noidungon.MaPart ='L1' or noidungon.MaPart ='L2' or noidungon.MaPart ='L3' or noidungon.MaPart ='L4') and dekiemtra_doanvan_noidungon.MaDV='$MaDV' and dekiemtra_doanvan_noidungon.MaDe='$MaDe' GROUP BY dekiemtra_doanvan_noidungon.MaCH ORDER BY MaPart ASC";
    $result = mysqli_query($conn, $query);
    
    $questions = array(); // Mảng chứa tất cả các câu hỏi
    
    while ($row = mysqli_fetch_assoc($result)) {
        $questions[] = $row; // Thêm hàng dữ liệu vào mảng
    }

    // Mã hóa nội dung câu hỏi thành chuỗi JSON
    $jsonQuestions = json_encode($questions);

    // Trả về kết quả dưới dạng JSON
    header('Content-Type: application/json');
    echo $jsonQuestions;
?>
