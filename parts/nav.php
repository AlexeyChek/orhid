<?php ?>
<nav class="navigation">
  <ul class="navigation__list">
    <li class="navigation__item navigation__submenu <?php if($now === 0) echo 'navigation__item_active' ?>">
      <a href="index.php" class="navigation__link">Все&nbsp;товары</a>
      <button class="navigation__button">
        <img class="navigation__icon" src="img/icon-next.svg" alt="иконка: далее">
      </button>
      <ul class="navigation__list navigation__list_next">
        <?php foreach ($categories as $category) { ?>
        <li class="navigation__item">
          <a href="index.php?category=<?php echo $category['id'] ?>" class="navigation__link">
            <?php echo $category['name_rus']?>
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <li class="navigation__item <?php if($now === 1) echo 'navigation__item_active' ?>">
      <a href="index.php?sort=new" class="navigation__link">Новинки</a>
    </li>
    <li class="navigation__item <?php if($now === 2) echo 'navigation__item_active' ?>">
      <a href="index.php?sort=popular" class="navigation__link">Популярное</a>
    </li>
    <li class="navigation__item <?php if($now === 3) echo 'navigation__item_active' ?>">
      <a href="contacts.php" class="navigation__link">Контакты</a>
    </li>
    <li class="navigation__item <?php if($now === 4) echo 'navigation__item_active' ?>">
      <a href="about.php" class="navigation__link">О&nbsp;Компании</a>
    </li>
    <li class="navigation__item <?php if($now === 5) echo 'navigation__item_active' ?>">
      <a href="vacancies.php" class="navigation__link">Вакансии</a>
    </li>
  </ul>
  <div class="navigation__menu">
    <span class="navigation__menu-line"></span>
  </div>
</nav>
<!-- /.navigation -->
