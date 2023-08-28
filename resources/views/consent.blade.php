<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consent Page</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Styles -->
    <style>
        /* Define your styles here */
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Welcome to Our Platform</h2>
                <p>Pada tes interaktif ini, akan dilakukan perekaman sekaligus penyimpanan video & analisis dari subjek</p>
                <p>Dengan mengikuti tes ini, subjek menyetujui untuk:</p>
                
                <!-- First Form -->
                <form>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="consentCheckbox1">
                        <label class="form-check-label" for="consentCheckbox1">Saya setuju untuk video saya digunakan untuk kebutuhan analisa form 1.</label>
                    </div>
                </form>

                <!-- Second Form -->
                <form>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="consentCheckbox2">
                        <label class="form-check-label" for="consentCheckbox2">Saya setuju untuk video saya digunakan untuk kebutuhan analisa form 2.</label>
                    </div>
                </form>
                
                <a href="{{ route('login') }}" class="btn btn-primary mt-3 disabled" id="continueButton">Continue</a>       
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
</body>
</html>