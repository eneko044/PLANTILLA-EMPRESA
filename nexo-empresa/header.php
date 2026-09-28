<?php
/**
 * Cabecera para plantillas PHP de plugins (Elementor «Ancho completo»,
 * tiendas, etc.). Las páginas normales usan las plantillas de bloques de la
 * carpeta templates y no pasan por aquí.
 *
 * @package Nexo_Empresa
 */

// Se genera antes de wp_head() para que los estilos de sus bloques se carguen en <head>.
$nexo_cabecera = nexo_zona_html( 'header' );
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
<?php echo $nexo_cabecera; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- HTML de bloques generado por WordPress. ?>
