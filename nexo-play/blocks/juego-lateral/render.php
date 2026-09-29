<?php
/**
 * Ficha del juego: columna lateral con formas de jugar y detalles.
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

$np_icono = function ( $nombre ) {
	$n = sanitize_title( $nombre );
	if ( false !== strpos( $n, 'un-jugador' ) ) {
		$p = '<circle cx="12" cy="7" r="4"/><path d="M4 21c0-4 3.6-7 8-7s8 3 8 7z"/>';
	} elseif ( false !== strpos( $n, 'pantalla' ) ) {
		$p = '<rect x="2" y="4" width="20" height="13" rx="1"/><path d="M12 4v13M8 21h8"/>';
	} elseif ( false !== strpos( $n, 'jcj' ) ) {
		$p = '<path d="M5 3l6 6-2 2-6-6zM19 3l-6 6 2 2 6-6zM3 21l7-7M21 21l-7-7"/>';
	} else {
		$p = '<circle cx="8" cy="8" r="3.4"/><circle cx="16.5" cy="8" r="3.4"/><path d="M1.5 20c0-3.4 3-6 6.5-6s6.5 2.6 6.5 6zM13.5 14.3c1-.2 2-.3 3-.3 3.5 0 6.5 2.6 6.5 6h-7"/>';
	}
	return '<svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" stroke="currentColor" stroke-width="0.6">' . $p . '</svg>';
};
?>
<aside <?php echo get_block_wrapper_attributes( array( 'class' => 'np-lateral' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php if ( $d['modos'] ) : ?>
		<div class="np-lateral__caja">
			<ul class="np-lateral__modos">
				<?php foreach ( $d['modos'] as $np_m ) : ?>
					<li><a href="<?php echo esc_url( get_term_link( $np_m ) ); ?>"><span class="np-lateral__icono"><?php echo $np_icono( $np_m->name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><?php echo esc_html( $np_m->name ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
	<div class="np-lateral__caja">
		<dl class="np-lateral__detalles">
			<dt><?php esc_html_e( 'Título:', 'nexo-play' ); ?></dt><dd><?php echo esc_html( $d['titulo'] ); ?></dd>
			<?php if ( $d['generos'] ) : ?>
				<dt><?php esc_html_e( 'Género:', 'nexo-play' ); ?></dt>
				<dd>
					<?php
					echo implode( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						', ',
						array_map(
							function ( $t ) {
								return '<a href="' . esc_url( get_term_link( $t ) ) . '">' . esc_html( $t->name ) . '</a>';
							},
							$d['generos']
						)
					);
					?>
				</dd>
			<?php endif; ?>
			<?php if ( $d['dev'] ) : ?>
				<dt><?php esc_html_e( 'Desarrollador:', 'nexo-play' ); ?></dt><dd><?php echo esc_html( $d['dev'] ); ?></dd>
			<?php endif; ?>
			<?php if ( $d['editor'] ) : ?>
				<dt><?php esc_html_e( 'Editor:', 'nexo-play' ); ?></dt><dd><?php echo esc_html( $d['editor'] ); ?></dd>
			<?php endif; ?>
			<dt><?php esc_html_e( 'Fecha de lanzamiento:', 'nexo-play' ); ?></dt><dd><?php echo esc_html( $d['fecha_texto'] ); ?></dd>
		</dl>
		<ul class="np-lateral__enlaces">
			<li><a href="<?php echo esc_url( np_url( 'noticias' ) ); ?>"><?php esc_html_e( 'Leer noticias relacionadas', 'nexo-play' ); ?></a></li>
			<li><a href="<?php echo esc_url( np_url( 'comunidad' ) ); ?>"><?php esc_html_e( 'Ver discusiones', 'nexo-play' ); ?></a></li>
			<li><a href="<?php echo esc_url( np_url( 'soporte' ) ); ?>"><?php esc_html_e( 'Buscar ayuda y soporte', 'nexo-play' ); ?></a></li>
		</ul>
	</div>
</aside>
