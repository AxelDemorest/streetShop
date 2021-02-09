<?php

if (isset($_SESSION['auth'])) : ?>

    <?php $user = $_SESSION['auth'];

    $reqFetchUser = $pdo->prepare("SELECT * FROM Users WHERE email = ?");

    $reqFetchUser->execute([$user->email]);

    $userConnexion = $reqFetchUser->fetch();

    ?>

    <!-- Navbar de l'utilisateur non connecté -->
    <nav class="navbar sticky-top navbar-light navbar-expand-xl bg-white fz-text shadow-sm d-flex align-items-center">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center ms-3 pm-text" href="">
                <h2>StreetShop</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" style="font-size: 15px" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 me-3" style="font-weight:400">
                    <li class="nav-item d-flex flex-column px-lg-3 pt-2 pt-lg-0">
                        <a class="nav-link text-dark" aria-current="page" href="http://localhost:8888/streetShop/public/home/home.php">Accueil</a>
                        <span class="border-li bg-primary rounded-pill ms-2"></span>
                    </li>
                    <li class="nav-item d-flex flex-column px-lg-3">
                        <a class="nav-link text-dark" href="#">Panier</a>
                        <span class="border-li bg-primary rounded-pill ms-2"></span>
                    </li>
                    <li class="nav-item d-flex flex-column px-lg-3">
                        <a class="nav-link text-dark" href="#">Profil</a>
                        <span class="border-li bg-primary rounded-pill ms-2"></span>
                    </li>
                    <li class="nav-item d-flex flex-column px-lg-3">
                        <a class="nav-link text-dark" href="">Déconnexion</a>
                        <span class="border-li bg-secondary rounded-pill ms-2"></span>
                    </li>
                    <?php if ($userConnexion->rank == 1) : ?>
                        <li class="nav-item d-flex flex-column px-lg-3">
                            <a class="nav-link text-dark" href="">Administration</a>
                            <span class="border-li bg-secondary rounded-pill ms-2"></span>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

<?php else : ?>

    <!-- Navbar de l'utilisateur non connecté -->
    <nav class="navbar sticky-top navbar-light navbar-expand-xl bg-white fz-text shadow-sm d-flex align-items-center">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center ms-3 pm-text" href="">
                <h2>StreetShop</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" style="font-size: 15px" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 me-3" style="font-weight:400">
                    <li class="nav-item d-flex flex-column px-lg-3 pt-2 pt-lg-0">
                        <a class="nav-link text-dark" aria-current="page" href="">Accueil</a>
                        <span class="border-li bg-primary rounded-pill ms-2"></span>
                    </li>
                    <li class="nav-item d-flex flex-column px-lg-3">
                        <a class="nav-link text-dark" href="#">Panier</a>
                        <span class="border-li bg-primary rounded-pill ms-2"></span>
                    </li>
                    <li class="nav-item d-flex flex-column px-lg-3">
                        <a class="nav-link text-dark" href="#">Profil</a>
                        <span class="border-li bg-primary rounded-pill ms-2"></span>
                    </li>
                    <li class="nav-item d-flex flex-column px-lg-3">
                        <a class="nav-link text-dark" href="http://localhost:8888/streetShop/public/sign_in/sign_in.php">Connexion</a>
                        <span class="border-li bg-secondary rounded-pill ms-2"></span>
                    </li>
                    <li class="nav-item d-flex flex-column px-lg-3">
                        <a class="nav-link text-dark" href="http://localhost:8888/streetShop/public/sign_up/sign_up.php">Inscription</a>
                        <span class="border-li bg-secondary rounded-pill ms-2"></span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<?php endif; ?>