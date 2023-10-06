<!DOCTYPE html>
<html>

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
        <h1>Tes Interview 1</h1>
    </div>

    <div class="contact--lockup">
        <div id="video-container-" style="height:100%; width:100%; padding-top:150px">

        @php
            $videoDir = public_path('assets/video/Extraversion'); // Specify the path to your video folder.
            $videoFiles = glob($videoDir . '/*.mp4'); // Get all .mp4 files in the folder.

            if (count($videoFiles) > 0) {
                $randomVideo = basename($videoFiles[array_rand($videoFiles)]); // Select a random video file name.
            } else {
                $randomVideo = ''; // No videos found in the folder.
            }
        @endphp

        <video id="main-video" controls autoplay style="width: 100%; height: 65vh;">
            <source src="{{ asset('assets/video/Extraversion' . $randomVideo) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        
            <h1> Webcam Anda </h1>
            <p style="padding-top:20px">Mulai tes dengan menekan tombol start record, dan sudahi dengan menekan tombol stop recording.<br> Setelah menyelesaikan sesi recording harap menekan tombol process video</span></p>

            <div class="col-12 col-md-6">
                <video autoplay="true" id="your-video-id"  autoplay width="100%" height="300px">
                    Izinkan Penggunaan Kamera.
                </video>
            </div>
            
            <div class="col-12 col-md-6 ">
                <button onclick="startRecording()" id="startRecordButton">Start Record</button>
                <button id="stopRecordButton" disabled>Stop</button>
            </div>

            <a href="{{ route('testinterviewConscientiousness') }}" class="special-link-button">
                <button id="nextButton" class="testButton" disabled>Lanjut ke tes berikutnya</button>
            </a>

            <a href="{{ route('testinterviewConscientiousness') }}" class="special-link-button">
                <button id="skipButton" class="testButton">Skip</button>
            </a>
            <br>
            <button id="processVideoButton">Process Video</button>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    <script type="text/javascript">
        var recorder;
        var webcamVideoElement = document.getElementById('your-video-id'); // Video element for the webcam feed
        var mainVideoElement = document.getElementById('main-video'); // Main video element to play the video
        var startRecordButton = document.getElementById('startRecordButton');
        var stopRecordButton = document.getElementById('stopRecordButton');
        var nextButton = document.getElementById('nextButton');
        var skipButton = document.getElementById('skipButton');
        
        // console.log('eb' + personalityList[0]);
        var recordCounter = 0;
        // console.log("HALOOOOOO")
        function startRecording() {
            // Play the main video
            mainVideoElement.play();

            navigator.mediaDevices.getUserMedia({
                video: true,
                audio: true
            }).then(function (camera) {
                webcamVideoElement.srcObject = camera;

                // Recording configuration/hints/parameters
                var recordingHints = {
                    type: 'video',
                    mimeType: 'video/mp4',
                };

                // Initiating the recorder
                recorder = RecordRTC(camera, recordingHints);

                // Starting recording
                recorder.startRecording();

                // Enable the Stop Record button and disable Start Record button
                startRecordButton.disabled = true;
                stopRecordButton.disabled = false;
            });
        }

        stopRecordButton.addEventListener('click', function () {
            // Stopping the recorder
            recorder.stopRecording(function () {
                // Get recorded blob
                var blob = recorder.getBlob();

                // Create a FormData object to send the video file to the server
                var formData = new FormData();
                formData.append('recorded_video', blob, 'recorded-video.mp4');
                formData.append('recordCounter', recordCounter);
                // Send the recorded video to the Laravel backend
                console.log("Mulai");
                fetch('/save-recorded-video', {
                    method: 'POST',
                    body:  formData,
                    headers: {
                            // Set the CSRF token in the request header
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                })
                
                //.then(response => response.json())
                .then(data => {
                    console.log("BErhasil?"); // You can handle the response as needed
                })
                .catch(error => {
                    console.error('Error:', error);
                });


                // Open recorded blob in a new window
                //window.open(URL.createObjectURL(blob));
                console.log("YEEEE");

                // Release camera
                webcamVideoElement.srcObject = null;
                navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: true
                }).then(function (camera) {
                    camera.getTracks().forEach(function (track) {
                        track.stop();
                    });
                });

                // Preview recorded data on this page as well
                webcamVideoElement.src = URL.createObjectURL(blob);

                // Enable the Start Record button and disable Stop Record button
                startRecordButton.disabled = false;
                stopRecordButton.disabled = true;

                // Enable the Next button
                nextButton.disabled = false;
            });
        });

        // Enable the Start Record button when the video ends
        webcamVideoElement.addEventListener('ended', function () {
            startRecordButton.disabled = false;
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        // Declare a variable outside of the event listener to store the Python data
        var pythonData;

        document.addEventListener('DOMContentLoaded', function () {
            const processVideoButton = document.getElementById('processVideoButton');

            processVideoButton.addEventListener('click', function (event) {
                event.preventDefault();

                // Create an object to store session values
                var sessionValues = {};

                // Make an AJAX request to trigger video processing
                $.ajax({
                    type: "POST",
                    url: '/process-video',
                    data: {
                        numberData: 0
                    },
                    success: function (response) {
                        // Handle the response from the server
                        if (response && response.data) {
                            // Store the Python data in the variable declared outside of the event listener
                            pythonData = response.data;

                            // Display the data on the web page
                            console.log('Python Data:', pythonData);

                            var jsonData = JSON.parse(response.data);

                            // Iterate through the properties and add them to the sessionValues object
                            for (var key in jsonData) {
                                if (jsonData.hasOwnProperty(key)) {
                                    var sessionName = key + "Extraversion";
                                    var sessionValue = jsonData[key];

                                    // Store the value in the sessionValues object
                                    sessionValues[sessionName] = sessionValue;

                                    // Log the session data
                                    console.log("Appear?")
                                    console.log("Session? " + sessionName + ":", sessionValue);
                                }
                            }

                            // Make an AJAX request to set all session values at once
                            $.ajax({
                                type: "POST",
                                url: '/set-session-values',
                                data: sessionValues, // Send all session values in one go
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                
                                success: function (sessionResponse) {
                                    // Handle success response if needed
                                    console.log('Session values set successfully.');
                                },
                                error: function (xhr, status, error) {
                                    // Handle error response if needed
                                    console.error('Error setting session values:', error);
                                }
                            });

                            // You can update your HTML elements with the data
                            // Example: document.getElementById('result').textContent = pythonData.someValue;

                            // Now 'pythonData' is accessible outside the AJAX request
                            // You can use it in other parts of your JavaScript code
                        } else {
                            console.error('Invalid response from server');
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle errors (if needed)
                        console.error('Error:', error);
                    }
                });
            });

            // Declare and use additional JavaScript variables here
            var additionalVariable = 'This is an additional variable';
            console.log('Additional Variable:', additionalVariable);
            console.log('pythonData outside of the event listener:', pythonData);
        });

        // You can use 'pythonData' outside of the event listener as well
        console.log('pythonData outside of the event listener:', pythonData);


    </script>
</body>


<!-- <script type="text/javascript">
    function startrecord(){
      var tombol_stop      = $(".tombol_stop");
        navigator.mediaDevices.getUserMedia({
            video: true,
            audio: true
        }).then(function(camera) {

            // preview camera during recording
            // document.getElementById('your-video-id').muted = true;
            document.getElementById('your-video-id').srcObject = camera;

            // recording configuration/hints/parameters
            var recordingHints = {
                type: 'video',
                mimeType: 'video/webm',
            };

            // initiating the recorder
            var recorder = RecordRTC(camera, recordingHints);
            
            // starting recording here
            recorder.startRecording();
            //document.getElementById("text_record").innerHTML = " Sedang Merekam . . ."; 
            $('#RootNode').click(function(){
                //document.getElementById("text_record").innerHTML += "<br> Stop<br><b>Untuk upload video, tekan tombol 'Kirim Video' dibawah ini. Format yang digunakan adalah mp4, selain itu harap convert video terlebih dahulu <a style='background-color=#a0937d' href='https://cloudconvert.com/mkv-to-mp4' target='_blank'>disini</a></b>"; 
                recorder.stopRecording(function() {

                    // get recorded blob
                    var blob = recorder.getBlob();

                    // open recorded blob in a new window
                    window.open(URL.createObjectURL(blob));

                    // release camera
                    document.getElementById('your-video-id').srcObject = null;
                    camera.getTracks().forEach(function(track) {
                        track.stop();
                    });
                    
                    // you can preview recorded data on this page as well
                    document.getElementById('your-video-id').src = URL.createObjectURL(blob);
                });
                $('#modalvideo').modal('show')
            });
        });
    };
</script> -->

<script>
    // Get references to the video and button elements
    var video = document.querySelector('video');
    var startButton = document.getElementById('startButton');

    // Add an event listener to the video to enable the button when it ends
    video.addEventListener('ended', function() {
        startButton.disabled = false;
    });
</script>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
<!-- <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script> -->
<!-- Bootstrap JavaScript -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>

