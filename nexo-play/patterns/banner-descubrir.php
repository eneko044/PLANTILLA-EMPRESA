<?php
/**
 * Title: Banner «Explora tu lista de descubrimientos»
 * Slug: nexo-play/banner-descubrir
 * Categories: nexo-play, call-to-action
 * Keywords: banner, descubrir, llamada a la acción
 * Viewport Width: 1400
 * Description: Banner morado con título, texto y botón.
 *
 * @package Nexo_Play
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Banner de descubrimientos', 'nexo-play' ); ?>"},"className":"np-descubrir","gradient":"descubrir"} -->
<div class="wp-block-group np-descubrir has-descubrir-gradient-background has-background"><!-- wp:heading {"className":"np-descubrir__titulo"} -->
<h2 class="wp-block-heading np-descubrir__titulo"><?php esc_html_e( 'Explora tu lista de descubrimientos', 'nexo-play' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"np-descubrir__texto"} -->
<p class="np-descubrir__texto"><?php esc_html_e( 'Descubre los títulos más vendidos, las novedades y los juegos recomendados para ti.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"np-boton-azul"} -->
<div class="wp-block-button np-boton-azul"><a class="wp-block-button__link wp-element-button" href="<?php echo np_url_juegos( array( 'orden' => 'ventas' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Empezar a explorar', 'nexo-play' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
