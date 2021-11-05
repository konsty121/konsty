<?php
add_action('init', 'real');
function real()
{
  $post_item = 'Недвижимость';
  $post_items = 'Недвижимость';
  $post_parent = 'Недвижимость';
  register_post_type('houses', array(
    'labels' => array(
      'name' => $post_items, // Основное название типа записи
      'singular_name' => $post_item, // отдельное название записи типа Book
      'add_new' => "Добавить $post_item",
      'add_new_item' => "Добавить $post_item",
      'edit_item' => "Редактировать $post_item",
      'new_item' => "Новый $post_item",
      'view_item' => "Посмотреть $post_parent",
      'search_items' => "Найти $post_parent",
      'not_found' => "$post_parent не найдено",
      'not_found_in_trash' => "В корзине $post_parent не найдено",
      'parent_item_colon' => 'вавапвапв',
      'menu_name' => $post_items

    ),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    'taxonomies'          => array('houses_tax'),
  ));
}
