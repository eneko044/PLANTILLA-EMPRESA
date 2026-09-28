<?php
/**
 * Primeros pasos + importador de contenido de demostración.
 *
 * Con un clic crea las páginas (Inicio, Servicios, Nosotros, Precios,
 * Contacto y Blog) montadas con las secciones del tema, tres entradas de
 * ejemplo con imagen destacada y el menú principal.
 *
 * @package Nexo_Empresa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Página «Apariencia › Nexo: primeros pasos».
 */
function nexo_menu_primeros_pasos() {
	add_theme_page(
		__( 'Nexo: primeros pasos', 'nexo-empresa' ),
		__( 'Nexo: primeros pasos', 'nexo-empresa' ),
		'edit_theme_options',
		'nexo-primeros-pasos',
		'nexo_pagina_primeros_pasos'
	);
}
add_action( 'admin_menu', 'nexo_menu_primeros_pasos' );

/**
 * Aviso tras activar el tema.
 */
function nexo_aviso_activacion() {
	if ( ! current_user_can( 'edit_theme_options' ) || get_option( 'nexo_demo_importada' ) || get_option( 'nexo_aviso_descartado' ) ) {
		return;
	}
	$pantalla = get_current_screen();
	if ( $pantalla && 'appearance_page_nexo-primeros-pasos' === $pantalla->id ) {
		return;
	}
	$descartar = wp_nonce_url( admin_url( 'admin-post.php?action=nexo_descartar_aviso' ), 'nexo_descartar_aviso' );
	printf(
		'<div class="notice notice-info"><p><strong>%1$s</strong> %2$s</p><p><a class="button button-primary" href="%3$s">%4$s</a> <a class="button-link" href="%5$s">%6$s</a></p></div>',
		esc_html__( 'Nexo Empresa está activo.', 'nexo-empresa' ),
		esc_html__( '¿Quieres crear en un clic las páginas de ejemplo (Inicio, Servicios, Nosotros, Precios, Contacto y Blog) para empezar a editarlas?', 'nexo-empresa' ),
		esc_url( admin_url( 'themes.php?page=nexo-primeros-pasos' ) ),
		esc_html__( 'Ver primeros pasos', 'nexo-empresa' ),
		esc_url( $descartar ),
		esc_html__( 'No, gracias', 'nexo-empresa' )
	);
}
add_action( 'admin_notices', 'nexo_aviso_activacion' );

/**
 * Descarta el aviso.
 */
function nexo_descartar_aviso() {
	check_admin_referer( 'nexo_descartar_aviso' );
	if ( current_user_can( 'edit_theme_options' ) ) {
		update_option( 'nexo_aviso_descartado', 1 );
	}
	wp_safe_redirect( wp_get_referer() ? wp_get_referer() : admin_url() );
	exit;
}
add_action( 'admin_post_nexo_descartar_aviso', 'nexo_descartar_aviso' );

/**
 * Contenido de la página de primeros pasos.
 */
