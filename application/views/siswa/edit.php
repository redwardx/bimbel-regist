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
                        <form action="<?= base_url($link . '/' . $data['id_siswa']); ?>" method="post" enctype="multipart/form-data">
                            <input type='hidden' name='_method' value='PUT' />
                            <div class="form-group">
                                <label for="nisn">Nama Siswa</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $data['nisn']; ?>" required placeholder="NISN">
                            </div>
                            <?= form_error('nisn', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $data['nama_siswa']; ?>" required placeholder="Nama Siswa">
                            </div>
                            <?= form_error('nama_siswa', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <div class="form-group">
                                <label for="nama_panggilan">Nama panggilan</label>
                                <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" value="<?= $data['nama_panggilan']; ?>" required placeholder="nama panggilan">
                            </div>
                            <?= form_error('nama_panggilan', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <div class="form-group">
                                <label for="telp_ortu">No Telp. Orang tua</label>
                                <input type="number" class="form-control" id="telp_ortu" name="telp_ortu" value="<?= $data['telp_ortu']; ?>" required placeholder="No Telp. Orang tua">
                            </div>
                            <?= form_error('telp_ortu', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>" required placeholder="alamat">
                            </div>
                            <?= form_error('alamat', '<div class="error text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                            <?php if ($this->session->userdata('id_role') == 1) : ?>
                                <div class="form-group">
                                    <label for="bimbel">Bimbel</label>
                                    <select name="id_bimbel" id="id_bimbel" class="form-control select2">
                                        <?php foreach ($bimbel as $d) : ?>
                                            <?php if ($d['id_bimbel'] == $data['id_bimbel']) : ?>
                                                <option selected value="<?= $d['id_bimbel']; ?>"><?= $d['nama_bimbel']; ?> - <?= $d['cabang']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $d['id_bimbel']; ?>"><?= $d['nama_bimbel']; ?> - <?= $d['cabang']; ?></option>
                                            <?php endif; ?>
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
                            <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>