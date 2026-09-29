<?php
/**
 * Ficha del juego: caja de compra.
 *
 * @package Nexo_Play
 * @var array    $attributes
 * @var WP_Block $block
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$np_id = np_juego_actual( $block );
if ( ! $np_id ) {
	return;
}
$d = np_datos( $np_id );

if ( null === $d['precio'] ) {
	/* translators: %s: juego. */
	$np_accion = sprintf( __( 'Añadir «%s» a tu lista de deseados', 'nexo-play' ), $d['titulo'] );
	$np_boton  = __( 'Lista de deseados', 'nexo-play' );
} elseif ( 0.0 === (float) $d['precio'] ) {
	/* translators: %s: juego. */
	$np_accion = sprintf( __( 'Jugar a «%s»', 'nexo-play' ), $d['titulo'] );
	$np_boton  = __( 'Jugar', 'nexo-play' );
} elseif ( $d['proximo'] ) {
	/* translators: %s: juego. */
	$np_accion = sprintf( __( 'Reservar «%s»', 'nexo-play' ), $d['titulo'] );
	$np_boton  = __( 'Reservar', 'nexo-play' );
} else {
	/* translators: %s: juego. */
	$np_accion = sprintf( __( 'Comprar «%s»', 'nexo-play' ), $d['titulo'] );
	$np_boton  = __( 'Añadir al carro', 'nexo-play' );
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'np-compra' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php if ( $d['proximo'] ) : ?>
		<p class="np-compra__aviso"><?php echo esc_html( sprintf( /* translators: %s: fecha. */ __( 'Este juego aún no está disponible. Fecha prevista: %s', 'nexo-play' ), $d['fecha_texto'] ) ); ?></p>
	<?php endif; ?>
	<div class="np-compra__caja">
		<div class="np-compra__cabecera">
			<h2 class="np-compra__titulo"><?php echo esc_html( $np_accion ); ?></h2>
			<?php echo np_plataformas_html( $d ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
		<?php if ( $d['descuento'] > 0 ) : ?>
			<p class="np-compra__oferta"><?php echo esc_html( $d['oferta'] ? $d['oferta'] : __( '¡Oferta especial!', 'nexo-play' ) ); ?> · <?php esc_html_e( 'La oferta termina pronto', 'nexo-play' ); ?></p>
		<?php endif; ?>
		<div class="np-compra__accion">
			<?php if ( null !== $d['precio'] ) : ?>
				<?php echo np_precio_html( $d, 'np-precio--grande' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<?php endif; ?>
			<a class="np-boton-comprar" href="<?php echo esc_url( $d['enlace'] ); ?>"><?php echo esc_html( $np_boton ); ?></a>
		</div>
	</div>
</div>
