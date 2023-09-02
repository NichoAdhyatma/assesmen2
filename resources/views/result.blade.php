<!DOCTYPE html>
<html>
<head>
<style>
        /* Add your CSS styles here to format the table */
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Style for the first column (headers on the side) */
        th.vertical-header {
            white-space: nowrap;
            width: 20px; /* Adjust the width as needed */
            transform-origin: 100% 100%;
            /* transform: rotate(-90deg); */
        }
    </style>
</head>
<body>
    <h1>Hasil Tes Psikogram</h1>
    <table>
        <tr>
            <th>Nama</th>
            <td>John Doe</td>
        </tr>
        <tr>
            <th>Usia</th>
            <td>30</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>Laki-laki</td>
        </tr>
        <tr>
            <th>Pendidikan</th>
            <td>Sarjana</td>
        </tr>
        <tr>
            <th>Tanggal Pemeriksaan</th>
            <td>2023-09-02</td>
        </tr>
    
    </table>
    <br>
    <h1>Hasil Teleassesmen Interview</h1>
    <br>
    <table id="tabelKepribadian"> <!-- Added an ID to the table -->
        <thead>
            <tr>
                <th colspan="2" class="vertical-header"></th>
                <th colspan="3" class="vertical-header">Facial Assesmen</th>
                <th colspan="3" class="vertical-header">Voice to text Assesmen</th>
                <th colspan="1" class="vertical-header">Validation</th>
                <th colspan="1" class="vertical-header">Lie Behaviour</th>
            </tr>
        
            <tr>
                <th colspan="2" class="vertical-header">Kepribadian</th>
                <th class="vertical-header">Sentimen Negatif</th>
                <th class="vertical-header">Sentimen Netral</th>
                <th class="vertical-header">Sentimen Positif</th>
                <th class="vertical-header">Sentimen Negatif</th>
                <th class="vertical-header">Sentimen Netral</th>
                <th class="vertical-header">Sentimen Positif</th>
                <th class="vertical-header">Skor Validasi</th>
                <th class="vertical-header">%Kepercayaan</th>
            </tr>
        </thead>
        <tbody>
            <!-- Row 3 Kepribadian -->
            <tr>
                <th>Extraversion</th>
                <td>Mudah bergaul, aktif, talk-active, personoriented, optimis, menyenangkan, kasih sayang, bersahabat</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Conscientiousness</th>
                <td>Teratur, dapat dipercaya, pekerja keras, displin, tepat waktu, teliti, rapi, ambisius, tekun</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Agreeableness</th>
                <td>Berhati lembut, baik, suka menolong, dapat dipercaya, mudah memaafkan, mudah untuk dimaafkan, terus terang</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Openness</th>
                <td>Rasa ingin tahu tinggi, ketertarikan luas, kreatif, original, imajinatif, tidak ketinggalan zaman</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Neuroticism</th>
                <td>Kuatir, cemas, emosional, tidak merasa nyaman, kurang penyesuaian, kesedihan yang tidak beralasan</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <!-- Row 7 Minat -->
            <tr>
                <th colspan="10">Minat</th>
            </tr>
            <tr>
                <th>Realistic</th>
                <td>Terampil secara mekanik dan/atau pekerjaan yang mengutamakan keterampilan fisik, dan kekuatan otot</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Investigative</th>
                <td>Cenderung memiliki ketertarikan/minat untuk mengobservasi, belajar, menganalisis dan memecahkan masalah</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Artistic</th>
                <td>Berhati lembut, baik, suka menolong, dapat dipercaya, mudah memaafkan, mudah untuk dimaafkan, terus terang</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Social</th>
                <td>Memiliki minat bekerja dengan individu lain dibandingkan dengan peralatan</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Enterprising</th>
                <td>Memiliki minat bekerja dengan individu lain, serta mempersuasi orang lain dan tampil di muka umum</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Conventional</th>
                <td>Memiliki minat terhadap hal-hal yang mendetail, terorganisir, dan berkaitan dengan data</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <!-- Row 14 Bakat -->
            <tr>
                <th colspan="10">Bakat</th>
            </tr>
            <tr>
                <th>Dimensi perseptual</th>
                <td>Potensi kemampuan yang berhubungan pada bentuk persepsi, dimana terdapat faktor yang meliputi seperti kepekaan indera, perhatian, orientasi ruang, waktu, luas daerah persepsi, kecepatan persepsi</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Dimensi psikomotor</th>
                <td>Terdiri dari (ketepatan statis yang menitik beratkan pada posisi, dan ketepatan dinamis yang menitikberatkan pada gerakan), koordinasi, dan keluwesan</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Dimensi intelektual</th>
                <td>Terdiri dari ingatan, pengenalan, evaluatif, konvergen, dan berfikir divergen</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <br>
    <h1>Hasil Teleassesmen Cognitive</h1>
    <br>
    <table id="scoreTable">
        <thead>
                <tr>
                    <th colspan="1" class="vertical-header">Intelegensi</th>
                    <th colspan="1" class="vertical-header">Dimensi</th>
                    <th colspan="1" class="vertical-header">Raw Score</th>
                    <th colspan="1" class="vertical-header">Rendah</th>
                    <th colspan="1" class="vertical-header">Rata-Rata</th>
                    <th colspan="1" class="vertical-header">Tinggi</th>
                </tr>
        </thead>
        <tbody>
            <tr>
                <th>Satzerganzung (SE) → Melengkapi Kalimat</th>
                <td>Kemampuan pengambilan keputusan, keinginan berprestasi, penilaian atau pembentukan opini, common sense, penekanan pada berpikir praktis dan konkrit pemaknaan realitas, dan berpikir secara mandiri</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Wortauswahl (WA) → Melengkapi Kata-kata</th>
                <td>Kemampuan menangkap inti atau makna dari sesuatu yang disampaikan melalui bahasa, perasaan empati atau kemampuan menyelami perasaan, berpikir induktif menggunakan bahasa. WA juga mengukur common sense (logika berpikir), cara berpikir kongkrit praktis, sense of reality, judgement,mandiri dalam berfikir, pembentukan keputusan. Yang dimaksud dengan “judgement,”  adalah artinya apakah testee mampu menilai arti apakah ia mandiri, atau apakah ia salah kaprah</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Analogien (AN) → Persamaan Kata</th>
                <td>Kemampuan fleksibilitas dalam berpikir, kemampuan mengkombinasikan atau menghubungkan, kelincahan dalam berubah dan berganti dalam berpikir, resistensi atau kemampuan untuk melawan solusi masalah yang tidak pasti sehingga meliputi kejelasan dan kekonsenkuenan dalam berpikir</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Gemeinsamkeiten (GE) → Sifat yang Dimiliki Bersama</th>
                <td>Kemampuan abstraksi verbal, menemukan ciri yang sama atau khas dari dua objek dan menyusun suatu pengertian tentangnya. Kemampuan untuk menyatakan pengertian akan sesuatu dalam bentuk Bahasa, membentuk suatu pengertian atau mencari inti persoalan, serta memahami esensi pengertian suatu kata untuk dapat menemukan kesamaan esensial dari beberapa kata</td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Rechhenaufgaben (RA) → Kemampuan Berhitung</th>
                <td>Kemampuan berpikir atau memecahkan masalah praktis dalam berhitung, matematis, berpikir logis, dan lugas penalaran, dan kemampuan berpikir runtut mengambil kesimpulan</td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Zahlenreihen (ZR) → Deret Angka</th>
                <td>Cara berpikir teoritis dengan hitungan. Maksudnya mengukur kemampuan berhitung testee yang didasarkan pada pendekatan analisis atas informasi factual berbentuk angka sehingga didapatkan suatu kesimpulan (berpikir induktif dengan angkaangka), serta kelincahan dan irama dalam berpikir</td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Figurenauswahl (FA) → Memilih Bentuk</th>
                <td>Kemampuan membayangkan, kemampuan mengkonstruksi (sintesa dan Analisa) sehingga dapat menggabungkan potongan suatu objek visual dan menghasilkan suatu bentuk tertentu, serta memasukkan bagian pada suatu keseluruhan (membayangkan menyeluruh)</td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Wurfelaufgaben (WU) → Latihan Balok</th>
                <td>Kemampuan analisis yakni daya bayang ruang, didalamnya terkandung kreativitas, kemampuan tiga dimensi, imajinasi dan fleksibilitas berpikir, serta kemampuan konstruktif teknis dalam menyusun </td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Merkaufgaben (ME) → Latihan Simbol</th>
                <td>Kemampuan daya ingat seseorang, fokus, perhatian, konsentrasi yang menetap, dan daya tahan</td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    
        <!-- Table Validasi Show -->
    <br>
    <h1>Hasil Validasi Kepribadian, Bakat, Minat</h1>
    <br>
    <table id="tabelKepribadianValidasi">
        <thead>
            <tr>
                <th colspan="1" class="vertical-header">Kepribadian</th>
                <th colspan="1" class="vertical-header"></th>
                <th colspan="1" class="vertical-header">Raw Score</th>
                <th colspan="1" class="vertical-header">Sangat Rendah</th>
                <th colspan="1" class="vertical-header">Rendah</th>
                <th colspan="1" class="vertical-header">Rata-Rata</th>
                <th colspan="1" class="vertical-header">Tinggi</th>
                <th colspan="1" class="vertical-header">Sangat Tinggi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Row 1 Kepribadian -->
            <tr>
                <th>Extraversion</th>
                <td>Mudah bergaul, aktif, talk-active, personoriented, optimis, menyenangkan, kasih sayang, bersahabat</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Conscientiousness</th>
                <td>Teratur, dapat dipercaya, pekerja keras, displin, tepat waktu, teliti, rapi, ambisius, tekun</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Agreeableness</th>
                <td>Berhati lembut, baik, suka menolong, dapat dipercaya, mudah memaafkan, mudah untuk dimaafkan, terus terang</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Openness</th>
                <td>Rasa ingin tahu tinggi, ketertarikan luas, kreatif, original, imajinatif, tidak ketinggalan zaman</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Neuroticism</th>
                <td>Kuatir, cemas, emosional, tidak merasa nyaman, kurang penyesuaian, kesedihan yang tidak beralasan</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <!-- Row 6 Minat -->
            <tr>
                <th colspan="10">Minat</th>
            </tr>
            <tr>
                <th>Realistic</th>
                <td>Terampil secara mekanik dan/atau pekerjaan yang mengutamakan keterampilan fisik, dan kekuatan otot</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Investigative</th>
                <td>Cenderung memiliki ketertarikan/minat untuk mengobservasi, belajar, menganalisis dan memecahkan masalah</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Artistic</th>
                <td>Berhati lembut, baik, suka menolong, dapat dipercaya, mudah memaafkan, mudah untuk dimaafkan, terus terang</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Social</th>
                <td>Memiliki minat bekerja dengan individu lain dibandingkan dengan peralatan</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Enterprising</th>
                <td>Memiliki minat bekerja dengan individu lain, serta mempersuasi orang lain dan tampil di muka umum</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Conventional</th>
                <td>Memiliki minat terhadap hal-hal yang mendetail, terorganisir, dan berkaitan dengan data</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <!-- Row 13 Bakat -->
            <tr>
                <th colspan="10">Bakat</th>
            </tr>
            <tr>
                <th>Dimensi perseptual</th>
                <td>Potensi kemampuan yang berhubungan pada bentuk persepsi, dimana terdapat faktor yang meliputi seperti kepekaan indera, perhatian, orientasi ruang, waktu, luas daerah persepsi, kecepatan persepsi</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Dimensi psikomotor</th>
                <td>Terdiri dari (ketepatan statis yang menitik beratkan pada posisi, dan ketepatan dinamis yang menitikberatkan pada gerakan), koordinasi, dan keluwesan</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Dimensi intelektual</th>
                <td>Terdiri dari ingatan, pengenalan, evaluatif, konvergen, dan berfikir divergen</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>


    <br>
    <h1>Hasil Validasi Cognitive</h1>
    <br>
    <table id="scoreTableValidasi">
        <thead>
                <tr>
                    <th colspan="1" class="vertical-header">Intelegensi</th>
                    <th colspan="1" class="vertical-header">Dimensi</th>
                    <th colspan="1" class="vertical-header">Raw Score</th>
                    <th colspan="1" class="vertical-header">Rendah</th>
                    <th colspan="1" class="vertical-header">Rata-Rata</th>
                    <th colspan="1" class="vertical-header">Tinggi</th>
                </tr>
        </thead>
        <tbody>
            <tr>
                <th>Satzerganzung (SE) → Melengkapi Kalimat</th>
                <td>Kemampuan pengambilan keputusan, keinginan berprestasi, penilaian atau pembentukan opini, common sense, penekanan pada berpikir praktis dan konkrit pemaknaan realitas, dan berpikir secara mandiri</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Wortauswahl (WA) → Melengkapi Kata-kata</th>
                <td>Kemampuan menangkap inti atau makna dari sesuatu yang disampaikan melalui bahasa, perasaan empati atau kemampuan menyelami perasaan, berpikir induktif menggunakan bahasa. WA juga mengukur common sense (logika berpikir), cara berpikir kongkrit praktis, sense of reality, judgement,mandiri dalam berfikir, pembentukan keputusan. Yang dimaksud dengan “judgement,”  adalah artinya apakah testee mampu menilai arti apakah ia mandiri, atau apakah ia salah kaprah</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Analogien (AN) → Persamaan Kata</th>
                <td>Kemampuan fleksibilitas dalam berpikir, kemampuan mengkombinasikan atau menghubungkan, kelincahan dalam berubah dan berganti dalam berpikir, resistensi atau kemampuan untuk melawan solusi masalah yang tidak pasti sehingga meliputi kejelasan dan kekonsenkuenan dalam berpikir</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Gemeinsamkeiten (GE) → Sifat yang Dimiliki Bersama</th>
                <td>Kemampuan abstraksi verbal, menemukan ciri yang sama atau khas dari dua objek dan menyusun suatu pengertian tentangnya. Kemampuan untuk menyatakan pengertian akan sesuatu dalam bentuk Bahasa, membentuk suatu pengertian atau mencari inti persoalan, serta memahami esensi pengertian suatu kata untuk dapat menemukan kesamaan esensial dari beberapa kata</td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Rechhenaufgaben (RA) → Kemampuan Berhitung</th>
                <td>Kemampuan berpikir atau memecahkan masalah praktis dalam berhitung, matematis, berpikir logis, dan lugas penalaran, dan kemampuan berpikir runtut mengambil kesimpulan</td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Zahlenreihen (ZR) → Deret Angka</th>
                <td>Cara berpikir teoritis dengan hitungan. Maksudnya mengukur kemampuan berhitung testee yang didasarkan pada pendekatan analisis atas informasi factual berbentuk angka sehingga didapatkan suatu kesimpulan (berpikir induktif dengan angkaangka), serta kelincahan dan irama dalam berpikir</td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Figurenauswahl (FA) → Memilih Bentuk</th>
                <td>Kemampuan membayangkan, kemampuan mengkonstruksi (sintesa dan Analisa) sehingga dapat menggabungkan potongan suatu objek visual dan menghasilkan suatu bentuk tertentu, serta memasukkan bagian pada suatu keseluruhan (membayangkan menyeluruh)</td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Wurfelaufgaben (WU) → Latihan Balok</th>
                <td>Kemampuan analisis yakni daya bayang ruang, didalamnya terkandung kreativitas, kemampuan tiga dimensi, imajinasi dan fleksibilitas berpikir, serta kemampuan konstruktif teknis dalam menyusun </td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Merkaufgaben (ME) → Latihan Simbol</th>
                <td>Kemampuan daya ingat seseorang, fokus, perhatian, konsentrasi yang menetap, dan daya tahan</td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    

    <script>
        function randomSentiment() {
            var sentiments = ["Sentimen Negatif", "Sentimen Netral", "Sentimen Positif"];
            var randomIndex = Math.floor(Math.random() * sentiments.length);
            return randomIndex;
        }

        function getRandomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function getRandomPercentage(min, max) {
            return (Math.random() * (max - min) + min).toFixed(2) + '%';
        }

        window.onload = function () {
            var table = document.getElementById("tabelKepribadian");
            var rows = table.getElementsByTagName("tr");

            for (var i = 2; i < rows.length; i++) {
                console.log(rows.length)
                if(i == 7 || i == 14){
                    continue;
                }
                else{
                    var randomIndexFacial = randomSentiment();
                    rows[i].cells[randomIndexFacial + 2].textContent = "X"; // Fill with "X" in one Facial Assessment subcolumn
                

                
                    var randomIndexVoice = randomSentiment();
                    rows[i].cells[randomIndexVoice + 5].textContent = "X"; // Fill with "X" in one Voice to Text Assessment subcolumn
                    
                    var randomSkorValidasi = getRandomNumber(1, 100);
                    var randomKepercayaan = getRandomPercentage(1, 100);

                    rows[i].cells[8].textContent = randomSkorValidasi; // "Skor Validasi" column
                    rows[i].cells[9].textContent = randomKepercayaan;  // "%Kepercayaan" column
                }
            }
        };
    </script>

    <script>
        // Function to generate a random score between 1 and 100
        function generateRandomScore() {
            return Math.floor(Math.random() * 100) + 1;
        }

        // Function to determine the values for "Rendah," "Tinggi," and "Rata-Rata" based on the raw score
        function determineValues(rawScore) {
            if (rawScore <= 33) {
                return ["X", "", ""];
            } else if (rawScore <= 66) {
                return ["", "X", ""];
            } else {
                return ["", "", "X"];
            }
        }

        // Get the table element by its ID
        var table = document.getElementById("scoreTable");

        // Iterate through the rows and populate the "Raw Score" column
        for (var i = 1; i < table.rows.length; i++) { // Start from 1 to skip the header row
            var row = table.rows[i];
            var rawScoreCell = row.cells[2]; // Index 2 is the "Raw Score" column

            // Generate a random score and set it in the cell
            var randomScore = generateRandomScore();
            rawScoreCell.textContent = randomScore;

            // Determine the values for "Rendah," "Tinggi," and "Rata-Rata" based on the raw score
            var values = determineValues(randomScore);

            // Fill in the corresponding cells
            var rendahCell = row.cells[3]; // Index 3 is the "Rendah" column
            rendahCell.textContent = values[0];

            var tinggiCell = row.cells[4]; // Index 4 is the "Tinggi" column
            tinggiCell.textContent = values[1];

            var rataRataCell = row.cells[5]; // Index 5 is the "Rata-Rata" column
            rataRataCell.textContent = values[2];
        }

        var table = document.getElementById("scoreTableValidasi");

        // Iterate through the rows and populate the "Raw Score" column
        for (var i = 1; i < table.rows.length; i++) { // Start from 1 to skip the header row
            var row = table.rows[i];
            var rawScoreCell = row.cells[2]; // Index 2 is the "Raw Score" column

            // Generate a random score and set it in the cell
            var randomScore = generateRandomScore();
            rawScoreCell.textContent = randomScore;

            // Determine the values for "Rendah," "Tinggi," and "Rata-Rata" based on the raw score
            var values = determineValues(randomScore);

            // Fill in the corresponding cells
            var rendahCell = row.cells[3]; // Index 3 is the "Rendah" column
            rendahCell.textContent = values[0];

            var tinggiCell = row.cells[4]; // Index 4 is the "Tinggi" column
            tinggiCell.textContent = values[1];

            var rataRataCell = row.cells[5]; // Index 5 is the "Rata-Rata" column
            rataRataCell.textContent = values[2];
        }
    </script>

