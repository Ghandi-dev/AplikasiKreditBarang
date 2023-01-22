<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Data Penjualan</title>
  <?php //Loading head.php
    $this->load->view('admin/templates/head');
  ?>
  <style>
  .help-block{
    color: red;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
  }
</style>
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
            <h1 align="center">Tambah Data Penjualan</h1>
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
                <?php echo form_open_multipart('Admin/tambah','id="Eform"');?>
                  <div class="form-group">
                    <label>Kode Pelanggan</label>
                    <input type="hidden" name="uri" value="<?php echo $this->uri->segment(2) ?>" >
                    <input readonly type="text" name="kode_pelanggan" class="form-control" 
                     value="<?php echo $pelanggan->kode_pelanggan?>">
                  </div>
                  <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input readonly type="text" name="nama_pelanggan" class="form-control"
                     value="<?php echo $pelanggan->nama_pelanggan?>">
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" placeholder="Masukan nama barang">
                  </div>
                  <div class="form-group">
                    <label>Harga Beli</label>
                    <input type="text" name="harga_beli" class="form-control" placeholder="Masukan harga beli">
                  </div>
                  <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="text" name="harga_jual" class="form-control" placeholder="Masukan harga jual">
                  </div>
                  <div class="form-group">
                    <label>Nama Toko</label>
                    <input type="text" name="nama_toko" class="form-control" placeholder="Masukan nama toko">
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
          nama_barang: {
            required: true,
          },
          harga_beli: {
            required: true,
            digits: true,
          },
          harga_jual: {
            required: true,
            digits: true,
          },
          nama_toko: {
            required: true,
          },
        },
        messages: {
          nama_barang: {
            required: "Masukan nama barang",
          },
          harga_beli: {
            required: "Masukan harga",
            digits: "Mohon hanya angka yang dimasukan"
          },
          harga_jual: {
            required: "Masukan harga",
            digits: "Mohon hanya angka yang dimasukan"
          },
          nama_toko : "Masukan nama toko"
        }
      });
    });
</script>

</body>
</html>
