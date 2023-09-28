<?php require APPROOT. '/views/inc/header.php' ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create An Account</h2>
                <p>Please fill out this form to register with us</p>
                <form action="<?= URLROOT; ?>/UsersController/register" method="post">
                    <div class="form-group my-2">
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" name="name" class="form-control form-control-lg 
                            <?= empty(!$data['name_err']) ? 'is-invalid': ''; ?>" value="<?= $data['name']?>">
                        <label class="invalid-feedback">
                            <?= $data['name_err']?>
                        </label>
                    </div>
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
                    <div class="form-group my-2">
                        <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg 
                            <?= empty(!$data['confirm_password_err']) ? 'is-invalid': ''; ?>" value="<?= $data['confirm_password']?>">
                        <label class="invalid-feedback">
                            <?= $data['confirm_password_err']?>
                        </label>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-grid">
                            <input type="submit" value="Register" class="btn btn-success">
                        </div>
                        <div class="col d-grid">
                            <a href="<?= URLROOT; ?>/UsersController/login" class="btn btn-light">
                                Have an account? Login
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require APPROOT. '/views/inc/footer.php' ?>