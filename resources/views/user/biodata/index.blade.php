@extends('template.index')
@section('sub-judul','Biodata')
@section('content')
<div class="container-fluid mt--6">
  <div class="row mt--5">
    <div class="col-md-10 ml-auto mr-auto">
      <div class="card card-upgrade">
        <div class="card-header text-center border-bottom-0">
          <h4 class="card-title">Biodata</h4>
          <p class="card-category">Silahkan Perbarui Data Pribadi Anda !</p>
        </div>
        @if(Session::has('Success'))
        <div class="alert alert-success alert-dismissible show fade" role="success">
          <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>x</span></button>
            <i class="fas fa-check-circle"></i> {{Session('Success')}}
          </div>
        </div>
        @endif
        @if(Session::has('Updated'))
        <div class="alert alert-primary alert-dismissible show fade" role="success">
          <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>x</span></button>
            <i class="fas fa-check-circle"></i> {{Session('Updated')}}
          </div>
        </div>
        @endif
        @if(Session::has('Deleted'))
        <div class="alert alert-danger alert-dismissible show fade" role="success">
          <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>x</span></button>
            <i class="fas fa-trash"></i> {{Session('Deleted')}}
          </div>
        </div>
        @endif
        @if(Session::has('Cancled'))
        <div class="alert alert-info alert-dismissible show fade" role="success">
          <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>x</span></button>
            <i class="fas fa-info-circle"></i> {{Session('Cancled')}}
          </div>
        </div>
        @endif
        @if(count($errors) > 0)
          <div class="alert alert-info alert-dismissible show fade"><i class="fas fa-info-circle"></i>
            <div class="alert-body">
              <button class="close" data-dismiss="alert"><span>x</span></button>
              @foreach ($errors->all() as $error)
              {{ $error }} <br/>
              @endforeach
            </div>
          </div>
        @endif
        <div class="card-body">
          <div class="table-responsive table-upgrade">
            <table class="table">
              <tbody>
                @foreach($biodata as $hasil)
                @if(auth::user()->id == $hasil->user->id)
                <div class="col-lg-12 col-12 text-right">
                  <a href="#" class="btn btn-sm btn-primary"data-toggle="modal" data-target="#Modalbiodata{{$hasil->id}}">Perbarui Data</a>
                </div>
                <tr>
                  <td>Nama</td>
                  <td class="text-center">:</td>
                  <td class="text-right">{{$hasil->user->name}}</td>
                </tr>
                <!-- <tr>
                  <td>Umur</td>
                  <td class="text-center">:</td>
                  <td class="text-right">{{$hasil->umur}}</td>
                </tr> -->
                <tr>
                  <td>Jenis Kelamin</td>
                  <td class="text-center">:</td>
                  <td class="text-right">{{$hasil->jns_kelamin}}</td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td class="text-center">:</td>
                  <td class="text-right">{{$hasil->alamat}}</td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td class="text-center">:</td>
                  <td class="text-right">{{$hasil->tmp_lahir}}</td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td class="text-center">:</td>
                  <td class="text-right">{{$hasil->tgl_lahir}}</td>
                </tr>
                <tr>
                  <td>Kecamatan</td>
                  <td class="text-center">:</td>
                  <td class="text-right">{{$hasil->kecamatan}}</td>
                </tr>
                <tr>
                  <td>Kabupaten / Kota</td>
                  <td class="text-center">:</td>
                  <td class="text-right">{{$hasil->kabupaten}}</td>
                </tr>
                <tr>
                  <td>Nama Ayah</td>
                  <td class="text-center">:</td>
                  <td class="text-right">{{$hasil->nama_ayah}}</td>
                </tr>
                <tr>
                  <td>Nama Ibu</td>
                  <td class="text-center">:</td>
                  <td class="text-right">{{$hasil->nama_ibu}}</td>
                </tr>
                <tr>
                  <td>NO HP</td>
                  <td class="text-center">:</td>
                  <td class="text-right">{{$hasil->no_hp}}</td>
                </tr>
                <tr>
                  <td>Pekerjaan Orang Tua</td>
                  <td class="text-center">:</td>
                  <td class="text-right">{{$hasil->pekerjaan_ortu}}</td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@if(count($biodata) > 0)
@foreach($biodata as $hasil)
<div class="modal fade" id="Modalbiodata{{ $hasil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('biodata.update',$hasil->id)}}" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" value="{{$hasil->user->name}}" class="form-control" id="name" placeholder="name" readonly>
          </div>
          <!-- <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number" name="umur" value="{{$hasil->umur}}" class="form-control" id="umur" placeholder="Umur" required>
          </div> -->
          <div class="form-group">
            <label for="jns_kelamin">Jenis Kelamin</label>
            <input type="text" name="jns_kelamin" value="{{$hasil->jns_kelamin}}" class="form-control" id="jns_kelamin" placeholder="Jenis Kelamin" required>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" value="{{$hasil->alamat}}" class="form-control" id="alamat" placeholder="Alamat" required>
          </div>
          <div class="form-group">
            <label for="tmp_lahir">Tempat Lahir</label>
            <input type="text" name="tmp_lahir" value="{{$hasil->tmp_lahir}}" class="form-control" id="tmp_lahir" placeholder="Tempat Lahir" required>
          </div>
          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" value="{{$hasil->tgl_lahir}}" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" required>
          </div>
          <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" name="kecamatan" value="{{$hasil->kecamatan}}" class="form-control" id="kecamatan" placeholder="Kecamatan" required>
          </div>
          <div class="form-group">
            <label for="kabupaten">Kabupaten / Kota</label>
            <input type="text" name="kabupaten" value="{{$hasil->kabupaten}}" class="form-control" id="kabupaten" placeholder="Kabupaten" required>
          </div>
          <div class="form-group">
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" name="nama_ayah" value="{{$hasil->nama_ayah}}" class="form-control" id="nama_ayah" placeholder="Nama Ayah" required>
          </div>
          <div class="form-group">
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" name="nama_ibu" value="{{$hasil->nama_ibu}}" class="form-control" id="nama_ibu" placeholder="Nama Ibu" required>
          </div>
          <div class="form-group">
            <label for="no_hp">NO Hp</label>
            <input type="text" name="no_hp" value="{{$hasil->no_hp}}" class="form-control" id="no_hp" placeholder="NO HP" required>
          </div>
          <div class="form-group">
            <label for="pekerjaan_ortu">Pekerjaan Orang Tua</label>
            <input type="text" name="pekerjaan_ortu" value="{{$hasil->pekerjaan_ortu}}" class="form-control" id="pekerjaan_ortu" placeholder="Pekerjaan Orang Tua" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i><span> Simpan</span></button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach
@endif
