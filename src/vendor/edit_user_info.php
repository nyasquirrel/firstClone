<?php
session_start();
require('connect.php');

if (!empty(trim($_POST['name']))) {
  if (preg_match('/\b[a-zA-Zа-яА-Я]{1,100}$/u', $_POST['name'])) {
    echo 'Работает';
  } else {
    echo 'err';
  }
}

echo '<hr>' . $_POST['name'] . '<hr>' . preg_match('/[a-zA-Zа-яА-Я]{1,100}$/u', $_POST['name']);
