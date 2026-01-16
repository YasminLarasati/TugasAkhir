<!DOCTYPE html>
<html>
<head>
<title>Rekap Nilai Akreditasi</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<style>
body{
    font-family:Poppins;
    background:#eef3f8;
    padding:40px;
}
.card{
    max-width:600px;
    margin:auto;
    background:white;
    padding:35px;
    border-radius:20px;
    box-shadow:0 15px 30px rgba(0,0,0,.1);
    text-align:center;
}
h2{color:#0d47a1;margin-bottom:15px}
.score{
    font-size:55px;
    color:#1e88e5;
    font-weight:600;
    margin:20px 0;
}
.badge{
    display:inline-block;
    padding:8px 22px;
    border-radius:30px;
    font-weight:500;
    color:white;
}
.unggul{background:#2e7d32}
.baik{background:#1976d2}
.cukup{background:#f9a825}
.kurang{background:#c62828}
</style>
</head>
<body>

<div class="card">
    <h2>📊 Rekap Nilai Akreditasi</h2>

    <div class="score">{{ number_format($total,2) }}</div>

    @php
        if($total >= 90)      $predikat = ['Unggul','unggul'];
        elseif($total >= 75) $predikat = ['Baik','baik'];
        elseif($total >= 60) $predikat = ['Cukup','cukup'];
        else                 $predikat = ['Kurang','kurang'];
    @endphp

    <div class="badge {{ $predikat[1] }}">
        {{ $predikat[0] }}
    </div>

    <hr style="margin:30px 0">

    <h3 style="color:#0d47a1">📑 Nilai Per Komponen</h3>

        <table style="width:100%;margin-top:15px;border-collapse:collapse">
        <tr style="background:#1e88e5;color:white">
            <th style="padding:10px">Komponen</th>
            <th>Bobot</th>
            <th>Nilai</th>
    </tr>

    @foreach($detail as $d)
    <tr style="text-align:center">
        <td style="padding:10px">{{ $d['nama'] }}</td>
        <td>{{ $d['bobot'] }}</td>
        <td><b>{{ $d['skor'] }}</b></td>
    </tr>
    @endforeach
    </table>
</div>

</body>
</html>
