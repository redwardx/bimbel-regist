<?php
$data_user = getProfile();
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-11">
                <h1 class="m-0">New <?= $title; ?></h1>
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
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        New <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url($link); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN Siswa" value="<?= set_value('nisn'); ?>">
                            </div>
                            <?= form_error('nisn', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama siswa" value="<?= set_value('nama_siswa'); ?>">
                            </div>
                            <?= form_error('nama_siswa', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?= set_value('alamat'); ?>">
                            </div>
                            <?= form_error('alamat', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

                            <?php if ($this->session->userdata('id_role') == 1) : ?>
                                <div class="form-group">
                                    <label for="bimbel">Bimbel</label>
                                    <select name="id_bimbel" id="id_bimbel" class="form-control select2">
                                        <?php foreach ($bimbel as $d) : ?>
                                            <option value="<?= $d['id_bimbel']; ?>"><?= $d['nama_bimbel']; ?> - <?= $d['cabang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?= form_error('id_bimbel', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <?php else : ?>
                                <div class="form-group">
                                    <label for="bimbel">Bimbel</label>
                                    <select name="nama_bimbel" id="nama_bimbel" class="form-control select2" disabled>
                                        <?php foreach ($bimbel as $d) : ?>
                                            <?php if ($d['id_bimbel'] == $data_user['id_bimbel']) : ?>
                                                <option value="<?= $d['id_bimbel']; ?>" selected><?= $d['nama_bimbel']; ?> - <?= $d['cabang']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $d['id_bimbel']; ?>"><?= $d['nama_bimbel']; ?> - <?= $d['cabang']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" name="id_bimbel" id="id_bimbel" value="<?= $data_user['id_bimbel'] ?>" />
                                </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>