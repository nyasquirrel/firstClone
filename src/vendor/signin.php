<?php
session_start();
require('connect.php');


function fail($str)
{
  $_SESSION['msg_signin'] = $str;
  header('Location: /');
  exit();
}

if (!empty(trim($_POST['login']))) {
  $login = trim($_POST['login']);
} else {
  fail('Введите логин');
}

if (!empty($_POST['password'])) {
  $password = md5($_POST['password']);
} else {
  fail('Введите пароль');
}

if ($result = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login'")) {
  if (mysqli_num_rows($result) == 0) {
    fail('Пользователя с таким логином не существует');
  }
  $user_data = mysqli_fetch_assoc($result);
  if ($user_data['password'] != $password) {
    fail('Неверный пароль, попробуйте ещё раз');
  }
  $_SESSION['user'] = $user_data;
  mysqli_close($connect);
  header('Location: /');
} else {
  echo 'Ошибка при проверке пользователя, попробуйте <a href="/">ещё раз</a><hr>' . mysqli_error($connect);
}
