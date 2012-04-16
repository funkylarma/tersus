<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

<section id="content">
<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		
			<?php if(!has_post_format('aside') && !has_post_format('image')) { ?>
				<p class="published" title="<?php the_time('c') ?>"><?php the_date() ?></p>
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to “<?php the_title_attribute(); ?>”"><?php the_title(); ?></a></h2>

			<?php }
				the_content();
				if(!has_post_format('aside') && !has_post_format('image')) {
			?>
				<dl class="post-meta">
					<dt>Author:</dt>
					<dd class="vcard author">
						<cite class="fn">
							<a class="url" href="<?php the_author_meta('user_url') ?>" title="Visit the author’s site">
								<?php the_author_meta('display_name'); ?>
							</a>
						</cite>
					</dd>
					<?php if (has_tag()) { ?>
						<dt>Tags:</dt>
						<dd><?php the_tags( '<ul><li>' , '</li><li>' , '</li></ul>' ) ?></dd>
					<?php } ?>
					<dt>Categories:</dt>
					<dd>
						<ul>
							<?php the_category('</li><li>') ?>
						</ul>
					</dd>
				</dl>
			<?php } ?>
			
			<p><a href="<?php the_permalink(); ?>#comment" title="View or contribute to the discussion"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a></p>
			<?php edit_post_link('Edit', '<p>', '</p>'); ?>
		</article>

	<?php endwhile; ?>

	<p><?php next_posts_link('Older'); delim_posts_link(); previous_posts_link('Newer') ?></p>

<?php else : ?>

	<h2>Not found.</h2>
	<p>Sorry, you seem to be looking for something that simply isn’t here.</p>

<?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
