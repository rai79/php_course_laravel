## Домашние работы к курсу по PHP
### Задание. Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ.
Разработайте проект на Laravel функционал интернет-каталога. 
 
Пользователь: 
1. Может зарегистрироваться 
2. Может просматривать 
  a. список категорий 
  b. список товаров 
  c. страницу одного товара 
3. По нажатию кнопки купить, со страницы одного товара, пользователю предлагается связаться с менеджером и просят оставить Имя и email. E-mail 
подставляется в форму из данных об авторизованном пользователе. Имя, E-mail и id товара записывается в базу. Желательно реализовать это с помощью javascript и поп-ап окна. 
 
Товар: 
1. имеет следующие характеристики: 
  a. Название 
  b. Категория 
  c. цена 
  d. фотография 
  e. Описание 
Категория: 
1. имеет следующие характеристики: 
  a. Название 
  b. описание 
 
Заказы: 
1. Пользователь может оставить заявку на покупку товара. id товара и email пользователя записывается. 
2. Администратор получает уведомление на E-mail через SMTP 
 
Администратор: 
1. Может создавать\редактирование\удалять категории 
2. Может создавать\редактировать\удалять товары 
3. Может просматривать заказы 
4. Может установить\изменить адрес для получения уведомлений. 
5. Права администратора можно получить поставив галочку при регистрации :) 

### Описание к выполненному заданию.
1. Установить неоходимые библиотеки командой composer install
2. Настроить почтовый сервер исходящей почты и доступ к БД. Для этого переименуйте файл ".env.example" в ".env".

Отредактируйте в нем настройки БД:
```
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
и сервера исходящей почты:
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```
3. Выполнить команду php artisan storage:link
4. Необходимо зарегистрировать администратора, добавить категории, товары (если категории при заполнении товара не существует то создастся новая, на картинку товара ограничение 800*800), почту для уведомления.

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>
