<head>
  <title>Global</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="HTML5 website template">
  <meta name="keywords" content="global, template, html, sass, jquery">
  <meta name="author" content="Bucky Maler">
  <link rel="stylesheet" href="assets/css/main.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">     
  <style>
    .intro{
        position:relative;
        display:-webkit-box;
        display:-webkit-flex;
        display:-ms-flexbox;
        display:flex;
        width:100%;
        max-width:75%;
        height:100%;
        -webkit-box-orient:vertical;
        -webkit-box-direction:normal;
        -webkit-flex-direction:column;
        -ms-flex-direction:column;
        flex-direction:column;
        -webkit-box-pack:center;
        -webkit-justify-content:center;
        -ms-flex-pack:center;
        justify-content:center;
        margin:0 auto;
        align-items:center;
    }
    @media (max-width: 1180px){
        .intro{
            max-width:100%
        }
    }
    .intro--banner{
        position:relative;
        height:240px
    }
    @media (max-width: 768px) {
        /* Apply these styles when the screen width is 768px or smaller */
        .intro--banner {
            height: 120px; /* Adjust the height for smaller screens */
        }
    }
    .intro--banner::before{
        content:"";
        position:absolute;
        bottom:20px;
        left:-15px;
        right:0;
        height:2px;
        background-color:#282828
    }
    .intro--banner::after{
        content:"";
        position:absolute;
        bottom:18px;
        left:0;
        width:30px;
        height:4px;
        background-color:#0f33ff
    }
    .intro--banner h1{
        position:relative;
        font-size:58px;
        font-weight:900;
        line-height:1;
        z-index:1;
        text-align: center;
    }
    .intro--banner button {
        background-color:#0f33ff;
        font-weight:700;
        text-transform:uppercase;
        font-size:20px;
        width: 100%; 
        height: 60px; 
        color: #ffff;
        border-color: #ffff;
    }
    .testButton{
        background-color:#0f33ff;
        font-weight:700;
        text-transform:uppercase;
        font-size:20px;
        width: 50%; 
        height: 60px; 
        color: #ffff;
        border-color: #ffff;
        margin-top:20px
    }
    .special-link-button {
        display: inline-block;
        /* padding-left: 28.75%; */
        width:100%;
    }
    .contact--lockup{
        text-align: center;
        position:relative;
        display:-webkit-box;
        display:-webkit-flex;
        display:-ms-flexbox;
        display:flex;
        width:75%;
        /* max-width:75%;*/
        height:100%; 
        -webkit-box-align:center;
        -webkit-align-items:center;
        -ms-flex-align:center;
        align-items:center;
        -webkit-box-pack:end;
        -webkit-justify-content:flex-end;
        -ms-flex-pack:end;
        justify-content:flex-end;
        margin:0 auto
    }
    #webcam {
        display: block;
        /* width:30%: */
        margin: 0 auto;
        max-width: 75%; 
        /* height: auto;  */
        
        transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        -moz-transform: scaleX(-1);
        -ms-transform: scaleX(-1);
        transform-origin: center;
        -webkit-transform-origin: center;
        -moz-transform-origin: center;
        -ms-transform-origin: center;
        
    }
  </style>
  <style>
    body {
        text-align: center; /* Center-align the content */
    }

    p {
        font-size: 22px; /* Set the font size to your desired size */
        margin: 0 auto; /* Center-align the paragraphs within the page */
        max-width: 80%; /* Limit the width of the paragraphs for better readability */
    }
</style>
</head>

<body>
    <!-- <div class="intro"> -->
        <div class="intro--banner" >
            <!-- <h1>Tele Assesment<br>Interaktif<br>Psikologi</h1> -->
            
            <h1>Video Penjelasan</h1>
            <h1>Tele-asesment</h1>
            <!-- <a href="{{ route('login') }}" class="special-link">
                <button class="testButton">Mulai Test</button>
            </a> -->
        </div>
    <!-- </div> -->
    <p>Pastikan wajah ada pada layar video yang akan merekam jawaban saudara dengan ukuran wajah yang tampak di layar sebesar mungkin</p>
    <br>
    <p> Jawablah pertanyaan dari video dari sistem artificial Intelligence kami dengan jujur dan gunakan kata sifat ( suka, senang, takut, marah, dll). Maksimum dalam menjawab pertnyaan adalah 5 menit.</p>
    <div class="contact--lockup">
        <div id="video-container-" style="height:100%; width:100%; padding-top:150px">
            <!-- <iframe width="640" height="360" src="https://www.youtube.com/embed/FC7JQItVqzM" frameborder="0" allowfullscreen></iframe>  -->
            <!-- <iframe src="https://www.youtube.com/embed/FC7JQItVqzM" style="width:100%;height:65vh;" frameborder="0" allowfullscreen></iframe> -->
            <video controls autoplay style="width: 100%; height: 65vh;">
                <source src="assets/video/InstructionVideo.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <p style="padding-top:30px">Panduan Untuk Merekam Video : <br> <span> Start Record -> Stop -> Process Video</span></p>
            <br>
            <h2>Perlu di Ingat Bahwa Terdapat 14 Video Dalam Proses Ini</h2>
            <h1> Webcam Anda <h1>
            <video id="webcam" autoplay style=""></video>
            <a href="{{ route('testinterview') }}" class="special-link-button">
                <button class="testButton">Mulai Test</button>
            </a>
            <!-- <div>
            </div> -->
            <!-- <p>something</p> -->
        </div> 
        
    </div>
    <!-- <div class="intro"> -->
        <!-- <div class="intro--banner" >
            <a href="{{ route('login') }}" class="special-link">
                <button class="testButton">Mulai Test</button>
            </a>
        </div> -->
    <!-- </div> -->
    <!-- <div class="intro">
        <div class="intro--banner">
        <h1>Tele Assesment<br>Interaktif<br>Psikologi</h1>
        <button class="cta">Bergabung
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
            <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
            <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
            </g>
            </svg>
            <span class="btn-background"></span>
        </button>
        <img src="assets/img/introduction-visual1.png" alt="Welcome">
        </div>
        <div class="intro--options">
        <a href="#0">
            <h3>Interview Test</h3>
            <p>The task of Face Sentiment Analysis involves detecting the sentiment portrayed by a person's face.</p>
        </a>
        <a href="#0">
            <h3>Validation Test</h3>
            <p>The task of Face Sentiment Analysis involves detecting the sentiment portrayed by a person's face.</p>
        </a>
        <a href="#0">
            <h3>Cognitive Style Test</h3>
            <p>The task of Voice Sentiment Analysis involves assigning a positive or negative score for how the tone is perceived</p>
        </a>
        </div>
    </div> -->
</body>
<script>
    // Access the user's webcam
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
            // Assign the webcam stream to the video element
            var webcam = document.getElementById('webcam');
            webcam.srcObject = stream;
        })
        .catch(function (error) {
            console.error('Error accessing webcam:', error);
        });
</script>