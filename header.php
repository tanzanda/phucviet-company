<?php
/**
 * Header templage
 *
 */

?>
<!doctype html>
<html lang="<?php language_attributes();?> ">
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>

    <?php wp_head();?>
</head>
<body <?php body_class('body-class');?> >

<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header" role="banner">
        <?php
            if( function_exists('the_custom_logo') ){
                the_custom_logo();
            }
        ?>
    </header>

    <div id="content" class="site-content">


