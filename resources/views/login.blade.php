<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

        body {
            margin: 0;
            color: #6a6f8c;
            background: #ffff;
            font-family: 'Montserrat', sans-serif; /* Use the custom font */
            font-weight: 400; /* Default font weight */
            font-size: 16px;
            line-height: 18px;
            /* background */
            /* background-image: url('assets/img/background.jpg'); Replace with the path to your background image */
            background:#ffff;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        
        *,:after,:before{box-sizing:border-box}
        .clearfix:after,.clearfix:before{content:'';display:table}
        .clearfix:after{clear:both;display:block}
        a{color:inherit;text-decoration:none}

        .login-wrap{
            width:100%;
            height: 100%;
            align-self:center;
            max-width:525px;
            min-height:670px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background:url('assets/img/loginformbg.jpg'); no-repeat center;
            /* background:#ffff; */
            background-size: cover;
            box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
            border-radius:15px;
        }
        .login-html{
            width:100%;
            height:100%;
            position:absolute;
            padding:90px 70px 50px 70px;
            background: rgba(15, 51, 255, 0.4); /* Background color with opacity */
            border-radius:15px;
        }
        .login-html .sign-in-htm,
        .login-html .sign-up-htm{
            top:0;
            left:0;
            right:0;
            bottom:0;
            position:absolute;
            transform:rotateY(180deg);
            backface-visibility:hidden;
            transition:all .4s linear;
        }
        .login-html .sign-in,
        .login-html .sign-up,
        .login-form .group .check{
            display:none;
        }
        .login-html .tab,
        .login-form .group .label,
        .login-form .group .button{
            text-transform:uppercase;
        }
        .login-html .tab{
            font-size:22px;
            margin-right:15px;
            padding-bottom:5px;
            margin:0 15px 10px 0;
            display:inline-block;
            border-bottom:2px solid transparent;
        }
        .login-html .sign-in:checked + .tab,
        .login-html .sign-up:checked + .tab{
            color:#fff;
            border-color:#1161ee;
        }
        .login-form{
            min-height:345px;
            position:relative;
            perspective:1000px;
            transform-style:preserve-3d;
        }
        .login-form .group{
            margin-bottom:15px;
        }
        .login-form .group .label,
        .login-form .group .input,
        .login-form .group .button{
            width:100%;
            color:#fff;
            display:block;
        }
        .login-form .group .input,
        .login-form .group .button{
            border:none;
            padding:15px 20px;
            border-radius:25px;
            background:rgba(255,255,255,.1);
        }
        .login-form .group input[data-type="password"]{
            text-security:circle;
            -webkit-text-security:circle;
        }
        .login-form .group .label{
            color:#ffff;
            font-size:12px;
        }
        .login-form .group .button {
            background: #1161ee;
            border: 0.5px solid #ffff; /* Border color */
            box-shadow: 0 3px 6px rgba(15, 51, 255, 0.2); /* Box shadow */
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s; /* Add transitions for smooth effects */
        }
        .login-form .group label .icon{
            width:15px;
            height:15px;
            border-radius:2px;
            position:relative;
            display:inline-block;
            background:rgba(255,255,255,.1);
        }
        .login-form .group label .icon:before,
        .login-form .group label .icon:after{
            content:'';
            width:10px;
            height:2px;
            background:#fff;
            position:absolute;
            transition:all .2s ease-in-out 0s;
        }
        .login-form .group label .icon:before{
            left:3px;
            width:5px;
            bottom:6px;
            transform:scale(0) rotate(0);
        }
        .login-form .group label .icon:after{
            top:6px;
            right:0;
            transform:scale(0) rotate(0);
        }
        .login-form .group .check:checked + label{
            color:#fff;
        }
        .login-form .group .check:checked + label .icon{
            background:#1161ee;
        }
        .login-form .group .check:checked + label .icon:before{
            transform:scale(1) rotate(45deg);
        }
        .login-form .group .check:checked + label .icon:after{
            transform:scale(1) rotate(-45deg);
        }
        .login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
            transform:rotate(0);
        }
        .login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
            transform:rotate(0);
        }

        .hr{
            height:2px;
            margin:60px 0 50px 0;
            background:rgba(255,255,255,.2);
        }
        .foot-lnk{
            text-align:center;
        }

        .input::placeholder {
            color: #A7b7bd; /* Change to the color you want */
        }
        option {
            font-weight: normal;
            display: block;
            white-space-collapse: collapse;
            text-wrap: nowrap;
            min-height: 1.2em;
            padding: 0px 2px 1px;
            color: #0c0c0c;
        }
    </style>
</head>
<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form id="SignInID" action="{{ route('postSignIn') }}" method="POST">
                        @csrf
                        <br>
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input iid="loginUsername" type="text" class="input" name="username" placeholder="Enter username">
                        </div>
                        <br>
                        <!-- <div class="form-group">
                            <label for="loginUsername">Username</label>
                            <input type="text" class="form-control" id="loginUsername" name="username" placeholder="Enter username">
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password">
                        </div> -->
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="loginPassword" type="password" class="input" data-type="password" name="password" placeholder="Password">
                        </div>
                        <br>
                        <!-- <button type="submit" class="btn btn-primary">Login</button> -->
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                    </form>
                </div>
                <div class="sign-up-htm">
                    <form action="{{ route('postSignUp') }}" method="POST">
                        @csrf
                        <br>
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input iid="Username" type="text" class="input" name="username" placeholder="Enter username">
                        </div>
                        <br>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="Password" type="password" class="input" data-type="password" name="password" placeholder="Password">
                        </div>
                        <div class="group">
                            <label for="namaLengkap" class="label">Nama Lengkap</label>
                            <input id="namaLengkap" type="text" class="input" name="namaLengkap" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="group">
                            <label for="jenisKelamin" class="label">Jenis Kelamin</label>
                            <select id="jenisKelamin" class="input" name="jenisKelamin">
                                <option value="lakiLaki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="group">
                            <label for="usia" class="label">Usia</label>
                            <input id="usia" type="number" class="input" name="usia" placeholder="Masukkan Usia">
                        </div>
                        <div class="group">
                            <label for="pendidikanTerakhir" class="label">Pendidikan Terakhir</label>
                            <!-- <input id="pendidikanTerakhir" type="text" class="input" name="pendidikanTerakhir" placeholder="Masukkan Pendidikan Terakhir"> -->
                            <select id="pendidikanTerakhir" class="input" name="pendidikanTerakhir">
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="S1">S1</option>
                                <option value="S1">S2</option>
                                <option value="S1">S3</option>
                            </select>
                        </div>
                        <br>
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS and jQuery (required for Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    <!-- Your additional JavaScript for form functionality -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#SignInID').submit(function (event) {
                event.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('postSignIn') }}',
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response.success) {
                            window.location.href = response.redirect;
                        } else {
                            alert('User tidak ditemukan, mohon sign in lagi');
                        }
                    },
                    error: function () {
                        alert('An error occurred during sign-in.');
                    }
                });
            });
        });
    </script>
</body>