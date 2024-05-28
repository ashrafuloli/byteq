<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- header start -->
<?php do_action( 'byteq_header_style' ); ?>
<!-- header end -->

<!-- main-wrapper start -->
<?php do_action( 'byteq_before_main_content' ); ?>
<!-- main-wrapper end -->