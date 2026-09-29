<?php
/**
 * Bloque «Pestañas de la tienda» con vista previa al pasar el ratón.
 *
 * @package Nexo_Play
 * @var array $attributes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$np_pestanas = array(
	'novedades' => array( __( 'Novedades populares', 'nexo-play' ), array( 'orden' => 'lanzamiento' ) ),
	'ventas'    => array( __( 'Lo más vendido', 'nexo-play' ), array( 'orden' => 'ventas' ) ),
	'proximos'  => array( __( 'Próximos lanzamientos', 'nexo-play' ), array( 'proximos' => 1 ) ),
	'ofertas'   => array( __( 'Ofertas', 'nexo-play' ), array( 'oferta' => 1 ) ),
	'gratuitos' => array( __( 'Gratuitos populares', 'nexo-play' ), array( 'precio' => 0 ) ),
);
$np_listas = array();
foreach ( $np_pestanas as $np_clave => $np_p ) {
	$np_q = np_consulta(
		array(
			'criterio' => $np_clave,
			'cantidad' => (int) $attributes['cantidad'],
		)
	);
	if ( $np_q->have_posts() ) {
		$np_listas[ $np_clave ] = $np_q->posts;
	}
}
$np_uid = wp_unique_id( 'np-pestanas-' );
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'np-seccion np-pestanas' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> data-np-pestanas>
	<?php if ( ! $np_listas ) : ?>
		<?php echo np_sin_juegos(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php else : ?>
	<div class="np-pestanas__tabs" role="tablist">
		<?php
		$np_i = 0;
		foreach ( $np_listas as $np_clave => $np_posts ) :
			?>
			<button type="button" role="tab" class="np-pestanas__tab" id="<?php echo esc_attr( $np_uid . '-tab-' . $np_clave ); ?>" aria-controls="<?php echo esc_attr( $np_uid . '-' . $np_clave ); ?>" aria-selected="<?php echo 0 === $np_i ? 'true' : 'false'; ?>"><?php echo esc_html( $np_pestanas[ $np_clave ][0] ); ?></button>
			<?php
			++$np_i;
		endforeach;
		?>
	</div>
	<div class="np-pestanas__cuerpo">
		<div class="np-pestanas__listas">
		<?php
		$np_i = 0;
		foreach ( $np_listas as $np_clave => $np_posts ) :
			?>
			<div class="np-pestanas__lista" role="tabpanel" id="<?php echo esc_attr( $np_uid . '-' . $np_clave ); ?>" aria-labelledby="<?php echo esc_attr( $np_uid . '-tab-' . $np_clave ); ?>" <?php echo $np_i > 0 ? 'hidden' : ''; ?>>
				<?php
				foreach ( $np_posts as $np_post ) :
					$d       = np_datos( $np_post->ID );
					$np_tags = wp_list_pluck( array_slice( array_merge( $d['generos'], $d['etiquetas'] ), 0, 4 ), 'name' );
					?>
					<a class="np-fila" href="<?php echo esc_url( $d['url'] ); ?>">
						<img class="np-fila__img" src="<?php echo esc_url( $d['capsula'] ); ?>" alt="" loading="lazy">
						<span class="np-fila__texto">
							<span class="np-fila__titulo"><?php echo esc_html( $d['titulo'] ); ?></span>
							<span class="np-fila__meta"><?php echo np_plataformas_html( $d ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php echo esc_html( implode( ', ', $np_tags ) ); ?></span>
							<span class="np-fila__fecha"><?php echo esc_html( ( $d['proximo'] ? __( 'Fecha prevista: ', 'nexo-play' ) : __( 'Lanzamiento: ', 'nexo-play' ) ) . $d['fecha_texto'] ); ?></span>
						</span>
						<?php echo np_precio_html( $d ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
					<template class="np-fila__vista">
						<h3 class="np-vista__titulo"><?php echo esc_html( $d['titulo'] ); ?></h3>
						<p class="np-vista__val"><?php esc_html_e( 'Reseñas de los usuarios en conjunto:', 'nexo-play' ); ?><br><?php echo np_valoracion_html( $d ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php echo np_etiquetas_html( $d, 5 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<div class="np-vista__capturas">
							<?php foreach ( array_slice( $d['capturas'], 0, 4 ) as $np_c ) : ?>
								<img src="<?php echo esc_url( $np_c['mediana'] ); ?>" alt="">
							<?php endforeach; ?>
						</div>
					</template>
				<?php endforeach; ?>
				<div class="np-pestanas__mas">
					<?php esc_html_e( 'Ver más:', 'nexo-play' ); ?>
					<a class="np-boton-gris" href="<?php echo esc_url( np_url_juegos( $np_pestanas[ $np_clave ][1] ) ); ?>"><?php echo esc_html( $np_pestanas[ $np_clave ][0] ); ?></a>
				</div>
			</div>
			<?php
			++$np_i;
		endforeach;
		?>
		</div>
		<aside class="np-pestanas__vista" aria-hidden="true"></aside>
	</div>
	<?php endif; ?>
</section>
