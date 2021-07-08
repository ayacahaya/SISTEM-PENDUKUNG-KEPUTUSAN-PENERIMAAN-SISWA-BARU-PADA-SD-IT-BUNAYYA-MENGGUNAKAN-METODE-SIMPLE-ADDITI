@extends('template.index')
@section('sub-judul','Grafik')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
      <div class="card">
          <div class="card-header">Grafik Pendaftar</div>

          <div class="card-body">
            <canvas id="barChart" class="chartjs" width="undefined" height="100"></canvas>
          </div>
      </div>
      <div class="card">
          <div class="card-header">Grafik Ujian Doa Sehari-hari</div>

          <div class="card-body">
            <canvas id="barChart1" class="chartjs" width="undefined" height="100"></canvas>
          </div>
      </div>
      <div class="card">
          <div class="card-header">Grafik Menghitung</div>

          <div class="card-body">
            <canvas id="barChart2" class="chartjs" width="undefined" height="100"></canvas>
          </div>
      </div>
      <div class="card">
          <div class="card-header">Grafik Tilawah</div>

          <div class="card-body">
            <canvas id="barChart3" class="chartjs" width="undefined" height="100"></canvas>
          </div>
      </div>
      <div class="card">
          <div class="card-header">Grafik Mampu Membaca Dan Menulis</div>

          <div class="card-body">
            <canvas id="barChart4" class="chartjs" width="undefined" height="100"></canvas>
          </div>
      </div>
      <div class="card">
          <div class="card-header">Grafik Gaji Orang Tua</div>

          <div class="card-body">
            <canvas id="barChart5" class="chartjs" width="undefined" height="100"></canvas>
          </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
var ctx = document.getElementById("barChart").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($label); ?>,
datasets: [{
label: 'Pendaftar',
data: <?php echo json_encode($jumlah_user); ?>,
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});

</script>
<script type="text/javascript">
var ctx = document.getElementById("barChart1").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($labelk); ?>,
datasets: [{
label: 'Pendaftar',
data: <?php echo json_encode([
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Ujian Doa Sehari-hari')
  ->where('subkriteria.subkriteria','Sangat Baik')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Ujian Doa Sehari-hari')
  ->where('subkriteria.subkriteria','Baik')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Ujian Doa Sehari-hari')
  ->where('subkriteria.subkriteria','Kurang Baik')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Ujian Doa Sehari-hari')
  ->where('subkriteria.subkriteria','Tidak Baik')
  ->count('users.id'),
]); ?>,
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});

</script>
<script type="text/javascript">
var ctx = document.getElementById("barChart2").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($labelk); ?>,
datasets: [{
label: 'Pendaftar',
data: <?php echo json_encode([
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Menghitung')
  ->where('subkriteria.subkriteria','Sangat Baik')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Menghitung')
  ->where('subkriteria.subkriteria','Baik')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Menghitung')
  ->where('subkriteria.subkriteria','Kurang Baik')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Menghitung')
  ->where('subkriteria.subkriteria','Tidak Baik')
  ->count('users.id'),
]); ?>,
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});

</script>
<script type="text/javascript">
var ctx = document.getElementById("barChart3").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($labelk); ?>,
datasets: [{
label: 'Pendaftar',
data: <?php echo json_encode([
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Tilawah')
  ->where('subkriteria.subkriteria','Sangat Baik')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Tilawah')
  ->where('subkriteria.subkriteria','Baik')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Tilawah')
  ->where('subkriteria.subkriteria','Kurang Baik')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Tilawah')
  ->where('subkriteria.subkriteria','Tidak Baik')
  ->count('users.id'),
]); ?>,
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});

</script>
<script type="text/javascript">
var ctx = document.getElementById("barChart4").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($labelk); ?>,
datasets: [{
label: 'Pendaftar',
data: <?php echo json_encode([
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Mampu Membaca dan Menulis')
  ->where('subkriteria.subkriteria','Sangat Baik')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Mampu Membaca dan Menulis')
  ->where('subkriteria.subkriteria','Baik')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Mampu Membaca dan Menulis')
  ->where('subkriteria.subkriteria','Kurang Baik')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Mampu Membaca dan Menulis')
  ->where('subkriteria.subkriteria','Tidak Baik')
  ->count('users.id'),
]); ?>,
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});

</script>
<script type="text/javascript">
var ctx = document.getElementById("barChart5").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($labelk1); ?>,
datasets: [{
label: 'Pendaftar',
data: <?php echo json_encode([
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Gaji Orang Tua')
  ->where('subkriteria.subkriteria','Sangat Banyak')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Gaji Orang Tua')
  ->where('subkriteria.subkriteria','Banyak')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Gaji Orang Tua')
  ->where('subkriteria.subkriteria','Kurang Banyak')
  ->count('users.id'),
  DB::table('normalisasi')
  ->join('users','normalisasi.user_id','=','users.id')
  ->join('kriteria','normalisasi.kriteria_id','=','kriteria.id')
  ->join('subkriteria','normalisasi.subkriteria_id','=','subkriteria.id')
  ->where('kriteria.kriteria','Gaji Orang Tua')
  ->where('subkriteria.subkriteria','Tidak Banyak')
  ->count('users.id'),
]); ?>,
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});

</script>
@endsection
