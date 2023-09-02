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

    button.testButton[disabled] {
        color: #999; /* Grey text color */
        background-color: #eee; /* Grey background color */
        opacity: 0.7; /* Reduced opacity to indicate it's disabled */
        cursor: not-allowed; /* Change cursor to indicate it's not clickable */
    }
  </style>
</head>

<body>

        <div class="intro--banner" >
            <h1>Tes Cognitive</h1>
        </div>

    <div class="contact--lockup">
        <div id="video-container-" style="height:100%; width:100%; padding-top:150px">

            <video controls autoplay style="width: 100%; height: 65vh;">
                <source src="assets/video/InstructionVideo.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <h1> Webcam Anda <h1>
            <video id="webcam" autoplay style=""></video>
            <a href="{{ route('testvalidationkepribadian') }}" class="special-link-button">
                <button id="startButton" class="testButton" disabled>Lanjut ke tes berikutnya</button>
            </a>

            <a href="{{ route('testvalidationkepribadian') }}" class="special-link-button">
                <button id="startButton" class="testButton">Skip</button>
            </a>

        </div> 
        
    </div>
 
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
<script>
    // Get references to the video and button elements
    var video = document.querySelector('video');
    var startButton = document.getElementById('startButton');

    // Add an event listener to the video to enable the button when it ends
    video.addEventListener('ended', function() {
        startButton.disabled = false;
    });
</script>