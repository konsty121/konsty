<?php

// хук для регистрации
add_action('init', 'create_taxonomy');
function create_taxonomy()
{
  $tax_item = 'Тип недвыжимости';
  $tax_items = 'Тип недвыжимости';
  $tax_parent = 'Тип недвыжимости';
  // список параметров: wp-kama.ru/function/get_taxonomy_labels
  register_taxonomy('houses_tax', ['houses'], [
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
      'add_new_item' => "Добавить $tax_parent",
      'new_item_name' => "Новое название $tax_items",
      'menu_name' => $tax_items,
    ],
    'description' => '', // описание таксономии
    'public' => true,
    'publicly_queryable' => null, // равен аргументу public
    'show_in_nav_menus' => true, // равен аргументу public
    'show_ui' => true, // равен аргументу public
    'show_in_menu' => true, // равен аргументу show_ui
    'show_tagcloud' => true, // равен аргументу show_ui
    'show_in_quick_edit' => true, // равен аргументу show_ui
    'hierarchical' => true,

    'rewrite' => true,
    //'query_var' => $taxonomy, // название параметра запроса
    'capabilities' => array(),
    'meta_box_cb' => 'post_categories_meta_box', // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
    'show_admin_column' => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
    'show_in_rest' => true, // добавить в REST API
    'rest_base' => null, // $taxonomy
    // '_builtin' => false,
    //'update_count_callback' => '_update_post_term_count',
  ]);
}
