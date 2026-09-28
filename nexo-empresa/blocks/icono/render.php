<?php
/**
 * Salida del bloque Nexo › Icono.
 *
 * @package Nexo_Empresa
 *
 * @var array $attributes Atributos del bloque.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$nexo_iconos = nexo_iconos();
$nexo_slug   = isset( $attributes['icono'] ) && isset( $nexo_iconos[ $attributes['icono'] ] ) ? $attributes['icono'] : 'sparkles';
$nexo_tamano = isset( $attributes['tamano'] ) ? max( 12, min( 160, (int) $attributes['tamano'] ) ) : 26;
$nexo_forma  = isset( $attributes['forma'] ) && in_array( $attributes['forma'], array( 'cuadrado', 'circulo', 'ninguna' ), true ) ? $attributes['forma'] : 'cuadrado';
$nexo_alinea = isset( $attributes['alineacion'] ) && in_array( $attributes['alineacion'], array( 'left', 'center', 'right' ), true ) ? $attributes['alineacion'] : 'left';

$nexo_wrapper = get_block_wrapper_attributes(
	array(
		'class' => 'nexo-forma-' . $nexo_forma . ' nexo-alinear-' . $nexo_alinea,
		'style' => '--nexo-icono-tamano:' . $nexo_tamano . 'px;',
	)
);

printf(
	'<div %1$s><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">%2$s</svg></div>',
	$nexo_wrapper, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- get_block_wrapper_attributes() ya escapa.
	$nexo_iconos[ $nexo_slug ]['svg'] // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG fijo incluido en el tema.
);
