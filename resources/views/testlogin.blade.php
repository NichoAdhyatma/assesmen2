<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam Display</title>
    <style>
        #webcam {
        
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
</head>
<body>
    <video id="webcam" autoplay></video>

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
</body>
</html>