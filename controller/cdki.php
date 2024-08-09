<?php
include("../model/mdki.php");
    class cdki{
        function reTK(){
            $p=new mdki();
            $r=$p->dkiTK();
            return $r;		
        }
        function upTK(){
            $p=new mdki();
            $r=$p->addttHV();
            return $r;		
        }
        function reTKql(){
            $p=new mdki();
            $r=$p->capTK();
            return $r;		
        }
        function upTKql(){
            $p=new mdki();
            $r=$p->addttQL();
            return $r;		
        }
    }
?>