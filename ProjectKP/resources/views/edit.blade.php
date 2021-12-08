@extends('layouts.master')

@section('content')

<div class="form">
  <form id="form" autocomplete="off" method="post" action="/update" enctype="multipart/form-data"  >
      <h1>Pengelolaan Data Karyawan</h1><hr>
    {{ csrf_field() }}
    <div >
      <img src="{{ asset('image/'.$karyawan->image)  }}" class="card-img-top"  alt="...">
    </div>
    
	<input type="hidden" name="id" value="{{ $karyawan->id }}"> <br/>
    <div class="row">
      <div class="col-4">Image</div>
      <div class="col-6"><input required class="form-control formProses" type=file name=image maxlength="10" value="{{ asset('image/'.$karyawan->image)  }}" placeholder="Kode ID"><br>
    </div></div>

    <div class="row">
      <div class="col-4">Nama</div>
      <div class="col-6"><input required class="form-control formProses" placeholder="Nama Legkap" type=text name=nama maxlength="50"value="{{ $karyawan->nama }}"></div>
    </div><br>

    <div class="row">
      <div class="col-4">Nomor Telepon</div>
      <div class="col-6"><input required class="form-control formProses" type=text placeholder="no_tlp" name=no_telp maxlength="13" value="{{ $karyawan->no_telp }}"></div>
    </div><br>

    <div class="row">
      <div class="col-4">Email</div>
      <div class="col-6"><input required class="form-control formProses" type=text placeholder="email" name=email maxlength="30"value="{{ $karyawan->email }}"></div>
    </div><br>

    <div class="row">
      <div class="col-4">Tanggal Lahir [YYYY/MM/DD]</div>
      <div class="col-6"><input required class="form-control formProses" placeholder="YYYY/MM/DD" type=text name=tgl_lahir id="datepicker" maxlength="30" value="{{ $karyawan->tgl_lahir }}"></div>
    </div><br>

    <div class="row">
      <div class="col-4">Alamat</div>
      <div class="col-6"><input required class="form-control formProses" type=text placeholder="alamat" name=alamat maxlength="50"value="{{ $karyawan->alamat }}"></div>
    </div><br>

    <div class="row">
      <div class="col-4">Status</div>
      <div class="col-7">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="Tetap">
            <label class="form-check-label" for="inlineRadio1">Tetap</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="Kontrak" checked>
            <label class="form-check-label" for="inlineRadio2">Kontrak</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="Pensiun">
            <label class="form-check-label" for="inlineRadio3">Pensiun</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inlineRadio4" value="PHK">
            <label class="form-check-label" for="inlineRadio4">PHK</label>
          </div>
      </div>
    </div><br>

    <br><br>
    <div>
      <center>
      <input id="tombol-tambah" type=submit value="Proses" name="submit">
      <a id="tombol-tambah" href="/karyawan" style="margin-left: 30px;text-decoration: none; background-color: #fc5185;">Batal</a>
      </center>
    </div>
  </form>
</div>
@endsection