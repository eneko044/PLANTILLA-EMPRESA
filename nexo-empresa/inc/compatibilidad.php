<?php
/**
 * Compatibilidad con Elementor y otros maquetadores.
 *
 * - Las plantillas «Ancho completo» y «Lienzo en blanco» (carpeta templates)
 *   dejan todo el ancho al maquetador.
 * - header.php y footer.php permiten que las plantillas PHP de los plugins
 *   (por ejemplo «Elementor Ancho completo») muestren la cabecera y el pie
 *   del tema.
 * - Con Elementor Pro, el Theme Builder puede sustituir la cabecera y el pie.
 *
 * @package Nexo_Empresa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registra las ubicaciones de Elementor Pro (cabecera, pie, archivo, entrada…).
 *
 * @param object $gestor Gestor de ubicaciones de Elementor.
 */
function nexo_elementor_ubicaciones( $gestor ) {
	$gestor->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'nexo_elementor_ubicaciones' );

/**
 * Pinta una zona (header/footer): primero intenta Elementor Pro y, si no hay
 * una plantilla suya, usa la parte de plantilla del tema.
 *
 * @param string $zona 'header' o 'footer'.
 * @return string HTML.
 */
function nexo_zona_html( $zona ) {
	ob_start();
	if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( $zona ) ) {
		return ob_get_clean();
	}
	ob_end_clean();
	$etiqueta = 'header' === $zona ? 'header' : 'footer';
	return do_blocks( '<!-- wp:template-part {"slug":"' . $zona . '","tagName":"' . $etiqueta . '"} /-->' );
}
