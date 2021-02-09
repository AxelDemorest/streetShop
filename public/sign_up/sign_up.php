<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../website_part/header.css">
    <title>Inscription - StreetShop</title>
</head>

<body>
    <?php require "../../website_part/header.php" ?>

    <div class="d-flex justify-content-center fz-text">
        <form action="" method="POST" class="mt-5 w-50">

            <div class="mb-3 bg-white rounded shadow-sm border border-2 p-4">
                <label for="titleSubject" class="form-label text-muted text-uppercase ms-1" style="font-size:12px;opacity:0.7">Nom de famille</label>
                <input name="titleTopic" type="text" class="form-control mb-3" id="titleSubject" style="font-size: 14px">

                <label for="titleSubject" class="form-label text-muted text-uppercase ms-1" style="font-size:12px;opacity:0.7">Prénom</label>
                <input name="titleTopic" type="text" class="form-control mb-3" id="titleSubject" style="font-size: 14px">

                <label for="titleSubject" class="form-label text-muted text-uppercase ms-1" style="font-size:12px;opacity:0.7">Adresse e-mail</label>
                <input name="titleTopic" type="email" class="form-control mb-3" id="titleSubject" style="font-size: 14px">

                <label for="titleSubject" class="form-label text-muted text-uppercase ms-1" style="font-size:12px;opacity:0.7">Genre</label>
                <div class="d-flex flex-row">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="man" checked>
                        <label class="form-check-label text-muted text-uppercase ms-1" style="font-size:12px;opacity:0.7" for="exampleRadios1">Homme</label>
                    </div>
                    <div class="form-check ms-4">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="woman">
                        <label class="form-check-label form-label text-muted text-uppercase ms-1" style="font-size:12px;opacity:0.7" for="exampleRadios2">Femme</label>
                    </div>
                </div>

                <label for="titleSubject" class="form-label text-muted text-uppercase ms-1" style="font-size:12px;opacity:0.7">Mot de passe</label>
                <input name="titleTopic" type="password" class="form-control mb-3" id="titleSubject" style="font-size: 14px">

                <label for="titleSubject" class="form-label text-muted text-uppercase ms-1" style="font-size:12px;opacity:0.7">Confirmez le mot de passe</label>
                <input name="titleTopic" type="password" class="form-control mb-3" id="titleSubject" style="font-size: 14px">

                <input type="submit" class="btn btn-primary" name="submitButtonQuestion" style="font-size:14px" value="Valider l'inscription">
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>