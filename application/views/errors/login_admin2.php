<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Pembukuan</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/style_admin.css">
</head>
<body class="hold-transition login-page">
    <div class="wrapper">
        <div class="logo">
            <img src="<?php echo base_url()?>assets/dist/img/logo123.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            SIKUAN
        </div>
        <form class="p-3 mt-3" action="<?php echo base_url('Login/validasi_admin'); ?>" method="post">
            <!-- <div class="input-group mb-3">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="userName" placeholder="Username">
            </div>
            <div class="input-group mb-3">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div> -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" id="userName" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password"  id="pwd" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
            <button type="submit"class="btn mt-3">Login</button>
        </form>
    </div>
<!-- jQuery -->
<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>	
</body>
</html>