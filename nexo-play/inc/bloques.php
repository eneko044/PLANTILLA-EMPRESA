<?php
/**
 * Bloques de la tienda (carpeta blocks/). Todos son dinámicos: se generan en
 * PHP con los juegos publicados, así que se actualizan solos.
 *
 * @package Nexo_Play
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Controles de la barra lateral de cada bloque: atributo => [tipo, etiqueta, opciones].
 *
 * @return array
 */
function np_bloques_config() {
	$criterios = array(
		'ventas'     => __( 'Lo más vendido', 'nexo-play' ),
		'novedades'  => __( 'Novedades', 'nexo-play' ),
		'ofertas'    => __( 'Ofertas', 'nexo-play' ),
		'proximos'   => __( 'Próximos lanzamientos', 'nexo-play' ),
		'gratuitos'  => __( 'Gratuitos', 'nexo-play' ),
		'destacados' => __( 'Destacados', 'nexo-play' ),
		'aleatorio'  => __( 'Aleatorio', 'nexo-play' ),
	);
	return array(
		'nexo-play/destacados' => array(
			'titulo'   => array( 'text', __( 'Título', 'nexo-play' ) ),
			'cantidad' => array( 'range', __( 'Número de juegos', 'nexo-play' ), array( 1, 16 ) ),
		),
		'nexo-play/ofertas'    => array(
			'titulo'   => array( 'text', __( 'Título', 'nexo-play' ) ),
			'cantidad' => array( 'range', __( 'Número de juegos', 'nexo-play' ), array( 4, 16 ) ),
		),
		'nexo-play/estanteria' => array(
			'titulo'      => array( 'text', __( 'Título', 'nexo-play' ) ),
			'subtitulo'   => array( 'text', __( 'Subtítulo', 'nexo-play' ) ),
			'diseno'      => array(
				'select',
				__( 'Diseño', 'nexo-play' ),
				array(
					'carrusel' => __( 'Carrusel de 4 en 4', 'nexo-play' ),
					'panel'    => __( 'Panel de 2 × 2', 'nexo-play' ),
				),
			),
			'criterio'    => array( 'select', __( 'Qué juegos mostrar', 'nexo-play' ), $criterios ),
			'genero'      => array( 'genero', __( 'Solo del género', 'nexo-play' ) ),
			'mismoGenero' => array( 'toggle', __( 'En la ficha de un juego: juegos del mismo género', 'nexo-play' ) ),
			'precioMax'   => array( 'text', __( 'Precio máximo (vacío = cualquiera)', 'nexo-play' ) ),
			'cantidad'    => array( 'range', __( 'Número de juegos', 'nexo-play' ), array( 2, 16 ) ),
		),
		'nexo-play/pestanas'   => array(
			'cantidad' => array( 'range', __( 'Juegos por pestaña', 'nexo-play' ), array( 3, 20 ) ),
		),
		'nexo-play/categorias' => array(
			'titulo' => array( 'text', __( 'Título', 'nexo-play' ) ),
		),
		'nexo-play/busqueda'   => array(
			'titulo'    => array( 'text', __( 'Título (vacío = automático)', 'nexo-play' ) ),
			'porPagina' => array( 'range', __( 'Resultados por página', 'nexo-play' ), array( 5, 50 ) ),
		),
	);
}

/**
 * Registra los bloques y el script del editor.
 */
function np_registrar_bloques() {
	wp_register_script(
		'np-bloques-editor',
		NP_URI . '/assets/js/bloques-editor.js',
		array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-server-side-render', 'wp-i18n' ),
		NP_VERSION,
		true
	);
	foreach ( glob( NP_DIR . '/blocks/*/block.json' ) as $archivo ) {
		register_block_type( dirname( $archivo ) );
	}
}
add_action( 'init', 'np_registrar_bloques' );

/**
 * Datos para el script del editor (controles y lista de géneros).
 */
