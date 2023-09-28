<?php require APPROOT. '/views/inc/header.php' ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?php flash('register_success')?>
                <h2>Login</h2>
                <p>Please fill in your credentials to log in</p>
                <form action="<?= URLROOT; ?>/UsersController/login" method="post">

                    <div class="form-group my-2">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" name="email" class="form-control form-control-lg 
                            <?= empty(!$data['email_err']) ? 'is-invalid': ''; ?>" value="<?= $data['email']?>">
                        <label class="invalid-feedback">
                            <?= $data['email_err']?>
                        </label>
                    </div>
                    <div class="form-group my-2">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg 
                            <?= empty(!$data['password_err']) ? 'is-invalid': ''; ?>" value="<?= $data['password']?>">
                        <label class="invalid-feedback">
                            <?= $data['password_err']?>
                        </label>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-grid">
                            <input type="submit" value="Login" class="btn btn-success">
                        </div>
                        <div class="col d-grid">
                            <a href="<?= URLROOT; ?>/UsersController/register" class="btn btn-light">
                                Don't you have an account? Register
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require APPROOT. '/views/inc/footer.php' ?>