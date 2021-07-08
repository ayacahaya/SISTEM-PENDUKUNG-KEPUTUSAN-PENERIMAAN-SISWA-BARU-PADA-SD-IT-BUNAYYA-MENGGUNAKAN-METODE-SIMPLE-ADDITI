
<?php $__env->startSection('sub-judul','Hasil'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header border-0">
        <h3 class="mb-0"><i class="fas fa-table mr-1"></i>Tabel Pendaftar</h3>
      </div>
          <!-- <div class="card"> -->
            <!-- Card header -->
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="table_id">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="no">No</th>
                    <th scope="col" class="sort" data-sort="name">Nama Pendaftar</th>
                    <th scope="col" class="sort" data-sort="keterangan">Keterangan</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php $no = 1 ?>
                  <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($hasil->level == '' && $hasil->status == 'Dalam Tahap Normalisasi' && $hasil->tahun_masuk == '2021'): ?>
                  <tr>
                    <td class="no">
                      <?php echo e($no++); ?>

                    </td>
                    <td class="name">
                      <?php echo e($hasil->name); ?>

                    </td>
                        <?php $hasilakhir = round(((DB::table('normalisasi')
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
                        ->sum('bobot')),2) ?>
                    <td class="keterangan">
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
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          <!-- </div> -->
        </div>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistem-penerimaan-siswa-baru\resources\views/user/hasil/index.blade.php ENDPATH**/ ?>