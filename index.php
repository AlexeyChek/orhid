<?php
  require_once 'parts/header.php';
?>

<section class="main">
  <div class="container main__container">
    <?php
      require_once 'parts/nav.php';
    ?>
    <div class="goods">
      <h1 class="title index-title">Все&nbsp;товары
        <?php if ($curentCategory) { ?>
          <img src="img/icon-next.svg" alt="иконка: далее" class="title-image">
          <?php echo $cat['name_rus'];
          } ?>
      </h1>
      <?php foreach ($goods as $good) { ?>
        <div class="good">
          <div class="good__image">
            <img src="img/<?php echo $good['image'] ?>" alt="<?php echo $good['title'] ?>" class="good-image">
            <div class="good__popup popup">
              <form action="actions/add.php" method="POST" class="popup__button">
                <input type="hidden" name="id" value="<?php echo $good['id'] ?>">
                <button type="submit" class="popup__title">В корзину
                  <span class="popup__price"><span class="price"><?php echo $good['price'] ?></span>&#8381;</span>
                </button>
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
      <?php } ?>
    </div>
    <!-- /.goods -->
  </div>
  <!-- /.container main__container -->
</section>
<!-- /.main -->
</body>

</html>