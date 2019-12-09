<?php
$connection = new PDO ("mysql:host=localhost; dbname=dream_shop; charset=utf8", 'root', '');

$products = $connection->query("SELECT * FROM dream_shop.products");

if ($products->rowCount() == 0) {
  echo "Здесь пока нет товаров";
}

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
    <h2 class="products__title">Книги</h2>
    <?php
      foreach ($products as $product) {
    ?>
      <div class="product">
        <img class="product__image" src="<?= $product['image'] ?>">
        <div class="product__info">
          <p class="product__title"><?= $product['title'] ?></p>
          <p class="product__desc"><?= $product['description'] ?></p>
          <p class="product__price"><?= $product['price'] . ' руб.' ?></p>
          <form action="product.php?id=<?= $product['id'] ?>" method="post">
            <button class="product_btn" type="submit" name="add-to-cart">TO CART</button>
          </form>
        </div>
      </div>
    <?php
      }
    ?>
  </div>
</div>
</body>
</html>
