<?php require APPROOT. '/views/inc/header.php' ?>

<div class="container">
    <div class="mt-3">

    <?php if( isset($_SESSION['edit_completed']) ) : ?>
        <?php flash('edit_completed')?>
    <?php endif;?>

    <?php if( isset($_SESSION['post_created']) ) : ?>
        <?php flash('post_created')?>
    <?php endif;?>

    <?php if( isset($_SESSION['post_deleted']) ) : ?>
        <?php flash('post_deleted')?>
    <?php endif;?>
        
    </div>
    
    <div class="row justify-content-between mb-3 mt-3">
        <div class="col-md-6 text-start">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?= URLROOT?>/PostsController/add" class="btn btn-primary mt-2">
                <i class="fa fa-pencil"></i> Add Post
            </a>
        </div>
    </div>

    <?php foreach($data['posts'] as $post) :?>
        <div class="card card-body mb-3">
            <h4 class="card-title">
                <?= $post->title ?>
            </h4>
            <div class="bg-light p-2 mb-3">
                Written by <strong class="text-bold"><?= $post->name; ?></strong> on <?= $post->postCreated; ?> 
            </div>
            <p class="card-text">
                <?= $post->body ?>
            </p>
            <a href="<?= URLROOT?>/PostsController/show/<?= $post->postId?>" class="btn btn-dark">More</a>
        </div>
    <?php endforeach?>
</div>

<?php require APPROOT. '/views/inc/footer.php' ?>