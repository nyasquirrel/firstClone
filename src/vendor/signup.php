<?php
session_start();
require('connect.php');

function fail($str)
{
  $_SESSION['msg'] = $str;
  header('Location: /');
  exit();
}

if (!empty(trim($_POST['login']))) {
  $login = trim($_POST['login']);
} else {
  fail('Заполните поле логина');
}

if (!empty(trim($_POST['email']))) {
  $email = $_POST['email'];
} else {
  fail('Введите почтовый адрес');
}

if (!empty(trim($password = $_POST['password']))) {
  $password = md5($_POST['password']);
} else {
  fail('Заполните поле пароля');
}

if (!empty(trim($_POST['password_confirm']))) {
  $password_confirm = md5($_POST['password_confirm']);
} else {
  fail('Заполните поле проверочного пароля');
}

$check_login = mysqli_query($connect, "select login from users where login = '$login' ");

if (mysqli_num_rows($check_login) > 0) {
  fail('Логин занят, попробуйте другой');
}

$check_email = mysqli_query($connect, "select email from users where email = '$email' ");

if (mysqli_num_rows($check_email) > 0) {
  fail('Пользователь с таким Email уже зарегестрирован');
}

$reg = mysqli_query($connect, "INSERT INTO users (login, password, email) values ('$login', '$password', '$email')");

if ($reg) {
  $_SESSION['accepted'] = 'Вы успешно зарегестрировались!';
  mysqli_close($connect);
  header('Location: /');
}
