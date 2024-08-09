<?php
    include('../model/mch.php');
    class cCH
    {
        function loadl1()
        {
            $p= new mCH();
            $r = $p->loadingl1();
            return $r;
        }
        function upDV()
        {
            $p= new mCH();
            $r = $p->themDV();
            return $r;
        }
        function loadl2()
        {
            $p= new mCH();
            $r = $p->loadingl2();
            return $r;
        }
        function load_l2()
        {
            $p= new mCH();
            $r = $p->loading_l2();
            return $r;
        }
        function loadl3($madv)
        {
            $p= new mCH();
            $r = $p->loadingl3($madv);
            return $r;
        }
        function xuatDV_L3()
        {
            $p= new mCH();
            $r = $p->xuatNDDV_L3();
            return $r;
        }
        function xuat_script_L3($madv)
        {
            $p=new mCH();
            $r=$p->script_L3($madv);
            return $r;
        }
        function loadl4($madv)
        {
            $p= new mCH();
            $r = $p->loadingl4($madv);
            return $r;
        }
        function xuat_script_L4($madv)
        {
            $p=new mCH();
            $r=$p->script_L4($madv);
            return $r;
        }
        function xuatDV_L4()
        {
            $p= new mCH();
            $r = $p->xuatNDDV_L4();
            return $r;
        }
        function loadR6($madv)
        {
            $p= new mCH();
            $r = $p->loadingR6($madv);
            return $r;
        }
        function xuatDV_R6()
        {
            $p= new mCH();
            $r = $p->xuatNDDV_R6();
            return $r;
        }
        function loadR7($madv)
        {
            $p= new mCH();
            $r = $p->loadingR7($madv);
            return $r;
        }
        function xuatDV_R7()
        {
            $p= new mCH();
            $r = $p->xuatNDDV_R7();
            return $r;
        }
        function xuatDSCH_QLTL($MaPart)
        {
            $p= new mCH();
            $r = $p->xuatDSCH($MaPart);
            return $r;
        }
        function rettq($MaCH)
        {
            $p= new mCH();
            $r = $p->ttquestion($MaCH);
            return $r;
        }
        function reslug($string)
        {
            $p= new mCH();
            $r = $p->create_slug($string);
            return $r;
        }
        function recheckch($MaPart)
        {
            $p= new mCH();
            $r = $p->compare_ch($MaPart);
            return $r;
        }
        function rettdv($MaDV)
        {
            $p= new mCH();
            $r = $p->ttdoanvan($MaDV);
            return $r;
        }
    }
?>