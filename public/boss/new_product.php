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

require_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/category/category.php';
$category = new Category();
$categories = $category->getAssoc();

require_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/unit/unit.php';
$unit = new Unit();
$units = $unit->getAssoc();


$path = "//{$_SERVER['HTTP_HOST']}/inzynierka/modules/product/inc/new_product.inc.php";

$res = (@$_GET['r'] == "succ") ? "Dodano pomyślnie" : "Coś poszło nie tak";
?>
<main>
    <div class="row mt-4">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="mb-3">
                <h2><?= $res ?></h2>
            </div>
            <form method="post" action="<?= $path ?>">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                             <label class="form-label" for="prod_name">Nazwa produktu</label>
                             <input class="form-control mb-4" type="text" id="prod_name" name="product_name" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="id_quantity">Zakupiona ilość</label>
                            <input class="form-control mb-4" type="number" id="id_quantity" name="quantity" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="id_min_quantity">Minimalna potrzebna ilość</label>
                            <input class="form-control mb-4" type="number" id="id_min_quantity" name="min_quantity" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label class="form-label" for="id_unit">Jednostka</label>
                            <select class="form-control" name="unit" id="id_unit">
                                <?php
                                foreach ($units as $item){
                                    echo "<option name='{$item['id']}'>{$item['unit_name']}</option>";
                                }
                                ?>

                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="id_price">Cena zakupionego towaru</label>
                            <input class="form-control mb-4" type="number" id="id_price" name="price" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="id_category">Kategoria</label>
                            <select class="form-control" name="category" id="id_category">
                                <?php
                                foreach ($categories as $item){
                                    echo "<option name='{$item['id']}'>{$item['category_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button class="form-control btn btn-warning btn-lg" type="submit" name="submit">Dodaj kategorię</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>

            </form>
        </div>
    </div>
</main>
</body>
</html>