<?php
/**
 * Title: Llamada a la acción con imagen de fondo
 * Slug: nexo-empresa/cta-imagen
 * Categories: nexo-llamadas, call-to-action
 * Keywords: llamada a la acción, cta, imagen, contacto
 * Viewport Width: 1400
 * Description: Imagen a todo el ancho con capa de color, titular centrado y botón.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:cover {"url":"<?php echo nexo_img( 'ciudad.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>","dimRatio":80,"overlayColor":"primary-2","isUserOverlayColor":true,"minHeight":480,"metadata":{"name":"<?php esc_attr_e( 'Llamada a la acción con imagen', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"textColor":"base","layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-cover alignfull has-base-color has-text-color" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--40);min-height:480px"><img class="wp-block-cover__image-background" alt="" src="<?php echo nexo_img( 'ciudad.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-2-background-color has-background-dim-80 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","className":"nexo-anim-subir","fontSize":"xxx-large"} -->
<h2 class="wp-block-heading has-text-align-center nexo-anim-subir has-xxx-large-font-size"><?php esc_html_e( 'Construyamos juntos el futuro de tu empresa', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"nexo-texto-suave nexo-anim-subir nexo-retraso-1","fontSize":"large"} -->
<p class="has-text-align-center nexo-texto-suave nexo-anim-subir nexo-retraso-1 has-large-font-size"><?php esc_html_e( 'La primera reunión es gratuita. Cuéntanos qué necesitas y te diremos cómo podemos ayudarte.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"nexo-anim-subir nexo-retraso-2","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons nexo-anim-subir nexo-retraso-2"><!-- wp:button {"backgroundColor":"base","textColor":"contrast","className":"is-style-flecha"} -->
<div class="wp-block-button is-style-flecha"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Reserva tu reunión gratuita', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->
