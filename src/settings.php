<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: /');
}
$page_title = 'Профиль';
include('header.php');
?>
<main class="main">
  <div class="container">
    <div class="main__profile">
      <div class="menu">
        <ul class="menu__list">
          <li class="menu__list-item">
            <a href="#info" class="menu__list-lnk menu__list-lnk--active">
              Основная информация
            </a>
          </li>
          <li class="menu__list-item">
            <a href="#notif" class="menu__list-lnk">
              Уведомления
            </a>
          </li>
          <li class="menu__list-item">
            <a href="#belly" class="menu__list-lnk">
              В пузико
            </a>
          </li>
        </ul>
      </div>
      <div class="form">
        <form id="info" action="/vendor/edit_user_info.php" enctype="multipart/form-data" method="POST">
          <div class="form__wrapper">
            <label for="name" class="form__label">Имя</label>
            <input type="text" placeholder="Имя" name="name" id="name" class="form__input">
          </div>
          <div class="form__wrapper">
            <label for="login" class="form__label">Логин</label>
            <input type="text" placeholder="Логин" name="login" id="login" class="form__input">
          </div>
          <div class="form__wrapper">
            <span class="form__title">Аватар</span>
            <label for="avatar" class="form__file form__btn-dowload">
              Загрузить
            </label>
            <input type="file" accept=".jpg, .jpeg, .png" placeholder="Логин" name="avatar" id="avatar">
            <?php
            if ($_SESSION['error_update_profile']['avatar']) {
              echo '<div class="form__avatar-fail">' . $_SESSION['error_update_profile']['avatar'] . '</div>';
            }
            ?>
          </div>
          <div class="form__wrapper">
            <label for="email" class="form__label">Почта</label>
            <input type="text" placeholder="Почта" name="email" id="email" class="form__input">
          </div>
          <div class="form__wrapper">
            <label for="gender" class="form__label">Пол</label>
            <select name="gender" id="gender" class="form__input">
              <option value="male" <?php
                                    if ($_SESSION['user']['gender'] == 'male') echo 'selected';
                                    ?>>
                Мужчина</option>
              <option value="female" <?php
                                      if ($_SESSION['user']['gender'] == 'female') echo 'selected';
                                      ?>>
                Женщина</option>
            </select>
          </div>
          <div class="form__wrapper">
            <label for="b_day" class="form__label">Дата рождения</label>
            <input type="date" placeholder="Дата рождения" min="1950-01-01" name="b_day" id="dob" class="form__input">
          </div>
          <div class="form__wrapper">
            <label for="pass" class="form__label">Пароль</label>
            <input type="password" placeholder="Пароль" name="pass" id="pass" class="form__input">
          </div>
          <?php
          if (isset($_SESSION['error_update_profile'])) {
            echo '<div class="form__error">' . $_SESSION['error_update_profile']['msg'];
            for ($i = 0; $i < (count($_SESSION['error_update_profile']['fields']) - 1); $i++) {
              echo '<span style="text-decoration: underline;">' . $_SESSION['error_update_profile']['fields'][$i] . '</span>, ';
            }
            echo '<span style="text-decoration: underline;">' . $_SESSION['error_update_profile']['fields'][$i] . '</span></div>';
          }


          ?>
          <div class="form__wrapper">
            <button type="submit" class="button form__submit">Сохранить</button>
          </div>
        </form>
        <form action="#" id="notif" class="disappear">
          <div class="form__wrapper">
            <div class="form__title">Сообщения</div>
            <input type="checkbox" name="msg" id="msg" class="form__checkbox">
            <label for="msg" class="form__ckeck-label"></label>
          </div>
          <div class="form__wrapper">
            <div class="form__title">Подписки</div>
            <input type="checkbox" name="sub" id="sub" class="form__checkbox">
            <label for="sub" class="form__ckeck-label"></label>
          </div>
          <div class="form__wrapper">
            <div class="form__title">Звонки</div>
            <input type="checkbox" name="calls" id="calls" class="form__checkbox">
            <label for="calls" class="form__ckeck-label"></label>
          </div>
          <div class="form__wrapper">
            <div class="form__title">Новости</div>
            <input type="checkbox" name="news" id="news" class="form__checkbox">
            <label for="news" class="form__ckeck-label"></label>
          </div>
          <div class="form__wrapper">
            <div class="form__title">Упоминания</div>
            <input type="checkbox" name="refs" id="refs" class="form__checkbox">
            <label for="refs" class="form__ckeck-label"></label>
          </div>
          <div class="form__wrapper">
            <button type="submit" class="button form__submit">Сохранить</button>
          </div>
        </form>
        <form action="#" id="belly" class="disappear">
          <div class="form__wrapper">
            <label for="kick-belly" class="form__label">Ща ударю в пузико</label>
            <input type="text" placeholder="Урааа!" name="kick-belly" id="kick-belly" class="form__input">
          </div>
          <div class="form__wrapper">
            <button type="submit" class="button form__submit">Получить</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<footer class="footer footer__profile">
  <div class="container">
    <div class="footer__inner">
      <ul class="footer__nav-list">
        <li class="footer__nav-item">
          <a href="#" class="footer__nav-lnk">
            В дверь
          </a>
        </li>
        <li class="footer__nav-item">
          <a href="#" class="footer__nav-lnk">
            В окно
          </a>
        </li>
        <li class="footer__nav-item">
          <a href="#" class="footer__nav-lnk">
            В преисподнюю
          </a>
        </li>
      </ul>
      <div class="footer__copyright">
        (c) 2045 мой прикольный сайт (нет)
      </div>
    </div>
  </div>
</footer>
<div class="modal disappear">
  <div id="sign-up" class="modal__sign disappear">
    <div class="modal__name">Регистрация</div>
    <form action="#" class="modal__form">
      <div class="modal__wrapper">
        <label for="new_login" class="modal__title">Логин</label>
        <input type="text" class="modal__input" id="new_login">
      </div>
      <div class="modal__wrapper">
        <label for="new_email" class="modal__title">Почта</label>
        <input type="text" class="modal__input" id="new_email">
      </div>
      <div class="modal__wrapper">
        <label for="new_pass" class="modal__title">Пароль</label>
        <input type="password" class="modal__input" id="new_pass">
      </div>
      <div class="modal__wrapper">
        <label for="new_pass2" class="modal__title">Повторите пароль</label>
        <input type="password" class="modal__input" id="new_pass2">
      </div>
      <button type="submit" class="modal__submit button">
        Зарегистрироваться
      </button>
    </form>
  </div>
  <div id="sign-in" class="modal__sign disappear">
    <div class="modal__name">Вход</div>
    <form action="#" class="modal__form">
      <div class="modal__wrapper">
        <label for="login" class="modal__title">Логин</label>
        <input type="text" class="modal__input" id="login">
      </div>
      <div class="modal__wrapper">
        <label for="pass" class="modal__title">Пароль</label>
        <input type="password" class="modal__input" id="pass">
      </div>
      <button type="submit" class="modal__submit button">
        Войти
      </button>
    </form>

  </div>
  <div class="modal__x">
    <span></span>
    <span></span>
  </div>
</div>
<script src="/js/script.min.js"></script>

<?php
unset($_SESSION['error_update_profile'])
?>
</body>


</html>