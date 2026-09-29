<?php
/**
 * Tipo de contenido «Juego», sus taxonomías, sus datos (precio, descuento,
 * fecha, capturas…) y funciones para mostrarlos.
 *
 * @package Nexo_Play
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Campos de cada juego: clave => [tipo, etiqueta, ayuda].
 *
 * @return array
 */
function np_campos() {
	return array(
		'precio'       => array( 'string', __( 'Precio (€)', 'nexo-play' ), __( '0 = gratuito. Déjalo vacío si aún no tiene precio.', 'nexo-play' ) ),
		'descuento'    => array( 'integer', __( 'Descuento (%)', 'nexo-play' ), __( 'Por ejemplo 40. 0 = sin descuento.', 'nexo-play' ) ),
		'oferta'       => array( 'string', __( 'Etiqueta de la oferta', 'nexo-play' ), __( 'Aparece en «Descuentos y eventos». Ej.: OFERTA DE HOY.', 'nexo-play' ) ),
		'fecha'        => array( 'string', __( 'Fecha de lanzamiento', 'nexo-play' ), __( 'Si es futura, el juego sale como «Próximamente».', 'nexo-play' ) ),
		'desarrollador' => array( 'string', __( 'Desarrollador', 'nexo-play' ), '' ),
		'editor'       => array( 'string', __( 'Editor', 'nexo-play' ), '' ),
		'valoracion'   => array( 'string', __( 'Valoración de los usuarios', 'nexo-play' ), __( 'Ej.: Muy positivas, Variadas…', 'nexo-play' ) ),
		'resenas'      => array( 'integer', __( 'Número de reseñas', 'nexo-play' ), '' ),
		'ventas'       => array( 'integer', __( 'Popularidad (ventas)', 'nexo-play' ), __( 'Cuanto más alto, antes sale en «Lo más vendido».', 'nexo-play' ) ),
		'destacado'    => array( 'boolean', __( 'Destacado en la portada', 'nexo-play' ), __( 'Sale en el carrusel «Destacados y recomendados».', 'nexo-play' ) ),
		'plataformas'  => array( 'string', __( 'Plataformas', 'nexo-play' ), __( 'Separadas por comas: windows, mac, linux.', 'nexo-play' ) ),
		'requisitos_min' => array( 'string', __( 'Requisitos mínimos', 'nexo-play' ), __( 'Una línea por requisito: «SO: Windows 10».', 'nexo-play' ) ),
		'requisitos_rec' => array( 'string', __( 'Requisitos recomendados', 'nexo-play' ), '' ),
		'enlace'       => array( 'string', __( 'Enlace del botón «Añadir al carro»', 'nexo-play' ), __( 'Tu tienda, WooCommerce, una plataforma externa… Vacío = página de soporte.', 'nexo-play' ) ),
		'capturas'     => array( 'string', __( 'Capturas', 'nexo-play' ), '' ),
		'vertical'     => array( 'integer', __( 'Portada vertical', 'nexo-play' ), '' ),
		'precio_final' => array( 'number', '', '' ),
	);
}

/**
 * Registra el tipo de contenido, las taxonomías y los campos.
 */
