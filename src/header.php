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
  <pre>
    <?php
    print_r($_SESSION);
    ?>
  </pre>
  <header class="header">
    <div class="container">
      <div class="header__inner">
        <div class="logo">
          <a href="/" class="logo__lnk">
            <img src="img/logo.png" alt="Логотип" class="logo__img" width="50" height="50">
          </a>
        </div>
        <div class="user">

          <?php
          if (isset($_SESSION['user'])) {
          ?>
            <ul class="user__panel">
              <div class="user__avatar" <?php
                                        if ($_SESSION['user']['avatar'] != NULL) {
                                          echo 'style="background-image: url(\'' . $_SESSION['user']['avatar'] . '\');"';
                                        }
                                        ?>>
              </div>
              <li class="user__panel-item">
                <a href="#" class="user__panel-lnk">
                  Профиль
                </a>
              </li>
              <li class="user__panel-item">
                <a href="/settings.php" class="user__panel-lnk">
                  Настройки
                </a>
              </li>
              <li class="user__panel-item">
                <a href="/vendor/logout.php" class="user__panel-lnk">
                  Выйти
                </a>
              </li>
            </ul>
          <?php
          }
          if (!isset($_SESSION['user'])) {
          ?>
            <ul class="user__panel user__panel-list-sign">
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
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </header>