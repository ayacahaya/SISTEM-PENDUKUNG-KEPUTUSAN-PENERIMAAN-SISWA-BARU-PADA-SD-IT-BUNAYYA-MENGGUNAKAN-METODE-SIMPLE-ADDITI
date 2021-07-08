@extends('template.index')
@section('sub-judul','Normalisasi')
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
            <h3 class="mb-0"><i class="fas fa-table mr-1"></i>Tabel Hasil Awal</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="no">No</th>
                  <th scope="col" class="sort" data-sort="name">Nama Pendaftar</th>
                  @foreach($kriteria as $result => $hasil)
                  <th scope="col" class="sort" data-sort="status">{{$hasil->kriteria}}</th>
                  @endforeach
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                @if(count($normalisasi) > 0)
                @php $no = 1 @endphp
                @foreach($user as $result => $hasil)
                @if($hasil->level == '' && $hasil->status == 'Dalam Tahap Normalisasi' && $hasil->tahun_masuk == '2021')
                <tr>
                  <td class="no">
                    {{ $no++ }}
                  </td>
                  <td class="name">
                    {{$hasil->name}}
                  </td>
                  @foreach($normalisasi as $result => $hasil2)
                  @if($hasil->id == $hasil2->user_id)
                  <td class="status" style="text-align:center">
                    {{
                      $hasil2->subkriteria->bobot
                    }}
                  </td>
                  @endif
                  @endforeach
                  <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" data-toggle="modal" data-target="#modalhapus{{$hasil->id}}">Hapus</a>
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
                  @foreach($kriteria as $result => $hasil)
                  <th></th>
                  @endforeach
                  @endif
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
    @if(count($normalisasi) > 0)
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0"><i class="fas fa-table mr-1"></i>Tabel Normalisasi</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="no">No</th>
                  <th scope="col" class="sort" data-sort="name">Nama Pendaftar</th>
                  @foreach($kriteria as $result => $hasil)
                  <th scope="col" class="sort" data-sort="status">{{$hasil->kriteria}}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody class="list">
                @php $no = 1 @endphp
                @foreach($user as $result => $hasil)
                @if($hasil->level == '' && $hasil->status == 'Dalam Tahap Normalisasi' && $hasil->tahun_masuk == '2021')
                <tr>
                  <td class="no">
                    {{ $no++ }}
                  </td>
                  <td class="name">
                    {{$hasil->name}}
                  </td>
                  @foreach($normalisasi as $result => $hasil2)
                  @if($hasil->id == $hasil2->user_id)
                  <td class="status" style="text-align:center">
                    @if($hasil2->kriteria->tipe == 'Benefit')
                    {{
                      round($hasil2->subkriteria->bobot
                      /
                      DB::table('normalisasi')
                      ->Join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
                      ->Join('users', 'normalisasi.user_id', '=', 'users.id')
                      ->where('users.tahun_masuk', '2021')
                      ->where('normalisasi.kriteria_id', $hasil2->kriteria_id)
                      ->max('subkriteria.bobot'),2)
                    }}
                    @else
                    {{
                      round(DB::table('normalisasi')
                      ->Join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
                      ->Join('users', 'normalisasi.user_id', '=', 'users.id')
                      ->where('users.tahun_masuk', '2021')
                      ->where('normalisasi.kriteria_id', $hasil2->kriteria_id)
                      ->min('subkriteria.bobot')
                      /
                      $hasil2->subkriteria->bobot,2)
                    }}
                    @endif
                  </td>
                  @endif
                  @endforeach
                </tr>
                @endif
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  @foreach($kriteria as $result => $hasil)
                  <th></th>
                  @endforeach
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0"><i class="fas fa-table mr-1"></i>Tabel Setelah Normalisasi</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="no">No</th>
                  <th scope="col" class="sort" data-sort="name">Nama Pendaftar</th>
                  @foreach($kriteria as $result => $hasil)
                  <th scope="col" class="sort" data-sort="status">{{$hasil->kriteria}}<br>{{$hasil->bobot}}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody class="list">
                @php $no = 1 @endphp
                @foreach($user as $result => $hasil)
                @if($hasil->level == '' && $hasil->status == 'Dalam Tahap Normalisasi' && $hasil->tahun_masuk == '2021')
                <tr>
                  <td class="no">
                    {{ $no++ }}
                  </td>
                  <td class="name">
                    {{$hasil->name}}
                  </td>
                  @foreach($normalisasi as $result => $hasil2)
                  @if($hasil->id == $hasil2->user_id)
                  <td class="status" style="text-align:center">
                    @if($hasil2->kriteria->tipe == 'Benefit')
                    {{
                      round(($hasil2->subkriteria->bobot
                      /
                      DB::table('normalisasi')
                      ->Join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
                      ->Join('users', 'normalisasi.user_id', '=', 'users.id')
                      ->where('users.tahun_masuk', '2021')
                      ->where('normalisasi.kriteria_id', $hasil2->kriteria_id)
                      ->max('subkriteria.bobot'))
                      *
                        $hasil2->kriteria->bobot,2)
                      }}
                    @else
                    {{
                      round((DB::table('normalisasi')
                      ->Join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
                      ->Join('users', 'normalisasi.user_id', '=', 'users.id')
                      ->where('users.tahun_masuk', '2021')
                      ->where('normalisasi.kriteria_id', $hasil2->kriteria_id)
                      ->min('subkriteria.bobot')
                      /
                      $hasil2->subkriteria->bobot)
                      *
                      $hasil2->kriteria->bobot,2)
                    }}
                    @endif
                  </td>
                  @endif
                  @endforeach
                </tr>
                @endif
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  @foreach($kriteria as $result => $hasil)
                  <th></th>
                  @endforeach
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
    <!-- <div class="row">
      <div class="col">
        <div class="card">
          Card header
          <div class="card-header border-0">
            <h3 class="mb-0"><i class="fas fa-table mr-1"></i>Tabel Hasil Akhir</h3>
          </div>
          Light table
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="no">No</th>
                  <th scope="col" class="sort" data-sort="name">Nama Pendaftar</th>
                  <th scope="col" class="sort" data-sort="status">Hasil Akhir</th>
                  <th scope="col" class="sort" data-sort="keterangan">Keterangan</th>
                </tr>
              </thead>
              <tbody class="list">
                @php $no = 1 @endphp
                @foreach($user as $result => $hasil)
                @if($hasil->level == '' && $hasil->status == 'Dalam Tahap Normalisasi')
                <tr>
                  <td class="no">
                    {{ $no++ }}
                  </td>
                  <td class="name">
                    {{$hasil->name}}
                  </td>
                  <td class="status">
                    {{
                      DB::table('subkriteria')
                      ->join('normalisasi', 'subkriteria.id', '=', 'normalisasi.subkriteria_id')
                      ->where('normalisasi.user_id', $hasil->id)
                      ->join('kriteria', 'subkriteria.kriteria_id', '=', 'kriteria.id')
                      ->where('kriteria.tipe', "Benefit")
                      ->sum('subkriteria.bobot')
                    }}
                    /
                    {{
                      DB::table('subkriteria')
                      ->join('normalisasi', 'subkriteria.id', '=', 'normalisasi.subkriteria_id')
                      ->join('kriteria', 'subkriteria.kriteria_id', '=', 'kriteria.id')
                      ->where('kriteria.tipe', "Benefit")
                      ->max('subkriteria.bobot')
                    }}
                  </td>
                  <td class="keterangan">
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
    </div> -->
    @endif
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endsection
@if(count($user) > 0)
@foreach($user as $hasil)
<div class="modal fade" id="modalhapus{{$hasil->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('normalisasi.destroy', $hasil->id)}}">
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
