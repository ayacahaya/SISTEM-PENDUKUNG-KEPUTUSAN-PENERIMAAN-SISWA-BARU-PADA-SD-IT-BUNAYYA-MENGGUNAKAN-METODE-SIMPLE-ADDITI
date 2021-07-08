<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Laporan Hasil</title>
  </head>
  <body>
    <center><h5>Laporan Hasil Seleksi SDIT BUNAYYA LHOKSEUMAWE</h5></center>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Pendaftar</th>
          <th>Hasil</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1 ?>
        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($hasil->level == '' && $hasil->status == 'Dalam Tahap Normalisasi' && $hasil->tahun_masuk == '2021'): ?>
        <tr>
          <td>
            <?php echo e($no++); ?>

          </td>
          <td>
            <?php echo e($hasil->name); ?>

          </td>
          <td>
            <?php echo e($hasilakhir = round(((DB::table('normalisasi')
              ->Join('users', 'normalisasi.user_id', '=', 'users.id')
              ->join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
              ->join('kriteria', 'normalisasi.kriteria_id', '=', 'kriteria.id')
              ->where('kriteria.tipe', "Benefit")
              ->where('kriteria.kriteria', "Ujian Doa Sehari-hari")
              ->where('users.id', $hasil->id)
              ->sum('subkriteria.bobot')
              /
              DB::table('subkriteria')
              ->join('kriteria', 'subkriteria.kriteria_id', '=', 'kriteria.id')
              ->where('kriteria.kriteria', "Ujian Doa Sehari-hari")
              ->max('subkriteria.bobot'))
              *
              DB::table('kriteria')
              ->where('kriteria', "Ujian Doa Sehari-hari")
              ->sum('bobot'))
              +
              ((DB::table('normalisasi')
              ->Join('users', 'normalisasi.user_id', '=', 'users.id')
              ->join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
              ->join('kriteria', 'normalisasi.kriteria_id', '=', 'kriteria.id')
              ->where('kriteria.tipe', "Benefit")
              ->where('kriteria.kriteria', "Menghitung")
              ->where('users.id', $hasil->id)
              ->sum('subkriteria.bobot')
              /
              DB::table('subkriteria')
              ->join('kriteria', 'subkriteria.kriteria_id', '=', 'kriteria.id')
              ->where('kriteria.kriteria', "Menghitung")
              ->max('subkriteria.bobot'))
              *
              DB::table('kriteria')
              ->where('kriteria', "Menghitung")
              ->sum('bobot'))
              +
              ((DB::table('normalisasi')
              ->Join('users', 'normalisasi.user_id', '=', 'users.id')
              ->join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
              ->join('kriteria', 'normalisasi.kriteria_id', '=', 'kriteria.id')
              ->where('kriteria.tipe', "Benefit")
              ->where('kriteria.kriteria', "Tilawah")
              ->where('users.id', $hasil->id)
              ->sum('subkriteria.bobot')
              /
              DB::table('subkriteria')
              ->join('kriteria', 'subkriteria.kriteria_id', '=', 'kriteria.id')
              ->where('kriteria.kriteria', "Tilawah")
              ->max('subkriteria.bobot'))
              *
              DB::table('kriteria')
              ->where('kriteria', "Tilawah")
              ->sum('bobot'))
              +
              ((DB::table('normalisasi')
              ->Join('users', 'normalisasi.user_id', '=', 'users.id')
              ->join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
              ->join('kriteria', 'normalisasi.kriteria_id', '=', 'kriteria.id')
              ->where('kriteria.tipe', "Benefit")
              ->where('kriteria.kriteria', "Mampu Membaca dan Menulis")
              ->where('users.id', $hasil->id)
              ->sum('subkriteria.bobot')
              /
              DB::table('subkriteria')
              ->join('kriteria', 'subkriteria.kriteria_id', '=', 'kriteria.id')
              ->where('kriteria.kriteria', "Mampu Membaca dan Menulis")
              ->max('subkriteria.bobot'))
              *
              DB::table('kriteria')
              ->where('kriteria', "Mampu Membaca dan Menulis")
              ->sum('bobot'))
              +
              ((DB::table('normalisasi')
              ->Join('users', 'normalisasi.user_id', '=', 'users.id')
              ->join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
              ->join('kriteria', 'normalisasi.kriteria_id', '=', 'kriteria.id')
              ->where('kriteria.tipe', "Benefit")
              ->where('kriteria.kriteria', "Gaji Orang Tua")
              ->where('users.id', $hasil->id)
              ->sum('subkriteria.bobot')
              /
              DB::table('subkriteria')
              ->join('kriteria', 'subkriteria.kriteria_id', '=', 'kriteria.id')
              ->where('kriteria.kriteria', "Gaji Orang Tua")
              ->max('subkriteria.bobot'))
              *
              DB::table('kriteria')
              ->where('kriteria', "Gaji Orang Tua")
              ->sum('bobot')),2)); ?>

          </td>
          <td>
            <?php if($hasilakhir <= 0.5): ?>
            <?php echo e("Tidak Lulus !"); ?>

            <?php else: ?>
            <?php echo e("Lulus !"); ?>

            <?php endif; ?>
          </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\sistem-penerimaan-siswa-baru\resources\views/admin/hasil/hasil_pdf.blade.php ENDPATH**/ ?>