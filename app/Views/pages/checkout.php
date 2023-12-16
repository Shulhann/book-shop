<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="column-gap-3 row" style="display:flex;justify-content: center;flex-wrap: wrap; gap: 2rem;">
        <div>
            <h1 class="mt-5">Transaksi Berhasil</h1>
            <img src="/check.svg" alt="" style="width: 20rem;">
            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <p class="my-3">Terima kasih telah berbelanja di Book Shop</p>
                <p>Detail Transaksi :</p>

                <!-- Display the transaction details in a table -->
                <table class="table table-bordered">
                    <tr>
                        <td class="fw-bold">Nama</td>
                        <td><?= $username; ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Judul Buku</td>
                        <td><?= $nama; ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Quantity</td>
                        <td><?= $quantity; ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Total Price</td>
                        <td><?= $total_price; ?></td>
                    </tr>
                </table>

                <a href="/" class="btn btn-primary my-5">Kembali ke Home</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>