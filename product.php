<?php
$connection = new PDO ("mysql:host=localhost; dbname=dream_shop; charset=utf8", 'root', '');

$product_id = $_GET['id'];

$product = $connection->query("SELECT * FROM dream_shop.products WHERE id='$product_id' LIMIT 1");
$product = $product->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dream Shop</title>
  <meta charset="utf-8">
  <link href="reset.css" rel="stylesheet">
  <link href="styles.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <div class="top-navigation">
    <div class="cart">
      <button class="cart__quick">CART</button>
    </div>
  </div>
  <div class="products">
    <div class="product">
      <img class="product__image" src="<?= $product['image'] ?>">
      <div class="product__info">
        <p class="product__title"><?= $product['title'] ?></p>
        <p class="product__desc"><?= $product['description'] ?></p>
        <p class="product__price"><?= $product['price'] . ' руб.' ?></p>
        <form action="" method="post">
          <button class="product_btn" type="submit" name="add-to-cart">TO CART</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
