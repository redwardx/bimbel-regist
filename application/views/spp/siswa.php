<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-11">
                <h1 class="m-0">Pilih Siswa</h1>
            </div><!-- /.col -->
            <div class="col-sm-1">
                <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
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
                        Pilih siswa yang akan ditagih <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered" id="table1">
                                <thead>
                                    <tr>
                                        <th>No. Induk</th>
                                        <th>Nama Lengkap</th>
                                        <th>Bimbel</th>
                                        <th>Cabang</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1;
                                    foreach ($siswadata as $d) : ?>
                                        <tr>
                                            <td><?= $d['nisn']; ?></td>
                                            <td><?= $d['nama_siswa']; ?></td>
                                            <td><?= $d['nama_bimbel']; ?></td>
                                            <td><?= $d['cabang']; ?></td>
                                            <td>
                                                <a class="btn btn-warning btn-sm mb-2" href="<?= base_url($link . '/' . $d['id_siswa'] . '/new'); ?>">Pilih</a>
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