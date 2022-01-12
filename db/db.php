<?php

$connect = new PDO('mysql:host=localhost; dbname=orchid; charset: utf8', 'root', 'root');
$connect->query("set names utf8");