function nexo_pagina_primeros_pasos() {
	$importada = get_option( 'nexo_demo_importada' );
	$url       = wp_nonce_url( admin_url( 'admin-post.php?action=nexo_importar_demo' ), 'nexo_importar_demo' );
	?>
	<div class="wrap" style="max-width:860px">
		<h1><?php esc_html_e( 'Nexo Empresa: primeros pasos', 'nexo-empresa' ); ?></h1>

		<?php if ( isset( $_GET['importado'] ) ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
			<div class="notice notice-success"><p><?php esc_html_e( '¡Listo! Se han creado las páginas, las entradas de ejemplo y el menú.', 'nexo-empresa' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Ver la web', 'nexo-empresa' ); ?></a></p></div>
		<?php endif; ?>

		<div class="card" style="max-width:none">
			<h2>1. <?php esc_html_e( 'Crea el contenido de ejemplo', 'nexo-empresa' ); ?></h2>
			<p><?php esc_html_e( 'Crea las páginas Inicio, Servicios, Nosotros, Precios, Contacto y Blog ya maquetadas, tres entradas de ejemplo y el menú principal. También configura «Inicio» como portada. No borra nada de lo que ya tengas.', 'nexo-empresa' ); ?></p>
			<p>
				<a class="button button-primary button-hero" href="<?php echo esc_url( $url ); ?>">
					<?php $importada ? esc_html_e( 'Volver a crear las páginas que falten', 'nexo-empresa' ) : esc_html_e( 'Crear contenido de ejemplo', 'nexo-empresa' ); ?>
				</a>
			</p>
		</div>

		<div class="card" style="max-width:none">
			<h2>2. <?php esc_html_e( 'Pon tu marca', 'nexo-empresa' ); ?></h2>
			<ol>
				<li><?php echo wp_kses_post( sprintf( __( 'Ve a <a href="%s">Apariencia › Editor › Estilos</a> y elige una de las 6 combinaciones de color, o cambia cada color y tipografía a mano.', 'nexo-empresa' ), esc_url( admin_url( 'site-editor.php?p=%2Fstyles' ) ) ) ); ?></li>
				<li><?php echo wp_kses_post( sprintf( __( 'En <a href="%s">Apariencia › Editor › Patrones › Cabecera</a> sube tu logotipo y cambia el botón de la cabecera.', 'nexo-empresa' ), esc_url( admin_url( 'site-editor.php?p=%2Fpattern&postType=wp_template_part&categoryId=header' ) ) ) ); ?></li>
				<li><?php echo wp_kses_post( sprintf( __( 'En <a href="%s">Ajustes › Generales</a> escribe el nombre de tu empresa y su lema.', 'nexo-empresa' ), esc_url( admin_url( 'options-general.php' ) ) ) ); ?></li>
			</ol>
		</div>

		<div class="card" style="max-width:none">
			<h2>3. <?php esc_html_e( 'Monta tus páginas con secciones', 'nexo-empresa' ); ?></h2>
			<p><?php esc_html_e( 'Abre cualquier página, pulsa el botón azul «+» (arriba a la izquierda) y entra en la pestaña «Patrones». Las categorías que empiezan por «Nexo ·» contienen 28 secciones listas: arrástralas, cambia textos e imágenes y reordénalas con las flechas.', 'nexo-empresa' ); ?></p>
			<p><?php esc_html_e( 'Selecciona cualquier bloque y, en la barra lateral, abre «Animación y visibilidad» para añadir efectos al hacer scroll u ocultarlo en móvil, tableta u ordenador.', 'nexo-empresa' ); ?></p>
		</div>

		<div class="card" style="max-width:none">
			<h2>4. <?php esc_html_e( '¿Prefieres Elementor?', 'nexo-empresa' ); ?></h2>
			<p><?php esc_html_e( 'Instala el plugin gratuito Elementor. En la página que quieras editar con él, elige la plantilla «Ancho completo (Elementor y maquetadores)» para conservar la cabecera y el pie del tema, o «Lienzo en blanco» para diseñar la página entera desde cero.', 'nexo-empresa' ); ?></p>
		</div>
	</div>
	<?php
}

/**
 * Contenido (marcado de bloques) de una sección registrada, con las
 * secciones anidadas (<!-- wp:pattern {"slug":"…"} /-->) ya resueltas.
 *
 * @param string $slug        Slug del patrón.
 * @param int    $profundidad Evita bucles infinitos.
 * @return string
 */
function nexo_contenido_patron( $slug, $profundidad = 0 ) {
	$patron = WP_Block_Patterns_Registry::get_instance()->get_registered( $slug );
	if ( ! $patron || $profundidad > 5 ) {
		return '';
	}
	return preg_replace_callback(
		'/<!-- wp:pattern \{"slug":"([^"]+)"\} \/-->/',
		function ( $m ) use ( $profundidad ) {
			return nexo_contenido_patron( $m[1], $profundidad + 1 );
		},
		$patron['content']
	);
}

/**
 * Copia una imagen del tema a la biblioteca de medios.
 *
 * @param string $archivo Nombre dentro de assets/images.
 * @param string $titulo  Título del adjunto.
 * @return int ID del adjunto o 0.
 */
function nexo_importar_imagen( $archivo, $titulo ) {
	$existente = get_posts(
		array(
			'post_type'   => 'attachment',
			'meta_key'    => '_nexo_demo_archivo', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			'meta_value'  => $archivo, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
			'numberposts' => 1,
			'fields'      => 'ids',
		)
	);
	if ( $existente ) {
		return (int) $existente[0];
	}

	$ruta = NEXO_DIR . '/assets/images/' . $archivo;
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
	require_once ABSPATH . 'wp-admin/includes/image.php';
	wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $subida['file'] ) );
	update_post_meta( $id, '_nexo_demo_archivo', $archivo );
	update_post_meta( $id, '_wp_attachment_image_alt', $titulo );
	return (int) $id;
}

