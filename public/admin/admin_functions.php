<?php

if (isset($_POST['submitSupp'])) {

    $errors = array();

    $valid = true;

    if (empty($_POST['userSupp'])) {
        $errors['input'] = "Un des champs n'a pas été complété.";
        $valid = false;
    } else {
        $reqFetchMail = $pdo->prepare('SELECT email FROM Users WHERE email = ?');

        $reqFetchMail->execute([$_POST['userSupp']]);

        $user = $reqFetchMail->fetch();

        if (!$user) {
            $errors['useEmail'] = 'Cet utilisateur n\'existe pas.';
            $valid = false;
        }

        if ($valid && empty($errors)) {

            $req = $pdo->prepare("DELETE FROM Users WHERE email = ?");

            $req->execute([$_POST['userSupp']]);
        }
    }
}

if (isset($_POST['submitCat'])) {

    $errorsCat = array();

    $valid = true;

    if (empty($_POST['catNewName']) || empty($_POST['catName'])) {
        $errorsCat['input'] = "Un des champs n'a pas été complété.";
        $valid = false;
    } else {
        $reqFetchCategory = $pdo->prepare('SELECT * FROM Categories WHERE categoriesName = ?');

        $reqFetchCategory->execute([$_POST['catName']]);

        $user = $reqFetchCategory->fetch();

        if (!$user) {
            $errorsCat['noCat'] = 'Cette catégorie n\'existe pas.';
            $valid = false;
        }

        if ($valid && empty($errorsCat)) {

            $req = $pdo->prepare("UPDATE Categories SET categoriesName = ? WHERE categoriesName = ?");

            $req->execute([$_POST['catNewName'], $_POST['catName']]);

            header('Location: http://localhost:8888/streetShop/public/admin/dashboard.php');

            exit;
        }
    }
}

if (isset($_POST['newSubmitCat'])) {

    $errorsNewCat = array();

    $valid = true;

    if (empty($_POST['newCatName'])) {
        $errorsNewCat['input'] = "Un des champs n'a pas été complété.";
        $valid = false;
    } else {
        $reqFetchCategory = $pdo->prepare('SELECT * FROM Categories WHERE categoriesName = ?');

        $reqFetchCategory->execute([$_POST['newCatName']]);

        $user = $reqFetchCategory->fetch();

        if ($user) {
            $errorsNewCat['alreadyCat'] = 'Cette catégorie existe déjà.';
            $valid = false;
        }

        if ($valid && empty($errorsNewCat)) {

            $req = $pdo->prepare("INSERT INTO Categories(categoriesName) VALUES (?)");

            $req->execute([$_POST['newCatName']]);

            header('Location: http://localhost:8888/streetShop/public/admin/dashboard.php');

            exit;
        }
    }
}

if (isset($_POST['submitProd'])) {

    $errorsModifProd = array();

    $valid = true;

    if (empty($_POST['nameProd'])) {
        $errorsModifProd['input'] = "Un des champs n'a pas été complété.";
        $valid = false;
    } else {
        $reqFetchCategory = $pdo->prepare('SELECT * FROM Products WHERE productsName = ?');

        $reqFetchCategory->execute([$_POST['nameProd']]);

        $reqFetchCategory = $reqFetchCategory->fetch(PDO::FETCH_ASSOC);

        if (!$reqFetchCategory) {
            $errorsModifProd['alreadyCat'] = 'Produit introuvable.';
            $valid = false;
        }

        if (!empty($_POST['nameProd']) && empty($_POST['newNameProd']) && empty($_POST['priceProd']) && empty($_POST['imgProd'])) {
            $errorsModifProd['nothing'] = 'Tu n\'as effectué aucune modification.';
            $valid = false;
        }

        if ($valid && empty($errorsModifProd)) {

            if (!empty($_POST['newNameProd']) && $_POST['nameProd'] !== $_POST['newNameProd']) {

                $req = $pdo->prepare("UPDATE Products SET productsName = ? WHERE productsName = ?");

                $req->execute([$_POST['newNameProd'], $_POST['nameProd']]);
            }

            if (!empty($_POST['priceProd'])) {

                $req = $pdo->prepare("UPDATE Products SET price = ? WHERE productsName = ?");

                $req->execute([$_POST['priceProd'], $_POST['nameProd']]);
            }

            if (!empty($_POST['imgProd'])) {

                $req = $pdo->prepare("UPDATE Products SET productsImg = ? WHERE productsName = ?");

                $req->execute([$_POST['imgProd'], $_POST['nameProd']]);
            }

            header('Location: http://localhost:8888/streetShop/public/admin/dashboard.php');

            exit;
        }
    }
}

if (isset($_POST['addSubmitProd'])) {

    $errorsAddProduct = array();

    $valid = true;

    if (empty($_POST['addNameProd'])) {
        $errorsAddProduct['input'] = "Un des champs n'a pas été complété.";
        $valid = false;
    } else {
        $reqFetchProduct = $pdo->prepare('SELECT * FROM Products WHERE productsName = ?');

        $reqFetchProduct->execute([$_POST['addNameProd']]);

        $reqFetchProduct = $reqFetchProduct->fetch();

        if ($reqFetchProduct) {
            $errorsAddProduct['alreadyCat'] = 'Ce produit existe déjà.';
            $valid = false;
        }

        if (empty($_POST['addPriceProd']) || empty($_POST['addImgProd']) || empty($_POST['addCatProd'])) {
            $errorsAddProduct['input'] = "Un des champs n'a pas été complété.";
            $valid = false;
        } else {
            $reqFetchCategory = $pdo->prepare('SELECT * FROM Categories WHERE categoriesName = ?');

            $reqFetchCategory->execute([$_POST['addCatProd']]);

            $reqFetchCategory = $reqFetchCategory->fetch(PDO::FETCH_ASSOC);

            if (!$reqFetchCategory) {
                $errorsAddProduct['alreadyCat'] = 'Cette catégorie n\'existe pas.';
                $valid = false;
            }

            if ($valid && empty($errorsAddProduct)) {

                $req = $pdo->prepare("INSERT INTO Products(productsName,price,productsImg,categoriesId) VALUES (?, ?, ?, ?)");

                $req->execute([$_POST['addNameProd'], $_POST['addPriceProd'], $_POST['addImgProd'], $reqFetchCategory['categoriesId']]);

                header('Location: http://localhost:8888/streetShop/public/admin/dashboard.php');

                exit;
            }
        }
    }
}
