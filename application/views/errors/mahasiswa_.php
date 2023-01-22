      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Mahasiswa
          </h1>

          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mahasiswa</li> 
          </ol>
          <button class="btn btn-primary" data-toggle="modal" data-target="#inputModal"><i class="fa fa-plus"></i>Tambah Data Mahasiswa</button>
        </section>
        <!-- Main content -->
        <section class="content">
          
          <table class="table">
          <tr class="bg-info">
            <th>NO</th>
            <th>NAMA MAHASIWA</>
            <th>NIM</th>
            <th>TANGGAL LAHIR</th>
            <th>JURUSAN</th> 
          </tr>
          <?php
          $no = 1;
          foreach($mahasiswa as $mhs) : ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $mhs->nama ?></td>
            <td><?php echo $mhs->nim ?></td>
            <td><?php echo $mhs->tgl_lahir ?></td>
            <td><?php echo $mhs->jurusan ?></td> 
          </tr>
          <?php endforeach; ?>
          </table>
        </section><!-- /.content -->
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
      </div><!-- /.content-wrapper -->