<!DOCTYPE html>
<html>
<head>
    <title>Your View</title>
</head>
<body>
    <h1>Your Data</h1>
    @php
    $dataCount = count($data);
    @endphp

    <p>Total Rows: {{ $dataCount }}</p>
    <ul>
        @foreach($data as $row)
            <!-- <li>{{ $row['id_penilaian'] }}</li> -->
            <li>
                ID_user: {{ $row->id_user }}<br>
                ID_penilaian: {{ $row->id_penilaian }}<br>
                skor validasi kepribadianbakatminat:
                @php
                $adataArray = explode(',', $row->skor_validasi_kepribadianbakatminat);
                @endphp
                <ul>
                    @foreach($adataArray as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul> <br>
                Somethign = $adataArray[0]
            </li>
        @endforeach
    </ul>
</body>
</html>