function np_bloques_datos_editor() {
	$generos = array( '' => __( 'Todos', 'nexo-play' ) );
	$terms   = get_terms(
		array(
			'taxonomy'   => 'genero',
			'hide_empty' => false,
		)
	);
	if ( ! is_wp_error( $terms ) ) {
		foreach ( $terms as $t ) {
			$generos[ $t->slug ] = $t->name;
		}
	}
	wp_add_inline_script(
		'np-bloques-editor',
		'window.npBloques = ' . wp_json_encode(
			array(
				'controles' => np_bloques_config(),
				'generos'   => $generos,
			)
		) . ';',
		'before'
	);
}
add_action( 'enqueue_block_editor_assets', 'np_bloques_datos_editor' );

/**
 * Categoría propia para los bloques de la tienda.
 *
 * @param array $cats Categorías.
 * @return array
 */
function np_categoria_bloques( $cats ) {
	array_unshift(
		$cats,
		array(
			'slug'  => 'nexo-play',
			'title' => __( 'Nexo Play · Tienda', 'nexo-play' ),
		)
	);
	return $cats;
}
add_filter( 'block_categories_all', 'np_categoria_bloques' );

/**
 * Cabecera de sección (título a la izquierda, botones a la derecha).
 *
 * @param string $titulo  Título.
 * @param array  $botones [texto => url].
 * @return string HTML.
 */
function np_cabecera_seccion( $titulo, $botones = array() ) {
	$html = '<div class="np-seccion__cabecera">';
	if ( $titulo ) {
		$html .= '<h2 class="np-seccion__titulo">' . esc_html( $titulo ) . '</h2>';
	}
	if ( $botones ) {
		$html .= '<div class="np-seccion__botones">';
		if ( count( $botones ) > 1 ) {
			$html .= '<span class="np-seccion__vermas">' . esc_html__( 'Ver más:', 'nexo-play' ) . '</span>';
		}
		foreach ( $botones as $texto => $url ) {
			$html .= '<a class="np-boton-gris" href="' . esc_url( $url ) . '">' . esc_html( $texto ) . '</a>';
		}
		$html .= '</div>';
	}
	return $html . '</div>';
}

/**
 * Flechas del carrusel.
 *
 * @return array [anterior, siguiente].
 */
function np_flechas() {
	$svg = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15 4 7 12l8 8" fill="none" stroke="currentColor" stroke-width="3"/></svg>';
	return array(
		'<button type="button" class="np-carrusel__flecha np-carrusel__flecha--prev" aria-label="' . esc_attr__( 'Anterior', 'nexo-play' ) . '">' . $svg . '</button>',
		'<button type="button" class="np-carrusel__flecha np-carrusel__flecha--next" aria-label="' . esc_attr__( 'Siguiente', 'nexo-play' ) . '">' . $svg . '</button>',
	);
}

/**
 * Aviso cuando todavía no hay juegos.
 *
 * @return string HTML.
 */
function np_sin_juegos() {
	$html = '<p class="np-vacio">' . esc_html__( 'Todavía no hay juegos que mostrar aquí.', 'nexo-play' );
	if ( current_user_can( 'edit_posts' ) ) {
		$html .= ' <a href="' . esc_url( admin_url( 'themes.php?page=np-primeros-pasos' ) ) . '">' . esc_html__( 'Crea el contenido de ejemplo', 'nexo-play' ) . '</a> ' . esc_html__( 'o añade juegos en «Juegos › Añadir juego».', 'nexo-play' );
	}
	return $html . '</p>';
}

/**
 * Cápsula horizontal de un juego con su precio.
 *
 * @param array  $d     Datos del juego.
 * @param string $clase Clase extra.
 * @return string HTML.
 */
function np_capsula_html( $d, $clase = '' ) {
	return sprintf(
		'<a class="np-capsula %1$s" href="%2$s"><img src="%3$s" alt="%4$s" loading="lazy"><span class="np-capsula__pie">%5$s</span></a>',
		esc_attr( $clase ),
		esc_url( $d['url'] ),
		esc_url( $d['cabecera'] ),
		esc_attr( $d['titulo'] ),
		np_precio_html( $d )
	);
}
