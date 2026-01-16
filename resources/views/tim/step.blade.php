<!DOCTYPE html>
<html>
<head>
<title>Penilaian Step</title>
<style>
body{font-family:Poppins;background:#f4f9ff;padding:40px}
.card{background:white;padding:30px;border-radius:20px;max-width:600px;margin:auto}
.opsi label{display:block;padding:10px;border:1px solid #ddd;margin:6px 0;border-radius:10px;cursor:pointer}
button{background:#1e88e5;color:white;border:none;padding:12px 25px;border-radius:25px}
</style>
</head>
<body>

<div class="card">
<h3>Indikator {{ $no }}</h3>
<p>{{ $indikator->indikator }}</p>

<form method="POST" action="/akreditasi/tim/indikator/jawab">
@csrf
<input type="hidden" name="indikator_id" value="{{ $indikator->id }}">
<input type="hidden" name="komponen_id" value="{{ $komponen_id }}">
<input type="hidden" name="no" value="{{ $no }}">

<div class="opsi">
        <label>
        <input type="radio" name="jawaban" value="A"
        {{ ($jawaban && $jawaban->jawaban=='A') ? 'checked' : '' }}>
        {{ $indikator->opsi_a }}
        </label>

        <label>
        <input type="radio" name="jawaban" value="B"
        {{ ($jawaban && $jawaban->jawaban=='B') ? 'checked' : '' }}>
        {{ $indikator->opsi_b }}
        </label>

        <label>
        <input type="radio" name="jawaban" value="C"
        {{ ($jawaban && $jawaban->jawaban=='C') ? 'checked' : '' }}>
        {{ $indikator->opsi_c }}
        </label>

        <label>
        <input type="radio" name="jawaban" value="D"
        {{ ($jawaban && $jawaban->jawaban=='D') ? 'checked' : '' }}>
        {{ $indikator->opsi_d }}
        </label>

</div>

<div style="margin-top:20px;display:flex;justify-content:space-between">
    @if($no > 1)
        <!-- <a href="{{ url("tim/indikator/'.$komponen_id.'/".($no-1)) }}" class="back-btn">⬅ Back</a> -->
         <a href="/akreditasi/tim/indikator/{{ $komponen_id }}/{{ $no-1 }}" style="padding:10px 20px;border-radius:20px;background:#90caf9;color:#ffffff;text-decoration:none">
            Back
        </a>
    @endif

    <button>{{ $no == $total ? 'Finish' : 'Next ➜' }}</button>
</div>

</body>
</html>
