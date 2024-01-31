<?php
$data_user = getProfile();
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Input <?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Input <?= $title; ?></li>
                    <li class="breadcrumb-item active">Input</li>
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
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Input pembayaran <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url($link); ?>" method="post" enctype="multipart/form-data">
                            <input type='hidden' name='_method' value='PUT' />
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control" id="id_siswa" name="id_siswa" hidden placeholder="nisn" value="<?= $userdata['id_siswa']; ?>">
                                <input type="text" class="form-control" id="id_user" name="id_user" hidden placeholder="nisn" value="<?= $data_user['id']; ?>">
                                <input type="text" class="form-control" id="nisn" name="nisn" disabled placeholder="nisn" value="<?= $userdata['nisn']; ?>">
                            </div>
                            <?= form_error('nisn', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <div class="form-group">
                                <label for="nama_siswa">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" disabled value="<?= $userdata['nama_siswa']; ?>" required placeholder="nama_lengkap">
                            </div>
                            <?= form_error('nama_siswa', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <div class="form-group">
                                <label for="alamat">alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" disabled value="<?= $userdata['alamat']; ?>" required placeholder="alamat">
                            </div>
                            <?= form_error('alamat', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <div class="form-group">
                                <label for="bimbel">Bimbel</label>
                                <input type="text" class="form-control" id="id_bimbel" name="id_bimbel" hidden placeholder="Bimbel" value="<?= $userdata['id_bimbel']; ?>">
                                <select name="id_bimbel" id="id_bimbel" required class="form-control" disabled>
                                    <?php foreach ($bimbel as $d) : ?>
                                        <?php if ($d['id_bimbel'] == $userdata['id_bimbel']) : ?>
                                            <option selected value="<?= $d['id_bimbel']; ?>"><?= $d['nama_bimbel']; ?> - <?= $d['cabang']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['id_bimbel']; ?>"><?= $d['nama_bimbel']; ?> - <?= $d['cabang']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_bimbel', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control" id="nominal" name="nominal" required placeholder="nominal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Bukti Pembayaran</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/png, image/gif, image/jpeg">
                            </div>
                            <?= form_error('nominal', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url($link . '/siswa'); ?>" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>