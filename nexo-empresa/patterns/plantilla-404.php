<?php
/**
 * Title: Plantilla: página no encontrada
 * Slug: nexo-empresa/plantilla-404
 * Categories: nexo-paginas
 * Keywords: 404
 * Viewport Width: 1400
 * Inserter: no
 * Description: Error 404.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0"}}},"gradient":"suave","layout":{"type":"constrained","contentSize":"640px"}} -->
<main class="wp-block-group alignfull has-suave-gradient-background has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:paragraph {"align":"center","className":"is-style-degradado nexo-paso-numero","fontSize":"display"} -->
<p class="has-text-align-center is-style-degradado nexo-paso-numero has-display-font-size">404</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'Esta página no existe', 'nexo-empresa' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"is-style-destacado"} -->
<p class="has-text-align-center is-style-destacado"><?php esc_html_e( 'Puede que el enlace esté roto o que la página se haya movido. Prueba a buscar lo que necesitas o vuelve al inicio.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php esc_attr_e( 'Buscar', 'nexo-empresa' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'Buscar en la web…', 'nexo-empresa' ); ?>","buttonText":"<?php esc_attr_e( 'Buscar', 'nexo-empresa' ); ?>"} /-->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-suave"} -->
<div class="wp-block-button is-style-suave"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'inicio' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Volver al inicio', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></main>
<!-- /wp:group -->
