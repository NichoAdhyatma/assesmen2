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

    </style>
</head>
<body>
    <div class="container">
        <ol id="question-list">
            <li class="question">
                <h1>Question:</h1>
                <p>Narsisisme juga dapat diartikan sebagai bentuk
dari ... individu untuk menunjukkan bahwa dirinya merupakan orang yang sempurna, pandai dan penting dibanding orang lainnya agar memperoleh perhatian dan pemujaan atas dirinya.
</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Keinginan
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            Pengetahuan
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Kemampuan
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Kepribadian
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Body Image merupakan imajinasi subyektif yang dimiliki seseorang tentang tubuhnya, khususnya yang terkait dengan ... orang lain, dan seberapa baik tubuhnya harus disesuaikan dengan persepsi - persepsi</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Penilaian
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            Algoritma
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Norma
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Kesesuaian
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Sistem patriarki yang ... perempuan dan lelaki tidak dalam posisi sejajar dapat menimbulkan masalah sosial, yakni suatu kondisi yang tidak diinginkan terjadi oleh sebagian besar warga masyarakat</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Menganggap
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            Menimbulkan
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Mempertegas
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Menginginkan
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Husein Mutahar: WR Soepratman: Ismail Marzuki= .......</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Ibu Soed
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            Fatmawati
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Agus Salim
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Soepomo
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Bumi: Jupiter: Saturnus = ........</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Mars
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            Venus
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Bintang
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Bulan
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Kertas : Karet : Resin = .......</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            Tisu
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            Minyak
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            Sendok
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            Kipas
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Pilihlah pola yang tepat pada soal di bawah ini:<br>
A, C, E, G, ...
</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            I
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            L
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            K
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            H
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Pilihlah pola yang tepat pada soal di bawah ini:<br>
E,H, M, P, ...
</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            U
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            J
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            K
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            L
                        </label>
                    </form>
                </div>
            </li>
            <li class="question">
                <h1>Question:</h1>
                <p>Pilihlah pola yang tepat pada soal di bawah ini:<br>
