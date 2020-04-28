    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=base_url(); ?>"><i class="fas fa-university"></i> SISTEM-AKADEMIK</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SIKAD</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
              <a href="<?=base_url();?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Menu</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-university"></i> <span> Akademik</span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url('admin/jurusan'); ?>">Jurusan</a></li> 
                <li><a href="<?=base_url('admin/prodi'); ?>">Program Studi</a></li> 
                <li><a href="<?=base_url('admin/matakuliah'); ?>">Mata Kuliah</a></li> 
                <li><a href="<?=base_url('admin/mahasiswa'); ?>">Mahasiswa</a></li>
                <li><a href="<?=base_url('admin/tahunakademik'); ?>">Tahun Akademik</a></li>
                <li><a href="<?=base_url('admin/krs'); ?>">KRS</a></li>
                <li><a href="<?=base_url('admin/nilai/input_nilai'); ?>">Input Nilai</a></li>
                <li><a href="<?=base_url('admin/nilai'); ?>">KHS</a></li>
                <li><a href="">Cetak Transkip</a></li>
                <li><a href="">Dosen</a></li> 
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-wrench"></i> <span> Pengaturan</span></a>
              <ul class="dropdown-menu">
                <li><a href="">User</a></li> 
                <li><a href="">Menu</a></li> 
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-folder"></i> <span> Info Kampus</span></a>
              <ul class="dropdown-menu">
                <li><a href="">Identitas</a></li> 
                <li><a href="">Kategori</a></li>
                 <li><a href="">Tentang Kampus</a></li>
                 <li><a href="">Fasilitas</a></li>
                 <li><a href="">Materi Perkuliahan</a></li>
                 <li><a href="">Gallery</a></li>
                 <li><a href="">Kontak</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url('admin/auth/logout') ?>" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </li>
          </ul>
        </aside>
      </div>
