<?php
	session_start ();   
	if($_SESSION['admin_example'])
	{ 
    require_once '../db/db.php';
    $categories = $connect->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);

		?>
		<!DOCTYPE html>
		<html lang="ru">

		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>orhid-admin</title>
			<link rel="stylesheet" href="style.css">
		</head>

		<body>
			<?php
				if($_POST['submit']) {

          $category = $_POST['category'];
          $title = $_POST['title'];
          $image = $_FILES['filename']['name'];
          $price = $_POST['price'];
          $options = $_POST['options'];
          $rating = $_POST['rating'];

					$connect->query("INSERT INTO `goods` (`id`, `category`, `title`, `image`, `price`, `options`, `rating`) VALUES (NULL, '$category', '$title', '$image', '$price', '$options', '$rating')");

          if ($_FILES && $_FILES["filename"]["error"]== UPLOAD_ERR_OK) {
            $name = "../img/" . $_FILES["filename"]["name"];
            move_uploaded_file($_FILES["filename"]["tmp_name"], $name);
            echo "Файл загружен";
          };
				}
			?>
			<div class="admin-container">
				<?php
				?>
				<form action="" class="admin-form" method="POST" enctype="multipart/form-data" id="addGood">
          <select name="category" class="select" required placeholder="категория">
            <option hidden disabled selected value> категория товара </option>
            <?php
              foreach ($categories as $category) { 
            ?>
              <option value="<?php echo $category['id'] ?>">
                <?php echo $category['name_rus']?>
              </option>            
            <?php
              }  
            ?>
          </select>
					<input class="admin-input" name="title" placeholder="название товара" required>
          <label for="filename">изображение товара: </label>
          <input class="admin-input" type="file" id="filename" name="filename" size="10"/>
					<input class="admin-input" name="price" placeholder="цена товара" type="number" required>
					<input class="admin-input" name="rating" placeholder="рейтинг товара" type="number" required>
          
          <div class="options">
            <input class="admin-input options-main" name="options" placeholder="характеристика товара" type="hidden">            
            <p class="options-title">Характеристики товара:</p>
            <div class="option option1">
              <input class="admin-input option-input option-title" name="option1" placeholder="название характеристики" required>
              <input class="admin-input option-input option-value" name="value1" placeholder="описание характеристики" required>
            </div>
            <button class="option-add">добавить характеристику</button>
            <button class="option-remove">удалить характеристику</button>
          </div>

          <input type="submit" name="submit" value="сохранить" class="admin-exit submit">
				</form>
				<a class="admin-exit" href="admin.php">вернуться в админ-панель без сохранения</a>
			</div>
      <script src="script.js"></script>
		</body>

		</html>
		<?php
	}
	else
	{
		echo 'У вас недостаточно прав для просмотра данной информации! ';
		echo '<html> <head> <meta http-equiv="Refresh" content="2; URL=../index.php"> </head> <body> </body> </html>'; 
		exit;
	}
?>