/**
 * Crea (o reutiliza) una página de demostración.
 *
 * @param string $clave     Identificador interno.
 * @param string $titulo    Título de la página.
 * @param string $patron    Slug del patrón de página ('' para vacía).
 * @param int    $orden     Orden en el menú.
 * @param string $plantilla Plantilla a usar.
 * @return int
 */
function nexo_crear_pagina( $clave, $titulo, $patron, $orden, $plantilla = 'pagina-secciones' ) {
	$existente = get_posts(
		array(
			'post_type'   => 'page',
			'post_status' => array( 'publish', 'draft', 'private' ),
			'meta_key'    => '_nexo_demo', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			'meta_value'  => $clave, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
			'numberposts' => 1,
			'fields'      => 'ids',
		)
	);
	if ( $existente ) {
		return (int) $existente[0];
	}
	$id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => $titulo,
			'post_content' => $patron ? wp_slash( nexo_contenido_patron( $patron ) ) : '',
			'menu_order'   => $orden,
			'meta_input'   => array( '_nexo_demo' => $clave ),
		)
	);
	if ( $id && ! is_wp_error( $id ) && $plantilla ) {
		update_post_meta( $id, '_wp_page_template', $plantilla );
	}
	return is_wp_error( $id ) ? 0 : (int) $id;
}

/**
 * Importa todo el contenido de ejemplo.
 */
