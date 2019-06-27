<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#peserta_modal"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Peserta</a>
    </div>

    <?= form_error('nama_peserta', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= form_error('jenis_paket', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= form_error('setoran', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>

    <!-- Content Row -->
    <div class="row mb-3">
        <div class="col">
            <div class="card shadow h-100 py-2 tabel-kolektor">
                <div class="card-body">
                    <table class="table table-hover table-bordered text-center" id="tabel-lihat">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama Peserta</th>
                                <th>Jenis Paket</th>
                                <th>Alamat</th>
                                <th>Setoran Terakhir</th>
                                <th>Total Setoran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $j = 0; ?>
                            <?php foreach ($peserta as $p) : ?>
                                <?php
                                $setoran_terakhir = 0;
                                $total_setoran = 0;
                                ?>
                                <?php if ($kolektor['id'] == $p['kolektor']) :  ?>
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
                                        <?php
                                        foreach ($setoran as $s) {
                                            if ($p['id'] == $s['id_peserta']) {
                                                $setoran_terakhir = $s['setoran'];
                                                $total_setoran = $s['total_setoran'];
                                            }
                                        }
                                        ?>
                                        <td>Rp. <?= $setoran_terakhir; ?></td>
                                        <td>Rp. <?= $total_setoran; ?></td>
                                        <td>
                                            <a class="badge badge-primary" href="#" data-toggle="modal" data-target="#tambah_setoran_modal<?= $p['id']; ?>">Tambah Setoran</a>
                                            <a class="badge badge-success" href="<?= base_url('dashboard/rincian/'); ?><?= $kolektor['id']; ?>/<?= $p['id']; ?>">Rincian</a>
                                            <a class="badge badge-warning" href="#" data-toggle="modal" data-target="#edit_setoran_modal<?= $p['id']; ?>">Edit Setoran</a>
                                        </td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <a class="btn btn-primary" href="<?= base_url('dashboard/kolektor') ?>">Kembali</a>
                    </div>
                </div>
            </div>
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
                                <label class="label hidden" for="nama">Nama</label>
                                <input class="form-control" type="text" id="nama_peserta" name="nama_peserta">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="hidden" id="kolektor" name="kolektor" value="<?= $kolektor['id']; ?>">
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
                                <input class="form-control" type="hidden" id="alamat" name="alamat" value="<?= $kolektor['alamat']; ?>">
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
<?php foreach ($peserta as $p) : ?>
    <?php $total_setoran = 0; ?>
    <div class="modal fade" id="tambah_setoran_modal<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Setoran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="" method="post" action="<?= base_url('dashboard/setoran/'); ?><?= $kolektor['id']; ?>/<?= $p['id']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="id" name="id" value="<?= $p['id']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="id" name="id" value="<?= $kolektor['id']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="label" for="nama">Nama</label>
                                    <input class="form-control" type="text" id="nama_peserta" name="nama_peserta" value="<?= $p['nama_peserta']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="label" for="setoran">Jumlah Setoran</label>
                                    <input class="form-control" type="number" id="setoran" name="setoran">
                                </div>
                                <div class="form-group">
                                    <?php foreach ($setoran as $s) {
                                        if ($p['id'] == $s['id_peserta']) {
                                            $total_setoran = $s['total_setoran'];
                                        }
                                    }
                                    ?>
                                    <input class="form-control" type="hidden" id="total_setoran" name="total_setoran" value="<?= $total_setoran; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="tanggal_update" name="tanggal_update" value="<?= time(); ?>">
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
<?php endforeach ?>

<!-- Edit Setoran Modal-->
<?php foreach ($peserta as $p) : ?>
    <?php
    $setoran_terakhir = 0;
    $total_setoran = 0;
    ?>
    <div class="modal fade" id="edit_setoran_modal<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Setoran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="" method="post" action="<?= base_url('dashboard/editSetoran/'); ?><?= $kolektor['id']; ?>/<?= $p['id']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="id" name="id" value="<?= $p['id']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="id" name="id" value="<?= $kolektor['id']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="label" for="nama">Nama</label>
                                    <input class="form-control" type="text" id="nama_peserta" name="nama_peserta" value="<?= $p['nama_peserta']; ?>" readonly>
                                </div>
                                <?php foreach ($setoran as $s) {
                                    if ($p['id'] == $s['id_peserta']) {
                                        $setoran_terakhir = $s['setoran'];
                                        $total_setoran = $s['total_setoran'];
                                    }
                                }
                                ?>
                                <div class="form-group">
                                    <label class="label" for="setoran">Jumlah Setoran</label>
                                    <input class="form-control" type="number" id="setoran" name="setoran" value="<?= $setoran_terakhir ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="total_setoran" name="total_setoran" value="<?= $total_setoran ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="tanggal_update" name="tanggal_update" value="<?= time(); ?>">
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
<?php endforeach ?>