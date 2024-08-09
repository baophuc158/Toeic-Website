<?php
    include('../model/mLT_user.php');
    class cLT_user
    {
        function lotrinh_nguoidung($mahv)
        {
            $p=new mLT_user();
            $r=$p->show_user_route($mahv);
            return $r;		
        }
        function capnhat_LT_nguoidung_user_info($mahv)
        {
            $p= new mLT_user();
            $r= $p->update_LT_user_info($mahv);
            return $r;
        }
    }
?>