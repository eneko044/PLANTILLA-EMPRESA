<?php
/**
 * Title: Tabla de precios
 * Slug: nexo-empresa/precios
 * Categories: nexo-precios, pricing
 * Keywords: precios, tarifas, planes, pricing
 * Viewport Width: 1400
 * Description: Tres planes con precio, lista de ventajas y botón; el central aparece destacado.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Precios', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"680px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-antetitulo nexo-anim-subir"} -->
<p class="has-text-align-center is-style-antetitulo nexo-anim-subir"><?php esc_html_e( 'Precios', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"nexo-anim-subir"} -->
<h2 class="wp-block-heading has-text-align-center nexo-anim-subir"><?php esc_html_e( 'Planes claros, sin sorpresas', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"is-style-destacado nexo-anim-subir"} -->
<p class="has-text-align-center is-style-destacado nexo-anim-subir"><?php esc_html_e( 'Precios orientativos con IVA no incluido. Pide tu presupuesto personalizado sin compromiso.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"className":"is-style-tarjeta nexo-anim-subir nexo-retraso-1"} -->
<div class="wp-block-column is-style-tarjeta nexo-anim-subir nexo-retraso-1"><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Básico', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'Para autónomos y negocios que empiezan.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"nexo-precio","fontSize":"xx-large"} -->
<p class="nexo-precio has-xx-large-font-size"><strong>290 €</strong> <span class="nexo-precio-periodo">/ proyecto</span></p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-wide nexo-separador-suave"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide nexo-separador-suave"/>
<!-- /wp:separator -->

<!-- wp:list {"className":"is-style-check","fontSize":"small"} -->
<ul class="wp-block-list is-style-check has-small-font-size"><!-- wp:list-item -->
<li><?php esc_html_e( 'Web de una página', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Diseño adaptado a móviles', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Formulario de contacto', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Soporte por correo', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:button {"width":100,"className":"is-style-outline"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Elegir plan', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-tarjeta-elevada nexo-plan-destacado nexo-anim-subir nexo-retraso-2","backgroundColor":"primary-2","textColor":"base"} -->
<div class="wp-block-column is-style-tarjeta-elevada nexo-plan-destacado nexo-anim-subir nexo-retraso-2 has-base-color has-primary-2-background-color has-text-color has-background"><!-- wp:paragraph {"className":"is-style-etiqueta"} -->
<p class="is-style-etiqueta"><?php esc_html_e( 'Más popular', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Profesional', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'La opción preferida por las pymes.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"nexo-precio","fontSize":"xx-large"} -->
<p class="nexo-precio has-xx-large-font-size"><strong>690 €</strong> <span class="nexo-precio-periodo">/ proyecto</span></p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-wide nexo-separador-suave"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide nexo-separador-suave"/>
<!-- /wp:separator -->

<!-- wp:list {"className":"is-style-check","fontSize":"small"} -->
<ul class="wp-block-list is-style-check has-small-font-size"><!-- wp:list-item -->
<li><?php esc_html_e( 'Web de hasta 6 páginas', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Blog y posicionamiento básico', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Integración con redes sociales', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Formación para editarla', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Soporte prioritario', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:button {"backgroundColor":"base","textColor":"primary-2","width":100,"className":"is-style-flecha"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-flecha"><a class="wp-block-button__link has-primary-2-color has-base-background-color has-text-color has-background wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Elegir plan', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-tarjeta nexo-anim-subir nexo-retraso-3"} -->
<div class="wp-block-column is-style-tarjeta nexo-anim-subir nexo-retraso-3"><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Empresa', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'Para empresas con necesidades avanzadas.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"nexo-precio","fontSize":"xx-large"} -->
<p class="nexo-precio has-xx-large-font-size"><strong>1.490 €</strong> <span class="nexo-precio-periodo">/ proyecto</span></p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-wide nexo-separador-suave"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide nexo-separador-suave"/>
<!-- /wp:separator -->

<!-- wp:list {"className":"is-style-check","fontSize":"small"} -->
<ul class="wp-block-list is-style-check has-small-font-size"><!-- wp:list-item -->
<li><?php esc_html_e( 'Páginas ilimitadas', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Tienda online o reservas', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Estrategia de marketing', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Informes mensuales', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Responsable dedicado', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:button {"width":100,"className":"is-style-outline"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Elegir plan', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
