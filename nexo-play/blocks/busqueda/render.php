<?php
/**
 * Bloque «Buscador de juegos»: resultados en filas y filtros a la derecha.
 * Lee los filtros de la URL: ?q=…&genero[]=…&modo[]=…&precio=…&oferta=1&orden=…
 *
 * @package Nexo_Play
 * @var array $attributes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:disable WordPress.Security.NonceVerification.Recommended -- formulario de búsqueda público (GET).
$np_get = function ( $clave ) {
	return isset( $_GET[ $clave ] ) ? wp_unslash( $_GET[ $clave ] ) : null; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- se sanea al usarlo.
};
$np_texto   = sanitize_text_field( (string) ( $np_get( 'q' ) ?? get_search_query( false ) ) );
$np_generos = array_map( 'sanitize_title', (array) ( $np_get( 'genero' ) ?? array() ) );
$np_modos   = array_map( 'sanitize_title', (array) ( $np_get( 'modo' ) ?? array() ) );
$np_precio  = $np_get( 'precio' );
$np_precio  = ( null === $np_precio || '' === $np_precio ) ? '' : max( 0, (float) $np_precio );
$np_oferta  = ! empty( $np_get( 'oferta' ) );
$np_sin_gratis = ! empty( $np_get( 'ocultar_gratis' ) );
$np_proximos   = ! empty( $np_get( 'proximos' ) );
$np_ordenes = array(
	'relevancia'  => __( 'Relevancia', 'nexo-play' ),
	'lanzamiento' => __( 'Fecha de lanzamiento', 'nexo-play' ),
	'nombre'      => __( 'Nombre', 'nexo-play' ),
	'precio_asc'  => __( 'Precio más bajo', 'nexo-play' ),
	'precio_desc' => __( 'Precio más alto', 'nexo-play' ),
	'ventas'      => __( 'Más vendidos', 'nexo-play' ),
);
$np_orden = sanitize_key( (string) $np_get( 'orden' ) );
if ( ! isset( $np_ordenes[ $np_orden ] ) ) {
	$np_orden = 'relevancia';
}
$np_pagina = max( 1, absint( $np_get( 'pagina' ) ) );
// phpcs:enable

// En la página de un género o forma de jugar, ese filtro viene marcado.
$np_obj = get_queried_object();
if ( $np_obj instanceof WP_Term ) {
	if ( 'genero' === $np_obj->taxonomy && ! in_array( $np_obj->slug, $np_generos, true ) ) {
		$np_generos[] = $np_obj->slug;
	} elseif ( 'modo_juego' === $np_obj->taxonomy && ! in_array( $np_obj->slug, $np_modos, true ) ) {
		$np_modos[] = $np_obj->slug;
	}
}
$np_etiqueta = ( $np_obj instanceof WP_Term && 'etiqueta_juego' === $np_obj->taxonomy ) ? $np_obj->slug : '';

$np_q = np_consulta(
	array(
		'criterio'   => $np_proximos ? 'proximos' : $np_orden,
		'cantidad'   => (int) $attributes['porPagina'],
		'pagina'     => $np_pagina,
		'busqueda'   => $np_texto,
		'genero'     => $np_generos,
		'modo'       => $np_modos,
		'etiqueta'   => $np_etiqueta,
		'precio_max' => $np_precio,
		'oferta'     => $np_oferta,
		'sin_gratis' => $np_sin_gratis,
	)
);

$np_titulo = $attributes['titulo'];
if ( ! $np_titulo ) {
	if ( $np_texto ) {
		/* translators: %s: texto buscado. */
		$np_titulo = sprintf( __( 'Resultados de «%s»', 'nexo-play' ), $np_texto );
	} elseif ( $np_obj instanceof WP_Term ) {
		$np_titulo = $np_obj->name;
	} elseif ( $np_proximos ) {
		$np_titulo = __( 'Próximos lanzamientos', 'nexo-play' );
	} elseif ( $np_oferta ) {
		$np_titulo = __( 'Ofertas especiales', 'nexo-play' );
	} else {
		$np_titulo = __( 'Todos los productos', 'nexo-play' );
	}
}
$np_accion = get_post_type_archive_link( 'juego' ) ? get_post_type_archive_link( 'juego' ) : home_url( '/' );

