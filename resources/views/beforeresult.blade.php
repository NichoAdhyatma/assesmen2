<!DOCTYPE html>
<html lang="en">
    
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Example</title>
    <style>
        /* Add some basic CSS for styling the card */
        .card {
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-size: 24px;
            font-weight: bold;
        }

        .card-description {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    @foreach ($data->reverse() as $item)
    <a href="{{ route('resultID', ['itemId' => $item->id_penilaian]) }}" style="text-decoration: none;color: black;"">
        <div class="card">
            <div class="card-header">
                Psikogram {{ Carbon\Carbon::parse($item->header)->isoFormat('MMMM D, YYYY') }}
            </div>
            <div class="card-description">Psikogram tanggal: {{ $item->tanggal_penilaian }}, Dengan ID:  {{$item->id_penilaian}}</div>
        </div>
    </a>
    @endforeach
</body>
</html>

