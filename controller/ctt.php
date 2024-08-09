<?php
include("../model/mtt.php");
    class ctt{
        function rett($matk)
        {
            $p=new Infor();
            $r=$p->getinfo($matk);
            return $r;		
        }
        function rehientt($matk)
        {
            $p=new Infor();
            $r=$p->hieninfo($matk);
            return $r;		
        }
        function reluutt()
        {
            $p=new Infor();
            $r=$p->luuinfo();
            return $r;		
        }
        function rediem($MaHV)
        {
            $p=new Infor();
            $r=$p->xemdiem($MaHV);
            return $r;		
        }
    }
?>