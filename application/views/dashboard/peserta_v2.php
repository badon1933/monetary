<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <form class="d-none d-sm-inline-block form-inline ml-auto mr-md-2 mw-200">
            <select name="kolektor" id="kolektor" class="form-control mw-200">
                <option value="null">All</option>
                <?php foreach ($kolektor as $k) : ?>
                    <option value="tabel-<?= $k['id']; ?>" id="<?= $k['id']; ?>"><?= $k['nama_kolektor']; ?></option>
                <?php endforeach; ?>
            </select>
        </form>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#peserta_modal"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Peserta</a>
    </div>

    <?= form_error('nama_peserta', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= form_error('kolektor', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= form_error('jenis_paket', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= form_error('alamat', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>

    <?php foreach ($kolektor as $k) : ?>

        <!-- Content Row -->
        <div class="row mb-3">
            <div class="col">
                <div class="card shadow h-100 py-2 tabel-kolektor" id="tabel-<?= $k['id']; ?>">
                    <div class="card-body">
                        <h1 class="h3 mb-2 text-gray-800">Kolektor : <?= $k['nama_kolektor'] ?></h1>
                        <table class="table table-hover table-bordered text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Peserta</th>
                                    <th>Jenis Paket</th>
                                    <th>Alamat</th>
                                    <th>Setoran</th>
                                    <th>Total Setoran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $j = 0; ?>
                                <?php foreach ($peserta as $p) : ?>
                                    <?php if ($k['id'] == $p['kolektor']) :  ?>
                                        <tr>
                                            <td><?= $j += 1; ?></td>
                                            <td><?= $p['nama_peserta'] ?></td>
                                            <td>
                                                <?php

                                                foreach ($jenis_paket as $jp) {
                                                    if ($p['jenis_paket'] == $jp['id']) {
                                                        echo $jp['jenis_paket'];
                                                    }
                                                }

                                                ?>
                                            </td>
                                            <td><?= $p['alamat'] ?></td>
                                            <td><?= $p['setoran'] ?></td>
                                            <td><?= $p['total_setoran'] ?></td>
                                            <td><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_setoran_modal">Tambah Setoran</button></td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

    <!-- Content Row -->

    <div class="row">


    </div>

    <!-- Content Row -->
    <div class="row">


    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Tambah Peserta Modal-->
<div class="modal fade" id="peserta_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="" method="post" action="#">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="label" for="nama">Nama</label>
                                <input class="form-control" type="text" id="nama_peserta" name="nama_peserta">
                            </div>
                            <div class="form-group">
                                <label class="label" for="kolektor">Kolektor</label>
                                <select class="form-control" name="kolektor" id="kolektor">
                                    <?php foreach ($kolektor as $k) : ?>
                                        <option value="<?= $k['id']; ?>"><?= $k['nama_kolektor']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label" for="jenis_paket">Jenis Paket</label>
                                <select class="form-control" id="jenis_paket" name="jenis_paket">
                                    <?php foreach ($jenis_paket as $jp) : ?>
                                        <option value="<?= $jp['id']; ?>"><?= $jp['jenis_paket']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label" for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambah Setoran Modal-->
<div class="modal fade" id="tambah_setoran_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="" method="post" action="#">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="label" for="nama">Nama</label>
                                <input class="form-control" type="text" id="nama_peserta" name="nama_peserta" readonly>
                            </div>
                            <div class="form-group">
                                <label class="label" for="kolektor">Kolektor</label>
                                <select class="form-control" name="kolektor" id="kolektor" readonly>
                                    <option value="">Bu Anih</option>
                                    <option value="">Bu Anih</option>
                                    <option value="">Bu Anih</option>
                                    <option value="">Bu Anih</option>
                                    <option value="">Bu Anih</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label" for="setoran">Jumlah Setoran</label>
                                <input class="form-control" type="text" id="setoran" name="setoran">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="login.html">Tambah</a>
                </div>
            </form>
        </div>
    </div>
</div>