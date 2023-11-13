<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="csrf-token" content="YOUR_CSRF_TOKEN"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Tes Valiasi Cognitif</title>
    <style>
        body {
            font-family: 'Arial';
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
            max-width: 1000px;
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
            font-size: 24px;
            margin-top: 20px;

        }

        .question {
            margin-top: 20px;
        }

        .answer-form {
            display: flex;
            flex-direction: column;
            align-items: left;
        }

        .answer-button {
            margin-top: 10px;
            padding: 10px;
            font-size: 24px;
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
            align-items: left;
            font-size: 24px;

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
        .invisible-word {
            visibility: hidden; /* or */
            color: transparent;
        }


    </style>
</head>
<body>
    <div class="container">
        <ol id="question-list">
            <li class="question">
                <h1>Question:</h1>
                <p>Dalam perkembangan teknologi informasi, konektivitas yang ......... memungkinkan berbagi data dan informasi dengan cepat di seluruh dunia.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            luas
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            seragam
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            terbatas
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            kacau
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Pemahaman ........ teori psikologi membantu dalam mengidentifikasi pola perilaku manusia dalam berbagai konteks.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            mendalam
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            singkat
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            acak
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            tidak relevan
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Dalam bidang ekonomi, konsep inflasi mengacu pada....... umumnya naiknya harga-harga barang dan jasa dalam suatu periode waktu.</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            perubahan
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            penurunan
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            stabilitas
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            peningkatan
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Mana dibawah ini yang paling berbeda <span class="invisible-word">Mudah1</span></p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Kelapa
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            Mangga
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Rambutan
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Pepaya
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Mana dibawah ini yang paling berbeda <span class="invisible-word">Mudah2</span></p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Yogyakarta
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            Surabaya
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Jakarta
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Semarang
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Mana dibawah ini yang paling berbeda <span class="invisible-word">Mudah3</span></p>                
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Kapas
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            Kertas
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Karet
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Pintu
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Sejalan : .... =</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Linear
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            Fluktuatif
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Dinamis
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Rata
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Statis : ..... =</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Konstan
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            Dinamis
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Progresif
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Beresiko
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Keras Kepala : .... =</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Dogmatik
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            Adaptif
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Fleksibel
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Terbuka
                        </label>
                    </form>
                </div>
            </li>
            
            <!-- Repeat the above <li> block for each question -->
        </ol>
        
    </div>
    <button class="prev-button" style="display: none;">Previous Question</button>
    <button class="next-button" style="display: none;">Next Question</button>
    <!-- <a href="{{ route('result') }}"> -->
        <button id="submit-button" class="submit-button" disabled title="Please finish all questions">Submit</button>
    <!-- <a> -->
    <br>
    <div class="question-navigation" style="display: none;">
        <div class="select-dropdown">
            <select id="question-number">
            <!-- Options will be added dynamically using JavaScript -->
            </select>
        </div>
    </div>
    <button class="calculate-score-button" style="margin-top:50px;">Calculate Score</button>
    <form method="get" action="{{ route('logout') }}">
        @csrf <!-- Include a CSRF token for security -->
        <button type="submit">Logout</button>
    </form>
    <button id="processVideoButton" onclick="calculateAndLogSkor()" style="display: none;">See Current Total Score</button>
    

    <!-- <div class="dropdown">
        <div class="select">
          <span>Select Gender</span>
          <i class="fa fa-chevron-left"></i>
        </div> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var skor = {{ session('skor') ?? 0 }};
        console.log(skor);
    </script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    
    
    <script>
        var sessionData = @json(session()->all());
        document.addEventListener('DOMContentLoaded', function () {
            const submitButton = document.getElementById('submit-button');
            
            submitButton.addEventListener('click', function (event) {

                const sourceBQuestions = [
                    { Question: 'Narsisisme juga dapat diartikan sebagai bentuk\ndar… memperoleh perhatian dan pemujaan atas dirinya.\n', Score: -1 },
                    { Question: 'Body Image merupakan imajinasi subyektif yang dimi…hnya harus disesuaikan dengan persepsi - persepsi', Score: -1 },
                    { Question: 'Sistem patriarki yang ... perempuan dan lelaki tid…nkan terjadi oleh sebagian besar warga masyarakat', Score: -1 },
                    { Question: 'Husein Mutahar: WR Soepratman: Ismail Marzuki= .......', Score: -1 },
                    { Question: 'Bumi: Jupiter: Saturnus = ........', Score: -1 },
                    { Question: 'Kertas : Karet : Resin = .......', Score: -1 },
                    { Question: 'Pilihlah pola yang tepat pada soal di bawah ini:\nA, C, E, G, ...\n', Score: -1 },
                    { Question: 'Pilihlah pola yang tepat pada soal di bawah ini:\nE,H, M, P, ...\n', Score: -1 },
                    { Question: 'Pilihlah pola yang tepat pada soal di bawah ini:\nX, XII, X, XV, X, XIX, X, ...\n', Score: -1 }
                ];
                questionData.push(...sourceBQuestions);
                const rawScore = parseInt(calculateRawScore(), 10);
                const skorValidasiCognitif = (parseInt(rawScore, 10) * 1) + skor;

                // Prevent the default form submission behavior
                event.preventDefault();
                fetch('/add-data-to-session', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    body: JSON.stringify({ questionData })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    $.ajax({
                        type: "POST",
                        url: '/processAllvideo',
                        data: {
                            skorValidasiCognitif: skorValidasiCognitif
                        },
                        timeout: 1800000, // 30 minutes in milliseconds (30 * 60 * 1000)
                        success: function (response) {
                            // Handle the response from the server
                        },
                        error: function (xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                })
                
                .catch(error => {
                    console.error('Error storing data in session:', error);
                });

                var sessionValues = {};
                
                
                
                window.location.href = "{{ route('beforeresult') }}";
                location.reload();
            });
        });
    </script>
    <script>
         function calculateAndLogSkor() {
            // Calculate rawScore and parse it as an integer
            const rawScore = parseInt(calculateRawScore(), 10);

            // Assuming 'skor' is already defined, add the parsed rawScore to it
            const skorValidasiCognitif = parseInt(skor, 10) + rawScore;

            // Log skorValidasiCognitif to the console
            // console.log("skorValidasiCognitif:", skorValidasiCognitif);
        }
    </script>
    
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

        // // Hide all questions except the first one
        // const questions = document.querySelectorAll('.question');
        // questions.forEach((question, index) => {
        //     if (index !== currentQuestionIndex) {
        //         question.style.display = 'none';
        //     }
        // });

        // // Function to show the current question
        // function showCurrentQuestion() {
        //     questionsArray.forEach((question, index) => {
        //         if (index === currentQuestionIndex) {
        //             question.style.display = 'block';
        //         } else {
        //             question.style.display = 'none';
        //         }
        //     });
        // }


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
            // showCurrentQuestion();
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
            // showCurrentQuestion();
            questionNumberSelect.value = currentQuestionIndex + 1;
        });

        // Initially show the first question (randomized)
        // showCurrentQuestion();
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
                // showCurrentQuestion();
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
        var sessionData = @json(session()->all());
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
            // console.log('Python Data:', pythonData['neg']);
            var sessionData = @json(session()->all());
            console.log(sessionData);
            return scorePercentage;
        }

        function calculateRawScore() {
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

            var sessionData = @json(session()->all());
            // console.log(sessionData);
            return correctAnswers;
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
    <script>
        const questionData = [];

        document.querySelectorAll('.question').forEach(questionElement => {
            const question = questionElement.querySelector('p').textContent;
            const radioInput = questionElement.querySelector('input[type="radio"]:checked');
            const score = radioInput ? (radioInput.parentElement.getAttribute('data-correct') === 'true' ? 1 : 0) : 0;

            questionData.push({ Question: question, Score: score });
            
        });
        const sourceBQuestions = [
                { Question: 'Narsisisme juga dapat diartikan sebagai bentuk\ndar… memperoleh perhatian dan pemujaan atas dirinya.\n', Score: -1 },
                { Question: 'Body Image merupakan imajinasi subyektif yang dimi…hnya harus disesuaikan dengan persepsi - persepsi', Score: -1 },
                { Question: 'Sistem patriarki yang ... perempuan dan lelaki tid…nkan terjadi oleh sebagian besar warga masyarakat', Score: -1 },
                { Question: 'Husein Mutahar: WR Soepratman: Ismail Marzuki= .......', Score: -1 },
                { Question: 'Bumi: Jupiter: Saturnus = ........', Score: -1 },
                { Question: 'Kertas : Karet : Resin = .......', Score: -1 },
                { Question: 'Pilihlah pola yang tepat pada soal di bawah ini:\nA, C, E, G, ...\n', Score: -1 },
                { Question: 'Pilihlah pola yang tepat pada soal di bawah ini:\nE,H, M, P, ...\n', Score: -1 },
                { Question: 'Pilihlah pola yang tepat pada soal di bawah ini:\nX, XII, X, XV, X, XIX, X, ...\n', Score: -1 }
            ];

            // Add the questions from source B to the end of the questionData array
        questionData.push(...sourceBQuestions);
        // Add event listeners to radio inputs
        document.querySelectorAll('.radio-input').forEach((input, index) => {
            input.addEventListener('change', (event) => {
                const question = event.target.closest('li').querySelector('p').textContent;
                const isCorrect = event.target.parentElement.getAttribute('data-correct') === 'true';
                const score = isCorrect ? 1 : 0;

                // Update or add the selected answer in the questionData array
                const existingQuestionIndex = questionData.findIndex(item => item.Question === question);
                if (existingQuestionIndex !== -1) {
                    questionData[existingQuestionIndex].Score = score;
                } else {
                    questionData.push({ Question: question, Score: score });
                }

                // Log the updated data (you can send it to the server as needed)
                console.log(questionData);
            });
        });

        // document.getElementById('calculate-score1').addEventListener('click', function () {
        //     const sourceBQuestions = [
        //         { Question: 'Narsisisme juga dapat diartikan sebagai bentuk\ndar… memperoleh perhatian dan pemujaan atas dirinya.\n', Score: -1 },
        //         { Question: 'Body Image merupakan imajinasi subyektif yang dimi…hnya harus disesuaikan dengan persepsi - persepsi', Score: -1 },
        //         { Question: 'Sistem patriarki yang ... perempuan dan lelaki tid…nkan terjadi oleh sebagian besar warga masyarakat', Score: -1 },
        //         { Question: 'Husein Mutahar: WR Soepratman: Ismail Marzuki= .......', Score: -1 },
        //         { Question: 'Bumi: Jupiter: Saturnus = ........', Score: -1 },
        //         { Question: 'Kertas : Karet : Resin = .......', Score: -1 },
        //         { Question: 'Pilihlah pola yang tepat pada soal di bawah ini:\nA, C, E, G, ...\n', Score: -1 },
        //         { Question: 'Pilihlah pola yang tepat pada soal di bawah ini:\nE,H, M, P, ...\n', Score: -1 },
        //         { Question: 'Pilihlah pola yang tepat pada soal di bawah ini:\nX, XII, X, XV, X, XIX, X, ...\n', Score: -1 }
        //     ];

        //     // Add the questions from source B to the end of the questionData array
        //     questionData.push(...sourceBQuestions);
        //     fetch('/add-data-to-session', {
        //         method: 'POST',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        //         },
        //         body: JSON.stringify({ questionData })
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         console.log(data.message);
        //     })
        //     .catch(error => {
        //         console.error('Error storing data in session:', error);
        //     });
        // });
    </script>

