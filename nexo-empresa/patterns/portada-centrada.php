<?php
/**
 * Title: Portada centrada con imagen panorámica
 * Slug: nexo-empresa/portada-centrada
 * Categories: nexo-portadas, featured, banner
 * Keywords: portada, hero, inicio, centrado
 * Viewport Width: 1400
 * Description: Titular centrado con palabra resaltada, botones y una imagen panorámica debajo.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Portada centrada', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"gradient":"suave","layout":{"type":"constrained","contentSize":"860px"}} -->
<div class="wp-block-group alignfull has-suave-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","className":"is-style-etiqueta nexo-anim-subir"} -->
<p class="has-text-align-center is-style-etiqueta nexo-anim-subir"><?php esc_html_e( 'Estrategia · Diseño · Tecnología', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"className":"nexo-anim-subir nexo-retraso-1","fontSize":"display"} -->
<h1 class="wp-block-heading has-text-align-center nexo-anim-subir nexo-retraso-1 has-display-font-size"><?php esc_html_e( 'Hacemos crecer', 'nexo-empresa' ); ?> <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-primary-color"><?php esc_html_e( 'tu empresa', 'nexo-empresa' ); ?></mark></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"is-style-destacado nexo-anim-subir nexo-retraso-2"} -->
<p class="has-text-align-center is-style-destacado nexo-anim-subir nexo-retraso-2"><?php esc_html_e( 'Te acompañamos en cada paso con un servicio profesional, rápido y a la medida de tu negocio.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"nexo-anim-subir nexo-retraso-3","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons nexo-anim-subir nexo-retraso-3"><!-- wp:button {"className":"is-style-flecha"} -->
<div class="wp-block-button is-style-flecha"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Solicitar información', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-suave"} -->
<div class="wp-block-button is-style-suave"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'servicios' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Qué hacemos', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:image {"aspectRatio":"21/9","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"wide","className":"is-style-sombra nexo-anim-zoom nexo-retraso-3","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
<figure class="wp-block-image alignwide size-full is-style-sombra nexo-anim-zoom nexo-retraso-3" style="margin-top:var(--wp--preset--spacing--60)"><img src="<?php echo nexo_img( 'oficina.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Espacio de trabajo luminoso', 'nexo-empresa' ); ?>" style="aspect-ratio:21/9;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->
