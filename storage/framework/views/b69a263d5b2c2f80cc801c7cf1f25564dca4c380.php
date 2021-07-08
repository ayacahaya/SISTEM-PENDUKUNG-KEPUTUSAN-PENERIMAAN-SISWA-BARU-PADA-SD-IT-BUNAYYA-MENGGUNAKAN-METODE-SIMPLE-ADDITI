
<?php $__env->startSection('sub-judul','Normalisasi'); ?>
<?php $__env->startSection('content'); ?>
<?php if(Session::has('Success')): ?>
<div class="alert alert-success alert-dismissible show fade" role="success">
  <div class="alert-body">
    <button class="close" data-dismiss="alert"><span>x</span></button>
    <i class="fas fa-check-circle"></i> <?php echo e(Session('Success')); ?>

  </div>
</div>
<?php endif; ?>
<?php if(Session::has('Updated')): ?>
<div class="alert alert-primary alert-dismissible show fade" role="success">
  <div class="alert-body">
    <button class="close" data-dismiss="alert"><span>x</span></button>
    <i class="fas fa-check-circle"></i> <?php echo e(Session('Updated')); ?>

  </div>
</div>
<?php endif; ?>
<?php if(Session::has('Deleted')): ?>
<div class="alert alert-danger alert-dismissible show fade" role="success">
  <div class="alert-body">
    <button class="close" data-dismiss="alert"><span>x</span></button>
    <i class="fas fa-trash"></i> <?php echo e(Session('Deleted')); ?>

  </div>
</div>
<?php endif; ?>
<?php if(Session::has('Cancled')): ?>
<div class="alert alert-info alert-dismissible show fade" role="success">
  <div class="alert-body">
    <button class="close" data-dismiss="alert"><span>x</span></button>
    <i class="fas fa-info-circle"></i> <?php echo e(Session('Cancled')); ?>

  </div>
</div>
<?php endif; ?>
<?php if(count($errors) > 0): ?>
  <div class="alert alert-info alert-dismissible show fade"><i class="fas fa-info-circle"></i>
    <div class="alert-body">
      <button class="close" data-dismiss="alert"><span>x</span></button>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo e($error); ?> <br/>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
<?php endif; ?>
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
                  <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th scope="col" class="sort" data-sort="status"><?php echo e($hasil->kriteria); ?></th>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                <?php if(count($normalisasi) > 0): ?>
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
                  <?php $__currentLoopData = $normalisasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($hasil->id == $hasil2->user_id): ?>
                  <td class="status" style="text-align:center">
                    <?php echo e($hasil2->subkriteria->bobot); ?>

                  </td>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" data-toggle="modal" data-target="#modalhapus<?php echo e($hasil->id); ?>">Hapus</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th></th>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
    <?php if(count($normalisasi) > 0): ?>
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
                  <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th scope="col" class="sort" data-sort="status"><?php echo e($hasil->kriteria); ?></th>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                  <?php $__currentLoopData = $normalisasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($hasil->id == $hasil2->user_id): ?>
                  <td class="status" style="text-align:center">
                    <?php if($hasil2->kriteria->tipe == 'Benefit'): ?>
                    <?php echo e(round($hasil2->subkriteria->bobot
                      /
                      DB::table('normalisasi')
                      ->Join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
                      ->Join('users', 'normalisasi.user_id', '=', 'users.id')
                      ->where('users.tahun_masuk', '2021')
                      ->where('normalisasi.kriteria_id', $hasil2->kriteria_id)
                      ->max('subkriteria.bobot'),2)); ?>

                    <?php else: ?>
                    <?php echo e(round(DB::table('normalisasi')
                      ->Join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
                      ->Join('users', 'normalisasi.user_id', '=', 'users.id')
                      ->where('users.tahun_masuk', '2021')
                      ->where('normalisasi.kriteria_id', $hasil2->kriteria_id)
                      ->min('subkriteria.bobot')
                      /
                      $hasil2->subkriteria->bobot,2)); ?>

                    <?php endif; ?>
                  </td>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th></th>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                  <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th scope="col" class="sort" data-sort="status"><?php echo e($hasil->kriteria); ?><br><?php echo e($hasil->bobot); ?></th>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                  <?php $__currentLoopData = $normalisasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($hasil->id == $hasil2->user_id): ?>
                  <td class="status" style="text-align:center">
                    <?php if($hasil2->kriteria->tipe == 'Benefit'): ?>
                    <?php echo e(round(($hasil2->subkriteria->bobot
                      /
                      DB::table('normalisasi')
                      ->Join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
                      ->Join('users', 'normalisasi.user_id', '=', 'users.id')
                      ->where('users.tahun_masuk', '2021')
                      ->where('normalisasi.kriteria_id', $hasil2->kriteria_id)
                      ->max('subkriteria.bobot'))
                      *
                        $hasil2->kriteria->bobot,2)); ?>

                    <?php else: ?>
                    <?php echo e(round((DB::table('normalisasi')
                      ->Join('subkriteria', 'normalisasi.subkriteria_id', '=', 'subkriteria.id')
                      ->Join('users', 'normalisasi.user_id', '=', 'users.id')
                      ->where('users.tahun_masuk', '2021')
                      ->where('normalisasi.kriteria_id', $hasil2->kriteria_id)
                      ->min('subkriteria.bobot')
                      /
                      $hasil2->subkriteria->bobot)
                      *
                      $hasil2->kriteria->bobot,2)); ?>

                    <?php endif; ?>
                  </td>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th></th>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $no = 1 ?>
                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($hasil->level == '' && $hasil->status == 'Dalam Tahap Normalisasi'): ?>
                <tr>
                  <td class="no">
                    <?php echo e($no++); ?>

                  </td>
                  <td class="name">
                    <?php echo e($hasil->name); ?>

                  </td>
                  <td class="status">
                    <?php echo e(DB::table('subkriteria')
                      ->join('normalisasi', 'subkriteria.id', '=', 'normalisasi.subkriteria_id')
                      ->where('normalisasi.user_id', $hasil->id)
                      ->join('kriteria', 'subkriteria.kriteria_id', '=', 'kriteria.id')
                      ->where('kriteria.tipe', "Benefit")
                      ->sum('subkriteria.bobot')); ?>

                    /
                    <?php echo e(DB::table('subkriteria')
                      ->join('normalisasi', 'subkriteria.id', '=', 'normalisasi.subkriteria_id')
                      ->join('kriteria', 'subkriteria.kriteria_id', '=', 'kriteria.id')
                      ->where('kriteria.tipe', "Benefit")
                      ->max('subkriteria.bobot')); ?>

                  </td>
                  <td class="keterangan">
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
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div> -->
    <?php endif; ?>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<?php $__env->stopSection(); ?>
<?php if(count($user) > 0): ?>
<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="modalhapus<?php echo e($hasil->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo e(route('normalisasi.destroy', $hasil->id)); ?>">
          <?php echo csrf_field(); ?>
          <?php echo method_field('delete'); ?>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php echo $__env->make('template.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistem-penerimaan-siswa-baru\resources\views/admin/normalisasi/index.blade.php ENDPATH**/ ?>