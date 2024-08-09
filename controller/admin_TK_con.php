<?php
    include('../model/admin_TK_mod.php');
    class cTK
    {
        function xemTK()
        {
            $p= new mTK();
            $data = $p->xemtaikhoan();
            return $data;
        }
        function xem_chitiet($matk)
        {
            $p= new mTK();
            $data = $p->xemchitiet($matk);
            return $data;
        }
    }
?>