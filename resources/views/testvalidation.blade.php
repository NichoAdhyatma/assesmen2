<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question and Answer Page</title>
    <style>
        body {
            font-family: 'Montserrat';
            text-align: center;
        }

        .answer-button,
        .prev-button,
        .next-button,
        .go-to-question {
            background-color: #0f33ff; /* Change button color to blue */
            color: #fff; /* Change text color to white */
            font-family: 'Montserrat'; /* Apply Montserrat font */
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 24px;
        }

        p {
            font-size: 18px;
            margin-top: 20px;
        }

        .question {
            margin-top: 20px;
        }

        .answer-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .answer-button {
            margin-top: 10px;
            padding: 10px;
            font-size: 18px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .answer-button:hover {
            background-color: #2980b9;
        }
        

        .prev-button {
            max width: 600px;
            width: 50%;
            
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #0f33ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .next-button {
            max width: 600px;
            width: 50%;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #0f33ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .go-to-question {
            width: 50%;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #2ecc71;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px; 
        }

        .next-button:hover {
            background-color: #2980b9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a shadow on hover */
        }

        /* Hover effect for previous button */
        .prev-button:hover {
            background-color: #2980b9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a shadow on hover */
        }


        /* Style for radio buttons */
        .radio-label {
            display: flex;
            align-items: center;
        }

        .radio-input {
            margin-right: 10px;
        }

        .question-navigation {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px; 
            /* width: 300px;
            display: inline-block;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 0 2px rgb(204, 204, 204);
            transition: all .5s ease;
            position: relative;
            font-size: 14px;
            color: #474747;
            height: 100%; */
            text-align: left
        }
        /* .question-navigation .select {
            cursor: pointer;
            display: block;
            padding: 10px
        } */
        .image {
            max-width: 100%;
            
            max-height: 100%;
        }
        .answerimage {
            max-width: 100%;
            max-height: 200px;
        }
        .question-image-container {
            max-width: 100%; /* Adjust as needed */
            margin: 0 auto;
        }

        .select-dropdown,
        .select-dropdown * {
            margin: 0;
            padding: 0;
            position: relative;
            box-sizing: border-box;
        }
        .select-dropdown {
            position: relative;
            background-color: #E6E6E6;
            border-radius: 4px;
        }
        .select-dropdown select {
            font-size: 1rem;
            font-weight: normal;
            max-width: 100%;
            padding: 8px 24px 8px 10px;
            border: none;
            background-color: transparent;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        .select-dropdown select:active,
        .select-dropdown select:focus {
            outline: none;
            box-shadow: none;
        }
        .select-dropdown:after {
            content: "";
            position: absolute;
            top: 50%;
            right: 8px;
            width: 0;
            height: 0;
            margin-top: -2px;
            border-top: 5px solid #aaa;
            border-right: 5px solid transparent;
            border-left: 5px solid transparent;
        }

        .submit-button {
            max width: 600px;
            width: 50%;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #0f33ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #2980b9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a shadow on hover */
        }
        .submit-button[disabled] {
            background-color: #ccc; /* Change the background color to a muted gray */
            cursor: not-allowed; /* Change the cursor to indicate it's not clickable */
            color: #999; /* Change the text color to a muted gray */
            box-shadow: none; /* Remove the shadow when disabled */
        }

        .submit-button[disabled]:hover {
            background-color: #ccc; /* Change the background color to a muted gray */
            cursor: not-allowed; /* Change the cursor to indicate it's not clickable */
            color: #999; /* Change the text color to a muted gray */
            box-shadow: none; /* Remove the shadow when disabled */
        }

        .submit-button[disabled]:hover::after {
            content: "Please finish all questions"; /* Tooltip text */
            display: block;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
        }

    </style>
</head>
<body>
    <div class="container">
        <ol id="question-list">
            <li class="question">
                <h1>Question:</h1>
                <div class="question-image-container">
                    <img src="assets/questionimg/question1.png" alt="Question 1" class="image">
                </div>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="Option A">
                            <img src="assets/answerimg/q1a.png" alt="Option A" class="answerimage">
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="Option B">
                            <img src="assets/answerimg/q1b.png" alt="Option B" class="answerimage">
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="Option C">
                            <img src="assets/answerimg/q1c.png" alt="Option C" class="answerimage">
                        </label>
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer1" value="Option D">
                            <img src="assets/answerimg/q1d.png" alt="Option D" class="answerimage">
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Select the correct answer:</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Option Correct
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Option Wrong A
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Option Wrong B
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <div class="question-image-container">
                    <img src="assets/questionimg/question2.png" alt="Question 2" class="image">
                </div>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="Option A">
                            <img src="assets/answerimg/q2a.png" alt="Option A" class="answerimage">
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="Option B">
                            <img src="assets/answerimg/q2b.png" alt="Option B" class="answerimage">
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="Option C">
                            <img src="assets/answerimg/q2c.png" alt="Option C" class="answerimage">
                        </label>
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer1" value="Option D">
                            <img src="assets/answerimg/q2d.png" alt="Option D" class="answerimage">
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <div class="question-image-container">
                    <img src="assets/questionimg/question3.png" alt="Question 3" class="image">
                </div>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="Option A">
                            <img src="assets/answerimg/q3a.png" alt="Option A" class="answerimage">
                        </label>
                        <label class="radio-label"  data-correct="true">
                            <input type="radio" class="radio-input" name="answer1" value="Option B">
                            <img src="assets/answerimg/q3b.png" alt="Option B" class="answerimage">
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="Option C">
                            <img src="assets/answerimg/q3c.png" alt="Option C" class="answerimage">
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="Option D">
                            <img src="assets/answerimg/q3d.png" alt="Option D" class="answerimage">
                        </label>
                    </form>
                </div>
            </li>
            
            <!-- Repeat the above <li> block for each question -->
        </ol>
        
    </div>
    <button class="prev-button">Previous Question</button>
    <button class="next-button">Next Question</button>
    <a href="{{ route('result') }}">
        <button id="submit-button" class="submit-button" disabled title="Please finish all questions">Submit</button>
    <a>
    <br>
    <div class="question-navigation">
        <div class="select-dropdown">
            <select id="question-number">
            <!-- Options will be added dynamically using JavaScript -->
            </select>
        </div>
    </div>
    <button class="calculate-score-button">Calculate Score</button>
    

    <!-- <div class="dropdown">
        <div class="select">
          <span>Select Gender</span>
          <i class="fa fa-chevron-left"></i>
        </div> -->

    <script>
        // Get the list of questions and navigation buttons
        const questionList = document.getElementById('question-list');
        const questionNumberInput = document.getElementById('question-number');
        const questionNumberSelect = document.getElementById('question-number');
        const goToQuestionButton = document.getElementById('go-to-question');
        const prevButton = document.querySelector('.prev-button');
        const nextButton = document.querySelector('.next-button');
        
        // Script Untuk membuat tampil pertanyaan secara random ------------------------------------------------------------------------
        // Populate the select element with the possible question numbers
        for (let i = 1; i <= questionList.children.length; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = `Question ${i}`;
            questionNumberSelect.appendChild(option);
        }

        // questionNumberInput.max = questionList.children.length;

        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }

        // Get the list of questions and convert it to an array
        // const questionList = document.getElementById('question-list');
        const questionsArray = Array.from(questionList.children);

        // Shuffle the array to randomize the order of questions
        shuffleArray(questionsArray);
        

        


        // Script Untuk membuat tampil pertanyaan selain yang sekarang hilang ------------------------------------------------------------------------
        // Initialize the current question index
        let currentQuestionIndex = 0;

        // Hide all questions except the first one
        const questions = document.querySelectorAll('.question');
        questions.forEach((question, index) => {
            if (index !== currentQuestionIndex) {
                question.style.display = 'none';
            }
        });

        // Function to show the current question
        function showCurrentQuestion() {
            questionsArray.forEach((question, index) => {
                if (index === currentQuestionIndex) {
                    question.style.display = 'block';
                } else {
                    question.style.display = 'none';
                }
            });
        }


        // Scripts for making the next and prev button questions
        // Add an event listener to the Next Question button
        nextButton.addEventListener('click', () => {
            // Hide the current question
            questionsArray[currentQuestionIndex].style.display = 'none';

            // Move to the next question
            currentQuestionIndex++;

            // If at the end of questions, loop back to the first question
            if (currentQuestionIndex >= questionsArray.length) {
                currentQuestionIndex--;
            }

            // Show the next question
            showCurrentQuestion();
            questionNumberSelect.value = currentQuestionIndex + 1;


        });

        // Add an event listener to the Previous Question button
        prevButton.addEventListener('click', () => {
            // Hide the current question
            questionsArray[currentQuestionIndex].style.display = 'none';

            // Move to the previous question
            currentQuestionIndex--;

            // If at the beginning of questions, move to the last question
            if (currentQuestionIndex < 0) {
                currentQuestionIndex++;
            }

            // Show the previous question
            showCurrentQuestion();
            questionNumberSelect.value = currentQuestionIndex + 1;
        });

        // Initially show the first question (randomized)
        showCurrentQuestion();
        shuffleOptions();


        //Ajax untuk mengganti ke pertanyaan yang dituju
        questionNumberInput.addEventListener('input', () => {
            const desiredQuestionNumber = parseInt(questionNumberInput.value);
            navigateToQuestion(desiredQuestionNumber);
        });

        // Add an event listener to the select element for question navigation
        questionNumberSelect.addEventListener('change', () => {
            const desiredQuestionNumber = parseInt(questionNumberSelect.value);
            navigateToQuestion(desiredQuestionNumber);
        });

        // Function to navigate to a specific question
        function navigateToQuestion(desiredQuestionNumber) {
            if (!isNaN(desiredQuestionNumber) && desiredQuestionNumber >= 1 && desiredQuestionNumber <= questionsArray.length) {
                // Hide the current question
                questionsArray[currentQuestionIndex].style.display = 'none';

                // Set the current question index to the desired question number minus one
                currentQuestionIndex = desiredQuestionNumber - 1;

                // Show the desired question
                showCurrentQuestion();
            }
        }

        function populateQuestionSelect() {
            const questionNumberSelect = document.getElementById('question-number');
            
            // Remove any existing options
            questionNumberSelect.innerHTML = '';

            // Add options for each question
            questionsArray.forEach((_, index) => {
                const option = document.createElement('option');
                option.value = index + 1;
                option.textContent = `Question ${index + 1}`;
                questionNumberSelect.appendChild(option);
            });
        }

        function updateQuestionSelect() {
            populateQuestionSelect();
            // Set the selected option to the current question index + 1
            questionNumberSelect.value = currentQuestionIndex + 1;
        }

        // Call the function to update the select element initially
        updateQuestionSelect();

        function shuffleOptions() {
            questionsArray.forEach((question) => {
                const form = question.querySelector('form.answer-form');
                const options = Array.from(form.querySelectorAll('label.radio-label'));

                // Shuffle the options array
                shuffleArray(options);

                // Remove existing options from the form
                options.forEach((option) => {
                form.removeChild(option);
                });

                // Append shuffled options back to the form
                options.forEach((option) => {
                form.appendChild(option);
                });
            });
        }
        
        function calculateScore() {
            let correctAnswers = 0;
            const totalQuestions = questionsArray.length;

            questionsArray.forEach((question, index) => {
                const form = question.querySelector('form.answer-form');
                const selectedOption = form.querySelector('input[type="radio"]:checked');
                const correctOption = question.querySelector('label[data-correct="true"] input[type="radio"]');

                if (selectedOption && selectedOption === correctOption) {
                correctAnswers++;
                }
            });

            const scorePercentage = (correctAnswers / totalQuestions) * 100;
            alert(`Your Score: ${correctAnswers} out of ${totalQuestions} (${scorePercentage.toFixed(2)}%)`);
        }

        const calculateScoreButton = document.querySelector('.calculate-score-button');

        calculateScoreButton.addEventListener('click', calculateScore);

        // Script to make a button that is disabled until every questions are answered
        // Get the submit button element
        const submitButton = document.getElementById('submit-button');

        // Function to check if all radio buttons are selected
        function checkAllRadioButtonsSelected() {
            let allSelected = true;

            questionsArray.forEach((question) => {
                const form = question.querySelector('form.answer-form');
                const selectedOption = form.querySelector('input[type="radio"]:checked');

                if (!selectedOption) {
                    allSelected = false;
                }
            });

            return allSelected;
        }

        // Add an event listener to each radio button
        questionsArray.forEach((question) => {
            const form = question.querySelector('form.answer-form');
            const radioInputs = form.querySelectorAll('input[type="radio"]');

            radioInputs.forEach((radioInput) => {
                radioInput.addEventListener('change', () => {
                    // Check if all radio buttons are selected
                    if (checkAllRadioButtonsSelected()) {
                        submitButton.removeAttribute('disabled');
                    } else {
                        submitButton.setAttribute('disabled', 'disabled');
                    }
                });
            });
        });



    </script>

