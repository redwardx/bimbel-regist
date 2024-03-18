<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-11">
                <h1 class="m-0">Kelola <?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-1">
                <a href="<?= base_url($link . '/new'); ?>" class="btn btn-primary btn-sm mb-2">Tambah</a>
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
                        Kelola <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered" id="table2">
                                <thead>
                                    <tr>
                                        <th>NISN</th>
                                        <th>Nama Lengkap</th>
                                        <th>Bimbel</th>
                                        <th>Alamat</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1;
                                    foreach ($data as $d) : ?>
                                        <tr>
                                            <td><?= $d['nisn']; ?></td>
                                            <td><?= $d['nama_siswa']; ?></td>
                                            <td><?= $d['nama_bimbel']; ?> - <?= $d['cabang']; ?></td>
                                            <td><?= $d['alamat']; ?></td>
                                            <td>
                                                <a class="btn btn-warning btn-sm mb-2" href="<?= base_url($link . '/' . $d['id_siswa'] . '/edit'); ?>">Edit</a>
                                                <a class="btn btn-danger btn-sm mb-2 del-tombol" href="<?= base_url($link . '/' . $d['id_siswa'] . '/delete'); ?>">Delete</a>
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