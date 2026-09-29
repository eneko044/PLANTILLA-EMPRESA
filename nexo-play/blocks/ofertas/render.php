<?php
/**
 * Bloque «Descuentos y eventos»: páginas con dos tarjetas altas y dos apiladas.
 *
 * @package Nexo_Play
 * @var array $attributes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$np_q = np_consulta(
	array(
		'criterio' => 'ofertas',
		'cantidad' => (int) $attributes['cantidad'],
	)
);

/**
 * Tarjeta de oferta.
 *
 * @param array  $d    Datos.
 * @param string $tipo alta|baja.
 * @return string
 */
$np_tarjeta = function ( $d, $tipo ) {
	$etiqueta = $d['oferta'] ? $d['oferta'] : __( 'OFERTA ESPECIAL', 'nexo-play' );
	$tono     = false !== stripos( $etiqueta, 'semana' ) ? 'magenta' : ( false !== stripos( $etiqueta, 'hoy' ) ? 'verde' : 'azul' );
	$img      = ( 'alta' === $tipo && $d['vertical'] ) ? $d['vertical'] : $d['cabecera'];
	return sprintf(
		'<a class="np-oferta np-oferta--%1$s" href="%2$s"><span class="np-oferta__etiqueta np-oferta__etiqueta--%3$s">%4$s</span><span class="np-oferta__img"><img src="%5$s" alt="%6$s" loading="lazy"></span>%7$s</a>',
		esc_attr( $tipo ),
		esc_url( $d['url'] ),
		esc_attr( $tono ),
		esc_html( $etiqueta ),
		esc_url( $img ),
		esc_attr( $d['titulo'] ),
		np_precio_html( $d, 'np-oferta__precio' )
	);
};

$np_items = array_map(
	function ( $p ) {
		return np_datos( $p->ID );
	},
	$np_q->posts
);
list( $np_prev, $np_next ) = np_flechas();
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'np-seccion np-ofertas' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php echo np_cabecera_seccion( $attributes['titulo'], array( __( 'Ver más', 'nexo-play' ) => np_url_juegos( array( 'oferta' => 1 ) ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php if ( ! $np_items ) : ?>
		<?php echo np_sin_juegos(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php else : ?>
	<div class="np-carrusel np-carrusel--panel" data-np-carrusel>
		<?php echo $np_prev; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<div class="np-carrusel__ventana"><div class="np-carrusel__pista">
		<?php foreach ( array_chunk( $np_items, 4 ) as $np_grupo ) : ?>
			<div class="np-carrusel__pagina np-ofertas__pagina">
				<?php
				foreach ( array_slice( $np_grupo, 0, 2 ) as $d ) {
					echo '<div class="np-ofertas__col">' . $np_tarjeta( $d, 'alta' ) . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
				$np_bajas = array_slice( $np_grupo, 2 );
				if ( $np_bajas ) {
					echo '<div class="np-ofertas__col np-ofertas__col--pila">';
					foreach ( $np_bajas as $d ) {
						echo $np_tarjeta( $d, 'baja' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					echo '</div>';
				}
				?>
			</div>
		<?php endforeach; ?>
		</div></div>
		<?php echo $np_next; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<div class="np-carrusel__puntos"></div>
	</div>
	<?php endif; ?>
</section>
