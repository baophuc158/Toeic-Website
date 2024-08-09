<?php
    include('../model/mLT_review.php');
    class cLT_review
    {
        function hien_doanvan_lotrinh($malt)
        {
            $p = new mLT_review();
            $r = $p->show_Para($malt);
            return $r;
        }
        function hien_cauhoi_lotrinh($malt, $madv)
        {
            $p = new mLT_review();
            $r = $p->show_review_question($malt, $madv);
            return $r;
        }
        function re_diem_review($MaTK, $diem, $MaLT)
        {
            $p = new mLT_review();
            $r = $p->luudiemreview($MaTK, $diem, $MaLT);
            return $r;
        }
    }
?>