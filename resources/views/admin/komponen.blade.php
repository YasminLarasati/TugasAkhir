<!DOCTYPE html>
<html>
<head>
<title>Komponen Kriteria</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
body{
    font-family:Poppins;
    background:linear-gradient(120deg,#e3f2fd,#f8fbff);
    padding:40px;
}
.container{
    max-width:900px;
    margin:auto;
}
.card{
    background:white;
    padding:30px;
    border-radius:18px;
    box-shadow:0 15px 30px rgba(0,0,0,.08);
    margin-bottom:25px;
}
h3{color:#0d47a1;margin-bottom:15px}
input,textarea{
    width:100%;
    padding:12px;
    border-radius:10px;
    border:1px solid #ddd;
    margin-bottom:10px;
    font-size:14px;
}
button{
    background:#1565c0;
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:10px;
    cursor:pointer;
    font-weight:500;
}
button:hover{background:#0d47a1}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}
th{
    background:#1565c0;
    color:white;
    padding:12px;
    text-align:left;
}
td{
    padding:12px;
    border-bottom:1px solid #eee;
}
tr:hover{background:#f1f7ff}

.badge{
    background:#e3f2fd;
    padding:5px 10px;
    border-radius:20px;
    color:#1565c0;
    font-size:13px;
    font-weight:500;
}

.action-btn{
    display:inline-block;
    padding:6px 12px;
    border-radius:8px;
    font-size:13px;
    text-decoration:none;
    margin-right:5px;
}
.edit-btn{background:#ffca28;color:#333}
.delete-btn{background:#e53935;color:white}
.edit-btn:hover{background:#f4b400}
.delete-btn:hover{background:#c62828}

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
function openEdit(id,nama,bobot,keterangan){
    document.getElementById('modalEdit').style.display='flex';
    document.getElementById('edit_nama').value = nama;
    document.getElementById('edit_bobot').value = bobot;
    document.getElementById('edit_keterangan').value = keterangan;
    document.getElementById('formEdit').action = '/akreditasi/admin/komponen/update/'+id;
}
function closeModal(){
    document.getElementById('modalEdit').style.display='none';
}
</script>


<!-- Modal Edit -->
<div id="modalEdit" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,.4); align-items:center; justify-content:center;">
    <div style="background:white; padding:25px; border-radius:15px; width:400px">
        <h3 style="color:#1565c0">Edit Komponen</h3>

        <form method="POST" id="formEdit">
            @csrf
            <input type="hidden" name="_method" value="POST">

            <input type="text" name="nama" id="edit_nama" required>
            <input type="number" name="bobot" id="edit_bobot" min="1" max="100" required>
            <textarea name="keterangan" id="edit_keterangan"></textarea>

            <button>Update</button>
            <button type="button" onclick="closeModal()" style="background:#ccc;color:#333">Batal</button>
        </form>
    </div>
</div>

<body>

<div class="container">


<div class="card">


<h3>➕ Tambah Komponen Kriteria</h3>

<form method="POST" action="/akreditasi/admin/komponen">
@csrf
<input name="nama" placeholder="Nama Komponen" required>
<input name="bobot" type="number" placeholder="Bobot" required>
<textarea name="keterangan" placeholder="Keterangan"></textarea>
<a href="/akreditasi/admin/dashboard" class="back-btn">Back</a>
<button>Simpan Komponen</button>
</form>
</div>

<div class="card">
<h3>📋 Daftar Komponen</h3>

<table>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Bobot</th>
    <th>Aksi</th>
</tr>
@foreach($data as $d)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $d->nama }}</td>
<td><span class="badge">{{ $d->bobot }}</span></td>
<td>
    <a href="/akreditasi/admin/komponen/{{ $d->id }}/indikator"
       class="action-btn"
       style="background:#42a5f5;color:white">
       Indikator
    </a>
    <a href="#" class="action-btn edit-btn" onclick="openEdit('{{ $d->id }}','{{ $d->nama }}','{{ $d->bobot }}','{{ $d->keterangan }}')"> Edit </a>
    <a href="/akreditasi/admin/komponen/delete/{{ $d->id }}" class="action-btn delete-btn" onclick="return confirm('Hapus komponen ini?')">Hapus</a>
</td>
</tr>
@endforeach
</table>
</div>

</div>
</body>
</html>
