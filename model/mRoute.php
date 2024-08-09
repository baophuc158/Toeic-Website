<?php
    include_once('ketnoi.php');
    class mRoute
    {
        function show_Route($mapart, $level)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                $sql = "SELECT * FROM noidungon WHERE MaPart = '$mapart' AND route_level <=$level";
                $qr = mysqli_query($conn, $sql);
                if(!$qr)
                {
                    echo mysqli_error($conn);
                }
                return $qr;
                $p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
        function show_route_Reading_audio($mapart,$route)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                //$sql = "SELECT * FROM doanvan as dv JOIN noidungon as ndo on dv.MaPartDV = ndo.MaPart WHERE dv.MaPartDV = '$mapart' AND ndo.route_level <='$level' GROUP BY dv.MaDV";
                $sql = "SELECT * FROM doanvan join noidungon on doanvan.MaDV = noidungon.MaDV WHERE doanvan.MaPartDV = '$mapart' and doanvan.MaDV !='0' and noidungon.route_level <= $route GROUP BY doanvan.MaDV";
                $qr = mysqli_query($conn, $sql);
                if(!$qr)
                {
                    echo mysqli_error($conn);
                }
                return $qr;
                $p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
        function show_route_Reading_P3_P4_question($mapart, $madv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                $sql = "SELECT * FROM noidungon as ndo JOIN doanvan as dv on ndo.MaDV = dv.MaDV WHERE ndo.MaPart = '$mapart' AND ndo.MaDV ='$madv'";
                $qr = mysqli_query($conn, $sql);
                if(!$qr)
                {
                    echo mysqli_error($conn);
                }
                return $qr;
                $p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
        function show_route_Reading_para($mapart, $route_level)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                $sql = "SELECT * FROM doanvan as dv JOIN noidungon as ndo on dv.MaDV = ndo.MaDV WHERE dv.MaDV != '0' and dv.MaPartDV = '$mapart' AND ndo.route_level <= $route_level GROUP BY dv.MaDV";
                $qr = mysqli_query($conn, $sql);
                if(!$qr)
                {
                    echo mysqli_error($conn);
                }
                return $qr;
                $p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
        function show_route_Reading_question($mapart, $madv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                $sql = "SELECT * FROM noidungon as ndo JOIN doanvan as dv on ndo.MaDV = dv.MaDV WHERE ndo.MaPart = '$mapart' AND dv.MaDV ='$madv'";
                $qr = mysqli_query($conn, $sql);
                if(!$qr)
                {
                    echo mysqli_error($conn);
                }
                return $qr;
                $p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
        function show_route_Reading_P5($mapart, $level)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = '$mapart' and route_level <= $level";
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