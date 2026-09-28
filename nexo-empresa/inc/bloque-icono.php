<?php
/**
 * Bloque Nexo › Icono (blocks/icono).
 *
 * @package Nexo_Empresa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Iconos disponibles (Lucide, licencia ISC).
 *
 * @return array<string, array{label: string, svg: string}>
 */
function nexo_iconos() {
	static $iconos = null;
	if ( null === $iconos ) {
		$iconos = require NEXO_DIR . '/inc/iconos.php';
	}
	return $iconos;
}

/**
 * Registra el bloque y pasa la lista de iconos al editor.
 */
function nexo_register_icon_block() {
	register_block_type( NEXO_DIR . '/blocks/icono' );

	$handle = generate_block_asset_handle( 'nexo/icono', 'editorScript' );
	wp_add_inline_script( $handle, 'window.nexoIconos = ' . wp_json_encode( nexo_iconos() ) . ';', 'before' );
}
add_action( 'init', 'nexo_register_icon_block' );

/**
 * Rejilla del selector de iconos en la barra lateral del editor.
 */
function nexo_icon_picker_styles() {
	wp_register_style( 'nexo-editor-ui', false, array(), NEXO_VERSION );
	wp_enqueue_style( 'nexo-editor-ui' );
	wp_add_inline_style(
		'nexo-editor-ui',
		'.nexo-selector-iconos{display:grid;grid-template-columns:repeat(6,1fr);gap:4px;margin:12px 0 16px;max-height:220px;overflow:auto}' .
		'.nexo-selector-iconos .components-button{justify-content:center;height:36px;padding:6px}' .
		'.nexo-selector-iconos svg{width:20px;height:20px}'
	);
}
add_action( 'enqueue_block_editor_assets', 'nexo_icon_picker_styles' );
