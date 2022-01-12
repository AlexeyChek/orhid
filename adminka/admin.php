<?php
	session_start ();   
	if($_SESSION['admin_example']) {
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
			<div class="admin-container">
				<a class="admin-exit" href="index.php">выйти из админки</a>
				<ul class="admin-list">
					<li class="admin-list-item">
						<a href="addcategory.php" class="admin-link">добавить категорию</a>
					</li>
					<li class="admin-list-item">
						<a href="addgood.php" class="admin-link">добавить товар</a>
					</li>
					<li class="admin-list-item">
						<a href="edit.php?page=contacts" class="admin-link">редактировать блок &quot;Контакты&quot;</a>
					</li>
					<li class="admin-list-item">
						<a href="edit.php?page=about" class="admin-link">редактировать блок &quot;О компании&quot;</a>
					</li>
					<li class="admin-list-item">
						<a href="edit.php?page=vacancies" class="admin-link">редактировать блок &quot;Вакансии&quot;</a>
					</li>
				</ul>
			</div>
		</body>
		</html>
<?php
	} else {
		echo 'У вас недостаточно прав для просмотра данной информации!';
		echo '<html><head><meta http-equiv="Refresh" content="2; URL=../index.php"></head><body></body></html>'; 
		exit;
	}
?>