$np_lista_terms = function ( $tax, $nombre, $marcados ) {
	$terms = get_terms(
		array(
			'taxonomy'   => $tax,
			'hide_empty' => true,
		)
	);
	if ( is_wp_error( $terms ) ) {
		return '';
	}
	$html = '';
	foreach ( $terms as $t ) {
		$html .= sprintf(
			'<label class="np-filtro__opcion"><input type="checkbox" name="%1$s[]" value="%2$s" %3$s><span>%4$s</span><em>%5$s</em></label>',
			esc_attr( $nombre ),
			esc_attr( $t->slug ),
			checked( in_array( $t->slug, $marcados, true ), true, false ),
			esc_html( $t->name ),
			esc_html( number_format_i18n( $t->count ) )
		);
	}
	return $html;
};
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'np-busqueda' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<h1 class="np-busqueda__titulo"><?php echo esc_html( $np_titulo ); ?></h1>
	<form class="np-busqueda__form" method="get" action="<?php echo esc_url( $np_accion ); ?>" data-np-filtros>
		<?php if ( ! get_option( 'permalink_structure' ) ) : ?>
			<input type="hidden" name="post_type" value="juego">
		<?php endif; ?>
		<?php if ( $np_proximos ) : ?>
			<input type="hidden" name="proximos" value="1">
		<?php endif; ?>
		<div class="np-busqueda__resultados">
			<div class="np-busqueda__barra">
				<input type="search" name="q" value="<?php echo esc_attr( $np_texto ); ?>" placeholder="<?php esc_attr_e( 'escribe términos de búsqueda o etiquetas', 'nexo-play' ); ?>" aria-label="<?php esc_attr_e( 'Buscar', 'nexo-play' ); ?>">
				<button type="submit" class="np-boton-azul-plano"><?php esc_html_e( 'Buscar', 'nexo-play' ); ?></button>
				<label class="np-busqueda__orden"><?php esc_html_e( 'Ordenar por', 'nexo-play' ); ?>
					<select name="orden">
						<?php foreach ( $np_ordenes as $np_k => $np_v ) : ?>
							<option value="<?php echo esc_attr( $np_k ); ?>" <?php selected( $np_orden, $np_k ); ?>><?php echo esc_html( $np_v ); ?></option>
						<?php endforeach; ?>
					</select>
				</label>
			</div>
			<p class="np-busqueda__total">
				<?php
				/* translators: %s: número de resultados. */
				echo esc_html( sprintf( _n( '%s resultado coincide con la búsqueda.', '%s resultados coinciden con la búsqueda.', $np_q->found_posts, 'nexo-play' ), number_format_i18n( $np_q->found_posts ) ) );
				?>
			</p>
			<?php if ( ! $np_q->have_posts() ) : ?>
				<p class="np-vacio"><?php esc_html_e( 'No hay resultados. Prueba con otros términos o quita algún filtro.', 'nexo-play' ); ?></p>
			<?php endif; ?>
			<?php
			foreach ( $np_q->posts as $np_post ) :
				$d = np_datos( $np_post->ID );
				?>
				<a class="np-resultado" href="<?php echo esc_url( $d['url'] ); ?>">
					<img class="np-resultado__img" src="<?php echo esc_url( $d['capsula'] ); ?>" alt="" loading="lazy">
					<span class="np-resultado__titulo"><?php echo esc_html( $d['titulo'] ); ?><?php echo np_plataformas_html( $d ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<span class="np-resultado__fecha"><?php echo esc_html( $d['fecha_texto'] ); ?></span>
					<span class="np-resultado__val np-resultado__val--<?php echo esc_attr( $d['valoracion'] ? $d['val_clase'] : 'sin' ); ?>" title="<?php echo esc_attr( $d['valoracion'] ? $d['valoracion'] . ' (' . number_format_i18n( $d['resenas'] ) . ')' : __( 'Sin reseñas', 'nexo-play' ) ); ?>"></span>
					<?php echo np_precio_html( $d, 'np-resultado__precio' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			<?php endforeach; ?>
			<?php
			$np_paginas = paginate_links(
				array(
					'base'      => esc_url_raw( add_query_arg( 'pagina', '%#%' ) ),
					'format'    => '',
					'current'   => $np_pagina,
					'total'     => $np_q->max_num_pages,
					'prev_text' => '&lt;',
					'next_text' => '&gt;',
				)
			);
			if ( $np_paginas ) {
				echo '<nav class="np-paginacion">' . $np_paginas . '</nav>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</div>
		<aside class="np-busqueda__filtros">
			<div class="np-filtro">
				<h2 class="np-filtro__titulo"><?php esc_html_e( 'Filtrar por precio', 'nexo-play' ); ?></h2>
				<div class="np-filtro__cuerpo">
					<input type="range" min="0" max="70" step="5" value="<?php echo esc_attr( '' === $np_precio ? 70 : $np_precio ); ?>" data-np-rango aria-label="<?php esc_attr_e( 'Precio máximo', 'nexo-play' ); ?>">
					<input type="hidden" name="precio" value="<?php echo esc_attr( $np_precio ); ?>" data-np-precio>
					<p class="np-filtro__rango" data-np-rango-texto><?php echo esc_html( '' === $np_precio ? __( 'Cualquier precio', 'nexo-play' ) : ( 0.0 === (float) $np_precio ? __( 'Gratuito', 'nexo-play' ) : sprintf( /* translators: %s: precio. */ __( 'Menos de %s', 'nexo-play' ), np_dinero( $np_precio ) ) ) ); ?></p>
					<label class="np-filtro__opcion"><input type="checkbox" name="oferta" value="1" <?php checked( $np_oferta ); ?>><span><?php esc_html_e( 'Ofertas especiales', 'nexo-play' ); ?></span></label>
					<label class="np-filtro__opcion"><input type="checkbox" name="ocultar_gratis" value="1" <?php checked( $np_sin_gratis ); ?>><span><?php esc_html_e( 'Ocultar juegos gratuitos', 'nexo-play' ); ?></span></label>
				</div>
			</div>
			<div class="np-filtro">
				<h2 class="np-filtro__titulo"><?php esc_html_e( 'Filtrar por género', 'nexo-play' ); ?></h2>
				<div class="np-filtro__cuerpo"><?php echo $np_lista_terms( 'genero', 'genero', $np_generos ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
			</div>
			<div class="np-filtro">
				<h2 class="np-filtro__titulo"><?php esc_html_e( 'Formas de jugar', 'nexo-play' ); ?></h2>
				<div class="np-filtro__cuerpo"><?php echo $np_lista_terms( 'modo_juego', 'modo', $np_modos ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
			</div>
			<noscript><button type="submit" class="np-boton-azul-plano"><?php esc_html_e( 'Aplicar filtros', 'nexo-play' ); ?></button></noscript>
		</aside>
	</form>
</div>
