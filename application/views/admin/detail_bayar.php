<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pelanggan</title>
  <style>
  .help-block{
    color: red;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
  }
</style>
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
    <section class="content-header" style="background: url('<?php echo base_url('assets/dist/') ?>img/bg.jpg') center center">
    <div class="row justify-content-center">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box" style="background: rgba(255, 255, 255, 0.2);box-shadow: 10px 10px 12px rgba(255, 255, 255, 0.4);">
              <span class="info-box-icon bg-info"><i class="fa fa-users"></i></i></span>

              <div class="info-box-content">
                <h2 style="color: white;">Data Pelanggan</h2>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#inputModal" style="margin-bottom: 10px;"><i class="fa fa-plus"></i>Tambah Data Bayar</button>
                <?php
                        echo anchor('Admin/print/'.$bayar['id'],
                          '<div class="btn btn-danger" style="margin-bottom: 10px;"> 
                          <i class="fa fa-fax"> Print </i>
                          </div>') ?>
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="bg-info">
                      <th>NO</th>
                      <th>NAMA PELANGGAN</th>
                      <th>NAMA BARANG</th>
                      <th>HARGA BARANG</th>
                      <th>TANGGAL BAYAR</th>  
                      <th>BAYAR</th>  
                      <th>SISA</th>  
                      <th>AKSI</th>  
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $sisa = null;
                    foreach($pembayaran as $plg) : ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $plg->nama_pelanggan ?></td>
                      <td><?php echo $plg->nama_barang ?></td>
                      <td><?php echo Rupiah($plg->harga_jual)?></td> 
                      <td><?php echo $plg->tgl_bayar ?></td> 
                      <td><?php echo Rupiah($plg->bayar) ?></td> 
                      <td><?php echo Rupiah($plg->sisa_bayar); $sisa = $plg->sisa_bayar;?></td> 
                      <td >
                        <span onclick="javascript: return  confirm('Anda  yakin  hapus?')">  
                          <?php 
                        echo anchor('Admin/hapus_detail/'.$plg->kode_pembayaran.'/'.$bayar['id'].'/'.$bayar['harga'].'/'.$this->uri->segment(2),
                        '<div  class="btn  btn-danger  btn-sm">
                        <i class="fa fa-trash"></i>
                        </div>')
                        ?>  
                        </span>|
                        <span>
                          <?php
                        echo anchor('Admin/edit/'.$plg->kode_pembayaran.'/'.$this->uri->segment(2),
                          '<div class="btn btn-primary btn-sm"> 
                          <i class="fa fa-edit"></i>
                          </div>') ?>
                          </span>
                      </td>
                    </tr>
                    <?php
                      endforeach; ?>
                    </tbody>
                  </table>
                </div>  
                <?php 
                    if ($sisa == null) {
                        $a = $bayar['harga'];
                    }else {
                        $a = $sisa;
                    }
                ?>
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
                <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA PEMBAYARAN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo form_open_multipart('Admin/tambah','id="modal"');?>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="hidden" name="uri" value="<?php echo $this->uri->segment(2) ?>">
                    <input type="hidden" name="kode_penjualan" value="<?php echo $bayar['id'] ?>">
                    <input type="hidden" name="var" value="<?php echo $bayar['harga'] ?>">
                    <input type="date" name="tgl_bayar" class="form-control" <?php if ($a <= 0){ echo 'readonly';} ?> >
                  </div>
                  <div class="form-group">
                    <label>Bayar</label>
                    <input type="text" name="bayar" class="form-control" <?php if ($a <= 0){ echo 'readonly';} ?> >
                    <input type="hidden" name="sisa" class="form-control" value="<?php echo $a; ?>">
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
        "buttons": ["copy","pdf","excel"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $(function() {
      $.validator.setDefaults({
    errorClass: 'help-block',
    highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('has-error');
    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('has-error');
    },
  });
      $("#modal").validate({
        rules: {
          tgl_bayar: {
            required: true,
            date: true,
          },
          bayar: {
            required: true,
            digits: true,
          },
        },
        messages: {
          tgl_bayar: {
            required: "Masukan tanggal",
          },
          bayar: {
            required: "Masukan nominal",
            digits: "Mohon hanya angka yang dimasukan"
          },
        }
      });
    });
</script>
</body>
</html>
