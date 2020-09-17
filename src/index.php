<?php
session_start();
$page_title = 'Мой клон';
include('header.php');
?>
<main class="main">
  <div class="main__container">
    <div class="main__cnt">
      <div class="post">
        <form action="#" method="POST" class="post__form">
          <textarea name="new-post" placeholder="Напиши что-нибудь" required class="post__area"></textarea>
          <div class="post__input-wrp">
            <label for="post-img" class="post__img">
              <input id="post-img" type="file" class="post__input">Изображение
            </label>
            <button type="submit" class="button post__submit">
              Отправить
            </button>
          </div>
        </form>
      </div>
      <div class="tweets">
        <div class="tweets__item">
          <div class="tweets__author">
            <div class="tweets__avatar">
              <img src="img/dog.jpg" class="tweets__avatar-img">
            </div>
            <a href="/profile.php" class="tweets__author-name">
              Dog
            </a>
            <div class="tweets__author-date">19 июня</div>
          </div>
          <div class="tweets__cnt">Люблю кошек</div>
          <div class="tweets__img">
            <img src="img/dog_loves_cat.jpg" alt="">
          </div>
        </div>
        <div class="tweets__item">
          <div class="tweets__author">
            <div class="tweets__avatar">
              <img src="img/cat.jpg" class="tweets__avatar-img">
            </div>
            <a href="/profile.php" class="tweets__author-name">
              Cat
            </a>
            <div class="tweets__author-date">18 июня</div>
          </div>
          <div class="tweets__cnt">Люблю собак</div>
          <div class="tweets__img">
            <img src="img/cat_loves_dog.jpg" alt="">
          </div>
        </div>
        <div class="tweets__item">
          <div class="tweets__author">
            <div class="tweets__avatar">
              <img src="img/boy.jpg" class="tweets__avatar-img">
            </div>
            <a href="/profile.php" class="tweets__author-name">
              Boy
            </a>
            <div class="tweets__author-date">17 июня</div>
          </div>
          <div class="tweets__cnt">Люблю девочек</div>
          <div class="tweets__img">
            <img src="img/boy_loves_girl.jpg" alt="">
          </div>
        </div>
        <div class="tweets__item">
          <div class="tweets__author">
            <div class="tweets__avatar">
              <img src="img/girl.jpg" class="tweets__avatar-img">
            </div>
            <a href="/profile.php" class="tweets__author-name">
              Girl
            </a>
            <div class="tweets__author-date">16 июня</div>
          </div>
          <div class="tweets__cnt">Люблю мальчиков</div>
          <div class="tweets__img">
            <img src="img/girl_loves_boy.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
include('footer.php');
?>
<div class="modal 
<?php
if (!isset($_SESSION['msg'])) {
  echo 'disappear';
}
?>
">
  <div id="sign-up" class="modal__sign 
  <?php
  if (!isset($_SESSION['msg'])) {
    echo 'disappear';
  }
  ?>">
    <div class="modal__name">Регистрация</div>
    <form action="vendor/signup.php" method="post" class="modal__form">
      <div class="modal__wrapper">
        <label for="new_login" class="modal__title">Логин</label>
        <input type="text" class="modal__input" id="new_login" name="login">
      </div>
      <div class="modal__wrapper">
        <label for="new_email" class="modal__title">Почта</label>
        <input type="email" class="modal__input" id="new_email" name="email">
      </div>
      <div class="modal__wrapper">
        <label for="new_pass" class="modal__title">Пароль</label>
        <input type="password" class="modal__input" id="new_pass" name="password">
      </div>
      <div class="modal__wrapper">
        <label for="new_pass2" class="modal__title">Повторите пароль</label>
        <input type="password" class="modal__input" id="new_pass2" name="password_confirm">
      </div>
      <?php
      if (isset($_SESSION['msg'])) {
        echo '<div class="modal__warning">' . $_SESSION['msg'] . '</div>';
      }
      ?>
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
<?php
if ($_SESSION['accepted']) {
?>
  <div class="modal__sign modal__accepted" id="modal_accept">
    <div class="modal__msg">
      Вы успешно зарегестрировались! <br> Войдите в свой <a href="#sign-in" class="modal__msg-lnk" onclick="openSingIn()">аккаунт.</a>
    </div>
  </div>
<?php
}
unset($_SESSION['msg']);
unset($_SESSION['accepted']);
?>
<script src="/js/script.min.js"></script>
</body>


</html>