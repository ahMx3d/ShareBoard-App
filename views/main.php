<!-- Header -->
<?php require_once getcwd(). '\includes\header.inc.php' ?>
    <!-- Nav-Bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand">ShareBoard</span>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#nav-board"
                aria-controls="nav-board"
                aria-expanded="false"
                aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse"
                id="nav-board">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="<?php echo ROOT_URL; ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="<?php echo ROOT_URL; ?>shares">Shares</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav justify-content-end">
                        <?php if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true):?>
                            <li class="nav-item">
                                <a
                                    class="nav-link btn btn-dark"
                                    href="<?php echo ROOT_URL; ?>">
                                        <span>Welcome </span>
                                        <?php echo $_SESSION['user_data']['name']; ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link btn btn-dark"
                                    href="<?php echo ROOT_URL; ?>users/logout">Logout</a>
                            </li>
                        <?php else:?>
                            <li class="nav-item">
                                <a
                                    class="nav-link btn btn-dark"
                                    href="<?php echo ROOT_URL; ?>users/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link btn btn-dark"
                                    href="<?php echo ROOT_URL; ?>users/register">Register</a>
                            </li>
                        <?php endif;?>
                    </ul>
            </div>
        </div>
    </nav>
    <!-- /Nav-Bar -->

    <!-- Container -->
    <main
        role="main"
        class="container">
            <!-- Display Messages -->
            <?php Messages::runMsg(); ?>
            <!-- Import View -->
            <?php require($view); ?>
    </main>
    <!-- /.container -->
<!-- Footer -->
<?php require_once getcwd(). '\includes\footer.inc.php' ?>