<?php
/**
 * Title: Plantilla: 404
 * Slug: nexo-play/plantilla-404
 * Categories: nexo-play-paginas
 * Keywords: 404
 * Viewport Width: 1400
 * Inserter: no
 * Description: Página no encontrada.
 *
 * @package Nexo_Play
 */

?>
<!-- wp:group {"tagName":"main","className":"np-main","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
<main class="wp-block-group np-main" style="margin-top:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( '¡Vaya! No encontramos esa página', 'nexo-play' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e( 'Puede que el enlace esté roto o que el juego ya no esté disponible. Prueba a buscarlo en la tienda.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php esc_attr_e( 'Buscar', 'nexo-play' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'Buscar en la tienda', 'nexo-play' ); ?>","buttonText":"<?php esc_attr_e( 'Buscar', 'nexo-play' ); ?>","query":{"post_type":"juego"},"className":"np-buscador np-buscador--grande"} /-->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"np-boton-azul"} -->
<div class="wp-block-button np-boton-azul"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Volver a la tienda', 'nexo-play' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></main>
<!-- /wp:group -->
