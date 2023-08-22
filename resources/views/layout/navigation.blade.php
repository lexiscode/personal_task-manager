<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Login Registration System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">

                <!-- display this below if a user is logged in (from "login".php url gets) -->
                <?php if (Auth::isLoggedIn()): ?>

                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?action=logout">Logout</a>
                    </li>

                <!-- display this below if a user is non-logged in -->
                <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/login_registration-system/signup.php">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">Login</a>
                    </li>

                <?php endif; ?>

            </ul>
        </div>

    </div>
</nav>
