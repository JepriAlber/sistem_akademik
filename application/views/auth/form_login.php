<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <!-- <div class="login-brand">
              <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div> -->

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <?=$this->session->flashdata('pesan'); ?>
                <form method="POST" action="<?=base_url('admin/auth/proses_login') ?>" >
                  <div class="form-group">
                    <label for="username">username</label>
                    <input id="username" type="text" class="form-control"  name="username" autofocus>
                    <small class="form-text text-danger"><?=form_error('username'); ?></small>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" autofocus>
                     <small class="form-text text-danger"><?=form_error('password'); ?></small>
                   </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" >
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Belum Punya Akun? <a href="<?=base_url('registrasi/index'); ?>">Daftar!</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
