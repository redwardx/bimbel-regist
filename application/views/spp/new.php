<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Input Tagihan <?= $title; ?></h1>
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
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Input Tagihan <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url($link); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="id_user">Username</label>
                                <select name="id_user" id="id_user" class="form-control select2">
                                    <option value="" selected>Username</option>
                                    <?php foreach ($user as $d) : ?>
                                        <option value="<?= $d['id']; ?>"><?= $d['username']; ?> - <?= $d['nama_bimbel']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_user', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

                            <div class="form-group">
                                <label for="jatuh_tempo">Nominal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Nominal" value="<?= set_value('nominal'); ?>">
                                </div>
                            </div>
                            <?= form_error('nominal', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

                            <div class="form-group">
                                <label for="jatuh_tempo">Jatuh Tempo</label>
                                <input type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo" placeholder="jatuh tempo" value="<?= set_value('jatuh_tempo'); ?>" min="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <?= form_error('jatuh_tempo', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>