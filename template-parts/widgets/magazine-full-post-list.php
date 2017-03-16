<?php
/**
 * The template for displaying large posts in the Magazine List widget.
 *
 * @package Maxwell
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

	<?php maxwell_post_image(); ?>

	<header class="entry-header">

		<?php maxwell_magazine_entry_meta(); ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content clearfix">

		<?php the_excerpt(); ?>
		<?php maxwell_more_link(); ?>

	</div><!-- .entry-content -->

</article>
