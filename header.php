<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title(' &mdash; ', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		
		<?php
			global $options;
			foreach ($options as $value) {
				if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
			}
		?>			
		<?php switch ($tersus_style_sheet) {
			case "Default": ?>
				<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/css/layout.css>" media="screen" />
			<?php break; ?>	
			<?php case "Super Ginormous":?>
				<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/css/custom-sg.css" media="screen" />
			<?php break; ?>
			<?php case "Advanced":?>
				<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/css/advanced-layout.css" media="screen" />
			<?php break; ?>
		<?php } ?>
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!-- My Stuff -->
		
		<meta name="y_key" content="fd82a55aff309824" />
		<script src="/mint/?js" type="text/javascript"></script>
		
	</head>

	<body>
		<?php
			// Removed body_class() call from body element
			// We may want to revisit this at a later date
			// and provide a custom function which allows
			// page-level ids or classes instead
		?>
		
		<header>
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<p><?php bloginfo('description'); ?></p>
		</header>
