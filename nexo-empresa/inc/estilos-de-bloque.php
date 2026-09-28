<?php
/**
 * Estilos de bloque: aparecen en la barra lateral del editor, en «Estilos»,
 * y cambian el aspecto de un bloque con un clic.
 *
 * El CSS de cada estilo está en assets/css/nexo.css (busca «is-style-»).
 *
 * @package Nexo_Empresa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registra los estilos de bloque del tema.
 */
function nexo_register_block_styles() {
	$estilos = array(
		'core/group'     => array(
			'tarjeta'         => __( 'Tarjeta', 'nexo-empresa' ),
			'tarjeta-elevada' => __( 'Tarjeta elevada', 'nexo-empresa' ),
			'tarjeta-borde'   => __( 'Tarjeta con borde de color', 'nexo-empresa' ),
			'cristal'         => __( 'Cristal', 'nexo-empresa' ),
		),
		'core/column'    => array(
			'tarjeta'         => __( 'Tarjeta', 'nexo-empresa' ),
			'tarjeta-elevada' => __( 'Tarjeta elevada', 'nexo-empresa' ),
		),
		'core/paragraph' => array(
			'antetitulo' => __( 'Antetítulo', 'nexo-empresa' ),
			'etiqueta'   => __( 'Etiqueta', 'nexo-empresa' ),
			'destacado'  => __( 'Entradilla', 'nexo-empresa' ),
		),
		'core/heading'   => array(
			'degradado' => __( 'Texto degradado', 'nexo-empresa' ),
		),
		'core/button'    => array(
			'flecha' => __( 'Con flecha', 'nexo-empresa' ),
			'suave'  => __( 'Suave', 'nexo-empresa' ),
			'enlace' => __( 'Solo texto', 'nexo-empresa' ),
		),
		'core/image'     => array(
			'sombra'   => __( 'Con sombra', 'nexo-empresa' ),
			'inclinada' => __( 'Marco desplazado', 'nexo-empresa' ),
			'logo'     => __( 'Logotipo (gris)', 'nexo-empresa' ),
		),
		'core/list'      => array(
			'check'       => __( 'Con marcas de verificación', 'nexo-empresa' ),
			'sin-vinetas' => __( 'Sin viñetas', 'nexo-empresa' ),
		),
		'core/separator' => array(
			'corto' => __( 'Corto de color', 'nexo-empresa' ),
		),
		'core/details'   => array(
			'acordeon' => __( 'Acordeón', 'nexo-empresa' ),
		),
		'core/quote'     => array(
			'tarjeta' => __( 'Tarjeta', 'nexo-empresa' ),
		),
		'core/post-featured-image' => array(
			'zoom' => __( 'Zoom al pasar el ratón', 'nexo-empresa' ),
		),
	);

	foreach ( $estilos as $bloque => $variantes ) {
		foreach ( $variantes as $nombre => $etiqueta ) {
			register_block_style(
				$bloque,
				array(
					'name'  => $nombre,
					'label' => $etiqueta,
				)
			);
		}
	}
}
add_action( 'init', 'nexo_register_block_styles' );
