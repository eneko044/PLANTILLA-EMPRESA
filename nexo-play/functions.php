<?php
/**
 * Funciones del tema Nexo Play.
 *
 * @package Nexo_Play
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NP_VERSION', wp_get_theme( get_template() )->get( 'Version' ) );
define( 'NP_DIR', get_template_directory() );
define( 'NP_URI', get_template_directory_uri() );

require NP_DIR . '/inc/juegos.php';
require NP_DIR . '/inc/bloques.php';
require NP_DIR . '/inc/importador.php';
require NP_DIR . '/inc/compatibilidad.php';

/**
 * Soportes del tema.
 */
function np_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_editor_style( 'assets/css/tienda.css' );
	add_image_size( 'np-cabecera', 616, 353, true );
	add_image_size( 'np-capsula', 460, 215, true );
	load_theme_textdomain( 'nexo-play', NP_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'np_setup' );

/**
 * Estilos y scripts de la parte pública.
 */
function np_assets() {
	wp_enqueue_style( 'nexo-play', NP_URI . '/assets/css/tienda.css', array(), NP_VERSION );
	wp_enqueue_script(
		'nexo-play',
		NP_URI . '/assets/js/tienda.js',
		array(),
		NP_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'np_assets' );

/**
 * Categorías de secciones en el insertador.
 */
function np_categorias_patrones() {
	register_block_pattern_category( 'nexo-play', array( 'label' => __( 'Nexo Play · Secciones de tienda', 'nexo-play' ) ) );
	register_block_pattern_category( 'nexo-play-paginas', array( 'label' => __( 'Nexo Play · Páginas completas', 'nexo-play' ) ) );
	register_block_pattern_category( 'nexo-play-estructura', array( 'label' => __( 'Nexo Play · Cabecera y pie', 'nexo-play' ) ) );
}
add_action( 'init', 'np_categorias_patrones' );

/**
 * Tras activar el tema hay que regenerar los enlaces permanentes para que
 * funcionen /juego/… y /juegos/.
 */
function np_activar() {
	np_registrar_contenido();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'np_activar' );

/**
 * URL de un recurso del tema.
 *
 * @param string $ruta Ruta dentro de assets.
 * @return string
 */
function np_asset( $ruta ) {
	return esc_url( NP_URI . '/assets/' . $ruta );
}

/**
 * Enlace a una página creada por el importador (tienda, comunidad,
 * acerca-de, soporte, noticias). Si aún no existe, apunta a la portada.
 *
 * @param string $clave Página.
 * @return string URL escapada.
 */
function np_url( $clave ) {
	static $cache = array();
	if ( ! isset( $cache[ $clave ] ) ) {
		$ids = get_posts(
			array(
				'post_type'   => 'page',
				'post_status' => 'publish',
				'meta_key'    => '_np_demo', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
				'meta_value'  => $clave, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
				'numberposts' => 1,
				'fields'      => 'ids',
			)
		);
		$cache[ $clave ] = $ids ? get_permalink( $ids[0] ) : home_url( '/' );
	}
	return esc_url( $cache[ $clave ] );
}

/**
 * Enlace al listado de juegos con filtros (?orden=ventas, ?oferta=1…).
 *
 * @param array $args Parámetros.
 * @return string URL escapada.
 */
function np_url_juegos( $args = array() ) {
	$base = get_post_type_archive_link( 'juego' );
	if ( ! $base ) {
		$base = home_url( '/?post_type=juego' );
	}
	return esc_url( add_query_arg( $args, $base ) );
}

/**
 * ID de una página creada por el importador.
 *
 * @param string $clave Página.
 * @return int
 */
function np_pagina_id( $clave ) {
	$ids = get_posts(
		array(
			'post_type'   => 'page',
			'post_status' => 'publish',
			'meta_key'    => '_np_demo', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			'meta_value'  => $clave, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
			'numberposts' => 1,
			'fields'      => 'ids',
		)
	);
	return $ids ? (int) $ids[0] : 0;
}

/**
 * Enlace de menú (bloque Navegación) a una página del importador.
 *
 * @param string $clave     Página.
 * @param string $etiqueta  Texto.
 * @param string $clase     Clase CSS.
 * @return string Marcado de bloque.
 */
function np_enlace_menu( $clave, $etiqueta, $clase = '' ) {
	$id    = np_pagina_id( $clave );
	$attrs = array(
		'label' => $etiqueta,
		'url'   => $id ? get_permalink( $id ) : home_url( '/' ),
	);
	if ( $id ) {
		$attrs['type'] = 'page';
		$attrs['id']   = $id;
		$attrs['kind'] = 'post-type';
	}
	if ( $clase ) {
		$attrs['className'] = $clase;
	}
	return '<!-- wp:navigation-link ' . wp_json_encode( $attrs, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . ' /-->';
}

/**
 * Enlace de menú a una URL cualquiera.
 *
 * @param string $etiqueta Texto.
 * @param string $url      URL.
 * @return string Marcado de bloque.
 */
function np_enlace_url( $etiqueta, $url ) {
	return '<!-- wp:navigation-link ' . wp_json_encode(
		array(
			'label' => $etiqueta,
			'url'   => html_entity_decode( $url ),
			'kind'  => 'custom',
		),
		JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
	) . ' /-->';
}

/**
 * Submenú con los términos de una taxonomía.
 *
 * @param string $etiqueta Texto del submenú.
 * @param string $tax      Taxonomía.
 * @param string $clase    Clase CSS.
 * @return string Marcado de bloque.
 */
function np_submenu_terminos( $etiqueta, $tax, $clase = '' ) {
	$terms  = get_terms(
		array(
			'taxonomy'   => $tax,
			'hide_empty' => false,
		)
	);
	$hijos  = '';
	if ( ! is_wp_error( $terms ) ) {
		foreach ( $terms as $t ) {
			$hijos .= np_enlace_url( $t->name, get_term_link( $t ) );
		}
	}
	$hijos .= np_enlace_url( __( 'Todos los juegos', 'nexo-play' ), np_url_juegos() );
	$attrs  = array(
		'label' => $etiqueta,
		'url'   => html_entity_decode( np_url_juegos() ),
		'kind'  => 'custom',
	);
	if ( $clase ) {
		$attrs['className'] = $clase;
	}
	return '<!-- wp:navigation-submenu ' . wp_json_encode( $attrs, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . ' -->' . $hijos . '<!-- /wp:navigation-submenu -->';
}

/**
 * Marca las páginas de la tienda para resaltar «TIENDA» en el menú.
 *
 * @param array $clases Clases del body.
 * @return array
 */
function np_clase_body( $clases ) {
	if ( is_singular( 'juego' ) || is_post_type_archive( 'juego' ) || is_tax( array( 'genero', 'modo_juego', 'etiqueta_juego' ) ) || is_search() || ( np_pagina_id( 'tienda' ) && is_page( np_pagina_id( 'tienda' ) ) ) ) {
		$clases[] = 'np-en-tienda';
	}
	return $clases;
}
add_filter( 'body_class', 'np_clase_body' );

/**
 * Enlace a la ficha de un juego por su slug (o al listado si no existe).
 *
 * @param string $slug Slug del juego.
 * @return string URL escapada.
 */
function np_url_juego( $slug ) {
	$juego = get_page_by_path( $slug, OBJECT, 'juego' );
	return $juego ? esc_url( get_permalink( $juego ) ) : np_url_juegos();
}

/**
 * Si el tema se actualiza, regenera los enlaces permanentes una vez.
 */
function np_comprobar_version() {
	if ( get_option( 'np_version_enlaces' ) !== NP_VERSION ) {
		flush_rewrite_rules();
		update_option( 'np_version_enlaces', NP_VERSION );
	}
}
add_action( 'init', 'np_comprobar_version', 99 );
