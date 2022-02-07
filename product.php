<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});

$pathURI = explode('-', $_SERVER['REQUEST_URI']);
$id = $pathURI[count($pathURI) - 1];

//$id = $_GET['id'];
$productModel = new ProductModel();
$item = $productModel->getProductById($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            <?php 
                    $mainPhoto = explode(',', $item['product_photo']);

                ?>
                <img id="productImg" src="/<?php echo BASE_URL; ?>/public/images/<?php echo $mainPhoto[0] ?>" class="img-fluid" alt="...">
                <?php foreach ($mainPhoto as  $photo) {
                    
                 ?>
                <img class="small-img" style="width : 70px;" src="/<?php echo BASE_URL; ?>/public/images/<?php echo $photo; ?>" class="img-fluid" alt="...">
                <?php
                }
                ?>
            </div>
            <div class="col-md-8">
                <h1><?php echo $item['product_name'] ?></h1>
                <p><?php echo $item['product_price'] ?></p>
                <p>
                    <?php echo $item['product_description'] ?>
                </p>
            </div>
        </div>
    </div>
    <script>
            var ProductImg = document.getElementById("productImg");
            var SmallImg = document.getElementsByClassName("small-img");

            SmallImg[0].onclick = function()
            {
                ProductImg.src = SmallImg[0].src;
            }
            SmallImg[1].onclick = function()
            {
                ProductImg.src = SmallImg[1].src;
            }
            SmallImg[2].onclick = function()
            {
                ProductImg.src = SmallImg[2].src;
            }
            SmallImg[3].onclick = function()
            {
                ProductImg.src = SmallImg[3].src;
            }

        </script>
</body>
</html>