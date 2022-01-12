<?php
	session_start ();   
	if($_SESSION['admin_example'])
	{ 
		$page = $_GET['page'];
		$file = '../parts/'.$page.'.php';
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
					$new_text = ($_POST['admin-text']);
					$write = file_put_contents($file, $new_text);
					if($write){ $info = 'Запись  прошла';} else { $BAD = 'Запись не прошла, поробуйте еще раз';}
				}
			?>
			<div class="admin-container">
				<?php
				if($write) {
					if($BAD)
					{
							echo '<div class="red">'.$BAD.'</div>';
					}
					else
					{
							echo '<div class="green">'.$info.'</div>';
					}
				}
				?>
				<form action="" class="admin-form" method="POST">
					<textarea id="admin-textarea" class="admin-text" name="admin-text">
								<?php echo  htmlspecialchars (file_get_contents($file)); ?> 
							</textarea>
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