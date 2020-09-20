<?php
$connect = mysqli_connect('127.0.0.1', 'squirrel', '36362525', 'my_clone') or die('Ошибка подключения подключения к БД: ' . mysqli_connect_error());
mysqli_set_charset($connect, 'utf8');
