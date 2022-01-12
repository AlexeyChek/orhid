<?php
  require_once 'parts/header.php';

  if (isset($_GET['succes'])) {
    $ok = $_GET['succes'];
  }
?>

<section class="main">
  <div class="container main__container">
    <?php
      require_once 'parts/nav.php';
    ?>
    <div class="goods">
      <h1 class="title cart-title">моя корзина</h1>
      <?php $totalPrice = 0;
      if ($_SESSION['goods']) {
      foreach ($_SESSION['goods'] as $key=>$good) { 
        $totalPrice += $good['price'];
        ?>
        <div class="good">
          <div class="good__image">
            <img src="img/<?php echo $good['image'] ?>" alt="<?php echo $good['title'] ?>" class="good-image">
            <div class="good__popup popup">
              <form action="actions/delete.php" method="POST" class="popup__button">
                <input type="hidden" name="delete" value="<?php echo $key ?>">
                <button type="submit" class="popup__title">Удалить</button>
              </form>
            </div>
          </div>
          <div class="good__descriptions">
            <h2 class="good__title"><?php echo $good['title'] ?></h2>
            <h3 class="good__title">Характеристики</h3>
            <?php foreach (json_decode($good['options'], true) as $option => $value) { ?>
              <p class="good__option">
                <span class="good__option-title"><?php echo $option ?>: </span>
                <span><?php echo $value ?></span>
              </p>
            <?php } ?>
          </div>
        </div>
        <!-- /.good -->
      <?php }} ?>
      <div class="cart">
        <div class="cart__total">
          <p class="cart__price">Итого:
            <span class="cart__total-price"><?php echo $totalPrice ?>&#8381;</span>
          </p>
          <?php if ($totalPrice > 0) { ?>
          <button class="button cart__button">Оформить заказ</button>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- /.goods -->
  </div>
  <!-- /.container main__container -->
</section>
<!-- /.main -->
<div class="modal">
  <div class="modal__overlay"></div>
  <form action="actions/send.php" method="POST" class="modal__form form">
    <div class="input-group">
      <input type="text" class="form__input" name="user-name" placeholder="ФИО" required>
    </div>
    <div class="input-group">
      <input type="email" class="form__input" name="user-email" placeholder="Email" required>
    </div>
    <div class="input-group">
      <input type="tel" class="form__input tel" name="user-phone" placeholder="Номер телефона" required>
    </div>
    <input type="submit" class="form__button button" value="Подтвердить">
    <div class="modal__close">
      <span class="modal__close-line"></span>
    </div>
  </form>
</div>
<div class="modal-ok <?php if($ok) echo 'modal-ok_visible' ?>">
  <div class="modal-ok__overlay"></div>
  <div class="modal-ok__wrapper">
    <h3 class="modal-ok__title">Ваш заказ оформлен.<br>Спасибо!</h3>
    <p class="modal-ok__text">Письмо придет вам на почту</p>
    <button class="button modal-ok__button">Закрыть</button>
  </div>
</div>
</body>
</html>