<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pilih User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Data Pembayaran <?= $title; ?></li>
                    <li class="breadcrumb-item active">Input Tagihan <?= $title; ?></li>
                </ol>
            </div>
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Pilih user yang akan ditagih <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Bimbel</th>
                                        <th>Cabang</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1;
                                    foreach ($userdata as $d) : ?>
                                        <tr>
                                            <td><?= $a++; ?></td>
                                            <td>
                                                <img width="70" src="<?= base_url(); ?>assets/uploads/users/<?= $d['image']; ?>" alt="">
                                            </td>
                                            <td><?= $d['username']; ?></td>
                                            <td><?= $d['nama_lengkap']; ?></td>
                                            <td><?= $d['nama_bimbel']; ?></td>
                                            <td><?= $d['cabang']; ?></td>
                                            <td>
                                                <a class="btn btn-warning btn-sm mb-2" href="<?= base_url($link . '/' . $d['id'] . '/new'); ?>">Pilih</a>
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
</section>