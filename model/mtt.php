<?php
    include_once('ketnoi.php');
    class Infor
    {
        function getinfo($matk)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sqll = "select MaVT from taikhoan where MaTK='$matk'";
                $qrr = mysqli_query($conn,$sqll);
                $mand=mysqli_fetch_assoc($qrr);
                if($mand['MaVT']=='HV')
                {
                    $sql= "select TenUser from hocvien JOIN taikhoan ON MaHV=MaTK WHERE MaTK='$matk'";
                }
                elseif($mand['MaVT']=='QLTL')
                {
                    $sql= "select TenUser from quanlytailieu JOIN taikhoan ON MaQLTL=MaTK WHERE MaTK='$matk'";
                }
                elseif($mand['MaVT']=='QTHT')
                {
                    $sql= "select TenUser from quantrihethong JOIN taikhoan ON MaQTHT=MaTK WHERE MaTK='$matk'";
                }
                $qr= mysqli_query($conn, $sql);
                return $qr;
                mysqli_close($conn);
                //$p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        
        }
        function hieninfo($matk)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sqll = "select MaVT from taikhoan where MaTK='$matk'";
                $qrr = mysqli_query($conn,$sqll);
                $mand=mysqli_fetch_assoc($qrr);
                if($mand['MaVT']=='HV')
                {
                    $sql= "select * from hocvien JOIN taikhoan ON MaHV=MaTK WHERE MaTK='$matk'";
                }
                elseif($mand['MaVT']=='QLTL')
                {
                    $sql= "select * from quanlytailieu JOIN taikhoan ON MaQLTL=MaTK WHERE MaTK='$matk'";
                }
                elseif($mand['MaVT']=='QTHT')
                {
                    $sql= "select * from quantrihethong JOIN taikhoan ON MaQTHT=MaTK WHERE MaTK='$matk'";
                }
                $qr= mysqli_query($conn, $sql);
                return $qr;

                mysqli_close($conn);
                //$p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        
        }
        function luuinfo()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                if(isset($_POST['luu']))
                {
                    $matk=$_POST['username'];
                    $fname=$_POST['fname'];
                    $sdt= $_POST['sdt'];
                    $khuvuc= $_POST['khuvuc'];
                    if($khuvuc=='miennam')
                    {
                        $sql= "update hocvien set TenUser=N'$fname', SĐT='$sdt', Khuvuc=N'Miền Nam' where MaHV='$matk'";
                    }
                    elseif($khuvuc=='mientrung')
                    {
                        $sql= "update hocvien set TenUser=N'$fname', SĐT='$sdt', Khuvuc=N'Miền Trung' where MaHV='$matk'";
                    }
                    elseif($khuvuc=='mienbac')
                    {
                        $sql= "update hocvien set TenUser=N'$fname', SĐT='$sdt', Khuvuc=N'Miền Bắc' where MaHV='$matk'";
                    }
                    
                }
                //$sql= "update hocvien set SĐT='$sdt', TenUser=N'$fname', Khuvuc=N'$khuvuc' where MaHV='$matk'";
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
        function xemdiem($MaHV)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            //$p=new ketnoi();
            if(/*$p->ketnoidl(*/$conn/*)*/)
            {
                $sql= "select * from baikiemtra where MaHV='$MaHV'";
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
        
    }
?>