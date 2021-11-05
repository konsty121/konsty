<?php
add_action('init', function () {
  $labels = array(
    'name' => 'Агенства',
    'singular_name' => 'Агенства',
    'add_new' => 'Добавить агенство',
    'add_new_item' => 'Добавить новое агенство',
    'edit_item' => 'Редактировать агенство',
    'new_item' => 'Новое агенство',
    'all_items' => 'Все агенства',
    'view_item' => 'Посмотреть агенство на сайте',
    'search_items' => 'Искать агенство',
    'not_found' => 'Агенство не найдено!',
    'not_found_in_trash' => 'В корзине нет агенств',
    'menu_name' => 'Агенства'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, // показывать в админке
    'menu_icon' => 'dashicons-buddicons-buddypress-logo',
    'menu_position' => 4, // порядок в меню
    'supports' => array('title', 'editor', 'thumbnail')
  );
  register_post_type('experts', $args);
});
