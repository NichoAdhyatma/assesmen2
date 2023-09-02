<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consent Page</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Font Styles -->
    <style>
        /* Customize the carousel control icons color */
        /* .carousel-control-prev-icon{
            background-image: url('assets/img/prev-icon.png');
            background-color: transparent;
            background-size: cover;
            width: 24px; =
            height: 24px;
        }
        .carousel-control-next-icon {
            background-image: url('assets/img/next-icon.png'); 
            background-color: transparent;
            background-size: cover;
            width: 24px; 
            height: 24px;
        } */
        .image-container img {
            height: 60%; /* Set the maximum height to 60% of the container height */
            display: flex; /* Ensure the image is displayed as a block element */
            margin-bottom: 25px; /* Center the image horizontally */
        }
        
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">

                <img src="assets/img/about-visual1.png" alt="Image" class="img-fluid mb-4"> <!-- Replace with your image URL and adjust classes as needed -->

                <h1>Informed Consent</h1>
                <h1>Teleassesment</h1>
                <br>
                <p>Akan dilakukan 3 jenis tes, beserta tes validasi secara tertulis</p>
                <p>1. Test Interview</p>
                <p>2. Test Validasi Kepribadian</p>
                <p>3. Test Cognitive</p>
                <p>4. Test Validasi Untuk Memastikan Hasil Tele Assesment</p>
                <!-- <div id="carouselExample" class="carousel slide" data-ride="carousel" style="width:50%;height:400px">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="image-container">
                                <img src="assets/img/logo-ubaya-header.png" class="d-block w-100" alt="Test Interview" >
                            </div>
                            <div class="carousel-caption">
                                <h5 style="color: black;">Test Interview</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="image-container">
                                <img src="assets/img/logo-maxy-header.png" class="d-block w-100" alt="Test Validasi Kepribadian">
                            </div>
                            <div class="carousel-caption">
                                <h5 style="color: black;">Test Validasi Kepribadian</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="image-container">
                                <img src="assets/img/logo-kemendikbud-header.png" class="d-block w-100" alt="Test Cognitive">
                            </div>
                            <div class="carousel-caption">
                                <h5 style="color: black;">Test Cognitive</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="image-container">
                                <img src="assets/img/kedaireka-logo-header.png" class="d-block w-100" alt="Test Validasi Untuk Memastikan Hasil Tele Assesment">
                            </div>
                            <div class="carousel-caption">
                                <h5 style="color: black;">Test Validasi Tele Assesment</h5>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div> -->
                
                <br>
                <p>Pada tes interaktif ini, akan dilakukan perekaman sekaligus penyimpanan video dan suara dari subjek</p>
                <p>Dengan mengikuti tes ini, subjek menyetujui untuk:</p>
                
                <div>
                <!-- First Form -->
                    <form>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="consentCheckbox1">
                            <label class="form-check-label" for="consentCheckbox1">Video & raut muka saya digunakan untuk kebutuhan analisa.</label>
                            
                        </div>
                    </form>
                    
                    <!-- Second Form -->
                    <form>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="consentCheckbox2">
                            <label class="form-check-label" for="consentCheckbox2">Suara saya direkam dan digunakan untuk kebutuhan analisa.</label>
                            
                        </div>
                    </form>

                    <!-- Third Form -->
                    <form>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="consentCheckbox2">
                            <label class="form-check-label" for="consentCheckbox2">Mengikuti ketiga tes dan tes validasi secara keseluruhan.</label>
                            
                        </div>
                    </form>
                </div>
                <div class="alert-text" id="alertText" style="display: none; background-color: red; color: white; padding: 5px; text-align: center;">
                    <i class="fas fa-exclamation-circle"></i> Mohon untuk mencentang semua kotak sebelum melanjutkan.
                </div>
                <a href="{{ route('test') }}" class="btn btn-primary mt-3 disabled" id="continueButton">Lanjut</a>       
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS and jQuery (required for Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <!-- Enable the Continue button only when the checkbox is checked -->
    <script>
        $(document).ready(function () {
            var checkboxes = $('.form-check-input'); // Select all checkboxes
            var continueButton = $('#continueButton'); // Select the Continue button

            // Disable the button on page load
            continueButton.addClass('disabled');

            checkboxes.on('change', function () {
                var allChecked = checkboxes.toArray().every(function (checkbox) {
                    return $(checkbox).prop('checked');
                });
                continueButton.toggleClass('disabled', !allChecked);
                
                // Log the values of all checkboxes to the console
                var checkboxValues = checkboxes.toArray().map(function (checkbox) {
                    return $(checkbox).prop('checked');
                });
                console.log("Checkbox values:", checkboxValues);
            });

            continueButton.on('click', function (event) {
                if (continueButton.hasClass('disabled')) {
                    event.preventDefault(); // Prevent following the link
                }
            });
        });
    </script>
    <script>
        const checkboxes = document.querySelectorAll('.form-check-input');
        const alertText = document.getElementById('alertText');
        const continueButton = document.getElementById('continueButton');
        
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const uncheckedCheckboxes = Array.from(checkboxes).filter(checkbox => !checkbox.checked);
                alertText.style.display = uncheckedCheckboxes.length > 0 ? 'block' : 'none';
                
                // Check if all checkboxes are checked to enable the Continue button
                const allChecked = uncheckedCheckboxes.length === 0;
                continueButton.classList.toggle('disabled', !allChecked);
            });
        });
    </script>
</body>
</html>