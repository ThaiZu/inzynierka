<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nowy produkt</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>



<?php
require_once "../navbar/nav.html";

$path = "//{$_SERVER['HTTP_HOST']}/inzynierka/modules/product/inc/new_product.inc.php";


$res = (@$_GET['r'] == "succ") ? "Dodano pomyślnie" : "Coś poszło nie tak";
?>
<main>
    <div class="row mt-4">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="mb-3">
                <h2><?= $res ?></h2>
            </div>
            <form method="post" action="<?= $path ?>">
                <div class="mb-3">
                    <label class="form-label" for="cat_name">Nazwa kategorii</label>
                    <input class="form-control mb-4" type="text" id="cat_name" name="category_name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="desc">Opcjonalna notatka</label>
                    <textarea class="form-control" id="desc" name="desc"></textarea>
                </div>
                <div class="mb-3">
                    <button class="form-control btn btn-warning" type="submit" name="submit">Dodaj kategorię</button>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>