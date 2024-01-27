<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
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
                <a href="<?= base_url('profile/edit'); ?>" class="btn btn-sm btn-warning text-left mb-2">Edit</a>
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">
                            My Profile
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col text-center">
                                <img class="rounded-circle img-thumbnail" width="120" src="<?= base_url(); ?>assets/uploads/users/<?= $data['image']; ?>" alt="">
                            </div>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td><?= $data['username']; ?></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>:</td>
                                    <td><?= $data['nama_role']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td><?= $data['nama_lengkap']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $data['email']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>