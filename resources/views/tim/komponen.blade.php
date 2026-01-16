<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Penilaian Akreditasi</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
body{margin:0;font-family:Poppins;background:#eef3f8}

/* Sidebar */
.sidebar{
    width:230px;
    height:100vh;
    background:#458CCC;
    position:fixed;
    padding:25px;
    color:white;
}
.sidebar h2{text-align:center;margin-bottom:30px;}
.sidebar a{
    display:block;
    padding:12px;
    margin-bottom:10px;
    color:white;
    text-decoration:none;
    border-radius:10px;
}
.sidebar a:hover{background:#084298;}
.logout{background:#dc3545;}
.logout:hover{background:#bb2d3b}

/* Content */
.content{margin-left:260px;padding:40px}
h2{color:#0d47a1;margin-bottom:25px}
h1{color:#ffffff;margin-bottom:25px}

/* Card Komponen */
.card{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0 15px 30px rgba(0,0,0,.08);
    margin-bottom:20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.card:hover{
    transform:translateY(-3px);
    transition:.25s;
    box-shadow:0 18px 35px rgba(0,0,0,.12);
}
.badge{
    background:#e3f2fd;
    color:#1565c0;
    padding:6px 14px;
    border-radius:20px;
    font-weight:500;
}
.btn{
    background:linear-gradient(135deg,#42a5f5,#1e88e5);
    color:white;
    padding:10px 22px;
    border-radius:25px;
    text-decoration:none;
    font-weight:500;
}
.btn:hover{background:linear-gradient(135deg,#1e88e5,#1565c0)}
</style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h1 style="text-align: center;">AKREDITASI</h1>
    <a href="/akreditasi/tim/rekap">Rekap Nilai</a>
    <a href="/akreditasi/tim/laporan">Indikator Kurang</a>
    <a href="/akreditasi/login" class="logout">Logout</a>
</div>

<!-- CONTENT -->
<div class="content">
<h2>📘 Daftar Komponen Akreditasi</h2>

@foreach($komponen as $k)
<div class="card">
    <div>
        <b>{{ $k->nama }}</b><br>
        <span class="badge">Bobot {{ $k->bobot }}</span>
    </div>
    <a href="/akreditasi/tim/indikator/{{ $k->id }}/1" class="btn">Isi Nilai</a>
</div>
@endforeach
</div>

</body>
</html>
