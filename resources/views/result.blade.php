<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.2.1/html2canvas.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
        html,body {
            font-family: 'Montserrat', sans-serif;
            background-color: #12486B;
        }

        .main-container {
            margin-top: 20px;
            margin-left: 80px;
            margin-right: 80px;
        }

        h1 {
            color: white;
        }

        .action-container {
            margin-bottom: 20px;
        }

        button {
            background-color: #78D6C6;
            border: none;
            width: 130px;
            height: 40px;
            border-radius: 7px;
            cursor: pointer;
            margin-right: 20px;
        }

        a {
            margin-right: 20px;
            color: white;
            text-decoration: none;
        }

        a:hover {
            color: #78D6C6;
        }

        .pdf-class {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #c2c2c2;
            padding: 16px 12px; /* Increase top and bottom padding to create space */
            text-align: left;
            background-color: rgba(255, 255, 255, 0.8);
        }

        th {
            background-color: rgba(242, 242, 242, 0.8); /* Transparent gray background */
            text-align: center;
        }

        /* Style for the first column (headers on the side) */
        th.vertical-header {
            white-space: nowrap;
            width: 20px; /* Adjust the width as needed */
            transform-origin: 100% 100%;
            /* transform: rotate(-90deg); */
        }

        /* Style for every other row in the table */
        tr:nth-child(even) {
            background-color: rgba(230, 230, 230, 0.8); /* Transparent gray background */
        }

        td.center-align {
            text-align: center;
        }

        .table-info th {
            text-align: left;
        }

        .logo-container {
            display: flex;
            gap: 50px;
        }

        .signature-container {
            text-align: right;
            padding-top: 100px;
            padding-right: 100px;
            padding-bottom:50px;
            color: white;
        }

        .signature-container hr {
            border: 1px solid white;
            width: 150px;
            margin-top: 150px; 
            margin-right: 0;
        }
        
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    <div class="main-container">
        <div class="logo-container" style="margin-top:20px;">
            <a class="header--logo" href="https://maxy.academy/">
                <img src="{{ asset('assets/img/logo-maxy-header.png') }}" alt="Global">

            </a>
            <a class="header--logo" href="https://www.ubaya.ac.id/">
                <img src="{{ asset('assets/img/logo-ubaya-header.png') }}" alt="Global">

            </a>
            <a class="header--logo" href="https://kedaireka.id/">
                <img src="{{ asset('assets/img/kedaireka-logo-header.png') }}" alt="Global">

            </a>
            <a class="header--logo" href="https://www.kemdikbud.go.id/">
                <img src="{{ asset('assets/img/logo-kemendikbud-header.png') }}" alt="Global">

            </a>
        </div>
        <h1>Hasil Tes Psikogram</h1>
        
        <div class="action-container">
            <div class="pdf-class">
                <!-- <button id="generatePdfButton">Generate PDF</button>
                <a href="{{ route('download-pdf') }}" class="btn btn-primary">Download PDF</a> -->
                <button id="captureAndConvert">Download as PNG</button>
                <button id="downloadCsvButton">Download CSV</button>

            </div>
            <!-- <div>
                <button id="captureAndConvert">Capture as Image</button>
                <a href="{{ route('convert.image') }}" class="btn btn-primary">Convert Image to PDF</a>
                
            </div> -->

        </div>

        <table class="table-info">
            <tr>
                <th>Nama</th>
                <td>{{ $dataUser->nama_lengkap }}</td>        
            </tr>
            <tr>
                <th>Usia</th>
                <td>{{ $dataUser->usia }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>
                    @php
                        $jenisKelamin = $dataUser->jenis_kelamin;
                        $jenisKelaminText = $jenisKelamin == 1 ? 'Laki-Laki' : ($jenisKelamin == 0 ? 'Perempuan' : 'Tidak Diketahui');
                    @endphp
                    {{ $jenisKelaminText }}
                </td>
            </tr>
            <tr>
                <th>Pendidikan</th>
                <td>{{ $dataUser->pendidikan_terakhir }}</td>
            </tr>
            <tr>
                <th>Tanggal Pemeriksaan</th>
                <td>{{ $data->tanggal_penilaian }}</td>        
            </tr>
        
        </table>
        <br>
        <h1>Hasil Tele-asesmen Interview</h1>
        <br>
        <?php
            // Assuming $data->scoreString contains the comma-separated string
            $scoreArrayfpos = explode(',', $data->f_sentimen_positif);
            $scoreArrayfpos = array_map('floatval', $scoreArrayfpos);

            $scoreArrayfneu = explode(',', $data->f_sentimen_netral);
            $scoreArrayfneu = array_map('floatval', $scoreArrayfneu);

            $scoreArrayfneg = explode(',', $data->f_sentimen_negatif);
            $scoreArrayfneg = array_map('floatval', $scoreArrayfneg);

            // $scoreArrayvpos = explode(',', $data->v_sentimen_positif);
            // $scoreArrayvpos = array_map('floatval', $scoreArrayvpos);

            // $scoreArrayvneu = explode(',', $data->v_sentimen_netral);
            // $scoreArrayvneu = array_map('floatval', $scoreArrayvneu);

            // $scoreArrayvneg = explode(',', $data->v_sentimen_negatif);
            // $scoreArrayvneg = array_map('floatval', $scoreArrayvneg);

            $scoreArrayv = explode(',', $data->v_sentimen);
            $scoreArrayv = array_map('floatval', $scoreArrayv);


            $scoreArrayvalidasi = explode(',', $data->skor_validasi);
            $scoreArrayvalidasi = array_map('floatval', $scoreArrayvalidasi);

            $scoreArraykepercayaan = explode(',', $data->kepercayaan);
            $scoreArraykepercayaan = array_map('floatval', $scoreArraykepercayaan);
        ?>
        <table id="tabelKepribadian"> <!-- Added an ID to the table -->
            <thead>
                <tr>
                    <th colspan="2" class="vertical-header"></th>
                    <th colspan="3" class="vertical-header">Sentimen Asesmen Facial</th>
                    <th colspan="3" class="vertical-header">Sentimen Asesmen Voice to text</th>
                    <th colspan="1" class="vertical-header">Validation</th>
                    <th colspan="1" class="vertical-header">Lie Behaviour</th>
                </tr>
            
                <tr>
                    <th colspan="2" class="vertical-header">Kepribadian</th>
                    <th class="vertical-header">Negatif</th>
                    <th class="vertical-header">Netral</th>
                    <th class="vertical-header">Positif</th>
                    <th class="vertical-header">Negatif</th>
                    <th class="vertical-header">Netral</th>
                    <th class="vertical-header">Positif</th>
                    <th class="vertical-header">Skor Validasi</th>
                    <th class="vertical-header">SkorKepercayaan</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 3 Kepribadian -->
                <tr>
                    <th>Extraversion</th>
                    <td>Mudah bergaul, aktif, talk-active, personoriented, optimis, menyenangkan, kasih sayang, bersahabat</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[0]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[0]; ?></td>
                </tr>
                <tr>
                    <th>Conscientiousness</th>
                    <td>Teratur, dapat dipercaya, pekerja keras, displin, tepat waktu, teliti, rapi, ambisius, tekun</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[1]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[1]; ?></td>
                </tr>
                <tr>
                    <th>Agreeableness</th>
                    <td>Berhati lembut, baik, suka menolong, dapat dipercaya, mudah memaafkan, mudah untuk dimaafkan, terus terang</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[2]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[2]; ?></td>
                </tr>
                <tr>
                    <th>Openness</th>
                    <td>Rasa ingin tahu tinggi, ketertarikan luas, kreatif, original, imajinatif, tidak ketinggalan zaman</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[3]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[3]; ?></td>
                </tr>
                <tr>
                    <th>Neuroticism</th>
                    <td>Kuatir, cemas, emosional, tidak merasa nyaman, kurang penyesuaian, kesedihan yang tidak beralasan</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[4]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[4]; ?></td>
                </tr>
                <!-- Row 7 Minat -->
                <tr>
                    <th colspan="10">Minat</th>
                </tr>
                    
                <tr>
                    <th>Realistic</th>
                    <td>Terampil secara mekanik dan/atau pekerjaan yang mengutamakan keterampilan fisik, dan kekuatan otot</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[5]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[5]; ?></td>
                </tr>
                <tr>
                    <th>Investigative</th>
                    <td>Cenderung memiliki ketertarikan/minat untuk mengobservasi, belajar, menganalisis dan memecahkan masalah</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[6]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[6]; ?></td>
                </tr>
                <tr>
                    <th>Artistic</th>
                    <td>Berhati lembut, baik, suka menolong, dapat dipercaya, mudah memaafkan, mudah untuk dimaafkan, terus terang</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[7]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[7]; ?></td>
                </tr>
                <tr>
                    <th>Social</th>
                    <td>Memiliki minat bekerja dengan individu lain dibandingkan dengan peralatan</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[8]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[8]; ?></td>
                </tr>
                <tr>
                    <th>Enterprising</th>
                    <td>Memiliki minat bekerja dengan individu lain, serta mempersuasi orang lain dan tampil di muka umum</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[9]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[9]; ?></td>
                </tr>
                <tr>
                    <th>Conventional</th>
                    <td>Memiliki minat terhadap hal-hal yang mendetail, terorganisir, dan berkaitan dengan data</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[10]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[10]; ?></td>
                </tr>
                <!-- Row 14 Bakat -->
                <tr>
                    <th colspan="10">Bakat</th>
                </tr>
                <tr>
                    <th>Dimensi perseptual</th>
                    <td>Potensi kemampuan yang berhubungan pada bentuk persepsi, dimana terdapat faktor yang meliputi seperti kepekaan indera, perhatian, orientasi ruang, waktu, luas daerah persepsi, kecepatan persepsi</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[11]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[11]; ?></td>
                </tr>
                <tr>
                    <th>Dimensi psikomotor</th>
                    <td>Terdiri dari (ketepatan statis yang menitik beratkan pada posisi, dan ketepatan dinamis yang menitikberatkan pada gerakan), koordinasi, dan keluwesan</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[12]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[12]; ?></td>
                </tr>
                <tr>
                    <th>Dimensi intelektual</th>
                    <td>Terdiri dari ingatan, pengenalan, evaluatif, konvergen, dan berfikir divergen</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>

                    <td><?php echo $scoreArrayvalidasi[13]; ?></td>
                    <td><?php echo $scoreArraykepercayaan[13]; ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <h1>Hasil Tele-asesmen Cognitive</h1>
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
                    <td>{{ $data->cognitive_video_score }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Wortauswahl (WA) → Melengkapi Kata-kata</th>
                    <td>Kemampuan menangkap inti atau makna dari sesuatu yang disampaikan melalui bahasa, perasaan empati atau kemampuan menyelami perasaan, berpikir induktif menggunakan bahasa. WA juga mengukur common sense (logika berpikir), cara berpikir kongkrit praktis, sense of reality, judgement,mandiri dalam berfikir, pembentukan keputusan. Yang dimaksud dengan “judgement,”  adalah artinya apakah testee mampu menilai arti apakah ia mandiri, atau apakah ia salah kaprah</td>
                    <td>{{ $data->cognitive_video_score }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Analogien (AN) → Persamaan Kata</th>
                    <td>Kemampuan fleksibilitas dalam berpikir, kemampuan mengkombinasikan atau menghubungkan, kelincahan dalam berubah dan berganti dalam berpikir, resistensi atau kemampuan untuk melawan solusi masalah yang tidak pasti sehingga meliputi kejelasan dan kekonsenkuenan dalam berpikir</td>
                    <td>{{ $data->cognitive_video_score }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Gemeinsamkeiten (GE) → Sifat yang Dimiliki Bersama</th>
                    <td>Kemampuan abstraksi verbal, menemukan ciri yang sama atau khas dari dua objek dan menyusun suatu pengertian tentangnya. Kemampuan untuk menyatakan pengertian akan sesuatu dalam bentuk Bahasa, membentuk suatu pengertian atau mencari inti persoalan, serta memahami esensi pengertian suatu kata untuk dapat menemukan kesamaan esensial dari beberapa kata</td>                
                    <td>{{ $data->cognitive_video_score }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Rechhenaufgaben (RA) → Kemampuan Berhitung</th>
                    <td>Kemampuan berpikir atau memecahkan masalah praktis dalam berhitung, matematis, berpikir logis, dan lugas penalaran, dan kemampuan berpikir runtut mengambil kesimpulan</td>                
                    <td>{{ $data->cognitive_video_score }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Zahlenreihen (ZR) → Deret Angka</th>
                    <td>Cara berpikir teoritis dengan hitungan. Maksudnya mengukur kemampuan berhitung testee yang didasarkan pada pendekatan analisis atas informasi factual berbentuk angka sehingga didapatkan suatu kesimpulan (berpikir induktif dengan angkaangka), serta kelincahan dan irama dalam berpikir</td>                
                    <td>{{ $data->cognitive_video_score }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Figurenauswahl (FA) → Memilih Bentuk</th>
                    <td>Kemampuan membayangkan, kemampuan mengkonstruksi (sintesa dan Analisa) sehingga dapat menggabungkan potongan suatu objek visual dan menghasilkan suatu bentuk tertentu, serta memasukkan bagian pada suatu keseluruhan (membayangkan menyeluruh)</td>                
                    <td>{{ $data->cognitive_video_score }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Wurfelaufgaben (WU) → Latihan Balok</th>
                    <td>Kemampuan analisis yakni daya bayang ruang, didalamnya terkandung kreativitas, kemampuan tiga dimensi, imajinasi dan fleksibilitas berpikir, serta kemampuan konstruktif teknis dalam menyusun </td>                
                    <td>{{ $data->cognitive_video_score }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Merkaufgaben (ME) → Latihan Simbol</th>
                    <td>Kemampuan daya ingat seseorang, fokus, perhatian, konsentrasi yang menetap, dan daya tahan</td>                
                    <td>{{ $data->cognitive_video_score }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
            </tbody>
        </table>

        
            <!-- Table Validasi Show ------------------------------------------------------------------------------------------------------- -->
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
            <?php
            // Assuming $data->scoreString contains the comma-separated string
            $scoreArray = explode(',', $data->skor_validasi_kepribadianbakatminat);
            $scoreArray = array_map('intval', $scoreArray);
            ?>
            <tbody>
                <!-- Row 1 Kepribadian -->
                <tr>
                    <th>Extraversion</th>
                    <td>Mudah bergaul, aktif, talk-active, personoriented, optimis, menyenangkan, kasih sayang, bersahabat</td>
                    <td><?php echo $scoreArray[0]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Conscientiousness</th>
                    <td>Teratur, dapat dipercaya, pekerja keras, displin, tepat waktu, teliti, rapi, ambisius, tekun</td>
                    <td><?php echo $scoreArray[1]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Agreeableness</th>
                    <td>Berhati lembut, baik, suka menolong, dapat dipercaya, mudah memaafkan, mudah untuk dimaafkan, terus terang</td>
                    <td><?php echo $scoreArray[2]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Openness</th>
                    <td>Rasa ingin tahu tinggi, ketertarikan luas, kreatif, original, imajinatif, tidak ketinggalan zaman</td>
                    <td><?php echo $scoreArray[3]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Neuroticism</th>
                    <td>Kuatir, cemas, emosional, tidak merasa nyaman, kurang penyesuaian, kesedihan yang tidak beralasan</td>
                    <td><?php echo $scoreArray[4]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <!-- Row 6 Minat -->
                <tr>
                    <th colspan="10">Minat</th>
                </tr>
                <tr>
                    <th>Realistic</th>
                    <td>Terampil secara mekanik dan/atau pekerjaan yang mengutamakan keterampilan fisik, dan kekuatan otot</td>
                    <td><?php echo $scoreArray[5]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Investigative</th>
                    <td>Cenderung memiliki ketertarikan/minat untuk mengobservasi, belajar, menganalisis dan memecahkan masalah</td>
                    <td><?php echo $scoreArray[6]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Artistic</th>
                    <td>Berhati lembut, baik, suka menolong, dapat dipercaya, mudah memaafkan, mudah untuk dimaafkan, terus terang</td>
                    <td><?php echo $scoreArray[7]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Social</th>
                    <td>Memiliki minat bekerja dengan individu lain dibandingkan dengan peralatan</td>
                    <td><?php echo $scoreArray[8]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Enterprising</th>
                    <td>Memiliki minat bekerja dengan individu lain, serta mempersuasi orang lain dan tampil di muka umum</td>
                    <td><?php echo $scoreArray[9]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Conventional</th>
                    <td>Memiliki minat terhadap hal-hal yang mendetail, terorganisir, dan berkaitan dengan data</td>
                    <td><?php echo $scoreArray[10]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <!-- Row 13 Bakat -->
                <tr>
                    <th colspan="10">Bakat</th>
                </tr>
                <tr>
                    <th>Dimensi perseptual</th>
                    <td>Potensi kemampuan yang berhubungan pada bentuk persepsi, dimana terdapat faktor yang meliputi seperti kepekaan indera, perhatian, orientasi ruang, waktu, luas daerah persepsi, kecepatan persepsi</td>
                    <td><?php echo $scoreArray[11]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Dimensi psikomotor</th>
                    <td>Terdiri dari (ketepatan statis yang menitik beratkan pada posisi, dan ketepatan dinamis yang menitikberatkan pada gerakan), koordinasi, dan keluwesan</td>
                    <td><?php echo $scoreArray[12]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Dimensi intelektual</th>
                    <td>Terdiri dari ingatan, pengenalan, evaluatif, konvergen, dan berfikir divergen</td>
                    <td><?php echo $scoreArray[13]; ?></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
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
                    <td>{{ $data->skor_validasi_cognitif }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Wortauswahl (WA) → Melengkapi Kata-kata</th>
                    <td>Kemampuan menangkap inti atau makna dari sesuatu yang disampaikan melalui bahasa, perasaan empati atau kemampuan menyelami perasaan, berpikir induktif menggunakan bahasa. WA juga mengukur common sense (logika berpikir), cara berpikir kongkrit praktis, sense of reality, judgement,mandiri dalam berfikir, pembentukan keputusan. Yang dimaksud dengan “judgement,”  adalah artinya apakah testee mampu menilai arti apakah ia mandiri, atau apakah ia salah kaprah</td>
                    <td>{{ $data->skor_validasi_cognitif }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Analogien (AN) → Persamaan Kata</th>
                    <td>Kemampuan fleksibilitas dalam berpikir, kemampuan mengkombinasikan atau menghubungkan, kelincahan dalam berubah dan berganti dalam berpikir, resistensi atau kemampuan untuk melawan solusi masalah yang tidak pasti sehingga meliputi kejelasan dan kekonsenkuenan dalam berpikir</td>
                    <td>{{ $data->skor_validasi_cognitif }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Gemeinsamkeiten (GE) → Sifat yang Dimiliki Bersama</th>
                    <td>Kemampuan abstraksi verbal, menemukan ciri yang sama atau khas dari dua objek dan menyusun suatu pengertian tentangnya. Kemampuan untuk menyatakan pengertian akan sesuatu dalam bentuk Bahasa, membentuk suatu pengertian atau mencari inti persoalan, serta memahami esensi pengertian suatu kata untuk dapat menemukan kesamaan esensial dari beberapa kata</td>                
                    <td>{{ $data->skor_validasi_cognitif }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Rechhenaufgaben (RA) → Kemampuan Berhitung</th>
                    <td>Kemampuan berpikir atau memecahkan masalah praktis dalam berhitung, matematis, berpikir logis, dan lugas penalaran, dan kemampuan berpikir runtut mengambil kesimpulan</td>                
                    <td>{{ $data->skor_validasi_cognitif }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Zahlenreihen (ZR) → Deret Angka</th>
                    <td>Cara berpikir teoritis dengan hitungan. Maksudnya mengukur kemampuan berhitung testee yang didasarkan pada pendekatan analisis atas informasi factual berbentuk angka sehingga didapatkan suatu kesimpulan (berpikir induktif dengan angkaangka), serta kelincahan dan irama dalam berpikir</td>                
                    <td>{{ $data->skor_validasi_cognitif }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Figurenauswahl (FA) → Memilih Bentuk</th>
                    <td>Kemampuan membayangkan, kemampuan mengkonstruksi (sintesa dan Analisa) sehingga dapat menggabungkan potongan suatu objek visual dan menghasilkan suatu bentuk tertentu, serta memasukkan bagian pada suatu keseluruhan (membayangkan menyeluruh)</td>                
                    <td>{{ $data->skor_validasi_cognitif }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Wurfelaufgaben (WU) → Latihan Balok</th>
                    <td>Kemampuan analisis yakni daya bayang ruang, didalamnya terkandung kreativitas, kemampuan tiga dimensi, imajinasi dan fleksibilitas berpikir, serta kemampuan konstruktif teknis dalam menyusun </td>                
                    <td>{{ $data->skor_validasi_cognitif }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
                <tr>
                    <th>Merkaufgaben (ME) → Latihan Simbol</th>
                    <td>Kemampuan daya ingat seseorang, fokus, perhatian, konsentrasi yang menetap, dan daya tahan</td>                
                    <td>{{ $data->skor_validasi_cognitif }}</td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                    <td class="center-align"></td>
                </tr>
            </tbody>
        </table>
        <div class="signature-container">
            <!-- Right-aligned content with padding at the top -->
            <p>Tanda Tangan Psikolog</p>
            
            <!-- Line for the signature aligned to the right -->
            <hr>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        console.log('Data for Penilaian:', @json($data));
        console.log('Data for User:', @json($dataUser));
    </script>
    <!-- JavaScript for PDF generation -->
    <script>
    $(document).ready(function() {
        // Add an event listener to the button
        $('#generatePdfButton').click(function() {
            // Capture the HTML content of the current page
            var currentPageHTML = $('html').html();

            // Send the HTML content to the server for PDF generation
            $.ajax({
                type: 'POST', // Make sure this is set to POST
                url: '/generate-pdf', // Ensure this matches your updated route
                data: {
                    htmlContent: currentPageHTML
                },
                success: function(response) {
                    console.log(response);
                    alert('PDF generated and ready for download.');
                },
                error: function(xhr, textStatus, errorThrown) {
                    // Handle errors here
                    alert('Error generating PDF.');
                }
            });
        });
    });
    </script>


    <script>
        function randomSentiment() {
            var sentiments = ["Negatif", "Netral", "Positif"];
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
        var scoreArrayfpos = <?php echo json_encode($scoreArrayfpos); ?>;
        var scoreArrayfneu = <?php echo json_encode($scoreArrayfneu); ?>;
        var scoreArrayfneg = <?php echo json_encode($scoreArrayfneg); ?>;
        var scoreArrayv = <?php echo json_encode($scoreArrayv); ?>;
        var scoreArrayvalidasi = <?php echo json_encode($scoreArrayvalidasi); ?>;
        var scoreArraykepercayaan = <?php echo json_encode($scoreArraykepercayaan); ?>;
        console.log(rows.length)
        console.log(scoreArraykepercayaan)
        var indexData = 0
        for (var i = 2; i < rows.length; i++) {
            
            if (i == 7 || i == 14) {
                continue;
            } else {
                // Extract the values from the respective arrays
                

                // Convert PHP variables to JavaScript variables
                var fpos = parseFloat(scoreArrayfpos[indexData]);
                var fneg = parseFloat(scoreArrayfneg[indexData]);
                var fneu = parseFloat(scoreArrayfneu[indexData]);
                var voice = parseFloat(scoreArrayv[indexData]);
                // var vpos = parseFloat(scoreArrayvpos[indexData]);
                // var vneg = parseFloat(scoreArrayvneg[indexData]);
                // var vneu = parseFloat(scoreArrayvneu[indexData]);

                // Find the maximum value and its corresponding index
                var maxF = Math.max(fpos, fneg, fneu);
                // var maxV = Math.max(vpos, vneg, vneu);

                if (maxF === fneu) {
                    rows[i].cells[3].textContent = "◯"; // "Fpos" column
                } else if (maxF === fneg) {
                    rows[i].cells[2].textContent = "◯"; // "Fneg" column
                } else if (maxF === fpos) {
                    rows[i].cells[4].textContent = "◯"; // "Fneu" column
                }

                if (voice == 3) {
                    rows[i].cells[6].textContent = "◯"; // "Vpos" column
                } else if (voice < 3 ) {
                    rows[i].cells[5].textContent = "◯"; // "Vneg" column
                } else if (voice > 3) {
                    rows[i].cells[7].textContent = "◯"; // "Vneu" column
                }

                // rows[i].cells[8].textContent = parseFloat(scoreArrayvalidasi); // "Skor Validasi" column
                // rows[i].cells[9].textContent = parseFloat(scoreArraykepercayaan); // "%Kepercayaan" column
                indexData++
            }
        }
    };
    </script>
    
    <script>
        // Function to generate a random score between 1 and 100
        function generateRandomScore() {
            return Math.floor(Math.random() * 10) + 1;
        }

        // Function to determine the values for "Rendah," "Tinggi," and "Rata-Rata" based on the raw score
        function determineValues(rawScore) {
            if (rawScore <= 14) {
                return ["◯", "", ""];
            } else if (rawScore <= 24) {
                return ["", "◯", ""];
            } else {
                return ["", "", "◯"];
            }
        }
        function determineValuesValidasi(rawScore) {
            if (rawScore <= 14) {
                return ["◯", "", ""];
            } else if (rawScore <= 24) {
                return ["", "◯", ""];
            } else {
                return ["", "", "◯"];
            }
        }
        // ○ 🔘 ◯
        // Get the table element by its ID
        var table = document.getElementById("scoreTable");

        // Iterate through the rows and populate the "Raw Score" column
        for (var i = 1; i < table.rows.length; i++) { // Start from 1 to skip the header row
            var row = table.rows[i];
            var rawScoreCell = row.cells[2]; // Index 2 is the "Raw Score" column

            // Generate a random score and set it in the cell
            

            // Determine the values for "Rendah," "Tinggi," and "Rata-Rata" based on the raw score
            var values = determineValuesValidasi(rawScoreCell.textContent);


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
            //var randomScore = generateRandomScore();
            //rawScoreCell.textContent = randomScore;

            // Determine the values for "Rendah," "Tinggi," and "Rata-Rata" based on the raw score
            var values = determineValuesValidasi(rawScoreCell.textContent);

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
            return Math.floor(Math.random() * 10) + 1;
        }

        // Function to determine the values for "Rendah," "Tinggi," and "Rata-Rata" based on the raw score
        //  REMINDER: buat Determinevalues buat semua isi biar soale peniliaiane unik
        function determineValues(rawScore) {
            if (rawScore <= 20) {
                return ["◯", "", "", "", ""];
            } else if (rawScore <= 40) {
                return ["", "◯", "", "", ""];
            } else if (rawScore <= 60) {
                return ["", "", "◯", "", ""];
            } else if (rawScore <= 80) {
                return ["", "", "", "◯", ""];
            } else {
                return ["", "", "", "", "◯"];
            }
        }

        // Get the table element by its ID
        var table = document.getElementById("tabelKepribadianValidasi");

        // Iterate through the rows and populate the "Raw Score" column
        for (var i = 1; i < table.rows.length; i++) { // Start from 1 to skip the header row
            if(i==6 || i==13){
                continue;

            }
            else if(i < 6 ){
                var row = table.rows[i];
                var rawScoreCell = row.cells[2]; // Index 2 is the "Raw Score" column
                console.log(rawScoreCell);
                // Determine the values for "Sangat Rendah" to "Sangat Tinggi" based on the raw score
                var rawScoreCellValue = parseInt(rawScoreCell.textContent, 10); // Parse as an integer
                var values = determineValues((rawScoreCellValue / 50) * 100);
                

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
            else if(i > 6 && i < 13){
                var row = table.rows[i];
                var rawScoreCell = row.cells[2]; // Index 2 is the "Raw Score" column
                console.log(rawScoreCell);
                // Determine the values for "Sangat Rendah" to "Sangat Tinggi" based on the raw score
                var rawScoreCellValue = parseInt(rawScoreCell.textContent, 10); // Parse as an integer
                var values = determineValues((rawScoreCellValue / 10) * 100);

                

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
            else{
                var row = table.rows[i];
                var rawScoreCell = row.cells[2]; // Index 2 is the "Raw Score" column

                // Generate a random score and set it in the cell
                //var randomScore = generateRandomScore();
                //rawScoreCell.textContent = randomScore;

                // Determine the values for "Sangat Rendah" to "Sangat Tinggi" based on the raw score
                var rawScoreCellValue = parseInt(rawScoreCell.textContent, 10); // Parse as an integer
                var values = determineValues((rawScoreCellValue / 5) * 100);

                // Fill in the corresponding cells
                var sangatRendahCell = row.cells[3]; 
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

    <!-- Script untuk dapat gambar -->
    <script>
        document.getElementById('captureAndConvert').addEventListener('click', function() {
            html2canvas(document.body).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                
                // Send the image data to the server
                var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                var formData = new FormData();
                formData.append('imageData', imgData);
                
                fetch('/save-screenshot', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    body: formData
                }).then(response => {
                    if (response.ok) {
                        return response.blob();
                    } else {
                        // Handle errors, e.g., show an error message
                    }
                }).then(blob => {
                    // Create a download link for the saved file
                    var url = window.URL.createObjectURL(blob);
                    var a = document.createElement('a');
                    a.href = url;
                    a.download = 'screenshot.png'; // Specify the file name
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                });
            });
        });
    </script>

    <!-- Script Untuk download csv -->
    <script>
        document.getElementById('downloadCsvButton').addEventListener('click', function() {
            // Perform an AJAX request to trigger the download
            fetch('/download-csv')
                .then(response => {
                    return response.blob();
                })
                .then(blob => {
                    // Create a temporary link to download the file
                    const url = window.URL.createObjectURL(new Blob([blob]));
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'csvKep.csv'; // Name of the downloaded file
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                });
        });
    </script>




</body>
</html>
