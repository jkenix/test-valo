<?php
// Создаем новый тип записи [Блоки]
add_action('init', 'register_post_grid_blocks');
function register_post_grid_blocks()
{
    $labels = array(
        'name' => 'Блоки',
        'singular_name' => 'Блок',
        'add_new' => 'Добавить блок',
        'add_new_item' => 'Добавить блок',
        'edit_item' => 'Редактировать блок',
        'new_item' => 'Новый блок',
        'all_items' => 'Все блоки',
        'view_item' => 'Просмотр блока на сайте',
        'search_items' => 'Искать блок',
        'not_found' => 'Блоков не найдено.',
        'not_found_in_trash' => 'В корзине нет блоков.',
        'parent_item_colon' => 'Родительский блок', // Если используется иерархия
        'menu_name' => 'Блоки'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'has_archive' => true, // Если нужен архив блоков
        'menu_icon' => 'dashicons-screenoptions', // Иконка опций экрана (подойдет для блоков)
        'menu_position' => 20,
        'hierarchical' => false, // true, если нужна иерархия
        'supports' => array('title', 'thumbnail', 'page-attributes'),
        'show_in_rest' => true
    );
    register_post_type('grid_blocks', $args);
}

// Создаем новый тип записи [Инфраструктура]
add_action('init', 'register_post_infrastructure');
function register_post_infrastructure()
{
    $labels = array(
        'name' => 'Инфраструктура',
        'singular_name' => 'Объект инфраструктуры',
        'add_new' => 'Добавить объект',
        'add_new_item' => 'Добавить объект инфраструктуры',
        'edit_item' => 'Редактировать объект',
        'new_item' => 'Новый объект',
        'all_items' => 'Все объекты',
        'view_item' => 'Просмотр объекта на сайте',
        'search_items' => 'Искать объект',
        'not_found' => 'Объектов не найдено.',
        'not_found_in_trash' => 'В корзине нет объектов.',
        'parent_item_colon' => 'Родительский объект', // Если используется иерархия
        'menu_name' => 'Инфраструктура'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'has_archive' => true, // Если нужен архив объектов
        'menu_icon' => 'dashicons-networking', // Иконка сети
        'menu_position' => 20,
        'hierarchical' => false, // true, если нужна иерархия
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'show_in_rest' => true
    );
    register_post_type('infrastructure', $args);
}
