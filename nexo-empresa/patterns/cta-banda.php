<?php
/**
 * Title: Llamada a la acción en banda de color
 * Slug: nexo-empresa/cta-banda
 * Categories: nexo-llamadas, call-to-action
 * Keywords: llamada a la acción, cta, contacto, banner
 * Viewport Width: 1400
 * Description: Caja redondeada con degradado de marca, titular y dos botones.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Llamada a la acción', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"align":"wide","className":"nexo-anim-zoom nexo-cta-caja","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"}},"border":{"radius":"24px"}},"textColor":"base","gradient":"principal"} -->
<div class="wp-block-group alignwide nexo-anim-zoom nexo-cta-caja has-base-color has-principal-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60);border-radius:24px"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"62%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:62%"><!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( '¿Listo para dar el siguiente paso?', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"large"} -->
<p class="nexo-texto-suave has-large-font-size"><?php esc_html_e( 'Cuéntanos tu idea y te preparamos una propuesta sin compromiso en menos de 48 horas.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"38%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:38%"><!-- wp:buttons {"className":"nexo-centrar-movil","layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons nexo-centrar-movil"><!-- wp:button {"backgroundColor":"base","textColor":"contrast","className":"is-style-flecha"} -->
<div class="wp-block-button is-style-flecha"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Pide presupuesto', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"base","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Llámanos', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
