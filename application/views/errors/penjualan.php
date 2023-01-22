<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pelanggan</title>
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
            <h1 align="center">Data Penjualan</h1>
          </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <button class="btn btn-primary" data-toggle="modal" data-target="#inputModal"><i class="fa fa-plus"></i>Tambah Data Penjualan</button>
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr class="bg-info">
                      <th>NO</th>
                      <th>NAMA PELANGGAN</th>
                      <th>NAMA BARANG</th>
                      <th>HARGA BARANG</th>
                      <th>NAMA TOKO</th>
                      <th>AKSI</th>  
                      <th>AKSI</th>  
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                  foreach($penjualan as $p) : ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $p->nama_pelanggan ?></td>
                      <td><?php echo $p->nama_barang ?></td>
                      <td><?php echo 'Rp.'.$p->harga_barang ?></td> 
                      <td><?php echo $p->nama_toko ?></td> 
                      <td onclick="javascript: return  confirm('Anda  yakin  hapus?')">
                        <?php 
                        echo anchor('Admin/hapus/'.$p->kode_pelanggan,
                          '<div  class="btn  btn-danger  btn-sm">
                              <i class="fa fa-trash"></i>
                          </div>')
                        ?>
                      </td>
                      <td>
                      <?php echo anchor('Admin/edit/'.$p->kode_pelanggan.'/'.$this->uri->segment(2),
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
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">DATA PELANGGAN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-striped table-hover">
                        <thead style="text-align: center">
                        <tr class="bg-info">
                          <th>NO</th>
                          <th>KODE PELANGGAN</th>
                          <th>NAMA PELANGGAN</th>
                          <th>AKSI</th>  
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach($pelanggan as $p) : ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $p->kode_pelanggan ?></td>
                          <td><?php echo $p->nama_pelanggan ?></td> 
                          <td style="text-align: center">
                            <?php echo anchor('Admin/ambilData/'.$p->kode_pelanggan.'/'.$this->uri->segment(2),
                            '<div class="btn btn-success btn-sm"> 
                              <i class="fa fa-plus"></i>
                            </div>') ?>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
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
