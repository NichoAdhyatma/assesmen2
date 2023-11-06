<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        /* Table Related */
        #questions-table {
            width: 100%;
            /* border-collapse: collapse; */
        }

        /* #questions-table th, #questions-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }*/

        #questions-table th {
            background-color: #f2f2f2;
            margin-top: 20px;
        }

        /* #questions-table tr:nth-child(even) {
            background-color: #f2f2f2;
        } */

        /* #questions-table tr:nth-child(odd) {
            background-color: #fff;
        } */
        #questions-table tr:hover {
            background-color: #d3d3d3;
        } 
        /* #questions-table th, #questions-table td {
            border: 2px solid #ccc;
        } */
        /* #questions-table th, #questions-table td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        } */
        @media screen and (max-width: 1100px) {
            #questions-table {
                display: block;
                overflow-x: auto;
            }
        }

        /* Form CSS */

        .form-container {
            max-width: 500px;
        }

        /* Form group styling */
        .form-group {
            margin-bottom: 15px;
        }

        /* Label styling */
        label {
            display: block;
            font-weight: bold;
        }

        /* Input and textarea styling */
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Button styling */
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Success and error message styling */
        .alert {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #28a745;
            color: #fff;
        }

        .alert-danger {
            background-color: #dc3545;
            color: #fff;
        }

        /* File input styling */
        #csv_file {
            display: none;
        }

        .custom-file-upload {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /*Untuk Tab */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .tab-button {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1> Bank Soal Kepribadian, Bakat, &  Minat</h1>
    <!-- <div class="dataTables_filter">
        <label for="search">Search: </label>
        <input type="search" class="form-control" id="search" placeholder="Search...">
    </div> -->
    <table id="questions-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Jawaban 1</th>
                <th>Jawaban 2</th>
                <th>Jawaban 3</th>
                <th>Jawaban 4</th>
                <th>Jawaban 5</th>

                <th>Value 1</th>
                <th>Value 2</th>
                <th>Value 3</th>
                <th>Value 4</th>
                <th>Value 5</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->id_Soal }}</td>
                    <td>{{ $question->pertanyaan }}</td>
                    <td>{{ $question->jawaban1 }}</td>
                    <td>{{ $question->jawaban2 }}</td>
                    <td>{{ $question->jawaban3 }}</td>
                    <td>{{ $question->jawaban4 }}</td>
                    <td>{{ $question->jawaban5 }}</td>

                   
                    <td>{{ $question->value1 }}</td>
                    <td>{{ $question->value2 }}</td>
                    <td>{{ $question->value3 }}</td>
                    <td>{{ $question->value4 }}</td>
                    <td>{{ $question->value5 }}</td>

                    <td>{{ $question->tipe }}</td>
                </tr>
            @endforeach
           
        </tbody>
    </table>
    <br>
    <form action="/generate-csv" method="GET">
        <button type="submit">Generate CSV</button>
    </form>
    <br>
    <form method="GET" action="{{ route('get-data') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Get Data</button>
    </form>
    <br>
    <div class="tabs-container">
        <button class="tab-button" onclick="showTab(1)">Add Question</button>
        <button class="tab-button" onclick="showTab(2)">Add Questions From CSV</button>
        <button class="tab-button" onclick="showTab(3)">Delete Question</button>
    </div>
    <div id="tab-1" class="tab-content">
    <h1>Add Question</h1>
    <form class="form-container" method="POST" action="{{ route('store-question') }}">
        @csrf
        <div class="form-group">
            <label for="pertanyaan">Pertanyaan</label>
            <textarea id="pertanyaan" name="pertanyaan" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="answer1">Answer 1</label>
            <input type="text" id="answer1" name="answer1" class="form-control" value="Sangat Tidak Setuju">
        </div>
        <div class="form-group">
            <label for="value1">Value 1</label>
            <input type="number" id="value1" name="value1" class="form-control" value="1">
        </div>

        <div class="form-group">
            <label for="answer2">Answer 2</label>
            <input type="text" id="answer2" name="answer2" class="form-control" value="Tidak Setuju">
        </div>
        <div class="form-group">
            <label for="value2">Value 2</label>
            <input type="number" id="value2" name="value2" class="form-control" value="2">
        </div>

        <div class="form-group">
            <label for="answer3">Answer 3</label>
            <input type="text" id="answer3" name="answer3" class="form-control" value="Netral">
        </div>
        <div class="form-group">
            <label for="value3">Value 3</label>
            <input type="number" id="value3" name="value3" class="form-control" value="3">
        </div>

        <div class="form-group">
            <label for="answer4">Answer 4</label>
            <input type="text" id="answer4" name="answer4" class="form-control" value="Setuju">
        </div>
        <div class="form-group">
            <label for="value4">Value 4</label>
            <input type="number" id="value4" name="value4" class="form-control" value="4">
        </div>

        <div class="form-group">
            <label for="answer5">Answer 5</label>
            <input type="text" id="answer5" name="answer5" class="form-control" value="Sangat Setuju">
        </div>
        <div class="form-group">
            <label for="value5">Value 5</label>
            <input type="number" id="value5" name="value5" class="form-control" value="5">
        </div>


        <div class="form-group">
            <label for="tipe">Tipe</label>
            <select id="tipe" name="tipe" class="form-control" required>
                <optgroup label="Kepribadian">
                    <option value="Extraversion">Extraversion</option>
                    <option value="Conscientiousness">Conscientiousness</option>
                    <option value="Agreeableness">Agreeableness</option>
                    <option value="Openness">Openness</option>
                    <option value="Neuroticism">Neuroticism</option>
                </optgroup>

                <optgroup label="Minat">
                    <option value="Realistic">Realistic</option>
                    <option value="Investigative">Investigative</option>
                    <option value="Artistic">Artistic</option>
                    <option value="Social">Social</option>
                    <option value="Enterprising">Enterprising</option>
                    <option value="Conventional">Conventional</option>
                </optgroup>

                <optgroup label="Bakat">
                    <option value="Perseptual">Perseptual</option>
                    <option value="Psikomotor">Psikomotor</option>
                    <option value="Intelektual">Intelektual</option>
                </optgroup>
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Create Question</button>
    </form>
    </div>


    <div id="tab-2" class="tab-content">
    <h1>Add Questions From CSV</h1>
    <form class="form-container" action="{{ url('/upload-csv') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="csv_file" class="custom-file-upload">
                <i class="fas fa-plus"></i> Choose a CSV file
            </label>
            <label>
                <!-- Add this <span> to display the selected file name -->
                <span id="file-name"></span>
            </label>
            <input type="file" name="csv_file" id="csv_file" onchange="displayFileName(this)">
        </div>
        <button type="submit" class="btn btn-primary">Upload and Import</button>
    </form>
    <br>
    </div>

    <div id="tab-3" class="tab-content">
    <h1>Delete Question</h1>
    <form class="form-container" method="POST" action="{{ route('delete-question') }}">
        @csrf
        @method('DELETE')

        <div class="form-group">
            <label for="question_id">Question ID to Delete</label>
            <input type="number" id="question_id" name="question_id" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </div>

    <br>
    <button id="signInButton">Sign In</button>
    <form id="filterForm">
        @csrf
        <input type="text" id="filterString" name="filterString" placeholder="Enter filter string">
        <button id="filterButton" type="button">Filter Audio</button>
        <button id="getRecordingDataButton" type="button">Get Recording Data</button>
    </form>

    <button id="uploadButton">Upload Audio</button>
