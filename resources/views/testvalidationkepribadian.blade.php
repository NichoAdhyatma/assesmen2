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
            <!-- Pertanyaan 1-10 Emotional Stability  -->
            <li class="question">
                <h1>Question 1:</h1>
                <p>Saya mudah khawatir</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer1" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 2:</h1>
                <p>Suasana hati saya sering cepat berubah</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 3:</h1>
                <p>Perasaan saya berubah-ubah</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer3" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer3" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer3" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer3" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer3" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 4:</h1>
                <p>Saya mudah merasa kesal</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer4" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer4" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer4" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer4" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer4" value="1">
                            Sangat Setuju
                        </label>    
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 5:</h1>
                <p>Saya mudah merasa tertekan</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer5" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer5" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer5" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer5" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer5" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 6:</h1>
                <p>Saya mudah merasa terganggu</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer6" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer6" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer6" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer6" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer6" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 7:</h1>
                <p>Saya mudah merasa jengkel </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer7" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer7" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer7" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer7" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer7" value="1">
                            Sangat Setuju
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
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer8" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer8" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer8" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer8" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 9:</h1>
                <p>Saya jarang merasa sedih</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer9" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer9" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer9" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer9" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer9" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 10:</h1>
                <p>Saya sering merasa sedih</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer10" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer10" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer10" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer10" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer10" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>


            <!-- Pertanyaan 11-20 Emotional Stability  -->
            <li class="question">
                <h1>Question 11:</h1>
                <p>Saya lebih suka bekerja di belakang layar</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer11" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer11" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer11" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer11" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer11" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 12:</h1>
                <p>Saya tidak suka menjadi pusat perhatian </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer12" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer12" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer12" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer12" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer12" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 13:</h1>
                <p>Saya sedikit berkata</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer13" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer13" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer13" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer13" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer13" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 14:</h1>
                <p>Saya tidak keberatan menjadi pusat perhatian </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer14" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer14" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer14" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer14" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer14" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 15:</h1>
                <p>Saya tidak banyak berbicara </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer15" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer15" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer15" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer15" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer15" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 16:</h1>
                <p>Saya tidak banyak berbicara pada orang yang tidak dikenal</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer16" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer16" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer16" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer16" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer16" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 17:</h1>
                <p>Saya menghidupkan suasana dalam suatu acara </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer17" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer17" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer17" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer17" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer17" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 18:</h1>
                <p>Saya berinteraksi dengan banyak orang dalam suatu acara</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer18" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer18" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer18" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer18" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer18" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 19:</h1>
                <p>Saya merasa nyaman berada di sekitar orang lain</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer19" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer19" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer19" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer19" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer19" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 20:</h1>
                <p>Saya mudah memulai suatu percakapan </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer20" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer20" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer20" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer20" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer20" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <!-- Pertanyaan 21-30 Conscientiousness -->
            <li class="question">
                <h1>Question 21:</h1>
                <p>Saya segera mengerjakan tugas yang diberikan</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer21" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer21" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer21" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer21" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer21" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 22:</h1>
                <p>Saya telaten dalam mengerjakan tugas</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer22" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer22" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer22" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer22" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer22" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 23:</h1>
                <p>Saya sering lupa meletakkan barang kembali pada tempatnya</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer23" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer23" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer23" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer23" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer23" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 24:</h1>
                <p>Saya memperhatikan hal-hal secara rinci</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer24" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer24" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer24" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer24" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer24" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 25:</h1>
                <p>Saya melakukan aktivitas sesuai jadwal atau agenda</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer25" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer25" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer25" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer25" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer25" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 26:</h1>
                <p>Saya sering meninggalkan barang pribadi di sembarang tempat </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer26" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer26" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer26" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer26" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer26" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 27:</h1>
                <p>Saya selalu mempersiapkan segala hal</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer27" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer27" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer27" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer27" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer27" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 28:</h1>
                <p>Saya menyukai keteraturan </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer28" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer28" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer28" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer28" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer28" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 29:</h1>
                <p>Saya sering mengacaukan banyak hal </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer29" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer29" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer29" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer29" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer29" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 30:</h1>
                <p>Saya sering mengabaikan tugas-tugas saya </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer30" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer30" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer30" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer30" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer30" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <!-- Pertanyaan 31-40 Agreeableness -->
            <li class="question">
                <h1>Question 31:</h1>
                <p>Saya adalah orang yang lemah lembut</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer31" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer31" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer31" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer31" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer31" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 32:</h1>
                <p>Saya tidak tertarik dengan masalah orang lain </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer32" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer32" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer32" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer32" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer32" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 33:</h1>
                <p>Saya tidak terlalu tertarik dengan kondisi orang lain </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer33" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer33" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer33" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer33" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer33" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 34:</h1>
                <p>Saya tidak terlalu memedulikan orang lain </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer34" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer34" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer34" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer34" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer34" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 35:</h1>
                <p>Saya mampu membuat orang lain merasa nyaman </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer35" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer35" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer35" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer35" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer35" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 36:</h1>
                <p>Saya sering meluangkan waktu untuk orang lain </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer36" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer36" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer36" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer36" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer36" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 37:</h1>
                <p>Saya memahami perasaan orang lain </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer37" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer37" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer37" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer37" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer37" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 38:</h1>
                <p>Saya peduli dengan orang lain </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer38" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer38" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer38" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer38" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer38" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 39:</h1>
                <p>Saya sering bersikap kasar pada orang lain </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer39" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer39" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer39" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer39" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer39" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question 40:</h1>
                <p>Saya bersimpati dengan perasaan orang lain </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer40" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer40" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer40" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer40" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer40" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>
            <!-- Pertanyaan 41-50 Intelect -->
            <!-- Question 41 -->
            <li class="question">
                <h1>Question 41:</h1>
                <p>Saya sering menggunakan istilah-istilah yang sulit </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer41" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer41" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer41" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer41" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer41" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>

            <!-- Question 42 -->
            <li class="question">
                <h1>Question 42:</h1>
                <p>Saya kesulitan memahami ide yang bersifat abstrak </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer42" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer42" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer42" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer42" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer42" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>

            <!-- Question 43 -->
            <li class="question">
                <h1>Question 43:</h1>
                <p>Saya menguasai banyak kosakata </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer43" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer43" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer43" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer43" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer43" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>

            <!-- Question 44 -->
            <li class="question">
                <h1>Question 44:</h1>
                <p>Saya memiliki ide-ide yang cemerlang </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer44" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer44" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer44" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer44" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer44" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>

            <!-- Question 45 -->
            <li class="question">
                <h1>Question 45:</h1>
                <p>Saya memiliki banyak ide</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer45" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer45" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer45" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer45" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer45" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>

            <!-- Question 46 -->
            <li class="question">
                <h1>Question 46:</h1>
                <p>Saya cepat dalam memahami sesuatu</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer46" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer46" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer46" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer46" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer46" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>

            <!-- Question 47 -->
            <li class="question">
                <h1>Question 47:</h1>
                <p>Saya tidak tertarik dengan ide-ide abstrak </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer47" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer47" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer47" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer47" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer47" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>

            <!-- Question 48 -->
            <li class="question">
                <h1>Question 48:</h1>
                <p>Saya memiliki imajinasi yang sangat kuat</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer48" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer48" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer48" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer48" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer48" value="5">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>

            <!-- Question 49 -->
            <li class="question">
                <h1>Question 49:</h1>
                <p>Saya tidak memiliki imajinasi yang baik </p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer49" value="5">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer49" value="4">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer49" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer49" value="2">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer49" value="1">
                            Sangat Setuju
                        </label>
                    </form>
                </div>
            </li>

            <!-- Question 50 -->
            <li class="question">
                <h1>Question 50:</h1>
                <p>Saya meluangkan waktu untuk merefleksikan berbagai hal</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer50" value="1">
                            Sangat tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer50" value="2">
                            Tidak Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer50" value="3">
                            Netral
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer50" value="4">
                            Setuju
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer50" value="5">
                            Sangat Setuju
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
    <!-- <a href="{{ route('testvalidationbakatminat') }}"> -->
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
        const scoreEM1 = document.querySelector('input[name="answer1"]:checked')?.value || 0;
        const scoreEM2 = document.querySelector('input[name="answer2"]:checked')?.value || 0;
        const scoreEM3 = document.querySelector('input[name="answer3"]:checked')?.value || 0;
        const scoreEM4 = document.querySelector('input[name="answer4"]:checked')?.value || 0;
        const scoreEM5 = document.querySelector('input[name="answer5"]:checked')?.value || 0;
        const scoreEM6 = document.querySelector('input[name="answer6"]:checked')?.value || 0;
        const scoreEM7 = document.querySelector('input[name="answer7"]:checked')?.value || 0;
        const scoreEM8 = document.querySelector('input[name="answer8"]:checked')?.value || 0;
        const scoreEM9 = document.querySelector('input[name="answer9"]:checked')?.value || 0;
        const scoreEM10 = document.querySelector('input[name="answer10"]:checked')?.value || 0;
        
        $resultEmotionalStability = parseInt(scoreEM1) + parseInt(scoreEM2) + parseInt(scoreEM3) + parseInt(scoreEM4)  + parseInt(scoreEM5) + parseInt(scoreEM6)  + parseInt(scoreEM7) + parseInt(scoreEM8)  + parseInt(scoreEM9) + parseInt(scoreEM10);

        const scoreE1 = document.querySelector('input[name="answer11"]:checked')?.value || 0;
        const scoreE2 = document.querySelector('input[name="answer12"]:checked')?.value || 0;
        const scoreE3 = document.querySelector('input[name="answer13"]:checked')?.value || 0;
        const scoreE4 = document.querySelector('input[name="answer14"]:checked')?.value || 0;
        const scoreE5 = document.querySelector('input[name="answer15"]:checked')?.value || 0;
        const scoreE6 = document.querySelector('input[name="answer16"]:checked')?.value || 0;
        const scoreE7 = document.querySelector('input[name="answer17"]:checked')?.value || 0;
        const scoreE8 = document.querySelector('input[name="answer18"]:checked')?.value || 0;
        const scoreE9 = document.querySelector('input[name="answer19"]:checked')?.value || 0;
        const scoreE10 = document.querySelector('input[name="answer20"]:checked')?.value || 0;
        
        $resultExtraversion = parseInt(scoreE1) + parseInt(scoreE2) + parseInt(scoreE3) + parseInt(scoreE4)  + parseInt(scoreE5) + parseInt(scoreE6)  + parseInt(scoreE7) + parseInt(scoreE8)  + parseInt(scoreE9) + parseInt(scoreE10);

        const scoreC1 = document.querySelector('input[name="answer21"]:checked')?.value || 0;
        const scoreC2 = document.querySelector('input[name="answer22"]:checked')?.value || 0;
        const scoreC3 = document.querySelector('input[name="answer23"]:checked')?.value || 0;
        const scoreC4 = document.querySelector('input[name="answer24"]:checked')?.value || 0;
        const scoreC5 = document.querySelector('input[name="answer25"]:checked')?.value || 0;
        const scoreC6 = document.querySelector('input[name="answer26"]:checked')?.value || 0;
        const scoreC7 = document.querySelector('input[name="answer27"]:checked')?.value || 0;
        const scoreC8 = document.querySelector('input[name="answer28"]:checked')?.value || 0;
        const scoreC9 = document.querySelector('input[name="answer29"]:checked')?.value || 0;
        const scoreC10 = document.querySelector('input[name="answer30"]:checked')?.value || 0;
        
        $resultConscien = parseInt(scoreC1) + parseInt(scoreC2) + parseInt(scoreC3) + parseInt(scoreC4)  + parseInt(scoreC5) + parseInt(scoreC6)  + parseInt(scoreC7) + parseInt(scoreC8)  + parseInt(scoreC9) + parseInt(scoreC10);

        const scoreA1 = document.querySelector('input[name="answer31"]:checked')?.value || 0;
        const scoreA2 = document.querySelector('input[name="answer32"]:checked')?.value || 0;
        const scoreA3 = document.querySelector('input[name="answer33"]:checked')?.value || 0;
        const scoreA4 = document.querySelector('input[name="answer34"]:checked')?.value || 0;
        const scoreA5 = document.querySelector('input[name="answer35"]:checked')?.value || 0;
        const scoreA6 = document.querySelector('input[name="answer36"]:checked')?.value || 0;
        const scoreA7 = document.querySelector('input[name="answer37"]:checked')?.value || 0;
        const scoreA8 = document.querySelector('input[name="answer38"]:checked')?.value || 0;
        const scoreA9 = document.querySelector('input[name="answer39"]:checked')?.value || 0;
        const scoreA10 = document.querySelector('input[name="answer40"]:checked')?.value || 0;
        
        $resultAgree = parseInt(scoreA1) + parseInt(scoreA2) + parseInt(scoreA3) + parseInt(scoreA4)  + parseInt(scoreA5) + parseInt(scoreA6)  + parseInt(scoreA7) + parseInt(scoreA8)  + parseInt(scoreA9) + parseInt(scoreA10);

        const scoreI1 = document.querySelector('input[name="answer41"]:checked')?.value || 0;
        const scoreI2 = document.querySelector('input[name="answer42"]:checked')?.value || 0;
        const scoreI3 = document.querySelector('input[name="answer43"]:checked')?.value || 0;
        const scoreI4 = document.querySelector('input[name="answer44"]:checked')?.value || 0;
        const scoreI5 = document.querySelector('input[name="answer45"]:checked')?.value || 0;
        const scoreI6 = document.querySelector('input[name="answer46"]:checked')?.value || 0;
        const scoreI7 = document.querySelector('input[name="answer47"]:checked')?.value || 0;
        const scoreI8 = document.querySelector('input[name="answer48"]:checked')?.value || 0;
        const scoreI9 = document.querySelector('input[name="answer49"]:checked')?.value || 0;
        const scoreI10 = document.querySelector('input[name="answer50"]:checked')?.value || 0;
        
        $resultIntellect = parseInt(scoreI1) + parseInt(scoreI2) + parseInt(scoreI3) + parseInt(scoreI4)  + parseInt(scoreI5) + parseInt(scoreI6)  + parseInt(scoreI7) + parseInt(scoreI8)  + parseInt(scoreI9) + parseInt(scoreI10);

        // Function to calculate and assign scores

        function calculateScores() {
            const scoreEM1 = document.querySelector('input[name="answer1"]:checked')?.value || 0;
            const scoreEM2 = document.querySelector('input[name="answer2"]:checked')?.value || 0;
            const scoreEM3 = document.querySelector('input[name="answer3"]:checked')?.value || 0;
            const scoreEM4 = document.querySelector('input[name="answer4"]:checked')?.value || 0;
            const scoreEM5 = document.querySelector('input[name="answer5"]:checked')?.value || 0;
            const scoreEM6 = document.querySelector('input[name="answer6"]:checked')?.value || 0;
            const scoreEM7 = document.querySelector('input[name="answer7"]:checked')?.value || 0;
            const scoreEM8 = document.querySelector('input[name="answer8"]:checked')?.value || 0;
            const scoreEM9 = document.querySelector('input[name="answer9"]:checked')?.value || 0;
            const scoreEM10 = document.querySelector('input[name="answer10"]:checked')?.value || 0;
            
            $resultEmotionalStability = parseInt(scoreEM1) + parseInt(scoreEM2) + parseInt(scoreEM3) + parseInt(scoreEM4)  + parseInt(scoreEM5) + parseInt(scoreEM6)  + parseInt(scoreEM7) + parseInt(scoreEM8)  + parseInt(scoreEM9) + parseInt(scoreEM10);

            const scoreE1 = document.querySelector('input[name="answer11"]:checked')?.value || 0;
            const scoreE2 = document.querySelector('input[name="answer12"]:checked')?.value || 0;
            const scoreE3 = document.querySelector('input[name="answer13"]:checked')?.value || 0;
            const scoreE4 = document.querySelector('input[name="answer14"]:checked')?.value || 0;
            const scoreE5 = document.querySelector('input[name="answer15"]:checked')?.value || 0;
            const scoreE6 = document.querySelector('input[name="answer16"]:checked')?.value || 0;
            const scoreE7 = document.querySelector('input[name="answer17"]:checked')?.value || 0;
            const scoreE8 = document.querySelector('input[name="answer18"]:checked')?.value || 0;
            const scoreE9 = document.querySelector('input[name="answer19"]:checked')?.value || 0;
            const scoreE10 = document.querySelector('input[name="answer20"]:checked')?.value || 0;
            
            $resultExtraversion = parseInt(scoreE1) + parseInt(scoreE2) + parseInt(scoreE3) + parseInt(scoreE4)  + parseInt(scoreE5) + parseInt(scoreE6)  + parseInt(scoreE7) + parseInt(scoreE8)  + parseInt(scoreE9) + parseInt(scoreE10);

            const scoreC1 = document.querySelector('input[name="answer21"]:checked')?.value || 0;
            const scoreC2 = document.querySelector('input[name="answer22"]:checked')?.value || 0;
            const scoreC3 = document.querySelector('input[name="answer23"]:checked')?.value || 0;
            const scoreC4 = document.querySelector('input[name="answer24"]:checked')?.value || 0;
            const scoreC5 = document.querySelector('input[name="answer25"]:checked')?.value || 0;
            const scoreC6 = document.querySelector('input[name="answer26"]:checked')?.value || 0;
            const scoreC7 = document.querySelector('input[name="answer27"]:checked')?.value || 0;
            const scoreC8 = document.querySelector('input[name="answer28"]:checked')?.value || 0;
            const scoreC9 = document.querySelector('input[name="answer29"]:checked')?.value || 0;
            const scoreC10 = document.querySelector('input[name="answer30"]:checked')?.value || 0;
            
            $resultConscien = parseInt(scoreC1) + parseInt(scoreC2) + parseInt(scoreC3) + parseInt(scoreC4)  + parseInt(scoreC5) + parseInt(scoreC6)  + parseInt(scoreC7) + parseInt(scoreC8)  + parseInt(scoreC9) + parseInt(scoreC10);

            const scoreA1 = document.querySelector('input[name="answer31"]:checked')?.value || 0;
            const scoreA2 = document.querySelector('input[name="answer32"]:checked')?.value || 0;
            const scoreA3 = document.querySelector('input[name="answer33"]:checked')?.value || 0;
            const scoreA4 = document.querySelector('input[name="answer34"]:checked')?.value || 0;
            const scoreA5 = document.querySelector('input[name="answer35"]:checked')?.value || 0;
            const scoreA6 = document.querySelector('input[name="answer36"]:checked')?.value || 0;
            const scoreA7 = document.querySelector('input[name="answer37"]:checked')?.value || 0;
            const scoreA8 = document.querySelector('input[name="answer38"]:checked')?.value || 0;
            const scoreA9 = document.querySelector('input[name="answer39"]:checked')?.value || 0;
            const scoreA10 = document.querySelector('input[name="answer40"]:checked')?.value || 0;
            
            $resultAgree = parseInt(scoreA1) + parseInt(scoreA2) + parseInt(scoreA3) + parseInt(scoreA4)  + parseInt(scoreA5) + parseInt(scoreA6)  + parseInt(scoreA7) + parseInt(scoreA8)  + parseInt(scoreA9) + parseInt(scoreA10);

            const scoreI1 = document.querySelector('input[name="answer41"]:checked')?.value || 0;
            const scoreI2 = document.querySelector('input[name="answer42"]:checked')?.value || 0;
            const scoreI3 = document.querySelector('input[name="answer43"]:checked')?.value || 0;
            const scoreI4 = document.querySelector('input[name="answer44"]:checked')?.value || 0;
            const scoreI5 = document.querySelector('input[name="answer45"]:checked')?.value || 0;
            const scoreI6 = document.querySelector('input[name="answer46"]:checked')?.value || 0;
            const scoreI7 = document.querySelector('input[name="answer47"]:checked')?.value || 0;
            const scoreI8 = document.querySelector('input[name="answer48"]:checked')?.value || 0;
            const scoreI9 = document.querySelector('input[name="answer49"]:checked')?.value || 0;
            const scoreI10 = document.querySelector('input[name="answer50"]:checked')?.value || 0;
            
            $resultIntellect = parseInt(scoreI1) + parseInt(scoreI2) + parseInt(scoreI3) + parseInt(scoreI4)  + parseInt(scoreI5) + parseInt(scoreI6)  + parseInt(scoreI7) + parseInt(scoreI8)  + parseInt(scoreI9) + parseInt(scoreI10);

            axios.post('/gotoValidationbakatminat', {
                resultEmotionalStability: $resultEmotionalStability,
                resultExtraversion: $resultExtraversion,
                resultConscien: $resultConscien,
                resultAgree: $resultAgree,
                resultIntellect: $resultIntellect
            })
            .then(function (response) {
                console.log("Yeeee"); // Log a success message
            })
            .catch(function (error) {
                console.error(error); // Log any errors
            });
            // Example: Display the scores in the console
            console.log("ScoreEM: " + $resultEmotionalStability);
            console.log("ScoreE: " + $resultExtraversion);
            console.log("ScoreC: " + $resultConscien);
            console.log("ScoreA: " + $resultAgree);
            console.log("ScoreI: " + $resultIntellect);
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
                window.location.href = "{{ route('testvalidationbakatminat') }}";
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
