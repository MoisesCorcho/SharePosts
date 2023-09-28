    <!-- Header -->
    <header id="header" class="text-bg-dark">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <div class="container">
                <a href="#" class="navbar-brand"><?= SITENAME?></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="<?= URLROOT?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= URLROOT?>/PagesController/about" class="nav-link">About</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <?php if( isset($_SESSION['user_id']) ): ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><?= $_SESSION['user_name']?></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= URLROOT?>/UsersController/logout" class="nav-link">Log out</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a href="<?= URLROOT?>/UsersController/register" class="nav-link">Register</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= URLROOT?>/UsersController/login" class="nav-link">Login</a>
                            </li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>