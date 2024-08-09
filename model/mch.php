<?php
    include_once('ketnoi.php');
    class mCH
    {
        function loadingl1()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'L1' ORDER BY RAND() LIMIT 6";
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
        function themDV()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST['addch']))
                {
                    $MaDV= $_POST['madv'];
                    $MaPart=$_POST['mapart'];
                    $Noidung= $_POST['noidung'];
                }
                $sql= "insert into doanvan (MaDV, MaPartDV, NoidungDV) values ('$MaDV', '$MaPart', '$Noidung') ON DUPLICATE KEY UPDATE MaDV=MaDV";
                $qr= mysqli_query($conn, $sql);
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
        function loadingl2()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'R5' ORDER BY RAND() LIMIT 6";
                //$sql = "select * from noidungon where MaPart = 'R5' LIMIT 5";
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
        function loading_l2()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                //$sql = "select * from noidungon where MaPart = 'L2'"; 
                $sql = "select * from noidungon where MaPart = 'L2' ORDER BY RAND() LIMIT 6";
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
        function loadingl3($madv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'L3' and MaDV = '$madv'";
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
        function xuatNDDV_L3()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from doanvan where MaPartDV = 'L3' ORDER BY RAND() LIMIT 2 ";
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
        function script_L3($madv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                //$sql = "select script, MaDV from noidungon as ndo join doanvan as dv on ndo.MaDV = dv.MaDV where ndo.MaPart = 'L3' and dv.MaDV = '$madv'";
                $sql = "select script, MaDV from noidungon where MaPart = 'L3' and MaDV = '$madv'";
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
        function loadingl4($madv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'L4' and MaDV = '$madv'";
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
        function xuatNDDV_L4()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from doanvan where MaPartDV = 'L4' ORDER BY RAND() LIMIT 2 ";
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
        function script_L4($madv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select script, MaDV from noidungon where MaPart = 'L4' and MaDV = '$madv'";
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
        function loadingR6($madv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'R6' and MaDV = '$madv'";
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
        function xuatNDDV_R6()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from doanvan where MaPartDV = 'R6' ORDER BY RAND() LIMIT 2 ";
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
        function loadingR7($madv)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaPart = 'R7' and MaDV = '$madv'";
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
        function xuatNDDV_R7()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from doanvan where MaPartDV = 'R7' ORDER BY RAND() LIMIT 2 ";
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
        function xuatDSCH($MaPart)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon inner join doanvan on noidungon.MaDV=doanvan.MaDV where noidungon.MaPart = '$MaPart'";
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
        function ttquestion($MaCH)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from noidungon where MaCH = '$MaCH'";
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
        function ttdoanvan($MaDV)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql = "select * from doanvan where MaDV = '$MaDV'";
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
        function create_slug($string)
        {
            $search = array(
                '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
                '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
                '#(ì|í|ị|ỉ|ĩ)#',
                '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
                '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
                '#(ỳ|ý|ỵ|ỷ|ỹ)#',
                '#(đ)#',
                '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
                '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
                '#(Ì|Í|Ị|Ỉ|Ĩ)#',
                '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
                '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
                '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
                '#(Đ)#',
                "/[^a-zA-Z0-9\-\_]/",
            );
            $replace = array(
                'a',
                'e',
                'i',
                'o',
                'u',
                'y',
                'd',
                'A',
                'E',
                'I',
                'O',
                'U',
                'Y',
                'D',
                '-',
            );
            $string = preg_replace($search, $replace, $string);
            $string = preg_replace('/(-)+/', '-', $string);
            $string = strtolower($string);
            return $string;
        }
        function compare_ch($MaPart)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $search = array(
                '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
                '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
                '#(ì|í|ị|ỉ|ĩ)#',
                '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
                '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
                '#(ỳ|ý|ỵ|ỷ|ỹ)#',
                '#(đ)#',
                '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
                '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
                '#(Ì|Í|Ị|Ỉ|Ĩ)#',
                '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
                '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
                '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
                '#(Đ)#',
                "/[^a-zA-Z0-9\-\_]/",
                );
                $replace = array(
                    'a',
                    'e',
                    'i',
                    'o',
                    'u',
                    'y',
                    'd',
                    'A',
                    'E',
                    'I',
                    'O',
                    'U',
                    'Y',
                    'D',
                    '-',
                );
                $sql = "select * from noidungon where MaPart='$MaPart'";
                $qr = mysqli_query($conn,$sql);
                $arr_check = [];
                while($row = mysqli_fetch_assoc($qr))
                {
                    $check = preg_replace($search, $replace, $row['Cauhoi']);
                    $check = preg_replace('/(-)+/', '-', $check);
                    $check = strtolower($check);
                    $arr_check['MaCH'] = $row['MaCH'];
                    $arr_check['Cauhoi'] = $check;
                }
                return $arr_check;
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