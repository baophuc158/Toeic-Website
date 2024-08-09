<?php
    include('../controller/cch.php');
    $p= new cCH();
    $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
	mysqli_set_charset($conn ,'utf8');
    require('../Excel/PHPExcel.php');
    if(isset($_POST['btngui']))
    {
        $file=$_FILES['file']['tmp_name'];
        $name=$_FILES['file']['name'];
		$size=$_FILES['file']['size'];
		$type=$_FILES['file']['type'];

        $allowed_dsch = ['xls','xlsx'];
        $dsch_extension = explode('.', $name);
        $dsch_extension = strtolower(end($dsch_extension));
        if(!in_array($dsch_extension, $allowed_dsch))
        {
            echo '<script>alert("Vui lòng chọn file excel (xls, xlsx)!")</script>';
            echo "<script>window.location.href = 'uplistquestion.php'</script>";
            exit;
        }
        elseif($size > 20000000 ) // kích cỡ 20MB
        {
            echo '<script>alert("Kích cỡ file không quá 20MB !")</script>';
            echo "<script>window.location.href = 'uplistquestion.php'</script>";
            exit;
        }
        else
        {
            $objReader =PHPExcel_IOFactory::createReaderForFile($file);
            $listWorkSheets= $objReader->listWorksheetNames($file); 
    
            foreach($listWorkSheets as $sheet)
            {
    
                $objExcel =$objReader->load($file);
                $sheetData=$objExcel->getActiveSheet()->toArray('null',true,true,true);
                $highestRow=$objExcel->setActiveSheetIndex()->getHighestRow();
                for($row = 4; $row<=$highestRow; $row++)
                {
                    if(!is_null($sheetData[$row]['A']) && !is_null($sheetData[$row]['B']) && !is_null($sheetData[$row]['C']) && !is_null($sheetData[$row]['D']) && !is_null($sheetData[$row]['E'] && !is_null($sheetData[$row]['F'])) && !is_null($sheetData[$row]['G'])&& !is_null($sheetData[$row]['H']) && !is_null($sheetData[$row]['I']))
                    {
                        $MaPart=$sheetData[$row]['A'];
                        $Cauhoi=$sheetData[$row]['B'];
                        $DapanA=$sheetData[$row]['C'];
                        $DapanB=$sheetData[$row]['D'];
                        $DapanC=$sheetData[$row]['E'];
                        $DapanD=$sheetData[$row]['F'];
                        $DapanDung=$sheetData[$row]['G'];
                        $MaDV=$sheetData[$row]['H'];
                        $NoidungDV=$sheetData[$row]['I'];
                        //print_r($sheetData[$row]);
                        if(empty($MaPart) || empty($Cauhoi) || empty($DapanA) || empty($DapanB) || empty($DapanC) || empty($DapanD) || empty($DapanDung) || !isset($MaDV) || $MaDV == '' || empty($NoidungDV))
                        {
                            echo "<script>alert('Thiếu dữ liệu nhập!')</script>";
                            echo "<script>window.location.href = 'uplistquestion.php'</script>";
                            exit();
                        }
                        else
                        {
                            if($MaDV != 0)
                            {
                                echo 'pro';
                                $check="select * from doanvan where MaDV='$MaDV'";
                                $recheck=mysqli_query($conn,$check);
                                if(mysqli_num_rows($recheck)>0)
                                {
                                    echo "<script>alert('Đã tồn tại mã đoạn văn $MaDV!')</script>";
                                    //echo "<script>window.location.href = 'uplistquestion.php'</script>";
                                }
                                else
                                {
                                    $sql1="INSERT INTO doanvan(MaDV, MaPartDV, NoidungDV, hinhanh) VALUES ('$MaDV','$MaPart',N'$NoidungDV','')";
                                    $re1=mysqli_query($conn,$sql1);
                                }
                            }
                            $checkch= $p->recheckch($MaPart);
                            foreach ($checkch as $recheck)
                            {
                                if($recheck == $p->reslug($Cauhoi))
                                {
                                    echo "<script>alert('Đã tồn tại câu hỏi $Cauhoi!')</script>";
                                    // echo "<script>window.location.href = 'uplistquestion.php'</script>";
                                    //exit();
                                }
                                else
                                {
                                    $sql="INSERT INTO noidungon(MaCH, MaPart, Cauhoi, DapanA, DapanB, DapanC, DapanD, DapanDung, MaDV, Hinh) VALUES ('','$MaPart','$Cauhoi','$DapanA','$DapanB','$DapanC','$DapanD','$DapanDung','$MaDV','')";
                                    $re=mysqli_query($conn,$sql);
                                }
                            }
                        }
                    }
               }
            }
            echo "<script>alert('Đã hoàn thành hết file danh sách')</script>";
            echo "<script>window.location.href = 'gallery.php'</script>";
        }
    }
?>