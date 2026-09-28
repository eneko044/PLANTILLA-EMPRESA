<?php
/**
 * Funciones del tema Nexo Empresa.
 *
 * El diseño se define en theme.json; aquí solo se registra lo que theme.json
 * no puede hacer: hojas de estilo extra, estilos de bloque, categorías de
 * secciones, el bloque de iconos, el formulario de contacto y el importador
 * de contenido de demostración.
 *
 * @package Nexo_Empresa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NEXO_VERSION', wp_get_theme( get_template() )->get( 'Version' ) );
define( 'NEXO_DIR', get_template_directory() );
define( 'NEXO_URI', get_template_directory_uri() );

require NEXO_DIR . '/inc/estilos-de-bloque.php';
require NEXO_DIR . '/inc/bloque-icono.php';
require NEXO_DIR . '/inc/formulario-contacto.php';
require NEXO_DIR . '/inc/importador-demo.php';
require NEXO_DIR . '/inc/compatibilidad.php';

/**
 * Soportes del tema.
 */
function nexo_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_editor_style( 'assets/css/nexo.css' );
	load_theme_textdomain( 'nexo-empresa', NEXO_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'nexo_setup' );

/**
 * Estilos y scripts de la parte pública.
 */
function nexo_enqueue_assets() {
	wp_enqueue_style( 'nexo-empresa', NEXO_URI . '/assets/css/nexo.css', array(), NEXO_VERSION );
	wp_enqueue_script(
		'nexo-empresa',
		NEXO_URI . '/assets/js/nexo.js',
		array(),
		NEXO_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'nexo_enqueue_assets' );

/**
 * Marca el documento como «con JavaScript» lo antes posible para que las
 * animaciones de entrada no provoquen parpadeos. Sin JavaScript el contenido
 * se ve siempre, sin animar.
 */
function nexo_js_class() {
	echo "<script>document.documentElement.classList.add('nexo-js');</script>\n";
}
add_action( 'wp_head', 'nexo_js_class', 0 );

/**
 * Panel «Nexo: animación y visibilidad» en el editor de bloques.
 */
function nexo_editor_assets() {
	wp_enqueue_script(
		'nexo-editor',
		NEXO_URI . '/assets/js/editor.js',
		array( 'wp-hooks', 'wp-compose', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n' ),
		NEXO_VERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'nexo_editor_assets' );

/**
 * Categorías para agrupar las secciones en el insertador de bloques.
 */
function nexo_pattern_categories() {
	$categorias = array(
		'nexo-portadas'     => __( 'Nexo · Portadas', 'nexo-empresa' ),
		'nexo-servicios'    => __( 'Nexo · Servicios y ventajas', 'nexo-empresa' ),
		'nexo-nosotros'     => __( 'Nexo · Sobre nosotros', 'nexo-empresa' ),
		'nexo-proyectos'    => __( 'Nexo · Proyectos', 'nexo-empresa' ),
		'nexo-confianza'    => __( 'Nexo · Clientes y testimonios', 'nexo-empresa' ),
		'nexo-precios'      => __( 'Nexo · Precios', 'nexo-empresa' ),
		'nexo-llamadas'     => __( 'Nexo · Llamadas a la acción', 'nexo-empresa' ),
		'nexo-contacto'     => __( 'Nexo · Contacto', 'nexo-empresa' ),
		'nexo-blog'         => __( 'Nexo · Blog', 'nexo-empresa' ),
		'nexo-paginas'      => __( 'Nexo · Páginas completas', 'nexo-empresa' ),
		'nexo-estructura'   => __( 'Nexo · Cabeceras y pies', 'nexo-empresa' ),
	);
	foreach ( $categorias as $slug => $label ) {
		register_block_pattern_category( $slug, array( 'label' => $label ) );
	}
}
add_action( 'init', 'nexo_pattern_categories' );

/**
 * URL de una imagen incluida en el tema, lista para usar en las secciones.
 *
 * @param string $archivo Nombre del archivo dentro de assets/images.
 * @return string
 */
function nexo_img( $archivo ) {
	return esc_url( NEXO_URI . '/assets/images/' . $archivo );
}

/**
 * Enlace a una de las páginas de ejemplo (inicio, servicios, nosotros,
 * precios, blog, contacto). Si todavía no existe, apunta a un ancla de la
 * portada para que el botón nunca quede roto.
 *
 * @param string $clave Página de ejemplo.
 * @return string URL escapada.
 */
function nexo_url( $clave ) {
	static $cache = array();
	if ( ! isset( $cache[ $clave ] ) ) {
		$ids = get_posts(
			array(
				'post_type'   => 'page',
				'post_status' => 'publish',
				'meta_key'    => '_nexo_demo', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
				'meta_value'  => $clave, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
				'numberposts' => 1,
				'fields'      => 'ids',
			)
		);
		$cache[ $clave ] = $ids ? get_permalink( $ids[0] ) : home_url( 'inicio' === $clave ? '/' : '/#' . $clave );
	}
	return esc_url( $cache[ $clave ] );
}

/**
 * Banda de título para páginas interiores (marcado de bloques).
 *
 * @param string $antetitulo Texto pequeño encima del título.
 * @param string $titulo     Título principal.
 * @param string $texto      Entradilla.
 * @return string
 */
function nexo_banda_titulo( $antetitulo, $titulo, $texto ) {
	return '<!-- wp:group {"metadata":{"name":"' . esc_attr__( 'Cabecera de página', 'nexo-empresa' ) . '"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"gradient":"suave","layout":{"type":"constrained","contentSize":"820px"}} -->
<div class="wp-block-group alignfull has-suave-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","className":"is-style-antetitulo nexo-anim-subir"} -->
<p class="has-text-align-center is-style-antetitulo nexo-anim-subir">' . esc_html( $antetitulo ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"className":"nexo-anim-subir nexo-retraso-1"} -->
<h1 class="wp-block-heading has-text-align-center nexo-anim-subir nexo-retraso-1">' . esc_html( $titulo ) . '</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"is-style-destacado nexo-anim-subir nexo-retraso-2"} -->
<p class="has-text-align-center is-style-destacado nexo-anim-subir nexo-retraso-2">' . esc_html( $texto ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->';
}
