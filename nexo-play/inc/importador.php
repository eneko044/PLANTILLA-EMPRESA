<?php
/**
 * Primeros pasos + importador de la tienda de ejemplo (16 juegos ficticios,
 * páginas Tienda, Comunidad, Acerca de, Soporte y Noticias).
 *
 * @package Nexo_Play
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Menú «Apariencia › Nexo Play: primeros pasos».
 */
function np_menu_primeros_pasos() {
	add_theme_page( __( 'Nexo Play: primeros pasos', 'nexo-play' ), __( 'Nexo Play: primeros pasos', 'nexo-play' ), 'edit_theme_options', 'np-primeros-pasos', 'np_pagina_primeros_pasos' );
}
add_action( 'admin_menu', 'np_menu_primeros_pasos' );

/**
 * Aviso tras activar el tema.
 */
function np_aviso() {
	if ( ! current_user_can( 'edit_theme_options' ) || get_option( 'np_demo_importada' ) ) {
		return;
	}
	$pantalla = get_current_screen();
	if ( $pantalla && 'appearance_page_np-primeros-pasos' === $pantalla->id ) {
		return;
	}
	printf(
		'<div class="notice notice-info"><p><strong>%1$s</strong> %2$s</p><p><a class="button button-primary" href="%3$s">%4$s</a></p></div>',
		esc_html__( 'Nexo Play está activo.', 'nexo-play' ),
		esc_html__( 'Crea en un clic la tienda de ejemplo con 16 juegos, sus imágenes y todas las páginas.', 'nexo-play' ),
		esc_url( admin_url( 'themes.php?page=np-primeros-pasos' ) ),
		esc_html__( 'Ver primeros pasos', 'nexo-play' )
	);
}
add_action( 'admin_notices', 'np_aviso' );

/**
 * Página de primeros pasos.
 */
