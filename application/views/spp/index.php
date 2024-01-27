<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pembayaran <?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Pembayaran <?= $title; ?></li>
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
                <a href="<?= base_url($link . '/new'); ?>" class="btn btn-primary btn-sm mb-2">Tambah</a>
                <div class="card">
                    <div class="card-header">
                        Data Pembayaran <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered" id="table2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Bimbel</th>
                                        <th>Cabang</th>
                                        <th>Status</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1;
                                    foreach ($data as $d) : ?>
                                        <tr>
                                            <td><?= $a++; ?></td>
                                            <td><?= $d['nama_lengkap']; ?></td>
                                            <td><?= $d['nama_bimbel']; ?></td>
                                            <td><?= $d['cabang']; ?></td>
                                            <td><?php echo ($d['status_pembayaran'] == 1) ? 'Lunas' : 'Belum Lunas'; ?></td>
                                            <td>
                                                <a class="btn btn-warning btn-sm mb-2" href="<?= base_url($link . '/' . $d['id_spp'] . '/edit'); ?>">Edit</a>
                                                <a class="btn btn-danger btn-sm mb-2 del-tombol" href="<?= base_url($link . '/' . $d['id_spp'] . '/delete'); ?>">Delete</a>
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