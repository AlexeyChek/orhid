<?php

session_start();

include ('password.php');
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Формирование самого письма
    $name = $_POST['user-name'];
    $email = $_POST['user-email'];
    $phone = $_POST['user-phone'];

    $totalPrice = 0;

    $title = "Новый заказ ORCHID";
    $body = "
    <h2>Новый заказ ORCHID</h2>
    <b>Имя:</b> $name<br>
    <b>Email:</b> $email<br><br>
    <b>Телефон:</b> $phone<br><br>
    <b>Заказ:</b><br> ";
    foreach ($_SESSION['goods'] as $good) {
        $id = $good['id'];
        $title = $good['title'];
        $price = $good['price'];
        $body .= "артикул: $id | название товара: $title | цена: $price&#8381;<br>";
        $totalPrice += $price;
    }
    $body .= "<b>Итого: $totalPrice" . "&#8381;</b><br>";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты
    $mail->Username   = $username; // Логин на почте
    $mail->Password   = $password; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom($useremail, 'ORCHID'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress($useremail);
    $mail->addAddress($email); // Ещё один, если нужен

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отправленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
// var_dump($_POST);
// echo $title;
// echo $body;
// echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

unset($_SESSION['goods']);
header("Location: {$_SERVER['HTTP_REFERER']}?succes=ok");