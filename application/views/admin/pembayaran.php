<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pembayaran</title>
  <!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins')?>/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins')?>/datatables-buttons/css/buttons.bootstrap4.min.css">
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background: url('<?php echo base_url('assets/dist/') ?>img/bg.jpg') center center">
    <!-- <div class="container"> -->
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="info-box" style="background: rgba(255, 255, 255, 0.2);box-shadow: 10px 10px 12px rgba(255, 255, 255, 0.4);">
            <span class="info-box-icon bg-info"><i class="fa fa-money-bill"></i></span>
            <div class="info-box-content">
              <h2 style="color: white;">Data Pembayaran</h2>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <!-- </div> -->
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
                <div class="table-responsive-sm">
                  <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="bg-info">
                      <th>NO</th>
                      <th>NAMA PELANGGAN</th>
                      <th>NAMA BARANG</th>
                      <th>HARGA JUAL</th>
                      <th>AKSI</th>  
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach($pembayaran as $p) : ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $p->nama_pelanggan ?></td>
                      <td><?php echo $p->nama_barang ?></td>
                      <td><?php echo Rupiah($p->harga_jual)?></td>
                      <td style="text-align : center;">
                      <?php
                      echo anchor('Admin/detail/'.$p->kode_penjualan.'/'.$p->harga_jual,
                          '<div class="btn btn-success btn-sm"> 
                            <i class="fa fa-search-plus"></i>
                          </div>') ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
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
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/plugins')?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
      });
    });
</script>
</body>
</html>
