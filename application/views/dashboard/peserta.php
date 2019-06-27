<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#peserta_modal"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Peserta</a>
    </div>

    <?= form_error('nama_peserta', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= form_error('kolektor', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= form_error('jenis_paket', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= form_error('alamat', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow h-100 py-2">
        <div class="card-body">
            <table class="table table-hover table-bordered text-center" id="tabel-peserta">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jenis Paket</th>
                        <th>Kolektor</th>
                        <th>Setoran Terakhir</th>
                        <th>Total Setoran</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- Looping Peserta -->
                    <?php $i = 0; ?>
                    <?php foreach ($peserta as $p) : ?>
                        <?php
                        $setoran_terakhir = 0;
                        $total_setoran = 0;
                        ?>
                        <tr>
                            <td><?= $i += 1; ?></td>
                            <td><?= $p['nama_peserta']; ?></td>
                            <td>
                                <?php

                                foreach ($jenis_paket as $jp) {
                                    if ($p['jenis_paket'] == $jp['id']) {
                                        echo $jp['jenis_paket'];
                                    }
                                }

                                ?>
                            </td>
                            <td>
                                <?php

                                foreach ($kolektor as $k) {
                                    if ($p['kolektor'] == $k['id']) {
                                        echo $k['nama_kolektor'];
                                    }
                                }

                                ?>
                            </td>
                            <?php
                            foreach ($setoran as $s) {
                                if ($p['id'] == $s['id_peserta']) {
                                    $setoran_terakhir = $s['setoran'];
                                    $total_setoran = $s['total_setoran'];
                                }
                            }
                            ?>
                            <td>Rp. <?= $setoran_terakhir ?></td>
                            <td>Rp. <?= $total_setoran ?></td>
                            <td><?= $p['alamat']; ?></td>
                            <td>
                                <a class="badge badge-warning edit-kolektor" href="#" data-toggle="modal" data-target="#edit_peserta_modal<?= $p['id']; ?>">Edit</a>
                                <a class="badge badge-danger edit-kolektor" href="#" data-toggle="modal" data-target="#hapus_peserta_modal">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
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
                                    <option value="">Pilih</option>
                                    <?php foreach ($kolektor as $k) : ?>
                                        <option value="<?= $k['id']; ?>"><?= $k['nama_kolektor']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label" for="jenis_paket">Jenis Paket</label>
                                <select class="form-control" id="jenis_paket" name="jenis_paket">
                                    <option value="">Pilih</option>
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

<!-- Edit Peserta Modal-->
<?php foreach ($peserta as $p) : ?>
    <div class="modal fade" id="edit_peserta_modal<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Peserta</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="" method="post" action="<?= base_url('dashboard/editPeserta/'); ?><?= $p['id']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="label" for="nama_kolektor">Nama</label>
                                    <input class="form-control" type="text" id="nama_peserta" name="nama_peserta" value="<?= $p['nama_peserta']; ?>">
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
                                    <input class="form-control" type="text" id="alamat" name="alamat" value="<?= $p['alamat']; ?>">
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

<!-- Hapus Peserta Modal-->
<div class="modal fade" id="hapus_peserta_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Peserta</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="" method="post" action="<?= base_url('dashboard/hapusPeserta/'); ?><?= $p['id']; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            Apakah anda yakin ingin menghapus data ini?
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