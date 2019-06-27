<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#kolektor_modal"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Kolektor</a>
    </div>

    <?= form_error('nama_kolektor', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= form_error('alamat', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>

    <!-- Content Row -->
    <div class=" row mb-3">
        <div class="col">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <table class="table table-hover table-bordered text-center" id="tabel-kolektor">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Looping Kolektor -->
                            <?php $i = 0; ?>
                            <?php foreach ($kolektor as $k) : ?>
                                <tr>
                                    <td><?= $i += 1; ?></td>
                                    <td><?= $k['nama_kolektor']; ?></td>
                                    <td><?= $k['alamat']; ?></td>
                                    <td>
                                        <a class="badge badge-primary" href="<?= base_url('dashboard/lihat/'); ?><?= $k['id']; ?>">Lihat Peserta</a>
                                        <a class="badge badge-warning" href="#" data-toggle="modal" data-target="#edit_kolektor_modal<?= $k['id'] ?>">Edit</a>
                                        <a class="badge badge-danger" href="#" data-toggle="modal" data-target="#hapus_kolektor_modal">Hapus</a>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Tambah Kolektor Modal-->
<div class="modal fade" id="kolektor_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kolektor</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="" method="post" action="<?= base_url('dashboard/kolektor'); ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="label" for="nama_kolektor">Nama</label>
                                <input class="form-control" type="text" id="nama_kolektor" name="nama_kolektor">
                            </div>
                            <div class="form-group">
                                <label class="label" for="alamat">Alamat</label>
                                <input class="form-control" type="text" id="alamat" name="alamat">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Tambah</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Kolektor Modal-->
<?php foreach ($kolektor as $k) : ?>
    <div class="modal fade" id="edit_kolektor_modal<?= $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kolektor</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="" method="post" action="<?= base_url('dashboard/edit/'); ?><?= $k['id']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="label" for="nama_kolektor">Nama</label>
                                    <input class="form-control" type="text" id="nama_kolektor" name="nama_kolektor" value="<?= $k['nama_kolektor'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="label" for="alamat">Alamat</label>
                                    <input class="form-control" type="text" id="alamat" name="alamat" value="<?= $k['alamat'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Edit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Hapus Kolektor Modal-->
<div class="modal fade" id="hapus_kolektor_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Kolektor</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="" method="post" action="<?= base_url('dashboard/hapus/'); ?><?= $k['id']; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            Menghapus data kolektor mengakibatkan data peserta yang mendaftarkan diri kepada kolektor tersebut akan terhapus. Apakah anda yakin ingin menghapus data ini?
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Hapus</a>
                </div>
            </form>
        </div>
    </div>
</div>