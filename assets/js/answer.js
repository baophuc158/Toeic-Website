document.getElementById('gui').addEventListener('click', function(event) {
        var isFormValid = true;
        
        questions.forEach(question => {
            var answerInputs = question.querySelectorAll('input[type="radio"]');
            var selectedAnswer = false;

            answerInputs.forEach(input => {
                if (input.checked) {
                    selectedAnswer = true;
                }
            });

            if (!selectedAnswer) {
                isFormValid = false;
                alert('Please select an answer for all questions before submitting!');
            }
        });
        
        if (!isFormValid) {
            event.preventDefault();
        }
    });