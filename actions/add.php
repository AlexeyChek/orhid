<?php

session_start();
require_once '../db/db.php';

if (isset($_POST['id'])) {

  // unset($_SESSION['goods']); // очистка сессии

  $id = $_POST['id'];
  $good = $connect->query("SELECT * FROM goods WHERE id='$id'");
  $good = $good->fetch(PDO::FETCH_ASSOC);

  $_SESSION['goods'][] = $good;

}


header("Location: {$_SERVER['HTTP_REFERER']}");
