<?php
    include('../model/mBlog.php');
    class CBLOG
    {
        function cre_post()
        {
            $p= new MBLOG();
            $r = $p->tao_post();
            return $r;
        }
        function show_title()
        {
            $p= new MBLOG();
            $r = $p->xem_tieude();
            return $r;
        }
        function show_baiviet($mabv)
        {
            $p= new MBLOG();
            $r = $p->xem_baiviet($mabv);
            return $r;
        }
        function cre_binhluan()
        {
            $p= new MBLOG();
            $r = $p->binhluan();
            return $r;
        }
        function show_binhluan($mabv)
        {
            $p= new MBLOG();
            $r = $p->xem_binhluan($mabv);
            return $r;
        }
    }
?>