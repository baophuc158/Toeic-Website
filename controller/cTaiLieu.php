<?php
    include("../model/mTaiLieu.php");
    class cTaiLieu{
        function xem_TL()
        {
            $p=new Toeic_document();
            $r=$p->show_tailieu();
            return $r;		
        }
        function xoa_TL($stt)
        {
            $p=new Toeic_document();
            $r=$p->delete_tailieu($stt);
            return $r;		
        }
    }
?>