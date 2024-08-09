<?php
    include_once('ketnoi.php');
    class mTest
    {
        function getL1()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'L1' ORDER BY RAND() LIMIT 10";
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
        function getL2()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'L2' ORDER BY RAND() LIMIT 10";
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
        function getL3()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'L3' ORDER BY RAND() LIMIT 10";
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
        function getL4()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'L4' ORDER BY RAND() LIMIT 10";
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
        function getR5()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'R5' ORDER BY RAND() LIMIT 10";
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
        function getR6()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'R6' ORDER BY RAND() LIMIT 10";
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
        function getR7()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'R7' ORDER BY RAND() LIMIT 10";
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
        function idTest($id, $idQL)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST["gui"]))
                {
                    $sql = "select * from dekiemtra where MaDe = '$id'";
                    $query = mysqli_query($conn,$sql);
                    $check = mysqli_num_rows($query);
                    if($check == 1)
                    {
                        echo "<script>alert('Duplicate Test ID: $id')</script>";
                        echo "<script>window.location='404.php'</script>";
                    }
                    else
                    {
                        $sql1 = "insert into dekiemtra (MaDe, MaQLTL) values ('$id', '$idQL')";
                        $qr = mysqli_query($conn,$sql1);
                        return $qr;
                    }
                    mysqli_close($conn);
                    //$p->ngatketnoi($conn);
                }
            }
            else
            {
                return false;
                //echo 'Không có dữ liệu';
            }
        }
		function randomTest()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from dekiemtra ORDER BY RAND() LIMIT 1";
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
		function getListening($MaDV,$MaCH)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where (MaPart ='L1' or MaPart ='L2' or MaPart ='L3' or MaPart ='L4') and MaDV='$MaDV' and MaCH = '$MaCH' ORDER BY MaPart ASC";
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
        function getParaL($MaDe)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                // $sql = "select * from dekiemtra_doanvan_noidungon join doanvan on doanvan.MaDV = dekiemtra_doanvan_noidungon.MaDV where doanvan.MaPartDV !='R6' and doanvan.MaPartDV !='R7' and dekiemtra_doanvan_noidungon.MaDe = '$MaDe' and dekiemtra_doanvan_noidungon.MaDV != '0' GROUP BY dekiemtra_doanvan_noidungon.MaDV ORDER BY MaPartDV ASC";
                // $qr = mysqli_query($conn,$sql);
                // $sql1 = "select * from dekiemtra_doanvan_noidungon join doanvan on doanvan.MaDV = dekiemtra_doanvan_noidungon.MaDV where doanvan.MaPartDV !='R6' and doanvan.MaPartDV !='R7' and dekiemtra_doanvan_noidungon.MaDe = '$MaDe' and dekiemtra_doanvan_noidungon.MaDV = '0' GROUP BY dekiemtra_doanvan_noidungon.MaCH ORDER BY dekiemtra_doanvan_noidungon.id ASC";
                // $qr1 = mysqli_query($conn,$sql1);
                $sql = "select * from doanvan join dekiemtra_doanvan_noidungon on dekiemtra_doanvan_noidungon.MaDV = doanvan.MaDV join noidungon on dekiemtra_doanvan_noidungon.MaCH = noidungon.MaCH where noidungon.MaPart !='R5' and noidungon.MaPart !='R6' and noidungon.MaPart !='R7' and dekiemtra_doanvan_noidungon.MaDe = '$MaDe' GROUP BY dekiemtra_doanvan_noidungon.MaCH ORDER BY dekiemtra_doanvan_noidungon.id ASC";
                $qr = mysqli_query($conn,$sql);
                $reparaL = [];
                while($row = mysqli_fetch_assoc($qr))
                {
                    $reparaL[] = [
                        'MaDe' => $row['MaDe'],
                        'MaDV' => $row['MaDV'],
                        'NoidungDV' => $row['NoidungDV'],
                        'MaCH' => $row['MaCH'],
                        'hinhanh' => $row['hinhanh'],
                        'MaPartDV' => $row['MaPartDV'],
                        'id'    => $row['id']
                    ];
                }
                // while($row = mysqli_fetch_assoc($qr1))
                // {
                //     $reparaL0[] = [
                //         'MaDe' => $row['MaDe'],
                //         'MaDV' => $row['MaDV'],
                //         'NoidungDV' => $row['NoidungDV'],
                //         'MaCH' => $row['MaCH'],
                //         'hinhanh' => $row['hinhanh'],
                //         'MaPartDV' => $row['MaPartDV'],
                //         'id'    => $row['id']
                //     ];
                // }
                // $paraL = array_merge($reparaL0, $reparaL);
                // return $paraL;
                return $reparaL;
                mysqli_close($conn);
                //$p->ngatketnoi($conn);
            }
            else
            {
                return false;
                //echo 'Không có dữ liệu';
            }
        }
        function getReading($MaDV, $MaDe)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon join dekiemtra_doanvan_noidungon on noidungon.MaCH = dekiemtra_doanvan_noidungon.MaCH where (noidungon.MaPart ='R5' or noidungon.MaPart ='R6' or noidungon.MaPart ='R7') and dekiemtra_doanvan_noidungon.MaDV='$MaDV' and dekiemtra_doanvan_noidungon.MaDe='$MaDe' GROUP BY dekiemtra_doanvan_noidungon.MaCH ORDER BY MaPart ASC";
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
        function getParaR($MaDe)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from dekiemtra_doanvan_noidungon join doanvan on doanvan.MaDV = dekiemtra_doanvan_noidungon.MaDV where (doanvan.MaPartDV !='L3' and doanvan.MaPartDV !='L4' and dekiemtra_doanvan_noidungon.MaDV != '0') and dekiemtra_doanvan_noidungon.MaDe = '$MaDe' GROUP BY dekiemtra_doanvan_noidungon.MaDV ORDER BY MaPartDV ASC";
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
        function getParaR0($MaDe)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from dekiemtra_doanvan_noidungon join doanvan on doanvan.MaDV = dekiemtra_doanvan_noidungon.MaDV where (doanvan.MaPartDV !='L3' and doanvan.MaPartDV !='L4' and dekiemtra_doanvan_noidungon.MaDV = '0') and dekiemtra_doanvan_noidungon.MaDe = '$MaDe' GROUP BY dekiemtra_doanvan_noidungon.MaCH ORDER BY dekiemtra_doanvan_noidungon.id ASC";
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
        function luudiemL($MaTK, $diem, $MaDe)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST['donetestL']))
                {
                    $sql = "insert into baikiemtra (DiemL, DiemR, MaDe, MaHV) values ('$diem','0','$MaDe','$MaTK')";
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
        function luudiemR($MaTK, $diem, $diemL, $MaDe)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST['donetestR']))
                {
                    $sql = "UPDATE baikiemtra SET DiemR='$diem' WHERE DiemL = '$diemL' and MaDe = '$MaDe' and MaHV = '$MaTK' and id IN ( SELECT id FROM ( SELECT id FROM baikiemtra ORDER BY id DESC LIMIT 1 ) tmp )";
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
        function getQuestion($MaDe)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon join dekiemtra_doanvan_noidungon on noidungon.MaCH = dekiemtra_doanvan_noidungon.MaCH join doanvan on dekiemtra_doanvan_noidungon.MaDV = doanvan.MaDV where dekiemtra_doanvan_noidungon.MaDe='$MaDe' GROUP BY dekiemtra_doanvan_noidungon.MaCH ORDER BY MaPart ASC";
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
        function getTestCode()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                $sql = "SELECT *FROM dekiemtra";
                $qr = mysqli_query($conn,$sql);
                return $qr;
                mysqli_close($conn);
            }
            else
            {
                return false;
            }
        }
    }