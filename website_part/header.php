<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>StreetShop</title>
</head>

<body>

    <!-- Navbar de l'utilisateur non connecté -->
    <nav class="navbar sticky-top navbar-light navbar-expand-xl bg-white fz-text shadow-sm d-flex align-items-center">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center ms-3" href="/forum-coding-factory/public/home/home.php">
                <h2>StreetShop</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" style="font-size: 15px" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 me-3" style="font-weight:400">
                    <li class="nav-item d-flex flex-column px-lg-3 pt-2 pt-lg-0">
                        <a class="nav-link text-dark" aria-current="page" href="/forum-coding-factory/public/home/home.php">Accueil</a>
                        <span class="border-li bg-danger rounded-pill ms-2"></span>
                    </li>
                    <li class="nav-item d-flex flex-column px-lg-3">
                        <a class="nav-link text-dark" href="/forum-coding-factory/public/forum/forum.php">Forum</a>
                        <span class="border-li bg-danger rounded-pill ms-2"></span>
                    </li>
                    <li class="nav-item d-flex flex-column px-lg-3">
                        <a class="nav-link text-dark" href="#">Prestige</a>
                        <span class="border-li bg-danger rounded-pill ms-2"></span>
                    </li>
                    <li class="nav-item d-flex flex-column px-lg-3">
                        <a class="nav-link text-dark" href="#">Autres</a>
                        <span class="border-li bg-danger rounded-pill ms-2"></span>
                    </li>
                    <li class="nav-item d-flex flex-column px-lg-3">
                        <a class="nav-link text-dark" href="/forum-coding-factory/public/inscription-connexion/connexion.php">Connexion</a>
                        <span class="border-li bg-warning rounded-pill ms-2"></span>
                    </li>
                    <li class="nav-item d-flex flex-column px-lg-3">
                        <a class="nav-link text-dark" href="/forum-coding-factory/public/inscription-connexion/inscription.php">Inscription</a>
                        <span class="border-li bg-warning rounded-pill ms-2"></span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>