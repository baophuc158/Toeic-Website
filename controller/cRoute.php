<?php
    include("../model/mRoute.php");
    class cRoute
    {
        function xem_lotrinh($mapart, $level)
        {
            $p=new mRoute();
            $r=$p->show_Route($mapart, $level);
            return $r;		
        }
        function xem_lotrinh_doc_audio($mapart, $route)
        {
            $p=new mRoute();
            $r=$p->show_route_Reading_audio($mapart, $route);
            return $r;		
        }
        function xem_lotrinh_doc_P3_P4_question($mapart, $madv)
        {
            $p=new mRoute();
            $r=$p->show_route_Reading_P3_P4_question($mapart, $madv);
            return $r;		
        }
        function xem_lotrinh_doc_dv($mapart,$route_level)
        {
            $p=new mRoute();
            $r=$p->show_route_Reading_para($mapart,$route_level);
            return $r;		
        }
        function xem_lotrinh_cauhoi($mapart, $madv)
        {
            $p=new mRoute();
            $r=$p->show_route_Reading_question($mapart, $madv);
            return $r;		
        }
        function xem_lotrinh_script($mapart, $level, $madv)
        {
            $p=new mRoute();
            $r=$p->show_route_Reading_script($mapart, $level, $madv);
            return $r;		
        }
        function xem_lotrinh_doc_P5($mapart,$level)
        {
            $p=new mRoute();
            $r=$p->show_route_Reading_P5($mapart, $level);
            return $r;		
        }
    }
?>