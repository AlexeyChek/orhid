<?php

session_start();

if (isset($_POST['delete'])) {
  $id = $_POST['delete'];

  unset($_SESSION['goods'][$id]);
}

header("Location: {$_SERVER['HTTP_REFERER']}");
