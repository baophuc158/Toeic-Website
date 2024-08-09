<?php
    include_once('ketnoi.php');
    class mTopic
    {
        function view_topic()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                $sql = "select *from topic";
                $qr = mysqli_query($conn, $sql);
                return $qr;
                $p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
    }
?>