<?php
    include_once('../model/mGrammar_Q.php');
    class cGrammar
    {
        function show_grammar_question($tense_ID)
        {
            $p= new mGrammar();
            $r = $p->view_grammar_question($tense_ID);
            return $r; 
        }
        function show_grammar_tense()
        {
            $p= new mGrammar();
            $r = $p->view_grammar_tense();
            return $r; 
        }
        function add_grammar_tense_question()
        {
            $p= new mGrammar();
            $r = $p->add_grammar_question();
            return $r; 
        }
        function add_grammar_tense()
        {
            $p= new mGrammar();
            $r = $p->add_tense();
            return $r; 
        }
        function show_grammar_question_list()
        {
            $p= new mGrammar();
            $r = $p->view_grammar_question_list();
            return $r;
        }
        function view_list()
        {
            $p= new mGrammar();
            $r = $p->show_question_list();
            return $r;
        }
        function xem_tense_question()
        {
            $p= new mGrammar();
            $r = $p->search_grammar_tense();
            return $r;
        }
        function chon_cauhoi($id)
        {
            $p= new mGrammar();
            $r = $p->select_question($id);
            return $r;
        }
        function capnhat_cauhoi()
        {
            $p= new mGrammar();
            $r = $p->update_question();
            return $r; 
        }
    }
?>