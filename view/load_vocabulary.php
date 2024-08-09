<?php
// Kết nối đến MySQL
$conn = mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
mysqli_set_charset($conn ,'utf8');

if($conn){
    // Lấy dữ liệu từ MySQL
    $result = mysqli_query($conn, "select qv.ID_vocabulary, qv.tu_vung, qv.phien_am, qv.mota, qv.vi_du, qv.am_thanh, qv.hinh_anh, tv.ID_topic, tp.ID_topic, tv.ID_vocabulary, tv.id from question_v as qv join topic_vocabulary_info as tv on qv.ID_vocabulary = tv.ID_vocabulary join topic as tp on tv.ID_topic = tp.ID_topic where tv.ID_topic = tp.ID_topic");
    //$result = mysqli_query($conn, "select tv.id, tv.ID_topic from question_v as qv join topic_vocabulary_info as tv on qv.ID_vocabulary = tv.ID_vocabulary join topic as tp on tv.ID_topic = tp.ID_topic");
    $load = array();
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $load[] = $row;
    }
    // Trả về mảng dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($load);
}
else{
    return false;
}

?>