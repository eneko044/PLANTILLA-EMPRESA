<?php
/**
 * Bloque «Destacados y recomendados».
 *
 * @package Nexo_Play
 * @var array $attributes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$np_q = np_consulta(
	array(
		'criterio' => 'destacados',
		'cantidad' => (int) $attributes['cantidad'],
	)
);
if ( ! $np_q->have_posts() ) {
	$np_q = np_consulta(
		array(
			'criterio' => 'ventas',
			'cantidad' => (int) $attributes['cantidad'],
		)
	);
}
list( $np_prev, $np_next ) = np_flechas();
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'np-seccion np-destacados' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php echo np_cabecera_seccion( $attributes['titulo'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php if ( ! $np_q->have_posts() ) : ?>
		<?php echo np_sin_juegos(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php else : ?>
	<div class="np-carrusel np-carrusel--grande" data-np-carrusel data-np-auto="7000">
		<?php echo $np_prev; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<div class="np-carrusel__ventana"><div class="np-carrusel__pista">
		<?php
		foreach ( $np_q->posts as $np_post ) :
			$d = np_datos( $np_post->ID );
			if ( $d['proximo'] ) {
				$np_estado = __( 'Próximamente', 'nexo-play' );
				$np_icono  = 'reloj';
			} elseif ( $d['descuento'] > 0 ) {
				$np_estado = __( 'Oferta especial', 'nexo-play' );
				$np_icono  = 'oferta';
			} else {
				$np_estado = __( 'Ya disponible', 'nexo-play' );
				$np_icono  = 'ok';
			}
			?>
			<div class="np-carrusel__pagina np-dest">
				<a class="np-dest__principal" href="<?php echo esc_url( $d['url'] ); ?>">
					<img src="<?php echo esc_url( $d['cabecera'] ); ?>" data-np-original="<?php echo esc_url( $d['cabecera'] ); ?>" alt="<?php echo esc_attr( $d['titulo'] ); ?>" loading="lazy">
				</a>
				<div class="np-dest__info">
					<h3 class="np-dest__titulo"><a href="<?php echo esc_url( $d['url'] ); ?>"><?php echo esc_html( $d['titulo'] ); ?></a></h3>
					<div class="np-dest__val"><?php echo np_valoracion_html( $d ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<div class="np-dest__capturas">
						<?php foreach ( array_slice( $d['capturas'], 0, 4 ) as $np_c ) : ?>
							<img src="<?php echo esc_url( $np_c['mini'] ); ?>" data-np-grande="<?php echo esc_url( $np_c['mediana'] ); ?>" alt="" loading="lazy">
						<?php endforeach; ?>
					</div>
					<div class="np-dest__estado np-dest__estado--<?php echo esc_attr( $np_icono ); ?>"><?php echo esc_html( $np_estado ); ?></div>
					<?php echo np_etiquetas_html( $d, 4 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<div class="np-dest__pie">
						<?php echo np_plataformas_html( $d ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php echo np_precio_html( $d ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div></div>
		<?php echo $np_next; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<div class="np-carrusel__puntos"></div>
	</div>
	<?php endif; ?>
</section>
