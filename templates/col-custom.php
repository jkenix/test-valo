<?php
// Получаем значения для кастомизации колонки
$col_width = isset($args['col_width']) ? $args['col_width'] : null; // Поле ширины колонки
$background_color = isset($args['background_color']) ? $args['background_color'] : null; // Поле цвета фона колонки
$title_color = isset($args['title_color']) ? $args['title_color'] : null; // Поле цвета загловока колонки
$button_color = isset($args['button_color']) ? $args['button_color'] : null; // Поле цвета кнопки и текста в ней
$img_position = isset($args['img_position']) ? $args['img_position'] : null; // Поле позиции картинки

// Задаем глобальные переменные для доступа в дргих шаблонах
global $col; // Класс колонки (Ширина)
global $bg_color; // Класс цвета фона колонки
global $text_color; // Класс цвета загловока колонки
global $btn_color; // Класс цвета кнопки и текста в ней
global $img_pos; // Класс позиции картинки

// Проверка на флажок с шириной колонки
switch ($col_width) {
    case "1":
        $col = '';
        break;
    case "2":
        $col = 'catalog-col-2';
        break;
    case "3":
        $col = 'catalog-col-3';
        break;
    case "4":
        $col = 'catalog-col-4';
        break;
    case "5":
        $col = 'catalog-col-4';
        break;
    default:
        $col = '';
}

// Проверка на флажок с цветом фона колонки
switch ($background_color) {
    case "Черный":
        $bg_color = ' bg-dark';
        break;
    case "Белый":
        $bg_color = ' bg-1';
        break;
    case "Светло-синий":
        $bg_color = ' bg-2';
        break;
    case "Лавандово-синий":
        $bg_color = ' bg-3';
        break;
    case "Дымчато-белый":
        $bg_color = ' bg-4';
        break;
    case "Розовый Мэнди":
        $bg_color = ' bg-5';
        break;
    default:
        $bg_color = ' bg-1';
}

// Проверка на Флажок с цветом заголовка
switch ($title_color) {
    case "Черный":
        $text_color = 'txt-dark';
        break;
    case "Белый":
        $text_color = 'txt-white';
        break;
    case "Светло-синий":
        $text_color = 'txt-1';
        break;
    case "Лавандово-синий":
        $text_color = 'txt-2';
        break;
    case "Дымчато-белый":
        $text_color = 'txt-3';
        break;
    case "Розовый Мэнди":
        $text_color = 'txt-4';
        break;
    default:
        $text_color = 'txt-dark';
}

// Проверка на Флажок с цветом кнопки
switch ($button_color) {
    case "Черный":
        $btn_color = 'btn__bg-dark';
        break;
    case "Белый":
        $btn_color = 'btn__bg-1';
        break;
    case "Светло-синий":
        $btn_color = 'btn__bg-2';
        break;
    case "Лавандово-синий":
        $btn_color = 'btn__bg-3';
        break;
    case "Дымчато-белый":
        $btn_color = 'btn__bg-4';
        break;
    case "Розовый Мэнди":
        $btn_color = 'btn__bg-6';
        break;
    default:
        $btn_color = 'btn__bg-1';
}

// Проверка на положение изображения
switch ($img_position) {
    case "Не смещать":
        $img_pos = "";
        break;
    case "Вниз":
        $img_pos = "catalog__img-right";
        break;
    case "Вниз (Сильнее)":
        $img_pos = "catalog__img-right__big";
        break;
    case "Вверх":
        $img_pos = "catalog__img-right__top";
        break;
    default:
        $img_pos = "";
}
