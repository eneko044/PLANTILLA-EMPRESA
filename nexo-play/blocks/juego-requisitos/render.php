<?php
/**
 * Ficha del juego: requisitos del sistema.
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
if ( ! $d['req_min'] && ! $d['req_rec'] ) {
	return;
}
$np_lista = function ( $texto ) {
	$html = '';
	foreach ( array_filter( array_map( 'trim', explode( "\n", $texto ) ) ) as $linea ) {
		$partes = explode( ':', $linea, 2 );
		$html  .= 2 === count( $partes )
			? '<li><strong>' . esc_html( $partes[0] ) . ':</strong> ' . esc_html( trim( $partes[1] ) ) . '</li>'
			: '<li>' . esc_html( $linea ) . '</li>';
	}
	return '<ul>' . $html . '</ul>';
};
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'np-requisitos' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<h2 class="np-titulo-linea"><?php esc_html_e( 'Requisitos del sistema', 'nexo-play' ); ?></h2>
	<div class="np-requisitos__columnas">
		<?php if ( $d['req_min'] ) : ?>
			<div><h3><?php esc_html_e( 'Mínimo:', 'nexo-play' ); ?></h3><?php echo $np_lista( $d['req_min'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<?php endif; ?>
		<?php if ( $d['req_rec'] ) : ?>
			<div><h3><?php esc_html_e( 'Recomendado:', 'nexo-play' ); ?></h3><?php echo $np_lista( $d['req_rec'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<?php endif; ?>
	</div>
</section>
