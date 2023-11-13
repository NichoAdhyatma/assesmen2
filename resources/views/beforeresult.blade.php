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
        .testButton {
            background-color: #0f33ff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 20px;
            width: 20%;
            height: 60px;
            color: #ffff;
            border-color: #ffff;
            margin-top: 20px
        }
    </style>
</head>
<body>
    
    @foreach ($data->reverse() as $item)
    <a href="{{ route('resultID', ['itemId' => $item->id_penilaian]) }}" style="text-decoration: none;color: black;"">
        <div class="card">
            <div class="card-header">
                Psikogram {{ Carbon\Carbon::parse($item->tanggal_penilaian)->isoFormat('D MMMM , YYYY') }}
            </div>
            <div class="card-description">Psikogram tanggal: {{ $item->tanggal_penilaian }}, Dengan ID:  {{$item->id_penilaian}}</div>
        </div>
    </a>
    @endforeach

    <form method="get" action="{{ route('logout') }}">
        @csrf <!-- Include a CSRF token for security -->
        <button type="submit" class="testButton" style="margin-bottom: 20px;margin-left: 20px;">Logout</button>
    </form>

</body>
</html>

