<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Data Penjualan</title>
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <div class="col-sm-12">
            <h1 align="center">Edit Data Penjualan</h1>
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
                  foreach ($penjualan as $p) {
                  ?>
                  <div class="form-group">
                    <input type="hidden" name="uri" value="<?php echo $this->uri->segment(4) ?>">
                    <input type="hidden" name="kode_penjualan" value="<?php echo $p->kode_penjualan?>">
                    <label>Nama Pelanggan</label>
                    <input readonly type="text" name="nama_pelanggan" class="form-control" 
                     value="<?php echo $p->nama_pelanggan?>">
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control"
                     value="<?php echo $p->nama_barang?>">
                  </div>
                  <div class="form-group">
                    <label>Harga Barang</label>
                    <input type="text" name="harga_barang" class="form-control" 
                     value="<?php echo $p->harga_barang?>">
                  </div>
                  <div class="form-group">
                    <label>Nama Toko</label>
                    <input type="text" name="nama_toko" class="form-control" 
                     value="<?php echo $p->nama_toko?>">
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
  $this->load->view('admin/templates/footer');
?>

</body>
</html>
