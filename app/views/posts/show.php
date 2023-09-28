<?php require APPROOT. '/views/inc/header.php' ?>

<div class="container">
    <a href="<?= URLROOT?>/PostsController/index" class="btn btn-light mt-3">
        <i class="fa fa-backward"></i> Back
    </a>
    <br>
    <h1><?= $data['post']->title?></h1>
    <div class="bg-secondary text-white p-2 mb-3">
        Written by <?= $data['user']->name ?> on <?= $data['post']->created_at ?>
    </div>
    <p>
        <?= $data['post']->body ?>
    </p>
    
    <?php if ( $data['post']->user_id === $_SESSION['user_id']) :?>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a href="<?= URLROOT?>/PostsController/edit/<?= $data['post']->id ?>" class="btn btn-dark">
                Edit
            </a>
        </div>
        <div class="col-md-6 text-end">
            <form action="<?= URLROOT?>/PostsController/delete/<?= $data['post']->id ?>" class="pull-right" method="post">
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </div>
    </div>
    <?php endif;?>
        
</div>

<?php require APPROOT. '/views/inc/footer.php' ?>