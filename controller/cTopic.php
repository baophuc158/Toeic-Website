<?php
    include_once('../model/mTopic.php');
    class cTopic
    {
        function xem_chude()
        {
            $p= new mTopic();
            $r = $p->view_topic();
            return $r; 
        }
    }
?>