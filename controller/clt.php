<?php
include("../model/mlt.php");
    class cLT{
        function relt($malt)
        {
            $p=new mLT();
            $r=$p->ttLT($malt);
            return $r;		
        }
        function reuplt($malt)
        {
            $p=new mLT();
            $r=$p->upLT($malt);
            return $r;		
        }
        function rehvlt($mahv)
        {
            $p=new mLT();
            $r=$p->hvlt($mahv);
            return $r;		
        }
        function time_lt($mahv,$tenlt)
        {
            $p=new mLT();
            $r=$p->time_selecting($mahv,$tenlt);
            return $r;		
        }
        function time_kiemtra($mahv)
        {
            $p=new mLT();
            $r=$p->time_checking($mahv);
            return $r;		
        }
        function time_hienthi($mahv)
        {
            $p=new mLT();
            $r=$p->time_showing($mahv);
            return $r;		
        }
        function capnhat_lotrinh_user($malt, $mahv, $goal, $result)
        {
            $p=new mLT();
            $r=$p->update_user_route($malt, $mahv, $goal, $result);
            return $r;		
        }
    }
?>