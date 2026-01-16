<!DOCTYPE html>
<html>
<head>
<title>Laporan Indikator Bermasalah</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
body{
    font-family:Poppins;
    background:linear-gradient(120deg,#e3f2fd,#f8fbff);
    padding:40px;
}

.container{
    max-width:1100px;
    margin:auto;
}

.card{
    background:white;
    padding:30px;
    border-radius:22px;
    box-shadow:0 18px 35px rgba(0,0,0,.1);
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.header h2{
    color:#0d47a1;
    margin:0;
}

.sub{
    color:#607d8b;
    font-size:14px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
}

th{
    background:#1565c0;
    color:white;
    padding:14px;
    text-align:left;
    border-radius:10px 10px 0 0;
}

td{
    padding:14px;
    border-bottom:1px solid #eee;
    vertical-align:top;
}

tr:hover{
    background:#f1f7ff;
}

.badge{
    padding:6px 14px;
    border-radius:20px;
    font-weight:600;
    font-size:13px;
    display:inline-block;
}

.badge-a{background:#c8e6c9;color:#256029}
.badge-b{background:#fff9c4;color:#8d6e00}
.badge-c{background:#ffe0b2;color:#bf360c}
.badge-d{background:#ffcdd2;color:#b71c1c}

.empty{
    text-align:center;
    padding:25px;
    color:#90a4ae;
    font-style:italic;
}
</style>
</head>

<body>

<div class="container">
<div class="card">

    <div class="header">
        <div>
            <h2>📌 Indikator yang Perlu Perbaikan</h2>
            <div class="sub">Menampilkan indikator dengan nilai di bawah standar (A)</div>
        </div>
    </div>

    <table>
        <tr>
            <th width="25%">Komponen</th>
            <th>Indikator</th>
            <th width="15%">Nilai</th>
        </tr>

        @forelse($data as $d)
        <tr>
            <td><b>{{ $d->komponen }}</b></td>
            <td>{{ $d->indikator }}</td>
            <td>
                <span class="badge badge-{{ strtolower($d->jawaban) }}">
                    {{ $d->jawaban }}
                </span>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="empty">
                🎉 Semua indikator sudah bernilai A – Tidak ada yang perlu perbaikan
            </td>
        </tr>
        @endforelse

    </table>

</div>
</div>

</body>
</html>
