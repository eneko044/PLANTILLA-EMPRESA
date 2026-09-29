<?php
/**
 * Bloque «Estantería de juegos»: carrusel de 4 en 4 o panel de 2 × 2.
 *
 * @package Nexo_Play
 * @var array    $attributes
 * @var WP_Block $block
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$np_args = array(
	'criterio' => $attributes['criterio'],
	'cantidad' => (int) $attributes['cantidad'],
	'genero'   => $attributes['genero'],
);
if ( '' !== trim( (string) $attributes['precioMax'] ) ) {
	$np_args['precio_max'] = (float) str_replace( ',', '.', $attributes['precioMax'] );
	$np_args['sin_gratis'] = true;
}
// En la ficha de un juego: otros juegos de su mismo género.
if ( ! empty( $attributes['mismoGenero'] ) ) {
	$np_actual = np_juego_actual( $block );
	if ( $np_actual ) {
		$np_d = np_datos( $np_actual );
		if ( $np_d['generos'] ) {
			$np_args['genero'] = wp_list_pluck( $np_d['generos'], 'slug' );
		}
		$np_args['excluir'] = array( $np_actual );
	}
}
$np_q = np_consulta( $np_args );

// Botón «Ver más» con los mismos filtros.
$np_filtros = array( 'orden' => $attributes['criterio'] );
if ( 'ofertas' === $attributes['criterio'] ) {
	$np_filtros = array( 'oferta' => 1 );
} elseif ( 'proximos' === $attributes['criterio'] ) {
	$np_filtros = array( 'proximos' => 1 );
} elseif ( 'gratuitos' === $attributes['criterio'] ) {
	$np_filtros = array( 'precio' => 0 );
}
if ( is_string( $np_args['genero'] ) && $np_args['genero'] ) {
	$np_filtros['genero'] = array( $np_args['genero'] );
}
if ( isset( $np_args['precio_max'] ) ) {
	$np_filtros['precio'] = $np_args['precio_max'];
}
$np_ver = np_url_juegos( $np_filtros );
$np_panel = 'panel' === $attributes['diseno'];

$np_clases = 'np-seccion np-estanteria np-estanteria--' . ( $np_panel ? 'panel' : 'carrusel' );
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => $np_clases ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php if ( $np_panel ) : ?>
		<div class="np-seccion__cabecera np-seccion__cabecera--panel">
			<h2 class="np-seccion__titulo np-seccion__titulo--mayus"><?php echo esc_html( $attributes['titulo'] ); ?></h2>
			<?php if ( $attributes['subtitulo'] ) : ?>
				<p class="np-seccion__subtitulo"><?php echo esc_html( $attributes['subtitulo'] ); ?></p>
			<?php endif; ?>
		</div>
		<?php if ( ! $np_q->have_posts() ) : ?>
			<?php echo np_sin_juegos(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php else : ?>
			<div class="np-estanteria__panel">
				<?php
				foreach ( array_slice( $np_q->posts, 0, 4 ) as $np_post ) {
					echo np_capsula_html( np_datos( $np_post->ID ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
				?>
			</div>
			<div class="np-estanteria__mas"><a class="np-boton-gris" href="<?php echo esc_url( $np_ver ); ?>"><?php esc_html_e( 'Ver más', 'nexo-play' ); ?></a></div>
		<?php endif; ?>
	<?php else : ?>
		<?php echo np_cabecera_seccion( $attributes['titulo'], $np_q->have_posts() ? array( __( 'Ver más', 'nexo-play' ) => $np_ver ) : array() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php if ( $attributes['subtitulo'] ) : ?>
			<p class="np-seccion__subtitulo"><?php echo esc_html( $attributes['subtitulo'] ); ?></p>
		<?php endif; ?>
		<?php if ( ! $np_q->have_posts() ) : ?>
			<?php echo np_sin_juegos(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php else : ?>
			<?php list( $np_prev, $np_next ) = np_flechas(); ?>
			<div class="np-carrusel" data-np-carrusel>
				<?php echo $np_prev; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<div class="np-carrusel__ventana"><div class="np-carrusel__pista">
				<?php foreach ( array_chunk( $np_q->posts, 4 ) as $np_grupo ) : ?>
					<div class="np-carrusel__pagina np-estanteria__pagina">
						<?php
						foreach ( $np_grupo as $np_post ) {
							echo np_capsula_html( np_datos( $np_post->ID ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
						?>
					</div>
				<?php endforeach; ?>
				</div></div>
				<?php echo $np_next; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<div class="np-carrusel__puntos"></div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</section>
