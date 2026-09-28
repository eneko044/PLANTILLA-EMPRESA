<?php
/**
 * Title: Testimonio destacado
 * Slug: nexo-empresa/testimonio-destacado
 * Categories: nexo-confianza, testimonials
 * Keywords: testimonio, cita, opinión, destacado
 * Viewport Width: 1400
 * Description: Una sola cita grande y centrada con la foto y el cargo de la persona.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Testimonio destacado', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained","contentSize":"820px"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:paragraph {"align":"center","className":"nexo-cita-comillas","textColor":"primary","fontSize":"display"} -->
<p class="has-text-align-center nexo-cita-comillas has-primary-color has-text-color has-display-font-size">“</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"nexo-anim-subir","fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center nexo-anim-subir has-x-large-font-size"><?php esc_html_e( 'Trabajar con este equipo ha sido la mejor decisión que hemos tomado. Nos han ayudado a ordenar nuestras ideas y a convertirlas en una empresa que crece mes a mes.', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"nexo-testimonio-autor","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group nexo-testimonio-autor"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"nexo-avatar"} -->
<figure class="wp-block-image size-full nexo-avatar"><img src="<?php echo nexo_img( 'avatar-6.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Eduardo Navarro</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"x-small"} -->
<p class="nexo-texto-suave has-x-small-font-size"><?php esc_html_e( 'Fundador de Navarro Logística', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
