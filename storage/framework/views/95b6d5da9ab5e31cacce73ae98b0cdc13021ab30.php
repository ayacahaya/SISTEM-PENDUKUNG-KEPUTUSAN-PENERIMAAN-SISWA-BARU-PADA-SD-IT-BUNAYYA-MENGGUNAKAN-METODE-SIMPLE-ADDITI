
<?php $__env->startSection('sub-judul','Pendaftar'); ?>
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
      <div class="card-header border-0">
        <h3 class="mb-0"><i class="fas fa-table mr-1"></i>Tabel Pendaftar</h3>
      </div>
          <!-- <div class="card"> -->
            <!-- Card header -->
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
                  <?php $no = 1 ?>
                  <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($hasil->level == '' && $hasil->tahun_masuk == '2021'): ?>
                  <tr>
                    <td class="no">
                      <?php echo e($no++); ?>

                    </td>
                    <td class="name">
                      <?php echo e($hasil->name); ?>

                    </td>
                    <td class="status">
                      <?php if($hasil->status == ''): ?>
                      Belum Dilakukan Normalisasi Data
                      <?php else: ?>
                      <?php echo e($hasil->status); ?>

                      <?php endif; ?>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <?php if($hasil->status == ''): ?>
                          <a class="dropdown-item" data-toggle="modal" data-target="#modalinput<?php echo e($hasil->id); ?>">Input Normalisasi Data</a>
                          <?php endif; ?>
                          <a class="dropdown-item" data-toggle="modal" data-target="#modalinfo<?php echo e($hasil->id); ?>">Lihat Data Pendaftar</a>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<?php $__env->stopSection(); ?>
<?php if(count($user) > 0): ?>
<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="modalinput<?php echo e($hasil->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="<?php echo e(route('pendaftar.update',$hasil->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
      <div class="modal-body">
          <div class="form-group">
            <label for="pendaftar">Nama Pendaftar</label>
            <input type="text" name="pendaftar" value="<?php echo e($hasil->name); ?>" class="form-control" id="pendaftar" placeholder="Pendaftar" readonly>
          </div>
          <input type="hidden" name="status" value="<?php echo e('Dalam Tahap Normalisasi'); ?>">
          <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <input type="hidden" name="user_id[]" value="<?php echo e($hasil->id); ?>">
          <input type="hidden" name="kriteria_id[]" value="<?php echo e($hasil2->id); ?>">
          <div class="form-group">
              <label><?php echo e($hasil2->kriteria); ?></label>
              <select class="form-control" name="subkriteria_id[]">
                <?php $__currentLoopData = $subkriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($hasil2->id == $hasil3->kriteria_id): ?>
                <option value="<?php echo e($hasil3->id); ?>"><?php echo e($hasil3->subkriteria); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i><span> Simpan</span></button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(count($user) > 0): ?>
<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="modalinfo<?php echo e($hasil->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="" method="post">
        <?php echo csrf_field(); ?>
      <div class="modal-body">
          <div class="form-group">
            <label for="pendaftar">Nama Pendaftar</label>
            <input type="text" name="pendaftar" value="<?php echo e($hasil->name); ?>" class="form-control" id="pendaftar" placeholder="Pendaftar" readonly>
          </div>
          <?php $__currentLoopData = $biodata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($hasil2->user_id == $hasil->id): ?>
          <!-- <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number" name="umur" value="<?php echo e($hasil->biodata->umur); ?>" class="form-control" id="umur" placeholder="Umur" readonly>
          </div> -->
          <div class="form-group">
            <label for="jns_kelamin">Jenis Kelamin</label>
            <input type="text" name="jns_kelamin" value="<?php echo e($hasil->biodata->jns_kelamin); ?>" class="form-control" id="jns_kelamin" placeholder="Jenis Kelamin" readonly>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" value="<?php echo e($hasil->biodata->alamat); ?>" class="form-control" id="alamat" placeholder="Alamat" readonly>
          </div>
          <div class="form-group">
            <label for="tmp_lahir">Tempat Lahir</label>
            <input type="text" name="tmp_lahir" value="<?php echo e($hasil->biodata->tmp_lahir); ?>" class="form-control" id="tmp_lahir" placeholder="Tempat Lahir" readonly>
          </div>
          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" value="<?php echo e($hasil->biodata->tgl_lahir); ?>" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" readonly>
          </div>
          <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" name="kecamatan" value="<?php echo e($hasil->biodata->kecamatan); ?>" class="form-control" id="kecamatan" placeholder="Kecamatan" readonly>
          </div>
          <div class="form-group">
            <label for="kabupaten">Kabupaten / Kota</label>
            <input type="text" name="kabupaten" value="<?php echo e($hasil->biodata->kabupaten); ?>" class="form-control" id="kabupaten" placeholder="Kabupaten" readonly>
          </div>
          <div class="form-group">
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" name="nama_ayah" value="<?php echo e($hasil->biodata->nama_ayah); ?>" class="form-control" id="nama_ayah" placeholder="Nama Ayah" readonly>
          </div>
          <div class="form-group">
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" name="nama_ibu" value="<?php echo e($hasil->biodata->nama_ibu); ?>" class="form-control" id="nama_ibu" placeholder="Nama Ibu" readonly>
          </div>
          <!-- <div class="form-group">
            <label for="no_hp">NO HP</label>
            <input type="text" name="no_hp" value="<?php echo e($hasil->biodata->no_hp); ?>" class="form-control" id="no_hp" placeholder="NO HP" readonly>
          </div> -->
          <div class="form-group">
            <label for="pekerjaan_ortu">Pekerjaan Orang Tua</label>
            <input type="text" name="pekerjaan_ortu" value="<?php echo e($hasil->biodata->pekerjaan_ortu); ?>" class="form-control" id="pekerjaan_ortu" placeholder="Pekerjaan Orang Tua" readonly>
          </div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="modal-footer">
        <!-- <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i><span> Simpan</span></button> -->
      </div>
    </form>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php echo $__env->make('template.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistem-penerimaan-siswa-baru\resources\views/admin/pendaftar/index.blade.php ENDPATH**/ ?>