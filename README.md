## Описание

В данном тестовом задании реализована страница товара с возможностью покупки в двух валютах: рубли и тенге. Присутствует интеграция курса валют с Национального банка Казахстана. Добавлена платежная система CloudPayments в тестовом режиме. Также присутствует страница с историей платежей.

## Использование

Покупка товара доступна только авторизованным пользователям. Купить можно только товары, присутсвующие в наличии на складе. После нажатия на кнопку "Купить" открывается окно оплаты, в котором необходимо указать данные тестовой карты https://developers.cloudpayments.ru/#testirovanie. При успешной оплате платеж сохраняется в базе, а товар на главной странице помечается как оплаченный.

## Установка

Для корректной установки на вашем сервере должны быть установлены PHP 7.4 и Composer. Для установки сделайте следующее:

-Склонировать проект на локальную машину и войти в папку проекта

>git clone https://github.com/MCL8/product_page/

>cd product_page

-Установить все зависимости приложения через Composer
>composer install

-Настроить подключение базе данных MySQL в файле .env

-Создать базу данных приложения

-Запустить скрипт генерации таблиц БД
>php artisan migrate
