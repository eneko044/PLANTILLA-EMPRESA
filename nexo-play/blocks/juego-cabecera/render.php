<?php
/**
 * Ficha del juego: migas, título, galería y datos principales.
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
	echo '<div ' . get_block_wrapper_attributes() . '>' . np_sin_juegos() . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	return;
}
$d          = np_datos( $np_id );
$np_capturas = $d['capturas'] ? $d['capturas'] : array(
	array(
		'grande'  => $d['cabecera'],
		'mediana' => $d['cabecera'],
		'mini'    => $d['cabecera'],
	)
);
$np_genero = $d['generos'] ? $d['generos'][0] : null;
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'np-ficha', 'style' => "--np-fondo:url('" . esc_url( $d['cabecera'] ) . "');" ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<nav class="np-ficha__migas" aria-label="<?php esc_attr_e( 'Estás aquí', 'nexo-play' ); ?>">
		<a href="<?php echo esc_url( np_url_juegos() ); ?>"><?php esc_html_e( 'Todos los juegos', 'nexo-play' ); ?></a>
		<?php if ( $np_genero ) : ?>
			&gt; <a href="<?php echo esc_url( get_term_link( $np_genero ) ); ?>"><?php echo esc_html( $np_genero->name ); ?></a>
		<?php endif; ?>
		&gt; <span><?php echo esc_html( $d['titulo'] ); ?></span>
	</nav>
	<div class="np-ficha__fila-titulo">
		<h1 class="np-ficha__titulo"><?php echo esc_html( $d['titulo'] ); ?></h1>
		<a class="np-boton-comunidad" href="<?php echo esc_url( np_url( 'comunidad' ) ); ?>"><?php esc_html_e( 'Centro de la comunidad', 'nexo-play' ); ?></a>
	</div>
	<div class="np-ficha__cuerpo">
		<div class="np-galeria" data-np-galeria>
			<div class="np-galeria__principal">
				<img src="<?php echo esc_url( $np_capturas[0]['grande'] ); ?>" alt="<?php echo esc_attr( $d['titulo'] ); ?>">
			</div>
			<div class="np-galeria__tira">
				<?php foreach ( $np_capturas as $np_i => $np_c ) : ?>
					<button type="button" class="np-galeria__mini<?php echo 0 === $np_i ? ' is-activa' : ''; ?>" data-np-grande="<?php echo esc_url( $np_c['grande'] ); ?>" aria-label="<?php echo esc_attr( sprintf( /* translators: %d: número. */ __( 'Captura %d', 'nexo-play' ), $np_i + 1 ) ); ?>">
						<img src="<?php echo esc_url( $np_c['mini'] ); ?>" alt="" loading="lazy">
					</button>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="np-ficha__lado">
			<img class="np-ficha__capsula" src="<?php echo esc_url( $d['cabecera'] ); ?>" alt="">
			<p class="np-ficha__corta"><?php echo esc_html( $d['corta'] ); ?></p>
			<dl class="np-ficha__datos">
				<dt><?php esc_html_e( 'Reseñas:', 'nexo-play' ); ?></dt>
				<dd><?php echo np_valoracion_html( $d ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></dd>
				<dt><?php esc_html_e( 'Fecha de lanzamiento:', 'nexo-play' ); ?></dt>
				<dd class="np-ficha__fecha"><?php echo esc_html( $d['fecha_texto'] ); ?></dd>
				<?php if ( $d['dev'] ) : ?>
					<dt><?php esc_html_e( 'Desarrollador:', 'nexo-play' ); ?></dt>
					<dd><a href="<?php echo esc_url( np_url_juegos( array( 'q' => $d['dev'] ) ) ); ?>"><?php echo esc_html( $d['dev'] ); ?></a></dd>
				<?php endif; ?>
				<?php if ( $d['editor'] ) : ?>
					<dt><?php esc_html_e( 'Editor:', 'nexo-play' ); ?></dt>
					<dd><a href="<?php echo esc_url( np_url_juegos( array( 'q' => $d['editor'] ) ) ); ?>"><?php echo esc_html( $d['editor'] ); ?></a></dd>
				<?php endif; ?>
			</dl>
			<?php if ( $d['etiquetas'] || $d['generos'] ) : ?>
				<p class="np-ficha__etiquetas-titulo"><?php esc_html_e( 'Etiquetas populares para este producto:', 'nexo-play' ); ?></p>
				<?php echo np_etiquetas_html( $d, 6, true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<?php endif; ?>
		</div>
	</div>
</div>
