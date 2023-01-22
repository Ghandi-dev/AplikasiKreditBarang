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
  <link rel="stylesheet" href="<?php echo base_url('assets/dist')?>/css/bootstrap.css">
  <style>
        /* Importing fonts from Google */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

    /* Reseting */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }


    .wrapper {
      width: 350px;
      height: 500px;
      margin: 80px auto;
      padding: 40px 30px 30px 30px;
      background-color: #ecf0f3;
      border-radius: 15px;
      box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
    }

    .logo {
      width: 80px;
      margin: auto;
    }

    .logo img {
      width: 100%;
      height: 80px;
      object-fit: cover;
      border-radius: 50%;
      box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7,
        -8px -8px 15px #fff;
    }

    .wrapper .name {
      font-weight: 600;
      font-size: 2.4rem;
      letter-spacing: 1.3px;
      padding-left: 10px;
      color: #555;
      margin-top: 15px;
      color: white;
    }

    /* input {
      width: 100%;
      display: block;
      border: none;
      outline: none;
      background: none;
      font-size: 2.2rem;
      color: #666;
      padding: 10px 15px 10px 10px;
      margin-top: 30px;
    } */

    .input-group {
      padding-left: 10px;
      margin-bottom: 20px;
      border-radius: 20px;
      box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
    }

    .wrapper .input-group .fas {
      color: #555;
      font-size: 30px;
    }

    .wrapper .btn {
      box-shadow: none;
      width: 100%;
      height: 40px;
      background-color: #03a9f4;
      color: #fff;
      border-radius: 25px;
      box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
      letter-spacing: 1.3px;
    }

    .wrapper .btn:hover {
      background-color: #039be5;
    }

    @media (max-width: 380px) {
      .wrapper {
        margin: 30px 20px;
        padding: 40px 15px 15px 15px;
      }
    }

  </style>
</head>
<body class="hold-transition login-page" style="background: url('<?php echo base_url('assets/dist/') ?>img/bg.jpg') center center">
    <div class="wrapper" style="background: rgba(255,255,255,0.2); ">
        <div class="logo">
            <img src="<?php echo base_url()?>assets/dist/img/logo123.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            SIKERANG
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
          <input type="text" class="form-control" name="username" id="userName" placeholder="Username" style="background: none; border: none; font-size: 1.2rem;" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-astronaut"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password"  id="pwd" placeholder="Password" style="background: none; border: none; font-size: 1.2rem;">
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