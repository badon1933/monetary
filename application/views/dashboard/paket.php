<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row mb-3">
        <div class="col">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <h1 class="h3 mb-2 text-gray-800 text-center"></h1>
                    <table class="table table-hover text-center" id="tabel-produk">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Jenis Paket</th>
                                <th>Jumlah Peserta</th>
                                <th>Lihat Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Looping Jenis Paket -->
                            <?php $i = 0; ?>
                            <?php foreach ($jenis_paket as $jp) : ?>
                                <tr>
                                    <td><?= $i += 1; ?></td>
                                    <td><?= $jp['jenis_paket']; ?></td>
                                    <td><?= $jumlah_peserta[$i - 1]; ?></td>
                                    <td>
                                        <a class="badge badge-primary" href="<?= base_url('dashboard/produk/'); ?><?= $jp['id']; ?>">Lihat Produk</a>
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

</div>
<!-- /.container-fluid -->