X, XII, X, XV, X, XIX, X, ...
</p>
                <div class="answer-form">
                    <form class="answer-form">
                        <label class="radio-label" data-correct="true">
                            <input type="radio" class="radio-input" name="answer2" value="Option Correct">
                            XXIV
                        </label>
                        <label class="radio-label" >
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong">
                            XXII
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 1">
                            XXX
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="answer2" value="Option Wrong 2">
                            XIXX
                        </label>
                    </form>
                </div>
            </li>
           
            
            <!-- Repeat the above <li> block for each question -->
        </ol>
        
    </div>

    <!-- <a href="{{ route('result') }}"> -->
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
    <button class="calculate-score-button">Calculate Score</button>
    <button id="processVideoButton" onclick="calculateAndLogSkor()">See Current Total Score</button>
    

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
    <script>
         function calculateAndLogSkor() {
            // Calculate rawScore and parse it as an integer
            const rawScore = parseInt(calculateRawScore(), 10);

            // Assuming 'skor' is already defined, add the parsed rawScore to it
            const skorValidasiCognitif = parseInt(rawScore) + skor;

            // Log skorValidasiCognitif to the console
            console.log("skorValidasiCognitif:", skorValidasiCognitif);
        }
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
                // Prevent the default form submission behavior
                event.preventDefault();
                console.log(sessionData);
                const rawScore = parseInt(calculateRawScore(), 10);

                // Assuming 'skor' is already defined, add the parsed rawScore to it
                const skorValidasiCognitif = (parseInt(rawScore, 10) * 2) + skor;

                

                // $skor_validasi_cognitif = skorValidasiCognitif;
                // dd($skor_validasi_cognitif);
                // console.log($skor_validasi_cognitif);
                

                //Tabel Penilaian
                // ID Penilaian = autoIncrement
                // ID User
                $userid = sessionData.user_id;
                // Tanggal Penilaian = CurrentDate

                // Struktur Tele-assesmen interview (Kepribadian,Bakat,Minat) (14data dipisah koma) per  atribut
                
                // Sentimen Positif Facial
                $f_sentimen_positif = sessionData.positive_scoreExtraversion + "," + sessionData.positive_scoreConscientiousness + "," + sessionData.positive_scoreAgreeableness + "," + sessionData.positive_scoreOpenness + "," + sessionData.positive_scoreNeuroticism + "," + sessionData.positive_scoreRealistic + "," + sessionData.positive_scoreInvestigative + "," + sessionData.positive_scoreArtistic + "," + sessionData.positive_scoreSocial + "," + sessionData.positive_scoreEnterprising + "," + sessionData.positive_scoreConventional + "," + sessionData.positive_scorePerseptual + "," + sessionData.positive_scorePsikomotor + "," + sessionData.positive_scoreIntelektual;
                // $f_sentimen_positif = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"

                // Sentimen Netral Facial
                $f_sentimen_netral = sessionData.neutral_scoreExtraversion + "," + sessionData.neutral_scoreConscientiousness + "," + sessionData.neutral_scoreAgreeableness + "," + sessionData.neutral_scoreOpenness + "," + sessionData.neutral_scoreNeuroticism + "," + sessionData.neutral_scoreRealistic + "," + sessionData.neutral_scoreInvestigative + "," + sessionData.neutral_scoreArtistic + "," + sessionData.neutral_scoreSocial + "," + sessionData.neutral_scoreEnterprising + "," + sessionData.neutral_scoreConventional + "," + sessionData.neutral_scorePerseptual + "," + sessionData.neutral_scorePsikomotor + "," + sessionData.neutral_scoreIntelektual;
                // $f_sentimen_netral = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"

                // Sentimen Negatif Facial
                $f_sentimen_negatif = sessionData.negative_scoreExtraversion + "," + sessionData.negative_scoreConscientiousness + "," + sessionData.negative_scoreAgreeableness + "," + sessionData.negative_scoreOpenness + "," + sessionData.negative_scoreNeuroticism + "," + sessionData.negative_scoreRealistic + "," + sessionData.negative_scoreInvestigative + "," + sessionData.negative_scoreArtistic + "," + sessionData.negative_scoreSocial + "," + sessionData.negative_scoreEnterprising + "," + sessionData.negative_scoreConventional + "," + sessionData.negative_scorePerseptual + "," + sessionData.negative_scorePsikomotor + "," + sessionData.negative_scoreIntelektual;
                // $f_sentimen_negatif = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"

                // Sentimen Positif Voice
                $v_sentimen_positif = sessionData.posExtraversion + "," + sessionData.posConscientiousness + "," + sessionData.posAgreeableness + "," + sessionData.posOpenness + "," + sessionData.posNeuroticism + "," + sessionData.posRealistic + "," + sessionData.posInvestigative + "," + sessionData.posArtistic + "," + sessionData.posSocial + "," + sessionData.posEnterprising + "," + sessionData.posConventional + "," + sessionData.posPerseptual + "," + sessionData.posPsikomotor + "," + sessionData.posIntelektual;
                // $v_sentimen_positif = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"

                // Sentimen Netral Voice
                $v_sentimen_netral = sessionData.neuExtraversion + "," + sessionData.neuConscientiousness + "," + sessionData.neuAgreeableness + "," + sessionData.neuOpenness + "," + sessionData.neuNeuroticism + "," + sessionData.neuRealistic + "," + sessionData.neuInvestigative + "," + sessionData.neuArtistic + "," + sessionData.neuSocial + "," + sessionData.neuEnterprising + "," + sessionData.neuConventional + "," + sessionData.neuPerseptual + "," + sessionData.neuPsikomotor + "," + sessionData.neuIntelektual;
                // $v_sentimen_netral = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"

                // Sentimen Negatif voice
                $v_sentimen_negatif = sessionData.negExtraversion + "," + sessionData.negConscientiousness + "," + sessionData.negAgreeableness + "," + sessionData.negOpenness + "," + sessionData.negNeuroticism + "," + sessionData.negRealistic + "," + sessionData.negInvestigative + "," + sessionData.negArtistic + "," + sessionData.negSocial + "," + sessionData.negEnterprising + "," + sessionData.negConventional + "," + sessionData.negPerseptual + "," + sessionData.negPsikomotor + "," + sessionData.negIntelektual;
                // $v_sentimen_negatif = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"

                // Validation Score
                $validation_score = sessionData.resultExtraversion + "," + sessionData.resultConscien + "," + sessionData.resultAgree + "," + sessionData.resultIntellect + "," + sessionData.resultEmotionalStability + "," + sessionData.resultR + "," + sessionData.resultI + "," + sessionData.resultA + "," + sessionData.resultS + "," + sessionData.resultE + "," + sessionData.resultC + "," + sessionData.resultPer + ","+ sessionData.resultPsi + ","+ sessionData.resultInt ;
                // $validation_score = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"

                // %Kepercayaan
                $kepercayaan = trustExtraversion + "," + trustConscientiousness + "," + trustAgreeableness + "," + trustOpenness + "," + trustNeuroticism + "," + trustRealistic + "," + trustInvestigative + "," + trustArtistic + "," + trustSocial + "," + trustEnterprising + "," + trustConventional + "," + trustPerseptual + "," + trustPsikomotor + "," + trustIntelektual;
                // $kepercayaan = "1,2,3,4,5,6,7,8,9,10,11,12,13,14"


                // [Untuk tes cognitive video]
                // RawScore(9Data Dipisah Koma)
                $skor_validasi = sessionData.skorVideo; 
                // Validasi bakat minat kepribadian
                // RawScore(14 Data dipisah koma)
                $skor_validasi_kepribadianbakatminat = sessionData.resultExtraversion + "," + sessionData.resultConscien + "," + sessionData.resultAgree + "," + sessionData.resultIntellect + "," + sessionData.resultEmotionalStability + "," + sessionData.resultR + "," + sessionData.resultI + "," + sessionData.resultA + "," + sessionData.resultS + "," + sessionData.resultE + "," + sessionData.resultC + "," + sessionData.resultPer + ","+ sessionData.resultPsi + ","+ sessionData.resultInt ;
                // Validasi Cognitive
                // Raw Score(9Data dipisah koma) -> 9 Penilaian jadikan 1 data hingga berikut
                $skor_validasi_cognitif = skorValidasiCognitif;
                // $skor_validasi_cognitif = calculateScore();
                //const csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "POST",
                    url: '{{route('postPenilaian') }}',
                    data: {
                        // Your request data goes here
                        id_user: sessionData.user_id,
                        f_sentimen_positif: $f_sentimen_positif,
                        f_sentimen_netral: $f_sentimen_netral,
                        f_sentimen_negatif: $f_sentimen_negatif,
                        v_sentimen_positif: $v_sentimen_positif,
                        v_sentimen_netral: $v_sentimen_netral,
                        v_sentimen_negatif: $v_sentimen_negatif,
                        skor_validasi: $validation_score,
                        kepercayaan: $kepercayaan,
                        cognitive_video_score: $skor_validasi,
                        skor_validasi_kepribadianbakatminat: $skor_validasi_kepribadianbakatminat,
                        skor_validasi_cognitif: $skor_validasi_cognitif,


                        // ...
                    },
                    headers: {
                        // Set the CSRF token in the request header
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        console.log("YEEE")
                    },
                    error: function(xhr, status, error) {
                        console.log("Fail")
                    }
                });

               

                // Set up your AJAX request
                // console.log($skor_validasi_kepribadianbakatminat);
                // $dataArray = $skor_validasi_kepribadianbakatminat.split(',');
                // console.log($dataArray);

                // After calling calculateScores(), you can redirect to the 'testvalidation' route
                
                window.location.href = "{{ route('beforeresult') }}";
                location.reload();
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
        // let currentQuestionIndex = 0;

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
            console.log(sessionData);
            console.log(correctAnswers);
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
