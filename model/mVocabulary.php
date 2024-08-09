<?php
    include_once('ketnoi.php');
    class mVocabulary
    {
        function add_vocabulary()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                /*if(isset($_POST['add_vocab']))
                {
                    $ID_vocabulary= $_POST['ID_vocabulary'];
                    $tu_vung=$_POST['tu_vung'];
                    $topic= $_POST['topic'];
                    $phien_am= $_POST['phien_am'];
                    $mota = $_POST['mota'];
                    $vi_du = $_POST['vi_du'];                   
                }*/
                $sql = "select * from topic";
                $qr = mysqli_query($conn, $sql);
                return $qr;
                $p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
        function view_vocabulary($id,$topic) /*$topic*/ 
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                $sql = "select *from question_v join topic_vocabulary_info on question_v.ID_vocabulary = topic_vocabulary_info.ID_vocabulary join topic on topic_vocabulary_info.ID_topic = topic.ID_topic where topic_vocabulary_info.ID_topic = '$id' or topic.Topic='$topic'"; /*topic = '$topic'*/ 
                //$sql = "select *from question_v join topic_vocabulary_info on question_v.ID_vocabulary = topic_vocabulary_info.ID_vocabulary join topic on topic_vocabulary_info.ID_topic = topic.ID_topic where topic.ID_Topic = '$id' or topic_vocabulary_info.ID_topic='$topic' limit 1";
                $qr = mysqli_query($conn, $sql);
                return $qr;
                $p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
        function review_vocabulary($topic)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');

            if($conn)
            {
                $sql = "SELECT *FROM question_v join topic_vocabulary_info ON question_v.ID_vocabulary = topic_vocabulary_info.ID_vocabulary join topic on topic_vocabulary_info.ID_topic = topic.ID_topic WHERE topic.Topic = '$topic' ORDER BY RAND()";
                $qr = mysqli_query($conn, $sql);
                return $qr;
                $p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
        function random_answer_vocabulary($correct)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		    mysqli_set_charset($conn ,'utf8');

            if($conn)
            {
                $sql = "SELECT question_v.tu_vung FROM question_v join topic_vocabulary_info ON question_v.ID_vocabulary = topic_vocabulary_info.ID_vocabulary join topic on topic_vocabulary_info.ID_topic = topic.ID_topic WHERE question_v.tu_vung != '$correct' ORDER BY RAND() LIMIT 3";
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