function np_pagina_primeros_pasos() {
	?>
	<div class="wrap" style="max-width:860px">
		<h1><?php esc_html_e( 'Nexo Play: primeros pasos', 'nexo-play' ); ?></h1>
		<?php if ( isset( $_GET['importado'] ) ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
			<div class="notice notice-success"><p><?php esc_html_e( '¡Tienda creada! Ya tienes los juegos, las páginas y la portada configurada.', 'nexo-play' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Ver la tienda', 'nexo-play' ); ?></a></p></div>
		<?php endif; ?>
		<div class="card" style="max-width:none">
			<h2>1. <?php esc_html_e( 'Crea la tienda de ejemplo', 'nexo-play' ); ?></h2>
			<p><?php esc_html_e( 'Crea 16 juegos ficticios con portadas, capturas, precios, ofertas y géneros; las páginas Tienda, Comunidad, Acerca de, Soporte y Noticias; tres noticias, y pone la Tienda como portada. No borra nada de lo que ya tengas. Puede tardar un minuto.', 'nexo-play' ); ?></p>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="np_importar">
				<?php wp_nonce_field( 'np_importar' ); ?>
				<p><label><input type="checkbox" name="np_nombre" value="1" checked> <?php esc_html_e( 'Poner «Nexo Play» como nombre del sitio (puedes cambiarlo luego en Ajustes › Generales)', 'nexo-play' ); ?></label></p>
				<p><button class="button button-primary button-hero" type="submit"><?php get_option( 'np_demo_importada' ) ? esc_html_e( 'Volver a crear lo que falte', 'nexo-play' ) : esc_html_e( 'Crear la tienda de ejemplo', 'nexo-play' ); ?></button></p>
			</form>
		</div>
		<div class="card" style="max-width:none">
			<h2>2. <?php esc_html_e( 'Añade tus propios juegos o productos', 'nexo-play' ); ?></h2>
			<p><?php echo wp_kses_post( sprintf( __( 'En <a href="%s">Juegos › Añadir juego</a>: escribe el título y la descripción, elige la «Imagen destacada» (portada horizontal) y rellena la caja «Datos del juego» con precio, descuento, fecha, capturas… La tienda se actualiza sola.', 'nexo-play' ), esc_url( admin_url( 'post-new.php?post_type=juego' ) ) ) ); ?></p>
		</div>
		<div class="card" style="max-width:none">
			<h2>3. <?php esc_html_e( 'Edita la portada y los menús', 'nexo-play' ); ?></h2>
			<p><?php esc_html_e( 'Abre Páginas › Tienda para mover, quitar o añadir secciones (botón «+» › Bloques › «Nexo Play · Tienda»). Cada sección tiene ajustes en la barra lateral: título, número de juegos, género, precio máximo…', 'nexo-play' ); ?></p>
			<p><?php esc_html_e( 'La cabecera, el menú y el pie se editan en Apariencia › Editor › Patrones › Partes de la plantilla.', 'nexo-play' ); ?></p>
		</div>
	</div>
	<?php
}

/**
 * Contenido de un patrón con los patrones anidados ya resueltos.
 *
 * @param string $slug        Patrón.
 * @param int    $profundidad Límite.
 * @return string
 */
function np_contenido_patron( $slug, $profundidad = 0 ) {
	$p = WP_Block_Patterns_Registry::get_instance()->get_registered( $slug );
	if ( ! $p || $profundidad > 5 ) {
		return '';
	}
	return preg_replace_callback(
		'/<!-- wp:pattern \{"slug":"([^"]+)"\} \/-->/',
		function ( $m ) use ( $profundidad ) {
			return np_contenido_patron( $m[1], $profundidad + 1 );
		},
		$p['content']
	);
}

/**
 * Copia una imagen del tema a la biblioteca de medios (una sola vez).
 *
 * @param string $archivo Nombre en assets/demo.
 * @param string $titulo  Título / texto alternativo.
 * @return int
 */
function np_importar_imagen( $archivo, $titulo ) {
	$existe = get_posts(
		array(
			'post_type'   => 'attachment',
			'post_status' => 'inherit',
			'meta_key'    => '_np_demo_archivo', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			'meta_value'  => $archivo, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
			'numberposts' => 1,
			'fields'      => 'ids',
		)
	);
	if ( $existe ) {
		return (int) $existe[0];
	}
	$ruta = NP_DIR . '/assets/demo/' . $archivo;
	if ( ! file_exists( $ruta ) ) {
		return 0;
	}
	$subida = wp_upload_bits( $archivo, null, file_get_contents( $ruta ) ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	if ( ! empty( $subida['error'] ) ) {
		return 0;
	}
	$id = wp_insert_attachment(
		array(
			'post_title'     => $titulo,
			'post_mime_type' => 'image/jpeg',
			'post_status'    => 'inherit',
		),
		$subida['file']
	);
	if ( ! $id || is_wp_error( $id ) ) {
		return 0;
	}
	wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $subida['file'] ) );
	update_post_meta( $id, '_np_demo_archivo', $archivo );
	update_post_meta( $id, '_wp_attachment_image_alt', $titulo );
	return (int) $id;
}

/**
 * Durante la importación solo se generan los tamaños que usa el tema.
 *
 * @param array $tamanos Tamaños.
 * @return array
 */
function np_tamanos_importacion( $tamanos ) {
	return array_intersect_key( $tamanos, array_flip( array( 'thumbnail', 'medium', 'medium_large', 'large', 'np-capsula' ) ) );
}

/**
 * Busca un contenido creado por el importador.
 *
 * @param string $tipo  Tipo de contenido.
 * @param string $clave Clave.
 * @return int
 */
function np_buscar_demo( $tipo, $clave ) {
	$ids = get_posts(
		array(
			'post_type'   => $tipo,
			'post_status' => array( 'publish', 'draft', 'private', 'future' ),
			'meta_key'    => '_np_demo', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			'meta_value'  => $clave, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
			'numberposts' => 1,
			'fields'      => 'ids',
		)
	);
	return $ids ? (int) $ids[0] : 0;
}

/**
 * Importa la tienda de ejemplo.
 */
function np_importar() {
	check_admin_referer( 'np_importar' );
	if ( ! current_user_can( 'edit_theme_options' ) || ! current_user_can( 'publish_pages' ) || ! current_user_can( 'upload_files' ) ) {
		wp_die( esc_html__( 'No tienes permisos para hacer esto.', 'nexo-play' ) );
	}
	if ( function_exists( 'set_time_limit' ) ) {
		set_time_limit( 600 ); // phpcs:ignore Squiz.PHP.DiscouragedFunctions.Discouraged
	}
	require_once ABSPATH . 'wp-admin/includes/image.php';
	add_filter( 'intermediate_image_sizes_advanced', 'np_tamanos_importacion' );

	$datos = json_decode( file_get_contents( NP_DIR . '/inc/demo-juegos.json' ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

	// 1. Géneros con su color.
	foreach ( $datos['colores'] as $nombre => $color ) {
		$t = term_exists( $nombre, 'genero' );
		if ( ! $t ) {
			$t = wp_insert_term( $nombre, 'genero' );
		}
		if ( ! is_wp_error( $t ) ) {
			update_term_meta( (int) $t['term_id'], '_np_color', $color );
		}
	}

	// 2. Juegos.
	foreach ( $datos['juegos'] as $orden => $j ) {
		if ( np_buscar_demo( 'juego', $j['slug'] ) ) {
			continue;
		}
		$id = wp_insert_post(
			array(
				'post_type'    => 'juego',
				'post_status'  => 'publish',
				'post_title'   => $j['titulo'],
				'post_name'    => $j['slug'],
				'post_excerpt' => $j['corta'],
				'post_content' => wp_slash( $j['contenido'] ),
				'menu_order'   => $orden,
				'meta_input'   => array( '_np_demo' => $j['slug'] ),
			)
		);
		if ( ! $id || is_wp_error( $id ) ) {
			continue;
		}
		wp_set_object_terms( $id, $j['generos'], 'genero' );
		wp_set_object_terms( $id, $j['etiquetas'], 'etiqueta_juego' );
		wp_set_object_terms( $id, $j['modos'], 'modo_juego' );
		$meta = array(
			'precio'         => $j['precio'],
			'descuento'      => $j['descuento'],
			'oferta'         => $j['oferta'],
			'fecha'          => $j['fecha'],
			'desarrollador'  => $j['desarrollador'],
			'editor'         => $j['editor'],
			'valoracion'     => $j['valoracion'],
			'resenas'        => $j['resenas'],
			'ventas'         => $j['ventas'],
			'destacado'      => $j['destacado'] ? '1' : '',
			'plataformas'    => $j['plataformas'],
			'requisitos_min' => $j['requisitos_min'],
			'requisitos_rec' => $j['requisitos_rec'],
		);
		foreach ( $meta as $k => $v ) {
			if ( '' !== $v && null !== $v ) {
				update_post_meta( $id, '_np_' . $k, $v );
			}
		}
		np_actualizar_precio_final( $id );

		$cabecera = np_importar_imagen( $j['slug'] . '-cabecera.jpg', $j['titulo'] );
		if ( $cabecera ) {
			set_post_thumbnail( $id, $cabecera );
		}
		$vertical = np_importar_imagen( $j['slug'] . '-vertical.jpg', $j['titulo'] );
		if ( $vertical ) {
			update_post_meta( $id, '_np_vertical', $vertical );
		}
		$capturas = array();
		for ( $n = 1; $n <= 4; $n++ ) {
			/* translators: 1: juego, 2: número. */
			$c = np_importar_imagen( $j['slug'] . '-captura-' . $n . '.jpg', sprintf( __( '%1$s: captura %2$d', 'nexo-play' ), $j['titulo'], $n ) );
			if ( $c ) {
				$capturas[] = $c;
			}
		}
		update_post_meta( $id, '_np_capturas', implode( ',', $capturas ) );
	}

	// 3. Páginas (primero vacías para que los enlaces entre ellas funcionen).
	$paginas = array(
		'tienda'    => array( __( 'Tienda', 'nexo-play' ), 'nexo-play/pagina-tienda', 'pagina-tienda' ),
		'comunidad' => array( __( 'Comunidad', 'nexo-play' ), 'nexo-play/pagina-comunidad', 'pagina-tienda' ),
		'acerca-de' => array( __( 'Acerca de', 'nexo-play' ), 'nexo-play/pagina-acerca-de', 'pagina-tienda' ),
		'soporte'   => array( __( 'Soporte', 'nexo-play' ), 'nexo-play/pagina-soporte', 'pagina-tienda' ),
		'noticias'  => array( __( 'Noticias', 'nexo-play' ), '', '' ),
	);
	$nuevas = array();
	foreach ( $paginas as $clave => $p ) {
		if ( np_buscar_demo( 'page', $clave ) ) {
			continue;
		}
		$id = wp_insert_post(
			array(
				'post_type'   => 'page',
				'post_status' => 'publish',
				'post_title'  => $p[0],
				'meta_input'  => array( '_np_demo' => $clave ),
			)
		);
		if ( $id && ! is_wp_error( $id ) ) {
			$nuevas[ $clave ] = $id;
			if ( $p[2] ) {
				update_post_meta( $id, '_wp_page_template', $p[2] );
			}
		}
	}
	foreach ( $nuevas as $clave => $id ) {
		if ( $paginas[ $clave ][1] ) {
			wp_update_post(
				array(
					'ID'           => $id,
					'post_content' => wp_slash( np_contenido_patron( $paginas[ $clave ][1] ) ),
				)
			);
		}
	}
	$tienda   = np_buscar_demo( 'page', 'tienda' );
	$noticias = np_buscar_demo( 'page', 'noticias' );
	if ( $tienda && $noticias ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $tienda );
		update_option( 'page_for_posts', $noticias );
	}

	// 4. Noticias.
	$posts = array(
		array( 'np-noticia-1', __( 'Reinos de Ceniza ya se puede reservar', 'nexo-play' ), 'reinos-de-ceniza-captura-2.jpg', __( 'El esperado juego de rol de Forja Carmesí llega el 24 de octubre. Resérvalo ahora y consigue la armadura de ceniza como regalo.', 'nexo-play' ) ),
		array( 'np-noticia-2', __( 'Empiezan las ofertas de otoño: hasta un 60 % de descuento', 'nexo-play' ), 'pabellon-9-captura-1.jpg', __( 'Durante dos semanas, cientos de juegos rebajados. Consulta la sección de ofertas especiales de la tienda.', 'nexo-play' ) ),
		array( 'np-noticia-3', __( 'Tormenta de Acero estrena su temporada 4', 'nexo-play' ), 'tormenta-de-acero-captura-1.jpg', __( 'Nuevo mapa, dos modos de juego y un pase de temporada gratuito para todos los jugadores.', 'nexo-play' ) ),
	);
	foreach ( $posts as $i => $p ) {
		if ( np_buscar_demo( 'post', $p[0] ) ) {
			continue;
		}
		$id = wp_insert_post(
			array(
				'post_type'    => 'post',
				'post_status'  => 'publish',
				'post_title'   => $p[1],
				'post_excerpt' => $p[3],
				'post_content' => wp_slash( '<!-- wp:paragraph --><p>' . esc_html( $p[3] ) . '</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>' . esc_html__( 'Esta es una noticia de ejemplo del tema Nexo Play. Edítala o bórrala desde Entradas en el escritorio de WordPress.', 'nexo-play' ) . '</p><!-- /wp:paragraph -->' ),
				'post_date'    => gmdate( 'Y-m-d H:i:s', time() - ( $i + 1 ) * 2 * DAY_IN_SECONDS ),
				'meta_input'   => array( '_np_demo' => $p[0] ),
			)
		);
		if ( $id && ! is_wp_error( $id ) ) {
			$img = np_importar_imagen( $p[2], $p[1] );
			if ( $img ) {
				set_post_thumbnail( $id, $img );
			}
		}
	}

	if ( ! empty( $_POST['np_nombre'] ) ) {
		update_option( 'blogname', 'Nexo Play' );
	}
	remove_filter( 'intermediate_image_sizes_advanced', 'np_tamanos_importacion' );
	flush_rewrite_rules();
	update_option( 'np_demo_importada', 1 );
	wp_safe_redirect( admin_url( 'themes.php?page=np-primeros-pasos&importado=1' ) );
	exit;
}
add_action( 'admin_post_np_importar', 'np_importar' );
