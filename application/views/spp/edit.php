<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit <?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Kelola <?= $title; ?></li>
                    <li class="breadcrumb-item active">Edit</li>
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
                        Edit <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url($link . '/' . $data['id_spp']); ?>" method="post" enctype="multipart/form-data">
                            <input type='hidden' name='_method' value='PUT' />
                            <div class="form-group">
                                <label for="user">Username Siswa & Bimbelnya</label>
                                <input type="text" class="form-control" id="id_user" name="id_user" hidden placeholder="user" value="<?= $data['id_user']; ?>">
                                <select name="id_user" id="id_user" required class="form-control" disabled>
                                    <?php foreach ($user as $d) : ?>
                                        <?php if ($d['id'] == $data['id_user']) : ?>
                                            <option selected value="<?= $d['id']; ?>"><?= $d['nama_lengkap']; ?> - <?= $d['nama_bimbel']; ?> <?= $d['cabang']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['id_user']; ?>"><?= $d['nama_lengkap']; ?> - <?= $d['nama_bimbel']; ?> <?= $d['cabang']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_user', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control" id="nominal" name="nominal" required placeholder="nominal" value="<?= $data['nominal']; ?>">
                                </div>
                            </div>
                            <?= form_error('nominal', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <div class="form-group">
                                <label for="jatuh_tempo">Jatuh Tempo</label>
                                <input type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo" required placeholder="jatuh_tempo"  min="<?php echo date("Y-m-d"); ?>" value="<?= isset($data['jatuh_tempo']) ? date('Y-m-d', strtotime($data['jatuh_tempo'])) : ''; ?>">
                            </div>
                            <?= form_error('nominal', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>