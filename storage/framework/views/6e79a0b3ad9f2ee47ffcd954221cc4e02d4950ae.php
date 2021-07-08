<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <p style="color:grey">
          <b>
            SDIT BUNAYYA<br> LHOKSEUMAWE
          </b>
        </p>
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <?php if(auth()->user()->level == 'admin'): ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo e(route('home')); ?>">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('grafik.index')); ?>">
              <i class="ni ni-chart-bar-32 text-default"></i>
              <span class="nav-link-text">Grafik</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('kriteria.index')); ?>">
              <i class="ni ni-bullet-list-67 text-default"></i>
              <span class="nav-link-text">Kriteria</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('pendaftar.index')); ?>">
              <i class="ni ni-bullet-list-67 text-default"></i>
              <span class="nav-link-text">Pendaftar</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('normalisasi.index')); ?>">
              <i class="ni ni-bullet-list-67 text-default"></i>
              <span class="nav-link-text">Normalisasi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('hasil.index')); ?>">
              <i class="ni ni-bullet-list-67 text-default"></i>
              <span class="nav-link-text">Hasil</span>
            </a>
          </li>
        </ul>
        <?php elseif(auth()->user()->level == 'kepsek'): ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo e(route('home')); ?>">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('grafik.index')); ?>">
              <i class="ni ni-chart-bar-32 text-default"></i>
              <span class="nav-link-text">Grafik</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('infopendaftar.index')); ?>">
              <i class="ni ni-bullet-list-67 text-default"></i>
              <span class="nav-link-text">Info Pendaftar</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('infohasil.index')); ?>">
              <i class="ni ni-bullet-list-67 text-default"></i>
              <span class="nav-link-text">Info Hasil</span>
            </a>
          </li>
        </ul>
        <?php else: ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo e(route('home')); ?>">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('biodata.index')); ?>">
              <i class="ni ni-bullet-list-67 text-default"></i>
              <span class="nav-link-text">Biodata</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('hasilsiswa.index')); ?>">
              <i class="ni ni-bullet-list-67 text-default"></i>
              <span class="nav-link-text">Hasil</span>
            </a>
          </li>
        </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
<?php /**PATH C:\xampp\htdocs\sistem-penerimaan-siswa-baru\resources\views/template/sidebar.blade.php ENDPATH**/ ?>