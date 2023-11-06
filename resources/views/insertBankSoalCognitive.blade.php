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
    <h1> Bank Soal Cognitive</h1>
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
                <th>Jawaban Benar</th>

                <th>Kesulitan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->id_soal }}</td>
                    <td>{{ $question->pertanyaan }}</td>
                    <td>{{ $question->jawaban1 }}</td>
                    <td>{{ $question->jawaban2 }}</td>
                    <td>{{ $question->jawaban3 }}</td>
                    <td>{{ $question->jawaban4 }}</td>
                    <td>{{ $question->jawaban_benar }}</td>

                   
                    <td>{{ $question->kesulitan }}</td>
                    
                </tr>
            @endforeach
           
        </tbody>
    </table>
    <!-- <form method="GET" action="{{ route('get-data') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Get Data</button>
    </form> -->
    <br>
    <div class="tabs-container">
        <button class="tab-button" onclick="showTab(1)">Add Question</button>
        <button class="tab-button" onclick="showTab(2)">Add Questions From CSV</button>
        <button class="tab-button" onclick="showTab(3)">Delete Question</button>
    </div>
    <div id="tab-1" class="tab-content">
    <h1>Add Question</h1>
    <form class="form-container" method="POST" action="{{ route('store-question-cognitive') }}">
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
            <label for="answer2">Answer 2</label>
            <input type="text" id="answer2" name="answer2" class="form-control" value="Tidak Setuju">
        </div>

        <div class="form-group">
            <label for="answer3">Answer 3</label>
            <input type="text" id="answer3" name="answer3" class="form-control" value="Netral">
        </div>

        <div class="form-group">
            <label for="answer4">Answer 4</label>
            <input type="text" id="answer4" name="answer4" class="form-control" value="Setuju">
        </div>

        <div class="form-group">
            <label for="answer_correct">Answer Correct</label>
            <select id="answer_correct" name="answer_correct" class="form-control">
                <option value="0">Jawaban 1</option>
                <option value="1">Jawaban 2</option>
                <option value="2">Jawaban 3</option>
                <option value="3">Jawaban 4</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kesulitan">kesulitan</label>
            <select id="kesulitan" name="kesulitan" class="form-control">
                <option value="0">Mudah</option>
                <option value="1">Sedang</option>
                <option value="2">Susah</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Question</button>
    </form>
    </div>


    <div id="tab-2" class="tab-content">
    <h1>Add Questions From CSV</h1>
    <form class="form-container" action="{{ url('/upload-csv-cognitive') }}" method="POST" enctype="multipart/form-data">
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
    <form class="form-container" method="POST" action="{{ route('delete-question-cognitive') }}">
        @csrf
        @method('DELETE')

        <div class="form-group">
            <label for="question_id">Question ID to Delete</label>
            <input type="number" id="question_id" name="question_id" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </div>
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