<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pelanggan</title>
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <div class="col-sm-12">
            <h1 align="center">Data Pelanggan</h1>
          </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <button class="btn btn-primary" data-toggle="modal" data-target="#inputModal"><i class="fa fa-plus"></i>Tambah Data Pelanggan</button>
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr class="bg-info">
                    <th>NO</th>
                    <th>NAMA PELANGGAN</th>
                    <th>ALAMAT</th>
                    <th>NOMOR HP</th>
                    <th>AKSI</th>  
                    <th>AKSI</th>  
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                  foreach($pelanggan as $plg) : ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $plg->nama_pelanggan ?></td>
                    <td><?php echo $plg->alamat ?></td>
                    <td><?php echo $plg->nomor_hp ?></td> 
                    <td onclick="javascript: return  confirm('Anda  yakin  hapus?')">
                      <?php 
                      echo anchor('Admin/hapus/'.$plg->kode_pelanggan,
                        '<div  class="btn  btn-danger  btn-sm">
                            <i class="fa fa-trash"></i>
                         </div>')
                      ?>
                    </td>
                    <td>
                    <?php
                     echo anchor('Admin/edit/'.$plg->kode_pelanggan.'/'.$this->uri->segment(2),
                        '<div class="btn btn-primary btn-sm"> 
                            <i class="fa fa-edit"></i>
                         </div>') ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
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
        <!-- Modal -->
        <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA PELANGGAN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo base_url().'Admin/tambah';?>">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" name="uri" value="<?php echo $this->uri->segment(2) ?>">
                    <input type="text" name="nama" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Nomor Hp</label>
                    <input type="text" name="nomor_hp" class="form-control">
                  </div>
                  <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
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
        "buttons": ["copy","pdf","excel","colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>
</html>
