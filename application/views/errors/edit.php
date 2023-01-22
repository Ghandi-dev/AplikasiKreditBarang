<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Data Mahasiswa</title>
  <?php //Loading head.php
    $this->load->view('templates/head');
  ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php //Loading navbar.php
    $this->load->view('templates/navbar');
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php //Loading sidebar.php
    $this->load->view('templates/sidebar');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <div class="col-sm-12">
            <h1 align="center">Edit Data Mahasiswa</h1>
          </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="<?php echo base_url().'Admin/update';?>">
                  <?php 
                  foreach ($mahasiswa as $mhs) {
                  ?>
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $mhs->id?>">
                    <label>Nama Mahasiswa</label>
                    <input type="text" name="nama" class="form-control" 
                     value="<?php echo $mhs->nama?>">
                  </div>
                  <div class="form-group">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control"
                     value="<?php echo $mhs->nim?>">
                  </div>
                  <div class="form-group">
                    <label>Tangga Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" 
                     value="<?php echo $mhs->tgl_lahir?>">
                  </div>
                  <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control"
                     value="<?php echo $mhs->jurusan?>">
                  </div>
                  <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <?php  
                  }
                  ?>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php //Loading footer.php
  $this->load->view('templates/footer');
?>

</body>
</html>
