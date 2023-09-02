<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <style>
        /* Add your CSS styles here to format the table */
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Style for the first column (headers on the side) */
        /* th.vertical-header {
            
            white-space: nowrap;
            width: 10px;
        } */
    </style>

</head>
<body>
    <h1>Hasil Tes Psikogram</h1>
    <table>
        <tr>
            <th>Nama</th>
            <td>John Doe</td>
        </tr>
        <tr>
            <th>Usia</th>
            <td>30</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>Laki-laki</td>
        </tr>
        <tr>
            <th>Pendidikan</th>
            <td>Sarjana</td>
        </tr>
        <tr>
            <th>Tanggal Pemeriksaan</th>
            <td>2023-09-02</td>
        </tr>
    </table>
    <table>
        <thead>
            <tr>
                <th>Hasil Facial Sentiment</th>
                <th class="vertical-header">Skor</th>
                <th class="vertical-header">Sentimen Negatif</th>
                <th class="vertical-header">Sentimen Netral</th>
                <th class="vertical-header">Sentimen Positif</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Row 1</th>
                <td>Data 1,1</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Row 2</th>
                <td>Data 2,1</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Row 3</th>
                <td>Data 3,1</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
<script>
    function randomSentiment(row) {
        var sentiments = ["Sentimen Negatif", "Sentimen Netral", "Sentimen Positif"];
        var randomIndex = Math.floor(Math.random() * sentiments.length);
        row.cells[randomIndex + 2].textContent = "X"; // Fill with "X"
    }

    window.onload = function() {
        var table = document.querySelector("table");
        var rows = table.getElementsByTagName("tr");

        for (var i = 1; i < rows.length; i++) {
            randomSentiment(rows[i]);
        }
    };
</script>
