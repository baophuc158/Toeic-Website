<?php
include_once('ketnoi.php');
    class mGrammar
    {
        function view_grammar_question($tense_ID)
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
            mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                //$sql = "select *from question_g where Tense = '$tense_name'";
                $sql = "SELECT * FROM question_g AS q_g JOIN grammar AS gr ON q_g.id = gr.ID WHERE q_g.TypeID = '$tense_ID' ORDER BY RAND()";
                $qr = mysqli_query($conn, $sql);
                return $qr;
                $p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
        function view_grammar_tense()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
            mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                $sql = "SELECT * FROM grammar";
                $qr = mysqli_query($conn, $sql);
                return $qr;
                $p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
        function add_grammar_question()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
            mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                if(isset($_POST['add_GQ']))
                {
                    $tense= $_POST['tense'];
                    $cauhoi= $_POST['cauhoi'];
                    $dapana= $_POST['dapana'];
                    $dapanb= $_POST['dapanb'];
                    $dapanc= $_POST['dapanc'];
                    $dapand= $_POST['dapand'];
                    $dapandung= $_POST['dapandung'];
                    $giaithich= $_POST['giaithich'];
                    if($tense== 'none'|| $cauhoi=='' || $dapana==''|| $dapanb==''|| $dapanc==''|| $dapand ==''||$dapandung ==''|| $giaithich =='')
                    {
                        echo "<script>alert('Thiếu thông tin nhập')</script>";
                    }
                    else
                    {
                        $sql = "INSERT INTO question_g (ID, TypeID, Grammar_question, AnswerA, AnswerB, AnswerC, AnswerD, Correct_Answer, Explanation) VALUES ('','$tense','$cauhoi', '$dapana', '$dapanb', '$dapanc', '$dapand', '$dapandung', '$giaithich')";
                        $qr = mysqli_query($conn, $sql);
                        return $qr;
                    }
                    $p->ngatketnoi($conn);
                }
            }
            else
            {
                return false;
            }
        }
        function add_tense() 
        {
            $conn = mysqli_connect('localhost', 'ayayatoe', 'tP94l7nyXH(9#B', 'ayayatoe_toeic');
            mysqli_set_charset($conn, 'utf8');
            if ($conn) 
            {
                if (isset($_POST['add_Tense'])) 
                {
                    $tense_name = $_POST['Tense'];
                    $mota = $_POST['mota'];
                    if ($tense_name == '' || $mota == '') 
                    {
                        echo "<script>alert('Thiếu thông tin nhập')</script>";
                    } 
                    else 
                    {
                        $sql = "INSERT INTO grammar (ID, tense_name, Description) VALUES ('', '$tense_name', '$mota')";
                        $qr = mysqli_query($conn, $sql);
                        mysqli_close($conn);
                        return $qr;
                    }
                }
            } 
            else 
            {
                return false;
            }
        }
        function view_grammar_question_list()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
            mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                $sql = "SELECT * FROM `question_g` AS q_g JOIN grammar AS gr ON q_g.TypeID = gr.ID WHERE q_g.TypeID = gr.ID";
                $qr = mysqli_query($conn, $sql);
                return $qr;
                $p->ngatketnoi($conn);
            }
            else
            {
                return false;
            }
        }
        function show_question_list()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
            mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                $sql = "SELECT * FROM grammar";
                $qr = mysqli_query($conn, $sql);
                return $qr;
            }
            else
            {
                return false;
            }
        }
        /*function search_grammar_tense()
        {
            $conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
            mysqli_set_charset($conn ,'utf8');
            if($conn)
            {
                if(isset($_POST['search']))
                {
                    $tense_id = $_POST['tense'];
                    if($tense_id == 'none')
                    {
                        echo '<script>alert("something went wrong !")</script>';
                        return false;
                    }
                    else
                    {
                        $sql = "SELECT * FROM `question_g` AS q_g JOIN grammar AS gr ON q_g.TypeID = gr.ID WHERE q_g.TypeID = $tense_id";
                        $qr = mysqli_query($conn, $sql);
                        return $qr;
                    }
                }
            }
            else
            {
                return false;
            }
        }*/
        function search_grammar_tense()
        {
            $conn = mysqli_connect('localhost', 'ayayatoe', 'tP94l7nyXH(9#B', 'ayayatoe_toeic');
            mysqli_set_charset($conn, 'utf8');
            if ($conn) {
                if (isset($_POST['search']) && isset($_POST['tense'])) {
                    $tense_id = mysqli_real_escape_string($conn, $_POST['tense']);
                    if ($tense_id !== '') {
                        $sql = "SELECT * FROM `question_g` AS q_g JOIN grammar AS gr ON q_g.TypeID = gr.ID WHERE q_g.TypeID = ?";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, 'i', $tense_id);
                        mysqli_stmt_execute($stmt);
                        $qr = mysqli_stmt_get_result($stmt);
                        return $qr;
                    } else {
                        echo '<script>alert("Please select a tense")</script>';
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        function select_question($id)
        {
            $conn = mysqli_connect('localhost', 'ayayatoe', 'tP94l7nyXH(9#B', 'ayayatoe_toeic');
            mysqli_set_charset($conn, 'utf8');
            if ($conn)
            {
                $sql = "SELECT * FROM question_g WHERE id = '$id'";
                $qr = mysqli_query($conn, $sql);
                return $qr;
            }
            else
            {
                return false;
            }
        }
        function update_question()
        {
            $conn = mysqli_connect('localhost', 'ayayatoe', 'tP94l7nyXH(9#B', 'ayayatoe_toeic');
            mysqli_set_charset($conn, 'utf8');
            if ($conn)
            {
                if(isset($_POST['update']))
                {
                    $id = $_POST['id'];
                    $question = $_POST['cauhoi'];
                    $a = $_POST['dapana'];
                    $b = $_POST['dapanb'];
                    $c = $_POST['dapanc'];
                    $d = $_POST['dapand'];
                    $correct = $_POST['dapandung'];
                    $ex = $_POST['giaithich'];
                    if($id == '' || $question == '' || $a == '' || $b == '' || $c == '' || $d == '' || $correct == '' || $ex == '')
                    {
                        echo "<script>alert('Vui lòng nhập đủ thông tin')</script>";
                    }
                    else
                    {
                        $sql = "UPDATE question_g SET id = '$id', Grammar_question = '$question', AnswerA = '$a', AnswerB = '$b', AnswerC = '$c', AnswerD = '$d', Correct_Answer = '$correct', Explanation = '$ex' WHERE id = '$id'";
                        $qr = mysqli_query($conn, $sql);
                        return $qr;
                    }
                }
                else
                {
                    echo "<script>alert('nút có vấn đề r bạn ơi !')</script>";
                }
            }
            else
            {
                return false;
            }
        }
    }
?>