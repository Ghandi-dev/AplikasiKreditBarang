<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Data Pelanggan</title>
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
            <h1 align="center">Edit Data Pelanggan</h1>
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
                <?php echo form_open_multipart('Admin/update','id="Eform"');?>
                  <div class="form-group">
                    <input type="hidden" name="uri" value="<?php echo $this->uri->segment(4) ?>">
                    <input type="hidden" name="kode_pelanggan" value="<?php echo $pelanggan->kode_pelanggan?>">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $pelanggan->nama_pelanggan?>">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control"
                     value="<?php echo $pelanggan->alamat?>">
                  </div>
                  <div class="form-group">
                    <label>Nomor HP</label>
                    <input type="text" name="nomor_hp" class="form-control" 
                     value="<?php echo $pelanggan->nomor_hp?>">
                  </div>
                  <div class="form-group"> 
                  <label>Foto KTP</label><br>
                  <img src="<?php echo base_url();?>assets/foto/<?php echo $pelanggan->foto_ktp;?>" width="279" height="181"><br>
                  <label><?php echo $pelanggan->foto_ktp;?></label> 
                  <input type="hidden" name="old_foto" class="form-control" value="<?php echo $pelanggan->foto_ktp;?>">
                  <input type="file" name="foto" class="form-control">    
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
          nama: {
            required: true,
          },
          alamat: {
            required: true,
          },
          nomor_hp: {
            required: true,
            digits: true,
            minlength: 11
          }
        },
        messages: {
          nama: {
            required: "Masukan nama",
          },
          nomor_hp: {
            required: "Masukan nomor HP",
            minlength: "Nomor Hp kurang",
            digits: "Mohon hanya angka yang dimasukan"
          },
          alamat : "Masukan alamat"
        }
      });
    });
</script>
</body>
</html>
