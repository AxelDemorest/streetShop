<?php

session_start();

require_once '../../database/database.php';

require "admin_functions.php";

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="admin.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../website_part/header.css">
    <title>Administration</title>
</head>

<body>

    <?php if (isset($_SESSION['auth'])) : ?>

        <?php if ($_SESSION['auth']->rank == 1) : ?>
            <div class="d-flex flex-row">
                <div id="side_bar" class="d-flex flex-column align-items-center">
                    <h2 class="pm-text text-white mt-3" style="opacity:0.6">StreetShop</h2>
                    <ul id="list-sidebar" class="ps-0 pt-3">
                        <li class="pt-1"><a href="http://localhost:8888/streetShop/public/home/home.php" class="text-decoration-none text-white fw-light" style="opacity:0.6">Accueil</a></li>
                        <li class="pt-4"><a href="" class="text-decoration-none text-white fw-light" style="opacity:0.6">Utilisateurs</a></li>
                        <li class="pt-4"><a href="" class="text-decoration-none text-white fw-light" style="opacity:0.6">Catégories</a></li>
                        <li class="pt-4"><a href="" class="text-decoration-none text-white fw-light" style="opacity:0.6">Produits</a></li>
                        <!--                         <li class="pt-4"><a href="" class="text-decoration-none text-white fw-light" style="opacity:0.6">Commandes</a></li> -->
                    </ul>
                </div>

                <div class="d-flex flex-column" style="width:85%">


                    <div>
                        <!-- Utilisateurs -->
                        <div class="d-flex flex-column align-items-center">
                            <div class="w-100 border-2 border-bottom d-flex flex-row align-items-center justify-content-end" style="height:3em">
                                <img src="../../img/lock.png" class="me-2" width="20px" alt="">
                                <p class="fz-text me-3 mb-0">Connecté en tant que <?= $_SESSION['auth']->lastName ?></p>
                            </div>
                            <h1 class="pm-text">Administration</h1>
                            <h3 class="pm-text mt-5 mb-4">Utilisateurs</h3>
                            <div class="d-flex flex-row flex-wrap">
                                <div class="rounded border border-2 shadow-sm pe-4 pb-4 ps-4 pt-2 d-flex flex-column align-items-center">
                                    <?php $listUsers = $pdo->query("SELECT * FROM Users ORDER BY created_at DESC");

                                    $listUsers = $listUsers->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($listUsers as $key => $value) : ?>

                                        <div class="d-flex flex-column align-items-center mt-3">
                                            <p class="fz-text mb-2"><?php echo $value['email'] ?></p>
                                            <div class="d-flex flex-row">
                                                <a href="http://localhost:8888/streetShop/public/account/account.php?id=<?= $value['usersId'] ?>" style="font-size:13px" class="ms-2 btn btn-primary">Accéder au profil</a>
                                                <?php if ($value["rank"] == 0) : ?>
                                                    <button onclick="become_admin('<?= $value['usersId'] ?>')" style="font-size:13px" class="ms-2 btn btn-success">Promouvoir admin</button>
                                                <?php endif; ?>
                                            </div>

                                        </div>


                                    <?php endforeach; ?>
                                </div>
                                <div class="rounded border border-2 shadow-sm p-4 ms-5 d-flex flex-column justify-content-center" style="height:25%">
                                    <?php if (!empty($errors)) : ?>
                                        <div class="alert alert-danger pb-0 mx-auto" style="font-size:14px">
                                            <ul class="ps-0">

                                                <?php foreach ($errors as $error) : ?>

                                                    <li><?= $error; ?></li>

                                                <?php endforeach; ?>

                                            </ul>
                                        </div>

                                    <?php endif; ?>
                                    <form action="" class="d-flex flex-column" method="POST">
                                        <input name="userSupp" class="border border-1 rounded shadow-sm fw-light text-center" style="opacity:0.6" type="text" placeholder="e-mail de l'utilisateur">
                                        <input name="submitSupp" class="btn btn-danger mt-4" type="submit" value="Supprimer l'utilisateur">
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div>
                        <!-- Catégories -->
                        <div class="d-flex flex-column align-items-center">
                            <h3 class="pm-text mt-5 mb-4">Catégories</h3>
                            <div class="d-flex flex-row flex-wrap">
                                <div class="rounded border border-2 shadow-sm pe-4 pb-4 ps-4 pt-2 d-flex flex-column align-items-center">
                                    <?php $listCategories = $pdo->query("SELECT * FROM Categories");

                                    $listCategories = $listCategories->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($listCategories as $key => $value) : ?>

                                        <div class="d-flex flex-column align-items-center mt-3">
                                            <p class="fz-text mb-2">Les <?php echo $value['categoriesName'] ?></p>
                                            <div class="d-flex flex-row">
                                                <a href="http://localhost:8888/streetShop/public/home/home.php#<?= $value['categoriesName'] ?>" style="font-size:13px" class="ms-2 btn btn-primary">Accéder à la catégorie</a>
                                                <button onclick="supp_category(<?= $value['categoriesId'] ?>)" style="font-size:13px" class="ms-2 btn btn-danger">Supprimer la catégorie</button>
                                            </div>
                                        </div>


                                    <?php endforeach; ?>
                                </div>
                                <div class="rounded border border-2 shadow-sm p-4 ms-5 d-flex flex-column justify-content-center" style="height:25%">
                                    <?php if (!empty($errorsCat)) : ?>
                                        <div class="alert alert-danger pb-0 mx-auto" style="font-size:14px">
                                            <ul class="ps-0">

                                                <?php foreach ($errorsCat as $error) : ?>

                                                    <li><?= $error; ?></li>

                                                <?php endforeach; ?>

                                            </ul>
                                        </div>

                                    <?php endif; ?>
                                    <form action="" class="d-flex flex-column" method="POST">
                                        <input name="catName" class="border border-1 rounded shadow-sm fw-light text-center" style="opacity:0.6" type="text" placeholder="nom de la catégorie">
                                        <input name="catNewName" class="border border-1 rounded shadow-sm fw-light text-center mt-4" style="opacity:0.6" type="text" placeholder="nouveau nom">
                                        <input name="submitCat" class="btn btn-primary mt-4" type="submit" value="Modifier la catégorie">
                                    </form>
                                </div>
                                <div class="rounded border border-2 shadow-sm p-4 ms-5 d-flex flex-column justify-content-center" style="height:25%">
                                    <?php if (!empty($errorsNewCat)) : ?>
                                        <div class="alert alert-danger pb-0 mx-auto" style="font-size:14px">
                                            <ul class="ps-0">

                                                <?php foreach ($errorsNewCat as $error) : ?>

                                                    <li><?= $error; ?></li>

                                                <?php endforeach; ?>

                                            </ul>
                                        </div>

                                    <?php endif; ?>
                                    <form action="" class="d-flex flex-column" method="POST">
                                        <input name="newCatName" class="border border-1 rounded shadow-sm fw-light text-center" style="opacity:0.6" type="text" placeholder="nom de la catégorie">
                                        <input name="newSubmitCat" class="btn btn-success mt-4" type="submit" value="Ajouter la catégorie">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <!-- Produits -->
                        <div class="d-flex flex-column align-items-center">
                            <h3 class="pm-text mt-5 mb-4">Produits</h3>
                            <div class="d-flex flex-row flex-wrap">
                                <div class="rounded border border-2 shadow-sm pe-4 pb-4 ps-4 pt-2 d-flex flex-column align-items-center">
                                    <?php $listCategories = $pdo->query("SELECT * FROM Products");

                                    $listCategories = $listCategories->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($listCategories as $key => $value) : ?>

                                        <div class="w-100 d-flex flex-row justify-content-between mt-3">
                                            <p class="fz-text mb-2"><?php echo $value['productsName'] ?></p>
                                            <button onclick="supp_product(<?= $value['productsId'] ?>)" style="font-size:13px" class="ms-2 btn btn-danger">Supprimer le produit</button>
                                        </div>


                                    <?php endforeach; ?>
                                </div>
                                <div class="rounded border border-2 shadow-sm p-4 ms-5 d-flex flex-column justify-content-center" style="height:25%">
                                    <?php if (!empty($errorsModifProd)) : ?>
                                        <div class="alert alert-danger pb-0 mx-auto" style="font-size:14px">
                                            <ul class="ps-0">

                                                <?php foreach ($errorsModifProd as $error) : ?>

                                                    <li><?= $error; ?></li>

                                                <?php endforeach; ?>

                                            </ul>
                                        </div>

                                    <?php endif; ?>
                                    <form action="" class="d-flex flex-column" method="POST">
                                        <input name="nameProd" class="border border-1 rounded shadow-sm fw-light text-center border border-primary" style="opacity:0.6" type="text" placeholder="nom du produit">
                                        <input name="newNameProd" class="border border-1 rounded shadow-sm fw-light text-center  mt-4" style="opacity:0.6" type="text" placeholder="Nouveau nom">
                                        <input name="priceProd" class="border border-1 rounded shadow-sm fw-light text-center mt-4" style="opacity:0.6" type="text" placeholder="Nouveau prix">
                                        <input name="imgProd" class="border border-1 rounded shadow-sm fw-light text-center mt-4" style="opacity:0.6" type="text" placeholder="Nouvelle Image">
                                        <input name="submitProd" class="btn btn-primary mt-4" type="submit" value="Modifier le produit">
                                        <p class="text-muted mt-3">Seul le premier champs est obligatoire.</p>
                                    </form>
                                </div>
                                <div class="rounded border border-2 shadow-sm p-4 ms-5 d-flex flex-column justify-content-center" style="height:25%">
                                    <?php if (!empty($errorsAddProduct)) : ?>
                                        <div class="alert alert-danger pb-0 mx-auto" style="font-size:14px">
                                            <ul class="ps-0">

                                                <?php foreach ($errorsAddProduct as $error) : ?>

                                                    <li><?= $error; ?></li>

                                                <?php endforeach; ?>

                                            </ul>
                                        </div>

                                    <?php endif; ?>
                                    <form action="" class="d-flex flex-column" method="POST">
                                        <input name="addNameProd" class="border border-1 rounded shadow-sm fw-light text-center" style="opacity:0.6" type="text" placeholder="nom du produit">
                                        <input name="addPriceProd" class="border border-1 rounded shadow-sm fw-light text-center mt-4" style="opacity:0.6" type="text" placeholder="Nouveau prix">
                                        <input name="addImgProd" class="border border-1 rounded shadow-sm fw-light text-center mt-4" style="opacity:0.6" type="text" placeholder="Nouvelle Image">
                                        <input name="addCatProd" class="border border-1 rounded shadow-sm fw-light text-center mt-4" style="opacity:0.6" type="text" placeholder="Catégorie du produit">
                                        <input name="addSubmitProd" class="btn btn-success mt-4" type="submit" value="Ajouter le produit">
                                        <p class="text-muted mt-3">Tous les champs sont obligatoires.</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php else : ?>

            <h1 class="pm-text mx-auto">Page introuvable</h1>

        <?php endif; ?>

    <?php else : ?>

        <h1 class="pm-text mx-auto">Page introuvable</h1>
    <?php endif; ?>

    <script src="../ajax/ajax.js"></script>
</body>

</html>