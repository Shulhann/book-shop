<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row" style="display: flex; gap: 2rem; justify-content: center; min-height:60vh; align-items: center;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $book['judul']; ?></h5>
                <h6 class="card-subtitle mb-2 text-body-secondary"><?= $book['penulis']; ?>, <?= $book['penerbit']; ?></h6>
                <p class="card-text"><?= $book['deskripsi']; ?></p>

                <p class="card-text">Stok : <?= $book['stok']; ?></p>
            </div>
        </div>

        <form action="/checkout" method="POST" style="display: flex; flex-direction: column; gap: 1rem; min-width: 300px;">
            <input type="hidden" name="id" value="<?= $book['id']; ?>">
            <input type="hidden" name="judul" value="<?= $book['judul']; ?>">

            <!-- Input field for quantity -->
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" value="1" min="1" max="<?= $book['stok']; ?>" required>

            <!-- Hidden input field for stok -->
            <input type="hidden" name="stok" value="<?= $book['stok']; ?>">

            <!-- Hidden input field for harga -->
            <input type="hidden" name="harga" value="<?= $book['harga']; ?>">

            <!-- Display total price based on quantity -->
            <p>Total Price: <span id="totalPrice"><?= $book['harga']; ?></span></p>

            <button type="submit" class="btn btn-primary">Beli</button>
        </form>

        <script>
            // Add event listener to quantity input
            document.getElementById('quantity').addEventListener('input', function() {
                // Get quantity and stok values
                var quantity = parseInt(this.value);
                var stok = parseInt(document.getElementsByName('stok')[0].value);
                var harga = parseFloat(document.getElementsByName('harga')[0].value);

                // Validate quantity to ensure it's within the available stock
                if (quantity > stok) {
                    alert('Quantity cannot be more than stok.');
                    this.value = stok; // Set quantity back to stok value
                }

                // Calculate and update total price
                var totalPrice = quantity * harga;
                document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
            });
        </script>

    </div>
</div>

<?= $this->endSection() ?>