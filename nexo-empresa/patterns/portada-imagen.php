<?php
/**
 * Title: Portada con imagen de fondo
 * Slug: nexo-empresa/portada-imagen
 * Categories: nexo-portadas, featured, banner
 * Keywords: portada, hero, cabecera, inicio, banner
 * Viewport Width: 1400
 * Description: Imagen a pantalla completa con titular grande, dos botones y datos de confianza.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:cover {"url":"<?php echo nexo_img( 'hero-edificio.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>","dimRatio":80,"customGradient":"linear-gradient(100deg,rgba(14,23,38,0.92) 0%,rgba(14,23,38,0.7) 50%,rgba(14,23,38,0.25) 100%)","isUserOverlayColor":true,"minHeight":86,"minHeightUnit":"vh","metadata":{"name":"<?php esc_attr_e( 'Portada', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}},"color":{"text":"#ffffff"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-text-color" style="color:#ffffff;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40);min-height:86vh"><img class="wp-block-cover__image-background" alt="" src="<?php echo nexo_img( 'hero-edificio.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-80 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(100deg,rgba(14,23,38,0.92) 0%,rgba(14,23,38,0.7) 50%,rgba(14,23,38,0.25) 100%)"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
<div class="wp-block-group alignwide"><!-- wp:paragraph {"className":"is-style-etiqueta nexo-anim-subir","style":{"color":{"background":"#ffffff1f","text":"#ffffff"}}} -->
<p class="is-style-etiqueta nexo-anim-subir has-text-color has-background" style="color:#ffffff;background-color:#ffffff1f">✦ <?php esc_html_e( 'Más de 10 años ayudando a empresas a crecer', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"nexo-anim-subir nexo-retraso-1","fontSize":"display"} -->
<h1 class="wp-block-heading nexo-anim-subir nexo-retraso-1 has-display-font-size"><?php esc_html_e( 'Soluciones que impulsan tu negocio al siguiente nivel', 'nexo-empresa' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-anim-subir nexo-retraso-2","style":{"color":{"text":"#ffffffcc"}},"fontSize":"large"} -->
<p class="nexo-anim-subir nexo-retraso-2 has-text-color has-large-font-size" style="color:#ffffffcc"><?php esc_html_e( 'Combinamos estrategia, diseño y tecnología para que tu empresa llegue a más clientes y trabaje de forma más eficiente.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"nexo-anim-subir nexo-retraso-3","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons nexo-anim-subir nexo-retraso-3" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button {"className":"is-style-flecha"} -->
<div class="wp-block-button is-style-flecha"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Pide presupuesto', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","style":{"color":{"text":"#ffffff"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-text-color wp-element-button" style="color:#ffffff" href="<?php echo nexo_url( 'servicios' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Ver servicios', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:group {"className":"nexo-anim-aparecer nexo-retraso-4","style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group nexo-anim-aparecer nexo-retraso-4" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"style":{"color":{"text":"#ffffffcc"}},"fontSize":"small"} -->
<p class="has-text-color has-small-font-size" style="color:#ffffffcc"><strong>★★★★★ 4,9/5</strong> <?php esc_html_e( 'valoración media', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#ffffffcc"}},"fontSize":"small"} -->
<p class="has-text-color has-small-font-size" style="color:#ffffffcc"><strong>+250</strong> <?php esc_html_e( 'clientes satisfechos', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#ffffffcc"}},"fontSize":"small"} -->
<p class="has-text-color has-small-font-size" style="color:#ffffffcc"><strong>24 h</strong> <?php esc_html_e( 'tiempo de respuesta', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
