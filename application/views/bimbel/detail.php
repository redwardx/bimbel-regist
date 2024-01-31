<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $data['nama_bimbel']; ?> - <?= $data['cabang']; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Detail <?= $title; ?></li>
                    <li class="breadcrumb-item active">Detail</li>
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
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">
                            Detail Bimbel
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama Bimbel</td>
                                    <td>:</td>
                                    <td><?= $data['nama_bimbel']; ?></td>
                                </tr>
                                <tr>
                                    <td>Cabang</td>
                                    <td>:</td>
                                    <td><?= $data['cabang']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-warning btn-sm mb-2" href="<?= base_url($link . '/' . $data['id_bimbel'] . '/edit'); ?>">Edit</a>
                        <a class="btn btn-danger btn-sm mb-2 del-tombol" href="<?= base_url($link . '/' . $data['id_bimbel'] . '/delete'); ?>">Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        List Siswa Bimbel <?= $data['nama_bimbel']; ?> - <?= $data['cabang']; ?>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="table2">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1;
                                foreach ($siswa as $d) : ?>
                                    <tr>
                                        <td><?= $d['nisn']; ?></td>
                                        <td><?= $d['nama_siswa']; ?></td>
                                        <td><?= $d['alamat']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>