<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="column-gap-3 row" style="display:flex;justify-content: center;flex-wrap: wrap; gap: 2rem;">
        <?php foreach ($books as $book) : ?>
            <div class="card mt-4" style="width: 18rem; border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title"><?= $book['judul']; ?></h5>
                    <p class="card-text" style="min-height: 15rem;"><?= $book['deskripsi']; ?></p>
                    <p class="card-text">Stok : <?= $book['stok']; ?></p>
                    <p class="card-text">Harga : <?= $book['harga']; ?></p>
                    <a href="/beli/<?= $book['id']; ?>" class="btn btn-primary">Buy</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>