function nexo_importar_demo() {
	check_admin_referer( 'nexo_importar_demo' );
	if ( ! current_user_can( 'edit_theme_options' ) || ! current_user_can( 'publish_pages' ) ) {
		wp_die( esc_html__( 'No tienes permisos para hacer esto.', 'nexo-empresa' ) );
	}

	$paginas = array(
		'inicio'    => nexo_crear_pagina( 'inicio', __( 'Inicio', 'nexo-empresa' ), 'nexo-empresa/pagina-inicio', 0 ),
		'servicios' => nexo_crear_pagina( 'servicios', __( 'Servicios', 'nexo-empresa' ), 'nexo-empresa/pagina-servicios', 1 ),
		'nosotros'  => nexo_crear_pagina( 'nosotros', __( 'Nosotros', 'nexo-empresa' ), 'nexo-empresa/pagina-nosotros', 2 ),
		'precios'   => nexo_crear_pagina( 'precios', __( 'Precios', 'nexo-empresa' ), 'nexo-empresa/pagina-precios', 3 ),
		'blog'      => nexo_crear_pagina( 'blog', __( 'Blog', 'nexo-empresa' ), '', 4, '' ),
		'contacto'  => nexo_crear_pagina( 'contacto', __( 'Contacto', 'nexo-empresa' ), 'nexo-empresa/pagina-contacto', 5 ),
	);

	// Portada estática y página del blog.
	if ( $paginas['inicio'] && $paginas['blog'] ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $paginas['inicio'] );
		update_option( 'page_for_posts', $paginas['blog'] );
	}

	// Entradas de ejemplo con imagen destacada.
	$entradas = array(
		array( 'nexo-entrada-1', __( '5 claves para lanzar tu empresa con buen pie', 'nexo-empresa' ), 'trabajo-portatil.jpg', __( 'Consejos', 'nexo-empresa' ) ),
		array( 'nexo-entrada-2', __( 'Cómo trabajamos: así es nuestro proceso', 'nexo-empresa' ), 'equipo-reunion.jpg', __( 'Empresa', 'nexo-empresa' ) ),
		array( 'nexo-entrada-3', __( 'Tendencias de diseño y tecnología para este año', 'nexo-empresa' ), 'escritorio.jpg', __( 'Tendencias', 'nexo-empresa' ) ),
	);
	$texto = '<!-- wp:paragraph {"className":"is-style-destacado"} --><p class="is-style-destacado">' . esc_html__( 'Esta es una entrada de ejemplo. Edítala o bórrala y empieza a escribir las noticias, consejos y novedades de tu empresa.', 'nexo-empresa' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:heading --><h2 class="wp-block-heading">' . esc_html__( 'Un buen punto de partida', 'nexo-empresa' ) . '</h2><!-- /wp:heading -->'
		. '<!-- wp:paragraph --><p>' . esc_html__( 'Publicar con regularidad ayuda a que te encuentren en Google y demuestra a tus clientes que sabes de lo que hablas. Usa títulos claros, párrafos cortos e imágenes que acompañen al texto.', 'nexo-empresa' ) . '</p><!-- /wp:paragraph -->'
		. '<!-- wp:list {"className":"is-style-check"} --><ul class="wp-block-list is-style-check"><!-- wp:list-item --><li>' . esc_html__( 'Cuenta qué problema resuelves.', 'nexo-empresa' ) . '</li><!-- /wp:list-item --><!-- wp:list-item --><li>' . esc_html__( 'Enseña casos reales y resultados.', 'nexo-empresa' ) . '</li><!-- /wp:list-item --><!-- wp:list-item --><li>' . esc_html__( 'Termina siempre con una llamada a la acción.', 'nexo-empresa' ) . '</li><!-- /wp:list-item --></ul><!-- /wp:list -->'
		. '<!-- wp:quote --><blockquote class="wp-block-quote"><!-- wp:paragraph --><p>' . esc_html__( 'La calidad nunca es un accidente; siempre es el resultado de un esfuerzo inteligente.', 'nexo-empresa' ) . '</p><!-- /wp:paragraph --><cite>John Ruskin</cite></blockquote><!-- /wp:quote -->'
		. '<!-- wp:paragraph --><p>' . esc_html__( 'Si tienes dudas, escríbenos desde la página de contacto. Estaremos encantados de ayudarte.', 'nexo-empresa' ) . '</p><!-- /wp:paragraph -->';

	foreach ( $entradas as $i => $e ) {
		$existe = get_posts(
			array(
				'post_type'   => 'post',
				'meta_key'    => '_nexo_demo', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
				'meta_value'  => $e[0], // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
				'numberposts' => 1,
				'fields'      => 'ids',
			)
		);
		if ( $existe ) {
			continue;
		}
		$cat = term_exists( $e[3], 'category' );
		if ( ! $cat ) {
			$cat = wp_insert_term( $e[3], 'category' );
		}
		$id = wp_insert_post(
			array(
				'post_type'     => 'post',
				'post_status'   => 'publish',
				'post_title'    => $e[1],
				'post_excerpt'  => __( 'Una entrada de ejemplo para ver cómo luce el blog. Cámbiala por tus propias noticias y consejos.', 'nexo-empresa' ),
				'post_content'  => wp_slash( $texto ),
				'post_date'     => gmdate( 'Y-m-d H:i:s', time() - ( $i + 1 ) * 3 * DAY_IN_SECONDS ),
				'post_category' => is_wp_error( $cat ) ? array() : array( (int) $cat['term_id'] ),
				'meta_input'    => array( '_nexo_demo' => $e[0] ),
			)
		);
		if ( $id && ! is_wp_error( $id ) ) {
			$imagen = nexo_importar_imagen( $e[2], $e[1] );
			if ( $imagen ) {
				set_post_thumbnail( $id, $imagen );
			}
		}
	}

	// Menú principal (lo usa automáticamente el bloque Navegación de la cabecera).
	$menu = get_posts(
		array(
			'post_type'   => 'wp_navigation',
			'meta_key'    => '_nexo_demo', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			'meta_value'  => 'menu-principal', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
			'numberposts' => 1,
			'fields'      => 'ids',
		)
	);
	if ( ! $menu ) {
		$enlaces = '';
		foreach ( array( 'inicio', 'servicios', 'nosotros', 'precios', 'blog', 'contacto' ) as $clave ) {
			if ( ! $paginas[ $clave ] ) {
				continue;
			}
			$enlaces .= sprintf(
				'<!-- wp:navigation-link {"label":"%1$s","type":"page","id":%2$d,"url":"%3$s","kind":"post-type"} /-->',
				esc_attr( get_the_title( $paginas[ $clave ] ) ),
				$paginas[ $clave ],
				esc_url( get_permalink( $paginas[ $clave ] ) )
			);
		}
		wp_insert_post(
			array(
				'post_type'    => 'wp_navigation',
				'post_status'  => 'publish',
				'post_title'   => __( 'Menú principal', 'nexo-empresa' ),
				'post_content' => wp_slash( $enlaces ),
				'meta_input'   => array( '_nexo_demo' => 'menu-principal' ),
			)
		);
	}

	update_option( 'nexo_demo_importada', 1 );
	wp_safe_redirect( admin_url( 'themes.php?page=nexo-primeros-pasos&importado=1' ) );
	exit;
}
add_action( 'admin_post_nexo_importar_demo', 'nexo_importar_demo' );