<script>
        // Function to generate a random score between 1 and 100
        function generateRandomScore() {
            return Math.floor(Math.random() * 100) + 1;
        }

        // Function to determine the values for "Rendah," "Tinggi," and "Rata-Rata" based on the raw score
        function determineValues(rawScore) {
            if (rawScore <= 20) {
                return ["X", "", "", "", ""];
            } else if (rawScore <= 40) {
                return ["", "X", "", "", ""];
            } else if (rawScore <= 60) {
                return ["", "", "X", "", ""];
            } else if (rawScore <= 80) {
                return ["", "", "", "X", ""];
            } else {
                return ["", "", "", "", "X"];
            }
        }

        // Get the table element by its ID
        var table = document.getElementById("tabelKepribadianValidasi");

        // Iterate through the rows and populate the "Raw Score" column
        for (var i = 1; i < table.rows.length; i++) { // Start from 1 to skip the header row
            if(i==6 || i==13){
                continue;
            }
            else{
            var row = table.rows[i];
            var rawScoreCell = row.cells[2]; // Index 2 is the "Raw Score" column

            // Generate a random score and set it in the cell
            var randomScore = generateRandomScore();
            rawScoreCell.textContent = randomScore;

            // Determine the values for "Sangat Rendah" to "Sangat Tinggi" based on the raw score
            var values = determineValues(randomScore);

            // Fill in the corresponding cells
            var sangatRendahCell = row.cells[3]; // Index 3 is the "Sangat Rendah" column
            sangatRendahCell.textContent = values[0];

            var rendahCell = row.cells[4]; // Index 4 is the "Rendah" column
            rendahCell.textContent = values[1];

            var rataRataCell = row.cells[5]; // Index 5 is the "Rata-Rata" column
            rataRataCell.textContent = values[2];

            var tinggiCell = row.cells[6]; // Index 6 is the "Tinggi" column
            tinggiCell.textContent = values[3];

            var sangatTinggiCell = row.cells[7]; // Index 7 is the "Sangat Tinggi" column
            sangatTinggiCell.textContent = values[4];
            }
        }
    </script>
</body>
</html>
