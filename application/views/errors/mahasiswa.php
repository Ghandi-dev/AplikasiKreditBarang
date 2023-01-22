<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Mahasiswa</title>
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
            <h1 align="center">Data Mahasiswa</h1>
          </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <button class="btn btn-primary" data-toggle="modal" data-target="#inputModal"><i class="fa fa-plus"></i>Tambah Data Mahasiswa</button>
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr class="bg-info">
                    <th>NO</th>
                    <th>NAMA MAHASIWA</>
                    <th>NIM</th>
                    <th>TANGGAL LAHIR</th>
                    <th>JURUSAN</th>
                    <th colspan="2">AKSI</th>  
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                  foreach($mahasiswa as $mhs) : ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $mhs->nama ?></td>
                    <td><?php echo $mhs->nim ?></td>
                    <td><?php echo $mhs->tgl_lahir ?></td>
                    <td><?php echo $mhs->jurusan ?></td> 
                    <td onclick="javascript: return  confirm('Anda  yakin  hapus?')">
                      <?php 
                      echo anchor('Admin/hapus/'.$mhs->id,
                        '<div  class="btn  btn-danger  btn-sm">
                            <i class="fa fa-trash"></i>
                         </div>')
                      ?>
                    </td>
                    <td>
                    <?php echo anchor('Admin/edit/'.$mhs->id,
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
                <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA MAHASISWA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo base_url().'Admin/tambah';?>">
                  <div class="form-group">
                    <label>Nama Mahasiswa</label>
                    <input type="text" name="nama" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tangga Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control">
                  </div>
                  <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
<?php //Loading footer.php
  $this->load->view('templates/footer');
?>

</body>
</html>
