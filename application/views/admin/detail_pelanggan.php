<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pelanggan</title>
  <style>
    /*Profile Card 5*/
    .profile-card-5{
        margin-top:20px;
        
        
    }
    .profile-card-5 .btn{
        border-radius:2px;
        text-transform:uppercase;
        font-size:12px;
        padding:7px 20px;
    }
    .profile-card-5 .card-img-block {
        width: 91%;
        margin: 0 auto;
        position: relative;
        top: -20px;
        
    }
    .profile-card-5 .card-img-block img{
        border-radius:5px;
        box-shadow:0 0 20px rgba(0,0,0,0.63);
    }
    .profile-card-5 h3{
        color:white;
        font-weight:600;
        font-size:28px;
    }
    .profile-card-5 p{
        color:white;
        font-size:14px;
        font-weight:500;
    }
    .profile-card-5 .btn-primary{
        background-color:#4E5E30;
        border-color:#4E5E30;
    }
  </style>

  <?php //Loading head.php
    $this->load->view('admin/templates/head');
  ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php //Loading navbar.php
    $this->load->view('admin/templates/navbar');
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php //Loading sidebar.php
    $this->load->view('admin/templates/sidebar');
  ?>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background: url('<?php echo base_url('assets/dist/') ?>img/bg.jpg') center center">
        <div class="content ">
            <div class="container ">
                <div class="row justify-content-center">
                    <!--Profile Card 5-->
                    <div class="col-md-4 mt-4">
                        <div class="card profile-card-5" style=" background: rgba(255,255,255,0.24); box-shadow: 10px 10px 20px #cbced1, -13px -13px 20px #02a1d1;">
                        <div class="card-img-block">
                            <img class="card-img-top" src="<?php echo base_url();?>assets/foto/<?php echo $pelanggan->foto_ktp;?>" width="279" height="181" alt="Card image cap">
                        </div>
                        <div class="card-body pt-0 " style="border : 2px;">
                            <h3 class="card-title"><?php echo $pelanggan->nama_pelanggan;?></h3>
                            <div class="card-text rounded" style="background: rgba(0,0,0,0.5);">
                                <span class="fa fa-phone" style="font-size:25px; color: white;"></span>
                                <p><?php echo $pelanggan->nomor_hp;?></p>
                            </div>
                            <div class="card-text rounded" style="background: rgba(0,0,0,0.5);">
                                <span class="fa fa-house-user" style="font-size:25px; color: white;"></span>
                                <p><?php echo $pelanggan->alamat;?></p>
                            </div>
                        </div>
                        </div>
                        <h2 class="mt-3 w-100 float-left text-center" style="color: white;"><strong>Data Pelanggan</strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php //Loading footer.php
  $this->load->view('admin/templates/footer');
?>
</body>
</html>
