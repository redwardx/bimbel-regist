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
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="id_user" name="id_user" hidden placeholder="Username" value="<?= $userdata['id']; ?>">
                                <input type="text" class="form-control" id="username" name="username" disabled placeholder="Username" value="<?= $userdata['username']; ?>">
                            </div>
                            <?= form_error('username', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" disabled value="<?= $userdata['nama_lengkap']; ?>" required placeholder="nama_lengkap">
                            </div>
                            
                            <?= form_error('id_bimbel', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" disabled value="<?= $userdata['email']; ?>" required placeholder="email">
                            </div>
                            <?= form_error('email', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
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
                                <label for="jatuh_tempo">Jatuh Tempo</label>
                                <input type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo" required placeholder="jatuh_tempo"  min="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <?= form_error('nominal', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url($link . '/user'); ?>" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>