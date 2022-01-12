<?php
  session_start();

  require_once 'db/db.php';

  $categories = $connect->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);

  $now = 0;

  if (isset($_GET['category'])) {

    $now = 0;
    $curentCategory = $_GET['category'];
    $cat = $connect->query("SELECT * FROM categories WHERE id='$curentCategory'")->fetch(PDO::FETCH_ASSOC);    
    $goods = $connect->query("SELECT * FROM goods WHERE category='$curentCategory'")->fetchAll(PDO::FETCH_ASSOC);

  } else if (isset($_GET['sort'])) {
    if ($_GET['sort'] === 'new') {
      $now = 1;
      $goods = $connect->query("SELECT * FROM goods ORDER BY id DESC LIMIT 2")->fetchAll(PDO::FETCH_ASSOC);
    } else if ($_GET['sort'] === 'popular') {
      $now = 2;
      $goods = $connect->query("SELECT * FROM goods ORDER BY rating DESC LIMIT 2")->fetchAll(PDO::FETCH_ASSOC);
    } else {
      $goods = $connect->query("SELECT * FROM goods")->fetchAll(PDO::FETCH_ASSOC);
    }
  } else {
      $goods = $connect->query("SELECT * FROM goods")->fetchAll(PDO::FETCH_ASSOC);
      $now = 0;
  }  

  if($_SESSION['admin_example']) {
    echo 'Осуществлен вход для администратора';
  }
  
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="image/x-icon" rel="shortcut icon" href="favicon.ico">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
  <title>ОРХИДЕЯ - онлайн-магазин бытовой техники</title>
  <script src="js/jquery.min.js" defer></script>
  <script src="js/jquery.mask.min.js" defer></script>
  <script src="js/jquery.validate.min.js" defer></script>
  <script src="js/main.js" defer></script>
</head>

<body>
  <header class="header">
    <div class="container header__container">
      <a href="index.php" class="logo">
        орхидея
      </a>
      <div class="cart-wrapper">
        <a href="cart.php" class="cart-link">Моя корзина</a>
        <span class="cart-total">
          кол-во товаров: 
          <span class="cart-count">            
            <?php 
            echo $_SESSION['goods'] ? count($_SESSION['goods']) : '0';
            ?>
          </span>
        </span>
      </div>
    </div>
  </header>