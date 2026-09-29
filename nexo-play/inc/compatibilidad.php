<?php
/**
 * Compatibilidad con Elementor y otros maquetadores (ver header.php y footer.php).
 *
 * @package Nexo_Play
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Ubicaciones del Theme Builder de Elementor Pro.
 *
 * @param object $gestor Gestor de ubicaciones.
 */
function np_elementor_ubicaciones( $gestor ) {
	$gestor->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'np_elementor_ubicaciones' );

/**
 * Cabecera o pie: plantilla de Elementor Pro si existe; si no, la del tema.
 *
 * @param string $zona header|footer.
 * @return string
 */
function np_zona_html( $zona ) {
	ob_start();
	if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( $zona ) ) {
		return ob_get_clean();
	}
	ob_end_clean();
	return do_blocks( '<!-- wp:template-part {"slug":"' . $zona . '","tagName":"' . $zona . '"} /-->' );
}
