
<?php $__env->startSection('sub-judul','Kriteria'); ?>
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
            <?php $no = 1 ?>
            <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td class="no">
                <?php echo e($no++); ?>

              </td>
              <td class="name">
                <?php echo e($hasil->kriteria); ?>

              </td>
              <td class="budget">
                <?php echo e($hasil->bobot); ?>

              </td>
              <td class="tipe">
                <?php echo e($hasil->tipe); ?>

              </td>
              <td class="text-right">
                <!-- <div class="dropdown">
                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalupdate<?php echo e($hasil->id); ?>">Ubah</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalhapus<?php echo e($hasil->id); ?>">Hapus</a>
                  </div>
                </div> -->
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="2"> Total Bobot </th>
              <th><?php echo e(DB::table('kriteria')->sum('bobot')); ?></th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <h3 class="mb-0"><i class="fas fa-table mr-1"></i>Tabel Sub-Kriteria "<?php echo e($hasil->kriteria); ?>"</h3>
        <div class="col-lg-12 col-12 text-right">
          <!-- <a href="#" class="btn btn-sm btn-primary"data-toggle="modal" data-target="#Modalsubkriteria<?php echo e($hasil->id); ?>"><i class="fas fa-plus-circle"></i> Tambah Sub-Kriteria</a> -->
        </div>
      </div>
      <!-- <div class="card-header"> -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalsubkriteria<?php echo e($hasil->id); ?>"><i class="fas fa-plus-circle"></i><span> Tambah sub-Kriteria</span></button><br><br> -->
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
            <?php $no = 1 ?>
            <?php $__currentLoopData = $subkriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($hasil2->kriteria_id == $hasil->id): ?>
            <tr>
              <td class="no">
                <?php echo e($no++); ?>

              </td>
              <td class="name">
                <?php echo e($hasil2->subkriteria); ?>

              </td>
              <td class="budget">
                <?php echo e($hasil2->bobot); ?>

              </td>
              <td class="text-right">
                <!-- <div class="dropdown">
                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalupdatesub<?php echo e($hasil2->id); ?>">Ubah</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalhapussub<?php echo e($hasil2->id); ?>">Hapus</a>
                  </div>
                </div> -->
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
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
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
      <form class="" action="<?php echo e(route('kriteria.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
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
                <option value="<?php echo e('Cost'); ?>">Cost</option>
                <option value="<?php echo e('Benefit'); ?>">Benefit</option>
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
<?php if(count($kriteria) > 0): ?>
<?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="Modalsubkriteria<?php echo e($hasil->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="<?php echo e(route('subkriteria.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
      <div class="modal-body">
        <input type="hidden" name="kriteria_id" value="<?php echo e($hasil->id); ?>">
          <div class="form-group">
            <label for="subkriteria">Sub-Kriteria</label>
            <input type="text" name="subkriteria" class="form-control" id="subkriteria" placeholder="Sub-Kriteria" required>
          </div>
          <div class="form-group">
              <label>Bobot</label>
              <select class="form-control" name="bobot">
                <option value="<?php echo e(1); ?>"><?php echo e(1); ?></option>
                <option value="<?php echo e(2); ?>"><?php echo e(2); ?></option>
                <option value="<?php echo e(3); ?>"><?php echo e(3); ?></option>
                <option value="<?php echo e(4); ?>"><?php echo e(4); ?></option>
                <option value="<?php echo e(5); ?>"><?php echo e(5); ?></option>
                <option value="<?php echo e(6); ?>"><?php echo e(6); ?></option>
                <option value="<?php echo e(7); ?>"><?php echo e(7); ?></option>
                <option value="<?php echo e(8); ?>"><?php echo e(8); ?></option>
                <option value="<?php echo e(9); ?>"><?php echo e(9); ?></option>
                <option value="<?php echo e(10); ?>"><?php echo e(10); ?></option>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(count($subkriteria) > 0): ?>
<?php $__currentLoopData = $subkriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="modalupdatesub<?php echo e($hasil->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="<?php echo e(route('subkriteria.update',$hasil->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
      <div class="modal-body">
          <div class="form-group">
            <label for="subkriteria">Sub-Kriteria</label>
            <input type="text" name="subkriteria" value="<?php echo e($hasil->subkriteria); ?>" class="form-control" id="subkriteria" placeholder="Sub-Kriteria" required>
          </div>
          <div class="form-group">
              <label>Bobot</label>
              <select class="form-control" name="bobot">
                <option value="<?php echo e(1); ?>"><?php echo e(1); ?></option>
                <option value="<?php echo e(2); ?>"><?php echo e(2); ?></option>
                <option value="<?php echo e(3); ?>"><?php echo e(3); ?></option>
                <option value="<?php echo e(4); ?>"><?php echo e(4); ?></option>
                <option value="<?php echo e(5); ?>"><?php echo e(5); ?></option>
                <option value="<?php echo e(6); ?>"><?php echo e(6); ?></option>
                <option value="<?php echo e(7); ?>"><?php echo e(7); ?></option>
                <option value="<?php echo e(8); ?>"><?php echo e(8); ?></option>
                <option value="<?php echo e(9); ?>"><?php echo e(9); ?></option>
                <option value="<?php echo e(10); ?>"><?php echo e(10); ?></option>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(count($kriteria) > 0): ?>
<?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="modalupdate<?php echo e($hasil->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="<?php echo e(route('kriteria.update',$hasil->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
      <div class="modal-body">
          <div class="form-group">
            <label for="kriteria">Kriteria</label>
            <input type="text" name="kriteria" value="<?php echo e($hasil->kriteria); ?>" class="form-control" id="kriteria" placeholder="Kriteria" readonly>
          </div>
          <div class="form-group">
            <label for="bobot">Bobot</label>
            <input type="text" name="bobot" value="<?php echo e($hasil->bobot); ?>" class="form-control" id="bobot" placeholder="Bobot" required>
          </div>
          <!-- <div class="form-group">
              <label>Bobot</label>
              <select class="form-control" name="tipe">
                <option value="<?php echo e('Cost'); ?>">Cost</option>
                <option value="<?php echo e('Benefit'); ?>">Benefit</option>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(count($kriteria) > 0): ?>
<?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="modalhapus<?php echo e($hasil->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo e(route('kriteria.destroy', $hasil->id)); ?>">
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
<?php if(count($subkriteria) > 0): ?>
<?php $__currentLoopData = $subkriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="modalhapussub<?php echo e($hasil->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo e(route('subkriteria.destroy', $hasil->id)); ?>">
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

<?php echo $__env->make('template.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistem-penerimaan-siswa-baru\resources\views/admin/kriteria/index.blade.php ENDPATH**/ ?>