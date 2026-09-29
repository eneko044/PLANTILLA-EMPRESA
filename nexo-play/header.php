<?php
/**
 * Cabecera para plantillas PHP de plugins (Elementor «Ancho completo», etc.).
 *
 * @package Nexo_Play
 */

$np_cabecera = np_zona_html( 'header' );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wp-site-blocks">
<?php echo $np_cabecera; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
