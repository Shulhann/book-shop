<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="column" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <h2 style="text-align: center;">Login</h2>
            <form action="/login_action" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
                <input type="text" name="username" placeholder="Username" class="form-control">
                <input type="password" name="password" placeholder="Password" class="form-control">
                <button type="submit" class="btn btn-primary">Signin</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>