</body>
<script>
    $(document).ready(function() {
        $('#questions-table').DataTable();
    });
</script>
<script>
    function displayFileName(input) {
        const fileName = input.files[0].name;
        document.getElementById("file-name").textContent = `Selected file: ${fileName}`;
    }
    function showTab(tabIndex) {
        // Hide all tab contents
        const tabContents = document.querySelectorAll(".tab-content");
        for (const content of tabContents) {
            content.classList.remove("active");
        }

        // Show the selected tab content
        const selectedTab = document.getElementById(`tab-${tabIndex}`);
        selectedTab.classList.add("active");
    }
</script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    // Attach a click event handler to the button.
    document.getElementById('signInButton').addEventListener('click', function () {
        // Make an AJAX request to the API route using POST.
        fetch("{{ route('apiName/signin') }}", {
            method: 'GET',  // Change to POST
            // headers: {
            //     'X-CSRF-TOKEN': "{{ csrf_token() }}", // Include the CSRF token for security.
            // },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // You can include your form data here if needed.
            // body: new FormData(yourFormElement)
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response data here.
            console.log(data);
        })
        .catch(error => {
            // Handle errors here.
            console.error(error);
        });
    });
</script>
<script>
    document.getElementById('filterButton').addEventListener('click', function () {
        // Get the filter string from the input field
        const filterString = document.getElementById('filterString').value;

        // Make an AJAX request to the route that triggers signInAndFilterAudio.
        fetch("{{ route('filter-audio') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ filterString: filterString }), // Send the filter string in the request body
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response data here.
            console.log(data);
        })
        .catch(error => {
            // Handle errors here.
            console.error(error);
        });
    });
</script>
<script>
    document.getElementById('uploadButton').addEventListener('click', function () {
        // Make an AJAX request to the route that triggers addAudio.
        fetch("{{ route('upload-audio') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response data here.
            console.log(data);
        })
        .catch(error => {
            // Handle errors here.
            console.error(error);
        });
    });
</script>
<script>
    document.getElementById('getRecordingDataButton').addEventListener('click', function () {
        // Get the filter string from the input field
        const filterString = document.getElementById('filterString').value;

        // Make an AJAX request to the route that triggers getRecordingData.
        fetch("{{ route('get-audio') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ filterString: filterString }), // Send the filter string in the request body
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response data here.
            console.log(data);
        })
        .catch(error => {
            // Handle errors here.
            console.error(error);
        });
    });
</script>