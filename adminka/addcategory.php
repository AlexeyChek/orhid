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

          $rusCat = $_POST['admin-ru-category'];
          $engCat = $_POST['admin-en-category'];

					$connect->query("INSERT INTO `categories` (`id`, `name`, `name_rus`) VALUES (NULL, '$engCat', '$rusCat')");
				}
			?>
			<div class="admin-container">
				<?php
				?>
				<form action="" class="admin-form" method="POST">
					<input class="admin-input" name="admin-ru-category" placeholder="название категории на русском" required>
					<input class="admin-input" name="admin-en-category" placeholder="название категории на английском" required>
          <input type="submit" name="submit" value="сохранить" class="admin-exit">
				</form>
				<a class="admin-exit" href="admin.php">вернуться в админ-панель без сохранения</a>
			</div>
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