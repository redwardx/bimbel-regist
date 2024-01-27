<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">New <?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Kelola <?= $title; ?></li>
                    <li class="breadcrumb-item active">New</li>
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
                        New <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url($link); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama_bimbel">Nama Bimbel</label>
                                <input type="text" class="form-control" id="nama_bimbel" name="nama_bimbel" placeholder="Nama bimbel" value="<?= set_value('nama_bimbel'); ?>">
                            </div>
                            <?= form_error('nama_bimbel', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

                            <div class="form-group">
                                <label for="cabang">Cabang</label>
                                <input type="text" class="form-control" id="cabang" name="cabang" placeholder="cabang" value="<?= set_value('cabang'); ?>">
                            </div>
                            <?= form_error('cabang', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>