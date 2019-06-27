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
                                <th>Nama Produk</th>
                                <th>Qty</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Looping Jenis Paket -->
                            <?php $i = 0; ?>
                            <?php foreach ($produk as $p) : ?>
                                <?php if ($p['jenis_paket'] == $jenis_paket['id']) : ?>
                                    <tr>
                                        <td><?= $i += 1; ?></td>
                                        <td><?= $p['nama_produk']; ?></td>
                                        <td><?= $p['jumlah'] ?></td>
                                        <td>
                                            Under Construction
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <a class="btn btn-primary" href="<?= base_url('dashboard/paket') ?>">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
<!-- /.container-fluid -->