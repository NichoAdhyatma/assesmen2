<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up / Login Page</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        @font-face {
            font-family: 'Montserrat';
            src: url("fonts/Montserrat-Black.eot");
            src: local("☺"), url("fonts/Montserrat-Black.woff") format("woff"), url("fonts/Montserrat-Black.ttf") format("truetype"), url("fonts/Montserrat-Black.svg") format("svg");
            font-weight: 900;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url("fonts/Montserrat-Bold.eot");
            src: local("☺"), url("fonts/Montserrat-Bold.woff") format("woff"), url("fonts/Montserrat-Bold.ttf") format("truetype"), url("fonts/Montserrat-Bold.svg") format("svg");
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url("fonts/Montserrat-Regular.eot");
            src: local("☺"), url("fonts/Montserrat-Regular.woff") format("woff"), url("fonts/Montserrat-Regular.ttf") format("truetype"), url("fonts/Montserrat-Regular.svg") format("svg");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url("fonts/Montserrat-Light.eot");
            src: local("☺"), url("fonts/Montserrat-Light.woff") format("woff"), url("fonts/Montserrat-Light.ttf") format("truetype"), url("fonts/Montserrat-Light.svg") format("svg");
            font-weight: 300;
            font-style: normal;
        }

        .nav-tabs .nav-link.active, .nav-tabs .nav-link:hover {
            background-color: #0f33ff;
            border-color: #0f33ff;
            color: #ffffff; /* Text color */
        }

        .btn-primary {
            background-color: #0f33ff;
            border-color: #0f33ff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="mb-4">Welcome!</h2>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#signup" data-toggle="tab">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#login" data-toggle="tab">Login</a>
                    </li>
                </ul>
                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="signup">
                        <form action="{{ route('consent') }}" method="GET">
                            <div class="form-group">
                                <label for="signupUsername">Username</label>
                                <input type="text" class="form-control" id="signupUsername" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="signupPassword">Password</label>
                                <input type="password" class="form-control" id="signupPassword" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="login">
                        <form>
                            <div class="form-group">
                                <label for="loginUsername">Username</label>
                                <input type="text" class="form-control" id="loginUsername" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input type="password" class="form-control" id="loginPassword" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Link to Bootstrap JS and jQuery (required for Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>