<?php

// хук для регистрации
add_action('init', 'create_taxonomy');
function create_taxonomy()
{
  $tax_item = 'Категория';
  $tax_items = 'Категории';
  $tax_parent = 'Категория';
  // список параметров: wp-kama.ru/function/get_taxonomy_labels
  register_taxonomy('catalog', ['product'], [
    'label' => '', // определяется параметром $labels->name
    'labels' => [
      'name' => $tax_item,
      'singular_name' => $tax_item,
      'search_items' => "Поиск $tax_item",
      'all_items' => "Все $tax_items",
      'view_item ' => "Просмотр $tax_items",
      'parent_item' => "Родитнльский $tax_item",
      'parent_item_colon' => "Родительский $tax_item:",
      'edit_item' => "Редактировать $tax_item",
      'update_item' => "Обновить $tax_item",
      'add_new_item' => "Добавить новый $tax_parent",
      'new_item_name' => "Новое название $tax_items",
      'menu_name' => $tax_items,
    ],
    'description' => '', // описание таксономии
    'public' => true,
    // 'publicly_queryable' => null, // равен аргументу public
    // 'show_in_nav_menus' => true, // равен аргументу public
    // 'show_ui' => true, // равен аргументу public
    // 'show_in_menu' => true, // равен аргументу show_ui
    // 'show_tagcloud' => true, // равен аргументу show_ui
    // 'show_in_quick_edit' => null, // равен аргументу show_ui
    'hierarchical' => true,

    'rewrite' => true,
    //'query_var' => $taxonomy, // название параметра запроса
    'capabilities' => array(),
    'meta_box_cb' => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
    'show_admin_column' => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
    'show_in_rest' => true, // добавить в REST API
    'rest_base' => null, // $taxonomy
    // '_builtin' => false,
    //'update_count_callback' => '_update_post_term_count',
  ]);
}
// ============================
add_action('init', 'my_custom_init');
function my_custom_init()
{
  $post_item = 'Товар';
  $post_items = 'Товары';
  $post_parent = 'Товар';
  register_post_type('product', array(
    'labels' => array(
      'name' => $post_items, // Основное название типа записи
      'singular_name' => $post_item, // отдельное название записи типа Book
      'add_new' => "Добавить новый $post_item",
      'add_new_item' => "Добавить новый $post_item",
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
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
  ));
}
