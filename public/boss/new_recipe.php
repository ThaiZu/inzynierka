<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nowa receptura</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>



<?php
require_once "../navbar/nav.html";

require_once ($_SERVER['DOCUMENT_ROOT']).'/inzynierka/modules/product/product.php';
$product = new Product();
$products = $product->getAssoc();

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
                <section class="recipe-prop mb-4">
                    <div class="row">
                        <div class="col-md-5">
                            <label class="form-label" for="id_recipe_name">Nazwa receptury</label>
                            <input class="form-control" type="text" name="recipe_name" id="id_recipe_name" required>
                        </div>
                    </div>
                </section>

                <section class="product mb-4">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="id_prod" class="form-label">Produkt</label>
                            <select class="form-select" id="id_prod" name="product">
                                <?php
                                foreach($products as $item){
                                    echo "<option value='{$item['id']}'>{$item['product_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="id_quantity">Ilość</label>
                            <input class="form-control" type="text" id="id_quantity" name="quantity">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="id_unit">Jednostka</label>
                            <select class="form-select" id="id_unit" name="unit">
                                <?php
                                foreach ($units as $item){
                                    echo "<option value='{$item['id']}'>{$item['unit_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </section>
                
                <div class="row">
                    <div class="col-md-5">
                        <button class="form-control btn btn-primary">Dodaj recepturę</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
var x = 1;
    $(document).ready(function () {
        $('button.add_stage').click(function (event) {
            event.preventDefault();
            var copy_of_row = $(this).prev().clone();
            $(copy_of_row).find('input').val('');
            $(copy_of_row).find('textarea').val('').height(this.scrollHeight + 20);
            $(this).prev().after(copy_of_row);
            x++;
        });

        $('.remove_stage').click(function (event) {
            console.log(`ELO BYKU ${x}`)
            event.preventDefault();
            if (x != 1) {
                $(this).parent('div').remove();
                x--;
            }
        });
    });

</script>
</body>
</html>