@extends('template.index')
@section('sub-judul','Kriteria')
@section('content')
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
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <h3 class="mb-0"><i class="fas fa-table mr-1"></i>Tabel Kriteria</h3>
        <div class="col-lg-12 col-12 text-right">
          <!-- <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#Modalkriteria"><i class="fas fa-plus-circle"></i> Tambah Kriteria</a> -->
        </div>
      </div>
      <!-- <div class="card-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalkriteria"><i class="fas fa-plus-circle"></i><span> Tambah Kriteria</span></button><br><br>
      </div> -->
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="sort" data-sort="no">No</th>
              <th scope="col" class="sort" data-sort="name">Kriteria</th>
              <th scope="col" class="sort" data-sort="budget">Bobot</th>
              <th scope="col" class="sort" data-sort="tipe">Tipe</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="list">
            @php $no = 1 @endphp
            @foreach($kriteria as $result => $hasil)
            <tr>
              <td class="no">
                {{ $no++ }}
              </td>
              <td class="name">
                {{ $hasil->kriteria }}
              </td>
              <td class="budget">
                {{ $hasil->bobot }}
              </td>
              <td class="tipe">
                {{ $hasil->tipe }}
              </td>
              <td class="text-right">
                <!-- <div class="dropdown">
                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalupdate{{ $hasil->id }}">Ubah</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalhapus{{ $hasil->id }}">Hapus</a>
                  </div>
                </div> -->
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th colspan="2"> Total Bobot </th>
              <th>{{ DB::table('kriteria')->sum('bobot') }}</th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@foreach($kriteria as $result => $hasil)
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <h3 class="mb-0"><i class="fas fa-table mr-1"></i>Tabel Sub-Kriteria "{{$hasil->kriteria}}"</h3>
        <div class="col-lg-12 col-12 text-right">
          <!-- <a href="#" class="btn btn-sm btn-primary"data-toggle="modal" data-target="#Modalsubkriteria{{ $hasil->id }}"><i class="fas fa-plus-circle"></i> Tambah Sub-Kriteria</a> -->
        </div>
      </div>
      <!-- <div class="card-header"> -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalsubkriteria{{ $hasil->id }}"><i class="fas fa-plus-circle"></i><span> Tambah sub-Kriteria</span></button><br><br> -->
      <!-- </div> -->
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="sort" data-sort="no">No</th>
              <th scope="col" class="sort" data-sort="name">Kriteria</th>
              <th scope="col" class="sort" data-sort="budget">Bobot</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="list">
            @php $no = 1 @endphp
            @foreach($subkriteria as $result => $hasil2)
            @if($hasil2->kriteria_id == $hasil->id)
            <tr>
              <td class="no">
                {{ $no++ }}
              </td>
              <td class="name">
                {{ $hasil2->subkriteria }}
              </td>
              <td class="budget">
                {{ $hasil2->bobot }}
              </td>
              <td class="text-right">
                <!-- <div class="dropdown">
                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalupdatesub{{ $hasil2->id }}">Ubah</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalhapussub{{ $hasil2->id }}">Hapus</a>
                  </div>
                </div> -->
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
@endforeach
@endsection
<!-- modal -->
<div class="modal fade" id="Modalkriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('kriteria.store')}}" method="post">
        @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="kriteria">Kriteria</label>
            <input type="text" name="kriteria" class="form-control" id="kriteria" placeholder="Kriteria" required>
          </div>
          <div class="form-group">
            <label for="bobot">Bobot</label>
            <input type="text" name="bobot" class="form-control" id="bobot" placeholder="Bobot" required>
          </div>
          <div class="form-group">
              <label>Bobot</label>
              <select class="form-control" name="tipe">
                <option value="{{'Cost'}}">Cost</option>
                <option value="{{'Benefit'}}">Benefit</option>
              </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i><span> Simpan</span></button>
      </div>
    </form>
    </div>
  </div>
</div>
@if(count($kriteria) > 0)
@foreach($kriteria as $hasil)
<div class="modal fade" id="Modalsubkriteria{{ $hasil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('subkriteria.store')}}" method="post">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="kriteria_id" value="{{ $hasil->id }}">
          <div class="form-group">
            <label for="subkriteria">Sub-Kriteria</label>
            <input type="text" name="subkriteria" class="form-control" id="subkriteria" placeholder="Sub-Kriteria" required>
          </div>
          <div class="form-group">
              <label>Bobot</label>
              <select class="form-control" name="bobot">
                <option value="{{1}}">{{1}}</option>
                <option value="{{2}}">{{2}}</option>
                <option value="{{3}}">{{3}}</option>
                <option value="{{4}}">{{4}}</option>
                <option value="{{5}}">{{5}}</option>
                <option value="{{6}}">{{6}}</option>
                <option value="{{7}}">{{7}}</option>
                <option value="{{8}}">{{8}}</option>
                <option value="{{9}}">{{9}}</option>
                <option value="{{10}}">{{10}}</option>
              </select>
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
@if(count($subkriteria) > 0)
@foreach($subkriteria as $hasil)
<div class="modal fade" id="modalupdatesub{{ $hasil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('subkriteria.update',$hasil->id)}}" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
          <div class="form-group">
            <label for="subkriteria">Sub-Kriteria</label>
            <input type="text" name="subkriteria" value="{{$hasil->subkriteria}}" class="form-control" id="subkriteria" placeholder="Sub-Kriteria" required>
          </div>
          <div class="form-group">
              <label>Bobot</label>
              <select class="form-control" name="bobot">
                <option value="{{1}}">{{1}}</option>
                <option value="{{2}}">{{2}}</option>
                <option value="{{3}}">{{3}}</option>
                <option value="{{4}}">{{4}}</option>
                <option value="{{5}}">{{5}}</option>
                <option value="{{6}}">{{6}}</option>
                <option value="{{7}}">{{7}}</option>
                <option value="{{8}}">{{8}}</option>
                <option value="{{9}}">{{9}}</option>
                <option value="{{10}}">{{10}}</option>
              </select>
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
@if(count($kriteria) > 0)
@foreach($kriteria as $hasil)
<div class="modal fade" id="modalupdate{{ $hasil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('kriteria.update',$hasil->id)}}" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
          <div class="form-group">
            <label for="kriteria">Kriteria</label>
            <input type="text" name="kriteria" value="{{$hasil->kriteria}}" class="form-control" id="kriteria" placeholder="Kriteria" readonly>
          </div>
          <div class="form-group">
            <label for="bobot">Bobot</label>
            <input type="text" name="bobot" value="{{$hasil->bobot}}" class="form-control" id="bobot" placeholder="Bobot" required>
          </div>
          <!-- <div class="form-group">
              <label>Bobot</label>
              <select class="form-control" name="tipe">
                <option value="{{'Cost'}}">Cost</option>
                <option value="{{'Benefit'}}">Benefit</option>
              </select>
          </div> -->
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
@if(count($kriteria) > 0)
@foreach($kriteria as $hasil)
<div class="modal fade" id="modalhapus{{ $hasil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('kriteria.destroy', $hasil->id)}}">
          @csrf
          @method('delete')
      <div class="modal-body">
        <div class="form-group">
            <label>Anda yakin ingin hapus data ini?</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ya</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach
@endif
@if(count($subkriteria) > 0)
@foreach($subkriteria as $hasil)
<div class="modal fade" id="modalhapussub{{ $hasil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('subkriteria.destroy', $hasil->id)}}">
          @csrf
          @method('delete')
      <div class="modal-body">
        <div class="form-group">
            <label>Anda yakin ingin hapus data ini?</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ya</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach
@endif
