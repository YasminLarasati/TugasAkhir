<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin - Sistem Akreditasi</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<style>
body{
    margin:0;
    font-family:'Poppins',sans-serif;
    background:#eef3f8;
}
.sidebar{
    width:230px;
    height:100vh;
    background:#458CCC;
    position:fixed;
    padding:25px;
    color:white;
}
.sidebar h1{text-align:center;margin-bottom:30px;}
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
.logout:hover{background:#bb2d3b;}

.content{margin-left:260px;padding:30px;}
.header{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
    margin-bottom:25px;
}
.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(230px,1fr));
    gap:20px;
}
.card{
    background:white;
    border-radius:18px;
    padding:25px;
    text-align:center;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
    transition:.3s;
}
.card:hover{transform:translateY(-7px);}
.card h3{color:#0d6efd;}
</style>
</head>
<body>

<div class="sidebar">
    <h1>AKREDITASI</h1>
    <a href="/akreditasi/admin/komponen">Input Komponen</a>
    <a href="/akreditasi/admin/komponen">Input Indikator</a>
    <a href="/akreditasi/login" class="logout">Logout</a>
</div>

<div class="content">

    <div class="header">
        <h2>Dashboard Admin</h2>
        <p>Selamat Datang, <b>{{ auth()->user()->name }}</b></p>
    </div>

    <div class="cards">
        <div class="card">
            <h3>Komponen Kriteria</h3>
            <p>Kelola komponen penilaian akreditasi</p>
        </div>
        <div class="card">
            <h3>Indikator</h3>
            <p>Kelola indikator setiap komponen</p>
        </div>
        
        
    </div>

</div>
</body>
</html>
