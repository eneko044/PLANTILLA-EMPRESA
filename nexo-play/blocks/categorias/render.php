<?php
/**
 * Bloque «Explorar por categoría».
 *
 * @package Nexo_Play
 * @var array $attributes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$np_terms = get_terms(
	array(
		'taxonomy'   => 'genero',
		'hide_empty' => true,
		'orderby'    => 'count',
		'order'      => 'DESC',
	)
);
$np_colores = array( '#8e1b25', '#8a4b12', '#3f7a1d', '#1b6b7a', '#3a1d8a', '#7a1b6b', '#1d4f8a', '#6b6b1b', '#1b7a4b', '#8a1d4f' );
list( $np_prev, $np_next ) = np_flechas();
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'np-seccion np-categorias' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php echo np_cabecera_seccion( $attributes['titulo'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php if ( is_wp_error( $np_terms ) || ! $np_terms ) : ?>
		<?php echo np_sin_juegos(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php else : ?>
	<div class="np-carrusel" data-np-carrusel>
		<?php echo $np_prev; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<div class="np-carrusel__ventana"><div class="np-carrusel__pista">
		<?php foreach ( array_chunk( $np_terms, 5 ) as $np_n => $np_grupo ) : ?>
			<div class="np-carrusel__pagina np-categorias__pagina">
				<?php
				foreach ( $np_grupo as $np_i => $np_t ) :
					$np_color = get_term_meta( $np_t->term_id, '_np_color', true );
					if ( ! $np_color ) {
						$np_color = $np_colores[ ( $np_n * 5 + $np_i ) % count( $np_colores ) ];
					}
					?>
					<a class="np-categoria" href="<?php echo esc_url( get_term_link( $np_t ) ); ?>" style="--np-color:<?php echo esc_attr( $np_color ); ?>">
						<span class="np-categoria__nombre"><?php echo esc_html( $np_t->name ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
		</div></div>
		<?php echo $np_next; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<div class="np-carrusel__puntos"></div>
	</div>
	<?php endif; ?>
</section>
