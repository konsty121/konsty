<div id="secondary" class="widget-area col-sm-12 col-md-3" role="complementary">
	<?php do_action('before_sidebar'); ?>
	<?php if (!dynamic_sidebar('sidebar-1')) : ?>
		<aside id="search" class="widget widget_search">
			<?php get_search_form(); ?>
		</aside>
	<?php endif; ?>

	<?php
	$query = new WP_Query(
		array(
			'post_type' => 'experts',
			'posts_per_page' => -1,
			'orderby' => 'post_title',
			'order' => 'ASC'
		)
	);
	?>
	<div class="sidebar-filter">
		<ul class="sidebar-agency-list" data-agency-list>
			<?php while ($query->have_posts()) : $query->the_post(); ?>
				<li id="<?php the_ID() ?>"><?php the_title() ?></li>
			<?php endwhile ?>
		</ul>
		<span id="show-all-data" class="sidebar-filter__reset">Сбросить</span>
	</div>
	<?php
	add_action('wp_footer', 'get_houses_script');
	function get_houses_script()
	{ ?>
		<script>
			jQuery(document).ready(function($) {
				$('[data-agency-list] > li').on('click', function(e) {
					$(this).addClass('current').siblings().removeClass('current')
					$id = $(this).attr('id')
					$.ajax({
						url: "<?php echo home_url() . '/wp-admin/admin-ajax.php' ?>",
						type: 'post',
						data: {
							action: 'get_houses',
							id: $id,
						},
						beforeSend: function(xhr) {
							$('.loader').show();
						},
						success: function(response) {
							$('#result').html(response)
						}
					})
					if ($('[data-agency-list] > li').hasClass('current')) {
						$('#show-all-data').show()
					}
				})
				$('#show-all-data').on('click', function() {
					location.reload(true);
					$('[data-agency-list] > li').removeClass('current')
					$('.loader').show();

				})
			})
		</script>
	<?php	}
	?>
</div>