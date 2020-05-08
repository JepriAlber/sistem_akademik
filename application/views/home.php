
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>UNIVERSITAS BAHAGIA</title>

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
      <?php foreach ($identitas as $iden): ?>
        <nav class="navbar navbar-expand-lg main-navbar">
        <a href="index.html" class="navbar-brand sidebar-gone-hide"><?=$iden->judul_website; ?></a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <li class="nav-item active"><a href="#" class="nav-link"><?=$iden->alamat; ?></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><?=$iden->email; ?> / <?=$iden->telp; ?></a></li>
          </ul>
        </div>
        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
              <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Result
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="assets/img/products/product-3-50.png" alt="product">
                  oPhone S9 Limited Edition
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="assets/img/products/product-1-50.png" alt="product">
                  Headphone Blitz
                </a>
              </div>
              <div class="search-header">
                Projects
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                  </div>
                  Stisla Admin Template
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                  </div>
                  Create a new Homepage Design
                </a>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <a href="" class="btn btn-sm btn-warning ml-2">Login</a> 
        </ul>
      </nav>
      <?php endforeach ?>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="far fa-heart"></i><span>BERANDA</span></a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="far fa-heart"></i><span>FASILITAS</span></a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="far fa-heart"></i><span>INFORMASI</span></a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="far fa-heart"></i><span>TENTANG KAMPUS</span></a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="far fa-heart"></i><span>GALLERY</span></a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="far fa-heart"></i><span>KONTAK</span></a>
            </li>
          </ul>
        </div>
         
      </nav>
       
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?=base_url('assets/img/kampus.jpg') ?>" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="<?=base_url('assets/img/kampus.jpg') ?>" class="d-block w-100" alt="...">
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
          <div class="section-header">
            <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Top Navigation</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">This is Example Page</h2>
            <p class="section-lead">This page is just an example for you to create your own page.</p>
            <div class="card">
              <div class="card-header">
                <h4>Example Card</h4>
              </div>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
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