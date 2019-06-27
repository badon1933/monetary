<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row mb-3">
        <div class="col">
            <div class="card shadow h-100 py-2 tabel-kolektor">
                <div class="card-body">
                    <table class="table table-hover table-bordered text-center" id="tabel-lihat">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Setoran</th>
                                <th>Total Setoran</th>
                                <th>Tgl Update</th>
                            </tr>
                        </thead>
                        <tbody><?php $i = 0; ?>
                            <?php foreach ($setoran as $s) : ?>
                                <?php if ($s['id_peserta'] == $peserta['id']) : ?>
                                    <tr>
                                        <td><?= $i += 1; ?></td>
                                        <td>Rp. <?= $s['setoran']; ?></td>
                                        <td>Rp. <?= $s['total_setoran']; ?></td>
                                        <td><?= date('d M Y', $s['tanggal_update']); ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <a class="btn btn-primary" href="<?= base_url('dashboard/lihat/'); ?><?= $kolektor['id']; ?>">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->