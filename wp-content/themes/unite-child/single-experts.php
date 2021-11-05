<!-- single-experts -->
<?php
get_header();
?>

<?php
while (have_posts()) :
  the_post();

  echo '<h2>';
  the_title();
  echo '</h2>';

  the_content();

endwhile;

// Так же выведем все связанные с этим экспертом статьи
$expert_posts = get_posts(array('post_parent' => $post->ID));

if ($expert_posts) {

  foreach ($expert_posts as $post) {
?>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php
  }

  wp_reset_postdata();
}

?>