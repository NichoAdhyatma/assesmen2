<!DOCTYPE html>
<html>

<head>
    <title>Execute Python Script</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="HTML5 website template">
    <meta name="keywords" content="global, template, html, sass, jquery">
    <meta name="author" content="Bucky Maler">
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .intro {
            position: relative;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            width: 100%;
            max-width: 75%;
            height: 100%;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin: 0 auto;
            align-items: center;
        }

        @media (max-width: 1180px) {
            .intro {
                max-width: 100%
            }
        }

        .intro--banner {
            position: relative;
        }

        @media (max-width: 768px) {
            /* Apply these styles when the screen width is 768px or smaller */
            .intro--banner {
                height: 120px;
                /* Adjust the height for smaller screens */
            }
        }

        .intro--banner::before {
            content: "";
            position: absolute;
            bottom: 20px;
            left: -15px;
            right: 0;
            height: 2px;
            background-color: #282828
        }

        .intro--banner::after {
            content: "";
            position: absolute;
            bottom: 18px;
            left: 0;
            width: 30px;
            height: 4px;
            background-color: #0f33ff
        }

        .intro--banner h1 {
            position: relative;
            font-size: 58px;
            font-weight: 900;
            line-height: 1;
            z-index: 1;
            text-align: center;
        }

        .intro--banner button {
            background-color: #0f33ff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 20px;
            width: 100%;
            height: 60px;
            color: #ffff;
            border-color: #ffff;
        }

        .testButton {
            background-color: #0f33ff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 20px;
            width: 50%;
            height: 60px;
            color: #ffff;
            border-color: #ffff;
            margin-top: 20px
        }

        .testButton i {
            margin-right: 10px; /* Add margin to the right of the icon for spacing */
        }

        @media screen and (max-width: 768px) {
            .testButton {
                font-size: 16px; /* Adjust the font size for smaller screens */
            }
        }

        .special-link-button {
            display: inline-block;
            width: 100%;
        }

        .contact--lockup {
            text-align: center;
            position: relative;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            width: 75%;
            height: 100%;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            margin: 0 auto
        }

        #webcam {
            display: block;
            margin: 0 auto;
            max-width: 75%;
            transform: scaleX(-1);
            -webkit-transform: scaleX(-1);
            -moz-transform: scaleX(-1);
            -ms-transform: scaleX(-1);
            transform-origin: center;
            -webkit-transform-origin: center;
            -moz-transform-origin: center;
            -ms-transform-origin: center;
            position: relative; /* Add this line to make it the parent for absolute positioning */
        }

        button.testButton[disabled] {
            color: #999;
            /* Grey text color */
            background-color: #eee;
            /* Grey background color */
            opacity: 0.7;
            /* Reduced opacity to indicate it's disabled */
            cursor: not-allowed;
            /* Change cursor to indicate it's not clickable */
        }

        #face-position-square {
            position: absolute;
            border: 2px solid red;
            /* You can change the color and border thickness */
            width: 100px;
            /* Adjust the width of the square as needed */
            height: 100px;
            /* Adjust the height of the square as needed */
            top: 50%;
            /* Position the square vertically in the middle */
            left: 50%;
            /* Position the square horizontally in the middle */
            transform: translate(-50%, -50%);
            /* Center the square */
        }
    </style>
    <style>
        #your-video-id {
            transform: scaleX(-1); /* Mirror the video horizontally */
        }
    </style>
</head>


<body>
    <div class="intro--banner">
        <h1>Live Cognition Test</h1>
    </div>

    <div class="contact--lockup">
        <div id="video-container-" style="height:100%; width:100%; padding-top:75px">

        @php
            $videoDir = public_path('assets/video/LiveCognition'); // Specify the path to your video folder.
            $videoFiles = glob($videoDir . '/*.mp4'); // Get all .mp4 files in the folder.

            if (count($videoFiles) > 0) {
                $randomVideo = basename($videoFiles[array_rand($videoFiles)]); // Select a random video file name.
            } else {
                $randomVideo = ''; // No videos found in the folder.
            }
        @endphp

        <video id="main-video" controls autoplay style="width: 100%; height: 65vh;">
            <source src="{{ asset('assets/video/LiveCognition/' . $randomVideo) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

            <!-- <p style="padding-top:20px">Mulai tes dengan menekan tombol start record, <br>Akhiri dengan menekan tombol stop recording.<br> Setelah menyelesaikan sesi recording harap melanjutkan ke tes berikutnya</span></p> -->

            
            <form method="POST" action="{{ route('execute.python') }}">
                @csrf
                <button type="submit" class="testButton" style="margin-bottom: 20px;">Mulai Tes</button>
            </form>


            <!-- <a href="{{ route('get-data') }}" class="special-link-button">
                <button id="nextButton" class="testButton" style="margin-bottom: 20px;" disabled >Lanjut ke tes berikutnya</button>
            </a> -->

            



        </div>
    </div>
    <script>
        // JavaScript code in your HTML or a separate script file
        document.getElementById('executeButton').addEventListener('click', function () {
            fetch('/execute-python', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token if your application uses CSRF protection
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Process the response data as needed
            })
            .catch(error => console.error('Error:', error));
        });

    </script>
</html>

