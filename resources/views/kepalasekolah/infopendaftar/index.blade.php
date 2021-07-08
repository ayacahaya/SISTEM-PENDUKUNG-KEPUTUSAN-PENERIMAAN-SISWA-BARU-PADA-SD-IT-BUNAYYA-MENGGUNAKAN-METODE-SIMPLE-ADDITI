@extends('template.index')
@section('sub-judul','Info Pendaftar')
@section('content')
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <h3 class="mb-0"><i class="fas fa-table mr-1"></i>Tabel Pendaftar</h3>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="sort" data-sort="no">No</th>
              <th scope="col" class="sort" data-sort="name">Nama Pendaftar</th>
              <th scope="col" class="sort" data-sort="status">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="list">
            @php $no = 1 @endphp
            @foreach($user as $result => $hasil)
            @if($hasil->level == '' && $hasil->tahun_masuk == '2021')
            <tr>
              <td class="no">
                {{ $no++ }}
              </td>
              <td class="name">
                {{ $hasil->name }}
              </td>
              <td class="status">
                @if($hasil->status == '')
                Belum Dilakukan Normalisasi Data
                @else
                {{$hasil->status}}
                @endif
              </td>
              <td class="text-right">
                <div class="dropdown">
                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalinfo{{ $hasil->id }}">Lihat Data Pendaftar</a>
                  </div>
                </div>
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@if(count($user) > 0)
@foreach($user as $hasil)
<div class="modal fade" id="modalinfo{{ $hasil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="" method="post">
        @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="pendaftar">Nama Pendaftar</label>
            <input type="text" name="pendaftar" value="{{$hasil->name}}" class="form-control" id="pendaftar" placeholder="Pendaftar" readonly>
          </div>
          @foreach($biodata as $hasil2)
          @if($hasil2->user_id == $hasil->id)
          <!-- <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number" name="umur" value="{{$hasil->biodata->umur}}" class="form-control" id="umur" placeholder="Umur" readonly>
          </div> -->
          <div class="form-group">
            <label for="jns_kelamin">Jenis Kelamin</label>
            <input type="text" name="jns_kelamin" value="{{$hasil->biodata->jns_kelamin}}" class="form-control" id="jns_kelamin" placeholder="Jenis Kelamin" readonly>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" value="{{$hasil->biodata->alamat}}" class="form-control" id="alamat" placeholder="Alamat" readonly>
          </div>
          <div class="form-group">
            <label for="tmp_lahir">Tempat Lahir</label>
            <input type="text" name="tmp_lahir" value="{{$hasil->biodata->tmp_lahir}}" class="form-control" id="tmp_lahir" placeholder="Tempat Lahir" readonly>
          </div>
          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" value="{{$hasil->biodata->tgl_lahir}}" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" readonly>
          </div>
          <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" name="kecamatan" value="{{$hasil->biodata->kecamatan}}" class="form-control" id="kecamatan" placeholder="Kecamatan" readonly>
          </div>
          <div class="form-group">
            <label for="kabupaten">Kabupaten / Kota</label>
            <input type="text" name="kabupaten" value="{{$hasil->biodata->kabupaten}}" class="form-control" id="kabupaten" placeholder="Kabupaten" readonly>
          </div>
          <div class="form-group">
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" name="nama_ayah" value="{{$hasil->biodata->nama_ayah}}" class="form-control" id="nama_ayah" placeholder="Nama Ayah" readonly>
          </div>
          <div class="form-group">
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" name="nama_ibu" value="{{$hasil->biodata->nama_ibu}}" class="form-control" id="nama_ibu" placeholder="Nama Ibu" readonly>
          </div>
          <div class="form-group">
            <label for="no_hp">NO HP</label>
            <input type="text" name="no_hp" value="{{$hasil->biodata->no_hp}}" class="form-control" id="no_hp" placeholder="NO HP" readonly>
          </div>
          <div class="form-group">
            <label for="pekerjaan_ortu">Pekerjaan Orang Tua</label>
            <input type="text" name="pekerjaan_ortu" value="{{$hasil->biodata->pekerjaan_ortu}}" class="form-control" id="pekerjaan_ortu" placeholder="Pekerjaan Orang Tua" readonly>
          </div>
          @endif
          @endforeach
      </div>
      <div class="modal-footer">
        <!-- <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i><span> Simpan</span></button> -->
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach
@endif
