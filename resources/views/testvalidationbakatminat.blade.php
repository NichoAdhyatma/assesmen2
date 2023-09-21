<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Validasi Bakat Minat</title>
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
                <h1>Question 1:</h1>
                <p>Saya menikmati bekerja dengan tangan dan menggunakan alat-alat.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="1">
                            Sangat tidak suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="2">
                            Tidak Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="4">
                            Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="5">
                            Sangat Suka
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 2:</h1>
                <p>Saya tertarik pada penelitian dan eksplorasi ilmiah.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="1">
                            Sangat tidak suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="2">
                            Tidak Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="4">
                            Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="5">
                            Sangat Suka
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 3:</h1>
                <p>Saya menikmati mengungkapkan diri melalui seni dan kreativitas.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer3" value="1">
                            Sangat tidak suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer3" value="2">
                            Tidak Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer3" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer3" value="4">
                            Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer3" value="5">
                            Sangat Suka
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 4:</h1>
                <p>Saya suka membantu orang lain dan bekerja dalam kelompok.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer4" value="1">
                            Sangat tidak suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer4" value="2">
                            Tidak Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer4" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer4" value="4">
                            Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer4" value="5">
                            Sangat Suka
                        </label>    
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 5:</h1>
                <p>Saya memiliki minat dalam memimpin dan mempengaruhi orang lain.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer5" value="1">
                            Sangat tidak suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer5" value="2">
                            Tidak Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer5" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer5" value="4">
                            Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer5" value="5">
                            Sangat Suka
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 6:</h1>
                <p>Saya menyukai tugas-tugas yang memiliki struktur yang jelas dan rutin.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer6" value="1">
                            Sangat tidak suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer6" value="2">
                            Tidak Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer6" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer6" value="4">
                            Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer6" value="5">
                            Sangat Suka
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 7:</h1>
                <p>Saya menikmati olahraga atau aktivitas fisik.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer7" value="1">
                            Sangat tidak suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer7" value="2">
                            Tidak Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer7" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer7" value="4">
                            Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer7" value="5">
                            Sangat Suka
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 8:</h1>
                <p>Saya tertarik pada penulisan, membaca, atau menggali informasi.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer8" value="1">
                            Sangat tidak suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer8" value="2">
                            Tidak Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer8" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer8" value="4">
                            Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer8" value="5">
                            Sangat Suka
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 9:</h1>
                <p>Saya senang berpartisipasi dalam pertunjukan atau acara seni.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer9" value="1">
                            Sangat tidak suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer9" value="2">
                            Tidak Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer9" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer9" value="4">
                            Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer9" value="5">
                            Sangat Suka
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 10:</h1>
                <p>Saya suka berinteraksi dengan orang banyak dan membantu mereka.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer10" value="1">
                            Sangat tidak suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer10" value="2">
                            Tidak Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer10" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer10" value="4">
                            Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer10" value="5">
                            Sangat Suka
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 11:</h1>
                <p>Saya tertarik pada peluang bisnis dan mengambil risiko.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer11" value="1">
                            Sangat tidak suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer11" value="2">
                            Tidak Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer11" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer11" value="4">
                            Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer11" value="5">
                            Sangat Suka
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 12:</h1>
                <p>Saya suka bekerja dengan data dan detail yang akurat.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer12" value="1">
                            Sangat tidak suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer12" value="2">
                            Tidak Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer12" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer12" value="4">
                            Suka
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer12" value="5">
                            Sangat Suka
                        </label>
                    </form>
                </div>
            </li>
            
            
            <!-- Repeat the above <li> block for each question -->
        </ol>
        
    </div>
    <button class="prev-button">Previous Question</button>
    <button class="next-button">Next Question</button>
    <button id="calculate-button">Calculate</button>
    <!-- <a href="{{ route('testvalidation') }}"> -->
        <button id="submit-button" class="submit-button" disabled title="Please finish all questions">Submit</button>
    <!-- <a> -->
    <br>
    <div class="question-navigation">
        <div class="select-dropdown">
            <select id="question-number">
            <!-- Options will be added dynamically using JavaScript -->
            </select>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const scoreR1 = document.querySelector('input[name="answer1"]:checked')?.value || 0;
        const scoreR2 = document.querySelector('input[name="answer7"]:checked')?.value || 0;
        $resultR = parseInt(scoreR1) + parseInt(scoreR2);

        const scoreI1 = document.querySelector('input[name="answer2"]:checked')?.value || 0;
        const scoreI2 = document.querySelector('input[name="answer8"]:checked')?.value || 0;
        $resultI = parseInt(scoreI1) + parseInt(scoreI2);

        const scoreA1 = document.querySelector('input[name="answer3"]:checked')?.value || 0;
        const scoreA2 = document.querySelector('input[name="answer9"]:checked')?.value || 0;
        const resultA = parseInt(scoreA1) + parseInt(scoreA2);

        const scoreS1 = document.querySelector('input[name="answer4"]:checked')?.value || 0;
        const scoreS2 = document.querySelector('input[name="answer10"]:checked')?.value || 0;
        const resultS = parseInt(scoreS1) + parseInt(scoreS2);

        const scoreE1 = document.querySelector('input[name="answer5"]:checked')?.value || 0;
        const scoreE2 = document.querySelector('input[name="answer11"]:checked')?.value || 0;
        const resultE = parseInt(scoreE1) + parseInt(scoreE2);

        const scoreC1 = document.querySelector('input[name="answer6"]:checked')?.value || 0;
        const scoreC2 = document.querySelector('input[name="answer12"]:checked')?.value || 0;
        $resultC = parseInt(scoreC1) + parseInt(scoreC2);
        // Function to calculate and assign scores

        function calculateScores() {
            const scoreR1 = document.querySelector('input[name="answer1"]:checked')?.value || 0;
            const scoreR2 = document.querySelector('input[name="answer7"]:checked')?.value || 0;
            $resultR = parseInt(scoreR1) + parseInt(scoreR2);

            const scoreI1 = document.querySelector('input[name="answer2"]:checked')?.value || 0;
            const scoreI2 = document.querySelector('input[name="answer8"]:checked')?.value || 0;
            $resultI = parseInt(scoreI1) + parseInt(scoreI2);

            const scoreA1 = document.querySelector('input[name="answer3"]:checked')?.value || 0;
            const scoreA2 = document.querySelector('input[name="answer9"]:checked')?.value || 0;
            $resultA = parseInt(scoreA1) + parseInt(scoreA2);

            const scoreS1 = document.querySelector('input[name="answer4"]:checked')?.value || 0;
            const scoreS2 = document.querySelector('input[name="answer10"]:checked')?.value || 0;
            $resultS = parseInt(scoreS1) + parseInt(scoreS2);

            const scoreE1 = document.querySelector('input[name="answer5"]:checked')?.value || 0;
            const scoreE2 = document.querySelector('input[name="answer11"]:checked')?.value || 0;
            $resultE = parseInt(scoreE1) + parseInt(scoreE2);

            const scoreC1 = document.querySelector('input[name="answer6"]:checked')?.value || 0;
            const scoreC2 = document.querySelector('input[name="answer12"]:checked')?.value || 0;
            $resultC = parseInt(scoreC1) + parseInt(scoreC2);

            axios.post('/gotoValidation', {
                resultR: $resultR,
                resultI: $resultI,
                resultA: $resultA,
                resultS: $resultS,
                resultE: $resultE,
                resultC: $resultC
            })
            .then(function (response) {
                console.log("Yeeee"); // Log a success message
            })
            .catch(function (error) {
                console.error("Fail"); // Log any errors
            });
            // Example: Display the scores in the console
            console.log("ScoreR: " + $resultR);
            console.log("ScoreI: " + $resultI);
            console.log("ScoreA: " + $resultA);
            console.log("ScoreS: " + $resultS);
            console.log("ScoreE: " + $resultE);
            console.log("ScoreC: " + $resultC);
        }

        // Add an event listener to the Calculate button to trigger the calculation
        document.querySelector('#calculate-button').addEventListener('click', calculateScores);

        document.addEventListener('DOMContentLoaded', function () {
            const submitButton = document.getElementById('submit-button');
            
            submitButton.addEventListener('click', function (event) {
                // Prevent the default form submission behavior
                event.preventDefault();
                
                // Call the calculateScores() function here
                calculateScores();
                
                // After calling calculateScores(), you can redirect to the 'testvalidation' route
                window.location.href = "{{ route('testvalidation') }}";
            });
        });
    </script>
    <script>
        // Get the list of questions and navigation buttons
        const questionList = document.getElementById('question-list');
        const questionNumberInput = document.getElementById('question-number');
        const questionNumberSelect = document.getElementById('question-number');
        const goToQuestionButton = document.getElementById('go-to-question');
        const prevButton = document.querySelector('.prev-button');
        const nextButton = document.querySelector('.next-button');

        // Get the list of questions and convert it to an array
        const questionsArray = Array.from(questionList.children);

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

        // Initially show the first question (not randomized)
        showCurrentQuestion();

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
</body>
</html>