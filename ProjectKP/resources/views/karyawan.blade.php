@extends('layouts.master')

@section('content')

<h1 class="sectionTittle">Daftar Karyawan</h1>
	<hr>		
	
	<div class="tambah">
		<a href="/create" id="tombol">Tambah</a>
	</div>
	
	<div style="margin: 100px;margin-top:50px;">

		<div class="row row-cols-1 row-cols-md-4 g-4">
			@foreach ($karyawans as $karyawan)
			<div class="col">
			<div class="card shadow">
				<img src="{{ asset('image/'.$karyawan->image)  }}" class="card-img-top image" alt="...">
				<div class="card-body">
				<h4 class="card-title"><b>{{ $karyawan->nama }}</b></h4>
				<p class="card-text">E-mail : <b>{{ $karyawan->email }}</b></p>
				<p class="card-text">CP : <b>{{ $karyawan->no_telp }}</b></p>
				<p class="card-text">Tanggal Lahir : <b>{{ $karyawan->tgl_lahir }}</b></p>
				<p class="card-text">Alamat : <b>{{ $karyawan->alamat }}</b></p>
				<p class="card-text">Status Karyawan :<b>{{ $karyawan->status }}</b></p>
				<br>
					<a href="/edit/{{ $karyawan->id }}" id="tombol">Edit</a>
					<a href="/destroy/{{ $karyawan->id }}" onclick="return confirm('Apakah anda yakin ingin menhapus data?')" id="tombol" style="background-color: #fc5185">Hapus</a>
				</div>
			</div>
			</div>
			@endforeach
		</div>
		
	</div>
	 
	<script>
		//Fucntion Tombol KOnfirmasi
		function myFunction() {
		  var txt;
		  var r = confirm("Apakah ingin menghapus data?");
		  if (r == true) {
			txt = "Data Berhasil dihapus";
		  } else {
			txt = "Data Batal dihapus";
		  }
		  document.getElementById("demo").innerHTML = txt;
		}
	</script>

@endsection