<?php
    include_once('../model/mPractice.php');
    class cPractice
    {
        function view_grammar()
        {
            $p= new mPractice();
            $r = $p->view_grammar();
            return $r; 
        }
        function thongtin_grammar($tense_name)
        {
            $p= new mPractice();
            $r = $p->grammar_information($tense_name);
            return $r; 
        }
    }
?>