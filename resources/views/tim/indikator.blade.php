<!DOCTYPE html>
<html>
<head>
<title>Penilaian Indikator</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
body{font-family:Poppins;background:#f4f9ff;padding:40px}
.card{background:white;padding:30px;border-radius:20px;box-shadow:0 10px 25px rgba(0,0,0,.1);max-width:900px;margin:auto}
.indikator{padding:15px;border-bottom:1px solid #eee}
.opsi label{display:block;padding:6px 0;cursor:pointer}
button{background:#1e88e5;color:white;border:none;padding:12px 25px;border-radius:25px;margin-top:15px}
</style>
</head>
<body>

<div class="card">
<h3>📝 Penilaian Indikator</h3>

@if(session('success'))
<div style="background:#e3f2fd;padding:10px;border-radius:10px;color:#0d47a1">
    {{ session('success') }}
</div>
@endif

<form method="POST" action="/akreditasi/tim/penilaian/simpan">
@csrf
<input type="hidden" name="komponen_id" value="{{ $komponen->id }}">

@foreach($indikator as $i)
<div class="indikator">
<b>{{ $loop->iteration }}. {{ $i->indikator }}</b>

<div class="opsi">
<label><input type="radio" name="jawaban[{{ $i->id }}]" value="A"> A. {{ $i->opsi_a }}</label>
<label><input type="radio" name="jawaban[{{ $i->id }}]" value="B"> B. {{ $i->opsi_b }}</label>
<label><input type="radio" name="jawaban[{{ $i->id }}]" value="C"> C. {{ $i->opsi_c }}</label>
<label><input type="radio" name="jawaban[{{ $i->id }}]" value="D"> D. {{ $i->opsi_d }}</label>
</div>
</div>
@endforeach

<button>Simpan Penilaian</button>
</form>
</div>

</body>
</html>
