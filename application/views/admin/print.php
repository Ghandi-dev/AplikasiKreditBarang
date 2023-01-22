<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <style type="text/css">
body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}
    </style>
    <!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins')?>/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url('assets/dist')?>/css/adminlte.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/dist')?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url('assets/dist')?>/css/invoice.css">
</head>
<body>
<div class="page-content container">
    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                            <span class="text-default-d3">Bukti Pembayaran</span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Nama :</span>
                            <span class="text-600 text-110 text-blue align-middle"><?php echo $pembayaran[0]->nama_pelanggan?></span>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                <?php echo $pembayaran[0]->nama_barang?>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>


                    <!-- or use a table instead -->
            <div class="table-responsive">
                <table class="table table-striped border-2 border-b-2 brc-default-l1" border="5">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">No</th>
                            <th>TANGGAL BAYAR</th>
                            <th>BAYAR</th>
                            <th>SISA</th>
                        </tr>
                    </thead>
                    <?php 
                    $no =1;
                    foreach ($pembayaran as $p) :?>
                    <tbody class="text-95 text-secondary-d3" >
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $p->tgl_bayar ?></td>
                            <td><?php echo Rupiah($p->bayar) ?></td>
                            <td><?php echo Rupiah($p->sisa_bayar) ?></td>
                        </tr> 
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

                    <div class="row mt-3 justify-content-end">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 offset-md-4">
                                    <h5>Purwakarta,<span id="tanggal"></span></h5>
                                    <br><br><br>
                                    <h6><?php echo $this->session->userdata('nama') ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105">Terima Kasih Telah Melakukan Pembayaran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins')?>/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist')?>/js/adminlte.min.js"></script>
<script>
    window.print()
    var dt = new Date();
    document.getElementById("tanggal").innerHTML = dt.toLocaleDateString();
</script>
</body>
</html>