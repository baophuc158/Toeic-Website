<?php
    include('../model/mbaiviet.php');
    class bai_post
    {
        function view_post()
        {
            $p= new baiviet();
            $r = $p->xuat_baiviet();
            return $r;
        }
    }
?>