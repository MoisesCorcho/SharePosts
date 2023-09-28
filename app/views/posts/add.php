<?php require APPROOT. '/views/inc/header.php' ?>

<div class="container">
    <a href="<?= URLROOT?>/PostsController/index" class="btn btn-light mt-3">
        <i class="fa fa-backward"></i> Back
    </a>
    <div class="card card-body bg-light mt-3">
    <?php flash('register_success')?>
    <h2>Add Post</h2>
    <form action="<?= URLROOT; ?>/PostsController/add" method="post">

        <div class="form-group my-2">
            <label for="title">title: <sup>*</sup></label>
            <input type="text" name="title" class="form-control form-control-lg 
                <?= empty(!$data['title_err']) ? 'is-invalid': ''; ?>" value="<?= $data['title']?>">
            <label class="invalid-feedback">
                <?= $data['title_err']?>
            </label>
        </div>
        <div class="form-group my-2">
            <label for="body">body: <sup>*</sup></label>
            <textarea type="text" name="body" class="form-control form-control-lg <?= empty(!$data['body_err']) ? 'is-invalid': ''; ?>"><?= $data['body']?></textarea>
            <label class="invalid-feedback">
                <?= $data['body_err']?>
            </label>
        </div>
        <div class="d-grid">

            <input type="submit" class="btn btn-success" value="Submit">
        </div>
    </form>
</div>
</div>

<?php require APPROOT. '/views/inc/footer.php' ?>