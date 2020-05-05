<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> User</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah User</h4>
            </div>
            <div class="card-body">
                <form action="<?=base_url('admin/user/tambah_user_aksi')?>" method="POST">
                <div class="form-group">
                  <label for="username">User Name :</label>
                  <input type="text" name="username" class="form-control " id="username">
                   <small class="form-text text-danger"><?=form_error('username'); ?></small>
                </div>
                <div class="form-group">
                  <label for="password">Password :</label>
                  <input type="password" name="password" class="form-control " id="password">
                  <small class="form-text text-danger"><?=form_error('password'); ?></small>
                </div>
                <div class="form-group">
                  <label for="email">Email :</label>
                  <input type="email" name="email" class="form-control " id="email">
                  <small class="form-text text-danger"><?=form_error('email'); ?></small>
                </div>
                <div>
                  <label for="level">Level:</label>
                  <select name="level" class="form-control">
                  <option value="">-Pilih-</option>
                  	<?php if ($level=='admin') { ?>
                  		 	<option value="admin" selected>Admin</option>
                  		 	<option value="user">Mahasiswa</option>

                	 <?php } else if ($level=='user') { ?>
                			<option value="admin">Admin</option>
                  		 	<option value="user" selected>Mahasiswa</option>

		             <?php   } else { ?>
		                	<option value="admin">Admin</option>
                  		 	<option value="user">Mahasiswa</option>		                }
                  		  
                  	 <?php } ?>

                  </select>
                  <small class="form-text text-danger"><?=form_error('level'); ?></small>
                </div>
                <div>
                  <label for="blokir">Blokir:</label>
                  <select name="blokir" class="form-control">
                  	<option value="">-Pilih-</option>
                  	<?php if ($blokir=='Y') { ?>
                  		 	<option value="Y" selected>YA</option>
                  		 	<option value="N">Tidak</option>

                	 <?php } else if ($blokir=='N') { ?>
                			<option value="Y">Ya</option>
                  		 	<option value="N" selected>Tidak</option>

		             <?php   } else { ?>
		                	<option value="Y">Ya</option>
                  		 	<option value="N">Tidak</option>		                }
                  		  
                  	 <?php } ?>
                  </select>
                  <small class="form-text text-danger"><?=form_error('blokir'); ?></small>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit" onclick="return confirm('Apakah ada yakin ingin Simpan data ini?')">Simpan</button>
                  </div>     
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>