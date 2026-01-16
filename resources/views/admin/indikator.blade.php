<!DOCTYPE html>
<html>
<head>
<title>Indikator Kriteria</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
body{
    font-family:Poppins;
    background:linear-gradient(120deg,#e3f2fd,#f8fbff);
    padding:40px;
}
.container{max-width:1000px;margin:auto;}
.card{
    background:white;
    padding:30px;
    border-radius:18px;
    box-shadow:0 15px 30px rgba(0,0,0,.08);
    margin-bottom:25px;
}
h3{color:#0d47a1}
textarea,input{
    width:100%;
    padding:12px;
    border-radius:10px;
    border:1px solid #ddd;
    margin-bottom:10px;
}
button{
    background:#1565c0;
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:10px;
    cursor:pointer;
}
button:hover{background:#0d47a1}
.option{
    display:grid;
    grid-template-columns:1fr 40px;
    gap:10px;
}
.badge{
    background:#e3f2fd;
    padding:6px 12px;
    border-radius:20px;
    color:#1565c0;
    font-weight:500;
}
.delete-btn{
    background:#e53935;
    color:white;
    padding:6px 12px;
    border-radius:8px;
    text-decoration:none;
}
.delete-btn:hover{background:#c62828}

.indikator-edit-btn{
    display:inline-flex;
    align-items:center;
    gap:6px;
    background:linear-gradient(135deg,#42a5f5,#1e88e5);
    color:white;
    padding:6px 12px;
    border-radius:8px;
    font-size:16px;
    font-weight:500;
    text-decoration:none;
    box-shadow:0 6px 12px rgba(30,136,229,.25);
    transition:.25s;
}
.indikator-edit-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 18px rgba(30,136,229,.35);
    background:linear-gradient(135deg,#1e88e5,#1565c0);
}
.indikator-action{
    display:flex;
    gap:10px;
    margin-top:8px;
}

.back-btn{
    display:inline-block;
    margin-bottom:20px;
    background:#e53935;
    color:white;
    padding:10px 20px;
    border-radius:10px;
    text-decoration:none;
    font-weight:500;
}
.back-btn:hover{
    background:#c62828;
}

</style>
</head>

<script>
function openEditIndikator(id,indikator,a,b,c,d){
    document.getElementById('modalEditIndikator').style.display='flex';
    document.getElementById('edit_indikator').value = indikator;
    document.getElementById('edit_a').value = a;
    document.getElementById('edit_b').value = b;
    document.getElementById('edit_c').value = c;
    document.getElementById('edit_d').value = d;
    document.getElementById('formEditIndikator').action = '/akreditasi/admin/indikator/update/'+id;
}
function closeEditIndikator(){
    document.getElementById('modalEditIndikator').style.display='none';
}
</script>


<!-- Modal Edit Indikator -->
<div id="modalEditIndikator" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,.4); align-items:center; justify-content:center;">
<div style="background:white; padding:25px; border-radius:15px; width:450px">

<h3 style="color:#1565c0">Edit Indikator</h3>

<form method="POST" id="formEditIndikator">
@csrf

<textarea name="indikator" id="edit_indikator" required></textarea>
<input name="opsi_a" id="edit_a" placeholder="Opsi A" required>
<input name="opsi_b" id="edit_b" placeholder="Opsi B" required>
<input name="opsi_c" id="edit_c" placeholder="Opsi C" required>
<input name="opsi_d" id="edit_d" placeholder="Opsi D" required>

<button>Update</button>
<button type="button" onclick="closeEditIndikator()" style="background:#ccc;color:#333">Batal</button>
</form>

</div>
</div>


<body>

<div class="container">

<div class="card">
<h3>📌 Komponen: <span class="badge">{{ $komponen->nama }}</span></h3>

<form method="POST" action="/akreditasi/admin/komponen/{{ $komponen->id }}/indikator">
@csrf
<textarea name="indikator" placeholder="Pertanyaan indikator" required></textarea>

<div class="option">
<input name="opsi_a" placeholder="Jawaban A" required><span>A</span>
</div>
<div class="option">
<input name="opsi_b" placeholder="Jawaban B" required><span>B</span>
</div>
<div class="option">
<input name="opsi_c" placeholder="Jawaban C" required><span>C</span>
</div>
<div class="option">
<input name="opsi_d" placeholder="Jawaban D" required><span>D</span>
</div>


<a href="/akreditasi/admin/komponen" class="back-btn">Back</a>
<button>+ Tambah Indikator</button>
</form>
</div>

<div class="card">
<h3>📋 Daftar Indikator</h3>

@foreach($indikator as $i)
<div style="padding:18px;border-bottom:1px solid #eee">

<b>{{ $loop->iteration }}. {{ $i->indikator }}</b>

<ul style="margin-top:8px">
<li><b>A.</b> {{ $i->opsi_a }}</li>
<li><b>B.</b> {{ $i->opsi_b }}</li>
<li><b>C.</b> {{ $i->opsi_c }}</li>
<li><b>D.</b> {{ $i->opsi_d }}</li>
</ul>

<a href="#"
   onclick="openEditIndikator(
     '{{ $i->id }}',
     '{{ $i->indikator }}',
     '{{ $i->opsi_a }}',
     '{{ $i->opsi_b }}',
     '{{ $i->opsi_c }}',
     '{{ $i->opsi_d }}'
   )"
   class="indikator-edit-btn">
   Edit
</a>

<a href="/akreditasi/admin/indikator/delete/{{ $i->id }}" 
   class="action-btn delete-btn"
   onclick="return confirm('Hapus indikator ini?')">Hapus</a>
</div>
@endforeach
</div>

</div>
</body>
</html>
