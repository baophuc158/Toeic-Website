<?php
    class mLT_review
    {
        function show_Para($malt)
        {
            $conn = mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
            mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                $sql = "SELECT *FROM doanvan join noidungon on doanvan.MaDV = noidungon.MaDV where noidungon.route_level <= '$malt' group by doanvan.MaDV";
                $qr = mysqli_query($conn, $sql);
                if(!$qr)
                {
                    echo mysqli_error($conn);
                }
                else
                {
                    return $qr;
                }
            }
            else
            {
                return false;
            }
        }
        
        function show_review_question($malt, $madv)
        {
            $conn = mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
            mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                $sql = "SELECT *FROM noidungon WHERE route_level <= '$malt' and MaDV ='$madv' order by MaPart ASC";
                $qr = mysqli_query($conn, $sql);
                if(!$qr)
                {
                    echo mysqli_error($conn);
                }
                else
                {
                    return $qr;
                }
            }
            else
            {
                return false;
            }
        }
        
        function luudiemreview($MaTK, $diem, $MaLT)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST['done_review']))
                {
                    $sql = "update lotrinh_thoigian set result = '$diem' where user = '$MaTK' and route_name = '$MaLT' and route_status = 'studying'";
                }
                $qr = mysqli_query($conn,$sql);
                return $qr;
                mysqli_close($conn);
                //$p->ngatketnoi($conn);
            }
            else
            {
                return false;
                //echo 'Không có dữ liệu';
            }
        }
    }
    
?>