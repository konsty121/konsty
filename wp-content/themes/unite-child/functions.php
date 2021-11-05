<?php
get_template_part('./inc/real-type-taxonomy');
get_template_part('./inc/real-post-type');
get_template_part('./inc/agency-post-type');
// ============================================
add_action('add_meta_boxes', function () {
  add_meta_box('post_expert', 'Агенства', 'post_expert_metabox', array('post', 'houses'), 'side', 'low');
});

// Метабокс с выбором эксперта
function post_expert_metabox($post)
{

  $experts = get_posts(array(
    'post_type' => 'experts',
    'posts_per_page' => -1,
    'orderby' => 'post_title',
    'order' => 'ASC'
  ));

  if ($experts) {

    echo '
        <select name="post_parent">';
    foreach ($experts as $expert) {
      echo '
            <option value="' . $expert->ID . '" ' . selected($expert->ID, $post->post_parent)  . '>' . esc_html($expert->post_title) . '</option>
            ';
    }
    echo '</select>';
  } else
    echo 'Эксперты не найдены!';
}
// ajax
add_action('wp_ajax_get_houses', 'get_houses');
add_action('wp_ajax_nopriv_get_houses', 'get_houses');
function get_houses()
{
  $id = $_POST['id'];
  $houses = new WP_Query(array(
    'post_type' => 'houses',
    'posts_per_page' => -1,
    'post_parent' => $id,
  )) ?>
  <div class="row ">
    <div class="loader"></div>
    <?php while ($houses->have_posts()) : $houses->the_post(); ?>
      <div class="col-12 col-md-4">
        <div class="houses-list__item">
          <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
          <?php while (have_rows('informacziya')) : the_row(); ?>
            <dl>
              <dt>Площадь</dt>
              <dd><?php the_sub_field('ploshhad'); ?> кв.м</dd>
              <dt>Жилая площадь</dt>
              <dd><?php the_sub_field('zhilaya_ploshhad'); ?> кв.м</dd>
              <?php $fl = get_field('etazh'); ?>
              <?php if (!empty($fl)) : ?>
                <dt>Этаж</dt>
                <dd><?php the_sub_field('etazh'); ?></dd>
              <?php endif ?>
              <?php $fls = get_field('etazhej'); ?>
              <?php if (!empty($fls)) : ?>
                <dt>Этаж(ей)</dt>
                <dd><?php the_sub_field('etazhej'); ?></dd>
              <?php endif ?>
              <dt>Адрес</dt>
              <dd><?php the_sub_field('adres'); ?></dd>
              <dt>Стоимость</dt>
              <dd class="houses-list__price"><?php the_sub_field('czena'); ?> руб.</dd>
            </dl>
          <?php endwhile; ?>
        </div>
      </div>
    <?php endwhile;
    wp_reset_query();
    ?>
  </div>
<?php wp_die();
}