function np_registrar_contenido() {
	register_post_type(
		'juego',
		array(
			'labels'        => array(
				'name'               => __( 'Juegos', 'nexo-play' ),
				'singular_name'      => __( 'Juego', 'nexo-play' ),
				'add_new'            => __( 'Añadir juego', 'nexo-play' ),
				'add_new_item'       => __( 'Añadir nuevo juego', 'nexo-play' ),
				'edit_item'          => __( 'Editar juego', 'nexo-play' ),
				'new_item'           => __( 'Nuevo juego', 'nexo-play' ),
				'view_item'          => __( 'Ver juego', 'nexo-play' ),
				'search_items'       => __( 'Buscar juegos', 'nexo-play' ),
				'not_found'          => __( 'No hay juegos', 'nexo-play' ),
				'all_items'          => __( 'Todos los juegos', 'nexo-play' ),
				'featured_image'     => __( 'Portada horizontal', 'nexo-play' ),
				'set_featured_image' => __( 'Elegir portada horizontal', 'nexo-play' ),
				'menu_name'          => __( 'Juegos', 'nexo-play' ),
			),
			'public'        => true,
			'has_archive'   => 'juegos',
			'rewrite'       => array( 'slug' => 'juego' ),
			'menu_icon'     => 'dashicons-games',
			'menu_position' => 5,
			'show_in_rest'  => true,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions' ),
		)
	);

	$taxonomias = array(
		'genero'         => array( __( 'Géneros', 'nexo-play' ), __( 'Género', 'nexo-play' ), true, 'genero' ),
		'etiqueta_juego' => array( __( 'Etiquetas', 'nexo-play' ), __( 'Etiqueta', 'nexo-play' ), false, 'etiqueta' ),
		'modo_juego'     => array( __( 'Formas de jugar', 'nexo-play' ), __( 'Forma de jugar', 'nexo-play' ), true, 'modo' ),
	);
	foreach ( $taxonomias as $slug => $t ) {
		register_taxonomy(
			$slug,
			'juego',
			array(
				'labels'            => array(
					'name'          => $t[0],
					'singular_name' => $t[1],
					'menu_name'     => $t[0],
				),
				'hierarchical'      => $t[2],
				'query_var'         => false, // El buscador usa ?genero[]=… con su propio significado.
				'show_in_rest'      => true,
				'show_admin_column' => true,
				'rewrite'           => array( 'slug' => $t[3] ),
			)
		);
	}

	foreach ( np_campos() as $clave => $campo ) {
		register_post_meta(
			'juego',
			'_np_' . $clave,
			array(
				'type'              => $campo[0],
				'single'            => true,
				'show_in_rest'      => 'precio_final' !== $clave,
				'sanitize_callback' => function ( $valor ) use ( $clave, $campo ) {
					return np_sanear_campo( $clave, $campo[0], $valor );
				},
				'auth_callback'     => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}
	register_term_meta(
		'genero',
		'_np_color',
		array(
			'type'         => 'string',
			'single'       => true,
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'np_registrar_contenido' );

/**
 * Sanea el valor de un campo del juego.
 *
 * @param string $clave Campo.
 * @param string $tipo  Tipo.
 * @param mixed  $v     Valor.
 * @return mixed
 */
function np_sanear_campo( $clave, $tipo, $v ) {
	if ( 'precio' === $clave || 'precio_final' === $clave ) {
		$v = trim( str_replace( ',', '.', (string) $v ) );
		return '' === $v ? '' : (string) max( 0, round( (float) $v, 2 ) );
	}
	switch ( $tipo ) {
		case 'integer':
			return absint( $v );
		case 'boolean':
			return (bool) $v;
	}
	if ( 'enlace' === $clave ) {
		return esc_url_raw( (string) $v );
	}
	if ( 0 === strpos( $clave, 'requisitos' ) ) {
		return sanitize_textarea_field( (string) $v );
	}
	if ( 'capturas' === $clave || 'plataformas' === $clave ) {
		$partes = array_filter( array_map( 'trim', explode( ',', (string) $v ) ) );
		return implode( ',', 'capturas' === $clave ? array_filter( array_map( 'absint', $partes ) ) : array_map( 'sanitize_key', $partes ) );
	}
	return sanitize_text_field( (string) $v );
}

/**
 * Recalcula el precio final al guardar desde el editor de bloques.
 *
 * @param WP_Post $post Juego.
 */
function np_tras_guardar_rest( $post ) {
	np_actualizar_precio_final( $post->ID );
}
add_action( 'rest_after_insert_juego', 'np_tras_guardar_rest' );

/**
 * Panel «Datos del juego» en la barra lateral del editor de bloques.
 */
function np_panel_datos_editor() {
	$pantalla = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
	if ( ! $pantalla || 'juego' !== $pantalla->post_type ) {
		return;
	}
	wp_enqueue_script(
		'np-datos-juego',
		NP_URI . '/assets/js/datos-juego.js',
		array( 'wp-plugins', 'wp-editor', 'wp-edit-post', 'wp-data', 'wp-core-data', 'wp-block-editor', 'wp-components', 'wp-element', 'wp-i18n' ),
		NP_VERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'np_panel_datos_editor' );

/* -------------------------------------------------------------------------
 * Caja «Datos del juego» para el editor clásico
 * ---------------------------------------------------------------------- */

/**
 * Añade la caja de datos.
 */
function np_caja_datos() {
	// Solo en el editor clásico: en el de bloques los datos están en la barra lateral.
	add_meta_box( 'np-datos', __( 'Datos del juego (precio, fecha, capturas…)', 'nexo-play' ), 'np_caja_datos_html', 'juego', 'normal', 'high', array( '__back_compat_meta_box' => true ) );
}
add_action( 'add_meta_boxes', 'np_caja_datos' );

/**
 * Contenido de la caja.
 *
 * @param WP_Post $post Juego.
 */
function np_caja_datos_html( $post ) {
	wp_nonce_field( 'np_guardar_juego', 'np_nonce' );
	$campos = np_campos();
	echo '<div class="np-admin">';
	foreach ( $campos as $clave => $c ) {
		if ( in_array( $clave, array( 'capturas', 'vertical', 'precio_final' ), true ) ) {
			continue;
		}
		$valor = get_post_meta( $post->ID, '_np_' . $clave, true );
		$id    = 'np-' . $clave;
		echo '<p class="np-admin__campo np-admin__campo--' . esc_attr( $clave ) . '"><label for="' . esc_attr( $id ) . '"><strong>' . esc_html( $c[1] ) . '</strong></label>';
		if ( 'boolean' === $c[0] ) {
			echo '<br><label><input type="checkbox" id="' . esc_attr( $id ) . '" name="np[' . esc_attr( $clave ) . ']" value="1" ' . checked( (bool) $valor, true, false ) . '> ' . esc_html( $c[2] ) . '</label>';
			echo '</p>';
			continue;
		}
		if ( 0 === strpos( $clave, 'requisitos' ) ) {
			echo '<textarea id="' . esc_attr( $id ) . '" name="np[' . esc_attr( $clave ) . ']" rows="5">' . esc_textarea( $valor ) . '</textarea>';
		} else {
			$tipo = 'fecha' === $clave ? 'date' : ( ( 'precio' === $clave || 'integer' === $c[0] ) ? 'number' : ( 'enlace' === $clave ? 'url' : 'text' ) );
			$paso = 'precio' === $clave ? ' step="0.01" min="0"' : ( 'integer' === $c[0] ? ' step="1" min="0"' : '' );
			$lista = 'valoracion' === $clave ? ' list="np-valoraciones"' : '';
			echo '<input type="' . esc_attr( $tipo ) . '" id="' . esc_attr( $id ) . '" name="np[' . esc_attr( $clave ) . ']" value="' . esc_attr( $valor ) . '"' . $paso . $lista . '>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- atributos fijos.
		}
		if ( $c[2] ) {
			echo '<span class="description">' . esc_html( $c[2] ) . '</span>';
		}
		echo '</p>';
	}
	echo '<datalist id="np-valoraciones">';
	foreach ( np_valoraciones() as $v => $clase ) {
		echo '<option value="' . esc_attr( $v ) . '">';
	}
	echo '</datalist>';

	// Imágenes: portada vertical y capturas.
	$vertical = (int) get_post_meta( $post->ID, '_np_vertical', true );
	$capturas = get_post_meta( $post->ID, '_np_capturas', true );
	echo '<div class="np-admin__imagenes">';
	echo '<div><strong>' . esc_html__( 'Portada vertical', 'nexo-play' ) . '</strong><p class="description">' . esc_html__( 'Se usa en «Descuentos y eventos». Recomendado: 600 × 900 px. La portada horizontal es la «Imagen destacada» (1232 × 706 px).', 'nexo-play' ) . '</p>';
	echo '<input type="hidden" name="np[vertical]" id="np-vertical" value="' . esc_attr( $vertical ? $vertical : '' ) . '">';
	echo '<div class="np-admin__vista" id="np-vertical-vista">' . ( $vertical ? wp_get_attachment_image( $vertical, 'thumbnail' ) : '' ) . '</div>';
	echo '<button type="button" class="button" data-np-elegir="vertical">' . esc_html__( 'Elegir imagen', 'nexo-play' ) . '</button></div>';
	echo '<div><strong>' . esc_html__( 'Capturas de pantalla', 'nexo-play' ) . '</strong><p class="description">' . esc_html__( 'Aparecen en la galería de la ficha y en las vistas previas. Recomendado: 16:9.', 'nexo-play' ) . '</p>';
	echo '<input type="hidden" name="np[capturas]" id="np-capturas" value="' . esc_attr( $capturas ) . '">';
	echo '<div class="np-admin__vista" id="np-capturas-vista">';
	foreach ( array_filter( array_map( 'absint', explode( ',', (string) $capturas ) ) ) as $cid ) {
		echo wp_get_attachment_image( $cid, 'thumbnail' );
	}
	echo '</div><button type="button" class="button" data-np-elegir="capturas">' . esc_html__( 'Elegir capturas', 'nexo-play' ) . '</button></div>';
	echo '</div></div>';
}

/**
 * Guarda los datos del juego.
 *
 * @param int $post_id ID.
 */
function np_guardar_juego( $post_id ) {
	if ( ! isset( $_POST['np_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['np_nonce'] ) ), 'np_guardar_juego' ) ) {
		return;
	}
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$datos = isset( $_POST['np'] ) && is_array( $_POST['np'] ) ? wp_unslash( $_POST['np'] ) : array(); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- se sanea campo a campo.
	foreach ( np_campos() as $clave => $c ) {
		if ( 'precio_final' === $clave ) {
			continue;
		}
		$v = isset( $datos[ $clave ] ) ? $datos[ $clave ] : '';
		if ( 'boolean' === $c[0] ) {
			$v = empty( $v ) ? '' : '1';
		} elseif ( 'integer' === $c[0] ) {
			$v = '' === $v ? '' : absint( $v );
		} else {
			$v = np_sanear_campo( $clave, $c[0], $v );
		}
		if ( '' === $v ) {
			delete_post_meta( $post_id, '_np_' . $clave );
		} else {
			update_post_meta( $post_id, '_np_' . $clave, $v );
		}
	}
	np_actualizar_precio_final( $post_id );
}
add_action( 'save_post_juego', 'np_guardar_juego' );

/**
 * Guarda el precio con el descuento aplicado (sirve para filtrar y ordenar).
 *
 * @param int $post_id ID.
 */
function np_actualizar_precio_final( $post_id ) {
	$precio = get_post_meta( $post_id, '_np_precio', true );
	if ( '' === $precio ) {
		delete_post_meta( $post_id, '_np_precio_final' );
		return;
	}
	$desc = (int) get_post_meta( $post_id, '_np_descuento', true );
	update_post_meta( $post_id, '_np_precio_final', round( (float) $precio * ( 100 - min( 100, $desc ) ) / 100, 2 ) );
}

/**
 * Estilos y selector de imágenes de la caja de datos.
 *
 * @param string $hook Pantalla.
 */
function np_admin_assets( $hook ) {
	$pantalla = get_current_screen();
	if ( ! $pantalla || 'juego' !== $pantalla->post_type || ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_script( 'np-admin', NP_URI . '/assets/js/admin.js', array( 'jquery' ), NP_VERSION, true );
	wp_register_style( 'np-admin', false, array(), NP_VERSION );
	wp_enqueue_style( 'np-admin' );
	wp_add_inline_style(
		'np-admin',
		'.np-admin{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:4px 20px}.np-admin__campo input:not([type=checkbox]),.np-admin__campo textarea{width:100%}' .
		'.np-admin__campo--requisitos_min,.np-admin__campo--requisitos_rec,.np-admin__campo--enlace,.np-admin__imagenes{grid-column:1/-1}.np-admin .description{display:block;font-size:12px}' .
		'.np-admin__imagenes{display:grid;grid-template-columns:1fr 3fr;gap:20px;border-top:1px solid #ddd;padding-top:12px}.np-admin__vista{display:flex;flex-wrap:wrap;gap:6px;margin:8px 0}.np-admin__vista img{width:90px;height:auto;border-radius:3px}'
	);
}
add_action( 'admin_enqueue_scripts', 'np_admin_assets' );

/**
 * Color del mosaico de cada género (Géneros › Editar).
 *
 * @param WP_Term $term Término.
 */
function np_color_genero_campo( $term ) {
	$color = is_object( $term ) ? get_term_meta( $term->term_id, '_np_color', true ) : '';
	echo '<tr class="form-field"><th scope="row"><label for="np-color">' . esc_html__( 'Color del mosaico', 'nexo-play' ) . '</label></th><td>';
	echo '<input type="color" id="np-color" name="np_color" value="' . esc_attr( $color ? $color : '#6b2a8c' ) . '">';
	echo '<p class="description">' . esc_html__( 'Color de fondo en «Explorar por categoría».', 'nexo-play' ) . '</p></td></tr>';
}
add_action( 'genero_edit_form_fields', 'np_color_genero_campo' );

/**
 * Guarda el color del género.
 *
 * @param int $term_id Término.
 */
function np_color_genero_guardar( $term_id ) {
	if ( isset( $_POST['np_color'] ) && current_user_can( 'manage_categories' ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing -- el formulario de términos ya comprueba su nonce.
		update_term_meta( $term_id, '_np_color', sanitize_hex_color( wp_unslash( $_POST['np_color'] ) ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
	}
}
add_action( 'edited_genero', 'np_color_genero_guardar' );

/**
 * Columnas del listado de juegos.
 *
 * @param array $cols Columnas.
 * @return array
 */
function np_columnas( $cols ) {
	$nuevas = array();
	foreach ( $cols as $k => $v ) {
		$nuevas[ $k ] = $v;
		if ( 'title' === $k ) {
			$nuevas['np_precio'] = __( 'Precio', 'nexo-play' );
			$nuevas['np_fecha']  = __( 'Lanzamiento', 'nexo-play' );
		}
	}
	return $nuevas;
}
add_filter( 'manage_juego_posts_columns', 'np_columnas' );

/**
 * Contenido de las columnas.
 *
 * @param string $col Columna.
 * @param int    $id  Juego.
 */
function np_columna_valor( $col, $id ) {
	$d = np_datos( $id );
	if ( 'np_precio' === $col ) {
		echo esc_html( np_texto_precio( $d ) );
		if ( $d['destacado'] ) {
			echo ' ★';
		}
	} elseif ( 'np_fecha' === $col ) {
		echo esc_html( $d['fecha_texto'] );
	}
}
add_action( 'manage_juego_posts_custom_column', 'np_columna_valor', 10, 2 );

/* -------------------------------------------------------------------------
 * Datos y formato
 * ---------------------------------------------------------------------- */

/**
 * Valoraciones posibles y su clase de color.
 *
 * @return array
 */
function np_valoraciones() {
	return array(
		'Extremadamente positivas' => 'positiva',
		'Muy positivas'            => 'positiva',
		'Positivas'                => 'positiva',
		'Mayormente positivas'     => 'positiva',
		'Variadas'                 => 'variada',
		'Mayormente negativas'     => 'negativa',
		'Negativas'                => 'negativa',
	);
}

/**
 * Todos los datos de un juego, listos para mostrar.
 *
 * @param int $id Juego.
 * @return array
 */
function np_datos( $id ) {
	static $cache = array();
	if ( isset( $cache[ $id ] ) ) {
		return $cache[ $id ];
	}
	$m      = function ( $k ) use ( $id ) {
		return get_post_meta( $id, '_np_' . $k, true );
	};
	$precio = $m( 'precio' );
	$desc   = (int) $m( 'descuento' );
	$fecha  = $m( 'fecha' );
	$ts     = $fecha ? strtotime( $fecha . ' 00:00:00' ) : 0;
	$hoy    = strtotime( current_time( 'Y-m-d' ) . ' 00:00:00' );

	$capturas = array();
	foreach ( array_filter( array_map( 'absint', explode( ',', (string) $m( 'capturas' ) ) ) ) as $cid ) {
		$grande = wp_get_attachment_image_url( $cid, 'large' );
		if ( $grande ) {
			$capturas[] = array(
				'id'      => $cid,
				'grande'  => $grande,
				'mediana' => wp_get_attachment_image_url( $cid, 'medium_large' ),
				'mini'    => wp_get_attachment_image_url( $cid, 'medium' ),
			);
		}
	}
	$thumb    = get_post_thumbnail_id( $id );
	$vertical = (int) $m( 'vertical' );
	$generos  = get_the_terms( $id, 'genero' );
	$etiqs    = get_the_terms( $id, 'etiqueta_juego' );
	$modos    = get_the_terms( $id, 'modo_juego' );
	$val      = (string) $m( 'valoracion' );
	$vals     = np_valoraciones();

	$cache[ $id ] = array(
		'id'          => $id,
		'titulo'      => get_the_title( $id ),
		'url'         => get_permalink( $id ),
		'corta'       => has_excerpt( $id ) ? get_the_excerpt( $id ) : wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $id ) ), 30 ),
		'precio'      => '' === $precio ? null : (float) $precio,
		'descuento'   => ( '' !== $precio && (float) $precio > 0 ) ? min( 100, $desc ) : 0,
		'final'       => '' === $precio ? null : round( (float) $precio * ( 100 - min( 100, $desc ) ) / 100, 2 ),
		'oferta'      => (string) $m( 'oferta' ),
		'fecha'       => $fecha,
		'proximo'     => $ts && $ts > $hoy,
		'fecha_texto' => $ts ? strtoupper( date_i18n( 'j M Y', $ts ) ) : __( 'Por anunciar', 'nexo-play' ),
		'dev'         => (string) $m( 'desarrollador' ),
		'editor'      => (string) $m( 'editor' ),
		'valoracion'  => $val,
		'val_clase'   => isset( $vals[ $val ] ) ? $vals[ $val ] : 'variada',
		'resenas'     => (int) $m( 'resenas' ),
		'destacado'   => (bool) $m( 'destacado' ),
		'plataformas' => array_filter( array_map( 'trim', explode( ',', strtolower( (string) $m( 'plataformas' ) ) ) ) ),
		'req_min'     => (string) $m( 'requisitos_min' ),
		'req_rec'     => (string) $m( 'requisitos_rec' ),
		'enlace'      => $m( 'enlace' ) ? $m( 'enlace' ) : np_url( 'soporte' ),
		'capturas'    => $capturas,
		'cabecera'    => $thumb ? wp_get_attachment_image_url( $thumb, 'large' ) : ( $capturas ? $capturas[0]['grande'] : '' ),
		'capsula'     => $thumb ? wp_get_attachment_image_url( $thumb, 'np-capsula' ) : ( $capturas ? $capturas[0]['mini'] : '' ),
		'vertical'    => $vertical ? wp_get_attachment_image_url( $vertical, 'large' ) : '',
		'generos'     => is_array( $generos ) ? $generos : array(),
		'etiquetas'   => is_array( $etiqs ) ? $etiqs : array(),
		'modos'       => is_array( $modos ) ? $modos : array(),
	);
	return $cache[ $id ];
}

/**
 * Formatea un importe: 19,99€.
 *
 * @param float $n Importe.
 * @return string
 */
function np_dinero( $n ) {
	/**
	 * Filtra el símbolo de moneda (por defecto €).
	 */
	$simbolo = apply_filters( 'np_moneda', '€' );
	return number_format_i18n( (float) $n, 2 ) . $simbolo;
}

/**
 * Precio en texto plano.
 *
 * @param array $d Datos del juego.
 * @return string
 */
function np_texto_precio( $d ) {
	if ( null === $d['precio'] ) {
		return $d['proximo'] ? __( 'Próximamente', 'nexo-play' ) : '—';
	}
	if ( 0.0 === (float) $d['precio'] ) {
		return __( 'Gratuito', 'nexo-play' );
	}
	return np_dinero( $d['final'] );
}

/**
 * Bloque de precio con descuento (verde) o sin él.
 *
 * @param array  $d     Datos del juego.
 * @param string $extra Clase extra.
 * @return string HTML.
 */
function np_precio_html( $d, $extra = '' ) {
	$clase = trim( 'np-precio ' . $extra );
	if ( $d['descuento'] > 0 ) {
		return sprintf(
			'<div class="%1$s np-precio--descuento"><span class="np-precio__pct">-%2$d%%</span><span class="np-precio__cajas"><del>%3$s</del><ins>%4$s</ins></span></div>',
			esc_attr( $clase ),
			(int) $d['descuento'],
			esc_html( np_dinero( $d['precio'] ) ),
			esc_html( np_dinero( $d['final'] ) )
		);
	}
	return sprintf( '<div class="%1$s"><span class="np-precio__final">%2$s</span></div>', esc_attr( $clase ), esc_html( np_texto_precio( $d ) ) );
}

/**
 * Valoración de usuarios con su color.
 *
 * @param array $d Datos del juego.
 * @return string HTML.
 */
function np_valoracion_html( $d ) {
	if ( ! $d['valoracion'] ) {
		return '<span class="np-valoracion np-valoracion--sin">' . esc_html__( 'Sin reseñas de usuarios', 'nexo-play' ) . '</span>';
	}
	return sprintf(
		'<span class="np-valoracion np-valoracion--%1$s">%2$s</span> <span class="np-valoracion__num">(%3$s)</span>',
		esc_attr( $d['val_clase'] ),
		esc_html( $d['valoracion'] ),
		esc_html( number_format_i18n( $d['resenas'] ) )
	);
}

/**
 * Lista de etiquetas (máximo $max).
 *
 * @param array $d   Datos del juego.
 * @param int   $max Máximo.
 * @param bool  $enlaces Con enlace.
 * @return string HTML.
 */
function np_etiquetas_html( $d, $max = 4, $enlaces = false ) {
	$terms = array_slice( array_merge( $d['etiquetas'], $d['generos'] ), 0, $max );
	$html  = '';
	foreach ( $terms as $t ) {
		$html .= $enlaces
			? '<a class="np-etiqueta" href="' . esc_url( get_term_link( $t ) ) . '">' . esc_html( $t->name ) . '</a>'
			: '<span class="np-etiqueta">' . esc_html( $t->name ) . '</span>';
	}
	return $html ? '<div class="np-etiquetas">' . $html . '</div>' : '';
}

/**
 * Iconos de plataforma.
 *
 * @param array $d Datos del juego.
 * @return string HTML.
 */
function np_plataformas_html( $d ) {
	$svg = array(
		'windows' => '<path d="M3 5.5 10.5 4.4v7.1H3zM11.5 4.3 21 3v8.5h-9.5zM3 12.5h7.5v7.1L3 18.5zM11.5 12.5H21V21l-9.5-1.3z"/>',
		'mac'     => '<path d="M16.4 12.6c0-2.6 2.1-3.8 2.2-3.9-1.2-1.8-3.1-2-3.8-2-1.6-.2-3.1.9-3.9.9-.8 0-2-.9-3.4-.9-1.7 0-3.3 1-4.2 2.6-1.8 3.1-.5 7.7 1.3 10.2.9 1.2 1.9 2.6 3.2 2.6 1.3-.1 1.8-.8 3.4-.8s2 .8 3.4.8c1.4 0 2.3-1.3 3.1-2.5 1-1.4 1.4-2.8 1.4-2.9-.1 0-2.7-1-2.7-4.1zM13.9 4.9c.7-.9 1.2-2 1.1-3.2-1 0-2.3.7-3 1.6-.7.8-1.2 2-1.1 3.1 1.1.1 2.3-.6 3-1.5z"/>',
		'linux'   => '<path d="M12 2c-2 0-3.3 1.8-3.3 4.2 0 1.4.4 2.3.1 3.4-.4 1.4-2.8 3.6-2.8 6.6 0 .7.2 1.3.5 1.8-.9.5-1.5 1.1-1.5 1.8 0 1.2 2.3 1.2 3.4 1.9.8.4 1.7.4 2.3-.2h2.6c.6.6 1.5.6 2.3.2 1.1-.7 3.4-.7 3.4-1.9 0-.7-.6-1.3-1.5-1.8.3-.5.5-1.1.5-1.8 0-3-2.4-5.2-2.8-6.6-.3-1.1.1-2-.1-3.4C15.3 3.8 14 2 12 2z"/>',
	);
	$html = '';
	foreach ( $d['plataformas'] as $p ) {
		if ( isset( $svg[ $p ] ) ) {
			$html .= '<svg class="np-plataforma" viewBox="0 0 24 24" aria-label="' . esc_attr( ucfirst( $p ) ) . '" role="img">' . $svg[ $p ] . '</svg>';
		}
	}
	return $html ? '<span class="np-plataformas">' . $html . '</span>' : '';
}

/**
 * Consulta de juegos con los criterios de la tienda.
 *
 * @param array $a criterio (novedades|ventas|ofertas|proximos|gratuitos|destacados|aleatorio),
 *                 cantidad, genero, etiqueta, modo, precio_max, excluir, busqueda, pagina.
 * @return WP_Query
 */
function np_consulta( $a = array() ) {
	$a    = wp_parse_args(
		$a,
		array(
			'criterio'   => 'ventas',
			'cantidad'   => 8,
			'genero'     => '',
			'etiqueta'   => '',
			'modo'       => '',
			'precio_max' => '',
			'excluir'    => array(),
			'busqueda'   => '',
			'pagina'     => 1,
			'oferta'     => false,
			'sin_gratis' => false,
		)
	);
	$hoy  = current_time( 'Y-m-d' );
	$args = array(
		'post_type'           => 'juego',
		'post_status'         => 'publish',
		'posts_per_page'      => (int) $a['cantidad'],
		'paged'               => max( 1, (int) $a['pagina'] ),
		'ignore_sticky_posts' => true,
		'post__not_in'        => (array) $a['excluir'],
		'meta_query'          => array(), // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
		'tax_query'           => array(), // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
	);
	if ( $a['busqueda'] ) {
		$args['s'] = $a['busqueda'];
	}
	foreach ( array( 'genero' => 'genero', 'etiqueta' => 'etiqueta_juego', 'modo' => 'modo_juego' ) as $k => $tax ) {
		if ( $a[ $k ] ) {
			$args['tax_query'][] = array(
				'taxonomy' => $tax,
				'field'    => 'slug',
				'terms'    => (array) $a[ $k ],
			);
		}
	}
	if ( '' !== $a['precio_max'] && null !== $a['precio_max'] ) {
		$args['meta_query'][] = array(
			'key'     => '_np_precio_final',
			'value'   => (float) $a['precio_max'],
			'compare' => '<=',
			'type'    => 'DECIMAL(10,2)',
		);
	}
	if ( $a['oferta'] ) {
		$args['meta_query'][] = array(
			'key'     => '_np_descuento',
			'value'   => 0,
			'compare' => '>',
			'type'    => 'NUMERIC',
		);
	}
	if ( $a['sin_gratis'] ) {
		$args['meta_query'][] = array(
			'relation' => 'OR',
			array(
				'key'     => '_np_precio_final',
				'value'   => 0,
				'compare' => '>',
				'type'    => 'DECIMAL(10,2)',
			),
			array(
				'key'     => '_np_precio_final',
				'compare' => 'NOT EXISTS',
			),
		);
	}

	switch ( $a['criterio'] ) {
		case 'destacados':
			$args['meta_query'][] = array(
				'key'   => '_np_destacado',
				'value' => '1',
			);
			$args['orderby']      = array(
				'menu_order' => 'ASC',
				'date'       => 'DESC',
			);
			break;
		case 'ofertas':
			$args['meta_query'][] = array(
				'key'     => '_np_descuento',
				'value'   => 0,
				'compare' => '>',
				'type'    => 'NUMERIC',
			);
			$args['meta_key']     = '_np_descuento'; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			$args['orderby']      = 'meta_value_num';
			$args['order']        = 'DESC';
			break;
		case 'novedades':
			$args['meta_query'][] = array(
				'key'     => '_np_fecha',
				'value'   => $hoy,
				'compare' => '<=',
				'type'    => 'DATE',
			);
			$args['meta_key']     = '_np_fecha'; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			$args['orderby']      = 'meta_value';
			$args['order']        = 'DESC';
			break;
		case 'proximos':
			$args['meta_query'][] = array(
				'key'     => '_np_fecha',
				'value'   => $hoy,
				'compare' => '>',
				'type'    => 'DATE',
			);
			$args['meta_key']     = '_np_fecha'; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			$args['orderby']      = 'meta_value';
			$args['order']        = 'ASC';
			break;
		case 'gratuitos':
			$args['meta_query'][] = array(
				'key'     => '_np_precio',
				'value'   => 0,
				'compare' => '=',
				'type'    => 'DECIMAL(10,2)',
			);
			$args['meta_key']     = '_np_ventas'; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			$args['orderby']      = 'meta_value_num';
			$args['order']        = 'DESC';
			break;
		case 'precio_asc':
		case 'precio_desc':
			$args['meta_key'] = '_np_precio_final'; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			$args['orderby']  = 'meta_value_num';
			$args['order']    = 'precio_asc' === $a['criterio'] ? 'ASC' : 'DESC';
			break;
		case 'nombre':
			$args['orderby'] = 'title';
			$args['order']   = 'ASC';
			break;
		case 'lanzamiento':
			$args['meta_key'] = '_np_fecha'; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			$args['orderby']  = 'meta_value';
			$args['order']    = 'DESC';
			break;
		case 'aleatorio':
			$args['orderby'] = 'rand';
			break;
		case 'relevancia':
			if ( $a['busqueda'] ) {
				$args['orderby'] = 'relevance';
				break;
			}
			// Sin búsqueda, la relevancia es la popularidad.
			// no break.
		case 'ventas':
		default:
			$args['meta_key'] = '_np_ventas'; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			$args['orderby']  = 'meta_value_num';
			$args['order']    = 'DESC';
	}
	return new WP_Query( $args );
}

/**
 * Juego de ejemplo para previsualizar bloques de ficha en el Editor del sitio.
 *
 * @param WP_Block|null $block Bloque.
 * @return int ID del juego o 0.
 */
function np_juego_actual( $block = null ) {
	$id = 0;
	if ( $block && ! empty( $block->context['postId'] ) ) {
		$id = (int) $block->context['postId'];
	} elseif ( is_singular( 'juego' ) ) {
		$id = get_the_ID();
	}
	if ( $id && 'juego' === get_post_type( $id ) ) {
		return $id;
	}
	$ultimo = get_posts(
		array(
			'post_type'   => 'juego',
			'numberposts' => 1,
			'fields'      => 'ids',
		)
	);
	return $ultimo ? (int) $ultimo[0] : 0;
}
