
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>UNIVERSITAS KEBAHAGIAN</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/fontawesome/css/all.min.css'); ?>">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/components.css') ?>">
<!-- Start GA -->
<script async src="<?=base_url('assets/js/googletagmanager.js?id=UA-94034622-3'); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <?php foreach ($identitas as $iden): ?>
        <a href="index.html" class="navbar-brand sidebar-gone-hide"><?=$iden->judul_website; ?></a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
          </a>
          <ul class="navbar-nav">
            <li class="nav-item active"><a href="#" class="nav-link"><?=$iden->alamat; ?></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><?=$iden->email; ?> / <?=$iden->telp; ?></a></li>
          </ul>
        </div>
        <?php endforeach ?>
        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <!-- <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
            </div>
          </div> -->
        </form>
        <ul class="navbar-nav navbar-right">
          <a href="<?=base_url('admin/auth') ?>" class="d-sm-none d-lg-inline-block btn btn-warning ml-4">Hey, Login sini!!</a>
        </ul>
      </nav>      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="fas fa-user"></i><span>BERANDA</span></a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="fas fa-th-large"></i><span>FASILITAS</span></a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="fas fa-laptop"></i><span>INFORMASI</span></a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="fas fa-history"></i><span>TENTANG KAMPUS</span></a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="fas fa-images"></i><span>GALLERY</span></a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="fas fa-inbox"></i><span>KONTAK</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="main-content">

        <section class="section">
          <div class="section-header">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?=base_url('assets/img/UniversitasKebahagian1.png') ?>" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="<?=base_url('assets/img/UniversitasKebahagian2.png') ?>" class="d-block w-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          </div>
<!--   -----------------------Tentang Kampus----------------------------- -->
          <div class="card text-center card-primary">
              <div class="card-header">
                <h4>TENTANG KAMPUS</h4>
              </div>
              <div class="card-body">
                <?php foreach ($tentang as $ttg): ?>
                  <p><?=word_limiter($ttg->sejarah,10); ?></p>
                <?php endforeach ?>
              </div>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#selanjutnya">Selengkapnya..</button>
              <div class="card-footer text-muted">
              </div>
          </div>
<!--       ------------------------Informasi Kampus------------------------ -->
        <di class="row text-center mt-3 ml-1">
            <?php foreach ($informasi as $info): ?>
              <div class="card ml-1 card-primary" style="width: 17rem;">
                <span class="display-2 text-center text-info">
                  <i class="<?=$info->icon; ?>"></i>
                </span>
                <div class="card-body">
                  <h5 class="card-title"><?=$info->judul_informasi; ?></h5>
                  <p class="card-text"><?=$info->isi_informasi; ?></p>
                </div>
              </div> 
            <?php endforeach ?>
          </di>
<!--       ----------------------------Hubungi Kami ------------------------------- -->
              <?=$this->session->flashdata('pesan'); ?>
              <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="d-inline">Hubungi Kami..</h4>
                    </div>
                    <div class="card-body">
                      <form action="<?=base_url('home/kirim_pesan')?>" method="POST">
                        
                        <div class="form-group">
                          <label for="nama">Nama :</label>
                          <input type="txt" name="nama" id="nama" class="form-control">
                          <small class="form-text text-danger"><?=form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                          <label for="email">Email :</label>
                          <input type="email" name="email" id="email" class="form-control">
                          <small class="form-text text-danger"><?=form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                          <label for="pesan">Pesan :</label>
                          <textarea name="pesan" id="pesan" class="form-control"></textarea>
                          <small class="form-text text-danger"><?=form_error('pesan'); ?></small>
                        </div>
                        <button class="btn btn-primary btn-sm">Kirim</button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </section>
      </div>
          <!-- Modal -->
          <div class="modal fade" id="selanjutnya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tentang Kampus</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <?php foreach ($tentang as $ttg): ?>
                      <h6>Sejarah Kampus</h6>
                        <p><?=$ttg->sejarah; ?></p>
                      <h6>Visi</h6>
                        <p><?=$ttg->visi; ?></p>
                      <h6>Misi</h6>
                        <p><?=$ttg->misi; ?></p>
                    <?php endforeach ?>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="">Jepri Alber</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>

<!-- General JS Scripts -->
  <script src="<?=base_url('assets/modules/jquery.min.js'); ?>"></script>
  <script src="<?=base_url('assets/modules/popper.js'); ?>"></script>
  <script src="<?=base_url('assets/modules/tooltip.js'); ?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?=base_url('assets/modules/nicescroll/jquery.nicescroll.min.js'); ?>"></script>
  <script src="<?=base_url('assets/modules/moment.min.js'); ?>"></script>
  <script src="<?=base_url('assets/js/stisla.js'); ?>"></script>
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?=base_url('assets/js/scripts.js'); ?>"></script>
  <script src="<?=base_url('assets/js/custom.js'); ?>"></script>
</body>
</html>