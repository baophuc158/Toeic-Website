<?php
    include('../model/mTest.php');
    class cTest
    {
        function reL1()
        {
            $p= new mTest();
            $r = $p->getL1();
            return $r;
        }
        
        function reL2()
        {
            $p= new mTest();
            $r = $p->getL2();
            return $r;
        }
        
        function reL3()
        {
            $p= new mTest();
            $r = $p->getL3();
            return $r;
        }
        
        function reL4()
        {
            $p= new mTest();
            $r = $p->getL4();
            return $r;
        }
        
        function reR5()
        {
            $p= new mTest();
            $r = $p->getR5();
            return $r;
        }
        
        function reR6()
        {
            $p= new mTest();
            $r = $p->getR6();
            return $r;
        }
        function reR7()
        {
            $p= new mTest();
            $r = $p->getR7();
            return $r;
        }
        function reIDTest($id, $idQL)
        {
            $p= new mTest();
            $r = $p->idTest($id, $idQL);
            return $r;
        }
        function reTest($data, $testP)
        {
            $p= new mTest();
            $r = $p->addTest($data, $testP);
            return $r;
        }
        function reListening($MaDV,$MaCH)
        {
            $p= new mTest();
            $r = $p->getListening($MaDV,$MaCH);
            return $r;
        }
        function reParaL($MaDe)
        {
            $p= new mTest();
            $r = $p->getParaL($MaDe);
            return $r;
        }
        function reReading($MaDV, $MaDe)
        {
            $p= new mTest();
            $r = $p->getReading($MaDV, $MaDe);
            return $r;
        }
        function reParaR($MaDe)
        {
            $p= new mTest();
            $r = $p->getParaR($MaDe);
            return $r;
        }
        function reParaR0($MaDe)
        {
            $p= new mTest();
            $r = $p->getParaR0($MaDe);
            return $r;
        }
        function reRandomT()
        {
            $p= new mTest();
            $r = $p->randomTest();
            return $r;
        }
        function rediemL($MaTK, $diem, $MaDe)
        {
            $p= new mTest();
            $r = $p->luudiemL($MaTK, $diem, $MaDe);
            return $r;
        }
        function rediemR($MaTK, $diem, $diemL, $MaDe)
        {
            $p= new mTest();
            $r = $p->luudiemR($MaTK, $diem, $diemL, $MaDe);
            return $r;
        }
        function reQuestion($MaDe)
        {
            $p= new mTest();
            $r = $p->getQuestion($MaDe);
            return $r;
        }
        function reTestCode()
        {
            $p= new mTest();
            $r = $p->getTestCode();
            return $r;
        }
    }