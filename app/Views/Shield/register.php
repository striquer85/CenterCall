<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.register') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="container d-flex justify-content-center p-5">
    <div class="card col-12 col-md-5 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-5"><?= lang('Auth.register') ?></h5>

            <?php if (session('error') !== null): ?>
                <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
            <?php elseif (session('errors') !== null): ?>
                <div class="alert alert-danger" role="alert">
                    <?php if (is_array(session('errors'))): ?>
                        <?php foreach (session('errors') as $error): ?>
                            <?= $error ?>
                            <br>
                        <?php endforeach ?>
                    <?php else: ?>
                        <?= session('errors') ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <form action="<?= url_to('register') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Email -->
                <div class="mb-2">
                    <label for="email" class="form-label"><?= lang('Auth.email') ?></label>
                    <input type="email" class="form-control" id="email" name="email" inputmode="email"
                        autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>"
                        required>
                </div>

                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="form-label"><?= lang('Auth.username') ?></label>
                    <input type="text" class="form-control" id="username" name="username" inputmode="text"
                        autocomplete="username" placeholder="<?= lang('Auth.username') ?>"
                        value="<?= old('username') ?>" required>
                </div>

                <!-- Password -->
                <div class="mb-2">
                    <label for="password" class="form-label"><?= lang('Auth.password') ?></label>
                    <input type="password" class="form-control" id="password" name="password" inputmode="text"
                        autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required>
                </div>

                <!-- Password (Again) -->
                <div class="mb-5">
                    <label for="password_confirm" class="form-label"><?= lang('Auth.passwordConfirm') ?></label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                        inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>"
                        required>
                </div>

                <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                </div>

                <p class="text-center"><?= lang('Auth.haveAccount') ?> <a
                        href="<?= url_to('login') ?>"><?= lang('Auth.login') ?></a></p>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>