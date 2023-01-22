<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Data Penjualan</title>
  <style>
  .help-block{
    color: red;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
  }
</style>
  <?php //Loading head.php
    $this->load->view('admin/templates/head');
  ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
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
            <div class="box">
              <!-- /.card-header -->
              <div class="box-body">
                <?php echo form_open_multipart('Admin/update','id="Eform"');?>
                  <div class="form-group">
                    <input type="hidden" name="uri" value="<?php echo $this->uri->segment(4) ?>">
                    <input type="hidden" name="kode_pembayaran" value="<?php echo $pembayaran->kode_pembayaran?>">
                    <input type="hidden" name="kode_penjualan" value="<?php echo $pembayaran->kode_penjualan?>">
                    <input type="hidden" name="sisa" value="<?php echo $pembayaran->sisa_bayar?>">
                    <label>Tanggal Bayar</label>
                    <input type="date" name="tgl_bayar" class="form-control" 
                     value="<?php echo $pembayaran->tgl_bayar?>">
                  </div>
                  <div class="form-group">
                    <label>Bayar</label>
                    <input type="text" name="bayar2" class="form-control"value="<?php echo $pembayaran->bayar?>">
                    <input type="hidden" name="var" class="form-control"value="<?php echo $pembayaran->harga_jual?>">
                    <input type="hidden" name="bayar" class="form-control"value="<?php echo $pembayaran->bayar?>">
                  </div>
                  <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
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
<script>
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
      $("#Eform").validate({
        rules: {
          tgl_bayar: {
            required: true,
          },
          bayar2: {
            required: true,
            digits: true,
          }
        },
        messages: {
          tgl_bayar: {
            required: "Masukan tanggal",
          },
          bayar2: {
            required: "Masukan nominal",
            digits: "Mohon hanya angka yang dimasukan"
          }
        }
      });
    });
</script>

</body>
</html>
