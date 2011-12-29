<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

<section id="content">
	<?php if (have_posts()) : ?>
		<h2><?php printf( __( 'Category Archives: %s' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h2>

		<p><?php next_posts_link('Older'); delim_posts_link(); previous_posts_link('Newer') ?></p>

		<?php
			$category_description = category_description();
			if ( ! empty( $category_description ) )
				echo apply_filters( 'category_archive_meta', '' . $category_description . '' );
			$cat_ID = get_query_var('cat');
			$children=  get_categories('child_of='.$cat_ID) ;
			if ( $children && $children != 'No Children.' ) {
				echo '<ul class="cat-children">';
				echo '<li><strong>Sub-Categories:</strong></li>';
					wp_list_categories('title_li&hide_empty=0&child_of='.$cat_ID);
				echo '</ul>';
			}

			/* Start the Loop */
			
			while ( have_posts() ) : the_post(); ?>
		
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php if(the_title( '', '', false ) !='') the_title(); else echo 'Untitled';?></a></h3>
				<?php the_excerpt('<p>Read the rest of this item</p>'); ?>
				<p class="meta">This item was posted by <span class="vcard author"><cite class="fn"><a class="url" href="<?php the_author_meta('user_url') ?>"><?php the_author_meta('display_name'); ?></a></cite></span> on <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_time('c') ?>"><?php the_time('l, F jS, Y') ?></a>.</p>
				<?php edit_post_link('Edit','<p>','</p>'); ?>
			</article>			
					
		<?php endwhile; ?>
		
		<p><?php next_posts_link('Older'); delim_posts_link(); previous_posts_link('Newer') ?></p>

	<?php else : ?>
		
		<article>
			<h2>Not found.</h2>
			<p>Sorry, there are no posts in the selective archive.</p>
		</article>

	<?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>