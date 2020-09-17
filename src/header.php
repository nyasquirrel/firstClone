<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php
          echo $page_title;
          ?></title>
  <link rel="stylesheet" href="css/style.min.css">
</head>

<body>
  <header class="header">
    <div class="container">
      <div class="header__inner">
        <div class="logo">
          <a href="/" class="logo__lnk">
            <img src="img/logo.png" alt="Логотип" class="logo__img" width="50" height="50">
          </a>
        </div>
        <div class="user">
          <div class="user__avatar"></div>
          <div class="user__panel">
            <ul class="user__panel-list">
              <li class="user__panel-item">
                <a href="/profile.php" class="user__panel-lnk">
                  Профиль
                </a>
              </li>
              <li class="user__panel-item">
                <a href=#"" class="user__panel-lnk">
                  Настройки
                </a>
              </li>
              <li class="user__panel-item">
                <a href="#" class="user__panel-lnk">
                  Выйти
                </a>
              </li>
            </ul>
            <ul class="user__panel-list user__panel-list-sign">
              <li class="user__panel-item">
                <a href="#sign-in" class="user__panel-lnk">
                  Войти
                </a>
              </li>
              <li class="user__panel-item">
                <a href="#sign-up" class="user__panel-lnk">
                  Регистрация
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>