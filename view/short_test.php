<?php
    include('header.php');
    include_once('minz_connect_db.php');
    $query = "SELECT COUNT(*) from noidungon as ndo join dekiemtra_doanvan_noidungon as ddndo on ndo.MaCH = ddndo.MaCH where ddndo.MaDe='test1'";
    $result = mysqli_query($conn, $query); 
    $row = mysqli_fetch_row($result);
    $totalQuestions = $row[0];
    $questionsPerPage = 1;
    $totalPages = ceil($totalQuestions / $questionsPerPage);
?>
    <title>ATI | Short Test</title>
    <style>
        #question-container{
            text-align: center;
        }
        #pagination-container{
            text-align: center;
        }
    </style>
<body>
    <main>
        <div class="container">
            <div class="row">
                <div id="question-container" class="col-md-8 col-sm-12">
                    <!-- Nội dung câu hỏi sẽ được hiển thị ở đây -->
                    <div id="question-container"></div>
                </div>
                <div id="pagination-container" class="col-md-4 col-sm-12">
                    <!-- Các nút bấm số câu hỏi sẽ được thêm vào đây -->
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(() => {
        let questions = []; // Mảng chứa toàn bộ câu hỏi
        let currentQuestion = 0;
    
        function createQuestionButton(questionNumber) {
            const button = $('<button>').text(questionNumber);
            button.addClass('btn btn-default question-button');
            button.click(() => {
                // Xử lý sự kiện khi người dùng click vào nút bấm câu hỏi
                // Gọi hàm để hiển thị câu hỏi tương ứng với số câu hỏi được chọn
                displayQuestion(questionNumber);
            });
            return button;
        }
    
        function displayQuestion(questionNumber) {
        currentQuestion = questionNumber;
        const question = questions[currentQuestion - 1];
        // Xóa nội dung câu hỏi hiện tại trong phần tử #question-container
        $('#question-container').empty();
        // Tạo một thẻ form
        const form = $('<form>');
        // Thêm câu hỏi audio vào form
        form.append('<audio controls src="../assets/audio/' + question.Cauhoi + '" type="audio/mp3"></audio></br>');
        // Thêm hình ảnh câu hỏi (nếu có) vào form
        if (question.Hinh) {
            form.append('<img style="width: 280px; height: 280px;" src="../assets/img/L1/' + question.Hinh + '" alt=""></br>');
        }
        // Thêm các đáp án và nút gửi câu trả lời vào form
        form.append('<input type="radio" name="answer" value="'+ question.DapanA +'"> '+ question.DapanA +' </br>');
        form.append('<input type="radio" name="answer" value="'+ question.DapanB +'"> '+ question.DapanB +' </br>');
        form.append('<input type="radio" name="answer" value="'+ question.DapanC +'"> '+ question.DapanC +' </br>');
        if (question.DapanD !== '' || null)
        {
            form.append('<input type="radio" name="answer" value="'+ question.DapanD +'"> '+ question.DapanD +' </br>');
        }
        form.append('<input type="hidden" name="questionNumber" value="' + question.DapanDung + '">');
        form.append('<input type="submit" value="Gửi câu trả lời">');
        // Đưa form vào phần tử #question-container
        $('#question-container').append(form);
    
        // Xử lý sự kiện submit form
        form.submit(function(event) {
            event.preventDefault(); // Ngăn chặn việc tải lại trang
            const answer = form.find('input[name="answer"]:checked').val(); // Lấy giá trị của đáp án được chọn
            // Gửi câu trả lời đi xử lý (có thể sử dụng AJAX)
            // ...
        });
    }

    
        $.ajax({
            url: 'get_questions.php',
            type: 'POST',
            success: function(response) {
                // Lưu trữ toàn bộ câu hỏi vào mảng
                questions = response;
                // Tạo các nút bấm câu hỏi và thêm vào phần tử #pagination-container
                for (let i = 1; i <= questions.length; i++) {
                    const questionButton = createQuestionButton(i);
                    $('#pagination-container').append(questionButton);
                }
                // Hiển thị câu hỏi đầu tiên khi tải trang
                displayQuestion(1);
            }
        });
    });


    </script>
</body>


<?php
    include('footer.php');
?>