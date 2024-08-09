<?php
    $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
    mysqli_set_charset($conn ,'utf8');
    if($conn)
    {
        $made = mysqli_real_escape_string($conn, $_POST['made']);
        $sql = "SELECT * FROM noidungon JOIN dekiemtra_doanvan_noidungon ON noidungon.MaCH = dekiemtra_doanvan_noidungon.MaCH JOIN doanvan ON dekiemtra_doanvan_noidungon.MaDV = doanvan.MaDV WHERE dekiemtra_doanvan_noidungon.MaDe='$made' GROUP BY dekiemtra_doanvan_noidungon.MaCH ORDER BY MaPart ASC";
        $qr = mysqli_query($conn, $sql);
        $data = array();
        if(mysqli_num_rows($qr) > 0) 
        {
            while($row = mysqli_fetch_assoc($qr)) 
            {
                $data[] = $row;
            }
        }
        echo json_encode($data);
    }
    else
    {
        return false;
    }
?>