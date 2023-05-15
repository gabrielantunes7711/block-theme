<?php get_header(); ?>
<section class="error-404 default-section">

	<div class="container">

		<div class="text">
			<?php the_field('texto_404', 'option'); ?>
		</div>

		<?php if ( have_rows('404_links', 'option') ) : ?>
			<div class="mensage-buttons">
			<?php while( have_rows('404_links', 'option') ) : the_row(); ?>
				<?php $link = get_sub_field('link'); ?>
				<a class="default-button -yellow -inlineflex" href="<?php echo $link['url'] ?>" title="<?php echo $link['title'] ?>"><?php echo $link['title'] ?></a>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>

	</div>

</section>

<?php get_footer(); ?>