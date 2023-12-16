<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">Book Shop</a>
        <!-- <a class="nav-item nav-link" href="/pages/katalog" style="color: gray;">Keranjang</a> -->
        <a class="nav-item nav-link" href="/pages/about" style="color: gray;">About</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="display:flex; justify-content: end;">
            <div class="navbar-nav">

                <li class="nav-item">
                    <?php $isLoggedIn = session()->get('username'); ?>
                    <?= $isLoggedIn ? '<a class="btn btn-danger" href="/logout">Sign Out</a>' : '<a class="btn btn-success" href="/login">Login</a>'; ?>
                </li>
            </div>
        </div>
    </div>
</nav>