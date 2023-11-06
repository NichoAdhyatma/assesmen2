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
    <h1> Bank Soal Live Cognitive Quiz</h1>
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
                <th>Tipe</th>
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
                    <td>{{ $question->tipe}}</td>
                </tr>
            @endforeach
           
        </tbody>
    </table>
</body>
<script>
    $(document).ready(function() {
        $('#questions-table').DataTable();
    });
</script>