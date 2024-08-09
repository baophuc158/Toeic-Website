<?php
    include_once('../model/mVocabulary.php');
    class cVocabulary
    {
        function them_tuvung()
        {
            $p= new mVocabulary();
            $r = $p->add_vocabulary();
            return $r; 
        }
        function xem_tuvung($id,$topic)
        {
            $p= new mVocabulary();
            $r = $p->view_vocabulary($id,$topic);
            return $r; 
        }
        function duyet_tuvung($topic)
        {
            $p= new mVocabulary();
            $r = $p->review_vocabulary($topic);
            return $r; 
        }
        function ngaunhien_tuvung($correct)
        {
            $p= new mVocabulary();
            $r = $p->random_answer_vocabulary($correct);
            return $r; 
        }
    }
?>