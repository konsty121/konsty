<?php get_header(); ?>

<div id="primary" class="content-area col-sm-12 col-md-9 <?php echo esc_attr(unite_get_option('site_layout')); ?>">
	<main id="main" class="site-main" role="main">

		<!-- HOUSES -->
		<?php
		$query_houses = new WP_Query(array(
			'post_type' => 'houses',
			'posts_per_page' => -1,
		));

		// cash
		set_transient('houses_list', $query_houses, 60 * 60 * 12);
		$s =	get_transient('houses_list');
		//	print_r($s);
		?>
		<div id="result" class="houses-list">

			<div class="row">
				<div class="loader"></div>
				<?php while ($query_houses->have_posts()) : $query_houses->the_post(); ?>
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
		</div>
	</main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>