<?php
session_start();
require('connect.php');


function fail($field_name)
{
  $_SESSION['error_update_profile']['msg'] = 'Не обновлены следующие поля: ';
  $_SESSION['error_update_profile']['fields'][] = $field_name;
}

function update($field, $dbc)
{
  $value = $_POST[$field];
  $id = $_SESSION['user']['id'];
  $sql = "UPDATE users SET $field = '$value' WHERE id = '$id'";
  mysqli_query($dbc, $sql);
  $user_data = mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM users WHERE id = '$id'"));
  $_SESSION['user'] = $user_data;
}

if (!empty(trim($_POST['name']))) {
  if (!preg_match('/\b[a-zA-Zа-яА-Я\s]{2,100}$/u', $_POST['name'])) {
    fail('имя');
  } else {
    update('name', $connect);
  }
}

if (!empty(trim($_POST['login']))) {
  $login = trim($_POST['login']);
  if (!preg_match('/^\b[a-zA-Z_.]{2,100}$/u', $login)) {
    fail('логин');
  } elseif (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM users WHERE login = '$login'"))) {
    fail('Логин занят, попробуйте другой');
  } else {
    update('login', $connect);
  }
}

if (!$_FILES['avatar']['error']) {
  if ($_FILES['avatar']['size'] > 1024000) {
    fail('аватар');
    $_SESSION['error_update_profile']['avatar'] = 'Размер изображения не должен превышать 1Мб';
  } elseif (!(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION) == 'jpg' || 'jpeg' || 'png')) {
    fail('аватар');
    $_SESSION['error_update_profile']['avatar'] = 'Формат изображения должен быть JPEG или PNG';
  } else {
    $id = $_SESSION['user']['id'];
    $path = '/uploads/' . $id . '/avatar/' . time() . $_FILES['avatar']['name'];
    if (!is_dir('../uploads/' . $id . '/avatar/')) {
      mkdir('../uploads/' . $id . '/avatar/');
    }
    foreach (glob('../uploads/' . $id . '/avatar/*') as $file) {
      unlink($file);
    }
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {

      mysqli_query($connect, "UPDATE users SET avatar = '$path' WHERE id = '$id'");
      $user_data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE id = '$id'"));
      $_SESSION['user'] = $user_data;
    }
  }
}

if (!empty(trim($_POST['email']))) {
  $email = trim($_POST['email']);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    fail('email');
  } else {
    update('email', $connect);
  }
}

if (!empty($_POST['gender'])) {
  update('gender', $connect);
}

if (!empty($_POST['b_day'])) {
  update('b_day', $connect);
}

header('Location: /settings.php');
